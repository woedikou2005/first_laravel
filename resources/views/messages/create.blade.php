{{-- messages/create.blade.php --}}
@extends('layouts.app')
@section('title','Nouveau message')
@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✉️ Nouveau message</h1>
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('messages.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Utilisateur *</label>
                <select name="idUtilisateur" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400">
                    <option value="">-- Sélectionner --</option>
                    @foreach($utilisateurs as $u)
                        <option value="{{ $u->idUtilisateur }}">{{ $u->prenom }} {{ $u->nom }}</option>
                    @endforeach
                </select>
                @error('idUtilisateur') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin destinataire *</label>
                <select name="idAdmin" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400">
                    <option value="">-- Sélectionner --</option>
                    @foreach($admins as $a)
                        <option value="{{ $a->idAdmin }}">{{ $a->utilisateur?->prenom }} {{ $a->utilisateur?->nom }}</option>
                    @endforeach
                </select>
                @error('idAdmin') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contenu *</label>
                <textarea name="contenu" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400">{{ old('contenu') }}</textarea>
                @error('contenu') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium transition">Envoyer</button>
                <a href="{{ route('messages.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium transition">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
