const img_file = document.getElementById("img_logo");
const imageEmp = document.querySelector(".default-img");

	img_file.addEventListener("change", function(){


		const file = this.files[0];

		if(file) {
			const reader = new FileReader();

			reader.addEventListener("load", function(){
				console.log(this);

				imageEmp.setAttribute("src", this.result);

			});

			reader.readAsDataURL(file);

		}


	});