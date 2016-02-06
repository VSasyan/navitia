<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('asset_url()')) {
	function asset_url() {
		return base_url().'assets/';
	}
}

if(!function_exists('view_loader')){
	function view_loader($view, $vars=array(), $output = true){
		$CI = &get_instance();
		return $CI->load->view($view, $vars, $output);
	}
}

if(!function_exists('array_uri')){
	function array_uri($array) {
		$uri = '';
		foreach ($array as $key => $value) {
			$uri .= '&' . $key . '=' . $value;
		}
		return substr($uri, 1);
	}
}

?>