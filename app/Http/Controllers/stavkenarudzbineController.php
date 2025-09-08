<?php

namespace App\Http\Controllers;

use App\Http\Requests\stavkenarudzbineStoreRequest;
use App\Http\Requests\stavkenarudzbineUpdateRequest;
use App\Models\Stavkenarudzbine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StavkenarudzbineController extends Controller
{
    public function index(Request $request): View
    {
        $stavkenarudzbines = Stavkenarudzbine::all();

        return view('stavkenarudzbine.index', [
            'stavkenarudzbines' => $stavkenarudzbines,
        ]);
    }

    public function create(Request $request): View
    {
        return view('stavkenarudzbine.create');
    }

    public function store(stavkenarudzbineStoreRequest $request): RedirectResponse
    {
        $stavkenarudzbine = Stavkenarudzbine::create($request->validated());

        session()->flash('stavkenarudzbine.id', $stavkenarudzbine->id);

        return redirect()->route('stavkenarudzbines.index');
    }

    public function show(Request $request, Stavkenarudzbine $stavkenarudzbine): View
    {
        return view('stavkenarudzbine.show', [
            'stavkenarudzbine' => $stavkenarudzbine,
        ]);
    }

    public function edit(Request $request, Stavkenarudzbine $stavkenarudzbine): View
    {
        return view('stavkenarudzbine.edit', [
            'stavkenarudzbine' => $stavkenarudzbine,
        ]);
    }

    public function update(stavkenarudzbineUpdateRequest $request, Stavkenarudzbine $stavkenarudzbine): RedirectResponse
    {
        $stavkenarudzbine->update($request->validated());

        session()->flash('stavkenarudzbine.id', $stavkenarudzbine->id);

        return redirect()->route('stavkenarudzbines.index');
    }

    public function destroy(Request $request, Stavkenarudzbine $stavkenarudzbine): RedirectResponse
    {
        $stavkenarudzbine->delete();

        session()->flash('success', 'Stavka uspešno obrisana!');

        return redirect()->route('stavkenarudzbines.index');
    }
}
