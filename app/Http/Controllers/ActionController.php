<?php

namespace App\Http\Controllers;

use App\Action;
use App\Http\Requests\ActionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $actions = Action::all();
    //     return view('welcome', compact('actions'));
    // }

    // public function index()
    // {
    //     // $actions = Action::all();
    //     $actions = Action::where('enable', 1)
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(2);
    //     return view('welcome', compact('actions'));
    // }
    public function index()
    {
        $actions = Action::where('enable', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(2);
        return view('index', compact('actions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $uid = Auth::user()->id;
            return view('create', compact('uid'));
        } else {
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionRequest $request)
    {
        $action = Action::create($request->all());
        return redirect()->route('action.show', $action->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->updateCounter($id);
        $action          = Action::find($id);
        $action->content = nl2br($action->content);
        return view('show', compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $uid    = Auth::user()->id;
        $action = Action::find($id);
        return view('edit', compact('action', 'uid'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActionRequest $request, $id)
    {
        $action = Action::find($id);
        $action->update($request->all());
        return redirect()->route('action.show', $id);
    }

    public function updateCounter($id)
    {
        $action = Action::find($id);
        $action->counter += 1;
        $action->timestamps = false;
        $action->update(['counter' => $action->counter]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Action::destroy($id);
        return redirect()->route('action.index');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth', [
    //         'only' => ['create', 'store', 'edit', 'update', 'destroy'],
    //     ]);
    // }

}
