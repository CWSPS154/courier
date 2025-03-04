<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Controller
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 28/08/22
 * */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeFrame;
use Illuminate\Http\JsonResponse;
use function request;

class TimeFrameController extends Controller
{
    /**
     * @return JsonResponse|void
     */
    public function getTimeframe()
    {
        if (request()->ajax()) {
            $search = request()->search;
            $id = request()->id;
            $areas = Timeframe::select('id', 'time_frame')->when(
                $search,
                function ($query) use ($search) {
                    $query->where('time_frame', 'like', '%'.$search.'%');
                }
            )->when($id, function ($query) use ($id) {
                $query->where('id', $id);
            })->limit(15)->get();
            $response = [];
            foreach ($areas as $area) {
                $response[] = [
                    'id' => $area->id,
                    'text' => $area->time_frame,
                ];
            }

            return response()->json($response);
        }
    }
}
