<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tags = Tag::all();

      return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.tags.create');
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
        'name' => 'required|string|max:255',
      ]);
        $data = $request->all();

        $data['slug'] = $this->generateSlug($data['name']);

        $tag = new Tag();
        $tag->create($data);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
      return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
      $request->validate([
        'name' => 'required|string|max:255',
      ]);
        $data = $request->all();

        $data['slug'] = $this->generateSlug($data['name'], $data['name'] != $tag->name, $tag->slug);

        // $category = new Category();
        $tag->update($data);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
      $tag->delete();

      return redirect()->route('admin.tags.index');
    }

    private function generateSlug(string $title, bool $change = true, string $old_slug = '')
    {
      $slug = Str::slug($title, '-'); //salvo lo slug che vorrei generare

      if (!$change) {
        return $slug;
      }

      $slug_base = $slug; //ne salvo una copia in slug_base
      $contatore = 1;

      $tag_with_slug = Tag::where('slug', '=', $slug)->first(); //verifico se esiste già una categoria con questo slug prendendo il primo risultato
      while ($tag_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $tag_with_slug = Tag::where('slug', '=', $slug)->first(); //aggiorna il valore di $tag_with_slug
      }

      return $slug;
    }
}
