build:
	git clone git@github.com:stefanbirkner/stefanbirkner.github.io.git target;cd target;git rm -rf *;cd ..;grunt package;cd target; git add .
