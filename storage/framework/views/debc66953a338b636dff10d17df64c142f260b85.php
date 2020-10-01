
<?php $__env->startSection('title'); ?><?php echo e(awtTrans('الرسومات البيانيه')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $users = DB::table('users')
                    ->select(DB::raw('month(created_at) as month'), DB::raw('count(id) as total'))
                    ->whereBetween('created_at', [ \Carbon\Carbon::now()->copy()->startOfYear(), \Carbon\Carbon::now()->copy()->endOfYear()])
                    ->groupBy('month')
                    ->orderBy('month')
                    ->pluck('total', 'month')
                    ->all();
        $countArray=  '';
        for ($i=1; $i <= 12 ; $i++) {
            if(isset($users[$i])){
                $countArray .= $users[$i].',';
                }else{
                 $countArray .= '0,';
                }
        }
    ?>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.reload'); ?> <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="gx-card">
        <div class="gx-card-header">
            <h3 class="card-heading">
                <?php echo e(awtTrans('رسم بياني للاعضاء')); ?>

            </h3>
        </div>
        <div class="gx-card-body">
            <div class="col-md-12 col-12 order-md-1">
                <div class="canvas-chart">
                    <canvas id="myChart" height="140"></canvas>
                </div>
            </div>
        </div>
        <div class="gx-card"></div>
    </div>
            <?php $__env->startSection('script'); ?>
                <script src="<?php echo e(url('/public/design/admin/node_modules/chart.js/dist/Chart.bundle.min.js')); ?>"></script>
                <script>
                    (function ($) {
                        "use strict";
                        var ctx = document.getElementById('myChart').getContext("2d");
                        var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
                        gradientStroke.addColorStop(0, '#E91E63');
                        gradientStroke.addColorStop(1, '#3F51B5');
                        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
                        gradientFill.addColorStop(0, "rgba(63, 81, 181, 0.6)");
                        gradientFill.addColorStop(1, "rgba(233, 30, 99, 0.5)");
                        var myChart = new Chart(ctx, {
                            responsive: true,
                            type: 'line',

                            data: {
                                labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
                                datasets: [{
                                    label: "Data",
                                    borderColor: gradientStroke,
                                    pointBorderColor: gradientStroke,
                                    pointBackgroundColor: gradientStroke,
                                    pointHoverBackgroundColor: gradientStroke,
                                    pointHoverBorderColor: gradientStroke,
                                    pointBorderWidth: 5,
                                    pointHoverRadius: 5,
                                    pointHoverBorderWidth: 1,
                                    pointRadius: 3,
                                    fill: true,
                                    backgroundColor: gradientFill,
                                    borderWidth: 2,
                                    data: '<?php echo e($countArray); ?>'.split(',')
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            fontColor: "rgba(0,0,0,0.9)",
                                            fontStyle: "bold",
                                            beginAtZero: false,
                                            maxTicksLimit: 50,
                                            padding: 1
                                        },
                                        gridLines: {
                                            drawTicks: false,
                                            display: false
                                        }

                                    }],
                                    xAxes: [{
                                        gridLines: {
                                            zeroLineColor: "transparent"
                                        },
                                        ticks: {
                                            padding: 20,
                                            fontColor: "rgba(0,0,0,0.9)",
                                            fontStyle: "bold"
                                        }
                                    }]
                                }
                            }
                        });
                    })(jQuery);
                </script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/charts/index.blade.php ENDPATH**/ ?>