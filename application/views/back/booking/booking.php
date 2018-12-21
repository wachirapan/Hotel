<div class="row" id="form-booking">
    <div class="col-md-8">

    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>ชื่อ นามสกุล</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>บัตรประชาชน</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>เบอร์</label>
            <input type="text" class="form-control">
        </div>
        <button id="btninsert" class="btn btn-success">จัดเก็บ</button>
        <button id="btnupdate" class="btn btn-info">จัดเก็บ</button>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    new Vue({
        el : "#form-booking",
        data : {

        },
        mounted : function () {

        },
        methods : {

        }
    });
</script>