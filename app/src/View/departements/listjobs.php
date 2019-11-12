<?php

$internships = get_posts([
    'post_type'   => 'internship',
    'post_status' => 'publish',
    'numberposts' => -1,
  ]);
$internships = array_filter($internships, function($post){

    $field = carbon_get_post_meta($post->ID, "internship_department");
    
    return sizeof($field) > 0 ? $field[0]['id'] == get_the_ID():false;
} );
echo "<h3>";
/* translators: Title before jobs list for a department */
print(esc_html__( 'Liste des stages disponibles', 'app' ));
echo "</h3>";
if (sizeof($internships) == 0){
    echo "<span class='font-weight-bold'>";
    /* translators: No jobs available now */
    print(esc_html__( 'Aucun stage disponible pour le moment', 'app' ));
    echo "</span>";
}
foreach($internships as $internship){
    ?>
    <div class="card p-3 my-3">
        <h4><a href="<?=get_permalink($internship)?>"><?=$internship->post_title?></a></h4>
        <span class="text-muted font-weight-bold">
        <?=jobsType(carbon_get_post_meta($internship->ID, "type"))?> 
        - <?=carbon_get_post_meta($internship->ID, "length")?>
        - <?=carbon_get_post_meta($internship->ID, "telecommute")?__("Peut être fait à distance"):"";?>
        </span>
        <p><?=carbon_get_post_meta($internship->ID, "small_description")?></p>
        <div class="mx-auto">
            <a href="<?=get_permalink($internship)?>" class="btn btn-warning goto">Voir la description complète</a>
            <span> ou </span>
            <a href="<?=wp_get_attachment_url(carbon_get_post_meta($internship->ID, "doc"))?>">Télécharger la description complète</a>
        </div>
    </div>

    <?php
}
