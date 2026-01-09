<?php

function course_post_product() {
  $labels = array(
    'name'               => _x( 'Courses', 'post type general name' ),
    'singular_name'      => _x( 'Courses', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Course' ),
    'edit_item'          => __( 'Edit Course' ),
    'new_item'           => __( 'New Course' ),
    'all_items'          => __( 'All Courses' ),
    'view_item'          => __( 'View Course' ),
    'search_items'       => __( 'Search Courses' ),
    'not_found'          => __( 'No Courses found' ),
    'not_found_in_trash' => __( 'No Courses found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Courses'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'course', $args ); 
}
add_action( 'init', 'course_post_product' );

