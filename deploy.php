<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'deployer-test');

// Project repository
set('repository', 'git@github.com:alexejmedv/deployer-test.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', ['README.md']);
set('shared_dirs', ['src']);

// Writable dirs by web server 
set('writable_dirs', get('shared_dirs'));


// ?!?
set('http_user', 'www-data');


// Hosts
host('localhost')
    ->user('root')
    ->port(2222)
    ->set('deploy_path', '/deploy_path/{{application}}');
    

// Tasks
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
//    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
