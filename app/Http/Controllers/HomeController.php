<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /**
     *  Create: daniel padilla
     *  Mail: dan.pd@live.com
     *  CV: https://www.dropbox.com/s/pfralxq29wee1f9/2019A%20Daniel%20Padilla%20Desarrollo%20de%20software.pdf?dl=0
     */
    public function __construct()
    {

    }
    public function index(){
        return view('home');
    }
    public function executePost(Request $request){
        // Laravel apartir de la version 7.0 ya  incorpora manejador un Cliente Http(Guzzle)
        // De ser una version menor se tendria que utilizar Guzzle HTTP client para este ejercicio no es necesaro ya que tenemos una version superior a las 7.0
        $r = [];
         if($request->ajax()){
             try {
                 $response = Http::post($request->input('urlpost'), [
                     'name' => 'daniel Padilla',
                     'mail' => 'dan.pd@live.com',
                 ]);
                 $r['urlpost']= $request->input('urlpost');
                 $r['httpPostStatus']= $response->status();
                 $r['body']= $response->body();
                 $r['successful']= $response->successful();
                 $r['clientError']= $response->clientError();
                 //Procesamos el tipo de respuesta
                 $r['data']=$this->statusLogPost($response,$request);
                 $r['status']=$r['data']['status'];




             } catch (\Exception $e) {
                 $r['status']= 0;
                 // Almacenamos la información del error.
                 \Log::critical('[Error] Http::get' . $e->getMessage());
             }
            return $r;


        }

    }
    function statusLogPost($response,$request){
        $statuslog = [];
        switch ($response->status()){
            case 404:
                //Podriamos guardar en otro servicio de base de datos temporal mientras se restaura el servicio principal
                $statuslog=$this->savePostServiceTemporary($request);
                //Registramos log en el sistema archivo o enviarlo por slack en algun canal predeterminado
                \Log::critical(  executePost::class . PHP_EOL." - ".json_encode($response) );
                break;
            case 200:
                $statuslog=$data['status']=200;
                //Como la respuesta la procesa (atomic) otro servidor, para este punto ya se guardo el registro en atomic
                //retornamos el registro exitoso al usuario
                break;

        }
        return $statuslog;

    }
    function savePostServiceTemporary(){
        $data=[];
        try {
            // guardado en db secundaria
           /* $users = DB::connection('dbrespaldo')->insert(
                ['name' => 'daniel padilla', 'mail' => 'dan.pd@live.com']
            );*/
            $data['status']=200;
            $data['savein']=array('name' => 'daniel padilla', 'mail' => 'dan.pd@live.com','db'=>'dbrespaldo');
        } catch(\Illuminate\Database\QueryException $ex){
            \Log::critical(  savePostServiceTemporary::class . PHP_EOL." - Error al guardar los datos en db respaldo" );
            $data['registro']['error']= $ex->getMessage();
            $data['status']=400;

        }
        return $data;

    }
}
