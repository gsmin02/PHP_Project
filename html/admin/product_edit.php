<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "../common.php";
	
	$id = $_REQUEST["id"];
	$sql_product = "select * from product where id=$id";
	$result_product=mysqli_query($db, $sql_product);
	if(!$result_product) exit("에러: $sql");
	
	$row_product=mysqli_fetch_array($result_product);
	
	$sql_opt = "select * from opt order by name DESC";
	$result_opt=mysqli_query($db, $sql_opt);
	if(!$result_opt) exit("에러: $sql");
	
	$row_opt=mysqli_fetch_array($result_opt);
	
	$code=$row_product['code'];
	$code=stripslashes($code);
	$name=$row_product['name'];
	$name=stripslashes($name);
	$coname=$row_product['coname'];
	$coname=stripslashes($coname);
	$contents=$row_product['contents'];
	$contents=stripslashes($contents);
	
	$image1 = $row_product['image1'];
	if($image1 == null)
		$image1 = "p1.png";
	$image2 = $row_product['image2'];
	if($image2 == null)
		$image2 = "p2.png";
	$image3 = $row_product['image3'];
	if($image3 == null)
		$image3 = "p3.png";
	
?>
<!doctype html>
<html lang="kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INDUK Mall</title>
	<link  href="../css/bootstrap.min.css" rel="stylesheet">
	<link  href="../css/my.css" rel="stylesheet">
	<script src="../js/jquery-3.7.1.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/my.js"></script>
</head>
<body>

<div class="container">
<!-------------------------------------------------------------------------------------------->	
<script> document.write(admin_menu());</script>
<!-------------------------------------------------------------------------------------------->	
<script>
	function imageView(strImage)
	{
		this.document.images["big"].src = strImage;
	}
</script>

<form name="form1" method="post" action="product_update.php" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?=$id; ?>">
<input type="hidden" name="fimage1" value="<?=$image1; ?>">
<input type="hidden" name="fimage2" value="<?=$image2; ?>">
<input type="hidden" name="fimage3" value="<?=$image3; ?>">
<input type="hidden" name="sel1" value="">
<input type="hidden" name="sel2" value="">
<input type="hidden" name="sel3" value="">
<input type="hidden" name="sel4" value="">
<input type="hidden" name="text1" value="">
<input type="hidden" name="page" value="1">
<input type="hidden" name="no" value="1">

<div class="row mx-1  justify-content-center">
	<div class="col" align="center">

		<h4 class="m-0 mb-3">제품</h4>

		<table class="table table-sm table-bordered myfs12 m-0 p-0">
			<tr>
				<td width="15%" class="bg-light">상품분류</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
<?
						echo("<select name='menu' class='form-select form-select-sm bg-light myfs12'>");
						for($i=0; $i<$n_menu_flatList; $i++)
						{
							$tmp_menu = ($i==$row_product['menu']) ? "selected" : "";
							echo("<option value='$i' $tmp_menu>$a_menu_flatList[$i]</option>");
						}
						echo("</select>&nbsp;");
?>

					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">삼품코드</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="code" size="20" value="<?=$code; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">삼품명</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="name" size="80" value="<?=$name; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">제조사</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="coname" size="30" value="<?=$coname; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">판매가</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="price" size="12" value="<?=$row_product['price']; ?>" class="form-control form-control-sm">
					</div> 원
				</td>
			</tr>
			<tr>
				<td class="bg-light">옵션</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<select name="opt1" class="form-select form-select-sm bg-light myfs12 me-2" style="width:100px">
<?
							foreach ($result_opt as $row_opt)
							{
								$id_opt=$row_opt["id"];
								$name_opt=$row_opt["name"];
								$tmp_opt1 = ($id_opt==$row_product['opt1']) ? "selected" : "";
?>
								<option value="<?=$id_opt; ?>" <?=$tmp_opt1; ?>><?=$name_opt; ?></option>
<?
							}
?>
						</select>
						<select name="opt2" class="form-select form-select-sm bg-light myfs12 me-2" style="width:100px">
