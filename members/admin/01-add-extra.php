<?
require ("../includes/dbconnection.php");
$TeacherID=$_GET['TeacherID'];
$StudentID=$_GET['StudentID'];
$Name=$_GET['Name'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Extra CLass</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="save-extra-class">
				<input type="hidden" value="<?php echo $StudentID; ?>" name="studentID" id="studentID" class="form-control">
                <input type="hidden" value="<?php echo $TeacherID; ?>" name="teacherID" id="teacherID" class="form-control">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Student Name</label>
                                                    <input disabled type="text" class="form-control" value="<?php echo $Name; ?>" name="name" id="name">
                                                    </div>
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
                                    <label for="lastname">Teacher's Date</label>
                                    <div>
                                        <input required type="date" class="form-control" value="" name="date" id="date">
                                    </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Add Extra Class</button>
            </div>
            </form>