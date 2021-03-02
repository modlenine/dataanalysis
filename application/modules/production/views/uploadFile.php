<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>

    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/components/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/components/timepicker.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/components/daterangepicker.css" type="text/css" />

    <!-- DataTable -->
    <link href="<?= base_url() ?>asset/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>asset/js/datatables/jquery-3.5.1.js"></script>
    <script src="<?= base_url() ?>asset/js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>asset/js/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- DataTable -->
    <script>
        $(document).ready(function() {
            $('#upload_data thead th').each(function() {
                var title = $(this).text();
                $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
            });

            var table = $('#upload_data').DataTable({
                "scrollX": true,
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo base_url('production/serverSln'); ?>",
                order: [
                    [24, 'desc']
                ],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }],
                //  dom: 'Bfrtip',
                // "buttons": [
                //     {
                //         extend: 'copyHtml5',
                //         title: 'Report OT Online By Department on '
                //     },
                //     {
                //         extend: 'excelHtml5',
                //         autoFilter: true,
                //         title: 'Report OT Online By Department on '
                //     }
                // ]
            });


            table.columns().every(function() {
                var table = this;
                $('input', this.header()).on('keyup change', function() {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });
        });
    </script>


</head>

<body>
    <!-- Content
		============================================= -->
    <section id="content" style="text-align:center;">
        <div class="">

            <section id="">
                <div class="container">

                    <section class="mt-3">
                        <div class="container">
                            <h3>Upload CSV file</h3>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="upload_company" id="upload_company" class="form-control">
                                        <option value="">กรุณาเลือกบริษัท</option>
                                        <option value="sln">sln</option>
                                        <option value="ca">ca</option>
                                        <option value="poly">poly</option>
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </section>
                    <hr>


                    <section id="upload_sln" style="display:none;">
                        <div class="container">
                            <form action="<?= base_url('production/uploadfile_sln') ?>" method="POST" enctype="multipart/form-data">

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="">Salee</label>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="file" name="product_file" id="product_file" value="" class="form-control" accept=".xlsx , .xls , .csv" required>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label for="">กรุณาเลือกเดือนของข้อมูล</label>
                                        <input type="text" name="month_sln" id="month_sln" value="" class="form-control text-left component-datepicker mnth" placeholder="MM-YYYY">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" name="upload" class="btn btn-success" value="Upload">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </section>





                    <section id="upload_ca" style="display:none;">
                        <div class="container">
                            <form action="<?= base_url('production/uploadfile_ca') ?>" method="POST" enctype="multipart/form-data">

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="">Composite</label>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="file" name="product_file" id="product_file" value="" class="form-control" accept=".xlsx , .xls , .csv" required>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label for="">กรุณาเลือกเดือนของข้อมูล</label>
                                        <input type="text" name="month_ca" id="month_ca" value="" class="form-control text-left component-datepicker mnth" placeholder="MM-YYYY">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" name="upload" class="btn btn-success" value="Upload">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </section>




                    <section id="upload_poly" style="display:none;">
                        <div class="container">
                            <form action="<?= base_url('production/uploadfile_poly') ?>" method="POST" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="">Poly</label>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="file" name="product_file" id="product_file" value="" class="form-control" accept=".xlsx , .xls , .csv" required>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label for="">กรุณาเลือกเดือนของข้อมูล</label>
                                        <input type="text" name="month_poly" id="month_poly" value="" class="form-control text-left component-datepicker mnth" placeholder="MM-YYYY">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" name="upload" class="btn btn-success" value="Upload">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                            </form>
                            <hr>
                        </div>
                    </section>

                </div>
            </section>



        </div>
    </section><!-- #content end -->




    <section id="">
        <div class="row" style="width:99%;margin:0 auto;">
            <div class="col-md-12 bg-white p-3">
                <h2 style="text-align:center;">ข้อมูล</h2>
                <hr style="background-color:#3399FF;padding:1px;">

                <div class="table-responsive">
                    <br>
                    <table id="upload_data" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Item number</th>
                                <th>Item group</th>
                                <th>Production</th>
                                <th>Batch number</th>
                                <th>Configuration</th>
                                <th>Work center</th>
                                <th>S/O No.</th>
                                <th>Order</th>
                                <th>MIS.</th>
                                <th>GR.</th>
                                <th>LOSS</th>
                                <th>KPI % loss</th>
                                <th>%</th>
                                <th>Result</th>
                                <th>% Variance</th>
                                <th>Price variance</th>
                                <th>Quantity variance</th>
                                <th>Substitution variance</th>
                                <th>Total variance</th>
                                <th>Started</th>
                                <th>Ended date</th>
                                <th>End days</th>
                                <th>Act. lead time</th>
                                <th>Delivery lead time</th>
                                <th>Data Month</th>
                                <th>Data Year</th>
                                <th>Data areaid</th>
                            </tr>
                        </thead>
                    </table>


                </div>
                <div class="row mt-1">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align:right;"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delData">Delete</button></div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>




<script>
    $(document).ready(function() {



        // Control การเลือกบริษัท
        $('#upload_company').change(function() {
            if ($(this).val() == "sln") {
                $('#upload_sln').css('display', '');
            } else {
                $('#upload_sln').css('display', 'none');
            }

            if ($(this).val() == "ca") {
                $('#upload_ca').css('display', '');
            } else {
                $('#upload_ca').css('display', 'none');
            }

            if ($(this).val() == "poly") {
                $('#upload_poly').css('display', '');
            } else {
                $('#upload_poly').css('display', 'none');
            }
        });

        $('.component-datepicker.mnth').datepicker({
            autoclose: true,
            minViewMode: 1,
            format: "mm/yyyy"
        });


        $('#delBtn').prop('disabled' , true);
        $('#del_month').change(function(){
            if($(this).val() != ""){
                $('#delBtn').prop('disabled' , false);
            }else{
                $('#delBtn').prop('disabled' , true);
            }
        });







    });
</script>