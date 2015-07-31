<?php
// Disable "wptexturize" function for page title
if ( ! class_exists( 'WB_general_title_wptexturize_no_Tweak' ) ) {
	class WB_general_title_wptexturize_no_Tweak {
		
		//Function to add the field to select option to Enable or disable wptexturize
		function wb_settings() {
			?>
			<tr valign="top">
				<th scope="row">
					<label for="num_elements">
						<?php echo __( 'Disable "wptexturize" function for page title', WB_CHANGE_EMAIL_SLUG )?>:
					</label> 
				</th>
				<td>
				   <label ><input name="wb_general_tweak[<?php echo $this->option?>]" type="radio" value="yes" <?php echo ($this->value=="yes")?' checked="checked"':'';?>> Yes</label>
				   <label ><input name="wb_general_tweak[<?php echo $this->option?>]" type="radio" value="" <?php echo ($this->value=="")?' checked="checked"':'';?>> No</label> 
					<br />
					<?php echo __( 'This function applies transformations of quotes to smart quotes, apostrophes, dashes, ellipses, the trademark symbol, and the multiplication symbol.', WB_CHANGE_EMAIL_SLUG )?>
					<?php echo sprintf( __( 'You can read information about this function <a href="%s" target="_blank">here</a>', WB_CHANGE_EMAIL_SLUG ), 'http://codex.wordpress.org/Function_Reference/wptexturize' );?>
				</td>
			</tr>
			<?php
		}
	//Function to add the filter to the title
		function wb_tweak() {
			remove_filter( "the_title", "wptexturize" );
		}
	}
}