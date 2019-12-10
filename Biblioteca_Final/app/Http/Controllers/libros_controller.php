<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class libros_controller extends Controller
{
    public function listarLibros(){
        
        $libros = Libro::all(['id','titulo', 'sipnosis', 'genero', 'autor' ]);
        return $libros;
    }

    public function listarAutor($autor) {
        $libros = Libro::all()->where('autor', $autor);
        return response()->json($libros);
    }
    public function listarGenero($genero) {
        $libros = Libro::all()->where('autor', $genero);
        return response()->json($libros);
    }

    public function listarTitulo($titulo) {
        $libros = Libro::all()->where('autor', $titulo);
        return response()->json($libros);
    }

    public function listarSipnosis($sipnosis) {
        $libros = Libro::all()->where('autor', $sipnosis);
        return response()->json($libros);
    }



  
      public function anadirLibros(Request $request) {
       
        $response = array('error_code' => 400, 'error_msg' => 'Error al insertar informacion');
        $libro = new Libro;
     
        
        
        if(!$request->titulo){
            $response['error_msg'] = 'Se requiere un nombre';
         
        }
        elseif(!$request->sipnosis){

            $response['error_msg'] = ' se requiere una sipnosis';

        }
        
        elseif(!$request->genero) {
          
            $response['error_msg'] = 'se requiere un genero';

        }
        
        elseif(!$request->autor) {

            $response['error_msg'] = 'se requiere un autor';

        }

        else{
            try{
                $libro->titulo = $request->titulo;
                $libro->sipnosis = $request->sipnosis;
                $libro->genero = $request ->genero;
                $libro->autor = $request ->autor;
                $libro->save();
                $response = array('error_code' => 200, 'error_msg' => '');

                }
               catch(\Exception $e) {
                   $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
               } 

        }
            return response()->json($response);
        
    }

    public function modificarLibros(Request $request, $id) {

        $response = array('error_code' => 404, 'error_msg' => 'Libro '.$id.' No se encuentra este libro');
        $libro = Libro::find($id);
        if(!empty($libro)) {
            $libro->titulo=$request->titulo;
            $libro->autor=$request->autor;
            $libro->genero=$request->genero;
            $libro->sinopsis=$request->sinopsis;
            $libro->titulo=$request->titulo;
            $libro->save();
            $response = array('error_code' => 200, 'error_msg' => 'libro modificado');
        }
        return response()->json($response);

    }

    public function borrarLibros(Request $request, $id) {
        $response = array('error_code' => 200, 'error_msg' => 'libro borrado');
        $libro=libro::find($id);
        $libro->delete();
        return response()->json($response);
    




    }
    }


        
        



    




