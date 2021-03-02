<?php
class getfn
{
    public $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function gci()
    {
        return $this->ci;
    }
}


function getuse()
{
    $obj = new getfn();
    return $obj->gci();
}


function getmodal()
{
    return getuse()->load->view("templates/modal");
}


function conDateFromDb($date)
{
    $oridate = date_create($date);
    $condate = date_format($oridate, "d-m-Y");
    return $condate;
}


// Graph1
function getYear()
{
    $sql = getuse()->db->query("SELECT gp1_year FROM graph1 GROUP BY gp1_year ORDER BY gp1_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['gp1_year'] . "'>" . $rs['gp1_year'] . "</option>";
    }
    return $out;
}
function getCompany()
{
    $sql = getuse()->db->query("SELECT gp1_dataareaid FROM graph1 GROUP BY gp1_dataareaid ORDER BY gp1_dataareaid DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['gp1_dataareaid'] . "'>" . $rs['gp1_dataareaid'] . "</option>";
    }
    return $out;
}

function getGraph1data($year, $area)
{
    $sql = getuse()->db->query("SELECT sum(gp1_mis)as mis , sum(gp1_gr)as gr , sum(gp1_loss)as loss FROM graph1 WHERE gp1_year = '$year' and gp1_dataareaid like '$area%' group by gp1_month  ORDER BY gp1_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp1_mis = $rs['mis'];
        $gp1_gr = $rs['gr'];
        $gp1_loss = $rs['loss'];

        $outarray[] = array(
            "mis" => (float)$gp1_mis,
            "gr" => (float)$gp1_gr,
            "loss" => (float)$gp1_loss
        );
    }
    echo json_encode($outarray);
}
// Graph1




// Graph2
function getGraph2data()
{
    $sql = getuse()->db->query("SELECT 
    gp2_balance,
    gp2_years,
    gp2_months,
    gp2_days,
    gp2_dataareaid
    FROM graph2 ORDER BY gp2_autoid DESC");
    foreach ($sql->result_array() as $rs) {
        $gp2_balance = $rs['gp2_balance'];
        $gp2_years = $rs['gp2_years'];
        $gp2_months = $rs['gp2_months'];
        $gp2_days = $rs['gp2_days'];
        $gp2_dataareaid = $rs['gp2_dataareaid'];
        $gp2date = $rs['gp2_days'] . "/" . $rs['gp2_months'] . "/" . $rs['gp2_years'];

        $outarray[] = array(
            "balance" => (float)$gp2_balance,
            "years" => $gp2_years,
            "months" => $gp2_months,
            "days" => $gp2_days,
            "dataareaid" => $gp2_dataareaid,
            "date" => $gp2date
        );
    }
    echo json_encode($outarray);
}





// Graph3
function getYearGraph3()
{
    $sql = getuse()->db->query("SELECT gp3_years FROM graph3 GROUP BY gp3_years ORDER BY gp3_years DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['gp3_years'] . "'>" . $rs['gp3_years'] . "</option>";
    }
    return $out;
}
function getCompanyGraph3()
{
    $sql = getuse()->db->query("SELECT gp3_dataareaid FROM graph3 GROUP BY gp3_dataareaid ORDER BY gp3_dataareaid DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['gp3_dataareaid'] . "'>" . $rs['gp3_dataareaid'] . "</option>";
    }
    return $out;
}
function getGraph3data($year, $area)
{
    $sql = getuse()->db->query("SELECT sum(gp3_procard)as procard , sum(gp3_rerun)as rerun , sum(gp3_adjust)as adjust FROM graph3 WHERE gp3_years = '$year' and gp3_dataareaid like '$area%' GROUP BY gp3_months ORDER BY gp3_autoid ASC");
    foreach ($sql->result_array() as $rs) {
        $gp3_procard = $rs['procard'];
        $gp3_rerun = $rs['rerun'];
        $gp3_adjust = $rs['adjust'];

        $outarray[] = array(
            "procard" => (float)$gp3_procard,
            "rerun" => (float)$gp3_rerun,
            "adjust" => (float)$gp3_adjust
        );
    }
    echo json_encode($outarray);
}
// Graph3




// Graph4
function getYearGraph4()
{
    $sql = getuse()->db->query("SELECT ls_data_year FROM loss_on_process GROUP BY ls_data_year ORDER BY ls_data_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_year'] . "'>" . $rs['ls_data_year'] . "</option>";
    }
    return $out;
}
function getCompanyGraph4()
{
    $sql = getuse()->db->query("SELECT ls_data_areaid FROM loss_on_process GROUP BY ls_data_areaid ORDER BY ls_data_areaid DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_areaid'] . "'>" . $rs['ls_data_areaid'] . "</option>";
    }
    return $out;
}

function getGraph4data($year, $area)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_data_areaid like '$area%' group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp4_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvariance" => (float)$gp4_totalvariance
        );
    }
    echo json_encode($outarray);
}
// Graph4




