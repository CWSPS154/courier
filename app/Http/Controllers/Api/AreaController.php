<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AreaResource;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection|Response
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): Response|AnonymousResourceCollection
    {
        $search = \request()->get('search');
        $area = Area::when(
            $search,
            function ($query) use ($search) {
                $query->where('area', 'like', '%' . $search . '%');
            }
        )->whereStatus(true)->paginate();
        return AreaResource::collection($area);
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
     * @param $area
     * @return AreaResource
     */
    public function show($area): AreaResource
    {
        return new AreaResource(Area::whereStatus(true)->findOrFail($area));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Area $area
     * @return Response
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Area $area
     * @return Response
     */
    public function destroy(Area $area)
    {
        //
    }
}
