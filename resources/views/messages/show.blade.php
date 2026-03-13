{{-- messages/show.blade.php --}}
@extends('layouts.app')
@section('title','Message')
@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✉️ Message</h1>
    <div class="bg-white rounded-xl shadow p-6 text-sm space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div><span class="text-gray-500">De :</span> <span class="font-medium">{{ $message->utilisateur?->prenom }} {{ $message->utilisateur?->nom }}</span></div>
            <div><span class="text-gray-500">Admin :</span> <span class="font-medium">{{ $message->admin?->utilisateur?->prenom }} {{ $message->admin?->utilisateur?->nom }}</span></div>
            <div><span class="text-gray-500">Date :</span> {{ $message->dateEnvoi?->format('d/m/Y H:i') }}</div>
            <div><span class="text-gray-500">Statut :</span>
                @php $colors = ['envoye'=>'bg-blue-100 text-blue-700','lu'=>'bg-green-100 text-green-700','repondu'=>'bg-gray-100 text-gray-700']; @endphp
                <span class="px-2 py-0.5 rounded text-xs {{ $colors[$message->statut] ?? '' }}">{{ $message->statut }}</span>
            </div>
        </div>
        <div class="bg-gray-50 rounded-lg p-4 text-gray-800 leading-relaxed">{{ $message->contenu }}</div>
    </div>
    <div class="mt-4 flex gap-4">
        <a href="{{ route('messages.edit', $message) }}" class="text-yellow-600 hover:underline text-sm">✏️ Modifier</a>
        <a href="{{ route('messages.index') }}" class="text-blue-600 hover:underline text-sm">← Retour</a>
    </div>
</div>
@endsection
