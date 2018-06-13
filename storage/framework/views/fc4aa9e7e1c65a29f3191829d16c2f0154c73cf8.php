
<?php $__env->startSection('content'); ?>

    



    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Invoice for: <?php echo e($customer->name); ?></h1>

            </div>
        </div>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="row">
                    <div class="col-10"><?php echo e($task->title); ?></div>
                    <div class="col-2"><?php echo e($task->time_used); ?></div>
                </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <div class="row">
            <div class="col-10"><h5>Total Time:</h5></div>
            <div class="col-2"><h5><?php echo e($time); ?></h5></div>
        </div>
        <div class="row">
            <div class="col-10"><h4>Total Price:</h4></div>
            <div class="col-2"><h4>£<?php echo e($cost); ?></h4></div>
        </div>
        <a href="#" onclick="window.print();"><div class="btn btn-invoice">Print</div></a>
        
    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>