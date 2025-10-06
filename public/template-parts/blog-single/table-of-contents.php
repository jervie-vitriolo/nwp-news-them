<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
    
}

function newsx_the_content() {
    if ('true' === post_password_required()) {
        echo get_the_password_form();
        return;
    }

    // Start output buffering
    ob_start();
    the_content();
    $content = ob_get_clean();

    // Extract headings and generate TOC
    $headings = [];
    preg_match_all('/<h([1-6])(.*?)>(.*?)<\/h[1-6]>/i', $content, $matches, PREG_SET_ORDER);


    if (!empty($matches)) {
        // Process headings and add IDs
        foreach ($matches as $match) {
            $title = wp_strip_all_tags($match[3]);
            if (!empty($title)) {
                $id = sanitize_title($title);
                $headings[] = [
                    'title' => $title,
                    'id' => $id
                ];

                // Replace heading with ID version
                $new_heading = sprintf(
                    '<h%1$s%2$s id="%3$s">%4$s</h%1$s>',
                    $match[1],
                    $match[2],
                    esc_attr($id),
                    $match[3]
                );
                $content = str_replace($match[0], $new_heading, $content);
            }
        }

        // Generate TOC if we have headings
        if (!empty($headings)) {
            echo '<div class="newsx-table-of-contents">';
            echo newsx_customizer_edit_button_markup('bs_toc');
            echo '<h3>' . newsx_get_svg_icon('book-open');
            echo '<span>' . esc_html(newsx_get_option('bs_toc_heading_text')) . '</span></h3>';
            echo '<div>';
            foreach ($headings as $index => $heading) {
                printf(
                    '<h5><a href="#%s" class="newsx-toc-item">%d. %s</a></h5>',
                    esc_attr($heading['id']),
                    $index + 1,
                    esc_html($heading['title'])
                );
            }
            echo '</div></div>';
        }
    }

    // Output the content with added IDs
    echo '<div class="newsx-post-content">';
    echo newsx_customizer_edit_button_markup('bs_content');
    echo $content;
    echo '</div>';
}