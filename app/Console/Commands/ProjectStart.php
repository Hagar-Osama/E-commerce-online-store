<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class ProjectStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Start Project at DevMode';

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
        Artisan::call('migrate:fresh');
        $this->info('Database has updated');

        $name = $this->ask('Enter Your Admin name');
        if (empty($name)) {
            $this->info('Your Name Is Empty');
            $name = $this->ask('Please Enter Valid Name');
        } elseif ($name <= 3) {
            $this->info('Your Name Is too short');
            $name = $this->ask('UserName Must Be > 3chars');
        }

        $email = $this->ask('Enter Your Admin Email');
        if (empty($email)){
            $this->info('Your Email Is Empty');
            $email = $this->ask('Please Enter Valid Email');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->info('Un Valid email');
            $email = $this->ask('Please Enter Valid Email');
        }

        $password = $this->secret('Enter Your Password');
        if (empty($password)) {
            $this->info('Password Is Empty');
            $password = $this->secret('Please Enter Password');
        }

        $phone = $this->ask('Enter Your Phone Number');

        Artisan::call('db:seed --class="RoleSeed"');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password)
        ]);

        $role = Role::where('name','admin')->first();

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

        $this->info('Your Account Has Been Created Successfully, You can Login Now');
        return self::SUCCESS;
    }

}
