<?php

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $profile = new Profile();
        $adminRole = Role::whereName('Admin')->first();
        $redactorRole = Role::whereName('Redactor')->first();
        $userRole = Role::whereName('User')->first();

        // Seed test admin
        $seededAdminEmail = 'oleg@na77.ru';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name' => 'oleg-admin',
                'first_name' => 'Oleg',
                'last_name' => 'Agapov',
                'email' => $seededAdminEmail,
                'password' => Hash::make('oleg0202'),
                'token' => str_random(64),
                'activated' => true,
                'signup_confirmation_ip_address' => $faker->ipv4,
                'admin_ip_address' => $faker->ipv4,
            ]);

            $user->profile()->save(new Profile());
            $user->attachRole($adminRole);
            $user->attachRole($redactorRole);
            $user->save();
        }

        // Seed test admin
        $seededRedactorEmail = 'o@na77.ru';
        $user = User::where('email', '=', $seededRedactorEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name' => 'redactor',
                'first_name' => 'Oleg',
                'last_name' => 'Agapov',
                'email' => $seededRedactorEmail,
                'password' => Hash::make('oleg0202'),
                'token' => str_random(64),
                'activated' => true,
                'signup_confirmation_ip_address' => $faker->ipv4,
                'admin_ip_address' => $faker->ipv4,
            ]);

            $user->profile()->save(new Profile());
            $user->attachRole($redactorRole);
            $user->save();
        }

        // Seed test user
        $user = User::where('email', '=', 'nata@na11.ru')->first();
        if ($user === null) {
            $user = User::create([
                'name' => 'simple-user',
                'first_name' => 'Natasha',
                'last_name' => 'Agapova',
                'email' => 'nata@na11.ru',
                'password' => Hash::make('nata0309'),
                'token' => str_random(64),
                'activated' => true,
                'signup_ip_address' => $faker->ipv4,
                'signup_confirmation_ip_address' => $faker->ipv4,
            ]);

            $user->profile()->save(new Profile());
            $user->attachRole($userRole);
            $user->save();
        }

        // Seed test users
        // $user = factory(App\Models\Profile::class, 5)->create();
        // $users = User::All();
        // foreach ($users as $user) {
        //     if (!($user->isAdmin()) && !($user->isUnverified())) {
        //         $user->attachRole($userRole);
        //     }
        // }
        for ($i = 0; $i < 150; $i++) {
            $seededAdminEmail = $faker->email;
            $user = User::where('email', '=', $seededAdminEmail)->first();
            if ($user === null) {
                $user = User::create([
                    'name'                           => $faker->userName,
                    'first_name'                     => $faker->firstName,
                    'last_name'                      => $faker->lastName,
                    'email'                          => $seededAdminEmail,
                    'password'                       => Hash::make('password'),
                    'token'                          => str_random(64),
                    'activated'                      => true,
                    'signup_confirmation_ip_address' => $faker->ipv4,
                    'admin_ip_address'               => $faker->ipv4,
                ]);
                $user->profile()->save($profile);
                $user->attachRole($userRole);
                $user->save();
            }
        }

    }
}
