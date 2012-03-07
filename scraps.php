<?php
/*
Plugin Name: Scraps
Plugin URI: http://l3rady.com/projects/scraps/
Description: Snippets of content that is stored in a custom post type. Content can be included into posts/pages/templates via shortcodes or template tags.
Author: Scott Cariss
Version: 0.1.1
Author URI: http://l3rady.com/
Text Domain: scraps
Domain Path: /languages
*/

/*  Copyright 2011  Scott Cariss  (email : scott@l3rady.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'SC_SCRAPS_PLUGIN_FILE', __FILE__ );
define( 'SC_SCRAPS_INCLUDES', dirname( __FILE__ ) . '/includes/' );

require SC_SCRAPS_INCLUDES . 'class.php';
require SC_SCRAPS_INCLUDES . 'class-api.php';
require SC_SCRAPS_INCLUDES . 'api.php';

sc_Scraps::on_load();
?>