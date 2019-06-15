<?php

namespace App\Console\Commands;

use App\Schedule;
use Illuminate\Console\Command;

class ReminderBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:hour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Remainder Message to all users';

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
        $messages = [
            "Sayang, Jangan kerja terus dong tapi banyakin olahraga yuk jangan lupa datang",
            "Inget kesehatan sayang, olahraga lah yuk 1 jam lagi sesuai waktu yang kamu booking",
            "Hayooo jangan lupa nanti olahraga ya sayang, jangan kerja melulu yang dipikirin tapi aku juga di pikirin"
        ];

        $now = date('H:i');
        $schedules = Schedule::where('date', '>=', date('Y-m-d'))->where('time', '=', date('H:i',strtotime($now) + 60*60))->get();
        foreach ($schedules as $schedule) {
            $key = array_rand($messages);
            $value = $messages[$key];
            $nexmo = app('Nexmo\Client');
            $nexmo->message()->send([
                'to' => $schedule->user->phone_number,
                'from' => 'Fitgo',
                'text' => $value,
            ]);
        }

        $this->info('Reminder SMS send to user');
    }
}
