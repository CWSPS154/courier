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

use App\DataTables\Admin\AreaDataTable;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|JsonResponse
     */
    public function index(AreaDataTable $dataTable)
    {
        return $dataTable->render('template.admin.area.index_area');
    }

    /**
     * @return JsonResponse|void
     */
    public function getAreas()
    {
        if (\request()->ajax()) {
            $search = request()->search;
            $id = request()->id;
            $areas = Area::select('id', 'area')->when(
                $search,
                function ($query) use ($search) {
                    $query->where('area', 'like', '%'.$search.'%');
                }
            )->when($id, function ($query) use ($id) {
                $query->where('id', $id);
            })->limit(15)->get();
            $response = [];
            foreach ($areas as $area) {
                $response[] = [
                    'id' => $area->id,
                    'text' => $area->area,
                ];
            }

            return response()->json($response);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validator($request->all())->validate();
        $request->has('status') ? $status = true : $status = false;
        Area::create([
            'area' => $request->area,
            'zone_id' => $request->zone_id,
            'status' => $status,
        ]);

        return redirect()->route('area.index')->with('success', 'Area details are saved successfully');
    }

    /**
     * Validator for validate data in the request.
     *
     * @param  array  $data The data
     * @param  int|null  $id The identifier for update validation
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     **/
    protected function validator(array $data, int|string $id = null)
    {
        \Validator::extend(
            'without_spaces',
            function ($attr, $value) {
                return preg_match('/^\S*$/u', $value);
            }
        );

        return Validator::make(
            $data,
            [
                'area' => ['required', 'string', 'max:250'],
                'zone_id' => ['required', 'int'],

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('template.admin.area.create_area');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(Area $area)
    {
        return view('template.admin.area.edit_area', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, Area $area): RedirectResponse
    {
        $this->validator($request->all(), $area->id)->validate();
        $request->has('status') ? $status = true : $status = false;
        $area->area = $request->area;
        $area->zone_id = $request->zone_id;
        $area->status = $status;
        $area->save();
        if ($area->wasChanged()) {
            return redirect()->route('area.index')->with('success', 'Area details updated successfully');
        }

        return back()->with('info', 'No changes have made.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area): RedirectResponse
    {
        try {
            if ($area->fromJobs->count() == 0 && $area->toJobs->count() == 0) {
                $area->delete();
            } else {
                $area->forceDelete();
            }

            return back()->with('success', 'Area deleted successfully');
        } catch (QueryException $e) {
            return back()->with(
                'error',
                'You Can not delete this area due to data integrity violation, Error:'.$e->getMessage()
            );
        }
    }
}
