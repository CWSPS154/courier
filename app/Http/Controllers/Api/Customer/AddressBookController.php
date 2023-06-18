<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AddressBookResource;
use App\Models\AddressBook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return AddressBookResource::collection(
            AddressBook::with(['user:name,id', 'area:id,area'])
                ->where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
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
     * @param AddressBook $addressBook
     * @return AddressBookResource|JsonResponse
     */
    public function show(AddressBook $addressBook): JsonResponse|AddressBookResource
    {
        if ($addressBook->user_id != Auth::id())
        {
            return response()->json(['message' => "Unauthorized address book"], 403);
        }
        return new AddressBookResource($addressBook->load(['user:name,id', 'area:id,area']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AddressBook $addressBook
     * @return Response
     */
    public function update(Request $request, AddressBook $addressBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AddressBook $addressBook
     * @return Response
     */
    public function destroy(AddressBook $addressBook)
    {
        //
    }
}
