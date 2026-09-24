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
          remote: 'https://github.com/stefanbirkner/stefan-birkner.de.git',
          branch: 'gh-pages'
        }
      }
    },
    clean: ['node_modules', 'dist', '_site', 'app/static/lib'],
    copy: {
      lib: {
        files: [{
          expand: true,
          cwd: 'bower_components',
          src: ['**'],
          dest: 'app/static/lib/'
        }]
      }
    },
    exec: {
      serve: "cd app;hugo serve",
      package: "rm -r dist;mkdir -p dist;cd app;hugo;mv public/* ../dist/"
    }
  });

  grunt.loadNpmTasks('grunt-build-control');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-exec');
  grunt.registerTask('default', ['copy:lib', 'exec:serve']);
  grunt.registerTask('deploy', ['copy:lib', 'exec:package', 'buildcontrol:pages']);
};
