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
          cwd: 'bower_components/font-awesome-bower',
          src: 'fonts/*',
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
    image_resize: {
      resize: {
        options: {
          height: 133,
          width: 200
        },
        files: {
          'dist/se/readme-driven-development/images/book.jpeg' : 'app/se/readme-driven-development/images/documentation.jpeg'
        }
      }        
    },
    jekyll: {
      serve: {
        options: {
          src: 'dist',
          serve: true
        }
      },
      package: {
        options: {
          src: 'app',
          dest: 'dist'
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
  grunt.loadNpmTasks('grunt-image-resize');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:package', 'cssmin:minify', 'uglify:minify', 'image_resize:resize', 'copy:dist', 'jekyll:serve']);
  grunt.registerTask('deploy', ['jekyll:package', 'cssmin:minify', 'uglify:minify', 'image_resize:resize', 'copy:dist', 'buildcontrol:pages']);
};
