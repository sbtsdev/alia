# C4tK - Code for the Kingdom 2017 Project

## Set up
Following the [Per Project Installation](https://laravel.com/docs/5.4/homestead#per-project-installation) from Laravel  

1. From the repo root... (except where specified)
1. `composer install` to install [Homestead](https://laravel.com/docs/5.4/homestead) and the rest
1. `php vendor/bin/homestead make` to create Homestead.yaml
1. [Vagrant](https://www.vagrantup.com/downloads.html) is included, i.e. Vagrantfile
1. Run `vagrant up` from the root of the directory
1. `yarn install` to get [yarn](https://yarnpkg.com/en/docs/install) to install all the axios, bootstrap-sass, cross-env, jquery, laravel-mix, lodash, and vue goodness
1. Add `192.168.10.10  c4tk.app` to `/etc/hosts` 
1. Navigate to http://c4tk.app
