<?php

namespace App\Http\Controllers;

use App\Models\Narudzbina;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class narudzbinasController extends Controller
{
    public function index(Request $request): View
    {
        $narudzbinas = Narudzbina::all();

        return view('narudzbina.index', [
            'narudzbinas' => $narudzbinas,
        ]);
    }

    public function create(Request $request): View
    {
        return view('narudzbina.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
        'nacin_placanja' => 'required|string',
        'stavke' => 'required|string', // JSON
        'ukupna_cena' => 'required|numeric',
            ]);

            $validated['datum_narudzbine'] = now();
            $validated['kupac_id'] = Auth::id() ?? 2; 
            $validated['zaposleni_id'] = 1; 
            Narudzbina::create($validated);

            session()->flash('success', 'Narudžbina uspešno kreirana!');
            return redirect()->route('narudzbinas.index');
    }

    public function show(Request $request, Narudzbina $narudzbina): View
    {
        return view('narudzbina.show', [
            'narudzbina' => $narudzbina,
        ]);
    }

    public function edit(Request $request, Narudzbina $narudzbina): View
    {
        return view('narudzbina.edit', [
            'narudzbina' => $narudzbina,
        ]);
    }

    public function update(Request $request, Narudzbina $narudzbina): RedirectResponse
    {
        $validated = $request->validate([
            'nacin_placanja' => 'required|string',
            'stavke' => 'required|string',
            'ukupna_cena' => 'required|numeric',
        ]);

        $narudzbina->update($validated);

        session()->flash('success', 'Narudžbina uspešno izmenjena!');

        return redirect()->route('narudzbinas.index');
    }

    public function destroy(Request $request, Narudzbina $narudzbina): RedirectResponse
    {
        $narudzbina->delete();

        session()->flash('success', 'Narudžbina uspešno obrisana!');

        return redirect()->route('narudzbinas.index');
    }
}
