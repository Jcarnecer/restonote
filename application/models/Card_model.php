<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card_model extends CI_Model {

	public $title;
	public $details;
	public $user_id;
	public $color;
	public $status;
	public $created_by;
	public $created_at;
	public $updated_at;
	

	# Get card By ID
	public function get($id) {
		
		$card 				  = $this->db->get_where('cards', ['id' => $id], 1)->result()[0];
		$card->author 		  = $this->get_author($card->user_id);
		$card->comments		  = $this->get_comments($card->id);
		$card->viewers 		  = $this->get_viewers($card->id);
		$card->tags 		  = $this->get_tags($card->id);
		$card->session_user	  = $this->session->user->id;

		return $card;
	}


	# Get All card
	public function get_all($company_id, $status = null) {

		if($status != null)
			$this->db->select('*')
					->from('cards')
					->where(['company_id' => $company_id, 'privacy' => _PUBLIC, 'status' => $status])
					->or_where(['user_id' => $this->session->user->id, 'privacy' => _PRIVATE OR _CUSTOM, 'status' => $status])
					->get()->result();
		else
			$cards = $this->db->select('*')
					->from('cards')
					->where(['company_id' => $company_id, 'privacy' => _PUBLIC])
					->or_where(['user_id' => $this->session->user->id, 'privacy' => _PRIVATE OR _CUSTOM])
					->get()->result();

		foreach ($cards as $card) {

			$card->comments 	  = $this->get_comments($card->id);
			$card->viewers 		  = $this->get_viewers($card->id);
			$card->tags 		  = $this->get_tags($card->id);
		}
		
		return $cards;
	}


	# @param $order_by = column name
	# @param $direction = asc/desc
	public function order_by($order_by = 'created_at', $direction = 'asc') {

		return $this->db->order_by($order_by, $direction);
	}


	# Get card viewers
	public function get_viewers($id = null) {
		
		return $this->db->select('*')
			->from('users')
			->join('viewers', 'viewers.user_id = users.id')
			->where('viewers.card_id', $id)
			->get()
			->result();
	}


	# Get card Tags
	public function get_tags($id = null) {

		return $this->db->select('name')
			->from('kb_tags')
			->join('cards_tagging', 'cards_tagging.tag_id = kb_tags.id')
			->where('cards_tagging.card_id', $id)
			->get()
			->result();
	}


	# Add card comments
	public function add_comments($card_id, $comment_details) {

		$this->db->insert('comments', $comment_details);
	}


	# Get card comments
	public function get_comments($card_id) {

		return $this->db->select('*')
			->from('comments')
			->where('card_id', $card_id)
			->order_by('created_at', 'ASC')
			->get()
			->result();
	}


	# Add card returning ID
	public function insert($card_details) {

		$card_details['status'] = ACTIVE;

		$this->db->insert('cards', $card_details);

		return $this->db->insert_id();
	}


	public function update($id, $card_details) {

		return $this->db->update('cards', $card_details, "id = $id");
	}


	public function _archive() {

		return$this->db->set('status', ACTIVE)
				->where('DATEDIFF(NOW(), updated_at) >= 60')
				->update('cards');;
	}
	

	public function add_viewers($card_id, $users) {
		
		if(count($users) == 0)

			$new_member_ids = [];
		else

			$new_member_ids = array_column($this->db->select('id')->from('users')->where_in('email_address', $users)->get()->result_array(), 'id');
			
		$old_member_ids = array_column($this->db->select('user_id')->from('viewers')->where('card_id', $card_id)->get()->result_array(), 'user_id');

		foreach ($new_member_ids as $id) {
			
			if(!in_array($id, $old_member_ids)) {
				
				$this->db->insert('viewers', [
					'card_id' => $card_id,
					'user_id' => $id
				]);
			}
		}

		foreach ($old_member_ids as $id) {
			
			if(!in_array($id, $new_member_ids)) {
			
				$this->db->delete('viewers', [
					'card_id' => $card_id,
					'user_id' => $id
				]);
			}
		}
	}


	public function get_author($id) {
		$user = $this->db->get_where('users', ['id' => $id], 1)->result()[0];

		return $user->first_name . " " . $user->last_name;
	}
}