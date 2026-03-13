{{-- niveaux/index.blade.php --}}
@extends('layouts.app')
@section('title','Niveaux')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">🎓 Niveaux</h1>
    <a href="{{ route('niveaux.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">+ Ajouter</a>
</div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Nom du niveau</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Documents</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($niveaux as $n)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-medium">{{ $n->nomNiveau }}</td>
                <td class="px-4 py-3 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded text-xs">{{ $n->documents_count }}</span></td>
                <td class="px-4 py-3 text-center space-x-2">
                    <a href="{{ route('niveaux.edit', $n) }}" class="text-yellow-600 hover:underline">✏️</a>
                    <form action="{{ route('niveaux.destroy', $n) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="px-4 py-8 text-center text-gray-400">Aucun niveau.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t">{{ $niveaux->links() }}</div>
</div>
@endsection
