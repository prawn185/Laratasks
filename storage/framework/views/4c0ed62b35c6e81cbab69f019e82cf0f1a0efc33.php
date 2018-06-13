
<?php $__env->startSection('content'); ?>


    <section class="all-profiles">
        <div class="container">
            <h1>All Profiles</h1>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="user">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title">
                                <a href="<?php echo e(URL::to('customer', $customer->id)); ?>"><?php echo e($customer->id); ?>: <?php echo e($customer->name); ?> </a>

                                <a href="<?php echo e(URL::to('customer/edit', $customer->id)); ?>" >Edit</a>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>