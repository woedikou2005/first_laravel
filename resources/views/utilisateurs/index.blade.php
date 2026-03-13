{{-- resources/views/utilisateurs/index.blade.php --}}
@extends('layouts.app')
@section('title','Utilisateurs')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">👤 Utilisateurs</h1>
    <a href="{{ route('utilisateurs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">+ Ajouter</a>
</div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Nom</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Email</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Documents</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Messages</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($utilisateurs as $u)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-medium">{{ $u->prenom }} {{ $u->nom }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $u->email }}</td>
                <td class="px-4 py-3 text-center"><span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs">{{ $u->documents_count }}</span></td>
                <td class="px-4 py-3 text-center"><span class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded text-xs">{{ $u->messages_count }}</span></td>
                <td class="px-4 py-3 text-center space-x-2">
                    <a href="{{ route('utilisateurs.show', $u) }}" class="text-blue-600 hover:underline">👁</a>
                    <a href="{{ route('utilisateurs.edit', $u) }}" class="text-yellow-600 hover:underline">✏️</a>
                    <form action="{{ route('utilisateurs.destroy', $u) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-4 py-8 text-center text-gray-400">Aucun utilisateur.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t">{{ $utilisateurs->links() }}</div>
</div>
@endsection
