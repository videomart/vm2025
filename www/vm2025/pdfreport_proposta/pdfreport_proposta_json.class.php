<?php

class pdfreport_proposta_json
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   function __construct()
   {
      $this->nm_data = new nm_data("pt_br");
   }


function actionBar_isValidState($buttonName, $buttonState)
{
    switch ($buttonName) {
    }

    return false;
}


function actionBar_displayState($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateHint($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateConfirm($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateDisable($buttonName)
{
    if (isset($this->sc_actionbar_disabled[$buttonName]) && $this->sc_actionbar_disabled[$buttonName]) {
        return ' disabled';
    }

    return '';
}

function actionBar_getStateHide($buttonName)
{
    if (isset($this->sc_actionbar_hidden[$buttonName]) && $this->sc_actionbar_hidden[$buttonName]) {
        return ' sc-actionbar-button-hidden';
    }

    return '';
}

   function monta_json()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Json_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $result_json = json_encode($this->Arr_result, JSON_UNESCAPED_UNICODE);
              if ($result_json == false)
              {
                  $oJson = new Services_JSON();
                  $result_json = $oJson->encode($this->Arr_result);
              }
              echo $result_json;
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['opcao'] = "";
      }
   }

   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_pdfreport_proposta($cadapar[1]);
                   nm_protect_num_pdfreport_proposta($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_proposta']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($nordem)) 
      {
          $_SESSION['nordem'] = $nordem;
          nm_limpa_str_pdfreport_proposta($_SESSION["nordem"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Json_use_label = false;
      $this->Json_format = false;
      $this->Tem_json_res = false;
      $this->Json_password = "";
      if (isset($_REQUEST['nm_json_label']) && !empty($_REQUEST['nm_json_label']))
      {
          $this->Json_use_label = ($_REQUEST['nm_json_label'] == "S") ? true : false;
      }
      if (isset($_REQUEST['nm_json_format']) && !empty($_REQUEST['nm_json_format']))
      {
          $this->Json_format = ($_REQUEST['nm_json_format'] == "S") ? true : false;
      }
      $this->Tem_json_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_json_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "pdfreport_proposta/pdfreport_proposta_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "pdfreport_proposta_total.class.php"); 
      $this->Tot = new pdfreport_proposta_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_proposta']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_return']);
          if ($this->Tem_json_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data = new nm_data("pt_br");
      $this->Arquivo      = "sc_json";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_proposta.zip";
      $this->Arquivo     .= "_pdfreport_proposta";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "pdfreport_proposta.json";
      $this->Tit_zip      = "pdfreport_proposta.zip";
   }

   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->proposta_ordem = (isset($Busca_temp['proposta_ordem'])) ? $Busca_temp['proposta_ordem'] : ""; 
          $tmp_pos = (is_string($this->proposta_ordem)) ? strpos($this->proposta_ordem, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->proposta_ordem))
          {
              $this->proposta_ordem = substr($this->proposta_ordem, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT proposta.ordem as proposta_ordem, proposta.natureza as proposta_natureza, proposta.data as proposta_data, proposta.cliente as proposta_cliente, proposta.condpag as proposta_condpag, proposta.obs as proposta_obs, empresa.ENDERECO as empresa_endereco, empresa.EMAIL as empresa_email, empresa.INSCEST as empresa_inscest, empresa.CEP as empresa_cep, cidade.cidade as cidade_cidade, cidade.uf as cidade_uf, empresa.CNPJ_CPF as empresa_cnpj_cpf, proposta.atencao as proposta_atencao, cidade.ddd as cidade_ddd, proposta.telefone as proposta_telefone, proposta.fax as proposta_fax, proposta.cod_vend as proposta_cod_vend, proposta.total as proposta_total, proposta.LOCAL_ENTREGA as proposta_local_entrega, proposta.TRANSPORTADORA as proposta_transportadora, funcionario.EMAIL as funcionario_email, funcionario.MEU_TELEFONE as funcionario_meu_telefone, proposta.ID as proposta_id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT proposta.ordem as proposta_ordem, proposta.natureza as proposta_natureza, proposta.data as proposta_data, proposta.cliente as proposta_cliente, proposta.condpag as proposta_condpag, proposta.obs as proposta_obs, empresa.ENDERECO as empresa_endereco, empresa.EMAIL as empresa_email, empresa.INSCEST as empresa_inscest, empresa.CEP as empresa_cep, cidade.cidade as cidade_cidade, cidade.uf as cidade_uf, empresa.CNPJ_CPF as empresa_cnpj_cpf, proposta.atencao as proposta_atencao, cidade.ddd as cidade_ddd, proposta.telefone as proposta_telefone, proposta.fax as proposta_fax, proposta.cod_vend as proposta_cod_vend, proposta.total as proposta_total, proposta.LOCAL_ENTREGA as proposta_local_entrega, proposta.TRANSPORTADORA as proposta_transportadora, funcionario.EMAIL as funcionario_email, funcionario.MEU_TELEFONE as funcionario_meu_telefone, proposta.ID as proposta_id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->proposta_ordem = $rs->fields[0] ;  
         $this->proposta_ordem = (string)$this->proposta_ordem;
         $this->proposta_natureza = $rs->fields[1] ;  
         $this->proposta_data = $rs->fields[2] ;  
         $this->proposta_cliente = $rs->fields[3] ;  
         $this->proposta_condpag = $rs->fields[4] ;  
         $this->proposta_obs = $rs->fields[5] ;  
         $this->empresa_endereco = $rs->fields[6] ;  
         $this->empresa_email = $rs->fields[7] ;  
         $this->empresa_inscest = $rs->fields[8] ;  
         $this->empresa_cep = $rs->fields[9] ;  
         $this->cidade_cidade = $rs->fields[10] ;  
         $this->cidade_uf = $rs->fields[11] ;  
         $this->empresa_cnpj_cpf = $rs->fields[12] ;  
         $this->proposta_atencao = $rs->fields[13] ;  
         $this->cidade_ddd = $rs->fields[14] ;  
         $this->proposta_telefone = $rs->fields[15] ;  
         $this->proposta_fax = $rs->fields[16] ;  
         $this->proposta_cod_vend = $rs->fields[17] ;  
         $this->proposta_total = $rs->fields[18] ;  
         $this->proposta_total =  str_replace(",", ".", $this->proposta_total);
         $this->proposta_total = (strpos(strtolower($this->proposta_total), "e")) ? (float)$this->proposta_total : $this->proposta_total; 
         $this->proposta_total = (string)$this->proposta_total;
         $this->proposta_local_entrega = $rs->fields[19] ;  
         $this->proposta_transportadora = $rs->fields[20] ;  
         $this->funcionario_email = $rs->fields[21] ;  
         $this->funcionario_meu_telefone = $rs->fields[22] ;  
         $this->proposta_id = $rs->fields[23] ;  
         $this->proposta_id = (string)$this->proposta_id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->SC_seq_json++;
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['embutida'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->json_registro;
      }
      else
      { 
          $result_json = json_encode($this->json_registro, JSON_UNESCAPED_UNICODE);
          if ($result_json == false)
          {
              $oJson = new Services_JSON();
              $result_json = $oJson->encode($this->json_registro);
          }
          fwrite($json_f, $result_json);
          fclose($json_f);
          if ($this->Tem_json_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "pdfreport_proposta_res_json.class.php");
              $this->Res = new pdfreport_proposta_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_res_grid'] = true;
              $this->Res->monta_json();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Json_password != "" || $this->Tem_json_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Json_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Json_f, ' ')) ? " \"" . $this->Json_f . "\"" :  $this->Json_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Json_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_json_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_res_file']['json'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- proposta_ordem
   function NM_export_proposta_ordem()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_ordem'])) ? $this->New_label['proposta_ordem'] : "ordem"; 
         }
         else
         {
             $SC_Label = "proposta_ordem"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_ordem;
   }
   //----- proposta_natureza
   function NM_export_proposta_natureza()
   {
         if ($this->Json_format)
         {
             if ($this->proposta_natureza !== "&nbsp;") 
             { 
                 $this->proposta_natureza = sc_strtoupper($this->proposta_natureza); 
             } 
         }
         $this->proposta_natureza = NM_charset_to_utf8($this->proposta_natureza);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_natureza'])) ? $this->New_label['proposta_natureza'] : "natureza"; 
         }
         else
         {
             $SC_Label = "proposta_natureza"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_natureza;
   }
   //----- proposta_data
   function NM_export_proposta_data()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->proposta_data;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->proposta_data, "YYYY-MM-DD  ");
                 $this->proposta_data = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_data'])) ? $this->New_label['proposta_data'] : "data"; 
         }
         else
         {
             $SC_Label = "proposta_data"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_data;
   }
   //----- proposta_cliente
   function NM_export_proposta_cliente()
   {
         $this->proposta_cliente = NM_charset_to_utf8($this->proposta_cliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_cliente'])) ? $this->New_label['proposta_cliente'] : "cliente"; 
         }
         else
         {
             $SC_Label = "proposta_cliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_cliente;
   }
   //----- proposta_condpag
   function NM_export_proposta_condpag()
   {
         $this->proposta_condpag = NM_charset_to_utf8($this->proposta_condpag);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_condpag'])) ? $this->New_label['proposta_condpag'] : "condpag"; 
         }
         else
         {
             $SC_Label = "proposta_condpag"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_condpag;
   }
   //----- proposta_obs
   function NM_export_proposta_obs()
   {
         $this->proposta_obs = NM_charset_to_utf8($this->proposta_obs);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_obs'])) ? $this->New_label['proposta_obs'] : "obs"; 
         }
         else
         {
             $SC_Label = "proposta_obs"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_obs;
   }
   //----- empresa_endereco
   function NM_export_empresa_endereco()
   {
         $this->empresa_endereco = NM_charset_to_utf8($this->empresa_endereco);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa_endereco'])) ? $this->New_label['empresa_endereco'] : "ENDERECO"; 
         }
         else
         {
             $SC_Label = "empresa_endereco"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa_endereco;
   }
   //----- empresa_email
   function NM_export_empresa_email()
   {
         $this->empresa_email = NM_charset_to_utf8($this->empresa_email);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa_email'])) ? $this->New_label['empresa_email'] : "EMAIL"; 
         }
         else
         {
             $SC_Label = "empresa_email"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa_email;
   }
   //----- empresa_inscest
   function NM_export_empresa_inscest()
   {
         $this->empresa_inscest = NM_charset_to_utf8($this->empresa_inscest);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa_inscest'])) ? $this->New_label['empresa_inscest'] : "INSCEST"; 
         }
         else
         {
             $SC_Label = "empresa_inscest"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa_inscest;
   }
   //----- empresa_cep
   function NM_export_empresa_cep()
   {
         $this->empresa_cep = NM_charset_to_utf8($this->empresa_cep);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa_cep'])) ? $this->New_label['empresa_cep'] : "CEP"; 
         }
         else
         {
             $SC_Label = "empresa_cep"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa_cep;
   }
   //----- cidade_cidade
   function NM_export_cidade_cidade()
   {
         $this->cidade_cidade = NM_charset_to_utf8($this->cidade_cidade);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cidade_cidade'])) ? $this->New_label['cidade_cidade'] : "cidade"; 
         }
         else
         {
             $SC_Label = "cidade_cidade"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cidade_cidade;
   }
   //----- cidade_uf
   function NM_export_cidade_uf()
   {
         $this->cidade_uf = NM_charset_to_utf8($this->cidade_uf);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cidade_uf'])) ? $this->New_label['cidade_uf'] : "uf"; 
         }
         else
         {
             $SC_Label = "cidade_uf"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cidade_uf;
   }
   //----- empresa_cnpj_cpf
   function NM_export_empresa_cnpj_cpf()
   {
         $this->empresa_cnpj_cpf = NM_charset_to_utf8($this->empresa_cnpj_cpf);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa_cnpj_cpf'])) ? $this->New_label['empresa_cnpj_cpf'] : "CNPJ CPF"; 
         }
         else
         {
             $SC_Label = "empresa_cnpj_cpf"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa_cnpj_cpf;
   }
   //----- proposta_atencao
   function NM_export_proposta_atencao()
   {
         $this->proposta_atencao = NM_charset_to_utf8($this->proposta_atencao);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_atencao'])) ? $this->New_label['proposta_atencao'] : "atencao"; 
         }
         else
         {
             $SC_Label = "proposta_atencao"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_atencao;
   }
   //----- cidade_ddd
   function NM_export_cidade_ddd()
   {
         $this->cidade_ddd = NM_charset_to_utf8($this->cidade_ddd);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cidade_ddd'])) ? $this->New_label['cidade_ddd'] : "ddd"; 
         }
         else
         {
             $SC_Label = "cidade_ddd"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cidade_ddd;
   }
   //----- proposta_telefone
   function NM_export_proposta_telefone()
   {
         $this->proposta_telefone = NM_charset_to_utf8($this->proposta_telefone);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_telefone'])) ? $this->New_label['proposta_telefone'] : "telefone"; 
         }
         else
         {
             $SC_Label = "proposta_telefone"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_telefone;
   }
   //----- proposta_fax
   function NM_export_proposta_fax()
   {
         $this->proposta_fax = NM_charset_to_utf8($this->proposta_fax);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_fax'])) ? $this->New_label['proposta_fax'] : "fax"; 
         }
         else
         {
             $SC_Label = "proposta_fax"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_fax;
   }
   //----- proposta_cod_vend
   function NM_export_proposta_cod_vend()
   {
         $this->proposta_cod_vend = NM_charset_to_utf8($this->proposta_cod_vend);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_cod_vend'])) ? $this->New_label['proposta_cod_vend'] : "cod_vend"; 
         }
         else
         {
             $SC_Label = "proposta_cod_vend"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_cod_vend;
   }
   //----- proposta_total
   function NM_export_proposta_total()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->proposta_total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_total'])) ? $this->New_label['proposta_total'] : "total"; 
         }
         else
         {
             $SC_Label = "proposta_total"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_total;
   }
   //----- proposta_local_entrega
   function NM_export_proposta_local_entrega()
   {
         $this->proposta_local_entrega = NM_charset_to_utf8($this->proposta_local_entrega);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_local_entrega'])) ? $this->New_label['proposta_local_entrega'] : "LOCAL ENTREGA"; 
         }
         else
         {
             $SC_Label = "proposta_local_entrega"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_local_entrega;
   }
   //----- proposta_transportadora
   function NM_export_proposta_transportadora()
   {
         $this->proposta_transportadora = NM_charset_to_utf8($this->proposta_transportadora);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_transportadora'])) ? $this->New_label['proposta_transportadora'] : "TRANSPORTADORA"; 
         }
         else
         {
             $SC_Label = "proposta_transportadora"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_transportadora;
   }
   //----- funcionario_email
   function NM_export_funcionario_email()
   {
         $this->funcionario_email = NM_charset_to_utf8($this->funcionario_email);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['funcionario_email'])) ? $this->New_label['funcionario_email'] : "EMAIL"; 
         }
         else
         {
             $SC_Label = "funcionario_email"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->funcionario_email;
   }
   //----- funcionario_meu_telefone
   function NM_export_funcionario_meu_telefone()
   {
         $this->funcionario_meu_telefone = NM_charset_to_utf8($this->funcionario_meu_telefone);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['funcionario_meu_telefone'])) ? $this->New_label['funcionario_meu_telefone'] : "MEU TELEFONE "; 
         }
         else
         {
             $SC_Label = "funcionario_meu_telefone"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->funcionario_meu_telefone;
   }
   //----- proposta_id
   function NM_export_proposta_id()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->proposta_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proposta_id'])) ? $this->New_label['proposta_id'] : "ID"; 
         }
         else
         {
             $SC_Label = "proposta_id"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proposta_id;
   }
   //----- itensproposta
   function NM_export_itensproposta()
   {
         $this->itensproposta = NM_charset_to_utf8($this->itensproposta);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta'])) ? $this->New_label['itensproposta'] : "ItensProposta"; 
         }
         else
         {
             $SC_Label = "itensproposta"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta;
   }
   //----- itensproposta_subtotal
   function NM_export_itensproposta_subtotal()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->itensproposta_subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta_subtotal'])) ? $this->New_label['itensproposta_subtotal'] : "SubTotal"; 
         }
         else
         {
             $SC_Label = "itensproposta_subtotal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta_subtotal;
   }
   //----- itensproposta_descricao
   function NM_export_itensproposta_descricao()
   {
         $this->itensproposta_descricao = NM_charset_to_utf8($this->itensproposta_descricao);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta_descricao'])) ? $this->New_label['itensproposta_descricao'] : "descricao"; 
         }
         else
         {
             $SC_Label = "itensproposta_descricao"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta_descricao;
   }
   //----- itensproposta_modelo
   function NM_export_itensproposta_modelo()
   {
         $this->itensproposta_modelo = NM_charset_to_utf8($this->itensproposta_modelo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta_modelo'])) ? $this->New_label['itensproposta_modelo'] : "modelo"; 
         }
         else
         {
             $SC_Label = "itensproposta_modelo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta_modelo;
   }
   //----- itensproposta_qty
   function NM_export_itensproposta_qty()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->itensproposta_qty, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta_qty'])) ? $this->New_label['itensproposta_qty'] : "qty"; 
         }
         else
         {
             $SC_Label = "itensproposta_qty"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta_qty;
   }
   //----- itensproposta_unit
   function NM_export_itensproposta_unit()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->itensproposta_unit, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta_unit'])) ? $this->New_label['itensproposta_unit'] : "Unit "; 
         }
         else
         {
             $SC_Label = "itensproposta_unit"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta_unit;
   }
   //----- itensproposta_vdesconto
   function NM_export_itensproposta_vdesconto()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->itensproposta_vdesconto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta_vdesconto'])) ? $this->New_label['itensproposta_vdesconto'] : "V DESCONTO"; 
         }
         else
         {
             $SC_Label = "itensproposta_vdesconto"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta_vdesconto;
   }
   //----- itensproposta_vunitario
   function NM_export_itensproposta_vunitario()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->itensproposta_vunitario, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['itensproposta_vunitario'])) ? $this->New_label['itensproposta_vunitario'] : "V Unitario "; 
         }
         else
         {
             $SC_Label = "itensproposta_vunitario"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->itensproposta_vunitario;
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Sistema Videomart 2020 :: JSON</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">JSON</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="pdfreport_proposta_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_proposta"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_proposta']['json_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
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
