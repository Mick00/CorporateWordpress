<?php
/**
 * Post Meta.
 *
 * Here, you can register custom post meta fields using the Carbon Fields library.
 *
 * @link https://carbonfields.net/docs/containers-post-meta/
 *
 * @package WPEmergeCli
 */

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make('post_meta',__('Entreprise'))
->where('post_type','=','joboffer')
->add_fields(array(
  Field::make('text', 'businessname',__('Nom'))->set_width(70),
  Field::make('image','businesslogo',__('Logo'))->set_width(30),
  Field::make('text', 'businessurl', __('Site web'))));
Container::make('post_meta', __('Poste'))
->where('post_type', '=', 'joboffer')
->add_fields(array(
  Field::make('text','jobtitle',__('Poste'))->set_width(50),
  Field::make('text','joburl',__('Lien vers l\'offre d\'emploi'))->set_width(50),
  Field::make('text','location', __('Lieu')),
  Field::make('text', 'hours', __('Nombre d\'heures')),
  Field::make('text', 'salary', __('Taux horaire')),
  Field::make('rich_text','jobdescription',__('Description')),
));

Container::make('post_meta', __('Département'))
->where('post_type', '=', 'department')
->add_fields([
  Field::make('image', 'image', __('Illustration'))->set_width(50),
  Field::make('text', 'icon', __('icone departementale'))
    ->set_help_text("Insérer un tag HTML de FontAwesome")
    ->set_width(50),
]);

Container::make('post_meta',__('Stage'))
->where('post_type','=','internship')
->add_fields(array(
  Field::make('text','title',__('Poste'))->set_width(40)->set_help_text("Titre dans Google Jobs"),
  Field::make('text','length', __('Durée'))->set_width(30),
  Field::make('image', 'image', __('Illustration'))->set_width(30),
  Field::make('rich_text', 'small_description', __('Description du poste'))
  ->set_help_text("Description courte du poste pour afficher dans la fiche du département"),
  Field::make('rich_text', 'description', __('Description du poste pour Google Jobs'))
  ->set_help_text("Ce texte apparaîtra dans Google Jobs. Utilisez seulement du texte")->set_width(70),
  Field::make( 'radio', 'type', __( 'Type' ) )
  ->set_options([
    "INTERN"    => __('Stage'),
    "FULL_TIME" => __('Temps plein'),
    "PART_TIME" => __('Temps partiel'),
    "TEMPORARY" => __('Temporaire'),
    "VOLUNTEER" => __('Volontaire'),
    ])->set_width(30),
  Field::make('association', 'internship_department', __('Département'))
  ->set_types([
    [
      "type"      => "post",
      "post_type" => "department"
    ]
  ])->set_min(1)->set_max(1)->set_width(70),
  Field::make('file', 'doc', __('Description complete (PDF)'))
    ->set_type('application/pdf')
    ->set_width(30),
  Field::make( 'checkbox', 'telecommute', __( 'Télétravail possible?' ) )
  ->set_option_value( 'oui' ),
));

// phpcs:disable
/*
Container::make( 'post_meta', __( 'Custom Data', 'app' ) )
	->where( 'post_type', '=', 'page' )
	->add_fields( array(
		Field::make( 'complex', 'crb_my_data' )
			->add_fields( array(
				Field::make( 'text', 'title' )
					->help_text( 'lorem' ),
			) ),
		Field::make( 'map', 'crb_location' )
			->set_position( 37.423156, -122.084917, 14 ),
		Field::make( 'image', 'crb_img' ),
		Field::make( 'file', 'crb_pdf' ),
	));
*/
// phpcs:enable
