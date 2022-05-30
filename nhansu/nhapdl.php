<?php
require_once ('../dbhelp.php');

$s_mans = $s_hoten = $s_gioitinh = $s_diachi = $s_dienthoai = $s_email = '';

if (!empty($_POST)) {
	$s_mans = '';

	if (isset($_POST['hoten'])) {
		$hoten = $_POST['hoten'];
	}
        if (isset($_POST['gioitinh'])) {
		$s_gioitinh = $_POST['gioitinh'];
	}
	if (isset($_POST['diachi'])) {
		$s_diachi = $_POST['diachi'];
	}
	if (isset($_POST['dienthoai'])) {
		$s_dienthoai = $_POST['dienthoai'];
	}
	if (isset($_POST['email'])) {
		$s_email = $_POST['email'];
	}
	
        

		$s_hoten = str_replace('\'', '\\\'', $s_hoten);
		$s_mans       = str_replace('\'', '\\\'', $s_mans);
        $s_gioitinh = str_replace('\'', '\\\'', $s_gioitinh);
		$s_diachi      = str_replace('\'', '\\\'', $s_diachi);
		$s_dienthoai  = str_replace('\'', '\\\'', $s_dienthoai);
        $s_email = str_replace('\'', '\\\'', $s_email);
        
	if ($s_mans != '') {
		//update
		$sql = "update t_nhansu set hoten = '$s_hoten', gioitinh = '$s_gioitinh' , diachi = '$s_diachi', dienthoai = '$s_dienthoai', email = '$s_email'  where mans = " .$s_mans;
	} else {
		//insert
		$sql = "insert into t_nhansu(mans, hoten, gioitinh, diachi, dienthoai, email) value ('$s_mans','$s_hoten','$s_gioitinh' '$s_diachi', '$s_dienthoai', '$s_email')";
	}

	// echo $sql;

	execute($sql);

	header('Location: /nhansu/viewns.php');
	die();
}

$mans = '';
if (isset($_GET['mans'])) {
	$mans          = $_GET['mans'];
	$sql         = 'select * from student where mans = '.$mans;
	$nsList = executeResult($sql);
	if ($nsList != null && count($nsList) > 0) {
		$std        = $nsList[0];
		$s_hoten = $std['hoten'];
                $s_gioitinh = $std['gioitinh'];
		$s_diachi      = $std['diachi'];
		$s_dienthoai  = $std['dienthoai'];
                $s_username = $std['username'];
		$s_password = $std['password'];
	} else {
		$mans = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nhập thông tin nhân sự</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Nhân Sự</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Họ Tên:</label>
					  <input type="number" name="mans" value="<?=$mans?>" style="display: none;">
					  <input required="true" type="text" class="form-control" mans="usr" name="hoten" value="<?=$s_hoten?>">
					</div>
                                        <div class="form-group">
					  <label for="usr">Giới Tính:</label>
					  
					  <div class="controls">
    					<select name="Gender" mans="Gender">
    						<option value=""></option>
    						<option value="male">Nam</option>
    						<option value="female">Nữ</option>
    					</select>
    				</div>

					</div>
					<!-- <div class="form-group">
					  <label for="diachi">Địa Chỉ:</label>
					  <input type="number" class="form-control" mans="diachi" name="diachi" value="<?=$s_diachi?>">
					</div> -->
					<div class="form-group">
					  <label for="dienthoai">Địa Chỉ:</label>
					  <input type="text" class="form-control" mans="diachi" name="diachi" value="<?=$s_diachi?>">
					</div>

					<div class="form-group">
					  <label for="dienthoai">Điện Thoại:</label>
					  <input type="text" class="form-control" mans="dienthoai" name="dienthoai" value="<?=$s_dienthoai?>">
					</div>
                    <div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" class="form-control" mans="email" name="email" value="<?=$s_email?>">
					
					  <h3></h3>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



	<!-- <div class="control-group">
    				<label for="Gender" class="control-label">	
    					Giới Tính
    				</label>
    				<div class="controls">
    					<select name="Gender" mans="Gender">
    						<option value=""></option>
    						<option value="male">Nam</option>
    						<option value="female">Nữ</option>
    					</select>
    				</div>
    </div> -->