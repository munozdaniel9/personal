<?php 
    function codificar($java){ 
        $salida=''; 
        $paralelo=''; 
        $suma = ''; 
        $cortado = explode('i',$java); 
        $salida .= "<script type='text/javascript'>\n"; 
        foreach($cortado as $k => $v){ 
            $v = ($k==0) ? $v.'i' : (($k==count($cortado)-1) ?  $v : $v.'i'); 
            $v = cod($v); 
            $salida .= 'str'.$k.'='."'".$v."';\n"; 
            $paralelo .= ($k==count($cortado)-1) ? 'str'.$k : 'str'.$k.'+'; 
        } 
             
            $salida .= 'document.write(unescape('.$paralelo.'));'; 
            $salida .= "\n</script>"; 
        return $salida; 
    } 

    function cod($cadena){ 
        $salida=''; 
        for($i=97;$i<=122;$i++){ 
            $letras[] = chr($i); 
        } 
        for($x=0;$x<=strlen($cadena);$x++){ 
            if(in_array($cadena[$x],$letras)){ 
                $salida .= '%'.dechex(ord($cadena[$x])); 
            }else{ $salida .= rawurlencode($cadena[$x]); }                 
        } 
        return $salida; 
    } 

    echo codificar($variable); // Dentro de la $variable queda el codigo a encriptar
