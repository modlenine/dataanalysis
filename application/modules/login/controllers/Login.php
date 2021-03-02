<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('login_model');

  }

  public function index()
  {
    if (isset($_SESSION['username']) == "") {
      $this->load->view("index");
    }else{
      header("refresh:0; url=".base_url());
    }

  }


  public function check_login(){
    $this->login_model->check_login();
  }

  public function logout(){
    $this->login_model->logout();
  }


// Update data on 16-10-2020 Get ข้อมูลรายชื่อ Another manager และ Director

// Get manager
  public function getanothermanager()
  {
    $this->login_model->getManagerUser();
  }

  // Get director

  public function getanotherdirector()
  {
    $this->login_model->getDirectorUser();
  }

  public function getanother2director()
  {
    $this->login_model->get2DirectorUser();
  }




}
