<?php
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
// Only load class if it hasn't already been loaded
if ( ! class_exists( 'sc_Scraps' ) ) {

	class sc_Scraps {

        /**
         * Sets up plugins hooks during initial load.
         */
        static function on_load() {

            // Register Scraps CPT and Meta Boxes
            add_action( 'init', array( __CLASS__, 'register_scraps_cpt' ) );

            // Register Scraps CSS and JS
            add_action( 'admin_init', array( __CLASS__, 'register_scraps_styles_scripts' ) );

            // Register TinyMCE button
            add_action( 'init', array( __CLASS__, 'register_scraps_tinymce_buttons' ) );

            // Add Shortcode
            add_shortcode( 'scrap', 'sc_scraps_get_scrap' );

        }


        /**
         * Sets up Scraps CPT
         */
        static function register_scraps_cpt() {

            $labels = array(
                'name' => __( 'Scraps', 'scraps' ),
                'singular_name' => __( 'Scrap', 'scraps' ),
                'add_new' => __( 'Add a Scrap', 'scraps' ),
                'add_new_item' => __( 'Add a New Scrap', 'scraps' ),
                'edit_item' => __( 'Edit Scrap', 'scraps' ),
                'new_item' => __( 'New Scrap', 'scraps' ),
                'view_item' => __( 'View Scrap', 'scraps' ),
                'search_items' => __( 'Search Scraps', 'scraps' ),
                'not_found' =>  __( 'No scraps found', 'scraps' ),
                'not_found_in_trash' => __( 'No scraps found in trash', 'scraps' ),
                'parent_item_colon' => ''
            );

            $args = array(
                'labels' => $labels,
                'public' => false,
                'show_ui' => true,
                'rewrite' => false,
            );

            register_post_type( 'sc-scraps', $args );

        }


        /**
         * Loads up any needed styles and scripts for Scraps plugin
         */
        static function register_scraps_styles_scripts() {

            // Adds Scraps icon to admin sidebar. Replaces default pin icon.
            wp_enqueue_style( 'sc-scraps-icon', plugins_url( 'css/icon.css', SC_SCRAPS_PLUGIN_FILE ), array( "colors" ), '1.0', 'all' );

            // If on Scraps CPT admin page?
            if( ( 'sc-scraps' == $_GET['post_type'] ) || ( 'sc-scraps' == get_post_type($_GET['post']) ) ) {

                // Adds Scraps 32 icon to CPT. Replaces default pin icon.
                wp_enqueue_style( 'sc-scraps-icon-32', plugins_url( 'css/icon-32.css', SC_SCRAPS_PLUGIN_FILE ), array( "sc-scraps-icon" ), '1.0', 'all' );

            }

        }


        /**
         * Register TinyMCE button for Scraps
         */
        static function register_scraps_tinymce_buttons() {

            if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
                return;

            if ( 'true' == get_user_option( 'rich_editing' ) ) {

                add_filter( 'mce_external_plugins', array( __CLASS__, 'scraps_tinymce_register' ) );
                add_filter( 'mce_buttons', array( __CLASS__, 'scraps_tinymce_add_button' ) );

            }

        }


        /**
         * Register TinyMCE Plugin
         */
        static function scraps_tinymce_register($plugin_array) {

            $plugin_array[ 'scScraps' ] = plugins_url( 'js/tinymce_button.js', SC_SCRAPS_PLUGIN_FILE );
            return $plugin_array;

        }

        /**
         * Register TinyMCE button
         */
        static function scraps_tinymce_add_button($buttons) {

            array_push($buttons, "separator", "scScraps");
            return $buttons;

        }

    }

}
?>