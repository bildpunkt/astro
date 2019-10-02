<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminDemote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:demote {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demote a User from Admin status';

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

        if ($user->isAdmin() == false) {
            $this->error('The given user is not an admin!');

            return false;
        }

        $user->admin = false;
        $user->save();

        $this->info('User is not an admin anymore!');
    }
}
