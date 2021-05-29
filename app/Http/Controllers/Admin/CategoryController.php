<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();

      return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.categories.create');
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

        $category = new Category();
        $category->create($data);

        return redirect()->route('admin.categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $request->validate([
        'name' => 'required|string|max:255',
      ]);
        $data = $request->all();

        $data['slug'] = $this->generateSlug($data['name'], $data['name'] != $category->name, $category->slug);

        // $category = new Category();
        $category->update($data);

        return redirect()->route('admin.categories.index');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      $category->delete();

      return redirect()->route('admin.categories.index');
    }

    private function generateSlug(string $title, bool $change = true, string $old_slug = '')
    {
      $slug = Str::slug($title, '-'); //salvo lo slug che vorrei generare

      if (!$change) {
        return $slug;
      }

      $slug_base = $slug; //ne salvo una copia in slug_base
      $contatore = 1;

      $category_with_slug = Category::where('slug', '=', $slug)->first(); //verifico se esiste già una categoria con questo slug prendendo il primo risultato
      while ($category_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $category_with_slug = Category::where('slug', '=', $slug)->first(); //aggiorna il valore di $category_with_slug
      }

      return $slug;
    }
}
