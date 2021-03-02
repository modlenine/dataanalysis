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
                            <?= getYear() ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">เลือกบริษัท</label>
                        <select name="company_search" id="company_search" class="form-control">
                            <option value="">All</option>
                            <?= getCompany() ?>
                        </select>
                    </div>
                </div>
            </section>
            <!-- Search Year -->
            <hr>

            <div id="container"></div>
            <div class="row">
                <div class="col-md-12">
                    <h3><u>วัตถุประสงค์</u></h3>
                    <p>เพื่อแสดงให้เห็นภาพรวมการผลิตของเดือนปัจจุบัน ซึ่งมีข้อมูลของการใช้ , สินค้าที่ได้ และการสูญเสีย</p>
                </div>
                <div class="col-md-12">
                    <h3><u>แหล่งที่มาของข้อมูล</u></h3>
                    <p>อ้างอิงข้อมูลจากระบบ ERP (Enterprise Resource Planning , AX.)</p>
                </div>
                <div class="col-md-12">
                    <h3><u>คำอธิบาย</u></h3>
                    <p>กราฟแท่งสีน้ำเงิน คือปริมาณการใช้วัตถุดิบ Material Issue Slip (MIS.) ของเดือนปัจจุบัน</p>
                    <p>กราฟแท่งสีเขียว คือปริมาณสินค้าดี Goods Receive (GR.) ที่ผลิตได้ของเดือนปัจจุบัน</p>
                    <p>กราฟแท่งสีแดง คือปริมาณความสุญเสีย Loss การผลิตของเดือนปัจจุบัน</p>
                </div>
                <div class="col-md-12">
                    <h3><u>สิ่งที่ต้องพึงระวัง</u></h3>
                    <p>หากมี Loss หรือความสูญเสียในการผลิตสูงขึ้น จะทำให้ต้นทุนการผลิตเพิ่มขึ้นและส่งผลกระทบต่อผลประกอบการของบริษัท</p>
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
        loadGraph1(d.getFullYear());

        $('#year_search').change(function() {
            loadGraph1($(this).val(), $('#company_search').val());
        });

        $('#company_search').change(function() {
            loadGraph1($('#year_search').val(), $(this).val());
        });

        function loadGraph1(year, area) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph1",
                method: "post",
                data: {
                    year: year,
                    area: area
                },
                dataType: "json",
                success: function(res) {
                    var misarray = [];
                    var grarray = [];
                    var lossarray = [];
                    for (var i = 0; i < res.length; i++) {
                        misarray.push(res[i].mis);
                        grarray.push(res[i].gr);
                        lossarray.push(res[i].loss);
                    }
                    console.log(lossarray);
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
                            type: 'column',
                            // height: (9 / 16 * 100) + '%' // 16:9 ratio
                        },
                        title: {
                            text: 'ประสิทธิผลการผลิตของแผนก Production (Ton)'
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
                                    enabled: true,
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 290,
                                    align: 'left',
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'MIS',
                            data: misarray
                        }, {
                            name: 'GR',
                            data: grarray
                        }, {
                            name: 'LOSS',
                            data: lossarray
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