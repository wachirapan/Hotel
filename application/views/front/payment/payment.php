<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>ชื่อผู้จอง</td>
                    <td>ห้อง</td>
                    <td>ราคา</td>
                    <td>สถานะ</td>
                </tr>
                <tbody>
                <?php
                $bookingid ;
                foreach($payment as $item){ $bookingid = $item->book_id ?>

                <tr>
                    <td><?=$item->cs_name?></td>
                    <td><?=$item->room_name?></td>
                    <td><?=number_format($item->room_price)?></td>
                    <td><?php if($item->book_status == 1){
                            echo "รอการจ่ายเงิน";
                        }else if($item->book_status == 2){
                            echo "รอการตรจสอบ";
                        }else if($item->book_status == 3){
                            echo "รอการเข้าพัก";
                        }else if($item->book_status == 4){
                            echo "เข้าพักเรียบร้อย";
                        }?></td>

                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h3 align="center" style="margin-top: 15px">ชำระค่าจอง</h3>
            <form action="<?php echo site_url('InsertData/paymentbooking')?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="bookingid" value="<?php echo $bookingid?>">
            <div class="form-group">
                <label>เอกสารการโอน</label>
                <input type="file" class="form-control" name="file">
            </div>
            <div class="form-group">
                <label>เวลาโอน</label>
                <input type="text" class="form-control" name="datetime">
            </div>
                <button type="submit" class="btn btn-primary " style="margin-bottom: 20px">ยืนยัน</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>