<?php

namespace App\Console\Commands;

use App\Enums\BorrowingStatus;
use App\Mail\NotifReturnBook;
use App\Models\Book;
use App\Models\BorrowHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to alert return books!';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $borrowingHistories =
            BorrowHistory::where('status', BorrowingStatus::APPROVED)
                ->where('returned_at', '>', Carbon::now())
                ->get();
        $users = $borrowingHistories->map(function (BorrowHistory $borrowHistory) {
            return $borrowHistory->user;
        });

        $distinctUsers = $users->unique();
        foreach ($distinctUsers as $user) {
            Mail::to($user)->send(new NotifReturnBook($user));
        }
    }
}
