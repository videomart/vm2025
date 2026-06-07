<div id="form_service_form1" style='<?php echo ($this->tabCssClass["form_service_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_3" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="8" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Custos<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php $sStyleHidden_sintoma_dumb = ('' == $sStyleHidden_sintoma) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sintoma_dumb" style="<?php echo $sStyleHidden_sintoma_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dataorc']))
    {
        $this->nm_new_label['dataorc'] = "Data orc.";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dataorc = $this->dataorc;
   $sStyleHidden_dataorc = '';
   if (isset($this->nmgp_cmp_hidden['dataorc']) && $this->nmgp_cmp_hidden['dataorc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dataorc']);
       $sStyleHidden_dataorc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dataorc = 'display: none;';
   $sStyleReadInp_dataorc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dataorc']) && $this->nmgp_cmp_readonly['dataorc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dataorc']);
       $sStyleReadLab_dataorc = '';
       $sStyleReadInp_dataorc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dataorc']) && $this->nmgp_cmp_hidden['dataorc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dataorc" value="<?php echo $this->form_encode_input($dataorc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dataorc_label" id="hidden_field_label_dataorc" style="<?php echo $sStyleHidden_dataorc; ?>"><span id="id_label_dataorc"><?php echo $this->nm_new_label['dataorc']; ?></span></TD>
    <TD class="scFormDataOdd css_dataorc_line" id="hidden_field_data_dataorc" style="<?php echo $sStyleHidden_dataorc; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dataorc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dataorc"]) &&  $this->nmgp_cmp_readonly["dataorc"] == "on") { 

 ?>
<input type="hidden" name="dataorc" value="<?php echo $this->form_encode_input($dataorc) . "\">" . $dataorc . ""; ?>
<?php } else { ?>
<span id="id_read_on_dataorc" class="sc-ui-readonly-dataorc css_dataorc_line" style="<?php echo $sStyleReadLab_dataorc; ?>"><?php echo $this->form_format_readonly("dataorc", $this->form_encode_input($dataorc)); ?></span><span id="id_read_off_dataorc" class="css_read_off_dataorc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dataorc; ?>"><?php
$tmp_form_data = $this->field_config['dataorc']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_dataorc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dataorc" type=text name="dataorc" value="<?php echo $this->form_encode_input($dataorc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['dataorc']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['dataorc']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dataorc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dataorc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['material']))
    {
        $this->nm_new_label['material'] = "Custo material";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $material = $this->material;
   $sStyleHidden_material = '';
   if (isset($this->nmgp_cmp_hidden['material']) && $this->nmgp_cmp_hidden['material'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['material']);
       $sStyleHidden_material = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_material = 'display: none;';
   $sStyleReadInp_material = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['material']) && $this->nmgp_cmp_readonly['material'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['material']);
       $sStyleReadLab_material = '';
       $sStyleReadInp_material = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['material']) && $this->nmgp_cmp_hidden['material'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="material" value="<?php echo $this->form_encode_input($material) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_material_label" id="hidden_field_label_material" style="<?php echo $sStyleHidden_material; ?>"><span id="id_label_material"><?php echo $this->nm_new_label['material']; ?></span></TD>
    <TD class="scFormDataOdd css_material_line" id="hidden_field_data_material" style="<?php echo $sStyleHidden_material; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_material_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["material"]) &&  $this->nmgp_cmp_readonly["material"] == "on") { 

 ?>
<input type="hidden" name="material" value="<?php echo $this->form_encode_input($material) . "\">" . $material . ""; ?>
<?php } else { ?>
<span id="id_read_on_material" class="sc-ui-readonly-material css_material_line" style="<?php echo $sStyleReadLab_material; ?>"><?php echo $this->form_format_readonly("material", $this->form_encode_input($this->material)); ?></span><span id="id_read_off_material" class="css_read_off_material<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_material; ?>">
 <input class="sc-js-input scFormObjectOdd css_material_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_material" type=text name="material" value="<?php echo $this->form_encode_input($material) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['material']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['material']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['material']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['material']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_material_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_material_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['tecnico']))
   {
       $this->nm_new_label['tecnico'] = "Técnico";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tecnico = $this->tecnico;
   $sStyleHidden_tecnico = '';
   if (isset($this->nmgp_cmp_hidden['tecnico']) && $this->nmgp_cmp_hidden['tecnico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tecnico']);
       $sStyleHidden_tecnico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tecnico = 'display: none;';
   $sStyleReadInp_tecnico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tecnico']) && $this->nmgp_cmp_readonly['tecnico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tecnico']);
       $sStyleReadLab_tecnico = '';
       $sStyleReadInp_tecnico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tecnico']) && $this->nmgp_cmp_hidden['tecnico'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tecnico" value="<?php echo $this->form_encode_input($this->tecnico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tecnico_label" id="hidden_field_label_tecnico" style="<?php echo $sStyleHidden_tecnico; ?>"><span id="id_label_tecnico"><?php echo $this->nm_new_label['tecnico']; ?></span></TD>
    <TD class="scFormDataOdd css_tecnico_line" id="hidden_field_data_tecnico" style="<?php echo $sStyleHidden_tecnico; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tecnico_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tecnico"]) &&  $this->nmgp_cmp_readonly["tecnico"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico'] = array(); 
    }

   $old_value_data = $this->data;
   $old_value_dataorc = $this->dataorc;
   $old_value_material = $this->material;
   $old_value_maoobra = $this->maoobra;
   $old_value_orcamento = $this->orcamento;
   $old_value_saida = $this->saida;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_data = $this->data;
   $unformatted_value_dataorc = $this->dataorc;
   $unformatted_value_material = $this->material;
   $unformatted_value_maoobra = $this->maoobra;
   $unformatted_value_orcamento = $this->orcamento;
   $unformatted_value_saida = $this->saida;

   $nm_comando = "SELECT USUARIO, USUARIO  FROM funcionario  ORDER BY USUARIO";

   $this->data = $old_value_data;
   $this->dataorc = $old_value_dataorc;
   $this->material = $old_value_material;
   $this->maoobra = $old_value_maoobra;
   $this->orcamento = $old_value_orcamento;
   $this->saida = $old_value_saida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['Lookup_tecnico'][] = $rs->fields[0];
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
   $tecnico_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tecnico_1))
          {
              foreach ($this->tecnico_1 as $tmp_tecnico)
              {
                  if (trim($tmp_tecnico) === trim($cadaselect[1])) {$tecnico_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->tecnico) && trim($this->tecnico) === trim($cadaselect[1])) {$tecnico_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="tecnico" value="<?php echo $this->form_encode_input($tecnico) . "\">" . $tecnico_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tecnico();
   $x = 0 ; 
   $tecnico_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tecnico_1))
          {
              foreach ($this->tecnico_1 as $tmp_tecnico)
              {
                  if (trim($tmp_tecnico) === trim($cadaselect[1])) {$tecnico_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->tecnico)) {
                 if (trim($this->tecnico) == trim($cadaselect[1])) { $tecnico_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->tecnico == $cadaselect[1]) { $tecnico_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($tecnico_look))
          {
              $tecnico_look = $this->tecnico;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tecnico\" class=\"css_tecnico_line\" style=\"" .  $sStyleReadLab_tecnico . "\">" . $this->form_format_readonly("tecnico", $this->form_encode_input($tecnico_look)) . "</span><span id=\"id_read_off_tecnico\" class=\"css_read_off_tecnico" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tecnico . "\">";
   echo " <span id=\"idAjaxSelect_tecnico\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_tecnico_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tecnico\" name=\"tecnico\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tecnico) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tecnico)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tecnico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tecnico_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['pendencia']))
    {
        $this->nm_new_label['pendencia'] = "Pendências";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pendencia = $this->pendencia;
   $sStyleHidden_pendencia = '';
   if (isset($this->nmgp_cmp_hidden['pendencia']) && $this->nmgp_cmp_hidden['pendencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pendencia']);
       $sStyleHidden_pendencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pendencia = 'display: none;';
   $sStyleReadInp_pendencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pendencia']) && $this->nmgp_cmp_readonly['pendencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pendencia']);
       $sStyleReadLab_pendencia = '';
       $sStyleReadInp_pendencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pendencia']) && $this->nmgp_cmp_hidden['pendencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pendencia" value="<?php echo $this->form_encode_input($pendencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pendencia_label" id="hidden_field_label_pendencia" style="<?php echo $sStyleHidden_pendencia; ?>"><span id="id_label_pendencia"><?php echo $this->nm_new_label['pendencia']; ?></span></TD>
    <TD class="scFormDataOdd css_pendencia_line" id="hidden_field_data_pendencia" style="<?php echo $sStyleHidden_pendencia; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pendencia_line" style="vertical-align: top;padding: 0px">
<?php
$pendencia_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($pendencia));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pendencia"]) &&  $this->nmgp_cmp_readonly["pendencia"] == "on") { 

 ?>
<input type="hidden" name="pendencia" value="<?php echo $this->form_encode_input($pendencia) . "\">" . $pendencia_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_pendencia" class="sc-ui-readonly-pendencia css_pendencia_line" style="<?php echo $sStyleReadLab_pendencia; ?>"><?php echo $this->form_format_readonly("pendencia", $this->form_encode_input($pendencia_val)); ?></span><span id="id_read_off_pendencia" class="css_read_off_pendencia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pendencia; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_pendencia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="pendencia" id="id_sc_field_pendencia" rows="3" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $pendencia; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pendencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pendencia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['maoobra']))
    {
        $this->nm_new_label['maoobra'] = "Mão de obra";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $maoobra = $this->maoobra;
   $sStyleHidden_maoobra = '';
   if (isset($this->nmgp_cmp_hidden['maoobra']) && $this->nmgp_cmp_hidden['maoobra'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['maoobra']);
       $sStyleHidden_maoobra = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_maoobra = 'display: none;';
   $sStyleReadInp_maoobra = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['maoobra']) && $this->nmgp_cmp_readonly['maoobra'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['maoobra']);
       $sStyleReadLab_maoobra = '';
       $sStyleReadInp_maoobra = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['maoobra']) && $this->nmgp_cmp_hidden['maoobra'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="maoobra" value="<?php echo $this->form_encode_input($maoobra) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_maoobra_label" id="hidden_field_label_maoobra" style="<?php echo $sStyleHidden_maoobra; ?>"><span id="id_label_maoobra"><?php echo $this->nm_new_label['maoobra']; ?></span></TD>
    <TD class="scFormDataOdd css_maoobra_line" id="hidden_field_data_maoobra" style="<?php echo $sStyleHidden_maoobra; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_maoobra_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["maoobra"]) &&  $this->nmgp_cmp_readonly["maoobra"] == "on") { 

 ?>
<input type="hidden" name="maoobra" value="<?php echo $this->form_encode_input($maoobra) . "\">" . $maoobra . ""; ?>
<?php } else { ?>
<span id="id_read_on_maoobra" class="sc-ui-readonly-maoobra css_maoobra_line" style="<?php echo $sStyleReadLab_maoobra; ?>"><?php echo $this->form_format_readonly("maoobra", $this->form_encode_input($this->maoobra)); ?></span><span id="id_read_off_maoobra" class="css_read_off_maoobra<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_maoobra; ?>">
 <input class="sc-js-input scFormObjectOdd css_maoobra_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_maoobra" type=text name="maoobra" value="<?php echo $this->form_encode_input($maoobra) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['maoobra']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['maoobra']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['maoobra']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['maoobra']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_maoobra_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_maoobra_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['orcamento']))
    {
        $this->nm_new_label['orcamento'] = "Orçamento";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $orcamento = $this->orcamento;
   $sStyleHidden_orcamento = '';
   if (isset($this->nmgp_cmp_hidden['orcamento']) && $this->nmgp_cmp_hidden['orcamento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['orcamento']);
       $sStyleHidden_orcamento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_orcamento = 'display: none;';
   $sStyleReadInp_orcamento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['orcamento']) && $this->nmgp_cmp_readonly['orcamento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['orcamento']);
       $sStyleReadLab_orcamento = '';
       $sStyleReadInp_orcamento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['orcamento']) && $this->nmgp_cmp_hidden['orcamento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="orcamento" value="<?php echo $this->form_encode_input($orcamento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_orcamento_label" id="hidden_field_label_orcamento" style="<?php echo $sStyleHidden_orcamento; ?>"><span id="id_label_orcamento"><?php echo $this->nm_new_label['orcamento']; ?></span></TD>
    <TD class="scFormDataOdd css_orcamento_line" id="hidden_field_data_orcamento" style="<?php echo $sStyleHidden_orcamento; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_orcamento_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["orcamento"]) &&  $this->nmgp_cmp_readonly["orcamento"] == "on") { 

 ?>
<input type="hidden" name="orcamento" value="<?php echo $this->form_encode_input($orcamento) . "\">" . $orcamento . ""; ?>
<?php } else { ?>
<span id="id_read_on_orcamento" class="sc-ui-readonly-orcamento css_orcamento_line" style="<?php echo $sStyleReadLab_orcamento; ?>"><?php echo $this->form_format_readonly("orcamento", $this->form_encode_input($this->orcamento)); ?></span><span id="id_read_off_orcamento" class="css_read_off_orcamento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_orcamento; ?>">
 <input class="sc-js-input scFormObjectOdd css_orcamento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_orcamento" type=text name="orcamento" value="<?php echo $this->form_encode_input($orcamento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['orcamento']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['orcamento']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['orcamento']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['orcamento']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_orcamento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_orcamento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['saida']))
    {
        $this->nm_new_label['saida'] = "Data saída";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saida = $this->saida;
   $sStyleHidden_saida = '';
   if (isset($this->nmgp_cmp_hidden['saida']) && $this->nmgp_cmp_hidden['saida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saida']);
       $sStyleHidden_saida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saida = 'display: none;';
   $sStyleReadInp_saida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saida']) && $this->nmgp_cmp_readonly['saida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saida']);
       $sStyleReadLab_saida = '';
       $sStyleReadInp_saida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saida']) && $this->nmgp_cmp_hidden['saida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saida" value="<?php echo $this->form_encode_input($saida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_saida_label" id="hidden_field_label_saida" style="<?php echo $sStyleHidden_saida; ?>"><span id="id_label_saida"><?php echo $this->nm_new_label['saida']; ?></span></TD>
    <TD class="scFormDataOdd css_saida_line" id="hidden_field_data_saida" style="<?php echo $sStyleHidden_saida; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saida_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["saida"]) &&  $this->nmgp_cmp_readonly["saida"] == "on") { 

 ?>
<input type="hidden" name="saida" value="<?php echo $this->form_encode_input($saida) . "\">" . $saida . ""; ?>
<?php } else { ?>
<span id="id_read_on_saida" class="sc-ui-readonly-saida css_saida_line" style="<?php echo $sStyleReadLab_saida; ?>"><?php echo $this->form_format_readonly("saida", $this->form_encode_input($saida)); ?></span><span id="id_read_off_saida" class="css_read_off_saida<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_saida; ?>"><?php
$tmp_form_data = $this->field_config['saida']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_saida_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_saida" type=text name="saida" value="<?php echo $this->form_encode_input($saida) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['saida']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['saida']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saida_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Serviço executado<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servico']))
    {
        $this->nm_new_label['servico'] = "Serviços";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servico = $this->servico;
   $sStyleHidden_servico = '';
   if (isset($this->nmgp_cmp_hidden['servico']) && $this->nmgp_cmp_hidden['servico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servico']);
       $sStyleHidden_servico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servico = 'display: none;';
   $sStyleReadInp_servico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servico']) && $this->nmgp_cmp_readonly['servico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servico']);
       $sStyleReadLab_servico = '';
       $sStyleReadInp_servico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servico']) && $this->nmgp_cmp_hidden['servico'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servico" value="<?php echo $this->form_encode_input($servico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_servico" style="<?php echo $sStyleHidden_servico; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_servico_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_servico_label" style=" padding: 0px; width: 100%;"><span id="id_label_servico"><?php echo $this->nm_new_label['servico']; ?></span></td></tr><tr><td class="css_servico_line" style="padding: 0px; width: 100%;">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Servico'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Servico'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Servico'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinS*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['foreign_key']['osnumber'] = $this->nmgp_dados_form['osnumber'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['where_filter'] = "OSNUMBER = '" . $this->nmgp_dados_form['osnumber'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['where_detal']  = "OSNUMBER = '" . $this->nmgp_dados_form['osnumber'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_service']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init'] ]['form_work']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_service_empty.htm' : $this->Ini->link_form_work_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Servico']) && 'nmsc_iframe_liga_form_work' != $this->Ini->sc_lig_target['C_@scinf_Servico'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Servico'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_work_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Servico'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_work"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_work"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servico_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['mat']))
    {
        $this->nm_new_label['mat'] = "Material";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mat = $this->mat;
   $sStyleHidden_mat = '';
   if (isset($this->nmgp_cmp_hidden['mat']) && $this->nmgp_cmp_hidden['mat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mat']);
       $sStyleHidden_mat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mat = 'display: none;';
   $sStyleReadInp_mat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mat']) && $this->nmgp_cmp_readonly['mat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mat']);
       $sStyleReadLab_mat = '';
       $sStyleReadInp_mat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mat']) && $this->nmgp_cmp_hidden['mat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mat" value="<?php echo $this->form_encode_input($mat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_mat" style="<?php echo $sStyleHidden_mat; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_mat_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_mat_label" style=" padding: 0px; width: 100%;"><span id="id_label_mat"><?php echo $this->nm_new_label['mat']; ?></span></td></tr><tr><td class="css_mat_line" style="padding: 0px; width: 100%;">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Mat'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Mat'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Mat'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinS*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['foreign_key']['osnumber'] = $this->nmgp_dados_form['osnumber'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['where_filter'] = "OSNUMBER = '" . $this->nmgp_dados_form['osnumber'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['where_detal']  = "OSNUMBER = '" . $this->nmgp_dados_form['osnumber'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_service']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init'] ]['form_material']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_service_empty.htm' : $this->Ini->link_form_material_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_Mat']) && 'nmsc_iframe_liga_form_material' != $this->Ini->sc_lig_target['C_@scinf_Mat'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Mat'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['form_material_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Mat'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_material"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_material"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mat_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
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
<?php
$this->displayAppFooter();
?>
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
<script> 
<?php
 $NM_pag_atual = "form_service_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_service_form" . $this->nmgp_ancora;
 }
?>
<?php
if (!$this->nmgp_form_empty) {
?>
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.width='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.height='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.display='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.overflow='visible';
<?php
}
else {
?>
  $(".sc-ui-page-tab-line").hide();
  $("#sc-id-required-row").hide();
<?php
}
?>
</script> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_service");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_service");
 parent.scAjaxDetailHeight("form_service", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_service", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_service", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['sc_modal'])
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
        function scBtnFn_sys_format_cnl() {
                if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        <?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
                         return;
                }
        }
        function scBtnFn_sys_format_ini() {
                if ($("#sc_b_ini_t.sc-unique-btn-6").length && $("#sc_b_ini_t.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_ini_t.sc-unique-btn-6").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                         return;
                }
        }
        function scBtnFn_sys_format_ret() {
                if ($("#sc_b_ret_t.sc-unique-btn-7").length && $("#sc_b_ret_t.sc-unique-btn-7").is(":visible")) {
                    if ($("#sc_b_ret_t.sc-unique-btn-7").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                         return;
                }
        }
        function scBtnFn_sys_format_ava() {
                if ($("#sc_b_avc_t.sc-unique-btn-8").length && $("#sc_b_avc_t.sc-unique-btn-8").is(":visible")) {
                    if ($("#sc_b_avc_t.sc-unique-btn-8").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                         return;
                }
        }
        function scBtnFn_sys_format_fim() {
                if ($("#sc_b_fim_t.sc-unique-btn-9").length && $("#sc_b_fim_t.sc-unique-btn-9").is(":visible")) {
                    if ($("#sc_b_fim_t.sc-unique-btn-9").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                         return;
                }
        }
        function scBtnFn_sys_separator() {
                if ($("#sys_separator.sc-unique-btn-10").length && $("#sys_separator.sc-unique-btn-10").is(":visible")) {
                    if ($("#sys_separator.sc-unique-btn-10").hasClass("disabled")) {
                        return;
                    }
                        return false;
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
                if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-11").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-12").length && $("#sc_b_sai_t.sc-unique-btn-12").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-12").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-13").length && $("#sc_b_sai_t.sc-unique-btn-13").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-13").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-14").length && $("#sc_b_sai_t.sc-unique-btn-14").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-14").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-15").length && $("#sc_b_sai_t.sc-unique-btn-15").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-15").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
        }
        function scBtnFn_Orcamento() {
                if ($("#sc_Orcamento_top").length && $("#sc_Orcamento_top").is(":visible")) {
                    if ($("#sc_Orcamento_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_Orcamento()
                         return;
                }
                if ($("#sc_Orcamento_top").length && $("#sc_Orcamento_top").is(":visible")) {
                    if ($("#sc_Orcamento_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_Orcamento()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_service']['buttonStatus'] = $this->nmgp_botoes;
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
