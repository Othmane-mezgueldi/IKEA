ALTER TABLE `categories`
ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
ADD `updated_at` DATETIME on update CURRENT_TIMESTAMP NULL DEFAULT NULL AFTER `created_at`,
ADD `deleted_at` DATETIME NULL DEFAULT NULL AFTER `updated_at`;

ALTER TABLE `produits`
ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
ADD `updated_at` DATETIME on update CURRENT_TIMESTAMP NULL DEFAULT NULL AFTER `created_at`,
ADD `deleted_at` DATETIME NULL DEFAULT NULL AFTER `updated_at`;

ALTER TABLE `couleurs`
ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
ADD `updated_at` DATETIME on update CURRENT_TIMESTAMP NULL DEFAULT NULL AFTER `created_at`,
ADD `deleted_at` DATETIME NULL DEFAULT NULL AFTER `updated_at`;





SELECT 
produits.*,
categories.nom AS categorie_nom,
couleurs.nom AS couleur_nom
FROM produits
LEFT JOIN categories ON categories.id = produits.categorie_id
LEFT JOIN couleurs ON couleurs.id = produits.couleur_id
WHERE deleted_at IS NULL
ORDER BY produits.id DESC


