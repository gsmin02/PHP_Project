<?
    error_reporting(E_ALL  &  ~E_NOTICE  &  ~E_WARNING);
    ini_set("display_errors", 1); // 제품 완성 시 0으로 전환

    mysqli_report( MYSQLI_REPORT_OFF );
	
	$db= mysqli_connect("localhost", "shop12", "1234", "shop12");
    if (!$db) exit("DB연결에러");
	
	$a_text1=array("분류선택","코트","브라우스","바지", "신발");	// for문의 $i는 1부터 시작
	$n_text1=count($a_text1);
	
	$a_status=array("상품상태","판매중","판매중지","품절");
	$n_status=count($a_status);
	
	$a_menu = array(
		"분류선택",
		"^", "Golf", "MEN", "WOMEN", "^",
		"^", "Swimming", "MEN", "WOMEN", "^",
		"^", "Tennis", "MEN", "WOMEN", "^",
		"^", "Skiing", "MEN", "WOMEN", "^",
		"^", "ETC", "^"
	);

	$a_menu_result = array();
	$a_menu_currentArray = array();
	$a_menu_foundDelimiter = false;
	$a_menu_flatList = array(); // 모든 메뉴 항목을 평탄화하여 저장

	// 배열 순회
	foreach ($a_menu as $a_menu_value) {
		if ($a_menu_value == "^") {
			if (!empty($a_menu_currentArray)) {
				$a_menu_result[] = $a_menu_currentArray;
				foreach ($a_menu_currentArray as $item) {
					$a_menu_flatList[] = $item;
				}
				$a_menu_currentArray = array();
			}
			$a_menu_foundDelimiter = ($a_menu_foundDelimiter) ? false : true;
		} else {
			if ($a_menu_foundDelimiter) {
				$a_menu_currentArray[] = $a_menu_value;
			} else {
				$a_menu_result[] = $a_menu_value;
				$a_menu_flatList[] = $a_menu_value;
			}
		}
	}

	// 마지막 배열 추가 (루프가 끝난 후)
	if (!empty($a_menu_currentArray)) {
		$a_menu_result[] = $a_menu_currentArray;
		foreach ($a_menu_currentArray as $item) {
			$a_menu_flatList[] = $item;
		}
	}
	
	$n_menu_flatList = count($a_menu_flatList);
	
	$a_icon=array("아이콘","New","Hit","Sale");
	$n_icon=count($a_icon);
	// $a_menu = array("분류선택", "메뉴1", "메뉴2");
	// $n_menu = count($a_menu);
	
	// 총금액이 max_baesongbi 보다 작을 때 배송비 발생
	$baesongbi = 2500; // 배송비
	$max_baesongbi = 100000; // 배송비 최대
	
	$admin_id = "admin";	// 어드민 계정 ID	
	$admin_pw = "1234";		// 어드민 계정 PW
	
	$page_line=5;		// 페이지당	line 수
	$page_block=5;		// 블록당	page수
	
	function mypagination($query, $args, &$count, &$pagebar)
	{
		global $db, $page_line, $page_block;			// 서버DB 정보

		$page=$_REQUEST["page"] ? $_REQUEST["page"] : 1;	// page초기화
		
		$url=basename($_SERVER['PHP_SELF']) . "?" . $args;    // 문서이름?전송할 변수들
		
		// 전체 레코드개수
		$sql = strtolower( $query );
		$sql ="select count(*) " . substr($sql, strpos($sql,"from"));
		$result=mysqli_query($db, $sql);
		if (!$result) exit("에러: $sql");
		$row=mysqli_fetch_array($result);
		$count = $row[0];

		// 페이지내 자료
		$first = ($page-1) * $page_line;
		
		$sql = str_replace(";", "", $query);
		$sql .= " limit $first, $page_line";
		$result=mysqli_query($db, $sql);
		if (!$result) exit("에러: $sql");

		// pagebar html
		$pages = ceil($count/$page_line);				// 페이지수
		$blocks = ceil($pages/$page_block);			// 블록수 
		$block = ceil($page/$page_block);			// 블록 위치
		$page_s = $page_block * ($block-1);		// 블록의 시작페이지
		$page_e = $page_block * $block;				// 블록의 마지막페이지
		if ($blocks <= $block) $page_e = $pages;

		$pagebar ="<nav><ul class='pagination pagination-sm justify-content-center py-1'>";

		if ($block > 1)				// 이전 블록으로
			$pagebar .="<li class='page-item'>
					<a class='page-link' href='$url&page=$page_s'>◀</a>
				</li>";

		for($i=$page_s+1; $i<=$page_e; $i++)
		{
			if ($page == $i)			// 선택한 page
				$pagebar .="<li class='page-item active'>
						<span class='page-link mycolor1'>$i</span>
					</li>";
			else
				$pagebar .="<li class='page-item'>
						<a class='page-link' href='$url&page=$i'>$i</a>
					</li>";
		}

		if ($block < $blocks)		// 다음 블록으로
			$pagebar .="<li class='page-item'>
					<a class='page-link' href='$url&page=" . $page_e+1 . "'>▶</a>
				</li>";
				
		$pagebar .="</ul>
			</nav>";
			
		return $result;
	}
?>