switch(window.location.origin){
    case 'http://note.payakapps.com': var baseUrl = 'http://note.payakapps.com/'; break;
    case 'http://stage.payakapps.com': var baseUrl = 'http://stage.payakapps.com/'; break;
    default: var baseUrl = 'http://localhost/note/'; break;
}var userId = null;
var authorId = null;
var avatarUrl = null;


function setAuthorId(id) { authorId = id; }


function getAuthorId() { return authorId; }


function setUserId(id) { userId = id; }


function getUserId() { return userId; }


function storeTask() {

    return $(document).getCard(null, true).responseJSON;
}
// Initiate
$(function() {

$(document).getUser(getUserId(), true).done(function(data) {
    avatarUrl = data['avatar_url'];
});

});

// AJAX
$.fn.getUser = function(userId, sync = false) {

    return $.ajax({
        
        async: !sync,
        type: 'GET',
        url: `${baseUrl}api/user/${userId}`,
        dataType: 'json'
    });
}


$.fn.getCard = function(cardID = null, sync = false) {

    return $.ajax({

        async: !sync,
        type: 'GET',
        url: `${baseUrl}api/card/${getAuthorId()}` + (cardID != null ? `/${cardID}` : ''),
        dataType: 'json'
    });
};


$.fn.postCard = function(details, cardID = null) {

    return $.ajax({

        type: 'POST',
        url: `${baseUrl}api/card/${getAuthorId()}` + (cardID != null ? `/${cardID}` : ''),
        data: details,
        dataType: 'json'
    });
};


$.fn.getCardComment = function(cardID) {

    return $.ajax({

        type: 'GET',
        url: `${baseUrl}api/comment/${cardID}`,
        dataType: 'json'
    });
}


$.fn.postCardComment = function(details, cardID) {

    return $.ajax({

        type: 'POST',
        url: `${baseUrl}api/comment/${cardID}`,
        data: details,
        dataType: 'json'
    })
}


// Builder
function taskBuilder(task, modalDismiss = false) {

    var taskString = "";
    var actorsAppend = "";
    var contributorsAppend = "";
    var iconAppend = "";
    var modalDismissAppend = modalDismiss ? 'data-dismiss="modal"': '';

    var taskString = 
        `<div class="card my-1 rounded kanban-task task-view"
        data-toggle="modal" data-target="#taskViewModal" data-value="${task['id']}" data-parent="${task['column_id']}" 
        ${modalDismissAppend} 
        style="background-color:${task['color']};">

        <div class="card-body" ${contributorsAppend}
        draggable="true" ondragstart="drag(event)">
        <h5 class="card-title font-weight-bold">${iconAppend + task['title']}</h5>
        </div>

        </div>`;

    return taskString;
}


// Task
$.fn.resetForm = function() {
    
    $('#personalCreate').find('form')[0].reset();

    $('.task-container').find('.task-actor-list').siblings('input').remove();
    $('.task-container').find('.task-actor-list').find('span.badge').remove();
    $('.task-container').find('.task-tag-list').siblings('input').remove();
    $('.task-container').find('.task-tag-list').find('span.badge').remove();
    $('.task-container').find('.btn-color').find('i').removeClass('fa fa-check fa-lg');
    $('.task-container').find(`button[data-value="#ffffff"] i`).addClass('fa fa-check fa-lg');
    $('.task-container').css('background-color', '#ffffff');
    $('.task-tile').find('.card').css('background-color', '#ffffff', 'height: auto;');
    $('.task-container .card').css('background-color', '#ffffff');
};


$.fn.displayViewer = function(items, edit = false) {

    $.each(items, function(i, item) {

        if(edit) {

            $('.task-actor-list').find('.task-actor').before(
                `<span class="badge badge-default">${item['first_name'] + ' ' + item['last_name']} <a class="task-actor-remove" data-value="${item['email_address']}">&times;</a></span>`
            );

            $('.task-actor-list').parent().append(
                `<input type="hidden" name="viewers[]" value="${item['email_address']}" />`
            );
        } else

            $('.task-actor-list').append(
                `<span class="badge badge-default">${item['first_name'] + ' ' + item['last_name']}</span>`
            );
    });
};
    

