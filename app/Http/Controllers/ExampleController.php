<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function getUser($id) {
        return "user ID = " . $id;
    }

    public function getAnjay($anjay1, $anjay2){
        return "Anjay 1 adalah ". $anjay1 . " dan Anjay 2 adalah ". $anjay2;
    }
}
