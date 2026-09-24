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

Dependency Management
---------------------

This project uses [Bower](http://bower.io/) for dependency management. Alle dependencies are stored in the project (`bower_components`) because we have no repository manager running. You add or change a dependency by adding or changing it in `bower.json`. Run `bower install` afterwards and check in the resolved dependencies.

Grunt copies `bower_components` to `app/static/lib` so that Hugo serves every dependency at `/lib/...`, e.g. `/lib/reveal.js/dist/reveal.js`. The directory `app/static/lib` is generated and therefore not checked in.

The Bower registry no longer accepts new releases. Therefore [reveal.js](https://revealjs.com) is vendored by hand from its npm release (`npm pack reveal.js@6.0.2`). Only the files that the slides need are checked in:

    dist/reset.css
    dist/reveal.css
    dist/reveal.js
    dist/theme/white.css

Update reveal.js by unpacking a newer release over `bower_components/reveal.js` and adjusting the version in `bower.json` and `bower_components/reveal.js/.bower.json`.

Slides
------

Slides are plain HTML pages below `app/static` that use [reveal.js](https://revealjs.com), for example `app/static/se/readme-driven-development/slides.html`. They are served by Hugo as they are.

Font Awesome Icons
------------------

stefan-birkner.de uses icons of [Font Awesome](https://fontawesome.com/). You can add an icon to a page with the shortcut `fontawesome`. The following example adds GitHub's Octocat:

    {{< icon github >}}

Before you can use an icon you have to download the SVG file from https://github.com/FortAwesome/Font-Awesome/tree/master/svgs to the directory `app/fontawesome`.

Thank you [Nick Galbreath](https://www.client9.com/) for your [tutorial](https://www.client9.com/using-font-awesome-icons-in-hugo/).