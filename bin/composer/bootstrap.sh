#!/bin/bash -eu
#-o pipefail not available for windows

dirScript="$(dirname "$0")"

set -x

rm -rf ./vendor
#rm -rf ./var/cache
rm -f ./composer.lock
#rm -f ./symfony.lock

#git clean -f

COMPOSER_MEMORY_LIMIT=-1 composer update --no-scripts
COMPOSER_MEMORY_LIMIT=-1 composer update --with-all-dependencies