<?
							foreach ($result_opt as $row_opt)
							{
								$id_opt=$row_opt["id"];
								$name_opt=$row_opt["name"];
								$tmp_opt2 = ($id_opt==$row_product['opt2']) ? "selected" : "";
?>
								<option value="<?=$id_opt; ?>" <?=$tmp_opt2; ?>><?=$name_opt; ?></option>
<?
							}
?>
						</select>&nbsp;
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">제품설명</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<textarea name="contents" rows="5" cols="80" class="form-control form-control-sm myfs12"><?=$contents; ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">삼품상태</td>
				<td align="left" class="ps-2">
				
					<div class="form-check form-check-inline pt-2">
						<input class="form-check-input" type="radio" name="status" value="1" <? if ($row_product["status"]==1) { echo("checked");} ?>>
						<label class="form-check-label me-2">판매중</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="2" <? if ($row_product["status"]==2) { echo("checked");} ?>>
						<label class="form-check-labe me-2">판매중지</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="3" <? if ($row_product["status"]==3) { echo("checked");} ?>>
						<label class="form-check-label me-2">품절</label>
					</div>
					
				</td>
			</tr>
			<tr>
				<td class="bg-light">아이콘</td>
				<td align="left" class="ps-2">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" value="1" name="icon_new" <? if ($row_product["icon_new"]==1) { echo("checked");} ?>>
							<label class="form-check-label me-2">New</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" value="1" name="icon_hit" <? if ($row_product["icon_hit"]==1) { echo("checked");} ?>>
							<label class="form-check-label me-2">Hit</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" value="1" name="icon_sale" <? if ($row_product["icon_sale"]==1) { echo("checked");} ?>>
							<label class="form-check-label me-2">sale</label>
						</div>
						할인율: &nbsp;
						<div class="d-inline-flex">
							<input type="text" name="discount" value="<?=$row_product['discount']; ?>" size="2" maxlength="3" class="form-control form-control-sm">
						</div> %
				</td>
			</tr>
			<tr>
				<td class="bg-light">등록일</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="date" name="regday" value="<?=$row_product['regday']; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">이미지<br>(삭제할 그림 체크)</td>
				<td align="left" class="ps-2">
					<table class="my-1">
					<tr>
						<td>
							<img src="../product/<?=$image1; ?>" width="50" height="50" class="img-thumbnail" style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
   onclick="document.getElementById('zoomModalLabel').innerText='<?=$image1; ?>'; picname.src='../product/<?=$image1; ?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="checkbox" name="checkno1" value="1">
							<b>이미지1 : </b>&nbsp;<?=$image1; ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image1" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
					<table class="mb-1">
					<tr>
						<td>
							<img src="../product/<?=$image2; ?>" width="50" height="50" class="img-thumbnail" style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
   onclick="document.getElementById('zoomModalLabel').innerText='<?=$image2; ?>'; picname.src='../product/<?=$image2; ?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="checkbox" name="checkno2" value="1">
							<b>이미지2 : </b>&nbsp;<?=$image2; ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image2" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
					<table class="mb-1">
					<tr>
						<td>
							<img src="../product/<?=$image3; ?>" width="50" height="50" class="img-thumbnail" style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
   onclick="document.getElementById('zoomModalLabel').innerText='<?=$image3; ?>'; picname.src='../product/<?=$image3; ?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="checkbox" name="checkno3" value="1">
							<b>이미지3 : </b>&nbsp;<?=$image3; ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image3" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
				</td>
			</tr>
		</table>

		<a href="javascript:form1.submit();"  class="btn btn-sm btn-dark text-white my-2">&nbsp;저 장&nbsp;</a>&nbsp;
		<a href="javascript:history.back();"  class="btn btn-sm btn-outline-dark my-2">&nbsp;돌아가기&nbsp;</a>

	</div>
</div>
<br>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>

<!-- Zoom Modal 이미지 -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="zoomModalLabel">상품명1</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" align="center">
				<img src="#" name="picname" class="img-fluid img-thumbnail" style='cursor:pointer' data-bs-dismiss="modal">
			</div>
		</div>
	</div>
</div>