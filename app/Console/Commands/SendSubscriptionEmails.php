<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SubscriptionEmail;
use App\Jobs\SendEmail;

class SendSubscriptionEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:subscriptionemail {--website_key=} {--post_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscription Emails';

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
     * @return int
     */
    public function handle()
    {
		//dd($this->options());
		if(!($this->option('website_key'))){
			echo '--website_key is missing'; exit;
		}
		if(!($this->option('post_id'))){
			echo '--post_id is missing'; exit;
		}
		$details=[];
		$details['website_key']=$this->option('website_key');
		$details['post_id']=$this->option('post_id');
		dispatch(new SendEmail($details));
        return Command::SUCCESS;
    }
}
