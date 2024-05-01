function print_payslip(id,id2){

	var param1 = id;
	var param2 = id2;

var url = `run_payroll.php?id=${param1}&&pay_id=${param2}`;
window.open(url);



};

function proceed_print(){
	window.print();
}


function open_generate_all(payroll_id){

	var id = payroll_id;

var generate = `generate_all.php?payroll_id=${id}`;
window.open(generate);

}

