<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Feedback::get();

        return inertia('Feedback/Index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $r
     * @param \App\Models\Feedback $f
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r, Feedback $f)
    {
        $d = $f->create($r->validate([
            'name' => 'required|max:80|alpha_dash',
            'email' => 'nullable|email',
            'message' => 'required|max:125'
        ]));

        if ($d->save()) {
            return redirect()->back()->with('success', 'Umpan balik berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $f
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $f, $id)
    {
        $data = $f->findOrFail($id);

        if ($data->delete()) {
            return redirect()->back()->with('success', 'Umpan balik telah terhapus!');
        } else {
            return redirect()->back()->withErrors('error', 'Tidak dapat menghapus umpan balik');
        }
    }
}
