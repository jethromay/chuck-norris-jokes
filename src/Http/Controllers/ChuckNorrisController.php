<?php

namespace JethroMay\ChuckNorrisJokes\Http\Controllers;

use JethroMay\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        return view('chuck-norris::joke', [
           'joke' =>  ChuckNorris::getRandomJoke()
        ]);
    }
}