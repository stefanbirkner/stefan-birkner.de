module.exports = function(grunt) {
  grunt.initConfig({
    jekyll: {
      serve: {
        src: 'src/main/webapp',
        serve: true
      }
    }
  });

  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:serve']);
};