$.fn.displayTag = function(items, edit = false) {

    $.each(items, function(i, item) {

        if(edit) {
                
            $('.task-tag-list').find('.task-tag').before(
                `<span class="badge badge-default">${item['name']} <a class="task-tag-remove" data-value="${item['name']}">&times;</a></span>`
            );
            $('.task-tag-list').parent().append(
                `<input type="hidden" name="tags[]" value="${item['name']}" />`
            );
        } else

            $('.task-tag-list').append(
                `<span class="badge badge-default">${item['name']}</span>`
            );
    });
};


$.fn.displayComment = function(items) {

    $.each(items, function(i, item){
        $(document).getUser(item['author'], true).always(function(data) {
            $('.task-note-list').append(
                `<div class="col-md-2 task-note-list-item">
                    <img class="img-avatar-sm" src="${data['avatar_url']}" 
                    data-toggle="popover" data-trigger="hover" data-html="true" data-placement="left" data-content="${item['created_at']}">
                    </div>
                </div>
                <div class="col-md-10 card card-sm task-note-text task-note-list-item rounded border border-secondary bg-white">
                    <a href="#">${data['first_name'] + ' ' + data['last_name']}</a>${' ' + item['body']}
                </div>`
            );
        });
    });
}


$.fn.displayCard = function(items, column = 3) {
    
    var $containers = [];
    var status = [1, 4, 2];

    $containers.push($('#taskTileList'));
    column = 3;

    colNumber = 12/column;

    $.each($containers, function(i, $container) {
        $container.html('');
        
        $.each(items, function(j, item) {
            
            var viewersAppend = "<strong>Contributor</strong><br/>";

            if(item['viewers'].length) {

                $.each(item['viewers'], function (i, viewer) {
                    viewersAppend = viewersAppend + viewer['first_name'] + " " + viewer['last_name'] + "<br/>";
                });
            } else {
                
                viewersAppend = "No Contributor";
            }

            var contributorAppend = `data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="${viewersAppend}"`;

            if(status[i] == item['status']) {

                $container.prepend(
                    `<div data-order="${j}"> 
                         
                            <div class="card task-tile task-view" data-toggle="modal" data-target="#taskViewModal" data-value="${item['id']}" style="background-color:${item['color']};">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        ${item['title']}
                                    </h4>
                                </div>
                                <div class="card-body" >
                                    <p>${item['body']}</p>
                                </div>
                            </div>
                        
                    </div>`
                );
            }
        });

        if($container.is('#todoPanel>.panel-content')) {

            $container.append(
                `<div class="col-md-${colNumber}">
                
                    <div class="task-tile task-create w3-card-2 w3-hover-shadow" data-target="#taskModifyModal" data-toggle="modal">
                        <div class="container"><span class="tile-title"><i class="fa fa-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;Add Task</span></div>
                    </div>
                
                </div>`
            );
        }
    });
};


$.fn.searchCard = function(items, keyword) {

    $('#taskSearchList').html('');
    
    if(keyword != '') {

        $.each(items, function(i, item) {

            if(item['title'].toLowerCase().indexOf(keyword.toLowerCase()) != -1) {

                $('#taskSearchList').append(taskBuilder(item, true));
            }
        });
    }
    
//    $('#taskSearchQuery').html('');
//
//    if(keyword != ''){
//        $.each(items, function(i, item) {
//
//            if(item['title'].toLowerCase().indexOf(keyword.toLowerCase()) != -1)
//
//                $('#taskSearchQuery').append(
//                    `<li class="list-group-item task-search-item" data-dismiss="modal" style="background-color:${item['color']};">
//                        <div class="container-fluid">
//                            <div class="row">
//                                <div class="col-md-1"><a class="task-mark-done" data-value="${item['id']}"><span class="glyphicon glyphicon-` + (item['status'] == 1 ? `unchecked` : `check`) + `"></span></a></div>
//                                <div class="col-md-10" data-target="#taskViewModal" data-toggle="modal" data-value="${item['id']}">${item['title']}</div>
//                                <div class="col-md-1"><a class="task-edit" href="#taskModifyModal" data-toggle="modal" data-value="${item['id']}"><span class="glyphicon glyphicon-edit"></span></a></div>
//                            </div>
//                        </div>
//                    </li>`
//                );
//        });
//    }
};

// Kanban
$.fn.highlightTask = function(userId) {
    
    userId = userId == null ? getUserId() : userId;

    $(document).getUserTeamTask(userId).done(function (data) {

        $.each(data, function(i, item) {
            $(`#kanbanBoard .task-tile[data-value="${item['id']}"]`).toggleClass('active');
        })
    }).always(function () {

        $('#kanbanBoard').toggleClass('highlight');
    });
};