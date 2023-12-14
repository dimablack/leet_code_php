Project Setup

Start Dev

    docker volume create --name=src-sync
    docker-compose -f docker-compose-dev.yml up -d
    docker-sync start

Start

    docker-compose up -d

Stop

    docker-compose stop
    docker-sync stop
