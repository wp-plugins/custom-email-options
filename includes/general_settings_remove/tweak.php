<?php
// Display Field to remove the option meta values on deactivation of plugin
if ( ! class_exists( 'WB_general_settings_remove_Tweak' ) ) {
	class WB_general_settings_remove_Tweak {
		//Function to add the field to select option to delete or not
		function wb_settings() {
			?>
			<tr valign="top">
				<th scope="row">
					<label for="num_elements">
						<?php echo __( 'Remove Settings', WB_CHANGE_EMAIL_SLUG )?>:
					</label> 
				</th>
				<td>
				   <label ><input name="wb_general_tweak[<?php echo $this->option?>]" type="radio" value="yes" <?php echo ($this->value=="yes") ? ' checked="checked"' : '' ;?>> Yes</label>
				   <label ><input name="wb_general_tweak[<?php echo $this->option?>]" type="radio" value="" <?php echo ($this->value=="") ? ' checked="checked"' : '' ;?>> No</label> 
					<br />
					<?php echo __( 'This will remove the settings data from database and reset the plugin on deactivation of plugin.', WB_CHANGE_EMAIL_SLUG )?>
				</td>
			</tr>
			<?php
		}
	
		function wb_tweak() {
			// function with no action
		}
	}
}