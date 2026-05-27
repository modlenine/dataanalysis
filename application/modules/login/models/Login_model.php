<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public $db2;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->db2 = $this->load->database('saleecolour', TRUE);
    }

    // SSO: �֧������ user �ҡ ecode � session
    public function getuser()
    {
        $ecode = $this->session->userdata('ecode');
        if (empty($ecode)) {
            return null;
        }
        $result = $this->db2->query(
            "SELECT * FROM member WHERE ecode = ? AND resigned = 0",
            array($ecode)
        );
        return $result->row();
    }

    // SSO logout: destroy session ���� redirect � intranet login
    public function logout()
    {
        $this->session->sess_destroy();

        $hostname = $_SERVER['HTTP_HOST'] ?? '';
        if (strpos($hostname, 'saleecolour.net') !== false) {
            $intranet_login = 'http://ofintranet.saleecolour.net/intranet/login';
        } else {
            $scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';
            $intranet_login = $scheme . '://' . $hostname . '/intranet/login';
        }

        header('Location: ' . $intranet_login);
        exit();
    }

}/* End of file Login_model.php */
