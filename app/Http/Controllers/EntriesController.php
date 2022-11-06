<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Section;
use MattDaneshvar\Survey\Models\Survey;

class EntriesController extends Controller
{
    protected function survei()
    {
        return Survey::where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->first();
    }

    protected function getReport()
    {
        return Survey::with('entries.answers.question')->where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah');
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
        return Inertia::render('Dashboard', ['data' => $this->getReport()->first(), 'text' => 'tembus dong']);
    }

    public function store(Request $r)
    {
        $survey = $this->survei();
        $jawaban = $r->validate($survey->rules);

        (new Entry())->for($survey)->fromArray($jawaban)->push();

        return redirect()->back()->with('success', 'Terima kasih telah berpartisipasi!');
    }

    public function destroy(Request $r, $id)
    {
        $data = Entry::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Sudah terhapus');
    }

    public function generateReport(Request $r, $id = null)
    {
        $entry = Entry::with('answers.question.section')->findOrFail($id);
        $answers = collect($entry->answers->toArray());

        $peranTIKValue = ['Minim' => 1, 'Rendah' => 2, 'Sedang' => 3, 'Tinggi' => 4, 'Kritis' => 5];
        $secondValue = ['Tidak dilakukan' => 1, 'Dalam perencanaan' => 2, 'Dalam penerapan atau diterapkan sebagian' => 3, 'diterapkan secara menyeluruh' => 4];

        $summary = collect([
            'peran_tik' => $answers->filter(fn ($c) => $c['question']['section_id'] === 2)->map(fn ($c) => $peranTIKValue[$c['value']])->sum(),
            'tata_kelola' => $answers->filter(fn ($c) => $c['question']['section_id'] === 3)->map(fn ($c) => $secondValue[$c['value']])->sum(),
            'pengelola_resiko' => $answers->filter(fn ($c) => $c['question']['section_id'] === 4)->map(fn ($c) => $secondValue[$c['value']])->sum(),
            'kerangka_kerja' => $answers->filter(fn ($c) => $c['question']['section_id'] === 5)->map(fn ($c) => $secondValue[$c['value']])->sum(),
            'pengelola_aset' => $answers->filter(fn ($c) => $c['question']['section_id'] === 6)->map(fn ($c) => $secondValue[$c['value']])->sum(),
            'tki' => $answers->filter(fn ($c) => $c['question']['section_id'] === 7)->map(fn ($c) => $secondValue[$c['value']])->sum()
        ]);

        $data = [
            'data' => $entry,
            'summary' => $summary,
            'data_chart' => $summary->flatten()
        ];

        return view('laporan', $data);
    }

    public function gettesst()
    {
        // dump((new Survey)->entries()->get());
        // dump(Survey::with('entries.answers.question')->where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->first()->toArray());
        dump($this->getReport());
        // dump(Survey::where('name', 'Survei Indeks Keamanan Sistem Informasi Universitas Wahidiyah')->entries()->first());
    }
}
