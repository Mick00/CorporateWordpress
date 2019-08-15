<?php
global $post;
$file = carbon_get_post_meta($post->ID,'doc');
$length = carbon_get_post_meta($post->ID, 'length');
?>
<div class="article__meta">
  <ul class="text-white">
    <?php if (!empty($length)):?>
    <li>Durée du stage de perfectionnement: <?=$length?></li>
    <?php endif;?>
    <?php if (!empty($file)):?>
    <li>
      <a href="<?=wp_get_attachment_url($file);?>">Télécharger la version PDF</a>
    </li>
    <?php endif;?>
  </ul>
</div>
