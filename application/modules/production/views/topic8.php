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
                    <a id="topic8Detail" href="#" data-toggle="modal" data-target="#md_topicDetail" 
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