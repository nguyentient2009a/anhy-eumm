<?php
if (isset($_POST['mans'])) {
	$mans = $_POST['mans'];

	require_once ('dbhelp.php');
	$sql = 'delete from t_nhansu where mans = '.$mans;
	execute($sql);

	echo 'Xoá sinh viên thành công';
}