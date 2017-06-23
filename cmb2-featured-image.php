<?php
/**
 * @package   tommcfarlin\CMB2FeaturedMobileImage
 * @author    Tom McFarlin <tom@tommcfarlin.com>
 * @license   GPL-3.0+
 * @link      https://tommcfarlin.com/cmb2-featured-mobile-image
 * @copyright 2017 Tom McFarlin
 *
 * @wordpress-plugin
 * Plugin Name:        CMB2: Featured Mobile Image
 * Plugin URI:         https://www.github.com/tommcfarin/cmb2-featured-mobile-image
 * Description:        Select an image to display as your featured image in the mobile version of your site.
 * Version:            0.1.0
 * Author:             Tom McFarlin
 * Author URI:         https://tommcfarlin.com/
 * Text Domain:        cmb2-featured-mobile-image
 * Domain Path:        /languages
 * License:	           GPL-3.0+
 * License URI:........http://www.gnu.org/licenses/gpl-3.0.txt
 * GitHub Plugin URI:  tommcfarlin/cmb2-featured-mobile-image
 * GitHub Branch:      master
 */

namespace tommcfarlin\CMB2FeaturedMobileImage;

defined( 'WPINC' ) || die;

add_action( 'admin_enqueue_scripts', function() {

	wp_enqueue_style(
		'cmb2-featured-mobile-image',
		plugins_url( 'assets/css/admin.css', ( __FILE__ ) ),
		[],
		'0.1.0',
		'all'
	);
});

add_action( 'cmb2_admin_init', function () {

	$page_meta = new_cmb2_box([
		'id'           => 'page_meta',
		'title'        => 'Mobile Featured Image',
		'object_types' => [ 'post', 'page' ],
		'context'      => 'side',
		'priority'     => 'low',
		'show_names'   => true,
	]);

	$page_meta->add_field([
		'id'      => 'cmb2_featured_mobile_image',
		'type'    => 'file',
		'options' => [
			'url' => false,
		],
		'text'    => [
			'add_upload_file_text' => 'Set mobile featured image',
		],
	]);
});
