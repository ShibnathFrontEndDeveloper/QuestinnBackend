<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Traits\Mailsend;
use App\Models\Order;
use App\Models\User;

class Kernel extends ConsoleKernel
{
    use Mailsend;
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {

            $this->thankyouMailCron();

        })->everyMinute();
    }

    public function thankyouMailCron(){
        $nowDate = date('Y-m-d');
        $nowTime = date('H:i');
        if($nowTime == '14:42'){
            $getOrders = Order::where('to_date',$nowDate)->get();
            foreach ($getOrders as $key => $value) {
                $user = User::where('id',$value->user_id)->first();
                $mailData = [
                    "name" => $user->name
                ];
                $template = 'email-template.thank-you-mail';
                $subject = "Thank You";
                $checkStatus = $this->sendMail($user->email,$mailData,$template,$subject);
            }
        }
    }

    // public function thankyouMailCron(){

    //             $mailData = [
    //                 "name" => "rajdeep das"
    //             ];
    //             $template = 'email-template.thank-you-mail';
    //             $subject = "Thank You";
    //             $checkStatus = $this->sendMail("raj@yopmail.com",$mailData,$template,$subject);


    // }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
