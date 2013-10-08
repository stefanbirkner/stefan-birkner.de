module.exports = function(grunt) {
  grunt.initConfig({
    clean: ['node_modules', 'target', '_site'],
    jekyll: {
      serve: {
        src: 'src/main/webapp',
        serve: true
      },
      package: {
        src: 'src/main/webapp',
        dest: 'target'
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:serve']);
  grunt.registerTask('package', ['jekyll:package']);
};
