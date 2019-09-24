pipeline {
  agent any
  environment {
    FRONTEND_GIT = 'https://gitlab.com/quoctuan9901/job-thom'
    FRONTEND_BRANCH = 'vietawake'
    FRONTEND_IMAGE = 'vietawake/job-thom'
    FRONTEND_SERVER = '149.28.35.8'
    FRONTEND_SERVER_DIR = './job-thom'
  }
  stages {
    stage('Build Laravel') {
      agent {
          dockerfile {
            filename 'Dockerfile'
            dir 'php7.2-fpm'
            label 'my-defined-label'
            registryUrl 'https://myregistry.com/'
            registryCredentialsId 'myPredefinedCredentialsInJenkins'
          }
      }
      steps {
        git(url: FRONTEND_GIT, branch: FRONTEND_BRANCH)
        sh 'npm i'
        sh 'npm run build'
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