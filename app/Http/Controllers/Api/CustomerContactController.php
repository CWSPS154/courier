<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CustomerContactResource;
use App\Models\CustomerContact;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CustomerContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $search = \request()->get('search');
        return CustomerContactResource::collection(CustomerContact::when(
            $search,
            function ($query) use ($search) {
                $query->where('customer_contact', 'like', '%' . $search . '%');
            }
        )->where('user_id', Auth::id())->paginate());
    }
}
