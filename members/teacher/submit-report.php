<?php
if (isset($_POST['cmdSubmit'])) 
  	{
  		$noorani_qaida=$_POST['checkbox1'];
    $noorani_qaida_number=$_POST['noorani-qaida-number'];
    $noorani_qaida_des=$_POST['noorani-qaida-des'];
    $noorani_qaida_next=$_POST['noorani-qaida-next'];
    
    $quran_reading=$_POST['checkbox2'];
    $quran_reading_number=$_POST['quran-reading-number'];
    $quran_reading_des=$_POST['quran-reading-des'];
    $quran_reading_next=$_POST['quran-reading-next'];
    
    $tajweed_rules=$_POST['checkbox3'];
    $tajweed_rules_number=$_POST['tajweed-rules-number'];
    $tajweed_rules_des=$_POST['tajweed-rules-des'];
    $tajweed_rules_next=$_POST['tajweed-rules-next'];
    
    $memorization=$_POST['checkbox4'];
    $memorization_number=$_POST['memorization-number'];
    $memorization_des=$_POST['memorization-des'];
    $memorization_next=$_POST['memorization-next'];
    
    $revision=$_POST['checkbox5'];
    $revision_number=$_POST['revision-number'];
    $revision_des=$_POST['revision-des'];
    $revision_next=$_POST['revision-next'];
    
    $ijaazah=$_POST['checkbox6'];
    $ijaazah_number=$_POST['ijaazah-number'];
    $ijaazah_des=$_POST['ijaazah-des'];
    $ijaazah_next=$_POST['ijaazah-next'];
    
    $studies=$_POST['checkbox7'];
    $studies_number=$_POST['studies-number'];
    $studies_des=$_POST['studies-des'];
    $studies_next=$_POST['studies-next'];
    
    $supplication=$_POST['checkbox8'];
    $supplication_number=$_POST['supplication-number'];
    $supplication_des=$_POST['supplication-des'];
    $supplication_next=$_POST['supplication-next'];

    $arabic=$_POST['checkbox9'];
    $arabic_number=$_POST['arabic-number'];
    $arabic_des=$_POST['arabic-des'];
    $arabic_next=$_POST['arabic-next'];
    $dept_id=$_POST['depta'];
    $date=$_POST['date'];
    $course_id=$_POST['aasid'];
    $teacher_id=$_POST['aatid'];
    require ("../includes/dbconnection.php");
    $sql = "INSERT INTO reports (noorani_qaida, noorani_qaida_number, noorani_qaida_des, noorani_qaida_next, quran_reading, quran_reading_number, quran_reading_des, quran_reading_next, tajweed_rules,tajweed_rules_number, tajweed_rules_des, tajweed_rules_next, memorization, memorization_number, memorization_des, memorization_next, revision, revision_number, revision_des, revision_next, ijaazah, ijaazah_number, ijaazah_des, ijaazah_next, studies, studies_number, studies_des, studies_next, supplication, supplication_number, supplication_des, supplication_next, arabic, arabic_number, arabic_des, arabic_next, course_id, teacher_id, dept_id, date)
					VALUES('$noorani_qaida', '$noorani_qaida_number', '" . mysqli_real_escape_string($conn, $noorani_qaida_des) . "', '" . mysqli_real_escape_string($conn, $noorani_qaida_next) . "', '$quran_reading', '$quran_reading_number', '" . mysqli_real_escape_string($conn, $quran_reading_des) . "', '" . mysqli_real_escape_string($conn, $quran_reading_next) . "', '$tajweed_rules', '$tajweed_rules_number', '" . mysqli_real_escape_string($conn, $tajweed_rules_des) . "', '" . mysqli_real_escape_string($conn, $tajweed_rules_next) . "', '$memorization', '$memorization_number', '" . mysqli_real_escape_string($conn, $memorization_des) . "', '" . mysqli_real_escape_string($conn, $memorization_next) . "', '$revision', '$revision_number', '" . mysqli_real_escape_string($conn, $revision_des) . "', '" . mysqli_real_escape_string($conn, $revision_next) . "', '$ijaazah', '$ijaazah_number', '" . mysqli_real_escape_string($conn, $ijaazah_des) . "', '" . mysqli_real_escape_string($conn, $ijaazah_next) . "', '$studies', '$studies_number', '" . mysqli_real_escape_string($conn, $studies_des) . "', '" . mysqli_real_escape_string($conn, $studies_next) . "', '$supplication', '$supplication_number', '" . mysqli_real_escape_string($conn, $supplication_des) . "', '" . mysqli_real_escape_string($conn, $supplication_next) . "', '$arabic', '$arabic_number', '" . mysqli_real_escape_string($conn, $arabic_des) . "', '" . mysqli_real_escape_string($conn, $arabic_next) . "', '$course_id', '$teacher_id', '$dept_id', '$date')";
					if ($conn->query($sql) === TRUE) {
					header("Location: teacher-student-list");
					}
			}
