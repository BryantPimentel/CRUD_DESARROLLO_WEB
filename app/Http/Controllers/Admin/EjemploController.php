<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ejemplo\BulkDestroyEjemplo;
use App\Http\Requests\Admin\Ejemplo\DestroyEjemplo;
use App\Http\Requests\Admin\Ejemplo\IndexEjemplo;
use App\Http\Requests\Admin\Ejemplo\StoreEjemplo;
use App\Http\Requests\Admin\Ejemplo\UpdateEjemplo;
use App\Models\Ejemplo;
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

class EjemploController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEjemplo $request
     * @return array|Factory|View
     */
    public function index(IndexEjemplo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ejemplo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'published_at', 'enabled'],

            // set columns to searchIn
            ['id', 'title', 'slug', 'perex']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ejemplo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ejemplo.create');

        return view('admin.ejemplo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEjemplo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEjemplo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Ejemplo
        $ejemplo = Ejemplo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ejemplos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ejemplos');
    }

    /**
     * Display the specified resource.
     *
     * @param Ejemplo $ejemplo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ejemplo $ejemplo)
    {
        $this->authorize('admin.ejemplo.show', $ejemplo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ejemplo $ejemplo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ejemplo $ejemplo)
    {
        $this->authorize('admin.ejemplo.edit', $ejemplo);


        return view('admin.ejemplo.edit', [
            'ejemplo' => $ejemplo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEjemplo $request
     * @param Ejemplo $ejemplo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEjemplo $request, Ejemplo $ejemplo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Ejemplo
        $ejemplo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ejemplos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'object' => $ejemplo
            ];
        }

        return redirect('admin/ejemplos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEjemplo $request
     * @param Ejemplo $ejemplo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEjemplo $request, Ejemplo $ejemplo)
    {
        $ejemplo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEjemplo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEjemplo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Ejemplo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
