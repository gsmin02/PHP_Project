<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "common.php";
	
	$findtext = $_REQUEST["findtext"];
	
	$sql="select * from product where name like '%$findtext%' order by name";
	$result_query=mysqli_query($db,$sql);
	if (!$result_query) exit("에러:$sql");
	
	$count=mysqli_num_rows($result_query);	// 레코드개수
	$args = "findtext=$findtext";
	$result = mypagination($sql, $args, $count, $pagebar);
	if (!$result) exit("에러: $sql");
	
?>
<!doctype html>
<html lang="kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INDUK Mall</title>
	<link  href="css/bootstrap.min.css" rel="stylesheet">
	<link  href="css/my.css" rel="stylesheet">
	<script src="js/jquery-3.7.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
<!-------------------------------------------------------------------------------------------->	

<? include "main_top.php"; ?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<div class="row m-1 mt-4 mb-0">
	<div class="col" align="center">

		<h4 class="m-3">상품검색</h4>

		<hr class="m-0">
		<table class="table table-sm mb-4">
			<tr height="40" class="bg-light">
				<td width="15%">이미지</td>
				<td width="45%">상품정보</td>
				<td width="20%">판매가</td>
				<td width="20%">금액</td>
			</tr>
<?
			foreach ($result as $row) {
				$icon_hit = $row['icon_hit'];
				$icon_new = $row['icon_new'];
				$icon_sale = $row['icon_sale'];
				$discount = $row['discount'];
				$price = $row['price'];
				$non_sale_price = number_format($price);
				if($icon_sale == 1) {
					$sale_price = number_format(round($price*(100-$discount)/100, -3));
				}
				else {
					$sale_price =  number_format($price);
				}
?>
				<tr height="85" style="font-size:14px;">
					<td>
						<a href="product.php?id=<?=$row['id']; ?>"><img src="product/<?=$row['image1']; ?>" width="60" height="70"></a>
					</td>
					<td align="left" valign="middle">
						<a href="product.php?id=<?=$row['id']; ?>" style="color:#0066CC"><?=$row['name']; ?></a><br>
<?
							if($icon_hit == 1) {
								echo "<img src='images/i_hit.gif'>&nbsp;";
							}
							if($icon_new == 1) {
								echo "<img src='images/i_new.gif'>&nbsp;";
							}
							if($icon_sale == 1) {
								echo "<img src='images/i_sale.gif'>&nbsp;<font size='3' color='red'>$discount%</font>";
							}
?>
					</td>
					<td><?=$non_sale_price; ?> 원</td>
					<td><b><?=$sale_price; ?> 원</b></td>
				</tr>
<?
			}
?>
		</table>
	</div>
</div>

<!--  Pagination -->
<?
	echo $pagebar;
?>
<br><br><br>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
