
<?php $__env->startSection('content'); ?>

    <section class="all-profiles">
        <div class="container">
            <h1>All Profiles</h1>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="user">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title">
                                <a href="<?php echo e(URL::to('profile', $user->id)); ?>"><?php echo e($user->id); ?>: <?php echo e($user->name); ?> </a>
                                <?php if(Auth::user()->team == "Admin"): ?>
                                    <a href="<?php echo e(URL::to('profile/edit', $user->id)); ?>" >Edit</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>