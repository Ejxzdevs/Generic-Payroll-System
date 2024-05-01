function add_new_allowance(){
	document.querySelector('.pop_new_deduction').style.display="FLEX";
}

function close_add_allowance(){
	document.querySelector('.pop_new_deduction').style.display="NONE";
}


function choose_employee(){
	var choose = document.querySelector('#choose_emp').value;

	if(choose == 'Single'){
		document.querySelector('#emp_type').style.display="FLEX";
	}else if(choose == 'All' || choose == 'Regular' || choose == 'Driver' || choose == 'Casual' || choose == 'None'){
		document.querySelector('#emp_type').style.display="NONE";
	}

}
		

