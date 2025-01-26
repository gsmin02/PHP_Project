<!--  Title과  메뉴(로그인/회원가입/장바구니/주문조회/게시판/Q&A) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<?
	$cookie_id = $_COOKIE["cookie_id"];
	$cart = $_COOKIE["cart"];
	$n_cart = $_COOKIE["n_cart"];
	$m_cart = 0;
	for($i=1; $i<=$n_cart; $i++) {
		if($cart[$i]) {
			$m_cart++;
		}
	}
	
	$rand_img = array( 1, 2, 3, 4 );
	shuffle($rand_img); // TOP 이미지 랜덤 정렬
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- 왼쪽 정렬 -->
        <div class="collapse navbar-collapse" id="navbarNavLeft">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="jumun_login.html">주문조회</a></li>
                <li class="nav-item"><a class="nav-link" href="qa.html">Q & A</a></li>
                <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
            </ul>
        </div>
        <!-- 가운데 정렬 -->
        <div class="collapse  navbar-collapse">
            <a class="navbar-brand mx-auto" href="index.html">INDUK Mall</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavRight" aria-controls="navbarNavRight" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- 오른쪽 정렬 -->
        <div class="collapse navbar-collapse" id="navbarNavRight">
            <ul class="navbar-nav ms-auto">
<?
                if(!$cookie_id){
                    echo("<li class='nav-item'><a class='nav-link' href='member_login.php'><i class='fas fa-power-off'></i>&nbsp;&nbsp;로그인</a></li>");
                    echo("<li class='nav-item'><a class='nav-link' href='member_join.php'><i class='fas fa-user'></i>&nbsp;&nbsp;회원가입</a></li>");
                }
                else {
                    echo("<li class='nav-item'><a class='nav-link' href='member_logout.php'><i class='fas fa-power-off'></i>&nbsp;&nbsp;로그아웃</a></li>");
                    echo("<li class='nav-item'><a class='nav-link' href='member_edit.php'><i class='fas fa-user-edit'></i>&nbsp;&nbsp;회원정보수정</a></li>");
                }
?>
                <li class="nav-item"><a class="nav-link" href="cart.php"><i class='fas fa-shopping-bag'></i>&nbsp;&nbsp;장바구니 (<?=$m_cart; ?>)</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--  상품 Category 메뉴/ 상품검색 -->
<div class="row bg-light m-0 p-1 fs-6 border">
	<div class="col">
		<div class="d-flex">
		
<?
			echo '<ul class="nav me-auto">' . "\n";
			$a_menu_counter = 1;

			// 첫 번째 항목 "분류선택"을 제외하고 출력 시작
			$skip_first_item = true;

			foreach ($a_menu_result as $a_menu_item) {
				if ($skip_first_item) {
					$skip_first_item = false;
					continue;
				}

				if (is_array($a_menu_item)) {
					$a_menu_dropdownTitle = array_shift($a_menu_item); // 배열의 첫 번째 요소를 드롭다운 제목으로 사용
					if (count($a_menu_item) > 0) { // 배열에 요소가 있는 경우 드롭다운으로 처리
						echo '<li class="nav-item dropdown">' . "\n";
						echo '<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="menu.php?menu=' . $a_menu_counter . '" role="button" aria-expanded="false"> ' . $a_menu_dropdownTitle . ' </a>' . "\n";
						echo '<ul class="dropdown-menu">' . "\n";
						$a_menu_counter++;
						foreach ($a_menu_item as $a_menu_subItem) {
							echo '<li class="nav-item zoom_a"><a class="dropdown-item" href="menu.php?menu=' . $a_menu_counter . '">' . $a_menu_subItem . '</a></li>' . "\n";
							$a_menu_counter++;
						}
						echo '</ul>' . "\n";
						echo '</li>' . "\n";
					} else { // 배열에 요소가 없는 경우 일반 메뉴로 처리
						echo '<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?menu=' . $a_menu_counter . '"> ' . $a_menu_dropdownTitle . ' </a></li>' . "\n";
						$a_menu_counter++;
					}
				} else {
					echo '<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?menu=' . $a_menu_counter . '"> ' . $a_menu_item . ' </a></li>' . "\n";
					$a_menu_counter++;
				}
			}

			echo '</ul>' . "\n";
?>

			<script>
				function check_findproduct() {
					if (!form1.findtext.value)  {
						alert('검색어를 입력하세요');
						return;
					}
					form1.submit();
				}
			</script>

			<form name="form1" method="post" action="product_search.php" class="search-container">
				<i class="fas fa-search search-icon"></i>
				<input type="text" name="findtext" value="" size="20" class="form-control form-control-sm search-input" placeholder="Search">
			</form>

		</div>
	</div>
</div>
