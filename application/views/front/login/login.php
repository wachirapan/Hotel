<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 align="center" style="margin-top: 15px">เข้าสู่ระบบ</h3>
            <form action="<?php echo site_url('Logincustomer/checklogin')?>" method="post">
                <div class="form-group">
                    <label>ชื่อเข้าระบบ</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label>รหัสผ่าน</label>
                    <input type="text" class="form-control" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary " style="margin-bottom: 20px">ยืนยัน</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>