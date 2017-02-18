#!/usr/bin/env bash

set -eo pipefail

cd "$(dirname "$(readlink -f "$BASH_SOURCE")")"

versions=( "$@" )
if [ ${#versions[@]} -eq 0 ]; then
	versions=( */ )
fi

versions=( "${versions[@]%/}" )

for version in "${versions[@]}"; do
  [ -f "$version/Dockerfile" ] || continue
  docker build --rm -t tbartels/bartelsonline:"$version" "$version/."
  docker run -d -p 80:80 --name bartelsonline tbartels/bartelsonline:"$version"
  if ! curl 127.0.0.1:80/imprint.html | grep 2014; then
    echo "Website test failed!"
    exit 1
  fi
  docker stop bartelsonline && docker rm bartelsonline
done
