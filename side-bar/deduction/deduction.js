// POP UP DEDUCTION

// function openPopup(id){
	
// 	document.querySelector('.container-deduction').style.display="flex";


// 	  $.ajax({
//         type: "GET",
//         url: "view.php",
//         cache: true,
//         data: {
//           id: id,
          
//         },
//         dataType: "json",
//         success: function(data) {


//             id = data.id;
//             image = data.Employee_Image; 
//             department = data.Job_Department;
//             position = data.Position
//             firstname = data.firstname;
//             lastname = data.lastname;
//             Deduction_Name = data.Deduction_Name;
//             Deduction_Value =data.Deduction_Value;
//             status = data.Status;
            
          
//             document.getElementById('id').textContent = id;
//             document.getElementById('img').src = "../employees/".concat(image);
//             document.getElementById('position').textContent = department;
//             document.getElementById('department').textContent = position;
//             // document.getElementById('firstname').textContent = Deduction_Name;
//             document.getElementById('lastname').textContent = lastname;


//             // $.each(data, function (keys, value) {
//             //   $('#exampleid').append("<tr>\
//             //         <td>"+value+"</td>\
//             //         <td>"+keys+"</td>\
//             //         \
//             //         </tr>");
//             // })

           
      

//         }
//     });
// }

// const btnClose = document.getElementById('closePop');

// function closeDeduction(){
	
// 	document.querySelector('.container-deduction').style.display="none";
// }

// btnClose.addEventListener("click",closeDeduction);