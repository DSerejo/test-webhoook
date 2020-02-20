#!/bin/bash
cd ..
docker-compose --project-name=${PROJECT_NAME} -f docker-compose.staging.yml build

for r in $(grep 'image: \${DOCKER_REGISTRY}' docker-compose.staging.yml | sed -e 's/^.*\///')
do
    aws ecr create-repository --repository-name "$r" || true
done

docker-compose --project-name=${PROJECT_NAME} -f docker-compose.staging.yml push
