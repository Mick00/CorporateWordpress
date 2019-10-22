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

function add_structured_job_posting(){
  if (get_post_type() !== 'internship') return;
  $jobPosting = [
    "hiringOrganization" => [
      "@type"       => "Organization",
      "name"        => carbon_get_theme_option('org_name'),
      "sameAs"      => get_site_url(),
      "logo"        => carbon_get_theme_option('org_logo'),
    ],
    "jobLocation" => [
      "@type"       => "Place",
      "address"     => [
        "@type"           => "PostalAddress",
        "streetAddress"   => carbon_get_theme_option('org_street_address'),
        "addressLocality" => carbon_get_theme_option('org_city'),
        "addressRegion"   => carbon_get_theme_option('org_region'),
        "postalCode"      => carbon_get_theme_option('org_postal_code'),
        "addressCountry"  => carbon_get_theme_option('org_country')
      ],
    ],
    "applicantLocationRequirements" => [
      "@type" => "Country",
      "name"  => carbon_get_theme_option('org_country'),
    ],
    "datePosted"        => get_the_modified_date("Y-m-d"),
    "employmentType"    => carbon_get_post_meta(get_the_ID(), 'type'),
    "description"       => carbon_get_post_meta(get_the_ID(), 'description'),
    "title"             => carbon_get_post_meta(get_the_ID(), 'title'),
  ];
  if(carbon_get_post_meta(get_the_ID(),'telecommute')){
    $jobPosting['jobLocationType'] = "TELECOMMUTE";
  }
  ?>
<script type='application/ld+json'>
  <?= json_encode($jobPosting) ?>
</script>
<?php
}