<?php  
 $connect = mysqli_connect("localhost", "root", "", "sms");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $subname = mysqli_real_escape_string($connect, $_POST["subname"]);  
      $subno = mysqli_real_escape_string($connect, $_POST["subno"]);  
      $tname = mysqli_real_escape_string($connect, $_POST["tname"]);  
      $batch = mysqli_real_escape_string($connect, $_POST["batch"]);  
  $semister = mysqli_real_escape_string($connect, $_POST["semister"]); 
  $department = mysqli_real_escape_string($connect, $_POST["department"]); 
  $institute = mysqli_real_escape_string($connect, $_POST["institute"]);  
      if($_POST["id"] != '')  
      {  
           $query = "  
           UPDATE tbl_subject  
           SET 
           subname='$subname',   
           subno='$subno',   
           tname='$tname',   
           batch = '$batch',   
           semister = '$semister',   
           department = '$department',
           institute = '$institute'
           WHERE id='".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_subject(name, address, gender, designation, age)  
           VALUES('$name', '$address', '$gender', '$designation', '$age');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           header("Location:subjectlist.php");  
      }   
 }  
 ?>