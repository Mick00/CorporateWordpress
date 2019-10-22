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
  $departments = get_posts([
    'post_type'   => 'department',
    'post_status' => 'publish',
	'numberposts' => -1,
  ]);
?>
<div class="departments-icon">
  <?php foreach ($departments as $department) { ?>
    <div class="department">
      <a href="<?=get_permalink($department)?>">
        <?=carbon_get_post_meta($department->ID,'icon')?>
        <p class="font-weight-bold"><?=get_the_title($department)?></p>
      </a>
    </div>
  <?php } ?>
</div>
<?php
});
