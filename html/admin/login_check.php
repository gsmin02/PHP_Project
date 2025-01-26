<?
	include "../common.php";
	
	$adminid=$_REQUEST["adminid"];
	$adminpw=$_REQUEST["adminpw"];
	
	if ($adminid == $admin_id && $adminpw == $admin_pw) {
		setcookie("cookie_admin", "yes");
		echo("<script>location.href='member.php'</script>");
		}
	else {
		echo("<script>alert('아이디 또는 비밀번호가 일치하지 않습니다.');</script>");
		setcookie("cookie_admin", null);
		echo("<script>location.href='index.html'</script>"); 
	}


?>