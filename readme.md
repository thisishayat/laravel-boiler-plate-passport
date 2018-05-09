## Token install

#### laravel passport commands are:

php artisan migrate
php artisan passport:install
php artisan passport:keys

#### add following line to user model

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
}


#### ajax example of data

var form = new FormData();
form.append("email", "h.u.zaman@gmail.com");
form.append("password", "12345678");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://103.85.112.76:8025/api/sign-up",
  "method": "POST",
  "headers": {
    "authorization": "Bearer 152584987578669158",
    "cache-control": "no-cache",
    "postman-token": "974efb20-5c68-bd19-50f1-9f97a05d0d44"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});



var form = new FormData();
form.append("username", "h.u.zaman@gmail.com");
form.append("password", "12345678");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://103.85.112.76:8025/api/login",
  "method": "POST",
  "headers": {
    "client": "Androd",
    "cache-control": "no-cache",
    "postman-token": "0ef2773b-7798-02e5-1f40-14a4602186d4"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});