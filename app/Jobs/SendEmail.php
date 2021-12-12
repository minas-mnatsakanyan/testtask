<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SubscriptionEmail;
use Mail;
use App\Models\UserSubscription;
use App\Models\Post;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	protected $details;
	
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
          $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		$website_key  = $this->details['website_key'];
		$post_id      = $this->details['post_id'];
 		$post         = Post::find($post_id);
		$post_datails =['title'=>$post->title, 'content'=>$post->content];

		$user_subscriptions = UserSubscription::where('website_key', $website_key)->get();
		if(!$user_subscriptions){
			echo 'No Active subscription Exist';
			return false;
		}
		$email              = new SubscriptionEmail($post_datails);  
		
		foreach($user_subscriptions as $user_subscription){
			$send_mail=$user_subscription->user->email;
			Mail::to($send_mail)->send($email);
		}

             
        
    }
}
