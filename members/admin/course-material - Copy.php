<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link href="../assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
</head>
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
				<h1>Course <small>Material</small></h1>
			</div>
			<!-- END PAGE TITLE -->
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
					 Course Material
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#tab_2_2">
								Regular Courses </a>
							</li>
							<li>
								<a data-toggle="tab" href="#tab_1_3">
								Addition Courses </a>
							</li>
							<li>
								<a data-toggle="tab" href="#tab_3_3">
								Learning Material </a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="tab_2_2" class="tab-pane active">
								<div class="row booking-results">
								<?php 
// sending query
$sql = "SELECT * FROM dept WHERE type_id = 1 ORDER BY position_id ASC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$did = $row['dept_id'];
			$cname = $row['department'];
			$dcname = $row['name'];
			$img = $row['image_name'];
			$tid = $row['type_id'];
			$pid = $row['position_id'];
			$clevel = $row['course_level'];
			$cdes = $row['course_des'];
			$cage = $row['age'];
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../uploads/thumb/<?php echo $img; ?>" alt="">
												<ul class="list-unstyled price-location">
													<li>
														<i class="fa fa-child"></i> <?php echo $clevel; ?>
													</li>
													<li>
														<i class="fa fa-mortar-board"></i> Minimum Age <?php echo $cage; ?>
													</li>
												</ul>
											</div>
											<div class="booking-info">
												<h2>
												<a href="course-material-lesson?c_id=<?php echo $did; ?>">
											<?php echo $dcname; ?> </a>
												</h2>
												<ul class="stars list-inline">
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $cdes; ?>
												</p>
												<p>
													 <a href="edit-course-image?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-file-image-o"></i></button></a> 
														<a href="edit-course?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a> 
														<a href="add-new-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn green btn-xs"><i class="fa fa-plus"></i></button></a>
												</p>
											</div>
										</div>
									</div>
									<?php 	
		}
	}	
?>
								</div>
							</div>
							<!--end tab-pane-->
							<div id="tab_1_3" class="tab-pane">
								<div class="row booking-results">
									<?php 
// sending query
$sql = "SELECT * FROM dept WHERE type_id = 3 ORDER BY position_id ASC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$did = $row['dept_id'];
			$cname = $row['department'];
			$dcname = $row['name'];
			$img = $row['image_name'];
			$tid = $row['type_id'];
			$pid = $row['position_id'];
			$clevel = $row['course_level'];
			$cdes = $row['course_des'];
			$cage = $row['age'];
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../uploads/thumb/<?php echo $img; ?>" alt="">
												<ul class="list-unstyled price-location">
													<li>
														<i class="fa fa-child"></i> <?php echo $clevel; ?>
													</li>
													<li>
														<i class="fa fa-mortar-board"></i> Minimum Age <?php echo $cage; ?>
													</li>
												</ul>
											</div>
											<div class="booking-info">
												<h2>
												<a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>">
											<?php echo $dcname; ?> </a>
												</h2>
												<ul class="stars list-inline">
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $cdes; ?>
												</p>
												<p>
													 <a href="edit-course-image?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-file-image-o"></i></button></a> 
														<a href="edit-course?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a> 
														<a href="add-new-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn green btn-xs"><i class="fa fa-plus"></i></button></a>
												</p>
											</div>
										</div>
									</div>
									<?php 	
		}
	}	
?>

								</div>
							</div>
							<!--end tab-pane-->
							<div id="tab_3_3" class="tab-pane">
								<div class="row booking-results">
									<?php 
// sending query
$sql = "SELECT * FROM dept WHERE type_id = 2 ORDER BY position_id ASC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$did = $row['dept_id'];
			$cname = $row['department'];
			$dcname = $row['name'];
			$img = $row['image_name'];
			$tid = $row['type_id'];
			$pid = $row['position_id'];
			$clevel = $row['course_level'];
			$cdes = $row['course_des'];
			$cage = $row['age'];
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../uploads/thumb/<?php echo $img; ?>" alt="">
												<ul class="list-unstyled price-location">
													<li>
														<i class="fa fa-child"></i> <?php echo $clevel; ?>
													</li>
													<li>
														<i class="fa fa-mortar-board"></i> Minimum Age <?php echo $cage; ?>
													</li>
												</ul>
											</div>
											<div class="booking-info">
												<h2>
												<a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>">
											<?php echo $dcname; ?> </a>
												</h2>
												<ul class="stars list-inline">
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $cdes; ?>
												</p>
												<p>
													 <a href="edit-course-image?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-file-image-o"></i></button></a> 
														<a href="edit-course?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a> 
														<a href="add-new-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>"><button type="button" class="btn green btn-xs"><i class="fa fa-plus"></i></button></a>
												</p>
											</div>
										</div>
									</div>
									<?php 	
		}
	}	
?>

								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
				</div>
				<!--end tabbable-->
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>