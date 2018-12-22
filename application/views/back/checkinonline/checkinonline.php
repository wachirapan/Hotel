<div class="row" id="form-checkin">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>ชื่อ สกุล</td>
                <td>ห้องพัก</td>
                <td>เบอร์โทร</td>
                <td>ยืนยันการเข้าพัก</td>
            </tr>
            <tbody>
            <?php foreach($checkin as $item){?>
            <tr>
                <td><?=$item->cs_name?></td>
                <td><?=$item->room_name?></td>
                <td><?=$item->room_name?></td>
                <td><button @click="updatedata(<?php echo $item->book_id ;?>);" class="btn btn-success">ยืนยันการเข้าพัก</button></td>
            </tr>
            <?php }?>
            </tbody>

        </table>
    </div>
</div>
<script>
    new Vue({
        el : "#form-checkin",
        data : {

        },
        methods : {
            updatedata(id){
                $.post("<?php echo site_url('UpdateData/updatecheckinonline')?>",{id:id});
                window.location.reload();
            }
        }
    });
</script>