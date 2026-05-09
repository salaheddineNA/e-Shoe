# Boutique de Chaussures en Ligne

Une boutique de chaussures complète avec système de paiement à la livraison et panneau d'administration.

## Fonctionnalités

### 🛍️ Pour les clients
- **Catalogue de produits**: Affichage des chaussures avec images, prix et stocks
- **Fiche produit**: Détails complets avec description et options de quantité
- **Panier d'achat**: Ajout, modification et suppression d'articles
- **Commande**: Formulaire de commande avec informations de livraison
- **Confirmation**: Page de confirmation avec récapitulatif de commande
- **Paiement à la livraison**: Aucun paiement en ligne requis

### 👨‍💼 Pour l'administration
- **Tableau de bord**: Statistiques et vue d'ensemble
- **Gestion des produits**: Ajout, modification et suppression de produits
- **Gestion des commandes**: Suivi et mise à jour des statuts
- **Interface intuitive**: Design moderne avec Tailwind CSS

## Installation

1. **Cloner le projet**
   ```bash
   git clone <repository-url>
   cd laravel-project
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   npm install
   ```

3. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurer la base de données**
   - Modifier le fichier `.env` avec vos informations de base de données
   - Créer la base de données

5. **Exécuter les migrations**
   ```bash
   php artisan migrate
   ```

6. **Peupler la base de données**
   ```bash
   php artisan db:seed
   ```

7. **Compiler les assets**
   ```bash
   npm run build
   ```

8. **Démarrer le serveur**
   ```bash
   php artisan serve
   ```

## Accès à l'application

- **Boutique**: `http://localhost:8000`
- **Administration**: `http://localhost:8000/admin`

## Structure du projet

### Modèles
- `Product`: Gestion des chaussures
- `Order`: Commandes clients
- `OrderItem`: Articles dans les commandes
- `Cart`: Paniers d'achat
- `CartItem`: Articles dans les paniers

### Contrôleurs
- `ProductController`: Affichage des produits
- `CartController`: Gestion du panier
- `OrderController`: Traitement des commandes
- `AdminController`: Panneau d'administration

### Vues
- `products/`: Catalogue et fiches produits
- `cart/`: Panier d'achat
- `orders/`: Commandes et confirmation
- `admin/`: Interface d'administration

## Fonctionnalités techniques

### Gestion du panier
- Basé sur les sessions PHP
- Persistance des articles
- Calcul automatique des totaux
- Gestion des stocks en temps réel

### Traitement des commandes
- Validation des informations
- Génération automatique des numéros de commande
- Mise à jour des stocks
- Transaction sécurisée avec base de données

### Administration
- Statistiques en temps réel
- Gestion CRUD des produits
- Suivi des commandes
- Mise à jour des statuts

## Technologies utilisées

- **Backend**: Laravel 12
- **Frontend**: Tailwind CSS
- **Base de données**: MySQL/SQLite
- **Build**: Vite
- **Icons**: Heroicons (SVG)

## Produits par défaut

Le système inclut 8 produits exemples:
- Nike Air Max 270
- Adidas Ultra Boost 22
- Puma RS-X³
- New Balance 574
- Converse Chuck Taylor All Star
- Vans Old Skool
- Reebok Classic Leather
- ASICS Gel-Kayano 29

## Personnalisation

### Ajouter de nouveaux produits
1. Accéder à l'administration: `/admin`
2. Cliquer sur "Ajouter un produit"
3. Remplir le formulaire avec les informations du produit
4. Soumettre pour ajouter à la boutique

### Modifier les produits
1. Accéder à l'administration: `/admin/products`
2. Cliquer sur "Modifier" pour le produit souhaité
3. Mettre à jour les informations
4. Sauvegarder les changements

### Gérer les commandes
1. Accéder à l'administration: `/admin/orders`
2. Cliquer sur "Voir" pour les détails d'une commande
3. Mettre à jour le statut selon l'état de la commande
4. Contacter le client si nécessaire

## Sécurité

- Validation des entrées utilisateur
- Protection CSRF
- Échappement des données
- Gestion sécurisée des sessions

## Déploiement

Pour le déploiement en production:
1. Configurer `APP_ENV=production` dans `.env`
2. Exécuter `php artisan config:cache`
3. Exécuter `php artisan route:cache`
4. Exécuter `npm run build` pour les assets de production
5. Configurer le serveur web pour pointer vers le dossier `public`

## Support

Pour toute question ou problème, veuillez consulter la documentation Laravel ou contacter le développeur.
