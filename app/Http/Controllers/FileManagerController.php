<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
if(!$request->has("name")){
  return response("Missing Name",400);
}
    try 
    {
      Storage::disk('google')->makeDirectory($request->input('name'));
      $dir = '/';
      $recursive = false; // Get subdirectories also?
      $contents = collect( Storage::disk('google')->listContents($dir, $recursive));
      $dir = $contents->where('type', '=', 'dir')
          ->where('filename', '=', $request->input('name'))
          ->first(); // There could be duplicate directory names!
      if ( ! $dir) 
      {
        Storage::disk('google')->makeDirectory($request->input('name'));
        $contents = collect( Storage::disk('google')->listContents($dir, $recursive));
        $dir = $contents->where('type', '=', 'dir')
            ->where('filename', '=', $request->input('name'))
            ->first(); // There could be duplicate directory names!
        Storage::disk('google')->putFileAs($dir['path'], $request->file('archivo'), $request->file('archivo')->getClientOriginalName());
       dd('created an sabe');
      } 
      Storage::disk('google')->putFileAs($dir['path'], $request->file('archivo'), $request->file('archivo')->getClientOriginalName());
    
      dd('sabe');
    
    
    
      /*  $flag1=Storage::disk('google')->exists($request->input('name'));
      Storage::disk('google')->makeDirectory($request->input('name'));
      $flag=Storage::disk('google')->exists($request->input('name'));
      $carpetas = Storage::disk('google')->listContents();
      array_push($carpetas , $flag );
      array_push($carpetas , $flag1 );
     // $flag = array_search($request->input("name"), array_column($carpetas, 'name'));
     dd($carpetas);*/
    
     //$flag=Storage::disk('google')->exists("1zeLL0fv0SyYiDNhuEMUlCxWseEU8_QBm");
    //Storage::disk('google')->makeDirectory($request->input('name'));
    // dd($flag);
   
     // $folder = Storage::disk('google')->get("a");

     
      $path = Storage::disk('google')->putFileAs('', $request->file('archivo'), $request->file('archivo')->getClientOriginalName());
      // $path =  $request->file("archivo")->storeAs("",$request->file('archivo')->getClientOriginalName(),"google");
      return "su archivo fue exitozamente subido al drive";
    } 
    catch (Exception $e) 
    {
      dd("dammmm");
      $path = Storage::disk('local')->putFileAs('archivos', $request->file('archivo'), $request->file('archivo')->getClientOriginalName());
      return "No se pudo comunicar con drive, fue guardado en la carpeta del servidor";
    }
  }
}

