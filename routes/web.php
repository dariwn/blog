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
Route::match(['get','post'],'/salir', 'loginController@logout');
Route::resource('/usuario', 'UsuarioController');
Route::resource('/nuevo', 'NuevoController');
Route::get('/ver', 'NuevoController@ver')->name('administradora.ver');
Route::get('grafica-pastel', 'NuevoController@graficaPastel')->name('graficapastel');
Route::get('cantidad-alumnos-contratadosp', 'NuevoController@graficaAlumnosp')->name('graficaalumnosp');
Route::get('cantidad-alumnos-contratadosb', 'NuevoController@graficaAlumnosb')->name('graficaalumnosb');
Route::get('grafica-barra', 'NuevoController@graficaBarra')->name('graficabarra');       
Route::get('/reporte', 'NuevoController@ver_reporte')->name('ver_reporte');
Route::post('/imprimiendo-reporte', 'NuevoController@descargar_reporte')->name('descargar_reporte');
Route::resource('usuarios-empresa','UserEmpreController');
Route::resource('usuarios-egresados','UserEgreController');
Route::resource('usuarios-sistema', 'UserAdminController');
Route::get('/ver-grafica', 'NuevoController@ver_grafica');

Route::match(['get','post'], '/BTEmpresa', 'logueoController@login');//Empresa
Route::match(['get','post'],'/default', 'logueoController@logout');
Route::resource('/empresa', 'EmpresaController');
Route::get('municipio/{id}','EmpresaController@getMunicipio');
Route::get('/hola', 'EmpresaController@nuevo')->name('empresa.nuevo');
Route::resource('/solicitud', 'SolicitudController');
Route::get('/postulado/{id}', 'SolicitudController@ver')->name('ver');
Route::post('/cambio-estatus/{id}', 'SolicitudController@boton')->name('boton');
Route::resource('/bienvenido', 'SolicitudperfilController');
Route::get('/curriculopdf/{id}', 'SolicitudController@curriculopdfver');
Route::get('/encuesta/{id}', 'SolicitudController@encuesta');

Route::match(['get','post'], '/BTEgresado', 'logearController@login');//Egresado
Route::match(['get','post'],'/exit', 'logearController@logout');
Route::resource('/egresado', 'EgresadoController');
Route::get('municipio/{id}','EgresadoController@getMunicipio');
Route::get('administrador/{id}', 'EgresadoController@index');
Route::get('/solicitud-egresado', 'EgresadoController@versolicitud')->name('versolicitud');
Route::get('/postulacion/{id}', 'EgresadoController@postularse')->name('postularse');
Route::post('/postulacion-registrada', 'EgresadoController@guardar_postulados')->name('guardar_postulados');
Route::get('/postulaciones', 'EgresadoController@postulaciones')->name('postulaciones');
Route::post('/cambio-estatus-egresado/{id}', 'EgresadoController@botonEgresado')->name('botonEgresado');
Route::resource('/curriculo', 'CurriculoController');
Route::get('/curriculopdf', 'CurriculoController@curriculopdf');
Route::get('/onda', 'CurriculoController@curriculo')->name('curriculo.crear');
Route::get('municipio/{id}','CurriculoController@getMunicipio');
Route::get('/crear', 'EgresadoController@bienvenido')->name('egresado.bienvenido');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
