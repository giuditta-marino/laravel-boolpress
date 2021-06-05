<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
  public function index(string $slug)
  {
    //voglio stampare tutti i post associati ai tag
    $tag = Tag::with('posts')->where('slug', '=', $slug)->first();

    return view('guests.posts.blog')->with('posts', $tag->posts);
  }
}
