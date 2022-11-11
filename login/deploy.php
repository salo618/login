<?php
namespace Deployer;

require 'recipe/composer.php';

// Config

set('repository', 'login');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('local')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/login');

// Hooks

after('deploy:failed', 'deploy:unlock');
