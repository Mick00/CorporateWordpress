<?php
$class = "head-page article__head  alignfull d-flex align-items-center";
$style = "style=\"\"";
global $post;
if (has_post_thumbnail( $post->ID )) {
  $imageurl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post_image')[0];

  $style = sprintf("background-image: url('%s')",$imageurl);
  $style = "style=\"".$style."\"";
  $class.= " has-bg";
}
if (is_singular()):?>
  <header class="<?=$class?>" <?=$style?>>
    <div class="gradient-overlay has-bg alignfull d-flex align-items-center">
      <div class="container">
        <h2 class="article__title">
          <?php the_title(); ?>
        </h2>
        <?php
        $meta_render = apply_filters('emergence_render_post_meta', 'partials\post-meta', $post);
        WPEmerge\render( $meta_render );
        ?>
      </div>
    </div>
  </header>
<?php endif;?>
