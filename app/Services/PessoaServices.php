<?php 
    use Vendor\Database\Transaction;
    class PessoaServices{
        public static function getData($request)
        {
            $id_pessoa = $request['id'];
            $pessoa_array = array();
            echo "Vai abri transaction ";
            echo "<br>"; 
            Transaction::open('livro');
            echo "Vai abrir LoggerTXT "; 
            echo "<br>";
           // $log = new Vendor\Log\LoggerTXT('./logService.txt'); 
            $log = new LoggerTXT('./logService.txt');
            print_r($log); 
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