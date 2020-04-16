<?php 

use Database\Transaction;
class PessoaServices{
    public static function getData($request)
    {
        $id_pessoa = $request['id'];
        $pessoa_array = array();
        $pessoa = Pessoa::find($id); 
        if ($pessoa){
            $pessoa_array = $pessoa->toArray(); 
        }else{
            throw new Exception("Pessoa {$id} não encontrada "); 
        }
        Transaction::close();
        return $pessoa_array;
     }

}