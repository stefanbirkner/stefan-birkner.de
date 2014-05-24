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
        ext: '.min.css'
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
    }
  });

  grunt.loadNpmTasks('grunt-build-control');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:package', 'cssmin:minify', 'copy:dist', 'jekyll:serve']);
  grunt.registerTask('deploy', ['jekyll:package', 'cssmin:minify', 'copy:dist', 'buildcontrol:pages']);
};
