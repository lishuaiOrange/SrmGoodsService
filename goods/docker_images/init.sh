#! \bin\sh
ip=`ip addr | grep 200.7 | awk '{print $2}' | awk -F '/' '{print $1}'`
content="host="$ip
echo -e $content > /var/www/.env