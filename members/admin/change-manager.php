<?
require ("../includes/dbconnection.php");
$famTECH=$_GET['famTECH'];
$famMAN=$_GET['famMAN'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Manager</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="change-manager-update">
				<input type="hidden" value="<?php echo $famTECH; ?>" name="tech" id="tech" class="form-control">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Managers and Senior Managers</label>
                                                    <select required class="form-control" name="man"  id="man" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 4 OR cat_id = 5 OR super_rights = 1 OR s_supper_rights = 1) and active = 1 ORDER BY teacher_id ");			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>
                                                    </div>
                                                </div>
                                </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>