<?php
include("../includes/main-var.php");
$famName=$_GET['famName'];
$famEmail=$_GET['famEmail'];
$famID=$_GET['famID'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">You are sending email to <?php echo $famName; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="send-email">
				<div class="form-group">
															<label>
															</label>
															<div>
															Assalam-o-Aliakum <?php echo $famName; ?>!<br><br>
															We hope you are doing well.
															</div>
												</div>
												<div class="form-group">
															<label>
															Email From</label>
															<div>
															<select name="emailSA" id="emailSA" class="form-control input-circle" required>
															    <option value="schedule@<?php echo $site_nameS; ?>">schedule@<?php echo $site_nameS; ?></option>
															    <option value="info@<?php echo $site_nameS; ?>">info@<?php echo $site_nameS; ?></option>
															    <option value="accounts@<?php echo $site_nameS; ?>">accounts@<?php echo $site_nameS; ?></option>
															</select>
															</div>
												</div>
												<div class="form-group">
															<label>Subject</label>
															<div>
															<input type="text" value="<?php echo $famAdd; ?>" name="subjectp" id="subjectp" class="form-control input-circle" required>															</div>
												</div>
												<div class="form-group">
															<label>Message</label>
															<div>
														<textarea required class="form-control input-circle" placeholder="Enter Your Message" name="textp" id="textp"></textarea>
												</div>
												</div>
												<div class="form-group">
															<label></label>
															<div>
															If you have any question or query in this regard, you can contact us anytime. We are avaialable 24/7 at your service.<br><br>
															Jazakallah Khairan<br><br>
															Admin <?php echo $name; ?><br>
www.<?php echo $site_nameS; ?><br>
<?php echo $skype_zoom; ?><br>
<?php echo $phone1; ?><br>
<?php echo $phone2; ?><br>
<?php echo $phone3; ?>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famName; ?>" name="namep" id="namep" class="form-control">
												<input type="hidden" value="<?php echo $famEmail; ?>" name="emailp" id="emailp" class="form-control">
												<input type="hidden" value="<?php echo $famID; ?>" name="pid" id="pid" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Send Email</button>
            </div>
            </form>