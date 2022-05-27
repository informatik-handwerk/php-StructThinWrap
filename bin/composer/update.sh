#!/bin/bash -eu
#-o pipefail not available for windows

dirScript="$(dirname "$0")"

set -x

COMPOSER_MEMORY_LIMIT=-1 composer update --with-all-dependencies
#composer symfony:recipes --outdated

. "$dirScript/dump-autoload.sh"

