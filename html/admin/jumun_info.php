<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "../common.php";
	include "admin_check.php";
	
	$id = $_REQUEST["id"];
	
	$sql = "select * from jumun where id = $id";
	$result = mysqli_query($db, $sql);
	if(!$result) exit("에러 : $sql");
	$row = mysqli_fetch_array($result);
	
	$jumunday = substr($row["jumunday"], 0, 4).'-'.substr($row["jumunday"], 4, 2).'-'.substr($row["jumunday"], 6, 2);
	$o_tel = substr($row["o_tel"], 0, 3).'-'.substr($row["o_tel"], 3, 4).'-'.substr($row["o_tel"], 7, 4);
	$r_tel = substr($row["r_tel"], 0, 3).'-'.substr($row["r_tel"], 3, 4).'-'.substr($row["r_tel"], 7, 4);
	
	$state_array = array("","주문신청", "주문확인", "입금확인", "배달중", "주문완료", "주문취소");
	$card_no = array("", "국민카드", "신한카드", "우리카드", "하나카드");
	$bank_no = array("", "국민은행 111-00000-0000", "신한은행 222-00000-0000");
	$member_check = ($row["member_id"] != 0) ? "회원" : "비회원";
	
	$pay_kind = $row["pay_kind"];
	if($pay_kind == 0) {
		// 카드 결제인 경우
		$bank = "";
		$sender = "";
		$card = $card_no[$row["card_kind"]];
		$card_halbu = $row["card_halbu"];
		if($card_halbu == 0) { $card_halbu = "일시불"; }
	}
	elseif($pay_kind == 1) {
		// 무통장인 경우
		$card_halbu = "";
		$bank = $bank_no[$row["bank_kind"]];
		$sender = $row["bank_sender"];
	}
	$pay_cash = 0;
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

<div class="row mx-1 justify-content-center">
	<div class="col-sm-10" align="center">

	<h4 class="m-0 mb-3">주문 ( <b><?=$id; ?></b> )</h4>

	<table class="table table-sm table-bordered mb-3">
		<tr>
			<td width="15%" class="bg-light">상태</td>
			<td width="35%"><?=$state_array[$row["state"]]; ?></td>
			<td width="15%" class="bg-light">주문일</td>
			<td width="35%"><?=$jumunday; ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-2">
		<tr>
			<td width="15%" class="bg-light"><b>주문자</b></td>
			<td width="35%"><?=$row["o_name"]; ?></td>
			<td width="15%" class="bg-light">구분</td>
			<td width="35%"><?=$member_check; ?></td>
		</tr>
		<tr>
			<td class="bg-light">전화</td><td><?=$o_tel; ?></td>
			<td class="bg-light">E-Mail</td><td><?=$row["o_email"]; ?></td>
		</tr>
		<tr>
			<td class="bg-light">주소</td>
			<td align="left" colspan="3">&nbsp;<?=$row["o_juso"]; ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-3">
		<tr>
			<td width="15%" class="bg-light"><b>수신자</b></td>
			<td width="35%"><?=$row["r_name"]; ?></td>
			<td width="15%" class="bg-light"></td>
			<td></td>
		</tr>
		<tr>
			<td class="bg-light">전화</td>
			<td><?=$o_tel; ?></td>
			<td class="bg-light">E-Mail</td>
			<td><?=$row["r_email"]; ?></td>
		</tr>
		<tr>
			<td class="bg-light">주소</td>
			<td align="left" colspan="3">&nbsp;<?=$row["r_juso"]; ?></td>
		</tr>
		<tr height="50">
			<td class="bg-light">메모</td>
			<td align="left" valign="top" colspan="3">&nbsp;<?=$row["memo"]; ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-3">
		<tr>
			<td width="15%" class="bg-light"><b>카드</b></td>
			<td width="35%"><?=$card; ?></td>
			<td width="15%" class="bg-light">승인</td>
			<td width="35%"><?=$row["card_okno"]; ?></td>
		</tr>
		<tr>
			<td class="bg-light">할부</td><td><?=$card_halbu; ?></td>
			<td class="bg-light"></td><td></td>
		</tr>
		<tr>
			<td class="bg-light"><b>무통장</b></td><td><?=$bank; ?></td>
			<td class="bg-light">입금자</td><td><?=$sender; ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-3">
		<tr class="bg-light">
			<td>제품명</td>
			<td width="10%">수량</td>
			<td width="10%">단가</td>
			<td width="10%">금액</td>
			<td width="10%">할인</td>
			<td width="20%">옵션</td>
		</tr>
		<?
		// 쿼리 작성: jumuns와 product 테이블을 조인하여 필요한 정보를 한 번에 가져오기
		$sql_j = "SELECT (SELECT name FROM product pd WHERE pd.id = jms.product_id) as product_name,
				jms.num, jms.price, jms.prices, jms.discount,
				(SELECT name FROM opts ops1 WHERE ops1.id = jms.opts_id1) as opts_id1,
				(SELECT name FROM opts ops2 WHERE ops2.id = jms.opts_id2) as opts_id2
				FROM jumun jm LEFT JOIN jumuns jms ON jm.id = jms.jumun_id
				WHERE jm.id = $id";

		$result_j = mysqli_query($db, $sql_j);
		if (!$result_j) exit("에러 : $sql_j");
		$row_j = mysqli_fetch_array($result_j);

		// 결과 출력
		foreach ($result_j as $row_j) {
			$pay_cash += $row_j["prices"];
			$pd_name = ($row_j["product_name"] == null) ? "배송비" : $row_j["product_name"];
		?>
			<tr>
				<td align="left"><?=$pd_name; ?></td>
				<td><?= $row_j["num"]; ?></td>
				<td align="right"><?= number_format($row_j["price"]); ?></td>
				<td align="right"><?= number_format($row_j["prices"]); ?></td>
				<td><?= $row_j["discount"]; ?>%</td>
				<td><?= $row_j["opts_id1"]; ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?= $row_j["opts_id2"]; ?></td>
			</tr>
		<?php
		}
		?>
	</table>

	<table class="table table-sm table-bordered mb-3 p-2">
		<tr>
			<td width="15%" class="bg-light">총금액</td>
			<td width="85%" align="right" style="font-size:18px"><b><?=number_format($pay_cash); ?> 원</b>&nbsp;</td>
		</tr>
	</table>

	<a href="javascript:print();"  class="btn btn-sm btn-dark text-white my-2">&nbsp;프린트&nbsp;</a>&nbsp;
	<a href="javascript:history.back();"  class="btn btn-sm btn-outline-dark my-2">&nbsp;돌아가기&nbsp;</a>

	</div>
</div>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
