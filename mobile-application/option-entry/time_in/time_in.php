<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="time_in.css" rel="stylesheet" >
	<title>TIME IN</title>
</head>
<body>
	<div class="container">
		<form action="insert.php" method="post" enctype="multipart/form-data">
			<div class="header"  style="background: #262626;" >
				<p> TIME IN</p>
			</div>
			<div class="top">
				<div class="container-img">
					<img class="image" src="">
				</div>
			</div>
			<div class="bottom">
				<label for="camera">
					<img class="camera" id="camera-icon" src="../../../icons/camera.svg">
				</label>
				<input type="file" name="file" id="camera" hidden capture>
				<button type="submit" name="submit">SUBMIT</button>
				<a href="../entry_option.php">Back</a>
			</div>
		</form>
	</div>
</body>
	<script type="text/javascript">
		const img_file = document.getElementById("camera");
		const imageEmp = document.querySelector(".image");



		img_file.addEventListener("change", function(){


		const file = this.files[0];

		if(file) {
			const reader = new FileReader();

			reader.addEventListener("load", function(){
				console.log(this);

				imageEmp.setAttribute("src", this.result);

			});

			reader.readAsDataURL(file);
			imageEmp.style.display="FLEX";

		}


	});
	</script>
</html>