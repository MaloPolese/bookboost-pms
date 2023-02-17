up:
	./vendor/bin/sail up

migrate:
	php artisan migrate:fresh --seed

test:
	php artisan test
