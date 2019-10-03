<?php

namespace App\Listeners;

use App\Models\IssueRevision;
use App\Events\IssueUpdating;
use Illuminate\Support\Facades\Auth;

class CreateIssueRevision
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
    public function handle(IssueUpdating $event)
    {
        $model = $event->issue;

        $changes = array();

        foreach($model->getDirty() as $key => $value){
            $original = $model->getOriginal($key);

            $changes[$key]['old'] = $original;

            if ($original !== $value) {
                $changes[$key]['new'] = $value;
            }
        }

        IssueRevision::create([
            'user_id' => Auth::user()->id,
            'issue_id' => $model->id,
            'attributes' => json_encode($changes)
        ]);
    }
}
