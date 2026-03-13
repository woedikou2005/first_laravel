{{-- utilisateurs/show.blade.php --}}
@extends('layouts.app')
@section('title', $utilisateur->prenom.' '.$utilisateur->nom)
@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">👤 {{ $utilisateur->prenom }} {{ $utilisateur->nom }}</h1>
    <div class="grid grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow p-5 text-sm space-y-3">
            <p><span class="text-gray-500">Email :</span> <span class="font-medium">{{ $utilisateur->email }}</span></p>
            <p><span class="text-gray-500">Membre depuis :</span> <span class="font-medium">{{ $utilisateur->created_at->format('d/m/Y') }}</span></p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <h2 class="font-semibold text-gray-700 mb-3">📄 Documents ({{ $utilisateur->documents->count() }})</h2>
            @forelse($utilisateur->documents as $doc)
                <p class="text-sm text-blue-600 hover:underline"><a href="{{ route('documents.show', $doc) }}">{{ $doc->titre }}</a></p>
            @empty <p class="text-sm text-gray-400">Aucun document.</p> @endforelse
        </div>
    </div>
    <div class="mt-4"><a href="{{ route('utilisateurs.index') }}" class="text-blue-600 hover:underline text-sm">← Retour</a></div>
</div>
@endsection
