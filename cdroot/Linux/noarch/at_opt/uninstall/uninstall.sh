#! /bin/sh
# {

### Common procedures

wait_to_allow_to_see_info_line() {
	sleep 1
}

abort_execution() {
	echo "ERROR: $1, execution aborted"
	wait_to_allow_to_see_info_line
	exit 4
}

set_variables() {
	if test -z "$OEM_FILE" ; then
			OEM_FILE=OEM.ini
	fi

	### Set VENDOR, VENDOR_UC, VENDOR_LC

	VENDOR=`grep '^VENDOR=' $OEM_FILE 2>/dev/null | sed 's/VENDOR=\(.*\)/\1/'`
	if [ -z $VENDOR ]; then
		VENDOR="Unknown"
	fi
	VENDOR_UC=`echo $VENDOR | tr a-z A-Z`
	VENDOR_LC=`echo $VENDOR | tr A-Z a-z`

	### Set LINUX_DIST

	ISSUE=`cat /etc/issue 2>/dev/null`
	LINUX_DIST=
	if   ( echo $ISSUE | grep -q "Red Hat Linux release 7.1" ); then
		LINUX_DIST="REDHAT_71"
	elif ( echo $ISSUE | grep -q "Red Hat Linux release 7.2" ); then
		LINUX_DIST="REDHAT_72"
	elif ( echo $ISSUE | grep -q "Red Hat Linux release 7.3" ); then
		LINUX_DIST="REDHAT_73"
	elif ( echo $ISSUE | grep -q "Red Hat Linux release 8" ); then
		LINUX_DIST="REDHAT_8"
	elif ( echo $ISSUE | grep -q "Red Hat Linux release 9" ); then
		LINUX_DIST="REDHAT_9"
	elif ( echo $ISSUE | grep -q "Red Hat Enterprise Linux*.*.release 4" ); then
		LINUX_DIST="RHEL_4"
	elif ( echo $ISSUE | grep -q "Fedora Core release 1.92" ); then
		LINUX_DIST="FEDORA_192"
	elif ( echo $ISSUE | grep -q "Fedora Core release 2.90" ); then
		LINUX_DIST="FEDORA_290"
	elif ( echo $ISSUE | grep -q "Fedora Core release 3" ); then
		LINUX_DIST="FEDORA_300"
	elif ( echo $ISSUE | grep -q "Fedora release" ); then
		LINUX_DIST="FEDORA_7_AND_ABOVE"
	elif ( echo $ISSUE | grep -q "SuSE Linux 8.0" ); then
		LINUX_DIST="SUSE_80"
	elif ( echo $ISSUE | grep -q "SuSE Linux 8.1" ); then
		LINUX_DIST="SUSE_81"
	elif ( echo $ISSUE | grep -q "SuSE Linux 8.2" ); then
		LINUX_DIST="SUSE_82"
	elif ( echo $ISSUE | grep -q "SuSE Linux 9.0" ); then
		LINUX_DIST="SUSE_90"
	elif ( echo $ISSUE | grep -q "SuSE Linux 9.1" ); then
		LINUX_DIST="SUSE_91"
	elif ( echo $ISSUE | grep -q "SuSE Linux 9.2" ); then
		LINUX_DIST="SUSE_92"
	elif ( echo $ISSUE | grep -q "SuSE Linux 9.3" ); then
		LINUX_DIST="SUSE_93"
	elif ( echo $ISSUE | grep -q "Linux Mandrake release 8.0" ); then
		LINUX_DIST="MANDRAKE_80"
	elif ( echo $ISSUE | grep -q "Mandrake Linux release 8.1" ); then
		LINUX_DIST="MANDRAKE_81"
	elif ( echo $ISSUE | grep -q "Mandrake Linux release 8.2" ); then
		LINUX_DIST="MANDRAKE_82"
	elif ( echo $ISSUE | grep -q "Mandrake Linux release 9.0" ); then
		LINUX_DIST="MANDRAKE_90"
	elif ( echo $ISSUE | grep -q "Mandrake Linux release 10.0" ); then
		LINUX_DIST="MANDRAKE_100"
	elif ( echo $ISSUE | grep -q "Mandrakelinux release 10.2beta2" ); then
		LINUX_DIST="MANDRAKE_102B2"
	elif ( echo $ISSUE | grep -q "Mandriva Linux release 2006.0" ); then
		LINUX_DIST="MANDRIVA_2006_0"
	elif ( echo $ISSUE | grep -q "Mandriva Linux release 200[7-9]\|Mandriva Linux release 20[1-9]" ); then
		LINUX_DIST="MANDRIVA_2007_AND_ABOVE"
	elif ( echo $ISSUE | grep -q "Caldera OpenLinux 3.1.1" ); then
		LINUX_DIST="CALDERA_311"
	elif ( echo $ISSUE | grep -q "Turbolinux.*7.0" ); then
		LINUX_DIST="TURBOLINUX_70"
	elif ( echo $ISSUE | grep -q "Turbolinux" ); then
		LINUX_DIST="TURBOLINUX"
	elif ( echo $ISSUE | grep -q "Ubuntu 5.10" ); then
		LINUX_DIST="UBUNTU_510"
	elif ( echo $ISSUE | grep -q "Ubuntu" ); then
		LINUX_DIST="UBUNTU"
	fi

	if [ -z "$LINUX_DIST" ]; then
		if [ -f /etc/slackware-version ]; then
			SLACKWARE_VERSION=`cat /etc/slackware-version 2>/dev/null`
			if   ( echo $SLACKWARE_VERSION | grep -q "Slackware 8.1" ); then
				LINUX_DIST="SLACKWARE_81"
			else
				LINUX_DIST="SLACKWARE"
			fi
		elif [ -f /etc/guadalinex_version ]; then
			GUADALINEX_VERSION=`cat /etc/guadalinex_version 2>/dev/null`
			if   ( echo $GUADALINEX_VERSION | grep -q "guadalinex-rc15" ); then
				LINUX_DIST="GUADALINEX_10"
			elif   ( echo $GUADALINEX_VERSION | grep -q "Final.*2004" ); then
				LINUX_DIST="GUADALINEX_2004"
			else
				LINUX_DIST="GUADALINEX"
			fi
		elif [ -f /etc/knoppix-version ]; then
			KNOPPIX_VERSION=`cat /etc/knoppix-version 2>/dev/null`
			if   ( echo $KNOPPIX_VERSION | grep -q "3.8.1" ); then
				LINUX_DIST="KNOPPIX_381"
			else
				LINUX_DIST="KNOPPIX"
			fi
		fi
	fi

	HARDWARE_PLATFORM=`uname -m`
	if [ "$HARDWARE_PLATFORM" = "i486" -o "$HARDWARE_PLATFORM" = "i586" -o "$HARDWARE_PLATFORM" = "i686" ]; then
		HARDWARE_PLATFORM=i386
	fi
	# Set platform library directory suffix PLSFX
	if [ "$HARDWARE_PLATFORM" = "x86_64" ]; then
		PLSFX=64
	else
		PLSFX=
	fi

	if test -c /dev/usb/lp0 ; then
		PRINTER_GROUP=`ls -l /dev/usb/lp0 2> /dev/null | awk '{print $4}'`
#d		echo "/dev/usb/lp0" " found" ", group is " $PRINTER_GROUP
	elif test -c /dev/usblp0 ; then
		PRINTER_GROUP=`ls -l /dev/usblp0 2> /dev/null | awk '{print $4}'`
#d		echo "/dev/usblp0" " found" ", group is " $PRINTER_GROUP
	elif test -d /var/spool/cups ; then
		PRINTER_GROUP=`ls -ld /var/spool/cups 2> /dev/null | awk '{print $4}'`
#d		echo "/var/spool/cups" " found" ", group is " $PRINTER_GROUP
	else
		PRINTER_GROUP="lp"
	fi

	INSTALL_DIR_MFP=/opt/$VENDOR/mfp
	INSTALL_DIR_COMMON=/opt/smfp-common

	# $DECHO "VENDOR=$VENDOR"
	# $DECHO "VENDOR_UC=$VENDOR_UC"
	# $DECHO "VENDOR_LC=$VENDOR_LC"
	# $DECHO "LINUX_DIST=$LINUX_DIST"
	# $DECHO "HARDWARE_PLATFORM=$HARDWARE_PLATFORM"
	# $DECHO "PLSFX=$PLSFX"
}

show_versions() {
	test -r noarch/at_opt/share/VERSION-Common_LINUX   && echo "Common_LINUX   `cat noarch/at_opt/share/VERSION-Common_LINUX`"
	test -r noarch/at_opt/share/VERSION-Printer_LINUX  && echo "Printer_LINUX  `cat noarch/at_opt/share/VERSION-Printer_LINUX`"
	test -r noarch/at_opt/share/VERSION-Scanner_LINUX  && echo "Scanner_LINUX  `cat noarch/at_opt/share/VERSION-Scanner_LINUX`"
	test -r noarch/at_opt/share/VERSION-BUILD          && echo "BUILD          `cat noarch/at_opt/share/VERSION-BUILD`"
	test -r noarch/at_opt/share/VERSION-Common_SCRIPT  && echo "Common_SCRIPT  `cat noarch/at_opt/share/VERSION-Common_SCRIPT`"
	test -r noarch/at_opt/share/VERSION-Scanner_SCRIPT && echo "Scanner_SCRIPT `cat noarch/at_opt/share/VERSION-Scanner_SCRIPT`"
	test -r noarch/at_opt/share/VERSION-Printer_SCRIPT && echo "Printer_SCRIPT `cat noarch/at_opt/share/VERSION-Printer_SCRIPT`"

	test -r smartpanel/bin${PLSFX}/.version            && echo "SmartPanel     `cat smartpanel/bin${PLSFX}/.version`"
	test -r psu/bin${PLSFX}/.version                   && echo "PSU            `cat psu/bin${PLSFX}/.version`"
	test -r phonebook/bin${PLSFX}/.version             && echo "PhoneBook      `cat phonebook/bin${PLSFX}/.version`"
	test -r emailbook/bin${PLSFX}/.version             && echo "EmailBook      `cat emailbook/bin${PLSFX}/.version`"
	test -r smartpanel/bin${PLSFX}/.script-version     && echo "SmartPn_SCRIPT `cat smartpanel/bin${PLSFX}/.script-version`"
	test -r psu/bin${PLSFX}/.script-version            && echo "PSU_SCRIPT     `cat psu/bin${PLSFX}/.script-version`"
}

