.PHONY : help
help :
	@echo "vendor : Run composer"
	@echo "test   : Run tests"

vendor: composer.json composer.lock
	    composer self-update
	    composer validate
	    composer install

test: vendor
	./vendor/phpunit/phpunit/phpunit --configuration=./phpunit.xml