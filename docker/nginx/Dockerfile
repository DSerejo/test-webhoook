FROM nginx:1.17.2-alpine


COPY ./docker/nginx/api.conf /etc/nginx/sites-enabled/api.conf
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

WORKDIR /www/html/api
ADD ./src .
