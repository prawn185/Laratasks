

<?php $__env->startSection('content'); ?>


    <section class="user-profile">
        <div class="container">
            <div class="user">
                <section class="details">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3> <?php echo e((isset($customer->id)) ? "Edit Details:" : "Create Customer"); ?></h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <?php echo e(Form::open(array('action' => array('CustomerController@createEditCustomer', $customer->id)))); ?>


                                        <?php echo e(Form::hidden('id', $customer->id)); ?>


                                        <?php echo e(Form::label('name', 'Name')); ?>

                                        <?php echo e(Form::text('name', $customer->name, ['class' => 'form-control'])); ?>


                                        <?php echo e(Form::label('email', 'Email')); ?>

                                        <?php echo e(Form::text('email', $customer->email, ['class' => 'form-control'])); ?>


                                        <?php echo e(Form::label('time_per_month', 'Time per month (Minutes)')); ?>

                                        <?php echo e(Form::number('time_per_month', $customer->time_per_month, ['class' => 'form-control'])); ?>


                                        <?php echo e(Form::label('billing_rate', 'Bliing Rate')); ?>

                                        <?php echo e(Form::number('billing_rate', $customer->billing_rate, ['class' => 'form-control'])); ?>


                                        <?php echo e(Form::label('account_manager', 'Account Manager')); ?>

                                        <?php echo e(Form::select('account_manager',\App\User::all()->pluck('name','id'), $customer->account_manager, ['class' => 'form-control'])); ?>


                                        <?php echo e(Form::label('project_manager', 'Project Manager')); ?>

                                        <?php echo e(Form::select('project_manager',\App\User::all()->pluck('name','id'), $customer->project_manager, ['class' => 'form-control'])); ?>

                                    </div>
                                    <?php echo e(Form::submit('Submit',['class' => 'btn btn-success'])); ?>

                                    <?php echo e(Form::close()); ?>


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