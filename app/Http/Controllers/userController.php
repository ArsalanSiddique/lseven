<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class userController extends Controller
{
    public function index()
    {



        // $user = new User();
        // $user->name = "Arsalan Ahmed";
        // $user->email = "arsalan@email.com";
        // $user->password = "password12345";
        // $user->save();


        // $users = User::All();
        // User::insert(["name" => "Test2", "email" => "test@demo.com", "password" => "abcd123", "mobile" => 12345]);
        // $user = $users->where("id", 5);
        // $user = User::where("id", 2)->update(["name" => "DevnDesigns"]);
        // User::where("id", 2)->delete();
        // User::where("id", 5)->update(["password" => bcrypt("abcd123")]);


        // $data = [
        //     "name" => "Minhaj Ansari",
        //     "email" => "minhaj2@demo.com",
        //     "password" => bcrypt("abcd123"),
        //     "mobile" => 1234567890
        // ];
        // User::create($data);  // This will ignore mobile but insert will not 


        $data = [
            "name" => "EORM",
            "email" => "eorm@demo.com",
            "password" => "abcd123",
        ];
        // User::create($data);  // This will ignore mobile but insert will not 

        $users = User::All();
        return $users;
        // dd($users);










        // Raw SQL Query
        // DB::insert("insert into users (name, email, password) VALUES (?,?,?)", ["Ahmed", "seven@example.com", "laravel"]);

        // DB::update("update users SET name = ?  where id = ?", ["DevnDesigns", 1]);

        // DB::delete("delete from users where id = ?", [1]);

        // $users = DB::select("select * from users");
        // return $users;


        return view("home");
    }
}
