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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

/*

COMANDOS DO ARTISAM

php artisan serve
-rodar a aplicação

php artisan route:list
-utilizado para listar as rotas

*/

Route::get('produtos', function () {
    return view('outras.produtos');
})->name('produtos');
Route::get('departamentos', function () {
    return view('outras.departamentos');
})->name('departamentos');
Route::get('nome', 'MeuControlador@getNome');
Route::get('idade', 'MeuControlador@getIdade');
Route::get('multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::resource('clientes', 'ClienteControlador');

/*
//GET
Route::get('/teste', function () {
    return "Ola mundo";
});

//rota com parametro
Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return "Ola! Seja bem vindo, " . $nome . " " . $sobrenome . "!";
});

//rota com parametro opcional
Route::get('/seunome/{nome?}', function ($nome=null) {
    if(isset($nome)){
        return "Ola! Seja bem vindo, " . $nome . "!";
    }else{
        return "Ola!";
    }
});

Route::get('/seunome/{nome?}', function ($nome = null) {
    if(isset($nome))
        return "Ola! Seja bem-vindo, " . $nome . "!";
    return "Seja Bem vindo!";
});

//rota com regra
Route::get('/rotascomregras/{nome}/{n}', function ($nome, $n) {
    for( $i = 0 ; $i < $n ; $i++ ){
        echo "<h3>Ola " . $nome . "!</h3></br>";
    }
})->where('nome', '[A-Za-z]+')->where('n', '[0-9]+');

//agrupamento de rotas
//nomear rotas
Route::prefix('/app')->group( function () {
    
    Route::get('/', function(){
        return view('app');
    })->name('app');
    
    Route::get('/user', function(){
        return  view('user');
    })->name('app.user');
    
    Route::get('/profile', function(){
        return  view('profile');
    })->name('app.profile');

});

Route::get('/produtos', function () {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

//redireciona para outra rota
Route::redirect('todosprodutos1', 'produtos', 301);

//redirecionamento mais util
Route::get('todosprodutos2', function () {
    return redirect()->route('meusprodutos');
});

//post
Route::post('/requisicoes', function (Request $request) {
    return 'Hello POST';
});

//deletar
Route::delete('/requisicoes', function (Request $request) {
    return 'Hello DELETE';
});

//update
Route::put('/requisicoes', function (Request $request) {
    return 'Hello PUT';
});

//update
Route::patch('/requisicoes', function (Request $request) {
    return 'Hello PATCH';
});

//options
Route::options('/requisicoes', function (Request $request) {
    return 'Hello OPTIONS';
});

//get
Route::get('/requisicoes', function (Request $request) {
    return 'Hello GET';
});
*/
