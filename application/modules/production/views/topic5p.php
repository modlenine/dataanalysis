<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>


    <script src="<?=base_url('assets/')?>js/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body>
    <!-- Content
		============================================= -->
    <section id="content">
        <div class="content-wrap">

            <!-- Search Year -->
            <section>
                <div class="row p-3">
                    <div class="col-md-3">
                        <label for="">เลือกปีที่ต้องการ</label>
                        <select name="year_search" id="year_search" class="form-control">
                            <?= getYearGraph5() ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">เลือกบริษัท</label>
                        <select name="company_search" id="company_search" class="form-control">
                            <option value="">All</option>
                            <?= getCompanyGraph5() ?>
                        </select>
                    </div>
                </div>
            </section>
            <!-- Search Year -->
            <hr>

            <div id="container"></div>

            <div class="row p-3">
                <div class="col-md-12">
                    <h3><u>วัตถุประสงค์</u></h3>
                    <p>เพื่อแสดงให้เห็นถึงปริมาณการสูญเสียที่เกิดขึ้นในกระบวนการผลิตของแต่ละเดือน</p>
                </div>
                <div class="col-md-12">
                    <h3><u>แหล่งที่มาของข้อมูล</u></h3>
                    <p>อ้างอิงข้อมูลจากระบบ ERP (Enterprise Resource Planning , AX.)</p>
                </div>
                <div class="col-md-12">
                    <h3><u>คำอธิบาย</u></h3>
                    <p>กราฟแท่งสีฟ้า คือ ปริมาณ Percense LOSS ในแต่ละเดือน</p>
                </div>
                <div class="col-md-12">
                    <h3><u>สิ่งที่ต้องพึงระวัง</u></h3>
                    <p>หากมีปริมาณที่มากจะทำให้ต้นทุนในการผลิตเพิ่มมากขึ้นและส่งผลกระทบต่อผลประกอบการบริษัท</p>
                </div>
            </div>

        </div>
    </section><!-- #content end -->
</body>

</html>

<script>
    $(document).ready(function() {
        var d = new Date();
        var area = $('#company_search').val();
        loadGraph5(d.getFullYear());

        $('#year_search').change(function() {
            loadGraph5($(this).val(), $('#company_search').val());
        });

        $('#company_search').change(function() {
            loadGraph5($('#year_search').val(), $(this).val());
        });

        function loadGraph5(year, area) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph5",
                method: "post",
                data: {
                    year: year,
                    area: area
                },
                dataType: "json",
                success: function(res) {
                    var percenloss = [];
                    for (var i = 0; i < res.length; i++) {
                        percenloss.push(res[i].percenloss);
                    }
                    console.log(percenloss);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณ % LOSS'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (Ton.)'
                            }
                        },

                        xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },

                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },

                        plotOptions: {
                            series: {
                                dataLabels: {
                                    align: 'left',
                                    enabled: true,
                                    format: '<span style="font-size:9px;">{point.y:,.2f}%</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.2f}</b>%<br/>'
                        },

                        series: [{
                            name: 'Percenloss',
                            data: percenloss
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
                                        // horizontal
                                    }
                                }
                            }]
                        }

                    });
                }
            });
        }




    });
</script>