<?php

namespace Brainsugar\CustomTaxonomyTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomTaxonomyTypeServiceProvider as ServiceProvider;


class Amenities extends ServiceProvider
{

  protected $id         = 'bshb_room_amenities';
  protected $name       = 'Amenity';
  protected $plural     = 'Amenities';
  protected $objectType = 'bshb_room';
  protected $showAdminColumn = true;    
    protected $metaBoxCb = true;

  protected $labels = [
                'name'                       => 'Amenities' ,
                'singular_name'              => 'Amenity',
                'menu_name'                  => "Amenities",
                'name_admin_bar'             => "Amenities",
                'search_items'               => "Search Amenities",
                'popular_items'              => "Popular Amenities",
                'all_items'                  => "All Amenities",
                'edit_item'                  => "Edit Amenities",
                'view_item'                  => "View Amenities",
                'update_item'                => "Updated Amenity",
                'add_new_item'               => "Add new Amenity",
                'new_item_name'              => "New Amenity name",
                'separate_items_with_commas' => "Separate amenities with comas",
                'add_or_remove_items'        => "Add or remove amenities",
                'choose_from_most_used'      => "Choose from the most used amenities",

  ];

  /**
   * You may override this method in order to register your own actions and filters.
   *
   */
  public function boot()
  {
          add_action( 'cmb2_admin_init', array($this , 'yourprefix_register_taxonomy_metabox' ));
  
  }

  /**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function yourprefix_register_taxonomy_metabox() {
	$prefix = 'yourprefix_term_';

	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_term = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => esc_html__( 'Category Metabox', 'cmb2' ), // Doesn't output for term boxes
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array($this->id, 'post_tag' ), // Tells CMB2 which taxonomies should have these fields
		// 'new_term_section' => true, // Will display in the "Add New Category" section
	) );

	$cmb_term->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'cmb2' ),
		'desc'     => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_term->add_field( array(
		'name' => esc_html__( 'Term Image', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'avatar',
		'type' => 'file',
	) );

	$cmb_term->add_field( array(
		'name' => esc_html__( 'Arbitrary Term Field', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'term_text_field',
		'type' => 'text',
        ) );
$cmb_term->add_field( array(
    'name' => __( 'Select Font Awesome Icon', 'cmb' ),
    'id'   => $prefix . 'iconselect',
    'desc' => 'Select Font Awesome icon',
    'type' => 'faiconselect',
    'options' => array(
        'fab fa-facebook' => 'fa fa-facebook',
        'fab fa-500px'  	 => 'fa fa-500px',
        'fab fa-twitter'	 => 'fa fa-twitter',
        'fas fa-address-book' => 'fas fa-address-book'
    ),
    'attributes' => array(
        'faver' => 5
    )
) );
}

}