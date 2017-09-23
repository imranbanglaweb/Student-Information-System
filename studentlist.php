<?php include 'inc/header.php';?>
<div class="studentlist">
<h3>Student List</h3>
<a href="addstudent.php" role="button"  class="btn btn-sml btn-primary">Add Student  <i class="fa fa-rss">
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
		<th width="2%">SL</th>
		<th width="5%">Name</th>
		<th width="2%">Roll</th>
		<th width="2%">Semister</th>
        <th width="8%">Blood Group</th>
        <th width="2%">Department</th>
		<th width="5%">Photo</th>
		<th width="5%">Details</th>
	</tr>
	</thead>
<?php 
$query="SELECT  * FROM tbl_student_info order by id desc";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_assoc()) {
	$i++;
?>

	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $result['name'];?></td>
		<td><?php echo $result['roll'];?></td>
		<td><?php echo $result['semister'];?></td>
		<td><?php echo $result['blood'];?></td>
		<td><?php echo $result['department'];?></td>
        <td>
        <img src="<?php echo $result['image'];?>" height="40px" width="50px">
        </td> 
        <td>
        <button data-toggle="modal" data-target="#modal" data-id="<?php echo $result['id']; ?>" id="getUser" class="btn btn-sm btn-info uid"><i class="glyphicon glyphicon-eye-open"></i> View
        </button>
        </td>
	</tr>
<?php }}?>
</table>
</div>
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog"> 
          <div class="modal-content"> 
          
               <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">
                        <i class="glyphicon glyphicon-user"></i>
                        Personal Details
                    </h4> 
               </div> 
               <div class="modal-body">            
                   <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="images/ajax-loader.gif">
                   </div>
                </div>                          
            <div id="dynamic-content"></div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                    </button>  
                </div> 
        </div> 
    </div> 
</div><!-- /.modal -->

<script>
$(document).ready(function(){
    
    $(document).on('click', '#getUser', function(e){
        
        e.preventDefault();
        
        var uid = $(this).data('id');   // it will get id of clicked row
        
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        
        $.ajax({
            url: 'Modal/getuser.php',
            type: 'POST',
            data: 'id='+uid,
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);  
            $('#dynamic-content').html('');    
            $('#dynamic-content').html(data); // load response 
            $('#modal-loader').hide();        // hide ajax loader   
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });
        
    });
    
});
</script>
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
            var table = $('#myTable').dataTable(
                {
                   responsive: true 
                });
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