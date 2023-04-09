	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php echo LOCAL_CHARSET; ?>">
	<?php zp_apply_filter('theme_head'); ?>
	<?php printHeadTitle(); ?>
	<?php if (class_exists('RSS')) printRSSHeaderLink('Gallery', gettext('Gallery RSS')); ?>
	
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/horizon.css?v=0.2" type="text/css">
	
	<noscript>
		<?php # Display pictures without animation if JS is offf ?>
		<style>.appear {opacity: 1;}</style>
	</noscript>
	