<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "../common.php";
	include "admin_check.php";
	
	$day1 = $_REQUEST["day1"] ? $_REQUEST["day1"] : date("Y-m-d");
	$day2 = $_REQUEST["day2"] ? $_REQUEST["day2"] : date("Y-m-d", strtotime("-1 month"));
	$sel1 = $_REQUEST["sel1"] ? $_REQUEST["sel1"] : 0;
	$sel2 = $_REQUEST["sel2"] ? $_REQUEST["sel2"] : 1;
	$text1 = $_REQUEST["text1"] ? $_REQUEST["text1"] : "";
	$page1 = $_REQUEST["page"] ? $_REQUEST["page"] : 1;
	
	$a_sel1 = array("전체","주문신청", "주문확인", "입금확인", "배달중", "주문완료", "주문취소");
	$n_sel1 = count($a_sel1);
	$a_sel2 = array("주문번호", "고객명", "상품명");
	$n_sel2 = count($a_sel2);
	
	$o1_day = substr($day1,0,4) . substr($day1,5,2) . substr($day1,8,2);
	$o2_day = substr($day2,0,4) . substr($day2,5,2) . substr($day2,8,2);
	$o_day = " where jumunday between " . $o2_day . " and " . $o1_day . " ";
	
	if ($sel1 != 0) { $s = " and state=" . $sel1 . " "; }
	if ($sel2 == 1) { $o = "order by id DESC"; }
	else if ($sel2 == 2) { $o = "order by o_name"; }
	else if ($sel2 == 3) { $o = "order by product_names"; }
	
	$sql="select * from jumun". $o_day . $s . $o;
	
	// 레코드 개수 구하는 Query
	$result=mysqli_query($db,$sql);
	if (!$result) exit("에러:$sql");
	$count=mysqli_num_rows($result);
	
	// 페이지 표시하는 Query
	$args="day1=$day1&day2=$day2&sel1=$sel1&sel2=$sel2&text1=$text1";
	$result = mypagination($sql, $args, $count, $pagebar);
	if (!$result) exit("에러: $sql");
	
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
	function go_update(id,pos)
	{
		state=form1.state[pos].value;
		location.href="jumun_update.php?id="+id+"&state="+state+"&page="+<?=$page1 ?>+
			"&sel1="+form1.sel1.value+"&sel2="+form1.sel2.value+"&text1="+form1.text1.value+
			"&day1="+form1.day1.value+"&day2="+form1.day2.value;
	}
</script>

<div class="row mx-1 justify-content-center">
	<div class="col" align="center">

		<h4 class="m-0 mb-3">주문</h4>

		<form name="form1" method="post" action="jumun.php">
		
		<table class="table table-sm table-borderless m-0 p-0">
			<tr>
				<td width="20%" align="left" style="padding-top:8px">
					주문수 : <font color="red"><?=$count; ?></font>
				</td>
				<td align="right">
				
					기간:
					<div class="d-inline-flex">
						<input type="date" name="day1" value="<?=$day1; ?>" 
							class="form-control form-control-sm"  style="width:120px" >~
						<input type="date" name="day2" value="<?=$day2; ?>" 
							class="form-control form-control-sm" style="width:120px" >
					</div>
					<div class="d-inline-flex">
						<select name="sel1" class="form-select form-select-sm bg-light myfs12" style="width:100px">
<?
						for($i = 0; $i < $n_sel1; $i++) {
							$tmp = ($i == $sel1) ? "selected" : "";
							echo("<option value='$i' $tmp>$a_sel1[$i]</option>");
						}
?>
						</select>&nbsp;
						<select name="sel2" class="form-select bg-light myfs12" style="width:105px">
<?
						for($i = 0; $i < $n_sel2; $i++) {
							$j = $i + 1;
							$tmp = ($j == $sel2) ? "selected" : "";
							echo("<option value='$j' $tmp>$a_sel2[$i]</option>");
						}
?>
						</select>
					</div>
					<div class="d-inline-flex">
						<div class="input-group input-group-sm">
							<input type="text" name="text1" value="" 
								class="form-control myfs12" style="width:100px" 
								onKeydown="if (event.keyCode == 13) { form1.submit(); }"> 
							<button class="btn mycolor1 myfs12" type="button" 
								onClick="form1.submit();">검색</button>
						</div>
					</div>
					
				</td>
			</tr>
		</table>
		
		<table class="table table-sm table-bordered table-hover my-1">
			<tr class="bg-light">
				<td >주문번호</td>
				<td >주문일</td>
				<td >제품명</td>
				<td width="5%">제품수</td>
				<td>금액</td>
				<td>주문자</td>
				<td width="5%">결제</td>
				<td width="25%">주문상태</td>
				<td width="5%">삭제</td>
			</tr>
			
<?
			$a_state = array("주문신청", "주문확인", "입금확인", "배송중", "주문완료", "주문취소");
			$n_state = count($a_state);
			$state_count = 0;
			foreach($result as $row) {
				$id = $row["id"];
				$jumunday1=substr($row["jumunday"],0,4);
				$jumunday2=substr($row["jumunday"],4,2);
				$jumunday3=substr($row["jumunday"],6,2);
				$jumunday = $jumunday1 . "-" . $jumunday2 . "-" . $jumunday3;
				$pay = ($row["pay_kind"] == 0) ? "카드" : "무통장";
				$state = $row["state"];
				$color = "black";
				if ($state == 5) $color = "blue";  // 주문완료
				if ($state == 6) $color = "red";   // 주문취소
?>
				<tr>
					<td class="mywordwrap">
						<a href="jumun_info.php?id=<?=$id; ?>" style="color:#0085dd"><?=$id; ?></a>
					</td>
					<td><?=$jumunday; ?></td>
					<td align="left" class="mywordwrap"><?=$row["product_names"]; ?></td>
					<td><?=$row["product_nums"]; ?></td>
					<td align="right" class="mywordwrap"><?=number_format($row["total_cash"]); ?></td>
					<td><?=$row["o_name"]; ?></td>
					<td><?=$pay; ?></td>
					<td>
						<div class="d-sm-inline-flex">
							<select name="state" class="form-select form-select-sm myfs12 me-1" style="color:<?=$color; ?>">
<?
							for($i = 0; $i < $n_state; $i++) {
								$j = $i + 1;
								$tmp = ($j == $state) ? "selected" : "";
								echo("<option value='$j' $tmp>$a_state[$i]</option>");
							}
?>
							</select>
							<a href="javascript:go_update('<?=$id; ?>',<?=$state_count; ?>);" 
								class="btn btn-sm mybutton-blue" style="width:50px;">수정</a>
						</div>
					</td>
					<td>
						<a href="jumun_delete.php?id=<?=$id; ?>" 
							class="btn btn-sm mybutton-red" 
							onclick="javascript:return confirm('삭제할까요 ?');">삭제</a>	
					</td>
				</tr>
<?
				$state_count++;
			}
?>
		</table>
		
		<input type="hidden" name="state">
		
		</form>

<?
    echo  $pagebar;            // pagination bar 표시
?>

	</div>
</div>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
