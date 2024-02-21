<?php
/*
**  @file    load-acf-json.php
**  
**  @desc    
**  
**  @path    /load-acf-json.php
**  @package public
**  @author  Lee Peterson
**  @date    7/16/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

new jc_standard_features_acf_loader();

class jc_standard_features_acf_loader {
	
	public function __construct() {
		add_action('acf/include_fields', array($this, 'include_fields'));
	} // end public function __construct
	
	public function include_fields() {
		$path = dirname(__FILE__).'/acf-json';
		if (!is_dir($path) ||
				($files = scandir($path)) === false ||
				!count($files)) {
			return;
		}
		$groups = $this->get_acf_field_groups();
		foreach ($files as $file) {
			$file_path = $path.'/'.$file;
			if (is_dir($file_path) || !preg_match('/\.json$/', $file)) {
				continue;
			}
			$group_key = preg_replace('/\.json$/', '', $file);
			if (!isset($groups[$group_key]) &&
					($json = file_get_contents($file_path)) !== false &&
					($field_group = json_decode($json, true)) !== NULL) {
				$field_group = apply_filters('ssi-std-features/field-group', $field_group);
				$field_group = $this->field_group_remove_post_types($field_group);
				acf_add_local_field_group($field_group);
			}
		}
		// need to delete the ACF cache
		wp_cache_delete('get_field_groups', 'acf');
	} // end public function include_fields
	
	private function field_group_remove_post_types($field_group) {
		$post_types = apply_filters('ssi-field-groups/post-type-exceptions', array());
		if (!is_array($post_types) || !count($post_types)) {
			return $field_group;
		}
		if (is_array($field_group['location'])) {
			foreach ($field_group['location'] as $or_index => $or) {
				$add_post_types = false;
				foreach ($or as $and_index => $and) {
					if ($and['param'] == 'post_type' && $and['value'] == 'public-post-type') {
						$add_post_types = true;
					}
				} // end foreach and
				if ($add_post_types) {
					$and_index = count($or);
					foreach ($post_types as $post_type) {
						$field_group['location'][$or_index][$and_index] = array(
							'param' => 'post_type',
            'operator' => '!=',
            'value' => $post_type
						);
					}
				} // end if add
			} // end foreach or
		} // end if post locations
		return $field_group;
	} // end private function field_group_remove_post_types
	
	private function get_acf_field_groups() {
		$groups = array();
		$acf_groups = acf_get_field_groups();
		if (!count($acf_groups)) {
			return;
		}
		foreach ($acf_groups as $group) {
			$groups[$group['key']] = $group['key'];
		}
		// need to delete the ACF field group cache
		wp_cache_delete('get_field_groups', 'acf');
		return $groups;
	} // end private function get_acf_field_groups
	
} // end class jc_standard_features_acf_loader