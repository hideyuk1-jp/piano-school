<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sample.com',
            'password' => bcrypt('admin'),
            'role' => 5
        ]);
        // Teacher
        for ($i=1; $i<=30; $i++) {
            User::create([
                'name' => 'Teacher'.$i,
                'email' => "teacher{$i}@sample.com",
                'password' => bcrypt("teacher{$i}"),
                'role' => 10
            ]);
        }
        // Student
        for ($i=1; $i<=100; $i++) {
            User::create([
                'name' => 'Student'.$i,
                'email' => "student{$i}@sample.com",
                'password' => bcrypt("student{$i}"),
                'role' => 15
            ]);
        }
    }
}
