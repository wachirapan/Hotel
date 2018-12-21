<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>ชื่อ สกุล</td>
                    <td>ห้อง</td>
                    <td>วันที่แจ้งย้าย</td>
                    <td>สถานะ</td>
                </tr>
                <tbody>
                <?php foreach($change as $item){?>
                <tr>
                    <td><?=$item->cs_name?></td>
                    <td><?=$item->room_name?></td>
                    <td><?=$item->ch_date?></td>
                    <td><?php if($item->ch_status == 1){
                            echo "รอการตรวจสอบ";
                        }else if($item->ch_status == 2){
                            echo "ยันยันการตรวจสอบ";
                        }?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form action="<?php echo site_url('InsertData/insertchangroom')?>" method="POST">
                <div class="form-group">
                    <label>เหตผลการย้าย</label>
                    <textarea class="form-control" name="detail" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary " style="margin-bottom: 20px">ยืนยัน</button>
            </form>
        </div>
    </div>
</div>