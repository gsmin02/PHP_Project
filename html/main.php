<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "common.php";
	
	$page_line=16;
	$sql="select * from product where icon_new=1 and status=1 order by rand()"; // order by rand() 추가 시 랜덤 기능(페이지 변경 시 다시 랜덤)
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
<? include "main_top_slide.php"; ?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<!--  제목  -->
<div class="row mt-5 mb-1">
	<div class="col" align="center">
		<h2 style="font-family: 'Georgia'">New Arriable</h2>
	</div>	
</div>


<!--  상품 진열  -->
<div class="row">
<?
	foreach ($result as $row) {
?>
	<div class="col-sm-3 mb-2">
		<div class="card h-100">
			<div class="zoom_image" align="center">
				<a href="product.php?id=<?=$row['id']; ?>"><img src="product/<?=$row['image1']; ?>" 
					height="360" class="card-img-top img-fluid"></a>
			</div>
			<div class="card-body bg-light" align="center" style="font-size:15px;">
				<div class="card-title">
					<a href="product.php?id=<?=$row['id']; ?>" style="font-weight:bold;font-size:20px;color:#000"><?=$row['name']; ?></a><br>
					<?
					if($row['icon_hit'] == 1) {
						echo "<img src='images/i_hit.gif'>&nbsp;";
					}
					if($row['icon_new'] == 1) {
						echo "<img src='images/i_new.gif'>&nbsp;";
					}
					if($row['icon_sale'] == 1) {
						$discount = $row['discount'];
						echo "<img src='images/i_sale.gif'>&nbsp;&nbsp;<font size='4'>$discount%</font>";
					}
					?>
				</div>
				<?
				$price = $row["price"];
				$non_sale_price = number_format($price);
				if($row['icon_sale'] == 0) {
					echo "<p class='card-text'><b>￦ $non_sale_price</b><br></p>";
				}
				if($row['icon_sale'] == 1) {
					$sale_price = number_format(round($price*(100-$discount)/100, -3));
					echo "<p class='card-text'><b>￦ $sale_price</b>&nbsp;&nbsp;<small><strike>$non_sale_price</strike></small></p>";
				}
				?>
				
			</div>
		</div>
	</div>
<?
	}
?>
</div>

<?
	echo $pagebar;
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
