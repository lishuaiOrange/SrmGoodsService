#! \bin\sh
ip=`ip addr | grep 200.7 | awk '{print $2}' | awk -F '/' '{print $1}'`
content="HOST="$ip"\n"
while getopts "t:p:o:" opt;
do
    case $opt in
    t)
        type=$OPTARG
        content=$content"CONSUL_CHECK_TYPE="$type"\n"
      ;;
    p)
        ip=$OPTARG
        content=$content"CONSUL_CHECK_IP="$ip"\n"
      ;;
    o)
        port=$OPTARG
        content=$content"CONSUL_CHECK_PORT="$port"\n"
      ;;
    esac
done
#echo -e $content
echo -e $content > /var/www/.env
