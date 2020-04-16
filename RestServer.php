<?php 

class RestServer
{
    public static function run($request)
    {
       $class = isset($request['class']?$request['class']:'');
       $method = isset($request['method']?$request['methdo']:'');
       $response = null; 
       try{
         if (class_exists($class)){
             if(method_exists($method)){
                 $response = call_user_func(array($class,$method),$request);
                 return json_encode(array('status' => 'sucess',
                                    'data' =>$response));

             }else{
                 error_message("Class {$class}::{$method} nao existe");
                 return json_encode(array('status' =>'error',
                                          'data '=> $error_message))
             }

         }else{
             $error_message("Classe {$class} nao encontrada ");
             return json_encode(array('status' => 'error',
                                       'data' => $error_message))
         }
       }catch(Exception $e){
           return json_encode(array('status' =>'erro',
                                     'data' => $e->getMessage()));
       }
    }   
}