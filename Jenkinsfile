pipeline {
  agent any
  environment {
    FRONTEND_GIT = 'https://github.com/vietawake/jenkinstest'
    FRONTEND_BRANCH = 'master'
    FRONTEND_IMAGE = 'vietawake/job-thom'
    FRONTEND_SERVER = '149.28.35.8'
    FRONTEND_SERVER_DIR = './jenkinstest'
  }
  stages {
    stage('Build Laravel') {
      docker {
        image 'php:7.3.9-fpm-stretch'
      }
      steps {
        git(url: FRONTEND_GIT, branch: FRONTEND_BRANCH)
        sh 'docker build .'
        stash(name: 'frontend', includes: 'build/*/**')
      }
    }
    stage('Build Image') {
      steps {
        unstash 'frontend'
        script {
          docker.withRegistry('', 'docker-hub') {
            def image = docker.build(FRONTEND_IMAGE)
            image.push(BUILD_ID)
          }
        }
      }
    }
    stage('Deploy') {
      steps {
        script {
          withCredentials([sshUserPrivateKey(
            credentialsId: 'ssh',
            keyFileVariable: 'identityFile',
            passphraseVariable: '',
            usernameVariable: 'user'
          )]) {
            def remote = [:]
            remote.name = 'server'
            remote.host = FRONTEND_SERVER
            remote.user = user
            remote.identityFile = identityFile
            remote.allowAnyHosts = true

            sshCommand remote: remote, command: "cd $FRONTEND_SERVER_DIR && export FRONTEND_IMAGE=$FRONTEND_IMAGE:$BUILD_ID && docker-compose up -d"
          }
        }
      }
    }
  }
}