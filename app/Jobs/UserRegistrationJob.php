<?php

namespace App\Jobs;

use App\Enums\RoleEnum;
use App\Mail\RegistrarUser;
use App\Models\Role;
use App\Repositories\User\UserRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class UserRegistrationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(UserRepository $userRepository)
    {
        $data = $this->data;
        $data['token'] = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $role = Role::where('name', RoleEnum::APPLICANT)->first();
        $data['position'] = RoleEnum::APPLICANT;
        $data['reference'] = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['phone_number'] = $data['token'];
        $data['status'] = true;
        $user = $userRepository->create($data);

        if ($user === false) {
            // Handle the case when user creation fails
            return;
        }

        $user->roles()->attach($role);
        Mail::to($user->email)->send(new RegistrarUser($user, $data['token']));
    }
}
