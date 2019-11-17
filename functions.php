<?php
// ENQUEUE PARENT THEME AND CUSTOM FONTS --------------------------------------
add_action( 'wp_enqueue_scripts', 'nmikyska_child_scripts' );

function nmikyska_child_scripts() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js', array( 'jquery' ), '1.0', true );
 wp_enqueue_script( 'custom-js' );
}
//moves the comment field down to bottom of form in blog post articles
function wpb_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
  }
    
  add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom'); 
  //removes the website field in the blog post comment form
  function wpbeginner_remove_comment_url($arg) {
      $arg['url'] = '';
      return $arg;
  }
  add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');