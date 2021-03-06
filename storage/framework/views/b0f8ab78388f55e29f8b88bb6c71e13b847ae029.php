<?php $__env->startSection('content'); ?>
    <!-- page content -->
    <!-- top tiles -->
    <?php if(auth()->user()->hasRole('administrator')): ?>
        <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-users"></i> <?php echo e(__('views.admin.dashboard.count_0')); ?></span>
                <div class="count green"><?php echo e($counts['users']); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i
                            class="fa fa-address-card"></i> <?php echo e(__('views.admin.dashboard.count_1')); ?></span>
                <div>
                    <span class="count green"><?php echo e(($counts['users'] - $counts['users_unconfirmed'])*-1); ?></span>
                    <span class="count">/</span>
                    <span class="count red"><?php echo e($counts['users_unconfirmed']); ?></span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i
                            class="fa fa-user-times "></i> <?php echo e(__('views.admin.dashboard.count_2')); ?></span>
                <div>
                    <span class="count green"><?php echo e($counts['users'] - $counts['users_inactive']); ?></span>
                    <span class="count">/</span>
                    <span class="count red"><?php echo e($counts['users_inactive']); ?></span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-lock"></i> <?php echo e(__('views.admin.dashboard.count_3')); ?></span>
                <div>
                    <span class="count green"><?php echo e($counts['protected_pages']); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- /top tiles -->


    <br/>

    <?php if(auth()->user()->hasRole('administrator')): ?>
    <div class="row">
        <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div id="registration_usage" class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                        <h2><?php echo e($apartment->name); ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="" style="width:100%">
                            <tr>
                                <th></th>
                                <th>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                        <p class=""><?php echo e(__('views.admin.dashboard.sub_title_3')); ?></p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <p class=""><?php echo e(__('views.admin.dashboard.sub_title_4')); ?></p>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <canvas id="<?php echo e($apartment->id); ?>" class="canvasChart <?php echo e($apartment->id); ?>" height="140"
                                            width="140" style="margin: 15px 10px 10px 0">
                                    </canvas>
                                    <script>
                                        var registrationUsage = {
                                            _defaults: {
                                                type: 'doughnut',
                                                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                                                data: {
                                                    labels: [],
                                                    datasets: [{
                                                        data: [],
                                                        backgroundColor: [
                                                            "#3498DB",
                                                            "#3498DB",
                                                            "#9B59B6",
                                                            "#E74C3C",
                                                        ],
                                                        hoverBackgroundColor: [
                                                            "#36CAAB",
                                                            "#49A9EA",
                                                            "#B370CF",
                                                            "#E95E4F",
                                                        ]
                                                    }]
                                                },
                                                options: {
                                                    legend: false,
                                                    responsive: false
                                                }
                                            },
                                            init: function ($el) {
                                                var self = this;
                                                $el = $($el);

                                                self._defaults.data.datasets[0].data = [1, 2, 3, 4];

                                                new Chart($el.find('.canvasChart<?php echo e($apartment->id); ?>'), self._defaults);
                                            }

                                        }
                                        };
                                        registrationUsage.init($('#registration_usage'));
                                    </script>

                                </td>
                                <td>
                                    <table class="tile_info">
                                        <tr>
                                            <td>
                                                <p><i class="fa fa-square aero"></i>
                                                    <span class="tile_label">
                                                     Empty Houses
                                                </span>
                                                </p>
                                            </td>
                                            <td><?php echo e($apartment->vacant); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><i class="fa fa-square red"></i>
                                                    <span class="tile_label">
                                                    Occupied Houses
                                                </span>
                                                </p>
                                            </td>
                                            <td><?php echo e($apartment->occupied); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><i class="fa fa-square blue"></i>
                                                    <span class="tile_label">
                                                    Total Houses
                                                </span>
                                                </p>
                                            </td>
                                            <td><?php echo e($apartment->total_houses); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>






<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/dashboard.js'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>