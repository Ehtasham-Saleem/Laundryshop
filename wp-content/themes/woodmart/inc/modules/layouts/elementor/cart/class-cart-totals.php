<?php
/**
 * Cart totals map.
 *
 * @package Woodmart
 */

namespace XTS\Modules\Layouts;

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;
use WC_Shortcode_Cart;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 */
class Cart_Totals extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wd_cart_totals';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Cart totals', 'woodmart' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wd-icon-ct-cart-table';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'wd-cart-elements' );
	}

	/**
	 * Show in panel.
	 *
	 * @return bool Whether to show the widget in the panel or not.
	 */
	public function show_in_panel() {
		return Main::is_layout_type( 'cart' );
	}

	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array( 'wc-cart' );
	}

	/**
	 * Register the widget controls.
	 */
	protected function register_controls() {

		/**
		 * Style tab.
		 */

		/**
		 * General settings.
		 */
		$this->start_controls_section(
			'general_style_section',
			array(
				'label' => esc_html__( 'General', 'woodmart' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'css_classes',
			array(
				'type'         => 'wd_css_class',
				'default'      => 'wd-cart-totals',
				'prefix_class' => '',
			)
		);

		$this->add_control(
			'title',
			array(
				'label'        => esc_html__( 'Enable title', 'woodmart' ),
				'description'  => esc_html__( 'If "NO" title will be removed.', 'woodmart' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'show',
				'return_value' => 'show',
				'prefix_class' => 'wd-title-',
			)
		);

		$this->add_control(
			'button_alignment',
			array(
				'label'        => esc_html__( 'Button alignment', 'woodmart' ),
				'type'         => Controls_Manager::SELECT,
				'options'      => array(
					'left'       => esc_html__( 'Left', 'woodmart' ),
					'center'     => esc_html__( 'Center', 'woodmart' ),
					'right'      => esc_html__( 'Right', 'woodmart' ),
					'full-width' => esc_html__( 'Full width', 'woodmart' ),
				),
				'prefix_class' => 'wd-btn-align-',
				'default'      => 'left',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		if ( ! is_object( WC()->cart ) || 0 === WC()->cart->get_cart_contents_count() ) {
			return;
		}

		$nonce_value = wc_get_var( $_REQUEST['woocommerce-shipping-calculator-nonce'], wc_get_var( $_REQUEST['_wpnonce'], '' ) ); // @codingStandardsIgnoreLine.

		// Update Shipping. Nonce check uses new value and old value (woocommerce-cart). @todo remove in 4.0.
		if ( ! empty( $_POST['calc_shipping'] ) && ( wp_verify_nonce( $nonce_value, 'woocommerce-shipping-calculator' ) || wp_verify_nonce( $nonce_value, 'woocommerce-cart' ) ) ) { // WPCS: input var ok.
			$shortcode_cart = new WC_Shortcode_Cart();
			$shortcode_cart->calculate_shipping();
		}

		wc()->cart->calculate_fees();
		wc()->cart->calculate_shipping();
		wc()->cart->calculate_totals();

		woocommerce_cart_totals();
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Cart_Totals() );
