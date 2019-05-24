<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\WeeklyReport;
use App\User;

class notifyUsersWithTotalHours implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $users = new User;
        $this->users = $users->isTracking();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->users as $user) {
            $user->notify(new WeeklyReport($user, $user->timetrackForLastWeek($user)));
        }
    }
}
