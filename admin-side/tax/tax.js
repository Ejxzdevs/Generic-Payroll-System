
// view tax

var idt;


function view_tax(id){
    document.querySelector('.container-edit-tax').style.display="Flex";

    idt = id;


    $.ajax({
        type: "GET",
        url: "view_tax.php",
        data: {
         id: id,
        },
        dataType: "json",
        success:function(data) {

       
            document.querySelector('#name').value = data.name;
            document.querySelector('#employer_share').value = data.employer;
            document.querySelector('#employee_share').value = data.employee;
                
       
        }
    });
}
//  update tax

function update_tax(){


    var employer = document.getElementById('employer_share').value;
    var employee = document.getElementById('employee_share').value;
    var name = document.getElementById('name').value;

    $.ajax({
        type: "GET",
        url: "update_tax.php",
        data: {
         id: idt,
         name: name,
         employer: employer,
         employee: employee
        },
        dataType: "json",
        success:function(data) {     


        $('#tax-table').load(window.location.href+ " #tax-table > *");     
  
        }


    });
}

// close pop-up tax



function close_tax(){
    document.querySelector('.container-edit-tax').style.display="None";
}

// switch tax ON/OFF

function control(id){

      $('#tax-table').load(window.location.href+ " #tax-table > *");



	$.ajax({
        type: "GET",
        url: "controll_tax.php",
        data: {
         id : id,
        },
        dataType: "json",
        success:function(data){
     	
        
        }
    });


}

// 

function open_add_tax(){
    document.querySelector('.add-tax-container').style.display="FLEX";
}
function close_add_tax(){
    document.querySelector('.add-tax-container').style.display="NONE";
}

// filter table

function filter_tax_table(){

    var filter = document.querySelector('#filter-emp').value;
    console.log(filter);
}