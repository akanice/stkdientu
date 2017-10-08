<?php
/**
 * Plugin Name: Yog Addons
 * Plugin URI: http://www.yogthemes.com/
 * Description: A part of YOGThemes
 * Version: 1.2
 * Author: YOGThemes
 * Author URI: http://www.yogthemes.com/
 * Requires at least: 4.1
 * Tested up to: 4.3
 *
 * Text Domain: yog
 * Domain Path: /i18n/languages/
 *
 * @package Yog Addons
 * @category Core
 * @author YOGThemes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'YOG_CORE_DIR', trailingslashit( plugins_url( '/', __FILE__ ) ) );

if ( ! class_exists( 'Yog_Addons' ) ) :
/**
 * Main flipmart Core Class
 *
 * @class Yog_Addons
 * @version	1.0
 */
final class Yog_Addons {
    
    /**
     * Hold an version of Yog_Addons class.
     * @var Yog_Addons
     */
	public $version = '1.2';
    
    /**
     * Hold an instance of Yog_Addons class.
     * @var Yog_Addons
     */
    protected static $instance = null;
    
    /**
	 * Main Yog_Addons instance.
	 *
	 * @return Yog_Addons - Main instance.
	 */
    public static function instance() {

		if(null == self::$instance) {
            self::$instance = new Yog_Addons();
        }

        return self::$instance;
    }
    
    /**
	 * Yog_Addons Constructor.
	 */
	public function __construct() {
	   
		add_action( 'yog_init', array( $this, 'yog_includes' ), 0 );
        add_action( 'admin_notices', array( $this, 'yog_activate_theme_notice' ), 0 );
        add_action( 'after_setup_theme', array( $this, 'yog_init_vc' ),50 );
        
        // Set up localisation.
		$this->load_plugin_textdomain();
	}
    
    /**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/yog-addons/yog-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/yog-LOCALE.mo
	 */
	public function load_plugin_textdomain() {
		$locale = is_admin() && function_exists( 'get_user_locale' ) ? get_user_locale() : get_locale();
		$locale = apply_filters( 'plugin_locale', $locale, 'yog-addons' );

		load_textdomain( 'yog', WP_LANG_DIR . '/yog-addons/yog-'. $locale .'.mo' );
		load_plugin_textdomain( 'yog', false, plugin_basename( dirname( __FILE__ ) ) . '/i18n/languages' );
	} 
    
    
    /**
	 * Include required core files used in admin and on the frontend.
	 */
	public function yog_includes() {
	    include_once( 'includes/libs/yog-importer/yog-importer.php' );   
        include_once( 'includes/cpt/testimonial-cpt.php' );
		
        if( class_exists( 'WPBakeryShortCode' ) ) {
            include_once 'includes/libs/js_composer/vc-xtend.php';    
			include_once 'includes/libs/js_composer/shortcodes.php';
			include_once 'includes/libs/js_composer/vc_map.php';
		}
        
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        
        if ( is_plugin_active( 'woocommerce/woocommerce.php') ) {
            require_once( 'includes/libs/woocommerce/class-wc-shortcodes.php' );
        }elseif( is_plugin_active_for_network( 'woocommerce/woocommerce.php') ){
            require_once( 'includes/libs/woocommerce/class-wc-shortcodes.php' );
        }
    }
    
    public function yog_activate_theme_notice() {

		if( did_action( 'yog_init' ) > 0 ) {
			return;
		}
	?>
		<div class="updated not-h2">
			<p><strong><?php esc_html_e( 'Please activate the STKhoadientu theme to use Yog Addons plugin.', 'yog'); ?></strong></p>
			<?php
				$screen = get_current_screen();
				if ($screen -> base != 'themes'):
			?>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php' ) ); ?>"><?php esc_html_e( 'Activate theme', 'yog' ); ?></a></p>
			<?php endif; ?>
		</div>
	<?php
	}
    
    /**
	 * init visual composer setting. 
    */
    public function yog_init_vc(){
        
        //Includes Visual Composer Shortcodes
        if ( class_exists( 'Vc_Manager' ) && class_exists( 'WPBakeryShortCode' ) ) {
			//disable VC update notifications
    		if( is_admin() ) {
    
    			if ( ! isset( $_COOKIE['vchideactivationmsg'] ) ) {
    				setcookie( 'vchideactivationmsg', '1', strtotime( '+3 years' ), '/' );
    			}
    
    			if ( ! isset( $_COOKIE[ 'vchideactivationmsg_vc11' ] ) ) {
    				setcookie( 'vchideactivationmsg_vc11', ( defined( 'WPB_VC_VERSION' ) ? WPB_VC_VERSION : '1' ), strtotime( '+3 years' ), '/' );
    			}
    		}
    
    		// Set new theme directory
    		$dir = get_template_directory() . '/templates/vc';
    		vc_set_shortcodes_templates_dir( $dir );
		}
    }
    
    /**
	 * Plugin activation
	 */
	public static function activate() {
		flush_rewrite_rules();
	}

	/**
	 * Plugin deactivation
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}
 
}


/**
 * Main instance of Yog_Theme.
 *
 * Returns the main instance of Yog_Theme to prevent the need to use globals.
 *
 * @return Yog_Theme
 */
function yog_addons() {
	return Yog_Addons::instance();
}
yog_addons(); // init Yog_Addons Class

endif;

/**
 * Theme Menu Helper Functions.
 *
 * @return yog_admin_page_menu
 */
function yog_admin_page_menu( $yog_page_title, $yog_menu_title, $yog_capability, $yog_id, $yog_callback, $yog_icon, $yog_postion ){
    add_menu_page(
		$yog_page_title,
		$yog_menu_title,
		$yog_capability,
		$yog_id,
		$yog_callback,
		$yog_icon,
		$yog_postion
	);
}

/**
 * Theme Menu Helper Functions.
 *
 * @return yog_admin_page_sub_menu
 */
function yog_admin_page_sub_menu( $yog_parent, $yog_page_title, $yog_menu_title, $yog_capability, $yog_id, $yog_callback ){
    add_submenu_page(
		$yog_parent,
		$yog_page_title,
		$yog_menu_title,
		$yog_capability,
		$yog_id,
		$yog_callback
	);
}