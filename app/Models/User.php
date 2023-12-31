<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers(string|null $search = '')
    {
        $users = $this->where(function($query) use ($search){
            if($search)
            {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->with('comments')
        ->paginate(4);

        return $users;
    }

    public function storeUsers(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $this->create($data);
    }

    public function updateUsers(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = $this->find($id))
        {
            return false;
        }
        $data = $request->only('name', 'email');
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
            $user->update($data);
            return true;
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
