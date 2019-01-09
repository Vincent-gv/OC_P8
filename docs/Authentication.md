# Authentication

## app/config/security.yml
```
security:

    encoders:
        AppBundle\Entity\User: bcrypt
    // Password crypting system

    providers:
        doctrine:
            entity:
                class: AppBundle:User //Use Entity for create an User
                property: username
    // Use Entity for create an User and register it in database

    role_hierarchy:
        ROLE_ADMIN: ROLE_USER


    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false

        main:
            anonymous: ~
            pattern: ^/
            form_login:
                login_path: login
                check_path: login_check
                always_use_default_target_path:  true
                default_target_path:  /
            logout: ~
        // User can authenticate with a form without restriction

    access_control:
        - { path: ^/login, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/users, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/, roles: ROLE_USER }

    // Use on twig for reserved function (ROLE_ADMIN)
```

## src/AppBundle/Controller/SecurityController.php
```
    Contains function for login, check password and logout.
```
