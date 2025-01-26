<?
	include "common.php";		// DB 연결
	
	$id=$_REQUEST["id"];
	$pwd1=$_REQUEST["pwd1"];
	$name=$_REQUEST["name"];
	$tel1=$_REQUEST["tel1"];
	$tel2=$_REQUEST["tel2"];
	$tel3=$_REQUEST["tel3"];
	$zip=$_REQUEST["zip"];
	$juso=$_REQUEST["juso"];
	$email=$_REQUEST["email"];
	$sm=$_REQUEST["sm"];
	$birthday1=$_REQUEST["birthday1"];
	$birthday2=$_REQUEST["birthday2"];
	$birthday3=$_REQUEST["birthday3"];
	
	
	$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	if($pwd1) {
		$sql="update member set pwd='$pwd1', name='$name', tel='$tel', zip='$zip', juso='$juso', email='$email', sm='$sm', birthday='$birthday' where id=$id;";
	}
	else {
		$sql="update member set name='$name', tel='$tel', zip='$zip', juso='$juso', email='$email', sm='$sm', birthday='$birthday' where id=$id;";
	}
	
	$result=mysqli_query($db, $sql); 
	if($result)
		echo("<script>alert('성공적으로 수정하였습니다.');</script>");
	else
		echo("<script>alert('회원정보 수정에 실패했습니다.');</script>");

	if (!$result) exit("에러: $sql");
	echo("<script>location.href='index.html'</script>");

?>