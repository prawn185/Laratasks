
<?php $__env->startSection('content'); ?>
    <section class="view-task">
        <div class="container">
            <h4>Editing Task:- <?php echo e($task->title); ?></h4>
            <?php echo e(Form::open(array('action'=> array('TaskController@editTask', $task->id ),'method'=>'post'))); ?>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo e(Form::label('title', 'Title')); ?>

                        <?php echo e(Form::text('title', $task->title, ['class' => 'form-control'])); ?>

                    </div>
                    <div class="col-lg-3">
                        <?php echo e(Form::label('tag', 'Add a Tag')); ?>

                        <?php echo e(Form::select('tag',['Bug' => 'Bug','Feature' => 'Feature','Duplicate'=>'Duplicate','Question'=>'Question','None'=>'None'], $task->tag ,['class' => 'form-control'])); ?>

                    </div>
                    <div class="col-lg-3">
                        <?php echo e(Form::label('duedate', 'Due Date')); ?>

                        <?php echo e(Form::text('duedate', $task->duedate, ['class' => 'form-control flatpickr flatpickr-input active','id'=>'datepicker','placeholder'=>'Select Due Date...','readonly'=>'readonly'])); ?>

                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo e(Form::label('priority', 'Priority')); ?>

                        <?php echo e(Form::select('priority', ['Critical' => 'Critical','High' => 'High','Normal'=>'Normal','Low'=>'Low','None'=>'None'],$task->priority ,['class' => 'form-control'])); ?>

                    </div>
                    <div class="col-lg-3">
                        <?php echo e(Form::label('assignedTo', 'Assigned To')); ?>

                        <?php echo e(Form::select('assignedTo', \App\User::all()->pluck('name','id') ,$task->assignedTo ,['class' => 'form-control'])); ?>


                    </div>

                    <div class="col-lg-3">
                        <?php echo e(Form::label('total_time ', 'Time Allocated')); ?>

                        <?php echo e(Form::number('total_time', $task->total_time, ['class' => 'form-control'])); ?>

                    </div>

                </div>
            </div>

            <div class="form-group">
                <?php echo e(Form::label('desc', 'Description')); ?>

                <?php echo e(Form::textarea('desc', $task->description, ['class' => 'form-control'])); ?>

            </div>

            <?php echo e(Form::submit('Submit',['class' => 'btn btn-success float-right'])); ?>

            <?php echo e(Form::close()); ?>

        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>