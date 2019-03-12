<?php

namespace JethroMay\ChuckNorrisJokes\Http\Controllers;

class ChuckNorrisController
{
    public function __invoke()
    {
        return 'joke';
    }
}