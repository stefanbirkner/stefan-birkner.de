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
  grunt.registerTask('default', ['cssmin:minify', 'uglify:minify', 'copy:dist', 'exec:serve']);
  grunt.registerTask('deploy', ['exec:package', 'cssmin:minify', 'uglify:minify', 'copy:dist', 'buildcontrol:pages']);
};
