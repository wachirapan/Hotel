<div class="row" id="checkout">
    <table class="table">
        <tr>
            <td>ชื่อสกุล</td>
            <td>ห้อง</td>
            <td>วันที่แจ้งออก</td>
            <td>ยืนยัน</td>
        </tr>
        <tbody>
        <tr v-for="item in checkout">
            <td>{{item.cs_name}}</td>
            <td>{{item.room_name}}</td>
            <td>{{item.co_text}}</td>
            <td><button class="btn btn-success" @click="setedit(item.book_id);">ยืนยัน</button></td>
        </tr>
        </tbody>
    </table>

</div>
<script>
    new Vue({
        el : "#checkout",
        data : {
            checkout : [],
            dataid : "",
            price : ""
        },
        mounted : function(){
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/getcheckout')?>", function (data) {
                self.checkout = data ;
            });
        },
        methods : {
            setedit(id){
                this.dataid = id ;
                $.post("<?php echo site_url('InsertData/insertcheckoutroom')?>",{dataid:id});
                window.location.reload();
            }
        }
    });
</script>