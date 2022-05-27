#!/bin/bash -eu
#-o pipefail not available for windows

suite="$1"
fqcn="$2"

vendor/bin/codecept generate:test "$suite" "$fqcn"
