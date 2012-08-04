#!/bin/sh
# compiles the current LanguageTool code and moves the result to a snapshots directory

cd /home/languagetool/languagetool.org
svn up svn-checkout
cd svn-checkout

ant dist
mv dist/LanguageTool-*-dev.oxt ../www/download/snapshots/LanguageTool-`date +%Y%m%d`-snapshot.oxt

ant dist-standalone
mv dist/LanguageTool-*-dev.zip ../www/download/snapshots/LanguageTool-`date +%Y%m%d`-snapshot.zip

# delete *.oxt files older than 5 days:
rm `find ../www/download/snapshots/ -name "*.oxt" -mtime +5`
rm `find ../www/download/snapshots/ -name "*.zip" -mtime +5`
