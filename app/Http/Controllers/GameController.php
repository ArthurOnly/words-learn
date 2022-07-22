<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Stichoza\GoogleTranslate\GoogleTranslate;

class GameController extends Controller
{

    public function __construct()
    {
        $tr = new GoogleTranslate();
        $tr->setSource('en'); 
        $tr->setTarget('pt_BR'); 

        $this->translator = $tr;
    }

    public function show()
    {
        $randomWord = $this->getRandomWord();
        $translated = $this->translator->translate($randomWord);

        return Inertia::render('game', [
            'word' => $randomWord,
            'translated' => $translated
        ]);
    }

    public function post(Request $request)
    {
        $answer = $request->input('answer', '');
        $word = $request->input('word', '');
        $translated = $request->input('translated', '');

        $success = $answer === $translated;

        if ($success) {
            $word = $this->getRandomWord();
            $translated = $this->translator->translate($word);
        }

        return Inertia::render('game', [
            'success' => $success,
            'word' => $word,
            'translated' => $translated,
            'answer' => $success ? '' : $answer
        ]);
    }

    private function getRandomWord()
    {
        $file = Storage::get('words.txt');
        $words = explode("\n", $file);

        return $words[array_rand($words)];
    }
}
