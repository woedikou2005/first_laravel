@extends('layouts.app')
@section('title', 'Ajouter un document')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📄 Ajouter un document</h1>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Titre *</label>
                <input type="text" name="titre" value="{{ old('titre') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('titre') border-red-400 @enderror">
                @error('titre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Utilisateur *</label>
                <select name="idUtilisateur" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Sélectionner --</option>
                    @foreach($utilisateurs as $u)
                        <option value="{{ $u->idUtilisateur }}" {{ old('idUtilisateur') == $u->idUtilisateur ? 'selected' : '' }}>
                            {{ $u->prenom }} {{ $u->nom }}
                        </option>
                    @endforeach
                </select>
                @error('idUtilisateur') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Matière *</label>
                    <select name="idMatiere" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Matière --</option>
                        @foreach($matieres as $m)
                            <option value="{{ $m->idMatiere }}" {{ old('idMatiere') == $m->idMatiere ? 'selected' : '' }}>
                                {{ $m->nomMatiere }}
                            </option>
                        @endforeach
                    </select>
                    @error('idMatiere') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Niveau *</label>
                    <select name="idNiveau" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Niveau --</option>
                        @foreach($niveaux as $n)
                            <option value="{{ $n->idNiveau }}" {{ old('idNiveau') == $n->idNiveau ? 'selected' : '' }}>
                                {{ $n->nomNiveau }}
                            </option>
                        @endforeach
                    </select>
                    @error('idNiveau') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fichier * (PDF, DOC, PPT — max 20 Mo)</label>
                <input type="file" name="fichier" accept=".pdf,.doc,.docx,.ppt,.pptx"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:bg-blue-50 file:text-blue-700">
                @error('fichier') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition">
                    Enregistrer
                </button>
                <a href="{{ route('documents.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
