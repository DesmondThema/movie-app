# About MovieApp

MovieApp is a basic Movie platform powered by [Laravel](https://laravel.com/) at the back engine, [Livewire](https://laravel-livewire.com/) at the front office and [TailwindCss](https://tailwindcss.com)

## Requirement for local installation 
1. PHP >= 7.3.
2. Composer

## Local Installation
1. Clone this repo  
`git clone https://github.com/DesmondThema/movie-app.git`
2. cd into project  
`cd movie-app`
3. Install composer dependecies
`composer install`
4. Install NPM Dependencies  
`npm install`
5. Copy the .env.example file and rename it into the .env file  
`copy .env.example .env` 
6. Generate application key  
`php artisan key:generate  
`
7. Create database. 
Create an empty database for your project using the database tools you prefer (My favorite is SequelPro for mac). In the .env file fill in your database credentials
8. Migrate the database  
`php artisan migrate:fresh` 
11. Seed the database 
`php artisan db:seed`  
12. Build assets. 
12. `npm run dev`
13. Run the application  
`php artisan serve`  

