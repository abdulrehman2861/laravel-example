<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{




    /**
     * allUsers
     *
     * @return LengthAwarePaginator
     */
    public function allUsers($search = null, $perpage = 10): LengthAwarePaginator
    {
        return User::where('name', 'LIKE', "%{$search}%")
                    ->latest()
                    ->paginate($perpage);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        $user = User::create($data);

        return  $user;
    }


    /**
     * findUser
     *
     * @param  mixed $id
     * @return Model
     */
    public function findUser($id): Model
    {
        return User::findorFail($id);
    }

    /**
     * update
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return model
     */
    public function update($data, $id): model
    {
        $user = User::findorFail($id);
        if ($data['password'] == null) {
            $data['password'] = $user->password;
        }
        $user->update($data);

        return  $user;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
    }
}


