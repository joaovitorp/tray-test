# Desafio Técnico - Tray

## Endpoints

Endpoint | Método | 
:--------- | :--------- 
/sellers | GET 
/sellers | POST 
/sellers/{seller_id}/sales | GET 
/sellers/{seller_id}/sales | POST 


## Instalação

A api foi desenvolvida com laravel 9 e laravel Sail para rodar localmente com o docker

#### instação de depedências 
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
#### Subindo aplicação 
```
./vendor/bin/sail up -d && ./vendor/bin/sail artisan migrate --seed
```

#### Rodando os tests
```
./vendor/bin/sail artisan test
```
