<?php
/**
 * This file is part of the Juvem package.
 *
 * (c) Erik Theoboldt <erik@theoboldt.eu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function bootstrap_gallery( $output = '', $atts, $instance )
{
    $return = '';

    $galleryid = uniqid();

    $return .= '<div class="media-gallery">'; //gallery

    if (strlen($atts['columns']) < 1) {
        $columns = 3;
    }
    else {
        $columns = $atts['columns'];
    }

    $images = explode(',', $atts['ids']);

    if ($columns < 1 || $columns > 12) {
        $columns = 3;
    }


    $col_class = 'col-xs-6 col-sm-6 col-md-' . ceil(12/$columns);

    $return .= '<div class="row gallery">';

    $i = 0;

    foreach ($images as $key => $value) {
/*
        if ($i%$columns == 0 && $i > 0) {
            $return .= '</div><div class="row gallery">';
        }
*/
        $imageSrcThumbnail = wp_get_attachment_image_src($value, 'thumbnail');
        $imageSrcFull      = wp_get_attachment_image_src($value, 'full');

        $attachment = get_post($value);
        $imageTitle = $attachment->post_title;

        $imageDescription       = esc_attr($attachment->post_excerpt ? $attachment->post_excerpt : $attachment->post_content);
        $imageDescriptionMarkup = $imageDescription ? ' data-footer="' . $imageDescription . '"' : '';
        $imageTitleMarkup       = $imageTitle ? sprintf(' title="%1$s" data-title="%1$s"', esc_attr($imageTitle)) : '';

        $return .= '
            <div class="'.$col_class.'">
                <div class="gallery-image-wrap">
                    <a data-gallery="gallery-'.$galleryid.'" data-toggle="lightbox" href="'.$imageSrcFull[0].'"'.$imageTitleMarkup.$imageDescriptionMarkup.'>
                        <img src="'.$imageSrcThumbnail[0].'" alt="" '.$imageTitleMarkup.' class="img-responsive">';

            $return .= '<span>'.esc_html($imageTitle).'</span>';

        $return .= '
                    </a>
                </div>
            </div>';

        $i++;
    }

    $return .= '</div>';

    $return .= '</div>'; //gallery

    return $return;
}

add_filter( 'post_gallery', 'bootstrap_gallery', 10, 4);
?>