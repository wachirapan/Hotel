<div class="row" id="openbil">
    <div class="col-md-8">
        <table class="table">
            <tr>
                <td>ชื่อ</td>
                <td>เลขห้อง</td>
                <td>ออกบิล</td>
            </tr>
            <tbody>
            <tr v-for="item in dataopen">
                <td>{{item.cs_name}}</td>
                <td>{{item.room_name}}</td>
                <td><button class="btn btn-info" @click="setbill(item.book_id, item.room_name, item.room_price);">ตั้งค่า</button></td>
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
            <label>ค่าน้ำ</label>
            <input type="text" class="form-control" v-model="waterdata">
        </div>
        <div class="form-group">
            <label>ค่าไฟ</label>
            <input type="text" class="form-control" v-model="firedata">
        </div>
        <div class="form-group">
            <label>ค่าห้อง</label>
            <input type="text" class="form-control" v-model="priceroom">
        </div>
        <button class="btn btn-success" @click="insertdata();">จัดเก็บ</button>
    </div>
</div>
<script>
    new Vue({
        el : "#openbil",
        data : {
            bookingid : "",
            waterdata : "",
            firedata : "",
            dataopen : [],
            roomname:"",
            priceroom : ""
        },
        mounted : function () {
            var self = this;
            $.getJSON("<?php echo site_url('GetJSON/getdataroomforopenbill')?>", function (data) {
                self.dataopen = data ;
            });
        },
        methods : {
            setbill(bookingid, roomname, room_price){
                this.bookingid = bookingid ;
                this.roomname = roomname ;
                this.priceroom = room_price ;
            },
            insertdata(){
                $.post("<?php echo site_url('InsertData/insertopenbill')?>",{bookingid:this.bookingid, waterdata:this.waterdata,
                    firedata:this.firedata,priceroom:this.priceroom});
                window.location.reload();
            }
        }
    });
</script>