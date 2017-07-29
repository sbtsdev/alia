# Alia - Code for the Kingdom 2017 Project

## Set up
Following the [Per Project Installation](https://laravel.com/docs/5.4/homestead#per-project-installation) from Laravel  

Note, [Vagrant](https://www.vagrantup.com/downloads.html) is included, i.e. Vagrantfile. You need to install vagrant and a place for it to live, e.g. virtualbox, vmware, or parallels. This repo was created using virtualbox (it's free).

1. From the repo root... (except where specified)
1. Clone repo
1. `cd alia`
1. `composer install` to install [Homestead](https://laravel.com/docs/5.4/homestead) and the rest
1. `php vendor/bin/homestead make` to create Homestead.yaml
1. `cp .env.example .env`
1. Add DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD to .env file
1. `php artisan key:generate`
1. Run `vagrant up` from the root of the directory
1. Add `192.168.10.10  alia.app` to `/etc/hosts` 
1. Navigate to http://alia.app
