<?
	include "../common.php";		// DB 연결
		
	$id = $_REQUEST["id"];
	
	$sql = "delete from jumun where id=$id";
	
	$result=mysqli_query($db, $sql); 
	if (!$result) exit("에러: $sql");
	echo("<script>location.href='jumun.php'</script>");
?>