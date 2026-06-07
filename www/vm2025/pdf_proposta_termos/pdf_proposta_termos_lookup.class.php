<?php
class pdf_proposta_termos_lookup
{
//  
   function lookup_itensproposta(&$conteudo , $proposta_id, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($proposta_id) === "")
      { 
          $conteudo = "";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT 
    modelo,
    descricao,
    qty,
    unit,
    if (DESCONTO>0, DESCONTO,0.00) as vDESCONTO,
   (qty*unit)-DESCONTO as SubTotal,
    if (DESCONTO<0, unit-DESCONTO, unit ) as vUnitario  

FROM 
    itemproposta

WHERE ID_PROPOSTA=$proposta_id" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "modelo,
    descricao,
    qty,
    unit,
    if (DESCONTO>0, DESCONTO,0.00) as vDESCONTO,
   (qty*unit)-DESCONTO as SubTotal,
    if (DESCONTO<0, unit-DESCONTO, unit ) as vUnitario"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[2] = str_replace(',', '.', $rx->fields[2]); 
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]); 
                 $rx->fields[4] = str_replace(',', '.', $rx->fields[4]); 
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]); 
                 $rx->fields[6] = str_replace(',', '.', $rx->fields[6]); 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= $rx->fields[$x];
                        if ($x != 0)
                        { 
                            $conteudo .= "";
                        } 
                        $conteudo .= $rx->fields[$x];
                 }
                 $a++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
}
?>
