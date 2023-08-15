<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Services\Post\Service;

class UpdateController extends Controller
{

    public $service;

    /**
     * @param $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($post, $data);



        return redirect()->route('admin.post.show', $post->id);
    }
}
