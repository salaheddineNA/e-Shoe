@extends('layouts.admin')

@section('title', 'Messages de Contact - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Messages de Contact</h1>
                <p class="text-gray-600">Gérez les messages envoyés par les clients</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-600">
                    <span class="font-semibold">{{ $messages->total() }}</span> messages au total
                </div>
                <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                    {{ $messages->where('status', 'new')->count() }} nouveaux
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <form method="GET" action="{{ route('admin.contact-messages') }}" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Tous les statuts</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>Nouveaux</option>
                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Lus</option>
                    <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Répondus</option>
                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archivés</option>
                </select>
            </div>
            
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-2">Sujet</label>
                <select name="subject" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Tous les sujets</option>
                    <option value="question" {{ request('subject') == 'question' ? 'selected' : '' }}>Question sur un produit</option>
                    <option value="order" {{ request('subject') == 'order' ? 'selected' : '' }}>Suivi de commande</option>
                    <option value="return" {{ request('subject') == 'return' ? 'selected' : '' }}>Retour ou échange</option>
                    <option value="technical" {{ request('subject') == 'technical' ? 'selected' : '' }}>Problème technique</option>
                    <option value="partnership" {{ request('subject') == 'partnership' ? 'selected' : '' }}>Partenariat</option>
                    <option value="other" {{ request('subject') == 'other' ? 'selected' : '' }}>Autre</option>
                </select>
            </div>
            
            <div class="flex gap-2">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                    Filtrer
                </button>
                <a href="{{ route('admin.contact-messages') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                    Réinitialiser
                </a>
            </div>
        </form>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        @if($messages->isEmpty())
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-gray-500 font-medium">Aucun message trouvé</p>
                <p class="text-gray-400 text-sm mt-2">Les messages des clients apparaîtront ici</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Client
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Sujet
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Message
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Statut
                            </th>
                            <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($messages as $message)
                            <tr class="hover:bg-gray-50 transition-colors {{ $message->isNew() ? 'bg-blue-50' : '' }}">
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                        @if($message->phone)
                                            <div class="text-sm text-gray-400">{{ $message->phone }}</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900">{{ $message->getSubjectLabel() }}</span>
                                </td>
                                <td class="px-8 py-4">
                                    <div class="max-w-xs">
                                        <p class="text-sm text-gray-900 truncate">{{ $message->message }}</p>
                                        @if($message->admin_reply)
                                            <div class="text-xs text-green-600 mt-1">✓ Répondu</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $message->created_at->format('d/m/Y H:i') }}</div>
                                    <div class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</div>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $message->getStatusColor() }}">
                                        {{ $message->getStatusLabel() }}
                                    </span>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-sm">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.contact-messages.show', $message) }}" 
                                           class="text-indigo-600 hover:text-indigo-900 font-medium flex items-center space-x-1">
                                            <span>Voir</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        
                                        <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}" 
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
