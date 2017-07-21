<?php

function gwp_html_form_code($atts) {
    $a = shortcode_atts( array(
        'unit' => 'us',
        'name' => '',
        'zoom' => '0.8',
        'height' => '',
    ), $atts );

    $name = $a['name'];
    $zoom = $a['zoom'];
    $unit = $a['unit'];
    $height = $a['height'] ? $a['height'] : "undefined";

    $tmpl =<<<EOF
    <script type="text/javascript">
      window.GRACIPE_UNIT = "##UNIT##";
      window.GRACIPE_ROOT = "#gracipe";
      window.GRACIPE_SLUG = "##RECIPESLUG##";
      window.GRACIPE_COLLAPSED_HEIGHT = "##HEIGHT##";
    </script>

    <div style="zoom: ##ZOOM##" id="gracipe"></div>
EOF
;

  $tmpl = str_replace("##RECIPESLUG##", $name, $tmpl);
  $tmpl = str_replace("##UNIT##", $unit, $tmpl);
  $tmpl = str_replace("##ZOOM##", $zoom, $tmpl);
  $tmpl = str_replace("##HEIGHT##", $height, $tmpl);

  wp_enqueue_script( 'gracipe-vendor', 'http://plugin.gracipe.com/vendor.js',
		array( 'jquery' )
	);
  wp_enqueue_script( 'gracipe-app', 'http://plugin.gracipe.com/v2.js',
		array( 'jquery' )
	);

  wp_enqueue_style( 'gracipe-base', 'http://plugin.gracipe.com/embed.css' );
  wp_enqueue_style( 'gracipe-theme', 'http://plugin.gracipe.com/recipe-arrow.css' );
  wp_enqueue_style( 'gracipe-font', 'http://plugin.gracipe.com/gracipeFont.css' );
  wp_enqueue_style( 'gracipe-google-font', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' );

  return $tmpl;
}

add_shortcode( 'gracipe', 'gwp_html_form_code' );

?>
