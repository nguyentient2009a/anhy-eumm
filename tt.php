<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="VSSHOP">
    <meta name="keywords" content="VSSHOP, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	
</head>

<body>
	<div id="preloder">
		<div class="loader"></div>
	</div>



	 <!-- Breadcrumb Section Begin -->
	 <section class="breadcrumb-section set-bg" data-setbg="image/logo.gif">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Đăng nhập</h2>
						<div class="breadcrumb__option">
							<a href="/login"><h3>Trang chủ</h3></a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->
  <!-- Checkout Section Begin -->
	<section class="checkout spad">
		<div class="container">
			<div class="checkout__form">
				<h4></h4>
				<form id="frmDangNhap" name="frmcreate" method="post" action="">
					<div class="row">
						<div class="col-lg-8 col-md-6">
							<div class="row">
								<div class="col-lg-6">
                                    <br></br>
									<div class="col-lg-6">
										<p>Tên đăng nhập<span>*</span></p>
										<input type="text" name="kh_username" placeholder="Tên đăng nhập">
									</div>
								</div>
                                <br></br>
								<div class="col-lg-6">
									<div class="col-lg-6">
										<p>Mật Khẩu<span>*</span></p>
										<input type="password" name="kh_password" placeholder="Mật khẩu">
									</div>
								</div>
							</div>
                            <h3> </h3>
                            <div class="text-center">
							    <button type="submit" class="btn btn-lg btn-success btn-block" name="btnDangNhap">Đăng Nhập</button>
                                <h4></h4>
                            </div>
						</div>
					</div>
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
										$errors['kh_password'][] = [
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
													location.href="/login/nhansu/viewns.php";
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
	</section>
	<!-- Checkout Section End -->

	
	<script>
	$(document).ready(function() {
		$("#frmDangNhap").validate({
			rules: {
				kh_username: {
					required: true,
					minlength: 3,
					maxlength: 30
				},
				kh_password: {
					required: true,
					minlength: 3,
					maxlength: 30
				},
			},
			messages: {
				kh_username: {
				required: "Vui lòng nhập tên đăng nhập",
				minlength: "Tên đăng nhập phải có ít nhất 3 ký tự",
				maxlength: "Tên đăng nhập không được vượt quá 50 ký tự"
				},
				kh_password: {
				required: "Vui lòng nhập mật khẩu",
				minlength: "Mật khẩu phải có ít nhất 3 ký tự",
				maxlength: "Mật khẩu không được vượt quá 255 ký tự"
				},
			},
			errorElement: "em",
			errorPlacement: function(error, element) {
			error.addClass("invalid-feedback");
				if (element.prop("type") === "checkbox") {
					error.insertAfter(element.parent("label"));
				} else {
					error.insertAfter(element);
				}
			},
			success: function(label, element) {},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass("is-invalid").removeClass("is-valid");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).addClass("is-valid").removeClass("is-invalid");
			}
		});
	});
</script>
</body>
</html>