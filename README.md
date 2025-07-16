# SkillSwap

SkillSwap est une plateforme web moderne d’échange de compétences entre utilisateurs, développée avec Laravel 11, MySQL, Blade, TailwindCSS et Pusher.

## Fonctionnalités principales
- Authentification complète (inscription, connexion, vérification e-mail)
- Profils utilisateurs enrichis (photo, bio, compétences à enseigner/apprendre)
- CRUD des compétences
- Système de matching intelligent
- Messagerie temps réel (Pusher)
- Système d’évaluation (notation, commentaire)
- Dashboard admin (modération, stats, gestion utilisateurs)
- UI responsive, dark mode, transitions Tailwind

## Installation locale

### Prérequis
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL

### Étapes
```bash
# Clone le repo puis place-toi dans le dossier
cd SkillSwap/SkillSwap

# Installe les dépendances PHP
composer install

# Installe les dépendances JS
npm install

# Compile les assets
npm run build

# Copie le fichier .env et configure ta base MySQL et Pusher
cp .env.example .env
# (modifie les variables DB_*, PUSHER_*)

# Génère la clé d’application
php artisan key:generate

# Lance les migrations et seeders
php artisan migrate:fresh --seed

# Lance le serveur local
php artisan serve
```

### Pusher (messagerie temps réel)
- Configure un compte Pusher ou utilise Laravel Websockets en local
- Mets à jour les variables PUSHER_* dans `.env`

## Structure du projet
- `app/Models` : Modèles Eloquent
- `app/Http/Controllers` : Contrôleurs RESTful
- `database/migrations` : Migrations de la base
- `database/seeders` : Seeders de test
- `resources/views` : Vues Blade (UI)
- `routes/web.php` : Routes principales

## Tests
- Lance les tests avec :
```bash
php artisan test
```
- (Tests à compléter selon les besoins)

## Déploiement
- Configure `.env` pour la production (DB, Pusher, mail, etc.)
- Compile les assets avec `npm run build`
- Utilise un hébergeur compatible Laravel (Forge, Ploi, OVH, etc.)

## Crédits
- Projet généré automatiquement avec Laravel, TailwindCSS, Breeze, Pusher
- UI inspirée des meilleures pratiques modernes

---
Pour toute question ou contribution, ouvre une issue ou contacte l’auteur.
