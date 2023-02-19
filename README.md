## Challenge OM30

O projeto dividido em duas partes beckend e frontend. Backnend usando laravel como framework, usando migration(postgres), factory, faker, seeder, cache(redis) e queue, dividido em três partes desenvolvendo as features `Pacientes`, `Endereço` e `Importação dos pacientes por csv`. Frontend usando Vue como framework.

## Requisitos

- Docker
- Docker-compose

## Instalar API

Passo para rodar a API.

1. Entre na pasta **`backend`**
2. Rodar o comando **`docker-compose up -d --build`** no terminal
3. Rodar o comando **`docker exec -it challengeom30-app cp .env.example .env`** no terminal
4. Rodar o comando **`docker exec -it challengeom30-app composer i`** no terminal
5. Rodar o comando **`docker exec -it challengeom30-app php artisan key:generate`** no terminal
6. Rodar o comando **`docker exec -it challengeom30-app php artisan migrate --seed`** no terminal

URLs

- API home - http://localhost:8000
- Postgres - http://localhost:5432
- Postgres Admin - http://localhost:5050
- Redis - http://localhost:6379

## Instalar Frontend

Passo para rodar a API.

1. Entre na pasta **`frontend`**
2. Rodar o comando **`docker-compose up -d --build`** no terminal

URLs

- App home - http://localhost:5173
