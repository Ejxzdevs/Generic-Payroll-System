// filter table

function filter_tax_table(filter){


    console.log(filter.value);
     location.reload();
  

    $.ajax({
        type: "GET",
        url: "tax-filter.php",
        data: {
         filter: filter.value
         
        },
        dataType: "json",
        success:function(data){     

       
        }


    });
}

