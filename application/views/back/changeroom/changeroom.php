<div class="row" id="changeroom">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>ชื่อ สกุล</td>
                <td>เบอร์โทร</td>
                <td>ห้อง</td>
                <td>สาเหตุ</td>
                <td>ยืนยีน</td>
            </tr>
            <tbody>
            <tr v-for="item in datachange">
                <td>{{item.cs_name}}</td>
                <td>{{item.cs_phone}}</td>
                <td>{{item.room_name}}</td>
                <td>{{item.ch_detail}}</td>
                <td><button data-toggle="modal" data-target="#myModal" class="btn btn-info" @click="setdata(item.book_id, item.room_id, item.room_name,item.ch_id);">ยืนยัน</button> </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>ห้อง</label>
                        <select class="form-control" id="room"></select>
                    </div>
                    <button class="btn btn-success" @click="changeroom();">จัดเก็บ</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
</div>
<script>
    new Vue({
        el : "#changeroom",
        data : {
            datachange : [],
            dataid : "",
            dataidroom : "",
            chid : ""
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/createchangeroomcheck')?>", function (data) {
                self.datachange = data ;
            });
            $.getJSON("<?php echo site_url('GetJSON/getroomchange')?>", function (data) {
                $.each(data, function (k,v) {
                    $('#room').append('<option value="'+v['room_id']+'">'+v['room_name']+'</option>')
                });
            });
        },
        methods : {
            setdata(id ,roomid , roomname, chid){
                this.chid = chid ;
                this.dataid = id ;
                this.dataidroom = roomid ;
                $('#room').append('<option value="'+roomid+'" selected>'+roomname+'</option>');
            },
            changeroom(){
                $.post("<?php echo site_url('UpdateData/updatechangeroom')?>",{dataid:this.dataid, dataidroom:this.dataidroom,
                    roomid:$('#room').val(),chid:this.chid});
                window.location.reload();
            }
        }
    });
</script>