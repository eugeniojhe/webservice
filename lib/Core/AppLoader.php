<?php
namespace Livro\Core;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Exception;

/**
 * Carrega a classe da aplicação
 * @author Eugenio 
 */
class AppLoader
{
    protected $directories;
    
    /**
     * Adiciona um diretório a ser vasculhado
     */
    public function addDirectory($directory)
    {
        $this->directories[] = $directory;
    }
    
    /**
     * Registra o AppLoader
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }
    
    /**
     * Carrega uma classe
     */
    public function loadClass($class)
    {
		$folders = $this->directories;
		echo "<br>"; 
        echo "STARTING LOADCLASS OF AppLoade01r CLASS ".$class."<br>";
        echo "No diretorio ",
        print_r($folders); 
		echo "<br>"; 
		 
        foreach ($folders as $folder)
        {
			
			if (file_exists("{$folder}/{$class}.php"))
            {
				require_once "{$folder}/{$class}.php";
				echo "Classa found em   AppLoader01  {$folder}/{$class}.php------- "."<br>";
                return TRUE;
            }
            else
            {
                if (file_exists($folder))
                {
                    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::SELF_FIRST) as $entry)
                    {
                        if (is_dir($entry))
                        {
                            if (file_exists("{$entry}/{$class}.php"))
                            {
								require_once "{$entry}/{$class}.php";
								echo "----FILE FINDED ON SECOND FOREACH ITERATOR ------- "."<br>";
                                return TRUE;
                            }
                        }
                    }
                }
            }
		}
		echo "----END OF INSIDE LOADCLASS APPLOADER01 "."<br>";
    }
}
