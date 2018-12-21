<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>ชื่อ สกุล</td>
                    <td>ห้อง</td>
                    <td>วันที่แจ้งออก</td>
                    <td>สถานะ</td>
                </tr>
                <tbody>
                <?php foreach($checkout as $item){?>
                <tr>
                    <td><?=$item->cs_name?></td>
                    <td><?=$item->room_name?></td>
                    <td><?=$item->co_text?></td>
                    <td><?php if($item->co_status == 1){
                            echo "รอการตรวจสอบ";
                        }else if($item->co_status == 2){
                            echo "ยันยันการตรวจสอบ";
                        }?></td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form action="<?php echo site_url('InsertData/insertcheckout')?>" method="POST">
                <div class="form-group">
                    <label>วันที่แจ้งออก</label>
                    <input type="text" class="form-control" name="checkout">
                </div>
                <button type="submit" class="btn btn-primary " style="margin-bottom: 20px">ยืนยัน</button>
            </form>
        </div>
    </div>
</div>