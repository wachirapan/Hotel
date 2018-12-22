<div class="row" id="payonline">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>ชื่อ สกุล</td>
                <td>เบอร์โทร</td>
                <td>ห้อง</td>
                <td>เอกสาร</td>
            </tr>
            <tbody>
            <?php foreach($pay as $item){?>
                <tr>
                    <td><?=$item->cs_name?></td>
                    <td><?=$item->cs_phone?></td>
                    <td><?=$item->room_name?></td>
                    <td><button @click="setimage(<?php echo $item->opb_id?>);" data-toggle="modal" data-target="#myModal" class=" btn-info">บิล</button></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="margin: auto">
                   <img :src="imagedata" width="150px" height="150px" >
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    new Vue({
        el : "#payonline" ,
        data : {
            imagedata : ""
        },
        methods : {
            setimage(id){
                var self = this ;
                $.getJSON("<?php echo site_url('GetJSON/getbillpaymentonline?id=')?>"+id, function (data) {
                    $.each(data, function (k,v) {
                        self.imagedata = "<?php echo base_url('pictures/paymentbill/')?>"+v['pbo_file'] ;
                    });
                });
            }
        }
    });
</script>