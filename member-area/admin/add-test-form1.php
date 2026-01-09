<?php session_start(); ?>
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
<?php
include("../includes/session1.php");
include("header.php");

    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$cn= $_POST['con_name'];
		 	$ca= $_POST['con_ab'];
			mysql_query ("INSERT INTO country (c_a, c_name)
					VALUES('$cn', '$ca')") or die(mysql_error()); 
					 header(
			 	"Location: list-of-country");
				}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add <small>New Country</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are adding new country
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>You are adding test result
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<h3><strong>TAJWEED</strong></h3></label>
										</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Makharij</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox1" value="1" id="checkbox1" class="md-check">
											<label for="checkbox1">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox2" value="1" id="checkbox2" class="md-check">
											<label for="checkbox2">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox3" value="1" id="checkbox3" class="md-check">
											<label for="checkbox3">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox4" value="1" id="checkbox4" class="md-check">
											<label for="checkbox4">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox5" value="1" id="checkbox5" class="md-check">
											<label for="checkbox5">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox6" value="1" id="checkbox6" class="md-check">
											<label for="checkbox6">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>															
														</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Rules of Noon Sakin &amp; Tanween</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox7" value="1" id="checkbox7" class="md-check">
											<label for="checkbox7">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox8" value="1" id="checkbox8" class="md-check">
											<label for="checkbox8">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox9" value="1" id="checkbox9" class="md-check">
											<label for="checkbox9">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox10" value="1" id="checkbox10" class="md-check">
											<label for="checkbox10">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox11" value="1" id="checkbox11" class="md-check">
											<label for="checkbox11">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox12" value="1" id="checkbox12" class="md-check">
											<label for="checkbox12">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>															
														</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Rules of Meem Sakin &amp; Tanween</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox13" value="1" id="checkbox13" class="md-check">
											<label for="checkbox13">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox14" value="1" id="checkbox14" class="md-check">
											<label for="checkbox14">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox15" value="1" id="checkbox15" class="md-check">
											<label for="checkbox15">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>														
											</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Qulqala</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox16" value="1" id="checkbox16" class="md-check">
											<label for="checkbox16">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox17" value="1" id="checkbox17" class="md-check">
											<label for="checkbox17">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox18" value="1" id="checkbox18" class="md-check">
											<label for="checkbox18">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>														
											</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Guuna</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox19" value="1" id="checkbox19" class="md-check">
											<label for="checkbox19">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox20" value="1" id="checkbox20" class="md-check">
											<label for="checkbox20">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox21" value="1" id="checkbox21" class="md-check">
											<label for="checkbox21">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>															
											</div>
												</div>
												<div class="form-group">
									<label class="control-label col-md-3">
												<strong>Madda Letters &amp; Madh</strong></label>
									<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox22" value="1" id="checkbox22" class="md-check">
											<label for="checkbox22">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox23" value="1" id="checkbox23" class="md-check">
											<label for="checkbox23">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox24" value="1" id="checkbox24" class="md-check">
											<label for="checkbox24">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox25" value="1" id="checkbox25" class="md-check">
											<label for="checkbox25">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox26" value="1" id="checkbox26" class="md-check">
											<label for="checkbox26">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox">
											<input type="checkbox" name="checkbox27" value="1" id="checkbox27" class="md-check">
											<label for="checkbox27">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
														</div>
												</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<h3><strong>QURAN READING</strong></h3></label>
										</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Reading Fluency</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="mon"  id="mon" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="100">Excellent</option>
												<option value="75">Above Average</option>
												<option value="50">On Average</option>
												<option value="25">Below Average</option>
												<option value="0">Not Good</option>
              									</select>
															</div>
												</div>
											<div class="form-group">
															<label class="control-label col-md-3">
															<h3><strong>QURAN MEMORIZATION</strong></h3></label>
										</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Munzil</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="mon"  id="mon" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="100">Excellent</option>
												<option value="75">Above Average</option>
												<option value="50">On Average</option>
												<option value="25">Below Average</option>
												<option value="0">Not Good</option>
              									</select>
															</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>