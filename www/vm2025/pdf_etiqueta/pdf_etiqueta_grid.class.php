<?php
class pdf_etiqueta_grid
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
   var $empresa_empresa = array();
   var $empresa_contato = array();
   var $empresa_endereco = array();
   var $cidade_cidade = array();
   var $cidade_uf = array();
   var $empresa_cep = array();
   var $empresa_telefone = array();
   var $empresa_cnpj_cpf = array();
   var $empresa_inscest = array();
   var $empresa_inscmun = array();
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
   $this->default_font = '';
   $this->default_font_sr  = '';
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
   $_SESSION['scriptcase']['pdf_etiqueta']['default_font'] = $this->default_font;
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
           if (in_array("pdf_etiqueta", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "off";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->empresa_empresa[0] = (isset($Busca_temp['empresa_empresa'])) ? $Busca_temp['empresa_empresa'] : ""; 
       $tmp_pos = (is_string($this->empresa_empresa[0])) ? strpos($this->empresa_empresa[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_empresa[0]))
       {
           $this->empresa_empresa[0] = substr($this->empresa_empresa[0], 0, $tmp_pos);
       }
       $this->empresa_contato[0] = (isset($Busca_temp['empresa_contato'])) ? $Busca_temp['empresa_contato'] : ""; 
       $tmp_pos = (is_string($this->empresa_contato[0])) ? strpos($this->empresa_contato[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_contato[0]))
       {
           $this->empresa_contato[0] = substr($this->empresa_contato[0], 0, $tmp_pos);
       }
       $this->empresa_endereco[0] = (isset($Busca_temp['empresa_endereco'])) ? $Busca_temp['empresa_endereco'] : ""; 
       $tmp_pos = (is_string($this->empresa_endereco[0])) ? strpos($this->empresa_endereco[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_endereco[0]))
       {
           $this->empresa_endereco[0] = substr($this->empresa_endereco[0], 0, $tmp_pos);
       }
       $this->cidade_cidade[0] = (isset($Busca_temp['cidade_cidade'])) ? $Busca_temp['cidade_cidade'] : ""; 
       $tmp_pos = (is_string($this->cidade_cidade[0])) ? strpos($this->cidade_cidade[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->cidade_cidade[0]))
       {
           $this->cidade_cidade[0] = substr($this->cidade_cidade[0], 0, $tmp_pos);
       }
       $this->cidade_uf[0] = (isset($Busca_temp['cidade_uf'])) ? $Busca_temp['cidade_uf'] : ""; 
       $tmp_pos = (is_string($this->cidade_uf[0])) ? strpos($this->cidade_uf[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->cidade_uf[0]))
       {
           $this->cidade_uf[0] = substr($this->cidade_uf[0], 0, $tmp_pos);
       }
       $this->empresa_cep[0] = (isset($Busca_temp['empresa_cep'])) ? $Busca_temp['empresa_cep'] : ""; 
       $tmp_pos = (is_string($this->empresa_cep[0])) ? strpos($this->empresa_cep[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_cep[0]))
       {
           $this->empresa_cep[0] = substr($this->empresa_cep[0], 0, $tmp_pos);
       }
       $this->empresa_telefone[0] = (isset($Busca_temp['empresa_telefone'])) ? $Busca_temp['empresa_telefone'] : ""; 
       $tmp_pos = (is_string($this->empresa_telefone[0])) ? strpos($this->empresa_telefone[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_telefone[0]))
       {
           $this->empresa_telefone[0] = substr($this->empresa_telefone[0], 0, $tmp_pos);
       }
       $this->empresa_cnpj_cpf[0] = (isset($Busca_temp['empresa_cnpj_cpf'])) ? $Busca_temp['empresa_cnpj_cpf'] : ""; 
       $tmp_pos = (is_string($this->empresa_cnpj_cpf[0])) ? strpos($this->empresa_cnpj_cpf[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_cnpj_cpf[0]))
       {
           $this->empresa_cnpj_cpf[0] = substr($this->empresa_cnpj_cpf[0], 0, $tmp_pos);
       }
       $this->empresa_inscest[0] = (isset($Busca_temp['empresa_inscest'])) ? $Busca_temp['empresa_inscest'] : ""; 
       $tmp_pos = (is_string($this->empresa_inscest[0])) ? strpos($this->empresa_inscest[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_inscest[0]))
       {
           $this->empresa_inscest[0] = substr($this->empresa_inscest[0], 0, $tmp_pos);
       }
       $this->empresa_inscmun[0] = (isset($Busca_temp['empresa_inscmun'])) ? $Busca_temp['empresa_inscmun'] : ""; 
       $tmp_pos = (is_string($this->empresa_inscmun[0])) ? strpos($this->empresa_inscmun[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa_inscmun[0]))
       {
           $this->empresa_inscmun[0] = substr($this->empresa_inscmun[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdf_etiqueta']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdf_etiqueta']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdf_etiqueta']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdf_etiqueta']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_select'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_select']['empresa.ID'] = 'asc'; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_ant']  = "empresa.ID"; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_orig'] = " where (empresa.ID=" . $_SESSION['id'] . ")";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT empresa.EMPRESA as empresa_empresa, empresa.CONTATO as empresa_contato, empresa.ENDERECO as empresa_endereco, cidade.cidade as cidade_cidade, cidade.uf as cidade_uf, empresa.CEP as empresa_cep, empresa.TELEFONE as empresa_telefone, empresa.CNPJ_CPF as empresa_cnpj_cpf, empresa.INSCEST as empresa_inscest, empresa.INSCMUN as empresa_inscmun from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT empresa.EMPRESA as empresa_empresa, empresa.CONTATO as empresa_contato, empresa.ENDERECO as empresa_endereco, cidade.cidade as cidade_cidade, cidade.uf as cidade_uf, empresa.CEP as empresa_cep, empresa.TELEFONE as empresa_telefone, empresa.CNPJ_CPF as empresa_cnpj_cpf, empresa.INSCEST as empresa_inscest, empresa.INSCMUN as empresa_inscmun from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__img__NM__logo-videomart-2017-2-300x51.png", "75,000000", "190,000000", "0", "0", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdf_etiqueta']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdf_etiqueta']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdf_etiqueta']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(0,000000, 0,000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
   $this->Pdf->Output('EtiquetaEmpresa.pdf', 'D');
       $this->grid_saida_html();
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->empresa_empresa[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->empresa_contato[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->empresa_endereco[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->cidade_cidade[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->cidade_uf[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->empresa_cep[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->empresa_telefone[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->empresa_cnpj_cpf[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->empresa_inscest[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->empresa_inscmun[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_empresa[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_empresa[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_empresa[$this->nm_grid_colunas] = sc_strip_script($this->empresa_empresa[$this->nm_grid_colunas]);
          }
          if ($this->empresa_empresa[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_empresa[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_empresa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_empresa[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_contato[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_contato[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_contato[$this->nm_grid_colunas] = sc_strip_script($this->empresa_contato[$this->nm_grid_colunas]);
          }
          if ($this->empresa_contato[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_contato[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_contato[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_contato[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_telefone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_telefone[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_telefone[$this->nm_grid_colunas] = sc_strip_script($this->empresa_telefone[$this->nm_grid_colunas]);
          }
          if ($this->empresa_telefone[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_telefone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_telefone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_telefone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_etiqueta']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa_inscmun[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa_inscmun[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa_inscmun[$this->nm_grid_colunas] = sc_strip_script($this->empresa_inscmun[$this->nm_grid_colunas]);
          }
          if ($this->empresa_inscmun[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa_inscmun[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa_inscmun[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa_inscmun[$this->nm_grid_colunas]);
            $Destino = array('posx' => '10', 'posy' => '17.61683145833111', 'data' => $this->SC_conv_utf8('Destinatário:'), 'width'      => '0', 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'BU');
            $empresa = array('posx' => '10', 'posy' => '30', 'data' => $this->SC_conv_utf8('Empresa:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Endereco = array('posx' => '10', 'posy' => '40', 'data' => $this->SC_conv_utf8('Endereço:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Cidade = array('posx' => '10', 'posy' => '50', 'data' => $this->SC_conv_utf8('Cidade:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Uf = array('posx' => '100', 'posy' => '50', 'data' => $this->SC_conv_utf8('Uf:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Cep = array('posx' => '150', 'posy' => '50', 'data' => $this->SC_conv_utf8('Cep:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Atencao = array('posx' => '10', 'posy' => '60', 'data' => $this->SC_conv_utf8('Atenção:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Cgc = array('posx' => '10', 'posy' => '70', 'data' => $this->SC_conv_utf8('CNPJ:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $InscEst = array('posx' => '100', 'posy' => '70', 'data' => $this->SC_conv_utf8('Insc.Est:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Telefone = array('posx' => '10', 'posy' => '80', 'data' => $this->SC_conv_utf8('Telefone:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa_EMPRESA = array('posx' => '30', 'posy' => '30', 'data' => $this->empresa_empresa[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa_CONTATO = array('posx' => '30', 'posy' => '60', 'data' => $this->empresa_contato[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa_ENDERECO = array('posx' => '30', 'posy' => '40', 'data' => $this->empresa_endereco[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cidade_cidade = array('posx' => '30', 'posy' => '50', 'data' => $this->cidade_cidade[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cidade_uf = array('posx' => '108', 'posy' => '50', 'data' => $this->cidade_uf[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa_CEP = array('posx' => '160', 'posy' => '50', 'data' => $this->empresa_cep[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa_TELEFONE = array('posx' => '30', 'posy' => '80', 'data' => $this->empresa_telefone[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Remetente = array('posx' => '10', 'posy' => '138.14768958331592', 'data' => $this->SC_conv_utf8('Remetente:'), 'width'      => '0', 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'BU');
            $cell_remEmpresa = array('posx' => '10', 'posy' => '150', 'data' => $this->SC_conv_utf8('Empresa:    VIDEOMART BROADCAST LTDA.'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_remEnd = array('posx' => '10', 'posy' => '160', 'data' => $this->SC_conv_utf8('Endereço:   R. José Augusto Rodrigues, 174'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_remCidade = array('posx' => '10', 'posy' => '170', 'data' => $this->SC_conv_utf8('Cidade:   RIO DE JANEIRO   - RJ  Cep: 22790-701'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_remCGC = array('posx' => '10', 'posy' => '180', 'data' => $this->SC_conv_utf8('CNPJ:          49.679.195/0001-37'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_remInscEst = array('posx' => '10', 'posy' => '190', 'data' => $this->SC_conv_utf8('Insc. est:     85.528.637'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_remTel = array('posx' => '10', 'posy' => '200', 'data' => $this->SC_conv_utf8('Telefone:    21 2142-1300'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_remhpage = array('posx' => '10', 'posy' => '212.00189374997328', 'data' => $this->SC_conv_utf8('www.videomart.com.br'), 'width'      => '0', 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => '20', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');


            $this->Pdf->SetFont($Destino['font_type'], $Destino['font_style'], $Destino['font_size']);
            $this->pdf_text_color($Destino['data'], $Destino['color_r'], $Destino['color_g'], $Destino['color_b']);
            if (!empty($Destino['posx']) && !empty($Destino['posy']))
            {
                $this->Pdf->SetXY($Destino['posx'], $Destino['posy']);
            }
            elseif (!empty($Destino['posx']))
            {
                $this->Pdf->SetX($Destino['posx']);
            }
            elseif (!empty($Destino['posy']))
            {
                $this->Pdf->SetY($Destino['posy']);
            }
            $this->Pdf->Cell($Destino['width'], 0, $Destino['data'], 0, 0, $Destino['align']);

            $this->Pdf->SetFont($empresa['font_type'], $empresa['font_style'], $empresa['font_size']);
            $this->pdf_text_color($empresa['data'], $empresa['color_r'], $empresa['color_g'], $empresa['color_b']);
            if (!empty($empresa['posx']) && !empty($empresa['posy']))
            {
                $this->Pdf->SetXY($empresa['posx'], $empresa['posy']);
            }
            elseif (!empty($empresa['posx']))
            {
                $this->Pdf->SetX($empresa['posx']);
            }
            elseif (!empty($empresa['posy']))
            {
                $this->Pdf->SetY($empresa['posy']);
            }
            $this->Pdf->Cell($empresa['width'], 0, $empresa['data'], 0, 0, $empresa['align']);

            $this->Pdf->SetFont($Endereco['font_type'], $Endereco['font_style'], $Endereco['font_size']);
            $this->pdf_text_color($Endereco['data'], $Endereco['color_r'], $Endereco['color_g'], $Endereco['color_b']);
            if (!empty($Endereco['posx']) && !empty($Endereco['posy']))
            {
                $this->Pdf->SetXY($Endereco['posx'], $Endereco['posy']);
            }
            elseif (!empty($Endereco['posx']))
            {
                $this->Pdf->SetX($Endereco['posx']);
            }
            elseif (!empty($Endereco['posy']))
            {
                $this->Pdf->SetY($Endereco['posy']);
            }
            $this->Pdf->Cell($Endereco['width'], 0, $Endereco['data'], 0, 0, $Endereco['align']);

            $this->Pdf->SetFont($Cidade['font_type'], $Cidade['font_style'], $Cidade['font_size']);
            $this->pdf_text_color($Cidade['data'], $Cidade['color_r'], $Cidade['color_g'], $Cidade['color_b']);
            if (!empty($Cidade['posx']) && !empty($Cidade['posy']))
            {
                $this->Pdf->SetXY($Cidade['posx'], $Cidade['posy']);
            }
            elseif (!empty($Cidade['posx']))
            {
                $this->Pdf->SetX($Cidade['posx']);
            }
            elseif (!empty($Cidade['posy']))
            {
                $this->Pdf->SetY($Cidade['posy']);
            }
            $this->Pdf->Cell($Cidade['width'], 0, $Cidade['data'], 0, 0, $Cidade['align']);

            $this->Pdf->SetFont($Uf['font_type'], $Uf['font_style'], $Uf['font_size']);
            $this->pdf_text_color($Uf['data'], $Uf['color_r'], $Uf['color_g'], $Uf['color_b']);
            if (!empty($Uf['posx']) && !empty($Uf['posy']))
            {
                $this->Pdf->SetXY($Uf['posx'], $Uf['posy']);
            }
            elseif (!empty($Uf['posx']))
            {
                $this->Pdf->SetX($Uf['posx']);
            }
            elseif (!empty($Uf['posy']))
            {
                $this->Pdf->SetY($Uf['posy']);
            }
            $this->Pdf->Cell($Uf['width'], 0, $Uf['data'], 0, 0, $Uf['align']);

            $this->Pdf->SetFont($Cep['font_type'], $Cep['font_style'], $Cep['font_size']);
            $this->pdf_text_color($Cep['data'], $Cep['color_r'], $Cep['color_g'], $Cep['color_b']);
            if (!empty($Cep['posx']) && !empty($Cep['posy']))
            {
                $this->Pdf->SetXY($Cep['posx'], $Cep['posy']);
            }
            elseif (!empty($Cep['posx']))
            {
                $this->Pdf->SetX($Cep['posx']);
            }
            elseif (!empty($Cep['posy']))
            {
                $this->Pdf->SetY($Cep['posy']);
            }
            $this->Pdf->Cell($Cep['width'], 0, $Cep['data'], 0, 0, $Cep['align']);

            $this->Pdf->SetFont($Atencao['font_type'], $Atencao['font_style'], $Atencao['font_size']);
            $this->pdf_text_color($Atencao['data'], $Atencao['color_r'], $Atencao['color_g'], $Atencao['color_b']);
            if (!empty($Atencao['posx']) && !empty($Atencao['posy']))
            {
                $this->Pdf->SetXY($Atencao['posx'], $Atencao['posy']);
            }
            elseif (!empty($Atencao['posx']))
            {
                $this->Pdf->SetX($Atencao['posx']);
            }
            elseif (!empty($Atencao['posy']))
            {
                $this->Pdf->SetY($Atencao['posy']);
            }
            $this->Pdf->Cell($Atencao['width'], 0, $Atencao['data'], 0, 0, $Atencao['align']);

            $this->Pdf->SetFont($Cgc['font_type'], $Cgc['font_style'], $Cgc['font_size']);
            $this->pdf_text_color($Cgc['data'], $Cgc['color_r'], $Cgc['color_g'], $Cgc['color_b']);
            if (!empty($Cgc['posx']) && !empty($Cgc['posy']))
            {
                $this->Pdf->SetXY($Cgc['posx'], $Cgc['posy']);
            }
            elseif (!empty($Cgc['posx']))
            {
                $this->Pdf->SetX($Cgc['posx']);
            }
            elseif (!empty($Cgc['posy']))
            {
                $this->Pdf->SetY($Cgc['posy']);
            }
            $this->Pdf->Cell($Cgc['width'], 0, $Cgc['data'], 0, 0, $Cgc['align']);

            $this->Pdf->SetFont($InscEst['font_type'], $InscEst['font_style'], $InscEst['font_size']);
            $this->pdf_text_color($InscEst['data'], $InscEst['color_r'], $InscEst['color_g'], $InscEst['color_b']);
            if (!empty($InscEst['posx']) && !empty($InscEst['posy']))
            {
                $this->Pdf->SetXY($InscEst['posx'], $InscEst['posy']);
            }
            elseif (!empty($InscEst['posx']))
            {
                $this->Pdf->SetX($InscEst['posx']);
            }
            elseif (!empty($InscEst['posy']))
            {
                $this->Pdf->SetY($InscEst['posy']);
            }
            $this->Pdf->Cell($InscEst['width'], 0, $InscEst['data'], 0, 0, $InscEst['align']);

            $this->Pdf->SetFont($Telefone['font_type'], $Telefone['font_style'], $Telefone['font_size']);
            $this->pdf_text_color($Telefone['data'], $Telefone['color_r'], $Telefone['color_g'], $Telefone['color_b']);
            if (!empty($Telefone['posx']) && !empty($Telefone['posy']))
            {
                $this->Pdf->SetXY($Telefone['posx'], $Telefone['posy']);
            }
            elseif (!empty($Telefone['posx']))
            {
                $this->Pdf->SetX($Telefone['posx']);
            }
            elseif (!empty($Telefone['posy']))
            {
                $this->Pdf->SetY($Telefone['posy']);
            }
            $this->Pdf->Cell($Telefone['width'], 0, $Telefone['data'], 0, 0, $Telefone['align']);

            $this->Pdf->SetFont($cell_empresa_EMPRESA['font_type'], $cell_empresa_EMPRESA['font_style'], $cell_empresa_EMPRESA['font_size']);
            $this->pdf_text_color($cell_empresa_EMPRESA['data'], $cell_empresa_EMPRESA['color_r'], $cell_empresa_EMPRESA['color_g'], $cell_empresa_EMPRESA['color_b']);
            if (!empty($cell_empresa_EMPRESA['posx']) && !empty($cell_empresa_EMPRESA['posy']))
            {
                $this->Pdf->SetXY($cell_empresa_EMPRESA['posx'], $cell_empresa_EMPRESA['posy']);
            }
            elseif (!empty($cell_empresa_EMPRESA['posx']))
            {
                $this->Pdf->SetX($cell_empresa_EMPRESA['posx']);
            }
            elseif (!empty($cell_empresa_EMPRESA['posy']))
            {
                $this->Pdf->SetY($cell_empresa_EMPRESA['posy']);
            }
            $this->Pdf->Cell($cell_empresa_EMPRESA['width'], 0, $cell_empresa_EMPRESA['data'], 0, 0, $cell_empresa_EMPRESA['align']);

            $this->Pdf->SetFont($cell_empresa_CONTATO['font_type'], $cell_empresa_CONTATO['font_style'], $cell_empresa_CONTATO['font_size']);
            $this->pdf_text_color($cell_empresa_CONTATO['data'], $cell_empresa_CONTATO['color_r'], $cell_empresa_CONTATO['color_g'], $cell_empresa_CONTATO['color_b']);
            if (!empty($cell_empresa_CONTATO['posx']) && !empty($cell_empresa_CONTATO['posy']))
            {
                $this->Pdf->SetXY($cell_empresa_CONTATO['posx'], $cell_empresa_CONTATO['posy']);
            }
            elseif (!empty($cell_empresa_CONTATO['posx']))
            {
                $this->Pdf->SetX($cell_empresa_CONTATO['posx']);
            }
            elseif (!empty($cell_empresa_CONTATO['posy']))
            {
                $this->Pdf->SetY($cell_empresa_CONTATO['posy']);
            }
            $this->Pdf->Cell($cell_empresa_CONTATO['width'], 0, $cell_empresa_CONTATO['data'], 0, 0, $cell_empresa_CONTATO['align']);

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

            $this->Pdf->SetFont($cell_empresa_CEP['font_type'], $cell_empresa_CEP['font_style'], $cell_empresa_CEP['font_size']);
            $this->pdf_text_color($cell_empresa_CEP['data'], $cell_empresa_CEP['color_r'], $cell_empresa_CEP['color_g'], $cell_empresa_CEP['color_b']);
            if (!empty($cell_empresa_CEP['posx']) && !empty($cell_empresa_CEP['posy']))
            {
                $this->Pdf->SetXY($cell_empresa_CEP['posx'], $cell_empresa_CEP['posy']);
            }
            elseif (!empty($cell_empresa_CEP['posx']))
            {
                $this->Pdf->SetX($cell_empresa_CEP['posx']);
            }
            elseif (!empty($cell_empresa_CEP['posy']))
            {
                $this->Pdf->SetY($cell_empresa_CEP['posy']);
            }
            $this->Pdf->Cell($cell_empresa_CEP['width'], 0, $cell_empresa_CEP['data'], 0, 0, $cell_empresa_CEP['align']);

            $this->Pdf->SetFont($cell_empresa_TELEFONE['font_type'], $cell_empresa_TELEFONE['font_style'], $cell_empresa_TELEFONE['font_size']);
            $this->pdf_text_color($cell_empresa_TELEFONE['data'], $cell_empresa_TELEFONE['color_r'], $cell_empresa_TELEFONE['color_g'], $cell_empresa_TELEFONE['color_b']);
            if (!empty($cell_empresa_TELEFONE['posx']) && !empty($cell_empresa_TELEFONE['posy']))
            {
                $this->Pdf->SetXY($cell_empresa_TELEFONE['posx'], $cell_empresa_TELEFONE['posy']);
            }
            elseif (!empty($cell_empresa_TELEFONE['posx']))
            {
                $this->Pdf->SetX($cell_empresa_TELEFONE['posx']);
            }
            elseif (!empty($cell_empresa_TELEFONE['posy']))
            {
                $this->Pdf->SetY($cell_empresa_TELEFONE['posy']);
            }
            $this->Pdf->Cell($cell_empresa_TELEFONE['width'], 0, $cell_empresa_TELEFONE['data'], 0, 0, $cell_empresa_TELEFONE['align']);

            $this->Pdf->SetFont($Remetente['font_type'], $Remetente['font_style'], $Remetente['font_size']);
            $this->pdf_text_color($Remetente['data'], $Remetente['color_r'], $Remetente['color_g'], $Remetente['color_b']);
            if (!empty($Remetente['posx']) && !empty($Remetente['posy']))
            {
                $this->Pdf->SetXY($Remetente['posx'], $Remetente['posy']);
            }
            elseif (!empty($Remetente['posx']))
            {
                $this->Pdf->SetX($Remetente['posx']);
            }
            elseif (!empty($Remetente['posy']))
            {
                $this->Pdf->SetY($Remetente['posy']);
            }
            $this->Pdf->Cell($Remetente['width'], 0, $Remetente['data'], 0, 0, $Remetente['align']);

            $this->Pdf->SetFont($cell_remEmpresa['font_type'], $cell_remEmpresa['font_style'], $cell_remEmpresa['font_size']);
            $this->pdf_text_color($cell_remEmpresa['data'], $cell_remEmpresa['color_r'], $cell_remEmpresa['color_g'], $cell_remEmpresa['color_b']);
            if (!empty($cell_remEmpresa['posx']) && !empty($cell_remEmpresa['posy']))
            {
                $this->Pdf->SetXY($cell_remEmpresa['posx'], $cell_remEmpresa['posy']);
            }
            elseif (!empty($cell_remEmpresa['posx']))
            {
                $this->Pdf->SetX($cell_remEmpresa['posx']);
            }
            elseif (!empty($cell_remEmpresa['posy']))
            {
                $this->Pdf->SetY($cell_remEmpresa['posy']);
            }
            $this->Pdf->Cell($cell_remEmpresa['width'], 0, $cell_remEmpresa['data'], 0, 0, $cell_remEmpresa['align']);

            $this->Pdf->SetFont($cell_remEnd['font_type'], $cell_remEnd['font_style'], $cell_remEnd['font_size']);
            $this->pdf_text_color($cell_remEnd['data'], $cell_remEnd['color_r'], $cell_remEnd['color_g'], $cell_remEnd['color_b']);
            if (!empty($cell_remEnd['posx']) && !empty($cell_remEnd['posy']))
            {
                $this->Pdf->SetXY($cell_remEnd['posx'], $cell_remEnd['posy']);
            }
            elseif (!empty($cell_remEnd['posx']))
            {
                $this->Pdf->SetX($cell_remEnd['posx']);
            }
            elseif (!empty($cell_remEnd['posy']))
            {
                $this->Pdf->SetY($cell_remEnd['posy']);
            }
            $this->Pdf->Cell($cell_remEnd['width'], 0, $cell_remEnd['data'], 0, 0, $cell_remEnd['align']);

            $this->Pdf->SetFont($cell_remCidade['font_type'], $cell_remCidade['font_style'], $cell_remCidade['font_size']);
            $this->pdf_text_color($cell_remCidade['data'], $cell_remCidade['color_r'], $cell_remCidade['color_g'], $cell_remCidade['color_b']);
            if (!empty($cell_remCidade['posx']) && !empty($cell_remCidade['posy']))
            {
                $this->Pdf->SetXY($cell_remCidade['posx'], $cell_remCidade['posy']);
            }
            elseif (!empty($cell_remCidade['posx']))
            {
                $this->Pdf->SetX($cell_remCidade['posx']);
            }
            elseif (!empty($cell_remCidade['posy']))
            {
                $this->Pdf->SetY($cell_remCidade['posy']);
            }
            $this->Pdf->Cell($cell_remCidade['width'], 0, $cell_remCidade['data'], 0, 0, $cell_remCidade['align']);

            $this->Pdf->SetFont($cell_remCGC['font_type'], $cell_remCGC['font_style'], $cell_remCGC['font_size']);
            $this->pdf_text_color($cell_remCGC['data'], $cell_remCGC['color_r'], $cell_remCGC['color_g'], $cell_remCGC['color_b']);
            if (!empty($cell_remCGC['posx']) && !empty($cell_remCGC['posy']))
            {
                $this->Pdf->SetXY($cell_remCGC['posx'], $cell_remCGC['posy']);
            }
            elseif (!empty($cell_remCGC['posx']))
            {
                $this->Pdf->SetX($cell_remCGC['posx']);
            }
            elseif (!empty($cell_remCGC['posy']))
            {
                $this->Pdf->SetY($cell_remCGC['posy']);
            }
            $this->Pdf->Cell($cell_remCGC['width'], 0, $cell_remCGC['data'], 0, 0, $cell_remCGC['align']);

            $this->Pdf->SetFont($cell_remInscEst['font_type'], $cell_remInscEst['font_style'], $cell_remInscEst['font_size']);
            $this->pdf_text_color($cell_remInscEst['data'], $cell_remInscEst['color_r'], $cell_remInscEst['color_g'], $cell_remInscEst['color_b']);
            if (!empty($cell_remInscEst['posx']) && !empty($cell_remInscEst['posy']))
            {
                $this->Pdf->SetXY($cell_remInscEst['posx'], $cell_remInscEst['posy']);
            }
            elseif (!empty($cell_remInscEst['posx']))
            {
                $this->Pdf->SetX($cell_remInscEst['posx']);
            }
            elseif (!empty($cell_remInscEst['posy']))
            {
                $this->Pdf->SetY($cell_remInscEst['posy']);
            }
            $this->Pdf->Cell($cell_remInscEst['width'], 0, $cell_remInscEst['data'], 0, 0, $cell_remInscEst['align']);

            $this->Pdf->SetFont($cell_remTel['font_type'], $cell_remTel['font_style'], $cell_remTel['font_size']);
            $this->pdf_text_color($cell_remTel['data'], $cell_remTel['color_r'], $cell_remTel['color_g'], $cell_remTel['color_b']);
            if (!empty($cell_remTel['posx']) && !empty($cell_remTel['posy']))
            {
                $this->Pdf->SetXY($cell_remTel['posx'], $cell_remTel['posy']);
            }
            elseif (!empty($cell_remTel['posx']))
            {
                $this->Pdf->SetX($cell_remTel['posx']);
            }
            elseif (!empty($cell_remTel['posy']))
            {
                $this->Pdf->SetY($cell_remTel['posy']);
            }
            $this->Pdf->Cell($cell_remTel['width'], 0, $cell_remTel['data'], 0, 0, $cell_remTel['align']);

            $this->Pdf->SetFont($cell_remhpage['font_type'], $cell_remhpage['font_style'], $cell_remhpage['font_size']);
            $this->pdf_text_color($cell_remhpage['data'], $cell_remhpage['color_r'], $cell_remhpage['color_g'], $cell_remhpage['color_b']);
            if (!empty($cell_remhpage['posx']) && !empty($cell_remhpage['posy']))
            {
                $this->Pdf->SetXY($cell_remhpage['posx'], $cell_remhpage['posy']);
            }
            elseif (!empty($cell_remhpage['posx']))
            {
                $this->Pdf->SetX($cell_remhpage['posx']);
            }
            elseif (!empty($cell_remhpage['posy']))
            {
                $this->Pdf->SetY($cell_remhpage['posy']);
            }
            $this->Pdf->Cell($cell_remhpage['width'], 0, $cell_remhpage['data'], 0, 0, $cell_remhpage['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output('EtiquetaEmpresa.pdf', 'D');
   $this->grid_saida_html();
 }
 function grid_saida_html()
 {
   echo "<HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n";
   echo "<HEAD>\r\n";
   echo " <TITLE>Sistema Videomart 2020</TITLE>\r\n";
   echo " <META http-equiv=\"Content-Type\" content=\"text/html; charset=" .  $_SESSION['scriptcase']['charset_html']  . "\" />\r\n";
   if ($_SESSION['scriptcase']['proc_mobile'])
   {
       echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />";
   }
   echo "<link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
   echo "</HEAD>\r\n";
   echo "<BODY>\r\n";
   echo $this->Ini->Ajax_result_set;
   echo " <TABLE border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n";
   echo "  <TR>\r\n";
   echo "   <TD align=\"center\"><B>" . $this->Ini->Nm_lang['lang_pdff_fnsh'] . "</B></TD>\r\n";
   echo "  </TR>\r\n";
   echo "  <TR>\r\n";
   echo "   <TD align=\"center\">&nbsp;</TD>\r\n";
   echo "  </TR>\r\n";
   echo "  <TR>\r\n";
   if (!$this->aba_iframe)
   {
       echo "   <TD align=\"center\"> <A  HREF=\"javascript:document.F3.submit()\">" . $this->Ini->Nm_lang['lang_btns_rtrn_hint'] . "</A></TD>\r\n";
   }
   echo "  </TR>\r\n";
   echo " </TABLE>\r\n";
   echo "<form name=\"F3\" method=\"post\"\r\n"; 
   echo "                  action=\"pdf_etiqueta_fim.php\"\r\n"; 
   echo "                  target=\"_self\">\r\n"; 
   echo "    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\">\r\n"; 
   echo "    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\">\r\n"; 
   echo "    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\">\r\n"; 
   echo "   </form>\r\n"; 
   echo "</BODY>\r\n";
   echo "</HTML>\r\n";
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
