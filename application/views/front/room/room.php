<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3 align="center" style="margin-top: 15px">จองห้องพัก</h3>
            <form action="<?php echo site_url('InsertData/insertbooking')?>" method="post">


            <div class="form-group">
                <label>ชื่อ สกุล</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>รหัสบัตรประชาชน</label>
                <input type="text" class="form-control" name="idacard">
            </div>
            <div class="form-group">
                <label>เบอร์โทร</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label>ชื่อเข้าระบบ</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label>หรัสผ่าน</label>
                <input type="text" class="form-control" name="pwd">
            </div>
            <div class="form-group">
                <label>ห้องว่าง</label>
                <select class="form-control" name="room">
                    <?php foreach($room as $item){?>
                        <option value="<?=$item->room_id?>"><?=$item->room_name?></option>
                    <?php } ?>
                </select>
            </div>

                <button type="submit" class="btn btn-primary " style="margin-bottom: 20px">Check Availabilty</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>