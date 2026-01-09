<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
<?php
  include("../includes/session.php");
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");  include("header.php");
  $cid =$_REQUEST['c_id'];
  $tt = $_SESSION['is']['parent_id'];
  $video =$_REQUEST['video'];
?>
<?php 
$result1 = mysql_query("SELECT * FROM dept HAVING dept_id='$cid'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$cname = MYSQL_RESULT($result1,$i,"name");
				}			
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link href="../../assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
</head>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?php echo $course_name; ?> <small><?php echo $cname; ?></small></h1>
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
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="course-material">All Courses</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="video-material-lesson?c_id=<?php echo $did; ?>"><?php echo $course_name; ?></a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php echo $cname; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
							<div class="my-simple-gallery">
							   <div>
				<video  controls>
  <source src="../../uploads/videos/<?php echo $video; ?>" type="video/mp4">
Your browser does not support the video tag.
</video>
</div>
  </div>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					
<script>var initPhotoSwipeFromDOM = function(gallerySelector) {

	// parse slide data (url, title, size ...) from DOM elements 
	// (children of gallerySelector)
	var parseThumbnailElements = function(el) {
	    var thumbElements = el.childNodes,
	        numNodes = thumbElements.length,
	        items = [],
	        figureEl,
	        childElements,
	        linkEl,
	        size,
	        item;

	    for(var i = 0; i < numNodes; i++) {


	        figureEl = thumbElements[i]; // <figure> element

	        // include only element nodes 
	        if(figureEl.nodeType !== 1) {
				continue;
	        }

			linkEl = figureEl.children[0]; // <a> element
			
	        size = linkEl.getAttribute('data-size').split('x');

	        // create slide object
	        item = {
				src: linkEl.getAttribute('href'),
				w: parseInt(size[0], 10),
				h: parseInt(size[1], 10)
	        };

	        

	        if(figureEl.children.length > 1) {
	        	// <figcaption> content
	          	item.title = figureEl.children[1].innerHTML; 
	        }
 
	        if(linkEl.children.length > 0) {
	        	// <img> thumbnail element, retrieving thumbnail url
				item.msrc = linkEl.children[0].getAttribute('src');
	        } 
	       
			item.el = figureEl; // save link to element for getThumbBoundsFn
	        items.push(item);
	    }

	    return items;
	};

	// find nearest parent element
	var closest = function closest(el, fn) {
	    return el && ( fn(el) ? el : closest(el.parentNode, fn) );
	};

	// triggers when user clicks on thumbnail
	var onThumbnailsClick = function(e) {
	    e = e || window.event;
	    e.preventDefault ? e.preventDefault() : e.returnValue = false;

	    var eTarget = e.target || e.srcElement;

	    var clickedListItem = closest(eTarget, function(el) {
	        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
	    });

	    if(!clickedListItem) {
	        return;
	    }


	    // find index of clicked item
	    var clickedGallery = clickedListItem.parentNode,
	    	childNodes = clickedListItem.parentNode.childNodes,
	        numChildNodes = childNodes.length,
	        nodeIndex = 0,
	        index;

	    for (var i = 0; i < numChildNodes; i++) {
	        if(childNodes[i].nodeType !== 1) { 
	            continue; 
	        }

	        if(childNodes[i] === clickedListItem) {
	            index = nodeIndex;
	            break;
	        }
	        nodeIndex++;
	    }



	    if(index >= 0) {
	        openPhotoSwipe( index, clickedGallery );
	    }
	    return false;
	};

	// parse picture index and gallery index from URL (#&pid=1&gid=2)
	var photoswipeParseHash = function() {
		var hash = window.location.hash.substring(1),
	    params = {};

	    if(hash.length < 5) {
	        return params;
	    }

	    var vars = hash.split('&');
	    for (var i = 0; i < vars.length; i++) {
	        if(!vars[i]) {
	            continue;
	        }
	        var pair = vars[i].split('=');  
	        if(pair.length < 2) {
	            continue;
	        }           
	        params[pair[0]] = pair[1];
	    }

	    if(params.gid) {
	    	params.gid = parseInt(params.gid, 10);
	    }

	    if(!params.hasOwnProperty('pid')) {
	        return params;
	    }
	    params.pid = parseInt(params.pid, 10);
	    return params;
	};

	var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
	    var pswpElement = document.querySelectorAll('.pswp')[0],
	        gallery,
	        options,
	        items;

		items = parseThumbnailElements(galleryElement);

	    // define options (if needed)
	    options = {
	        index: index,

			// define gallery index (for URL)
	        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

	        getThumbBoundsFn: function(index) {
	            // See Options -> getThumbBoundsFn section of docs for more info
	            var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
	                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
	                rect = thumbnail.getBoundingClientRect(); 

	            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
	        },

	        // history & focus options are disabled on CodePen
           	// remove these lines in real life: 
		   history: false,
		   focus: false	

	    };

	    if(disableAnimation) {
	        options.showAnimationDuration = 0;
	    }

	    // Pass data to PhotoSwipe and initialize it
	    gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
	    gallery.init();
	};

	// loop through all gallery elements and bind events
	var galleryElements = document.querySelectorAll( gallerySelector );

	for(var i = 0, l = galleryElements.length; i < l; i++) {
		galleryElements[i].setAttribute('data-pswp-uid', i+1);
		galleryElements[i].onclick = onThumbnailsClick;
	}

	// Parse URL and open gallery if it contains #&pid=3&gid=1
	var hashData = photoswipeParseHash();
	if(hashData.pid > 0 && hashData.gid > 0) {
		openPhotoSwipe( hashData.pid - 1 ,  galleryElements[ hashData.gid - 1 ], true );
	}
};

// execute above function
initPhotoSwipeFromDOM('.my-simple-gallery');</script>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>