<?php
/*
**  @file    modifications.php
**  
**  @desc    
**  
**  @path    /modifications.php
**  @package public
**  @author  Lee Peterson
**  @date    7/16/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

new jc_standard_features_acf_mods();

class jc_standard_features_acf_mods {
	
	public function __construct() {
		//add_filter('acf/location/rule_types', array($this, 'rule_types'));
		add_filter('acf/location/rule_values/post_type', array($this, 'post_type_rule_values'));
		add_filter('acf/location/rule_match/post_type', array($this, 'match_public_post_type'), 20, 3);
		
		add_filter('acf/location/rule_values/taxonomy', array($this, 'taxonomy_rule_values'));
		add_filter('acf/location/rule_match/taxonomy', array($this, 'match_public_taxonomy'), 10, 3);
	} // end public function __construct
	
	public function match_public_taxonomy($match, $rule, $options) {
		if ($rule['value'] != 'public-taxonomy') {
			return $match;
		}
		if (!isset($options['taxonomy'])) {
			return false;
		}
		$taxonomy = $options['taxonomy'];
		$taxonomies = get_taxonomies(array(), 'objects');
		if (!isset($taxonomies[$taxonomy])) {
			return false;
		}
		$public = $taxonomies[$taxonomy]->public;
		if ($rule['operator'] == '==') {
			$match = $public;
		} elseif ($rule['operator'] == '!=') {
			$match = !$public;
		}
		return $match;
	} // end public function match_public_taxonomy
	
	public function taxonomy_rule_values($choices) {
		//echo '<pre>'; print_r($choices); echo '</pre>';
		if (!isset($choices['public-taxonomy'])) {
			$choices['public-taxonomy'] = __('Public Taxonomy');
		}
		return $choices;
	} // end public function taxonomy_rule_values
	
	public function rule_types($choices) {
		//echo '<pre>'; print_r($choices); echo '</pre>';
		return $choices;
	} // end public function rule_types
	
	public function post_type_rule_values($choices) {
		//echo '<pre>'; print_r($choices); echo '</pre>';
		if (!isset($choices['public-post-type'])) {
			$choices['public-post-type'] = __('Public Post Type');
		}
		return $choices;
	} // end public function post_type_rule_values
	
	public function match_public_post_type($match, $rule, $options) {
		if ($rule['value'] != 'public-post-type' || $options['comment']) {
			return $match;
		}
		if (isset($options['post_type']) && !empty($options['post_type'])) {
			$post_type = $options['post_type'];
		} else {
			if (!isset($options['post_id'])) {
				return false;
			}
			$post_type = get_post_type(intval($options['post_id']));
		}
		$post_type = get_post_type_object($post_type);
		if (!$post_type) {
			return false;
		}
		if ($rule['operator'] == '==') {
			$match = $post_type->public;
		} elseif ($rule['operator'] == '!=') {
			$match = !$post_type->public;
		}
		//$match = true;
		return $match;
	} // end public function match_public_post_type
	
	private function write_to_file($value) {
		// this function for testing & debuggin only
		$file = dirname(__FILE__).'/__data-'.date('Y-m-d--H-i').'.txt';
		$handle = fopen($file, 'a');
		ob_start();
		//echo "\r\n";
		//echo "\r\n\r\nvar_dump:: "; var_dump($value); echo " ::end var_dump\r\n\r\n";
		
		if (is_array($value) || is_object($value)) {
			print_r($value);
		} elseif (is_bool($value)) {
			var_dump($value);
		} else {
			echo $value;
		}
		echo "\r\n\r\n";
		fwrite($handle, ob_get_clean());
		fclose($handle);
	} // end private function write_to_file
	
} // end class jc_standard_features_acf_mods