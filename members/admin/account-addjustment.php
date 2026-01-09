
<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">You are adjusting <?php echo $famName; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="allocate-csr-update">
                <input type="hidden" value="<?php echo $famID; ?>" name="r_id" id="r_id" class="form-control">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Student Name</label><select name="csrid"  id="csrid" class="form-control" required>
                                                    <?php 
                                                    $sql = "SELECT * FROM profile WHERE active = 1 and cat_id = 7 ORDER BY teacher_id";
$counter = 0;
$result = mysqli_query($conn, $sql);			  	
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php }  ?>
                                                </select></div>
                                                </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>