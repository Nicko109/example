<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Services\Post\Service;

class StoreController extends Controller
{

    public $service;

    /**
     * @param $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();


        $this->service->store($data);


        return redirect()->route('admin.post.index');
    }
}
