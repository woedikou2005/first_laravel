<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Utilisateur;
use App\Models\Admin;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['utilisateur', 'admin.utilisateur'])
                           ->latest('dateEnvoi')
                           ->paginate(10);
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        $utilisateurs = Utilisateur::all();
        $admins       = Admin::with('utilisateur')->get();
        return view('messages.create', compact('utilisateurs', 'admins'));
    }

    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();
        $data['dateEnvoi'] = now();
        Message::create($data);
        return redirect()->route('messages.index')
                         ->with('success', 'Message envoyé.');
    }

    public function show(Message $message)
    {
        // Marquer comme lu automatiquement
        if ($message->statut === 'envoye') {
            $message->lireMessage();
        }
        $message->load(['utilisateur', 'admin.utilisateur']);
        return view('messages.show', compact('message'));
    }

    public function edit(Message $message)
    {
        $utilisateurs = Utilisateur::all();
        $admins       = Admin::with('utilisateur')->get();
        return view('messages.edit', compact('message', 'utilisateurs', 'admins'));
    }

    public function update(UpdateMessageRequest $request, Message $message)
    {
        $message->update($request->validated());
        return redirect()->route('messages.index')
                         ->with('success', 'Message mis à jour.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')
                         ->with('success', 'Message supprimé.');
    }
}
