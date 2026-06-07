<div id="form_setup_mob_form1" style='<?php echo ($this->tabCssClass["form_setup_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_1" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Textos propostas<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rodape']))
    {
        $this->nm_new_label['rodape'] = "RODAPE";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rodape = $this->rodape;
   $sStyleHidden_rodape = '';
   if (isset($this->nmgp_cmp_hidden['rodape']) && $this->nmgp_cmp_hidden['rodape'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rodape']);
       $sStyleHidden_rodape = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rodape = 'display: none;';
   $sStyleReadInp_rodape = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rodape']) && $this->nmgp_cmp_readonly['rodape'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rodape']);
       $sStyleReadLab_rodape = '';
       $sStyleReadInp_rodape = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rodape']) && $this->nmgp_cmp_hidden['rodape'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rodape" value="<?php echo $this->form_encode_input($rodape) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_rodape" style="<?php echo $sStyleHidden_rodape; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rodape_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_rodape_label" style=" padding: 0px; width: 100%;"><span id="id_label_rodape"><?php echo $this->nm_new_label['rodape']; ?></span></td></tr><tr><td class="css_rodape_line" style="padding: 0px; width: 100%;"><span id="id_read_on_rodape" style="<?php echo $sStyleReadLab_rodape; ?>"><?php echo $this->form_format_readonly("rodape", sc_strip_script($this->rodape)); ?></span><span id="id_read_off_rodape" class="css_read_off_rodape" style="<?php echo $sStyleReadInp_rodape; ?>"><textarea id="rodape" name="rodape" cols="50" rows="10" class="mceEditor_rodape" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->rodape); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rodape_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rodape_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['header_proposta']))
    {
        $this->nm_new_label['header_proposta'] = "Cabeçalho proposta";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $header_proposta = $this->header_proposta;
   $sStyleHidden_header_proposta = '';
   if (isset($this->nmgp_cmp_hidden['header_proposta']) && $this->nmgp_cmp_hidden['header_proposta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['header_proposta']);
       $sStyleHidden_header_proposta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_header_proposta = 'display: none;';
   $sStyleReadInp_header_proposta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['header_proposta']) && $this->nmgp_cmp_readonly['header_proposta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['header_proposta']);
       $sStyleReadLab_header_proposta = '';
       $sStyleReadInp_header_proposta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['header_proposta']) && $this->nmgp_cmp_hidden['header_proposta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="header_proposta" value="<?php echo $this->form_encode_input($header_proposta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_header_proposta" style="<?php echo $sStyleHidden_header_proposta; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_header_proposta_line" style="vertical-align: top;padding: 0px"><table style="border-spacing: 0px; border-width: 0px; border-collapse: collapse; width: 100%" cellspacing=0 cellpadding=0><tr><td class="scFormLabelOddFormat scFormLabelAboveOddFormat css_header_proposta_label" style=" padding: 0px; width: 100%;"><span id="id_label_header_proposta"><?php echo $this->nm_new_label['header_proposta']; ?></span></td></tr><tr><td class="css_header_proposta_line" style="padding: 0px; width: 100%;"><span id="id_read_on_header_proposta" style="<?php echo $sStyleReadLab_header_proposta; ?>"><?php echo $this->form_format_readonly("header_proposta", sc_strip_script($this->header_proposta)); ?></span><span id="id_read_off_header_proposta" class="css_read_off_header_proposta" style="<?php echo $sStyleReadInp_header_proposta; ?>"><textarea id="header_proposta" name="header_proposta" cols="120" rows="5" class="mceEditor_header_proposta" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->header_proposta); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_header_proposta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_header_proposta_text"></span></td></tr></table></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
