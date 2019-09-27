node ('master'){
    checkout scm

    stage('Build') {
        sh "curl -fsSL https://get.docker.com -o get-docker.sh"
        //sh "sh get-docker.sh"
        sh "apt install docker-compose"
        sh "docker-compose up -d"
        sh "composer install"
        sh "cp .env.example .env"
        sh "php artisan key:generate"
    }

    stage('Test') {
        echo "testing success"
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