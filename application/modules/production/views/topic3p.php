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
            <hr>
            <!-- Search Year -->

            <div id="container"></div>
            <div class="row p-3">
                <div class="col-md-12">
                    <h3><u>วัตถุประสงค์</u></h3>
                    <p>เพื่อควบคุมไม่ให้ต้นทุนการผลิตสูงขึ้นอันเนื่องจาก Adjust , Rerun.</p>
                </div>
                <div class="col-md-12">
                    <h3><u>แหล่งที่มาของข้อมูล</u></h3>
                    <p>อ้างอิงข้อมูลจากระบบ ERP (Enterprise Resource Planning , AX.)</p>
                </div>
                <div class="col-md-12">
                    <h3><u>คำอธิบาย</u></h3>
                    <p>กราฟแท่งสีฟ้า คือจำนวน Production card</p>
                    <p>กราฟแท่งสีดำ คือจำนวนครั้งของการ Adjust ต่อเดือนซึ่งมีมากจะทำให้ต้นทุนสูงขึ้น</p>
                    <p>กราฟแท่งสีเขียว คือจำนวนครั้งของการ Rerun ต่อเดือนซึ่งมีมากจะทำให้ต้นทุนสูงขึ้น</p>
                </div>
                <div class="col-md-12">
                    <h3><u>สิ่งที่ต้องพึงระวัง</u></h3>
                    <p>หากมีปริมาณ Adjust , Rerun เพิ่มมากขึ้นจะทำให้ต้นทุนในการผลิตเพิ่มสูงขึ้นและอาจจะส่งผลกับคุณภาพของสินค้า</p>
                </div>
            </div>

        </div>
    </section><!-- #content end -->
</body>

</html>

<script>
    $(document).ready(function() {
        var d = new Date();
        loadGraph3(d.getFullYear());

        $('#year_search').change(function() {
            loadGraph3($(this).val(), $('#company_search').val());
        });

        $('#company_search').change(function() {
            loadGraph3($('#year_search').val(), $(this).val());
        });

        function loadGraph3(year, area) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph3",
                method: "post",
                data: {
                    year: year,
                    area: area
                },
                dataType: "json",
                success: function(res) {
                    var rerunarray = [];
                    var adjustarray = [];
                    var procardarray = [];
                    for (var i = 0; i < res.length; i++) {
                        procardarray.push(res[i].procard);
                        rerunarray.push(res[i].rerun);
                        adjustarray.push(res[i].adjust);
                    }
                    // console.log(lossarray);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }

                    Highcharts.chart('container', {

                        chart: {
                            type: 'spline'
                        },
                        title: {
                            text: 'จำนวน PRODUCTION ORDER และ ADJUST , RERUN'
                        },

                        subtitle: {
                            text: 'Source: thesolarfoundation.com'
                        },

                        yAxis: {
                            title: {
                                text: 'รายการ'
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
                                label: {
                                    connectorAllowed: false
                                },
                                dataLabels: {
                                    enabled: true,
                                    format: '<span style="font-size:10px;">{point.y:.0f} Order</span>'
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.category}</span>: <b>{point.y:,.0f}</b> รายการ.<br/>'
                        },

                        series: [{
                            name: 'Count of production order.',
                            data: procardarray
                        }, {
                            name: 'Count of adjust.',
                            data: adjustarray
                        }, {
                            name: 'Count of rerun.',
                            data: rerunarray
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