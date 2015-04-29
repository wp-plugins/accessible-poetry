<?php
/* Font Sizer */

function acp_fontsizer_nav() {
	if( get_option( 'acp_fontsizer', false ) ) {
		$html = '<nav id="acp_fontsizer_nav" role="navigation">';
			$html .= '<ul id="acp_fontsizer">';
				$html .= '<div id="acp-fontsizer" class="item">';
					$html .= '<label for="acp-fontsizer">' . __('Font Size:', 'acp') . '</label>';
					$html .= '<button class="acp-btn small-letter">' . __('a', 'acp') . '</button>';
					$html .= '<button class="acp-btn big-letter">' . __('A', 'acp') . '</button>';
				$html .= '</div>';
			$html .= '</ul>';
		$html .= '</nav>';
		
		return $html;
	}
}

function acp_fontsizer_scripts() { ?>
<!-- Accessible Poetry Font Sizer -->
<style>
.acp-btn {
	background: #fff;
	border: 1px solid #ccc;
	line-height: 32px;
	padding: 0 8px;
	border-radius: 3px;
	color: #888;
	text-transform: none;
	margin-left: 2px;
}
</style>
<script type="text/javascript">
jQuery(window).load(function(){
	jQuery(function($){
		jQuery("#acp-fontsizer button.big-letter").click(function () {
			jQuery('p, h1, h2, h3').each(function () {
				var fontsize;
				fontsize = parseInt(jQuery(this).css('font-size'));
				jQuery(this).css({
					'font-size': (fontsize + 1) + 'px'
         		});
     		});
 		});
 		jQuery("#acp-fontsizer button.small-letter").click(function () {
 			jQuery('p, h1, h2, h3').each(function () {
 				var fontsize;
 				fontsize = parseInt($(this).css('font-size'));
 				jQuery(this).css({
 					'font-size': (fontsize - 1) + 'px'
         		});
     		});
		});
	});
});
</script>
<?php
}
if( get_option( 'acp_fontsizer', false ) ) {
	add_action( 'wp_head', 'acp_fontsizer_scripts');
	add_shortcode( 'acp_fontsizer', 'acp_fontsizer_nav' );
}