<?php
class loginfn{
    private $ci;
    function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->ci =&get_instance();
    }

    function loginci()
    {
        return $this->ci;
    }
}


function lfn()
{
    $obj = new loginfn();
    return $obj->loginci();
}

function checkVerifyUser($ecode)
{
    $sql = lfn()->db->query("SELECT * FROM kb_user WHERE user_ecode = '$ecode' ");
    if($sql->num_rows() == 0){
        return false;
    }else{
        return true;
    }
}


function getUser()
{
    lfn()->load->model("login/login_model" , "login");
    return lfn()->login->getuser();
}


function linkImg($img)
{
    if ($img != "") {
        $linkimg = $img;
    } else {
        $linkimg = "default.jpg";
    }
    $link = "http://intranet.saleecolour.com/intsys/usermanagement/uploads/$linkimg";
    return $link;
}

function checkPermissionUploadfile()
{
    $respermission = 0;
    switch(getUser()->ecode){
        case "M1413"://ต่าย
            $respermission = 1;
            break;
        case "M0506"://พี่แบงค์
            $respermission = 1;
            break;
        case "M1809":
            $respermission = 1;
            break;
        default:
        $respermission = 0;

    }
    if($respermission == 0){
        echo "<script>";
        echo "alert('ขออภัย คุณไม่สามารถเข้าใช้งานหน้า อัพโหลดข้อมูลเข้าสู่ระบบได้ กรุณาติดต่อ ไอที')";
        echo "</script>";
        header("refresh:0; url=".base_url());
        exit;
        
    }
}






?>