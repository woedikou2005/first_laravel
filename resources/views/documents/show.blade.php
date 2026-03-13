@extends('layouts.app')
@section('title', $document->titre)
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📄 {{ $document->titre }}</h1>
        <div class="space-x-2">
            <a href="{{ route('documents.telecharger', $document) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition">⬇ Télécharger</a>
            <a href="{{ route('documents.edit', $document) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm transition">✏️ Modifier</a>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6 space-y-4 text-sm">
        <div class="grid grid-cols-2 gap-4">
            <div><span class="text-gray-500">Utilisateur</span><p class="font-medium">{{ $document->utilisateur?->prenom }} {{ $document->utilisateur?->nom }}</p></div>
            <div><span class="text-gray-500">Date d'upload</span><p class="font-medium">{{ $document->dateUpload?->format('d/m/Y H:i') }}</p></div>
            <div><span class="text-gray-500">Matière</span><p><span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs">{{ $document->matiere?->nomMatiere }}</span></p></div>
            <div><span class="text-gray-500">Niveau</span><p><span class="bg-purple-100 text-purple-700 px-2 py-0.5 rounded text-xs">{{ $document->niveau?->nomNiveau }}</span></p></div>
        </div>
        @if($document->description)
        <div><span class="text-gray-500">Description</span><p class="mt-1 text-gray-700">{{ $document->description }}</p></div>
        @endif
    </div>
    <div class="mt-4"><a href="{{ route('documents.index') }}" class="text-blue-600 hover:underline text-sm">← Retour à la liste</a></div>
</div>
@endsection
