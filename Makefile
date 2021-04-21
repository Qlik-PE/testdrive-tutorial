jekyll_src=./site
jekyll_trg=./generated


build: html 

html:
	rm -rf $(jekyll_trg)/*
	jekyll build --source $(jekyll_src) --destination $(jekyll_trg) --trace

install: build
	sudo rm -rf /var/www/html/*
	sudo cp -R generated/* /var/www/html
	sudo chown -R apache:apache /var/www/html/*
