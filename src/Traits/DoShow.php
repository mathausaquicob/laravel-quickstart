<?php

namespace Freelabois\LaravelQuickstart\Traits;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;

trait DoShow
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        $with = request()->get('with') ?? [];
        dd($this->iso8859toutf8($this->repository->find($id, $with)));
        return $this->iso8859toutf8($this->repository->find($id, $with));
    }
}
