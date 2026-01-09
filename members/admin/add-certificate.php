<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
$famTeacher=$_GET['famTeacher'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Certificate for <?php echo $famName; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-save-certificate">
                <input type="hidden" value="<?php echo $famID; ?>" name="studentID" id="studentID" class="form-control">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Student Name</label>
                                    <input style="text-transform:uppercase" type="text" name="Sname" id="Sname" class="form-control" value="<?php echo $famName; ?>" required>
                                    </div>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Teacher Name</label>
                                    <div>
                                        <input style="text-transform:uppercase" type="text" name="Tname" id="Tname" class="form-control" value="<?php echo $famTeacher; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Line One</label>
                                    <div>
                                        <textarea rows="4" name="line01" id="line01" class="form-control" maxlength="50" placeholder="You can add 50 charactors at max. Also if you want anything bold add <b>Bold Tag</b>" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Line Two</label>
                                    <div>
                                        <textarea rows="4" name="line02" id="line02" class="form-control" maxlength="50" placeholder="You can add 50 charactors at max. Also if you want anything bold add <b>Bold Tag</b>" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Date</label>
                                    <div>
                                        <input type="date" name="date" id="date" class="form-control" required>
                                    </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>