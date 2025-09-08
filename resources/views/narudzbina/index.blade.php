@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Narudžbine</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 bg-white shadow rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Datum</th>
                    <th class="px-4 py-2 border">Ukupna cena</th>
                    <th class="px-4 py-2 border">Način plaćanja</th>
                    <th class="px-4 py-2 border">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($narudzbinas as $narudzbina)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center">{{ $narudzbina->id }}</td>
                        <td class="px-4 py-2 border text-center">{{ $narudzbina->created_at->format('d.m.Y H:i') }}</td>
                        <td class="px-4 py-2 border text-right">{{ number_format($narudzbina->ukupna_cena, 2) }} din</td>
                        <td class="px-4 py-2 border text-center">{{ $narudzbina->nacin_placanja }}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('narudzbinas.show', $narudzbina) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                Detalji
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 border text-center text-gray-500">
                            Nema evidentiranih narudžbina.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
