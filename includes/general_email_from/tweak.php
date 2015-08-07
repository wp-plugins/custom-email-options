<?php
// change from email address class
if ( ! class_exists( 'WB_general_email_from_Tweak' ) ) {
	class WB_general_email_from_Tweak {
		
		//generate email setting form field
		function wb_settings() {
	
			$sitename = strtolower( $_SERVER['SERVER_NAME'] );
			if ( substr( $sitename, 0, 4 ) == 'www.' ) {
				$sitename = substr( $sitename, 4 );
			}
	
			$from_email = 'wordpress@' . $sitename;
			
			?>
			<tr valign="top">
				<th scope="row">
					<label for="num_elements">
						<?php echo __( 'Change from email address', WB_CHANGE_EMAIL_SLUG ); ?>:
					</label> 
				</th>
				<td>
				   <input name="wb_general_tweak[<?php echo $this->option; ?>]" type="email" value="<?php echo $this->value; ?>"> 
					<br />
					<?php echo __( 'You can define any email address, address will be used for all sent emails.<br/> Default email is ' . $from_email, WB_CHANGE_EMAIL_SLUG ); ?>
				</td>
			</tr>
			<?php
		}
	// function to apply filter to change the email address
		function wb_tweak() {
			add_filter( 'wp_mail_from', array( $this, 'wp_mail_from' ) );
		}
	
		function wp_mail_from( $old ) {
			return $this->value;
		}
	}
}