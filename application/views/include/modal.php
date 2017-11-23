
<!-- Task Modify Modal -->
<div id="taskModifyModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="task-container modal-content" style="transition:0.2s;">
            <div class="modal-body">
                <form method="post">
                    <input type="text" class="heading" name="title" placeholder="Title" maxlength="20" required>
                    <hr/>
                    <textarea rows="5" class="body lead" name="body" placeholder="Description"></textarea>
                    <div id="createTaskSetting" class="collapse">
                        <!-- <hr/> -->
                        <div class="form-group">
                            <label>Privacy: </label>
                            <select name="privacy" form="taskCreateForm">
                                <option value="1">Public</option>
                                <option value="2">Custom</option>
                                <option value="3">Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="task-tag-list">
                                <label style="display:inline-block;">Tags: </label>
                                <input type="text" class="task-tag" placeholder="Add Tags" style="display:inline-block;"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php foreach($colors as $color): ?>
                        <button type="button" class="btn btn-circle btn-color" style="background-color:<?= $color ?>;" data-value="<?= $color ?>">
                        <?php if($color == '#ffffff'): ?>
                            <i class="fa fa-check fa-lg"></i>
                        <?php else: ?>
                            <i></i>
                        <?php endif; ?>
                        </button>
                        <?php endforeach; ?>
                        <input type="hidden" name="color" value="#ffffff" />
                        <button type="submit" class="btn btn-link pull-right"><i class="fa fa-floppy-o fa-2x"></i></button>
                        <button type="button" id="taskClose" style="display:none;" data-dismiss="modal"></button>
                        <button type="button" class="btn btn-link pull-right" data-target="#createTaskSetting" data-toggle="collapse"><i class="fa fa-cog fa-2x"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Task View Modal -->
<div id="taskViewModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="task-container modal-content" style="transition:0.2s;">
            <div class="modal-header card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#" data-toggle="popover" data-trigger="hover" data-placement="left" id="author-name"  style="display:inline-block; color: inherit; font-size: 15px; padding-right: 30px;">
                                <img id="author-avatar" class="fa fa-user-circle avatar" aria-hidden="true" >
                            </a>      
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                           <div class="container-fuild">
                              <div class="row">
                                   <div style="display:inline-block;"> 
                                       <h1 id="title" class="pamagat"></h1>
                                   </div>  
                              </div>
                           </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="dropdown">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 10px;">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>

                                <button id="card-menu" type="button" class="btn btn-link dropdwon-toggle pull-right" data-toggle="dropdown" id ="taskModalDropdown" style=" font-size: 30px; color: inherit; text-decoration: none; margin-right: 15px;">
                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="task-edit dropdown-item" href="#taskModifyModal" data-toggle="modal" data-dismiss="modal">Edit Post</a>
                                    <a href="#" class="task-mark-done dropdown-item" data-dismiss="modal">Archive</a>
                                </div>        
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div> 
                </div> 
            </div>
            <div class="modal-body ">
                <form id="taskViewForm">
                    <div class="laman-shiz">
                        <div class="laman-shiz1">
                            <div class="card">    
                              <div class="card-body container-fluid">
                                   <div id="description" class="tile-description" disabled></div>    
                              </div>
                            </div> 
                        </div>
                        <hr>
                        <div class="form-group">
                            <span class="task-note-label">Comments</span>
                        </div>
                        <div class="row task-note-create">
                           <div class="container">
                              <div class="row">
                                  <div class="col-md-3">
                                      <img class="img-avatar" src="<?= 'http://localhost/main/assets/img/avatar/'.$user_id.'.png' ?>">
                                  </div>
                                  <div class="col-md-9">
                                      <div class="task-note-box">
                                          <textarea class="task-note" rows="2" placeholder="Add Comments"></textarea>
                                      </div>
                                  </div>    
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="row task-note-list">
                            
                        </div>
                        <input type="hidden" name="comments" />    
                    </div>
<!--                        <div class="vertical-line"></div>-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="kanan-shiz">
                                <div class="kanan">
                                   <div class="row">
                                       <div class="col-md-4"><span><i class="fa fa-tag" style="font-size: 30px; padding-right: 25px;" aria-hidden="true"></i></span></div>
                                       <div class="col-md-4">  
                                          <a href="#" style="color: inherit;" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Tags"><div class="task-tag-list" style="display:inline-block;"></div></a></div>
                                       <div class="col-md-4"></div>
                                   </div>
                                   <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Time Modal-->
<div id="timeModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <p type="text" id="taskSearch">Hello</p>
        </div>
    </div>
</div>

<!-- Task Search Modal -->
<div id="searchTaskModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="text" id="taskSearch" placeholder="Search"/>
            <ul id="taskSearchQuery" class="list-group" style="margin: 0px;">

            </ul>
        </div>
    </div>
</div>

<!-- Add Task (Search Modal) -->
<div id="addTaskModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="transition:0.2s;">
            <div class="modal-body">
                <form method="post">
                    <input type="text" class="heading" name="title" placeholder="Title" required>
                    <hr/>
                    <textarea rows="5" class="body lead" name="description" placeholder="Description" required></textarea>
                    <div id="createTaskSetting" class="collapse">
                        <hr/>
                        <div class="form-group">
                            <label>Due Date:</label>
                            <input type="date" name="due_date">
                        </div>
                        <div class="form-group">
                            <div class="task-tag-list">
                                <label style="display:inline-block;">Tags: </label>
                                <input type="text" class="task-tag" placeholder="Add Tags" style="display:inline-block;"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php foreach($colors as $color): ?>
                        <button type="button" class="btn btn-circle btn-color" style="background-color:<?= $color ?>;" data-value="<?= $color ?>">
                            <?php if($color == '#ffffff'): ?>
                            <span class="glyphicon glyphicon-ok"></span>
                            <?php else: ?>
                            <span></span>
                            <?php endif; ?>
                        </button>
                        <?php endforeach; ?>
                        <input type="hidden" name="color" value="#ffffff" />
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2"></div>
                        <div class="p-2">
                            <button type="button" id="taskSubmit" class="btn btn-default pull-right" data-dismiss="modal" style="margin: 0 1px;"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-default pull-right" data-target="#createTaskSetting" data-toggle="collapse" style="margin: 0 1px;"><span class="glyphicon glyphicon-cog"></span> Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>