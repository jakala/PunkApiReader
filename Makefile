#
# Makefile para simplificar las tareas comunes
#

# ejecutar docker-compose para crear el contenedor
.PHONY: compose
compose: CMD=up -d --build

.PHONY: compose_start
compose_start compose:
	docker-compose $(CMD)

# ejecutar behat tests
.PHONY: behat
behat: CMD=-f progress

.PHONY: behat_tests
behat_tests behat:
	vendor/bin/behat $(CMD)

# crear informe de metricas php
.PHONY: metrics
metrics: CMD=--report-html=var/metrics src

.PHONY: metrics_php
metrics_php  metrics:
	vendor/bin/phpmetrics $(CMD)

# ejecutar php-cs-fixer
.PHONY: fixer
fixer: CMD=fix src

.PHONY: fixerparams
fixerparams fixer:
	vendor/bin/php-cs-fixer $(CMD)

# ejecutar test unitarios phpunit
.PHONY: tests
tests: CMD=vendor/bin/phpunit --coverage-html var/coverage

.PHONY: phpunit
phpunit tests:
	docker exec -ti punkapireader $(CMD)

# instalar vendors
.PHONY: install_composer
install_composer: CMD=--ignore-platform-reqs

.PHONY: vendors
vendors install_composer:
	composer install $(CMD)