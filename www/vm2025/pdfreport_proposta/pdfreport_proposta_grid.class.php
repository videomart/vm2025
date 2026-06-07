<?php
class pdfreport_proposta_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $itensproposta = array();
   var $itensproposta_subtotal = array();
   var $itensproposta_descricao = array();
   var $itensproposta_modelo = array();
   var $itensproposta_qty = array();
   var $itensproposta_unit = array();
   var $itensproposta_vdesconto = array();
   var $itensproposta_vunitario = array();
   var $proposta_ordem = array();
   var $proposta_natureza = array();
   var $proposta_data = array();
   var $proposta_cliente = array();
   var $proposta_condpag = array();
   var $proposta_obs = array();
   var $empresa_endereco = array();
   var $empresa_email = array();
   var $empresa_inscest = array();
   var $empresa_cep = array();
   var $cidade_cidade = array();
   var $cidade_uf = array();
   var $empresa_cnpj_cpf = array();
   var $proposta_atencao = array();
   var $cidade_ddd = array();
   var $proposta_telefone = array();
   var $proposta_fax = array();
   var $proposta_cod_vend = array();
   var $proposta_total = array();
   var $proposta_local_entrega = array();
   var $proposta_transportadora = array();
   var $funcionario_email = array();
   var $funcionario_meu_telefone = array();
   var $proposta_id = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("pt_br");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = 'Helvetica';
   $this->default_font_sr  = 'Courier';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_proposta']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_proposta", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "off";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->proposta_ordem[0] = (isset($Busca_temp['proposta_ordem'])) ? $Busca_temp['proposta_ordem'] : ""; 
       $tmp_pos = (is_string($this->proposta_ordem[0])) ? strpos($this->proposta_ordem[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->proposta_ordem[0]))
       {
           $this->proposta_ordem[0] = substr($this->proposta_ordem[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_proposta']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_proposta']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_proposta']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_proposta']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig'] = " where (proposta.ordem= " . $_SESSION['nordem'] . ")";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT proposta.ordem as proposta_ordem, proposta.natureza as proposta_natureza, proposta.data as proposta_data, proposta.cliente as proposta_cliente, proposta.condpag as proposta_condpag, proposta.obs as proposta_obs, empresa.ENDERECO as empresa_endereco, empresa.EMAIL as empresa_email, empresa.INSCEST as empresa_inscest, empresa.CEP as empresa_cep, cidade.cidade as cidade_cidade, cidade.uf as cidade_uf, empresa.CNPJ_CPF as empresa_cnpj_cpf, proposta.atencao as proposta_atencao, cidade.ddd as cidade_ddd, proposta.telefone as proposta_telefone, proposta.fax as proposta_fax, proposta.cod_vend as proposta_cod_vend, proposta.total as proposta_total, proposta.LOCAL_ENTREGA as proposta_local_entrega, proposta.TRANSPORTADORA as proposta_transportadora, funcionario.EMAIL as funcionario_email, funcionario.MEU_TELEFONE as funcionario_meu_telefone, proposta.ID as proposta_id from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT proposta.ordem as proposta_ordem, proposta.natureza as proposta_natureza, proposta.data as proposta_data, proposta.cliente as proposta_cliente, proposta.condpag as proposta_condpag, proposta.obs as proposta_obs, empresa.ENDERECO as empresa_endereco, empresa.EMAIL as empresa_email, empresa.INSCEST as empresa_inscest, empresa.CEP as empresa_cep, cidade.cidade as cidade_cidade, cidade.uf as cidade_uf, empresa.CNPJ_CPF as empresa_cnpj_cpf, proposta.atencao as proposta_atencao, cidade.ddd as cidade_ddd, proposta.telefone as proposta_telefone, proposta.fax as proposta_fax, proposta.cod_vend as proposta_cod_vend, proposta.total as proposta_total, proposta.LOCAL_ENTREGA as proposta_local_entrega, proposta.TRANSPORTADORA as proposta_transportadora, funcionario.EMAIL as funcionario_email, funcionario.MEU_TELEFONE as funcionario_meu_telefone, proposta.ID as proposta_id from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8);
     }
     $this->Pdf->SetTextColor(60, 60, 60);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__img__NM__logo-222.png", "10", "10", "0", "0", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_proposta']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_proposta']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_proposta']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 8, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 8);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
   $this->Pdf->Output($this->Ini->nm_path_pdf, 'D');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->proposta_ordem[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->proposta_ordem[$this->nm_grid_colunas] = (string)$this->proposta_ordem[$this->nm_grid_colunas];
          $this->proposta_natureza[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->proposta_data[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->proposta_cliente[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->proposta_condpag[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->proposta_obs[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->empresa_endereco[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->empresa_email[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->empresa_inscest[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->empresa_cep[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->cidade_cidade[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->cidade_uf[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->empresa_cnpj_cpf[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->proposta_atencao[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->cidade_ddd[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->proposta_telefone[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->proposta_fax[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->proposta_cod_vend[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->proposta_total[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->proposta_total[$this->nm_grid_colunas] =  str_replace(",", ".", $this->proposta_total[$this->nm_grid_colunas]);
          $this->proposta_total[$this->nm_grid_colunas] = (strpos(strtolower($this->proposta_total[$this->nm_grid_colunas]), "e")) ? (float)$this->proposta_total[$this->nm_grid_colunas] : $this->proposta_total[$this->nm_grid_colunas]; 
          $this->proposta_total[$this->nm_grid_colunas] = (string)$this->proposta_total[$this->nm_grid_colunas];
          $this->proposta_local_entrega[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->proposta_transportadora[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->funcionario_email[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->funcionario_meu_telefone[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->proposta_id[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->proposta_id[$this->nm_grid_colunas] = (string)$this->proposta_id[$this->nm_grid_colunas];
          $this->itensproposta_subtotal[$this->nm_grid_colunas] = array();
          $this->itensproposta_descricao[$this->nm_grid_colunas] = array();
          $this->itensproposta_modelo[$this->nm_grid_colunas] = array();
          $this->itensproposta_qty[$this->nm_grid_colunas] = array();
          $this->itensproposta_unit[$this->nm_grid_colunas] = array();
          $this->itensproposta_vdesconto[$this->nm_grid_colunas] = array();
          $this->itensproposta_vunitario[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_itensproposta($this->itensproposta[$this->nm_grid_colunas] , $this->proposta_id[$this->nm_grid_colunas], $array_itensproposta); 
          $NM_ind = 0;
          $this->itensproposta = array();
          foreach ($array_itensproposta as $cada_subselect) 
          {
              $this->itensproposta[$this->nm_grid_colunas][$NM_ind] = "";
              $this->itensproposta_modelo[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->itensproposta_descricao[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->itensproposta_unit[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->itensproposta_vdesconto[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->itensproposta_vunitario[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $NM_ind++;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_ordem[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_ordem[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_ordem[$this->nm_grid_colunas] = sc_strip_script($this->proposta_ordem[$this->nm_grid_colunas]);
          }
          if ($this->proposta_ordem[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_ordem[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_ordem[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_ordem[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_natureza[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_natureza[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_natureza[$this->nm_grid_colunas] = sc_strip_script($this->proposta_natureza[$this->nm_grid_colunas]);
          }
          if ($this->proposta_natureza[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_natureza[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->proposta_natureza[$this->nm_grid_colunas] !== "") 
          { 
              $this->proposta_natureza[$this->nm_grid_colunas] = sc_strtoupper($this->proposta_natureza[$this->nm_grid_colunas]); 
          } 
          $this->proposta_natureza[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_natureza[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_data[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_data[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_data[$this->nm_grid_colunas] = sc_strip_script($this->proposta_data[$this->nm_grid_colunas]);
          }
          if ($this->proposta_data[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_data[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $proposta_data_x =  $this->proposta_data[$this->nm_grid_colunas];
               nm_conv_limpa_dado($proposta_data_x, "YYYY-MM-DD");
               if (is_numeric($proposta_data_x) && strlen($proposta_data_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->proposta_data[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->proposta_data[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->proposta_data[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_data[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_cliente[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_cliente[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_cliente[$this->nm_grid_colunas] = sc_strip_script($this->proposta_cliente[$this->nm_grid_colunas]);
          }
          if ($this->proposta_cliente[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_cliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_cliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_cliente[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_condpag[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_condpag[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_condpag[$this->nm_grid_colunas] = sc_strip_script($this->proposta_condpag[$this->nm_grid_colunas]);
          }
          if ($this->proposta_condpag[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_condpag[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_condpag[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_condpag[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_obs[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_obs[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_obs[$this->nm_grid_colunas] = sc_strip_script($this->proposta_obs[$this->nm_grid_colunas]);
          }
          if ($this->proposta_obs[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_obs[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_obs[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_obs[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_endereco[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_endereco[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_endereco[$this->nm_grid_colunas] = sc_strip_script($this->empresa_endereco[$this->nm_grid_colunas]);
          }
          if ($this->empresa_endereco[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_endereco[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_endereco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_endereco[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_email[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_email[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_email[$this->nm_grid_colunas] = sc_strip_script($this->empresa_email[$this->nm_grid_colunas]);
          }
          if ($this->empresa_email[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_email[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_email[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_email[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_inscest[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_inscest[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_inscest[$this->nm_grid_colunas] = sc_strip_script($this->empresa_inscest[$this->nm_grid_colunas]);
          }
          if ($this->empresa_inscest[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_inscest[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_inscest[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_inscest[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_cep[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_cep[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_cep[$this->nm_grid_colunas] = sc_strip_script($this->empresa_cep[$this->nm_grid_colunas]);
          }
          if ($this->empresa_cep[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_cep[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_cep[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_cep[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->cidade_cidade[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->cidade_cidade[$this->nm_grid_colunas]));
          }
          else {
              $this->cidade_cidade[$this->nm_grid_colunas] = sc_strip_script($this->cidade_cidade[$this->nm_grid_colunas]);
          }
          if ($this->cidade_cidade[$this->nm_grid_colunas] === "") 
          { 
              $this->cidade_cidade[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cidade_cidade[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cidade_cidade[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->cidade_uf[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->cidade_uf[$this->nm_grid_colunas]));
          }
          else {
              $this->cidade_uf[$this->nm_grid_colunas] = sc_strip_script($this->cidade_uf[$this->nm_grid_colunas]);
          }
          if ($this->cidade_uf[$this->nm_grid_colunas] === "") 
          { 
              $this->cidade_uf[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cidade_uf[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cidade_uf[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_cnpj_cpf[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_cnpj_cpf[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_cnpj_cpf[$this->nm_grid_colunas] = sc_strip_script($this->empresa_cnpj_cpf[$this->nm_grid_colunas]);
          }
          if ($this->empresa_cnpj_cpf[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_cnpj_cpf[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_cnpj_cpf[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_cnpj_cpf[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_atencao[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_atencao[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_atencao[$this->nm_grid_colunas] = sc_strip_script($this->proposta_atencao[$this->nm_grid_colunas]);
          }
          if ($this->proposta_atencao[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_atencao[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_atencao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_atencao[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->cidade_ddd[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->cidade_ddd[$this->nm_grid_colunas]));
          }
          else {
              $this->cidade_ddd[$this->nm_grid_colunas] = sc_strip_script($this->cidade_ddd[$this->nm_grid_colunas]);
          }
          if ($this->cidade_ddd[$this->nm_grid_colunas] === "") 
          { 
              $this->cidade_ddd[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cidade_ddd[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cidade_ddd[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_telefone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_telefone[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_telefone[$this->nm_grid_colunas] = sc_strip_script($this->proposta_telefone[$this->nm_grid_colunas]);
          }
          if ($this->proposta_telefone[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_telefone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_telefone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_telefone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_fax[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_fax[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_fax[$this->nm_grid_colunas] = sc_strip_script($this->proposta_fax[$this->nm_grid_colunas]);
          }
          if ($this->proposta_fax[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_fax[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_fax[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_fax[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_cod_vend[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_cod_vend[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_cod_vend[$this->nm_grid_colunas] = sc_strip_script($this->proposta_cod_vend[$this->nm_grid_colunas]);
          }
          if ($this->proposta_cod_vend[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_cod_vend[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_cod_vend[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_cod_vend[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_total[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_total[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_total[$this->nm_grid_colunas] = sc_strip_script($this->proposta_total[$this->nm_grid_colunas]);
          }
          if ($this->proposta_total[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_total[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->proposta_total[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->proposta_total[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_total[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_local_entrega[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_local_entrega[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_local_entrega[$this->nm_grid_colunas] = sc_strip_script($this->proposta_local_entrega[$this->nm_grid_colunas]);
          }
          if ($this->proposta_local_entrega[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_local_entrega[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_local_entrega[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_local_entrega[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_transportadora[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_transportadora[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_transportadora[$this->nm_grid_colunas] = sc_strip_script($this->proposta_transportadora[$this->nm_grid_colunas]);
          }
          if ($this->proposta_transportadora[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_transportadora[$this->nm_grid_colunas] = "" ;  
          } 
          $this->proposta_transportadora[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_transportadora[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->funcionario_email[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->funcionario_email[$this->nm_grid_colunas]));
          }
          else {
              $this->funcionario_email[$this->nm_grid_colunas] = sc_strip_script($this->funcionario_email[$this->nm_grid_colunas]);
          }
          if ($this->funcionario_email[$this->nm_grid_colunas] === "") 
          { 
              $this->funcionario_email[$this->nm_grid_colunas] = "" ;  
          } 
          $this->funcionario_email[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->funcionario_email[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->funcionario_meu_telefone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->funcionario_meu_telefone[$this->nm_grid_colunas]));
          }
          else {
              $this->funcionario_meu_telefone[$this->nm_grid_colunas] = sc_strip_script($this->funcionario_meu_telefone[$this->nm_grid_colunas]);
          }
          if ($this->funcionario_meu_telefone[$this->nm_grid_colunas] === "") 
          { 
              $this->funcionario_meu_telefone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->funcionario_meu_telefone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->funcionario_meu_telefone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->proposta_id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->proposta_id[$this->nm_grid_colunas]));
          }
          else {
              $this->proposta_id[$this->nm_grid_colunas] = sc_strip_script($this->proposta_id[$this->nm_grid_colunas]);
          }
          if ($this->proposta_id[$this->nm_grid_colunas] === "") 
          { 
              $this->proposta_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->proposta_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->proposta_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->proposta_id[$this->nm_grid_colunas]);
          foreach ($this->itensproposta_subtotal[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->itensproposta_descricao[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->itensproposta_descricao[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->itensproposta_descricao[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->itensproposta_descricao[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->itensproposta_descricao[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->itensproposta_modelo[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->itensproposta_modelo[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->itensproposta_modelo[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->itensproposta_modelo[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->itensproposta_modelo[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->itensproposta_qty[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->itensproposta_unit[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->itensproposta_unit[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->itensproposta_unit[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->itensproposta_unit[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->itensproposta_unit[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->itensproposta_unit[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->itensproposta_vdesconto[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->itensproposta_vdesconto[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->itensproposta_vdesconto[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->itensproposta_vdesconto[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->itensproposta_vdesconto[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->itensproposta_vdesconto[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->itensproposta_vunitario[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->itensproposta_vunitario[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->itensproposta_vunitario[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->itensproposta_vunitario[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->itensproposta_vunitario[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->itensproposta_vunitario[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_proposta_natureza = array('posx' => '85', 'posy' => '20', 'data' => $this->proposta_natureza[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '12', 'color_r'    => '53', 'color_g'    => '53', 'color_b'    => '53', 'font_style' => 'BI');
            $cell_proposta_ordem = array('posx' => '86', 'posy' => '25', 'data' => $this->proposta_ordem[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '12', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'BI');
            $cell_VMPABX = array('posx' => '143.7306624999819', 'posy' => '20.236391666664115', 'data' => $this->SC_conv_utf8('PABX: 21 2142-1300'), 'width'      => '0', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_VMEMAIL = array('posx' => '141.0848291666489', 'posy' => '26.086329166663376', 'data' => $this->SC_conv_utf8('Email: comercial@videomart.com.br'), 'width'      => '0', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_VMWhatsApp = array('posx' => '132.8827458333166', 'posy' => '32.73398541666254', 'data' => $this->SC_conv_utf8('WhatsApp: 55 21 99312-3607'), 'width'      => '0', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Empresa_label = array('posx' => '10', 'posy' => '40', 'data' => $this->SC_conv_utf8('Empresa:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_proposta_cliente = array('posx' => '25', 'posy' => '40', 'data' => $this->proposta_cliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '10', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'B');
            $cell_Cgc_label = array('posx' => '10', 'posy' => '55', 'data' => $this->SC_conv_utf8('CNPJ:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_empresa_ENDERECO = array('posx' => '25', 'posy' => '45', 'data' => $this->empresa_endereco[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_cidade_cidade = array('posx' => '25', 'posy' => '50', 'data' => $this->cidade_cidade[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_cidade_uf = array('posx' => '77', 'posy' => '50', 'data' => $this->cidade_uf[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_proposta_atencao = array('posx' => '25', 'posy' => '70', 'data' => $this->proposta_atencao[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '3', 'color_g'    => '24', 'color_b'    => '171', 'font_style' => $this->default_style);
            $cell_cidade_ddd = array('posx' => '25', 'posy' => '65', 'data' => $this->cidade_ddd[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_proposta_telefone = array('posx' => '30', 'posy' => '65', 'data' => $this->proposta_telefone[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_proposta_fax = array('posx' => '70', 'posy' => '65', 'data' => $this->proposta_fax[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_proposta_cod_vend = array('posx' => '156', 'posy' => '55', 'data' => $this->proposta_cod_vend[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_proposta_total = array('posx' => '156', 'posy' => '67', 'data' => $this->proposta_total[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'BU');
            $cell_videomart = array('posx' => '134', 'posy' => '10', 'data' => $this->SC_conv_utf8('Videomart Broadcast Ltda'), 'width'      => '0', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'B');
            $cell_endereco_label = array('posx' => '10', 'posy' => '45', 'data' => $this->SC_conv_utf8('Endereco:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_cidade_label = array('posx' => '10', 'posy' => '50', 'data' => $this->SC_conv_utf8('Cidade:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_siteVM = array('posx' => '12', 'posy' => '22', 'data' => $this->SC_conv_utf8('www.videomart.com.br'), 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Times', 'font_size'  => '13', 'color_r'    => '51', 'color_g'    => '51', 'color_b'    => '153', 'font_style' => 'B');
            $cell_Atencao_label = array('posx' => '10', 'posy' => '70', 'data' => $this->SC_conv_utf8('Contato:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Email_label = array('posx' => '10', 'posy' => '60', 'data' => $this->SC_conv_utf8('Email:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Inscest_label = array('posx' => '61', 'posy' => '55', 'data' => $this->SC_conv_utf8('Insc. est:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Fax_label = array('posx' => '60', 'posy' => '65', 'data' => $this->SC_conv_utf8('Fax:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Tele_label = array('posx' => '10', 'posy' => '65', 'data' => $this->SC_conv_utf8('Telefone:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Email = array('posx' => '25', 'posy' => '60', 'data' => $this->empresa_email[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_InscEst = array('posx' => '73', 'posy' => '55', 'data' => $this->empresa_inscest[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_uF_LABEL = array('posx' => '73', 'posy' => '50', 'data' => $this->SC_conv_utf8('Uf:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_consultor_label = array('posx' => '135', 'posy' => '55', 'data' => $this->SC_conv_utf8('Consultor:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_consultor_email_label = array('posx' => '135', 'posy' => '45', 'data' => $this->SC_conv_utf8('Email:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_consultor_tel_label = array('posx' => '135', 'posy' => '50', 'data' => $this->SC_conv_utf8('Tel. direto:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Consultor_telefone = array('posx' => '156', 'posy' => '50', 'data' => $this->funcionario_meu_telefone[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_data_label = array('posx' => '135', 'posy' => '60', 'data' => $this->SC_conv_utf8('Data:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_proposta_data = array('posx' => '156', 'posy' => '60', 'data' => $this->proposta_data[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_Total_label = array('posx' => '135', 'posy' => '67', 'data' => $this->SC_conv_utf8('TOTAL:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'BU');
            $cell_Consult_Email = array('posx' => '156', 'posy' => '45', 'data' => $this->funcionario_email[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $MODELO = array('posx' => '10.260859166665373', 'posy' => '79.99915208332324', 'data' => $this->SC_conv_utf8('MODELO'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'BU');
            $DESCRICAO = array('posx' => '44.96276249999433', 'posy' => '80.25976666665655', 'data' => $this->SC_conv_utf8('DESCRICAO'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'BU');
            $QTD = array('posx' => '150.651368749981', 'posy' => '80.52434999998985', 'data' => $this->SC_conv_utf8('QTD'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'BU');
            $SUBTOTAL = array('posx' => '185', 'posy' => '80', 'data' => $this->SC_conv_utf8('SUBTOTAL'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'BU');
            $cell_ItensProposta_modelo = array('posx' => '9.988020833332074', 'posy' => '88.43697916665552', 'data' => $this->itensproposta_modelo[$this->nm_grid_colunas], 'width'      => '40', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => 'B');
            $cell_ItensProposta_descricao = array('posx' => '44.43359583332773', 'posy' => '88.43697916665552', 'data' => $this->itensproposta_descricao[$this->nm_grid_colunas], 'width'      => '180', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_ItensProposta_qty = array('posx' => '151', 'posy' => '88.43697916665552', 'data' => $this->itensproposta_qty[$this->nm_grid_colunas], 'width'      => '10', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_ItensProposta_SubTotal = array('posx' => '185', 'posy' => '88.43697916665552', 'data' => $this->itensproposta_subtotal[$this->nm_grid_colunas], 'width'      => '120', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_CNPJ_CLIENTE = array('posx' => '25', 'posy' => '55', 'data' => $this->empresa_cnpj_cpf[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_CEP_LABEL = array('posx' => '85', 'posy' => '50', 'data' => $this->SC_conv_utf8('CEP:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);
            $cell_CEP = array('posx' => '92', 'posy' => '50', 'data' => $this->empresa_cep[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '60', 'color_g'    => '60', 'color_b'    => '60', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_proposta_natureza['font_type'], $cell_proposta_natureza['font_style'], $cell_proposta_natureza['font_size']);
            $this->pdf_text_color($cell_proposta_natureza['data'], $cell_proposta_natureza['color_r'], $cell_proposta_natureza['color_g'], $cell_proposta_natureza['color_b']);
            if (!empty($cell_proposta_natureza['posx']) && !empty($cell_proposta_natureza['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_natureza['posx'], $cell_proposta_natureza['posy']);
            }
            elseif (!empty($cell_proposta_natureza['posx']))
            {
                $this->Pdf->SetX($cell_proposta_natureza['posx']);
            }
            elseif (!empty($cell_proposta_natureza['posy']))
            {
                $this->Pdf->SetY($cell_proposta_natureza['posy']);
            }
            $this->Pdf->Cell($cell_proposta_natureza['width'], 0, $cell_proposta_natureza['data'], 0, 0, $cell_proposta_natureza['align']);

            $this->Pdf->SetFont($cell_proposta_ordem['font_type'], $cell_proposta_ordem['font_style'], $cell_proposta_ordem['font_size']);
            $this->pdf_text_color($cell_proposta_ordem['data'], $cell_proposta_ordem['color_r'], $cell_proposta_ordem['color_g'], $cell_proposta_ordem['color_b']);
            if (!empty($cell_proposta_ordem['posx']) && !empty($cell_proposta_ordem['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_ordem['posx'], $cell_proposta_ordem['posy']);
            }
            elseif (!empty($cell_proposta_ordem['posx']))
            {
                $this->Pdf->SetX($cell_proposta_ordem['posx']);
            }
            elseif (!empty($cell_proposta_ordem['posy']))
            {
                $this->Pdf->SetY($cell_proposta_ordem['posy']);
            }
            $this->Pdf->Cell($cell_proposta_ordem['width'], 0, $cell_proposta_ordem['data'], 0, 0, $cell_proposta_ordem['align']);

            $this->Pdf->SetFont($cell_VMPABX['font_type'], $cell_VMPABX['font_style'], $cell_VMPABX['font_size']);
            $this->pdf_text_color($cell_VMPABX['data'], $cell_VMPABX['color_r'], $cell_VMPABX['color_g'], $cell_VMPABX['color_b']);
            if (!empty($cell_VMPABX['posx']) && !empty($cell_VMPABX['posy']))
            {
                $this->Pdf->SetXY($cell_VMPABX['posx'], $cell_VMPABX['posy']);
            }
            elseif (!empty($cell_VMPABX['posx']))
            {
                $this->Pdf->SetX($cell_VMPABX['posx']);
            }
            elseif (!empty($cell_VMPABX['posy']))
            {
                $this->Pdf->SetY($cell_VMPABX['posy']);
            }
            $this->Pdf->Cell($cell_VMPABX['width'], 0, $cell_VMPABX['data'], 0, 0, $cell_VMPABX['align']);

            $this->Pdf->SetFont($cell_VMEMAIL['font_type'], $cell_VMEMAIL['font_style'], $cell_VMEMAIL['font_size']);
            $this->pdf_text_color($cell_VMEMAIL['data'], $cell_VMEMAIL['color_r'], $cell_VMEMAIL['color_g'], $cell_VMEMAIL['color_b']);
            if (!empty($cell_VMEMAIL['posx']) && !empty($cell_VMEMAIL['posy']))
            {
                $this->Pdf->SetXY($cell_VMEMAIL['posx'], $cell_VMEMAIL['posy']);
            }
            elseif (!empty($cell_VMEMAIL['posx']))
            {
                $this->Pdf->SetX($cell_VMEMAIL['posx']);
            }
            elseif (!empty($cell_VMEMAIL['posy']))
            {
                $this->Pdf->SetY($cell_VMEMAIL['posy']);
            }
            $this->Pdf->Cell($cell_VMEMAIL['width'], 0, $cell_VMEMAIL['data'], 0, 0, $cell_VMEMAIL['align']);

            $this->Pdf->SetFont($cell_VMWhatsApp['font_type'], $cell_VMWhatsApp['font_style'], $cell_VMWhatsApp['font_size']);
            $this->pdf_text_color($cell_VMWhatsApp['data'], $cell_VMWhatsApp['color_r'], $cell_VMWhatsApp['color_g'], $cell_VMWhatsApp['color_b']);
            if (!empty($cell_VMWhatsApp['posx']) && !empty($cell_VMWhatsApp['posy']))
            {
                $this->Pdf->SetXY($cell_VMWhatsApp['posx'], $cell_VMWhatsApp['posy']);
            }
            elseif (!empty($cell_VMWhatsApp['posx']))
            {
                $this->Pdf->SetX($cell_VMWhatsApp['posx']);
            }
            elseif (!empty($cell_VMWhatsApp['posy']))
            {
                $this->Pdf->SetY($cell_VMWhatsApp['posy']);
            }
            $this->Pdf->Cell($cell_VMWhatsApp['width'], 0, $cell_VMWhatsApp['data'], 0, 0, $cell_VMWhatsApp['align']);

            $this->Pdf->SetFont($cell_Empresa_label['font_type'], $cell_Empresa_label['font_style'], $cell_Empresa_label['font_size']);
            $this->pdf_text_color($cell_Empresa_label['data'], $cell_Empresa_label['color_r'], $cell_Empresa_label['color_g'], $cell_Empresa_label['color_b']);
            if (!empty($cell_Empresa_label['posx']) && !empty($cell_Empresa_label['posy']))
            {
                $this->Pdf->SetXY($cell_Empresa_label['posx'], $cell_Empresa_label['posy']);
            }
            elseif (!empty($cell_Empresa_label['posx']))
            {
                $this->Pdf->SetX($cell_Empresa_label['posx']);
            }
            elseif (!empty($cell_Empresa_label['posy']))
            {
                $this->Pdf->SetY($cell_Empresa_label['posy']);
            }
            $this->Pdf->Cell($cell_Empresa_label['width'], 0, $cell_Empresa_label['data'], 0, 0, $cell_Empresa_label['align']);

            $this->Pdf->SetFont($cell_proposta_cliente['font_type'], $cell_proposta_cliente['font_style'], $cell_proposta_cliente['font_size']);
            $this->pdf_text_color($cell_proposta_cliente['data'], $cell_proposta_cliente['color_r'], $cell_proposta_cliente['color_g'], $cell_proposta_cliente['color_b']);
            if (!empty($cell_proposta_cliente['posx']) && !empty($cell_proposta_cliente['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_cliente['posx'], $cell_proposta_cliente['posy']);
            }
            elseif (!empty($cell_proposta_cliente['posx']))
            {
                $this->Pdf->SetX($cell_proposta_cliente['posx']);
            }
            elseif (!empty($cell_proposta_cliente['posy']))
            {
                $this->Pdf->SetY($cell_proposta_cliente['posy']);
            }
            $this->Pdf->Cell($cell_proposta_cliente['width'], 0, $cell_proposta_cliente['data'], 0, 0, $cell_proposta_cliente['align']);

            $this->Pdf->SetFont($cell_Cgc_label['font_type'], $cell_Cgc_label['font_style'], $cell_Cgc_label['font_size']);
            $this->pdf_text_color($cell_Cgc_label['data'], $cell_Cgc_label['color_r'], $cell_Cgc_label['color_g'], $cell_Cgc_label['color_b']);
            if (!empty($cell_Cgc_label['posx']) && !empty($cell_Cgc_label['posy']))
            {
                $this->Pdf->SetXY($cell_Cgc_label['posx'], $cell_Cgc_label['posy']);
            }
            elseif (!empty($cell_Cgc_label['posx']))
            {
                $this->Pdf->SetX($cell_Cgc_label['posx']);
            }
            elseif (!empty($cell_Cgc_label['posy']))
            {
                $this->Pdf->SetY($cell_Cgc_label['posy']);
            }
            $this->Pdf->Cell($cell_Cgc_label['width'], 0, $cell_Cgc_label['data'], 0, 0, $cell_Cgc_label['align']);

            $this->Pdf->SetFont($cell_empresa_ENDERECO['font_type'], $cell_empresa_ENDERECO['font_style'], $cell_empresa_ENDERECO['font_size']);
            $this->pdf_text_color($cell_empresa_ENDERECO['data'], $cell_empresa_ENDERECO['color_r'], $cell_empresa_ENDERECO['color_g'], $cell_empresa_ENDERECO['color_b']);
            if (!empty($cell_empresa_ENDERECO['posx']) && !empty($cell_empresa_ENDERECO['posy']))
            {
                $this->Pdf->SetXY($cell_empresa_ENDERECO['posx'], $cell_empresa_ENDERECO['posy']);
            }
            elseif (!empty($cell_empresa_ENDERECO['posx']))
            {
                $this->Pdf->SetX($cell_empresa_ENDERECO['posx']);
            }
            elseif (!empty($cell_empresa_ENDERECO['posy']))
            {
                $this->Pdf->SetY($cell_empresa_ENDERECO['posy']);
            }
            $this->Pdf->Cell($cell_empresa_ENDERECO['width'], 0, $cell_empresa_ENDERECO['data'], 0, 0, $cell_empresa_ENDERECO['align']);

            $this->Pdf->SetFont($cell_cidade_cidade['font_type'], $cell_cidade_cidade['font_style'], $cell_cidade_cidade['font_size']);
            $this->pdf_text_color($cell_cidade_cidade['data'], $cell_cidade_cidade['color_r'], $cell_cidade_cidade['color_g'], $cell_cidade_cidade['color_b']);
            if (!empty($cell_cidade_cidade['posx']) && !empty($cell_cidade_cidade['posy']))
            {
                $this->Pdf->SetXY($cell_cidade_cidade['posx'], $cell_cidade_cidade['posy']);
            }
            elseif (!empty($cell_cidade_cidade['posx']))
            {
                $this->Pdf->SetX($cell_cidade_cidade['posx']);
            }
            elseif (!empty($cell_cidade_cidade['posy']))
            {
                $this->Pdf->SetY($cell_cidade_cidade['posy']);
            }
            $this->Pdf->Cell($cell_cidade_cidade['width'], 0, $cell_cidade_cidade['data'], 0, 0, $cell_cidade_cidade['align']);

            $this->Pdf->SetFont($cell_cidade_uf['font_type'], $cell_cidade_uf['font_style'], $cell_cidade_uf['font_size']);
            $this->pdf_text_color($cell_cidade_uf['data'], $cell_cidade_uf['color_r'], $cell_cidade_uf['color_g'], $cell_cidade_uf['color_b']);
            if (!empty($cell_cidade_uf['posx']) && !empty($cell_cidade_uf['posy']))
            {
                $this->Pdf->SetXY($cell_cidade_uf['posx'], $cell_cidade_uf['posy']);
            }
            elseif (!empty($cell_cidade_uf['posx']))
            {
                $this->Pdf->SetX($cell_cidade_uf['posx']);
            }
            elseif (!empty($cell_cidade_uf['posy']))
            {
                $this->Pdf->SetY($cell_cidade_uf['posy']);
            }
            $this->Pdf->Cell($cell_cidade_uf['width'], 0, $cell_cidade_uf['data'], 0, 0, $cell_cidade_uf['align']);

            $this->Pdf->SetFont($cell_proposta_atencao['font_type'], $cell_proposta_atencao['font_style'], $cell_proposta_atencao['font_size']);
            $this->pdf_text_color($cell_proposta_atencao['data'], $cell_proposta_atencao['color_r'], $cell_proposta_atencao['color_g'], $cell_proposta_atencao['color_b']);
            if (!empty($cell_proposta_atencao['posx']) && !empty($cell_proposta_atencao['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_atencao['posx'], $cell_proposta_atencao['posy']);
            }
            elseif (!empty($cell_proposta_atencao['posx']))
            {
                $this->Pdf->SetX($cell_proposta_atencao['posx']);
            }
            elseif (!empty($cell_proposta_atencao['posy']))
            {
                $this->Pdf->SetY($cell_proposta_atencao['posy']);
            }
            $this->Pdf->Cell($cell_proposta_atencao['width'], 0, $cell_proposta_atencao['data'], 0, 0, $cell_proposta_atencao['align']);

            $this->Pdf->SetFont($cell_cidade_ddd['font_type'], $cell_cidade_ddd['font_style'], $cell_cidade_ddd['font_size']);
            $this->pdf_text_color($cell_cidade_ddd['data'], $cell_cidade_ddd['color_r'], $cell_cidade_ddd['color_g'], $cell_cidade_ddd['color_b']);
            if (!empty($cell_cidade_ddd['posx']) && !empty($cell_cidade_ddd['posy']))
            {
                $this->Pdf->SetXY($cell_cidade_ddd['posx'], $cell_cidade_ddd['posy']);
            }
            elseif (!empty($cell_cidade_ddd['posx']))
            {
                $this->Pdf->SetX($cell_cidade_ddd['posx']);
            }
            elseif (!empty($cell_cidade_ddd['posy']))
            {
                $this->Pdf->SetY($cell_cidade_ddd['posy']);
            }
            $this->Pdf->Cell($cell_cidade_ddd['width'], 0, $cell_cidade_ddd['data'], 0, 0, $cell_cidade_ddd['align']);

            $this->Pdf->SetFont($cell_proposta_telefone['font_type'], $cell_proposta_telefone['font_style'], $cell_proposta_telefone['font_size']);
            $this->pdf_text_color($cell_proposta_telefone['data'], $cell_proposta_telefone['color_r'], $cell_proposta_telefone['color_g'], $cell_proposta_telefone['color_b']);
            if (!empty($cell_proposta_telefone['posx']) && !empty($cell_proposta_telefone['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_telefone['posx'], $cell_proposta_telefone['posy']);
            }
            elseif (!empty($cell_proposta_telefone['posx']))
            {
                $this->Pdf->SetX($cell_proposta_telefone['posx']);
            }
            elseif (!empty($cell_proposta_telefone['posy']))
            {
                $this->Pdf->SetY($cell_proposta_telefone['posy']);
            }
            $this->Pdf->Cell($cell_proposta_telefone['width'], 0, $cell_proposta_telefone['data'], 0, 0, $cell_proposta_telefone['align']);

            $this->Pdf->SetFont($cell_proposta_fax['font_type'], $cell_proposta_fax['font_style'], $cell_proposta_fax['font_size']);
            $this->pdf_text_color($cell_proposta_fax['data'], $cell_proposta_fax['color_r'], $cell_proposta_fax['color_g'], $cell_proposta_fax['color_b']);
            if (!empty($cell_proposta_fax['posx']) && !empty($cell_proposta_fax['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_fax['posx'], $cell_proposta_fax['posy']);
            }
            elseif (!empty($cell_proposta_fax['posx']))
            {
                $this->Pdf->SetX($cell_proposta_fax['posx']);
            }
            elseif (!empty($cell_proposta_fax['posy']))
            {
                $this->Pdf->SetY($cell_proposta_fax['posy']);
            }
            $this->Pdf->Cell($cell_proposta_fax['width'], 0, $cell_proposta_fax['data'], 0, 0, $cell_proposta_fax['align']);

            $this->Pdf->SetFont($cell_proposta_cod_vend['font_type'], $cell_proposta_cod_vend['font_style'], $cell_proposta_cod_vend['font_size']);
            $this->pdf_text_color($cell_proposta_cod_vend['data'], $cell_proposta_cod_vend['color_r'], $cell_proposta_cod_vend['color_g'], $cell_proposta_cod_vend['color_b']);
            if (!empty($cell_proposta_cod_vend['posx']) && !empty($cell_proposta_cod_vend['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_cod_vend['posx'], $cell_proposta_cod_vend['posy']);
            }
            elseif (!empty($cell_proposta_cod_vend['posx']))
            {
                $this->Pdf->SetX($cell_proposta_cod_vend['posx']);
            }
            elseif (!empty($cell_proposta_cod_vend['posy']))
            {
                $this->Pdf->SetY($cell_proposta_cod_vend['posy']);
            }
            $this->Pdf->Cell($cell_proposta_cod_vend['width'], 0, $cell_proposta_cod_vend['data'], 0, 0, $cell_proposta_cod_vend['align']);

            $this->Pdf->SetFont($cell_proposta_total['font_type'], $cell_proposta_total['font_style'], $cell_proposta_total['font_size']);
            $this->pdf_text_color($cell_proposta_total['data'], $cell_proposta_total['color_r'], $cell_proposta_total['color_g'], $cell_proposta_total['color_b']);
            if (!empty($cell_proposta_total['posx']) && !empty($cell_proposta_total['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_total['posx'], $cell_proposta_total['posy']);
            }
            elseif (!empty($cell_proposta_total['posx']))
            {
                $this->Pdf->SetX($cell_proposta_total['posx']);
            }
            elseif (!empty($cell_proposta_total['posy']))
            {
                $this->Pdf->SetY($cell_proposta_total['posy']);
            }
            $this->Pdf->Cell($cell_proposta_total['width'], 0, $cell_proposta_total['data'], 0, 0, $cell_proposta_total['align']);

            $this->Pdf->SetFont($cell_videomart['font_type'], $cell_videomart['font_style'], $cell_videomart['font_size']);
            $this->pdf_text_color($cell_videomart['data'], $cell_videomart['color_r'], $cell_videomart['color_g'], $cell_videomart['color_b']);
            if (!empty($cell_videomart['posx']) && !empty($cell_videomart['posy']))
            {
                $this->Pdf->SetXY($cell_videomart['posx'], $cell_videomart['posy']);
            }
            elseif (!empty($cell_videomart['posx']))
            {
                $this->Pdf->SetX($cell_videomart['posx']);
            }
            elseif (!empty($cell_videomart['posy']))
            {
                $this->Pdf->SetY($cell_videomart['posy']);
            }
            $this->Pdf->Cell($cell_videomart['width'], 0, $cell_videomart['data'], 0, 0, $cell_videomart['align']);

            $this->Pdf->SetFont($cell_endereco_label['font_type'], $cell_endereco_label['font_style'], $cell_endereco_label['font_size']);
            $this->pdf_text_color($cell_endereco_label['data'], $cell_endereco_label['color_r'], $cell_endereco_label['color_g'], $cell_endereco_label['color_b']);
            if (!empty($cell_endereco_label['posx']) && !empty($cell_endereco_label['posy']))
            {
                $this->Pdf->SetXY($cell_endereco_label['posx'], $cell_endereco_label['posy']);
            }
            elseif (!empty($cell_endereco_label['posx']))
            {
                $this->Pdf->SetX($cell_endereco_label['posx']);
            }
            elseif (!empty($cell_endereco_label['posy']))
            {
                $this->Pdf->SetY($cell_endereco_label['posy']);
            }
            $this->Pdf->Cell($cell_endereco_label['width'], 0, $cell_endereco_label['data'], 0, 0, $cell_endereco_label['align']);

            $this->Pdf->SetFont($cell_cidade_label['font_type'], $cell_cidade_label['font_style'], $cell_cidade_label['font_size']);
            $this->pdf_text_color($cell_cidade_label['data'], $cell_cidade_label['color_r'], $cell_cidade_label['color_g'], $cell_cidade_label['color_b']);
            if (!empty($cell_cidade_label['posx']) && !empty($cell_cidade_label['posy']))
            {
                $this->Pdf->SetXY($cell_cidade_label['posx'], $cell_cidade_label['posy']);
            }
            elseif (!empty($cell_cidade_label['posx']))
            {
                $this->Pdf->SetX($cell_cidade_label['posx']);
            }
            elseif (!empty($cell_cidade_label['posy']))
            {
                $this->Pdf->SetY($cell_cidade_label['posy']);
            }
            $this->Pdf->Cell($cell_cidade_label['width'], 0, $cell_cidade_label['data'], 0, 0, $cell_cidade_label['align']);

            $this->Pdf->SetFont($cell_siteVM['font_type'], $cell_siteVM['font_style'], $cell_siteVM['font_size']);
            $this->pdf_text_color($cell_siteVM['data'], $cell_siteVM['color_r'], $cell_siteVM['color_g'], $cell_siteVM['color_b']);
            if (!empty($cell_siteVM['posx']) && !empty($cell_siteVM['posy']))
            {
                $this->Pdf->SetXY($cell_siteVM['posx'], $cell_siteVM['posy']);
            }
            elseif (!empty($cell_siteVM['posx']))
            {
                $this->Pdf->SetX($cell_siteVM['posx']);
            }
            elseif (!empty($cell_siteVM['posy']))
            {
                $this->Pdf->SetY($cell_siteVM['posy']);
            }
            $this->Pdf->Cell($cell_siteVM['width'], 0, $cell_siteVM['data'], 0, 0, $cell_siteVM['align']);

            $this->Pdf->SetFont($cell_Atencao_label['font_type'], $cell_Atencao_label['font_style'], $cell_Atencao_label['font_size']);
            $this->pdf_text_color($cell_Atencao_label['data'], $cell_Atencao_label['color_r'], $cell_Atencao_label['color_g'], $cell_Atencao_label['color_b']);
            if (!empty($cell_Atencao_label['posx']) && !empty($cell_Atencao_label['posy']))
            {
                $this->Pdf->SetXY($cell_Atencao_label['posx'], $cell_Atencao_label['posy']);
            }
            elseif (!empty($cell_Atencao_label['posx']))
            {
                $this->Pdf->SetX($cell_Atencao_label['posx']);
            }
            elseif (!empty($cell_Atencao_label['posy']))
            {
                $this->Pdf->SetY($cell_Atencao_label['posy']);
            }
            $this->Pdf->Cell($cell_Atencao_label['width'], 0, $cell_Atencao_label['data'], 0, 0, $cell_Atencao_label['align']);

            $this->Pdf->SetFont($cell_Email_label['font_type'], $cell_Email_label['font_style'], $cell_Email_label['font_size']);
            $this->pdf_text_color($cell_Email_label['data'], $cell_Email_label['color_r'], $cell_Email_label['color_g'], $cell_Email_label['color_b']);
            if (!empty($cell_Email_label['posx']) && !empty($cell_Email_label['posy']))
            {
                $this->Pdf->SetXY($cell_Email_label['posx'], $cell_Email_label['posy']);
            }
            elseif (!empty($cell_Email_label['posx']))
            {
                $this->Pdf->SetX($cell_Email_label['posx']);
            }
            elseif (!empty($cell_Email_label['posy']))
            {
                $this->Pdf->SetY($cell_Email_label['posy']);
            }
            $this->Pdf->Cell($cell_Email_label['width'], 0, $cell_Email_label['data'], 0, 0, $cell_Email_label['align']);

            $this->Pdf->SetFont($cell_Inscest_label['font_type'], $cell_Inscest_label['font_style'], $cell_Inscest_label['font_size']);
            $this->pdf_text_color($cell_Inscest_label['data'], $cell_Inscest_label['color_r'], $cell_Inscest_label['color_g'], $cell_Inscest_label['color_b']);
            if (!empty($cell_Inscest_label['posx']) && !empty($cell_Inscest_label['posy']))
            {
                $this->Pdf->SetXY($cell_Inscest_label['posx'], $cell_Inscest_label['posy']);
            }
            elseif (!empty($cell_Inscest_label['posx']))
            {
                $this->Pdf->SetX($cell_Inscest_label['posx']);
            }
            elseif (!empty($cell_Inscest_label['posy']))
            {
                $this->Pdf->SetY($cell_Inscest_label['posy']);
            }
            $this->Pdf->Cell($cell_Inscest_label['width'], 0, $cell_Inscest_label['data'], 0, 0, $cell_Inscest_label['align']);

            $this->Pdf->SetFont($cell_Fax_label['font_type'], $cell_Fax_label['font_style'], $cell_Fax_label['font_size']);
            $this->pdf_text_color($cell_Fax_label['data'], $cell_Fax_label['color_r'], $cell_Fax_label['color_g'], $cell_Fax_label['color_b']);
            if (!empty($cell_Fax_label['posx']) && !empty($cell_Fax_label['posy']))
            {
                $this->Pdf->SetXY($cell_Fax_label['posx'], $cell_Fax_label['posy']);
            }
            elseif (!empty($cell_Fax_label['posx']))
            {
                $this->Pdf->SetX($cell_Fax_label['posx']);
            }
            elseif (!empty($cell_Fax_label['posy']))
            {
                $this->Pdf->SetY($cell_Fax_label['posy']);
            }
            $this->Pdf->Cell($cell_Fax_label['width'], 0, $cell_Fax_label['data'], 0, 0, $cell_Fax_label['align']);

            $this->Pdf->SetFont($cell_Tele_label['font_type'], $cell_Tele_label['font_style'], $cell_Tele_label['font_size']);
            $this->pdf_text_color($cell_Tele_label['data'], $cell_Tele_label['color_r'], $cell_Tele_label['color_g'], $cell_Tele_label['color_b']);
            if (!empty($cell_Tele_label['posx']) && !empty($cell_Tele_label['posy']))
            {
                $this->Pdf->SetXY($cell_Tele_label['posx'], $cell_Tele_label['posy']);
            }
            elseif (!empty($cell_Tele_label['posx']))
            {
                $this->Pdf->SetX($cell_Tele_label['posx']);
            }
            elseif (!empty($cell_Tele_label['posy']))
            {
                $this->Pdf->SetY($cell_Tele_label['posy']);
            }
            $this->Pdf->Cell($cell_Tele_label['width'], 0, $cell_Tele_label['data'], 0, 0, $cell_Tele_label['align']);

            $this->Pdf->SetFont($cell_Email['font_type'], $cell_Email['font_style'], $cell_Email['font_size']);
            $this->pdf_text_color($cell_Email['data'], $cell_Email['color_r'], $cell_Email['color_g'], $cell_Email['color_b']);
            if (!empty($cell_Email['posx']) && !empty($cell_Email['posy']))
            {
                $this->Pdf->SetXY($cell_Email['posx'], $cell_Email['posy']);
            }
            elseif (!empty($cell_Email['posx']))
            {
                $this->Pdf->SetX($cell_Email['posx']);
            }
            elseif (!empty($cell_Email['posy']))
            {
                $this->Pdf->SetY($cell_Email['posy']);
            }
            $this->Pdf->Cell($cell_Email['width'], 0, $cell_Email['data'], 0, 0, $cell_Email['align']);

            $this->Pdf->SetFont($cell_InscEst['font_type'], $cell_InscEst['font_style'], $cell_InscEst['font_size']);
            $this->pdf_text_color($cell_InscEst['data'], $cell_InscEst['color_r'], $cell_InscEst['color_g'], $cell_InscEst['color_b']);
            if (!empty($cell_InscEst['posx']) && !empty($cell_InscEst['posy']))
            {
                $this->Pdf->SetXY($cell_InscEst['posx'], $cell_InscEst['posy']);
            }
            elseif (!empty($cell_InscEst['posx']))
            {
                $this->Pdf->SetX($cell_InscEst['posx']);
            }
            elseif (!empty($cell_InscEst['posy']))
            {
                $this->Pdf->SetY($cell_InscEst['posy']);
            }
            $this->Pdf->Cell($cell_InscEst['width'], 0, $cell_InscEst['data'], 0, 0, $cell_InscEst['align']);

            $this->Pdf->SetFont($cell_uF_LABEL['font_type'], $cell_uF_LABEL['font_style'], $cell_uF_LABEL['font_size']);
            $this->pdf_text_color($cell_uF_LABEL['data'], $cell_uF_LABEL['color_r'], $cell_uF_LABEL['color_g'], $cell_uF_LABEL['color_b']);
            if (!empty($cell_uF_LABEL['posx']) && !empty($cell_uF_LABEL['posy']))
            {
                $this->Pdf->SetXY($cell_uF_LABEL['posx'], $cell_uF_LABEL['posy']);
            }
            elseif (!empty($cell_uF_LABEL['posx']))
            {
                $this->Pdf->SetX($cell_uF_LABEL['posx']);
            }
            elseif (!empty($cell_uF_LABEL['posy']))
            {
                $this->Pdf->SetY($cell_uF_LABEL['posy']);
            }
            $this->Pdf->Cell($cell_uF_LABEL['width'], 0, $cell_uF_LABEL['data'], 0, 0, $cell_uF_LABEL['align']);

            $this->Pdf->SetFont($cell_consultor_label['font_type'], $cell_consultor_label['font_style'], $cell_consultor_label['font_size']);
            $this->pdf_text_color($cell_consultor_label['data'], $cell_consultor_label['color_r'], $cell_consultor_label['color_g'], $cell_consultor_label['color_b']);
            if (!empty($cell_consultor_label['posx']) && !empty($cell_consultor_label['posy']))
            {
                $this->Pdf->SetXY($cell_consultor_label['posx'], $cell_consultor_label['posy']);
            }
            elseif (!empty($cell_consultor_label['posx']))
            {
                $this->Pdf->SetX($cell_consultor_label['posx']);
            }
            elseif (!empty($cell_consultor_label['posy']))
            {
                $this->Pdf->SetY($cell_consultor_label['posy']);
            }
            $this->Pdf->Cell($cell_consultor_label['width'], 0, $cell_consultor_label['data'], 0, 0, $cell_consultor_label['align']);

            $this->Pdf->SetFont($cell_consultor_email_label['font_type'], $cell_consultor_email_label['font_style'], $cell_consultor_email_label['font_size']);
            $this->pdf_text_color($cell_consultor_email_label['data'], $cell_consultor_email_label['color_r'], $cell_consultor_email_label['color_g'], $cell_consultor_email_label['color_b']);
            if (!empty($cell_consultor_email_label['posx']) && !empty($cell_consultor_email_label['posy']))
            {
                $this->Pdf->SetXY($cell_consultor_email_label['posx'], $cell_consultor_email_label['posy']);
            }
            elseif (!empty($cell_consultor_email_label['posx']))
            {
                $this->Pdf->SetX($cell_consultor_email_label['posx']);
            }
            elseif (!empty($cell_consultor_email_label['posy']))
            {
                $this->Pdf->SetY($cell_consultor_email_label['posy']);
            }
            $this->Pdf->Cell($cell_consultor_email_label['width'], 0, $cell_consultor_email_label['data'], 0, 0, $cell_consultor_email_label['align']);

            $this->Pdf->SetFont($cell_consultor_tel_label['font_type'], $cell_consultor_tel_label['font_style'], $cell_consultor_tel_label['font_size']);
            $this->pdf_text_color($cell_consultor_tel_label['data'], $cell_consultor_tel_label['color_r'], $cell_consultor_tel_label['color_g'], $cell_consultor_tel_label['color_b']);
            if (!empty($cell_consultor_tel_label['posx']) && !empty($cell_consultor_tel_label['posy']))
            {
                $this->Pdf->SetXY($cell_consultor_tel_label['posx'], $cell_consultor_tel_label['posy']);
            }
            elseif (!empty($cell_consultor_tel_label['posx']))
            {
                $this->Pdf->SetX($cell_consultor_tel_label['posx']);
            }
            elseif (!empty($cell_consultor_tel_label['posy']))
            {
                $this->Pdf->SetY($cell_consultor_tel_label['posy']);
            }
            $this->Pdf->Cell($cell_consultor_tel_label['width'], 0, $cell_consultor_tel_label['data'], 0, 0, $cell_consultor_tel_label['align']);

            $this->Pdf->SetFont($cell_Consultor_telefone['font_type'], $cell_Consultor_telefone['font_style'], $cell_Consultor_telefone['font_size']);
            $this->pdf_text_color($cell_Consultor_telefone['data'], $cell_Consultor_telefone['color_r'], $cell_Consultor_telefone['color_g'], $cell_Consultor_telefone['color_b']);
            if (!empty($cell_Consultor_telefone['posx']) && !empty($cell_Consultor_telefone['posy']))
            {
                $this->Pdf->SetXY($cell_Consultor_telefone['posx'], $cell_Consultor_telefone['posy']);
            }
            elseif (!empty($cell_Consultor_telefone['posx']))
            {
                $this->Pdf->SetX($cell_Consultor_telefone['posx']);
            }
            elseif (!empty($cell_Consultor_telefone['posy']))
            {
                $this->Pdf->SetY($cell_Consultor_telefone['posy']);
            }
            $this->Pdf->Cell($cell_Consultor_telefone['width'], 0, $cell_Consultor_telefone['data'], 0, 0, $cell_Consultor_telefone['align']);

            $this->Pdf->SetFont($cell_data_label['font_type'], $cell_data_label['font_style'], $cell_data_label['font_size']);
            $this->pdf_text_color($cell_data_label['data'], $cell_data_label['color_r'], $cell_data_label['color_g'], $cell_data_label['color_b']);
            if (!empty($cell_data_label['posx']) && !empty($cell_data_label['posy']))
            {
                $this->Pdf->SetXY($cell_data_label['posx'], $cell_data_label['posy']);
            }
            elseif (!empty($cell_data_label['posx']))
            {
                $this->Pdf->SetX($cell_data_label['posx']);
            }
            elseif (!empty($cell_data_label['posy']))
            {
                $this->Pdf->SetY($cell_data_label['posy']);
            }
            $this->Pdf->Cell($cell_data_label['width'], 0, $cell_data_label['data'], 0, 0, $cell_data_label['align']);

            $this->Pdf->SetFont($cell_proposta_data['font_type'], $cell_proposta_data['font_style'], $cell_proposta_data['font_size']);
            $this->pdf_text_color($cell_proposta_data['data'], $cell_proposta_data['color_r'], $cell_proposta_data['color_g'], $cell_proposta_data['color_b']);
            if (!empty($cell_proposta_data['posx']) && !empty($cell_proposta_data['posy']))
            {
                $this->Pdf->SetXY($cell_proposta_data['posx'], $cell_proposta_data['posy']);
            }
            elseif (!empty($cell_proposta_data['posx']))
            {
                $this->Pdf->SetX($cell_proposta_data['posx']);
            }
            elseif (!empty($cell_proposta_data['posy']))
            {
                $this->Pdf->SetY($cell_proposta_data['posy']);
            }
            $this->Pdf->Cell($cell_proposta_data['width'], 0, $cell_proposta_data['data'], 0, 0, $cell_proposta_data['align']);

            $this->Pdf->SetFont($cell_Total_label['font_type'], $cell_Total_label['font_style'], $cell_Total_label['font_size']);
            $this->pdf_text_color($cell_Total_label['data'], $cell_Total_label['color_r'], $cell_Total_label['color_g'], $cell_Total_label['color_b']);
            if (!empty($cell_Total_label['posx']) && !empty($cell_Total_label['posy']))
            {
                $this->Pdf->SetXY($cell_Total_label['posx'], $cell_Total_label['posy']);
            }
            elseif (!empty($cell_Total_label['posx']))
            {
                $this->Pdf->SetX($cell_Total_label['posx']);
            }
            elseif (!empty($cell_Total_label['posy']))
            {
                $this->Pdf->SetY($cell_Total_label['posy']);
            }
            $this->Pdf->Cell($cell_Total_label['width'], 0, $cell_Total_label['data'], 0, 0, $cell_Total_label['align']);

            $this->Pdf->SetFont($cell_Consult_Email['font_type'], $cell_Consult_Email['font_style'], $cell_Consult_Email['font_size']);
            $this->pdf_text_color($cell_Consult_Email['data'], $cell_Consult_Email['color_r'], $cell_Consult_Email['color_g'], $cell_Consult_Email['color_b']);
            if (!empty($cell_Consult_Email['posx']) && !empty($cell_Consult_Email['posy']))
            {
                $this->Pdf->SetXY($cell_Consult_Email['posx'], $cell_Consult_Email['posy']);
            }
            elseif (!empty($cell_Consult_Email['posx']))
            {
                $this->Pdf->SetX($cell_Consult_Email['posx']);
            }
            elseif (!empty($cell_Consult_Email['posy']))
            {
                $this->Pdf->SetY($cell_Consult_Email['posy']);
            }
            $this->Pdf->Cell($cell_Consult_Email['width'], 0, $cell_Consult_Email['data'], 0, 0, $cell_Consult_Email['align']);

            $this->Pdf->SetFont($MODELO['font_type'], $MODELO['font_style'], $MODELO['font_size']);
            $this->pdf_text_color($MODELO['data'], $MODELO['color_r'], $MODELO['color_g'], $MODELO['color_b']);
            if (!empty($MODELO['posx']) && !empty($MODELO['posy']))
            {
                $this->Pdf->SetXY($MODELO['posx'], $MODELO['posy']);
            }
            elseif (!empty($MODELO['posx']))
            {
                $this->Pdf->SetX($MODELO['posx']);
            }
            elseif (!empty($MODELO['posy']))
            {
                $this->Pdf->SetY($MODELO['posy']);
            }
            $this->Pdf->Cell($MODELO['width'], 0, $MODELO['data'], 0, 0, $MODELO['align']);

            $this->Pdf->SetFont($DESCRICAO['font_type'], $DESCRICAO['font_style'], $DESCRICAO['font_size']);
            $this->pdf_text_color($DESCRICAO['data'], $DESCRICAO['color_r'], $DESCRICAO['color_g'], $DESCRICAO['color_b']);
            if (!empty($DESCRICAO['posx']) && !empty($DESCRICAO['posy']))
            {
                $this->Pdf->SetXY($DESCRICAO['posx'], $DESCRICAO['posy']);
            }
            elseif (!empty($DESCRICAO['posx']))
            {
                $this->Pdf->SetX($DESCRICAO['posx']);
            }
            elseif (!empty($DESCRICAO['posy']))
            {
                $this->Pdf->SetY($DESCRICAO['posy']);
            }
            $this->Pdf->Cell($DESCRICAO['width'], 0, $DESCRICAO['data'], 0, 0, $DESCRICAO['align']);

            $this->Pdf->SetFont($QTD['font_type'], $QTD['font_style'], $QTD['font_size']);
            $this->pdf_text_color($QTD['data'], $QTD['color_r'], $QTD['color_g'], $QTD['color_b']);
            if (!empty($QTD['posx']) && !empty($QTD['posy']))
            {
                $this->Pdf->SetXY($QTD['posx'], $QTD['posy']);
            }
            elseif (!empty($QTD['posx']))
            {
                $this->Pdf->SetX($QTD['posx']);
            }
            elseif (!empty($QTD['posy']))
            {
                $this->Pdf->SetY($QTD['posy']);
            }
            $this->Pdf->Cell($QTD['width'], 0, $QTD['data'], 0, 0, $QTD['align']);

            $this->Pdf->SetFont($SUBTOTAL['font_type'], $SUBTOTAL['font_style'], $SUBTOTAL['font_size']);
            $this->pdf_text_color($SUBTOTAL['data'], $SUBTOTAL['color_r'], $SUBTOTAL['color_g'], $SUBTOTAL['color_b']);
            if (!empty($SUBTOTAL['posx']) && !empty($SUBTOTAL['posy']))
            {
                $this->Pdf->SetXY($SUBTOTAL['posx'], $SUBTOTAL['posy']);
            }
            elseif (!empty($SUBTOTAL['posx']))
            {
                $this->Pdf->SetX($SUBTOTAL['posx']);
            }
            elseif (!empty($SUBTOTAL['posy']))
            {
                $this->Pdf->SetY($SUBTOTAL['posy']);
            }
            $this->Pdf->Cell($SUBTOTAL['width'], 0, $SUBTOTAL['data'], 0, 0, $SUBTOTAL['align']);

            $this->Pdf->SetY(88.43697916665552);
            foreach ($this->itensproposta[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_ItensProposta_modelo['font_type'], $cell_ItensProposta_modelo['font_style'], $cell_ItensProposta_modelo['font_size']);
                if (!empty($cell_ItensProposta_modelo['posx']))
                {
                    $this->Pdf->SetX($cell_ItensProposta_modelo['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_ItensProposta_modelo['color_r'], $cell_ItensProposta_modelo['color_g'], $cell_ItensProposta_modelo['color_b']);
                $this->Pdf->writeHTMLCell($cell_ItensProposta_modelo['width'], 0, $atu_X, $atu_Y, $this->itensproposta_modelo[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_ItensProposta_modelo['align']);
                $this->Pdf->SetY($atu_Y);

                $this->Pdf->SetFont($cell_ItensProposta_descricao['font_type'], $cell_ItensProposta_descricao['font_style'], $cell_ItensProposta_descricao['font_size']);
                if (!empty($cell_ItensProposta_descricao['posx']))
                {
                    $this->Pdf->SetX($cell_ItensProposta_descricao['posx']);
                }
                $NM_partes_val = explode("<br>", $this->itensproposta_descricao[$this->nm_grid_colunas][$NM_ind]);
                $PosX = $this->Pdf->GetX();
                $Incre = false;
                $sv_Y  = $this->Pdf->GetY();
                $tmp_Y = $sv_Y;
                if (!isset($max_Y) || empty($max_Y))
                {
                    $max_Y = $sv_Y;
                }
                foreach ($NM_partes_val as $Lines)
                {
                    if ($Incre)
                    {
                        $this->Pdf->Ln(2.8222222222222);
                        $tmp_Y += 2.8222222222222;
                        $max_Y = ($tmp_Y > $max_Y) ? $tmp_Y : $max_Y;
                    }
                    $this->Pdf->SetX($PosX);
                    $atu_X = $this->Pdf->GetX();
                    $atu_Y = $this->Pdf->GetY();
                    $this->Pdf->SetTextColor($cell_ItensProposta_descricao['color_r'], $cell_ItensProposta_descricao['color_g'], $cell_ItensProposta_descricao['color_b']);
                    $this->Pdf->writeHTMLCell($cell_ItensProposta_descricao['width'], 0, $atu_X, $atu_Y, trim($Lines), 0, 0, false, true, $cell_ItensProposta_descricao['align']);
                    $this->Pdf->SetY($atu_Y);
                    $Incre = true;
                }
                $this->Pdf->SetY($sv_Y);
                $this->Pdf->SetFont($cell_ItensProposta_qty['font_type'], $cell_ItensProposta_qty['font_style'], $cell_ItensProposta_qty['font_size']);
                if (!empty($cell_ItensProposta_qty['posx']))
                {
                    $this->Pdf->SetX($cell_ItensProposta_qty['posx']);
                }
                $this->pdf_text_color($this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind], $cell_ItensProposta_qty['color_r'], $cell_ItensProposta_qty['color_g'], $cell_ItensProposta_qty['color_b']);
                $this->Pdf->Cell($cell_ItensProposta_qty['width'], 0, $this->itensproposta_qty[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_ItensProposta_qty['align']);
                $this->Pdf->SetFont($cell_ItensProposta_SubTotal['font_type'], $cell_ItensProposta_SubTotal['font_style'], $cell_ItensProposta_SubTotal['font_size']);
                if (!empty($cell_ItensProposta_SubTotal['posx']))
                {
                    $this->Pdf->SetX($cell_ItensProposta_SubTotal['posx']);
                }
                $this->pdf_text_color($this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind], $cell_ItensProposta_SubTotal['color_r'], $cell_ItensProposta_SubTotal['color_g'], $cell_ItensProposta_SubTotal['color_b']);
                $this->Pdf->Cell($cell_ItensProposta_SubTotal['width'], 0, $this->itensproposta_subtotal[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_ItensProposta_SubTotal['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 12;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_CNPJ_CLIENTE['font_type'], $cell_CNPJ_CLIENTE['font_style'], $cell_CNPJ_CLIENTE['font_size']);
            $this->pdf_text_color($cell_CNPJ_CLIENTE['data'], $cell_CNPJ_CLIENTE['color_r'], $cell_CNPJ_CLIENTE['color_g'], $cell_CNPJ_CLIENTE['color_b']);
            if (!empty($cell_CNPJ_CLIENTE['posx']) && !empty($cell_CNPJ_CLIENTE['posy']))
            {
                $this->Pdf->SetXY($cell_CNPJ_CLIENTE['posx'], $cell_CNPJ_CLIENTE['posy']);
            }
            elseif (!empty($cell_CNPJ_CLIENTE['posx']))
            {
                $this->Pdf->SetX($cell_CNPJ_CLIENTE['posx']);
            }
            elseif (!empty($cell_CNPJ_CLIENTE['posy']))
            {
                $this->Pdf->SetY($cell_CNPJ_CLIENTE['posy']);
            }
            $this->Pdf->Cell($cell_CNPJ_CLIENTE['width'], 0, $cell_CNPJ_CLIENTE['data'], 0, 0, $cell_CNPJ_CLIENTE['align']);

            $this->Pdf->SetFont($cell_CEP_LABEL['font_type'], $cell_CEP_LABEL['font_style'], $cell_CEP_LABEL['font_size']);
            $this->pdf_text_color($cell_CEP_LABEL['data'], $cell_CEP_LABEL['color_r'], $cell_CEP_LABEL['color_g'], $cell_CEP_LABEL['color_b']);
            if (!empty($cell_CEP_LABEL['posx']) && !empty($cell_CEP_LABEL['posy']))
            {
                $this->Pdf->SetXY($cell_CEP_LABEL['posx'], $cell_CEP_LABEL['posy']);
            }
            elseif (!empty($cell_CEP_LABEL['posx']))
            {
                $this->Pdf->SetX($cell_CEP_LABEL['posx']);
            }
            elseif (!empty($cell_CEP_LABEL['posy']))
            {
                $this->Pdf->SetY($cell_CEP_LABEL['posy']);
            }
            $this->Pdf->Cell($cell_CEP_LABEL['width'], 0, $cell_CEP_LABEL['data'], 0, 0, $cell_CEP_LABEL['align']);

            $this->Pdf->SetFont($cell_CEP['font_type'], $cell_CEP['font_style'], $cell_CEP['font_size']);
            $this->pdf_text_color($cell_CEP['data'], $cell_CEP['color_r'], $cell_CEP['color_g'], $cell_CEP['color_b']);
            if (!empty($cell_CEP['posx']) && !empty($cell_CEP['posy']))
            {
                $this->Pdf->SetXY($cell_CEP['posx'], $cell_CEP['posy']);
            }
            elseif (!empty($cell_CEP['posx']))
            {
                $this->Pdf->SetX($cell_CEP['posx']);
            }
            elseif (!empty($cell_CEP['posy']))
            {
                $this->Pdf->SetY($cell_CEP['posy']);
            }
            $this->Pdf->Cell($cell_CEP['width'], 0, $cell_CEP['data'], 0, 0, $cell_CEP['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->nm_path_pdf, 'D');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     if (is_array($val)) {
         $val = "";
     }
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
 }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($tam_campo >= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}
?>
