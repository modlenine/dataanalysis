<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends MX_Controller {

    public function __construct()
    {
        
    }

    public function index()
    {
        $data = array(
            "title" => "Main page for data analysis program."
        );

        gethead();
        getcontentdata("index" , $data);
        getfooter();
    }






/* End of file Controllername.php */
}
/* End of file Controllername.php */



?>