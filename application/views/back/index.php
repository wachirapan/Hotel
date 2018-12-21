<div class="row" id="form-room">
    <div class="col-md-8">
        <table class="table">
            <tr>
                <td>เลขห้อง</td>
                <td>ราคา</td>
                <td>แก้ไข</td>
            </tr>
            <tbody>
            <?php foreach($room as $item){?>
            <tr>
                <td><?=$item->room_name?></td>
                <td><?=$item->room_price?></td>
                <td><button class="btn btn-info" @click="setedit(<?=$item->room_id?>);">edit</button></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>เลขห้อง</label>
            <input type="text" class="form-control" v-model="roomname">
        </div>
        <div class="form-group">
            <label>ราคา</label>
            <input type="text" class="form-control" v-model="roomprice">
        </div>
        <button id="btninsert" class="btn btn-success" @click="insertdata();">submit</button>
        <button id="btnupdate" class="btn btn-info" @click="updatedata();">submit</button>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    new Vue({
        el : "#form-room",
        data : {
            roomid : "",
            roomname : "",
            roomprice : ""
        },
        mounted : function () {

        },
        methods : {
            insertdata(){
                $.post("<?php echo site_url('InsertData/insertroom')?>",{roomname:this.roomname, roomprice:this.roomprice});
                window.location.reload();
            },
            setedit(id){
                $('#btnupdate').show();
                $('#btninsert').hide();
                var self = this ;
                $.getJSON("<?php echo site_url('GetJSON/geteditroom?id=')?>"+id, function (data) {
                    $.each(data, function (k,v) {
                        self.roomid = v['room_id'];
                        self.roomname = v['room_name'];
                        self.roomprice = v['room_price'];
                    });
                });
            },
            updatedata(){
                $.post("<?php echo site_url('UpdateData/updateroom')?>",{roomid:this.roomid, roomname:this.roomname, roomprice:this.roomprice});
                window.location.reload();
            }
        }
    });
</script>