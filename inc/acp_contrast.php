<?php
/*
 * Plugin: Accessible Poetry
 * Version: 1.0.1
 * Author: Amit Moreno
 */
function acp_contrast_scripts() {
	
	$bright = get_option( 'acp_contrast_bright', false );
	$bright_bg = get_option( 'acp_contrast_bright_bg', false );
	$bright_txt = get_option( 'acp_contrast_bright_bg', false );
	$bright_lnk = get_option( 'acp_contrast_bright_link', false );
	
	$dark = get_option( 'acp_contrast_dark', false );
	$dark_bg = get_option( 'acp_contrast_dark_bg', false );
	$dark_txt = get_option( 'acp_contrast_dark_bg', false );
	$dark_lnk = get_option( 'acp_contrast_dark_link', false );
?>
<!-- Accessible Contrast -->
<style>
body.bright {
	background: <?php if( $bright_bg ){echo $bright_bg;}else{echo '#fff';} ?> !important;
	color:<?php if( $bright_txt ){echo $bright_txt;}else{echo '#333';} ?> !important;
}
<?php if( $bright_lnk ) : ?>
body.bright a {
	color:<?php echo $bright_lnk; ?> !important;
}
<?php endif; ?>
body.dark {
	background: <?php if( $dark_bg ){echo $dark_bg;}else{echo '#333';} ?> !important;
	color: <?php if( $dark_txt ){echo $dark_txt;}else{echo '#fff';} ?> !important;
}
body.dark a {
	color: #ffff88 !important;
}
</style>
<script type="text/javascript">
jQuery(window).load(function(){
	jQuery(document).ready(function($) {
		var acp_dark = readCookie('acp_dark');
		if ( acp_dark ) {
			$( 'body' ).removeClass( 'bright' ).addClass( 'dark' );
		}
	 	$( '#dark_class' ).click( function () {
	 		$( 'body' ).removeClass( 'bright' ).addClass( 'dark' );
	 		//valid for 24h
	 		createCookie('acp_dark','dark',1);
		});
		$( '#dark_remove' ).click( function () {
			eraseCookie( 'acp_dark' );
			$( 'body' ).removeClass( 'dark' ).addClass( 'bright' );
		});
		function createCookie(name,value,days) {
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime()+(days*24*60*60*1000));
		        var expires = "; expires="+date.toGMTString();
		    }
		    else var expires = "";
		    document.cookie = name+"="+value+expires+"; path=/";
		}
		function readCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}
		function eraseCookie(name) {
		    createCookie(name,"",-1);
		}		
     
	});
});
</script>
<?php
}
function acp_contrast_nav() {
	if( get_option( 'acp_contrast', false ) ) : ?>
<nav id="acp_contrast_nav" role="navigation">
	<ul id="acp_contrast">
		<div id="acp-contrast" class="item">
			<label for="acp-contrast"><?php _e('Contrast: ', 'acp');?></label>
			<button id="dark_remove"><?php _e('Bright', 'acp');?></button>
			<button id="dark_class"><?php _e('Dark', 'acp');?></button>
		</div>
		
	</ul>
</nav>
<?php endif;
}
if( get_option( 'acp_contrast', false ) ) {
	add_action( 'wp_head', 'acp_contrast_scripts');
	add_shortcode( 'acp_contrast', 'acp_contrast_nav' );
}
/* Beautiful friend */