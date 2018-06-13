
<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Completed Tasks</h1>
            </div>
        </div>
        <div class="row">
            <div class="task-list">
                <div class="col-lg-12">
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $time_left =  (int)$task->total_time - (int)$task->time_used;
                        ?>
                        <div class="task">
                            <div class="row no-gutters">
                                <div class="col-lg-3">
                                    <div class="title">
                                        <h3><?php echo e($task->title); ?></h3>
                                        <div class="task-buttons">
                                            <h6><a href="<?php echo e(URL::to('tasks/view', $task->id)); ?>">View Task</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="description"><p><?php echo e($task->description); ?></p></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="task-details">
                                        <h6 style="background-color:<?php echo e(priorityColors($task->priority)); ?> ">Priority: <?php echo e($task->priority); ?></h6>
                                        <h6 style="background-color:#15cc15">Status: <?php echo e($task->status); ?></h6>
                                        <h6>Assigned To: <?php echo e(app\User::find($task->assignedTo)['name']); ?></h6>
                                        <h6>Created By: <?php echo e(app\User::find($task->createdBy)['name']); ?></h6>
                                        <h6>Total Time: <?php echo e($task->total_time); ?></h6>
                                        <h6 <?php if($time_left < 0 ): ?><?php echo e("style=background-color:#d83845"); ?> <?php endif; ?> >Time Left: <?php echo e($time_left); ?></h6>
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