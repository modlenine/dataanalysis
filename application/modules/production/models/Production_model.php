<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Production_model extends CI_Model
{
    public function __construct()
    {

    }


    public function serverSln()
    {

        // DB table to use
        $table = 'v_loss_on_process';
        // $table = <<<EOT
        // (
        //     select * from listdefault
        // )temp
        // EOT;

        // Table's primary key
        $primaryKey = 'ls_autoid';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes

        $columns = array(
            array('db' => 'ls_itemnumber', 'dt' => 0),
            array('db' => 'ls_itemgroup', 'dt' => 1),
            array('db' => 'ls_production', 'dt' => 2),
            array('db' => 'ls_batchnumber', 'dt' => 3),
            array('db' => 'ls_configuration', 'dt' => 4),
            array('db' => 'ls_workcenter', 'dt' => 5,),
            array('db' => 'ls_sonumber', 'dt' => 6),
            array('db' => 'ls_order', 'dt' => 7),
            array('db' => 'ls_mis', 'dt' => 8),
            array('db' => 'ls_gr', 'dt' => 9),
            array('db' => 'ls_loss', 'dt' => 10),
            array('db' => 'ls_kpiloss', 'dt' => 11),
            array('db' => 'ls_percenloss', 'dt' => 12),
            array('db' => 'ls_result', 'dt' => 13),
            array('db' => 'ls_percenvariance', 'dt' => 14),
            array('db' => 'ls_pricevariance', 'dt' => 15),
            array('db' => 'ls_quantityvariance', 'dt' => 16),
            array('db' => 'ls_subvariance', 'dt' => 17),
            array('db' => 'ls_totalvariance', 'dt' => 18),
            array('db' => 'ls_started', 'dt' => 19),
            array('db' => 'ls_ended_date', 'dt' => 20),
            array('db' => 'ls_endday', 'dt' => 21),
            array('db' => 'ls_actleadtime', 'dt' => 22),
            array('db' => 'ls_deliveryleadtime', 'dt' => 23),
            array('db' => 'ls_data_month', 'dt' => 24),
            array('db' => 'ls_data_year', 'dt' => 25),
            array('db' => 'ls_data_areaid' , 'dt' => 26),
        );

        // SQL server connection information
        $sql_details = array(
            'user' => 'chainarong',
            'pass' => 'Admin1234',
            'db'   => 'data_analysis',
            'host' => '192.190.2.3'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
*/
        require('server-side/scripts/ssp.class.php');

        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }
    // LIST PAGE LIST PAGE LIST PAGE LIST PAGE LIST PAGE LIST PAGE




    public function delData()
    {
        if(isset($_POST['delBtn'])){
            $del_month = $this->input->post("del_month");
            $this->db->where("ls_data_month" , $del_month);
            $this->db->delete("loss_on_process");
        }
    }



    public function saveDesData()
    {
        if($this->input->post("des_topic") != ""){

            $arDesform = array(
                "des_objective" => $this->input->post("des_objective"),
                "des_datasource" => $this->input->post("des_datasource"),
                "des_detail" => $this->input->post("des_detail"),
                "des_aware" => $this->input->post("des_aware"),
                "des_topicmark" => $this->input->post("des_topicmark"),
                "des_userpost" => getUser()->Fname." ".getUser()->Lname,
                "des_ecodepost" => getUser()->ecode,
                "des_deptname" => getUser()->Dept,
                "des_deptcode" => getUser()->DeptCode,
                "des_datetime" => date("Y-m-d H:i:s"),
                "des_topic" => $this->input->post("des_topic")
            );

            if($this->db->insert("data_description" , $arDesform)){
                echo "บันทึกสำเร็จ";
            }else{
                echo "บันทึกไม่สำเร็จ";
            }
            
        }
    }



    public function saveEditDesData()
    {
        if($this->input->post("des_topic") != ""){

            $arDesform = array(
                "des_objective" => $this->input->post("des_objective"),
                "des_datasource" => $this->input->post("des_datasource"),
                "des_detail" => $this->input->post("des_detail"),
                "des_aware" => $this->input->post("des_aware"),
                "des_topicmark" => $this->input->post("des_topicmark"),
                "des_userpost" => getUser()->Fname." ".getUser()->Lname,
                "des_ecodepost" => getUser()->ecode,
                "des_deptname" => getUser()->Dept,
                "des_deptcode" => getUser()->DeptCode,
                "des_datetime" => date("Y-m-d H:i:s")
            );

            $this->db->where("des_topic" , $this->input->post("des_topic"));
            if($this->db->update("data_description" , $arDesform)){
                echo "แก้ไขสำเร็จ";
            }else{
                echo "แก้ไขไม่สำเร็จ";
            }
            
        }
    }





}
/* End of file ModelName.php */
