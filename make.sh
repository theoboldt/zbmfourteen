#!/usr/bin/env bash

echo "Compiling LESS..."
lessc less/style.less > style.css
echo "LESS done."

echo "Compressing CSS..."
/usr/bin/yui-compressor -o style.min.css style.css
echo "CSS done."

echo "Collecting JS..."
echo "" >> script.min.js.tmp

cat "js/jquery.countdown.min.js" >> script.min.js.tmp

cat "js/bootstrap/carousel.js" >> script.min.js.tmp
cat "js/bootstrap/transition.js" >> script.min.js.tmp

cat "js/functions.js" >> script.min.js.tmp

echo "Compressing JS..."
/usr/bin/yui-compressor --type=js -o script.min.js script.min.js.tmp
echo "Removing temporary file..."
rm script.min.js.tmp
echo "JS done."
