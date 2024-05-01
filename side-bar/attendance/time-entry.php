<?php
include "../../connection/connection.php";
if (isset($_POST['employees-id'])){



	$id = $_POST['employees-id'];


	date_default_timezone_set('Asia/Manila');
	$regular = date('h:i A',strtotime('9 hours'));
	$current_time = date("G:i A");
	$sevens = date("7:00 A");
	$sevene = date("7:59 A");		
	$eights = date("8:00 A");
	$eighte = date("8:59 A");
	$nines = date("9:00 A");
	$ninee = date("9:59 A");		
	$tens = date("10:00 A");
	$tene = date("10:59 A");
	$elevens = date("11:00 A");
	$elevene = date("11:59 A");		
	$tweveles = date("12:00 A");
	$twelvee = date("12:59 A");
	$ones = date("13:00 A");
	$onee = date("13:59 A");
	$twos = date("14:00 A");
	$twoe = date("14:59 A");
	$threes = date("15:00 A");
	$threee = date("15:59");
	$fourths = date("16:00");
	$fourthe = date("16:59");
	$fifteens= date("17:00");
	$fifteene= date("17:59");
	$sixteens = date("18:00");
	$sixteene = date("18:59");
	$seventeens= date("19:00");
	$seventeene= date("19:59");
	$eighteens= date("20:00");
	$eighteene= date("20:59");
	$nineteens= date("21:00");
	$nineteene= date("21:59");
	$tweentys= date("22:00");
	$tweentye= date("22:59");
	$twentyones= date("23:00");
	$twentyonee= date("23:59");
	$twentytwos= date("0:00");
	$twentytwoe= date("0:59");
	$twentythrees= date("1:00");
	$twentythreee= date("1:59");
	$twentyfours= date("2:00");
	$twentyfoure= date("2:59");
	$ons = date("3:00");
	$one = date("3:59");
	$tws = date("4:00");
	$twe = date("4:59");
	$thres = date("5:00");
	$three = date("5:59");
	$fors = date("6:00");
	$fore = date("6:59");
	$fives = date("7:00");
	$fivee = date("7:59");
	$sixs = date("8:00");
	$sixe = date("8:59");
	// 7AM - 3PM SHIFT

	if(($current_time > $sevens) AND ($current_time < $sevene))
	{
		$time_end = ("4:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time',,'$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $eights ) AND ($current_time < $eighte))
	{
		$time_end = ("5:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	if(($current_time > $nines) AND ($current_time < $ninee))
	{
		$time_end = ("6:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $tens ) AND ($current_time < $tene))
	{
		$time_end = ("7:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	if(($current_time > $elevens) AND ($current_time < $elevene))
	{
		$time_end = ("8:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $tweveles ) AND ($current_time < $twelvee))
	{
		$time_end = ("9:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $ones ) AND ($current_time < $onee))
	{
		$time_end = ("10:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $twos ) AND ($current_time < $twoe))
	{
		$time_end = ("11:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $threes ) AND ($current_time < $threee))
	{
		$time_end = ("12:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	
	// 3pm - 7am SHIFT
	else if(($current_time > $fourths ) AND ($current_time < $fourthe))
	{
		$time_end = ("1:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $fifteens ) AND ($current_time < $fifteene))
	{
		$time_end = ("2:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $sixteens ) AND ($current_time < $sixteene))
	{
		$time_end = ("3:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $seventeens ) AND ($current_time < $seventeene))
	{
		$time_end = ("4:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $eighteens ) AND ($current_time < $eighteene))
	{
		$time_end = ("5:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $nineteens ) AND ($current_time < $nineteene))
	{
		$time_end = ("6:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $tweentys ) AND ($current_time < $tweentye))
	{
		$time_end = ("7:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $twentyones ) AND ($current_time < $twentyonee))
	{
		$time_end = ("8:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $twentytwos ) AND ($current_time < $twentytwoe))
	{
		$time_end = ("9:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $twentythrees ) AND ($current_time < $twentythreee))
	{
		$time_end = ("10:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $twentyfours ) AND ($current_time < $twentyfoure))
	{
		$time_end = ("11:00 AM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $ons ) AND ($current_time < $one))
	{
		$time_end = ("12:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $tws ) AND ($current_time < $twe))
	{
		$time_end = ("1:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $thres ) AND ($current_time < $three))
	{
		$time_end = ("2:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	else if(($current_time > $fors ) AND ($current_time < $fore))
	{
		$time_end = ("3:00 PM");
		echo $time_end;
		$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$current_time','$current_time','$time_end') ";
		$conn->query($test) or die ($conn->error);
	}
	echo header("Location: schedule.php");

	

} 


?>
<?php 

if (isset($_POST['employees-id-out'])) {


	$id = $_POST['employees-id-out'];
	$time_out = date("G:i A");

	$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$time_out') ";
		$conn->query($test) or die ($conn->error);


	echo header("Location: schedule.php");
	
}



?>