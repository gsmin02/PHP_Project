<?
$cookie_check = $_COOKIE["cookie_admin"];
if($cookie_check != "yes") {
	echo("<script>alert('허용되지 않은 접근입니다.');</script>");
	echo("<script>location.href='../index.html'</script>");
}
?>