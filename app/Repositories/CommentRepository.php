<?php

namespace App\Repositories;


use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{


    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        if (auth()->check()) {

            $data['user_id'] = auth()->user()->id;
            $comment = Comment::create($data);

            return  $comment;
        }
    }
}
