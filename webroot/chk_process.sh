#!/bin/bash
while true
do
if pgrep -f php server.php > /dev/null
then
    echo  "Running : $(date)" 
else
	cd /home/drapefittest/public_html/webroot/ratchet/bin/
	nohup php server.php > ratchet_ws.log &
	echo  "Restarted : $(date)" 
fi
sleep 1;
done
