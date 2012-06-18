<?php

/**
        Get list of things from Evrythng
**/

function getThingList() {
        $json_url = 'https://evrythng.net/thngs';
                 
        // Initializing curl
        $ch = curl_init( $json_url );
        
        $api_key = '16e141516134a1fd027b5ee1e34eb8c10a90c1b4';
#        $api_key = '7043ddb7c1d35d009dddb32128d635ee94ee5d7b';
         
        // Configuring curl options
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json',
                'X-Evrythng-Token: '.$api_key,
                'Accept: application/vnd.evrythng-v2+json')
        );
         
        // Setting curl options
        curl_setopt_array( $ch, $options );
         
        // Getting results
        $result =  curl_exec($ch); // Getting jSON result string
        
        return $result;
}

function getThing($thngid) {
        $json_url = 'https://evrythng.net/thngs/'.$thngid;
         
        // Initializing curl
        $ch = curl_init( $json_url );
        
        $api_key = '16e141516134a1fd027b5ee1e34eb8c10a90c1b4';
#        $api_key = '7043ddb7c1d35d009dddb32128d635ee94ee5d7b';
         
        // Configuring curl options
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json',
                'X-Evrythng-Token: '.$api_key,
                'Accept: application/vnd.evrythng-v2+json')
        );
         
        // Setting curl options
        curl_setopt_array( $ch, $options );
         
        // Getting results
        $result =  curl_exec($ch); // Getting jSON result string
        
        return $result;
}

function getProps($thngid) {
        $json_url = 'https://evrythng.net/thngs/'.$thngid.'/properties';
         
        // Initializing curl
        $ch = curl_init( $json_url );
        
        $api_key = '16e141516134a1fd027b5ee1e34eb8c10a90c1b4';
#        $api_key = '7043ddb7c1d35d009dddb32128d635ee94ee5d7b';
         
        // Configuring curl options
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json',
                'X-Evrythng-Token: '.$api_key,
                'Accept: application/vnd.evrythng-v2+json')
        );
         
        // Setting curl options
        curl_setopt_array( $ch, $options );
         
        // Getting results
        $result =  curl_exec($ch); // Getting jSON result string
        
        return $result;
}

?>