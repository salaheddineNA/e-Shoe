<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactMessage extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($contactMessage) {
            if (empty($contactMessage->submission_id)) {
                $contactMessage->submission_id = 'SUB-' . strtoupper(Str::random(8)) . '-' . date('Y');
            }
        });
    }

    protected $fillable = [
        'submission_id',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'newsletter',
        'status',
        'read_at',
        'replied_at',
        'admin_reply',
    ];

    protected $casts = [
        'newsletter' => 'boolean',
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    /**
     * Get the human readable status label.
     */
    public function getStatusLabel(): string
    {
        return match($this->status) {
            'new' => 'Nouveau',
            'read' => 'Lu',
            'replied' => 'Répondu',
            'archived' => 'Archivé',
            default => $this->status,
        };
    }

    /**
     * Get the status color for UI.
     */
    public function getStatusColor(): string
    {
        return match($this->status) {
            'new' => 'bg-blue-100 text-blue-800',
            'read' => 'bg-yellow-100 text-yellow-800',
            'replied' => 'bg-green-100 text-green-800',
            'archived' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get the subject label.
     */
    public function getSubjectLabel(): string
    {
        return match($this->subject) {
            'question' => 'Question sur un produit',
            'order' => 'Suivi de commande',
            'return' => 'Retour ou échange',
            'technical' => 'Problème technique',
            'partnership' => 'Partenariat',
            'other' => 'Autre',
            default => $this->subject,
        };
    }

    /**
     * Mark as read.
     */
    public function markAsRead(): void
    {
        if ($this->status === 'new') {
            $this->status = 'read';
            $this->read_at = now();
            $this->save();
        }
    }

    /**
     * Mark as replied.
     */
    public function markAsReplied(string $reply = null): void
    {
        $this->status = 'replied';
        $this->replied_at = now();
        if ($reply) {
            $this->admin_reply = $reply;
        }
        $this->save();
    }

    /**
     * Mark as archived.
     */
    public function markAsArchived(): void
    {
        $this->status = 'archived';
        $this->save();
    }

    /**
     * Check if message is new.
     */
    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    /**
     * Check if message is read.
     */
    public function isRead(): bool
    {
        return $this->status === 'read';
    }

    /**
     * Check if message is replied.
     */
    public function isReplied(): bool
    {
        return $this->status === 'replied';
    }

    /**
     * Check if message is archived.
     */
    public function isArchived(): bool
    {
        return $this->status === 'archived';
    }
}
