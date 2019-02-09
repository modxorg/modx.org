#!/bin/sh
# usage:
# ./extract.sh <environment> <auto-commit>
# ./extract.sh production auto   -  use this to automatically extract, commit and push chnages
# ./extract.sh production        -  use this to extract changes, view the status and decide then wether to commit and push or not

if [ "x$1" == "x" ]
    then
        echo "ERROR: environment not set! Abotring..."
        exit 1
fi

# extract data
Gitify extract

# log status
git status

if [ "$2" = "auto" ]
    then
        shouldpush="y"
    else
        read -n 1 -p "Commit and push changes? (y/n)? " shouldpush
fi


if [ "$shouldpush" == "y" ]
    then
        # add changes
        git add --all

        # commit
        git commit -m "Extract from $1 on $(date +%Y-%m-%d--%H-%M-%S)"

        # push to branch with same name as enviroment
        git push origin $1
fi

# done
echo ""
echo "Extract done."
exit 0
