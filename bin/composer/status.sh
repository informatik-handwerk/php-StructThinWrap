#!/bin/bash -eu
#-o pipefail not available for windows

# composer outdated --direct --minor-only
composer outdated --direct

echo green (=): Dependency is in the latest version and is up to date.
echo yellow (~): (may involve work) Dependency has a new version available that includes backwards compatibility breaks according to semver.
echo red (!): (effortless) Dependency has a new version that is semver-compatible and you should upgrade it.
