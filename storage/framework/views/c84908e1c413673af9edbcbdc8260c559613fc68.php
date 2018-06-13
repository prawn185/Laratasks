
<?php $__env->startSection('content'); ?>
    <section class="view-task">
        <div class="container">
            <h4>Creating a new task</h4>
            <?php echo e(Form::open(array('action'=> array('TaskController@createTaskPost'),'method'=>'post'))); ?>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo e(Form::label('title', 'Title')); ?>

                        <?php echo e(Form::text('title', null, ['class' => 'form-control', 'required'=>'required'])); ?>

                    </div>
                    <div class="col-lg-3">
                        <?php echo e(Form::label('tag', 'Add a Tag')); ?>

                        <?php echo e(Form::select('tag',['Bug' => 'Bug','Feature' => 'Feature','Duplicate'=>'Duplicate','Question'=>'Question','None'=>'None'], "None" ,['class' => 'form-control'])); ?>

                    </div>
                    <div class="col-lg-3">
                        <?php echo e(Form::label('duedate', 'Due Date')); ?>

                        <?php echo e(Form::text('duedate', '', ['class' => 'form-control flatpickr flatpickr-input active','id'=>'datepicker','placeholder'=>'Select Due Date...','readonly'=>'readonly'])); ?>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo e(Form::label('priority', 'Priority')); ?>

                        <?php echo e(Form::select('priority',['Critical' => 'Critical','High' => 'High','Normal'=>'Normal','Low'=>'Low','None'=>'None'], "Normal" ,['class' => 'form-control'])); ?>

                    </div>
                    <div class="col-lg-3">
                        <?php echo e(Form::label('total_time ', 'Allocated Time')); ?>

                        <?php echo e(Form::number('total_time', 30, ['class' => 'form-control'])); ?>

                    </div>
                    <div class="col-lg-3">
                        <?php echo e(Form::label('assignedTo', 'Assigned To')); ?>

                        <?php echo e(Form::select('assignedTo',\App\User::all()->pluck('name','id'),$user->id,['class' => 'form-control'])); ?>

                    </div>

                    <div class="col-lg-3">
                        <?php echo e(Form::label('customer_id ', 'Customer')); ?>

                        <?php echo e(Form::select('customer_id', \App\Models\Customer::all()->pluck('name','id'),"", ['class' => 'form-control'])); ?>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('description', 'Description')); ?>

                <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'required'=>'required'])); ?>

            </div>

            <?php echo e(Form::submit('Submit',['class' => 'btn btn-success float-right'])); ?>

            <?php echo e(Form::close()); ?>

        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>