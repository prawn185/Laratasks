
<?php $__env->startSection('content'); ?>


    <section class="user-profile">
        <div class="container">
            <div class="user">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title">
                            <h1><?php echo e($user->id); ?>: <?php echo e($user->name); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Achievements</h3>
                        <div class="achievements">
                            <div class="row">

                                <?php if($created > 0): ?>
                                    <div class="col-lg-4">
                                        <img src="https://www.badgeup.io/assets/img/achievements-and-goals.svg" alt="">
                                        <p>You've created <?php echo e($created); ?> tasks!</p>
                                    </div>
                                <?php endif; ?>
                                <?php if($completed > 0): ?>
                                    <div class="col-lg-4">
                                        <img src="https://www.badgeup.io/assets/img/achievements-and-goals.svg" alt="">
                                        <p>You've completed <?php echo e($completed); ?> tasks!</p>
                                    </div>
                                <?php endif; ?>
                                <?php if($loyalty > 0): ?>
                                    <div class="col-lg-4">
                                        <img src="https://www.badgeup.io/assets/img/achievements-and-goals.svg" alt="">
                                        <p>You joined <?php echo e(number_format($loyalty, 2, '.', ',')); ?> days ago!</p>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <section class="details">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Details</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Email: <?php echo e($user->email); ?></h6>
                                    <h6>Date of Birth: <?php echo e($user->date_of_birth); ?></h6>
                                    <h6>Date Joined: <?php echo e($user->created_at); ?></h6>
                                    <h6>Team: <?php echo e($user->team); ?></h6>
                                    <h6>How many tasks: <?php echo e($assigned_to); ?></h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Working Hours: <?php echo e($user->working_hours); ?></h6>
                                    <h6>Time Left: <?php echo e($user->time_left); ?></h6>
                                    <h6>Tasks Completed: <?php echo e($completed); ?></h6>
                                    <h6>Tasks Created: <?php echo e($created); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>