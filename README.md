# readme

## `Comandos`

`Instalar paquete de jwt`
```bash
compose require tymon/jwt-auth
```

`Pasar el archivo jwt a la carpeta de config para hacerlo parte del sistema`
```bash
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

`Generar clave de token en .env`
```bash
php artisan jwt:secret
```

`Crea un archivo para hacer rutas de validación`
```bash
php artisan make:request Auth/LoginRequest
```

`Comando para crear archivo de middleware`
```bash
php artisan make:middleware JwtMiddleware
```