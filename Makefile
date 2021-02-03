jekyll_src=./site
jekyll_trg=./generated


build: html 

html:
	rm -rf $(jekyll_trg)/*
	jekyll build --source $(jekyll_src) --destination $(jekyll_trg) --trace

install: build
	sudo rm -rf /var/www/*
	sudo cp -R install/www/* /var/www
	sudo chown -R apache:apache /var/www/*
