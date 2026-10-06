stefan-birkner.de
=================

This is the project for the website http://stefan-birkner.de. It uses the
TaskRunner [Grunt](http://gruntjs.com/) and the static site generator
[Hugo](https://gohugo.io).

Serving the page at localhost
-----------------------------

You can see the website at http://localhost:4000 if you run Grunt.

    npm install
    grunt

The default task uses Hugo to serve the site.

Deployment
----------

Commit the current changes and then run

    npm install
    grunt deploy

Font Awesome Icons
------------------

stefan-birkner.de uses icons of [Font Awesome](https://fontawesome.com/). You can add an icon to a page with the shortcut `fontawesome`. The following example adds GitHub's Octocat:

    {{< icon github >}}

Before you can use an icon you have to download the SVG file from https://github.com/FortAwesome/Font-Awesome/tree/master/svgs to the directory `app/fontawesome`.

Thank you [Nick Galbreath](https://www.client9.com/) for your [tutorial](https://www.client9.com/using-font-awesome-icons-in-hugo/).