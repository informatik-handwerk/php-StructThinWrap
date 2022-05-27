#!/bin/bash -eu
#-o pipefail not available for windows

echo "supply any parameter to generate authoritative classmap"

if [[ -v $1 ]]; then
  echo "Generating on-the-fly auotoloader...
  echo (supply any parameter to this script to generate authoritative classmap)..."
  composer dump-autoload
else
  echo "Generating optimized auotoloader..."
  composer dump-autoload --classmap-authoritative
fi
