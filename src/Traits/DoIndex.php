<?php

namespace Freelabois\LaravelQuickstart\Traits;

use Illuminate\Http\Response;

trait DoIndex {
    /**
     * Display a listing of the resource.
     *
     * @param
     * @return Response
     */
    public function index() {
        $perPage = request()->get('perPage') ?? 45;
        $with = request()->get('with') ?? [];
        $sanitized = request()->except(['perPage', 'with']);

        $method = is_null(request()->get('perPage')) ? 'findMany' : 'list';

        return $this->resource::collection($this->iso8859toutf8($this->repository->{$method}($sanitized, $with, $perPage)));
    }
}
