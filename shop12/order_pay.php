<!---------------------------------------------------------------------------------------------
	제목 : PHP 쇼핑몰 실무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "common.php";

	$cart = $_COOKIE["cart"];
	$n_cart = $_COOKIE["n_cart"];
	
	$total = 0;
	if (!$n_cart) $n_cart = 0;
	
	$o_name = 	$_REQUEST["o_name"];
	$o_tel1 = 	$_REQUEST["o_tel1"];
	$o_tel2 = 	$_REQUEST["o_tel2"];
	$o_tel3 = 	$_REQUEST["o_tel3"];
	$o_tel = 	sprintf("%-3s%-4s%-4s", $o_tel1, $o_tel2, $o_tel3);
	$o_email = 	$_REQUEST["o_email"];
	$o_zip = 	$_REQUEST["o_zip"];
	$o_juso = 	$_REQUEST["o_juso"];
	
	$r_name = 	$_REQUEST["r_name"];
	$r_tel1 = 	$_REQUEST["r_tel1"];
	$r_tel2 = 	$_REQUEST["r_tel2"];
	$r_tel3 = 	$_REQUEST["r_tel3"];
	$r_tel = 	sprintf("%-3s%-4s%-4s", $r_tel1, $r_tel2, $r_tel3);
	$r_email = 	$_REQUEST["r_email"];
	$r_zip = 	$_REQUEST["r_zip"];
	$r_juso = 	$_REQUEST["r_juso"];
	$memo = 	$_REQUEST["memo"];
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
	function Check_Value() 
	{
		if (form2.pay_kind[0].checked)
		{
			if (form2.card_kind.value==0) {
				alert("카드종류를 선택하세요.");	form2.card_kind.focus();	return;
			}
			if (!form2.card_no1.value) {
				alert("카드번호를 입력하세요.");	form2.card_no1.focus();	return;
			}
			if (!form2.card_no2.value) {
				alert("카드번호를 입력하세요.");	form2.card_no2.focus();	return;
			}
			if (!form2.card_no3.value) {
				alert("카드번호를 입력하세요.");	form2.card_no3.focus();	return;
			}
			if (!form2.card_no4.value) {
				alert("카드번호를 입력하세요.");	form2.card_no4.focus();	return;
			}
			if (!form2.card_month.value) {
				alert("카드기간 월을 입력하세요.");	form2.card_month.focus();	return;
			}
			if (!form2.card_year.value) {
				alert("카드기간 년도를 입력하세요.");	form2.card_year.focus();	return;
			}
			if (!form2.card_pw.value) {
				alert("카드 비밀번호 뒷의 2자리를 입력하세요.");	form2.card_pw.focus();	return;
			}
		}
		else
		{
			if (form2.bank_kind.value==0) {
				alert("입금할 은행을 선택하세요.");	form2.bank_kind.focus();	return;
			}
			if (!form2.bank_sender.value) {
				alert("입금자 이름을 입력하세요.");	form2.bank_sender.focus();	return;
			}
		}
		form2.card_kind.disabled = false;
		form2.card_no1.disabled = false;
		form2.card_no2.disabled = false;
		form2.card_no3.disabled = false;
		form2.card_no4.disabled = false;
		form2.card_year.disabled = false;
		form2.card_month.disabled = false;
		form2.card_pw.disabled = false;
		form2.card_halbu.disabled = false;
		form2.bank_kind.disabled = false;
		form2.bank_sender.disabled = false;
		
		form2.submit();
	}

	function PaySel(n) 
	{
		if (n == 0) {
			form2.card_kind.disabled = false;
			form2.card_no1.disabled = false;
			form2.card_no2.disabled = false;
			form2.card_no3.disabled = false;
			form2.card_no4.disabled = false;
			form2.card_year.disabled = false;
			form2.card_month.disabled = false;
			form2.card_halbu.disabled = false;
			form2.card_pw.disabled = false;
			form2.bank_kind.disabled = true;
			form2.bank_sender.disabled = true;
		}
		else {
			form2.card_kind.disabled = true;
			form2.card_no1.disabled = true;
			form2.card_no2.disabled = true;
			form2.card_no3.disabled = true;
			form2.card_no4.disabled = true;
			form2.card_year.disabled = true;
			form2.card_month.disabled = true;
			form2.card_halbu.disabled = true;
			form2.card_pw.disabled = true;
			form2.bank_kind.disabled = false;
			form2.bank_sender.disabled = false;
		}
	}
</script>

<div class="row m-1 mb-0">
	<div class="col" align="center">

		<h4 class="m-3">주문(결제정보)</h4>
		<hr class="m-0">
		
		<table class="table table-sm mb-5">
			<tr height="40" class="bg-light">
				<td width="15%">이미지</td>
				<td width="35%">상품정보</td>
				<td width="15%">판매가</td>
				<td width="20%">수량</td>
				<td width="15%">금액</td>
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
				<td><?=$cart_num; ?></td>
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
	</div>
