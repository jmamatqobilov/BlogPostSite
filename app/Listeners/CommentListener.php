<?php

namespace App\Listeners;

use App\Events\CommentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CommentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentEvent $event)
    {
        $app = $event->app;
        DB::table('comments')->insert([
            'user_id' => $app->user_id,
            'application_id' =>$app->id,
            'body' =>'sdsdssdsdsds'
        ]);
    }
}
