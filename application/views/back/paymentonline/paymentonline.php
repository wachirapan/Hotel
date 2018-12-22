<div class="row" id="form-payonline">
    <div class="col-md-12">
        <table class="table">
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
                <td><button @click="lookdetail(<?php echo $item->book_id; ?>);" class="btn btn-info">เพิ่มเติม</button> </td>
                <td><button class="btn btn-success">ยืนยัน</button></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
<script>
    new Vue({
        el : "#payonline" ,
        data : {
            imageurl : ""
        },
        methods : {
            lookdetail(bookid){
                $.getJSON("<?php echo site_url('GetJSON/getdetailpayonline?id=')?>"+bookid, function (data) {
                            console.log(data['bp_file']);
                });
            }
        }
    });
</script>
