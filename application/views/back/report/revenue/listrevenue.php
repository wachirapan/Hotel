<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h3 align="center">สรุปยอด</h3>
        <div class="row">
            <div class="col-md-6" align="center">
                <h4>ระหว่างวันที่ : <?php echo $date1?></h4>
            </div>
            <div class="col-md-6" align="center">
                <h4>ถึงวันที่ : <?php echo $date2?></h4>
            </div>
            <table class="table" style="text-align: center">
                <tr>
                    <td>ลำดับ</td>
                    <td>ห้อง</td>
                    <td>ยอดจ่าย</td>
                </tr>
                <tbody>
                <?php
                $num = 1 ;
                $sum = 0 ;
                foreach($report as $item){?>
                <tr>
                    <td><?=$num ; ?></td>
                    <td><?=$item->room_name?></td>
                    <td><?php
                        $sum += $item->price_tax ;
                        echo number_format($item->price_tax)?></td>
                </tr>
                <?php $num++ ;}?>
                </tbody>
            </table>
            <h4>ยอดรวม : <?=number_format($sum)?> / บาท</h4>
        </div>
    </div>
</body>
</html>