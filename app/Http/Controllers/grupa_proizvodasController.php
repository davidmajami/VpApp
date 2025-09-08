<?php

namespace App\Http\Controllers;

use App\Http\Requests\grupa_proizvodaStoreRequest;
use App\Http\Requests\grupa_proizvodaUpdateRequest;
use App\Models\GrupaProizvoda;
use App\Models\grupa_proizvoda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class grupa_proizvodasController extends Controller
{
    public function index(Request $request): Response
    {
        $grupaProizvodas = GrupaProizvoda::all();

        return view('grupaProizvoda.index', [
            'grupaProizvodas' => $grupaProizvodas,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('grupaProizvoda.create');
    }

    public function store(grupa_proizvodaStoreRequest $request): Response
    {
        $grupaProizvoda = GrupaProizvoda::create($request->validated());

        $request->session()->flash('grupaProizvoda.id', $grupaProizvoda->id);

        return redirect()->route('grupaProizvodas.index');
    }

    public function show(Request $request, grupa_proizvoda $grupaProizvoda): Response
    {
        return view('grupaProizvoda.show', [
            'grupaProizvoda' => $grupaProizvoda,
        ]);
    }

    public function edit(Request $request, grupa_proizvoda $grupaProizvoda): Response
    {
        return view('grupaProizvoda.edit', [
            'grupaProizvoda' => $grupaProizvoda,
        ]);
    }

    public function update(grupa_proizvodaUpdateRequest $request, grupa_proizvoda $grupaProizvoda): Response
    {
        $grupaProizvoda->update($request->validated());

        $request->session()->flash('grupaProizvoda.id', $grupaProizvoda->id);

        return redirect()->route('grupaProizvodas.index');
    }

    public function destroy(Request $request, grupa_proizvoda $grupaProizvoda): Response
    {
        $grupaProizvoda->delete();

        return redirect()->route('grupaProizvodas.index');
    }
}
