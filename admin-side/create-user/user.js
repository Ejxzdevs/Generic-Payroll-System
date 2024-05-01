function create_user(){
	document.querySelector('.pop-create-user').style.display="Flex";
}

function close_create_user(){
	document.querySelector('.pop-create-user').style.display="None";
}

// switch

function control(id){

 $('#user_table').load(window.location.href + " #user_table > *"); 



	$.ajax({
        type: "GET",
        url: "controll_account.php",
        data: {
         id : id,
        },
        dataType: "json",
        success:function(data){

          // document.querySelector('#switch').style.backgroundColor = "red";
            
            
     	
    
       
        }
    });


}