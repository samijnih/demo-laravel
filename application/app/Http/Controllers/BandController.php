<?php

namespace App\Http\Controllers;

use App\Command\CreateBandCommand;
use App\Command\UpdateBandCommand;
use App\Http\Requests\StoreBand;
use App\Http\Requests\UpdateBand;
use App\Model\Band;
use Illuminate\Http\JsonResponse;

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
        $band = $this->execute(new CreateBandCommand($request->get('name')));

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
     * @param  UpdateBand $request
     * @param  int        $id
     * @return JsonResponse
     */
    public function update(UpdateBand $request, int $id) : JsonResponse
    {
        $band = $this->execute(new UpdateBandCommand($id, $request->get('name')));

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
