stefan-birkner.de
=================

This is the project for the website http://stefan-birkner.de. It uses the TaskRunner [Grunt](http://gruntjs.com/).

Serving the page at localhost
-----------------------------

You can see the website at http://localhost:4000 if you run Grunt.

    npm install
    grunt

The default task uses Jekyll to serve the site.

Deployment
----------

Commit the current changes and then run

    npm install
    grunt deploy

Dependency Management
---------------------

This project uses [Bower](http://bower.io/) for dependency management. Alle dependencies are stored in the project (`app/bower_components`) because we have no repository manager running. You add or change a dependency by adding or changing it in `bower.json`. Run `bower install` afterwards and check in the resolved dependencies.
