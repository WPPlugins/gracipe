<?php

function gwp_is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}


// add more buttons to the html editor
function gwp_appthemes_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">

      QTags.addButton( 'gracipe_qbutton', 'Gracipe', my_callback );
      function my_callback(e, c, ed) {

        function cbVal (cb_val) {
          t.tagStart = cb_val;
          QTags.TagButton.prototype.callback.call(t, e, c, ed)
        }

        var prmt, t = this;
        window.GRACIPE_CB_FUNC = cbVal;


        jQuery("body").trigger('gracipeShow');
      }
    </script>
<?php
    }
}


function gwp_enqueue_plugin_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["gwp_gracipe_button_plugin"] =  plugin_dir_url(__FILE__) . "assets/button.js";
    return $plugin_array;
}


function gwp_register_html_button($buttons)
{
    //register buttons with their id.
    array_push($buttons, "green");
    return $buttons;
}


function gwp_add_admin_js_and_css()
{
    if (gwp_is_edit_page())
    {
        wp_enqueue_script('gracipe_js', plugins_url( 'assets/app.js', __FILE__ ) );
        wp_enqueue_style( 'gracipe_css', plugins_url( 'assets/app.css', __FILE__ )  );
    }

}


add_filter("mce_external_plugins", "gwp_enqueue_plugin_scripts");
add_filter("mce_buttons", "gwp_register_html_button");

add_action( 'admin_print_footer_scripts', 'gwp_appthemes_add_quicktags' );
add_action( 'admin_enqueue_scripts', 'gwp_add_admin_js_and_css' );


?>
