<div class="row" id="form-payonline">
    <div class="col-md-12">
        <table class="table">form-payonline
            <tr>
                <td>ชื่อ สกุล</td>
                <td>เบอร์ติดต่อ</td>
                <td>ห้องจอง</td>
                <td>ตรวจสอบเอกสาร</td>
                <td>ยืนยัน</td>
            </tr>
            <tbody>
            <?php foreach($payonline as $item){?>
            <tr>
                <td><?=$item->cs_name?></td>
                <td><?=$item->cs_phone?></td>
                <td><?=$item->room_name?></td>
                <td><button @click="lookdetail(<?php echo $item->book_id ;?>);" data-target="#myModal" data-toggle="modal" class="btn btn-info">เพิ่มเติม</button> </td>
                <td><button data-target="#payment" data-toggle="modal" @click="confirmdata(<?php echo $item->book_id ;?>);" class="btn btn-success">ยืนยัน</button></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <!-- modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">สลิป</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="margin: auto;">
                   <img :src="imageurl" width="250px" height="250px">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="payment">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">จ่ายเงิน</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" >
                  <div class="form-group">
                      <input type="text" class="form-control" v-model="payment">
                  </div>
                    <button class="btn btn-success" @click="paymentdata();">จ่ายเงิน</button>
                </div>



            </div>
        </div>
    </div>
    <!-- modal -->
</div>
<script>
    new Vue({
        el : "#form-payonline",
        data : {
            imageurl : "",
            dataid : "",
            payment : ""
        },
        methods:{
            lookdetail(id)
            {
                var self = this ;
                $.getJSON("<?php echo site_url('GetJSON/getdetailpayonline?id=')?>"+id, function (data) {
                    $.each(data, function (k,v) {
                        self.imageurl = "<?php echo base_url('pictures/paymentbooking/')?>"+v['bp_file'];
                    });
                });
            },
            confirmdata(id){
                this.dataid = id ;

            },
            paymentdata(){
                $.post("<?php echo site_url('UpdateData/updatebookingpaymentonline')?>",{id:this.dataid, payment:this.payment});
                window.location.reload();
            }
        }
    });
</script>
