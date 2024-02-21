#!/bin/bash

if [[ -z "$1" ]]
then
	printf "\r\033[2K  [\033[0;31mFAIL\033[0m] $0\n"
	echo ''
	echo "usage: $0 <code_url> [<compilation_level>] [<output_format>] [<output_info>]"
	echo ''
	exit 1
fi


# import httplib, urllib, sys

# Define the parameters for the POST request and encode them in
# a URL-safe format.

# params = urllib.urlencode([
    # Multiple code_url parameters:
    # ('code_url', 'http://yourserver.com/yourJsPart1.js'),
    # ('code_url', 'http://yourserver.com/yourJsPart2.js'),
    # ('compilation_level', 'WHITESPACE_ONLY'),
    # ('output_format', 'text'),
    # ('output_info', 'compiled_code'),
  # ])

# Always use the following value for the Content-type header.
# headers = { "Content-type": "application/x-www-form-urlencoded" }
# conn = httplib.HTTPSConnection('closure-compiler.appspot.com')
# conn.request('POST', '/compile', params, headers)
# response = conn.getresponse()
# data = response.read()
# print data
# conn.close()