

<?php $__env->startSection('content'); ?>

    <section class="view-task">
        <div class="container">
            <div class="task">
                <div class="row no-gutters">
                    <div class="col-lg-3">
                        <div class="title">
                            <h3><?php echo e($task->title); ?></h3>
                            <div class="task-buttons">
                                <h6><a href="<?php echo e(URL::to('tasks')); ?>">Task List</a></h6>
                                <h6><a href="<?php echo e(URL::to('tasks/edit', $task->id)); ?>">Edit Task</a></h6>
                                <h6><a href="">Complete Task</a></h6>
                            </div>
                            <div class="task-details">
                                <h6>Status: <?php echo e($task->status); ?></h6>
                                <h6>Due Date: <?php echo e($task->duedate); ?></h6>
                                <h6>Priority: <?php echo e($task->priority); ?></h6>
                                <h6>Assigned To: <?php echo e($task->assignedTo); ?></h6>
                                <h6>Assigned By: <?php echo e($task->assignedBy); ?></h6>
                                <h6>updated At: <?php echo e($task->updated_at); ?></h6>
                                <h6>Due At: <?php echo e($task->time); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="description"><p><?php echo e($task->description); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>