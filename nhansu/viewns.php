<?php
require_once ('../dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin nhân sự</title>


	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

</head>
<body>



<div class="container" style="margin-top:10px">
	
			 
				
			<ul class="list-group">
			    <li class="list-group-item active">Thông tin nhân sự</li>
					    <li class="list-group-item">

					    		<table  class="table table-bordered table-sm">
					    			<thead>
					    				<th>
					    					<td>Mã Nhân Sự</td>
					    					<td>Họ Tên</td>
					    					<td>Giới Tính</td>
					    					<td>Địa Chỉ</td>
                                            <td>Điện Thoại</td>
					    					<td>Email</td>
					    				</th>
					    			</thead>
					    			<tbody>
									<!-- <?php
                                        if (isset($_GET['s']) && $_GET['s'] != '') {
                                                $sql = 'select * from t_nhansu where hoten like "%'.$_GET['s'].'%"';
                                        } else {
                                                $sql = 'select * from t_nhansu';
                                        }

                                        $nsList = executeResult($sql);

                                        $index = 1;
                                        foreach ($nsList as $std) {
                                                echo '<tr>
                                                                <td>'.($index++).'</td>
                                                                <td>'.$std['mans'].'</td>
                                                                <td>'.$std['hoten'].'</td>    
                                                                <td>'.$std['gioitinh'].'</td>
                                                                <td>'.$std['diachi'].'</td>
																<td>'.$std['dienthoai'].'</td>
																<td>'.$std['email'].'</td>
                                                        </tr>';
                                        }
                                        ?> -->
									</tbody>
									<?php
										if (isset($_GET['s']) && $_GET['s'] != '') {
											$sql = 'select * from t_nhansu where hoten like "%'.$_GET['s'].'%"';
										} else {
											$sql = 'select * from t_nhansu';
										}

										$nsList = executeResult($sql);

										$index = 1;
										foreach ($nsList as $std) {
											echo '<tr>
													<td>'.($index++).'</td>
													<td>'.$std['mans'].'</td>
													<td>'.$std['hoten'].'</td>    
													<td>'.$std['gioitinh'].'</td>
													<td>'.$std['diachi'].'</td>
													<td>'.$std['dienthoai'].'</td>
													<td>'.$std['email'].'</td>
													<td><button class="btn btn-warning" onclick=\'window.open("nhapdl.php?mans='.$std['mans'].'","_self")\'>Sửa</button></td>
													<td><button class="btn btn-danger" onclick="deleteStudent('.$std['mans'].')">Xóa</button></td>
												</tr>';
										}
									?>
										</tbody>
												</table>
												<button class="btn btn-success" onclick="window.open('nhapdl.php', '_self')">Thêm</button>
											</div>
										</div>
									</div>

									<script type="text/javascript">
										function deleteStudent(mans) {
											option = confirm('Bạn có muốn xoá không?')
											if(!option) {
												return;
											}

											console.log(id)
											$.post('xoans.php', {
												'mans': mans
											}, function(data) {
												alert(data)
												location.reload()
											})
										}
									</script>
					    		</table>


				</li>
						 
			    
			  </ul>


		 
 

</div>

<script type="text/javascript">
	$.get('https://creativenovels.com/wp-json/wp/v2/posts/191884', function(data) {
		console.log(data.content.rendered)
		$('#abc').append(data.content.rendered)
	})
</script>

</body>
</html>