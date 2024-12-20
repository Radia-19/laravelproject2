<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskManagerController extends Controller
{
    use ValidatesRequests;
    public function create(): View|Factory|Application
    {
        return view('user.createTask');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required|min:5',
           'details'=> 'required',
        ]);
    DB::transaction(function () {
        Task::create([
            'name' => request('name'),
            'details' => request('details')
        ]);
    });
        return to_route('home')->with('success', 'Task added successfully');
        //return redirect()->route('home');
        //return redirect('url');
        //return redirect()->back();
    }

    /**
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $allTasks = Task::paginate(5);//SELECT *FROM tasks
        //$allTasks = Task::where('status','pending')->get();
        //$allTasks = Task::where('status','pending')->first(); //single object
        return view('home', compact('allTasks'));
    }

    public function show($id): View|Factory|Application
    {
        $task = Task::find($id);//single object
        return view('user.updateTask',compact('task'));
    }
    public function update(Request $request,$id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
        ]);
         //$this->validate(request());
        //$task = Task::find($id);//single object
        //$task->update([
            //'name' => request('name'),
            //'details' => request('details')
        //]);

        Task::find($id)->update([
            'name' => request('name'),
            'details' => request('details')
        ]);

        return to_route('home')->with('success', 'Task updated successfully');
    }
    public function updateStatus($id,$status): RedirectResponse
    {
        Task::find($id)->update([
                'status' => $status
        ]);
        return to_route('home')->with('success', 'Task status updated');
    }
    public function delete($id): RedirectResponse
    {
        Task::find($id)->delete();
        return to_route('home')->with('success', 'Task deleted successfully');
    }
}
