$(document).ready(function () {

//////////////////////////////////////////////////
////////////////Control modal
/////////////////////////////////////////////////
$('#topic1Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic2Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic3Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic4Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic5Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic6Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic7Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic8Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic9Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

$('#topic10Detail').click(function(){
    let objid = $(this);
    fetchdataToModal(objid);
});

////////////////////////
/////Save Des data
//////////////////////
$('#des_btnsave').click(function(){

    if($(this).text() == "บันทึกข้อมูล"){

        if($('#des_objective').val() == ""){
            $('#alert_des_objective').fadeIn(500);
            $('#alert_des_objective').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_objective').delay(2000).fadeOut(1000);
        }else if($('#des_datasource').val() == ""){
            $('#alert_des_datasource').fadeIn(500);
            $('#alert_des_datasource').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_datasource').delay(2000).fadeOut(1000);
        }else if($('#des_detail').val() == ""){
            $('#alert_des_detail').fadeIn(500);
            $('#alert_des_detail').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_detail').delay(2000).fadeOut(1000);
        }else if($('#des_aware').val() == ""){
            $('#alert_des_aware').fadeIn(500);
            $('#alert_des_aware').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_aware').delay(2000).fadeOut(1000);
        }else{
            saveDesData();
        }

    }else{

        if($('#des_objective').val() == ""){
            $('#alert_des_objective').fadeIn(500);
            $('#alert_des_objective').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_objective').delay(2000).fadeOut(1000);
        }else if($('#des_datasource').val() == ""){
            $('#alert_des_datasource').fadeIn(500);
            $('#alert_des_datasource').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_datasource').delay(2000).fadeOut(1000);
        }else if($('#des_detail').val() == ""){
            $('#alert_des_detail').fadeIn(500);
            $('#alert_des_detail').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_detail').delay(2000).fadeOut(1000);
        }else if($('#des_aware').val() == ""){
            $('#alert_des_aware').fadeIn(500);
            $('#alert_des_aware').html('<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            $('#alert_des_aware').delay(2000).fadeOut(1000);
        }else{
            saveEditDesData();
        }

    }



    
});





});
// End control