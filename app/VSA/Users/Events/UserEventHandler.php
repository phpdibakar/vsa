<?php
namespace VSA\Users\Events;

use VSA\Users\Model\User;
use VSA\Settings\Facades\Settings;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserEventHandler {

    /**
     * Handle user sign up events.
     */
    public function onUserSignup(User $user)
    {
        if(!empty($user)){
			try{
				Mail::send('emails.user.signup', 
					array(
						'fname' => $user->fname,
						'lname' => $user->lname,
					),
					function($message) use ($user) {
						$message->to($user->email, $user->fname. ' '. $user->lname)
							->subject('New user sign up');
					}
				);
			}catch(\Exception $e){
				Log::error('Register Mail Sending Error '. $e->getMessage());
			}
		}else
			Log::error('Unknown user to send new registration mail');
    }
	
	/**
     * Handle user sign up events to notify an admin.
     */
    public function onUserSignupForAdmin(User $user)
    {
        if(!empty($user)){
			try{
				Mail::send('emails.admin_signup_notification', 
					array(
						'fname' => $user->fname,
						'lname' => $user->lname,
						'email' => $user->email,
					),
					function($message) use($user){
						$message->to(Settings::getAdminEmail(), $user->fname. ' '. $user->lname)
							->subject('New user sign up');
					}
				);
			}catch(\Exception $e){
				Log::error('Register Mail Sending Error '. $e->getMessage());
			}
		}else
			Log::error('Unknown user to send new registration mail');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('user.registered', 'UserEventHandler@onUserSignup');
		$events->listen('user.admin_notification_for_signup', 'UserEventHandler@onUserSignupForAdmin');
    }

}