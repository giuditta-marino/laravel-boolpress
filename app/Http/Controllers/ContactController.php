<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;

class ContactController extends Controller
{
  public function index(Request $request)
  {
    $data = $request->all();

    Mail::to('servizioclienti@boolpress.it')->send(new ContactMail());
  }
}
