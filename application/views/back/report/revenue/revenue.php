<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h3 align="center">ค้นหา</h3>
        <form action="<?php echo site_url('Report/listrevenue')?>" method="post">
            <div class="form-group">
                <label>จากวันที่</label>
                <input type="date" class="form-control" name="date1">
            </div>
            <div class="form-group">
                <label>ถึงวันที่</label>
                <input type="date" class="form-control" name="date2">
            </div>
            <button class="btn btn-success" type="submit">ค้นหา</button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>