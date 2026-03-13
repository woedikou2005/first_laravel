{{-- admins/index.blade.php --}}
@extends('layouts.app')
@section('title','Admins')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">🔑 Admins</h1>
    <a href="{{ route('admins.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">+ Ajouter</a>
</div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Utilisateur associé</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Email</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Messages traités</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($admins as $admin)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-medium">{{ $admin->utilisateur?->prenom }} {{ $admin->utilisateur?->nom }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $admin->utilisateur?->email }}</td>
                <td class="px-4 py-3 text-center"><span class="bg-purple-100 text-purple-700 px-2 py-0.5 rounded text-xs">{{ $admin->messages_count }}</span></td>
                <td class="px-4 py-3 text-center space-x-2">
                    <a href="{{ route('admins.show', $admin) }}" class="text-blue-600 hover:underline">👁</a>
                    <a href="{{ route('admins.edit', $admin) }}" class="text-yellow-600 hover:underline">✏️</a>
                    <form action="{{ route('admins.destroy', $admin) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cet admin ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-4 py-8 text-center text-gray-400">Aucun admin.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t">{{ $admins->links() }}</div>
</div>
@endsection
