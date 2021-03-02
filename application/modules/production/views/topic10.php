<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>



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
                            <?= getYearGraph10() ?>
                        </select>
                    </div>

                </div>
            </section>
            <!-- Search Year -->
            <hr>

            <div class="row">

                <div class="col-md-6 p-2">
                    <div id="container_21MGT51_2"></div>
                </div>


                <div class="col-md-6 p-2">
                    <div id="container_21SHJ50_1"></div>
                </div>


                <div class="col-md-6 p-2">
                    <div id="container_21SHJ71_1"></div>
                </div>


                <div class="col-md-6 p-2">
                    <div id="container_21SJW70_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_21TEK30_1"></div>
                </div>


                <div class="col-md-6 p-2">
                    <div id="container_21TEK30_2"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_21TEK40_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_21TEK45_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_21TEK51_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_21TEK58_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_22CP2500_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_22CP2500_2"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_22TEK96_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_23MX105_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_23MX105_2"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_24TEK75_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_24TEK96_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_25PM500_1"></div>
                </div>

                <div class="col-md-6 p-2">
                    <div id="container_25PM500_2"></div>
                </div>
                

                <div class="col-md-6 p-2">
                    <div id="container_21MGT35_1"></div>
                </div>
                <!-- กราฟนี้ไม่มีข้อมูลปี 2020 -->



                <div class="col-md-6 p-2">
                    <div id="container_21MGT58_1"></div>
                </div>
                <!-- กราฟนี้ไม่มีข้อมูลปี 2020 -->


            </div>




















            <hr>
            <?php
            $sql = $this->db->query("SELECT des_autoid From data_description WHERE des_topic = '$topic' ");
            if($sql->num_rows() == 0){
                $des_objective = "";
                $des_datasource = "";
                $des_detail = "";
                $des_aware = "";
                $des_topicmark = "";
            }else{
                $des_objective = getDesDetail($topic)->des_objective;
                $des_datasource = getDesDetail($topic)->des_datasource;
                $des_detail = getDesDetail($topic)->des_detail;
                $des_aware = getDesDetail($topic)->des_aware;
                $des_topicmark = getDesDetail($topic)->des_topicmark;
            }


            ?>
            <div class="row p-2">
                <div class="col-md-12">
                    <a id="topic10Detail" href="#" data-toggle="modal" data-target="#md_topicDetail" 
                    data_topicid="<?= $topic ?>"
                    data_des_objective = "<?=$des_objective?>"
                    data_des_datasource = "<?=$des_datasource?>"
                    data_des_detail = "<?=$des_detail?>"
                    data_des_aware = "<?=$des_aware?>"
                    data_des_topicmark = "<?=$des_topicmark?>"
                    
                    ><button>จัดการรายละเอียด</button></a>
                </div>
            </div>
            <hr>

            <div class="row p-3">
                <div class="col-md-6">
                    <h3><u>วัตถุประสงค์</u></h3>
                    <textarea cols="30" rows="3" class="form-control" readonly><?= $des_objective ?></textarea>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-md-6">
                    <h3><u>แหล่งที่มาของข้อมูล</u></h3>
                    <textarea cols="30" rows="3" class="form-control" readonly><?= $des_datasource ?></textarea>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-md-6">
                    <h3><u>คำอธิบาย</u></h3>
                    <textarea cols="30" rows="5" class="form-control" readonly><?= $des_detail ?></textarea>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-md-6">
                    <h3><u>สิ่งที่ต้องพึงระวัง</u></h3>
                    <textarea cols="30" rows="3" class="form-control" readonly><?= $des_aware?></textarea>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-md-6">
                    <h3><u>หมายเหตุ</u></h3>
                    <textarea cols="30" rows="3" class="form-control" readonly><?= $des_topicmark ?></textarea>
                </div>
            </div>

        </div>
    </section><!-- #content end -->
</body>

</html>

