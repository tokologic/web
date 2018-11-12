<?php

namespace App\Observers;

use App\Model\User;

class UserObserver
{
    public function creating(User $user)
    {
        $this->encryptPassword($user);
    }

    public function created(User $user)
    {
        $this->activityLog($user, 'created');
    }

    public function updated(User $user)
    {
        $this->activityLog($user, 'updated');
    }



    /**
     * @param User $user
     */
    public function encryptPassword(User $user): void
    {
        $encryptedPassword = bcrypt($user->password);
        $user->password = $encryptedPassword;
    }

    /**
     * @param User $user
     * @param $message
     */
    private function activityLog(User $user, $message): void
    {
        activity()->by(\Sentinel::getUser())
            ->on($user)->log($message);
    }
}
