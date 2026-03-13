<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Utilisateur;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::with('utilisateur')->withCount('messages')->paginate(10);
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        // Seuls les utilisateurs sans profil admin sont proposés
        $utilisateurs = Utilisateur::doesntHave('admin')->get();
        return view('admins.create', compact('utilisateurs'));
    }

    public function store(StoreAdminRequest $request)
    {
        Admin::create($request->validated());
        return redirect()->route('admins.index')
                         ->with('success', 'Admin créé avec succès.');
    }

    public function show(Admin $admin)
    {
        $admin->load(['utilisateur', 'messages.utilisateur']);
        return view('admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        $utilisateurs = Utilisateur::all();
        return view('admins.edit', compact('admin', 'utilisateurs'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->validated());
        return redirect()->route('admins.index')
                         ->with('success', 'Admin mis à jour.');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')
                         ->with('success', 'Admin supprimé.');
    }
}
