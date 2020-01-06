<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;
use Notify;
use Laranotify;

class CatalogController extends Controller
{
   
    public function getIndex(){
        $peliculas=Movie::all();
        return view('catalog.index', array( 'peliculas' => $peliculas));
    }

    public function getShow($id){
        $pelicula=Movie::findOrFail($id);
        return view('catalog.show',array( 'pelicula' => $pelicula));

    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        $pelicula=Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula'=>$pelicula));
    }

    public function postCreate(Request $data){
        Movie::create([
            'title' => $data['title'],
            'year' => $data['year'],
            'director' => $data['director'],
            'poster' => $data['poster'],
            'synopsis' => $data['synopsis'],
            'rented' => false
            ]);
            Notify::success("La película se ha guardado correctamente");
            return redirect('/catalog');
    }
    public function putEdit(Request $request, $id){
        $movie=Movie::findOrFail($id);
            $movie->title = $request->input('title');
            $movie->year = $request->input('year');
            $movie->director = $request->input('director');
            $movie->poster = $request->input('poster');
            $movie->synopsis = $request->input('synopsis');
            $movie->save();
            Notify::success("La película se ha modificado correctamente");
            return redirect()->to('/catalog/show/'.$id);
       
    }

    public function putRent($id){
            $movie=Movie::findOrFail($id);
            $movie->update(['rented' => TRUE]);
            notify()->success('Pelicula Rentada')->delay(1500);
            return redirect()->action('CatalogController@getShow', [$id]);
    }

    public function putReturn($id)
    {
            $movie=Movie::findOrFail($id);
            $movie->update(['rented' => FALSE]);
            notify()->warning('Pelicula Devuelta')->delay(1500);
            return redirect()->action('CatalogController@getShow', [$id]);
    }
    
    public function deleteMovie($id)
    {
            $movie=Movie::findOrFail($id);
            $movie->delete();
            notify()->error('Pelicula Borrada')->delay(1500);
            return redirect('catalog');
    }
}