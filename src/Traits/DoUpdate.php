<?php

namespace Freelabois\LaravelQuickstart\Traits;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;

trait DoUpdate
{
    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(int $id)
    {
        $sanitized = request()->all();
        return new $this->resource($this->iso8859toutf8($this->manager->storeOrUpdate($sanitized, $id)));
    }
}
