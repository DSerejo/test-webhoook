#!/bin/bash

ecs-cli --cluster staging compose --project-name ${PROJECT_NAME} --file docker-compose.staging.yml up