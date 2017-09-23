<?php include 'inc/header.php';?>
<div class="studentlist">
  	     <h3>Inbox</h3>
<?php 
if (isset($_GET['delid'])) {
    $delid=$_GET['delid'];
    $query="DELETE FROM tbl_email
     WHERE id='$delid'";
     $del=$dbcon->delete($query);
      if ($del) {
        echo "<span class='success'>Deleted successfully</span>";
           }
           else{
            echo "No Deleted ";
           }
                        }
 ?>
         <div id="successMessage">
        <?php 
            if (isset($_GET['msg'])) {
              echo "<span class='logout_msg' id='myElem'>".$_GET['msg']."</span>";
            }
        ?>
        </div>
        <?php 
if (isset($_GET['seenid'])) {
    $seenid=$_GET['seenid'];
    $query ="UPDATE  tbl_email 
     SET
     status=1
     WHERE id='$seenid'";
     $updateid=$dbcon->update($query);
     if ($updateid) {
        echo "<span style='color:green'>Your Massage Seen successfully</span>";
     }
     else{
        echo "Your Massage not Seen successfully";
     }
}
 ?>
 <?php 
if (isset($_GET['unseenid'])) {
    $unseenid=$_GET['unseenid'];
    $query ="UPDATE  tbl_email 
     SET
     status=0
     WHERE id='$unseenid'";
     $updateid=$dbcon->update($query);
     if ($updateid) {
        echo "<span style='color:green'>Your Massage UnSeen successfully</span>";
     }
     else{
        echo "Your Massage not Seen successfully";
     }
}
 ?>
        <div class="col-md-12">
            <div class="mailbox-content">
                <table id="myTable" class="display" cellpadding="5">

                    <thead class="bg-success">
                    <tr>
                        <td width="5%">First Name</td>
                        <td width="5%">Message</td>
                        <td width="5%">Email</td>
                        <td width="10%">Action</td>
                    </tr>
                     </thead>
                    <?php 
                    $query  = "SELECT * FROM tbl_email WHERE status=0";
                    $result = $dbcon->select($query);
                     while ($row=$result->fetch_assoc()){?>
                         <tr class="unread checked">
                            <td>
                            <?php echo $row['fname'];?>
                            </td>
                            <td>
                                <?php echo $row['email'];?>
                            </td>
                            <td><?php echo $row['body'];?></td>
                            <td>
    <a href="view.php?msg=<?php echo $row['id'];?>">View</a>||
    <a href="reply.php?msg=<?php echo $row['id'];?>">Reply</a>||
    <a href="?seenid=<?php echo $row['id'];?>">Seen</a>
                            </td>
                        </tr>
                    <?php }?>
                   
                </table>
                <br>
                <tr></tr>
                <h2>Seen Box</h2>
                <br>
                <hr>
                 <table id="myTable" class="display" cellpadding="5">
                    <thead class="bg-success">
                    <tr>
                        <td width="5%">First Name</td>
                        <td width="5%">Message</td>
                        <td width="5%">Email</td>
                        <td width="10%">Action</td>
                    </tr>
                     </thead>
                    <?php 
                    $query  = "SELECT * FROM tbl_email WHERE status=1";
                    $result = $dbcon->select($query);
                     while ($row=$result->fetch_assoc()){?>
                         <tr class="unread checked">
                            <td>
                            <?php echo $row['fname'];?>
                            </td>
                            <td>
                                <?php echo $row['email'];?>
                            </td>
                            <td><?php echo $row['body'];?></td>
                            <td>
    <a href="view.php?msg=<?php echo $row['id'];?>">View</a>||
    <a href="?unseenid=<?php echo $row['id'];?>">UnSeen</a>
    <a onclick="return confirm('Are you sure to Deleted')" href="?delid=<?php echo $row['id']?>">
                        <i class="fa fa-remove" aria-hidden="true"></i>
                        Delete</a>
                            </td>
                            
                        </tr>
                    <?php }?>
                   
                </table>
               </div>
            </div>
       </div>

     <!-- data table -->
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
