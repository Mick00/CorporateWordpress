<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field\Field;

Block::make(__('Offres d\'emploi'))
->add_fields([Field::make('text', 'quantity',__('Afficher combien d\'offre?(0 pour tout afficher)'))->set_attribute( 'type', 'number' )])
->set_description(__('Affiche les emplois sous forme de carte'))
->set_category('Propulsion')
->set_render_callback(function($fields){
  $jobs = get_posts([
    'post_type'       => 'joboffer',
    'post_status'     => 'publish',
    'orderby'         => 'date',
    'order'           => 'DESC',
  ]);

  if (sizeof($jobs) > 0):
    $loader = new \Twig\Loader\FilesystemLoader(APP_APP_DIR."src/View/jobs");
    $twig = new \Twig\Environment($loader);
    $jobCard = $twig->load('jobCard.twig');
    echo "<div class='joblist d-flex flex-wrap'>";
    if ($fields['quantity']) {
      for($i = 0; $i < $fields['quantity']; $i++){
        echo $jobCard->render(get_job_data($jobs[$i]->ID));
      }
    } else {
      foreach ($jobs as $job) {
        echo $jobCard->render(get_job_data($job->ID));
      }
    }
    echo "</div>";
  else:
    echo "<div class='p-5'>";
    echo __('Aucune offre d\'emploi n\'est disponible pour le moment.');
    echo "</div>";
  endif;
});

Block::make(__('Offres de stages'))
->add_fields([Field::make('select', 'color',__('Style'))->set_options([
  'dark' => 'dark',
  'light'=> 'light',
])])
->set_description(__('Affiche les stages disponibles'))
->set_category('Propulsion')
->set_render_callback(function($fields){
  $interships = get_posts([
    'post_type'   => 'internship',
    'post_status' => 'publish',
  ]);
  $loader = new \Twig\Loader\FilesystemLoader(APP_APP_DIR."src/View/internships");
  $twig = new \Twig\Environment($loader);
  $internshipCard = $twig->load('internshipCard.twig');
  echo "<div class='internships d-flex flex-wrap justify-content-center flex-sm-column flex-md-row'>";
  foreach ($interships as $internship) {
    echo $internshipCard->render(get_internship_data($internship->ID) + $fields);
  }
  echo "</div>";
});

function render_block_with_twig($template, $param = []){
  $loader = new \Twig\Loader\FilesystemLoader(APP_APP_DIR."src/View/gutenberg");
  $twig = new \Twig\Environment($loader);
  return $twig->render($template.".twig", $param);
}
