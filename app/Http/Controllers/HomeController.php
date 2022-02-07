<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * @return Response
     */
    public function home(): Response
    {
        return response()->view('home', [
            'breadcrumbs' => [
                [
                    'title' => 'Alle dozen'
                ]
            ]
        ]);
    }
}
