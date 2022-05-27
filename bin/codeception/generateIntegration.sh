#!/bin/bash -eu
#-o pipefail not available for windows

dirScript="$(dirname "$0")"

fqcn="$1"

. "$dirScript/generate.sh" "integration" "$fqcn"
