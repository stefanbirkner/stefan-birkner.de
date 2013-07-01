build:
	git clone git@github.com:stefanbirkner/stefanbirkner.github.io.git target;cd target;git rm -rf *;cp -R ../src/main/webapp/* .; git add .

.PHONY: clean
clean:
	@rm -rf ./target
