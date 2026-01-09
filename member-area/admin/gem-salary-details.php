<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$result =  mysql_query("SELECT * FROM `profile`,`marital`,`Gender`,`S1time`,`S2time`,`timestart`,`Stime`,`employee_catagory` WHERE profile.ms_id=marital.ms_id and profile.g_id=Gender.g_id and profile.st1=timestart.time_s_id and profile.st2=Stime.stime_s_id and profile.et1=S1time.stime_s_id1 and profile.et2=S2time.stime_s_id2 and profile.cat_id=employee_catagory.cat_id HAVING teacher_id = $famID");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				}
		    $this_profile_no = MYSQL_RESULT($result,$i,"teacher_id");
			$tname = MYSQL_RESULT($result,$i,"teacher_name");
			$fname = MYSQL_RESULT($result,$i,"Father_name");
			$cnic = MYSQL_RESULT($result,$i,"CNIC");
			$add = MYSQL_RESULT($result,$i,"Address");
			$tphone = MYSQL_RESULT($result,$i,"Telephone");
			$mphone = MYSQL_RESULT($result,$i,"Mobile");
			$email = MYSQL_RESULT($result,$i,"Email");
			$age = MYSQL_RESULT($result,$i,"Age");
			$nat = MYSQL_RESULT($result,$i,"Nationality");
			$gender = MYSQL_RESULT($result,$i,"gender");
			$mat = MYSQL_RESULT($result,$i,"marital_s");
			$q1 = MYSQL_RESULT($result,$i,"Qualification1");
			$q2 = MYSQL_RESULT($result,$i,"Qualification2");
			$q3 = MYSQL_RESULT($result,$i,"Qualification3");
			$exe = MYSQL_RESULT($result,$i,"Experience");
			$skype = MYSQL_RESULT($result,$i,"Skype");
			$sal = MYSQL_RESULT($result,$i,"Salary");
			$user = MYSQL_RESULT($result,$i,"username");
			$pass = MYSQL_RESULT($result,$i,"userpass");
			$i_remk = MYSQL_RESULT($result,$i,"i_remk");
			$wn1 = MYSQL_RESULT($result,$i,"witness_1");
			$cnic1 = MYSQL_RESULT($result,$i,"cnic_1");
			$rel1 = MYSQL_RESULT($result,$i,"relation_1");
			$mnum1 = MYSQL_RESULT($result,$i,"phone_1");
			$anum1 = MYSQL_RESULT($result,$i,"aphone_1");
			$year1 = MYSQL_RESULT($result,$i,"years_1");
			$add1 = MYSQL_RESULT($result,$i,"address_1");
			$wn2 = MYSQL_RESULT($result,$i,"witness_2");
			$cnic2 = MYSQL_RESULT($result,$i,"cnic_2");
			$rel2 = MYSQL_RESULT($result,$i,"relation_2");
			$mnum2 = MYSQL_RESULT($result,$i,"phone_2");
			$anum2 = MYSQL_RESULT($result,$i,"aphone_2");
			$year2 = MYSQL_RESULT($result,$i,"years_2");
			$add2 = MYSQL_RESULT($result,$i,"address_2");
			$doj = MYSQL_RESULT($result,$i,"joining_date");
			$tz_time = MYSQL_RESULT($result,$i,"time");
			$tz_diff = MYSQL_RESULT($result,$i,"timezone_dif");
			$skype_p = MYSQL_RESULT($result,$i,"s_pass");
			$atphone = MYSQL_RESULT($result,$i,"alt_phone");
			$amphone = MYSQL_RESULT($result,$i,"alt_moblie");
			$aimage = MYSQL_RESULT($result,$i,"ima");
			$witness_id1 = MYSQL_RESULT($result,$i,"w1");
			$witness_id2 = MYSQL_RESULT($result,$i,"w2");
			$cheque_id = MYSQL_RESULT($result,$i,"cheque");
			$agree_id = MYSQL_RESULT($result,$i,"agreement");
			$tsalary = MYSQL_RESULT($result,$i,"salary_amount");
			$trent = MYSQL_RESULT($result,$i,"residence_all");
			$ttax = MYSQL_RESULT($result,$i,"tax");
			$tbank = MYSQL_RESULT($result,$i,"bank");
			$tcode = MYSQL_RESULT($result,$i,"branch_code");
			$tno = MYSQL_RESULT($result,$i,"account_no");
			$ttitle = MYSQL_RESULT($result,$i,"account_title");
			$category = MYSQL_RESULT($result,$i,"cat_name");
			$cat1 = MYSQL_RESULT($result,$i,"cat_id");
			$crate = MYSQL_RESULT($result,$i,"class_rate");
			$csrrate = MYSQL_RESULT($result,$i,"csr_rate");
			$hrate = MYSQL_RESULT($result,$i,"hour_rate");
			$rg_csr = MYSQL_RESULT($result,$i,"csr_rights");
			$rg_teacher = MYSQL_RESULT($result,$i,"teacher_rights");
			$rg_manager = MYSQL_RESULT($result,$i,"super_rights");
			$rg_s_manager = MYSQL_RESULT($result,$i,"s_supper_rights");
			$rg_accounts = MYSQL_RESULT($result,$i,"accounts");
			$rg_billing = MYSQL_RESULT($result,$i,"billing_rights");
			$rg_active = MYSQL_RESULT($result,$i,"active");
			$rg_training = MYSQL_RESULT($result,$i,"training");
			$rg_level = MYSQL_RESULT($result,$i,"level");
			$rg_medi = MYSQL_RESULT($result,$i,"medical");
			$rg_ent = MYSQL_RESULT($result,$i,"entertainment");
			$rg_misc = MYSQL_RESULT($result,$i,"misc");
			$rg_eobi = MYSQL_RESULT($result,$i,"eobi");
			$man_id = MYSQL_RESULT($result,$i,"manager_id");
