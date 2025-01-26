<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "common.php";
	
	$cart = $_COOKIE["cart"];
	$n_cart = $_COOKIE["n_cart"];
	
	$total = 0;
	if (!$n_cart) $n_cart = 0;

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

<!--  Title과  메뉴(로그인/회원가입/장바구니/주문조회/게시판/Q&A) -->

<?
	include "main_top.php";
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<script>
	function cart_edit(kind,pos) 
	{
		if (kind=="deleteall") 
			location.href = "cart_edit.php?kind=deleteall";
		else if (kind=="delete")
			location.href = "cart_edit.php?kind=delete&pos="+pos;
		else if (kind=="insert")	
		{
			var num=eval("form2.num"+pos).value;
			location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
		}
		else if (kind=="update")	
		{
			var num=eval("form2.num"+pos).value;
			location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
		}
	}
</script>

<!-- form2 시작 -->
<form name="form2" method="post" action="">

<div class="row m-3 mb-0">
	<div class="col" align="center">

		<h4 class="my-3">장바구니</h4>

		<hr class="m-0">
		<table class="table table-sm mb-5">
			<tr height="40" class="bg-light">
				<td width="10%">이미지</td>
				<td width="35%">상품정보</td>
				<td width="10%">판매가</td>
				<td width="20%">수량</td>
				<td width="10%">금액</td>
				<td width="10%">삭제</td>
			</tr>
			
			<!-- 제품 출력 PHP -->
<?
			for ($i=1;  $i<=$n_cart;  $i++) {
				if ($cart[$i]) {
					list($cart_id, $cart_num, $cart_opts1, $cart_opts2) = explode("^", $cart[$i]);
					
					$sql_opts1 = "select * from opts where id = $cart_opts1";
					$result_opts1=mysqli_query($db,$sql_opts1);
					if (!$result_opts1) exit("에러:$sql_opts1");
					$row_opts1=mysqli_fetch_array($result_opts1);
					
					if($cart_opts2) {
						$sql_opts2 = "select * from opts where id = $cart_opts2";
						$result_opts2=mysqli_query($db,$sql_opts2);
						if (!$result_opts2) exit("에러:$sql_opts2");
						$row_opts2=mysqli_fetch_array($result_opts2);
						$opt2 = $row_opts2['name'];
					}
					else {
						$opt2 = null;
					}
					
					$sql_product = "select * from product where id = $cart_id";
					$result_product=mysqli_query($db,$sql_product);
					if (!$result_product) exit("에러:$sql_product");
					$row_product=mysqli_fetch_array($result_product);
					
					$product_id = $row_product['id'];
					$product_name = $row_product['name'];
					
					$product_icon_sale = $row_product['icon_sale'];
					$product_image1 = $row_product['image1'];
					
					$product_price = $row_product['price'];
					$product_discount = $row_product['discount'];
					
					$product_sale_price = number_format(round($product_price*(100-$product_discount)/100, -3));
					$product_non_sale_price = number_format($product_price);
					
					$product_price_total = $product_price * $cart_num;
					$product_sale_price_total = number_format(round($product_price_total*(100-$product_discount)/100, -3));
					$product_non_sale_price_total = number_format($product_price_total);
?>
					<tr height="85" style="font-size:14px;">
						<td>
							<a href="product.php?id=<?=$product_id; ?>"><img src="product/<?=$product_image1; ?>" width="60" height="70"></a>
						</td>
						<td align="left" valign="middle">
							<a href="product.php?id=<?=$product_id; ?>" style="color:#0066CC"><?=$product_name; ?></a><br>
							<small><b>[옵션]</b> <?=$row_opts1['name']; ?> &nbsp; <?=$opt2; ?></small>
						</td>
<?
						if($product_icon_sale == 1) {
?>
							<td><?=$product_sale_price; ?></td>
<?
						}
						else {
?>
							<td><?=$product_non_sale_price; ?></td>
<?
						}
?>
						<td>
							<div class="d-inline-flex">
								<input type="text"  name="num<?=$i; ?>" size="2" value="<?=$cart_num; ?>" class="form-control form-control-sm text-center">
							</div>
							<a href = "javascript:cart_edit('update','<?=$i; ?>')" class="btn btn-sm mybutton mb-1" style="color:#0066CC">수정</a> 
						</td>
<?
						if($product_icon_sale == 1) {
							$total = $total + round($product_price_total*(100-$product_discount)/100, -3);
?>
							<td><?=$product_sale_price_total; ?></td>
<?
						}
						else {
							$total = $total + $product_price_total;
?>
							<td><?=$product_non_sale_price_total; ?></td>
<?
						}
?>
						<td>
							<a href = "javascript:cart_edit('delete','<?=$i; ?>')" class="btn btn-sm mybutton" style="color:#D06404">삭제</a> 
						</td>
					</tr>
<?
				}
			}
?>
			<!-- 배송비 출력 -->
			<tr height="40" align="right" class="bg-light" style="font-size:14px;">
				<td width="10%" align="center"><img src="images/cart_image1.gif" border="0"></td>
				<td width="90%" colspan="5" class="pe-4">
				<?
				if($total >= $max_baesongbi) {
					$baesongbi = 0;
				}
				$total_price = $total + $baesongbi;
				?>
					<font color="#0066CC">총 합계금액</font> : 상품구매금액( <?=number_format($total); ?> ) + 배송비( <?=number_format($baesongbi); ?> ) = <font style="font-size:16px"><b><?=number_format($total_price); ?></b></font>
				</td>
			</tr>
		</table>

		<a href="index.html"  class="btn btn-sm btn-outline-secondary mx-1">&nbsp;계속 쇼핑하기&nbsp;</a>
		<a href="javascript:cart_edit('deleteall',0)"  class="btn btn-sm btn-outline-secondary mx-1">&nbsp;장바구니 비우기&nbsp;</a>
		<a href="order.php"  class="btn btn-sm btn-dark text-white mx-1">&nbsp;결재하기&nbsp;</a>

	</div>
</div>

</form>

<br><br><br><br><br><br><br><br><br>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<!-- 화면 하단 (main_bottom) : 회사소개/이용안내/개인보호정책 -->

<?
	include "main_bottom.php";
?>

<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
