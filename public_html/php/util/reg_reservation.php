<?php

function reservado($reg_reservation, $name) {
    
    // Verifica si $reg_reservation está definido y tiene al menos un elemento
    if (isset($reg_reservation[0])) {
        
        // Verifica si $name está presente como clave en $reg_reservation[0]
        if (array_key_exists($name, $reg_reservation[0])) {
            return $reg_reservation[0][$name];
        }  
    }
    // Si no se cumple ninguna condición, devuelve una cadena vacía
    return "";
}