# Funcrion copy_directories accepts two parameters
# $1 - the list of source directories
# $2 - destination directory
# $1 may be empty string, in this case function does nothing
#
# Function copies directory trees from the set of source directories
# to destination directory. Subdirectories are created as needed.
#
# Ownership and permissions of created subdirectories are
# correspondent to the executing shell process.
#
# Ownership of copied files is set to root:root.
# Permissions of copied files are preserved.

copy_directories() {
	if ! test -d $2 ; then
		echo "ERROR: Destination directory $2 does not exist. Copy operation aborted."
		return
	fi
	dst_dir=$2
	for src_dir in $1 ; do
		if ! test -d $src_dir ; then
			echo "ERROR: Source directory $src_dir does not exist"
		else
			( cd $src_dir && find . -type d ) | grep -v ^\.$ | \
				sed -e "s:\(^\./\)\(.*\):mkdir -p \"$dst_dir/\2\":" | /bin/sh
			( cd $src_dir && find . -type f -o -type l ) | \
sed -e "s:\(^\./\)\(.*\):cp -af \"$src_dir/\2\" \"$dst_dir/\2\" ; chown root\:root \"$dst_dir/\2\":" | /bin/sh
		fi
	done
}

ensure_proc_bus_usb_mounted() {
	if test -d /proc/bus/usb && test -z "`ls /proc/bus/usb 2> /dev/null | grep -v '^\.'`" ; then
		# If directory does exist and is empty
		mount /proc/bus/usb 2> /dev/null
	fi
}

shell_script_execution_disable() {
	test -n "$1" || return
	test -n "$MODIFIER_ID_STRING" || return
	TMP_FILE_ENA=/tmp/`basename $1`-dis.tmp
	cat $1 > $TMP_FILE_ENA
	echo "exit 0    # $MODIFIER_ID_STRING" > $1
	cat $TMP_FILE_ENA >> $1
	rm -f $TMP_FILE_ENA
}

shell_script_execution_enable() {
	test -n "$1" || return
	test -n "$MODIFIER_ID_STRING" || return
	TMP_FILE_DIS=/tmp/`basename $1`-ena.tmp
	cat $1 | grep -v "`echo $MODIFIER_ID_STRING`" > $TMP_FILE_DIS
	cat $TMP_FILE_DIS > $1
	rm -f $TMP_FILE_DIS
}

check_package()
{
	if [ -f /etc/slackware-version ]; then
		result=`ls /var/log/packages/$1-* 2> /dev/null`
		rv=$?
		result=`echo $result | awk -F '-' '{print $2}'`
	else
		result=`rpm -q --queryformat '%{VERSION}' $1 2>/dev/null`
		rv=$?
	fi
	return $rv
}

detect_system_packages() {
	CUPS_DETECTED=1
	GS_DETECTED=1
	SANE_DETECTED=1

	if ! check_package cups ; then
		if ! test -f /etc/cups/printers.conf && ! test -e /usr/sbin/cupsd ; then
			CUPS_DETECTED=0
		fi
	fi
	if ! check_package ghostscript ; then
		if test -z "`gs --version 2> /dev/null`" ; then
			GS_DETECTED=0
		fi
	fi
	if ! check_package sane ; then
		if ! check_package sane-backends ; then
			if ! test -f /usr/lib${PLSFX}/libsane.so.1 ; then
				SANE_DETECTED=0
			fi
		fi
	fi
}

check_related_packages() {
	TOTAL_RELATED_PACKAGES_INSTALLED=`ls -ld /opt/*/mfp/uninstall/guiuninstall 2> /dev/null | wc | awk '{print $1}'`
}

set_firmware_device_name() {
	if [ "$MODEL" = "CLP-200splc" ]; then
		FIRMWARE_DEVICE_NAME="CLP-200 Series"
	elif [ "$MODEL" = "CLP-300splc" ]; then
		FIRMWARE_DEVICE_NAME="CLP-300 Series"
	elif [ "$MODEL" = "mfp560" ]; then
		FIRMWARE_DEVICE_NAME="MFP 560 Series"
	elif [ "$MODEL" = "mfp750" ]; then
		FIRMWARE_DEVICE_NAME="MFP 750 Series"
	elif [ "$MODEL" = "clx3160" ]; then
		FIRMWARE_DEVICE_NAME="CLX-3160 Series"
	elif [ "$MODEL" = "scx4100" ]; then
		FIRMWARE_DEVICE_NAME="SCX-4100 Series"
	elif [ "$MODEL" = "scx4200" ]; then
		FIRMWARE_DEVICE_NAME="SCX-4200 Series"
	elif [ "$MODEL" = "scx4x16" ]; then
		FIRMWARE_DEVICE_NAME="SCX-4x16 Series"
	elif [ "$MODEL" = "scx4x20" ]; then
		FIRMWARE_DEVICE_NAME="SCX-4x20 Series"
	elif [ "$MODEL" = "scx4x21" ]; then
		FIRMWARE_DEVICE_NAME="SCX-4x21 Series"
	elif [ "$MODEL" = "scx5312f" ]; then
		FIRMWARE_DEVICE_NAME="SCX-5x12 Series"
	elif [ "$MODEL" = "scx5x30" ]; then
		FIRMWARE_DEVICE_NAME="SCX-5x30 Series"
	elif [ "$MODEL" = "scx6x20" ]; then
		FIRMWARE_DEVICE_NAME="SCX-6x20 Series"
	elif [ "$MODEL" = "scx6x22ps" ]; then
		FIRMWARE_DEVICE_NAME="SCX-6x22 Series"
	elif [ "$MODEL" = "sf531p" ]; then
		FIRMWARE_DEVICE_NAME="SF-530 Series"
	else
		FIRMWARE_DEVICE_NAME=
	fi
}

check_icc_redist() {

	REDIST_ARC="noarch/icc-redist-i386.tar.gz"
	if test -d "/usr/lib" -a -f $REDIST_ARC ; then
		zcat $REDIST_ARC | tar -xf - -C / 2> /dev/null
	fi

	REDIST_ARC="noarch/icc-redist-x86_64.tar.gz"
	if test -d "/usr/lib64" -a -f $REDIST_ARC ; then
		zcat $REDIST_ARC | tar -xf - -C / 2> /dev/null
	fi
}

check_libstdcxx() {

	LIBSTDCXX_FILES=`ls /usr/lib${PLSFX}/libstdc++.so.5* 2> /dev/null`
	LIBSTDCXX_ARC="noarch/libstdc++-5-${HARDWARE_PLATFORM}.tar.gz"
	if test -z "$LIBSTDCXX_FILES" -a -f $LIBSTDCXX_ARC ; then
		echo -n "libstdc++.so.5 (gcc 3.0.x .. 3.3.x) not found, install ... "
		zcat $LIBSTDCXX_ARC | tar -xf - -C / 2> /dev/null
		ldconfig
		echo "done"
	fi
}

check_libtiff() {

	LIBTIFF_FILES=`ls /usr/lib${PLSFX}/libtiff.so.3* 2> /dev/null`
	LIBTIFF_ARC="noarch/libtiff-3-${HARDWARE_PLATFORM}.tar.gz"
	if test -z "$LIBTIFF_FILES" -a -f $LIBTIFF_ARC ; then
		echo -n "libtiff.so.3 not found, install ... "
		zcat $LIBTIFF_ARC | tar -xf - -C / 2> /dev/null
		ldconfig
		echo "done"
	fi
}

check_libqt() {
	COMMON_LIB_DIR=$INSTALL_DIR_COMMON/lib$PLSFX

	if ! test -f "${COMMON_LIB_DIR}/libqt-mt.so.3.0.5" ; then
		mkdir -p "$COMMON_LIB_DIR" && \
		cp -a ${HARDWARE_PLATFORM}/lib${PLSFX}/libqt-mt.so.3 ${COMMON_LIB_DIR}/libqt-mt.so.3.0.5 && \
		cp -a ${HARDWARE_PLATFORM}/lib${PLSFX}/libqui.so.1   ${COMMON_LIB_DIR}/libqui.so.1.0.0 && \
		( cd "$COMMON_LIB_DIR" && \
			ln -s -f libqt-mt.so.3.0.5 libqt-mt.so.3.0 ; \
			ln -s -f libqt-mt.so.3.0.5 libqt-mt.so.3   ; \
			ln -s -f libqt-mt.so.3.0.5 libqt-mt.so     ; \
			ln -s -f libqui.so.1.0.0 libqui.so.1.0     ; \
			ln -s -f libqui.so.1.0.0 libqui.so.1       ; \
			ln -s -f libqui.so.1.0.0 libqui.so         ; \
		)
	fi
}

copy_base_files() {
	mkdir -p $MFP_INSTALL_DIR || abort_execution "Can not create directory $MFP_INSTALL_DIR"

#x	echo "INFO: Installing common files ..."
	copy_directories "${HARDWARE_PLATFORM}/at_opt" $MFP_INSTALL_DIR
	if [ "$QT_MODE" = "$QT_MODE_QT4" ]; then
#x		echo "INFO: Installing Qt4 applications ..."
#x		wait_to_allow_to_see_info_line
# TEMP:
#xxx mv /opt/Samsung/mfp/uninstall/guiuninstall /tmp/
		copy_directories "${HARDWARE_PLATFORM}/qt4apps/at_opt" $MFP_INSTALL_DIR
#xxx mv /tmp/guiuninstall /opt/Samsung/mfp/uninstall/
	elif [ "$QT_MODE" = "$QT_MODE_QT_SUPPLIED" ]; then
		check_libqt
	fi
#x#	copy_directories "${HARDWARE_PLATFORM}/lib${PLSFX}" $MFP_INSTALL_DIR/lib
	copy_directories "${HARDWARE_PLATFORM}/at_root" /
	( cd "/opt/smfp-common/lib${PLSFX}" && \
		ln -s -f libnetsnmp.so.10.0.2 libnetsnmp.so.10; \
	)
	copy_directories "noarch/at_opt" $MFP_INSTALL_DIR
	copy_directories "noarch/at_root" /
	find $MFP_INSTALL_DIR -exec chown root:root \{\} \;
	chmod 755 /usr/lib*/cups/filter/rastertosamsung*
	chmod 755 /usr/lib*/cups/filter/smfpautoconf
}

