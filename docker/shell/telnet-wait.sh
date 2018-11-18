telnet_counter=0

until [ ! $telnet_counter -lt 12 ] || telnet $TELNET_HOST $TELNET_PORT
do
    echo "Waiting for telnet connection..."
    # increase the counter
    let telnet_counter+=1
    # wait for 5 seconds before check again
    sleep 5
done

echo "Connection to $TELNET_HOST succesfull"