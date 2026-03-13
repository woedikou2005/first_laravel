{{-- messages/index.blade.php --}}
@extends('layouts.app')
@section('title','Messages')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">✉️ Messages</h1>
    <a href="{{ route('messages.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">+ Nouveau message</a>
</div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">De</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Admin</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Message</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Date</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Statut</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($messages as $msg)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-medium">{{ $msg->utilisateur?->prenom }} {{ $msg->utilisateur?->nom }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $msg->admin?->utilisateur?->prenom }}</td>
                <td class="px-4 py-3 text-gray-700">{{ Str::limit($msg->contenu, 60) }}</td>
                <td class="px-4 py-3 text-gray-500 text-xs">{{ $msg->dateEnvoi?->format('d/m/Y H:i') }}</td>
                <td class="px-4 py-3 text-center">
                    @php $colors = ['envoye'=>'bg-blue-100 text-blue-700','lu'=>'bg-green-100 text-green-700','repondu'=>'bg-gray-100 text-gray-700']; @endphp
                    <span class="px-2 py-0.5 rounded text-xs {{ $colors[$msg->statut] ?? '' }}">{{ $msg->statut }}</span>
                </td>
                <td class="px-4 py-3 text-center space-x-2">
                    <a href="{{ route('messages.show', $msg) }}" class="text-blue-600 hover:underline">👁</a>
                    <a href="{{ route('messages.edit', $msg) }}" class="text-yellow-600 hover:underline">✏️</a>
                    <form action="{{ route('messages.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">Aucun message.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t">{{ $messages->links() }}</div>
</div>
@endsection
