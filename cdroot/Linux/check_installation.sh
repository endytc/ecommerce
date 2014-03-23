#!/bin/sh
ls -ld --color /opt/Samsung/mfp                            2> /dev/null
ls -ld --color /opt/Samsung/mfp/share/doc                  2> /dev/null
ls -l          /opt/Samsung/mfp/share/doc/*                2> /dev/null | wc
ls -ld --color /opt/Samsung/mfp/share/ppd                  2> /dev/null
ls -l          /opt/Samsung/mfp/share/ppd/*                2> /dev/null | wc
ls -l  --color /opt/Samsung/mfp/uninstall/*                2> /dev/null
ls -l  --color /opt/Samsung/mfp/bin/*                      2> /dev/null
ls -l  --color /opt/Samsung/mfp/lib/*                      2> /dev/null
ls -ld --color /usr/share/cups/model/samsung/cms           2> /dev/null
ls -l  --color /usr/share/cups/model/samsung/*ppd*         2> /dev/null
ls -ld --color /usr/share/cups/model/xerox/cms             2> /dev/null
ls -l  --color /usr/share/cups/model/xerox/*ppd*           2> /dev/null
ls -ld --color /usr/share/cups/model/dell/cms              2> /dev/null
ls -l  --color /usr/share/cups/model/dell/*ppd*            2> /dev/null
ls -ld --color /etc/X11/applnk/Samsung_MFP                 2> /dev/null
ls -ld --color /etc/opt/kde*/share/applnk/SuSE/Samsung_MFP 2> /dev/null
ls -ld --color /usr/share/applnk*/Samsung_MFP              2> /dev/null
ls -ld --color /usr/share/gnome/apps/Samsung_MFP           2> /dev/null
ls -l  --color /usr/lib*/libmfp*.so*                       2> /dev/null
ls -l  --color /usr/lib*/cups/backend/mfp                  2> /dev/null
ls -l  --color /usr/lib*/cups/filter/*sc.cts               2> /dev/null
ls -l  --color /usr/lib*/cups/filter/*sf.so                2> /dev/null
ls -l  --color /usr/lib*/cups/filter/rastertosamsung*      2> /dev/null
ls -l  --color /usr/lib*/cups/filter/smfpautoconf          2> /dev/null
ls -l  --color /usr/lib*/cups/filter/pscms                 2> /dev/null
ls -l  --color /usr/lib*/sane/libsane-smfp.so*             2> /dev/null
ls -l  --color /usr/lib*/sane/libsane-samsung_*.so*        2> /dev/null
ls -l  --color /usr/lib*/sane/libsane-xerox_*.so*          2> /dev/null
ls -l  --color /etc/sane.d/samsung_*.conf                  2> /dev/null
ls -l  --color /etc/sane.d/xerox_*.conf                    2> /dev/null
ls -l  --color /etc/sane.d/dell_*.conf                     2> /dev/null
ls -l  --color /etc/sane.d/smfp.conf                       2> /dev/null
ls -l  --color /home/*/.qt/samsungrc /usr/lib*/qt*/etc/settings/samsungrc /etc/X11/samsungrc          2> /dev/null
ls -l  --color /home/*/.qt/.samsungrc.* /usr/lib*/qt*/etc/settings/.samsungrc.* /etc/X11/.samsungrc.* 2> /dev/null
ls -l  --color /home/*/.qt/xeroxrc /usr/lib*/qt*/etc/settings/xeroxrc /etc/X11/xeroxrc                2> /dev/null
ls -l  --color /home/*/.qt/.xeroxrc.* /usr/lib*/qt*/etc/settings/.xeroxrc.* /etc/X11/.xeroxrc.*       2> /dev/null
ls -l  --color /home/*/.qt/dellrc /usr/lib*/qt*/etc/settings/dellrc /etc/X11/dellrc                   2> /dev/null
ls -l  --color /home/*/.qt/.dellrc.* /usr/lib*/qt*/etc/settings/.dellrc.* /etc/X11/.dellrc.*          2> /dev/null
ls -l  --color /home/*/.qt/scanconfrc /usr/lib*/qt*/etc/settings/scanconfrc /etc/X11/scanconfrc             2> /dev/null
ls -l  --color /home/*/.qt/.scanconfrc.* /usr/lib*/qt*/etc/settings/.scanconfrc.* /etc/X11/.scanconfrc.*    2> /dev/null
ls -l  --color /home/*/.qt/image_editorrc /usr/lib*/qt*/etc/settings/image_editorrc /etc/X11/image_editorrc 2> /dev/null
ls -l  --color /home/*/.qt/.image_editorrc.* /usr/lib*/qt*/etc/settings/.image_editorrc.* /etc/X11/.image_editorrc.* 2> /dev/null
ls -l  --color /home/*/.qt/scfgtoolsrc /usr/lib*/qt*/etc/settings/scfgtoolsrc /etc/X11/scfgtoolsrc                   2> /dev/null
ls -l  --color /home/*/.qt/.scfgtoolsrc.* /usr/lib*/qt*/etc/settings/.scfgtoolsrc.* /etc/X11/.scfgtoolsrc.*          2> /dev/null
grep 'smfp\|samsung_\|xerox_\|dell_' /etc/sane.d/dll.conf /usr/local/etc/sane.d/dll.conf                             2> /dev/null
