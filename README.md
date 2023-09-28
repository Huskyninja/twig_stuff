# twig_stuff

This module has a couple of simple Twig extensions written primarily for for use in Drupal views. There are only a couple of things here, but they may be helpful for other people in their projects. Best when combines with Twig Tweak to add embedded views for all kinds of views fun.

## get_url_from_fid

Takes a Drupal File ID and returns a FQDN HTML link. Use like any other twig function `get_url_from_fid(mixed)`. Input can be an int or a string, which is what File::load() takes as an input.

## get_file_extension

Takes a file path and pulls out the file extension. Basically this is using PHP's `pathinfo(string, PATHINFO_EXTENSION)`, but for twig. Operates as a twig filter, filePath|get_file_extension. For example, in views:

    {% set FileExtension = filePath|get_file_extension %}
	{% if FileExtension|length > 0 %}
	    {{ FileExtension }}
	{% endif %}

There is always a requirement to display the extension for something, and this is a quick way to accomplish this in views. For more info on pathinfo(): https://www.php.net/manual/en/function.pathinfo.php

## Details

This module is shared in the hope that it can assist you in your projects.