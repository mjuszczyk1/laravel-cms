<?php

namespace App\Http\Controllers;

use App\Block;

class ContentController extends Controller
{
    public function home()
    {
        $welcomeBlock = Block::where('page_slug', '=', 'homepage')
                                ->where('area', '=', 'hero')
                                ->first();
        $cta1         = Block::where('area', '=', 'cta1')->first();
        $cta2         = Block::where('area', '=', 'cta2')->first();
        $cta3         = Block::where('area', '=', 'cta3')->first();
        return view('content.home', array(
            'isFront'      => true,
            'welcomeBlock' => $welcomeBlock,
            'ctas'         => array(
                $cta1, $cta2, $cta3,
            ),
        ));
    }
}
