<?php 
    function productos_json(&$prod=0){
        $json=array();
        foreach ($prod as $key => $productos) {
            if((int) $productos>0){
                $json[$key]=(int) $productos;
            }
        }
        return json_encode($json);
    }
?>