<?php
/*
Plugin Name: Gravatar Shortcode
Plugin URI: http://dentedreality.com.au/projects/wp-plugin-gravatar-shortcode/
Description: Adds a [shortcode] that you can use in Posts or Pages to embed a gravatar via entering an email address. Use email="email@domain.com" and size="60" plus other HTML attributes applied to the output IMG tag.
Author: Beau Lebens
Version: 1.0
Author URI: http://www.dentedreality.com.au/
*/

function gravatar_shortcode_register($atts) {
	extract(shortcode_atts(array(
		'size' => '60',
		'email' => '',
		'rating' => 'X',
		'default' => '',
		'alt' => '',
		'title' => '',
		'align' => '', 
		'style' => '', 
		'class' => '', 
		'id' => '', 
		'border' => '', 
		), $atts));
	if (!$email) return '';
	
	// Supported Gravatar parameters
	$rating  = $rating ? '&r=' . $rating : '';
	$default = $default ? '&d=' . urlencode($default) : '';
	
	// Supported HTML attributes for the IMG tag
	$alt    = $alt ? ' alt="' . $alt . '"' : '';
	$title  = $title ? ' title="' . $title . '"' : '';
	$align  = $align ? ' align="' . $align . '"' : '';
	$style  = $style ? ' style="' . $style . '"' : '';
	$class  = $class ? ' class="' . $class . '"' : '';
	$id     = $id ? ' id="' . $id . '"' : '';
	$border = $border ? ' border="' . $border . '"' : '';
	
	// Send back the completed tag
	return '<img src="http://www.gravatar.com/avatar/' . md5(trim(strtolower($email))) . '.jpg?s=' . $size . $rating . '" width="' . $size . '" height="' . $size . '"' . $alt . $title . $align . $style . $class . $id . $border . ' />';
}
add_shortcode('gravatar', 'gravatar_shortcode_register');

?>