// Graph5
function getYearGraph5()
{
    $sql = getuse()->db->query("SELECT ls_data_year FROM loss_on_process GROUP BY ls_data_year ORDER BY ls_data_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_year'] . "'>" . $rs['ls_data_year'] . "</option>";
    }
    return $out;
}
function getCompanyGraph5()
{
    $sql = getuse()->db->query("SELECT ls_data_areaid FROM loss_on_process GROUP BY ls_data_areaid ORDER BY ls_data_areaid DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_areaid'] . "'>" . $rs['ls_data_areaid'] . "</option>";
    }
    return $out;
}

function getGraph5data($year, $area)
{
    $sql = getuse()->db->query("SELECT sum(ls_loss/ls_mis)as percenloss FROM loss_on_process WHERE ls_data_year = '$year' and ls_data_areaid like '$area%' group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp5_percenloss = $rs['percenloss'];

        $outarray[] = array(
            "percenloss" => (float)$gp5_percenloss
        );
    }
    echo json_encode($outarray);
}
// Graph5




// Graph6
function getYearGraph6()
{
    $sql = getuse()->db->query("SELECT gp7_year FROM graph7 GROUP BY gp7_year ORDER BY gp7_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['gp7_year'] . "'>" . $rs['gp7_year'] . "</option>";
    }
    return $out;
}
function getCompanyGraph6()
{
    $sql = getuse()->db->query("SELECT gp7_dataareaid FROM graph7 GROUP BY gp7_dataareaid ORDER BY gp7_dataareaid DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['gp7_dataareaid'] . "'>" . $rs['gp7_dataareaid'] . "</option>";
    }
    return $out;
}

function getGraph6data($year, $area)
{
    $sql = getuse()->db->query("SELECT 
    sum(gp7_prodid)as pd,
    sum(gp7_wip)as wip
    FROM graph7
    WHERE gp7_year = '$year' and gp7_dataareaid like '$area%'
    group by gp7_month
    order by gp7_year desc , gp7_month asc");
    foreach ($sql->result_array() as $rs) {
        $gp6_pd = $rs['pd'];
        $gp6_wip = $rs['wip'];

        $outarray[] = array(
            "pd" => (float)$gp6_pd,
            "wip" => (float)$gp6_wip
        );
    }
    echo json_encode($outarray);
}
// Graph6




// Graph7
function getYearGraph7()
{
    $sql = getuse()->db->query("SELECT ls_data_year FROM loss_on_process GROUP BY ls_data_year ORDER BY ls_data_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_year'] . "'>" . $rs['ls_data_year'] . "</option>";
    }
    return $out;
}
function getCompanyGraph7()
{
    $sql = getuse()->db->query("SELECT ls_data_areaid FROM loss_on_process GROUP BY ls_data_areaid ORDER BY ls_data_areaid DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_areaid'] . "'>" . $rs['ls_data_areaid'] . "</option>";
    }
    return $out;
}

function getGraph7data($year, $area)
{
    $sql = getuse()->db->query("SELECT s1.ls_data_month, SUM( IF( s1.ls_result = 'Fail', 1, 0 ) )as fail, SUM( IF( s1.ls_result = 'Pass', 1, 0 ) )as pass , count(s1.ls_production)as pd
    FROM loss_on_process as s1
    WHERE ls_data_year = '$year' and ls_data_areaid like '$area%'
    GROUP BY s1.ls_data_month ORDER BY s1.ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp7_fail = $rs['fail'];
        $gp7_pass = $rs['pass'];
        $gp7_pd = $rs['pd'];

        $outarray[] = array(
            "fail" => (float)$gp7_fail,
            "pass" => (float)$gp7_pass,
            "pd" => (float)$gp7_pd
        );
    }
    echo json_encode($outarray);
}
// Graph7




// Graph8
function getYearGraph8()
{
    $sql = getuse()->db->query("SELECT ls_data_year FROM loss_on_process GROUP BY ls_data_year ORDER BY ls_data_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_year'] . "'>" . $rs['ls_data_year'] . "</option>";
    }
    return $out;
}
function getMonthGraph8()
{
    $monthcur = date("m");
    $monthcon = intval($monthcur)-1;
    $sql = getuse()->db->query("SELECT ls_data_month FROM loss_on_process GROUP BY ls_data_month ORDER BY ls_data_month DESC");
    $out = "";
    $out .="<option value='".$monthcon."'>".$monthcon."</option>";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_month'] . "'>" . $rs['ls_data_month'] . "</option>";
    }
    return $out;
}
function getCompanyGraph8()
{
    $sql = getuse()->db->query("SELECT ls_data_areaid FROM loss_on_process GROUP BY ls_data_areaid ORDER BY ls_data_areaid DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_areaid'] . "'>" . $rs['ls_data_areaid'] . "</option>";
    }
    return $out;
}

