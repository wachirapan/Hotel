<div class="row" id="pricelist">
    <div class="col-md-8">
        <table class="table">
            <tr>
                <td>ชื่อ สกุล</td>
                <td>เบอร์ติดต่อ</td>
                <td>เลขห้อง</td>
                <td>ณ ที่จ่าย</td>
                <td>จ่ายเงิน</td>
                <td>ลบ</td>
            </tr>
            <tbody>
            <tr v-for="item in datapricelist">
                <td>{{item.cs_name}}</td>
                <td>{{item.cs_phone}}</td>
                <td>{{item.room_name}}</td>
                <td>{{Number(item.opb_priceroom)+  Number(item.opb_water) + Number(item.opb_fire)}}</td>
                <td><button @click="setprice(item.opb_id, item.room_name, item.opb_priceroom,
                item.opb_water, item.opb_fire);"  class="btn btn-info">จ่าย</button></td>
                <td><button @click="deletedata(item.opb_id);" class="btn btn-danger">ลบ</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>เลขห้อง</label>
            <input type="text" class="form-control" v-model="roomname">
        </div>
        <div class="form-group">
            <label>ต้องชำระ</label>
            <input type="text" class="form-control" v-model="billprice">
        </div>
        <div class="form-group">
            <label>ณ ที่จ่าย</label>
            <input type="text" class="form-control" v-model="billsum">
        </div>
        <div class="form-group" id="showtorn">
            <label>ทอน</label>
            <input type="text" class="form-control" :value="Number(billsum) - Number(billprice) ">
        </div>
        <button class="btn btn-success" @click="insertdata();">จ่ายเงิน</button>
    </div>
</div>
<script>
    $('#showtorn').hide();
    new Vue({
        el : "#pricelist",
        data : {
            billid : "",
            roomname : "",
            billprice : "",
            billsum : "",
            datapricelist : []
        },
        mounted : function () {
            var self = this;
            $.getJSON("<?php echo site_url('GetJSON/pricelistbill')?>", function (data) {
                self.datapricelist = data ;
            });
        },
        methods : {
            deletedata(id){
                var con = confirm("คุณต้องการลบข้อมูลนี้ใช่ไหม");
                if(con == true){
                    $.post("<?php echo site_url('DeleteData/delopenbil')?>",{id:id});
                    window.location.reload();
                }
            },
            setprice(idbill, numberroom, priceroom, pricewater, pricefire){
                $('#showtorn').show();
                this.billid = idbill ;
                this.roomname = numberroom ;
                this.billprice = Number(priceroom) + Number(pricewater) + Number(pricefire);

            },
            insertdata(){
                $.post("<?php echo site_url('InsertData/pricebillorder')?>",{billid:this.billid, billsum:this.billsum});
                window.location.reload();
            }
        }

    });
</script>