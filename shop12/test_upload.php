<?
	if ($_FILES["filename"]["error"]==0)      // 선택한 파일이 있는지 조사
	{
		$newfname="새파일이름";
		$fname=$_FILES["filename"]["name"];
		$fsize=$_FILES["filename"]["size"];
		if (!move_uploaded_file($_FILES["filename"]["tmp_name"], "경로/" . $newfname)) 
			exit("업로드 실패");

		echo("파일이름 : $newfname<br> 파일크기 : $fsize");
	}
?>