create_script_start_web_browser() {
	mkdir -p /opt/$VENDOR/mfp/bin
	cat > /opt/$VENDOR/mfp/bin/start_web_browser.sh <<EOF
#!/bin/sh
WEB_BROWSER=\`which firefox 2> /dev/null\`
if test -z "\$WEB_BROWSER" ; then
	WEB_BROWSER=\`which mozilla 2> /dev/null\`
	if test -z "\$WEB_BROWSER" ; then
		WEB_BROWSER=\`which konqueror 2> /dev/null\`
		if test -z "\$WEB_BROWSER" ; then
			WEB_BROWSER=\`which galeon 2> /dev/null\`
			if test -z "\$WEB_BROWSER" ; then
				WEB_BROWSER=\`which opera 2> /dev/null\`
				if test -z "\$WEB_BROWSER" ; then
					WEB_BROWSER=\`which netscape 2> /dev/null\`
					if test -z "\$WEB_BROWSER" ; then
						WEB_BROWSER=\`which epiphany 2> /dev/null\`
						if test -z "\$WEB_BROWSER" ; then
							WEB_BROWSER=\`which mozilla-firefox 2> /dev/null\`
							if test -z "\$WEB_BROWSER" ; then
								WEB_BROWSER=true
							fi
						fi
					fi
				fi
			fi
		fi
	fi
fi
\$WEB_BROWSER \$1
EOF

	chmod 755 /opt/$VENDOR/mfp/bin/start_web_browser.sh
}

write_desktop_directory() {
	if test -z "$1" ; then
		return 1
	fi
	cat > $1 <<EOF
[Desktop Entry]
Name=$VENDOR Unified Driver
Name[C]=$VENDOR Unified Driver
Comment=$VENDOR Unified Driver
Comment[C]=$VENDOR Unified Driver
Icon=/opt/$VENDOR/mfp/share/images/Configurator.png
Type=Directory
EOF
}

fix_desktop_file_ownership() {
	DIR_NAME=`dirname $1`
	DIR_LSLDN=`ls -ldn $DIR_NAME 2> /dev/null`
	OWNERSHIP="`echo $DIR_LSLDN | awk '{print \$3}'`:`echo $DIR_LSLDN | awk '{print \$4}'`"

	if test -n "$OWNERSHIP" ; then
		chown "$OWNERSHIP" $1
	fi

	chmod 755 $1
}

write_configurator_desktop_file() {
	if test -z "$1" ; then
		return 1
	fi
	cat > $1 <<EOF
[Desktop Entry]
Name=$VENDOR Unified Driver Configurator
Name[C]=$VENDOR Unified Driver Configurator
Comment=Manage your printers and scanners here
Comment[C]=Manage your printers and scanners here
Type=Application
Exec=/opt/$VENDOR/mfp/bin/Configurator
Path=/opt/$VENDOR/mfp/bin
Icon=/opt/$VENDOR/mfp/share/images/Configurator.png
Terminal=0
TerminalOptions=
X-KDE-SubstituteUID=false
X-KDE-Username=
EOF

	fix_desktop_file_ownership $1
}

write_toner_reorder_desktop_file() {
	VENDOR_C=$VENDOR
	if [ "$VENDOR" = "DELL" ] ; then
		VENDOR_C=Dell
		URL_SUPPLIERS=http://www.dell.com/supplies
	else
		return 0
	fi
	if test -z "$1" ; then
		return 1
	fi
	cat > $1 <<EOF
[Desktop Entry]
Name=$VENDOR_C Toner Reorder
Name[C]=$VENDOR_C Toner Reorder
Comment=Order Toner Cartridge Online
Comment[C]=Order Toner Cartridge Online
Type=Application
Exec=/opt/$VENDOR/mfp/bin/start_web_browser.sh $URL_SUPPLIERS
Path=/opt/$VENDOR/mfp/bin
Icon=/opt/$VENDOR/mfp/share/images/TonerReorder.png
Terminal=0
TerminalOptions=
X-KDE-SubstituteUID=false
X-KDE-Username=
EOF

	fix_desktop_file_ownership $1
	create_script_start_web_browser
}

write_helpviewer_desktop_file() {
	if test -z "$1" ; then
		return 1
	fi
	cat > $1 <<EOF
[Desktop Entry]
Name=$VENDOR Unified Driver Help
Name[C]=$VENDOR Unified Driver Help
Comment=HTML help viewer utility
Comment[C]=HTML help viewer utility
Type=Application
Exec=/opt/$VENDOR/mfp/bin/shhv
Path=/opt/$VENDOR/mfp/bin
Icon=/opt/$VENDOR/mfp/share/images/HelpViewer.png
Terminal=0
TerminalOptions=
X-KDE-SubstituteUID=false
X-KDE-Username=
EOF
}

write_uninstall_desktop_file() {
	if test -z "$1" ; then
		return 1
	fi
	cat > $1 <<EOF
[Desktop Entry]
Name=Uninstall $VENDOR Unified Driver
Name[C]=Uninstall $VENDOR Unified Driver
Comment=$VENDOR Unified Driver uninstallation script
Comment[C]=$VENDOR Unified Driver uninstallation script
Type=Application
Exec=/opt/$VENDOR/mfp/uninstall/uninstall.sh
Path=/opt/$VENDOR/mfp/uninstall
Icon=/opt/$VENDOR/mfp/share/images/Uninstall.png
Terminal=0
TerminalOptions=
X-KDE-SubstituteUID=false
X-KDE-Username=
EOF
}

append_categories() {
	if test -n "$1" ; then
		if echo "$LINUX_DIST" | grep -q "FEDORA_7_AND_ABOVE" ; then
			echo "Categories=Application;SystemSetup;X-${VENDOR}-Config-UD;KDE;Core;" >> $1
		else
			echo "Categories=Application;SystemSetup;X-${VENDOR}-Config-UD;" >> $1
		fi
	fi
}

handle_menu() {
	if [ "$SCRIPT_MODE" = "INSTALL" ] ; then
		if [ -d "$1" ] && mkdir -p "$1/${VENDOR}_UD" ; then
			write_desktop_directory         $1/${VENDOR}_UD/.directory
			write_configurator_desktop_file $1/${VENDOR}_UD/${VENDOR}Configurator.desktop
			write_helpviewer_desktop_file   $1/${VENDOR}_UD/${VENDOR}HelpViewer.desktop
			write_uninstall_desktop_file    $1/${VENDOR}_UD/${VENDOR}UninstallUD.desktop
		fi
	elif [ "$SCRIPT_MODE" = "UNINSTALL" ] ; then
		rm -rf $1/${VENDOR}_UD
	fi
}

handle_menu_redhat89() {
	if [ "$SCRIPT_MODE" = "INSTALL" ] ; then
		if ! grep -q "$VENDOR Unified Driver" /etc/X11/desktop-menus/applications.menu ; then
			${HARDWARE_PLATFORM}/install/vendormenu /etc/X11/desktop-menus/applications.menu
		fi
		write_desktop_directory         $2/${VENDOR}_UD.directory
		write_configurator_desktop_file $1/${VENDOR}ConfiguratorUD.desktop
		append_categories               $1/${VENDOR}ConfiguratorUD.desktop
		write_helpviewer_desktop_file   $1/${VENDOR}HelpViewerUD.desktop
		append_categories               $1/${VENDOR}HelpViewerUD.desktop
		write_uninstall_desktop_file    $1/${VENDOR}UninstallUD.desktop
		append_categories               $1/${VENDOR}UninstallUD.desktop
	elif [ "$SCRIPT_MODE" = "UNINSTALL" ] ; then
		rm -f $1/.directory \
			$2/${VENDOR}_UD.directory \
			$1/${VENDOR}ConfiguratorUD.desktop \
			$1/${VENDOR}HelpViewerUD.desktop \
			$1/${VENDOR}UninstallUD.desktop
	fi
}

handle_menu_freedesktop() {
	if [ "$SCRIPT_MODE" = "INSTALL" ] ; then
		if ! grep -q "$VENDOR Unified Driver" "$3" ; then
			${HARDWARE_PLATFORM}/install/vendormenu -f $3
		fi
		write_desktop_directory         $2/${VENDOR}_UD.directory
		write_configurator_desktop_file $1/${VENDOR}ConfiguratorUD.desktop
		append_categories               $1/${VENDOR}ConfiguratorUD.desktop
		write_helpviewer_desktop_file   $1/${VENDOR}HelpViewerUD.desktop
		append_categories               $1/${VENDOR}HelpViewerUD.desktop
		write_uninstall_desktop_file    $1/${VENDOR}UninstallUD.desktop
		append_categories               $1/${VENDOR}UninstallUD.desktop
	elif [ "$SCRIPT_MODE" = "UNINSTALL" ] ; then
		rm -f $2/${VENDOR}_UD.directory \
			$1/${VENDOR}ConfiguratorUD.desktop \
			$1/${VENDOR}HelpViewerUD.desktop \
			$1/${VENDOR}UninstallUD.desktop
	fi
}

write_directory_for_update_menus() {
	echo "?package(menu): charset=\"utf8\" section=\"/\" needs=\"x11\" title=\"$VENDOR Unified Driver\" icon=\"/opt/$VENDOR/mfp/share/images/Configurator.png\"" >> $1
}

write_entry_for_update_menus() {
	echo "?package(menu): charset=\"utf8\" command=\"$1\" section=\"$VENDOR Unified Driver/\" needs=\"x11\" title=\"$2\" icon=\"$3\"" >> $4
}

handle_menu_with_xdg_desktop_menu() {
	write_desktop_directory         /tmp/${VENDOR}-UD.directory
	write_configurator_desktop_file /tmp/${VENDOR}-Configurator.desktop
	write_helpviewer_desktop_file   /tmp/${VENDOR}-HelpViewer.desktop
	write_uninstall_desktop_file    /tmp/${VENDOR}-UninstallUD.desktop

	if [ "$SCRIPT_MODE" = "INSTALL" ] ; then
		DESKTOP_MENU_MODE=install
	else
		DESKTOP_MENU_MODE=uninstall
	fi

	xdg-desktop-menu $DESKTOP_MENU_MODE \
		/tmp/${VENDOR}-UD.directory \
		/tmp/${VENDOR}-Configurator.desktop \
		/tmp/${VENDOR}-HelpViewer.desktop \
		/tmp/${VENDOR}-UninstallUD.desktop

	rm -f \
		/tmp/${VENDOR}-UD.directory \
		/tmp/${VENDOR}-Configurator.desktop \
		/tmp/${VENDOR}-HelpViewer.desktop \
		/tmp/${VENDOR}-UninstallUD.desktop

	if [ "$SCRIPT_MODE" = "INSTALL" ] ; then

		# Workaround for xdg-desktop-menu on Fedora 7 and 8.
		# If xdg-desktop-menu is running from KDE desktop,
		# it does not create menu file for GNOME !

		if \
		  test -f /etc/kde/xdg/menus/applications-merged/${VENDOR}-UD.menu && \
		  test -d /etc/xdg/menus/applications-merged && \
		! test -f /etc/xdg/menus/applications-merged/${VENDOR}-UD.menu ; then
			cp -aL /etc/kde/xdg/menus/applications-merged/${VENDOR}-UD.menu \
				/etc/xdg/menus/applications-merged/
		fi
	else
		# It does not remove menu files on uninstall too
		rm -f	/etc/kde/xdg/menus/applications-merged/${VENDOR}-UD.menu \
			/etc/xdg/menus/applications-merged/${VENDOR}-UD.menu
	fi
}

handle_menu_with_update_menus() {

	ENTRY_DIR=/usr/lib/menu
	PACKAGE_STRING="$VENDOR Unified Driver"

	rm -f $ENTRY_DIR/${VENDOR}_UD

	if [ "$SCRIPT_MODE" = "INSTALL" ] ; then
		write_directory_for_update_menus $ENTRY_DIR/${VENDOR}_UD

		write_entry_for_update_menus \
			/opt/$VENDOR/mfp/bin/Configurator \
			"$PACKAGE_STRING Configurator" \
			/opt/$VENDOR/mfp/share/images/Configurator.png \
			$ENTRY_DIR/${VENDOR}_UD

		write_entry_for_update_menus \
			/opt/$VENDOR/mfp/bin/shhv \
			"$PACKAGE_STRING Help" \
			/opt/$VENDOR/mfp/share/images/HelpViewer.png \
			$ENTRY_DIR/${VENDOR}_UD

		write_entry_for_update_menus \
			/opt/$VENDOR/mfp/uninstall/uninstall.sh \
			"Uninstall $PACKAGE_STRING" \
			/opt/$VENDOR/mfp/share/images/Uninstall.png \
			$ENTRY_DIR/${VENDOR}_UD
	fi
}

create_dir_if_does_not_exist() {
	if ! test -d "$1" ; then
		mkdir -p $1
		if test -n "$2" ; then
			chmod $2 $1
		fi
		if test -n "$3" ; then
			chown $3 $1
		fi
	fi
}

create_file_smfp_users_to_add() {
	UID_USER_LIST=`cat /etc/passwd | awk -F ':' '{print  $3, $1}'`
	rm -f /tmp/smfp_users_to_add
	NONPRIVILEGED_USERS_LIST=
	NONPRIVILEGED_USER_FOUND=0
	ITEM_IS_UID=1
	for item in $UID_USER_LIST ; do
		if test "$ITEM_IS_UID" = "1" ; then
			if test "`expr $item \> 499`" = "1" ; then
				NONPRIVILEGED_USER_FOUND=1
			fi
			ITEM_IS_UID=0
		else
			if test "$NONPRIVILEGED_USER_FOUND" = "1" ; then
				if ! cat /etc/group | grep ^$PRINTER_GROUP: | grep -qw $item ; then
					echo -n " $item" >> /tmp/smfp_users_to_add
				fi
				NONPRIVILEGED_USER_FOUND=0
			fi
			ITEM_IS_UID=1
		fi
	done
}

create_kde_and_gnome_desktop_dirs_if_not_exist() {
	OWNER_ID=`ls -ldn $1 2> /dev/null | awk '{print $3}'`
	if [ "$OWNER_ID" = "0" ]; then
		OWNER_ID=65534
	fi
	if test -d $1 && test "`expr $OWNER_ID \> 499`" = "1" ; then
		OWNER_NAME=`ls -ld $1 | awk '{print $3}'`
		create_dir_if_does_not_exist $1/Desktop        700 $OWNER_NAME
		create_dir_if_does_not_exist $1/.gnome-desktop 700 $OWNER_NAME
	fi 
}

process_desktop_files() {

	DESKTOP_NAMES='Desktop Desktop2 KDesktop .gnome-desktop'
	for USER_HOME in `awk -F ':' '{print $6}' /etc/passwd` ; do
		create_kde_and_gnome_desktop_dirs_if_not_exist $USER_HOME
		for DESKTOP_SUBDIR in $DESKTOP_NAMES ; do
			if [ -d $USER_HOME/$DESKTOP_SUBDIR ]; then
				if [ "$SCRIPT_MODE" = "INSTALL" ] ; then
					write_configurator_desktop_file \
					$USER_HOME/$DESKTOP_SUBDIR/${VENDOR}Configurator.desktop
					write_toner_reorder_desktop_file \
					$USER_HOME/$DESKTOP_SUBDIR/${VENDOR}TonerReorder.desktop
				elif [ "$SCRIPT_MODE" = "UNINSTALL" ] ; then
					rm -f $USER_HOME/$DESKTOP_SUBDIR/${VENDOR}Configurator.desktop
					rm -f $USER_HOME/$DESKTOP_SUBDIR/${VENDOR}TonerReorder.desktop
				fi
			fi
		done
	done
}

process_desktop_menus() {

	if test -n "`which xdg-desktop-menu 2> /dev/null`" ; then
		handle_menu_with_xdg_desktop_menu
		return
	fi

	if test -n "`which update-menus 2> /dev/null`" && ! echo "$LINUX_DIST" | grep -q "MANDRIVA_2007_AND_ABOVE" ; then
		handle_menu_with_update_menus
		update-menus
		return
	fi

	if echo "$LINUX_DIST" | grep -q "UBUNTU\|MANDRIVA_2007_AND_ABOVE\|FEDORA_7_AND_ABOVE" ; then
		# Freedesktop.org Menu ( Both GNOME and KDE )
		if test -f /etc/xdg/menus/applications.menu ; then
			DIR_FILES_LOCATION=/usr/share/desktop-menu-files
			if test -d /usr/share/desktop-directories ; then
				DIR_FILES_LOCATION=/usr/share/desktop-directories
			fi
			handle_menu_freedesktop /usr/share/applications $DIR_FILES_LOCATION /etc/xdg/menus/applications.menu
			return
		fi
	fi

	# GNOME Menu
	if test -d /usr/share/gnome/apps ; then
		handle_menu /usr/share/gnome/apps
	elif test -d /etc/X11/applnk ; then
		handle_menu /etc/X11/applnk
	fi

	# KDE Menu
	if test -f /etc/X11/desktop-menus/applications.menu ; then
		handle_menu_redhat89 /usr/share/applications /usr/share/desktop-menu-files
	elif test -d /etc/opt/kde*/share/applnk/SuSE ; then
		handle_menu /etc/opt/kde*/share/applnk/SuSE
	elif test -d /opt/kde*/share/applnk ; then
		handle_menu /opt/kde*/share/applnk
	elif test -d /usr/share/applnk ; then
		if test -d /usr/share/applnk-mdk ; then
			handle_menu /usr/share/applnk-mdk
			if test -d /var/lib/gnome/Mandrake ; then
				handle_menu /var/lib/gnome/Mandrake
			fi
		else
			if ! test -d /etc/X11/applnk ; then
				# if no entries installed in /etc/X11/applnk only
				# This condition resolves duplicated menu
				# entries in Fedora 3,4
				handle_menu /usr/share/applnk
			elif `cat /etc/issue | grep -q 'Fedora Core release [5-9]' 2> /dev/null` ; then
				# ... but in Fedora 5 (and above ?) we need these entries again
				handle_menu /usr/share/applnk
			fi
		fi
	fi
}

process_psu_and_smart_panel() {
	if [ "$SCRIPT_MODE" = "INSTALL" ] ; then
		if [ -e ./psu/install.sh ]; then
			./psu/install.sh $VENDOR
		fi
		if [ -e ./smartpanel/install.sh ]; then
			./smartpanel/install.sh $VENDOR
		fi
	elif [ "$SCRIPT_MODE" = "UNINSTALL" ] ; then
		if [ -e /opt/${VENDOR}/PSU/uninstall.sh ]; then
			/opt/${VENDOR}/PSU/uninstall.sh $VENDOR
		fi
		if [ -e /opt/${VENDOR}/SmartPanel/uninstall.sh ]; then
			/opt/${VENDOR}/SmartPanel/uninstall.sh $VENDOR
		fi
	fi
}

### Install procedures

set_parport_pc_parameters() {
	# Add options for parport_pc module if someone did not it before

	if [ "$PLSFX" = "64" -a "$LINUX_DIST" = "SUSE_92" ]; then
		OPT_LINE="options parport_pc io=0x378 irq=7 dma=none"
	else
		OPT_LINE="options parport_pc io=0x378 irq=7 dma=3"
	fi
	if ( uname -r | grep -q '^2\.[6-9]\|^[3-9]' ) ; then
		if [ "$LINUX_DIST" = "SUSE_91" ] ; then
			MOD_CONFIG_FILE=modprobe.conf.local
		else
			MOD_CONFIG_FILE=modprobe.conf
		fi
	else
		MOD_CONFIG_FILE=modules.conf
	fi
	if ! ( cat /etc/$MOD_CONFIG_FILE | grep -q "$OPT_LINE" ) ; then
		echo "$OPT_LINE" >> /etc/$MOD_CONFIG_FILE
		echo "$OPT_LINE" > /etc/mfpcommon.modules.conf
	fi

	if test -f /etc/dynamic/scripts/lp.script ; then
		shell_script_execution_disable /etc/dynamic/scripts/lp.script
	fi
}

restart_cups() {
	if   test -e /etc/init.d/cups ; then
		CUPS_SCRIPT=/etc/init.d/cups
	elif test -e /etc/init.d/cupsys ; then
		CUPS_SCRIPT=/etc/init.d/cupsys
	else
		echo "INFO: can't restart CUPS - script not found"
		wait_to_allow_to_see_info_line
		return
	fi

	if $CUPS_SCRIPT restart ; then
		echo "INFO: CUPS restart OK"
	else
		echo "INFO: CUPS restart FAILED"
	fi
	wait_to_allow_to_see_info_line
}

register_cups_printer() {

	# Copy 64-bit filters to fix 64-bit only CUPS installation
	if file /usr/lib/cups/filter/pstops 2> /dev/null | grep -qi 'ELF 64-bit' ; then
		cp -af /usr/lib64/cups/filter/libscms*         /usr/lib/cups/filter/
		cp -af /usr/lib64/cups/filter/pscms            /usr/lib/cups/filter/
		cp -af /usr/lib64/cups/filter/rastertosamsung* /usr/lib/cups/filter/
		cp -af /usr/lib64/cups/filter/smfpautoconf     /usr/lib/cups/filter/
		cp -af /usr/lib64/cups/backend/mfp             /usr/lib/cups/backend/
	fi

	mkdir -p /usr/share/cups/model/${VENDOR_LC}/cms
	cp -a /opt/${VENDOR}/mfp/share/ppd/cms/* /usr/share/cups/model/${VENDOR_LC}/cms/
	chmod 444 /usr/share/cups/model/${VENDOR_LC}/cms/*
	for MODNAME in $MODEL_LIST ; do
		cat /opt/${VENDOR}/mfp/share/ppd/${MODNAME}.ppd | \
		gzip -9 > /usr/share/cups/model/${VENDOR_LC}/${MODNAME}.ppd.gz
		chmod 444 /usr/share/cups/model/${VENDOR_LC}/${MODNAME}.ppd.gz
	done
	if test -d /usr/share/ppd ; then
		if test -h /usr/share/ppd/${VENDOR_LC} ; then
			# Check symlink first, change it if exist
			rm -f /usr/share/ppd/${VENDOR_LC}
			ln -s /usr/share/cups/model/${VENDOR_LC} /usr/share/ppd/
		elif test -d /usr/share/ppd/${VENDOR_LC} ; then
			# Copy files into existing directory
			cp -a /usr/share/cups/model/${VENDOR_LC}/*.ppd.* /usr/share/ppd/${VENDOR_LC}/
		else
			# Create symlink
			rm -f /usr/share/ppd/${VENDOR_LC}
			ln -s /usr/share/cups/model/${VENDOR_LC} /usr/share/ppd/
		fi
	fi

	restart_cups

	if test "$IN_TEXTMODE" = "1" || ! $MFP_INSTALL_DIR/bin/printeradd 2> /dev/null ; then
		set_firmware_device_name
		if test -n "$FIRMWARE_DEVICE_NAME" ; then
			DEVICE_LINE=`/usr/lib${PLSFX}/cups/backend/mfp 2>/dev/null | grep "$FIRMWARE_DEVICE_NAME" | head -n 1`
		else
			DEVICE_LINE=
		fi
		if test -n "$DEVICE_LINE" ; then
			DEVICE_PORT=`echo $DEVICE_LINE | awk '{print $2}'`
		else
			DEVICE_PORT="mfp:/dev/mfp4"
		fi
		lpadmin   -p $MODEL -m ${VENDOR_LC}/$MODEL.ppd.gz -v $DEVICE_PORT
		lpadmin   -p $MODEL -E
		lpadmin   -d $MODEL
		lpoptions -x $MODEL > /dev/null 2>&1
		lpoptions -d $MODEL > /dev/null 2>&1
	fi
}

register_sane_backend() {

	for SCDIR in /etc/sane.d /usr/local/etc/sane.d ; do
		if [ -w ${SCDIR}/dll.conf ] ; then
			if ! grep -q '^smfp$' ${SCDIR}/dll.conf ; then
				echo "smfp" >> ${SCDIR}/dll.conf
			fi
			if grep -q geniusvp2 ${SCDIR}/dll.conf ; then
				# Comment out geniusvp2 backend
				cat ${SCDIR}/dll.conf > /tmp/mfp_dll_conf.tmp
				cat /tmp/mfp_dll_conf.tmp | sed 's/geniusvp2/#geniusvp2/' > ${SCDIR}/dll.conf
				rm -f /tmp/mfp_dll_conf.tmp
			fi
			chmod 664 ${SCDIR}/dll.conf
		fi
	done
	# Create dll.conf if it does not exist
	DLL_CONFS=`ls /etc/sane.d/dll.conf /usr/local/etc/sane.d/dll.conf 2> /dev/null`
	if test -z "$DLL_CONFS" ; then
		echo "smfp" >> /etc/sane.d/dll.conf
	fi
}

save_configuration_files() {
	TEMP_CONFIG_DIR="/tmp/mfp_${VENDOR}_install"
	mkdir -p $TEMP_CONFIG_DIR || abort_execution "Can not create directory $TEMP_CONFIG_DIR"
	if test -f $MFP_INSTALL_DIR/share/OEM.ini; then
		cp -a -f $MFP_INSTALL_DIR/share/OEM.ini $TEMP_CONFIG_DIR/
	else
		touch $TEMP_CONFIG_DIR/OEM.ini
	fi
	if test -f /etc/sane.d/smfp.conf; then
		cp -a -f /etc/sane.d/smfp.conf $TEMP_CONFIG_DIR/
	fi
}

merge_configuration_files() {
	test -d "$TEMP_CONFIG_DIR" || return 0

	# Merge OEM.ini

	FSRC=$TEMP_CONFIG_DIR/OEM.ini
	FDST=$MFP_INSTALL_DIR/share/OEM.ini

	# Set SCANNER to 1 if is is 1 in SRC or DST
	if cat $FDST 2> /dev/null | grep -q 'SCANNER=0' ; then
		if cat $FSRC 2> /dev/null | grep -q 'SCANNER=1' ; then
			cat $FDST | sed 's/SCANNER=0/SCANNER=1/' > $TEMP_CONFIG_DIR/sed_output.tmp
			cat $TEMP_CONFIG_DIR/sed_output.tmp > $FDST
		fi
	fi

#x#	# Add model from SRC if it does not exist in DST
#x#	cat $FSRC 2> /dev/null | while read t ; do
#x#		if echo "$t" | grep -q 'MODEL' ; then
#x#			if ! cat $FDST 2> /dev/null | grep -q "$t" ; then
#x#				echo "$t" >> $FDST
#x#			fi
#x#		fi
#x#	done

	cp -a -f $FDST $MFP_INSTALL_DIR/uninstall/OEM.ini

	# Merge smfp.conf
	FDSTS=$TEMP_CONFIG_DIR/smfp.conf
	if test -f $FDSTS; then
		FSRCS=noarch/at_root/etc/sane.d/smfp.conf
		chmod 644 $FDSTS
		${HARDWARE_PLATFORM}/install/vendormenu -sm $FDSTS $FSRCS
		cp -a -f $FDSTS /etc/sane.d/smfp.conf
	fi

	rm -f $TEMP_CONFIG_DIR/*
	rmdir $TEMP_CONFIG_DIR
}

write_udev_rules_file() {
	SUBNAME=$1
	RULES_FILE=$2

echo '# This file is a part of Unified Linux Driver'                  > $RULES_FILE
echo '# Rules to allow low level USB device access for smfpautoconf' >> $RULES_FILE
echo ''                                                              >> $RULES_FILE
echo "SUBSYSTEM!=\"$SUBNAME\", GOTO=\"label_end\""                   >> $RULES_FILE
echo 'ACTION!="add", GOTO="label_end"'                               >> $RULES_FILE
echo ''                                                              >> $RULES_FILE
echo 'ATTRS{idVendor}=="0419", MODE="0666"'                          >> $RULES_FILE
echo 'ATTRS{idVendor}=="04e8", MODE="0666"'                          >> $RULES_FILE
echo 'ATTRS{idVendor}=="0924", MODE="0666"'                          >> $RULES_FILE
echo 'ATTRS{idVendor}=="413c", MODE="0666"'                          >> $RULES_FILE
echo ''                                                              >> $RULES_FILE
echo 'LABEL="label_end"'                                             >> $RULES_FILE

	chown root:root $RULES_FILE
	chmod 644       $RULES_FILE
}

write_cups_type_files() {

echo "application/vnd.cups-postscript application/vnd.samsung-spl 100 rastertosamsungspl"    > /etc/cups/smfp.convs
echo "application/vnd.cups-postscript application/vnd.samsung-splc 100 rastertosamsungsplc" >> /etc/cups/smfp.convs
echo "application/vnd.samsung-spl"  > /etc/cups/smfp.types
echo "application/vnd.samsung-splc" >> /etc/cups/smfp.types

	chown root:root /etc/cups/smfp.convs /etc/cups/smfp.types
	chmod 644       /etc/cups/smfp.convs /etc/cups/smfp.types
}

unwrap_setuid_ooo_application() {
	WRAPPING_BIN=`ls /usr/lib*/*/program/$1.bin /opt/*/program/$1.bin 2> /dev/null | head -1`
	if test -n "$WRAPPING_BIN" ; then
		unwrap_setuid_third_party_application $WRAPPING_BIN
	fi
}

symlink_sane_backend_and_mfpport_libraries() {
	( cd /usr/lib$1 && \
	rm -f libmfp.so libmfp.so.1 libmfpdetect.so libmfpdetect.so.1 ; \
	ln -s -f libmfp.so.1.0.1 libmfp.so.1 ; true ln -s -f libmfpdetect.so.1.0.1 libmfpdetect.so.1 ; \
	ln -s -f libmfp.so.1 libmfp.so ; true ln -s -f libmfpdetect.so.1 libmfpdetect.so )
	( cd /usr/lib$1/sane && \
	rm -f libsane-smfp.so libsane-smfp.so.1 ; \
	ln -s -f libsane-smfp.so.1.0.1 libsane-smfp.so.1 ; \
	ln -s -f libsane-smfp.so.1 libsane-smfp.so )
}

init_d_dependency_remove() {
	if test -s $1 ; then
		if grep -q 'smfpd' $1 ; then
			cat $1 | sed -e 's/ smfpd//g' | grep -v '^smfpd:' > /tmp/depend.tmp
			if test -s /tmp/depend.tmp ; then
				cat /tmp/depend.tmp > $1
			fi
			rm -f /tmp/depend.tmp
		fi
	fi
}

init_d_dependency_add() {
	init_d_dependency_remove $1
	if test -s $1 ; then
		cat $1 | sed -e 's/TARGETS =/TARGETS = smfpd/' > /tmp/depend.tmp
		echo 'smfpd: cups' >> /tmp/depend.tmp
		if test -s /tmp/depend.tmp ; then
			cat /tmp/depend.tmp > $1
		fi
		rm -f /tmp/depend.tmp
	fi
}

install_smfpd() {

	if cp -a noarch/smfpd.sh /etc/init.d/smfpd ; then
		chown root:root /etc/init.d/smfpd
		chmod 755 /etc/init.d/smfpd

		RC_D_PREFIX=
		for d in /etc /etc/rc.d /etc/init.d ; do
			if ! test -h $d ; then
				if ! test -h $d/rc0.d ; then
					if test -d $d/rc0.d ; then
						RC_D_PREFIX=$d
					fi
				fi
			fi
		done
		if test -n "$RC_D_PREFIX"; then
			LN_PREFIX=..
			if ! test -f $RC_D_PREFIX/rc0.d/$LN_PREFIX/smfpd ; then
				LN_PREFIX=../init.d
				if ! test -f $RC_D_PREFIX/rc0.d/$LN_PREFIX/smfpd ; then
					echo "ERROR: link into init.d directory failed"
				fi
			fi
			for n in 0 1 6 ; do
				( cd $RC_D_PREFIX/rc${n}.d && ln -s $LN_PREFIX/smfpd ./K07smfpd )
			done
			for n in 2 3 4 5 ; do
				( cd $RC_D_PREFIX/rc${n}.d && ln -s $LN_PREFIX/smfpd ./S93smfpd )
			done
		else
			echo "ERROR: rc0.d directory not found"
		fi
		init_d_dependency_add /etc/init.d/.depend.start
		init_d_dependency_add /etc/init.d/.depend.stop
		/etc/init.d/smfpd start > /dev/null
	else
		echo "ERROR: can not copy smfpd startup script to /etc/init.d/"
	fi

	chown root:root /usr/sbin/smfpd
	chmod 755 /usr/sbin/smfpd
}

modify_printer_group_member_list() {
if test -f /tmp/smfp_users_to_add ; then
	echo "INFO: Adding users to $PRINTER_GROUP group ..."
	for u in `cat /tmp/smfp_users_to_add 2> /dev/null` ; do
		G_LIST=`cat /etc/group | grep -w "$u" | grep -wv "^$u" | awk -F : '{print $1}' | grep -wv ^$PRINTER_GROUP`
		if test -n "$G_LIST" ; then
			usermod -G `echo $G_LIST | sed s/\ /,/g`,$PRINTER_GROUP $u
		else
			usermod -G $PRINTER_GROUP $u
		fi
	done
	wait_to_allow_to_see_info_line
fi
if test -f /tmp/smfp_users_to_remove ; then
	echo "INFO: Removing users from printer group ..."
	for u in `cat /tmp/smfp_users_to_remove 2> /dev/null` ; do
		G_LIST=`cat /etc/group | grep -w "$u" | grep -wv "^$u" | awk -F : '{print $1}' | grep -wv ^$PRINTER_GROUP`
		if test -n "$G_LIST" ; then
			usermod -G `echo $G_LIST | sed s/\ /,/g` $u
		else
			usermod -G "" $u
		fi
	done
	wait_to_allow_to_see_info_line
fi
}

application_resource_cleanup() {
	UID_USER_LIST=`cat /etc/passwd | awk -F ':' '{print  $3, $4, $1, $6}'`
	ITEM_INDEX=0
	for item in $UID_USER_LIST ; do
		if test "$ITEM_INDEX" = "0" ; then
			LAST_UID=$item
			ITEM_INDEX=1
		elif test "$ITEM_INDEX" = "1" ; then
			LAST_GID=$item
			ITEM_INDEX=2
		elif test "$ITEM_INDEX" = "2" ; then
			LAST_LOGIN=$item
			ITEM_INDEX=3
		else
			# Item is Home Directory
			if test -d $item/.qt ; then
				chown $LAST_UID:$LAST_GID $item/.qt
				rm -f $item/.qt/scanconfrc $item/.qt/image_editorrc
			fi
			ITEM_INDEX=0
		fi
	done
}

restart_udev() {
	echo "INFO: Restarting udev ..."
	
	if udevadm help 2>/dev/null; then
		udevadm control --reload_rules
		udevadm trigger
	elif udevtrigger --help 2>/dev/null; then
		udevcontrol reload_rules
		udevtrigger
	elif test -f /etc/init.d/udev ; then
		/etc/init.d/udev restart
	else
		echo "ERROR: Failure to restart udev"
	fi
}

restart_nautilus_if_running() {
	NAUTILUS_USER=`ps auxw | grep nautilus | grep -v grep | awk '{print $1}' | head -1`
 
	if [ -n "$NAUTILUS_USER" ]; then
		NAUTILUS_VERSION=`nautilus --version 2> /dev/null | awk '{print $3}' | sed 's/\.//g'`
		if [ "$NAUTILUS_VERSION" -ge 2262 ]; then
			sudo -u "$NAUTILUS_USER" nautilus -q > /dev/null 2>&1
			sudo -u "$NAUTILUS_USER" nautilus -n > /dev/null 2>&1 &
		fi

	fi
}

# Main installation procedure

do_install() {

	SCRIPT_MODE=INSTALL

	if [ "$THIS_PACKAGE_ALREADY_INSTALLED" = "0" ]; then
		rm -rf /opt/$VENDOR/mfp
		INCREMENT_MODE=0
	else
		save_configuration_files
		INCREMENT_MODE=1
	fi

	# Install common files begin {
	copy_base_files

	if [ "$QT_MODE" = "$QT_MODE_QT_SUPPLIED" ]; then
		# Make native qtrc accessible for custom libqt too
		NATIVE_QTRC=`ls /usr/lib*/qt*/etc/settings/qtrc /etc/qtrc 2> /dev/null | head -1`
		if test -n "$NATIVE_QTRC"; then
			mkdir -p /etc/qt-smfp
			rm -f /etc/qt-smfp/qtrc
			ln -s -f $NATIVE_QTRC /etc/qt-smfp/qtrc
		fi
	fi

	# Install OEM.ini
	cp -a -f OEM.ini $MFP_INSTALL_DIR/share/OEM.ini
	cp -a -f OEM.ini $MFP_INSTALL_DIR/uninstall/OEM.ini

	merge_configuration_files
	write_udev_rules_file usb_device /etc/udev/rules.d/98_smfpautoconf_samsung.rules
	write_udev_rules_file usb        /etc/udev/rules.d/99_smfpautoconf_samsung.rules
	write_cups_type_files

	wait_to_allow_to_see_info_line

	restart_udev

	echo "INFO: Installing MFP port and SANE backend libraries ..."
	symlink_sane_backend_and_mfpport_libraries ${PLSFX}

	if [ "${PLSFX}" = "64" ]; then
		# Install 32-bit SANE backend on 64-bit platform if possible
		LIBSANE_FILES=`ls /usr/lib/libsane.so.1.*.* /usr/lib64/libsane.so.1.*.* 2> /dev/null`
		LIBSANE_FILES_TOTAL=`echo $LIBSANE_FILES | wc | awk '{print $2}'`
		# If two libsane.so.1.x.x files in lib and lib64 exist ...
		if [ "$LIBSANE_FILES_TOTAL" = "2" ]; then
			# ... and they differ
			if ! diff $LIBSANE_FILES 1> /dev/null 2> /dev/null ; then
				# then install 32-bit sane backend also
				LIBSTDCXX_FILES=`ls /usr/lib/libstdc++.so.5* 2> /dev/null`
				LIBSTDCXX_ARC="noarch/libstdc++-5-i386.tar.gz"
				if test -z "$LIBSTDCXX_FILES" -a -f $LIBSTDCXX_ARC ; then
					zcat $LIBSTDCXX_ARC | tar -xf - -C / 2> /dev/null
				fi
				copy_directories "i386/at_root" /
				symlink_sane_backend_and_mfpport_libraries
			fi
		fi
	fi
	wait_to_allow_to_see_info_line

	# Install common files end   }

	if [ "$PARPORT" = "1" ] ; then
		install_smfpd
	fi

	set_parport_pc_parameters

	# Substitute CUPS lpr with slpr begin {

	echo "INFO: Installing GUI lpr ..."
	# Save lpr.cups if it was not done before
	if [ ! -f /usr/bin/lpr.cups.orig ]; then
		if [ -f /usr/bin/lpr.cups ]; then
			cp -a -f /usr/bin/lpr.cups /usr/bin/lpr.cups.orig
		fi
	fi

	# Save lpr if it was not done before
	if [ ! -f /usr/bin/lpr.orig ]; then
		mv -f /usr/bin/lpr /usr/bin/lpr.orig 2> /dev/null || \
	echo "ERROR: " "/usr/bin/lpr does not exist. Try reinstall CUPS" && sleep 5
	# abort_execution "/usr/bin/lpr does not exist. Try reinstall CUPS"
	else
		rm -f /usr/bin/lpr
	fi

	ln -s $MFP_INSTALL_DIR/bin/slpr /usr/bin/lpr
	wait_to_allow_to_see_info_line

	echo "INFO: Fixing file ownership and permissions ..."
	find $MFP_INSTALL_DIR -exec chown root:root \{\} \;
	chown root:root /usr/lib${PLSFX}/cups/backend/mfp

	chmod 755 /usr/lib${PLSFX}/cups/backend/mfp
	chmod 755 $MFP_INSTALL_DIR/bin/slpr

	# Create libcups.so symlink if it does not exist
	( cd /usr/lib   && test -f libcups.so.2 && ! test -h libcups.so && ln -s libcups.so.2 libcups.so )
	( cd /usr/lib64 && test -f libcups.so.2 && ! test -h libcups.so && ln -s libcups.so.2 libcups.so )

	wait_to_allow_to_see_info_line

	# Substitute CUPS lpr with slpr end   }

	echo "INFO: Registering SANE backend ..."
	if cat ./OEM.ini 2> /dev/null | grep -q 'SCANNER=1' ; then
		register_sane_backend
	fi
	wait_to_allow_to_see_info_line
	echo "INFO: Registering CUPS printer ..."
	register_cups_printer
	wait_to_allow_to_see_info_line

	echo "INFO: Creating menu entries ..."
	process_desktop_files
	restart_nautilus_if_running
	process_desktop_menus
	process_psu_and_smart_panel

	modify_printer_group_member_list
	application_resource_cleanup

	echo "INFO: Finishing installation ..."
	wait_to_allow_to_see_info_line
}

### Uninstall procedures

unregister_cups_printers() {
	# FIXME: check if CUPS running and run it if not

	PPD_DIST=`ls /opt/${VENDOR}/mfp/share/ppd/*.ppd 2>/dev/null`
	PPD_CUPS=`ls /etc/cups/ppd/*.ppd 2>/dev/null`

	if test -z "$PPD_DIST" ; then
		return
	fi

	PRINTERS_TO_UNINSTALL=""

	for fn_cups in $PPD_CUPS ; do
		MODEL_STRING_CUPS=`grep '*ModelName:' $fn_cups | awk -F\" '{print $2}'`
		for fn_dist in $PPD_DIST ; do
			MODEL_STRING_DIST=`grep '*ModelName:' $fn_dist | awk -F\" '{print $2}'`
			if [ "$MODEL_STRING_CUPS" = "$MODEL_STRING_DIST" ]; then
				PRINTERS_TO_UNINSTALL="$PRINTERS_TO_UNINSTALL `basename $fn_cups .ppd`"
			fi
		done
	done

	for printer_name in $PRINTERS_TO_UNINSTALL ; do
		echo "INFO: Removing printer $printer_name ..."
		lpadmin -x $printer_name 2> /dev/null || true
		lpoptions -x $printer_name > /dev/null 2>&1 || true
		wait_to_allow_to_see_info_line
	done

	# This will remove symlink, but will not remove directory
	# which may contain third-party files
	rm -f  /usr/share/ppd/${VENDOR_LC}
	rm -rf /usr/share/cups/model/${VENDOR_LC}/cms

	for MODNAME in $MODEL_LIST ; do
#		lpadmin -x $MODNAME 2>/dev/null
		rm -f /usr/share/cups/model/${VENDOR_LC}/${MODNAME}.ppd.gz
	done

	rmdir /usr/share/cups/model/${VENDOR_LC} 2> /dev/null || true
}

unregister_sane_backend() {

	for SCDIR in /etc/sane.d /usr/local/etc/sane.d ; do
		if [ -w ${SCDIR}/dll.conf ] ; then
			cat ${SCDIR}/dll.conf | grep -v "smfp" | \
			sed 's/geniusvp2/#geniusvp2/' > /tmp/mfp_dll_conf.tmp
			cat /tmp/mfp_dll_conf.tmp > ${SCDIR}/dll.conf
			rm -f /tmp/mfp_dll_conf.tmp
		fi
	done
}

restore_parport_pc_parameters() {

	# Remove options of parport_pc module if we added them during install

	if [ -f /etc/mfpcommon.modules.conf ] ; then
		if [ "$PLSFX" = "64" -a "$LINUX_DIST" = "SUSE_92" ]; then
			OPT_LINE="options parport_pc io=0x378 irq=7 dma=none"
		else
			OPT_LINE="options parport_pc io=0x378 irq=7 dma=3"
		fi
		if ( uname -r | grep -q '^2\.[6-9]\|^[3-9]' ) ; then
			if [ "$LINUX_DIST" = "SUSE_91" ] ; then
				MOD_CONFIG_FILE=modprobe.conf.local
			else
				MOD_CONFIG_FILE=modprobe.conf
			fi
		else
			MOD_CONFIG_FILE=modules.conf
		fi
		if ( cat /etc/$MOD_CONFIG_FILE | grep -q "$OPT_LINE" ) ; then
			cat /etc/$MOD_CONFIG_FILE | grep -v "$OPT_LINE" > /etc/mfpcommon.modules.conf
			cat /etc/mfpcommon.modules.conf > /etc/$MOD_CONFIG_FILE
		fi
		rm -f /etc/mfpcommon.modules.conf
	fi

	if test -f /etc/dynamic/scripts/lp.script ; then
		shell_script_execution_enable /etc/dynamic/scripts/lp.script
	fi
}

uninstall_common_files() {

	if test -f /usr/sbin/smfpd || test -f /etc/init.d/smfpd ; then
		echo "INFO: Uninstalling smfpd daemon ..."
		init_d_dependency_remove /etc/init.d/.depend.start
		init_d_dependency_remove /etc/init.d/.depend.stop
		/etc/init.d/smfpd stop > /dev/null
		rm -f /etc/init.d/rc*.d/[KS][0-9][0-9]smfpd
		rm -f /etc/rc*.d/[KS][0-9][0-9]smfpd
		rm -f /etc/init.d/smfpd
		rm -f /usr/sbin/smfpd
	fi

	echo "INFO: Restoring CUPS lpr ..."
	rm -f /usr/bin/lpr
	if [ -f /usr/bin/lpr.cups.orig ]; then
		mv -f /usr/bin/lpr.cups.orig /usr/bin/lpr.cups
	fi
	if [ -f /usr/bin/lpr.orig ]; then
		mv -f /usr/bin/lpr.orig /usr/bin/lpr
	fi
	wait_to_allow_to_see_info_line

	echo "INFO: Unregistering SANE backend ..."
	unregister_sane_backend
	wait_to_allow_to_see_info_line

	echo "INFO: Uninstalling common files ..."
	rm -f  /usr/lib*/libmfp.so*
	rm -f  /usr/lib*/libmfpdetect.so*
	rm -f  /usr/lib*/cups/backend/mfp
	rm -f  /usr/lib*/cups/filter/*sc.cts
	rm -f  /usr/lib*/cups/filter/*sf.so
	rm -f  /usr/lib*/cups/filter/libscms*
	rm -f  /usr/lib*/cups/filter/pscms
	rm -f  /usr/lib*/cups/filter/rastertosamsunginkjet
	rm -f  /usr/lib*/cups/filter/rastertosamsungpcl
	rm -f  /usr/lib*/cups/filter/rastertosamsungspl
	rm -f  /usr/lib*/cups/filter/rastertosamsungsplc
	rm -f  /usr/lib*/cups/filter/smfpautoconf
	rm -f  /usr/lib*/sane/libsane-smfp.so*
	rm -f  /etc/sane.d/smfp.conf
	wait_to_allow_to_see_info_line

	restore_parport_pc_parameters

	# Restore original imagetoraster CUPS filter

	if [ -f /usr/lib${PLSFX}/cups/filter/imagetoraster.cups ] ; then
		mv -f /usr/lib${PLSFX}/cups/filter/imagetoraster.cups /usr/lib${PLSFX}/cups/filter/imagetoraster
	fi

	# Remove Help configuration files

	rm -f /root/.shhvrc /root/.shhvfavs /home/*/.shhvrc /home/*/.shhvfavs

	# Remove CUPS type files

	rm -f /etc/cups/smfp.convs /etc/cups/smfp.types

	# Remove udev rules

	rm -f /etc/udev/rules.d/*_smfpautoconf_samsung.rules
	restart_udev
}

unwrap_setuid_third_party_application() {
	if echo "$1" | grep -q "/" ; then
		APP_NAME=$1
	else
		APP_NAME=`which $1 2> /dev/null`
	fi
	NEW_NAME=${APP_NAME}.bin

	if test -n "$APP_NAME" ; then
		if test -f "$NEW_NAME" && ! test -d "$NEW_NAME"; then
			rm -f "$APP_NAME"
			mv "$NEW_NAME" "$APP_NAME"
		fi
	fi
}

#uninstall_legacy_files() {
#	true
#}

uninstall_legacy_common_files() {
	# Remove setuid wrappers which may be installed by
	# Unified Linux Driver v. 2.0
	unwrap_setuid_third_party_application xsane
	unwrap_setuid_third_party_application xscanimage

	unwrap_setuid_ooo_application soffice
	unwrap_setuid_ooo_application swriter
	unwrap_setuid_ooo_application simpress
	unwrap_setuid_ooo_application scalc
}

uninstall_smfp_common() {
	test -d /opt/smfp-common && ( cd /opt && rm -rf smfp-common )
}

# Main uninstall procedure

do_uninstall() {

	SCRIPT_MODE=UNINSTALL

	echo "INFO: Unregistering CUPS printer ..."
	unregister_cups_printers
	wait_to_allow_to_see_info_line

#	uninstall_legacy_files

	check_related_packages
	if [ "$TOTAL_RELATED_PACKAGES_INSTALLED" = "1" ]; then
		# The last from the group of related packages. Remove common files.
		uninstall_legacy_common_files
		uninstall_common_files
	else
		# Remove slpr to check if lpr would became broken link after uninstall
		rm -f /opt/$VENDOR/mfp/bin/slpr
		# Check if lpr is broken link
		if ! test -x /usr/bin/lpr ; then
			for SLPR_FILE in `ls -tr /opt/*/mfp/bin/slpr 2> /dev/null` ; do
				if test -x $SLPR_FILE ; then
					rm -f /usr/bin/lpr
					ln -s -f $SLPR_FILE /usr/bin/lpr
				fi
			done
		fi
	fi

	process_desktop_files
	process_desktop_menus
	process_psu_and_smart_panel

	echo "INFO: Finishing uninstall ..."

	if test -d /etc/qt-smfp ; then
		rm -rf /etc/qt-smfp
	fi

	# Remove persistent settings created by QSettings
	for f in $VENDOR_LC scanconf image_editor scfgtools ; do
		rm -f /home/*/.qt/${f}rc /usr/lib*/qt*/etc/settings/${f}rc /etc/X11/${f}rc
		rm -f /home/*/.qt/.${f}rc.* /usr/lib*/qt*/etc/settings/.${f}rc.* /etc/X11/.${f}rc.*
	done

	if [ "$TOTAL_RELATED_PACKAGES_INSTALLED" = "1" ]; then
		uninstall_smfp_common
	fi

	test -n "$VENDOR" || abort_execution "VENDOR undefined"
	exec /bin/sh -c "rm -rf /opt/$VENDOR/mfp 2> /dev/null && rmdir /opt/$VENDOR 2> /dev/null"

	wait_to_allow_to_see_info_line
}

# Text mode procedures

ask_any_key_or_q() {
#	read -p '****  Press any key to continue or q to quit: ' -n 1 KEY_PRESSED
	read -p '****  Press Enter to continue or q and then Enter to quit: ' KEY_PRESSED
	echo ""
	if test "$KEY_PRESSED" = "q" || test "$KEY_PRESSED" = "Q" ; then
		echo "****  $RUN_MODE terminated by user"
		exit 0
	fi
}


select_model_in_textmode() {
	MODEL=
	while test -z "$MODEL" ; do	
		if test -n "$MODEL_LIST" ; then
			echo "****  Print drivers for the following device models available:"
			echo $MODEL_LIST
			read -p "****  Please enter model to install and press Enter: " KEY_PRESSED
			if test -z "$KEY_PRESSED" ; then
				MODEL=`echo $MODEL_LIST | awk '{print $1}'`
			elif echo "$MODEL_LIST" | grep -qw "$KEY_PRESSED" ; then
				MODEL=$KEY_PRESSED
			else
				echo "****"
				echo "ERROR Invalid model entered. Please enter model from the list,"
				echo "ERROR or press Enter to select the first one."
				echo "****"
			fi
		fi
	done
}

run_textmode_dialog() {

	test "`id -u`" = "0" || abort_execution "Root priviliges required"

	test -n "$VENDOR" || abort_execution "VENDOR undefined"
	IN_TEXTMODE=1

	if [ "$RUN_MODE" = "$RUN_MODE_UNINSTALL" ]; then
		echo "****  Running text mode uninstall"
		ask_any_key_or_q
		do_uninstall
		echo "****  Text mode uninstall finished"
	else
		echo "****  Running text mode install"
		ask_any_key_or_q
		create_file_smfp_users_to_add
		if test -s /tmp/smfp_users_to_add ; then
			echo "**** Non-priviliged users found:"
			echo `cat /tmp/smfp_users_to_add`
			echo "****  Are you going to use USB-connected devices ?"
			echo "****  If yes, users allowed to scan or manage printers should be added to $PRINTER_GROUP"
			echo "****  group. The list of non-privileged users proposed for addition is shown above."
			read -p "****  Press y and then Enter to add users or Enter to leave $PRINTER_GROUP group intact: " KEY_PRESSED
			echo ""
			if test "$KEY_PRESSED" != "y" && test "$KEY_PRESSED" != "Y" ; then
				rm -f /tmp/smfp_users_to_add
			fi
		fi
		select_model_in_textmode
		do_install
		echo "****  Text mode install finished"
	fi
}

print_message_qt_not_found() {
	echo "****  It seems Qt library is not installed, or X display is not accessible."
	echo "****  Custom Qt library will be configured for use with this package."
}

# Script execution starts here }

# test "$1" != "STAGE_GUI" && date > /tmp/install.log

SCRIPT_DIR=`dirname "$0"`
SCRIPT_NAME=`basename "$0"`
cd "$SCRIPT_DIR"

umask 022
set_variables

MODIFIER_ID_STRING="Inserted by Unified Linux Driver"

MODEL_LIST=`ls ./noarch/at_opt/share/ppd/*.ppd 2> /dev/null | awk -F. '{print $2}' | awk -F/ '{print $6}'`
if test -z "$MODEL_LIST" ; then
	MODEL_LIST=`ls ../share/ppd/*.ppd 2> /dev/null | awk -F. '{print $3}' | awk -F/ '{print $4}'`
fi
# The first model in the list is default
# Default model will be used if printeradd is not succeeded
MODEL=`echo $MODEL_LIST | awk '{print $1}'`

test -n "$HARDWARE_PLATFORM" || abort_execution "HARDWARE_PLATFORM undefined"
if [ "$HARDWARE_PLATFORM" != "i386" -a "$HARDWARE_PLATFORM" != "x86_64" ]; then
	abort_execution "Unsuppored hardware platform \"$HARDWARE_PLATFORM\""
fi

# GLIBC_VERSION_TWO_DIGITS=`ls /lib/ld-*.so 2> /dev/null | sed s:/lib/ld-:: | cut -b 1-3`
# if [ "$GLIBC_VERSION_TWO_DIGITS" = "2.2" ]; then
#	HARDWARE_PLATFORM="i386-glibc22"
# fi

test -n "$VENDOR" || abort_execution "VENDOR undefined"
MFP_INSTALL_DIR=$INSTALL_DIR_MFP

ensure_proc_bus_usb_mounted

RUN_MODE_INSTALL=install
RUN_MODE_UNINSTALL=uninstall
RUN_MODE_CHECK=check
RUN_MODE_SHOW_VERSIONS=show_versions
RUN_MODE=$RUN_MODE_INSTALL
if [ "$SCRIPT_NAME" = "uninstall.sh" ]; then
	RUN_MODE=$RUN_MODE_UNINSTALL
fi

RUN_STAGE_INITIAL=initial
RUN_STAGE_FROM_GUI=fromgui
RUN_STAGE=$RUN_STAGE_INITIAL

UI_MODE_GUI=gui
UI_MODE_TEXT=text
UI_MODE=$UI_MODE_GUI

QT_MODE_AUTO=auto
QT_MODE_QT3=qt3
QT_MODE_QT4=qt4
QT_MODE_QT_SUPPLIED=qt_supplied
QT_MODE=$QT_MODE_AUTO

SUBDIR_QT3=.
SUBDIR_QT4=qt4apps
SUBDIR_QT=$SUBDIR_QT3

RUN_FROM_DIST=dist
RUN_FROM_INSTALL=install
RUN_FROM=$RUN_FROM_DIST
if ! [ -d ./$HARDWARE_PLATFORM ]; then
	RUN_FROM=$RUN_FROM_INSTALL
fi

PARPORT=1

while [ -n "$1" ]; do
	case $1 in
	STAGE_GUI) RUN_STAGE=$RUN_STAGE_FROM_GUI ;;
	PARPORT=*) PARPORT=${1#PARPORT=} ;;
	--run-mode=*) RUN_MODE=${1#--run-mode=} ;;
	--ui-mode=*) UI_MODE=${1#--ui-mode=} ;;
	--qt-mode=*) QT_MODE=${1#--qt-mode=} ;;
	-i) RUN_MODE=$RUN_MODE_INSTALL ;;
	-u) RUN_MODE=$RUN_MODE_UNINSTALL ;;
	-t) UI_MODE=$UI_MODE_TEXT ;;
	-ut) RUN_MODE=$RUN_MODE_UNINSTALL ; UI_MODE=$UI_MODE_TEXT ;;
	-tu) RUN_MODE=$RUN_MODE_UNINSTALL ; UI_MODE=$UI_MODE_TEXT ;;
	-c) RUN_MODE=$RUN_MODE_CHECK ;;
	-v) RUN_MODE=$RUN_MODE_SHOW_VERSION ;;
	*) echo "Invalid argument <$1>" ; exit 1 ;;
	esac
	shift
done

if [ "$RUN_MODE" = "$RUN_MODE_CHECK" ]; then
	sh check_installation.sh ; exit 0
elif [ "$RUN_MODE" = "$RUN_MODE_SHOW_VERSION" ]; then
	show_versions ; exit 0
fi

if [ "$RUN_FROM" = "$RUN_FROM_DIST" ]; then
	DIST_DIR=`pwd`
fi

if [ "$QT_MODE" = "$QT_MODE_AUTO" ]; then
	GUIEXEC_NAME=guiinstall
	if [ "$RUN_MODE" = "$RUN_MODE_UNINSTALL" ]; then
		GUIEXEC_NAME=guiuninstall
	fi

	if [ "$RUN_FROM" = "$RUN_FROM_DIST" ]; then
		# launched from dist, suitable gui application (qt3/qt4) is selected
		GUIEXEC_QT3="./$HARDWARE_PLATFORM/$SUBDIR_QT3/install/$GUIEXEC_NAME"
		GUIEXEC_QT4="./$HARDWARE_PLATFORM/$SUBDIR_QT4/install/$GUIEXEC_NAME"
		if "$GUIEXEC_QT4" --help > /dev/null 2>&1 ; then
			QT_MODE=$QT_MODE_QT4
			GUIEXEC=$GUIEXEC_QT4
			SUBDIR_QT=$SUBDIR_QT4
		elif "$GUIEXEC_QT3" --help > /dev/null 2>&1 ; then
			QT_MODE=$QT_MODE_QT3
			GUIEXEC=$GUIEXEC_QT3
			SUBDIR_QT=$SUBDIR_QT3
		else
			QT_MODE=$QT_MODE_QT_SUPPLIED
			GUIEXEC=$GUIEXEC_QT3
			SUBDIR_QT=$SUBDIR_QT3
			QT_SUPPLIED_DIR=$DIST_DIR/$HARDWARE_PLATFORM/lib$PLSFX
			export LD_LIBRARY_PATH="$QT_SUPPLIED_DIR:$LD_LIBRARY_PATH"
		fi
	else
		# launched from installation directory => uninstall mode
		GUIEXEC="./$GUIEXEC_NAME"
	fi
fi

if test -z "$MODEL" ; then
	echo "WARNING: installation model undefined"
fi

if [ "$RUN_STAGE" = "$RUN_STAGE_INITIAL" ]; then
	if [ "$RUN_MODE" = "$RUN_MODE_INSTALL" ]; then
		check_icc_redist
		check_libstdcxx
		check_libtiff
		if [ "$QT_MODE" = "$QT_MODE_QT_SUPPLIED" ]; then
			print_message_qt_not_found
		fi
	fi

	if [ "$UI_MODE" = "$UI_MODE_TEXT" ]; then
		run_textmode_dialog
		exit 0
	fi

	# $UI_MODE = $UI_MODE_GUI

	if ! test -e "$GUIEXEC" ; then
		echo "GUI mode installer not found, proceeding in text mode"
		run_textmode_dialog
		exit 0
	fi

	if ! $GUIEXEC --help > /dev/null 2>&1 ; then
		echo "GUI mode installer execution failed, proceeding in text mode"
		run_textmode_dialog
		exit 0
	fi

	if [ "$RUN_MODE" = "$RUN_MODE_UNINSTALL" ]; then
		P1=
		P2=
		P3=
		P4=
		P5=
		P6=
		if [ "$RUN_FROM" = "$RUN_FROM_DIST" ]; then
			if [ "$QT_MODE" = "$QT_MODE_QT4" ] ; then
				P1="--res=$DIST_DIR/noarch/at_opt/share/ui/guiuninstallui.rcc"
			else
				P1="--ui=$DIST_DIR/noarch/at_opt/share/ui/uninstalldialogbase.ui"
			fi
		fi
	else
		detect_system_packages
		P1="--cups=$CUPS_DETECTED"
		P2="--gs=$GS_DETECTED"
		P3="--sane=$SANE_DETECTED"
		P4="--printer-group=$PRINTER_GROUP"
		P5="--qt-mode=$QT_MODE"
		P6=
	fi

	# When launched from distribution area add distribution binary dir to the PATH. shhv may be run from guiinstall or guiuninstall.
	if [ "$RUN_FROM" = "$RUN_FROM_DIST" ]; then
		export PATH="$DIST_DIR/$HARDWARE_PLATFORM/$SUBDIR_QT/at_opt/bin:$PATH"
	fi

	$GUIEXEC $P1 $P2 $P3 $P4 $P5 $P6
	# guiinstall or guiuninstall will run this script again with
	# STAGE_GUI as the first parameter.
	# You may think this script continues execution from
	# the line 'GUI installer stage continues here' below.
	exit
fi

# GUI installer stage continues here
if [ "$RUN_MODE" = "$RUN_MODE_UNINSTALL" ]; then
	do_uninstall
	exit 0
fi

# If not 'uninstall and exit' then do installation
do_install
exit 0
