<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $query = Box::query();

        $boxes = $query->paginate();

        return response()->view('boxes.index', [
            'boxes' => $boxes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Box $box
     * @return Response
     */
    public function show(Box $box): Response
    {
        return response()->view('boxes.show', [
            'box' => $box,
            'breadcrumbs' => [
                [
                    'title' => 'Alle dozen',
                    'href' => '/'
                ], [
                    'title' => $box->name
                ]
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Box $box
     * @return Response
     */
    public function edit(Box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Box $box
     * @return Response
     */
    public function update(Request $request, Box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Box $box
     * @return Response
     */
    public function destroy(Box $box)
    {
        //
    }
}
