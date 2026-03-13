@extends('layouts.app')
@section('title', 'Documents')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">📄 Documents</h1>
    <a href="{{ route('documents.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
        + Ajouter un document
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Titre</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Utilisateur</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Matière</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Niveau</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Date</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($documents as $doc)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-medium text-gray-900">{{ $doc->titre }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $doc->utilisateur?->prenom }} {{ $doc->utilisateur?->nom }}</td>
                <td class="px-4 py-3"><span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs">{{ $doc->matiere?->nomMatiere }}</span></td>
                <td class="px-4 py-3"><span class="bg-purple-100 text-purple-700 px-2 py-0.5 rounded text-xs">{{ $doc->niveau?->nomNiveau }}</span></td>
                <td class="px-4 py-3 text-gray-500">{{ $doc->dateUpload?->format('d/m/Y') }}</td>
                <td class="px-4 py-3 text-center space-x-2">
                    <a href="{{ route('documents.telecharger', $doc) }}" class="text-green-600 hover:underline">⬇</a>
                    <a href="{{ route('documents.show', $doc) }}"    class="text-blue-600 hover:underline">👁</a>
                    <a href="{{ route('documents.edit', $doc) }}"    class="text-yellow-600 hover:underline">✏️</a>
                    <form action="{{ route('documents.destroy', $doc) }}" method="POST" class="inline"
                          onsubmit="return confirm('Supprimer ce document ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">Aucun document trouvé.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-gray-100">{{ $documents->links() }}</div>
</div>
@endsection
