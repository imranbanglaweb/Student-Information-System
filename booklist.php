<?php include 'inc/header.php';?>
<div class="studentlist">
<h3>Book List</h3>

<a href="addbook.php" role="button"  class="btn btn-sml btn-primary">Add Book  <i class="fa fa-rss">
</i>
</a>
<a href="booklist.php" role="button"  class="btn btn-sml btn-info">Reload <i class="fa fa-refresh
">
</i>
</a>
<div id="successMessage">
      <?php 
    if (isset($_GET['msg'])) {
      echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
    }
    ?>
</div>
<div id="successMessage">
      <?php 
    if (isset($_GET['msgu'])) {
      echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
    }
    ?>
</div>
<table id="myTable" class="display" >
    <thead class="bg-success">
	<tr>
		<th width="1%">N</th>
		<th width="2%">Book N</th>
		<th width="2%">Book T</th>
    <th width="1%">Book</th>
    <th width="3%">Details</th>
    <th width="3%">Edit</th>
    <th width="3%">Delete</th>
	</tr>
	</thead>
<?php 
$query="SELECT  * FROM tbl_book order by id desc";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_assoc()) {
	$i++;
?>

	<tr>
		<td><?php echo $i;?></td>
		<td>
        <?php echo $result['b_name'];?></td>
		<td><?php echo $result['b_type'];?></td>
		<td><a href="<?php echo $result['book'];?>">
      <img src="images/pdf.png" height="25px" width="25px">Book</a>
    </td>
    <td>
    <button class="md-trigger btn-info btn-sm uid" 
            data-id="<?php echo $result['id']; ?>" data-modal="modal-1" id="getUser">
            <i class="glyphicon glyphicon-eye-open"></i>&nbsp;Details
            </button>
    </td>
    <td>
    <button class="btn btn-sm btn-default edit_data" type="button" name="edit" id="<?php echo $result["id"]; ?>"> 
        <i class="glyphicon glyphicon-edit"></i> 
        Edit
      </button>
    </td>
    <td>
      <a class="delete_product btn-danger btn-sm" data-id="<?php echo $result['id']; ?>" href="javascript:void(0)">Delete <i class="glyphicon glyphicon-trash"></i> 
       </a> &nbsp; &nbsp; 
    </td>
    
	</tr>
<?php }}?>
</table>
</div>
<!-- Modal Start -->
<!-- Modal -->
<div class="md-modal md-effect-5" id="modal-1">
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
<div id="add_data_Modal" class="modal fade md-effect-5">  
  <div class="modal-dialog">  
       <div class="modal-content">  
            <div class="modal-header">  
                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                 <h4 class="modal-title">
                 Update Your Information
                 </h4>  
            </div>  
            <div class="modal-body">  
                 <form method="post" id="insert_form">  
                      <label>Book Name</label>  
                      <input type="text" name="b_name" id="name" class="form-control" />  
                      <br />  
                      <label>Book Type</label>  
                      <textarea name="b_type" id="b_type" class="form-control"></textarea> 
                      <label>Publisher</label>  
                      <input type="text" name="publisher" id="publisher" class="form-control" />  
                      <br />  
                      <label>Semister</label>  
                      <input type="text" name="semister" id="semister" class="form-control" />  
                      <br />  
                      <label>Batch</label>  
                      <input type="text" name="batch" id="batch" class="form-control" />  
                      <br />  
                      <label>Department</label>  
                      <input type="text" name="department" id="department" class="form-control" />  
                      <br /> 
                      <label>Institute</label>  
                      <input type="text" name="institute" id="institute" class="form-control" />  
                      <br />  
                      <input type="hidden" name="id" id="id" />  
                      <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                 </form>  
            </div>  
            <div class="modal-footer">  
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
            </div>  
       </div>  
  </div>  
</div> 
<script>  
$(document).ready(function(){   
$('#add').click(function(){  
   $('#insert').val("Insert");  
   $('#insert_form')[0].reset();  
}); 
  $(document).on('click', '.edit_data', function(){  
       var id = $(this).attr("id");  
       $.ajax({  
            url:"Modal/fetchbook.php",  
            method:"POST",  
            data:{id:id},  
            dataType:"json",  
            success:function(data){  
                 $('#name').val(data.b_name);  
                 $('#b_type').val(data.b_type);  
                 $('#publisher').val(data.publisher);  
                 $('#batch').val(data.batch);  
                 $('#semister').val(data.semister);  
                 $('#department').val(data.department);  
                 $('#institute').val(data.institute);  
                 $('#id').val(data.id);  
                 $('#insert').val("Update");  
                 $('#add_data_Modal').modal('show');  
            }  
       });  
  });  
$('#insert_form').on("submit", function(event){  
       event.preventDefault();  
       if($('#name').val() == "")  
       {  
            alert("Name is required");  
       }  
       else if($('#address').val() == '')  
       {  
            alert("Address is required");  
       }  
       else if($('#designation').val() == '')  
       {  
            alert("Designation is required");  
       }  
       else if($('#age').val() == '')  
       {  
            alert("Age is required");  
       }  
       else  
       {  
            $.ajax({  
                 url:"Modal/upDatebook.php",  
                 method:"POST",  
                 data:$('#insert_form').serialize(),  
                 beforeSend:function(){  
                      $('#insert').val("Updating");  
                 },  
                 success:function(data){  
                      $('#insert_form')[0].reset();  
                      $('#add_data_Modal').modal('hide');  
                      $('#employee_table').html(data);  
                 }  
            });  
       }  
  });  
  $(document).on('click', '.view_data', function(){  
       var employee_id = $(this).attr("id");  
       if(employee_id != '')  
       {  
            $.ajax({  
                 url:"select.php",  
                 method:"POST",  
                 data:{id:id},  
                 success:function(data){  
                      $('#employee_detail').html(data);  
                      $('#dataModal').modal('show');  
                 }  
            });  
       }            
  }); 
  
});  
</script> 
<script>
$(document).ready(function(){
    
    $(document).on('click', '#getUser', function(e){
        
        e.preventDefault();
        
        var uid = $(this).data('id');   // it will get id of clicked row
        
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader
        
        $.ajax({
            url: 'Modal/bookDetails.php',
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="Modal/bootbox.min.js"></script>

<script>
    $(document).ready(function(){
        
        $('.delete_product').click(function(e){
            
            e.preventDefault();
            
            var pid = $(this).attr('data-id');
            var parent = $(this).parent("td").parent("tr");
            
            bootbox.dialog({
              message: "Are you sure you want to Delete ?",
              title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
              buttons: {
                success: {
                  label: "No",
                  className: "btn-success",
                  callback: function() {
                     $('.bootbox').modal('hide');
                  }
                },
                danger: {
                  label: "Delete!",
                  className: "btn-danger",
                  callback: function() {
                      
                      
                      $.post('Modal/delete.php', { 'delete':pid})
                      .done(function(response){
                          bootbox.alert(response);
                          parent.fadeOut('slow');
                      })
                      .fail(function(){
                          bootbox.alert('Something Went Wrog ....');
                      })
                                          
                  }
                }
              }
            });
            
            
        });
        
    });
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
    // <!-- data table -->

      // <script src="js/jquery-1.11.3.min.js"></script>
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