// MAINTINANCE
	function open_main_sub_nav(){
		document.querySelector('.maintinance-sub-nav').style.display='Flex';
		document.querySelector('#maintinance').style.marginBottom='20px';
		document.querySelector('#maintinance-arrow-right').style.display='None';

	}
	function close_main_sub_nav(){
		document.querySelector('.maintinance-sub-nav').style.display='None';
		document.querySelector('#maintinance').style.marginBottom='0';
		document.querySelector('#maintinance-arrow-right').style.display='inline';

	}


// MANAGEMENT
	function open_emp_sub_nav(){
		document.querySelector('.management-emp').style.display='Flex';
		document.querySelector('#management').style.marginBottom='20px';
		document.querySelector('#management-arrow-right').style.display='None';

	}
	function close_emp_sub_nav(){
		document.querySelector('.management-emp').style.display='None';
		document.querySelector('#management').style.marginBottom='0';
		document.querySelector('#management-arrow-right').style.display='inline';

	}