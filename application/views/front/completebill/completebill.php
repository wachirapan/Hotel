<div class="container" style="margin-top: 15px ; margin-bottom: 15px" id="form-closebill">
    <h3>ค่าห้องที่จ่ายไป</h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td>เลขห้อง</td>
                    <td>ราคารวม</td>
                </tr>
                <tbody>
                <?php foreach($bill as $item){?>
                    <tr>
                        <td><?=$item->room_name?></td>
                        <td><?php echo number_format($item->opb_priceroom + $item->opb_water + $item->opb_fire)?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <?php echo $links ?>
        </div>
    </div>
</div>
