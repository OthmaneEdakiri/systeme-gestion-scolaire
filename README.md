# 🎓 Système de Gestion Scolaire - Laravel

Projet réalisé dans le cadre d’un module Laravel.

Réalisé par : **Othmane Edakiri**

---

## 📌 Description

Le projet **Système de Gestion Scolaire** est une application web développée avec Laravel permettant la gestion complète d’un établissement scolaire.

Le système permet :

- Gestion des étudiants
- Gestion des enseignants
- Gestion des classes
- Gestion des matières
- Gestion des notes
- Classement des étudiants
- Génération et exportation des relevés de notes en PDF
- Système d’authentification multi-guards (Admin / Enseignant / Étudiant)

---

## 🛠 Technologies Utilisées

- Laravel
- PHP
- MySQL
- Blade
- Tailwind CSS
- DOMPDF (Export PDF)

---

## 👥 Rôles & Permissions

### 🔹 Admin
- Accès complet au système
- CRUD Classes
- CRUD Étudiants
- CRUD Enseignants
- CRUD Matières
- Gestion des notes
- Consultation du classement
- Export PDF des relevés

### 🔹 Enseignant
- Consultation de ses matières
- Saisie et modification des notes
- Accès à son tableau de bord

### 🔹 Étudiant
- Consultation de ses notes
- Téléchargement de son relevé de notes en PDF
- Accès à son tableau de bord

---

## 🔐 Sécurité

- Authentification basée sur Multi-Guards
- Protection des routes par middleware
- Autorisation via Policy pour sécuriser l’accès aux relevés de notes
- Interdiction d’accès aux ressources d’un autre utilisateur

---

## 📊 Fonctionnalités Principales

### 1️⃣ Page de Connexion
Interface d’authentification pour chaque rôle.

### 2️⃣ Admin Dashboard
Statistiques générales :
- Nombre total d’étudiants
- Nombre total d’enseignants
- Nombre de classes
- Moyenne générale

### 3️⃣ Gestion des Étudiants
- Ajouter un Étudiant
- Modifier l’Étudiant
- Supprimer un Étudiant

### 4️⃣ Gestion des Classes
- Ajouter une Classe
- Modifier une Classe

### 5️⃣ Gestion des Matières
- Ajouter une Matière
- Modifier une Matière

### 6️⃣ Gestion des Enseignants
- Ajouter un Enseignant
- Modifier l’Enseignant

### 7️⃣ Gestion des Notes
- Saisie des notes
- Mise à jour des notes

### 8️⃣ Classement des Étudiants
Classement basé sur la moyenne générale.

### 9️⃣ Relevé de Notes (Export PDF)
Téléchargement sécurisé du relevé de notes individuel.

---

## 🚀 Installation

1. Cloner le projet :

```bash
git clone <repository-url>

## 👑 Création du Compte Admin

Le compte Administrateur principal est généré via Seeder.

Après l’exécution des migrations, il est nécessaire de lancer :

```bash
php artisan db:seed
