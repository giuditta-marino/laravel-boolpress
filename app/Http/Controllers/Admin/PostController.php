<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();

      return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'exists:categories,id|nullable'
      ]);

      $data = $request->all();

      $post = new Post();
      $post->fill($data);

      $post->slug = $this->generateSlug($post->title); //quando esce dal ciclo perché non c'è più $post_with_slug

      $post->save();

      return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $categories = Category::all();
      return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string'
      ]);

      $data = $request->all();
      //se il title che ha post è diverso da quello che sta inserendo l'utente allora fai generateSlug in modo tale che cambi lo slug solo se modifico il titolo

      $data['slug'] = $this->generateSlug($data['title'], $post->title != $data['title']);

      $post->update($data);

      return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    private function generateSlug(string $title, bool $change = true)
    {
      $slug = Str::slug($title, '-'); //salvo lo slug che vorrei generare

      if (!$change) {
        return $slug;
      }

      $slug_base = $slug; //ne salvo una copia in slug_base
      $contatore = 1;

      $post_with_slug = Post::where('slug', '=', $slug)->first(); //verifico se esiste già un post con questo slug prendendo il primo risultato
      while ($post_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $post_with_slug = Post::where('slug', '=', $slug)->first(); //aggiorna il valore di $post_with_slug
      }

      return $slug;
    }
}
