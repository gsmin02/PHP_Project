<?
	include "../common.php";		// DB 연결
	
	$id=$_REQUEST["id"];
	$name=$_REQUEST["name"];
	
	$sql = "update opt set name='$name' where id=$id;";
	
	$result=mysqli_query($db, $sql); 

	if (!$result) exit("에러: $sql");
	echo("<script>location.href='opt.php'</script>");
?>