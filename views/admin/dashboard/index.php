<script type="text/javascript" src="public/highcharts/highcharts.js"></script>
<script type="text/javascript" src="public/highcharts//exporting.js"></script>
<!--<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>-->
<!--<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>-->
<?php
$active = 'dashboard';
require('views/admin/layout.php');
$orderStat = [];
$keys = [];
$values = [];
if (isset($data['orderStat'])) {
    $orderStat = $data['orderStat'];
    $keys = array_keys($orderStat);
    $values = array_values($orderStat);
} ?>
<style>
    #container * {
        direction: ltr;
    }
</style>
<div class="admin_left">
    <p class="admin_left-title">
        داشبورد
    </p>
    <div id="container"></div>
</div>
</div>
</main>
<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'نمودار آمار فروش در 7 روز گذشته'
        },
        subtitle: {
            text: 'فروشگاه کلیک سایت'
        },
        xAxis: {
            categories: [<?php foreach ($keys as $date) {
                echo "'$date.',";
            }?>]
        },
        yAxis: {
            title: {
                text: 'تعداد سفارش'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0
            },
            line: {
                dataLabels: {
                    enabled: false
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'تعداد فروش',
            data: [<?php foreach ($values as $value) {
                echo $value . ',';
            }?>]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>