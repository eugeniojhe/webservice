<?php 
    use Vendor\Database\Transaction;
    class PessoaServices{
        public static function getData($request)
        {
            $id_pessoa = $request['id'];
            $pessoa_array = array();
            Transaction::open('livro');
            echo "Vai abrir LoggerTXT "; 
            echo "<br>";
            $log = new Vendor\Log\LoggerTXT('./logService.txt'); 
            echo "Abriu ";
            echo "<br>"; 
            
            Transaction::setLogger($log);  
            $pessoa = Pessoa::find($id_pessoa); 
            if ($pessoa){
                $pessoa_array = $pessoa->toArray(); 
            }else{
                throw new Exception("Pessoa {$id_pessoa} não encontrada "); 
            }
            Transaction::close();
            return $pessoa_array;
        }
    }