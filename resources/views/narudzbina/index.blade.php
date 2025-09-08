@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Narudžbine</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 bg-white shadow rounded-lg table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border w-1/12 text-left">ID</th>
                    <th class="px-4 py-2 border w-3/12 text-left">Datum</th>
                    <th class="px-4 py-2 border w-4/12 text-right">Ukupna cena</th>
                    <th class="px-4 py-2 border w-4/12 text-left">Način plaćanja</th>
                </tr>
            </thead>
            <tbody>
                @forelse($narudzbinas as $n)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $n->narudzbina_id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $n->created_at->format('d.m.Y H:i') }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-right">{{ number_format($n->ukupna_cena, 2) }} din</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $n->nacin_placanja }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">Nema narudžbina</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        <div style="text-align:center; margin-top:30px;">
            <button onclick="history.back()" style="
                padding: 10px 25px;
                background:#4a90e2;
                color:white;
                border:none;
                border-radius:6px;
                font-size:16px;
                cursor:pointer;
                transition: background 0.3s;
            " onmouseover="this.style.background='#357ab8'" onmouseout="this.style.background='#4a90e2'">
                Nazad
            </button>
        </div>

</div>
@endsection
