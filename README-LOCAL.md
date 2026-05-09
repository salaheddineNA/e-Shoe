# ShoeStore - Local Deployment Guide

## 🚀 Déploiement Local Immédiat

### Option 1 : Windows
```bash
deploy-local.bat
```

### Option 2 : Mac/Linux
```bash
chmod +x deploy-local.sh
./deploy-local.sh
```

### Option 3 : Manuel
```bash
# 1. Copier .env.example vers .env
cp .env.example .env

# 2. Générer la clé
php artisan key:generate

# 3. Créer la base de données
touch database/database.sqlite

# 4. Lancer les migrations
php artisan migrate

# 5. Créer l'admin
php artisan db:seed --class=AdminSeeder

# 6. Démarrer le serveur
php artisan serve
```

## 🎯 Accès à l'application

- **URL :** http://localhost:8000
- **Admin :** http://localhost:8000/admin/login
- **Email :** admin@shoestore.com
- **Mot de passe :** admin123

## 📋 Vérification

1. **Healthcheck :** http://localhost:8000/ping
2. **Test PHP :** http://localhost:8000/test.php
3. **Page simple :** http://localhost:8000/simple.php

## 🔧 Si ça ne marche pas

1. **Vérifier PHP :** `php --version` (doit être 8.2+)
2. **Vérifier Composer :** `composer --version`
3. **Installer dépendances :** `composer install`
4. **Permissions :** `chmod -R 755 storage bootstrap/cache`

## 🌐 Pour le rendre accessible sur le réseau

Ajouter `--host=0.0.0.0` :
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Accès depuis autres appareils : http://VOTRE_IP:8000

## ✅ Avantages du déploiement local

- ✅ **Fonctionne immédiatement**
- ✅ **Pas de limites**
- ✅ **Contrôle total**
- ✅ **Gratuit**
- ✅ **Rapide**
