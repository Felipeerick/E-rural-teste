<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'meetingName', 'url', 'status', 'user_id','password'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getMeetings($search)
    {
        $meetings = $this->where(function ($query) use ($search){
            if($search){
                $query->where('meetingName', 'LIKE', "%{$search}%");
            }
        })->orderBy('created_at','desc')->paginate(3);

        return view('meetings.index', compact('meetings'));
    }

    public function validateIdAndReturnView(string $view, $route, $model, $id)
    {
        if(!$data = $model->find($id))
            return redirect()->route($route);

        return view ($view, compact('data'));
    }

    public function validateMeeting($id, $request, $model ,$routeTrue, $routeFalse)
    {
        $data = $model->find($id);

        if($data['password'] == $request)
        {
            return redirect()->route($routeTrue, $id);
        }else
        {
            return redirect()->route($routeFalse, $id)->with('error', 'senha inválida');
        }
    }
}
