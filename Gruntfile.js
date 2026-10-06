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
    clean: ['node_modules', 'dist', '_site'],
    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'node_modules/reveal.js/dist',
          src: ['reveal.js'],
          dest: 'dist/js'
        }, {
          expand: true,
          cwd: 'node_modules/reveal.js/dist',
          src: ['reset.css', 'reveal.css', 'reveal.js', 'themes/white.css'],
          dest: 'dist/css'
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
  grunt.registerTask('default', ['copy:dist', 'exec:serve']);
  grunt.registerTask('deploy', ['exec:package', 'copy:dist', 'buildcontrol:pages']);
};
