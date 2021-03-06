#!/bin/bash

set -eu

if [ $# -ne 1 ]; then
  echo "USAGE: $0 vA.B.C"
  exit 1
fi

if [[ $1 =~ ^v[0-9]+\.[0-9]+\.[0-9]+ ]]; then
  git tag -s $1 -m $1
else
  echo "Invalid version tag $1. Should be like v1.2.3"
  exit 1
fi

git push origin dev master $1
ssh statink@app1.stat.ink 'pushd stat.ink && git fetch origin && git checkout composer.lock package-lock.json && touch -r composer.json composer.lock && touch -r package.json package-lock.json && git merge --ff-only origin/master && scl enable php73 make && scl enable php73 "./yii asset/up-revision" && rm -rfv runtime/Smarty/compile/*'
