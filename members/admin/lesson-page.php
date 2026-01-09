<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $cid =$_REQUEST['c_id'];
  $did =$_REQUEST['did'];
  $course =$_REQUEST['course'];
  $lesson =$_REQUEST['lesson'];
?>
<?php
$page_title = 'Course: '.$course.'';
$page_subtitle = '<a href="course-material">Course Material</a> -- <a href="course-material-lesson?c_id='.$did.'&cname='.$course.'">'.$course.'</a> -- '.$lesson.'';
$table_name = 'Lesson Page';
?>
<?php echo $main_header; ?>
<head>
<style>.my-simple-gallery {
width: 100%;
float: left;
}
.my-simple-gallery img {
width: 100%;
height: auto;
}
.my-simple-gallery figure {
display: block;
float: left;
margin: 0 5px 5px 0;
width: 150px;
}
.my-simple-gallery figcaption {
display: none;
}
</style>
</head>
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
                    <div class="row">
								<?php
// sending query
$sql = "SELECT * FROM lesson_image WHERE lesson_id = $cid ORDER BY position_id ASC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$pid1 = $row['page_id'];
$lid = $row['lesson_id'];
$pname = $row['page_name'];
$img = $row['image_name'];
$pid = $row['position_id'];
?>
<figure itemprop="associatedMedia">
<a href="delete-lesson-page?cid=<?php echo $pid1; ?>&img=<?php echo $img; ?>"><button type="button" class="btn red btn-xs"><i class="fa fa-ban" title="Delete"></i></button></a>
<a href="../uploads/<?php echo $img; ?>" itemprop="contentUrl" data-size="1080x1500">
<img src="../uploads/thumb/<?php echo $img; ?>" itemprop="thumbnail" alt="Image description" /><p style="text-align: center !important">
<?php echo $pname; ?></a>
<figcaption itemprop="caption description"><?php echo $pname; ?></figcaption>

</figure>
<?php
}
}
?>
								</div>
                        </div>
                     </div>
                    <!-- Table Row End -->
                    
                <!-- App inner end -->
<?php echo $footer; ?>