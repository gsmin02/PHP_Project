<?
	include "common.php";

	// 주문번호 조회
	$sql_jumun = "select id from jumun where jumunday=curdate() order by id desc limit 1";
	$result_jumun=mysqli_query($db, $sql_jumun);
	if (!$result_jumun) exit("에러: $sql_jumun");
	
	$count_jumun=mysqli_num_rows($result_jumun);
	$row_jumun=mysqli_fetch_array($result_jumun);
	
	// 금일 주문번호 있을 시 1추가
	if($count_jumun>0) {
		$tmp_jumun_id = sprintf('%04d',(substr($row_jumun["id"], 6, 4) + 1));
		$new_jumun_id = date("ymd").$tmp_jumun_id;
	}
	else {
		$new_jumun_id = date("ymd")."0001";
	}
	
	// 멤버 조회
	$uid = $_COOKIE["cookie_id"];
	
	if ($uid) {
		$sql_member = "select * from member where uid='$uid'";
		$result_member=mysqli_query($db, $sql_member);
		if(!$result_member) exit("에러: $sql_member");
		$row_member=mysqli_fetch_array($result_member);
		
		$member_id = $row_member["id"];
	}
	else {
		$member_id = 0;
	}
	
	
	// 주문자 정보
	$o_name	=	$_REQUEST["o_name"];
	$o_tel = 	$_REQUEST["o_tel"];
	$o_email = 	$_REQUEST["o_email"];
	$o_zip = 	$_REQUEST["o_zip"];
	$o_juso = 	$_REQUEST["o_juso"];
	
	$r_name = 	$_REQUEST["r_name"];
	$r_tel = 	$_REQUEST["r_tel"];
	$r_email = 	$_REQUEST["r_email"];
	$r_zip = 	$_REQUEST["r_zip"];
	$r_juso = 	$_REQUEST["r_juso"];
	$memo = 	$_REQUEST["memo"];
	
	// 결제 정보
	$pay_kind = 	$_REQUEST["pay_kind"]; // 결제 종류 카드 or 무통장
	
	$card_kind =	$_REQUEST["card_kind"]; // 카드 종류
	$card_no1 = 	$_REQUEST["card_no1"]; // 카드 번호
	$card_no2 = 	$_REQUEST["card_no2"];
	$card_no3 = 	$_REQUEST["card_no3"];
	$card_no4 = 	$_REQUEST["card_no4"];
	$card_month = 	$_REQUEST["card_month"]; // 카드 기간 월
	$card_year =	$_REQUEST["card_year"]; // 카드 기간 년
	$card_pw = 		$_REQUEST["card_pw"]; // 카드 비번
	$card_halbu = 	$_REQUEST["card_halbu"]; // 카드 할부
	
	$bank_kind = 	$_REQUEST["bank_kind"]; // 은행 종류
	$bank_sender = 	$_REQUEST["bank_sender"]; // 입금자명
	
	$jumunday = date("Ymd");
	
	// 제품 정보
	$total_price = 0;
	$product_nums = 0;
	$cart = $_COOKIE["cart"];
	$n_cart = $_COOKIE["n_cart"];
	$baesong_check = 0;
	for($i = 1; $i <= $n_cart; $i++) {
		if($cart[$i]) {
			$product_nums++;
			list($cart_id, $cart_num, $cart_opts1, $cart_opts2) = explode("^", $cart[$i]);
			
			// 제품 정보
			$sql_product = "select * from product where id = $cart_id";
			$result_product=mysqli_query($db,$sql_product);
			if (!$result_product) exit("에러:$sql_product");
			$row_product=mysqli_fetch_array($result_product);
			
			$p_id = $row_product['id'];
			$p_default_price = $row_product['price'];
			$p_discount = $row_product['discount'];
			$p_icon_sale = $row_product['icon_sale'];
			
			if($p_icon_sale == 1)
				$p_price = round($p_default_price*(100-$p_discount)/100, -3);
			else
				$p_price = $p_default_price;
			
			$p_prices = $p_price * $cart_num;
			$total_price = $total_price + $p_prices;
			$product_names = addslashes($row_product['name']);
			
			$jumuns_sql = "insert into jumuns (
								jumun_id, product_id, num, price, prices, discount, opts_id1, opts_id2
								) values (
								'$new_jumun_id', '$p_id', '$cart_num',
								'$p_price', '$p_prices', '$p_discount',
								'$cart_opts1', '$cart_opts2'
								)";
			
			$jumuns_result=mysqli_query($db, $jumuns_sql); 
			if (!$jumuns_result) exit("에러: $jumuns_sql");
		}
		if($total_price >= $max_baesongbi) { $baesong_check = 1; }
	}
	if($baesong_check == 0) {
		$baesong_sql = "insert into jumuns (
							jumun_id, product_id, num, price, prices, discount, opts_id1, opts_id2
							) values (
							'$new_jumun_id', '0', '1', '$baesongbi', '$baesongbi', '0', '0', '0'
							)";
		$baesong_result=mysqli_query($db, $baesong_sql); 
		if (!$baesong_result) exit("에러: $baesong_sql");
	}
	
	if($product_nums > 1) {
		$tmp = $product_nums - 1;
		$product_names = $product_names."외 ".$tmp;
	}
	
	// DB 저장 - jumun
	$jumun_sql = "insert into jumun (
						id, member_id, jumunday, product_names, product_nums,
						o_name, o_tel, o_email, o_zip, o_juso,
						r_name, r_tel, r_email, r_zip, r_juso, memo,
						pay_kind, card_okno, card_halbu, card_kind,
						bank_kind, bank_sender, total_cash, state
						) values (
						'$new_jumun_id', '$member_id', '$jumunday', '$product_names', '$product_nums',
						'$o_name', '$o_tel', '$o_email', '$o_zip', '$o_juso',
						'$r_name', '$r_tel', '$r_email', '$r_zip', '$r_juso', '$memo',
						'$pay_kind', null, '$card_halbu', '$card_kind',
						'$bank_kind', '$bank_sender', '$total_price', 1
						)";
	$jumun_result=mysqli_query($db, $jumun_sql); 
	if (!$jumun_result) exit("에러: $jumun_sql");
	
	// 주문이 끝났기 때문에 장바구니 삭제
	$cart = $_COOKIE["cart"];
	$n_cart = $_COOKIE["n_cart"];
	for($i=1;$i<=$n_cart;$i++) {
		if ($cart[$i]) {
			// i번째 제품이 있는 경우
			// cookie값 삭제.
			setcookie("cart[$i]", null);
		}
	}
	// 쿠키값을 0으로 초기화
	$n_cart = 0;
	setcookie("n_cart", null);

	echo("<script>location.href='order_ok.php'</script>");
	
?>