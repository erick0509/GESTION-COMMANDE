<?php
    function idExist($id){
        $exist=false;
        $dom = new DOMDocument('1.0', 'utf-8');
        $xml = file_get_contents('../VUES/client.xml');
        @$dom->loadHTML($xml);
        $a = $dom->getElementsByTagName('client');
        for ($i=0; $i < $a->length; $i++) {
            $attr = $a->item($i)->getAttribute('id');
            if($id==$attr){
                $exist=true;
                continue;
            }
        }
        return $exist;
    }
    function setIdClient(){
        $id=1;
        while(idExist($id)){
            $id=$id+1;
        }
        return $id;
    }
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true;
    $xml->preserveWhiteSpace = false;
    $xml->load('../VUES/client.xml');
    $personne = $xml->createElement('personne');
    $client=$xml->createElement('client');
    $attClient=$xml->createAttribute("id");
    $client->setAttribute("id",setIdClient());
    $personne->appendChild($client);
    $client->appendChild($xml->createElement('nom', $_POST['nom']));
    $client->appendChild($xml->createElement('prenom', $_POST['prenom']));
    $client->appendChild($xml->createElement('adresse', $_POST['adresse']));
    $client->appendChild($xml->createElement('age', $_POST['age']));
    $client->appendChild($xml->createElement('email', $_POST['email']));
    $xml->getElementsByTagName('personne')->item(0)->appendChild($client);
    $xml->save('../VUES/client.xml');
    header("location:../VUES/client.xml");
?>