<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "sms");  
 if(isset($_POST["id"]))  
 {  
  $query = "SELECT * FROM tbl_book WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>  