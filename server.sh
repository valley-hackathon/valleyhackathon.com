#!/bin/bash

# PORT=2345

# while getopts ":p:" opt; do
#   case $opt in
#     p)
#       PORT=$OPTARG
#       ;;
#     \?)
#       echo "Invalid option: -$OPTARG" >&2
#       exit 1
#       ;;
#     :)
#       echo "Option -$OPTARG requires an argument." >&2
#       exit 1
#       ;;
#   esac
# done

cd public_html
php -S localhost:2345