<?php
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
 $sql = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING sched_id = '$famID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sched = $row['sched_id'];
					$stud_id = $row['course_id'];
					$tech_id = $row['teacher_id'];
					$hidden_pcourse = $row['course_yrSec'];
					$hidden_pt = $row['teacher_name'];
					$hidden_pday = $row['day_id'];
					$tt1 = $row['time_start'];
					$tt2 = $row['time_end'];
					$trial = $row['status'];

			}
			}
?>

<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit schedule for class of <?php echo $hidden_pcourse; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="update-schedule-one">
                <input type="hidden" value="<?php echo $stud_id; ?>" name="studentID" id="studentID" class="form-control">
												<input type="hidden" value="<?php echo $tech_id; ?>" name="teacherID" id="teacherID" class="form-control">
												<input type="hidden" value="<?php echo $famID; ?>" name="famID" id="famID" class="form-control">        
                                <div class="form-group">
                                    <label for="lastname">Teacher's Time Start</label>
                                    <div>
                                        <input required type="time" class="form-control" value="<?php echo $tt1; ?>" name="STime" id="STime">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Teacher's End Start</label>
                                    <div>
                                        <input required type="time" class="form-control" value="<?php echo $tt2; ?>" name="ETime" id="ETime">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Teacher's Days</label>
                                        <div>
                                                        <select id="exampleSelect" name="day" id="day" class="form-control">
                                                    <option value="1" <?php if($hidden_pday == 1) { echo 'selected';} ?>>Monday </option>
                      <option value="2" <?php if($hidden_pday == 2) { echo 'selected';} ?>>Tuesday </option>
                      <option value="3" <?php if($hidden_pday == 3) { echo 'selected';} ?>>Wednesday </option>
                      <option value="4" <?php if($hidden_pday == 4) { echo 'selected';} ?>>Thursday </option>
                      <option value="5" <?php if($hidden_pday == 5) { echo 'selected';} ?>>Friday </option>
                      <option value="6" <?php if($hidden_pday == 6) { echo 'selected';} ?>>Saturday </option>
                      <option value="7" <?php if($hidden_pday == 7) { echo 'selected';} ?>>Sunday </option>
                                                </select>                                                                                                                                                      
                                    </div>                            
            </div>
            <div class="modal-footer">
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            <a href="sched_c_del?sched_id=<?php echo $famID; ?>&t=<?php echo time(true); ?>"><button class="mb-2 mr-2 btn btn-danger">Delete This Class</button></a><a href="student-del-all-s.php?Course_ID=<?php echo $stud_id; ?>&t=<?php echo time(); ?>"><button class="mb-2 mr-2 btn btn-danger">Delete All Classes of <?php echo $hidden_pcourse; ?></button></a>