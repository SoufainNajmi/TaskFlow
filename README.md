# TaskFlow
# TaskFlow – Application de gestion de tâches en PHP (POO + MVC)

Bienvenue dans **TaskFlow**, une application simple et élégante de gestion de tâches réalisée en **PHP Orienté Objet**, en suivant une structure **MVC** professionnelle.

Ce projet est parfait pour apprendre :

* La **POO en PHP** (classes, objets, encapsulation, héritage…)
* Le **pattern MVC**
* Le **CRUD** (Create, Read, Update, Delete)
* L'architecture d'une application web organisée
* L'utilisation de **MySQL** ou **SQLite**
* Le versionnement avec **Git & GitHub**

---

## ✨ Fonctionnalités

### 🔹 Fonctionnalités de base

* Ajouter une tâche
* Modifier une tâche
* Supprimer une tâche
* Marquer une tâche comme terminée
* Lister toutes les tâches
* Filtrer par statut (terminée / non terminée)

### 🔹 Fonctionnalités avancées (optionnelles)

* Priorité des tâches (haute / moyenne / basse)
* Catégories
* Recherche par mot-clé
* Authentification utilisateur
* Pagination

---

## 🏗️ Architecture du projet (MVC)
```
TaskFlow/
├── app/
│   ├── Controllers/
│   │   └── TaskController.php
│   ├── Models/
│   │   ├── Task.php
│   │   └── TaskModel.php
│   └── Views/
│       ├── layout.php
│       ├── task-form.php
│       └── task-list.php
├── config/
│   └── database.php
├── public/
│   ├── assets/
│   └── index.php
├── database.sql
└── README.md
```

## 🔧 Installation & exécution

### 1️⃣ Cloner le projet

```
git clone https://github.com/SoufainNajmi/TaskFlow.git
cd TaskFlow
```

### 2️⃣ Configurer la base de données

Modifier `/config/database.php` avec vos informations MySQL.

### 3️⃣ Lancer le serveur PHP

```
php -S localhost:8000 -t public
```

Puis ouvrir : [http://localhost:8000](http://localhost:8000)
---
## 📄 Licence

Ce projet est distribué sous licence **MIT**. Vous pouvez l'utiliser librement.

---

## 🤝 Contribution

Les contributions sont les bienvenues !
Merci de créer une issue ou une pull request.

---

## ⭐ Support

Si vous aimez ce projet, laissez une ⭐ sur GitHub !
