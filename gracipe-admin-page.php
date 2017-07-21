<?php

function gwp_add_custom_menu() {
    //add an item to the menu
    add_menu_page (
        'Gracipe',
        'Gracipe',
        'manage_options',
        'gracipe',
        'gwp_admin_page_text',
        plugin_dir_url( __FILE__ ).'icons/icon.png',
        '23.56'
    );
}

function gwp_admin_page_text() {
    ?>
    <div style="max-width: 600px" class="wrap">
        <h2>Gracipe ❤️ Wordpress </h2>
        <p>Thank you for trying out our Wordpress plugin. </p>
        <p>In the "new/edit site" menu you will now find a new quicktag with "Gracipe"</p>
    <?php echo '<img style="width: 500px" src="' . plugins_url( 'images/quicktag.png', __FILE__ ) . '" > '; ?>
        <p>When you click the button a popup will open and ask for you Gracipe email. After entering and confirming with "enter" your Gracipes will be loaded and you can embed them with the click of a button.</p>
    <?php echo '<img style="width: 500px" src="' . plugins_url( 'images/popup.png', __FILE__ ) . '" > '; ?>

    </div>
    <?php
}

add_action( 'admin_menu', 'gwp_add_custom_menu' );

?>
