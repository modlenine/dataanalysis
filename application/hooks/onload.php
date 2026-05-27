<?php
class Onload
{
    private $ci;
    public function __construct()
    {
        $this->ci =& get_instance();
    }

    ////////////////////////////////////////////////////////////////
    /////////////// CHECK LOGIN HOOK (SSO with Intranet)
    ///////////////////////////////////////////////////////////////
    public function checklogin()
    {
        $controller = $this->ci->router->class;

        // ��Ŵ session ੾��������ѧ���١��Ŵ
        if ( ! isset($this->ci->session)) {
            $this->ci->load->library('session');
        }

        // �� session �ҡ Intranet SSO
        $ecode = $this->ci->session->userdata('ecode');

        if (empty($ecode)) {
            // �ѧ����� login - redirect � Intranet login
            if ($controller !== 'login') {
                $scheme      = $_SERVER['REQUEST_SCHEME'] ?? 'http';
                $hostname    = $_SERVER['HTTP_HOST'] ?? '';
                $current_url = $_SERVER['REQUEST_URI'];

                if (stripos($current_url, 'logout') === false &&
                    stripos($current_url, 'login') === false) {
                    $full_url     = $scheme . '://' . $hostname . $current_url;
                    $return_param = '?return_url=' . urlencode($full_url);
                } else {
                    $return_param = '';
                }

                if (strpos($hostname, 'saleecolour.net') !== false) {
                    $intranet_login = 'http://ofintranet.saleecolour.net/intranet/login' . $return_param;
                } else {
                    $intranet_login = $scheme . '://' . $hostname . '/intranet/login' . $return_param;
                }

                header('Location: ' . $intranet_login);
                exit();
            }
        } else {
            // User logged in � release session lock �ѹ�� (¡��� login controller)
            if ($controller !== 'login') {
                set_error_handler(function() { return true; });
                session_write_close();
                restore_error_handler();
            }
        }
    }

}//End onload Class
