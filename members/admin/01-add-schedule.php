<?php
error_reporting(0);
require ("../includes/dbconnection.php");
$TeacherID=$_GET['TeacherID'];
$TimeID=$_GET['TimeID'];
$DayID=$_GET['DayID'];
$secs = strtotime("00:30:00")-strtotime("00:00:00");
            $end_time = date("H:i:s",strtotime($TimeID)+$secs);
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CLass</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-schedule-one">
                <input type="hidden" value="<?php echo $TeacherID; ?>" name="teacherID" id="teacherID" class="form-control">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Student Name</label><select name="studentID" id="exampleSelect" class="form-control" required>
                                                    <?php 
                                                    $sql = "SELECT * FROM course WHERE Teacher = $TeacherID";
$counter = 0;
$result = mysqli_query($conn, $sql);			  	
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_yrSec'];?></option>
                      <?php }  ?>
                                                </select></div>
                                                </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Teacher's Time Start</label>
                                    <div>
                                        <input required type="time" class="form-control" value="<?php echo $TimeID; ?>" name="STime" id="STime">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Teacher's End Start</label>
                                    <div>
                                        <input required type="time" class="form-control" value="<?php echo $end_time; ?>" name="ETime" id="ETime">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Teacher's Days</label>
                                        <div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox1" value="1" id="exampleCustomInline1" class="custom-control-input" <?php if ($DayID == 1) { echo 'checked'; } ?>><label class="custom-control-label"
                                                                                                                                                                                                              for="exampleCustomInline1">Mon</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox2" value="2" id="exampleCustomInline2" class="custom-control-input" <?php if ($DayID == 2) { echo 'checked'; } ?>><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline2">Tue</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox3" value="3" id="exampleCustomInline3" class="custom-control-input" <?php if ($DayID == 3) { echo 'checked'; } ?>><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline3">Wed</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox4" value="4" id="exampleCustomInline4" class="custom-control-input" <?php if ($DayID == 4) { echo 'checked'; } ?>><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline4">Thu</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox5" value="5" id="exampleCustomInline5" class="custom-control-input" <?php if ($DayID == 5) { echo 'checked'; } ?>><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline5">Fri</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox6" value="6" id="exampleCustomInline6" class="custom-control-input" <?php if ($DayID == 6) { echo 'checked'; } ?>><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline6">Sat</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox7" value="7" id="exampleCustomInline7" class="custom-control-input" <?php if ($DayID == 7) { echo 'checked'; } ?>><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline7">Sun</label></div>
                                    </div>                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>