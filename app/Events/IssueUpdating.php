<?php

namespace App\Events;

use App\Models\Issue;
use Illuminate\Queue\SerializesModels;

class IssueUpdating
{
    use SerializesModels;

    /**
     * @var \App\Models\Issue
     */
    public $issue;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Issue $issue)
    {
        $this->issue = $issue;
    }
}
