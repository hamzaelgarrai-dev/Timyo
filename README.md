📘 Appointment Booking Web App – Fullstack Laravel & React

Une application web permettant aux utilisateurs de réserver des rendez-vous et aux administrateurs de gérer l’ensemble du système.
Ce projet sert de mise en pratique des compétences Laravel, React, API REST, authentification Sanctum, architecture MVC, tests unitaires et bonnes pratiques de développement.

🚀 1. Fonctionnalités principales
👤 Utilisateur

Créer un rendez-vous (date & heure)

Consulter la liste de ses rendez-vous

Annuler un rendez-vous avant sa date programmée

🛠️ Administrateur

Lister tous les rendez-vous du système

Approuver ou rejeter un rendez-vous

Voir la liste des utilisateurs (user/admin)

🔐 Authentification & Sécurité

Authentification Laravel Sanctum (SPA mode – cookies HTTP-only)

Rôles Admin / User

Middleware : isUser, isAdmin

🧪 Tests

Backend : PHPUnit (tests API)

Frontend : Jest + React Testing Library (tests UI et composants)

📚 2. User Stories
👤 Utilisateur

US1 — Créer un rendez-vous

US2 — Consulter mes rendez-vous

US3 — Annuler un rendez-vous

🛠️ Administrateur

US4 — Lister tous les rendez-vous

US5 — Changer le statut d’un rendez-vous

US6 — Voir la liste des utilisateurs

🧩 3. Pages à développer
🔒 Authentification

LoginPage – formulaire de connexion

RegisterPage – formulaire d’inscription

👤 Utilisateur

DashboardUser – liste des rendez-vous

CreateAppointmentPage – création d’un rendez-vous

🛠️ Admin

AdminDashboardPage

liste des rendez-vous

actions : approuver / rejeter

Liste des utilisateurs (rôle, email)

🧭 Composants globaux

ProtectedRoute

Notifications Toast (succès/erreur)

🏗️ 4. Architecture Technique
🔧 Backend – Laravel

API RESTful (controllers + routes API)

Sanctum SPA pour authentification

Migrations :

users

appointments

Modèles Eloquent :

User (hasMany)

Appointment (belongsTo)

Factories & Seeders :

création d’un admin

utilisateurs fictifs

rendez-vous fictifs

🎨 Frontend – React (Vite + Tailwind)

React Router v6

AuthContext pour session utilisateur

Axios configuré avec withCredentials: true

Pages + Dashboard user/admin

UI moderne via TailwindCSS

🗄️ 5. Installation & Setup
🔧 Backend (Laravel)
git clone <repo-url>
cd backend
composer install
cp .env.example .env
php artisan key:generate


Configurer la base de données dans .env :

DB_DATABASE=appointments
DB_USERNAME=root
DB_PASSWORD=


Sanctum (SPA mode) :

SANCTUM_STATEFUL_DOMAINS=localhost:5173
SESSION_DOMAIN=localhost


Puis :

php artisan migrate --seed
php artisan serve

🖥️ Frontend (React)
cd frontend
npm install
npm run dev


Configurer axios dans axios.js :

axios.defaults.baseURL = "http://localhost:8000";
axios.defaults.withCredentials = true;

🔐 6. Workflow d’Authentification Sanctum (SPA)

GET /sanctum/csrf-cookie

POST /login

Laravel génère une session en cookie HTTP-only

Les requêtes suivantes sont automatiquement authentifiées

GET /api/user retourne l’utilisateur connecté

📦 7. API Endpoints (Résumé)
🔑 Auth
Méthode	Endpoint	Description
GET	/sanctum/csrf-cookie	CSRF init
POST	/login	Connexion
POST	/logout	Déconnexion
POST	/register	Inscription
📅 Appointments (User)
Méthode	Endpoint	Description
GET	/appointments/me	Mes rendez-vous
POST	/appointments	Créer
PATCH	/appointments/{id}/cancel	Annuler
🛠️ Admin
Méthode	Endpoint	Description
GET	/admin/appointments	Tous les rendez-vous
PATCH	/admin/appointments/{id}/status	Approuver / Rejeter
GET	/admin/users	Liste utilisateurs
🧪 8. Tests
Backend – PHPUnit

Auth API tests

CRUD rendez-vous

Contrôle d’accès admin/user

Frontend – Jest + RTL

Tests de composants

Formulaires (login/register)

ProtectedRoute

📌 Resources:

Jira Planification: https://hamzaelgarrai.atlassian.net/jira/software/c/projects/TIM/boards/166/backlog?epics=visible&issueParent=0%2C10302&atlOrigin=eyJpIjoiMjcyOTI4Yzc5NTUzNDM0NmIyMDc0M2MwNmM2N2E1NzEiLCJwIjoiaiJ9

UML diagrams: https://lucid.app/lucidchart/ba82b9df-657e-40c9-857a-ba43efc47418/edit?view_items=.jlcxiVDhjcQ&page=0_0&invitationId=inv_198c7127-4f58-43ae-9d90-6b66ebed9a99