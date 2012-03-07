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
if ( ! class_exists( 'sc_ScrapsAPI' ) ) {

	class sc_ScrapsAPI extends sc_Scraps {

        /**
         * Get content of a Scrap
         */
        static function get_scrap( $args, $content ) {

            global $wpdb;

            $defaults = array(
                'id' => 0,
                'slug' => '',
                'title' => '',
                'filter' => true
            );

            $args = wp_parse_args( $args, $defaults );

            $id = (int) $args['id'];
            $scrap = false;
            $where = '';

            if( 0 !== $id )
                $where = "`ID` = {$id}";
            elseif ( ! empty( $args['slug'] ) )
                $where = $wpdb->prepare( "`post_name` = '%s'", $args['slug'] );
            elseif ( ! empty( $args['title'] ) )
                $where = $wpdb->prepare( "`post_title` = '%s'", $args['title'] );

            if ( ! empty( $where ) )
                $scrap = $wpdb->get_var( "SELECT `post_content` FROM {$wpdb->posts} WHERE {$where} AND post_type = 'sc-scraps'" );

            if( $scrap )
                $output = $scrap;
            else
                $output = $content;

            if( $args['filter'] )
                return apply_filters( 'the_content', $output);
            else
                return $output;
            
        }

    }

}
?>