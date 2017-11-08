
<!-- Task Modify Modal -->
<div id="taskModifyModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="task-container modal-content" style="transition:0.2s;">
            <div class="modal-body">
                <form method="post">
                    <input type="text" class="heading" name="title" placeholder="Title" maxlength="20" required>
                    <hr/>
                    <textarea rows="5" class="body lead" name="description" placeholder="Description"></textarea>
                    <div id="createTaskSetting" class="collapse">
                        <!-- <hr/> -->
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
    <div class="modal-dialog modal-lg">
        <div class="task-container modal-content" style="transition:0.2s;">
            <div class="modal-body">
                
                <form id="taskViewForm">
                    <div class="d-flex justify-content-between bd-highlight mb-3">
                        <div class="p-1 bd-highlight">
                            <div class="container-fluid">
                                <div class="container-fluid">
                                    <p></p>
                                </div>
                                <a href="#" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Assigned to" style="display:inline-block; color: inherit; font-size: 25px; padding-right: 30px; padding-bottom: 20px;">
                                    <img src="<?= 'http://localhost/main/assets/img/avatar/'.$user_id.'.png' ?>" class="fa fa-user-circle avatar" aria-hidden="true" >
                                    <div style="display:inline-block;"> <h1 id="title" class="heading"></h1></div>
                                </a>
                            </div>
                        </div>
                        <div class="p-1 bd-highlight">
                            
                        </div>
                        <div class="p-1 bd-highlight">
                            <div class="dropdown">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 15px 15px; margin: 5px;">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-link dropdwon-toggle pull-right" data-toggle="dropdown" id ="taskModalDropdown" style="padding: 15px 15px; font-size: 30px; color: inherit; text-decoration: none;">
                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="task-edit dropdown-item" href="#taskModifyModal" data-toggle="modal" data-dismiss="modal">Edit Task</a>
                                    <a href="#" class="task-mark-done dropdown-item" data-dismiss="modal">Mark as Done</a>
                                </div>        
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="laman-shiz">
                       <div class="laman-shiz1">
                         <div class="row">
                            <div class="col-md-10">
                               <ul>
                                   <li><textarea id="description" class="body lead" disabled></textarea> </li>
                               </ul>
                            </div>
                         </div>  
                       </div>
                        <hr/>
                        <div class="form-group">
                            <span class="task-note-label">Comments</span>
                        </div>
                        <div class="row task-note-create">
                           <div class="container">
                               <div class="col-md-2">
                                   <img class="img-fluid mr-auto" src="<?= 'http://localhost/main/assets/img/avatar/'.$user_id.'.png' ?>">
                               </div>
                               <div class="col-md-10">
                                   <div class="task-note-box">
                                       <textarea class="task-note" rows="2" placeholder="Add Comments"></textarea>
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
                    <div class="container">
                        <div class="row">
                            <div class="kanan-shiz">
                                <div class="kanan">
                                   <ul class="date-shiz">
                                       <li><a href="#" style="color: inherit;" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Due Date"><p id="date"><i class="fa fa-calendar" style=" font-size: 35px; padding-right: 40px;" aria-hidden="true"></i><span class="body"></span></p></a></li>
                                       <hr>
                                       <li><a href="#" style="color: inherit;" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Countdown"><p id="countdown"><i class="fa fa-clock-o" style="font-size: 35px; padding-right: 30px;" aria-hidden="true"></i><span class="body"></span></p></a></li>
                                       <hr>
                                       <li><a href="#" style="color: inherit;" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Tags"><i class="fa fa-tags" style="font-size: 35px; padding-right: 30px;" aria-hidden="true"></i><div class="task-tag-list" style="display:inline-block;"></div></a></li>
                                       <hr>
                                   </ul>
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