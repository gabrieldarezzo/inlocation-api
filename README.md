DAY 0 

Objetivos:
-> Usar os melhores padrões do Laravel
-> Desenvolver de forma rapida, e publicar uma API (NodeJs Deal with That)
api users + localização [R]

CREATE -> PRONTO 
READT -> PRONTO 
ReadAll -> PRONTO 
UPDATE ->  PRONTO 
DELETE ->  PRONTO 



-> RealTime com Pusher (socket.io pra quem?)


O que é o "inlocation-api" 
-> Salvar a localização
-> Listar as pessoas proximas


-> Toda vez que alterar algo do .env ou qualquer do /config 
```bash
composer install
php artisan key:generate
php artisan jwt:secret
php artisan config:clear
php artisan config:cache
php artisan serve
```


Crie a base
```sql
CREATE DATABASE inlocation COLLATE 'utf8_general_ci';
```

### With this command you'll LOSING whatever data is in the tables and recreate then:  
```shell
php artisan migrate:refresh --seed
```

```shell
git clone <nome_do _repo>
composer install --no-dev --prefer-dist
```

How make easy dev with Mobile / External test:
```
php artisan serve
php artisan serve --host 192.168.0.16 --port 8000
php artisan serve --host 192.168.0.8 --port 8000


```

# To Seed this
```
php artisan db:seed --class=EstoqueTableSeeder
```



-- Controller -> Singular 
```
php artisan make:controller UserController --resource
```

Formula Haversine:
```sql
SELECT
 (((acos(sin((-23.9772151*pi()/180)) * sin((`lat`*pi()/180))+cos((-23.9772151*pi()/180))  * cos((`lat`*pi()/180)) * cos(((-46.3082780- `lng`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance
,nome
FROM pessoa
WHERE distance <= 10 -- KM
order by distance
```

