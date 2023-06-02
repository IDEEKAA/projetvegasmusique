<?php

namespace App\Http\Controllers;


use App\Http\Requests\PlaylistRequest;
use Illuminate\Http\Request;

use App\Models\{Artiste, Playlist, Musique};



use Auth;
use DB;


class ArtistesController extends Controller
{
    //

    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function index($titremus=null, $nom=null)
     {

 
         $query = $nom ? Artiste::where('nom',$nom)->firstOrFail()->playlists() :Playlist::query();
         $playlists=$query->orderBy('id')->get();
         $artistes=Artiste::all();
 
         return view('artiste/index',compact('artistes'));
     }

     

     protected function creer()
     {

        return view('artiste/add');


     }

     protected function store(Request $request) {
        DB::table('artistes')->insert(
            array(
                   'nom' => $request['nom'],
                   'art_desc' => $request['art_desc']
            )
       );


       return redirect('les_artistes');

     }

     protected function voir($id)
     {
         $artistes = Artiste::where('id', $id)->get();

         return view('artiste/voir', ["artistes"=>$artistes]);


     }


     protected function edit($id)
     {
        $artistes = Artiste::where('id', $id)->get();

        return view('artiste/edit', ["artiste"=>$artistes]);
     }

     
     protected function update(Request $request, $id)
     {
        DB::table('artistes')->where('id',$id)->update(array(
            'nom'=>$request['nom'],
            'art_desc'=>$request['art_desc'],
        ));

         return redirect('les_artistes');
     }




     protected function supprimer($id)
     {
         Artiste::where('id', $id)->delete();
         return redirect('les_artistes');
     }
}
