// view time entry info

function time_info(id){
	document.querySelector('.container_view_record_info').style.display="Flex";	
	
	console.log("HELLO");
	console.log(id);

	$.ajax({
        type: "GET",
        url: "record_view_entry.php",
        data: {
          id: id,
        },
        dataType: "json",
        success:function(data){


      document.getElementById('image').src = data.image;
       	document.getElementById('emp_id').textContent =data.emp_id;
       	document.getElementById('name').textContent = data.firstname + " " + data.lastname;
       	document.getElementById('date').textContent =data.date;
       	document.getElementById('department').textContent = data.department;
     		document.getElementById('position').textContent = data.position;
       	document.getElementById('schedule_type').textContent = data.schedule;
     		document.getElementById('schedule_time').textContent = data.time_start + " - " + data.time_end;
				document.getElementById('time_in').textContent = data.time_in;
				document.getElementById('time_out').textContent = data.time_out;
				document.getElementById('time_in2').textContent = data.time_in2;
				document.getElementById('time_out2').textContent = data.time_out2;
				document.getElementById('late').textContent = data.late;
				document.getElementById('undertime').textContent = data.undertime;
				document.getElementById('regular_hours').textContent = data.regular;
		document.getElementById('overtime_hours').textContent = data.overtime;
		document.getElementById('total_hours').textContent = data.total_hours;
		document.getElementById('status').textContent = data.status;
      
         
      
          }
    });
}


function close_time_info(){
	document.querySelector('.container_view_record_info').style.display="None";	
}


// driver

function time_entry_image(id){
	document.querySelector('.container-driver-image').style.display="Flex";

	console.log(id);
$.ajax({
        type: "GET",
        url: "driver_view_img_entry.php",
        data: {
         id: id,
        },
        dataType: "json",
        success:function(data){

            
            id = data.id;
            Image = data.image_in;

            console.log(data.id);
         
            console.log(Image);
            
     	console.log(data.time_in);
    
        // document.getElementById('img').src = "../../mobile-application/option-entry/Image-entry/640ae4bee3caa9.89009731.jpg";
        document.getElementById('img-in').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_in);
        document.getElementById('in').textContent = data.time_in;
         document.getElementById('img-out').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_out);
        document.getElementById('out').textContent = data.time_out;
         document.getElementById('img-ot').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_ot);
        // document.getElementById('ot').textContent = data.time_ot;

        }
    });

}

function close_time_entry_image(){
	document.querySelector('.container-driver-image').style.display="None";
}



function close_time_entry_image(){
	document.querySelector('.container-driver-image').style.display="None";
}



// CSV UPLOADED

function time_entry_image(id){
	document.querySelector('.container-driver-image').style.display="Flex";

	console.log(id);
$.ajax({
        type: "GET",
        url: "driver_view_img_entry.php",
        data: {
         id: id,
        },
        dataType: "json",
        success:function(data){

            
            id = data.id;
            Image = data.image_in;

            console.log(data.id);
         
            console.log(Image);
            
     	console.log(data.time_in);
    
        // document.getElementById('img').src = "../../mobile-application/option-entry/Image-entry/640ae4bee3caa9.89009731.jpg";
        document.getElementById('img-in').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_in);
        document.getElementById('in').textContent = data.time_in;
         document.getElementById('img-out').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_out);
        document.getElementById('out').textContent = data.time_out;
         document.getElementById('img-ot').src = "../../mobile-application/option-entry/Image-entry/".concat(data.image_ot);
        // document.getElementById('ot').textContent = data.time_ot;

        }
    });

}

function open_csv(id){
	document.querySelector('.container-csv-info').style.display="FLEX";

	console.log(id);

	$.ajax({
        type: "GET",
        url: "csv-entry.php",
        data: {
         id: id,
        },
        dataType: "json",
        success:function(data){
           

        }
    });

}


function close_csv(){
	document.querySelector('.container-csv-info').style.display="NONE";
}