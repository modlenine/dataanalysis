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
                            <?= getYearGraph9() ?>
                        </select>
                    </div>

                </div>
            </section>
            <!-- Search Year -->
            <hr>

            <div class="row">
                <div class="col-md-6 p-2">
                    <div id="container"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="containerFarrel"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="containerTe75Tek75"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="containerTe96Tek96"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="containerTwinS"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="containerTwinL"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="containerTwin75Twin58"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="containerGrinderOt"></div>
                </div>
            </div>





            <div class="row p-3">
                <div class="col-md-12">
                    <h3><u>วัตถุประสงค์</u></h3>
                    <p>เพื่อแสดงให้เห็นถึงส่วนต่างของต้นทุนที่เกิดขึ้นจริง เทียบกับ ต้นทุนที่ประมาณการไว้ (ใช้จริงกับที่ตั้งไว้) ในแต่ละเครื่องจักร</p>
                </div>
                <div class="col-md-12">
                    <h3><u>แหล่งที่มาของข้อมูล</u></h3>
                    <p>อ้างอิงข้อมูลจากระบบ ERP (Enterprise Resource Planning , AX.)</p>
                </div>
                <div class="col-md-12">
                    <h3><u>คำอธิบาย</u></h3>
                    <p>ถ้ากราฟเป็นบวก หมายถึง ปริมาณต้นทุนที่เกิดขึ้นจริงนั้นมีมากกว่าต้นทุนที่ประมาณการไว้</p>
                    <p>ถ้ากราฟเป็นลบ หมายถึง ปริมาณต้นทุนที่เกิดขึ้นจริงนั้นมีน้อยกว่าต้นทุนที่ประมาณการไว้</p>
                </div>
                <div class="col-md-12">
                    <h3><u>สิ่งที่ต้องพึงระวัง</u></h3>
                    <p>ถ้าค่า Variance เป็นบวก จะส่งผลกระทบต่อผลประกอบการในเชิงลบ เพราะทำให้ต้นทุนที่ใช้จริงมีมากกว่าต้นทุนที่ประมาณการไว้</p>
                </div>
            </div>

        </div>
    </section><!-- #content end -->
</body>

</html>

<script>
    $(document).ready(function() {
        var d = new Date();
        loadGraph9Buss(d.getFullYear());
        loadGraph9Farrel(d.getFullYear());
        loadGraph9Te75Tek75(d.getFullYear());
        loadGraph9Te96Tek96(d.getFullYear());
        loadGraph9TwinS(d.getFullYear());
        loadGraph9TwinL(d.getFullYear());
        loadGraph9Twin75Twin58(d.getFullYear());
        loadGraph9GrinderOt(d.getFullYear());

        $('#year_search').change(function() {
            loadGraph9Buss($(this).val());
            loadGraph9Farrel($(this).val());
            loadGraph9Te75Tek75($(this).val());
            loadGraph9Te96Tek96($(this).val());
            loadGraph9TwinS($(this).val());
            loadGraph9TwinL($(this).val());
            loadGraph9Twin75Twin58($(this).val());
            loadGraph9GrinderOt($(this).val());
        });

        function loadGraph9Buss(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9Buss",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceBuss = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceBuss.push(res[i].totalvarianceBuss);
                    }
                    console.log(totalvarianceBuss);
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
                            text: 'มูลค่าของ Variance By machine (BUSS)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceBuss',
                            data: totalvarianceBuss
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








        function loadGraph9Farrel(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9Farrel",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceFarrel = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceFarrel.push(res[i].totalvarianceFarrel);
                    }
                    console.log(totalvarianceFarrel);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('containerFarrel', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'มูลค่าของ Variance By machine (FARREL)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceFarrel',
                            data: totalvarianceFarrel
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





        function loadGraph9Te75Tek75(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9Te75Tek75",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceTe75Tek75 = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceTe75Tek75.push(res[i].totalvarianceTe75Tek75);
                    }
                    console.log(totalvarianceTe75Tek75);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('containerTe75Tek75', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'มูลค่าของ Variance By machine (TE75 , TEK75)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceTe75Tek75',
                            data: totalvarianceTe75Tek75
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





        function loadGraph9Te96Tek96(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9Te96Tek96",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceTe96Tek96 = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceTe96Tek96.push(res[i].totalvarianceTe96Tek96);
                    }
                    console.log(totalvarianceTe96Tek96);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('containerTe96Tek96', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'มูลค่าของ Variance By machine (TE96 , TEK96)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceTe96Tek96',
                            data: totalvarianceTe96Tek96
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





        function loadGraph9TwinS(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9TwinS",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceTwinS = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceTwinS.push(res[i].totalvarianceTwinS);
                    }
                    console.log(totalvarianceTwinS);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('containerTwinS', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'มูลค่าของ Variance By machine (TWIN-S)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceTwinS',
                            data: totalvarianceTwinS
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




        function loadGraph9TwinL(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9TwinL",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceTwinL = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceTwinL.push(res[i].totalvarianceTwinL);
                    }
                    console.log(totalvarianceTwinL);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('containerTwinL', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'มูลค่าของ Variance By machine (TWIN-L)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceTwinL',
                            data: totalvarianceTwinL
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






        function loadGraph9Twin75Twin58(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9Twin75Twin58",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceTwin75Twin58 = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceTwin75Twin58.push(res[i].totalvarianceTwin75Twin58);
                    }
                    console.log(totalvarianceTwin75Twin58);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('containerTwin75Twin58', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'มูลค่าของ Variance By machine (TWIN-58)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceTwin58',
                            data: totalvarianceTwin75Twin58
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





        function loadGraph9GrinderOt(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph9GrinderOt",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var totalvarianceGrinderOt = [];
                    for (var i = 0; i < res.length; i++) {
                        totalvarianceGrinderOt.push(res[i].totalvarianceGrinderOt);
                    }
                    console.log(totalvarianceGrinderOt);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('containerGrinderOt', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'มูลค่าของ Variance By machine (GRINDER , OT)'
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
                                    format: '<span style="font-size:9px;">{point.y:,.0f}</span>',
                                    rotation: 330,
                                },
                                pointStart: 0
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> Ton.<br/>'
                        },

                        series: [{
                            name: 'totalvarianceGrinderOt',
                            data: totalvarianceGrinderOt
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