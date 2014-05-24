module.exports = function(grunt) {
  grunt.initConfig({
    buildcontrol: {
      options: {
        dir: 'target',
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
    clean: ['node_modules', 'target', '_site'],
    jekyll: {
      serve: {
        options: {
          src: 'target',
          serve: true
        }
      },
      package: {
        options: {
          src: 'app',
          dest: 'target'
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-build-control');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:package', 'jekyll:serve']);
  grunt.registerTask('deploy', ['jekyll:package', 'buildcontrol:pages']);
};