?>
<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
 date_default_timezone_set($TimeZoneCustome);
$end_start = date('Y-m-d');
$sname =$_REQUEST['sname'];
$dept =$_REQUEST['dept'];
$atid =$_REQUEST['tid'];
$asid =$_REQUEST['sid'];
?>
<?php
$page_title = 'Submit Report';
$page_subtitle = 'Submit Report';
$table_name = 'Submit Report';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
										<div class="form-group">
															<label>Noorani Qaida</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox1" id="checkbox1" value="1" />
															<br>
															<select class="form-control" name="noorani-qaida-number"  id="noorani-qaida-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="noorani-qaida-des" name="noorani-qaida-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="noorani-qaida-next" name="noorani-qaida-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Quran Reading</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox2" id="checkbox2" value="1" />
															<br>
															<select class="form-control" name="quran-reading-number"  id="noorani-qaida-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="quran-reading-des" name="quran-reading-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="quran-reading-next" name="quran-reading-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Tajweed Rules</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox3" id="checkbox3" value="1" />
															<br>
															<select class="form-control" name="tajweed-rules-number"  id="tajweed-rules-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="tajweed-rules-des" name="tajweed-rules-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="tajweed-rules-next" name="tajweed-rules-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Quran Memorization</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox4" id="checkbox4" value="1" />
															<br>
															<select class="form-control" name="memorization-number"  id="memorization-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="memorization-des" name="memorization-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="memorization-next" name="memorization-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Quran Revision</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox5" id="checkbox5" value="1" />
															<br>
															<select class="form-control" name="revision-number"  id="revision-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="revision-des" name="revision-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="revision-next" name="revision-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Quran Ijazah</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox6" id="checkbox6" value="1" />
															<br>
															<select class="form-control" name="ijaazah-number"  id="ijaazah-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="ijaazah-des" name="ijaazah-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="ijaazah-next" name="ijaazah-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Islamic Studies</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox7" id="checkbox7" value="1" />
															<br>
															<select class="form-control" name="studies-number"  id="studies-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="studies-des" name="studies-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="studies-next" name="studies-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Supplication</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox8" id="checkbox8" value="1" />
															<br>
															<select class="form-control" name="supplication-number"  id="supplication-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="supplication-des" name="supplication-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="supplication-next" name="supplication-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<div class="form-group">
															<label>Arabic Language</label>
															<div>
															<input class="form-control" type="checkbox" name="checkbox9" id="checkbox9" value="1" />
															<br>
															<select class="form-control" name="arabic-number"  id="arabic-number">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                            <br>
															<input class="form-control" id="arabic-des" name="arabic-des" type="text" placeholder="Add Note" />
															<br>
															<input class="form-control" id="arabic-next" name="arabic-next" type="text" placeholder="Add Next Month Plan" />
                                                    </div>
												</div>
												<input type="hidden" value="<?php echo $end_start; ?>" class="form-control" name="date" id="date">
												<input type="hidden" value="<?php echo $asid; ?>" class="form-control" name="aasid" id="aasid">
												<input type="hidden" value="<?php echo $dept; ?>" class="form-control" name="depta" id="depta">
												<input type="hidden" value="<?php echo $atid; ?>" class="form-control" name="aatid" id="aatid">
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
<script language="javascript" >
	$(function () {
        $('select[name="noorani-qaida-number"]').hide();
        $('input[name="noorani-qaida-des"]').hide();
        $('input[name="noorani-qaida-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox1"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="noorani-qaida-number"]').fadeIn();
                $('input[name="noorani-qaida-des"]').fadeIn();
                $('input[name="noorani-qaida-next"]').fadeIn();
            } else {
                $('select[name="noorani-qaida-number"]').hide();
                $('input[name="noorani-qaida-des"]').hide();
                $('input[name="noorani-qaida-next"]').hide();
            }
        });
    });	

    $(function () {
        $('select[name="tajweed-rules-number"]').hide();
        $('input[name="tajweed-rules-des"]').hide();
        $('input[name="tajweed-rules-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox3"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="tajweed-rules-number"]').fadeIn();
                $('input[name="tajweed-rules-des"]').fadeIn();
                $('input[name="tajweed-rules-next"]').fadeIn();
            } else {
                $('select[name="tajweed-rules-number"]').hide();
                $('input[name="tajweed-rules-des"]').hide();
                $('input[name="tajweed-rules-next"]').hide();
            }
        });
    });

    $(function () {
        $('select[name="quran-reading-number"]').hide();
        $('input[name="quran-reading-des"]').hide();
        $('input[name="quran-reading-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox2"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="quran-reading-number"]').fadeIn();
                $('input[name="quran-reading-des"]').fadeIn();
                $('input[name="quran-reading-next"]').fadeIn();
            } else {
                $('select[name="quran-reading-number"]').hide();
                $('input[name="quran-reading-des"]').hide();
                $('input[name="quran-reading-next"]').hide();
            }
        });
    });

    $(function () {
        $('select[name="memorization-number"]').hide();
        $('input[name="memorization-des"]').hide();
        $('input[name="memorization-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox4"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="memorization-number"]').fadeIn();
                $('input[name="memorization-des"]').fadeIn();
                $('input[name="memorization-next"]').fadeIn();
            } else {
                $('select[name="memorization-number"]').hide();
                $('input[name="memorization-des"]').hide();
                $('input[name="memorization-next"]').hide();
            }
        });
    });
    
    $(function () {
        $('select[name="revision-number"]').hide();
        $('input[name="revision-des"]').hide();
        $('input[name="revision-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox5"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="revision-number"]').fadeIn();
                $('input[name="revision-des"]').fadeIn();
                $('input[name="revision-next"]').fadeIn();
            } else {
                $('select[name="revision-number"]').hide();
                $('input[name="revision-des"]').hide();
                $('input[name="revision-next"]').hide();
            }
        });
    });

    $(function () {
        $('select[name="ijaazah-number"]').hide();
        $('input[name="ijaazah-des"]').hide();
        $('input[name="ijaazah-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox6"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="ijaazah-number"]').fadeIn();
                $('input[name="ijaazah-des"]').fadeIn();
                $('input[name="ijaazah-next"]').fadeIn();
            } else {
                $('select[name="ijaazah-number"]').hide();
                $('input[name="ijaazah-des"]').hide();
                $('input[name="ijaazah-next"]').hide();
            }
        });
    });
    
    $(function () {
        $('select[name="studies-number"]').hide();
        $('input[name="studies-des"]').hide();
        $('input[name="studies-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox7"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="studies-number"]').fadeIn();
                $('input[name="studies-des"]').fadeIn();
                $('input[name="studies-next"]').fadeIn();
            } else {
                $('select[name="studies-number"]').hide();
                $('input[name="studies-des"]').hide();
                $('input[name="studies-next"]').hide();
            }
        });
    });

    $(function () {
        $('select[name="supplication-number"]').hide();
        $('input[name="supplication-des"]').hide();
        $('input[name="supplication-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox8"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="supplication-number"]').fadeIn();
                $('input[name="supplication-des"]').fadeIn();
                $('input[name="supplication-next"]').fadeIn();
            } else {
                $('select[name="supplication-number"]').hide();
                $('input[name="supplication-des"]').hide();
                $('input[name="supplication-next"]').hide();
            }
        });
    });
    
    $(function () {
        $('select[name="arabic-number"]').hide();
        $('input[name="arabic-des"]').hide();
        $('input[name="arabic-next"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox9"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('select[name="arabic-number"]').fadeIn();
                $('input[name="arabic-des"]').fadeIn();
                $('input[name="arabic-next"]').fadeIn();
            } else {
                $('select[name="arabic-number"]').hide();
                $('input[name="arabic-des"]').hide();
                $('input[name="arabic-next"]').hide();
            }
        });
    });
</script>