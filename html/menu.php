<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "common.php";
	
	$page_line=20;
	
	$menu = $_REQUEST["menu"] ? $_REQUEST["menu"] : 1;
	$sort = $_REQUEST["sort"] ? $_REQUEST["sort"] : 1;

	if ($sort==1) {
		$sql="and icon_new=1 order by id desc"; // 신상품
	}
	elseif ($sort==2) {
		$sql="and icon_hit=1 order by id desc"; // 인기상품
	}
	elseif ($sort==3) {
		$sql="order by name"; // 이름순
	}
	elseif ($sort==4) {
		$sql="order by (price*(100-discount)/100)"; // 낮은 가격순 + 세일된 가격순
	}
	else {
		$sql="order by (price*(100-discount)/100) desc"; // 높은 가격순 + 세일된 가격순
	}
	
	$sql="select * from product where menu=$menu and status=1 " . $sql;
	$result_query=mysqli_query($db,$sql);
	if (!$result_query) exit("에러:$sql");
	
	$count=mysqli_num_rows($result_query);	// 레코드개수
	$args="menu=$menu&sort=$sort";
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

<!--  Category 제목 -->
<div class="row mt-5">
	<div class="col" align="center">
		<h2><?=$a_menu_flatList[$menu]; ?></h2>
	</div>	
</div>	

<!--  상품개수 & 정렬 -->
<div class="row m-0">
	<div class="col-2" align="left" style="font-size:15px">
		Total <b><?=$count; ?></b> items
	</div>
	<div class="col" align="right" style="font-size:16px">
<?
		$a_sort = array("정렬상태","NEW","HIT","NAME","LOW","HIGH");
		$n_sort=count($a_sort);

		for($i=1;$i<$n_sort;$i++)
		{
		   if ($i==$sort) {
			  echo("<a href='menu.php?menu=$menu&sort=$i'><b><font style='font-weight:bold;'>$a_sort[$i]</font></b></a>");
			  if($i != $n_sort - 1)
				  echo("&nbsp;|&nbsp;");
		   }
		   else {
			  echo("<a href='menu.php?menu=$menu&sort=$i'>$a_sort[$i]</a>");
			  if($i != $n_sort - 1)
				  echo("&nbsp;|&nbsp;");
		   }
		}
?>
</div>
<hr class="mt-0 mb-4">
<!--  상품 진열  -->
<div class="row">
<?
	if($count == 0) {
		?>
		<div align="center">
			<hr><br><br>
			<h4>No NEW item.</h4>
			<br><br>
			<h5>Serach other item or Set filter.</h5>
			<br><br><hr>
		</div>
		<?
	}
?>
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
					echo "<p class='card-text'><b>$non_sale_price ￦</b><br></p>";
				}
				if($row['icon_sale'] == 1) {
					$sale_price = number_format(round($price*(100-$discount)/100, -3));
					echo "<p class='card-text'><small><strike>$non_sale_price ￦</strike></small>&nbsp;&nbsp;<b>$sale_price ￦</b></p>";
				}
				?>
				
			</div>
		</div>
	</div>
<?
	}
?>
</div>

<!--  Pagination -->
<?
	echo $pagebar;
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<!-- 화면 하단 (main_bottom) : 회사소개/이용안내/개인보호정책 -->

<? include "main_bottom.php"; ?>

<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
