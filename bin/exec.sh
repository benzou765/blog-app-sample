#!/bin/sh

LIST=`docker ps --format "{{.Names}}"`

select NAME in ${LIST}
do
    docker exec -it ${NAME} /bin/sh
    break
done
