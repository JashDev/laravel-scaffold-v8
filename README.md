# LARAVEL SCAFFOLD

Estructura de proyecto Laravel, optimizado para la contrucción de API REST

### Features

- PHP >= 7.3
- Todas las rutas dentro de la carpeta `routes/api/*` son automaticamente detectadas
- [Cors](https://github.com/fruitcake/laravel-cors)
- Estructura de folder 'modular'
  ```
      - App
          - Http
              - Controllers
                  UserController
          -Models
              - Users => Contain folder
                  User => Model
                  UserRepository
                  UserBuilder => Scopes
                  UserObserver
  ```
- Funciones de ayuda (app/Helpers.php) configurados en el autoload
- Handler.php para lanzar excepciones automaticamente
- JWT (auth.jwt middleware)
- Migration with User table
