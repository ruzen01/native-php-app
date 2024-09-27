# Параметры
PORT = 8000
HOST = localhost
PUBLIC_DIR = public

# Команда для запуска приложения локально
run:
	@echo "Запуск PHP-сервера на $(HOST):$(PORT)..."
	php -S $(HOST):$(PORT) -t $(PUBLIC_DIR)

# Имя файла базы данных
DB_FILE=./database/npadb.db

# Команда для установки зависимостей с использованием Composer
install:
	composer install

# Команда для создания базы данных SQLite
setup-db:
	@if [ ! -f $(DB_FILE) ]; then \
		touch $(DB_FILE); \
		echo "CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT, first_name TEXT, last_name TEXT);" | sqlite3 $(DB_FILE); \
		echo "Database created successfully."; \
	else \
		echo "Database already exists."; \
	fi

# Команда для запуска сидера (наполнение базы данных начальными данными)
seed-db:
	@php artisan db:seed --class=UserSeeder
	@echo "Database seeded successfully."

# Команда для полного выполнения всех шагов
setup: install setup-db seed-db
	@echo "Project setup complete!"