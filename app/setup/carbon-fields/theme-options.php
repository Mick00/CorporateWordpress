<?php
/**
 * Theme Options.
 *
 * Here, you can register Theme Options using the Carbon Fields library.
 *
 * @link https://carbonfields.net/docs/containers-theme-options/
 *
 * @package WPEmergeCli
 */

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'app' ) )
	->set_page_file( 'app-theme-options.php' )
	->add_fields( array(
		Field::make('image', 'dark_logo', __('Logo pour un fond sombre'))
		->set_value_type( 'url' )->set_width(50),
		Field::make('image', 'light_logo', __('logo pour un fond clair'))
		->set_value_type( 'url' )->set_width(50),
		Field::make( 'text', 'crb_google_maps_api_key', __( 'Google Maps API Key', 'app' ) ),
		Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script', 'app' ) ),
		Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script', 'app' ) ),
	)
)->add_fields(add_socials_fields());

function add_socials_fields(){
	$fields = [];
	foreach (get_supported_social_medias() as $social => $icon) {
		$fields[] = Field::make('text', $social, __(`Profil`));
	}
	return $fields;
}

Container::make('theme_options', __('Organization information', 'app'))
	->set_page_file('organization')
	->add_fields([
		Field::make('text', 'org_name', __( 'Organization name' ))->set_width(70),
		Field::make('image', 'org_logo', __('Organization logo'))->set_value_type( 'url' )->set_width(30),
	])
	->add_fields([
		Field::make('text', 'org_street_address', __('Street address'))->set_width(50),
		Field::make('text', 'org_city', __('City'))->set_width(25),
		Field::make('text', 'org_region', __('Region'))->set_width(25),
		Field::make('text', 'org_country', __('Country'))->set_width(50),
		Field::make('text', 'org_postal_code', __('Postal Code'))->set_width(50),
	]);