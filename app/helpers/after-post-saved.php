<?php

function after_post_saved($post_id){
  $post = get_post($post_id);
  /*if ($post->post_type==='joboffer') {
    $post->post_title = sanitize_text_field(carbon_get_post_meta($post_id,'jobtitle') . " - ".carbon_get_post_meta($post_id,'businessname'));
    wp_update_post($post, true);
  } else if ($post->post_type === 'internship'){
    $post->post_title = sanitize_text_field(carbon_get_post_meta($post_id,'title'));
    wp_update_post($post);
  }*/
}
