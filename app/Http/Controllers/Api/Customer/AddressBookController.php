<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AddressBookResource;
use App\Models\AddressBook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AddressBookController extends Controller
{
    public function __construct(
        protected \App\Http\Controllers\Customer\AddressBookController $webAddressBookController
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): AnonymousResourceCollection
    {
        $search = \request()->get('search');
        $addressBook = AddressBook::with(['user:name,id', 'area:id,area'])
            ->where('user_id', Auth::id())
            ->whereStatus(true)
            ->when(
                $search,
                function ($query) use ($search) {
                    $query->where('company_name', 'like', '%' . $search . '%');
                }
            )
            ->orderBy('created_at', 'desc')
            ->paginate();
        return AddressBookResource::collection($addressBook);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AddressBookResource|array|JsonResponse|RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse|array|RedirectResponse|AddressBookResource
    {
        $response = $this->webAddressBookController->store($request);
        return $this->response($response);
    }

    /**
     * Display the specified resource.
     *
     * @param AddressBook $addressBook
     * @return AddressBookResource|JsonResponse
     */
    public function show(AddressBook $addressBook): JsonResponse|AddressBookResource
    {
        if ($addressBook->user_id != Auth::id() || !$addressBook->status) {
            return response()->json(['message' => "Unauthorized record"], 403);
        }
        return new AddressBookResource($addressBook->load(['user:name,id', 'area:id,area']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $addressBook
     * @return AddressBookResource|JsonResponse|RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $addressBook): JsonResponse|RedirectResponse|AddressBookResource
    {
        $response = $this->webAddressBookController->update($request, $addressBook);
        return $this->response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AddressBook $addressBook
     * @return array|JsonResponse|RedirectResponse
     */
    public function destroy(AddressBook $addressBook): JsonResponse|array|RedirectResponse
    {
        $response = $this->webAddressBookController->destroy($addressBook);
        return $this->response($response);
    }

    /**
     * @param array|RedirectResponse $response
     * @return array|JsonResponse|RedirectResponse
     */
    protected function response(array|RedirectResponse $response): RedirectResponse|array|JsonResponse
    {
        if (isset($response['success']) && $response['success']) {
            if (isset($response['data']) && $response['data']) {
                return response()->json([
                    'message' => $response['message'],
                    'data' => new AddressBookResource($response['data'])
                ]);
            } else {
                return response()->json(['message' => $response['message']]);
            }
        } else if (isset($response['success'])) {
            return response()->json(['message' => $response['message']], 422);
        }
        return $response;
    }
}
