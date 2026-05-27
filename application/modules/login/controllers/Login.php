<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model('login_model', 'login');
    }

    // ˹�� login ���١������ (SSO redirect � intranet)
    public function index()
    {
        $hostname = $_SERVER['HTTP_HOST'] ?? '';
        $scheme   = $_SERVER['REQUEST_SCHEME'] ?? 'http';

        if (strpos($hostname, 'saleecolour.net') !== false) {
            $intranet_login = 'http://ofintranet.saleecolour.net/intranet/login';
        } else {
            $intranet_login = $scheme . '://' . $hostname . '/intranet/login';
        }
        header('Location: ' . $intranet_login);
        exit();
    }

    public function logout()
    {
        $this->login->logout();
    }

}/* End of file Login.php */
