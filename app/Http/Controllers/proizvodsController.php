<?php

namespace App\Http\Controllers;

use App\Http\Requests\proizvodStoreRequest;
use App\Http\Requests\proizvodUpdateRequest;
use App\Models\Proizvod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProizvodsController extends Controller
{
    public function index(Request $request): View
    {
        $proizvods = Proizvod::all();

        return view('proizvod.index', [
            'proizvods' => $proizvods,
        ]);
    }

    public function create(Request $request): View
    {
        return view('proizvod.create');
    }

    public function store(proizvodStoreRequest $request): RedirectResponse
    {
        $proizvod = Proizvod::create($request->validated());

        session()->flash('proizvod.id', $proizvod->id);

        return redirect()->route('proizvods.index');
    }

    public function show(Request $request, Proizvod $proizvod): View
    {
        return view('proizvod.show', [
            'proizvod' => $proizvod,
        ]);
    }

    public function edit(Request $request, Proizvod $proizvod): View
    {
        return view('proizvod.edit', [
            'proizvod' => $proizvod,
        ]);
    }
    public function poGrupi($id)
    {
        
        $proizvodi = \App\Models\Proizvod::where('grupa_id', $id)->get();

        return view('proizvods.index', compact('proizvodi'));
    }


    public function update(proizvodUpdateRequest $request, Proizvod $proizvod): RedirectResponse
    {
        $proizvod->update($request->validated());

        session()->flash('proizvod.id', $proizvod->id);


        return redirect()->route('proizvods.index');
    }

    public function destroy(Request $request, Proizvod $proizvod): RedirectResponse
    {
        $proizvod->delete();

        return redirect()->route('proizvods.index');
    }
}
