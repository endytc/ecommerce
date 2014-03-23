#!/bin/sh

# smfpd is a parallel port handling daemon. It needs root privileges
# to use iopl(2), inb(2) and outb(2) system calls.
#
# smfpd uses inet domain socket, this script should be run
# after network initialization.
#
# This script is a part of Unified Linux Driver package.
# If your MFP device is not connected to LPT port, you can safely
# disable execution of this script - uncomment 'exit 0' at the next line.
# exit 0

SMFPD=/usr/sbin/smfpd
test -x $SMFPD || exit 5

PATH=/usr/sbin:/sbin:/usr/bin:/bin
SMFPD=smfpd

PROCESS_PID=`ps ax | grep "[0-9]:[0-9][0-9] $SMFPD" | awk '{print $1}'`

case "$1" in
	check)
		if test -z "$PROCESS_PID"; then
			echo "Process is not running"
		else
			echo "Process $SMFPD[$PROCESS_PID] is running"
		fi
	;;
	start)
		if test -z "$PROCESS_PID"; then
			echo -n "Starting smfpd daemon ... "
			$SMFPD
			echo "done"
			$0 check
		else
			echo "Process $SMFPD[$PROCESS_PID] is already running"
		fi
	;;
	stop)
		if test -n "$PROCESS_PID"; then
			echo -n "Stopping smfpd daemon ... "
			kill -TERM $PROCESS_PID
			echo "done"
		else
			echo "Process is not running"
		fi
	;;
	restart)
		$0 stop
		sleep 1
		$0 start
	;;
	*)
		echo "Usage: $0 {check|start|stop|restart}"
		exit 1
	;;
esac

exit 0
