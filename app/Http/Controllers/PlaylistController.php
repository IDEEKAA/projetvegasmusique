<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaylistRequest;
use Illuminate\Http\Request;

use App\Models\{Artiste, Playlist, Musique};


class PlaylistController extends Controller
{

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
        //si le nom de la musique est renseigné, on récupère tous les playlists avec cette musique, sinon on récupère tous les playlists
        $query = $titremus ? Musique::where('titremus',$titremus)->firstOrFail()->playlists() :Playlist::query();
        $playlists=$query->orderBy('id')->get();
        $musiques=Musique::all();


        $query = $nom ? Artiste::where('nom',$nom)->firstOrFail()->playlists() :Playlist::query();
        $playlists=$query->orderBy('id')->get();
        $artiste=Artiste::all();

        return view('playlist/index',compact('playlists','musiques','titremus','artiste'));
    }

    public function index2($nom=null)
    {
        //si le nom de la musique est renseigné, on récupère tous les playlists avec cette musique, sinon on
        // récupèrè toute les playlists
        $query = $nom ? Artiste::where('nom',$nom)->firstOrFail()->playlists() :Playlist::query();
        $playlists=$query->orderBy('id')->get();
        $artiste=Artiste::all();
        return view('playlist/index',compact('playlists','artiste','nom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musiques=Musique::all();
        return view('playlist/create', compact('musiques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request, Playlist $playlist)
    {
        $playlist = Playlist::create($request->all());
        $playlist->musiques()->attach($request->perss);
        return redirect()->route('playlist.index')->with('info', 'Playlist ' . $playlist->titreplay . ' créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist, Artiste $artiste)
    {
        return view('playlist/show', compact('playlist','artiste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        $musiques = Musique::all();
        return view('playlist/edit', compact('playlist', 'musiques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaylistRequest $request, Playlist $playlist)
    {
        $playlist->update($request->all());
        $playlist->musiques()->sync($request->perss);
        return redirect()->route('playlist.index')->with('info', 'La playlist a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return redirect()->route('playlist.index')->with('info', 'La playlist a bien été suprimé');
    }
}
