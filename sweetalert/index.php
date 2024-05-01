<?php 
include "swal.php";
?>



<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery-3.6.1.min.js"></script>
	<script src="sweetalert2.all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert2">
	<link rel="stylesheet" type="text/css" href="sweetalert2.min.css">
	<title></title>
</head>
<body>
		<style type="text/css">


swal-modal{
  background-color: red;
  border: 3px solid black;
}

 swal-overlay {
  background-color: red;
}
</style>
	<button value="" type="submit" id="info" onclick="hello()" > hello</button>
	<h1>tesddddddddddddddddddddddssweetalert2.all.mincsvsweetalert2.all.minvjsbhvchsweetalert2.all.minssweetalert2.all.minsweetalert2.all.minsweetalert2.all.min</h1>
</body>
</html>
<script type="text/javascript">
	
	 function hello(){

		Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href="">Why do I have this issue?</a>'
})
	}

</script>