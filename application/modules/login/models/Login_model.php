<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->db2 = $this->load->database('saleecolour', TRUE);
    date_default_timezone_set("Asia/Bangkok");
  }

  public function escape_string()
  {
    return mysqli_connect("192.190.2.3", "chainarong", "Admin1234", "saleecolour");
  }


  public function db2()
  {
    return $this->db2;
  }


  public function check_login()
  {

    $this->load->library('user_agent');
    $user = mysqli_real_escape_string($this->escape_string(), $_POST['username']);
    $pass = mysqli_real_escape_string($this->escape_string(), md5($_POST['password']));
    // If System go on Please add md5 to element name password 'md5'


    $checkuser = $this->db2->query(sprintf("SELECT * FROM member WHERE username = '%s' and password = '%s'  ", $user, $pass));

    $checkdata = $checkuser->num_rows();

    if ($checkdata == 0) {
      echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" style="font-size:15px;text-align: center;">ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง</div>');
      redirect('login');
      die();
    } else {


      foreach ($checkuser->result_array() as $r) {
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['Fname'] = $r['Fname'];
        $_SESSION['Lname'] = $r['Lname'];
        $_SESSION['Dept'] = $r['Dept'];
        $_SESSION['ecode'] = $r['ecode'];
        $_SESSION['DeptCode'] = $r['DeptCode'];
        $_SESSION['memberemail'] = $r['memberemail'];
        $_SESSION['file_img'] = $r['file_img'];

        // insert login log

        session_write_close();
      }
      $uri =isset($_SESSION['RedirectKe']) ? $_SESSION['RedirectKe']: '/intsys/data_analysis/';
      header('location:'.$uri);
      // header("refresh:0; url=" . base_url());
    }
  }



  public function call_login()
  { //*****Check Session******//
    if (isset($_SESSION['username']) == "") {
      $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
      header("refresh:0; url=" . base_url('login'));
      die();
    }
  }


  public function logout()
  {
    session_destroy();
    $this->session->unset_userdata('referrer_url');
    header("refresh:0; url=" . base_url('login'));
  }

  public function getuser()
  {
    $sessionUsername = $_SESSION['username'];
    if ($sessionUsername != "") {
      $result = $this->db2->query("SELECT * FROM member WHERE username = '$sessionUsername' ");
      return $result->row();
    }else{
      header("refresh:0; url=" . base_url('login'));
      die();
    }
  }




  public function getManagerUser()
  {
    $sql = $this->db2->query("SELECT * FROM member WHERE mid IN (14,20,28,29,30,47,88,151) ORDER BY Fname asc");
    $output = '<section id="forpaygroup102type1"><label><b>กรุณาเลือก ผู้จัดการท่านที่สอง</b></label>';
    $output .= '<div class="row">';
    foreach($sql->result() as $rs){
      $output .= '
                    <div class="col-md-6">
                        <input type="radio" id="anotherMgr" name="anotherMgr" class="" value="'.$rs->ecode.'" required>
                        <label class="">'.$rs->Fname." ".$rs->Lname.'</label>
                    </div>
                  ';
    }
    $output .= '</div></section>';
    echo $output;
  }


  public function getDirectorUser()
  {
    $sql = $this->db2->query("SELECT * FROM member WHERE mid IN (21,20,82,229) ORDER BY Fname asc");
    $output = '<section id="forpaygroup102type2"><label><b>กรุณาเลือก รองกรรมการผู้จัดการ</b></label>';
    $output .= '<div class="row">';
    foreach($sql->result() as $rs){
      $output .= '
                    <div class="col-md-6">
                        <input type="radio" id="anotherDirector" name="anotherDirector" class="" value="'.$rs->ecode.'" required>
                        <label class="">'.$rs->Fname." ".$rs->Lname.'</label>
                    </div>
                  ';
    }
    $output .= '</div></section>';
    echo $output;
  }


  public function get2DirectorUser()
  {
    $sql = $this->db2->query("SELECT * FROM member WHERE mid IN (21,20,82,229) ORDER BY Fname asc");
    $output = '<section id="forpaygroup104"><label><b>กรุณาเลือก รองกรรมการผู้จัดการ</b></label>';
    $output .= '<div class="row">';
    foreach($sql->result() as $rs){
      $output .= '
                    <div class="col-md-6">
                        <input type="radio" id="another2Director" name="another2Director" class="" value="'.$rs->ecode.'" required>
                        <label class="">'.$rs->Fname." ".$rs->Lname.'</label>
                    </div>
                  ';
    }
    $output .= '</div></section>';
    echo $output;
  }



}
// End model
