#!/usr/bin/env bash
echo "Collecting JS..."
echo "" > script.min.js.tmp

cat "js/jquery.countdown.min.js" >> script.min.js.tmp
echo "" >> script.min.js.tmp

cat "js/bootstrap/modal.js" >> script.min.js.tmp
echo "" >> script.min.js.tmp
cat "js/bootstrap/carousel.js" >> script.min.js.tmp
echo "" >> script.min.js.tmp
cat "js/bootstrap/transition.js" >> script.min.js.tmp
echo "" >> script.min.js.tmp
cat "js/ekko-lightbox-2.6.0.min.js" >> script.min.js.tmp
echo "" >> script.min.js.tmp

cat "js/functions.js" >> script.min.js.tmp
echo "" >> script.min.js.tmp

#cat "js/tiled-gallery/jquery.spin.js" >> script.min.js.tmp
#cat "js/tiled-gallery/spin.js" >> script.min.js.tmp
#cat "js/tiled-gallery/jetpack-carousel.js" >> script.min.js.tmp
#cat "js/tiled-gallery/tiled-gallery.js" >> script.min.js.tmp

echo "Compressing JS..."
#/usr/bin/yui-compressor --type=js -o script.min.js script.min.js.tmp
/usr/local/bin/uglifyjs -o script.min.js script.min.js.tmp
echo "Removing temporary file..."
#rm script.min.js.tmp
echo "JS done."

exit

echo "Compiling LESS..."
lessc less/style.less > style.css
lessc less/style-login.less > style-login.css
echo "LESS done."

echo "Compressing CSS..."
#/usr/bin/yui-compressor -o style.min.css style.css
echo "CSS done."