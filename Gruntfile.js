module.exports = function(grunt) {
  grunt.initConfig({
    buildcontrol: {
      options: {
        dir: 'dist',
        commit: true,
        push: true,
        message: 'Revision stefanbirkner/stefan-birkner.de@%sourceCommit%'
      },
      pages: {
        options: {
          remote: 'git@github.com:stefanbirkner/stefan-birkner.de.git',
          branch: 'gh-pages'
        }
      }
    },
    clean: ['node_modules', 'dist', '_site'],
    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'node_modules/font-awesome',
          src: 'fonts/*',
          dest: 'dist/'
        }, {
          expand: true,
          cwd: 'node_modules/font-awesome',
          src: 'css/*.min.css',
          dest: 'dist/'
        }, {
          expand: true,
          cwd: 'bower_components',
          src: ['**/*.min.js'],
          flatten: true,
          dest: 'dist/js/'
        }]
      }
    },
    cssmin: {
      minify: {
        expand: true,
        cwd: 'bower_components',
        src: ['**/*.css', '!**/*.min.css'],
        flatten: true,
        dest: 'dist/css/',
        ext: '.min.css',
        extDot: 'last'
      }
    },
    exec: {
      serve: "cd app;hugo serve",
      package: "rm -r dist;mkdir -p dist;cd app;hugo;mv public/* ../dist/"
    },
    image_resize: {
      resize: {
        options: {
          height: 133,
          width: 200
        },
        files: {
          'dist/se/readme-driven-development/images/book.jpeg' : 'app/static/se/readme-driven-development/images/documentation.jpeg'
        }
      }        
    },
    uglify: {
      minify: {
        expand: true,
        cwd: 'bower_components',
        force: true,
        src: ['**/*.js', '!**/*.min.js'],
        filter: 'isFile',
        flatten: true,
        dest: 'dist/js/',
        ext: '.min.js',
        extDot: 'last'
      }
    }
  });

  grunt.loadNpmTasks('grunt-build-control');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-exec');
  grunt.loadNpmTasks('grunt-image-resize');
  grunt.registerTask('default', ['cssmin:minify', 'uglify:minify', 'image_resize:resize', 'copy:dist', 'exec:serve']);
  grunt.registerTask('deploy', ['exec:package', 'cssmin:minify', 'uglify:minify', 'image_resize:resize', 'copy:dist', 'buildcontrol:pages']);
};
