{{-- matieres/create.blade.php --}}
@extends('layouts.app')
@section('title','Créer une matière')
@section('content')
<div class="max-w-md mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📚 Créer une matière</h1>
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('matieres.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la matière *</label>
                <input type="text" name="nomMatiere" value="{{ old('nomMatiere') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-pink-400">
                @error('nomMatiere') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded-lg font-medium transition">Créer</button>
                <a href="{{ route('matieres.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium transition">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
