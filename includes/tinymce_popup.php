<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php _e( 'Add a Scrap', 'scraps' ); ?></title>
        <script src="<?php echo site_url( '/wp-includes/js/tinymce/tiny_mce_popup.js' ); ?>"></script>
        <script src="<?php echo site_url( '/wp-includes/js/tinymce/utils/form_utils.js' ); ?>"></script>
        <?php wp_print_styles( 'sc-scraps-tinymce_popup' ); ?>
    </head>
    <body>

        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td nowrap="nowrap">Search:&nbsp;&nbsp;</td>
                <td width="100%"><input style="width: 100%;" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="scrapsresults">
                        <div class="recent">
                            <em><?php _e("Recent Scraps", "scraps"); ?></em>
                        </div>
                        <ul>
                            <?php
                            $scraps = get_posts(
                                array(
                                    'numberposts'     => 10,
                                    'post_type'       => 'sc-scraps'
                                )
                            );
                            ?>
                            <?php if($scraps): foreach($scraps as $scrap): ?>
                                <li data-id="<?php echo $scrap->ID; ?>"><a href="#">Insert</a><?php echo apply_filters("the_title", $scrap->post_title); ?></li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
               <td colspan="2" align="right"><a id="scscraps-cancel" href="#">Cancel</a></td>
            </tr>
        </table>

    </body>
</html>