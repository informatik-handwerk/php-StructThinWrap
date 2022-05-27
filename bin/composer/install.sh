#!/bin/bash -eu
#-o pipefail not available for windows

dirScript="$(dirname "$0")"

set -x

rm -rf ./vendor
#rm -rf ./var/cache

COMPOSER_MEMORY_LIMIT=-1 composer install
#composer symfony:recipes --outdated
