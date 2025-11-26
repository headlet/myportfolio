<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Ajay',
            'last_name'  => 'Bhayadyo',
            'username'   => 'Abhayadyo',
            'email'      => 'abhayadyo@gmail.com',
            'phone_number' => '9861287654',
            'profile_picture' => 'User/h7KLpYuz0XhaJ2NqdwBH5hr1jNPQpSQlNdWfZLwu.jpg',
            'gender'     => 'male',
            'password'   => Hash::make('Password123'),
            'introduction' => 'Passionate developer who loves building clean and modern web experiences.',
            'description'  => 'A full-stack learner focused on Laravel, UI/UX, and creating smooth performance-driven applications.',
            'github'     => 'https://github.com/headlet',
            'linkedin'   => 'https://np.linkedin.com/in/ajay-bhayadyo-a17713285',
            'facebook'   => 'null',
            'experience' => '1 year',
            'project'    => '',
            'location' => 'Nepal, Bhaktapur',
            'profile_picture' => null,
        ]);
    }
}
