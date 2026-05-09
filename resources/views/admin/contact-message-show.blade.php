@extends('layouts.admin')

@section('title', 'Message de Contact - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.contact-messages') }}" 
                   class="text-gray-600 hover:text-gray-900 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Retour aux messages</span>
                </a>
                <div class="h-6 w-px bg-gray-300"></div>
                <h1 class="text-3xl font-bold text-gray-900">Message #{{ $message->id }}</h1>
            </div>
            <div class="flex items-center space-x-3">
                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $message->getStatusColor() }}">
                    {{ $message->getStatusLabel() }}
                </span>
                @if($message->isNew())
                    <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                        @csrf
                        <input type="hidden" name="status" value="read">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            Marquer comme lu
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Message Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Original Message -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Message du client</h2>
                    
                    <!-- Customer Info -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="text-sm text-gray-600 mb-1">Nom</div>
                                <div class="font-medium text-gray-900">{{ $message->name }}</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600 mb-1">Email</div>
                                <div class="font-medium text-gray-900">{{ $message->email }}</div>
                            </div>
                            @if($message->phone)
                                <div>
                                    <div class="text-sm text-gray-600 mb-1">Téléphone</div>
                                    <div class="font-medium text-gray-900">{{ $message->phone }}</div>
                                </div>
                            @endif
                            <div>
                                <div class="text-sm text-gray-600 mb-1">Sujet</div>
                                <div class="font-medium text-gray-900">{{ $message->getSubjectLabel() }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Message Content -->
                    <div class="prose max-w-none">
                        <div class="whitespace-pre-wrap text-gray-800">{{ $message->message }}</div>
                    </div>
                </div>
                
                <!-- Message Footer -->
                <div class="border-t pt-4">
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <div>
                            Envoyé le {{ $message->created_at->format('d/m/Y à H:i') }}
                            <span class="mx-2">•</span>
                            Il y a {{ $message->created_at->diffForHumans() }}
                        </div>
                        @if($message->newsletter)
                            <div class="flex items-center text-green-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Inscrit à la newsletter
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Admin Reply -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">
                    @if($message->isReplied())
                        Votre réponse
                    @else
                        Répondre au message
                    @endif
                </h2>
                
                @if($message->isReplied())
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                        <div class="prose max-w-none">
                            <div class="whitespace-pre-wrap text-gray-800">{{ $message->admin_reply }}</div>
                        </div>
                        <div class="mt-4 text-sm text-gray-600">
                            Réponse envoyée le {{ $message->replied_at->format('d/m/Y à H:i') }}
                        </div>
                    </div>
                    
                    <div class="flex space-x-3">
                        <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                            @csrf
                            <input type="hidden" name="status" value="read">
                            <button type="submit" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                                Modifier le statut
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                            @csrf
                            <input type="hidden" name="status" value="archived">
                            <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                                Archiver
                            </button>
                        </form>
                    </div>
                @else
                    <form method="POST" action="{{ route('admin.contact-messages.reply', $message) }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="reply" class="block text-sm font-medium text-gray-700 mb-2">
                                Votre réponse
                            </label>
                            <textarea id="reply" name="reply" rows="8" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                      placeholder="Rédigez votre réponse ici..."></textarea>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-600">
                                Cette réponse sera marquée comme envoyée et le message sera mis à jour.
                            </div>
                            <div class="flex space-x-3">
                                <button type="submit" 
                                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                                    Envoyer la réponse
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions rapides</h3>
                <div class="space-y-3">
                    @if(!$message->isReplied())
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->getSubjectLabel() }}" 
                           class="w-full bg-blue-600 text-white text-center py-3 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Répondre par email</span>
                        </a>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                        @csrf
                        <input type="hidden" name="status" value="archived">
                        <button type="submit" class="w-full bg-gray-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                            Archiver le message
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}" 
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ? Cette action est irréversible.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-red-700 transition-colors">
                            Supprimer le message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Status Management -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Gestion du statut</h3>
                <div class="space-y-3">
                    <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                        @csrf
                        <input type="hidden" name="status" value="new">
                        <button type="submit" class="w-full bg-blue-100 text-blue-800 py-2 px-4 rounded-lg font-medium hover:bg-blue-200 transition-colors text-sm {{ $message->status == 'new' ? 'ring-2 ring-blue-500' : '' }}">
                            Nouveau
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                        @csrf
                        <input type="hidden" name="status" value="read">
                        <button type="submit" class="w-full bg-yellow-100 text-yellow-800 py-2 px-4 rounded-lg font-medium hover:bg-yellow-200 transition-colors text-sm {{ $message->status == 'read' ? 'ring-2 ring-yellow-500' : '' }}">
                            Lu
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                        @csrf
                        <input type="hidden" name="status" value="replied">
                        <button type="submit" class="w-full bg-green-100 text-green-800 py-2 px-4 rounded-lg font-medium hover:bg-green-200 transition-colors text-sm {{ $message->status == 'replied' ? 'ring-2 ring-green-500' : '' }}">
                            Répondu
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('admin.contact-messages.update-status', $message) }}">
                        @csrf
                        <input type="hidden" name="status" value="archived">
                        <button type="submit" class="w-full bg-gray-100 text-gray-800 py-2 px-4 rounded-lg font-medium hover:bg-gray-200 transition-colors text-sm {{ $message->status == 'archived' ? 'ring-2 ring-gray-500' : '' }}">
                            Archivé
                        </button>
                    </form>
                </div>
            </div>

            <!-- Message Info -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">ID du message:</span>
                        <span class="font-medium text-gray-900">#{{ $message->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Créé le:</span>
                        <span class="font-medium text-gray-900">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    @if($message->read_at)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Lu le:</span>
                            <span class="font-medium text-gray-900">{{ $message->read_at->format('d/m/Y H:i') }}</span>
                        </div>
                    @endif
                    @if($message->replied_at)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Répondu le:</span>
                            <span class="font-medium text-gray-900">{{ $message->replied_at->format('d/m/Y H:i') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
