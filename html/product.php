<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "common.php";
	
	$id = $_REQUEST["id"];
	
	$sql="select * from product where id=$id";
	$result=mysqli_query($db,$sql);
	if (!$result) exit("에러:$sql");
	$row=mysqli_fetch_array($result);
	
	$contents=$row['contents'];
	$contents=stripslashes($contents);
	
	$icon_hit = $row['icon_hit'];
	$icon_new = $row['icon_new'];
	$icon_sale = $row['icon_sale'];
	
	$price = $row['price'];
	$discount = $row['discount'];
	$non_sale_price = number_format($price);
	$sale_price = number_format(round($price*(100-$discount)/100, -3));
	if($icon_sale == 1) {
		$total_price = round($price*(100-$discount)/100, -3);
	}
	else {
		$total_price = $price;
	}
	
	$sql_opt1 = "select * from opt where id=$row[opt1]";
	$result_opt1=mysqli_query($db,$sql_opt1);
	if (!$result_opt1) exit("에러:$sql_opt1");
	$row_opt1=mysqli_fetch_array($result_opt1);
	
	$sql_opt2 = "select * from opt where id=$row[opt2]";
	$result_opt2=mysqli_query($db,$sql_opt2);
	if (!$result_opt2) exit("에러:$sql_opt2");
	$row_opt2=mysqli_fetch_array($result_opt2);
	
	$sql_opts1 = "select * from opts where opt_id=$row[opt1]";
	$result_opts1=mysqli_query($db,$sql_opts1);
	if (!$result_opts1) exit("에러:$sql_opts1");
	$row_opts1=mysqli_fetch_array($result_opts1);
	
	$sql_opts2 = "select * from opts where opt_id=$row[opt2]";
	$result_opts2=mysqli_query($db,$sql_opts2);
	if (!$result_opts2) exit("에러:$sql_opts2");
	$row_opts2=mysqli_fetch_array($result_opts2);
	
	$imagename2 = $row['image2'] ? $row['image2'] : "nopic.png";
	
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

<!--  현재 페이지 Javascript  -------------------------------------------->
<script >
	function cal_price() 
	{
		form2.prices.value = (form2.num.value * form2.price.value).toLocaleString();
		form2.num.focus();
	}

	function check_form2(str) 
	{
		if (form2.opts1.value==0) {
			alert("옵션1을 선택하십시요.");
			form2.opts1.focus();
			return;
		}
	<?
	if($row_opt2['name']) {
	?>
		if (form2.opts2.value==0) {
			alert("옵션2를 선택하십시요.");
			form2.opts2.focus();
			return;
		}
	<?
	}
	?>
		if (!form2.num.value) {
			alert("수량을 입력하십시요.");
			form2.num.focus();
			return;
		}
		if (str == "D") {
			form2.action = "cart_edit.php";
			form2.kind.value = "order";
			form2.submit();
		}
		else {
			form2.action = "cart_edit.php";
			form2.submit();
		}
	}
</script>

<!-- form2 시작  -->
<form name="form2" method="post" action="">
<input type="hidden" name="kind" value="insert">
<input type="hidden" name="id" value="<?=$id; ?>">
<input type="hidden" name="price" value="<?=$total_price; ?>">

<!--  상품 사진/정보(제품명,가격,옵션)  -->
<div class="row mx-1 my-4">
	<div class="col" align="center">
		
		<table class="table table-sm table-borderless">
			<tr>
				<td valign="top" align="left" width="50%">
					<img src="product/<?=$row['image2']; ?>"
						class="img-thumbnail img-fluid mt-2"  style="cursor:zoom-in" 
						data-bs-toggle="modal" data-bs-target="#zoomModal">
				</td>
				<td  width="50%" align="center" valign="top" class="px-0">
					<hr size="5px" width="100%" class="my-2">
					<table width="100%" style="font-size:12px;" class="table table-sm table-borderless p-0 m-0">
						<tr height="50">
							<td colspan="2"  align="center" style="font-weight:bold;font-size:20px; color: #222222;">
								<?=$row['name']; ?>
							</td>
						</tr>
						<tr height="35">
							<td colspan="2" align="center">
<?
								if($icon_hit == 1) {
									echo "<img src='images/i_hit.gif'>&nbsp;";
								}
								if($icon_new == 1) {
									echo "<img src='images/i_new.gif'>&nbsp;";
								}
								if($icon_sale == 1) {
									echo "<img src='images/i_sale.gif'>&nbsp;&nbsp;<font size='4'>$discount%</font>";
								}
