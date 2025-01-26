<?
    include  "../common.php";

    $id=$_REQUEST["id"];

    $sql="delete from member where id=$id ";
    $result=mysqli_query($db,$sql); 
    if (!$result) exit("에러:$sql");

	echo("<script>alert('성공적으로 삭제하였습니다.');</script>");
    echo("<script>location.href='member.php'</script>");
?>