<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



</head>

<body>
    <!-- Head Template for use all page ###############
##################################################
################################################## -->
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Dashboard
                    <div class="page-title-subheading">หน้าแสดง กราฟ สรุปผลต่างๆ
                    </div>
                </div>
            </div>
            <div class="page-title-actions">


            </div>
        </div>
    </div>
    <!-- Head Template for use all page ###############
##################################################
################################################## -->
    <div class="container-fulid bg-white p-3">

        <div class="row">
            <div class="col-md-12">
            <div id="mainchart"></div>
            </div>
        </div>




    </div>
</body>


<script>
    var chart = Highcharts.chart('mainchart', {

        title: {
            text: 'Chart.update'
        },

        subtitle: {
            text: 'Plain'
        },

        xAxis: {
            categories: [
                <?php
                foreach (getdata_byjobcount()->result_array() as $rss) {
                    echo "['" .$rss['jb_status'] . "'],";
                }
                ?>
                // 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'

            ]
        },
        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            var linkchart = '<?php echo base_url('index.php/jobsta/loadjobbystatus/'); ?>';
                            location.href = linkchart+this.category;
                        }
                    }
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.category}</span>: <b>{point.y:,.0f}</b> รายการ<br/>'
        },

        series: [{
            name: 'status',
            type: 'column',
            colorByPoint: true,
            data:

                [
                    <?php
                    foreach (getdata_byjobcount()->result_array() as $rss) {
                        echo $rss['job'] . ",";
                    }
                    ?>
                    // 29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4

                ],

            showInLegend: false
        }]

    });
</script>

</html>