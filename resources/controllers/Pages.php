<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Meta;

class Pages extends BaseController
{

    //handles the home page
    public function home ($post)
    {

        $id = $post->ID;
        $hero_video = wp_get_attachment_url(Meta::get($id, 'video_hero'));

        return view('pages.front', [
            'ID' => $id,
            'hero_video' => $hero_video
        ]);
    }
}