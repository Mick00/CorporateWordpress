<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field\Field;

Block::make(__('Departments'))
->add_fields([
  Field::make( 'separator', 'crb_separator', __( 'Aucune option' ) ),
])
->set_description(__('Affiche les icones des departements'))
->set_category('Propulsion')
->set_render_callback(function($fields){
  $interships = get_posts([
    'post_type'   => 'internship',
    'post_status' => 'publish',
  ]);
?>
<div class="departments-icon">
  <?php foreach ($interships as $internship) { ?>
    <div class="department">
      <a href="<?=get_permalink($internship)?>">
        <?=carbon_get_post_meta($internship->ID,'icon')?>
        <h4><?=$internship->post_title?></h4>
      </a>
    </div>
  <?php } ?>
</div>
<?php
});
