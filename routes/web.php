<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/{id}', 'App\Http\Controllers\MikoController@index');

Route::resource('/posts', 'App\Http\Controllers\WebController');

Route::get('/insert', function () {
    DB::insert('insert into sdudents(name, date_of_birth, gpa, advisor) values(?,?,?,?)', ['Ospan', '2002-04-14', 2, 'Ualikhan']);
    
});

Route::get('/select', function () {
   $results=DB::select('select * from sdudents where id=?',[1]);
   foreach($results as $sdudents){
       echo "name is :" . $sdudents->name;
       echo "<br>";
       echo "date_of_birth :" . $sdudents->date_of_birth;
   }
});
   Route::get('/update', function () {
    $updated=DB::update('update sdudents set gpa=4 where id=?',[1]);
     return $updated;
    });
    Route::get('/delete', function () {
        $deleted=DB::delete('delete from sdudents where id=?',[1]);
         return $deleted;
        });

        Route::get('/insertt', function () {
            $Student=new Student;
            $Student->name='Sanzhar';
            $Student->date_of_birth='2002-02-06';
            $Student->gpa=4;
            $Student->advisor='Albina';
            $Student->save();
        });

        Route::get('/find', function () {
            $sdudents=Student::where('id',2)->first();
            return $sdudents;
        });

        Route::get('/bupdate', function () {
            $student=Student::find(2);
            $student->name='Arman';
            $student->gpa=1;
            $student->save();
        });

        Route::get('/bdelete', function () {
            $student=Student::find(5);
            $student->delete();
        });