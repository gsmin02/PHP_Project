<?
	include  "../common.php";

    $id=$_REQUEST["id"];
	$name=$_REQUEST["name"];

    $sql="insert into opts (opt_id, name) values ('$id', '$name') ";
    $result=mysqli_query($db,$sql); 
    if (!$result) exit("에러:$sql");

    echo("<script>location.href='opts.php?id=$id'</script>");

?>