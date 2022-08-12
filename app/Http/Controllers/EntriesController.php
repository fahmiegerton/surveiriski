<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;

class EntriesController extends Controller
{
    protected function survei()
    {
        return Survey::where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->first();
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

    public function store(Request $r)
    {
        $survey = $this->survei();
        $jawaban = $r->validate($survey->rules);

        (new Entry())->for($survey)->fromArray($jawaban)->push();
    }
}
