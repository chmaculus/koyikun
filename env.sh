#!/bin/sh
path_local='/home/cam/php/KoyiKun0.27/';
path_server='/home/php/KoyiKun0.27/';

scp $path_local$1 root@koyi:$path_server$1

