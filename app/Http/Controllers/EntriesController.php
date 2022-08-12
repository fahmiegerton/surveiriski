<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;

class EntriesController extends Controller
{
    protected function survei()
    {
        return Survey::where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->first();
    }

    protected function getReport()
    {
        return Survey::with('entries.answers.question')->where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return inertia('Feedback/Index', ['data' => $this->survei()]);
        return view('survei.survei', ['data' => $this->survei()]);
    }

    public function dash()
    {
        // return inertia('Dashboard', ['data' => $this->survei()]);
        return Inertia::render('Dashboard', ['data' => $this->getReport(), 'text' => 'tembus dong']);
    }

    public function store(Request $r)
    {
        $survey = $this->survei();
        $jawaban = $r->validate($survey->rules);

        (new Entry())->for($survey)->fromArray($jawaban)->push();

        return redirect()->back()->with('success', 'Terima kasih telah berpartisipasi!');
    }

    public function gettesst()
    {
        // dump((new Survey)->entries()->get());
        // dump(Survey::with('entries.answers.question')->where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->first()->toArray());
        dump($this->getReport());
        // dump(Survey::where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->entries()->first());
    }
}
