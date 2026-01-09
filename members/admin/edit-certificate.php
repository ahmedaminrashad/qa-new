<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$sql = "SELECT * FROM certificates WHERE cer_id = '$famID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$cer_ID = $row['cer_id'];
			$student_ID = $row['student_id'];
			$student_name = $row['student_name'];
			$teacher_name = $row['teacher_name'];
			$line01 = $row['line01'];
			$line02 = $row['line02'];
			$date = $row['date'];
			$wdate = date('jS F, Y',strtotime($date));
	}
	}
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Certificate for <?php echo $student_name; ?> of Date: <?php echo $wdate; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="update-certificate">
				<div class="form-group">
															<label>Student Name</label>
															<div>
															<input type="text" name="Sname" id="Sname" class="form-control" value="<?php echo $student_name; ?>" required>
															</div>
												</div>
												<div class="form-group">
															<label>Teacher Name</label>
															<div>
															<input type="text" name="Tname" id="Tname" class="form-control" value="<?php echo $teacher_name; ?>" required>
															</div>
												</div>
												<div class="form-group">
															<label>Line One</label>
															<div>
															<textarea rows="4" name="line01" id="line01" class="form-control" maxlength="50" required><?php echo $line01; ?></textarea>
															</div>
												</div>
												<div class="form-group">
															<label>Line Two</label>
															<div>
															<textarea rows="4" name="line02" id="line02" class="form-control" maxlength="50" required><?php echo $line02; ?></textarea>
															</div>
												</div>
												<div class="form-group">
															<label>Date</label>
															<div>
															<input type="date" name="date" id="date" class="form-control" value="<?php echo $date; ?>" required>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="cerID" id="cerID" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>