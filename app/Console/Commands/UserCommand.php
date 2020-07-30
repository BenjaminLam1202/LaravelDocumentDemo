<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:removeinmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        echo 'its morning,now bye ' . PHP_EOL;
        \Log::info("day la lenh dau"); 
        // DB::table('users')->where('id', rand(2,User::all()->count()))->delete();
        User::all()->last()->delete();
        DB::table('users')->insert([
            [
             'name' => "toidicodedao".rand(1,100),
             'email' => "toidicodedao".rand(1,100)."@toidicodedao",
             'created_at'=> now(),
             'password' => Hash::make("giahuy123"),
            ],
            [
             'name' => "toidicodedao".rand(100,200),
             'email' => "toidicodedao".rand(100,200)."@toidicodedao",
             'created_at'=> now(),
             'password' => Hash::make("giahuy123"),
            ],
        ]);
    }
}
