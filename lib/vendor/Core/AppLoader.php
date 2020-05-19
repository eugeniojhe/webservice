<?php
namespace Vendor\Core;

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
		 foreach ($folders as $folder)
        {
            echo " Inside loadClass APPLOADER {$folder}/{$class}.php";
            echo "<br>";
			if (file_exists("{$folder}/{$class}.php"))
            {
                echo "The file above was found "; 
                echo "<br>"; 
                require_once "{$folder}/{$class}.php";
                return TRUE;
                //require "{$folder}/{$class}.php";
               // return "{$folder}/{$class}.php";
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
								return TRUE;
                            }
                        }
                    }
                }
            }
		}		
    }
}
