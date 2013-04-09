build:
	git clone git@github.com:stefanbirkner/stefan-birkner.de.git target;cd target;git checkout gh-pages;git rm -rf *;cp -R ../src/main/webapp/* .; git add .

.PHONY: clean
clean:
	@rm -rf ./target
