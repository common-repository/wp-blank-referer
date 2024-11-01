<?php
/*
Plugin Name: WP Blank Referer
Plugin URI: http://blackhatzen.com/wp-blank-referer/
Description: Automatically changes all external links on the blog to redirect through various anonymization services, used to hide the source of traffic.
Version: 1.1.2
Author: blackhatzen
Author URI: http://blackhatzen.com/
*/

$__wp_blank_referer = new wp_blank_referer();

add_action('wp_footer', array($__wp_blank_referer,'add_wp_blank_referer_js'));
add_action('admin_menu', array($__wp_blank_referer,'wp_blank_referer_menu'));
add_action('wp_enqueue_scripts', array($__wp_blank_referer, 'wp_blank_referer_scripts'));
add_action('init', array($__wp_blank_referer, 'wp_blank_referer_init'));
$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain('wpbf_trans', 'wp-content/plugins/'.$plugin_dir);

register_activation_hook(__FILE__, array($__wp_blank_referer,'wp_blank_referer_activate'));
register_deactivation_hook(__FILE__, array($__wp_blank_referer,'wp_blank_referer_deactivate'));

final class wp_blank_referer {
	
	public function wp_blank_referer_init(){
		wp_register_script('wp_blank_referer-wp_blank_referer', WP_PLUGIN_URL . '/wp-blank-referer/scripts/url-replace-a.js');
		wp_register_script('wp_blank_referer-hcom', WP_PLUGIN_URL . '/wp-blank-referer/scripts/url-replace-h.js');
		wp_register_script('wp_blank_referer-horg', WP_PLUGIN_URL . '/wp-blank-referer/scripts/url-replace-ho.js');
		wp_register_script('wp_blank_referer-ref', WP_PLUGIN_URL . '/wp-blank-referer/scripts/url-replace-r.js');
	}
	
	public function wp_blank_referer_activate(){
		add_option("wp_blank_referer_service", '1', '', 'yes');
	}
	
	public function wp_blank_referer_deactivate(){
		delete_option("wp_blank_referer_service");
	}
	
	public function wp_blank_referer_menu(){
		add_options_page('WP Blank Referer', 'WP Blank Referer', 'administrator', 'wp_blank_referer-options', array($this,'wp_blank_referer_options_page'));
	}
	
	public function wp_blank_referer_options_page(){
		if(!empty($_POST['refer_service'])){
			echo '<div class="updated"><p><strong> '. __('Options saved.', 'wpbf_trans'). '</strong></p></div>';	
			update_option("wp_blank_referer_service", $_POST['refer_service']);
		}
			
		echo '<div class="wrap">';
		echo '<h1>'. __('WP Blank Referer Options', 'wpbf_trans') .'</h1><hr />';
		?>
		<form method="POST" action="">
		
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="refer_service"><strong><?php _e('Choose Referer Service:', 'wpbf_trans' ); ?></strong></label>
				</th>
				<td>
					<select id="refer_service" name="refer_service">
						<option value="1" <?php if(get_option("wp_blank_referer_service") == 1){ echo "selected=selected"; } ?>>Anonym.to</option>
						<option value="2" <?php if(get_option("wp_blank_referer_service") == 2){ echo "selected=selected"; } ?>>HideRefer.com</option>
						<option value="3" <?php if(get_option("wp_blank_referer_service") == 3){ echo "selected=selected"; } ?>>HideRefer.org</option> 
						<option value="4" <?php if(get_option("wp_blank_referer_service") == 4){ echo "selected=selected"; } ?>>Referer.us</option>
					</select>
				</td>
			</tr>
		</table>

		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'wpbf_trans' ); ?>" />
		</p>
		<?php
		echo '</div>';
	}
	
	public function wp_blank_referer_scripts(){
		if(get_option("wp_blank_referer_service") == 1){
			wp_enqueue_script('wp_blank_referer-wp_blank_referer');
		}
		
		if(get_option("wp_blank_referer_service") == 2){
			wp_enqueue_script('wp_blank_referer-hcom');
		}
		
		if(get_option("wp_blank_referer_service") == 3){
			wp_enqueue_script('wp_blank_referer-horg');
		}
		
		if(get_option("wp_blank_referer_service") == 4){
			wp_enqueue_script('wp_blank_referer-ref');
		}
	}
	
	public function add_wp_blank_referer_js(){
		echo '<script type="text/javascript"><!--
		protected_links = "";

		auto_anonyminize();
		//--></script>';
	}
}
?>