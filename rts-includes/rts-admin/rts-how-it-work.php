<?php
/**
 * Designs and Plugins Feed
 *
 * @package responsive-team-showcase
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
// Action to add menu
add_action('admin_menu', 'rts_register_design_page');
/**
 * Register plugin design page in admin menu
 * 
 * @package responsive-team-showcase
 * @since 1.0.0
 */
function rts_register_design_page() {
	add_submenu_page( 'edit.php?post_type='.RTS_POST_TYPE, __('How it works, our plugins and offers', 'responsive-team-showcase'), __('Shortcode Generator', 'responsive-team-showcase'), 'manage_options', 'rts-designs', 'rts_designs_page' );
}
/**
 * Function to display plugin design HTML
 * 
 * @package responsive-team-showcase
 * @since 1.0.0
 */
function rts_designs_page() {
	$wpoh_admin_tabs = rts_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? rts_sanitize_clean($_GET['tab']) : 'help-for-you';
?>		
	<div class="wrap rtsw-wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpoh_admin_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => RTS_POST_TYPE, 'page' => 'rts-designs', 'tab' => $tab_key), admin_url('edit.php') );
			?>
			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>
			<?php } ?>
		</h2>		
		<div class="rtsw-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'help-for-you' ) {
				rts_work_page();
			}
			if( isset($active_tab) && $active_tab == 'grid-shortcode' ) {
				rts_grid_shortcode();
			}
			if( isset($active_tab) && $active_tab == 'slider-shortcode' ) {
				rts_slider_shortcode();
			}		
		?>
		</div><!-- end .rtsw-tab-cnt-wrp -->
	</div><!-- end .rtsw-wrap -->
<?php
}
/**
 * Function to get plugin feed tabs
 *
 * @package responsive-team-showcase
 * @since 1.0.0
 */
function rts_help_tabs() {
	$wpoh_admin_tabs = array(
						'help-for-you' 	=> array('name' => __('Help For You', 'responsive-team-showcase'),),
						'grid-shortcode' 	=> array('name' => __('Grid shortcode Generator', 'responsive-team-showcase'),),
		                'slider-shortcode' => array('name' => __('Slider shortcode Generator', 'responsive-team-showcase'),),
					);
	return $wpoh_admin_tabs;
}
/**
 * Function to get 'How It Works' HTML
 *
 * @package responsive-team-showcase
 * @since 1.0.0
 */
function rts_work_page() { ?>	
	<style type="text/css">
	  	.rtsw-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>
	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-1">			
				<!--Help for you HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'Help for you - Display and shortcode', 'responsive-team-showcase' ); ?></span>
								</h3>								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Basic Step', 'responsive-team-showcase'); ?>:</label>
												</th>
												<td>
													<ul>
													<li><?php _e('Step-1. Go to "Our Team --> Add New".', 'responsive-team-showcase'); ?></li>
													<li><?php _e('Step-2. Add  Team title, description and images.', 'responsive-team-showcase'); ?></li>
														<li><?php _e('Step-3. Add Team Details like  Name, Team-position and Social details...', 'responsive-team-showcase'); ?></li>
														<li><?php _e('Step-4. Once added, press Publish button', 'responsive-team-showcase'); ?></li>
													</ul>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('How to used Shortcode', 'responsive-team-showcase'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Create a page like name with Our Team.', 'responsive-team-showcase'); ?></li>
														<li><?php _e('Step-2. Set shortcode as per your need and put in page text section.', 'responsive-team-showcase'); ?></li>
													</ul>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'responsive-team-showcase'); ?>:</label>
												</th>
												<td>
													<span class="rtsw-shortcode-preview">[rts-grid]</span> – <?php _e('Display in Grid with 5+ designs template.', 'responsive-team-showcase'); ?> <br />
													<span class="rtsw-shortcode-preview">[rts-slider]</span> – <?php _e('Display in Slider with 5+ designs template.', 'responsive-team-showcase'); ?> <br />
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Widget', 'responsive-team-showcase'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Go to Appearance --> Widget.', 'responsive-team-showcase'); ?></li>
														<li><?php _e('Step-2. Use WP team showcase Slider to display team member in widget area with slider.', 'responsive-team-showcase'); ?></li>
													</ul>												
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Need Any Help?', 'responsive-team-showcase'); ?></label>
												</th>
												<td>
																				
													<a  href="mailto:gbvaghasiya1@yahoo.com">gbvaghasiya1@yahoo.com</a><br/> <br/>
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }
/**
 * 'plugin Grid Short code
 *
 * @package responsive-team-showcase
 * @since 1.0
 */
