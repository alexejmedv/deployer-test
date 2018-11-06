<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:alexejmedv/deployer-test.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host('localhost')
    ->user('root')
    ->port(2222)
    ->set('deploy_path', '/BLAAAAAAA/'); 
    

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

task('test', function (){
    writeln('Hello World');
});

task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
});


    

/*
 * Main deploy task
 */
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);



// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
