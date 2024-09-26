# Параметры
PORT = 8000
HOST = localhost
PUBLIC_DIR = public

# Команда для запуска приложения локально
run:
	@echo "Запуск PHP-сервера на $(HOST):$(PORT)..."
	php -S $(HOST):$(PORT) -t $(PUBLIC_DIR)