function rts_grid_shortcode() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.rts_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.rts_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Our Team Grid Shortcode :-', 'responsive-team-showcase') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px; height: 450px; overflow-x: scroll;">
								<form id="shortcode_generator" style="padding:20px;" class="rts_shortcode_generator">
										<p><label for="rts_grid_template"><?php _e('1) Select Design Template:', 'responsive-team-showcase'); ?></label>
										  	<?php $sg_tempalte = rts_templates() ?>
										  	<select id="rts_grid_template" name="rts_grid_template"
										  	onchange="sg_rts_grid()">
										  	<option value="default-template">Default Template</option>
										  	<?php  foreach ($sg_tempalte as $k): ?>
										  		<option value="<?php _e($k, 'responsive-team-showcase') ?>">
										  			<?php _e($k, 'responsive-team-showcase') ?>
										  		</option>
										  	<?php endforeach; ?>
										  </select>
										</p>
										<p><label for="rts_limit"><?php _e('2) Limit:', 'responsive-team-showcase'); ?></label>
						                    <input id="rts_limit" name="rts_limit" type="text" value="-1"
										      onchange="sg_rts_grid()">
										     <span class="howto"> <?php _e('( For all "-1" Enter any Numeric No. )', 'responsive-team-showcase'); ?></span>
										  </p>
										   <p><label for="rts_grid"><?php _e('3) Select Grid:', 'responsive-team-showcase'); ?></label>
								 	      <select id="rts_grid" name="rts_grids" onchange="sg_rts_grid()">
								 	      	<option value="default-value">Default Template</option>
										    <option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											</select>
								   </p>
								    	<p>
												<label for="rts_grid_order"><?php _e('4) Select Order:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_grid_order = rts_asc_desc() ?>
												<select id="rts_grid_order" name="rts_grid_order" onchange="sg_rts_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($rts_grid_order as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
												<span class="howto">( Set  Ascending Order OR  Descending Order. )</span>
											</p>
							         <p>
												<label for="rts_grid_orderby"><?php _e('5) Select Order By:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_grid_orderby = rts_orderby() ?>
												<select id="rts_grid_orderby" name="rts_grid_orderby" onchange="sg_rts_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($rts_grid_orderby as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>									
										<p>
											<label for="rts_cat">
												<?php _e('6) Select Category:', 'responsive-team-showcase') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => RTS_CAT,$args]);   	      						
												 ?>
												<select id="grid_cat" name="rts_cat" onchange="sg_rts_grid()">
												   <option value="nocat">Default</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
												<span class="howto"> ( By default All Testimonial. )</span>												
											</p>
                                        <p>							  
												<label for="rts_popup_grid"><?php _e('7) popup:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_popup_grid= rts_true_false() ?>
												<select id="rts_popup_grid" name="rts_popup_grid" onchange="sg_rts_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($rts_popup_grid as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>							  
												<label for="rts_grid_content"><?php _e('8) show content:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_grid_content= rts_true_false() ?>
												<select id="rts_grid_content" name="rts_grid_content" onchange="sg_rts_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($rts_grid_content as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									 <p>
												<label for="rts_grid_position"><?php _e('9) Show position:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_grid_position = rts_true_false() ?>
												<select id="rts_grid_position" name="rts_grid_position" onchange="sg_rts_grid()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_grid_position as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p><label for="rts_grid_social"><?php _e('10) Show Social:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_grid_social = rts_true_false() ?>
												<select id="rts_grid_social" name="rts_grid_social" onchange="sg_rts_grid()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_grid_social as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'responsive-team-showcase'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Our Team Grid in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'responsive-team-showcase'); ?> </p>
									<div id="rts_sg_grid_shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								&lt;?php echo do_shortcode(<span id="rts_sg_grid_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
				</div>
			</div>
		</div>
	</div>			
<?php } 
/**
 * 'plugin Slider Short code Generater
 *
 * @package responsive-team-showcase
 * @since 1.0
 */
function rts_slider_shortcode() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;}
		.rts_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.rts_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Our Team Slider Shortcode :-', 'responsive-team-showcase') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px; height: 450px; overflow-x: scroll;">
									<form id="shortcode_generator" style="padding:20px;" class="rts_shortcode_generator">
									 <p><label for="rts_slider_design"><?php _e('1) Select Design Template:', 'responsive-team-showcase'); ?></label>
										  	<?php $rts_slider_design = rts_templates() ?>
										  	<select id="rts_slider_design" name="rts_slider_design"
										  	onchange="sg_rts_slider()">
										  	<option value="default-template">Default Template</option>
										  	<?php  foreach ($rts_slider_design as $k): ?>
										  		<option value="<?php _e($k, 'responsive-team-showcase') ?>">
										  			<?php _e($k, 'responsive-team-showcase') ?>
										  		</option>
										  	<?php endforeach; ?>
										  </select> 
										</p>
										 <p><label for="rts_slider_limit"><?php _e('2) Set Slides Limit:', 'responsive-team-showcase'); ?></label>
											   	<input id="rts_slider_limit" name="rts_slider_limit" type="text" value="-1"
											   	onchange="sg_rts_slider()">
											   	<span class="howto"> <?php _e('( For all "-1" Enter any Numeric No. ) ', 'responsive-team-showcase'); ?></span>
										   </p>
										  	<p><label for="rts_slider_cell"><?php _e('3) Select Slider cell:', 'responsive-team-showcase'); ?></label>
						                    <input id="rts_slider_cell" name="rts_slider_cell" type="text" value="3"
										      onchange="sg_rts_slider()">
										      <span class="howto"> <?php _e('(Default Slider cell is 3)', 'responsive-team-showcase'); ?></span>
										  </p>
										 	<p>
												<label for="rts_slider_order"><?php _e('4) Select Order:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_order = rts_asc_desc() ?>
												<select id="rts_slider_order" name="rts_slider_order" 
												     onchange="sg_rts_slider()">
													<option value="default-value">No Need</option>
													<?php foreach ($rts_slider_order as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
												<span class="howto"> ( Set  Ascending Order OR  Descending Order. )</span>
											</p>
							         <p>
												<label for="rts_slider_orderby"><?php _e('5) Select Order By:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_orderby = rts_orderby() ?>
												<select id="rts_slider_orderby" name="rts_slider_orderby" onchange="sg_rts_slider()">
													<option value="default-value">No Need</option>
													<?php foreach ($rts_slider_orderby as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>										
										
										<p>
											<label for="rts_cat">
												<?php _e('6) Select Category:', 'responsive-team-showcase') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => RTS_CAT,$args]);   	      						
												 ?>
												<select id="rts_cat" name="rts_cat" onchange="sg_rts_slider()">
												   <option value="nocat">All Category</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
												<span class="howto"> ( By default All Testimonial. )</span>											
											</p>						
									<p>
												<label for="slider_dots"><?php _e('7) Dots:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $slider_dots = rts_true_false() ?>
												<select id="slider_dots" name="rts_slider_dots" onchange="sg_rts_slider()">
													<option value="default-value">Default Value</option>
													<?php foreach ($slider_dots as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="rts_slider_arrows"><?php _e('8) Display Arrows:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_arrows = rts_true_false() ?>
												<select id="rts_slider_arrows" name="rts_slider_arrows" onchange="sg_rts_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_slider_arrows as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="rts_slider_autoplay"><?php _e('9) Set AutoPlay:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_autoplay = rts_true_false() ?>
												<select id="rts_slider_autoplay" name="rts_slider_autoplay" onchange="sg_rts_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_slider_autoplay as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
										<label for="rts_slider_scroll"><?php _e('10). Move(Scroll) team for each slide:', 'responsive-team-showcase'); ?></label>
						                    <input id="rts_slider_scroll" name="rts_slider_scroll" type="text" value="1"
										      onchange="sg_rts_slider()">
										      <span class="howto"> <?php _e('( Default value is "1" ).', 'responsive-team-showcase'); ?></span>
										  </p>
									  <p>
									<p>
										<label for="rts_slider_interwal"><?php _e('11) Moving Interval between Two Slides:', 'responsive-team-showcase'); ?> </label>
						                    <input id="rts_slider_interval" name="rts_slider_interval" value="3000" onchange="sg_rts_slider()" type="text">
										      <span class="howto"> ( Set Slides Moving Speed value in Milliseconds. Default value is 3000 ).</span>
										</p>
									<p>
										<label for="rts_slider_speed"><?php _e('12) Slides Moving Speed:', 'responsive-team-showcase');?> </label>
						                    <input id="rts_slider_speed" name="rts_slider_speed" value="300" onchange="sg_rts_slider()" type="text">
										      <span class="howto"> ( Set Slides Moving Speed value in Milliseconds. Default value is 300 ).</span>
										</p>
										 <p>
												<label for="rts_slider_popup"><?php _e('13) Show popup:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_popup = rts_true_false() ?>
												<select id="rts_slider_popup" name="rts_slider_popup" onchange="sg_rts_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_slider_popup as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="rts_slider_content"><?php _e('14) Show content:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_content = rts_true_false() ?>
												<select id="rts_slider_content" name="rts_slider_content" onchange="sg_rts_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_slider_content as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									 <p>
												<label for="rts_slider_position"><?php _e('15) Show position:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_position = rts_true_false() ?>
												<select id="rts_slider_position" name="rts_slider_position" onchange="sg_rts_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_slider_position as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									 <p>
												<label for="rts_slider_social"><?php _e('16) Show Social:', 'responsive-team-showcase'); ?> 
												</label>
												<?php $rts_slider_social = rts_true_false() ?>
												<select id="rts_slider_social" name="rts_slider_social" onchange="sg_rts_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($rts_slider_social as $k): ?>
														<option value="<?php _e($k, 'responsive-team-showcase') ?>">
															<?php _e($k, 'responsive-team-showcase') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
										</form>
									</div>
								</td>
							 <td valign="top"><h3><?php _e('Shortcode:', 'responsive-team-showcase'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Our Team Slider in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'responsive-team-showcase'); ?> </p>
									<div id="rts_sg_slider_shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #3E7CAA;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #3E7CAA;" >
								&lt;?php echo do_shortcode(<span id="rts_sg_slider_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
	</div>
	</div>
</div>
</div>			
<?php }
/**
 * Gets the plugin design part feed
 *
 * @package responsive-team-showcase
 * @since 1.0
 */
function rts_get_plugin_design( $feed_type = '' ) {	
	$active_tab = isset($_GET['tab']) ? rts_sanitize_clean($_GET['tab']) : '';	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}
	// Taking some variables
	$wpoh_admin_tabs = rts_help_tabs();
	$offer_key 	= isset($wpoh_admin_tabs[$active_tab]['offer_key']) 	? $wpoh_admin_tabs[$active_tab]['offer_key'] 	: 'wppf_' . $active_tab;
	$url 			= isset($wpoh_admin_tabs[$active_tab]['url']) 			? $wpoh_admin_tabs[$active_tab]['url'] 				: '';
	$offer_time = isset($wpoh_admin_tabs[$active_tab]['offer_time']) ? $wpoh_admin_tabs[$active_tab]['offer_time'] 	: 172800;
    $offercache 			= get_transient( $offer_key );	
	if ($offercache !=" ") {		
		$feed 			= wp_remote_get( rts_clean_url($url));
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$offercache = wp_remote_retrieve_body( $feed );
				set_transient( $offer_key, $offercache, $offer_time );
			}
		} else {
			$offercache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'html5-videogallery-plus-player' ) . '</div>';
		}
	}
	return $offercache;	
}