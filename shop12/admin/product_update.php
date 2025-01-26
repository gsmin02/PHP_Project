<?
	include "../common.php";		// DB 연결
	
	$id = $_REQUEST["id"];					// 아이디
	$menu=$_REQUEST["menu"];				// 상품분류
	$code=$_REQUEST["code"];				// 삼품코드
	$code=addslashes($code);
	$name=$_REQUEST["name"];				// 삼품명
	$name=addslashes($name);
	$coname=$_REQUEST["coname"];			// 제조사
	$coname=addslashes($coname);
	$price=$_REQUEST["price"];				// 판매가
	$opt1=$_REQUEST["opt1"];				// 옵션1
	$opt2=$_REQUEST["opt2"];				// 옵션2
	$contents=$_REQUEST["contents"];		// 제품설명
	$contents=addslashes($contents);
	$status=$_REQUEST["status"];			// 삼품상태
	$icon_new=$_REQUEST["icon_new"];		// 아이콘
	$icon_new=($icon_new==1) ? 1 : 0;
	$icon_hit=$_REQUEST["icon_hit"];		// 아이콘
	$icon_hit=($icon_hit==1) ? 1 : 0;
	$icon_sale=$_REQUEST["icon_sale"];		// 아이콘
	$icon_sale=($icon_sale==1) ? 1 : 0;
	$discount=($icon_sale==1) ? $_REQUEST["discount"] : 0;	// 할인율
	$regday=$_REQUEST["regday"];			// 등록일
	
	$checkno1=$_REQUEST["checkno1"];
	$checkno2=$_REQUEST["checkno2"];
	$checkno3=$_REQUEST["checkno3"];
	
	$image1=$_REQUEST["image1"];
	$image2=$_REQUEST["image2"];
	$image3=$_REQUEST["image3"];
	
	$fname1=$_FILES["image1"]["name"];
	$fname2=$_FILES["image2"]["name"];
	$fname3=$_FILES["image3"]["name"];
	
	if($fname1=="") { $fname1=$_REQUEST["fimage1"]; }
	if($fname2=="") { $fname2=$_REQUEST["fimage2"]; }
	if($fname3=="") { $fname3=$_REQUEST["fimage3"]; }
	
	if ($checkno1=="1") $fname1="p1.png";
	if ($checkno2=="1") $fname2="p2.png";
	if ($checkno3=="1") $fname3="p3.png";
	
	if ($checkno1!="1" and $_FILES["image1"]["error"]==0)
	{
		$fname1=$_FILES["image1"]["name"];
		if (!move_uploaded_file($_FILES["image1"]["tmp_name"], "../product/" . $fname1)) echo("<script>alert('첫 번째 이미지 중복');</script>");
	}
	if ($checkno2!="1" and $_FILES["image2"]["error"]==0)
	{
		$fname2=$_FILES["image2"]["name"];
		if (!move_uploaded_file($_FILES["image2"]["tmp_name"], "../product/" . $fname2)) echo("<script>alert('두 번째 이미지 중복');</script>");
	}
	if ($checkno3!="1" and $_FILES["image3"]["error"]==0)
	{
		$fname3=$_FILES["image3"]["name"];
		if (!move_uploaded_file($_FILES["image3"]["tmp_name"], "../product/" . $fname3)) echo("<script>alert('세 번째 이미지 중복');</script>");
	}
	
	
	$sql = "update product set menu='$menu', code='$code', name='$name', coname='$coname', price='$price', opt1='$opt1', opt2='$opt2',
	contents='$contents', status='$status', regday='$regday', icon_new='$icon_new', icon_hit='$icon_hit', icon_sale='$icon_sale', discount='$discount',
	image1='$fname1', image2='$fname2', image3='$fname3' where id=$id";
	
	
	$result=mysqli_query($db, $sql); 

	if (!$result) exit("에러: $sql");
	
	echo("<script>location.href='product.php'</script>");
?>