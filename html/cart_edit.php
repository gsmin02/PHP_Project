<?
$cart = $_COOKIE["cart"];
$n_cart = $_COOKIE["n_cart"];

$kind = $_REQUEST["kind"];

$id = $_REQUEST['id'];
$num = $_REQUEST['num'];
$opts1 = $_REQUEST['opts1'];
$opts2 = $_REQUEST['opts2'] ? $_REQUEST['opts2'] : 0;

$pos = $_REQUEST['pos'];
$num = $_REQUEST['num'];

// 제품개수 0으로 초기화
if (!$n_cart) $n_cart=0;

switch ($kind) {
	// 장바구니 담기
	case "insert":
		$n_cart++;
		$cart[$n_cart] = implode("^", array($id, $num, $opts1, $opts2));
		setcookie("cart[$n_cart]", $cart[$n_cart]);
		setcookie("n_cart", $n_cart);
		break;

	// 바로 구매하기
	case "order":
		// 제품개수 1 증가 -> $n_cart++
		$n_cart++;
		// 제품정보 합치기.
		$cart[$n_cart] = implode("^", array($id, $num, $opts1, $opts2));
		// 제품정보, 개수($cart[$n_cart], $n_cart) 쿠키로 저장.
		setcookie("cart[$n_cart]", $cart[$n_cart]);
		setcookie("n_cart", $n_cart);
		break;

	// 제품삭제
	case "delete":
		// $cart[$pos] 쿠키 삭제.
		setcookie("cart[$pos]", null);
		break;

	// 수량 수정
	case "update":
		// $cart[$pos]값에서 제품번호, 옵션값들 알아내기.
		list($id, $num_tmp, $opts1, $opts2) = explode("^", $cart[$pos]);
		// 수정된 수량으로 제품정보 다시 합치기.
		$cart[$pos] = implode("^", array($id, $num, $opts1, $opts2));
		// 수정된 제품정보를 $cart[$pos] 쿠키에 다시 저장.
		setcookie("cart[$pos]", $cart[$pos]);
		break;

	// 장바구니 전체 비우기
	case "deleteall":
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
		break;
}

if ($kind=="order") {
	// 주문/배송지 입력 화면(order.php)으로 이동.
	echo("<script>location.href='order.php'</script>");
}   
else {
	// 장바구니 화면(cart.php)으로 이동.
	echo("<script>location.href='cart.php'</script>");
}

?>