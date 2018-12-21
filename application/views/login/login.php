<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url('login/')?>images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('login/')?>css/main.css">
    <script src="<?php echo base_url('login/')?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url('assets/vue/vue.js')?>"></script>
</head>
<body>
<div id="form-login">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url('login/')?>images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="<?php echo site_url('Login/checklogin')?>" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username" placeholder="USERNAME">
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <select class="input100" name="category">
                            <?php foreach($cate as $item){?>
                            <option value="<?php echo $item->ct_id ; ?>"><?php echo $item->ct_name ;?></option>
                            <?php } ?>

                        </select>
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-indent" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>




<script src="<?php echo base_url('login/')?>vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url('login/')?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('login/')?>vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url('login/')?>vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="<?php echo base_url('login/')?>js/main.js"></script>

</body>
</html>