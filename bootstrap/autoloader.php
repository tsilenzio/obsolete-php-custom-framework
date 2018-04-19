<?php

/*
    NOTE: We don't want to go crazy with the autoloader. We
          just want to attempt to load it from a few locations.
          If that doesn't work then the developer should know
          that they made a mistake and need to fix it.

          This method should make it easy for the developer to
          follow what went wrong in the call stack when some
          proper error handling has been implimented.
*/

class Autoloader
{
    /**
     * Attempt to load an autoloaded class
     * 
     * @param @class 
     * @return void
     */
    public static function loader($class)
    {
        $filename = str_replace('\\', '/', $class) . '.php';

        // Attempt to load the class if it exists
        if(file_exists($filename))
        {
            include __DIR__ . $filename;
        }
        // Otherwise attempt to load the class from the framework
        else
        {
            include __DIR__ . '/../framework/' . $filename;
        }
    }
}

// Register the above Autoloader class
spl_autoload_register('Autoloader::loader');
