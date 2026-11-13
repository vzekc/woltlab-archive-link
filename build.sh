#!/bin/sh
# Builds the installable package archive: build/de.classic-computing.archive-link_<version>.tar
set -e
cd "$(dirname "$0")"
export COPYFILE_DISABLE=1
version=$(sed -n 's:.*<version>\(.*\)</version>.*:\1:p' package.xml | head -1)
out=build/de.classic-computing.archive-link_${version}.tar
pips="page.xml templateListener.xml"
rm -rf build/stage && mkdir -p build/stage
(cd files && tar --format ustar -cf ../build/stage/files.tar $(ls -A))
cp package.xml $pips build/stage/
tar --format ustar -cf "$out" -C build/stage package.xml $pips files.tar
rm -rf build/stage
echo "$out"
