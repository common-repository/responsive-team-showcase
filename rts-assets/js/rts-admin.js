sg_rts_grid();
sg_rts_slider();
//Call to slider shortcode ganrater
function sg_rts_grid() {   
    var sg_main = "[rts-grid ";       
    var rts_grid_template = jQuery('#rts_grid_template').val();
    var rts_limit = jQuery('#rts_limit').val();
    var rts_grid = jQuery('#rts_grid').val();
    var grid_cat = jQuery('#grid_cat').val();
    var rts_grid_order = jQuery('#rts_grid_order').val();
    var rts_grid_orderby = jQuery('#rts_grid_orderby').val();
    var rts_popup_grid = jQuery('#rts_popup_grid').val();
    var rts_grid_content = jQuery('#rts_grid_content').val();
    var rts_grid_position = jQuery('#rts_grid_position').val(); 
     var rts_grid_social = jQuery('#rts_grid_social').val();    
 if (rts_grid_template == 'default-template') {} else { sg_main = sg_main + ' template="' + rts_grid_template + '"';}
 if (rts_grid == 'default-value') {} else { sg_main = sg_main + ' grid="' + rts_grid + '"';}
 if (rts_limit == '-1') {} else { sg_main = sg_main + ' limit="' + rts_limit + '"';}
 if (grid_cat == 'nocat') {} else { sg_main = sg_main + ' category="' + grid_cat + '"';}
 if (rts_grid_order == 'default-value') {} else { sg_main = sg_main + ' order="' + rts_grid_order + '"';}
 if (rts_grid_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + rts_grid_orderby + '"';}
 if (rts_popup_grid == 'default-value') {} else { sg_main = sg_main + ' popup="' + rts_popup_grid + '"';}
 if  (rts_grid_position == 'default-value') {} else { sg_main = sg_main + ' show_position="' + rts_grid_position + '"';}
 if  (rts_grid_social == 'default-value') {} else { sg_main = sg_main + ' show_social="' + rts_grid_social + '"';}
 if  (rts_grid_content == 'default-value') {} else { sg_main = sg_main + ' show_content="' + rts_grid_content + '"';}
    sg_main = sg_main + ']'; 
    jQuery("#rts_sg_grid_shortcode").text(sg_main);
    jQuery("#rts_sg_grid_shortcode_php").text("'"+sg_main+"'");}
function sg_rts_slider() {   
    var sg_main = "[rts-slider  ";       
    var rts_slider_design = jQuery('#rts_slider_design').val();
    var rts_slider_cell = jQuery('#rts_slider_cell').val();
    var rts_slider_limit = jQuery('#rts_slider_limit').val();
    var rts_slider_order = jQuery('#rts_slider_order').val();
    var rts_slider_orderby = jQuery('#rts_slider_orderby').val(); 
    var rts_cat = jQuery('#rts_cat').val(); slider_dots
    var slider_dots = jQuery('#slider_dots').val();
    var rts_slider_arrows = jQuery('#rts_slider_arrows').val();    
    var rts_slider_autoplay = jQuery('#rts_slider_autoplay').val();   
    var rts_slider_interval = jQuery('#rts_slider_interval').val(); 
    var rts_slider_scroll = jQuery('#rts_slider_scroll').val();   
    var  rts_slider_speed = jQuery('#rts_slider_speed').val();
    var  rts_slider_popup = jQuery('#rts_slider_popup').val(); 
    var  rts_slider_content = jQuery('#rts_slider_content').val();   
    var rts_slider_position = jQuery('#rts_slider_position').val();
    var rts_slider_social = jQuery('#rts_slider_social').val();    
if (rts_slider_design == 'default-template') {} else { sg_main = sg_main + ' template="' + rts_slider_design + '"';}
if (rts_slider_cell == '3') {} else { sg_main = sg_main + ' slides_column="' + rts_slider_cell + '"';} 
if (rts_slider_limit == '-1') {} else { sg_main = sg_main + ' limit="' + rts_slider_limit + '"';}
if (rts_slider_order == 'default-value') {} else { sg_main = sg_main + ' order="' + rts_slider_order + '"';}
if (rts_slider_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + rts_slider_orderby + '"';}
if (rts_cat == 'nocat') {} else { sg_main = sg_main + ' category="' + rts_cat + '"';}
if (slider_dots == 'default-value') {} else { sg_main = sg_main + ' bullet="' + slider_dots+ '"';}
if (rts_slider_arrows == 'default-value') {} else { sg_main = sg_main + ' arrows="' + rts_slider_arrows+ '"';}
if (rts_slider_autoplay == 'default-value') {} else { sg_main = sg_main + ' autoPlay="' + rts_slider_autoplay+ '"';} 
if (rts_slider_interval == '3000') {} else { sg_main = sg_main + ' interval="' + rts_slider_interval+ '"';}    
if (rts_slider_scroll == '1') {} else { sg_main = sg_main + ' scroll="' + rts_slider_scroll+ '"';} rts_slider_popup
if (rts_slider_speed == '300') {} else { sg_main = sg_main + ' speed="' + rts_slider_speed+ '"';}
if (rts_slider_popup == 'default-value') {} else { sg_main = sg_main + ' popup="' + rts_slider_popup+ '"';}
if (rts_slider_content == 'default-value') {} else { sg_main = sg_main + ' show-content="' + rts_slider_content+ '"';} 
if (rts_slider_position == 'default-value') {} else { sg_main = sg_main + ' show_position="' + rts_slider_position + '"';}
if (rts_slider_social == 'default-value') {} else { sg_main = sg_main + ' show_social="' + rts_slider_social + '"';}
   sg_main = sg_main + ']';
    jQuery("#rts_sg_slider_shortcode").text(sg_main);
    jQuery("#rts_sg_slider_shortcode_php").text("'"+sg_main+"'");
}