<?php 

use Database\Transaction;
class ClientServices{
    public static function getData($request)
    {
        $id_pessoa = $request['id'];
        $pessoa_array = array();
        Transaction::open('livro'); 
        $client = Client::find()

    }

}