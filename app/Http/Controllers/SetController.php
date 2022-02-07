<?php

namespace App\Http\Controllers;

use App\Helpers\RebrickableService;
use App\Models\Box;
use App\Models\set;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Box $box
     * @return Response
     */
    public function index(Box $box): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Box $box
     * @return Response
     */
    public function create(Box $box): Response
    {
        return response()->view('sets.create', [
            'box' => $box,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Box $box
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Box $box, Request $request): RedirectResponse
    {
        $request->validate([
            'identifier' => 'required|string|min:4',
            'name' => 'nullable|string|max:255',
        ]);

        $set = new Set();
        $set->fill($request->only($set->getFillable()));
        $set->box_id = $box->id;

        try {
            $setData = RebrickableService::getSet($request->input('identifier'));

            if (!$setData instanceof Exception) {
                $set->fill([
                    'image_url' => $setData->set_img_url,
                    'parts' => $setData->num_parts,
                    'year' => $setData->year,
                    'theme_id' => $setData->theme_id,
                ]);

                if (!$request->filled('name')) {
                    $set->name = $setData->name;
                }
            } else {
                throw $setData;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        $set->save();

        return response()->redirectToRoute('sets.show', [$box->id, $set->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Box $box
     * @param Set $set
     * @return Response
     */
    public function show(Box $box, Set $set): Response
    {
        return response()->view('sets.show', [
            'set' => $set,
            'breadcrumbs' => [
                [
                    'title' => 'Alle dozen',
                    'href' => route('boxes.index'),
                ],
                [
                    'title' => $set->box->name,
                    'href' => route('boxes.show', $set->box->id),
                ],
                [
                    'title' => $set->name,
                ]
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Set $set
     * @return Response
     */
    public function edit(Set $set): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Set $set
     * @return Response
     */
    public function update(Request $request, Set $set): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Set $set
     * @return Response
     */
    public function destroy(Set $set): Response
    {
        //
    }
}
