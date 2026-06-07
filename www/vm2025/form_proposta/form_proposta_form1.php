<div id="form_proposta_form1" style='<?php echo (1 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>
<?php $sStyleHidden_itensdaproposta_dumb = ('' == $sStyleHidden_itensdaproposta) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_itensdaproposta_dumb" style="<?php echo $sStyleHidden_itensdaproposta_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tabela']))
   {
       $this->nm_new_label['tabela'] = "Tabela";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tabela = $this->tabela;
   $sStyleHidden_tabela = '';
   if (isset($this->nmgp_cmp_hidden['tabela']) && $this->nmgp_cmp_hidden['tabela'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tabela']);
       $sStyleHidden_tabela = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tabela = 'display: none;';
   $sStyleReadInp_tabela = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tabela']) && $this->nmgp_cmp_readonly['tabela'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tabela']);
       $sStyleReadLab_tabela = '';
       $sStyleReadInp_tabela = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tabela']) && $this->nmgp_cmp_hidden['tabela'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tabela" value="<?php echo $this->form_encode_input($this->tabela) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tabela_line" id="hidden_field_data_tabela" style="<?php echo $sStyleHidden_tabela; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tabela_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_tabela_label" style=""><span id="id_label_tabela"><?php echo $this->nm_new_label['tabela']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tabela"]) &&  $this->nmgp_cmp_readonly["tabela"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_data = $this->data;
   $old_value_total = $this->total;
   $old_value_desconto = $this->desconto;
   $old_value_previsao = $this->previsao;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_id = $this->id;
   $unformatted_value_data = $this->data;
   $unformatted_value_total = $this->total;
   $unformatted_value_desconto = $this->desconto;
   $unformatted_value_previsao = $this->previsao;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(moeda,' Entrega: ', Entrega,' dias ', ' Form. Pag. ', FormPag)  FROM termos  ORDER BY moeda, Entrega, Garantia, FormPag";
   }
   else
   {
       $nm_comando = "SELECT codigo, moeda||' Entrega: '||Entrega||' dias '||' Form. Pag. '||FormPag  FROM termos  ORDER BY moeda, Entrega, Garantia, FormPag";
   }

   $this->id = $old_value_id;
   $this->data = $old_value_data;
   $this->total = $old_value_total;
   $this->desconto = $old_value_desconto;
   $this->previsao = $old_value_previsao;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_tabela'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $tabela_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tabela_1))
          {
              foreach ($this->tabela_1 as $tmp_tabela)
              {
                  if (trim($tmp_tabela) === trim($cadaselect[1])) {$tabela_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->tabela) && trim($this->tabela) === trim($cadaselect[1])) {$tabela_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="tabela" value="<?php echo $this->form_encode_input($tabela) . "\">" . $tabela_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tabela();
   $x = 0 ; 
   $tabela_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tabela_1))
          {
              foreach ($this->tabela_1 as $tmp_tabela)
              {
                  if (trim($tmp_tabela) === trim($cadaselect[1])) {$tabela_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->tabela)) {
                 if (trim($this->tabela) == trim($cadaselect[1])) { $tabela_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->tabela == $cadaselect[1]) { $tabela_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($tabela_look))
          {
              $tabela_look = $this->tabela;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tabela\" class=\"css_tabela_line\" style=\"" .  $sStyleReadLab_tabela . "\">" . $this->form_format_readonly("tabela", $this->form_encode_input($tabela_look)) . "</span><span id=\"id_read_off_tabela\" class=\"css_read_off_tabela" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tabela . "\">";
   echo " <span id=\"idAjaxSelect_tabela\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_tabela_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tabela\" name=\"tabela\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tabela) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tabela)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tabela_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tabela_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['transportadora']))
   {
       $this->nm_new_label['transportadora'] = "Transportadora";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $transportadora = $this->transportadora;
   $sStyleHidden_transportadora = '';
   if (isset($this->nmgp_cmp_hidden['transportadora']) && $this->nmgp_cmp_hidden['transportadora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['transportadora']);
       $sStyleHidden_transportadora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_transportadora = 'display: none;';
   $sStyleReadInp_transportadora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['transportadora']) && $this->nmgp_cmp_readonly['transportadora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['transportadora']);
       $sStyleReadLab_transportadora = '';
       $sStyleReadInp_transportadora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['transportadora']) && $this->nmgp_cmp_hidden['transportadora'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="transportadora" value="<?php echo $this->form_encode_input($this->transportadora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_transportadora_line" id="hidden_field_data_transportadora" style="<?php echo $sStyleHidden_transportadora; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_transportadora_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_transportadora_label" style=""><span id="id_label_transportadora"><?php echo $this->nm_new_label['transportadora']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['php_cmp_required']['transportadora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['php_cmp_required']['transportadora'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["transportadora"]) &&  $this->nmgp_cmp_readonly["transportadora"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_data = $this->data;
   $old_value_total = $this->total;
   $old_value_desconto = $this->desconto;
   $old_value_previsao = $this->previsao;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_id = $this->id;
   $unformatted_value_data = $this->data;
   $unformatted_value_total = $this->total;
   $unformatted_value_desconto = $this->desconto;
   $unformatted_value_previsao = $this->previsao;

   $nm_comando = "SELECT ID, TRANSPORTADORA  FROM transportadoras  ORDER BY TRANSPORTADORA";

   $this->id = $old_value_id;
   $this->data = $old_value_data;
   $this->total = $old_value_total;
   $this->desconto = $old_value_desconto;
   $this->previsao = $old_value_previsao;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['Lookup_transportadora'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $transportadora_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->transportadora_1))
          {
              foreach ($this->transportadora_1 as $tmp_transportadora)
              {
                  if (trim($tmp_transportadora) === trim($cadaselect[1])) {$transportadora_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->transportadora) && trim($this->transportadora) === trim($cadaselect[1])) {$transportadora_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="transportadora" value="<?php echo $this->form_encode_input($transportadora) . "\">" . $transportadora_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_transportadora();
   $x = 0 ; 
   $transportadora_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->transportadora_1))
          {
              foreach ($this->transportadora_1 as $tmp_transportadora)
              {
                  if (trim($tmp_transportadora) === trim($cadaselect[1])) {$transportadora_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->transportadora)) {
                 if (trim($this->transportadora) == trim($cadaselect[1])) { $transportadora_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->transportadora == $cadaselect[1]) { $transportadora_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($transportadora_look))
          {
              $transportadora_look = $this->transportadora;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_transportadora\" class=\"css_transportadora_line\" style=\"" .  $sStyleReadLab_transportadora . "\">" . $this->form_format_readonly("transportadora", $this->form_encode_input($transportadora_look)) . "</span><span id=\"id_read_off_transportadora\" class=\"css_read_off_transportadora" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_transportadora . "\">";
   echo " <span id=\"idAjaxSelect_transportadora\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_transportadora_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_transportadora\" name=\"transportadora\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->transportadora) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->transportadora)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_transportadora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_transportadora_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['previsao']))
    {
        $this->nm_new_label['previsao'] = "Previsao";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $previsao = $this->previsao;
   $sStyleHidden_previsao = '';
   if (isset($this->nmgp_cmp_hidden['previsao']) && $this->nmgp_cmp_hidden['previsao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['previsao']);
       $sStyleHidden_previsao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_previsao = 'display: none;';
   $sStyleReadInp_previsao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['previsao']) && $this->nmgp_cmp_readonly['previsao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['previsao']);
       $sStyleReadLab_previsao = '';
       $sStyleReadInp_previsao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['previsao']) && $this->nmgp_cmp_hidden['previsao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="previsao" value="<?php echo $this->form_encode_input($previsao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_previsao_line" id="hidden_field_data_previsao" style="<?php echo $sStyleHidden_previsao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_previsao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_previsao_label" style=""><span id="id_label_previsao"><?php echo $this->nm_new_label['previsao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["previsao"]) &&  $this->nmgp_cmp_readonly["previsao"] == "on") { 

 ?>
<input type="hidden" name="previsao" value="<?php echo $this->form_encode_input($previsao) . "\">" . $previsao . ""; ?>
<?php } else { ?>
<span id="id_read_on_previsao" class="sc-ui-readonly-previsao css_previsao_line" style="<?php echo $sStyleReadLab_previsao; ?>"><?php echo $this->form_format_readonly("previsao", $this->form_encode_input($this->previsao)); ?></span><span id="id_read_off_previsao" class="css_read_off_previsao<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_previsao; ?>">
 <input class="sc-js-input scFormObjectOdd css_previsao_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_previsao" type=text name="previsao" value="<?php echo $this->form_encode_input($previsao) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['previsao']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['previsao']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['previsao']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_previsao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_previsao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_tabela_dumb = ('' == $sStyleHidden_tabela) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tabela_dumb" style="<?php echo $sStyleHidden_tabela_dumb; ?>"></TD>
<?php $sStyleHidden_transportadora_dumb = ('' == $sStyleHidden_transportadora) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_transportadora_dumb" style="<?php echo $sStyleHidden_transportadora_dumb; ?>"></TD>
<?php $sStyleHidden_previsao_dumb = ('' == $sStyleHidden_previsao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_previsao_dumb" style="<?php echo $sStyleHidden_previsao_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['condpag']))
    {
        $this->nm_new_label['condpag'] = "Condições de pagamento";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $condpag = $this->condpag;
   $sStyleHidden_condpag = '';
   if (isset($this->nmgp_cmp_hidden['condpag']) && $this->nmgp_cmp_hidden['condpag'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['condpag']);
       $sStyleHidden_condpag = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_condpag = 'display: none;';
   $sStyleReadInp_condpag = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['condpag']) && $this->nmgp_cmp_readonly['condpag'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['condpag']);
       $sStyleReadLab_condpag = '';
       $sStyleReadInp_condpag = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['condpag']) && $this->nmgp_cmp_hidden['condpag'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="condpag" value="<?php echo $this->form_encode_input($condpag) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_condpag_line" id="hidden_field_data_condpag" style="<?php echo $sStyleHidden_condpag; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_condpag_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_condpag_label" style=""><span id="id_label_condpag"><?php echo $this->nm_new_label['condpag']; ?></span></span><br><span id="id_read_on_condpag" style="<?php echo $sStyleReadLab_condpag; ?>"><?php echo $this->form_format_readonly("condpag", sc_strip_script($this->condpag)); ?></span><span id="id_read_off_condpag" class="css_read_off_condpag" style="<?php echo $sStyleReadInp_condpag; ?>"><textarea id="condpag" name="condpag" cols="50" rows="10" class="mceEditor_condpag" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->condpag); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_condpag_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_condpag_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['header']))
    {
        $this->nm_new_label['header'] = "Cabeçalho da proposta";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $header = $this->header;
   $sStyleHidden_header = '';
   if (isset($this->nmgp_cmp_hidden['header']) && $this->nmgp_cmp_hidden['header'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['header']);
       $sStyleHidden_header = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_header = 'display: none;';
   $sStyleReadInp_header = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['header']) && $this->nmgp_cmp_readonly['header'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['header']);
       $sStyleReadLab_header = '';
       $sStyleReadInp_header = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['header']) && $this->nmgp_cmp_hidden['header'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="header" value="<?php echo $this->form_encode_input($header) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_header_line" id="hidden_field_data_header" style="<?php echo $sStyleHidden_header; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_header_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_header_label" style=""><span id="id_label_header"><?php echo $this->nm_new_label['header']; ?></span></span><br><span id="id_read_on_header" style="<?php echo $sStyleReadLab_header; ?>"><?php echo $this->form_format_readonly("header", sc_strip_script($this->header)); ?></span><span id="id_read_off_header" class="css_read_off_header" style="<?php echo $sStyleReadInp_header; ?>"><textarea id="header" name="header" cols="50" rows="10" class="mceEditor_header" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->header); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_header_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_header_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['obs']))
    {
        $this->nm_new_label['obs'] = "Observações";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obs = $this->obs;
   $sStyleHidden_obs = '';
   if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obs']);
       $sStyleHidden_obs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obs = 'display: none;';
   $sStyleReadInp_obs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obs']) && $this->nmgp_cmp_readonly['obs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obs']);
       $sStyleReadLab_obs = '';
       $sStyleReadInp_obs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs" value="<?php echo $this->form_encode_input($obs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_obs_line" id="hidden_field_data_obs" style="<?php echo $sStyleHidden_obs; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obs_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_obs_label" style=""><span id="id_label_obs"><?php echo $this->nm_new_label['obs']; ?></span></span><br><span id="id_read_on_obs" style="<?php echo $sStyleReadLab_obs; ?>"><?php echo $this->form_format_readonly("obs", sc_strip_script($this->obs)); ?></span><span id="id_read_off_obs" class="css_read_off_obs" style="<?php echo $sStyleReadInp_obs; ?>"><textarea id="obs" name="obs" cols="50" rows="10" class="mceEditor_obs" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->obs); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
</td></tr>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<?php
$requiredMessage = $this->Ini->Nm_lang['lang_othr_reqr'];
?>
<span class="scFormRequiredOddColor">* <?php echo $requiredMessage; ?></span>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script type="text/javascript">
$(function() {
    if ('page' == wizardViewMode) {
        scJQWizardGoToPage(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['form_wizard']['actual_step']; ?>);
        $(".sc-form-page").on("click", function() {
            var thisStepNo = $(this).attr("id").substr(16);
            scJQWizardPageClick(thisStepNo);
        });
    } else {
        scJQWizardGoToStep(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['form_wizard']['actual_step']; ?>);
        $(".sc-ui-form-step").on("click", function() {
            var thisStepNo = $(this).attr("id").substr(16);
            scJQWizardStepClick(thisStepNo);
        });
    }
});
</script>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_proposta");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_proposta");
 parent.scAjaxDetailHeight("form_proposta", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_proposta", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_proposta", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if (isset($this->scFormFocusErrorName) && '' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
        function scBtnFn_sys_format_inc() {
                if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
                    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                         return;
                }
                if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                         return;
                }
        }
        function scBtnFn_sys_format_alt() {
                if ($("#sc_b_upd_t.sc-unique-btn-3").length && $("#sc_b_upd_t.sc-unique-btn-3").is(":visible")) {
                    if ($("#sc_b_upd_t.sc-unique-btn-3").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                         return;
                }
        }
        function scBtnFn_sys_format_exc() {
                if ($("#sc_b_del_t.sc-unique-btn-4").length && $("#sc_b_del_t.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_del_t.sc-unique-btn-4").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('excluir');
                         return;
                }
        }
        function scBtnFn_sc_btn_0() {
                if ($("#sc_sc_btn_0_top").length && $("#sc_sc_btn_0_top").is(":visible")) {
                    if ($("#sc_sc_btn_0_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_sc_btn_0()
                         return;
                }
        }
        function scBtnFn_sys_format_reload() {
                if ($("#sc_b_reload_t.sc-unique-btn-5").length && $("#sc_b_reload_t.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_reload_t.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
                         return;
                }
        }
        function scBtnFn_sys_format_hlp() {
                if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
                    if ($("#sc_b_hlp_t").hasClass("disabled")) {
                        return;
                    }
                        window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
                         return;
                }
        }
        function scBtnFn_sys_format_sai() {
                if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
        }
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
