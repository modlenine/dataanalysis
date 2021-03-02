

/////////////////////////////////////////////
///////////////Control modal detail
////////////////////////////////////////////
function saveDesData()
{
    $.ajax({
        url:"/intsys/data_analysis/production/saveDesData",
        method:"POST",
        data:$('#topicDetail').serialize(),
        beforSend :function(){

        },
        success :function(res){
            console.log(res);
            location.reload();
        }
    });
}


function saveEditDesData()
{
    $.ajax({
        url:"/intsys/data_analysis/production/saveEditDesData",
        method:"POST",
        data:$('#topicDetail').serialize(),
        beforSend :function(){

        },
        success :function(res){
            console.log(res);
            location.reload();
        }
    });
}


function fetchdataToModal(objid)
{
    let data_topicid = objid.attr("data_topicid");

    let data_des_objective = objid.attr("data_des_objective");
    let data_des_datasource = objid.attr("data_des_datasource");
    let data_des_detail = objid.attr("data_des_detail");
    let data_des_aware = objid.attr("data_des_aware");
    let data_des_topicmark = objid.attr("data_des_topicmark");

    $('#titleTopic').text(data_topicid);
    $('#des_topic').val(data_topicid);

    $('#des_objective').val(data_des_objective);
    $('#des_datasource').val(data_des_datasource);
    $('#des_detail').val(data_des_detail);
    $('#des_aware').val(data_des_aware);
    $('#des_topicmark').val(data_des_topicmark);

    if($('#des_objective').val() != ""){
        $('#des_btnsave').text('แก้ไขข้อมูล').removeClass('btn-success').addClass('btn-warning');
    }
}