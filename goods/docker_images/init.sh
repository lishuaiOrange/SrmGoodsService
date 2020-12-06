#! \bin\sh
ip=`ip addr | grep 200.7 | awk '{print $2}' | awk -F '/' '{print $1}'`
content="HOST="$ip"\n"
while getopts "t:ip:p" opt;
do
    case $opt in
    t)
        content=$content"CONSUL_CHECK_TYPE="$OPTARG"\n"
      ;;
    ip)
        content=$content"CONSUL_CHECK_IP="$OPTARG"\n"
      ;;
    p)
        content=$content"CONSUL_CHECK_PORT="$OPTARG"\n"
      ;;
    esac
done

echo -e $content > /var/www/.env
