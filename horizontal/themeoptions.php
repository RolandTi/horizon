<?php

// force UTF-8 Ø

/* Plug-in for theme option handling
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 *
 */

class ThemeOptions {

	function __construct() {
		$me = basename(dirname(__FILE__));
		
		// set core theme option defaults
		setThemeOptionDefault('Allow_search', true);
		setThemeOptionDefault('Use_thickbox', true);
		setThemeOptionDefault('albums_per_page', 8);
		setThemeOptionDefault('images_per_page', 20);
		setThemeOption('image_size', 2200, NULL, 'horizon');
		setThemeOption('image_use_side', 'longest', NULL, 'horizon');
		setThemeOption('thumb_size', 450, NULL, 'horizon');
		setThemeOptionDefault('thumb_crop_width', 450);
		setThemeOptionDefault('thumb_crop_height', 450);
		setThemeOptionDefault('thumb_crop', 1);
		setThemeOptionDefault('thumb_transition', 1);

		// set custom theme option defaults
		setThemeOptionDefault('horizon_metas', true);
		setThemeOptionDefault('comment_form_toggle', false);
		setThemeOptionDefault('horizon_albdesc', false);		
		setThemeOptionDefault('horizon_custommenu', false);
		setThemeOptionDefault('horizon_homepage', '');
		if (extensionEnabled('zenpage')) {
			setThemeOption('custom_index_page', 'gallery', NULL, 'horizon', false);
		} else {
			setThemeOption('custom_index_page', '', NULL, 'horizon', false);
		}
		if (class_exists('cacheManager')) {
			cacheManager::deleteCacheSizes($me);
			cacheManager::addDefaultThumbSize();
			cacheManager::addDefaultSizedImageSize();
			cacheManager::addCacheSize($me,null, 1280, null, null, null, null, null, true, false);
			cacheManager::addCacheSize($me,null, 640, null, null, null, null, null, true, false);
			cacheManager::addCacheSize($me,null, 500, null, null, null, null, null, true, false);
		}
		if (function_exists('createMenuIfNotExists')) {
			$menuitems = array(
					array(
							'type' => 'menulabel',
							'title' => gettext('News Articles'),
							'link' => '',
							'show' => 1,
							'nesting' => 0),
					array(
							'type' => 'menulabel',
							'title' => gettext('Gallery'),
							'link' => '',
							'show' => 1,
							'nesting' => 0),
			);
			createMenuIfNotExists($menuitems, 'horizon');
		}
	}

	function getOptionsSupported() {
		$unpublishedpages = query_full_array("SELECT title,titlelink FROM " . prefix('pages') . " WHERE `show` != 1 ORDER by `sort_order`");
		$list = array();
		foreach ($unpublishedpages as $page) {
			$list[get_language_string($page['title'])] = $page['titlelink'];
		}
		return array(
				gettext('Allow search') => array(
						'key' => 'Allow_search',
						'type' => OPTION_TYPE_CHECKBOX,
						'desc' => gettext('Check to enable search form.')),
				gettext('Download Button') => array(
						'key' => 'horizon_download',
						'type' => OPTION_TYPE_CHECKBOX,
						'desc' => gettext("Check to enable users the ability to download original image from image details page. If you want a save dialog, you will need to set the appropriate option in options->image as well (protected, download).")),
				gettext('Metadata') => array(
						'key' => 'horizon_metas',
						'type' => OPTION_TYPE_CHECKBOX,
						'desc' => gettext("Check to enable metadata view.")),
				gettext('Title & Desc. in album view') => array(
						'key' => 'horizon_albdesc',
						'type' => OPTION_TYPE_CHECKBOX,
						'desc' => gettext("If active, add title & description under the picture in album mode.")),
				gettext('Homepage') => array(
						'key' => 'horizon_homepage',
						'type' => OPTION_TYPE_SELECTOR,
						'selections' => $list,
						'null_selection' => gettext('none'),
						'desc' => gettext("Choose here any <em>un-published Zenpage page</em> (listed by <em>titlelink</em>) to act as your site’s homepage instead the normal gallery index.") . "<p class='notebox'>" . gettext("<strong>Note:</strong> This of course overrides the <em>News on index page</em> option and your theme must be setup for this feature! Visit the theming tutorial for details.") . "</p>"),
				gettext('Use custom menu') => array(
						'key' => 'horizon_custommenu',
						'type' => OPTION_TYPE_CHECKBOX,
						'desc' => gettext('Check this if you want to use the <em>menu_manager</em> plugin if enabled to build a custom menu instead of the separate standard ones. A standard menu named "horizon" is created and used automatically.'))
		);
	}

	function getOptionsDisabled() {
		return array('custom_index_page', 'image_size', 'thumb_size');
	}

	function handleOption($option, $currentValue) {
		
	}

}

?>