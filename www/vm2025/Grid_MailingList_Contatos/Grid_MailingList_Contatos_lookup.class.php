<?php
class Grid_MailingList_Contatos_lookup
{
//  
   function lookup_newsletter(&$newsletter) 
   {
      $conteudo = "" ; 
      if ($newsletter == "1")
      { 
          $conteudo = "SIM";
      } 
      if ($newsletter == "0")
      { 
          $conteudo = "NÂO";
      } 
      if (!empty($conteudo)) 
      { 
          $newsletter = $conteudo; 
      } 
   }  
}
?>
