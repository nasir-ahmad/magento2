# Magento 2 Docker Image

Magento version 2.3 (based on MageCloudKit)

## Building the Docker image locally

    $ composer global config http-basic.repo.magento.com $MAGENTO_PUBLIC_KEY $MAGENTO_PRIVATE_KEY
    $ composer install --ignore-platform-reqs
    $ docker build --rm=false -t magecloudkit/magento2:latest .
