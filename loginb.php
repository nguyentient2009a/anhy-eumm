<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form">
			<fieldset>
				<h2>Vui lòng đăng nhập</h2>
				<hr class="colorgraph">
				<div class="form-group">
					<p>Tên đăng nhập<span>*</span></p>
                    <input type="text" name="kh_username"  placeholder="Username" >
				</div>
				<div class="form-group">
					<p>Mật Khẩu<span>*</span></p>
                    <input type="password" name="kh_password"  placeholder="Password">
				</div>
				<span class="button-checkbox">
                    <div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Ghi Nhớ</label>
					</div>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
					<a href="" class="btn btn-link pull-right">Quên Mật Khẩu?</a>
				</span>
				<hr class="colorgraph">
				
				<button type="submit" class="btn btn-lg btn-success btn-block" name="btnDangNhap">Đăng Nhập</button>
				<button type="submit" class="btn btn-lg btn-primary btn-block" name="btnDangKy">Đăng Ký</button>
			</fieldset>
		</form>
		<?php
								if (isset($_POST['btnDangNhap'])) {
									include_once  __DIR__.'/connect.php' ;
									$kh_username	= $_POST['kh_username'];
									$kh_password		= $_POST['kh_password'];

									$errors = [];
//kh_username
									if (empty($kh_username)) {
										$errors['kh_username'][] = [
											'rule' => 'required',
											'rule_value' => true,
											'value' => $kh_username,
											'msg' => 'Vui lòng nhập tên đăng nhập'
										];
									}

									if (!empty($kh_username) && strlen($kh_username) < 3) {
										$errors['kh_username'][] = [
											'rule' => 'minlength',
											'rule_value' => 3,
											'value' => $kh_username,
											'msg' => 'Tên đăng nhập phải có ít nhất 3 ký tự'
										];
									}

									if (!empty($kh_username) && strlen($kh_username) > 30) {
										$errors['kh_username'][] = [
											'rule' => 'maxlength',
											'rule_value' => 30,
											'value' => $kh_username,
											'msg' => 'Tên đăng nhập không được vượt quá 30 ký tự'
										];
									}
//kh_password
									if (empty($kh_password)) {
										$errors['kh_password'][] = [
											'rule' => 'required',
											'rule_value' => true,
											'value' => $kh_password,
											'msg' => 'Vui lòng nhập mật khẩu'
										];
									}

									if (!empty($kh_password) && strlen($kh_password) < 3) {
										$errors['kh_password'][] = [
											'rule' => 'minlength',
											'rule_value' => 3,
											'value' => $kh_password,
											'msg' => 'Mật khẩu phải có ít nhất 3 ký tự'
										];
									}

									if (!empty($kh_password) && strlen($kh_password) > 30) {
										$errors['kh_matkhau'][] = [
											'rule' => 'maxlength',
											'rule_value' => 30,
											'value' => $kh_password,
											'msg' => 'Mật khẩu không được vượt quá 30 ký tự'
										];
									}
									if(empty($errors)){
										$sqlSelect = <<<EOT
										SELECT *
										FROM khachhang kh
										WHERE kh.kh_username = '$kh_username' AND kh.kh_password = '$kh_password' LIMIT 1;
										EOT;

										$result = mysqli_query($conn, $sqlSelect);
										if (mysqli_num_rows($result) > 0) {
									
											$_SESSION['kh_username_logged_frontend'] = $kh_username;

											echo '<script>
													location.href="/VSSHOP";
													alert("Đăng nhập thành công!");
												</script>';

										} else {
											$errors['kh_check'][] = [
												'msg' => 'Đăng nhập thất bại!'
											];
										}
									}
									
								}
							?>

							<?php if(!empty($errors)): ?>
								<div id="errors-container" class="alert alert-danger face my-2" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<ul>
										<?php foreach ($errors as $fields) : ?>
											<?php foreach ($fields as $field) : ?>
												<li><?php echo $field['msg']; ?></li>
											<?php endforeach; ?>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
	</div>
</div>

</div>    

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>