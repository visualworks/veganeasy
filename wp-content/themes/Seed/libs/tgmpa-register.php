<?php
if(!file_exists(get_template_directory().'/libs/class-tgm-plugin-activation.php')) return;
require_once (get_template_directory().'/libs/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'theme_register_plugin' );
if (! function_exists ( 'theme_register_plugin' )) :
	function theme_register_plugin() {
		$plugins = array (
				array (
					'name' => 'Ajax Load More',
					'slug' => 'ajax-load-more',
					'source' => 'http://plugins.beautheme.com/general/ajax-load-more.zip',
					'required' =>true,
					'version' => '2.6.3.2',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/ajax-load-more/'
				),
				array (
					'name' => 'Advanced Custom Fields',
					'slug' => 'advanced-custom-fields',
					'source' => 'https://downloads.wordpress.org/plugin/advanced-custom-fields.zip',
					'required' =>false,
					'version' => '4.4.2',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://downloads.wordpress.org/plugin/advanced-custom-fields.zip'
				),
				array (
					'name' => 'Advanced Custom Fields Repeater',
					'slug' => 'acf-repeater',
					'source' => 'http://plugins.beautheme.com/general/acf-repeater.zip',
					'required' =>false,
					'version' => '1.0',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => ''
				),
				array (
					'name' => 'Ajax Load More Pro',
					'slug' => 'ajax-load-more-repeaters-v2',
					'source' => 'http://plugins.beautheme.com/general/ajax-load-more-repeaters-v2.3.zip',
					'required' =>true,
					'version' => '2.3',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://connekthq.com/plugins/ajax-load-more/add-ons/custom-repeaters/'
				),
				array (
					'name' => 'Ajax Search Pro',
					'slug' => 'ajax-search-pro',
					'source' => 'http://plugins.beautheme.com/general/ajax-search-pro.zip',
					'required' =>true,
					'version' => '4.0',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'http://codecanyon.net/item/ajax-search-pro-for-wordpress-live-search-plugin/3357410'
				),
				array (
					'name' => 'Master Slider WP',
					'slug' => 'masterslider',
					'source' => 'http://plugins.beautheme.com/general/masterslider-installable.zip',
					'required' =>true,
					'version' => '2.20.4',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => ''
				),
				array (
					'name' => 'Woocommerce',
					'slug' => 'woocommerce',
					'source' => 'http://downloads.wordpress.org/plugin/woocommerce.zip',
					'required' =>true,
					'version' => '2.4.7',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/woocommerce/'
				),
				
				array (
					'name' => 'WPBakery Visual Composer',
					'slug' => 'js_composer',
					'source' => 'http://plugins.beautheme.com/general/js_composer.zip',
					'required' =>true,
					'version' => '4.7.4',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => ''
				),
				array (
					'name' => 'Seed postype and function',
					'slug' => 'beautheme-seed',
					'source' => 'http://plugins.beautheme.com/organic/beautheme-seed.zip',
					'required' =>true,
					'version' => '1.1',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => ''
				),
				array (
					'name' => 'Contact Form 7',
					'slug' => 'contact-form-7',
					'source' => 'https://downloads.wordpress.org/plugin/contact-form-7.4.2.zip',
					'required' =>true,
					'version' => '4.3',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/contact-form-7/'
				),
				array (
					'name' => 'Email Subscribers',
					'slug' => 'email-subscribers',
					'source' => 'http://plugins.beautheme.com/general/email-subscribers.zip',
					'required' =>true,
					'version' => '2.8',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/email-subscribers/'
				),
				array (
					'name' => 'WooCommerce Quick View',
					'slug' => 'woocommerce-quick-view',
					'source' => 'http://plugins.beautheme.com/general/woocommerce-quick-view.zip',
					'required' =>false,
					'version' => '1.1.3',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'http://www.woothemes.com/products/woocommerce-quick-view/'
				),
				array (
					'name' => 'Widget Settings Importer/Exporter',
					'slug' => 'widget-settings-importexport',
					'source' => 'https://downloads.wordpress.org/plugin/widget-settings-importexport.1.5.0.zip',
					'required' =>false,
					'version' => '1.5.0',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/widget-settings-importexport/'
				),
				array (
					'name' => 'Max Megamenu',
					'slug' => 'megamenu',
					'source' => 'https://downloads.wordpress.org/plugin/megamenu.2.0.1.zip',
					'required' =>true,
					'version' => '2.0.1',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/megamenu/'
				),
		);

		$config = array (
				'domain' => ORI_BASE_URL, // Text domain - likely want to be the same as your theme.
				'default_path' => '', // Default absolute path to pre-packaged plugins
				'parent_menu_slug' => 'themes.php', // Default parent menu slug
				'parent_url_slug' => 'themes.php', // Default parent URL slug
				'menu' => 'install-required-plugins', // Menu slug
				'has_notices' => true, // Show admin notices or not
				'is_automatic' => false, // Automatically activate plugins after installation or not
				'message' => '', // Message to output right before the plugins table
				'strings' => array (
					'page_title' => __ ( 'Install Required Plugins', ORI_BASE_URL ),
					'menu_title' => __ ( 'Install Plugins', ORI_BASE_URL ),
					'installing' => __ ( 'Installing Plugin: %s', ORI_BASE_URL ), // %1$s = plugin name
					'oops' => __ ( 'Something went wrong with the plugin API.', ORI_BASE_URL ),
					'notice_can_install_required' => _n_noop ( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'notice_can_install_recommended' => _n_noop ( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'notice_cannot_install' => _n_noop ( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'notice_can_activate_required' => _n_noop ( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'notice_can_activate_recommended' => _n_noop ( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'notice_cannot_activate' => _n_noop ( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'notice_ask_to_update' => _n_noop ( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'notice_cannot_update' => _n_noop ( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', ORI_BASE_URL ), // %1$s = plugin name(s)
					'install_link' => _n_noop ( 'Begin installing plugin', 'Begin installing plugins', ORI_BASE_URL ),
					'activate_link' => _n_noop ( 'Activate installed plugin', 'Activate installed plugins' ),
					'return' => __ ( 'Return to Required Plugins Installer', ORI_BASE_URL ),
					'plugin_activated' => __ ( 'Plugin activated successfully.', ORI_BASE_URL ),
					'complete' => __ ( 'All plugins installed and activated successfully. %s', ORI_BASE_URL )  // %1$s = dashboard link
				)
		);

		tgmpa ( $plugins, $config );
	}
	add_action ( 'tgmpa_register', 'theme_register_plugin' );

endif;