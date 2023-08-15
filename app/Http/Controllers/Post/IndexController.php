<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filter\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{

    public function __invoke(FilterRequest $request)
    {

//        $this->authorize('view', auth()->user());

        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(10);

        //Более простой фильтр
//        $query = Post::query();
//
//        if (isset($data['title'])) {
//            $query->where('title', 'like', "%{$data['title']}%");
//        }
//
//        if (isset($data['content'])) {
//            $query->where('content', 'like', "%{$data['content']}%");
//        }
//
//        if (isset($data['category_id'])) {
//            $query->where('category_id', 'like', "%{$data['category_id']}%");
//        }
//
//
//
//        $posts = $query->paginate(10);

        return view('post.index', compact('posts'));
    }
}
