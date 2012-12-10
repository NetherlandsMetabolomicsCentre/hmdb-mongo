<?php

    require_once('con_db.php');

    echo '<h1>metabolites</h1>';

    echo "<h2>search for 'rahydrodeoxycorti' in common_name</h2>";
    foreach ($db->metabolites->find( array('common_name' => new MongoRegex("/rahydrodeoxycorti/i")))->sort(array("accession" => 1)) as $metabolite) {
        echo sprintf("<br />Metabolite <b>%s</b> with common name: %s. <br /><p>%s</p>", $metabolite['accession'], $metabolite['common_name'], str_replace('rahydrodeoxycorti', '<font color=red>rahydrodeoxycorti</font>', $metabolite['description']));
    }

    echo "<h2>search for 'polymorphism' in description</h2>";
    foreach ($db->metabolites->find( array('description' => new MongoRegex("/polymorphism/i")))->sort(array("accession" => 1)) as $metabolite) {
        echo sprintf("<br />Metabolite <b>%s</b> with common name: %s. <br /><p>%s</p>", $metabolite['accession'], $metabolite['common_name'], str_replace('polymorphism', '<font color=red>polymorphism</font>', $metabolite['description']));
    }

    echo '<h1>proteins</h1>';

    echo "<h2>search for 'lycogen' in name</h2>";
    foreach ($db->proteins->find( array('name' => new MongoRegex("/lycogen/i")))->sort(array("protein_id" => 1)) as $protein) {
        echo sprintf("<br />Protein <b>%s</b> with name: %s. <br /><p>%s</p>", $protein['protein_id'], $protein['name'], $protein['general_function']);
    }

    echo "<h2>search for proteins associated with metabolite L-Alanine (HMDB00161)</h2>";
    foreach ($db->proteins->find( array('metabolite_associations.metabolite.name' => new MongoRegex("/L-Alanine/i")))->sort(array("protein_id" => 1)) as $protein) {
        echo sprintf("<br />Protein <b>%s</b> with name: %s. <br /><p>%s</p>", $protein['protein_id'], $protein['name'], $protein['general_function']);
        echo '<ul>';
        foreach ($protein['metabolite_associations'] as $idx => $associatedMetabolite){
            if ($associatedMetabolite['name']){
                echo sprintf("<li>%s (%s)</li>", $associatedMetabolite['name'], $associatedMetabolite['accession']);
            } else {
                foreach ($associatedMetabolite as $am){
                    echo sprintf("<li>%s (%s)</li>", $am['name'], $am['accession']);
                }
            }
        }
        echo '</ul>';
    }
