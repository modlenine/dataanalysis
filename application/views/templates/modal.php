<!-- Modal -->
<div class="modal fade" id="delData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form action="<?=base_url('production/delData')?>" method="POST" id="delForm">
                <div class="row form-group">
                    <div class="col-md-12 form-group">
                        <label for="">กรุณาเลือกเดือนของข้อมูล</label>
                        <input type="text" name="del_month" id="del_month" value="" class="form-control text-left component-datepicker mnth" placeholder="MM-YYYY">
                    </div>
                    <div class="col-md-12 form-group">
                        <button id="delBtn" name="delBtn" class="btn btn-danger btn-block" onclick="return confirm('ท่านยืนยันการลบข้อมูลใช่หรือไม่')">ลบข้อมูล</button>
                    </div>
                </div>
            </form>

            </div>
            
        </div>
    </div>
</div>












<!-- Modal จัดการข้อมูลของแต่ละ Graph -->
<!-- Modal -->
<div class="modal fade" id="md_topicDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ฟอร์มจัดการรายละเอียด <span id="titleTopic"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form id="topicDetail" autocomplete="off">
                <div class="row form-group">
                    <div class="col-lg-12 form-group">
                        <label for="">วัตถุประสงค์</label>
                        <textarea name="des_objective" id="des_objective" cols="30" rows="3" class="form-control"></textarea>
                        <div id="alert_des_objective"></div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="">แหล่งที่มาของข้อมูล</label>
                        <textarea name="des_datasource" id="des_datasource" cols="30" rows="3" class="form-control"></textarea>
                        <div id="alert_des_datasource"></div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="">คำอธิบาย</label>
                        <textarea name="des_detail" id="des_detail" cols="30" rows="5" class="form-control"></textarea>
                        <div id="alert_des_detail"></div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="">สิ่งที่ต้องพึงระวัง</label>
                        <textarea name="des_aware" id="des_aware" cols="30" rows="3" class="form-control"></textarea>
                        <div id="alert_des_aware"></div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="">หมายเหตุ</label>
                        <textarea name="des_topicmark" id="des_topicmark" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <input type="text" name="des_topic" id="des_topic">
                    <div class="col-lg-12 form-group">
                        <button type="button" id="des_btnsave" name="des_btnsave" class="btn btn-success btn-block">บันทึกข้อมูล</button>
                    </div>
                </div>
            </form>

            </div>
            
        </div>
    </div>
</div>
<!-- Modal จัดการข้อมูลของแต่ละ Graph -->