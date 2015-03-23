VENDOR := 'vendor'

COMPOSER := $(shell if [ `which composer` ]; then echo 'composer'; else curl -sS https://getcomposer.org/installer | php > /dev/null 2>&1 ; echo './composer.phar'; fi;)

db-reset:
	Binaries/doctrine orm:schema-tool:drop

db-install:
	chmod +x Binaries/sohoa
	chmod +x Binaries/hoa
	chmod +x Binaries/doctrine
	Binaries/doctrine orm:schema-tool:create

db-peuplate:
	Binaries/sohoa application sample:data

db-update:
	Binaries/doctrine orm:schema-tool:update

update:
	git pull -u origin master
	$(COMPOSER) update --no-dev
	make log

install:
	$(COMPOSER) install --no-dev
	make log

push:
	git add --all
	git commit -a -m "Update for push"
	git push
	make deploy

log:
	chmod 0777 Application/Log
	touch Application/Log/app.log
	chmod 0777 Application/Log/app.log