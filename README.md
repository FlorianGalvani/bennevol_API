# 1. Installation des packages
```
composer install
```
# 2. Vérifier le .env
# 3. Création de la BDD
```
php bin/console d:d:c
```

(ajouter un dossier 'migrations' à la racine) (temporaire)
# 4. Migrations
```
php bin/console m:mi
```
```
php bin/console d:m:m
```
# 5. Rentrer les valeurs en BDD
```
php bin/console d:f:l
```
