<?php

require_once( trailingslashit( get_template_directory() ). 'inc/meta-classes.php' );


add_action( 'admin_init', 'my_meta_fields' );
function my_meta_fields() {

  // post
  global $post;

  $args_sources_data=array('meta_box_id'=>'docstd','label'=>__('المصادر'),'post_type'=>array('post'),'context'=>'normal','priority'=>'high','hook_priority'=>10,'fields'=>array(
    array('name'=>'psourcet1','label' =>__( 'عنوان المصدر 1' ),'type'=>'text',),
    array('name'=>'psourceurl1','label' =>__( 'رابط المصدر 1' ),'type'=>'text',),
	array('name'=>'psourcet2','label' =>__( 'عنوان المصدر 2' ),'type'=>'text',),
    array('name'=>'psourceurl2','label' =>__( 'رابط المصدر 2' ),'type'=>'text',),
	array('name'=>'psourcet3','label' =>__( 'عنوان المصدر 3' ),'type'=>'text',),
    array('name'=>'psourceurl3','label' =>__( 'رابط المصدر 3' ),'type'=>'text',),
	array('name'=>'psourcet4','label' =>__( 'عنوان المصدر 4' ),'type'=>'text',),
    array('name'=>'psourceurl4','label' =>__( 'رابط المصدر 4' ),'type'=>'text',),
	array('name'=>'psourcet5','label' =>__( 'عنوان المصدر 5' ),'type'=>'text',),
    array('name'=>'psourceurl5','label' =>__( 'رابط المصدر 5' ),'type'=>'text',),
  ));
  bespecial_meta_box( $args_sources_data );

}
add_action( 'admin_init', 'my_meta_fields' );



function updatemydata($req,$pos,$myid,$post_id){
  if ( isset( $req ) ) {
      update_post_meta( $post_id, $myid, $pos );
  }
}