</div>

<!-- form2 시작 -->
<form name="form2" method="post" action="order_inert.php">

<input type="hidden" name="o_name"	value="<?=$o_name; ?>">
<input type="hidden" name="o_tel"	value="<?=$o_tel; ?>">
<input type="hidden" name="o_email"	value="<?=$o_email; ?>">
<input type="hidden" name="o_zip"	value="<?=$o_zip; ?>">
<input type="hidden" name="o_juso"	value="<?=$o_juso; ?>">

<input type="hidden" name="r_name"	value="<?=$r_name; ?>">
<input type="hidden" name="r_tel"	value="<?=$r_tel; ?>">
<input type="hidden" name="r_email"	value="<?=$r_email; ?>">
<input type="hidden" name="r_zip"	value="<?=$r_zip; ?>">
<input type="hidden" name="r_juso"	value="<?=$r_juso; ?>">
<input type="hidden" name="memo"	value="<?=$memo; ?>">

<div class="row mx-1 my-0">
	<div class="col" align="center">

		<font size="4" color="#B90319">결제방법</font>
		<hr class="m-0 my-2">
					
		<table width="90%" style="font-size:13px;">
			<tr height="40">
				<td width="40%" align="right" class="pe-4">결제선택</td>
				<td align="left">
					<div class="d-inline-flex mt-2">
						<div class="form-check me-2">
							<input class="form-check-input" type="radio" name="pay_kind" value="0" 
								onclick="javascript:PaySel(0);" checked>
							<label class="form-check-label me-2">카드</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="pay_kind" value="1" 
								onclick="javascript:PaySel(1);">
							<label class="form-check-label">무통장</label>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<br><br>
		
		<font size="4" color="#B90319">카드</font>
		<hr class="m-0 my-2">
		
		<table width="90%" style="font-size:13px;">
			<tr height="40">
				<td  width="40%" align="right" class="pe-4">카드종류</td>
				<td align="left">
					<div class="d-inline-flex">
						<select name="card_kind" class="form-select form-select-sm myfs13">
							<option value="0" selected>카드종류를 선택하세요.</option>
							<option value="1">국민카드</option>
							<option value="2">신한카드</option>
							<option value="3">우리카드</option>
							<option value="4">하나카드</option>
						</select>
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">카드번호</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="card_no1" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">&nbsp;
						<input type="text" name="card_no2" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">&nbsp;
						<input type="text" name="card_no3" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">&nbsp;
						<input type="text" name="card_no4" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">카드기간</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="card_month" size="2" maxlength="2" value="" 
							class="form-control form-control-sm">
						<div class="ms-1 mt-2">월</div>&nbsp;&nbsp;
						<input type="text" name="card_year" size="2" maxlength="2" value="" 
							class="form-control form-control-sm">
						<div class="ms-1 mt-2">년</div>
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">카드비밀번호</td>
				<td align="left">
					<div class="d-inline-flex">
						<div class="mt-2 fs-6">**</div>&nbsp;
						<input type="password" name="card_pw" size="2" maxlength="2" value="" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">할부</td>
				<td align="left">
					<div class="d-inline-flex">
						<select name="card_halbu" class="form-select form-select-sm myfs13">
							<option value="0" selected>일시불</option>
							<option value="3">3 개월</option>
							<option value="6">6 개월</option>
							<option value="9">9 개월</option>
							<option value="12">12 개월</option>
						</select>
					</div>
				</td>
			</tr>
		</table>
				
		<br><br>
		<font size="4" color="#B90319">무통장</font>
		<hr class="m-0 my-2">
		
		<table width="90%" style="font-size:13px;">
			<tr height="40">
				<td width="40%" align="right" class="pe-4">카드종류</td>
				<td align="left">
					<div class="d-inline-flex">
						<select name="bank_kind" class="form-select form-select-sm myfs13"  disabled>
							<option value="0" selected>입금할 은행을 선택하세요.</option>
							<option value="1">국민은행 111-00000-0000</option>
							<option value="2">신한은행 222-00000-0000</option>
						</select>
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" class="pe-4">입금자이름</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="bank_sender" size="20" value="" 
							class="form-control form-control-sm" disabled>
					</div>
				</td>
			</tr>
		</table>

	</div>
<div>
<br>

<div class="row">
	<div class="col" align="center">
		<a href="javascript:Check_Value()"  class="btn btn-sm btn-dark text-white">&nbsp;결제하기&nbsp;</a>
	</div>
</div>

</form>

<br><br><br>

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
