<div id="icon-options-general" class="icon32"></div>
<div class="wrap">
	<h2>Genesis Agent Profiles Extended Settings</h2>
	<div id="poststuff" class="metabox-holder has-right-sidebar">
	    <div id="side-info-column" class="inner-sidebar">
		   <?php do_meta_boxes('aep_options_extended', 'side', null); ?>
		</div>
	    <div id="post-body">
            <div id="post-body-content" class="has-sidebar-content">
				<p>If you would like to use the new 200 x 200 image size for Agent Photos, check the box below. You will need to regenerate thumbnails on agent images you've loaded before installing this plugin. See <a href="http://savvyjackiedesigns.com/genesis-agent-profiles-extended-plugin/">instructions here</a>.</p>
				<?php

				$aep_options = get_option('plugin_ae_profiles_settings_extended');

				if ( !isset($aep_options['use_square_photo']) ) {
					$aep_options['use_square_photo'] = 0;
				}

				?>
				<form action="options.php" method="post" id="aep-stylesheet-options-form">
					<?php settings_fields('aep_options_extended'); ?>
					<?php echo '<h4><input name="plugin_ae_profiles_settings_extended[use_square_photo]" type="checkbox" value="1" class="code" ' . checked(1, $aep_options['use_square_photo'], false ) . ' /> Use Square Photo?</h4>'; ?>
					<input name="submit" class="button-primary" type="submit" value="<?php esc_attr_e('Save Settings'); ?>" />
				</form>
		      </div>
        </div>
    </div>
</div>