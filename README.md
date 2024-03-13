# Book**Buzz**

Welcome to BookBuzz. Here, you can read articles about top and trending books. Look up famous authors and their top works, search top books and even get links to buy your favourite books. Create your own blog posts, add images and description to your blog posts. 

![image](https://github.com/henryelga/bookBlog-server_side/assets/67817308/fa30a330-8a1b-460e-8e38-de4c4fc20637)

### Features

- **Login/Register:** Login as a user to create new blog posts, and also to edit or delete posts. Register for a new account if you do not have an account.
- **Random Quotes:** Random quotes generated using [Quotable API](https://api.quotable.io)

<p align="center">
<img src="https://github.com/henryelga/bookBlog-server_side/assets/67817308/f3b3317c-86c9-46c5-9db5-63dd9e7807ab)" width="500" />
</p>

- **Look up Authors, Search Books, Buy Books:** Feature to look up authors, search books, and get links to buy books. Data fetched from [Open Library API](https://openlibrary.org/developers/api)

<p align="center">
<img src="https://github.com/henryelga/bookBlog-server_side/assets/67817308/9cde6622-1312-4271-914f-048cb53a8963" width="600" />
    </p>
    <p align="center">
    <img src="https://github.com/henryelga/bookBlog-server_side/assets/67817308/68ac4222-7aa8-4025-b3f2-5f21fea56a9b" width="600" />
    </p><p align="center">
    <img src="https://github.com/henryelga/bookBlog-server_side/assets/67817308/feae2908-8873-4cf4-86b6-edb1c7b248c4" width="600" />
    </p>
    



## Laravel 8 Complete Blog

This repository is linked to [this youtube video](https://www.youtube.com/watch?v=HKJDLXsTr8A&t=4710s) where I show you how to create a complete blog in Laravel 8 using best practices.

•	Author: Code With Dary <br>
•	Twitter: [@codewithdary](https://twitter.com/codewithdary) <br>
•	Instagram: [@codewithdary](https://www.instagram.com/codewithdary/) <br>

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:codewithdary/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables
```
php artisan migrate
```

## Contributing
Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.
