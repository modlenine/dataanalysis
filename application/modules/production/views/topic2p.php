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
            <!-- <section>
                <div class="row p-3">
                    <div class="col-md-3">
                        <label for="">เลือกปีที่ต้องการ</label>
                        <select name="year_search" id="year_search" class="form-control">
                            <?= getYearGraph3() ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">เลือกบริษัท</label>
                        <select name="company_search" id="company_search" class="form-control">
                            <option value="">All</option>
                            <?= getCompanyGraph3() ?>
                        </select>
                    </div>
                </div>
            </section>
            <hr> -->
            <!-- Search Year -->

            <div id="container"></div>

            <div class="row">
                <div class="col-md-12">
                    <h3><u>วัตถุประสงค์</u></h3>
                    <p>แสดงให้เห็นถึงปริมาณสินค้า ที่ไม่เป็นไปตามข้อกำหนดที่เกิดขึ้นเพื่อนำไปปรับใช้และควบคุมปริมาณ</p>
                </div>
                <div class="col-md-12">
                    <h3><u>แหล่งที่มาของข้อมูล</u></h3>
                    <p>อ้างอิงข้อมูลจากระบบ ERP (Enterprise Resource Planning , AX.) ที่อยู่ใน Inventory</p>
                </div>
                <div class="col-md-12">
                    <h3><u>คำอธิบาย</u></h3>
                    <p>กราฟแท่งสีฟ้า คือปริมาณสินค้าที่ไม่เป็นไปตามข้อกำหนดในแต่ละวันของ Salee</p>
                    <p>กราฟแท่งสีดำ คือปริมาณสินค้าที่ไม่เป็นไปตามข้อกำหนดในแต่ละวันของ Poly</p>
                    <p>กราฟแท่งสีเขียว คือปริมาณสินค้าที่ไม่เป็นไปตามข้อกำหนดในแต่ละวันของ Composite</p>
                </div>
                <div class="col-md-12">
                    <h3><u>สิ่งที่ต้องพึงระวัง</u></h3>
                    <p>หากมี Non Conform Prodect (NCP.) ในการผลิตสูงขึ้น จะทำให้ต้นทุนการผลิตเพิ่มมากขึ้นและส่งผลกระทบต่อผลประกอบการของบริษัท</p>
                </div>
            </div>

        </div>
    </section><!-- #content end -->
</body>

</html>

<script>
    $(document).ready(function() {
        loadGraph2();

        function loadGraph2() {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph2",
                method: "post",
                dataType: "json",
                success: function(res) {

                    var resultSln = res.filter((res) => {
                        return res.dataareaid == 'sln'
                    })
                    var resultPoly = res.filter((res) => {
                        return res.dataareaid == 'poly'
                    })
                    var resultCa = res.filter((res) => {
                        return res.dataareaid == 'ca'
                    })

                    // var adjustarray = [];
                    // var procardarray = [];
                    var balancearraySln = [];
                    var balancearrayPoly = [];
                    var balancearrayCa = [];
                    var dateSln = [];
                    for (var i = 0; i < resultSln.length; i++) {
                        balancearraySln.push(resultSln[i].balance);
                        dateSln.push(resultSln[i].date);
                    }
                    for (var i = 0; i < resultPoly.length; i++) {
                        balancearrayPoly.push(resultPoly[i].balance);
                    }
                    for (var i = 0; i < resultCa.length; i++) {
                        balancearrayCa.push(resultCa[i].balance);
                    }
                    console.log(dateSln);
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
                            type: 'spline'
                        },
                        title: {
                            text: 'ปริมาณ Non comform product (Unit KG.) ย้อนหลัง 1 เดือน'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX. ที่อยู่ใน Inventory (คลังสินค้า)'
                        },

                        yAxis: {
                            title: {
                                text: 'Unit KG.'
                            }
                        },

                        xAxis: {
                            categories: dateSln
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
                                dataLabels: {
                                    enabled: true,
                                    format: '<span style="font-size:10px;">{point.y:,.3f} KG.</span>'
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.category}</span>: <b>{point.y:,.0f}</b> รายการ.<br/>'
                        },

                        series: [{
                            name: 'SLN.',
                            data: balancearraySln
                        }, {
                            name: 'POLY',
                            data: balancearrayPoly
                        }, {
                            name: 'CA',
                            data: balancearrayCa
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
                }
            });
        }




    });
</script>