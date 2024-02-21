#!/usr/bin/env bash

##
# --recursive --update --sparse --compress --executability --xattrs
# --times --omit-dir-times --itemize-changes
# --partial --progress --human-readable
#
##
#
# --include='*/'
# --stats --chmod=ugo=rwX
# -ruSzEXtOiPh --chmod=ugo=rwX --stats
##

typeset rsync_options="-ruSzEXOP --chmod=ugo=rwX"
typeset rsync_exclude="--exclude=**/node_modules/ --exclude=**/assets/ --exclude=/resource/asset/ --exclude=/functions/helpers/ --exclude=**/src/ --exclude=**/vendor/ --exclude=**/*.crt --exclude=**/*.pem --exclude=**/*.log --exclude=**/*.gz --exclude=**/*.sql --exclude=**/*.tar --exclude=**/*.zip --exclude=**/.*/ --exclude=**/.* -C"
typeset rsync_source="./"
typeset rsync_dest="dev@rma.host:~/apps/jctda/public/wp-content/themes/jctda/"

rsync -e ssh $rsync_options $rsync_exclude $rsync_source $rsync_dest


typeset gsutil_options="-reCU"
typeset gsutil_exclude="-x './*.git|.*\.DS_Store$|.*\.md$|.*\.ini$|.*\.crt$|.*\.pem$|.*\.mo$|.*\.po$|.*\.php$|.*\.zip$|.*\.log$|.*\.csv$|.*\.sql$|.*\.gz$|.*\.tar$'"
typeset gsutil_source="./dist/"
typeset gsutil_dest="gs://jctda-cdn/wp-content/themes/jctda/dist/"

gsutil -m rsync $gsutil_options $gsutil_exclude $gsutil_source $gsutil_dest
