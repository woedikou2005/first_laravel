@extends('layouts.app')
@section('title','Détail admin')
@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">🔑 Admin : {{ $admin->utilisateur?->prenom }} {{ $admin->utilisateur?->nom }}</h1>
    <div class="bg-white rounded-xl shadow p-5 text-sm mb-6">
        <p><span class="text-gray-500">Email :</span> {{ $admin->utilisateur?->email }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="font-semibold text-gray-700 mb-3">✉️ Messages traités ({{ $admin->messages->count() }})</h2>
        @forelse($admin->messages as $msg)
            <div class="border-b py-2 text-sm">
                <span class="text-gray-500 text-xs">{{ $msg->dateEnvoi?->format('d/m/Y') }}</span>
                <span class="ml-2">{{ Str::limit($msg->contenu, 80) }}</span>
                <span class="ml-2 text-xs px-1.5 py-0.5 rounded {{ $msg->statut === 'lu' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">{{ $msg->statut }}</span>
            </div>
        @empty <p class="text-sm text-gray-400">Aucun message.</p> @endforelse
    </div>
    <div class="mt-4"><a href="{{ route('admins.index') }}" class="text-blue-600 hover:underline text-sm">← Retour</a></div>
</div>
@endsection
