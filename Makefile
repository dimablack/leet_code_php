SHELL := /bin/bash

OK      := "\033[32;1m [Ok]\033[0m"

help:
	@printf 'Available commands\n\n'
	@IFS=$$'\n' ; \
		help_lines=(`fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//'`); \
		for help_line in $${help_lines[@]}; do \
			IFS=$$'#' ; \
			help_split=($$help_line) ; \
			help_command=`echo $${help_split[0]} | sed -e 's/^ *//' -e 's/ *$$//'` ; \
			help_info=`echo $${help_split[2]} | sed -e 's/^ *//' -e 's/ *$$//'` ; \
			printf "%-30s %s\n" $$help_command $$help_info ; \
		done

include .env

up: ## Start local environment
	docker-compose up -d
	@echo -e ${OK} 'Done'
	@echo -e "Visit"
	@echo -e ""
	@echo -e "${APP_URL}:${APP_PORT}"
	@echo -e ""


up-exec: ## Start local environment
	docker-compose up -d
	@echo -e ${OK} 'Done'
	docker exec -it leet_code_php_container bash

exec: ## Enter to local environment
	docker exec -it leet_code_php_container bash

up-build: ## Start local environment and rebuild docker container
	make predefine
	docker-compose build --no-cache
	docker-compose up -d
	@echo -e ${OK} 'Done'
	docker exec -it leet_code_php_container bash

stop: ## Stop local environment
	docker-compose stop
	@echo -e ${OK} 'Done'

down: ## Remove local environment
	docker-compose down

composer-install:
	docker exec leet_code_php_container bash -c 'composer install'
