<?php

namespace App\Http\Controllers;

use App\Events\CommentEvent;
use App\Events\PostCreatedEvent;
use App\Models\Application;
use App\Models\User;
use App\Services\ApplicationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{


    public function __construct(protected ApplicationService $service)
    {
        
    }
    public function index()
    {
        $posts = Application::leftJoin('users', 'users.id', 'applications.user_id')
        ->select("applications.*", 'users.name')
        ->orderBy('applications.created_at', 'desc')
        ->get();
        // $posts = DB::select("SELECT 
        // applications.*, users.name FROM applications 
        // LEFT JOIN users ON users.id = applications.user_id 
        // ORDER BY applications.created_at DESC");

        $usersPost = User::leftJoin('applications', 'applications.user_id', 'users.id')
            ->select('users.*', DB::raw("count(users.id) as soni"))
            ->groupBy('users.id')
            ->orderBy('soni', 'desc')
            ->first()->toArray();         

        // $users2 = DB::select("SELECT
        // u.*, COUNT(u.id) AS soni
        // FROM users AS u
        // LEFT JOIN applications AS a ON a.user_id = u.id
        // GROUP BY u.id
        // ORDER BY soni DESC LIMIT 1")[0];

        // dd($users, $users2);
        $top  = $this->topComment();
        return view('blog.all', ['posts' => $posts]);
    }


    public function all()
    {
        $applications = $this->service->all();
        // dd($application);
        return view('blog.allapp',['applications'=>$applications]);
    }

    
    public function topComment(){
        // $start = Carbon::now()->startOfMonth()->format("Y-m-d");
        // $end = Carbon::now()->endOfMonth()->format("Y-m-d");
        // $usersPost = User::leftJoin('comments', 'comments.user_id', 'users.id')
        //     ->select('users.*', DB::raw("count(users.id) as comsoni"))
        //     ->whereDate('comments.created_at', date("Y-m-d"))
        //     ->groupBy('users.id')
        //     ->orderBy('comsoni', 'desc')
        //     ->first()->toArray();

        // dd($usersPost);

        


    }

    public function topUsers()
    {
        $users = User::leftJoin('applications', 'applications.user_id', 'users.id')
            ->select('users.*', 'applications.message')
            ->get();
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        try {
            if($request->hasFile('file_img')){
                $image = $request->file('file_img');
                $path = public_path('/images');
                $original_name = $image->getClientOriginalName().$image->getClientOriginalExtension();
                $image->move($path, $original_name);
            }
            $app = Application::create([
                'user_id' => auth()->id(),
                'subject' => $request->subject,
                'message' => $request->message,
                'file_img' => $original_name
            ]);
            
            // event(new PostCreatedEvent());

            event(new CommentEvent($app));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return redirect('/');
    }

    public function show($id)
    {
        $post = Application::find($id);
        // $user = $post->user;
        // $arr  = collect([]);
        // $arr = array_push($arr, 9);
        // $arr->push(9)->map();
        // dd($post->toArray());
        return view('blog.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Application::find($id);

        return view('blog.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        $post = Application::find($id);
        $this->authorize('update', $post);
        $post->update($data);
        return redirect('/applications');
    }

    public function delete($id)
    {
        try {
            $post = Application::find($id);
            $this->authorize('delete', $post);
            $post->delete();
            return redirect('/applications');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }



    
}
