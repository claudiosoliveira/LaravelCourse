<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('Teste', function() {
    echo "Ola Mundo!";
}); 

Route::get('/Teste/{nome1}/{nome2}', function($nome1, $nome2) {
    echo "Ola " . $nome1 . " " . $nome2 . " !";
});
    
Route::get('/seunome/{nome?}', function($nome=null) {
    if (isset($nome))
        return "Ola " . $nome;
    return "cade o nome?";
});
    
Route::get('/rotacomregra/{nome}/{n}', function($nome, $n) {
    for($i = 0; $i < $n; $i++)
        echo "Ola $nome! <br>"; 
})-> where('nome', '[A-Za-z]+')
  -> where('n', '[0-9]+');
    
Route::prefix('/app')->group( function(){
    
    Route::get('/', function(){
        return view('app');
    })->name('app');
        
    Route::get('/user', function(){
        return view('user');
    })->name('app.user');
    
    Route::get('/profile', function(){
        return view('profile');
    })->name('app.profile');
});
    
Route::get('/produtos', function () {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');
    
Route::redirect('todosprodutos1', 'produtos', 301);
    
Route::get('todosprodutos2' , function () {
    return redirect()->route('meusprodutos');
});
    
    ////////////////////////////////////////////
    
Route::post('/requisicoes' , function(Request $request){
    return 'Hello post';
});
    
Route::delete('/requisicoes' , function(Request $request){
    return 'Hello delete';
});
    
Route::put('/requisicoes' , function(Request $request){
    return 'Hello put';
});
    
Route::patch('/requisicoes' , function(Request $request){
    return 'Hello patch';
});
    
Route::options('/requisicoes' , function(Request $request){
    return 'Hello options';
});
    
Route::get('/requisicoes' , function(Request $request){
    return 'Hello get';
}); */
    
//Route::get('produtos', 'MeuControlador@produtos');

Route::get('produtos', function(){
    return view('outras.produtos');
})->name('produtos'); // nomear rota

Route::get('departamentos', function(){
    return view('outras.departamentos');
})->name('departamentos'); //nomear rota

Route::get('nome', 'MeuControlador@getNome');

Route::get('idade', 'MeuControlador@getIdade');

Route::get('multiplicar/{n1}/{n2}', 'MeuControlador@multiplicador');

Route::resource('clientes', 'ClienteControlador');

Route::get('opcoes/{opcao?}', function($opcao=null){
    return view('outras.opcoes', compact(['opcao']));
})->name('opcoes');