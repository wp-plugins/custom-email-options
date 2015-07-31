<?php
// Display any page instead of 404 default page class
if ( ! class_exists( 'WB_general_page404_redirect_Tweak' ) ) {
	class WB_general_page404_redirect_Tweak {
		//generate select dropdown form field to select page to display
		function wb_settings() {
			?>
			<tr valign="top">
				<th scope="row">
					<label for="num_elements">
						<?php echo __( 'Not Found(error 404) page', WB_CHANGE_EMAIL_SLUG ); ?>:
					</label> 
				</th>
				<td>
				   <select name="wb_general_tweak[<?php echo $this->option; ?>]"> 
					 <option value=""><?php echo esc_attr( __( 'Select page', WB_CHANGE_EMAIL_SLUG ) ); ?></option> 
					 <?php 
					  $pages = get_pages(); 
					  $select = "";
					  foreach ( $pages as $page ) {
						$select  = ( $page->post_name == $this->value )? ' selected="selected" ' : '' ;
						$option  = '<option value="' . $page->post_name . '" ' .$select. '>';
						$option .= $page->post_title;
						$option .= '</option>';
						echo $option;
					  }
					 ?>
					</select><br />
					<?php echo __( 'Then WordPress does not found the page, you can use any another page to show and suggest another usable information on site. By default standart theme page shows.', WB_CHANGE_EMAIL_SLUG ); ?>
				</td>
			</tr>
			<?php
		}
	// function to add action to change 404 page template redirect
		function wb_tweak() {
			add_action( 'template_redirect', array( $this, 'wb_do' ) );
		}
	
		function wb_do() {
			
			if ( is_404() ) {
				
				header( "Status: 404 Not Found" );
				header( "HTTP/1.0 404 Not Found" );
				define( 'DONOTCACHEPAGE', true );
				wp_redirect( get_page_link( $this->value ) );
				exit;
				
			}
		}
	}
}