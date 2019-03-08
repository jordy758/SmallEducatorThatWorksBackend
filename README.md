# SmallEducatorThatWorksBackend

Clone the project to your computer. Make sure you have the following dependencies installed.

* Composer
* PHP
* MySQL
* Node (npm)

These dependencies are on mac easily installed through brew. Please note that laravel/valet is being installed here as well. This is a great tool to easliy execute your PHP app locally.

**MacOS only**

```brew install composer php mariadb && composer global require laravel/valet```

**Windows**

For windows you probably wanna look at something like WAMP for your local server. You can also look at something like this https://github.com/cretueusebiu/valet-windows, I've tried it and it's alright, but requires some knownledge.

In the directory run the following commands.

```npm install && composer install```

Now in the project, there is a ```.env_example``` file, copy this file and name it ```.env```,open it and change all the variables that need changing there (for the db, just create a new database and fill in the creds there).

When you've got your MySQL set up, run ```php artisan migrate``` in the project folder to create all the tables. This should generate the entire db structure for you.

With valet you can now run the following command ```valet link``` in the folder, this creates the needed server for you. You can then just easly checkout the website by visiting the following url in your browser.

http://{YOUR_PROJECT_FOLDER_NAME}.test/
