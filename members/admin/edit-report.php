<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$ccc =$_REQUEST['ID'];
// sending query
$sql = "SELECT * FROM `reports` WHERE report_id = '$ccc' ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$Report_ID = $row['report_id'];
			$Course_ID = $row['course_id'];
			$Teacher_ID = $row['teacher_id'];
			$Dept_ID = $row['dept_id'];
			$date = $row['date'];
			$noorani_qaida = $row['noorani_qaida'];
			$noorani_qaida_number = $row['noorani_qaida_number'];
			$noorani_qaida_des = $row['noorani_qaida_des'];
			$noorani_qaida_next = $row['noorani_qaida_next'];
			$quran_reading = $row['quran_reading'];
			$quran_reading_number = $row['quran_reading_number'];
			$quran_reading_des = $row['quran_reading_des'];
			$quran_reading_next = $row['quran_reading_next'];
			$tajweed_rules = $row['tajweed_rules'];
			$tajweed_rules_number = $row['tajweed_rules_number'];
			$tajweed_rules_des = $row['tajweed_rules_des'];
			$tajweed_rules_next = $row['tajweed_rules_next'];
			$memorization = $row['memorization'];
			$memorization_number = $row['memorization_number'];
			$memorization_des = $row['memorization_des'];
			$memorization_next = $row['memorization_next'];
			$revision = $row['revision'];
			$revision_number = $row['revision_number'];
			$revision_des = $row['revision_des'];
			$revision_next = $row['revision_next'];
			$ijaazah = $row['ijaazah'];
			$ijaazah_number = $row['ijaazah_number'];
			$ijaazah_des = $row['ijaazah_des'];
			$ijaazah_next = $row['ijaazah_next'];
			$studies = $row['studies'];
			$studies_number = $row['studies_number'];
			$studies_des = $row['studies_des'];
			$studies_next = $row['studies_next'];
			$supplication = $row['supplication'];
			$supplication_number = $row['supplication_number'];
			$supplication_des = $row['supplication_des'];
			$supplication_next = $row['supplication_next'];
			$arabic = $row['arabic'];
			$arabic_number = $row['arabic_number'];
			$arabic_des = $row['arabic_des'];
			$arabic_next = $row['arabic_next'];
	}
	}
