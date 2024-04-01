<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Command
 * php artisan admin:create
 * php artisan admin:create --username=your_user_name --email=your_email@domain.com
 */
class CreateAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--u|username= : Username of the newly created user.} {--e|email= : E-Mail of the newly created user.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually creates a new laravel user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $count = $this->option(key: 'count');
        $count = 20;
        $bar = $this->output->createProgressBar(3);
        // Enter username, if not present via command line option
        $name = $this->option('username');
        if ($name === null) {
            $name = $this->ask('Please enter your username.');
        }

        // Enter email, if not present via command line option
        $email = $this->option('email');
        if ($email === null) {
            $email = $this->ask('Please enter your E-Mail.');
        }

        // Always enter password from userinput for more security.
        $password = $this->secret('Please enter a password.');

        // Prepare input for the fortify user creation action
        $input = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];

        for ($i = 0; $i < $count; $i++) {
            $bar->advance();
        }

        try {
            // Use fortify to create a new user.
            $user = User::create($input);

            $role = Role::firstOrCreate(['name' => 'Admin']);

            $permissions = Permission::pluck('id', 'id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole([$role->id]);
        } catch (\Exception $e) {
            $this->error($e->getMessage());

            return;
        }

        $bar->finish();
        $this->info('');
        // Success message
        $this->info('User created successfully!');
        $this->info('New user id: '.$user->id);
    }
}
