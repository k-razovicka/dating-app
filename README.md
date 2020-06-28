**Instructions**

1. clone repository:
`git clone https://github.com/it14019/dating-app.git`
2. change directory to 'dating-app':
`cd dating-app`
3. install composer dependencies: 
`composer install`
4. install NPM dependencies: 
`npm install`
5. create a copy of your .env file:
`cp .env.example .env`
6. generate an app encryption key:
`php artisan key:generate`
7. log in with your mysql user and create an empty database with your desired database name
8. connect the database:
new->Data Source->mysql. Fill `user`, `password`, `database` fields. If asked, set `serverTimezone` value to `UTC`.
9. edit .env file information:
`APP_NAME=Matches
APP_URL=http://localhost:8000
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS=test@test.com`
at the end of .env file add:
`FILESYSTEM_DRIVER=public`

10. migrate the database:
`php artisan migrate`
11. create a symbolic link:
`php artisan storage:link`
12. run the project (make sure the port is 8000):
`php artisan serve` 
13. To generate fake users, run` php artisan db:seed`. By default, 480 fake users will ge generated and added to 
database. You can change number of users generated in `AppSeed.php file`. Just change value `480` to your desired amount.
Also, by default Picture factory will make 1-10 random pictures for generated users. You can change this amount by 
changing value `rand(1, 10)` to your desired.

Have fun!
