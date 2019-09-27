node ('slave'){ // run trên node có label là slave
    checkout scm

    stage('Build') {
        checkout scm
        sh "composer install"
        sh "cp .env.example .env"
        sh "php artisan key:generate"
    }

    stage('Test') {
        docker.image('php:7.3.9-fpm-stretch').inside {
            sh 'php --version'
            sh 'cd /var/www/html && ./vendor/bin/phpunit --testsuite Unit'
        }
    }

    stage('Deploy') {
        sh '/usr/local/bin/docker-compose down'
        sh '/usr/local/bin/docker-compose up -d'
        sh 'sleep 10 && /usr/local/bin/docker-compose run web php artisan migrate'
    }

    stage ('Test Feature') {
        sh '/usr/local/bin/docker-compose run web ./vendor/bin/phpunit --testsuite Feature'
    }
}