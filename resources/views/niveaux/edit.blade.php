{{-- niveaux/edit.blade.php --}}
@extends('layouts.app')
@section('title','Modifier le niveau')
@section('content')
<div class="max-w-md mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ Modifier le niveau</h1>
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('niveaux.update', $niveau) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom du niveau *</label>
                <input type="text" name="nomNiveau" value="{{ old('nomNiveau', $niveau->nomNiveau) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-400">
                @error('nomNiveau') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg font-medium transition">Mettre à jour</button>
                <a href="{{ route('niveaux.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium transition">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
