<?php  
$connect = mysqli_connect("localhost", "root", "", "sms");  
if(!empty($_POST))  
{  
$output = '';  
$message = '';  
 $bname = mysqli_real_escape_string($connect, $_POST["bname"]); 
 $btype = mysqli_real_escape_string($connect, $_POST["btype"]); 
 $publisher = mysqli_real_escape_string($connect, $_POST["publisher"]); 
 $batch = mysqli_real_escape_string($connect, $_POST["batch"]); 
 $semister = mysqli_real_escape_string($connect, $_POST["semister"]); 
 $institute = mysqli_real_escape_string($connect, $_POST["institute"]); 
 $department = mysqli_real_escape_string($connect, $_POST["department"]);  
if($_POST["id"] != '')  
{  
     $query ="
     UPDATE tbl_book 
     SET 
     b_name ='$bname',   
     b_type ='$btype',   
     publisher='$publisher',   
     semister = '$semister',   
     batch  = '$batch',   
     department = '$department',   
     institute  = '$institute'
     WHERE id= '".$_POST["id"]."'";  
     $message = 'Data Updated';
     if (mysqli_query($connect, $query)) {
             header('Location: booklist.php?msgu='.urldecode('Updated Successfully'));
       }  
}  
// else  
// {  
//      $query = "  
//      INSERT INTO tbl_book(b_name, b_type, publisher, semister, batch,department,institute)  
//      VALUES('$bname', '$b_type', '$publisher', '$semister', '$batch','$department','$institute');  
//      ";  
//      $message = 'Data Inserted';  
// }  
// if(mysqli_query($connect, $query))  
// {  
//      $output .= '<label class="text-success">' . $message . '</label>';  
//      $select_query = "SELECT * FROM tbl_book ORDER BY id DESC";  
//      $result = mysqli_query($connect, $select_query);  
//      $output .= '  
//           <table class="table table-bordered">  
//                <tr>  
//                     <th width="70%">Name</th>  
//                     <th width="15%">Edit</th>  
//                     <th width="15%">View</th>  
//                </tr>  
//      ';  
//      while($row = mysqli_fetch_array($result))  
//      {  
//           $output .= '  
//                <tr>  
//                     <td>' . $row["b_name"] . '</td>  
//                     <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
//                     <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
//                </tr>  
//           ';  
//      }  
//      $output .= '</table>';  
// }  
// echo $output;  
}  
?>