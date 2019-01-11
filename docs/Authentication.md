# Authentication


## app/config/security.yml

This file is used in order to configure access control for our application. Primary points to be checked are :

## encoders :
```
We use bcrypt to encode user passwords. You can customise it to be more complex or just another encoding algorithm
See https://symfony.com/doc/current/reference/configuration/security.html for more informations
```

## providers :
This is the application user serving method. We define user storage in database through doctrine. "class" is the User model name used by
```
our application, "property" is the User authentification attribute.
See https://symfony.com/doc/3.4/security/entity_provider.html for more informations.
```

## firewalls main :
Permit anonymous user to access connexion form and log in.
```
See https://symfony.com/doc/3.4/reference/configuration/security.html for configuration details.
```

## access_control :
Define application route access rules based on user roles.
```
See https://symfony.com/doc/3.4/security/access_control.html for more informations.
```

```
security:

    encoders:
        AppBundle\Entity\User: bcrypt

    providers:
        doctrine:
            entity:
                class: AppBundle:User
                property: username

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

    access_control:
        - { path: ^/login, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/users, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/, roles: ROLE_USER }
```

## src/AppBundle/Controller/SecurityController.php
```
    Contains function for login, check password and logout.
```
