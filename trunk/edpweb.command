#!/bin/sh
printf "\e[8;47;100;t"
cd "`dirname "$0"`"
clear
cd /Extra/bin/lws
sudo sh startup.sh
