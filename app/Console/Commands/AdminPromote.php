<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminPromote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:promote {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promote a User to Admin status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::findOrFail($this->argument('user'));

        if ($user->isAdmin() == true) {
            $this->error('The given user is already an admin!');

            return false;
        }

        $user->admin = true;
        $user->save();

        $this->info('User is now an admin!');
    }
}
