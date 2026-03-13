{{-- messages/edit.blade.php --}}
@extends('layouts.app')
@section('title','Modifier le message')
@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ Modifier le message</h1>
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('messages.update', $message) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Utilisateur *</label>
                <select name="idUtilisateur" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @foreach($utilisateurs as $u)
                        <option value="{{ $u->idUtilisateur }}" {{ $message->idUtilisateur == $u->idUtilisateur ? 'selected' : '' }}>{{ $u->prenom }} {{ $u->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin *</label>
                <select name="idAdmin" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @foreach($admins as $a)
                        <option value="{{ $a->idAdmin }}" {{ $message->idAdmin == $a->idAdmin ? 'selected' : '' }}>{{ $a->utilisateur?->prenom }} {{ $a->utilisateur?->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contenu *</label>
                <textarea name="contenu" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('contenu', $message->contenu) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                <select name="statut" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @foreach(['envoye','lu','repondu'] as $s)
                        <option value="{{ $s }}" {{ $message->statut === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium transition">Mettre à jour</button>
                <a href="{{ route('messages.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium transition">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
