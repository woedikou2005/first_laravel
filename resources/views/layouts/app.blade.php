<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion Documentaire')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50:'#eff6ff', 100:'#dbeafe', 500:'#3b82f6', 600:'#2563eb', 700:'#1d4ed8' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">
-
<!-- Navbar -->
<nav class="bg-blue-700 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ route('documents.index') }}" class="text-xl font-bold tracking-wide">
            📂 SchoolVi
        </a>
        <div class="flex gap-4 text-sm font-medium">
            <a href="{{ route('utilisateurs.index') }}" class="hover:bg-blue-600 px-3 py-1 rounded transition">👤 Utilisateurs</a>
            <a href="{{ route('admins.index') }}"       class="hover:bg-blue-600 px-3 py-1 rounded transition">🔑 Admins</a>
            <a href="{{ route('documents.index') }}"    class="hover:bg-blue-600 px-3 py-1 rounded transition">📄 Documents</a>
            <a href="{{ route('messages.index') }}"     class="hover:bg-blue-600 px-3 py-1 rounded transition">✉️ Messages</a>
            <a href="{{ route('matieres.index') }}"     class="hover:bg-blue-600 px-3 py-1 rounded transition">📚 Matières</a>
            <a href="{{ route('niveaux.index') }}"      class="hover:bg-blue-600 px-3 py-1 rounded transition">🎓 Niveaux</a>
        </div>
    </div>
</nav>

<!-- Flash messages -->
<div class="max-w-7xl mx-auto px-4 mt-4">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded flex justify-between items-center">
            <span>✅ {{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-green-600 font-bold">✕</button>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded flex justify-between items-center">
            <span>❌ {{ session('error') }}</span>
            <button onclick="this.parentElement.remove()" class="text-red-600 font-bold">✕</button>
        </div>
    @endif
</div>

<!-- Content -->
<main class="max-w-7xl mx-auto px-4 py-6">
    @yield('content')
</main>

</body>
</html>
