<div class="container-fluid">
    <!-- <div class="create-bulletin"> -->
        <div id="personalCreate" class="task-container w3-card-2 w3-hover-shadow">

            <form id="taskCreateForm" method="post">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <input type="text" data-target="#createCollapse" data-toggle="collapse" class="input-tag" name="title" placeholder="Enter event here" maxlength="25">
                    </div>
                    <div id="createCollapse" class="collapse">
                        <div class="card-body">
                    
                            <textarea id="addTask" rows="2" class="body lead" name="body" placeholder="Description"></textarea>

                            <div id="dateTaskSettings" class="collapse">    
                                <hr>
                                <div class="py-2 px-0">
                                    <label>Privacy: </label>
                                    <select name="privacy" form="taskCreateForm">
                                        <option value="1">Public</option>
                                        <option value="2">Custom</option>
                                        <option value="3">Private</option>
                                    </select>
        
                                    <div class="task-tag-list">
                                        <label class="d-inline">Tags: </label>
                                        <input type="text" class="task-tag d-inline" placeholder="Add Tags"/>
                                    </div>
                                </div>
                            </div>

                            <div class="py-1 px-0">
                                <?php foreach($colors as $color): ?>
                                <button type="button" class="btn btn-circle btn-color" style="background-color:<?= $color ?>;" data-value="<?= $color ?>">
                                    <?php if($color == '#ffffff'): ?>
                                    <i class="fa fa-check"></i>
                                    <?php else: ?>
                                    <i></i>
                                    <?php endif; ?>
                                </button>
                                <?php endforeach; ?>
                                <input type="hidden" name="color" value="#ffffff"/>
                                <button type="submit" form="taskCreateForm" id="taskSubmit" class="btn custom-button float-right" data-toggle="collapse" data-target="#createCollapse">
                                    <i class="fa fa-floppy-o fa-lg"></i> Save
                                </button>
                                <button type="button" class="btn transparent-button float-right" data-target="#dateTaskSettings" data-toggle="collapse">
                                    <i class="fa fa-cog fa-lg"></i> More
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- <input type="text" data-target="#createCollapse" data-toggle="collapse" class="input-tag" name="title" placeholder="What's your plan, <?= $user_name ?>?"> -->
                
                <!-- <hr class="mt-0"> -->
                

            </form>

        <!-- </div> -->
    </div>


    <div class="task-tag-board">
        <div id="taskTileList" class="card-columns">
            
        </div>
    </div>

</div>


