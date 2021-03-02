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
                    <a id="topic3Detail" href="#" data-toggle="modal" data-target="#md_topicDetail" 
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
                            data: rerunarray
                        }, {
                            name: 'Count of rerun.',
                            data: adjustarray
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