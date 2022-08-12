#### Cara setup
1. `Composer install`
2. `npm i`
3. `copy .env.example .env` lalu `php artisan key:generate` lalu sesuaikan dah site url nya dan database nya
4. `php artisan migrate`
5. `php artisan db:seed`


#### Note
- Cara buat survei ikutin disini https://github.com/matt-daneshvar/laravel-survey dan buat pertanyaannya di file SurveySeeder di folder database > seeders
- runningnya `npm run dev` atau build dulu dengan `npm run build`


#### Spec
- PHP 8
- WampServer
- Nodejs 16
