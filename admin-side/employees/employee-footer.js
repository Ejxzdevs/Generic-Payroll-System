	
		const inpFile = document.getElementById("inpFile");
	const previewContainer = document.getElementById("image-border");
	const imageEmp = previewContainer.querySelector(".upImage");
	const defaultImage = previewContainer.querySelector(".default-image");

	inpFile.addEventListener("change", function(){


		const file = this.files[0];

		if (file) {
			const reader = new FileReader();

			defaultImage.style.display = "none";
			imageEmp.style.display = "block";

			reader.addEventListener("load", function(){
				console.log(this);

				imageEmp.setAttribute("src", this.result);

			});

			reader.readAsDataURL(file);

		}


	});