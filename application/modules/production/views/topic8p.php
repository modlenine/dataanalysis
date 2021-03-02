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
                            <?= getYearGraph8() ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">เลือกเดือนที่ต้องการ</label>
                        <select name="month_search" id="month_search" class="form-control">
                            <?= getMonthGraph8() ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">เลือกบริษัท</label>
                        <select name="company_search" id="company_search" class="form-control">
                            <option value="">All</option>
                            <?= getCompanyGraph8() ?>
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
                    <p>เพื่อแสดงให้เห็นถึงจำนวน Production Card ที่สามารถ End Process ได้ในแต่ละวัน</p>
                </div>
                <div class="col-md-12">
                    <h3><u>แหล่งที่มาของข้อมูล</u></h3>
                    <p>อ้างอิงข้อมูลจากระบบ ERP (Enterprise Resource Planning , AX.)</p>
                </div>
                <div class="col-md-12">
                    <h3><u>คำอธิบาย</u></h3>
                    <p>กราฟเส้นสีฟ้า คือ จำนวน Production Card ที่สามารถ End Process ได้ในแต่ละวัน</p>
                </div>
                <div class="col-md-12">
                    <h3><u>ข้อสังเกตุ / สิ่งที่ต้องพึงระวัง</u></h3>
                    <p>จากกราฟจะเห็นว่าจำนวน Production Card ที่สามารถ End Process ในแต่ละวันมีค่า สูง-ต่ำ ต่างกันแสดงให้เห็นว่าขาดการบริหารจัดการที่จะเฉลี่ยปริมาณงานในแต่ละวันที่เหมาะสม</p>
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
        loadGraph8(d.getFullYear(),$('#month_search').val());

        $('#year_search').change(function() {
            loadGraph8($(this).val(),$('#month_search').val(), $('#company_search').val());
        });

        $('#month_search').change(function() {
            loadGraph8($('#year_search').val(),$(this).val(), $('#company_search').val());
        });

        $('#company_search').change(function() {
            loadGraph8($('#year_search').val(),$('#month_search').val(), $(this).val());
        });

        function loadGraph8(year,month, area) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph8",
                method: "post",
                data: {
                    year: year,
                    month: month,
                    area: area
                },
                dataType: "json",
                success: function(res) {
                    var countendpd = [];
                    var ls_ended_date = [];

                    for (var i = 0; i < res.length; i++) {
                        countendpd.push(res[i].countendpd);
                    }

                    for (var i = 0; i < res.length; i++) {
                        ls_ended_date.push(res[i].ls_ended_date);
                    }

                    // console.log(ls_ended_date);

                    // console.log(percenloss);
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
                            text: 'จำนวน Production Card ที่ End Process ในแต่ละวัน'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'รายการ'
                            }
                        },

                        xAxis: {
                            categories: ls_ended_date
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.0f}</b><br/>'
                        },

                        series: [
                            {
                            name: 'Total',
                            data: countendpd
                        }
                        ],

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