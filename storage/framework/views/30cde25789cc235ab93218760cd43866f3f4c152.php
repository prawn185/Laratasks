
<?php $__env->startSection('content'); ?>

    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Dashboard</h1>


        <section class="kpi">
            <div class="row">
                <div class="col-lg-4">

                    <b>Current Workflow</b>

                    <?php echo e($total_time); ?> Minutes
                </div>
                <div class="col-lg-4" <?php if($high_tasks > 0): ?>style="background-color: #e86161;border-radius: 5px;"<?php endif; ?>>
                    You have
                    <?php echo e($high_tasks); ?>

                    High/Critical tasks
                </div>
                <div class="col-lg-4">


                </div>
            </div>





        </section>



    </main>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>