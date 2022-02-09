<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Check;
use App\Models\Set;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Box $box
     * @param Set $set
     * @return Response
     */
    public function index(Box $box, Set $set): Response
    {
        return response()->view('set.show', [$box->id, $set->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Box $box
     * @param Set $set
     * @return Response
     */
    public function create(Box $box, Set $set): Response
    {
        return response()->view('checks.create', [
            'box' => $box,
            'set' => $set,
            'typeOptions' => [
                ['text' => 'Commentaar', 'value' => 'comment'],
                ['text' => 'Compleet', 'value' => 'complete'],
                ['text' => 'Incompleet', 'value' => 'incomplete'],
            ],
            'breadcrumbs' => [
                [
                    'title' => 'Alle dozen',
                    'href' => route('boxes.index'),
                ],
                [
                    'title' => $box->name,
                    'href' => route('boxes.show', $box->id),
                ],
                [
                    'title' => $set->name,
                    'href' => route('sets.show', [$box->id, $set->id]),
                ],
                [
                    'title' => 'Nieuwe check toevoegen',
                ]
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Box $box
     * @param Set $set
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Box $box, Set $set, Request $request): RedirectResponse
    {
        $request->validate([
            'type' => 'required|string|in:comment,complete,incomplete',
            'comments' => 'nullable|string|max:1000',
        ]);

        $check = new Check();
        $check->set_id = $set->id;
        $check->fill($request->only($check->getFillable()));
        $check->save();

        return response()->redirectToRoute('sets.show', [$box->id, $set->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Check $check
     * @return Response
     */
    public function show(Check $check): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Check $check
     * @return Response
     */
    public function edit(Check $check): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Check $check
     * @return Response
     */
    public function update(Request $request, Check $check): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Check $check
     * @return Response
     */
    public function destroy(Check $check): Response
    {
        //
    }
}
