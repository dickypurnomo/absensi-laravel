<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user_name = auth()->user()->name;

        $absensiIn = Absensi::where('name', $user_name)->get('in')->last()->in ?? '-';
        $absensiOut = Absensi::where('name', $user_name)->get('out')->last()->out ?? '-';

        return view('dashboard.absensi.index', [
            "title" => "Dashboard | Absensi In",
            'active' => 'dashboard',
            'absensis' => Absensi::where('name', $user_name)->latest()->first(),
            "absensi_in" => $absensiIn,
            "absensi_out" => $absensiOut,
            'users' => User::where('id', $user_id)->get(),
            'divisions' => Division::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'divisions_id' => 'required',
            'status' => 'required',
            'date' => 'required',
            'in' => 'required',
            'out' => 'nullable',
        ]);

        $absensi = Absensi::create($validatedData);

        return redirect('/dashboard/' . $absensi->id . '/edit')->with('success', 'Thank you for taking attendance today!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        $user_id = auth()->user()->id;
        $user_name = auth()->user()->name;

        $absensiIn = Absensi::where('name', $user_name)->get('in')->last()->in ?? '-';
        $absensiOut = Absensi::where('name', $user_name)->get('out')->last()->out ?? '-';

        return view('dashboard.absensi.edit', [
            "title" => "Dashboard | Absensi Out",
            'users' => User::where('id', $user_id)->get(),
            'divisions' => Division::all(),
            'absensi' => $absensi,
            "absensi_in" => $absensiIn,
            "absensi_out" => $absensiOut,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        $rules = [
            'name' => 'required',
            'divisions_id' => 'required',
            'status' => 'required',
            'date' => 'required',
            'in',
            'out' => 'required',
        ];

        $validatedData = $request->validate($rules);
        Absensi::where('id', $absensi->id)->update($validatedData);

        return redirect('/dashboard/absensi')->with('success', 'Thank you for taking attendance today!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
