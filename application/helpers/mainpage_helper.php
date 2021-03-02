<?php
class mainpagefn{
    public $ci;

    function __construct()
    {
        $this->ci =&get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function gci()
    {
        return $this->ci;
    }
}

// Function for use fn
function mainpageuse()
{
    $obj = new mainpagefn();
    return $obj->gci();
}




// Function get head and footer
function gethead()
{
    mainpageuse()->load->view("templates/head");
}
function getfooter()
{
    mainpageuse()->load->view("templates/footer");
}
function getcontentdata($page,$data)
{
    mainpageuse()->load->library("parser");
    mainpageuse()->parser->parse($page,$data);
}



?>