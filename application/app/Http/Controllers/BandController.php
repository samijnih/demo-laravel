<?php

namespace App\Http\Controllers;

use App\Model\Band;
use App\Http\Requests\StoreBand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $bands = Band::all();

        return new JsonResponse([
            'total' => count($bands),
            'data' => $bands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBand $request
     * @return JsonResponse
     */
    public function store(StoreBand $request) : JsonResponse
    {
        $band = new Band();

        $band->name = $request->name;
        $band->save();

        return new JsonResponse($band, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Band $band
     * @return JsonResponse
     */
    public function show(Band $band) : JsonResponse
    {
        return new JsonResponse($band);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request    $request
     * @param  Band       $band
     * @return JsonResponse
     */
    public function update(Request $request, Band $band) : JsonResponse
    {
        $band->name = $request->name;
        $band->save();

        return new JsonResponse($band, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Band  $band
     * @return JsonResponse
     */
    public function destroy(Band $band) : JsonResponse
    {
        $band->delete();

        return new JsonResponse(null, 204);
    }
}
