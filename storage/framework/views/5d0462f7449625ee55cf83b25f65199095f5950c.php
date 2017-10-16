<?php $__env->startSection('header'); ?>
    <!--page level css -->
    <link href="<?php echo e(asset('public/admin_assets/vendors/fullcalendar/css/fullcalendar.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('public/admin_assets/css/pages/calendar_custom.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/admin_assets/vendors/jvectormap/jquery-jvectormap.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin_assets/vendors/animate/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin_assets/css/only_dashboard.css')); ?>" />
    <!--end of page level css-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_title'); ?>
<?php echo e(trans('admin.dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-header'); ?>
<?php $__env->startSection('content'); ?>
<!-- Include single delete confirmation model -->

<!-- end include single delete confirmation model -->  

<!--/row-->

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-border">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="dashboard" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                    <?php echo e(trans('admin.license')); ?> 
                    <small><?php echo e(trans('admin.framework')); ?></small>
                </h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr class="success">
                            <td><?php echo e(trans('admin.project_name')); ?></td>
                            <td><?php echo e(trans('project.project_name')); ?></td>
                        </tr>
                        <tr class="warning">
                            <td><?php echo e(trans('admin.sowfware_category')); ?></td>
                            <td><?php echo e(trans('project.sowfware_category')); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('admin.license')); ?></td>
                            <td><?php echo e(trans('admin.license_var')); ?></td>
                        </tr>
                        <tr class="success">
                            <td><?php echo e(trans('admin.specialty')); ?></td>
                            <td><?php echo e(trans('project.specialty')); ?></td>
                        </tr>
                        <tr class="danger">
                            <td><?php echo e(trans('admin.framework')); ?></td>
                            <td><?php echo e(config('core.framework')); ?></td>
                        </tr>
                        <tr class="warning">
                            <td><?php echo e(trans('admin.version')); ?></td>
                            <td><?php echo e(config('core.version')); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('admin.date_of_issue')); ?></td>
                            <td><?php echo e(trans('project.production_date')); ?></td>
                        </tr>
                        <tr class="danger">
                            <td><?php echo e(trans('admin.copywite')); ?></td>
                            <td><?php echo e(trans('admin.copywite_var')); ?></td>
                        </tr>
                         <tr class="warning">
                            <td><?php echo e(trans('admin.last_update')); ?></td>
                            <td><?php echo e(trans('admin.last_update_var')); ?></td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </div>

        <div class="panel blue_gradiant_bg">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left" style="text-align: center; font-size: 20px;">
                                    <p style="padding-top: 7px;"><?php echo e(trans('admin.inno_thanks')); ?></p>
                                </div>
                                <div class="pull-right" style="float: right !important;">
                                    <img src="<?php echo e(asset('public/images/uistacks.png')); ?>" style="margin: 0 auto;">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-border">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="mail" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                     <?php echo e(trans('admin.new_messages')); ?>

                    
                </h3>
            </div>
            <div class="panel-body" style="min-height: 500px;">
              <div class="table-responsive">
                <?php if(isset($contacts) && $contacts->count()): ?>
                    <table class="table table-bordered">
                        <thead class="flip-content">
                            <tr>
                              <th><?php echo e(trans('admin.from')); ?></th>
                              <th><?php echo e(trans('admin.phone')); ?></th>
                              
                              <th><?php echo e(trans('admin.message_subject')); ?></th>
                              <th><?php echo e(trans('admin.receive_date')); ?></th>
                              <th><?php echo e(trans('admin.operations')); ?></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                              <td> <?php echo e(strip_tags(str_limit($contact->name, $limit = 15, $end = '...'))); ?> </td>
                              <td> <?php echo e($contact->phone); ?> </td>
                              
                              <td><?php echo e(strip_tags(str_limit($contact->subject, $limit = 15, $end = '...'))); ?> </td>
                              <td> <?php echo e($contact->created_at); ?> </td>
                              <td>
                                  <a href="<?php echo e(action('ContactsController@show', $contact->id)); ?>"><i class="fa fa-eye"></i> <?php echo e(trans('admin.message_details')); ?></a>
                                  <?php if($contact->reply_status == '0'): ?>
                                  <a href="<?php echo e(action('ContactsController@reply', $contact->id)); ?>"><i class="fa fa-reply"></i> <?php echo e(trans('admin.reply')); ?></a>
                                  <?php endif; ?>
                                  <a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="<?php echo e($contact->id); ?>" data-title="<?php echo e($contact->subject); ?>" href="#full-width"><i class="fa fa-trash-o"></i> <?php echo e(trans('admin.delete')); ?></a>
                              </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          </tbody>
                    </table>
                <?php else: ?>
                <h2 style="text-align: center;"><?php echo e(trans('admin.no_new_messages')); ?></h2>
                <?php endif; ?>
              </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <!-- begining of page level js -->
    <!--  todolist-->
    <script src="<?php echo e(asset('public/admin_assets/js/todolist.js')); ?>"></script>
    <!-- EASY PIE CHART JS -->
    <script src="<?php echo e(asset('public/admin_assets/vendors/charts/easypiechart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/charts/jquery.easypiechart.min.js')); ?>"></script>
    <!--for calendar-->
    <script src="<?php echo e(asset('public/admin_assets/vendors/fullcalendar/fullcalendar.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/fullcalendar/calendarcustom.min.js')); ?>" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="<?php echo e(asset('public/admin_assets/vendors/charts/jquery.flot.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/charts/jquery.flot.resize.min.js')); ?>" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="<?php echo e(asset('public/admin_assets/vendors/charts/jquery.sparkline.js')); ?>"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="<?php echo e(asset('public/admin_assets/vendors/countUp/countUp.js')); ?>"></script>
    <!--   maps -->
    <script src="<?php echo e(asset('public/admin_assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
     <script src="<?php echo e(asset('public/admin_assets/vendors/jscharts/Chart.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin_assets/js/dashboard.js')); ?>" type="text/javascript"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        var composeHeight = $('#calendar').height() +21 - $('.adds').height();
        $('.list_of_items').slimScroll({
            color: '#A9B6BC',
            height: composeHeight + 'px',
            size: '5px'
        });
    });
    </script>

<!--single delete item -->
<script type="text/javascript">
function confirmDelete(item) {
    var id = item.getAttribute("data-id");
    var title = item.getAttribute("data-title");

    $("#confirm-id").val(id);
    document.getElementById("confirm-title").innerHTML = title;
}
</script>
<!--end single delete item -->
<!-- end of page level js -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>