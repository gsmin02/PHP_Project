<?
	include "common.php";		// DB 연결

	$id=$_REQUEST["id"];	// 혹은  $name=$_POST["id"];
	$name=$_REQUEST["name"];	
	$kor=$_REQUEST["kor"];
	$eng=$_REQUEST["eng"];
	$mat=$_REQUEST["mat"];
	$hap=$_REQUEST["hap"];
	$avg=$_REQUEST["avg"];

	$sql="update sj set name='$name', kor=$kor, eng=$eng, mat=$mat, hap=$hap, avg=$avg where id=$id;"; 
	$result=mysqli_query($db, $sql); 
	if (!$result) exit("에러: $sql");

	echo("<script>location.href='sj_list.php'</script>");
?>