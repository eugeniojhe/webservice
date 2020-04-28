<?php 
use Vendor\Database\Transaction;
class PessoaServices{
    public static function getData($request)
    {
        $id_pessoa = $request['id'];
        $pessoa_array = array();
        echo "Vai chamar pessoa::find "."<br>"; 
        Transaction::open('livro'); 
        $pessoa = Pessoa::find($id_pessoa); 
        echo "Chamou pessoa::find"."<br>"; 
        if ($pessoa){
            $pessoa_array = $pessoa->toArray(); 
        }else{
            throw new Exception("Pessoa {$id} não encontrada "); 
        }
        Transaction::close();
        return $pessoa_array;
     }

}