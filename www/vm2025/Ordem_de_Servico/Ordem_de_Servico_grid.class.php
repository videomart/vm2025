<?php
class Ordem_de_Servico_grid
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
   var $servicos = array();
   var $servicos_descricao = array();
   var $servicos_htec = array();
   var $id = array();
   var $osnumber = array();
   var $data = array();
   var $classe = array();
   var $marca = array();
   var $modelo = array();
   var $serie = array();
   var $natureza = array();
   var $sintoma = array();
   var $status = array();
   var $recepcao = array();
   var $dataorc = array();
   var $maoobra = array();
   var $material = array();
   var $orcamento = array();
   var $pendencia = array();
   var $tecnico = array();
   var $saida = array();
   var $obs = array();
   var $empresa = array();
   var $telefone = array();
   var $contato = array();
   var $descricao = array();
   var $endereco = array();
   var $email = array();
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
   $this->default_font = 'Times';
   $this->default_font_sr  = 'Helvetica';
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
   $_SESSION['scriptcase']['Ordem_de_Servico']['default_font'] = $this->default_font;
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
           if (in_array("Ordem_de_Servico", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "off";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->id[0] = (isset($Busca_temp['id'])) ? $Busca_temp['id'] : ""; 
       $tmp_pos = (is_string($this->id[0])) ? strpos($this->id[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->id[0]))
       {
           $this->id[0] = substr($this->id[0], 0, $tmp_pos);
       }
       $this->osnumber[0] = (isset($Busca_temp['osnumber'])) ? $Busca_temp['osnumber'] : ""; 
       $tmp_pos = (is_string($this->osnumber[0])) ? strpos($this->osnumber[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->osnumber[0]))
       {
           $this->osnumber[0] = substr($this->osnumber[0], 0, $tmp_pos);
       }
       $this->data[0] = (isset($Busca_temp['data'])) ? $Busca_temp['data'] : ""; 
       $tmp_pos = (is_string($this->data[0])) ? strpos($this->data[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->data[0]))
       {
           $this->data[0] = substr($this->data[0], 0, $tmp_pos);
       }
       $this->classe[0] = (isset($Busca_temp['classe'])) ? $Busca_temp['classe'] : ""; 
       $tmp_pos = (is_string($this->classe[0])) ? strpos($this->classe[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->classe[0]))
       {
           $this->classe[0] = substr($this->classe[0], 0, $tmp_pos);
       }
       $this->marca[0] = (isset($Busca_temp['marca'])) ? $Busca_temp['marca'] : ""; 
       $tmp_pos = (is_string($this->marca[0])) ? strpos($this->marca[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->marca[0]))
       {
           $this->marca[0] = substr($this->marca[0], 0, $tmp_pos);
       }
       $this->modelo[0] = (isset($Busca_temp['modelo'])) ? $Busca_temp['modelo'] : ""; 
       $tmp_pos = (is_string($this->modelo[0])) ? strpos($this->modelo[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->modelo[0]))
       {
           $this->modelo[0] = substr($this->modelo[0], 0, $tmp_pos);
       }
       $this->serie[0] = (isset($Busca_temp['serie'])) ? $Busca_temp['serie'] : ""; 
       $tmp_pos = (is_string($this->serie[0])) ? strpos($this->serie[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->serie[0]))
       {
           $this->serie[0] = substr($this->serie[0], 0, $tmp_pos);
       }
       $this->natureza[0] = (isset($Busca_temp['natureza'])) ? $Busca_temp['natureza'] : ""; 
       $tmp_pos = (is_string($this->natureza[0])) ? strpos($this->natureza[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->natureza[0]))
       {
           $this->natureza[0] = substr($this->natureza[0], 0, $tmp_pos);
       }
       $this->sintoma[0] = (isset($Busca_temp['sintoma'])) ? $Busca_temp['sintoma'] : ""; 
       $tmp_pos = (is_string($this->sintoma[0])) ? strpos($this->sintoma[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->sintoma[0]))
       {
           $this->sintoma[0] = substr($this->sintoma[0], 0, $tmp_pos);
       }
       $this->status[0] = (isset($Busca_temp['status'])) ? $Busca_temp['status'] : ""; 
       $tmp_pos = (is_string($this->status[0])) ? strpos($this->status[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->status[0]))
       {
           $this->status[0] = substr($this->status[0], 0, $tmp_pos);
       }
       $this->recepcao[0] = (isset($Busca_temp['recepcao'])) ? $Busca_temp['recepcao'] : ""; 
       $tmp_pos = (is_string($this->recepcao[0])) ? strpos($this->recepcao[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->recepcao[0]))
       {
           $this->recepcao[0] = substr($this->recepcao[0], 0, $tmp_pos);
       }
       $this->dataorc[0] = (isset($Busca_temp['dataorc'])) ? $Busca_temp['dataorc'] : ""; 
       $tmp_pos = (is_string($this->dataorc[0])) ? strpos($this->dataorc[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->dataorc[0]))
       {
           $this->dataorc[0] = substr($this->dataorc[0], 0, $tmp_pos);
       }
       $this->maoobra[0] = (isset($Busca_temp['maoobra'])) ? $Busca_temp['maoobra'] : ""; 
       $tmp_pos = (is_string($this->maoobra[0])) ? strpos($this->maoobra[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->maoobra[0]))
       {
           $this->maoobra[0] = substr($this->maoobra[0], 0, $tmp_pos);
       }
       $this->material[0] = (isset($Busca_temp['material'])) ? $Busca_temp['material'] : ""; 
       $tmp_pos = (is_string($this->material[0])) ? strpos($this->material[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->material[0]))
       {
           $this->material[0] = substr($this->material[0], 0, $tmp_pos);
       }
       $this->orcamento[0] = (isset($Busca_temp['orcamento'])) ? $Busca_temp['orcamento'] : ""; 
       $tmp_pos = (is_string($this->orcamento[0])) ? strpos($this->orcamento[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->orcamento[0]))
       {
           $this->orcamento[0] = substr($this->orcamento[0], 0, $tmp_pos);
       }
       $this->pendencia[0] = (isset($Busca_temp['pendencia'])) ? $Busca_temp['pendencia'] : ""; 
       $tmp_pos = (is_string($this->pendencia[0])) ? strpos($this->pendencia[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->pendencia[0]))
       {
           $this->pendencia[0] = substr($this->pendencia[0], 0, $tmp_pos);
       }
       $this->tecnico[0] = (isset($Busca_temp['tecnico'])) ? $Busca_temp['tecnico'] : ""; 
       $tmp_pos = (is_string($this->tecnico[0])) ? strpos($this->tecnico[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->tecnico[0]))
       {
           $this->tecnico[0] = substr($this->tecnico[0], 0, $tmp_pos);
       }
       $this->saida[0] = (isset($Busca_temp['saida'])) ? $Busca_temp['saida'] : ""; 
       $tmp_pos = (is_string($this->saida[0])) ? strpos($this->saida[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->saida[0]))
       {
           $this->saida[0] = substr($this->saida[0], 0, $tmp_pos);
       }
       $this->obs[0] = (isset($Busca_temp['obs'])) ? $Busca_temp['obs'] : ""; 
       $tmp_pos = (is_string($this->obs[0])) ? strpos($this->obs[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->obs[0]))
       {
           $this->obs[0] = substr($this->obs[0], 0, $tmp_pos);
       }
       $this->empresa[0] = (isset($Busca_temp['empresa'])) ? $Busca_temp['empresa'] : ""; 
       $tmp_pos = (is_string($this->empresa[0])) ? strpos($this->empresa[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->empresa[0]))
       {
           $this->empresa[0] = substr($this->empresa[0], 0, $tmp_pos);
       }
       $this->telefone[0] = (isset($Busca_temp['telefone'])) ? $Busca_temp['telefone'] : ""; 
       $tmp_pos = (is_string($this->telefone[0])) ? strpos($this->telefone[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->telefone[0]))
       {
           $this->telefone[0] = substr($this->telefone[0], 0, $tmp_pos);
       }
       $this->contato[0] = (isset($Busca_temp['contato'])) ? $Busca_temp['contato'] : ""; 
       $tmp_pos = (is_string($this->contato[0])) ? strpos($this->contato[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->contato[0]))
       {
           $this->contato[0] = substr($this->contato[0], 0, $tmp_pos);
       }
       $this->descricao[0] = (isset($Busca_temp['descricao'])) ? $Busca_temp['descricao'] : ""; 
       $tmp_pos = (is_string($this->descricao[0])) ? strpos($this->descricao[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->descricao[0]))
       {
           $this->descricao[0] = substr($this->descricao[0], 0, $tmp_pos);
       }
       $this->endereco[0] = (isset($Busca_temp['endereco'])) ? $Busca_temp['endereco'] : ""; 
       $tmp_pos = (is_string($this->endereco[0])) ? strpos($this->endereco[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->endereco[0]))
       {
           $this->endereco[0] = substr($this->endereco[0], 0, $tmp_pos);
       }
       $this->email[0] = (isset($Busca_temp['email'])) ? $Busca_temp['email'] : ""; 
       $tmp_pos = (is_string($this->email[0])) ? strpos($this->email[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->email[0]))
       {
           $this->email[0] = substr($this->email[0], 0, $tmp_pos);
       }
       $this->servicos[0] = (isset($Busca_temp['servicos'])) ? $Busca_temp['servicos'] : ""; 
       $tmp_pos = (is_string($this->servicos[0])) ? strpos($this->servicos[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->servicos[0]))
       {
           $this->servicos[0] = substr($this->servicos[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['Ordem_de_Servico']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Ordem_de_Servico']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['Ordem_de_Servico']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['Ordem_de_Servico']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig'] = " where (OSNUMBER=" . $_SESSION['osnumb'] . ")";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT ID, OSNUMBER, DATA, CLASSE, MARCA, MODELO, SERIE, NATUREZA, SINTOMA, STATUS, RECEPCAO, DATAORC, MAOOBRA, MATERIAL, ORCAMENTO, PENDENCIA, TECNICO, SAIDA, OBS, EMPRESA, TELEFONE, CONTATO, DESCRICAO, ENDERECO, EMAIL from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT ID, OSNUMBER, DATA, CLASSE, MARCA, MODELO, SERIE, NATUREZA, SINTOMA, STATUS, RECEPCAO, DATAORC, MAOOBRA, MATERIAL, ORCAMENTO, PENDENCIA, TECNICO, SAIDA, OBS, EMPRESA, TELEFONE, CONTATO, DESCRICAO, ENDERECO, EMAIL from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['Ordem_de_Servico']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['Ordem_de_Servico']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['Ordem_de_Servico']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id[$this->nm_grid_colunas] = (string)$this->id[$this->nm_grid_colunas];
          $this->osnumber[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->data[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->classe[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->marca[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->modelo[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->serie[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->natureza[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->sintoma[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->status[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->recepcao[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->dataorc[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->maoobra[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->maoobra[$this->nm_grid_colunas] =  str_replace(",", ".", $this->maoobra[$this->nm_grid_colunas]);
          $this->maoobra[$this->nm_grid_colunas] = (strpos(strtolower($this->maoobra[$this->nm_grid_colunas]), "e")) ? (float)$this->maoobra[$this->nm_grid_colunas] : $this->maoobra[$this->nm_grid_colunas]; 
          $this->maoobra[$this->nm_grid_colunas] = (string)$this->maoobra[$this->nm_grid_colunas];
          $this->material[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->material[$this->nm_grid_colunas] =  str_replace(",", ".", $this->material[$this->nm_grid_colunas]);
          $this->material[$this->nm_grid_colunas] = (strpos(strtolower($this->material[$this->nm_grid_colunas]), "e")) ? (float)$this->material[$this->nm_grid_colunas] : $this->material[$this->nm_grid_colunas]; 
          $this->material[$this->nm_grid_colunas] = (string)$this->material[$this->nm_grid_colunas];
          $this->orcamento[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->orcamento[$this->nm_grid_colunas] =  str_replace(",", ".", $this->orcamento[$this->nm_grid_colunas]);
          $this->orcamento[$this->nm_grid_colunas] = (strpos(strtolower($this->orcamento[$this->nm_grid_colunas]), "e")) ? (float)$this->orcamento[$this->nm_grid_colunas] : $this->orcamento[$this->nm_grid_colunas]; 
          $this->orcamento[$this->nm_grid_colunas] = (string)$this->orcamento[$this->nm_grid_colunas];
          $this->pendencia[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->tecnico[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->saida[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->obs[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->empresa[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->telefone[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->contato[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->descricao[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->endereco[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->email[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->servicos_descricao[$this->nm_grid_colunas] = array();
          $this->servicos_htec[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_servicos($this->servicos[$this->nm_grid_colunas] , $this->osnumber[$this->nm_grid_colunas], $array_servicos); 
          $NM_ind = 0;
          $this->servicos = array();
          foreach ($array_servicos as $cada_subselect) 
          {
              $this->servicos[$this->nm_grid_colunas][$NM_ind] = "";
              $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->servicos_htec[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $NM_ind++;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->id[$this->nm_grid_colunas]));
          }
          else {
              $this->id[$this->nm_grid_colunas] = sc_strip_script($this->id[$this->nm_grid_colunas]);
          }
          if ($this->id[$this->nm_grid_colunas] === "") 
          { 
              $this->id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->osnumber[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->osnumber[$this->nm_grid_colunas]));
          }
          else {
              $this->osnumber[$this->nm_grid_colunas] = sc_strip_script($this->osnumber[$this->nm_grid_colunas]);
          }
          if ($this->osnumber[$this->nm_grid_colunas] === "") 
          { 
              $this->osnumber[$this->nm_grid_colunas] = "" ;  
          } 
          $this->osnumber[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->osnumber[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->data[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->data[$this->nm_grid_colunas]));
          }
          else {
              $this->data[$this->nm_grid_colunas] = sc_strip_script($this->data[$this->nm_grid_colunas]);
          }
          if ($this->data[$this->nm_grid_colunas] === "") 
          { 
              $this->data[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $data_x =  $this->data[$this->nm_grid_colunas];
               nm_conv_limpa_dado($data_x, "YYYY-MM-DD");
               if (is_numeric($data_x) && strlen($data_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->data[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->data[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->data[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->data[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->classe[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->classe[$this->nm_grid_colunas]));
          }
          else {
              $this->classe[$this->nm_grid_colunas] = sc_strip_script($this->classe[$this->nm_grid_colunas]);
          }
          if ($this->classe[$this->nm_grid_colunas] === "") 
          { 
              $this->classe[$this->nm_grid_colunas] = "" ;  
          } 
          $this->classe[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->classe[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->marca[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->marca[$this->nm_grid_colunas]));
          }
          else {
              $this->marca[$this->nm_grid_colunas] = sc_strip_script($this->marca[$this->nm_grid_colunas]);
          }
          if ($this->marca[$this->nm_grid_colunas] === "") 
          { 
              $this->marca[$this->nm_grid_colunas] = "" ;  
          } 
          $this->marca[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->marca[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->modelo[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->modelo[$this->nm_grid_colunas]));
          }
          else {
              $this->modelo[$this->nm_grid_colunas] = sc_strip_script($this->modelo[$this->nm_grid_colunas]);
          }
          if ($this->modelo[$this->nm_grid_colunas] === "") 
          { 
              $this->modelo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->modelo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->modelo[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->serie[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->serie[$this->nm_grid_colunas]));
          }
          else {
              $this->serie[$this->nm_grid_colunas] = sc_strip_script($this->serie[$this->nm_grid_colunas]);
          }
          if ($this->serie[$this->nm_grid_colunas] === "") 
          { 
              $this->serie[$this->nm_grid_colunas] = "" ;  
          } 
          $this->serie[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->serie[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->natureza[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->natureza[$this->nm_grid_colunas]));
          }
          else {
              $this->natureza[$this->nm_grid_colunas] = sc_strip_script($this->natureza[$this->nm_grid_colunas]);
          }
          if ($this->natureza[$this->nm_grid_colunas] === "") 
          { 
              $this->natureza[$this->nm_grid_colunas] = "" ;  
          } 
          $this->natureza[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->natureza[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->sintoma[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->sintoma[$this->nm_grid_colunas]));
          }
          else {
              $this->sintoma[$this->nm_grid_colunas] = sc_strip_script($this->sintoma[$this->nm_grid_colunas]);
          }
          if ($this->sintoma[$this->nm_grid_colunas] === "") 
          { 
              $this->sintoma[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sintoma[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sintoma[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->status[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->status[$this->nm_grid_colunas]));
          }
          else {
              $this->status[$this->nm_grid_colunas] = sc_strip_script($this->status[$this->nm_grid_colunas]);
          }
          if ($this->status[$this->nm_grid_colunas] === "") 
          { 
              $this->status[$this->nm_grid_colunas] = "" ;  
          } 
          $this->status[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->status[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->recepcao[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->recepcao[$this->nm_grid_colunas]));
          }
          else {
              $this->recepcao[$this->nm_grid_colunas] = sc_strip_script($this->recepcao[$this->nm_grid_colunas]);
          }
          if ($this->recepcao[$this->nm_grid_colunas] === "") 
          { 
              $this->recepcao[$this->nm_grid_colunas] = "" ;  
          } 
          $this->recepcao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->recepcao[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->dataorc[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->dataorc[$this->nm_grid_colunas]));
          }
          else {
              $this->dataorc[$this->nm_grid_colunas] = sc_strip_script($this->dataorc[$this->nm_grid_colunas]);
          }
          if ($this->dataorc[$this->nm_grid_colunas] === "") 
          { 
              $this->dataorc[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $dataorc_x =  $this->dataorc[$this->nm_grid_colunas];
               nm_conv_limpa_dado($dataorc_x, "YYYY-MM-DD");
               if (is_numeric($dataorc_x) && strlen($dataorc_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->dataorc[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->dataorc[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->dataorc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dataorc[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->maoobra[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->maoobra[$this->nm_grid_colunas]));
          }
          else {
              $this->maoobra[$this->nm_grid_colunas] = sc_strip_script($this->maoobra[$this->nm_grid_colunas]);
          }
          if ($this->maoobra[$this->nm_grid_colunas] === "") 
          { 
              $this->maoobra[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->maoobra[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->maoobra[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->maoobra[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->material[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->material[$this->nm_grid_colunas]));
          }
          else {
              $this->material[$this->nm_grid_colunas] = sc_strip_script($this->material[$this->nm_grid_colunas]);
          }
          if ($this->material[$this->nm_grid_colunas] === "") 
          { 
              $this->material[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->material[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->material[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->material[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->orcamento[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->orcamento[$this->nm_grid_colunas]));
          }
          else {
              $this->orcamento[$this->nm_grid_colunas] = sc_strip_script($this->orcamento[$this->nm_grid_colunas]);
          }
          if ($this->orcamento[$this->nm_grid_colunas] === "") 
          { 
              $this->orcamento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->orcamento[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->orcamento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->orcamento[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pendencia[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pendencia[$this->nm_grid_colunas]));
          }
          else {
              $this->pendencia[$this->nm_grid_colunas] = sc_strip_script($this->pendencia[$this->nm_grid_colunas]);
          }
          if ($this->pendencia[$this->nm_grid_colunas] === "") 
          { 
              $this->pendencia[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pendencia[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pendencia[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->tecnico[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->tecnico[$this->nm_grid_colunas]));
          }
          else {
              $this->tecnico[$this->nm_grid_colunas] = sc_strip_script($this->tecnico[$this->nm_grid_colunas]);
          }
          if ($this->tecnico[$this->nm_grid_colunas] === "") 
          { 
              $this->tecnico[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tecnico[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tecnico[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->saida[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->saida[$this->nm_grid_colunas]));
          }
          else {
              $this->saida[$this->nm_grid_colunas] = sc_strip_script($this->saida[$this->nm_grid_colunas]);
          }
          if ($this->saida[$this->nm_grid_colunas] === "") 
          { 
              $this->saida[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->saida[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->saida[$this->nm_grid_colunas] = substr($this->saida[$this->nm_grid_colunas], 0, 10) . " " . substr($this->saida[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->saida[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->saida[$this->nm_grid_colunas] = substr($this->saida[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->saida[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->saida[$this->nm_grid_colunas], 17);
               } 
               $saida_x =  $this->saida[$this->nm_grid_colunas];
               nm_conv_limpa_dado($saida_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($saida_x) && strlen($saida_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->saida[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->saida[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->saida[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->saida[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->obs[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->obs[$this->nm_grid_colunas]));
          }
          else {
              $this->obs[$this->nm_grid_colunas] = sc_strip_script($this->obs[$this->nm_grid_colunas]);
          }
          if ($this->obs[$this->nm_grid_colunas] === "") 
          { 
              $this->obs[$this->nm_grid_colunas] = "" ;  
          } 
          $this->obs[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->obs[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->empresa[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->empresa[$this->nm_grid_colunas]));
          }
          else {
              $this->empresa[$this->nm_grid_colunas] = sc_strip_script($this->empresa[$this->nm_grid_colunas]);
          }
          if ($this->empresa[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->telefone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->telefone[$this->nm_grid_colunas]));
          }
          else {
              $this->telefone[$this->nm_grid_colunas] = sc_strip_script($this->telefone[$this->nm_grid_colunas]);
          }
          if ($this->telefone[$this->nm_grid_colunas] === "") 
          { 
              $this->telefone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->telefone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->telefone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->contato[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->contato[$this->nm_grid_colunas]));
          }
          else {
              $this->contato[$this->nm_grid_colunas] = sc_strip_script($this->contato[$this->nm_grid_colunas]);
          }
          if ($this->contato[$this->nm_grid_colunas] === "") 
          { 
              $this->contato[$this->nm_grid_colunas] = "" ;  
          } 
          $this->contato[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->contato[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->descricao[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->descricao[$this->nm_grid_colunas]));
          }
          else {
              $this->descricao[$this->nm_grid_colunas] = sc_strip_script($this->descricao[$this->nm_grid_colunas]);
          }
          if ($this->descricao[$this->nm_grid_colunas] === "") 
          { 
              $this->descricao[$this->nm_grid_colunas] = "" ;  
          } 
          $this->descricao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->descricao[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->endereco[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->endereco[$this->nm_grid_colunas]));
          }
          else {
              $this->endereco[$this->nm_grid_colunas] = sc_strip_script($this->endereco[$this->nm_grid_colunas]);
          }
          if ($this->endereco[$this->nm_grid_colunas] === "") 
          { 
              $this->endereco[$this->nm_grid_colunas] = "" ;  
          } 
          $this->endereco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->endereco[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->email[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->email[$this->nm_grid_colunas]));
          }
          else {
              $this->email[$this->nm_grid_colunas] = sc_strip_script($this->email[$this->nm_grid_colunas]);
          }
          if ($this->email[$this->nm_grid_colunas] === "") 
          { 
              $this->email[$this->nm_grid_colunas] = "" ;  
          } 
          $this->email[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->email[$this->nm_grid_colunas]);
          foreach ($this->servicos_descricao[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->servicos_descricao[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->servicos_htec[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->servicos_htec[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->servicos_htec[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->servicos_htec[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->servicos_htec[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->servicos_htec[$this->nm_grid_colunas][$NM_ind]);
          }
                      /*-------- Def. Body --------*/
            $Label_Finalidade = array('posx' => '78', 'posy' => '35', 'data' => $this->SC_conv_utf8('Orçamento de serviço'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'BU');
            $LabelVM = array('posx' => '145', 'posy' => '10', 'data' => $this->SC_conv_utf8('Videomart Broadcast Ltda'), 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $LabelCGCVM = array('posx' => '145', 'posy' => '15', 'data' => $this->SC_conv_utf8('CGC: 00.323.487/0001-43'), 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $LabelFaxVM = array('posx' => '145', 'posy' => '20', 'data' => $this->SC_conv_utf8('FAX: 21 2142-1301'), 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $LabelPABXVM = array('posx' => '145', 'posy' => '25', 'data' => $this->SC_conv_utf8('PABX: 21 2142-1300'), 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $LabelEmailVM = array('posx' => '145', 'posy' => '30', 'data' => $this->SC_conv_utf8('Email: comercial@videomart.com.br'), 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $LabelNextelVM = array('posx' => '145', 'posy' => '35', 'data' => $this->SC_conv_utf8('NEXTEL ID: 6043*3'), 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Natureza = array('posx' => '10', 'posy' => '55', 'data' => $this->SC_conv_utf8('Natureza:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_NATUREZA = array('posx' => '40', 'posy' => '55', 'data' => $this->natureza[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_OS = array('posx' => '85', 'posy' => '45', 'data' => $this->SC_conv_utf8('OS:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_OSNUMBER = array('posx' => '92', 'posy' => '45', 'data' => $this->osnumber[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');
            $label_DATA = array('posx' => '10', 'posy' => '45', 'data' => $this->SC_conv_utf8('Data de entrada:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_DATA = array('posx' => '40', 'posy' => '45', 'data' => $this->data[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Recepcao = array('posx' => '10', 'posy' => '50', 'data' => $this->SC_conv_utf8('Recepção:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_RECEPCAO = array('posx' => '40', 'posy' => '50', 'data' => $this->recepcao[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_DadosCliente = array('posx' => '80', 'posy' => '60', 'data' => $this->SC_conv_utf8('Dados do cliente'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');
            $label_Empresa = array('posx' => '10', 'posy' => '65', 'data' => $this->SC_conv_utf8('Empresa:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_EMPRESA = array('posx' => '30', 'posy' => '65', 'data' => $this->empresa[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Contato = array('posx' => '10', 'posy' => '70', 'data' => $this->SC_conv_utf8('Contato:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CONTATO = array('posx' => '30', 'posy' => '70', 'data' => $this->contato[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Telefone = array('posx' => '10', 'posy' => '75', 'data' => $this->SC_conv_utf8('Telefone:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TELEFONE = array('posx' => '30', 'posy' => '75', 'data' => $this->telefone[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Fax = array('posx' => '65', 'posy' => '75', 'data' => $this->SC_conv_utf8('Fax'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Endereco = array('posx' => '10', 'posy' => '80', 'data' => $this->SC_conv_utf8('Endereço:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ENDERECO = array('posx' => '30', 'posy' => '80', 'data' => $this->endereco[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Email = array('posx' => '112', 'posy' => '75', 'data' => $this->SC_conv_utf8('Email:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_EMAIL = array('posx' => '125', 'posy' => '75', 'data' => $this->email[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_DodosEquipamento = array('posx' => '80', 'posy' => '90', 'data' => $this->SC_conv_utf8('Dados do equipamento'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');
            $Label_Claase = array('posx' => '10', 'posy' => '95', 'data' => $this->SC_conv_utf8('Classe:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CLASSE = array('posx' => '30', 'posy' => '95', 'data' => $this->classe[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $label_Marca = array('posx' => '10', 'posy' => '100', 'data' => $this->SC_conv_utf8('Marca:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_MARCA = array('posx' => '30', 'posy' => '100', 'data' => $this->marca[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Modelo = array('posx' => '10', 'posy' => '105', 'data' => $this->SC_conv_utf8('Modelo:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_MODELO = array('posx' => '30', 'posy' => '105', 'data' => $this->modelo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Serie = array('posx' => '10', 'posy' => '110', 'data' => $this->SC_conv_utf8('Série:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_SERIE = array('posx' => '30', 'posy' => '110', 'data' => $this->serie[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Sintome = array('posx' => '10', 'posy' => '115', 'data' => $this->SC_conv_utf8('Sintoma:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_SINTOMA = array('posx' => '30', 'posy' => '115', 'data' => $this->sintoma[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Obs = array('posx' => '10', 'posy' => '120', 'data' => $this->SC_conv_utf8('Obs:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_OBS = array('posx' => '30', 'posy' => '120', 'data' => $this->obs[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_DadosOrcmento = array('posx' => '80', 'posy' => '130', 'data' => $this->SC_conv_utf8('Dados do orçamento'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');
            $Label_DataOrc = array('posx' => '10', 'posy' => '145', 'data' => $this->SC_conv_utf8('Data do orçamento:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_DATAORC = array('posx' => '50', 'posy' => '145', 'data' => $this->dataorc[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Tecnico = array('posx' => '10', 'posy' => '150', 'data' => $this->SC_conv_utf8('Técnico responsável:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TECNICO = array('posx' => '50', 'posy' => '150', 'data' => $this->tecnico[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Total = array('posx' => '10', 'posy' => '155', 'data' => $this->SC_conv_utf8('Valor do orçamento:     R$'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ORCAMENTO = array('posx' => '50', 'posy' => '155', 'data' => $this->orcamento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'BU');
            $Label_Servicos_designado = array('posx' => '80', 'posy' => '180', 'data' => $this->SC_conv_utf8('Serviços designados'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');
            $cell_Servicos_DESCRICAO = array('posx' => '40', 'posy' => '190', 'data' => $this->servicos_descricao[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Servicos_HTEC = array('posx' => '10', 'posy' => '190', 'data' => $this->servicos_htec[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_horastecnicas = array('posx' => '10', 'posy' => '185', 'data' => $this->SC_conv_utf8('Horas técnicas'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Servicos = array('posx' => '40', 'posy' => '185', 'data' => $this->SC_conv_utf8('Descrição do serviço'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_aceite = array('posx' => '10', 'posy' => '220', 'data' => $this->SC_conv_utf8('Aceito o presente orçamento, '), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_data = array('posx' => '65', 'posy' => '220', 'data' => '', 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_assinatura = array('posx' => '10', 'posy' => '240', 'data' => $this->SC_conv_utf8('----------------------------------------------------------------------'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Label_Mensagem = array('posx' => '10', 'posy' => '255', 'data' => $this->SC_conv_utf8('Para aprovação por favor assine e remeta-nos  a cópia por fax ou email'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);



            $this->Pdf->SetFont($Label_Finalidade['font_type'], $Label_Finalidade['font_style'], $Label_Finalidade['font_size']);
            $this->pdf_text_color($Label_Finalidade['data'], $Label_Finalidade['color_r'], $Label_Finalidade['color_g'], $Label_Finalidade['color_b']);
            if (!empty($Label_Finalidade['posx']) && !empty($Label_Finalidade['posy']))
            {
                $this->Pdf->SetXY($Label_Finalidade['posx'], $Label_Finalidade['posy']);
            }
            elseif (!empty($Label_Finalidade['posx']))
            {
                $this->Pdf->SetX($Label_Finalidade['posx']);
            }
            elseif (!empty($Label_Finalidade['posy']))
            {
                $this->Pdf->SetY($Label_Finalidade['posy']);
            }
            $this->Pdf->Cell($Label_Finalidade['width'], 0, $Label_Finalidade['data'], 0, 0, $Label_Finalidade['align']);

            $this->Pdf->SetFont($LabelVM['font_type'], $LabelVM['font_style'], $LabelVM['font_size']);
            $this->pdf_text_color($LabelVM['data'], $LabelVM['color_r'], $LabelVM['color_g'], $LabelVM['color_b']);
            if (!empty($LabelVM['posx']) && !empty($LabelVM['posy']))
            {
                $this->Pdf->SetXY($LabelVM['posx'], $LabelVM['posy']);
            }
            elseif (!empty($LabelVM['posx']))
            {
                $this->Pdf->SetX($LabelVM['posx']);
            }
            elseif (!empty($LabelVM['posy']))
            {
                $this->Pdf->SetY($LabelVM['posy']);
            }
            $this->Pdf->Cell($LabelVM['width'], 0, $LabelVM['data'], 0, 0, $LabelVM['align']);

            $this->Pdf->SetFont($LabelCGCVM['font_type'], $LabelCGCVM['font_style'], $LabelCGCVM['font_size']);
            $this->pdf_text_color($LabelCGCVM['data'], $LabelCGCVM['color_r'], $LabelCGCVM['color_g'], $LabelCGCVM['color_b']);
            if (!empty($LabelCGCVM['posx']) && !empty($LabelCGCVM['posy']))
            {
                $this->Pdf->SetXY($LabelCGCVM['posx'], $LabelCGCVM['posy']);
            }
            elseif (!empty($LabelCGCVM['posx']))
            {
                $this->Pdf->SetX($LabelCGCVM['posx']);
            }
            elseif (!empty($LabelCGCVM['posy']))
            {
                $this->Pdf->SetY($LabelCGCVM['posy']);
            }
            $this->Pdf->Cell($LabelCGCVM['width'], 0, $LabelCGCVM['data'], 0, 0, $LabelCGCVM['align']);

            $this->Pdf->SetFont($LabelFaxVM['font_type'], $LabelFaxVM['font_style'], $LabelFaxVM['font_size']);
            $this->pdf_text_color($LabelFaxVM['data'], $LabelFaxVM['color_r'], $LabelFaxVM['color_g'], $LabelFaxVM['color_b']);
            if (!empty($LabelFaxVM['posx']) && !empty($LabelFaxVM['posy']))
            {
                $this->Pdf->SetXY($LabelFaxVM['posx'], $LabelFaxVM['posy']);
            }
            elseif (!empty($LabelFaxVM['posx']))
            {
                $this->Pdf->SetX($LabelFaxVM['posx']);
            }
            elseif (!empty($LabelFaxVM['posy']))
            {
                $this->Pdf->SetY($LabelFaxVM['posy']);
            }
            $this->Pdf->Cell($LabelFaxVM['width'], 0, $LabelFaxVM['data'], 0, 0, $LabelFaxVM['align']);

            $this->Pdf->SetFont($LabelPABXVM['font_type'], $LabelPABXVM['font_style'], $LabelPABXVM['font_size']);
            $this->pdf_text_color($LabelPABXVM['data'], $LabelPABXVM['color_r'], $LabelPABXVM['color_g'], $LabelPABXVM['color_b']);
            if (!empty($LabelPABXVM['posx']) && !empty($LabelPABXVM['posy']))
            {
                $this->Pdf->SetXY($LabelPABXVM['posx'], $LabelPABXVM['posy']);
            }
            elseif (!empty($LabelPABXVM['posx']))
            {
                $this->Pdf->SetX($LabelPABXVM['posx']);
            }
            elseif (!empty($LabelPABXVM['posy']))
            {
                $this->Pdf->SetY($LabelPABXVM['posy']);
            }
            $this->Pdf->Cell($LabelPABXVM['width'], 0, $LabelPABXVM['data'], 0, 0, $LabelPABXVM['align']);

            $this->Pdf->SetFont($LabelEmailVM['font_type'], $LabelEmailVM['font_style'], $LabelEmailVM['font_size']);
            $this->pdf_text_color($LabelEmailVM['data'], $LabelEmailVM['color_r'], $LabelEmailVM['color_g'], $LabelEmailVM['color_b']);
            if (!empty($LabelEmailVM['posx']) && !empty($LabelEmailVM['posy']))
            {
                $this->Pdf->SetXY($LabelEmailVM['posx'], $LabelEmailVM['posy']);
            }
            elseif (!empty($LabelEmailVM['posx']))
            {
                $this->Pdf->SetX($LabelEmailVM['posx']);
            }
            elseif (!empty($LabelEmailVM['posy']))
            {
                $this->Pdf->SetY($LabelEmailVM['posy']);
            }
            $this->Pdf->Cell($LabelEmailVM['width'], 0, $LabelEmailVM['data'], 0, 0, $LabelEmailVM['align']);

            $this->Pdf->SetFont($LabelNextelVM['font_type'], $LabelNextelVM['font_style'], $LabelNextelVM['font_size']);
            $this->pdf_text_color($LabelNextelVM['data'], $LabelNextelVM['color_r'], $LabelNextelVM['color_g'], $LabelNextelVM['color_b']);
            if (!empty($LabelNextelVM['posx']) && !empty($LabelNextelVM['posy']))
            {
                $this->Pdf->SetXY($LabelNextelVM['posx'], $LabelNextelVM['posy']);
            }
            elseif (!empty($LabelNextelVM['posx']))
            {
                $this->Pdf->SetX($LabelNextelVM['posx']);
            }
            elseif (!empty($LabelNextelVM['posy']))
            {
                $this->Pdf->SetY($LabelNextelVM['posy']);
            }
            $this->Pdf->Cell($LabelNextelVM['width'], 0, $LabelNextelVM['data'], 0, 0, $LabelNextelVM['align']);

            $this->Pdf->SetFont($Label_Natureza['font_type'], $Label_Natureza['font_style'], $Label_Natureza['font_size']);
            $this->pdf_text_color($Label_Natureza['data'], $Label_Natureza['color_r'], $Label_Natureza['color_g'], $Label_Natureza['color_b']);
            if (!empty($Label_Natureza['posx']) && !empty($Label_Natureza['posy']))
            {
                $this->Pdf->SetXY($Label_Natureza['posx'], $Label_Natureza['posy']);
            }
            elseif (!empty($Label_Natureza['posx']))
            {
                $this->Pdf->SetX($Label_Natureza['posx']);
            }
            elseif (!empty($Label_Natureza['posy']))
            {
                $this->Pdf->SetY($Label_Natureza['posy']);
            }
            $this->Pdf->Cell($Label_Natureza['width'], 0, $Label_Natureza['data'], 0, 0, $Label_Natureza['align']);


            $this->Pdf->SetFont($cell_NATUREZA['font_type'], $cell_NATUREZA['font_style'], $cell_NATUREZA['font_size']);
            $this->Pdf->SetTextColor($cell_NATUREZA['color_r'], $cell_NATUREZA['color_g'], $cell_NATUREZA['color_b']);
            if (!empty($cell_NATUREZA['posx']) && !empty($cell_NATUREZA['posy']))
            {
                $this->Pdf->SetXY($cell_NATUREZA['posx'], $cell_NATUREZA['posy']);
            }
            elseif (!empty($cell_NATUREZA['posx']))
            {
                $this->Pdf->SetX($cell_NATUREZA['posx']);
            }
            elseif (!empty($cell_NATUREZA['posy']))
            {
                $this->Pdf->SetY($cell_NATUREZA['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_NATUREZA['width'], 0, $cell_NATUREZA['data'], 0, 0, $cell_NATUREZA['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_NATUREZA['width'], 0, $atu_X, $atu_Y, $cell_NATUREZA['data'], 0, 0, false, true, $cell_NATUREZA['align']);
            }

            $this->Pdf->SetFont($Label_OS['font_type'], $Label_OS['font_style'], $Label_OS['font_size']);
            $this->pdf_text_color($Label_OS['data'], $Label_OS['color_r'], $Label_OS['color_g'], $Label_OS['color_b']);
            if (!empty($Label_OS['posx']) && !empty($Label_OS['posy']))
            {
                $this->Pdf->SetXY($Label_OS['posx'], $Label_OS['posy']);
            }
            elseif (!empty($Label_OS['posx']))
            {
                $this->Pdf->SetX($Label_OS['posx']);
            }
            elseif (!empty($Label_OS['posy']))
            {
                $this->Pdf->SetY($Label_OS['posy']);
            }
            $this->Pdf->Cell($Label_OS['width'], 0, $Label_OS['data'], 0, 0, $Label_OS['align']);


            $this->Pdf->SetFont($cell_OSNUMBER['font_type'], $cell_OSNUMBER['font_style'], $cell_OSNUMBER['font_size']);
            $this->Pdf->SetTextColor($cell_OSNUMBER['color_r'], $cell_OSNUMBER['color_g'], $cell_OSNUMBER['color_b']);
            if (!empty($cell_OSNUMBER['posx']) && !empty($cell_OSNUMBER['posy']))
            {
                $this->Pdf->SetXY($cell_OSNUMBER['posx'], $cell_OSNUMBER['posy']);
            }
            elseif (!empty($cell_OSNUMBER['posx']))
            {
                $this->Pdf->SetX($cell_OSNUMBER['posx']);
            }
            elseif (!empty($cell_OSNUMBER['posy']))
            {
                $this->Pdf->SetY($cell_OSNUMBER['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_OSNUMBER['width'], 0, $cell_OSNUMBER['data'], 0, 0, $cell_OSNUMBER['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_OSNUMBER['width'], 0, $atu_X, $atu_Y, $cell_OSNUMBER['data'], 0, 0, false, true, $cell_OSNUMBER['align']);
            }

            $this->Pdf->SetFont($label_DATA['font_type'], $label_DATA['font_style'], $label_DATA['font_size']);
            $this->pdf_text_color($label_DATA['data'], $label_DATA['color_r'], $label_DATA['color_g'], $label_DATA['color_b']);
            if (!empty($label_DATA['posx']) && !empty($label_DATA['posy']))
            {
                $this->Pdf->SetXY($label_DATA['posx'], $label_DATA['posy']);
            }
            elseif (!empty($label_DATA['posx']))
            {
                $this->Pdf->SetX($label_DATA['posx']);
            }
            elseif (!empty($label_DATA['posy']))
            {
                $this->Pdf->SetY($label_DATA['posy']);
            }
            $this->Pdf->Cell($label_DATA['width'], 0, $label_DATA['data'], 0, 0, $label_DATA['align']);


            $this->Pdf->SetFont($cell_DATA['font_type'], $cell_DATA['font_style'], $cell_DATA['font_size']);
            $this->Pdf->SetTextColor($cell_DATA['color_r'], $cell_DATA['color_g'], $cell_DATA['color_b']);
            if (!empty($cell_DATA['posx']) && !empty($cell_DATA['posy']))
            {
                $this->Pdf->SetXY($cell_DATA['posx'], $cell_DATA['posy']);
            }
            elseif (!empty($cell_DATA['posx']))
            {
                $this->Pdf->SetX($cell_DATA['posx']);
            }
            elseif (!empty($cell_DATA['posy']))
            {
                $this->Pdf->SetY($cell_DATA['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_DATA['width'], 0, $cell_DATA['data'], 0, 0, $cell_DATA['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_DATA['width'], 0, $atu_X, $atu_Y, $cell_DATA['data'], 0, 0, false, true, $cell_DATA['align']);
            }

            $this->Pdf->SetFont($Label_Recepcao['font_type'], $Label_Recepcao['font_style'], $Label_Recepcao['font_size']);
            $this->pdf_text_color($Label_Recepcao['data'], $Label_Recepcao['color_r'], $Label_Recepcao['color_g'], $Label_Recepcao['color_b']);
            if (!empty($Label_Recepcao['posx']) && !empty($Label_Recepcao['posy']))
            {
                $this->Pdf->SetXY($Label_Recepcao['posx'], $Label_Recepcao['posy']);
            }
            elseif (!empty($Label_Recepcao['posx']))
            {
                $this->Pdf->SetX($Label_Recepcao['posx']);
            }
            elseif (!empty($Label_Recepcao['posy']))
            {
                $this->Pdf->SetY($Label_Recepcao['posy']);
            }
            $this->Pdf->Cell($Label_Recepcao['width'], 0, $Label_Recepcao['data'], 0, 0, $Label_Recepcao['align']);


            $this->Pdf->SetFont($cell_RECEPCAO['font_type'], $cell_RECEPCAO['font_style'], $cell_RECEPCAO['font_size']);
            $this->Pdf->SetTextColor($cell_RECEPCAO['color_r'], $cell_RECEPCAO['color_g'], $cell_RECEPCAO['color_b']);
            if (!empty($cell_RECEPCAO['posx']) && !empty($cell_RECEPCAO['posy']))
            {
                $this->Pdf->SetXY($cell_RECEPCAO['posx'], $cell_RECEPCAO['posy']);
            }
            elseif (!empty($cell_RECEPCAO['posx']))
            {
                $this->Pdf->SetX($cell_RECEPCAO['posx']);
            }
            elseif (!empty($cell_RECEPCAO['posy']))
            {
                $this->Pdf->SetY($cell_RECEPCAO['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_RECEPCAO['width'], 0, $cell_RECEPCAO['data'], 0, 0, $cell_RECEPCAO['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_RECEPCAO['width'], 0, $atu_X, $atu_Y, $cell_RECEPCAO['data'], 0, 0, false, true, $cell_RECEPCAO['align']);
            }

            $this->Pdf->SetFont($Label_DadosCliente['font_type'], $Label_DadosCliente['font_style'], $Label_DadosCliente['font_size']);
            $this->pdf_text_color($Label_DadosCliente['data'], $Label_DadosCliente['color_r'], $Label_DadosCliente['color_g'], $Label_DadosCliente['color_b']);
            if (!empty($Label_DadosCliente['posx']) && !empty($Label_DadosCliente['posy']))
            {
                $this->Pdf->SetXY($Label_DadosCliente['posx'], $Label_DadosCliente['posy']);
            }
            elseif (!empty($Label_DadosCliente['posx']))
            {
                $this->Pdf->SetX($Label_DadosCliente['posx']);
            }
            elseif (!empty($Label_DadosCliente['posy']))
            {
                $this->Pdf->SetY($Label_DadosCliente['posy']);
            }
            $this->Pdf->Cell($Label_DadosCliente['width'], 0, $Label_DadosCliente['data'], 0, 0, $Label_DadosCliente['align']);

            $this->Pdf->SetFont($label_Empresa['font_type'], $label_Empresa['font_style'], $label_Empresa['font_size']);
            $this->pdf_text_color($label_Empresa['data'], $label_Empresa['color_r'], $label_Empresa['color_g'], $label_Empresa['color_b']);
            if (!empty($label_Empresa['posx']) && !empty($label_Empresa['posy']))
            {
                $this->Pdf->SetXY($label_Empresa['posx'], $label_Empresa['posy']);
            }
            elseif (!empty($label_Empresa['posx']))
            {
                $this->Pdf->SetX($label_Empresa['posx']);
            }
            elseif (!empty($label_Empresa['posy']))
            {
                $this->Pdf->SetY($label_Empresa['posy']);
            }
            $this->Pdf->Cell($label_Empresa['width'], 0, $label_Empresa['data'], 0, 0, $label_Empresa['align']);


            $this->Pdf->SetFont($cell_EMPRESA['font_type'], $cell_EMPRESA['font_style'], $cell_EMPRESA['font_size']);
            $this->Pdf->SetTextColor($cell_EMPRESA['color_r'], $cell_EMPRESA['color_g'], $cell_EMPRESA['color_b']);
            if (!empty($cell_EMPRESA['posx']) && !empty($cell_EMPRESA['posy']))
            {
                $this->Pdf->SetXY($cell_EMPRESA['posx'], $cell_EMPRESA['posy']);
            }
            elseif (!empty($cell_EMPRESA['posx']))
            {
                $this->Pdf->SetX($cell_EMPRESA['posx']);
            }
            elseif (!empty($cell_EMPRESA['posy']))
            {
                $this->Pdf->SetY($cell_EMPRESA['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_EMPRESA['width'], 0, $cell_EMPRESA['data'], 0, 0, $cell_EMPRESA['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_EMPRESA['width'], 0, $atu_X, $atu_Y, $cell_EMPRESA['data'], 0, 0, false, true, $cell_EMPRESA['align']);
            }

            $this->Pdf->SetFont($Label_Contato['font_type'], $Label_Contato['font_style'], $Label_Contato['font_size']);
            $this->pdf_text_color($Label_Contato['data'], $Label_Contato['color_r'], $Label_Contato['color_g'], $Label_Contato['color_b']);
            if (!empty($Label_Contato['posx']) && !empty($Label_Contato['posy']))
            {
                $this->Pdf->SetXY($Label_Contato['posx'], $Label_Contato['posy']);
            }
            elseif (!empty($Label_Contato['posx']))
            {
                $this->Pdf->SetX($Label_Contato['posx']);
            }
            elseif (!empty($Label_Contato['posy']))
            {
                $this->Pdf->SetY($Label_Contato['posy']);
            }
            $this->Pdf->Cell($Label_Contato['width'], 0, $Label_Contato['data'], 0, 0, $Label_Contato['align']);


            $this->Pdf->SetFont($cell_CONTATO['font_type'], $cell_CONTATO['font_style'], $cell_CONTATO['font_size']);
            $this->Pdf->SetTextColor($cell_CONTATO['color_r'], $cell_CONTATO['color_g'], $cell_CONTATO['color_b']);
            if (!empty($cell_CONTATO['posx']) && !empty($cell_CONTATO['posy']))
            {
                $this->Pdf->SetXY($cell_CONTATO['posx'], $cell_CONTATO['posy']);
            }
            elseif (!empty($cell_CONTATO['posx']))
            {
                $this->Pdf->SetX($cell_CONTATO['posx']);
            }
            elseif (!empty($cell_CONTATO['posy']))
            {
                $this->Pdf->SetY($cell_CONTATO['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_CONTATO['width'], 0, $cell_CONTATO['data'], 0, 0, $cell_CONTATO['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_CONTATO['width'], 0, $atu_X, $atu_Y, $cell_CONTATO['data'], 0, 0, false, true, $cell_CONTATO['align']);
            }

            $this->Pdf->SetFont($Label_Telefone['font_type'], $Label_Telefone['font_style'], $Label_Telefone['font_size']);
            $this->pdf_text_color($Label_Telefone['data'], $Label_Telefone['color_r'], $Label_Telefone['color_g'], $Label_Telefone['color_b']);
            if (!empty($Label_Telefone['posx']) && !empty($Label_Telefone['posy']))
            {
                $this->Pdf->SetXY($Label_Telefone['posx'], $Label_Telefone['posy']);
            }
            elseif (!empty($Label_Telefone['posx']))
            {
                $this->Pdf->SetX($Label_Telefone['posx']);
            }
            elseif (!empty($Label_Telefone['posy']))
            {
                $this->Pdf->SetY($Label_Telefone['posy']);
            }
            $this->Pdf->Cell($Label_Telefone['width'], 0, $Label_Telefone['data'], 0, 0, $Label_Telefone['align']);


            $this->Pdf->SetFont($cell_TELEFONE['font_type'], $cell_TELEFONE['font_style'], $cell_TELEFONE['font_size']);
            $this->Pdf->SetTextColor($cell_TELEFONE['color_r'], $cell_TELEFONE['color_g'], $cell_TELEFONE['color_b']);
            if (!empty($cell_TELEFONE['posx']) && !empty($cell_TELEFONE['posy']))
            {
                $this->Pdf->SetXY($cell_TELEFONE['posx'], $cell_TELEFONE['posy']);
            }
            elseif (!empty($cell_TELEFONE['posx']))
            {
                $this->Pdf->SetX($cell_TELEFONE['posx']);
            }
            elseif (!empty($cell_TELEFONE['posy']))
            {
                $this->Pdf->SetY($cell_TELEFONE['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_TELEFONE['width'], 0, $cell_TELEFONE['data'], 0, 0, $cell_TELEFONE['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_TELEFONE['width'], 0, $atu_X, $atu_Y, $cell_TELEFONE['data'], 0, 0, false, true, $cell_TELEFONE['align']);
            }

            $this->Pdf->SetFont($Label_Fax['font_type'], $Label_Fax['font_style'], $Label_Fax['font_size']);
            $this->pdf_text_color($Label_Fax['data'], $Label_Fax['color_r'], $Label_Fax['color_g'], $Label_Fax['color_b']);
            if (!empty($Label_Fax['posx']) && !empty($Label_Fax['posy']))
            {
                $this->Pdf->SetXY($Label_Fax['posx'], $Label_Fax['posy']);
            }
            elseif (!empty($Label_Fax['posx']))
            {
                $this->Pdf->SetX($Label_Fax['posx']);
            }
            elseif (!empty($Label_Fax['posy']))
            {
                $this->Pdf->SetY($Label_Fax['posy']);
            }
            $this->Pdf->Cell($Label_Fax['width'], 0, $Label_Fax['data'], 0, 0, $Label_Fax['align']);

            $this->Pdf->SetFont($Label_Endereco['font_type'], $Label_Endereco['font_style'], $Label_Endereco['font_size']);
            $this->pdf_text_color($Label_Endereco['data'], $Label_Endereco['color_r'], $Label_Endereco['color_g'], $Label_Endereco['color_b']);
            if (!empty($Label_Endereco['posx']) && !empty($Label_Endereco['posy']))
            {
                $this->Pdf->SetXY($Label_Endereco['posx'], $Label_Endereco['posy']);
            }
            elseif (!empty($Label_Endereco['posx']))
            {
                $this->Pdf->SetX($Label_Endereco['posx']);
            }
            elseif (!empty($Label_Endereco['posy']))
            {
                $this->Pdf->SetY($Label_Endereco['posy']);
            }
            $this->Pdf->Cell($Label_Endereco['width'], 0, $Label_Endereco['data'], 0, 0, $Label_Endereco['align']);


            $this->Pdf->SetFont($cell_ENDERECO['font_type'], $cell_ENDERECO['font_style'], $cell_ENDERECO['font_size']);
            $this->Pdf->SetTextColor($cell_ENDERECO['color_r'], $cell_ENDERECO['color_g'], $cell_ENDERECO['color_b']);
            if (!empty($cell_ENDERECO['posx']) && !empty($cell_ENDERECO['posy']))
            {
                $this->Pdf->SetXY($cell_ENDERECO['posx'], $cell_ENDERECO['posy']);
            }
            elseif (!empty($cell_ENDERECO['posx']))
            {
                $this->Pdf->SetX($cell_ENDERECO['posx']);
            }
            elseif (!empty($cell_ENDERECO['posy']))
            {
                $this->Pdf->SetY($cell_ENDERECO['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_ENDERECO['width'], 0, $cell_ENDERECO['data'], 0, 0, $cell_ENDERECO['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_ENDERECO['width'], 0, $atu_X, $atu_Y, $cell_ENDERECO['data'], 0, 0, false, true, $cell_ENDERECO['align']);
            }

            $this->Pdf->SetFont($Label_Email['font_type'], $Label_Email['font_style'], $Label_Email['font_size']);
            $this->pdf_text_color($Label_Email['data'], $Label_Email['color_r'], $Label_Email['color_g'], $Label_Email['color_b']);
            if (!empty($Label_Email['posx']) && !empty($Label_Email['posy']))
            {
                $this->Pdf->SetXY($Label_Email['posx'], $Label_Email['posy']);
            }
            elseif (!empty($Label_Email['posx']))
            {
                $this->Pdf->SetX($Label_Email['posx']);
            }
            elseif (!empty($Label_Email['posy']))
            {
                $this->Pdf->SetY($Label_Email['posy']);
            }
            $this->Pdf->Cell($Label_Email['width'], 0, $Label_Email['data'], 0, 0, $Label_Email['align']);


            $this->Pdf->SetFont($cell_EMAIL['font_type'], $cell_EMAIL['font_style'], $cell_EMAIL['font_size']);
            $this->Pdf->SetTextColor($cell_EMAIL['color_r'], $cell_EMAIL['color_g'], $cell_EMAIL['color_b']);
            if (!empty($cell_EMAIL['posx']) && !empty($cell_EMAIL['posy']))
            {
                $this->Pdf->SetXY($cell_EMAIL['posx'], $cell_EMAIL['posy']);
            }
            elseif (!empty($cell_EMAIL['posx']))
            {
                $this->Pdf->SetX($cell_EMAIL['posx']);
            }
            elseif (!empty($cell_EMAIL['posy']))
            {
                $this->Pdf->SetY($cell_EMAIL['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_EMAIL['width'], 0, $cell_EMAIL['data'], 0, 0, $cell_EMAIL['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_EMAIL['width'], 0, $atu_X, $atu_Y, $cell_EMAIL['data'], 0, 0, false, true, $cell_EMAIL['align']);
            }

            $this->Pdf->SetFont($Label_DodosEquipamento['font_type'], $Label_DodosEquipamento['font_style'], $Label_DodosEquipamento['font_size']);
            $this->pdf_text_color($Label_DodosEquipamento['data'], $Label_DodosEquipamento['color_r'], $Label_DodosEquipamento['color_g'], $Label_DodosEquipamento['color_b']);
            if (!empty($Label_DodosEquipamento['posx']) && !empty($Label_DodosEquipamento['posy']))
            {
                $this->Pdf->SetXY($Label_DodosEquipamento['posx'], $Label_DodosEquipamento['posy']);
            }
            elseif (!empty($Label_DodosEquipamento['posx']))
            {
                $this->Pdf->SetX($Label_DodosEquipamento['posx']);
            }
            elseif (!empty($Label_DodosEquipamento['posy']))
            {
                $this->Pdf->SetY($Label_DodosEquipamento['posy']);
            }
            $this->Pdf->Cell($Label_DodosEquipamento['width'], 0, $Label_DodosEquipamento['data'], 0, 0, $Label_DodosEquipamento['align']);

            $this->Pdf->SetFont($Label_Claase['font_type'], $Label_Claase['font_style'], $Label_Claase['font_size']);
            $this->pdf_text_color($Label_Claase['data'], $Label_Claase['color_r'], $Label_Claase['color_g'], $Label_Claase['color_b']);
            if (!empty($Label_Claase['posx']) && !empty($Label_Claase['posy']))
            {
                $this->Pdf->SetXY($Label_Claase['posx'], $Label_Claase['posy']);
            }
            elseif (!empty($Label_Claase['posx']))
            {
                $this->Pdf->SetX($Label_Claase['posx']);
            }
            elseif (!empty($Label_Claase['posy']))
            {
                $this->Pdf->SetY($Label_Claase['posy']);
            }
            $this->Pdf->Cell($Label_Claase['width'], 0, $Label_Claase['data'], 0, 0, $Label_Claase['align']);


            $this->Pdf->SetFont($cell_CLASSE['font_type'], $cell_CLASSE['font_style'], $cell_CLASSE['font_size']);
            $this->Pdf->SetTextColor($cell_CLASSE['color_r'], $cell_CLASSE['color_g'], $cell_CLASSE['color_b']);
            if (!empty($cell_CLASSE['posx']) && !empty($cell_CLASSE['posy']))
            {
                $this->Pdf->SetXY($cell_CLASSE['posx'], $cell_CLASSE['posy']);
            }
            elseif (!empty($cell_CLASSE['posx']))
            {
                $this->Pdf->SetX($cell_CLASSE['posx']);
            }
            elseif (!empty($cell_CLASSE['posy']))
            {
                $this->Pdf->SetY($cell_CLASSE['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_CLASSE['width'], 0, $cell_CLASSE['data'], 0, 0, $cell_CLASSE['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_CLASSE['width'], 0, $atu_X, $atu_Y, $cell_CLASSE['data'], 0, 0, false, true, $cell_CLASSE['align']);
            }

            $this->Pdf->SetFont($label_Marca['font_type'], $label_Marca['font_style'], $label_Marca['font_size']);
            $this->pdf_text_color($label_Marca['data'], $label_Marca['color_r'], $label_Marca['color_g'], $label_Marca['color_b']);
            if (!empty($label_Marca['posx']) && !empty($label_Marca['posy']))
            {
                $this->Pdf->SetXY($label_Marca['posx'], $label_Marca['posy']);
            }
            elseif (!empty($label_Marca['posx']))
            {
                $this->Pdf->SetX($label_Marca['posx']);
            }
            elseif (!empty($label_Marca['posy']))
            {
                $this->Pdf->SetY($label_Marca['posy']);
            }
            $this->Pdf->Cell($label_Marca['width'], 0, $label_Marca['data'], 0, 0, $label_Marca['align']);


            $this->Pdf->SetFont($cell_MARCA['font_type'], $cell_MARCA['font_style'], $cell_MARCA['font_size']);
            $this->Pdf->SetTextColor($cell_MARCA['color_r'], $cell_MARCA['color_g'], $cell_MARCA['color_b']);
            if (!empty($cell_MARCA['posx']) && !empty($cell_MARCA['posy']))
            {
                $this->Pdf->SetXY($cell_MARCA['posx'], $cell_MARCA['posy']);
            }
            elseif (!empty($cell_MARCA['posx']))
            {
                $this->Pdf->SetX($cell_MARCA['posx']);
            }
            elseif (!empty($cell_MARCA['posy']))
            {
                $this->Pdf->SetY($cell_MARCA['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_MARCA['width'], 0, $cell_MARCA['data'], 0, 0, $cell_MARCA['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_MARCA['width'], 0, $atu_X, $atu_Y, $cell_MARCA['data'], 0, 0, false, true, $cell_MARCA['align']);
            }

            $this->Pdf->SetFont($Label_Modelo['font_type'], $Label_Modelo['font_style'], $Label_Modelo['font_size']);
            $this->pdf_text_color($Label_Modelo['data'], $Label_Modelo['color_r'], $Label_Modelo['color_g'], $Label_Modelo['color_b']);
            if (!empty($Label_Modelo['posx']) && !empty($Label_Modelo['posy']))
            {
                $this->Pdf->SetXY($Label_Modelo['posx'], $Label_Modelo['posy']);
            }
            elseif (!empty($Label_Modelo['posx']))
            {
                $this->Pdf->SetX($Label_Modelo['posx']);
            }
            elseif (!empty($Label_Modelo['posy']))
            {
                $this->Pdf->SetY($Label_Modelo['posy']);
            }
            $this->Pdf->Cell($Label_Modelo['width'], 0, $Label_Modelo['data'], 0, 0, $Label_Modelo['align']);


            $this->Pdf->SetFont($cell_MODELO['font_type'], $cell_MODELO['font_style'], $cell_MODELO['font_size']);
            $this->Pdf->SetTextColor($cell_MODELO['color_r'], $cell_MODELO['color_g'], $cell_MODELO['color_b']);
            if (!empty($cell_MODELO['posx']) && !empty($cell_MODELO['posy']))
            {
                $this->Pdf->SetXY($cell_MODELO['posx'], $cell_MODELO['posy']);
            }
            elseif (!empty($cell_MODELO['posx']))
            {
                $this->Pdf->SetX($cell_MODELO['posx']);
            }
            elseif (!empty($cell_MODELO['posy']))
            {
                $this->Pdf->SetY($cell_MODELO['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_MODELO['width'], 0, $cell_MODELO['data'], 0, 0, $cell_MODELO['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_MODELO['width'], 0, $atu_X, $atu_Y, $cell_MODELO['data'], 0, 0, false, true, $cell_MODELO['align']);
            }

            $this->Pdf->SetFont($Label_Serie['font_type'], $Label_Serie['font_style'], $Label_Serie['font_size']);
            $this->pdf_text_color($Label_Serie['data'], $Label_Serie['color_r'], $Label_Serie['color_g'], $Label_Serie['color_b']);
            if (!empty($Label_Serie['posx']) && !empty($Label_Serie['posy']))
            {
                $this->Pdf->SetXY($Label_Serie['posx'], $Label_Serie['posy']);
            }
            elseif (!empty($Label_Serie['posx']))
            {
                $this->Pdf->SetX($Label_Serie['posx']);
            }
            elseif (!empty($Label_Serie['posy']))
            {
                $this->Pdf->SetY($Label_Serie['posy']);
            }
            $this->Pdf->Cell($Label_Serie['width'], 0, $Label_Serie['data'], 0, 0, $Label_Serie['align']);


            $this->Pdf->SetFont($cell_SERIE['font_type'], $cell_SERIE['font_style'], $cell_SERIE['font_size']);
            $this->Pdf->SetTextColor($cell_SERIE['color_r'], $cell_SERIE['color_g'], $cell_SERIE['color_b']);
            if (!empty($cell_SERIE['posx']) && !empty($cell_SERIE['posy']))
            {
                $this->Pdf->SetXY($cell_SERIE['posx'], $cell_SERIE['posy']);
            }
            elseif (!empty($cell_SERIE['posx']))
            {
                $this->Pdf->SetX($cell_SERIE['posx']);
            }
            elseif (!empty($cell_SERIE['posy']))
            {
                $this->Pdf->SetY($cell_SERIE['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_SERIE['width'], 0, $cell_SERIE['data'], 0, 0, $cell_SERIE['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_SERIE['width'], 0, $atu_X, $atu_Y, $cell_SERIE['data'], 0, 0, false, true, $cell_SERIE['align']);
            }

            $this->Pdf->SetFont($Label_Sintome['font_type'], $Label_Sintome['font_style'], $Label_Sintome['font_size']);
            $this->pdf_text_color($Label_Sintome['data'], $Label_Sintome['color_r'], $Label_Sintome['color_g'], $Label_Sintome['color_b']);
            if (!empty($Label_Sintome['posx']) && !empty($Label_Sintome['posy']))
            {
                $this->Pdf->SetXY($Label_Sintome['posx'], $Label_Sintome['posy']);
            }
            elseif (!empty($Label_Sintome['posx']))
            {
                $this->Pdf->SetX($Label_Sintome['posx']);
            }
            elseif (!empty($Label_Sintome['posy']))
            {
                $this->Pdf->SetY($Label_Sintome['posy']);
            }
            $this->Pdf->Cell($Label_Sintome['width'], 0, $Label_Sintome['data'], 0, 0, $Label_Sintome['align']);


            $this->Pdf->SetFont($cell_SINTOMA['font_type'], $cell_SINTOMA['font_style'], $cell_SINTOMA['font_size']);
            $this->Pdf->SetTextColor($cell_SINTOMA['color_r'], $cell_SINTOMA['color_g'], $cell_SINTOMA['color_b']);
            if (!empty($cell_SINTOMA['posx']) && !empty($cell_SINTOMA['posy']))
            {
                $this->Pdf->SetXY($cell_SINTOMA['posx'], $cell_SINTOMA['posy']);
            }
            elseif (!empty($cell_SINTOMA['posx']))
            {
                $this->Pdf->SetX($cell_SINTOMA['posx']);
            }
            elseif (!empty($cell_SINTOMA['posy']))
            {
                $this->Pdf->SetY($cell_SINTOMA['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_SINTOMA['width'], 0, $cell_SINTOMA['data'], 0, 0, $cell_SINTOMA['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_SINTOMA['width'], 0, $atu_X, $atu_Y, $cell_SINTOMA['data'], 0, 0, false, true, $cell_SINTOMA['align']);
            }

            $this->Pdf->SetFont($Label_Obs['font_type'], $Label_Obs['font_style'], $Label_Obs['font_size']);
            $this->pdf_text_color($Label_Obs['data'], $Label_Obs['color_r'], $Label_Obs['color_g'], $Label_Obs['color_b']);
            if (!empty($Label_Obs['posx']) && !empty($Label_Obs['posy']))
            {
                $this->Pdf->SetXY($Label_Obs['posx'], $Label_Obs['posy']);
            }
            elseif (!empty($Label_Obs['posx']))
            {
                $this->Pdf->SetX($Label_Obs['posx']);
            }
            elseif (!empty($Label_Obs['posy']))
            {
                $this->Pdf->SetY($Label_Obs['posy']);
            }
            $this->Pdf->Cell($Label_Obs['width'], 0, $Label_Obs['data'], 0, 0, $Label_Obs['align']);


            $this->Pdf->SetFont($cell_OBS['font_type'], $cell_OBS['font_style'], $cell_OBS['font_size']);
            $this->Pdf->SetTextColor($cell_OBS['color_r'], $cell_OBS['color_g'], $cell_OBS['color_b']);
            if (!empty($cell_OBS['posx']) && !empty($cell_OBS['posy']))
            {
                $this->Pdf->SetXY($cell_OBS['posx'], $cell_OBS['posy']);
            }
            elseif (!empty($cell_OBS['posx']))
            {
                $this->Pdf->SetX($cell_OBS['posx']);
            }
            elseif (!empty($cell_OBS['posy']))
            {
                $this->Pdf->SetY($cell_OBS['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_OBS['width'], 0, $cell_OBS['data'], 0, 0, $cell_OBS['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_OBS['width'], 0, $atu_X, $atu_Y, $cell_OBS['data'], 0, 0, false, true, $cell_OBS['align']);
            }

            $this->Pdf->SetFont($Label_DadosOrcmento['font_type'], $Label_DadosOrcmento['font_style'], $Label_DadosOrcmento['font_size']);
            $this->pdf_text_color($Label_DadosOrcmento['data'], $Label_DadosOrcmento['color_r'], $Label_DadosOrcmento['color_g'], $Label_DadosOrcmento['color_b']);
            if (!empty($Label_DadosOrcmento['posx']) && !empty($Label_DadosOrcmento['posy']))
            {
                $this->Pdf->SetXY($Label_DadosOrcmento['posx'], $Label_DadosOrcmento['posy']);
            }
            elseif (!empty($Label_DadosOrcmento['posx']))
            {
                $this->Pdf->SetX($Label_DadosOrcmento['posx']);
            }
            elseif (!empty($Label_DadosOrcmento['posy']))
            {
                $this->Pdf->SetY($Label_DadosOrcmento['posy']);
            }
            $this->Pdf->Cell($Label_DadosOrcmento['width'], 0, $Label_DadosOrcmento['data'], 0, 0, $Label_DadosOrcmento['align']);

            $this->Pdf->SetFont($Label_DataOrc['font_type'], $Label_DataOrc['font_style'], $Label_DataOrc['font_size']);
            $this->pdf_text_color($Label_DataOrc['data'], $Label_DataOrc['color_r'], $Label_DataOrc['color_g'], $Label_DataOrc['color_b']);
            if (!empty($Label_DataOrc['posx']) && !empty($Label_DataOrc['posy']))
            {
                $this->Pdf->SetXY($Label_DataOrc['posx'], $Label_DataOrc['posy']);
            }
            elseif (!empty($Label_DataOrc['posx']))
            {
                $this->Pdf->SetX($Label_DataOrc['posx']);
            }
            elseif (!empty($Label_DataOrc['posy']))
            {
                $this->Pdf->SetY($Label_DataOrc['posy']);
            }
            $this->Pdf->Cell($Label_DataOrc['width'], 0, $Label_DataOrc['data'], 0, 0, $Label_DataOrc['align']);


            $this->Pdf->SetFont($cell_DATAORC['font_type'], $cell_DATAORC['font_style'], $cell_DATAORC['font_size']);
            $this->Pdf->SetTextColor($cell_DATAORC['color_r'], $cell_DATAORC['color_g'], $cell_DATAORC['color_b']);
            if (!empty($cell_DATAORC['posx']) && !empty($cell_DATAORC['posy']))
            {
                $this->Pdf->SetXY($cell_DATAORC['posx'], $cell_DATAORC['posy']);
            }
            elseif (!empty($cell_DATAORC['posx']))
            {
                $this->Pdf->SetX($cell_DATAORC['posx']);
            }
            elseif (!empty($cell_DATAORC['posy']))
            {
                $this->Pdf->SetY($cell_DATAORC['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_DATAORC['width'], 0, $cell_DATAORC['data'], 0, 0, $cell_DATAORC['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_DATAORC['width'], 0, $atu_X, $atu_Y, $cell_DATAORC['data'], 0, 0, false, true, $cell_DATAORC['align']);
            }

            $this->Pdf->SetFont($Label_Tecnico['font_type'], $Label_Tecnico['font_style'], $Label_Tecnico['font_size']);
            $this->pdf_text_color($Label_Tecnico['data'], $Label_Tecnico['color_r'], $Label_Tecnico['color_g'], $Label_Tecnico['color_b']);
            if (!empty($Label_Tecnico['posx']) && !empty($Label_Tecnico['posy']))
            {
                $this->Pdf->SetXY($Label_Tecnico['posx'], $Label_Tecnico['posy']);
            }
            elseif (!empty($Label_Tecnico['posx']))
            {
                $this->Pdf->SetX($Label_Tecnico['posx']);
            }
            elseif (!empty($Label_Tecnico['posy']))
            {
                $this->Pdf->SetY($Label_Tecnico['posy']);
            }
            $this->Pdf->Cell($Label_Tecnico['width'], 0, $Label_Tecnico['data'], 0, 0, $Label_Tecnico['align']);


            $this->Pdf->SetFont($cell_TECNICO['font_type'], $cell_TECNICO['font_style'], $cell_TECNICO['font_size']);
            $this->Pdf->SetTextColor($cell_TECNICO['color_r'], $cell_TECNICO['color_g'], $cell_TECNICO['color_b']);
            if (!empty($cell_TECNICO['posx']) && !empty($cell_TECNICO['posy']))
            {
                $this->Pdf->SetXY($cell_TECNICO['posx'], $cell_TECNICO['posy']);
            }
            elseif (!empty($cell_TECNICO['posx']))
            {
                $this->Pdf->SetX($cell_TECNICO['posx']);
            }
            elseif (!empty($cell_TECNICO['posy']))
            {
                $this->Pdf->SetY($cell_TECNICO['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_TECNICO['width'], 0, $cell_TECNICO['data'], 0, 0, $cell_TECNICO['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_TECNICO['width'], 0, $atu_X, $atu_Y, $cell_TECNICO['data'], 0, 0, false, true, $cell_TECNICO['align']);
            }

            $this->Pdf->SetFont($Label_Total['font_type'], $Label_Total['font_style'], $Label_Total['font_size']);
            $this->pdf_text_color($Label_Total['data'], $Label_Total['color_r'], $Label_Total['color_g'], $Label_Total['color_b']);
            if (!empty($Label_Total['posx']) && !empty($Label_Total['posy']))
            {
                $this->Pdf->SetXY($Label_Total['posx'], $Label_Total['posy']);
            }
            elseif (!empty($Label_Total['posx']))
            {
                $this->Pdf->SetX($Label_Total['posx']);
            }
            elseif (!empty($Label_Total['posy']))
            {
                $this->Pdf->SetY($Label_Total['posy']);
            }
            $this->Pdf->Cell($Label_Total['width'], 0, $Label_Total['data'], 0, 0, $Label_Total['align']);


            $this->Pdf->SetFont($cell_ORCAMENTO['font_type'], $cell_ORCAMENTO['font_style'], $cell_ORCAMENTO['font_size']);
            $this->Pdf->SetTextColor($cell_ORCAMENTO['color_r'], $cell_ORCAMENTO['color_g'], $cell_ORCAMENTO['color_b']);
            if (!empty($cell_ORCAMENTO['posx']) && !empty($cell_ORCAMENTO['posy']))
            {
                $this->Pdf->SetXY($cell_ORCAMENTO['posx'], $cell_ORCAMENTO['posy']);
            }
            elseif (!empty($cell_ORCAMENTO['posx']))
            {
                $this->Pdf->SetX($cell_ORCAMENTO['posx']);
            }
            elseif (!empty($cell_ORCAMENTO['posy']))
            {
                $this->Pdf->SetY($cell_ORCAMENTO['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_ORCAMENTO['width'], 0, $cell_ORCAMENTO['data'], 0, 0, $cell_ORCAMENTO['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_ORCAMENTO['width'], 0, $atu_X, $atu_Y, $cell_ORCAMENTO['data'], 0, 0, false, true, $cell_ORCAMENTO['align']);
            }

            $this->Pdf->SetFont($Label_Servicos_designado['font_type'], $Label_Servicos_designado['font_style'], $Label_Servicos_designado['font_size']);
            $this->pdf_text_color($Label_Servicos_designado['data'], $Label_Servicos_designado['color_r'], $Label_Servicos_designado['color_g'], $Label_Servicos_designado['color_b']);
            if (!empty($Label_Servicos_designado['posx']) && !empty($Label_Servicos_designado['posy']))
            {
                $this->Pdf->SetXY($Label_Servicos_designado['posx'], $Label_Servicos_designado['posy']);
            }
            elseif (!empty($Label_Servicos_designado['posx']))
            {
                $this->Pdf->SetX($Label_Servicos_designado['posx']);
            }
            elseif (!empty($Label_Servicos_designado['posy']))
            {
                $this->Pdf->SetY($Label_Servicos_designado['posy']);
            }
            $this->Pdf->Cell($Label_Servicos_designado['width'], 0, $Label_Servicos_designado['data'], 0, 0, $Label_Servicos_designado['align']);

            $this->Pdf->SetY(190);
            foreach ($this->servicos[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_Servicos_DESCRICAO['font_type'], $cell_Servicos_DESCRICAO['font_style'], $cell_Servicos_DESCRICAO['font_size']);
                if (!empty($cell_Servicos_DESCRICAO['posx']))
                {
                    $this->Pdf->SetX($cell_Servicos_DESCRICAO['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_Servicos_DESCRICAO['color_r'], $cell_Servicos_DESCRICAO['color_g'], $cell_Servicos_DESCRICAO['color_b']);
                $this->Pdf->writeHTMLCell($cell_Servicos_DESCRICAO['width'], 0, $atu_X, $atu_Y, $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_Servicos_DESCRICAO['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_Servicos_HTEC['font_type'], $cell_Servicos_HTEC['font_style'], $cell_Servicos_HTEC['font_size']);
                if (!empty($cell_Servicos_HTEC['posx']))
                {
                    $this->Pdf->SetX($cell_Servicos_HTEC['posx']);
                }
                $this->pdf_text_color($this->servicos_htec[$this->nm_grid_colunas][$NM_ind], $cell_Servicos_HTEC['color_r'], $cell_Servicos_HTEC['color_g'], $cell_Servicos_HTEC['color_b']);
                $this->Pdf->Cell($cell_Servicos_HTEC['width'], 0, $this->servicos_htec[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_Servicos_HTEC['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 5;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($Label_horastecnicas['font_type'], $Label_horastecnicas['font_style'], $Label_horastecnicas['font_size']);
            $this->pdf_text_color($Label_horastecnicas['data'], $Label_horastecnicas['color_r'], $Label_horastecnicas['color_g'], $Label_horastecnicas['color_b']);
            if (!empty($Label_horastecnicas['posx']) && !empty($Label_horastecnicas['posy']))
            {
                $this->Pdf->SetXY($Label_horastecnicas['posx'], $Label_horastecnicas['posy']);
            }
            elseif (!empty($Label_horastecnicas['posx']))
            {
                $this->Pdf->SetX($Label_horastecnicas['posx']);
            }
            elseif (!empty($Label_horastecnicas['posy']))
            {
                $this->Pdf->SetY($Label_horastecnicas['posy']);
            }
            $this->Pdf->Cell($Label_horastecnicas['width'], 0, $Label_horastecnicas['data'], 0, 0, $Label_horastecnicas['align']);

            $this->Pdf->SetFont($Label_Servicos['font_type'], $Label_Servicos['font_style'], $Label_Servicos['font_size']);
            $this->pdf_text_color($Label_Servicos['data'], $Label_Servicos['color_r'], $Label_Servicos['color_g'], $Label_Servicos['color_b']);
            if (!empty($Label_Servicos['posx']) && !empty($Label_Servicos['posy']))
            {
                $this->Pdf->SetXY($Label_Servicos['posx'], $Label_Servicos['posy']);
            }
            elseif (!empty($Label_Servicos['posx']))
            {
                $this->Pdf->SetX($Label_Servicos['posx']);
            }
            elseif (!empty($Label_Servicos['posy']))
            {
                $this->Pdf->SetY($Label_Servicos['posy']);
            }
            $this->Pdf->Cell($Label_Servicos['width'], 0, $Label_Servicos['data'], 0, 0, $Label_Servicos['align']);

            $this->Pdf->SetFont($Label_aceite['font_type'], $Label_aceite['font_style'], $Label_aceite['font_size']);
            $this->pdf_text_color($Label_aceite['data'], $Label_aceite['color_r'], $Label_aceite['color_g'], $Label_aceite['color_b']);
            if (!empty($Label_aceite['posx']) && !empty($Label_aceite['posy']))
            {
                $this->Pdf->SetXY($Label_aceite['posx'], $Label_aceite['posy']);
            }
            elseif (!empty($Label_aceite['posx']))
            {
                $this->Pdf->SetX($Label_aceite['posx']);
            }
            elseif (!empty($Label_aceite['posy']))
            {
                $this->Pdf->SetY($Label_aceite['posy']);
            }
            $this->Pdf->Cell($Label_aceite['width'], 0, $Label_aceite['data'], 0, 0, $Label_aceite['align']);

            $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
            $NM_dt_sys = html_entity_decode($this->nm_data->FormataSaida('d-m-Y'), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
            $this->Pdf->SetFont($Label_data['font_type'], $Label_data['font_style'], $Label_data['font_size']);
            $this->Pdf->SetTextColor($Label_data['color_r'], $Label_data['color_g'], $Label_data['color_b']);
            if (!empty($Label_data['posx']) && !empty($Label_data['posy']))
            {
                $this->Pdf->SetXY($Label_data['posx'], $Label_data['posy']);
            }
            elseif (!empty($Label_data['posx']))
            {
                $this->Pdf->SetX($Label_data['posx']);
            }
            elseif (!empty($Label_data['posy']))
            {
                $this->Pdf->SetY($Label_data['posy']);
            }
            $this->Pdf->Cell($Label_data['width'], 0, $NM_dt_sys, 0, 0, $Label_data['align']);


            $this->Pdf->SetFont($Label_assinatura['font_type'], $Label_assinatura['font_style'], $Label_assinatura['font_size']);
            $this->pdf_text_color($Label_assinatura['data'], $Label_assinatura['color_r'], $Label_assinatura['color_g'], $Label_assinatura['color_b']);
            if (!empty($Label_assinatura['posx']) && !empty($Label_assinatura['posy']))
            {
                $this->Pdf->SetXY($Label_assinatura['posx'], $Label_assinatura['posy']);
            }
            elseif (!empty($Label_assinatura['posx']))
            {
                $this->Pdf->SetX($Label_assinatura['posx']);
            }
            elseif (!empty($Label_assinatura['posy']))
            {
                $this->Pdf->SetY($Label_assinatura['posy']);
            }
            $this->Pdf->Cell($Label_assinatura['width'], 0, $Label_assinatura['data'], 0, 0, $Label_assinatura['align']);

            $this->Pdf->SetFont($Label_Mensagem['font_type'], $Label_Mensagem['font_style'], $Label_Mensagem['font_size']);
            $this->pdf_text_color($Label_Mensagem['data'], $Label_Mensagem['color_r'], $Label_Mensagem['color_g'], $Label_Mensagem['color_b']);
            if (!empty($Label_Mensagem['posx']) && !empty($Label_Mensagem['posy']))
            {
                $this->Pdf->SetXY($Label_Mensagem['posx'], $Label_Mensagem['posy']);
            }
            elseif (!empty($Label_Mensagem['posx']))
            {
                $this->Pdf->SetX($Label_Mensagem['posx']);
            }
            elseif (!empty($Label_Mensagem['posy']))
            {
                $this->Pdf->SetY($Label_Mensagem['posy']);
            }
            $this->Pdf->Cell($Label_Mensagem['width'], 0, $Label_Mensagem['data'], 0, 0, $Label_Mensagem['align']);
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
