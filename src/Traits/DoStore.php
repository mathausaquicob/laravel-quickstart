<?php

namespace Freelabois\LaravelQuickstart\Traits;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;

trait DoStore
{
    /**
     * Store a newly created resource in storage.
     *
     * @param
     * @return Response
     */
    public function store()
    {
        $sanitized = request()->all();
        return new $this->resource($this->iso8859toutf8($this->manager->storeOrUpdate($sanitized)));
    }
}
