<?php

    require_once('con_db.php');
    require_once('gaarf.php');

    //make sure the script can run long enough :)
    set_time_limit(0);

    // set what collections to build from which folder
    $dirs = array(
        'metabolites' => './hmdb_metabolites/',
        'proteins' => './hmdb_proteins/'
    );

    // start parsing the folders
    foreach ($dirs as $collection => $dir){
        $files = scandir($dir);

        // clear the existing data
        eval('$db->'.$collection.'->drop();');

        // and store each file as JSON in Mongo
        foreach($files as $file){

            //read xml into string from file
            $xml = file_get_contents($dir.$file);
            $arrDoc = @xmlstr_to_array($xml);

            // make sure there is data from the xml to add
            if ($xml && count($arrDoc) > 0){
                eval('$db->'.$collection.'->insert($arrDoc);');
            }
        }
    }

    echo 'Done!';
?>
