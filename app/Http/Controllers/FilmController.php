<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array {
        $films = Storage::json('/public/films.json');
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public static function readJson(){
        if (!Storage::exists('films.json')) {
            return [];
        }
    
        $content = Storage::get('films.json');
        return json_decode($content, true) ?? [];
    }
    public function listOldFilms($year = null)
    {        
        $old_films = [];
        if (is_null($year))
        $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = FilmController::readFilms();

        foreach ($films as $film) {
        //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function filmsByYear ($year = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year)) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    public function filmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)){
                    $title = "Listado de todas las pelis filtrado x categoria";
                    $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function sortFilms($year = null)
    {
        $films_filtered = [];
        $title = "Listado de todas las pelis por año";
    
        $films = FilmController::readFilms();
    
        usort($films, function ($a, $b) {
            return $b['year'] <=> $a['year'];
        });
    
        if (is_null($year)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }
    
        foreach ($films as $film) {
            if ($film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
    
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    public function countFilms(){
        $title = "Contador de todas las pelis";
        $films = FilmController::readFilms();

        $count = count($films);

        return view("films.count", ["contador" => $count, "title" => $title]);
    }

    /* CREATE FILM AND IS FILM */

    public function isFilm($name){
        $films = FilmController::readFilms();
        foreach($films as $film){
            if($film["name"] == $name){
                return true;
            }
        }
        return false;
    }

    public function createFilm(Request $request){
        $title = "Creaccion de pelicula";
        $films = FilmController::readFilms();
        $filmName = $request->input('name');
        $year = $request->input('year');
        $genre = $request->input('genre');
        $contry = $request->input('country');
        $duration = $request->input('duration');
        $imageURL = $request->input('image_url');

        if (($this->isFilm($filmName))) {
            return redirect('/')->withErrors(['error' => 'El nombre de la película ya existe.']);
        }

        $film = [
            'name' => $filmName,
            'year' => $year,
            'genre' => $genre,
            'country' => $contry,
            'duration' => $duration,
            'img_url' => $imageURL
        ];
        array_push($films,$film);
        
        Storage::put('/public/films.json', json_encode($films,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        return view('films.list', ['films' => $films, 'title' => $title]);
    }
}
