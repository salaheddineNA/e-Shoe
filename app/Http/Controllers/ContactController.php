<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use PDF;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|in:question,order,return,technical,partnership,other',
            'message' => 'required|string|max:2000',
            'newsletter' => 'nullable|boolean',
        ]);

        $validated['newsletter'] = $request->has('newsletter');

        $contactMessage = ContactMessage::create($validated);

        return redirect()->route('contact.index')
            ->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.')
            ->with('submission_id', $contactMessage->submission_id);
    }

    /**
     * Display all contact messages for admin.
     */
    public function messages()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.contact-messages', compact('messages'));
    }

    /**
     * Show a specific contact message.
     */
    public function showMessage(ContactMessage $message)
    {
        // Mark as read if it's new
        if ($message->isNew()) {
            $message->markAsRead();
        }

        return view('admin.contact-message-show', compact('message'));
    }

    /**
     * Reply to a contact message.
     */
    public function reply(Request $request, ContactMessage $message)
    {
        $validated = $request->validate([
            'reply' => 'required|string|max:2000',
        ]);

        $message->markAsReplied($validated['reply']);

        return redirect()->route('admin.contact-messages.show', $message)
            ->with('success', 'Réponse envoyée avec succès.');
    }

    /**
     * Update message status.
     */
    public function updateStatus(Request $request, ContactMessage $message)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
        ]);

        $message->update(['status' => $validated['status']]);

        return redirect()->route('admin.contact-messages')
            ->with('success', 'Statut du message mis à jour avec succès.');
    }

    /**
     * Delete a contact message.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.contact-messages')
            ->with('success', 'Message supprimé avec succès.');
    }

    /**
     * Download submission proof card.
     */
    public function downloadProof($submissionId)
    {
        $message = ContactMessage::where('submission_id', $submissionId)->firstOrFail();
        
        // Generate PDF from view
        $pdf = PDF::loadView('contact.submission-proof', compact('message'));
        
        // Download the PDF with a descriptive filename
        return $pdf->download('preuve-soumission-' . $submissionId . '.pdf');
    }
}
