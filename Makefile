VENDOR := 'vendor'
COMPOSER := $(shell if [ `which composer` ]; then echo 'composer'; else curl -sS https://getcomposer.org/installer | php > /dev/null 2>&1 ; echo './composer.phar'; fi;)

db-drop:
	Binaries/doctrine orm:schema-tool:drop --force

db-install:
	chmod +x Binaries/sohoa
	chmod +x Binaries/hoa
	chmod +x Binaries/doctrine
	Binaries/doctrine orm:schema-tool:create

db-peuplate:
	Binaries/sohoa application sample:data

db-reset:
    db-drop
    db-install

db-update:
	Binaries/doctrine orm:schema-tool:update

db-right:
    chmod 0777 Application/Maestria-orm.db

log:
	chmod 0777 Application/Log
	touch Application/Log/app.log
	chmod 0777 Application/Log/app.log

install:
	Binaries/doctrine orm:schema-tool:update