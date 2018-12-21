<div class="row" id="form-online">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>ชื่อ สกุล</td>
                <td>เบอร์ติดต่อ</td>
                <td>ห้องจอง</td>
                <td>สถานะ</td>
                <td>ยกเลิก</td>
            </tr>
            <tbody>
            <?php foreach($check as $item){?>
            <tr>
                <td><?=$item->cs_name?></td>
                <td><?=$item->cs_phone?></td>
                <td><?=$item->room_name?></td>
                <td><?php if($item->book_status){
                        echo "รอการชำระเงิน";
                    }?></td>
                <td><button class="btn btn-danger" @click="deletedata(<?php echo $item->book_id?>);">ลบ</button></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    new Vue({
        el : "#form-online",
        data : {

        },
        methods : {
            deletedata(id){
                $.post("<?php echo site_url('DeleteData/delbookingonline')?>",{id:id});
                window.location.reload();
            }
        }
    });
</script>