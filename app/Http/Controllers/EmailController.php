<?php

namespace App\Http\Controllers;
use App\Mail\DummyEmail;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send()
    {
        Mail::to("from@example.com")->send(new DummyEmail());
        return "Email Succesfull sended!";
    }
}
