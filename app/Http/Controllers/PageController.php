<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', ['user' => session('user')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session()->flush();

        $data = $request->validate(
            [
                'name' => 'required|max:15',
                'last-name' => 'required|alpha',
                'email' => 'nullable|email:rfc,dns'
            ]
        );

        $request->session()->put('user', [
            'name' => $data['name'],
            'last-name' => $data['last-name'],
            'email' => $data['email']
        ]);

        return redirect()->route('user.show');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('user', ['user' => session('user')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        session()->flush();
        return redirect()->route('index');
    }
}
