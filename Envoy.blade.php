@servers(['web' => 'deployer@stockmate.gregorius.id'])

@setup
    $repository = 'git@gitlab.com:gal_bert/stockmate.git';
    $releases_dir = $env == "production" ? '/var/www/stockmate/releases' : '/var/www/staging.stockmate/releases';
    $app_dir = $env == "production" ? '/var/www/stockmate' : '/var/www/staging.stockmate';
    $release = date('YmdHis');
    $new_release_dir = $releases_dir .'/'. $release;
@endsetup

@story('deploy')
    clone_repository
    run_composer
    update_symlinks
    artisan_commands
@endstory

@task('clone_repository')
    echo 'Cloning repository'
    [ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
    git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
    cd {{ $new_release_dir }}
    git reset --hard {{ $commit }}
@endtask

@task('run_composer')
    echo "Starting deployment ({{ $release }})"
    cd {{ $new_release_dir }}
    composer update
@endtask

@task('update_symlinks')
    echo "Linking storage directory"
    rm -rf {{ $new_release_dir }}/storage
    ln -nfs {{ $app_dir }}/storage {{ $new_release_dir }}/storage

    echo 'Linking .env file'
    ln -nfs {{ $app_dir }}/.env {{ $new_release_dir }}/.env

    echo 'Linking current release'
    ln -nfs {{ $new_release_dir }} {{ $app_dir }}/current
@endtask

@task('artisan_commands')
    echo 'Running artisan commands'
    cd {{ $new_release_dir }}
    php artisan migrate:refresh --seed
    php artisan optimize:clear
@endtask
