
<!-- Task Modify Modal -->
<div id="taskModifyModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="task-container modal-content" style="transition:0.2s;">
            <form method="post">
                <div class="card">
                    <div class="card-header">
                        <input type="text" class="h3 font-weight-bold border-0 h-100 w-100" name="title" placeholder="Title" maxlength="20" required>
                    </div>
                    <div class="card-body">
                        <textarea rows="5" class="body lead card-text" name="body" placeholder="Description"></textarea>
                        <div id="createTaskSetting" class="collapse py-2 px-0">
                            <hr> 
                            <div class="form-group">
                                <label>Privacy: </label>
                                <select name="privacy">
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
                        <div class="py-1 px-0"> 
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
                            <button type="submit" class="btn custom-button float-right">
                                <i class="fa fa-floppy-o"></i> Save
                            </button>
                            <button type="button"  class="btn transparent-button float-right" data-target="#createTaskSetting" data-toggle="collapse">
                                <i class="fa fa-cog"></i> More
                            </button>
                            <button type="button" id="taskClose" style="display:none;" data-dismiss="modal"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Task View Modal -->
<div id="taskViewModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="task-container modal-content" style="transition:0.2s;">
            <div class="card">
                <div class="card-header">
                    <h4 id="title" class="tile-title float-left"></h4>   
                    <div class="dropdown d-inline pl-2 show">
                        <a href="#" id="card-menu" class="dropdwon-toggle" data-toggle="dropdown" id ="taskModalDropdown">
                            <i class="fa fa-angle-down fa-lg" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="task-edit dropdown-item" href="#taskModifyModal" data-toggle="modal" data-dismiss="modal">Edit Post</a>
                            <a href="#" class="task-mark-done dropdown-item" data-dismiss="modal">Archive</a>
                        </div>        
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>        
                </div>
                <div class="card-body ">
                    <form id="taskViewForm">
                        <div id="description" class="tile-description card-title" disabled></div>   
                        <hr>
                        <p class="card-title">Tags: <span class="task-tag-list card-text" style="display:inline-block;"></span></p>
                    </form>
                </div>
                <div class="card-footer">
                    <small class="float-left">Created By: <span id="card-author"></span></small>
                    <small class="float-right text-right"><span id="timestamp"></span></small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Task Search Modal -->
<div id="searchTaskModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="card">
                <h2 class="card-header p-0">
                    <input type="search" id="taskSearch" class="form-control text-center m-0 font-weight-bold" placeholder="Search"/>
                </h2>
                <div class="card-body">
                    <div id="taskSearchList" class="card-columns"></div>
                </div>
            </div>
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