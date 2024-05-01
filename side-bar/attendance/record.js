function open_record_view(id){
	document.querySelector('.container_view_record_info').style.display="Flex";	
	
	// console.log("HELLO");
	console.log(id);

	$.ajax({
        type: "GET",
        url: "record_view_entry.php",
        data: {
          id: id,
        },
        dataType: "json",
        success:function(data){

        console.log(data.id);
        console.log(data.emp_id);

        if(data.image == ''){
        document.getElementById('image').src = "../employees/emp-image/".concat(data.image);
      	}else{
      		document.getElementById('image').src = "../../icons/user1.png";
      	}
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
function close_record_view(){
		document.querySelector('.container_view_record_info').style.display="None";	
	}