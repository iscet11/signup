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
        Action::create($request->all());
        return redirect()->route('action.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