<script>
    $(document).ready(function() {
        var d = new Date();
        loadGraph10_21MGT35_1(d.getFullYear());
        loadGraph10_21MGT51_2(d.getFullYear());
        loadGraph10_21MGT58_1(d.getFullYear());
        loadGraph10_21SHJ50_1(d.getFullYear());
        loadGraph10_21SHJ71_1(d.getFullYear());
        loadGraph10_21SJW70_1(d.getFullYear());
        loadGraph10_21TEK30_1(d.getFullYear());
        loadGraph10_21TEK30_2(d.getFullYear());
        loadGraph10_21TEK40_1(d.getFullYear());
        loadGraph10_21TEK45_1(d.getFullYear());
        loadGraph10_21TEK51_1(d.getFullYear());
        loadGraph10_21TEK58_1(d.getFullYear());
        loadGraph10_22CP2500_1(d.getFullYear());
        loadGraph10_22CP2500_2(d.getFullYear());
        loadGraph10_22TEK96_1(d.getFullYear());
        loadGraph10_23MX105_1(d.getFullYear());
        loadGraph10_23MX105_2(d.getFullYear());
        loadGraph10_24TEK75_1(d.getFullYear());
        loadGraph10_24TEK96_1(d.getFullYear());
        loadGraph10_25PM500_1(d.getFullYear());
        loadGraph10_25PM500_2(d.getFullYear());


        $('#year_search').change(function() {
            loadGraph10_21MGT35_1($(this).val());
            loadGraph10_21MGT51_2($(this).val());
            loadGraph10_21MGT58_1($(this).val());
            loadGraph10_21SHJ50_1($(this).val());
            loadGraph10_21SHJ71_1($(this).val());
            loadGraph10_21SJW70_1($(this).val());
            loadGraph10_21TEK30_1($(this).val());
            loadGraph10_21TEK30_2($(this).val());
            loadGraph10_21TEK40_1($(this).val());
            loadGraph10_21TEK45_1($(this).val());
            loadGraph10_21TEK51_1($(this).val());
            loadGraph10_21TEK58_1($(this).val());
            loadGraph10_22CP2500_1($(this).val());
            loadGraph10_22CP2500_2($(this).val());
            loadGraph10_22TEK96_1($(this).val());
            loadGraph10_23MX105_1($(this).val());
            loadGraph10_23MX105_2($(this).val());
            loadGraph10_24TEK75_1($(this).val());
            loadGraph10_24TEK96_1($(this).val());
            loadGraph10_25PM500_1($(this).val());
            loadGraph10_25PM500_2($(this).val());

        });



        // 21MGT35_1
        function loadGraph10_21MGT35_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21MGT35_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021MGT35_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021MGT35_1.push(res[i].gp1021MGT35_1);
                    }
                    console.log(gp1021MGT35_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21MGT35_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21MGT35_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21MGT35_1',
                            data: gp1021MGT35_1
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
        } // 21MGT35_1


        // 21MGT51_2
        function loadGraph10_21MGT51_2(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21MGT51_2",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021MGT51_2 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021MGT51_2.push(res[i].gp1021MGT51_2);
                    }
                    console.log(gp1021MGT51_2);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21MGT51_2', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21MGT51_2)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21MGT51_2',
                            data: gp1021MGT51_2
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
        } // 21MGT51_2


        // 21MGT58_1
        function loadGraph10_21MGT58_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21MGT58_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021MGT58_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021MGT58_1.push(res[i].gp1021MGT58_1);
                    }
                    console.log(gp1021MGT58_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21MGT58_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21MGT58_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21MGT58_1',
                            data: gp1021MGT58_1
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
        } // 21MGT58_1


        // 21SHJ50_1
        function loadGraph10_21SHJ50_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21SHJ50_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021SHJ50_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021SHJ50_1.push(res[i].gp1021SHJ50_1);
                    }
                    console.log(gp1021SHJ50_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21SHJ50_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21SHJ50_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21SHJ50_1',
                            data: gp1021SHJ50_1
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
        } // 21SHJ50_1


        // 21SHJ71-1
        function loadGraph10_21SHJ71_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21SHJ71_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021SHJ71_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021SHJ71_1.push(res[i].gp1021SHJ71_1);
                    }
                    console.log(gp1021SHJ71_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21SHJ71_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21SHJ71_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21SHJ71_1',
                            data: gp1021SHJ71_1
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
        } // 21SHJ71-1


        // 21SJW70-1
        function loadGraph10_21SJW70_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21SJW70_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021SJW70_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021SJW70_1.push(res[i].gp1021SJW70_1);
                    }
                    console.log(gp1021SJW70_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21SJW70_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21SJW70_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21SJW70_1',
                            data: gp1021SJW70_1
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
        } // 21SJW70-1


        // 21TEK30_1
        function loadGraph10_21TEK30_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21TEK30_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021TEK30_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021TEK30_1.push(res[i].gp1021TEK30_1);
                    }
                    console.log(gp1021TEK30_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21TEK30_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21TEK30_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21TEK30_1',
                            data: gp1021TEK30_1
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
        } // 21TEK30_1


        // 21TEK30_2
        function loadGraph10_21TEK30_2(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21TEK30_2",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021TEK30_2 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021TEK30_2.push(res[i].gp1021TEK30_2);
                    }
                    console.log(gp1021TEK30_2);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21TEK30_2', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21TEK30_2)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21TEK30_2',
                            data: gp1021TEK30_2
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
        } // 21TEK30_2


        // 21TEK40_1
        function loadGraph10_21TEK40_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21TEK40_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021TEK40_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021TEK40_1.push(res[i].gp1021TEK40_1);
                    }
                    console.log(gp1021TEK40_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21TEK40_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21TEK40_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21TEK40_1',
                            data: gp1021TEK40_1
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
        } // 21TEK40_1


        // 21TEK45_1
        function loadGraph10_21TEK45_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21TEK45_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021TEK45_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021TEK45_1.push(res[i].gp1021TEK45_1);
                    }
                    console.log(gp1021TEK45_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21TEK45_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21TEK45_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21TEK45_1',
                            data: gp1021TEK45_1
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
        } // 21TEK45_1


        // 21TEK51_1
        function loadGraph10_21TEK51_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21TEK51_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021TEK51_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021TEK51_1.push(res[i].gp1021TEK51_1);
                    }
                    console.log(gp1021TEK51_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21TEK51_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21TEK51_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21TEK51_1',
                            data: gp1021TEK51_1
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
        } // 21TEK51_1


        // 21TEK58_1
        function loadGraph10_21TEK58_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_21TEK58_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1021TEK58_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1021TEK58_1.push(res[i].gp1021TEK58_1);
                    }
                    console.log(gp1021TEK58_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_21TEK58_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (21TEK58_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '21TEK58_1',
                            data: gp1021TEK58_1
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
        } // 21TEK58_1


        // 22CP2500_1
        function loadGraph10_22CP2500_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_22CP2500_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1022CP2500_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1022CP2500_1.push(res[i].gp1022CP2500_1);
                    }
                    console.log(gp1022CP2500_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_22CP2500_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (22CP2500_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '22CP2500_1',
                            data: gp1022CP2500_1
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
        } // 22CP2500_1


        // 22CP2500_2
        function loadGraph10_22CP2500_2(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_22CP2500_2",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1022CP2500_2 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1022CP2500_2.push(res[i].gp1022CP2500_2);
                    }
                    console.log(gp1022CP2500_2);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_22CP2500_2', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (22CP2500_2)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '22CP2500_2',
                            data: gp1022CP2500_2
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
        } // 22CP2500_2


        // 22TEK96_1
        function loadGraph10_22TEK96_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_22TEK96_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1022TEK96_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1022TEK96_1.push(res[i].gp1022TEK96_1);
                    }
                    console.log(gp1022TEK96_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_22TEK96_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (22TEK96_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '22TEK96_1',
                            data: gp1022TEK96_1
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
        } // 22TEK96_1


        // 23MX105_1
        function loadGraph10_23MX105_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_23MX105_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1023MX105_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1023MX105_1.push(res[i].gp1023MX105_1);
                    }
                    console.log(gp1023MX105_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_23MX105_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (23MX105_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '23MX105_1',
                            data: gp1023MX105_1
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
        } // 23MX105_1


        // 23MX105_2
        function loadGraph10_23MX105_2(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_23MX105_2",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1023MX105_2 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1023MX105_2.push(res[i].gp1023MX105_2);
                    }
                    console.log(gp1023MX105_2);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_23MX105_2', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (23MX105_2)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '23MX105_2',
                            data: gp1023MX105_2
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
        } // 23MX105_2


        // 24TEK75_1
        function loadGraph10_24TEK75_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_24TEK75_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1024TEK75_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1024TEK75_1.push(res[i].gp1024TEK75_1);
                    }
                    console.log(gp1024TEK75_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_24TEK75_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (24TEK75_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '24TEK75_1',
                            data: gp1024TEK75_1
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
        } // 24TEK75_1


        // 24TEK96_1
        function loadGraph10_24TEK96_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_24TEK96_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1024TEK96_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1024TEK96_1.push(res[i].gp1024TEK96_1);
                    }
                    console.log(gp1024TEK96_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_24TEK96_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (24TEK96_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '24TEK96_1',
                            data: gp1024TEK96_1
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
        } // 24TEK96_1


        // 25PM500_1
        function loadGraph10_25PM500_1(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_25PM500_1",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1025PM500_1 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1025PM500_1.push(res[i].gp1025PM500_1);
                    }
                    console.log(gp1025PM500_1);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_25PM500_1', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (25PM500_1)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '25PM500_1',
                            data: gp1025PM500_1
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
        } // 25PM500_1


        // 25PM500_2
        function loadGraph10_25PM500_2(year) {
            $.ajax({
                url: "<?php echo base_url() ?>production/getGraph10_25PM500_2",
                method: "post",
                data: {
                    year: year
                },
                dataType: "json",
                success: function(res) {
                    var gp1025PM500_2 = [];
                    for (var i = 0; i < res.length; i++) {
                        gp1025PM500_2.push(res[i].gp1025PM500_2);
                    }
                    console.log(gp1025PM500_2);
                    // for(var i=0;i<res.length;i++){
                    //     var datamis = res[i].mis;
                    //     console.log(datamis);
                    // }
                    Highcharts.setOptions({
                        lang: {
                            thousandsSep: ','
                        }
                    });

                    Highcharts.chart('container_25PM500_2', {

                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'ปริมาณการผลิต by machine (25PM500_2)'
                        },

                        subtitle: {
                            text: 'Source: ระบบ ERP : Enterprise resource planing, AX.'
                        },

                        yAxis: {
                            title: {
                                text: 'จำนวน (KG.)'
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
                            pointFormat: '<span style="font-size:10px;color:{point.color}">{point.category}</span>: <b>{point.y:,.3f}</b> KG.<br/>'
                        },

                        series: [{
                            name: '25PM500_2',
                            data: gp1025PM500_2
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
        } // 25PM500_2













    });
</script>