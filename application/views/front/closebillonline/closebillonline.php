<script src="<?php echo base_url('assets/vue/vue.js')?>"></script>
<div class="container" style="margin-top: 15px ; margin-bottom: 15px" id="form-closebill">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>เลขห้อง</td>
                    <td>ราคารวม</td>
                    <td>ยืนยัน</td>
                </tr>
                <tbody>
                <?php foreach($checkbill as $item){?>
                <tr>
                    <td><?=$item->room_name?></td>
                    <td><?php echo number_format($item->opb_priceroom + $item->opb_water + $item->opb_fire)?></td>
                    <td><?php if($item->opb_status == 1){?>
                        <button @click="setroom(<?php echo $item->opb_id?>);">ยืนยัน</button></td>
                    <?php }else if($item->opb_status == 3){ echo "รอการตรวจสอบ";}?>

                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form action="<?php echo site_url('InsertData/insertclosebillonline')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>รหัสบิล</label>
                    <input type="text" class="form-control" id="billid" name="billid" >
                </div>
                <div class="form-group">
                    <label>เอกสาร</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <button type="submit" class="btn btn-primary " style="margin-bottom: 20px">ยืนยัน</button>
            </form>
        </div>
    </div>
</div>
<script>
    new Vue({
        el:"#form-closebill",
        data : {

        },
        methods : {
            setroom(id){
                $('#billid').val(id);
            }
        }
    });
</script>