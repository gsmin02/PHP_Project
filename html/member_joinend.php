<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
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

<div class="row m-5 mb-0">
	<div class="col" align="center">
		<h4>회원가입</h4>
	</div>	
</div>	

<hr size="4px" class="m-0 mx-5">

<div class="row m-3">
	<div class="col  align-items-center justify-content-center" align="center">

		<br><br><br>
		<h3><b>Congratulation !!!</b></h3>
		<br><br>
		저희 쇼핑몰을 가입하여 주셔서 대단히 감사합니다.<br>
		<br>
		저희 쇼핑몰은 항상 최선을 다할 것을 약속 드립니다.<br>
		<br><br>
		즐거운 쇼핑이 되시길 바랍니다.
		<br><br><br><br>
		<a href="index.html" class="btn btn-sm btn-dark text-white">&nbsp;돌아가기&nbsp;</a>

	</div>
</div>
<br><br><br><br><br><br>	

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
