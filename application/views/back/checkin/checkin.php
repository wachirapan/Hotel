<div class="row" id="form-checkin">
    <div class="col-md-8">
        <table class="table">
            <tr>
                <td>ชื่อ สกุล</td>
                <td>เบอร์ติดต่อ</td>
                <td>ห้อง</td>
                <td>จ่ายเงิน</td>
            </tr>
            <tbody>
            <tr v-for="item in filedata">
                <td>{{item.cs_name}}</td>
                <td>{{item.cs_phone}}</td>
                <td>{{item.room_name}}</td>
                <td><button data-toggle="modal" data-target="#myModal" @click="insertpayment(item.book_id);" class="btn btn-info">จ่ายเงิน</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>ชื่อ สกุล</label>
            <input type="text" class="form-control" v-model="name">
        </div>
        <div class="form-group">
            <label>รหัสบัตรประชาชน</label>
            <input type="text" class="form-control" v-model="idacard">
        </div>
        <div class="form-group">
            <label>เบอร์ติดต่อ</label>
            <input type="text" class="form-control" v-model="phone">
        </div>
        <div class="form-group">
            <label>ห้องพัก</label>
            <select class="form-control" id="roomid">
                <?php foreach($room as $item){?>
                <option value="<?=$item->room_id?>"><?=$item->room_name?></option>
                <?php }?>
            </select>
        </div>
        <button id="btninsert" class="btn btn-success" @click="insertdata();">จัดเก็บ</button>
        <button id="btnupdate" class="btn btn-info">จัดเก็บ</button>
    </div>
    <!-- modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ชำระเงิน</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   <div class="form-group">
                       <label>จำนวนเงิน</label>
                       <input type="text" class="form-control" v-model="price">
                   </div>
                    <button class="btn btn-success" @click="paymentfront();">จัดการ</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
</div>
<script>
    $('#btnupdate').hide();
    new Vue({
        el : "#form-checkin",
        data : {
            dataid : "",
            name:"",
            idacard: "",
            phone:"",
            filedata : [],
            price : ""
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/createbookingfront')?>", function (data) {
                self.filedata = data ;
            });
        },
        methods :{
            insertdata(){
                $.post("<?php echo site_url('InsertData/insertcheckincounter')?>",{name:this.name, idacard:this.idacard,
                    phone:this.phone, roomid:$('#roomid').val()});
                window.location.reload();
            },
            insertpayment(id){
                this.dataid = id ;
            },
            paymentfront(){
                $.post("<?php echo site_url('InsertData/insertpaymentfront')?>",{dataid:this.dataid, price:this.price});
                window.location.reload();
            }
        }
    });
</script>