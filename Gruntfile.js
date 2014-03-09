module.exports = function(grunt) {
  grunt.initConfig({
    clean: ['node_modules', 'target', '_site'],
    exec: {
      clear_deploy_repo: {
        command: 'git rm -rf *',
        cwd: 'target'
      },
      clone_deploy_repo: {
        command: 'rm -rf target;git clone git@github.com:stefanbirkner/stefanbirkner.github.io.git target'
      },
      deploy_to_github: {
        command: 'git add .;cat ../revision | xargs -i echo "Revision stefanbirkner/stefan-birkner.de@"{} | xargs -i git commit -m "{}"; git push',
        cwd: 'target'
      },
      delete_revision_file: {
        command: 'rm revision'
      },
      write_revision_file: {
        command: 'git rev-parse HEAD > revision'
      }
    },
    jekyll: {
      serve: {
        options: {
          src: 'app',
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

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-exec');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.registerTask('default', ['jekyll:serve']);
  grunt.registerTask('deploy', ['exec:clone_deploy_repo', 'exec:clear_deploy_repo', 'jekyll:package', 'exec:write_revision_file', 'exec:deploy_to_github', 'exec:delete_revision_file']);
};
