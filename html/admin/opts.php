<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include  "../common.php";
	
	$id_opt = $_REQUEST["id"];
	
	$sql_opt = "select * from opt where id=$id_opt";
	$result_opt=mysqli_query($db, $sql_opt);
	if(!$result_opt) exit("에러: $sql");
	
	$row_opt=mysqli_fetch_array($result_opt);
	
	
	$sql_opts = "select * from opts where opt_id=$id_opt";
	$result_opts=mysqli_query($db, $sql_opts);
	if(!$result_opts) exit("에러: $sql");
	
	$row_opts=mysqli_fetch_array($result_opts);

?>
<!doctype html>
<html lang="kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INDUK Mall</title>
	<link  href="../css/bootstrap.min.css" rel="stylesheet">
	<link  href="../css/my.css" rel="stylesheet">
	<script src="..js/jquery-3.7.1.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/my.js"></script>
</head>
<body>

<div class="container">
<!-------------------------------------------------------------------------------------------->	
<script> document.write(admin_menu());</script>
<!-------------------------------------------------------------------------------------------->	

<div class="row mx-1  justify-content-center">
	<div class="col-sm-10" align="center">

	<h4 class="m-0">소옵션</h4>

	<div class="row myfs13">
		<div class="col" align="left" style="padding-top:8px"">
			&nbsp;옵션명 : <font color="red"><?=$row_opt["name"]; ?></font>
		</div>
		<div class="col" align="right">
			<div class="d-inline-flex">
				<a href="opts_new.php?id=<?=$id_opt; ?>" class="btn btn-sm mycolor1 myfs12">소옵션 추가</a>&nbsp;
			</div>
		</div>
	</div>
	</form>

	<table class="table table-sm table-bordered table-hover my-1">
		<tr class="bg-light">
			<td width="25%">소옵션 번호</td>
			<td>소옵션명</td>
			<td width="25%">수정 / 삭제</td>
		</tr>
		<?
			foreach ($result_opts as $row_opts)
			{
				$id_opts=$row_opts["id"];
				$name_opts=$row_opts["name"];
?>
				<tr>
				<td><?=$id_opts; ?></td>
				<td><?=$name_opts; ?></td>
				<td>
					<a href="opts_edit.php?id=<?=$id_opt; ?>&id1=<?=$id_opts; ?>" class="btn btn-sm mybutton-blue">수정</a>
					<a href="opts_delete.php?id=<?=$id_opt; ?>&id1=<?=$id_opts; ?>" class="btn btn-sm mybutton-red" 
						onclick="javascript:return confirm('삭제할까요 ?');">삭제</a>				
				</td>
				</tr>
<?
			}
?>
	</table>

	<a href="opt.php" class="btn btn-sm btn-outline-dark my-2">&nbsp;돌아가기&nbsp;</a>

	</div>
</div>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
