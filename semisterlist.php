<?php include 'inc/header.php';?>

<div class="studentlist">
<h3>Semister List</h3>
			<i class="fa fa-trash"></i>
		<!-- 	<a onclick="return confirm('Are you sure to Deleted');" href="?delpost=<?php echo $result['id'];?>">Delete</a>
			</td> -->
<a href="addsemister.php" role="button"  class="btn btn-sml btn-primary">Add Semister  <i class="fa fa-rss">
</i>
</a>
<table id="myTable" class="display" >
    <thead class="bg-success">
	<tr>
		<th width="2%">SL</th>
		<th width="5%">Name</th>
		<th width="2%">Roll</th>
        <th width="2%">Semister</th>
		<th width="2%">Details</th>
	</tr>
	</thead>
<?php 
$query="SELECT  * FROM tbl_semister order by id desc";
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
		<td>
        <button class="md-trigger btn-info btn-sm uid" 
            data-id="<?php echo $result['id']; ?>" data-modal="modal-1" id="getUser">
            <i class="glyphicon glyphicon-eye-open"></i>&nbsp;Details
        </button>      
        </td>
	</tr>
<?php }}?>
</table>

</div>
<!-- Modal Start -->
<!-- Modal -->
<div class="md-modal md-effect-18" id="modal-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="md-content">
      <div class="md-header">
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
        <button class="md-close btn-success btn-lg">
        Close me!</button>
    </div>

  </div>
</div>
<div class="md-overlay"></div><!-- the overlay element -->
<script>
$(document).ready(function(){
    
    $(document).on('click', '#getUser', function(e){
        
        e.preventDefault();
        
        var uid = $(this).data('id');   // it will get id of clicked row
        
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        
        $.ajax({
            url: 'Modal/SemisterDetails.php',
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
<!-- classie.js by @desandro: https://github.com/desandro/classie -->
<script src="Modal/classie.js"></script>
<script src="Modal/modernizr.custom.js"></script>
<script src="Modal/modalEffects.js"></script>
<script>
  // this is important for IEs
  var polyfilter_scriptpath = '/js/';
</script>
<script src="Modal/cssParser.js"></script>
<script src="Modal/css-filters-polyfill.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
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