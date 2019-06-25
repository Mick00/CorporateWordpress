<?php
global $post;
?>
<div class="article__meta">
  <p class="text-muted">
    <a href="<?php echo carbon_get_post_meta($post->ID,'joburl');?>">Voir l'offre</a>
    <span> / </span>
    <a href="<?php echo carbon_get_post_meta($post->ID,'businessurl');?>">Voir le site de l'employeur</a>
  </p>
</div>
