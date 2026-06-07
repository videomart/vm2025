<div id="form_empresa_mob_form2" style='<?php echo ($this->tabCssClass["form_empresa_mob_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5" class="scBlockFrame"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_5" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contatos']))
    {
        $this->nm_new_label['contatos'] = "Contatos";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contatos = $this->contatos;
   $sStyleHidden_contatos = '';
   if (isset($this->nmgp_cmp_hidden['contatos']) && $this->nmgp_cmp_hidden['contatos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contatos']);
       $sStyleHidden_contatos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contatos = 'display: none;';
   $sStyleReadInp_contatos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contatos']) && $this->nmgp_cmp_readonly['contatos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contatos']);
       $sStyleReadLab_contatos = '';
       $sStyleReadInp_contatos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contatos']) && $this->nmgp_cmp_hidden['contatos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatos" value="<?php echo $this->form_encode_input($contatos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contatos_line" id="hidden_field_data_contatos" style="<?php echo $sStyleHidden_contatos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_contatos_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Contatos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Contatos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Contatos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['foreign_key']['id_empresa'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['where_filter'] = "ID_EMPRESA = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['where_detal']  = "ID_EMPRESA = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_empresa_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_empresa_mob_empty.htm' : $this->Ini->link_form_contato_mob_edit . '?SC_where_pdf=' . $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['where_filter'] . '&script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato'][$i] = $v;
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['pdf_view'])
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_pdf'] = true;
     $_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['form_contato_mob'] = $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_form_parms'] . '?#?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '?@??#?script_case_detail=Y?@?';
     include_once ($this->Ini->root . $this->Ini->link_form_contato_mob_edit . "index.php");
     $this->form_contato_mob_pdf_det = new form_contato_mob_edit;
     if (method_exists($this->form_contato_mob_pdf_det, "inicializa"))
     {
         $this->form_contato_mob_pdf_det->inicializa();
     }
     unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['form_contato_mob_script_case_init'] ]['form_contato_mob']['embutida_pdf']);
     unset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['form_contato_mob']);
 }
 else
 {
?>
    <iframe border="0" id="nmsc_iframe_liga_form_contato_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="900" name="nmsc_iframe_liga_form_contato_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
 }
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatos_text"></span></td></tr></table></td></tr></table> </TD>
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
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "R")
{
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-33';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-34';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-35';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-36';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
<script> 
<?php
 $NM_pag_atual = "form_empresa_mob_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_empresa_mob_form" . $this->nmgp_ancora;
 }
