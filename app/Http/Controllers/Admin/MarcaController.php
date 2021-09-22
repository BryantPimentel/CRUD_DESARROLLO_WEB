<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Marca\BulkDestroyMarca;
use App\Http\Requests\Admin\Marca\DestroyMarca;
use App\Http\Requests\Admin\Marca\IndexMarca;
use App\Http\Requests\Admin\Marca\StoreMarca;
use App\Http\Requests\Admin\Marca\UpdateMarca;
use App\Models\Marca;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MarcaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMarca $request
     * @return array|Factory|View
     */
    public function index(IndexMarca $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Marca::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'marca'],

            // set columns to searchIn
            ['id', 'marca']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.marca.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.marca.create');

        return view('admin.marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMarca $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMarca $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Marca
        $marca = Marca::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/marcas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/marcas');
    }

    /**
     * Display the specified resource.
     *
     * @param Marca $marca
     * @throws AuthorizationException
     * @return void
     */
    public function show(Marca $marca)
    {
        $this->authorize('admin.marca.show', $marca);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Marca $marca
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Marca $marca)
    {
        $this->authorize('admin.marca.edit', $marca);


        return view('admin.marca.edit', [
            'marca' => $marca,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMarca $request
     * @param Marca $marca
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMarca $request, Marca $marca)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Marca
        $marca->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/marcas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMarca $request
     * @param Marca $marca
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMarca $request, Marca $marca)
    {
        $marca->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMarca $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMarca $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Marca::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
