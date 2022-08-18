<?php

namespace App\View\Composers;


use Illuminate\View\View;

class ChannelComposer
{


    public function compose(View $view)
    {
        if (!auth()->check()) {
            return;
        }
        $channel = auth()->user()->channels()->first();

        $view->with('channel', $channel);
    }
}
