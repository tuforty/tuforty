<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Contracts\SlackTask;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuotaThresholdExceededMail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SlackTaskNotification;

class NotifyUsersOfQuotaThresholdReached extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:threshold-reached';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users with threshold already reached or exceeded.';

    /**
     * Get users that have exceed their quotas.
     *
     * @param integer $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getThresholdUsers($page = 0, $size = 50)
    {
        $lastChecked = Carbon::now()->subDays(10);
        $expectedThreshold = DB::raw('(quota_left / quota_last_purchased) * 100');

        return User::query()->where('quota_threshold', '>=', $expectedThreshold)
            ->whereDate('quota_threshold_last_checked_at', '<=', $lastChecked)
            ->orWhere('quota_threshold_last_checked_at', null)
            ->forPage($page, $size);
    }

    /**
     * Send slack notification of job status.
     *
     * @param int $totalProcessed
     * @return void
     */
    private function sendSlackNotification($totalProcessed)
    {
        $title = "*Task:* {$this->signature}\n*Description:* {$this->description}";
        $message = "*Message:* Successfully notifed threshold users.\n*Total users notified:* {$totalProcessed}.";
        $task = new SlackTask($title, $message);
        Notification::send(Admin::first(), new SlackTaskNotification($task));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        [$page, $total] = [0, 0];
        $users = $this->getThresholdUsers($page);

        while ($users->count() > 0) {
            $total += $users->count();

            foreach ($users as &$user) {
                Mail::to($user)->send(new QuotaThresholdExceededMail($user));
                $user->quota_threshold_last_checked_at = Carbon::now();
                $user->save();
            }

            $page += 1;
            $users = $this->getThresholdUsers($page);
        }

        // TODO: Test that Slack notification works as expected.
        $this->sendSlackNotification($total);
    }
}
