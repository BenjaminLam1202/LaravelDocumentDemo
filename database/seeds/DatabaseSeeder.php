<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call('UserDatabaseSeeder');
        $this->call('PostDatabaseSeeder');
        $this->call('CommentDatabaseSeeder');
    }

}
class UserDatabaseSeeder extends Seeder
{
	public function run() {
		DB::table('users')->insert([
			[
			 'name' => "toidicodedao",
			 'created_at' => now(),
			 'email' => "toidicodedao@toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],			
			[
			 'name' => "Lam Thai Gia Huy",
			 'created_at' => now(),
			 'email' => "hilton@asia.cybridge.jp",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "Lam Thasdfgfsduy",
			 'created_at' => now(),
			 'email' => "hiltodfgsdfgdfsgn@asdfgsdfsbridp",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "toidicodedao1",
			 'created_at' => now(),
			 'email' => "toidicodedao1@toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "toidicodedao2",
			 'created_at' => now(),
			 'email' => "toidicodedao2@toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],
			[
			 'name' => "toidicodedao3",
			 'created_at' => now(),
			 'email' => "toidicodedao3toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],

			[
			 'name' => "toidicodedao4",
			 'created_at' => now(),
			 'email' => "toidicodedao4toidicodedao",
			 'password' => \Hash::make("giahuy123"),
			],

		]);
	}
}
class PostDatabaseSeeder extends Seeder
{
	public function run() 
	{
		DB::table('posts')->insert([
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],			
			[
			 'user_id' => 1,
			 'created_at' => now(),
			 'title' => "This is just a title dont mind me",
			 'des' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			],

		]);
	}
}
class CommentDatabaseSeeder extends Seeder
{
	public function run() {
		DB::table('comments')->insert([
			[
			 'commentable_type' => "App\Post",
			 'commentable_id'=> "1",
			 'user_id' => "1",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\Post",
			 'commentable_id'=> "2",
			 'user_id' => "1",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\Post",
			 'commentable_id'=> "3",
			 'user_id' => "1",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\Post",
			 'commentable_id'=> "1",
			 'user_id' => "2",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\Post",
			 'commentable_id'=> "1",
			 'user_id' => "2",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\Post",
			 'commentable_id'=> "2",
			 'user_id' => "3",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],

			[
			 'commentable_type' => "App\User",
			 'commentable_id'=> "1",
			 'user_id' => "1",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\User",
			 'commentable_id'=> "2",
			 'user_id' => "1",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\User",
			 'commentable_id'=> "3",
			 'user_id' => "1",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\User",
			 'commentable_id'=> "1",
			 'user_id' => "2",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\User",
			 'commentable_id'=> "1",
			 'user_id' => "2",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			[
			 'commentable_type' => "App\User",
			 'commentable_id'=> "2",
			 'user_id' => "3",
			 'des' => "toidicodedao@toidicodedao",
			 'created_at' =>  now(),
			],
			

		]);
	}
}