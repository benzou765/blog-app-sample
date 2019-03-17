#!/bin/sh

LIST=`docker ps --format "{{.Names}}"`

echo "アクセスするdocker machineを選択してください"
select NAME in ${LIST}
do
    docker exec -it ${NAME} /bin/sh
    break
done
