{{-- admins/create.blade.php --}}
@extends('layouts.app')
@section('title','Créer un admin')
@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">🔑 Créer un admin</h1>
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admins.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Utilisateur à promouvoir *</label>
                <select name="idUtilisateur" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500">
                    <option value="">-- Sélectionner un utilisateur --</option>
                    @foreach($utilisateurs as $u)
                        <option value="{{ $u->idUtilisateur }}">{{ $u->prenom }} {{ $u->nom }} ({{ $u->email }})</option>
                    @endforeach
                </select>
                @error('idUtilisateur') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg font-medium transition">Créer</button>
                <a href="{{ route('admins.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium transition">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
