<?php 

      include "../../connection/connection.php";
    

       $select_title = "SELECT * FROM tbl_company_information order by ID desc ";
       $query_title =mysqli_query($conn,$select_title);
       $res_title = mysqli_fetch_assoc($query_title);
               
          if(isset($_SESSION['id_user'])){

            $id_user = $_SESSION['id_user'];

            $sql = "SELECT * FROM tbl_accounts order by Account_ID desc";
            $user = mysqli_query($conn,$sql);
            $user_result=$user->fetch_assoc();

            error_reporting(0);

}
 ?>