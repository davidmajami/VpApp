<?php

namespace App\Http\Controllers;

use App\Http\Requests\narudzbinaStoreRequest;
use App\Http\Requests\narudzbinaUpdateRequest;
use App\Models\Narudzbina;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    public function store(narudzbinaStoreRequest $request): RedirectResponse
    {
        $narudzbina = Narudzbina::create($request->validated());

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

    public function update(narudzbinaUpdateRequest $request, Narudzbina $narudzbina): RedirectResponse
    {
        $narudzbina->update($request->validated());

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
