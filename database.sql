-- database.sql

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Table `tasks`
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `priority` enum('low','medium','high') COLLATE utf8mb4_unicode_ci DEFAULT 'medium',
  `done` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_done` (`done`),
  KEY `idx_priority` (`priority`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table `categories`
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT '#4CAF50',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Données pour la table `categories`
INSERT INTO `categories` (`name`, `color`) VALUES
('Travail', '#2196F3'),
('Personnel', '#4CAF50'),
('Études', '#FF9800'),
('Maison', '#9C27B0'),
('Loisirs', '#00BCD4');

-- Données pour la table `tasks`
INSERT INTO `tasks` (`title`, `description`, `priority`, `done`) VALUES
('Apprendre PHP OOP', 'Comprendre les concepts de la programmation orientée objet en PHP : classes, objets, héritage, encapsulation, polymorphisme', 'high', 0),
('Implémenter le pattern MVC', 'Créer une architecture Model-View-Controller pour séparer la logique métier de la présentation', 'high', 1),
('Créer un système de connexion', 'Développer une authentification sécurisée avec hachage de mots de passe et sessions', 'medium', 0),
('Designer l\'interface', 'Utiliser Bootstrap ou Tailwind CSS pour créer une interface utilisateur responsive et moderne', 'medium', 0),
('Tester les fonctionnalités', 'Écrire des tests unitaires pour vérifier le bon fonctionnement de toutes les fonctionnalités', 'medium', 0),
('Documenter le code', 'Ajouter des commentaires PHPDoc et créer un README détaillé pour le projet', 'low', 1),
('Déployer l\'application', 'Configurer un serveur web (Apache/Nginx) et déployer l\'application en production', 'high', 0),
('Optimiser les performances', 'Améliorer les requêtes SQL et optimiser le code PHP pour de meilleures performances', 'low', 0);

SET FOREIGN_KEY_CHECKS = 1;