?>
<?php
$page_title = 'Monthly Report';
$page_subtitle = 'Monthly Report';
$table_name = 'Monthly Report';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php //echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="save-edit-report">
										    <div class="form-group">
															<label>Date</label>
															<div>
															<input type="date" class="form-control" value="<?php echo $date; ?>" id="date" name="date" />
                                                    </div>
												</div>
										<?php if ($noorani_qaida == 1) { echo '<div class="form-group">
															<label><h3>Noorani Qaida</h3></label>
															<div>
															<select class="form-control" name="noorani-qaida-number"  id="noorani-qaida-number">
                                                                <option value="1" '.(($noorani_qaida_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($noorani_qaida_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($noorani_qaida_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($noorani_qaida_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($noorani_qaida_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($noorani_qaida_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($noorani_qaida_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($noorani_qaida_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($noorani_qaida_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($noorani_qaida_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="noorani-qaida-des" name="noorani-qaida-des">'.$noorani_qaida_des.'</textarea>
															<br>
															<textarea class="form-control" id="noorani-qaida-next" name="noorani-qaida-next">'.$noorani_qaida_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($quran_reading == 1) { echo '<div class="form-group">
															<label><h3>Quran Reading</h3></label>
															<div>
															<select class="form-control" name="quran-reading-number"  id="quran-reading-number">
                                                                <option value="1" '.(($quran_reading_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($quran_reading_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($quran_reading_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($quran_reading_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($quran_reading_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($quran_reading_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($quran_reading_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($quran_reading_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($quran_reading_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($quran_reading_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="quran-reading-des" name="quran-reading-des">'.$quran_reading_des.'</textarea>
															<br>
															<textarea class="form-control" id="quran-reading-next" name="quran-reading-next">'.$quran_reading_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($tajweed_rules == 1) { echo '<div class="form-group">
															<label><h3>Tajweed Rules</h3></label>
															<div>
															<select class="form-control" name="tajweed-rules-number"  id="tajweed-rules-number">
                                                                <option value="1" '.(($tajweed_rules_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($tajweed_rules_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($tajweed_rules_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($tajweed_rules_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($tajweed_rules_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($tajweed_rules_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($tajweed_rules_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($tajweed_rules_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($tajweed_rules_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($tajweed_rules_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="tajweed-rules-des" name="tajweed-rules-des">'.$tajweed_rules_des.'</textarea>
															<br>
															<textarea class="form-control" id="tajweed-rules-next" name="tajweed-rules-next">'.$tajweed_rules_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($memorization == 1) { echo '<div class="form-group">
															<label><h3>Quran Memorization</h3></label>
															<div>
															<select class="form-control" name="memorization-number"  id="memorization-number">
                                                                <option value="1" '.(($memorization_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($memorization_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($memorization_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($memorization_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($memorization_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($memorization_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($memorization_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($memorization_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($memorization_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($memorization_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="memorization-des" name="memorization-des">'.$memorization_des.'</textarea>
															<br>
															<textarea class="form-control" id="memorization-next" name="memorization-next">'.$memorization_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($revision == 1) { echo '<div class="form-group">
															<label><h3>Quran Revision</h3></label>
															<div>
															<select class="form-control" name="revision-number"  id="revision-number">
                                                                <option value="1" '.(($revision_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($revision_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($revision_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($revision_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($revision_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($revision_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($revision_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($revision_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($revision_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($revision_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="revision-des" name="revision-des">'.$revision_des.'</textarea>
															<br>
															<textarea class="form-control" id="revision-next" name="revision-next">'.$revision_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($ijaazah == 1) { echo '<div class="form-group">
															<label><h3>Quran Ijazah</h3></label>
															<div>
															<select class="form-control" name="ijaazah-number"  id="ijaazah-number">
                                                                <option value="1" '.(($ijaazah_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($ijaazah_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($ijaazah_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($ijaazah_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($ijaazah_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($ijaazah_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($ijaazah_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($ijaazah_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($ijaazah_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($ijaazah_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="ijaazah-des" name="ijaazah-des">'.$ijaazah_des.'</textarea>
															<br>
															<textarea class="form-control" id="ijaazah-next" name="ijaazah-next">'.$ijaazah_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($studies == 1) { echo '<div class="form-group">
															<label><h3>Islamic Studies</h3></label>
															<div>
															<select class="form-control" name="studies-number"  id="studies-number">
                                                                <option value="1" '.(($studies_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($studies_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($studies_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($studies_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($studies_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($studies_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($studies_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($studies_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($studies_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($studies_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="studies-des" name="studies-des">'.$studies_des.'</textarea>
															<br>
															<textarea class="form-control" id="studies-next" name="studies-next">'.$studies_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($supplication == 1) { echo '<div class="form-group">
															<label><h3>Supplication</h3></label>
															<div>
															<select class="form-control" name="supplication-number"  id="supplication-number">
                                                                <option value="1" '.(($supplication_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($supplication_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($supplication_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($supplication_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($supplication_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($supplication_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($supplication_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($supplication_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($supplication_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($supplication_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="supplication-des" name="supplication-des">'.$supplication_des.'</textarea>
															<br>
															<textarea class="form-control" id="supplication-next" name="supplication-next">'.$supplication_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<?php if ($arabic == 1) { echo '<div class="form-group">
															<label><h3>Arabic Language</h3></label>
															<div>
															<select class="form-control" name="arabic-number"  id="arabic-number">
                                                                <option value="1" '.(($arabic_number=='1')?'selected="selected"':"").'>1</option>
                                                                <option value="2" '.(($arabic_number=='2')?'selected="selected"':"").'>2</option>
                                                                <option value="3" '.(($arabic_number=='3')?'selected="selected"':"").'>3</option>
                                                                <option value="4" '.(($arabic_number=='4')?'selected="selected"':"").'>4</option>
                                                                <option value="5" '.(($arabic_number=='5')?'selected="selected"':"").'>5</option>
                                                                <option value="6" '.(($arabic_number=='6')?'selected="selected"':"").'>6</option>
                                                                <option value="7" '.(($arabic_number=='7')?'selected="selected"':"").'>7</option>
                                                                <option value="8" '.(($arabic_number=='8')?'selected="selected"':"").'>8</option>
                                                                <option value="9" '.(($arabic_number=='9')?'selected="selected"':"").'>9</option>
                                                                <option value="10" '.(($arabic_number=='10')?'selected="selected"':"").'>10</option>
                                                            </select>
                                                            <br>
                                                            <textarea class="form-control" id="arabic-des" name="arabic-des">'.$arabic_des.'</textarea>
															<br>
															<textarea class="form-control" id="arabic-next" name="arabic-next">'.$arabic_next.'</textarea>
                                                    </div>
												</div>'; } ?>
												<input type="hidden" value="<?php echo $ccc; ?>" class="form-control" name="report" id="report">
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
							</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>