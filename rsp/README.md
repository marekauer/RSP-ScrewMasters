## rsp techmind
pro spuštění v dev: php -S localhost:8000 -t public

# co je potřeba mít
php 8.2.6
composer

# vytvoření migrace, db
.env -> nastavit si connection string pro db
1. php bin/console make:migration (pokud není již vytvořená)
2. php bin/console doctrine:migrations:migrate (vytvoří schéma databáze v příslušné db)