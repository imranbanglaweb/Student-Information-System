<?php include 'inc/header.php';?>
<!-- <link rel="stylesheet" type="text/css" href="css/default.css"> -->
<div class="studentlist">
<h3>Social Site List</h3>
<?php if (isset($_GET['delid'])) {
    $delid=$_GET['delid'];
    $query="DELETE FROM tbl_social WHERE id='$delid'";
    $delsocial=$dbcon->delete($query);
  if ($delsocial) {
echo "<span class='success'>Deleted Social Site.</span>";
   }
   else{
    echo "No Deleted Social Site";
   }
} 

?>
<a href="addSocial.php" role="button"  class="btn btn-sml btn-primary">Add Social Site  <i class="fa fa-rss">
</i>
</a>
<div id="successMessage">
      <?php 
    if (isset($_GET['msg'])) {
      echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
    }
    ?>
</div>
<table id="myTable" class="display" >
    <thead class="bg-success">
	<tr>
		<th width="1%">N</th>
		<th width="2%">S N</th>
		<th width="2%">S T</th>
		<th width="2%">Social L</th>
    <th width="2%">Photo</th>
    <th width="10%">Action</th>
		<th width="5%"></th>
	</tr>
	</thead>
<?php 
$query="SELECT  * FROM tbl_social order by id desc";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_assoc()) {
	$i++;
?>

	<tr>
		<td><?php echo $i;?></td>
		<td>
        <?php echo $result['name'];?></td>
		<td><?php echo $result['title'];?></td>
		<td><?php echo $result['link'];?></td>
        <td>
        <img src="<?php echo $result['image'];?>" width="25px" height ="25px" title="<?php echo $result['title'];?>">
        </td> 
         <td>
      <a class="delete_product btn btn-danger btn-sm" data-id="<?php echo $result['id']; ?>" href="javascript:void(0)">DELETE
                <i class="glyphicon glyphicon-trash"></i>
       </a>
        </td>
        <td>
          <button class="md-trigger" data-modal="modal-1">Details.
          </button>
        </td>    
	</tr>
<?php } } ?>
</table>
</div>
<div class="md-modal md-effect-15" id="modal-1">    
     <div class="md-content">   
      <div> 

<table  class=""  border="2">
    <thead class="bg-success">
  <tr>
    <th width="2%">S N</th>
    <th width="2%">S T</th>
    <th width="2%">Social L</th>
    <th width="2%">Photo</th>
  </tr>
  </thead>
<?php 
$query="SELECT  * FROM tbl_social";
$post=$dbcon->select($query);
if ($post) {
while ($result=$post->fetch_assoc()) {
?>

  <tr>
    <td>
        <?php echo $result['name'];?></td>
    <td><?php echo $result['title'];?></td>
    <td><?php echo $result['link'];?></td>
        <td>
        <img src="<?php echo $result['image'];?>" width="25px" height ="25px" title="<?php echo $result['title'];?>">
        </td>     
  </tr>
<?php } } ?>
</table>

        <button class="md-close">Close me!</button>
      </div>   
     </div>    
</div>
<div class="md-overlay"></div><!-- the overlay element -->
<!-- classie.js by @desandro: https://github.com/desandro/classie -->

<script>  
$(document).ready(function(){   
  $(document).on('click', '.view_data', function(){  
     var employee_id = $(this).attr("id");  
     if(employee_id != '')  
     {  
      $.ajax({  
         url:"select.php",  
         method:"POST",  
         data:{employee_id:employee_id},  
         success:function(data){  
            $('#employee_detail').html(data);  
            $('#dataModal').modal('show');  
         }  
      });  
     }            
  });  
});  
</script>
<script src="js/bootstrap.min.js"></script>
    <script src="Modal/classie.js"></script>
    <script src="Modal/modernizr.custom.js"></script>
    <script src="Modal/modalEffects.js"></script>
    <script>
      // this is important for IEs
      var polyfilter_scriptpath = '/js/';
    </script>
    <script src="Modal/cssParser.js"></script>
    <script src="Modal/css-filters-polyfill.js"></script>
<script src="js/jquery-1.12-0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    // <!-- data table -->
      <script src="js/jquery-1.11.3.min.js"></script>
        <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js">
    </script>
    <link rel="stylesheet" type="text/css"
        href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css" />


 <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#myTable').dataTable()
            var tableTools = new $.fn.dataTable.TableTools(table, {
                'aButtons': [
                    {
                        'sExtends': 'xls',
                        'sButtonText': 'Save to Excel',
                        'sFileName': 'Data.xls'
                    },
                    {
                        'sExtends': 'print',
                        'bShowAll': true,
                    },
                    {
                        'sExtends': 'pdf',
                        'bFooter': false
                    },
                    'copy',
                    'csv'
                ],
                'sSwfPath': '//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf'
            });
            $(tableTools.fnContainer()).insertBefore('#myTable_wrapper');
        });
    </script>


<?php include"inc/footer.php";?>