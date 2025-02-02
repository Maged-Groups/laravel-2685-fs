# run the app
php artisan serve
php artisan ser
php artisan server --port=5400
php artisan ser --port=5400

# list all routes
php artisan route:list
php artisan r:l

# create a controller
php artisan make:controller ReplyController

# create a controller with basic 7 resource methods
php artisan make:controller ReplyController -r

# Create a new migration (TABLE)
php artisan make:migration create_posts_table

# Check migrations status
php artisan migrate:status

# Run pending migrations
php artisan migrate

# Undo a migration (Rollback)
php artisan migrate:rollback

# Undo number of migration (Rollback specifc steps)
php artisan migrate:rollback --step=3

# Undo all migrations at once and run them again
php artisan migrate:refresh

# Drop all tables and re-run all migrations
php artisan migrate:fresh

# make model
php artisan make:model Post

# make model with controller
php artisan make:model Post -c

# make model with resource controller
php artisan make:model Post -cr

# make model with migration
php artisan make:model Post -m

# make model with all 7 basic classes
php artisan make:model Post -a

