
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Reports</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="reports-header">
                    <?php echo e(Form::open(array('action'=> array('ReportController@search'),'method'=>'post'))); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <?php echo e(Form::label('user', 'User')); ?>

                                <?php echo e(Form::select('user',  \App\User::all()->pluck('name','id'),"", ['class' => 'form-control', 'placeholder'=>'All'])); ?>

                            </div>
                            <div class="col-lg-3">
                                <?php echo e(Form::label('customer', 'Customer')); ?>

                                <?php echo e(Form::select('customer', \App\Models\Customer::all()->pluck('name','id'),"", ['class' => 'form-control',  'placeholder'=>'All'])); ?>

                            </div>

                            <div class="col-lg-3">
                                <?php echo e(Form::label('datestart', 'Start')); ?>

                                <?php echo e(Form::text('datestart', '', ['class' => 'form-control flatpickr flatpickr-input active','id'=>'datepicker','placeholder'=>'Select Date...','readonly'=>'readonly'])); ?>

                            </div>
                            <div class="col-lg-3">
                                <?php echo e(Form::label('dateend', 'End')); ?>

                                <?php echo e(Form::text('dateend', '', ['class' => 'form-control flatpickr flatpickr-input active','id'=>'datepicker','placeholder'=>'Select Date...','readonly'=>'readonly'])); ?>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-1 offset-lg-10">
                                <?php if($customer != "" && $start != "" && $end != ""): ?>
                                    <a href="<?php echo e(url('reports/invoice/'.$customer.'/'.$start.'/'.$end)); ?>"> <div class="btn btn-invoice">Invoice</div></a>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-1 float-right">
                                <?php echo e(Form::submit('Submit',['class' => 'btn btn-success float-right'])); ?>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>


        <div class="report-search-form">

            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Allocated Time:</div>
                        <div class="col-lg-3"><?php echo e($allocated_time); ?></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Total Used Time:</div>
                        <div class="col-lg-3"><?php echo e($used_time); ?></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Total Number of Tasks:</div>
                        <div class="col-lg-3"><?php echo e($total_tasks); ?></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Allocated Time:</div>
                        <div class="col-lg-3"><?php echo e($allocated_time); ?></div>
                    </div>
                </div>


            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>