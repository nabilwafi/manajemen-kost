<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use App\Models\payment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GenerateMonthlyTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-monthly-transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew transactions if end_date is today or later by setting status to pending and creating a new payment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        $transactions = Transaction::where('status', 'Proses')->with('users')->get()->filter(function ($transaction) use ($today) {
            $endDate = Carbon::parse($transaction->end_date_sewa)->startOfDay();
            return $endDate->lessThanOrEqualTo($today);
        });
        

        foreach ($transactions as $transaction) {
            $transaction->status = 'Pending';
            $transaction->save();

            Payment::create([
                'transaction_id' => $transaction->id,
                'user_id' => $transaction->users[0]->id,
                'kamar_id' => $transaction->kamar_id,
                'status' => 'Pending',
                'payment_date' => now(),
            ]);

            Log::info('Renewed transaction ID: ' . $transaction->id);
            $this->info("Renewed transaction ID: {$transaction->id}");
        }

        Log::info('Finished checking and renewing transactions.');
        $this->info('Finished checking and renewing transactions.');
    }
}
