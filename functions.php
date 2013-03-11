<?php
if( ! function_exists( "twentytwelve_child_customize_register" )) {
	function twentytwelve_child_customize_register( $wp_customize ) {
		$wp_customize->add_section(
			'alignment',
			array(
				'title' => __('Title Alignment', 'twentytwelve'),
				'description' => __('Set title Alignment for responsive layout', 'twentytwelve'),
				'priority' => 30
				)
			);
		
		$wp_customize->add_setting( 'title_alignment',array(
				'default' => 'left',
				'transport' => 'postMessage'

			));
		$wp_customize->add_control(
			'title_alignment',
			array(
				'label' => __('Title Alignment for responsive layouts', 'twentytwelve'),
				'section' => 'alignment',
				'settings' => 'title_alignment',
				'type' => 'radio',
				'choices' => array(
					'left' => 'left',
					'center' => 'center',
					'right' => 'right'
					)
				)
			);
		$wp_customize->add_section(
			'responsive_layout',
			array(
				'title' => __('Responsive Layout', 'twentytwelve'),
				'description' => __('Preview Responsive Layout', 'twentytwelve'),
				'priority' => 30
				)
			);
		$wp_customize->add_setting( 'responsive_layout',array(
				'default' => '1024,768',
				'transport' => 'postMessage'

			));
		$wp_customize->add_control(
			'responsive_layout',
			array(
				'label' => __('Select Dimension', 'twentytwelve'),
				'section' => 'responsive_layout',
				'settings' => 'responsive_layout',
				'type' => 'radio',
				'choices' => array(
					'320,480'=> '320px * 480px',
					'480,320' => '480px * 320px',
					'600,800' => '600px * 800px',
					'768,1024' => '768px * 1024px',
					'800,600' => '800px * 600px',
					'1024,768' => '1024px * 768px'
					)
				)
			);
	}
}

	
function alignment() {
	$pos = get_theme_mod('title_alignment');
	
	?>
	<style>
		@media screen and (max-width: 599px) {
			.site-header h1,
			.site-header h2 {
				text-align: <?php echo $pos; ?>
			}
		}
	</style>
	<?php
}

function alignment_preview() {
	wp_enqueue_script( 'theme-customizer', $src = get_template_directory_uri().'-child/js/theme-customizer.js', $deps = array('jquery'), $ver = false, $in_footer = true );
}

function set_width() {
	$dim = get_theme_mod('responsive_layout');
	$dim = split(',', $dim);
	?>
	<style>
		#customize-preview iframe {
			width: <?php echo $dim[0].'px'; ?>;
			height: <?php echo $dim[1].'px'; ?>;
		}
	</style>
	<?php
	wp_enqueue_script( 'theme-customizer', $src = get_template_directory_uri().'-child/js/iframe-width.js', $deps = array('jquery'), $ver = false, $in_footer = true );
}
add_action( 'customize_register', 'twentytwelve_child_customize_register');
add_action('wp_head', 'alignment');
add_action('customize_preview_init', 'alignment_preview');
add_action('customize_controls_print_scripts', 'set_width');
?>