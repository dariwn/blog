<?php

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

Route::match(['get', 'post'],'/BTAdministradora', 'loginController@login');//Administradora
Route::get('/salir', 'loginController@logout');
Route::resource('/usuario', 'UsuarioController')->middleware('verified');
Route::resource('/nuevo', 'NuevoController')->middleware('verified');
Route::get('/ver', 'NuevoController@ver')->name('administradora.ver')->middleware('verified');
Route::get('grafica-pastel', 'NuevoController@graficaPastel')->name('graficapastel');
Route::get('cantidad-alumnos-contratadosp', 'NuevoController@graficaAlumnosp')->name('graficaalumnosp');
Route::get('cantidad-alumnos-contratadosb', 'NuevoController@graficaAlumnosb')->name('graficaalumnosb');
Route::get('grafica-barra', 'NuevoController@graficaBarra')->name('graficabarra');       
Route::get('/reporte', 'NuevoController@ver_reporte')->name('ver_reporte');
Route::post('/imprimiendo-reporte', 'NuevoController@descargar_reporte')->name('descargar_reporte');
Route::resource('usuarios-empresa','UserEmpreController')->middleware('verified');
Route::resource('usuarios-egresados','UserEgreController')->middleware('verified');
Route::resource('usuarios-sistema', 'UserAdminController')->middleware('verified');
Route::get('/ver-grafica', 'NuevoController@ver_grafica');
Route::post('/grafica', 'NuevoController@grafica');
Route::put('ajustescorreoadmin/{id}/actualizado','UserAdminController@update2')->name('ajustescorreoadministrador.update');
Route::resource('ajustescorreoadmin', 'UserAdminController');

Route::match(['get','post'], '/BTEmpresa', 'logueoController@login');//Empresa
Route::get('/exitempresa', 'logueoController@logout');
Route::resource('/empresa', 'EmpresaController')->middleware('verified');
Route::get('municipio/{id}','EmpresaController@getMunicipio');
Route::get('/hola', 'EmpresaController@nuevo')->name('empresa.nuevo');
Route::resource('/solicitud', 'SolicitudController')->middleware('verified');
Route::get('/postulado/{id}', 'SolicitudController@ver')->name('ver');
Route::post('/cambio-estatus/{id}', 'SolicitudController@boton')->name('boton');
Route::resource('/bienvenido', 'SolicitudperfilController');
Route::get('/curriculopdf/{id}', 'SolicitudController@curriculopdfver');
Route::get('/encuesta/{id}', 'SolicitudController@encuesta');
Route::resource('/RegistroEmpresa', 'RegistroEmController');
Route::resource('ajustesemp', 'UserEmpreController');

Route::match(['get','post'], '/BTEgresado', 'logearController@login');//Egresado
Route::get('/exit', 'logearController@logout');

Route::get('ajustescorreo/{id}/correo', 'EgresadoController@edit2')->name('ajustescorreo.correo');
Route::put('ajustescorreo/{id}/actualizado','EgresadoController@update2')->name('ajustescorreo.update');

Route::resource('/egresado', 'EgresadoController')->middleware('verified');
Route::get('municipio/{id}','EgresadoController@getMunicipio');
Route::get('administrador/{id}', 'EgresadoController@index');
Route::get('/solicitud-egresado', 'EgresadoController@versolicitud')->name('versolicitud')->middleware('verified');
Route::get('/postulacion/{id}', 'EgresadoController@postularse')->name('postularse');
Route::post('/postulacion-registrada', 'EgresadoController@guardar_postulados')->name('guardar_postulados');
Route::get('/postulaciones', 'EgresadoController@postulaciones')->name('postulaciones')->middleware('verified');
Route::post('/cambio-estatus-egresado/{id}', 'EgresadoController@botonEgresado')->name('botonEgresado');
Route::resource('/curriculo', 'CurriculoController');
Route::get('/curriculopdf', 'CurriculoController@curriculopdf');
Route::get('/onda', 'CurriculoController@curriculo')->name('curriculo.crear')->middleware('verified');
Route::get('municipio/{id}','CurriculoController@getMunicipio');
Route::get('/crear', 'EgresadoController@bienvenido')->name('egresado.bienvenido');
Route::resource('/ajustes', 'UserEgreController');
Route::resource('/nuevoegresado', 'RegistroEController')->middleware('verified');





Route::resource('/RegistroEgresado', 'RegistroEController');


Auth::routes(['verify' => true ]);

Route::get('/home', 'HomeController@index')->name('home');
