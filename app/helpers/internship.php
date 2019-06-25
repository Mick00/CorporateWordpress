<?php

function get_internship_data($post_id){
  $data = get_post_meta_field($post_id,['title','length','description','doc', 'image']);
  $data['id'] = $post_id;
  $data['url'] = get_post_permalink($post_id);
  $data['image'] = wp_get_attachment_image_src($data['image'],'big_thumbnail')[0];
  return $data;
}

add_filter('emergence_render_post_meta', 'internship_post_meta',10,2);
function internship_post_meta($view, $post){
  if ($post->post_type === 'internship') {
    return 'internships/internshipMeta';
  }
  return $view;
}
