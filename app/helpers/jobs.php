<?php

function get_job_data($post_id){
  $data = get_post_meta_field($post_id,['businessname','businesslogo','businessurl','jobtitle', 'joburl','jobdescription', 'location', 'hours', 'salary']);
  $data['id'] = $post_id;
  $data['url'] = get_post_permalink($post_id);
  $data['businesslogo'] = wp_get_attachment_image_src($data['businesslogo'])[0];
  $data['postedAgo'] = round((time()-strtotime(get_the_date('Y-m-d', $post_id)))/86400);
  return $data;
}

add_filter('emergence_render_post_meta', 'joboffer_post_meta',10,2);
function joboffer_post_meta($view, $post){
  if ($post->post_type === 'joboffer') {
    return 'jobs/jobMeta';
  }
  return $view;
}

add_action('emergence_content_before_content','output_job_post_metadata',10,1);
function output_job_post_metadata($post){
  if ($post->post_type !== 'joboffer') {
    return;
  }
  $jobdescription = carbon_get_post_meta($post->ID, 'jobdescription');
  if(!empty($jobdescription)):
    ?>
    <p class="jobdescription">
      <?=$jobdescription ?>
    </p>
    <?php
  endif;

}
