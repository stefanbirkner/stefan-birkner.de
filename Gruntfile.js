module.exports = function(grunt) {
  grunt.initConfig({
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

  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:serve']);
  grunt.registerTask('package', ['jekyll:package']);
};
