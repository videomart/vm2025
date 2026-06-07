<div id="form_empresa_mob_form1" style='<?php echo ($this->tabCssClass["form_empresa_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3" class="scBlockFrame"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['cidade']))
   {
       $this->nmgp_cmp_hidden['cidade'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['uf']))
   {
       $this->nmgp_cmp_hidden['uf'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['bairro']))
   {
       $this->nmgp_cmp_hidden['bairro'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['logradouro']))
   {
       $this->nmgp_cmp_hidden['logradouro'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_3" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['data']))
    {
        $this->nm_new_label['data'] = "DATA";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $data = $this->data;
   $sStyleHidden_data = '';
   if (isset($this->nmgp_cmp_hidden['data']) && $this->nmgp_cmp_hidden['data'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data']);
       $sStyleHidden_data = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data = 'display: none;';
   $sStyleReadInp_data = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data']) && $this->nmgp_cmp_readonly['data'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data']);
       $sStyleReadLab_data = '';
       $sStyleReadInp_data = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data']) && $this->nmgp_cmp_hidden['data'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data" value="<?php echo $this->form_encode_input($data) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_data_line" id="hidden_field_data_data" style="<?php echo $sStyleHidden_data; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_data_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_data_label" style=""><span id="id_label_data"><?php echo $this->nm_new_label['data']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data"]) &&  $this->nmgp_cmp_readonly["data"] == "on") { 

 ?>
<input type="hidden" name="data" value="<?php echo $this->form_encode_input($data) . "\">" . $data . ""; ?>
<?php } else { ?>
<span id="id_read_on_data" class="sc-ui-readonly-data css_data_line" style="<?php echo $sStyleReadLab_data; ?>"><?php echo $this->form_format_readonly("data", $this->form_encode_input($data)); ?></span><span id="id_read_off_data" class="css_read_off_data<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_data; ?>"><?php
$tmp_form_data = $this->field_config['data']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_data_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_data" type=text name="data" value="<?php echo $this->form_encode_input($data) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['data']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['homepage']))
    {
        $this->nm_new_label['homepage'] = "HOMEPAGE";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $homepage = $this->homepage;
   $sStyleHidden_homepage = '';
   if (isset($this->nmgp_cmp_hidden['homepage']) && $this->nmgp_cmp_hidden['homepage'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['homepage']);
       $sStyleHidden_homepage = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_homepage = 'display: none;';
   $sStyleReadInp_homepage = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['homepage']) && $this->nmgp_cmp_readonly['homepage'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['homepage']);
       $sStyleReadLab_homepage = '';
       $sStyleReadInp_homepage = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['homepage']) && $this->nmgp_cmp_hidden['homepage'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="homepage" value="<?php echo $this->form_encode_input($homepage) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_homepage_line" id="hidden_field_data_homepage" style="<?php echo $sStyleHidden_homepage; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_homepage_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_homepage_label" style=""><span id="id_label_homepage"><?php echo $this->nm_new_label['homepage']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["homepage"]) &&  $this->nmgp_cmp_readonly["homepage"] == "on") { 

 ?>
<input type="hidden" name="homepage" value="<?php echo $this->form_encode_input($homepage) . "\">" . $homepage . ""; ?>
<?php } else { ?>
<span id="id_read_on_homepage" class="sc-ui-readonly-homepage css_homepage_line" style="<?php echo $sStyleReadLab_homepage; ?>"><?php echo $this->form_format_readonly("homepage", $this->form_encode_input($this->homepage)); ?></span><span id="id_read_off_homepage" class="css_read_off_homepage<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_homepage; ?>">
 <input class="sc-js-input scFormObjectOdd css_homepage_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_homepage" type=text name="homepage" value="<?php echo $this->form_encode_input($homepage) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=40"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_homepage_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_homepage_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['inscmun']))
    {
        $this->nm_new_label['inscmun'] = "INSCMUN";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscmun = $this->inscmun;
   $sStyleHidden_inscmun = '';
   if (isset($this->nmgp_cmp_hidden['inscmun']) && $this->nmgp_cmp_hidden['inscmun'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscmun']);
       $sStyleHidden_inscmun = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscmun = 'display: none;';
   $sStyleReadInp_inscmun = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscmun']) && $this->nmgp_cmp_readonly['inscmun'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscmun']);
       $sStyleReadLab_inscmun = '';
       $sStyleReadInp_inscmun = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscmun']) && $this->nmgp_cmp_hidden['inscmun'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscmun" value="<?php echo $this->form_encode_input($inscmun) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_inscmun_line" id="hidden_field_data_inscmun" style="<?php echo $sStyleHidden_inscmun; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscmun_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_inscmun_label" style=""><span id="id_label_inscmun"><?php echo $this->nm_new_label['inscmun']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscmun"]) &&  $this->nmgp_cmp_readonly["inscmun"] == "on") { 

 ?>
<input type="hidden" name="inscmun" value="<?php echo $this->form_encode_input($inscmun) . "\">" . $inscmun . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscmun" class="sc-ui-readonly-inscmun css_inscmun_line" style="<?php echo $sStyleReadLab_inscmun; ?>"><?php echo $this->form_format_readonly("inscmun", $this->form_encode_input($this->inscmun)); ?></span><span id="id_read_off_inscmun" class="css_read_off_inscmun<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inscmun; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscmun_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_inscmun" type=text name="inscmun" value="<?php echo $this->form_encode_input($inscmun) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscmun_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscmun_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['inscest']))
    {
        $this->nm_new_label['inscest'] = "INSCEST";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscest = $this->inscest;
   $sStyleHidden_inscest = '';
   if (isset($this->nmgp_cmp_hidden['inscest']) && $this->nmgp_cmp_hidden['inscest'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscest']);
       $sStyleHidden_inscest = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscest = 'display: none;';
   $sStyleReadInp_inscest = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscest']) && $this->nmgp_cmp_readonly['inscest'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscest']);
       $sStyleReadLab_inscest = '';
       $sStyleReadInp_inscest = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscest']) && $this->nmgp_cmp_hidden['inscest'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscest" value="<?php echo $this->form_encode_input($inscest) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_inscest_line" id="hidden_field_data_inscest" style="<?php echo $sStyleHidden_inscest; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscest_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_inscest_label" style=""><span id="id_label_inscest"><?php echo $this->nm_new_label['inscest']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscest"]) &&  $this->nmgp_cmp_readonly["inscest"] == "on") { 

 ?>
<input type="hidden" name="inscest" value="<?php echo $this->form_encode_input($inscest) . "\">" . $inscest . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscest" class="sc-ui-readonly-inscest css_inscest_line" style="<?php echo $sStyleReadLab_inscest; ?>"><?php echo $this->form_format_readonly("inscest", $this->form_encode_input($this->inscest)); ?></span><span id="id_read_off_inscest" class="css_read_off_inscest<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inscest; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscest_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_inscest" type=text name="inscest" value="<?php echo $this->form_encode_input($inscest) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscest_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscest_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['whatsapp']))
    {
        $this->nm_new_label['whatsapp'] = "WHATSAPP";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $whatsapp = $this->whatsapp;
   $sStyleHidden_whatsapp = '';
   if (isset($this->nmgp_cmp_hidden['whatsapp']) && $this->nmgp_cmp_hidden['whatsapp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['whatsapp']);
       $sStyleHidden_whatsapp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_whatsapp = 'display: none;';
   $sStyleReadInp_whatsapp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['whatsapp']) && $this->nmgp_cmp_readonly['whatsapp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['whatsapp']);
       $sStyleReadLab_whatsapp = '';
       $sStyleReadInp_whatsapp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['whatsapp']) && $this->nmgp_cmp_hidden['whatsapp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="whatsapp" value="<?php echo $this->form_encode_input($whatsapp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_whatsapp_line" id="hidden_field_data_whatsapp" style="<?php echo $sStyleHidden_whatsapp; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_whatsapp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_whatsapp_label" style=""><span id="id_label_whatsapp"><?php echo $this->nm_new_label['whatsapp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["whatsapp"]) &&  $this->nmgp_cmp_readonly["whatsapp"] == "on") { 

 ?>
<input type="hidden" name="whatsapp" value="<?php echo $this->form_encode_input($whatsapp) . "\">" . $whatsapp . ""; ?>
<?php } else { ?>
<span id="id_read_on_whatsapp" class="sc-ui-readonly-whatsapp css_whatsapp_line" style="<?php echo $sStyleReadLab_whatsapp; ?>"><?php echo $this->form_format_readonly("whatsapp", $this->form_encode_input($this->whatsapp)); ?></span><span id="id_read_off_whatsapp" class="css_read_off_whatsapp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_whatsapp; ?>">
 <input class="sc-js-input scFormObjectOdd css_whatsapp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_whatsapp" type=text name="whatsapp" value="<?php echo $this->form_encode_input($whatsapp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_whatsapp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_whatsapp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cadastrante']))
    {
        $this->nm_new_label['cadastrante'] = "CADASTRANTE";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cadastrante = $this->cadastrante;
   $sStyleHidden_cadastrante = '';
   if (isset($this->nmgp_cmp_hidden['cadastrante']) && $this->nmgp_cmp_hidden['cadastrante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cadastrante']);
       $sStyleHidden_cadastrante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cadastrante = 'display: none;';
   $sStyleReadInp_cadastrante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cadastrante']) && $this->nmgp_cmp_readonly['cadastrante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cadastrante']);
       $sStyleReadLab_cadastrante = '';
       $sStyleReadInp_cadastrante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cadastrante']) && $this->nmgp_cmp_hidden['cadastrante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cadastrante" value="<?php echo $this->form_encode_input($cadastrante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cadastrante_line" id="hidden_field_data_cadastrante" style="<?php echo $sStyleHidden_cadastrante; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cadastrante_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_cadastrante_label" style=""><span id="id_label_cadastrante"><?php echo $this->nm_new_label['cadastrante']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cadastrante"]) &&  $this->nmgp_cmp_readonly["cadastrante"] == "on") { 

 ?>
<input type="hidden" name="cadastrante" value="<?php echo $this->form_encode_input($cadastrante) . "\">" . $cadastrante . ""; ?>
<?php } else { ?>
<span id="id_read_on_cadastrante" class="sc-ui-readonly-cadastrante css_cadastrante_line" style="<?php echo $sStyleReadLab_cadastrante; ?>"><?php echo $this->form_format_readonly("cadastrante", $this->form_encode_input($this->cadastrante)); ?></span><span id="id_read_off_cadastrante" class="css_read_off_cadastrante<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cadastrante; ?>">
 <input class="sc-js-input scFormObjectOdd css_cadastrante_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cadastrante" type=text name="cadastrante" value="<?php echo $this->form_encode_input($cadastrante) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cadastrante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cadastrante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_cadastrante_dumb = ('' == $sStyleHidden_cadastrante) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cadastrante_dumb" style="<?php echo $sStyleHidden_cadastrante_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obs']))
    {
        $this->nm_new_label['obs'] = "OBS";
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

    <TD class="scFormDataOdd css_obs_line" id="hidden_field_data_obs" style="<?php echo $sStyleHidden_obs; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obs_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_obs_label" style=""><span id="id_label_obs"><?php echo $this->nm_new_label['obs']; ?></span></span><br><span id="id_read_on_obs" style="<?php echo $sStyleReadLab_obs; ?>"><?php echo $this->form_format_readonly("obs", sc_strip_script($this->obs)); ?></span><span id="id_read_off_obs" class="css_read_off_obs" style="<?php echo $sStyleReadInp_obs; ?>">
<?php
if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['pdf_view']) {
   echo $this->obs;
} else {
?>
<textarea id="obs" name="obs" cols="50" rows="10" class="mceEditor_obs" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->obs); ?></textarea>
<?php
}
?>
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
