## Setup Instructions 

Clone the repository or extract it from the zip file. Launch xampp then start apache & mysql from xampp.
Open the terminal from the directory and run the followig commands. 

### `cd easy-check-up` 
### `composer install`
### `php artisan migrate`

Seed the premade data from easyCheckUpSeed.sql from the current directory

### `npm install`
### `npm run dev`
In a seperate terminal from the same directory run the command below.
### `php artisan serve`


Note: The app uses a third party api service, through which we get a list of doctors. We are using **Strapi** to serve this api and **ngrok** as a reverse proxy to point to my local raspberry pi which is hosting the Strapi service. If homepage takes some time to load it means Strapi is not running and doctors list will only load from the Database. Also please have an active internet connection as we are calling some another api to get data of locations from the addresses we put in.
