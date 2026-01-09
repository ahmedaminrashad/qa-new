<?php session_start(); ?>
  <?php
  include("../includes/session.php");
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
<link rel="stylesheet" href="../dist/photoswipe.css">
<link rel="stylesheet" href="../dist/default-skin/default-skin.css">
<script src="../dist/photoswipe.min.js"></script>
<script src="../dist/photoswipe-ui-default.min.js"></script>
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
                    <div class="my-simple-gallery">
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
<a href="../uploads/<?php echo $img; ?>" itemprop="contentUrl" data-size="1080x1600">
<img src="../uploads/thumb/<?php echo $img; ?>" itemprop="thumbnail" alt="Image description" /><p style="text-align: center !important">
<?php echo $pname; ?></a>
<figcaption itemprop="caption description"><?php echo $pname; ?></figcaption>
</figure>
<?php
}
}
?>
								</div></div>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

<!-- Background of PhotoSwipe.
It's a separate element, as animating opacity is faster than rgba(). -->
<div class="pswp__bg"></div>

<!-- Slides wrapper with overflow:hidden. -->
<div class="pswp__scroll-wrap">

<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
<!-- don't modify these 3 pswp__item elements, data is added later on. -->
<div class="pswp__container">
<div class="pswp__item"></div>
<div class="pswp__item"></div>
<div class="pswp__item"></div>
</div>

<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
<div class="pswp__ui pswp__ui--hidden">

<div class="pswp__top-bar">

<!--  Controls are self-explanatory. Order can be changed. -->

<div class="pswp__counter"></div>

<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

<button class="pswp__button pswp__button--share" title="Share"></button>

<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
<!-- element will get class pswp__preloader--active when preloader is running -->
<div class="pswp__preloader">
<div class="pswp__preloader__icn">
<div class="pswp__preloader__cut">
<div class="pswp__preloader__donut"></div>
</div>
</div>
</div>
</div>

<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
<div class="pswp__share-tooltip"></div>
</div>

<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
</button>

<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
</button>

<div class="pswp__caption">
<div class="pswp__caption__center"></div>
</div>

</div>

</div>

</div>

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
                <!-- App inner end -->
<?php echo $footer; ?>