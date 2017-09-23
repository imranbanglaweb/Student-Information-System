<!-- Modal -->
<?php include 'config/dbcon.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>
<?php 
    $dbcon=new Database();
    $dfm=new Format();

?>
      <div class="row">
          <div class="modal fade slide right my-modal-style" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
                <?php 
                 if (isset($_GET['uid'])) {
                    $uid=$_GET['uid'];
            $query="SELECT  * FROM tbl_social WHERE id=$uid";
                    $update=$dbcon->select($query);
                    while ($data = $update->fetch_array()) {?>
                    <table>
                    <tr>
                        
                        <td>Name</td>
                        <td><?php echo $data[1];?></td>
                        
                    </tr>
                    <tr>
                        
                        <td>Link</td>
                        <td><?php echo $data[2];?></td>
                        
                    </tr>
                    <tr>
                        
                        <td>Title</td>
                        <td><?php echo $data[3];?></td>
                        
                    </tr>
                    <tr>
                        
                        <td>Image</td>
                        <td><?php echo $data[4];?></td>
                        
                    </tr>
                <?php } }?>
                </table>
                <hr>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div><!-- end Modal -->