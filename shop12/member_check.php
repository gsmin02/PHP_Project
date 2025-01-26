<?
	include "common.php";
	
	$uid = $_REQUEST["uid"];
	$pwd = $_REQUEST["pwd"];

	$sql = "select id from member where uid='$uid' and pwd='$pwd'";
	$result=mysqli_query($db, $sql);
	if(!$result) exit("에러: $sql");
	
	$row=mysqli_fetch_array($result);
	$count = $row[0];
	
	if($count>0) {
		setcookie("cookie_id", $uid);
		echo("<script>location.href='index.html'</script>");
	}
	else {
		echo("<script>alert('아이디 또는 비밀번호가 일치하지 않습니다.');</script>");
		echo("<script>location.href='member_login.php'</script>");
	}


?>