?>
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Generate Salary</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Generate salary for <?php echo $tname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php if ($sal == 3){echo 'generate-salary-per-hour';} elseif($sal == 4){echo 'generate-salary-per-slot';} else{echo 'generate-salary';} ?>" method="post" class="form-horizontal form-row-seperated">
											<div class="form-group">
															<label class="control-label col-md-3">
															<strong>From</strong></label>
															<div class="col-md-4">
															<input type="date" name="date1" id="date1" value="2018-06-01" class="form-control input-circle" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>To</strong></label>
															<div class="col-md-4">
															<input type="date" name="date2" id="date2" value="2018-06-30" class="form-control input-circle" required></input>
															</div>
												</div>
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Month</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="mon"  id="mon" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06" selected>June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
              									</select>
              												</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Year</strong></label>
															<div class="col-md-4">
															
              												</div>
												</div>
												<input type="hidden" value="2018" name="yyy" id="yyy" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $this_profile_no; ?>" name="t_id" id="t_id" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $tname; ?>" name="t_name" id="t_name" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $tsalary; ?>" name="t_salary" id="t_salary" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $trent; ?>" name="t_rent" id="t_rent" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $ttax; ?>" name="t_tax" id="t_tax" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $link; ?>" name="t_link" id="t_link" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $crate; ?>" name="c_rate" id="c_rate" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $csrrate; ?>" name="csr_rate" id="csr_rate" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $hrate; ?>" name="hour_rate" id="hour_rate" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $sal; ?>" name="type_rate" id="type_rate" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $cat1; ?>" name="type_cat" id="type_cat" class="form-control input-circle"></input>
												<input type="hidden" value="<?php if ($cat1 == 7 OR $cat1 == 8) { echo '7'; } else { echo '8'; } ?>" name="ac_cat" id="ac_cat" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" class="btn btn-circle default">
														Cancel</button>
													</div>
												</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>