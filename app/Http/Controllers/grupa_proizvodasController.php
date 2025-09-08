<?php

namespace App\Http\Controllers;

use App\Http\Requests\grupa_proizvodaStoreRequest;
use App\Http\Requests\grupa_proizvodaUpdateRequest;
use App\Models\GrupaProizvoda;
use App\Models\Proizvod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class grupa_proizvodasController extends Controller
{
    public function index(Request $request): View
    {
        $grupa_proizvodas = GrupaProizvoda::all(); 

        return view('grupaProizvoda.index', compact('grupa_proizvodas'));
    }

    public function create(Request $request): View
    {
        return view('grupe_proizvoda.create');
    }

    public function store(grupa_proizvodaStoreRequest $request): RedirectResponse
    {
        $grupaProizvoda = GrupaProizvoda::create($request->validated());

        session()->flash('success', 'Grupa proizvoda uspešno kreirana!');

        return redirect()->route('grupaProizvodas.index');
    }

    public function show(Request $request, GrupaProizvoda $grupaProizvoda): View
    {
        return view('grupe_proizvoda.show', compact('grupaProizvoda'));
    }

    public function edit(Request $request, GrupaProizvoda $grupaProizvoda): View
    {
        return view('grupe_proizvoda.edit', compact('grupaProizvoda'));
    }

    public function update(grupa_proizvodaUpdateRequest $request, GrupaProizvoda $grupaProizvoda): RedirectResponse
    {
        $grupaProizvoda->update($request->validated());

        session()->flash('success', 'Grupa proizvoda uspešno izmenjena!');

        return redirect()->route('grupaProizvodas.index');
    }

    public function destroy(Request $request, GrupaProizvoda $grupaProizvoda): RedirectResponse
    {
        $grupaProizvoda->delete();

        session()->flash('success', 'Grupa proizvoda obrisana!');

        return redirect()->route('grupaProizvodas.index');
    }
}