?>
							</td>
						</tr>
						<tr><td colspan="2"><hr class="my-2"></td></tr>
<?
						if($icon_sale == 1) {
?>
							<tr height="35">
								<td width="30%" align="center">판매가</td>
								<td width="70%" align="left" style="font-size:15px;"><strike><?=$non_sale_price; ?></strike></td>
							</tr>
							<tr height="35">
								<td  align="center">할인가</td>
								<td style="font-size:15px;" align="left"><?=$sale_price; ?></td>
							</tr>
<?
							
						}
						else {
?>
							<tr height="35">
								<td width="30%" align="center">판매가</td>
								<td width="70%" align="left" style="font-size:15px;"><?=$non_sale_price; ?></td>
							</tr>
<?
						}
?>
						<tr><td colspan="2"><hr class="my-2"></td></tr>
						<tr>
							<td align="center"><?=$row_opt1['name']; ?></td>
							<td  align="left">
								<select name="opts1" class="form-select form-select-sm mb-2" style="width:90%;font-size:12px;color:#000">
									<option value="0" selected>[필수] 옵션을 선택하세요.</option>
<?
									foreach ($result_opts1 as $row_opts1) {
										$id_opts1 = $row_opts1['id'];
										$name_opts1 = $row_opts1['name'];
										echo("<option value='$id_opts1'>$name_opts1</option>");
									}
?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="center"><?=$row_opt2['name']; ?></td>
							<td  align="left">
							<?
								if($row_opt2['name']) {
							?>
								<select name="opts2" class="form-select form-select-sm" style="width:90%;font-size:12px;">
									<option value="0" selected>[필수] 옵션을 선택하세요.</option>
<?
									foreach ($result_opts2 as $row_opts2) {
										$id_opts2 = $row_opts2['id'];
										$name_opts2 = $row_opts2['name'];
										echo("<option value='$id_opts2'>$name_opts2</option>");
									}
?>
								</select>
							<?
								}
							?>
							</td>
						</tr>
						<tr><td colspan="2"><hr class="my-2"></td></tr>
						<tr>
							<td align="center">수량</td>
							<td  align="left">
								<div class="d-inline-flex">
									<input type="text" name="num" size="5" value="1" 
										class="form-control form-control-sm" style="text-align:center;"
										onChange="javascript:cal_price()">
								</div>
							</td>
						</tr>
						<tr>
							<td align="center">금액</td>
							<td align="left">
								<div class="d-inline-flex">
									<input type="text" name="prices" value="<?=number_format($total_price); ?>" size="10" 
										class="form-control form-control-sm"
										style="border:0;background-color:white;text-align:left;font-size:18px;font-weight:bold;" readonly>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="font-size:15px;">
								<a href="javascript:check_form2('D')"
									style="display: inline-block; width: 100%; padding: 10px 0; background-color: #333; color: #fff; text-align: center; text-decoration: none;">
									<i class="fas fa-dollar-sign"></i>&nbsp;
									Buy Now
								</a>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="font-size:15px;">
							<a href="javascript:check_form2('C')"
									style="display: inline-block; width: 100%; padding: 10px 0; background-color: #fff; color: #333; text-align: center; text-decoration: none;"
									onmouseover="this.style.backgroundColor='#333'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#fff'; this.style.color='#333';">
								<i class="fas fa-shopping-bag" style="margin-right: 8px;"></i>&nbsp;
								Add to Cart
							</a>
							</td>
						</tr>
					</table>

				</td>
			</tr>
		</table>

	</div>
</div>

</form>
<!-- form2 끝 -->

<hr class="my-0 mx-3">

<div align="center">
	<?=$contents; ?>
	<br><br>
	<?
	if($row['image3']) {
		$image3 = $row['image3'];
		echo "<br><img src='product/$image3' class='img-thumbnail' style='border:0'>";
	}
	?>
</div>

<br><br>

<!-- Zoom Modal 이미지 -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="zoomModalLabel"><?=$row['name']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div align="center" class="modal-body">
        <img src="product/<?=$imagename2; ?>" class="img-thumbnail" style="cursor:pointer" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
      </div>
    </div>
  </div>
</div>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