function getGraph8data($year, $month, $area)
{
    $sql = getuse()->db->query("SELECT
    loss_on_process.ls_data_year,
    loss_on_process.ls_data_month,
    SUBSTR(ls_ended_date,-2,2)as dataday,
    loss_on_process.ls_ended_date,
    count(SUBSTR(ls_ended_date,-2,2))as countendpd
    FROM
    loss_on_process
    WHERE ls_data_year = '$year' and ls_data_month = '$month' and ls_data_areaid like '$area%'
    group by ls_data_year , ls_data_month , ls_ended_date , dataday
    order by ls_data_month desc , dataday asc");

    foreach ($sql->result_array() as $rs) {
        $gp8_countendpd = $rs['countendpd'];
        $gp8_enddate = $rs['ls_ended_date'];

        $outarray[] = array(
            "countendpd" => (float)$gp8_countendpd,
            "ls_ended_date" => conDateFromDb($gp8_enddate)

        );
    }
    echo json_encode($outarray);
}
// Graph8




// Graph9
function getYearGraph9()
{
    $sql = getuse()->db->query("SELECT ls_data_year FROM loss_on_process GROUP BY ls_data_year ORDER BY ls_data_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['ls_data_year'] . "'>" . $rs['ls_data_year'] . "</option>";
    }
    return $out;
}

function getGraph9dataBuss($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('BUSS') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9Buss_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceBuss" => (float)$gp9Buss_totalvariance
        );
    }
    echo json_encode($outarray);
}

function getGraph9dataFarrel($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('FARREL2' , 'FARREL') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9Farrel_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceFarrel" => (float)$gp9Farrel_totalvariance
        );
    }
    echo json_encode($outarray);
}


function getGraph9dataTe75Tek75($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('TE75' , 'TEK75' , 'TWIN-75') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9Te75Tek75_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceTe75Tek75" => (float)$gp9Te75Tek75_totalvariance
        );
    }
    echo json_encode($outarray);
}


function getGraph9dataTe96Tek96($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('TE96' , 'TEK96') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9Te96Tek96_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceTe96Tek96" => (float)$gp9Te96Tek96_totalvariance
        );
    }
    echo json_encode($outarray);
}




function getGraph9dataTwinS($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('TWIN-S') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9TwinS_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceTwinS" => (float)$gp9TwinS_totalvariance
        );
    }
    echo json_encode($outarray);
}



function getGraph9dataTwinL($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('TWIN-L') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9TwinL_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceTwinL" => (float)$gp9TwinL_totalvariance
        );
    }
    echo json_encode($outarray);
}


function getGraph9dataTwin75Twin58($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('TWIN-58') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9Twin75Twin58_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceTwin75Twin58" => (float)$gp9Twin75Twin58_totalvariance
        );
    }
    echo json_encode($outarray);
}


function getGraph9dataGrinderOt($year)
{
    $sql = getuse()->db->query("SELECT sum(ls_totalvariance)as totalvariance FROM loss_on_process WHERE ls_data_year = '$year' and ls_configuration in ('GRINDER_1' , 'OT') group by ls_data_month  ORDER BY ls_data_month ASC");
    foreach ($sql->result_array() as $rs) {
        $gp9GrinderOt_totalvariance = $rs['totalvariance'];

        $outarray[] = array(
            "totalvarianceGrinderOt" => (float)$gp9GrinderOt_totalvariance
        );
    }
    echo json_encode($outarray);
}
// Graph9