if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['pdf_view'])
{
    $NM_pag_atual = $this->SC_Pdf_pag_ativa;
?>
  sc_exib_ocult_pag('<?php echo $NM_pag_atual; ?>');
<?php
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['masterValue']);
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
<?php
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['pdf_view']) {
?>
 $(document).ready(function() {
});
<?php
}
?>
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_empresa_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_empresa_mob");
 parent.scAjaxDetailHeight("form_empresa_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_empresa_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_empresa_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['sc_modal'])
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
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_new_t.sc-unique-btn-17").length && $("#sc_b_new_t.sc-unique-btn-17").is(":visible")) {
                    if ($("#sc_b_new_t.sc-unique-btn-17").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_ins_t.sc-unique-btn-18").length && $("#sc_b_ins_t.sc-unique-btn-18").is(":visible")) {
                    if ($("#sc_b_ins_t.sc-unique-btn-18").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_cnl() {
                if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
                        return;
                    }
                        <?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-19").length && $("#sc_b_sai_t.sc-unique-btn-19").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-19").hasClass("disabled")) {
                        return;
                    }
                        <?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_alt() {
                if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_upd_t.sc-unique-btn-20").length && $("#sc_b_upd_t.sc-unique-btn-20").is(":visible")) {
                    if ($("#sc_b_upd_t.sc-unique-btn-20").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_exc() {
                if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_del_t.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('excluir');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_del_t.sc-unique-btn-21").length && $("#sc_b_del_t.sc-unique-btn-21").is(":visible")) {
                    if ($("#sc_b_del_t.sc-unique-btn-21").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('excluir');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_Etiqueta() {
                if ($("#sc_Etiqueta_top").length && $("#sc_Etiqueta_top").is(":visible")) {
                    if ($("#sc_Etiqueta_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_Etiqueta()
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_Etiqueta_top").length && $("#sc_Etiqueta_top").is(":visible")) {
                    if ($("#sc_Etiqueta_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_Etiqueta()
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_Etiqueta_top").length && $("#sc_Etiqueta_top").is(":visible")) {
                    if ($("#sc_Etiqueta_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_Etiqueta()
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_Etiqueta_top").length && $("#sc_Etiqueta_top").is(":visible")) {
                    if ($("#sc_Etiqueta_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_Etiqueta()
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_pdf() {
                if ($("#sc_b_pdf_t.sc-unique-btn-6").length && $("#sc_b_pdf_t.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_pdf_t.sc-unique-btn-6").hasClass("disabled")) {
                        return;
                    }
                        tb_show('', "<?php echo  $this->Ini->path_link . SC_dir_app_name('form_empresa')  ?>/form_empresa_config_pdf.php?nm_opc=pdf&nm_target=2&nm_cor=cor&papel=8&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=800&conf_larg=10&conf_fonte=N&grafico=XX&language=pt_br&conf_socor=N&password=n&pdf_zip=N&sc_ver_93=s&KeepThis=true&TB_iframe=true&modal=true");
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_pdf_t.sc-unique-btn-22").length && $("#sc_b_pdf_t.sc-unique-btn-22").is(":visible")) {
                    if ($("#sc_b_pdf_t.sc-unique-btn-22").hasClass("disabled")) {
                        return;
                    }
                        tb_show('', "<?php echo  $this->Ini->path_link . SC_dir_app_name('form_empresa_mob')  ?>/form_empresa_mob_config_pdf.php?nm_opc=pdf&nm_target=2&nm_cor=cor&papel=8&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=800&conf_larg=10&conf_fonte=N&grafico=XX&language=pt_br&conf_socor=N&password=n&pdf_zip=N&sc_ver_93=s&KeepThis=true&TB_iframe=true&modal=true");
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_ini() {
                if ($("#sc_b_ini_t.sc-unique-btn-7").length && $("#sc_b_ini_t.sc-unique-btn-7").is(":visible")) {
                    if ($("#sc_b_ini_t.sc-unique-btn-7").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_ini_t.sc-unique-btn-23").length && $("#sc_b_ini_t.sc-unique-btn-23").is(":visible")) {
                    if ($("#sc_b_ini_t.sc-unique-btn-23").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_ini_b.sc-unique-btn-33").length && $("#sc_b_ini_b.sc-unique-btn-33").is(":visible")) {
                    if ($("#sc_b_ini_b.sc-unique-btn-33").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_ret() {
                if ($("#sc_b_ret_t.sc-unique-btn-8").length && $("#sc_b_ret_t.sc-unique-btn-8").is(":visible")) {
                    if ($("#sc_b_ret_t.sc-unique-btn-8").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_ret_t.sc-unique-btn-24").length && $("#sc_b_ret_t.sc-unique-btn-24").is(":visible")) {
                    if ($("#sc_b_ret_t.sc-unique-btn-24").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_ret_b.sc-unique-btn-34").length && $("#sc_b_ret_b.sc-unique-btn-34").is(":visible")) {
                    if ($("#sc_b_ret_b.sc-unique-btn-34").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_ava() {
                if ($("#sc_b_avc_t.sc-unique-btn-9").length && $("#sc_b_avc_t.sc-unique-btn-9").is(":visible")) {
                    if ($("#sc_b_avc_t.sc-unique-btn-9").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_avc_t.sc-unique-btn-25").length && $("#sc_b_avc_t.sc-unique-btn-25").is(":visible")) {
                    if ($("#sc_b_avc_t.sc-unique-btn-25").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_avc_b.sc-unique-btn-35").length && $("#sc_b_avc_b.sc-unique-btn-35").is(":visible")) {
                    if ($("#sc_b_avc_b.sc-unique-btn-35").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_fim() {
                if ($("#sc_b_fim_t.sc-unique-btn-10").length && $("#sc_b_fim_t.sc-unique-btn-10").is(":visible")) {
                    if ($("#sc_b_fim_t.sc-unique-btn-10").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_fim_t.sc-unique-btn-26").length && $("#sc_b_fim_t.sc-unique-btn-26").is(":visible")) {
                    if ($("#sc_b_fim_t.sc-unique-btn-26").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_fim_b.sc-unique-btn-36").length && $("#sc_b_fim_b.sc-unique-btn-36").is(":visible")) {
                    if ($("#sc_b_fim_b.sc-unique-btn-36").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_reload() {
                if ($("#sc_b_reload_t.sc-unique-btn-11").length && $("#sc_b_reload_t.sc-unique-btn-11").is(":visible")) {
                    if ($("#sc_b_reload_t.sc-unique-btn-11").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_reload_t.sc-unique-btn-27").length && $("#sc_b_reload_t.sc-unique-btn-27").is(":visible")) {
                    if ($("#sc_b_reload_t.sc-unique-btn-27").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_hlp() {
                if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
                    if ($("#sc_b_hlp_t").hasClass("disabled")) {
                        return;
                    }
                        window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_sai() {
                if ($("#sc_b_sai_t.sc-unique-btn-12").length && $("#sc_b_sai_t.sc-unique-btn-12").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-12").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-13").length && $("#sc_b_sai_t.sc-unique-btn-13").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-13").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-14").length && $("#sc_b_sai_t.sc-unique-btn-14").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-14").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-15").length && $("#sc_b_sai_t.sc-unique-btn-15").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-15").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-16").length && $("#sc_b_sai_t.sc-unique-btn-16").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-16").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-28").length && $("#sc_b_sai_t.sc-unique-btn-28").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-28").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-29").length && $("#sc_b_sai_t.sc-unique-btn-29").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-29").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-30").length && $("#sc_b_sai_t.sc-unique-btn-30").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-30").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-31").length && $("#sc_b_sai_t.sc-unique-btn-31").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-31").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-32").length && $("#sc_b_sai_t.sc-unique-btn-32").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-32").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresa_mob']['buttonStatus'] = $this->nmgp_botoes;
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
