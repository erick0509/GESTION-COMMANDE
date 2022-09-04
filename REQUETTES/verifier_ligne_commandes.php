<?php
    session_start();
    
    //verification des donnees
    if(empty($_GET['date_commande']) || empty($_GET['quantite_commande']) || empty($_GET['designation'])){
        header('location:../VUES/nouvelle_commande.php?error=0');
    }
    else{
        function idExist($id){
            $exist=false;
            $dom = new DOMDocument('1.0', 'utf-8');
            $xml = file_get_contents('../VUES/commande.xml');
            @$dom->loadHTML($xml);
            $a = $dom->getElementsByTagName('ligne_commande');
            for ($i=0; $i < $a->length; $i++) {
                $attr = $a->item($i)->getAttribute('no_ligne_commande');
                if($id==$attr){
                    $exist=true;
                    continue;
                }
            }
            return $exist;
        }
        function setIdLigneCommande(){
            $id=1;
            while(idExist($id) ){
                $id=$id+1;
            }
            return $id;
        }
        $i=0;
        $xml = new DOMDocument('1.0', 'utf-8');
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;
        $xml->load('../VUES/commande.xml');
        $xmlTag=$xml->getElementsByTagName('commande');    
        $commandes = $xml->createElement('commandes');
        $commande=$xml->createElement('commande');
        $ligne_commande=$xml->createElement('ligne_commande');
        $commande->setAttribute("no_client",$_GET['client']);
        $ligne_commande->setAttribute("no_ligne_commande",setIdLigneCommande());
        $commandes->appendChild($commande);
        $commande->appendChild($ligne_commande);
        $ligne_commande->appendChild($xml->createElement('date_commande', $_GET['date_commande']));
        $ligne_commande->appendChild($xml->createElement('designation', $_GET['designation']));
        $ligne_commande->appendChild($xml->createElement('quantite_commande', $_GET['quantite_commande']));
        $ligne_commande->appendChild($xml->createElement('paye',$_GET['paye']));
        //recuperation de l'indice du commande d'un client
        if($xmlTag->length==0){
            $i=0;
        }
        else{
            while($i<$xmlTag->length){
                if(($xmlTag->item($i)->getAttribute('no_client')==$_GET['client'])){
                    $xml->getElementsByTagName('commande')->item($i)->appendChild($ligne_commande);
                break;
                }  
                $i=$i+1;         
            }
        }
        //insersion des elements
        if($i==$xmlTag->length){
            $xml->getElementsByTagName('commandes')->item(0)->appendChild($commande);
        }
        
        $xml->save('../VUES/commande.xml');
        header('location:../VUES/commande.xml');
    }
?>