// Graph10
function getYearGraph10()
{
    $sql = getuse()->db->query("SELECT gp10_year FROM graph10 GROUP BY gp10_year ORDER BY gp10_year DESC");
    $out = "";
    foreach ($sql->result_array() as $rs) {
        $out .= "<option value='" . $rs['gp10_year'] . "'>" . $rs['gp10_year'] . "</option>";
    }
    return $out;
}



function getGraph10_21MGT35_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21MGT35-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021MGT35_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_21MGT51_2($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21MGT51-2') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021MGT51_2" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_21MGT58_1($year)
{

    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21MGT58-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021MGT58_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);

}




function getGraph10_21SHJ50_1($year)
{

    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21SHJ50-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021SHJ50_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);

}




function getGraph10_21SHJ71_1($year)
{

    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21SHJ71-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021SHJ71_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);


}





function getGraph10_21SJW70_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21SJW70-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021SJW70_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}






function getGraph10_21TEK30_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21TEK30-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021TEK30_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}







function getGraph10_21TEK30_2($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21TEK30-2') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021TEK30_2" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_21TEK40_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21TEK40-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021TEK40_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}





function getGraph10_21TEK45_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21TEK45-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021TEK45_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}




function getGraph10_21TEK51_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21TEK51-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021TEK51_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_21TEK58_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('21TEK58-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1021TEK58_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_22CP2500_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('22CP2500-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1022CP2500_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_22CP2500_2($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('22CP2500-2') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1022CP2500_2" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_22TEK96_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('22TEK96-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1022TEK96_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_23MX105_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('23MX105-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1023MX105_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_23MX105_2($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('23MX105-2') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1023MX105_2" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}




function getGraph10_24TEK75_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('24TEK75-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1024TEK75_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}




function getGraph10_24TEK96_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('24TEK96-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1024TEK96_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}




function getGraph10_25PM500_1($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('25PM500-1') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1025PM500_1" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}



function getGraph10_25PM500_2($year)
{
    $sql = getuse()->db->query("SELECT gp10_operation20,
    gp10_gr , gp10_month
    from graph10 WHERE gp10_operation20 in ('25PM500-2') and gp10_year = '$year'  ORDER BY gp10_month ASC");

    $monthSql = getuse()->db->query("SELECT gp10_month from graph10 group by gp10_month");

    foreach ($monthSql->result_array() as $rss) {
        $dataByMonth = '';
        foreach ($sql->result_array() as $rs) {
            if ($rss['gp10_month'] == $rs['gp10_month']) {
                $dataByMonth = $rs['gp10_gr'];
            }
        }

        $outarray[] = array(
            "gp10_month" => $rss['gp10_month'],
            "gp1025PM500_2" => (float)$dataByMonth
        );
    }
    echo json_encode($outarray);
}
// Graph10







function cutMonth($montInput)
{
    return substr($montInput, 0, 2);
}

function cutYear($yearInput)
{
    return substr($yearInput, 3, 4);
}

function conDate($dateinput)
{
    $changeDate = str_replace("/", "-", $dateinput);
    $date = date_create($changeDate);
    return date_format($date, "Y-m-d");
}


function conPrice($priceinput)
{
    $oriprice = str_replace(",", "", $priceinput);
    return $oriprice;
}


function checkDuplicateData($pdid , $enddate , $areaid)
{
    $sql = getuse()->db->query("SELECT ls_production , ls_ended_date , ls_data_areaid FROM loss_on_process WHERE ls_production = '$pdid' and ls_ended_date = '$enddate' and ls_data_areaid = '$areaid' order by ls_autoid desc ");
    return $sql;
}

function getLastupdate()
{
    $sql = getuse()->db->query("SELECT ls_ended_date from loss_on_process order by ls_ended_date desc limit 1");
    return $sql->row()->ls_ended_date;
}


function conDateTimeFromDb($datetime)
{
    $ori = date_create($datetime);
    return date_format($ori , "d/m/Y");
}


function getDesDetail($topic)
{
    $sql = getuse()->db->query("SELECT
    data_description.des_autoid,
    data_description.des_objective,
    data_description.des_datasource,
    data_description.des_detail,
    data_description.des_aware,
    data_description.des_topicmark,
    data_description.des_userpost,
    data_description.des_ecodepost,
    data_description.des_deptname,
    data_description.des_deptcode,
    data_description.des_datetime,
    data_description.des_topic
    FROM
    data_description
    WHERE data_description.des_topic = '$topic'
    ");

    return $sql->row();
}
