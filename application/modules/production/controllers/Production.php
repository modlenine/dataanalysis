<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Production extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("production_model" , "pd");
    }

    public function index()
    {
        $data = array(
            "title" => "Production data analysis page.",
            "topic1_image" => base_url('assets/images/graph1.jpg'),
            "topic2_image" => base_url('assets/images/graph2.jpg'),
            "topic3_image" => base_url('assets/images/graph3.jpg'),
            "topic4_image" => base_url('assets/images/graph4.jpg'),
            "topic5_image" => base_url('assets/images/graph5.jpg'),
            "topic6_image" => base_url('assets/images/graph6.jpg'),
            "topic7_image" => base_url('assets/images/graph7.jpg'),
            "topic8_image" => base_url('assets/images/graph8.jpg'),
            "topic9_image" => base_url('assets/images/graph9.jpg'),
            "topic10_image" => base_url('assets/images/graph10.jpg'),


            "topic1_fullimage" => base_url('assets/images/portfolio/full/1.jpg'),
            "topic1_fullpage" => base_url('production/topic1'),
            "topic2_fullpage" => base_url('production/topic2'),
            "topic3_fullpage" => base_url('production/topic3'),
            "topic4_fullpage" => base_url('production/topic4'),
            "topic5_fullpage" => base_url('production/topic5'),
            "topic6_fullpage" => base_url('production/topic6'),
            "topic7_fullpage" => base_url('production/topic7'),
            "topic8_fullpage" => base_url('production/topic8'),
            "topic9_fullpage" => base_url('production/topic9'),
            "topic10_fullpage" => base_url('production/topic10'),
        );

        gethead();
        getcontentdata("index", $data);
        getfooter();
    }

    public function uploadFilePage()
    {
        checkPermissionUploadfile();
        $data = array(
            "title" => "Upload data page"
        );
        gethead();
        getcontentdata("uploadFile",$data);
        getFooter();
    }


    public function topic1()
    {
        $data = array(
            "title" => "ประสิทธิผลการผลิตของแผนก Production (Ton)",
            "topic" => "topic1"

        );

        gethead();
        getcontentdata("topic1", $data);
        getfooter();
    }

    public function topic1p()
    {
        $data = array(
            "title" => "Topic1",

        );
        getcontentdata("topic1p", $data);
    }

    public function topic2()
    {
        $data = array(
            "title" => "ปริมาณ Non conform product (Unit KG.) ย้อนหลัง 1 เดือน",
            "topic" => "topic2"

        );

        gethead();
        getcontentdata("topic2", $data);
        getfooter();
    }

    public function topic2p()
    {
        $data = array(
            "title" => "Topic2",

        );
        getcontentdata("topic2p", $data);
    }

    public function topic3()
    {
        $data = array(
            "title" => "จำนวน Production order และ Adjust , Rerun",
            "topic" => "topic3"

        );

        gethead();
        getcontentdata("topic3", $data);
        getfooter();
    }

    public function topic3p()
    {
        $data = array(
            "title" => "Topic3",

        );
        getcontentdata("topic3p", $data);
    }

    public function topic4()
    {
        $data = array(
            "title" => "มูลค่าของ Variance",
            "topic" => "topic4"

        );

        gethead();
        getcontentdata("topic4", $data);
        getfooter();
    }

    public function topic4p()
    {
        $data = array(
            "title" => "Topic4",

        );
        getcontentdata("topic4p", $data);
    }


    public function topic5()
    {
        $data = array(
            "title" => "ปริมาณ % LOSS",
            "topic" => "topic5"

        );

        gethead();
        getcontentdata("topic5", $data);
        getfooter();
    }

    public function topic5p()
    {
        $data = array(
            "title" => "Topic5",

        );

        getcontentdata("topic5p", $data);
    }


    public function topic6()
    {
        $data = array(
            "title" => "จำนวน Production Card และจำนวน Work In Process",
            "topic" => "topic6"

        );

        gethead();
        getcontentdata("topic6", $data);
        getfooter();
    }



    public function topic6p()
    {
        $data = array(
            "title" => "Topic6",

        );

        getcontentdata("topic6p", $data);
    }


    public function topic7()
    {
        $data = array(
            "title" => "KPI. ควบคุมความเสียหายที่เกิดขึ้นจากการผลิต",
            "topic" => "topic7"

        );

        gethead();
        getcontentdata("topic7", $data);
        getfooter();
    }


    public function topic7p()
    {
        $data = array(
            "title" => "Topic7",

        );

        getcontentdata("topic7p", $data);
    }


    public function topic8()
    {
        $data = array(
            "title" => "จำนวน Production Card ที่ End Process ในแต่ละวัน",
            "topic" => "topic8"

        );

        gethead();
        getcontentdata("topic8", $data);
        getfooter();
    }


    public function topic8p()
    {
        $data = array(
            "title" => "Topic8",

        );

        getcontentdata("topic8p", $data);
    }


    public function topic9()
    {
        $data = array(
            "title" => "มูลค่า Variance by machine",
            "topic" => "topic9"

        );

        gethead();
        getcontentdata("topic9", $data);
        getfooter();
    }

    public function topic9p()
    {
        $data = array(
            "title" => "Topic9",

        );

        getcontentdata("topic9p", $data);
    }


    public function topic10()
    {
        $data = array(
            "title" => "ปริมาณการผลิต by machine",
            "topic" => "topic10"

        );

        gethead();
        getcontentdata("topic10", $data);
        getfooter();
    }


    public function topic10p()
    {
        $data = array(
            "title" => "Topic9",

        );

        getcontentdata("topic10p", $data);
    }

    


    public function getGraph1()
    {
        $year = "";
        $area = "";
        $year = $this->input->post("year");
        $area = $this->input->post("area");
        getGraph1data($year, $area);
    }

    public function getGraph2()
    {
        getGraph2data();
    }

    public function getGraph3()
    {
        $year = "";
        $area = "";
        $year = $this->input->post("year");
        $area = $this->input->post("area");
        getGraph3data($year, $area);
    }

    public function getGraph4()
    {
        $year = "";
        $area = "";
        $year = $this->input->post("year");
        $area = $this->input->post("area");
        getGraph4data($year, $area);
    }

    public function getGraph5()
    {
        $year = "";
        $area = "";
        $year = $this->input->post("year");
        $area = $this->input->post("area");
        getGraph5data($year, $area);
    }


    public function getGraph6()
    {
        $year = "";
        $area = "";
        $year = $this->input->post("year");
        $area = $this->input->post("area");
        getGraph6data($year, $area);
    }


    public function getGraph7()
    {
        $year = "";
        $area = "";
        $year = $this->input->post("year");
        $area = $this->input->post("area");
        getGraph7data($year, $area);
    }

    public function getGraph8()
    {
        $year = "";
        $month = "";
        $area = "";
        $year = $this->input->post("year");
        $month = $this->input->post("month");
        $area = $this->input->post("area");
        getGraph8data($year ,$month, $area);
    }

    public function getGraph9Buss()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataBuss($year);
    }

    public function getGraph9Farrel()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataFarrel($year);
    }


    public function getGraph9Te75Tek75()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataTe75Tek75($year);
    }

    public function getGraph9Te96Tek96()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataTe96Tek96($year);
    }

    public function getGraph9TwinS()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataTwinS($year);
    }

    public function getGraph9TwinL()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataTwinL($year);
    }


    public function getGraph9Twin75Twin58()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataTwin75Twin58($year);
    }


    public function getGraph9GrinderOt()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph9dataGrinderOt($year);
    }




    public function getGraph10_21MGT35_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21MGT35_1($year);
    }

    public function getGraph10_21MGT51_2()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21MGT51_2($year);
    }

    public function getGraph10_21MGT58_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21MGT58_1($year);
    }

    public function getGraph10_21SHJ50_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21SHJ50_1($year);
    }


    public function getGraph10_21SHJ71_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21SHJ71_1($year);
    }


    public function getGraph10_21SJW70_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21SJW70_1($year);
    }


    public function getGraph10_21TEK30_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21TEK30_1($year);
    }


    public function getGraph10_21TEK30_2()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21TEK30_2($year);
    }


    public function getGraph10_21TEK40_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21TEK40_1($year);
    }


    public function getGraph10_21TEK45_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21TEK45_1($year);
    }


    public function getGraph10_21TEK51_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21TEK51_1($year);
    }


    public function getGraph10_21TEK58_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_21TEK58_1($year);
    }


    public function getGraph10_22CP2500_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_22CP2500_1($year);
    }


    public function getGraph10_22CP2500_2()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_22CP2500_2($year);
    }


    public function getGraph10_22TEK96_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_22TEK96_1($year);
    }


    public function getGraph10_23MX105_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_23MX105_1($year);
    }


    public function getGraph10_23MX105_2()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_23MX105_2($year);
    }


    public function getGraph10_24TEK75_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_24TEK75_1($year);
    }


    public function getGraph10_24TEK96_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_24TEK96_1($year);
    }


    public function getGraph10_25PM500_1()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_25PM500_1($year);
    }


    public function getGraph10_25PM500_2()
    {
        $year = "";
        $year = $this->input->post("year");
        getGraph10_25PM500_2($year);
    }






    public function testarray()
    {
        getGraph2data();
    }

    public function escape_string()
    {
        return mysqli_connect("192.190.2.3", "chainarong", "Admin1234", "data_analysis");
    }


    public function uploadfile_sln()
    {
        $message = '';
        if (isset($_POST["upload"])) {
            if ($_FILES['product_file']['name']) {
                $filename = explode(".", $_FILES['product_file']['name']);
                if (end($filename) == "csv") {
                    $handle = fopen($_FILES['product_file']['tmp_name'], "r");

                    // Select ข้อมูล Master table 1 row มาเช็ค
                    
                    while ($data = fgetcsv($handle)) {

                        $arupdate = array(
                            "ls_itemnumber" => $data[0],
                            "ls_itemgroup" => $data[1],
                            "ls_production" => $data[2],
                            "ls_batchnumber" => $data[3],
                            "ls_configuration" => $data[4],
                            "ls_workcenter" => $data[5],
                            "ls_sonumber" => $data[6],
                            "ls_order" => conPrice($data[7]),
                            "ls_mis" => conPrice($data[8]),
                            "ls_gr" => conPrice($data[9]),
                            "ls_loss" => conPrice($data[10]),
                            "ls_kpiloss" => conPrice($data[11]),
                            "ls_percenloss" => conPrice($data[12]),
                            "ls_result" => $data[13],
                            "ls_percenvariance" => conPrice($data[14]),
                            "ls_pricevariance" => conPrice($data[15]),
                            "ls_quantityvariance" => conPrice($data[16]),
                            "ls_subvariance" => conPrice($data[17]),
                            "ls_totalvariance" => conPrice($data[18]),
                            "ls_started" => conDate($data[19]),
                            "ls_ended_date" => conDate($data[20]),
                            "ls_endday" => $data[21],
                            "ls_actleadtime" => $data[22],
                            "ls_deliveryleadtime" => $data[23],
                            "ls_data_month" => cutMonth($this->input->post("month_sln")),
                            "ls_data_year" => cutYear($this->input->post("month_sln")),
                            "ls_data_areaid" => "sln"
                        );



                        // check duplicate data when upload
                        $enddate = conDate($data[20]);
                        $pdid = $data[2];
                        $areaid = 'sln';


                        // echo checkDuplicateData($pdid , $enddate , $areaid)->num_rows();
                        if(checkDuplicateData($pdid , $enddate , $areaid)->num_rows() == 0){
                            if($pdid != ""){
                                $this->db->insert("loss_on_process", $arupdate);
                            }
                            continue;
                        }
                          
                        // $this->db->insert("loss_on_process", $arupdate);

                    }

                    fclose($handle);


                    header("refresh:0; url=" . base_url('uploaddata_pd.html'));
                } else {
                    $message = '<label class="text-danger">Please Select CSV File only</label>';
                }
            } else {
                $message = '<label class="text-danger">Please Select File</label>';
            }
        }
    }




    public function uploadfile_ca()
    {
        $message = '';
        if (isset($_POST["upload"])) {
            if ($_FILES['product_file']['name']) {
                $filename = explode(".", $_FILES['product_file']['name']);
                if (end($filename) == "csv") {
                    $handle = fopen($_FILES['product_file']['tmp_name'], "r");
                    while ($data = fgetcsv($handle)) {

                        $arupdate = array(
                            "ls_itemnumber" => $data[0],
                            "ls_itemgroup" => $data[1],
                            "ls_production" => $data[2],
                            "ls_batchnumber" => $data[3],
                            "ls_configuration" => $data[4],
                            "ls_workcenter" => $data[5],
                            "ls_sonumber" => $data[6],
                            "ls_order" => conPrice($data[7]),
                            "ls_mis" => conPrice($data[8]),
                            "ls_gr" => conPrice($data[9]),
                            "ls_loss" => conPrice($data[10]),
                            "ls_kpiloss" => conPrice($data[11]),
                            "ls_percenloss" => conPrice($data[12]),
                            "ls_result" => $data[13],
                            "ls_percenvariance" => conPrice($data[14]),
                            "ls_pricevariance" => conPrice($data[15]),
                            "ls_quantityvariance" => conPrice($data[16]),
                            "ls_subvariance" => conPrice($data[17]),
                            "ls_totalvariance" => conPrice($data[18]),
                            "ls_started" => conDate($data[19]),
                            "ls_ended_date" => conDate($data[20]),
                            "ls_endday" => $data[21],
                            "ls_actleadtime" => $data[22],
                            "ls_deliveryleadtime" => $data[23],
                            "ls_data_month" => cutMonth($this->input->post("month_ca")),
                            "ls_data_year" => cutYear($this->input->post("month_ca")),
                            "ls_data_areaid" => "ca"
                        );


                        // check duplicate data when upload
                        $enddate = conDate($data[20]);
                        $pdid = $data[2];
                        $areaid = 'ca';

                        // echo checkDuplicateData($pdid , $enddate , $areaid)->num_rows();
                        if(checkDuplicateData($pdid , $enddate , $areaid)->num_rows() == 0){
                            if($pdid != ""){
                                $this->db->insert("loss_on_process", $arupdate);
                            }
                            continue;
                        }

                        // $this->db->insert("loss_on_process", $arupdate);
                    }
                    fclose($handle);

                    // Select ข้อมูลจาก loss on process temp มาใส่ใน loss on process master


                    header("refresh:0; url=" . base_url('uploaddata_pd.html'));
                } else {
                    $message = '<label class="text-danger">Please Select CSV File only</label>';
                }
            } else {
                $message = '<label class="text-danger">Please Select File</label>';
            }
        }

    }



    public function uploadfile_poly()
    {
        $message = '';
        if (isset($_POST["upload"])) {
            if ($_FILES['product_file']['name']) {
                $filename = explode(".", $_FILES['product_file']['name']);
                if (end($filename) == "csv") {
                    $handle = fopen($_FILES['product_file']['tmp_name'], "r");
                    while ($data = fgetcsv($handle)) {

                        $arupdate = array(
                            "ls_itemnumber" => $data[0],
                            "ls_itemgroup" => $data[1],
                            "ls_production" => $data[2],
                            "ls_batchnumber" => $data[3],
                            "ls_configuration" => $data[4],
                            "ls_workcenter" => $data[5],
                            "ls_sonumber" => $data[6],
                            "ls_order" => conPrice($data[7]),
                            "ls_mis" => conPrice($data[8]),
                            "ls_gr" => conPrice($data[9]),
                            "ls_loss" => conPrice($data[10]),
                            "ls_kpiloss" => conPrice($data[11]),
                            "ls_percenloss" => conPrice($data[12]),
                            "ls_result" => $data[13],
                            "ls_percenvariance" => conPrice($data[14]),
                            "ls_pricevariance" => conPrice($data[15]),
                            "ls_quantityvariance" => conPrice($data[16]),
                            "ls_subvariance" => conPrice($data[17]),
                            "ls_totalvariance" => conPrice($data[18]),
                            "ls_started" => conDate($data[19]),
                            "ls_ended_date" => conDate($data[20]),
                            "ls_endday" => $data[21],
                            "ls_actleadtime" => $data[22],
                            "ls_deliveryleadtime" => $data[23],
                            "ls_data_month" => cutMonth($this->input->post("month_poly")),
                            "ls_data_year" => cutYear($this->input->post("month_poly")),
                            "ls_data_areaid" => "poly"
                        );


                        // check duplicate data when upload
                        $enddate = conDate($data[20]);
                        $pdid = $data[2];
                        $areaid = 'poly';


                        // echo checkDuplicateData($pdid , $enddate , $areaid)->num_rows();
                        if(checkDuplicateData($pdid , $enddate , $areaid)->num_rows() == 0){
                            if($pdid != ""){
                                $this->db->insert("loss_on_process", $arupdate);
                            }
                            continue;
                        }


                        // $this->db->insert("loss_on_process", $arupdate);
                    }
                    fclose($handle);

                    // Select ข้อมูลจาก loss on process temp มาใส่ใน loss on process master


                    header("refresh:0; url=" . base_url('uploaddata_pd.html'));
                } else {
                    $message = '<label class="text-danger">Please Select CSV File only</label>';
                }
            } else {
                $message = '<label class="text-danger">Please Select File</label>';
            }
        }
    }



    public function serverSln()
    {
        $this->pd->serverSln();
    }



    public function delData()
    {
        $this->pd->delData();
        header("refresh:0; url=".base_url('uploaddata_pd.html'));
    }





public function test()
{
   
}


public function saveDesData()
{
    $this->pd->saveDesData();
}


public function saveEditDesData()
{
    $this->pd->saveEditDesData();
}











}
/* End of file Controllername.php */
