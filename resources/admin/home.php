<?php

/**
 * Admin Home Page.
 * We define a custom field within a metabox in order to let the user
 * choose a book to promote on the home page.
 */
$home = (int) get_option('page_on_front');

if (themosis_is_post($home)) {

    // Metabox for the front page.
    Metabox::make(__('Video Hero', THEME_TEXTDOMAIN), 'page')->set([
        Field::media('video_hero', [
            'title' => 'Video Hero',
            'type'  => ['video']
        ])
    ]);
}

/*-----------------------------------------------------------------------*/
// Remove editor from home page.
/*-----------------------------------------------------------------------*/
Action::add('init', function () use ($home) {
    if (themosis_is_post($home)) {
        remove_post_type_support('page', 'editor');
    }
});