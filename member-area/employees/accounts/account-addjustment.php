<?php
require ("../includes/dbconnection.php");
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
$famID=$_GET['famID'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>You are adjusting <?php echo $famName; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="allocate-csr-update" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>CSR</strong></label>
															<div class="col-md-7">
															<select required class="form-control" name="csrid"  id="csrid" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE active = 1 and cat_id = 7 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="r_id" id="r_id" class="form-control"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
													</div>
												</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>