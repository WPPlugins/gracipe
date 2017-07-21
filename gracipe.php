<?php
/*
Plugin Name: Gracipe 
Plugin URI:  www.gracipe.com
Description: Let's you embed graphical recipes from www.gracipe.com
Version:     0.5
Author:      Kai Köhn
Author URI:  https://github.com/kaikoehn
License:     GPL2
 
Gracipe WP plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Gracipe WP plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Gracipe WP plugin. If not, see {License URI}.
*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once ( plugin_dir_path(__FILE__) . 'gracipe-shortcode.php' );
require_once ( plugin_dir_path(__FILE__) . 'gracipe-admin-page.php' );
require_once ( plugin_dir_path(__FILE__) . 'gracipe-quicktags.php' );

?>
