<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // clear the current tables
        DB::table('users')->delete();
        DB::table('posts')->delete();
        // seed posts
        factory(App\Post::class, 8)->create();
        // create a user we can login with
        User::create([
            'name'     => 'Atobajaiye Boluaji',
            'email'    => 'genmax100.ab@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
