<?php
global $post;
?>
<div class="article__meta">
  <ul class="text-white">
    <li>Durée du stage de perfectionnement: <?=carbon_get_post_meta($post->ID, 'length');?></li>
    <li>
      <a href="<?=wp_get_attachment_url(carbon_get_post_meta($post->ID,'doc'));?>">Télécharger la version PDF</a>
    </li>
  </ul>
</div>
