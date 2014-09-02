Edge5MobileFirstBase Project Framework
================================

This repository serves as a skeleton for Symfony2 / Propel based Mobile First web apps.

It contains an empty FrontendBundle and a customizable BackendBundle based on the Edge5AppBackendBundle

### Installation

1. Clone Edge5MobileFirstBaseProject repository
----------------------------------

    $ git clone git@github.com:Edge5/Edge5MobileFirstBaseProject.git MyAppProjectFolder
    $ cd MyAppProjectFolder

2. Install project and setup config parameters
-------

    $ composer install

3. Run assets install and cache warmup commands
-------

    $ php app/console assets:install --symlink
    $ php app/console cache:warmup
    
4. Create and install database
-------

    $ php app/console propel:build
    $ php app/console propel:database:create
    $ php app/console propel:sql:insert --force
    
5. Create FOS superAdmin user
-------

    $ php app/console fos:user:create --super-admin
    
6. Dump public assets
-------

    $ php app/console assetic:dump

7. Add your own Git repository
-------

    $ git remote rm origin
    $ git remote add origin git@github.com:MyOwnAppGitRepository.git