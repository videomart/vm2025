<?php
class grid_empresa_lookup
{
//  
   function lookup_empresa_tipo(&$empresa_tipo) 
   {
      $conteudo = "" ; 
      if ($empresa_tipo == "J")
      { 
          $conteudo = "Jurídica";
      } 
      if ($empresa_tipo == "F")
      { 
          $conteudo = "Física";
      } 
      if (!empty($conteudo)) 
      { 
          $empresa_tipo = $conteudo; 
      } 
   }  
}
?>
