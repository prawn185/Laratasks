
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Task List <?php echo e($user->name); ?></h1>
                <a href="<?php echo e(URL::to('tasks/create', $user->id)); ?>"><div class="btn btn-success">Create Task <i class="fa fa-plus" aria-hidden="true"></i></div></a>
                <div class="col-lg-3 float-right">
                    <?php echo e(Form::select('user', $users, '' , ['class' =>'form-control', 'id'=>'changeTaskList', 'placeholder'=>'Select a User'])); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="task-list">
                <div class="col-lg-12">
                    <?php if(count($tasks) == 0): ?>
                        <div class="alert alert-danger" role="alert">
                            You have no tasks click "<a href="<?php echo e(URL::to('tasks/create', $user->id)); ?>">Create New</a>" to start your task list!
                        </div>
                    <?php endif; ?>

                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <?php
                            $time_left =  (int)$task->total_time - (int)$task->time_used;
                        ?>
                        <div class="task">
                            <div class="row no-gutters">
                                <div class="col-lg-3">
                                    <div class="title">
                                        <?php if($task->tag !=""): ?>
                                            <div class="task-tag"><?php echo e($task->tag); ?></div>
                                        <?php endif; ?>
                                        <h3><?php echo e($task->title); ?></h3>

                                        <div class="task-buttons">
                                            <h6><a href="<?php echo e(URL::to('tasks/edit', $task->id)); ?>">Edit Task</a></h6>
                                            <h6><a href="<?php echo e(URL::to('tasks/view', $task->id)); ?>">View Task</a></h6>
                                            <h6><a href="<?php echo e(URL::to('tasks/complete', $task->id)); ?>">Complete Task</a></h6>

                                            <h6><a href="#task-id-<?php echo e($task->id); ?>" onclick="showNotes(<?php echo e($task->id); ?>)">Toggle Notes</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="description"><p><?php echo e($task->description); ?></p></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="task-details">
                                        <h6 style="background-color:<?php echo e(priorityColors($task->priority)); ?> ">Priority: <?php echo e($task->priority); ?></h6>
                                        <h6>Due Date: <?php echo e($task->duedate); ?></h6>
                                        <h6>Status: <?php echo e($task->status); ?></h6>
                                        <h6>Customer: <?php echo e(\App\Models\Customer::find($task->customer_id)['name']); ?></h6>
                                        <h6>Assigned To: <?php echo e(app\User::find($task->assignedTo)['name']); ?></h6>
                                        <h6>Created By: <?php echo e(app\User::find($task->created_by)['name']); ?></h6>
                                        <h6>Total Time: <?php echo e($task->total_time); ?></h6>
                                        <h6 <?php if($time_left < 0 ): ?><?php echo e("style=background-color:#d83845"); ?> <?php endif; ?> >Time Left: <?php echo e($time_left); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="notes-area" id="task-id-<?php echo e($task->id); ?>" >
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="notes">

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h6>Time Taken</h6>
                                                </div>
                                                <div class="col-lg-9">
                                                    <h6>Description</h6>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $task->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <?php echo e($note->time); ?>

                                                    </div>
                                                    <div class="col-lg-9">
                                                        <?php echo e($note->description); ?>

                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php echo e(Form::open(array('action'=> array('TaskController@addNote', $task->id ),'method'=>'post'))); ?>

                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('note_desc', 'Note Description')); ?>

                                                        <?php echo e(Form::textarea('note_desc', null, ['class' => 'form-control'])); ?>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('addtime', 'Add Time')); ?>

                                                        <?php echo e(Form::number('addtime', null, ['class' => 'form-control'])); ?>

                                                    </div>
                                                    <?php echo e(Form::submit('Add Note',['class' => 'btn btn-success float-right align-bottom'])); ?>

                                                    <?php echo e(Form::close()); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>