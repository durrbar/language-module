<?php

namespace Modules\Language\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Core\Exceptions\DurrbarException;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Language\Http\Requests\LanguageRequest;
use Modules\Language\Models\Language;
use Modules\Language\Repositories\LanguageRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class LanguageController extends CoreController
{
    public $repository;

    public function __construct(LanguageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection|Language[]
     */
    public function index(Request $request)
    {
        return $this->repository->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     *
     * @throws ValidatorException
     */
    public function store(LanguageRequest $request)
    {
        try {
            return $this->repository->create($request->validated());
        } catch (DurrbarException $e) {
            throw new DurrbarException(COULD_NOT_CREATE_THE_RESOURCE);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return JsonResponse
     */
    public function show(Request $request, $params)
    {
        try {
            return $this->repository->where('id', $params)->firstOrFail();
        } catch (DurrbarException $e) {
            throw new DurrbarException(NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(LanguageRequest $request, $id)
    {
        try {
            return $this->repository->findOrFail($id)->update($request->validated());
        } catch (DurrbarException $e) {
            throw new DurrbarException(COULD_NOT_UPDATE_THE_RESOURCE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            return $this->repository->findOrFail($id)->delete();
        } catch (DurrbarException $e) {
            throw new DurrbarException(NOT_FOUND);
        }
    }
}
