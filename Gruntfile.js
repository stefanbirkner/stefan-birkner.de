module.exports = function(grunt) {
  grunt.initConfig({
    clean: ['node_modules', 'target', '_site'],
    exec: {
      before_package: {
        command: 'rm -rf target;git clone git@github.com:stefanbirkner/stefanbirkner.github.io.git target;cd target;git rm -rf *'
      },
      prepare_deployment: {
        command: 'cd target; git add .'
      }
    },
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
  grunt.loadNpmTasks('grunt-exec');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:serve']);
  grunt.registerTask('deploy', ['exec:before_package', 'jekyll:package', 'exec:prepare_deployment']);
};
