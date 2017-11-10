<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cards extends CI_Controller {


	# Create card
	public function post($author_id, $card_id = null) {
	
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$due_date = date('Y-m-d', strtotime($this->input->post('due_date')));

			if($due_date == date('Y-m-d', strtotime('1970-01-01')))

				$due_date = date('Y-m-d');

			$card_details	= [
				'title'		  => $this->input->post('title'),
				'body'		  => $this->input->post('body'),
				'color'		  => $this->input->post('color'),
				'privacy'	  => $this->input->post('privacy'),
				'user_id'	  => $author_id
			];

			if($card_id != null) {
				
				$this->card_model->update($card_id, $card_details);
				
				if($this->input->post('tags[]') != null)

					$this->card_tag_model->update($card_id, $this->input->post('tags[]'));
				else

					$this->card_tag_model->update($card_id, []);


				if($this->input->post('viewers[]') != null)

					$this->card_model->add_viewers($card_id, $this->input->post('viewers[]'));
				else

					$this->card_model->add_viewers($card_id, []);
			} else {

				$card_id = $this->card_model->insert($card_details);
				
				if($this->input->post('tags[]') != null)

					$this->card_tag_model->insert($card_id, $this->input->post('tags[]'));
					

				if($this->input->post('viewers[]') != null)
				
					$this->card_model->add_viewers($card_id, $this->input->post('viewers[]'));
			}
		}
	}


	# Fetch card
	public function get($author_id, $card_id = null) {
		
		if($card_id != null){

			echo json_encode($this->card_model->get($card_id));

		} else {
			
			echo json_encode($this->card_model->get_all($author_id));
		}
	}


	# comments
	public function post_comments($card_id) {
		
		$comment_details 	= [
			'card_id'	 	  => $card_id,
			'body'		 	  => $this->input->post('comments'),
			'author'	 	  => $this->session->user->id
		];

		$this->card_model->add_comments($card_id, $comment_details);
	}

	
	public function get_comments($card_id) {
		
		echo json_encode($this->card_model->get_comments($card_id));
	}


	# viewers for Team card
	public function assign_viewers($card_id) {
		
		$members = $this->input->post('viewers[]');
		$this->card_model->add_viewers($card_id, $members);
	}


	# Mark as Done
	public function mark_as_done($card_id) {
		$this->card_model->update($card_id, ['status' => ARCHIVE]);
	}
}