<?php

class Ordem_de_Servico_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['opcao'] = "";
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
                   nm_limpa_str_Ordem_de_Servico($cadapar[1]);
                   nm_protect_num_Ordem_de_Servico($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['Ordem_de_Servico']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($osnumb)) 
      {
          $_SESSION['osnumb'] = $osnumb;
          nm_limpa_str_Ordem_de_Servico($_SESSION["osnumb"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "Ordem_de_Servico/Ordem_de_Servico_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "Ordem_de_Servico_total.class.php"); 
      $this->Tot = new Ordem_de_Servico_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['Ordem_de_Servico']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_Ordem_de_Servico.zip";
      $this->Arquivo     .= "_Ordem_de_Servico";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "Ordem_de_Servico.json";
      $this->Tit_zip      = "Ordem_de_Servico.zip";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id = (isset($Busca_temp['id'])) ? $Busca_temp['id'] : ""; 
          $tmp_pos = (is_string($this->id)) ? strpos($this->id, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->id))
          {
              $this->id = substr($this->id, 0, $tmp_pos);
          }
          $this->osnumber = (isset($Busca_temp['osnumber'])) ? $Busca_temp['osnumber'] : ""; 
          $tmp_pos = (is_string($this->osnumber)) ? strpos($this->osnumber, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->osnumber))
          {
              $this->osnumber = substr($this->osnumber, 0, $tmp_pos);
          }
          $this->data = (isset($Busca_temp['data'])) ? $Busca_temp['data'] : ""; 
          $tmp_pos = (is_string($this->data)) ? strpos($this->data, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->data))
          {
              $this->data = substr($this->data, 0, $tmp_pos);
          }
          $this->classe = (isset($Busca_temp['classe'])) ? $Busca_temp['classe'] : ""; 
          $tmp_pos = (is_string($this->classe)) ? strpos($this->classe, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->classe))
          {
              $this->classe = substr($this->classe, 0, $tmp_pos);
          }
          $this->marca = (isset($Busca_temp['marca'])) ? $Busca_temp['marca'] : ""; 
          $tmp_pos = (is_string($this->marca)) ? strpos($this->marca, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->marca))
          {
              $this->marca = substr($this->marca, 0, $tmp_pos);
          }
          $this->modelo = (isset($Busca_temp['modelo'])) ? $Busca_temp['modelo'] : ""; 
          $tmp_pos = (is_string($this->modelo)) ? strpos($this->modelo, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->modelo))
          {
              $this->modelo = substr($this->modelo, 0, $tmp_pos);
          }
          $this->serie = (isset($Busca_temp['serie'])) ? $Busca_temp['serie'] : ""; 
          $tmp_pos = (is_string($this->serie)) ? strpos($this->serie, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->serie))
          {
              $this->serie = substr($this->serie, 0, $tmp_pos);
          }
          $this->natureza = (isset($Busca_temp['natureza'])) ? $Busca_temp['natureza'] : ""; 
          $tmp_pos = (is_string($this->natureza)) ? strpos($this->natureza, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->natureza))
          {
              $this->natureza = substr($this->natureza, 0, $tmp_pos);
          }
          $this->sintoma = (isset($Busca_temp['sintoma'])) ? $Busca_temp['sintoma'] : ""; 
          $tmp_pos = (is_string($this->sintoma)) ? strpos($this->sintoma, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->sintoma))
          {
              $this->sintoma = substr($this->sintoma, 0, $tmp_pos);
          }
          $this->status = (isset($Busca_temp['status'])) ? $Busca_temp['status'] : ""; 
          $tmp_pos = (is_string($this->status)) ? strpos($this->status, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->status))
          {
              $this->status = substr($this->status, 0, $tmp_pos);
          }
          $this->recepcao = (isset($Busca_temp['recepcao'])) ? $Busca_temp['recepcao'] : ""; 
          $tmp_pos = (is_string($this->recepcao)) ? strpos($this->recepcao, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->recepcao))
          {
              $this->recepcao = substr($this->recepcao, 0, $tmp_pos);
          }
          $this->dataorc = (isset($Busca_temp['dataorc'])) ? $Busca_temp['dataorc'] : ""; 
          $tmp_pos = (is_string($this->dataorc)) ? strpos($this->dataorc, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->dataorc))
          {
              $this->dataorc = substr($this->dataorc, 0, $tmp_pos);
          }
          $this->maoobra = (isset($Busca_temp['maoobra'])) ? $Busca_temp['maoobra'] : ""; 
          $tmp_pos = (is_string($this->maoobra)) ? strpos($this->maoobra, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->maoobra))
          {
              $this->maoobra = substr($this->maoobra, 0, $tmp_pos);
          }
          $this->material = (isset($Busca_temp['material'])) ? $Busca_temp['material'] : ""; 
          $tmp_pos = (is_string($this->material)) ? strpos($this->material, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->material))
          {
              $this->material = substr($this->material, 0, $tmp_pos);
          }
          $this->orcamento = (isset($Busca_temp['orcamento'])) ? $Busca_temp['orcamento'] : ""; 
          $tmp_pos = (is_string($this->orcamento)) ? strpos($this->orcamento, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->orcamento))
          {
              $this->orcamento = substr($this->orcamento, 0, $tmp_pos);
          }
          $this->pendencia = (isset($Busca_temp['pendencia'])) ? $Busca_temp['pendencia'] : ""; 
          $tmp_pos = (is_string($this->pendencia)) ? strpos($this->pendencia, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->pendencia))
          {
              $this->pendencia = substr($this->pendencia, 0, $tmp_pos);
          }
          $this->tecnico = (isset($Busca_temp['tecnico'])) ? $Busca_temp['tecnico'] : ""; 
          $tmp_pos = (is_string($this->tecnico)) ? strpos($this->tecnico, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->tecnico))
          {
              $this->tecnico = substr($this->tecnico, 0, $tmp_pos);
          }
          $this->saida = (isset($Busca_temp['saida'])) ? $Busca_temp['saida'] : ""; 
          $tmp_pos = (is_string($this->saida)) ? strpos($this->saida, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->saida))
          {
              $this->saida = substr($this->saida, 0, $tmp_pos);
          }
          $this->obs = (isset($Busca_temp['obs'])) ? $Busca_temp['obs'] : ""; 
          $tmp_pos = (is_string($this->obs)) ? strpos($this->obs, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->obs))
          {
              $this->obs = substr($this->obs, 0, $tmp_pos);
          }
          $this->empresa = (isset($Busca_temp['empresa'])) ? $Busca_temp['empresa'] : ""; 
          $tmp_pos = (is_string($this->empresa)) ? strpos($this->empresa, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->empresa))
          {
              $this->empresa = substr($this->empresa, 0, $tmp_pos);
          }
          $this->telefone = (isset($Busca_temp['telefone'])) ? $Busca_temp['telefone'] : ""; 
          $tmp_pos = (is_string($this->telefone)) ? strpos($this->telefone, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->telefone))
          {
              $this->telefone = substr($this->telefone, 0, $tmp_pos);
          }
          $this->contato = (isset($Busca_temp['contato'])) ? $Busca_temp['contato'] : ""; 
          $tmp_pos = (is_string($this->contato)) ? strpos($this->contato, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->contato))
          {
              $this->contato = substr($this->contato, 0, $tmp_pos);
          }
          $this->descricao = (isset($Busca_temp['descricao'])) ? $Busca_temp['descricao'] : ""; 
          $tmp_pos = (is_string($this->descricao)) ? strpos($this->descricao, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->descricao))
          {
              $this->descricao = substr($this->descricao, 0, $tmp_pos);
          }
          $this->endereco = (isset($Busca_temp['endereco'])) ? $Busca_temp['endereco'] : ""; 
          $tmp_pos = (is_string($this->endereco)) ? strpos($this->endereco, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->endereco))
          {
              $this->endereco = substr($this->endereco, 0, $tmp_pos);
          }
          $this->email = (isset($Busca_temp['email'])) ? $Busca_temp['email'] : ""; 
          $tmp_pos = (is_string($this->email)) ? strpos($this->email, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->email))
          {
              $this->email = substr($this->email, 0, $tmp_pos);
          }
          $this->servicos = (isset($Busca_temp['servicos'])) ? $Busca_temp['servicos'] : ""; 
          $tmp_pos = (is_string($this->servicos)) ? strpos($this->servicos, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->servicos))
          {
              $this->servicos = substr($this->servicos, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['embutida'])
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
          $nmgp_select = "SELECT ID, OSNUMBER, DATA, CLASSE, MARCA, MODELO, SERIE, NATUREZA, SINTOMA, STATUS, RECEPCAO, DATAORC, MAOOBRA, MATERIAL, ORCAMENTO, PENDENCIA, TECNICO, SAIDA, OBS, EMPRESA, TELEFONE, CONTATO, DESCRICAO, ENDERECO, EMAIL from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT ID, OSNUMBER, DATA, CLASSE, MARCA, MODELO, SERIE, NATUREZA, SINTOMA, STATUS, RECEPCAO, DATAORC, MAOOBRA, MATERIAL, ORCAMENTO, PENDENCIA, TECNICO, SAIDA, OBS, EMPRESA, TELEFONE, CONTATO, DESCRICAO, ENDERECO, EMAIL from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->id = $rs->fields[0] ;  
         $this->id = (string)$this->id;
         $this->osnumber = $rs->fields[1] ;  
         $this->data = $rs->fields[2] ;  
         $this->classe = $rs->fields[3] ;  
         $this->marca = $rs->fields[4] ;  
         $this->modelo = $rs->fields[5] ;  
         $this->serie = $rs->fields[6] ;  
         $this->natureza = $rs->fields[7] ;  
         $this->sintoma = $rs->fields[8] ;  
         $this->status = $rs->fields[9] ;  
         $this->recepcao = $rs->fields[10] ;  
         $this->dataorc = $rs->fields[11] ;  
         $this->maoobra = $rs->fields[12] ;  
         $this->maoobra =  str_replace(",", ".", $this->maoobra);
         $this->maoobra = (strpos(strtolower($this->maoobra), "e")) ? (float)$this->maoobra : $this->maoobra; 
         $this->maoobra = (string)$this->maoobra;
         $this->material = $rs->fields[13] ;  
         $this->material =  str_replace(",", ".", $this->material);
         $this->material = (strpos(strtolower($this->material), "e")) ? (float)$this->material : $this->material; 
         $this->material = (string)$this->material;
         $this->orcamento = $rs->fields[14] ;  
         $this->orcamento =  str_replace(",", ".", $this->orcamento);
         $this->orcamento = (strpos(strtolower($this->orcamento), "e")) ? (float)$this->orcamento : $this->orcamento; 
         $this->orcamento = (string)$this->orcamento;
         $this->pendencia = $rs->fields[15] ;  
         $this->tecnico = $rs->fields[16] ;  
         $this->saida = $rs->fields[17] ;  
         $this->obs = $rs->fields[18] ;  
         $this->empresa = $rs->fields[19] ;  
         $this->telefone = $rs->fields[20] ;  
         $this->contato = $rs->fields[21] ;  
         $this->descricao = $rs->fields[22] ;  
         $this->endereco = $rs->fields[23] ;  
         $this->email = $rs->fields[24] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "Ordem_de_Servico_res_json.class.php");
              $this->Res = new Ordem_de_Servico_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- id
   function NM_export_id()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : "ID "; 
         }
         else
         {
             $SC_Label = "id"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->id;
   }
   //----- osnumber
   function NM_export_osnumber()
   {
         $this->osnumber = NM_charset_to_utf8($this->osnumber);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['osnumber'])) ? $this->New_label['osnumber'] : "OSNUMBER "; 
         }
         else
         {
             $SC_Label = "osnumber"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->osnumber;
   }
   //----- data
   function NM_export_data()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->data;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->data, "YYYY-MM-DD  ");
                 $this->data = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['data'])) ? $this->New_label['data'] : "DATA "; 
         }
         else
         {
             $SC_Label = "data"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->data;
   }
   //----- classe
   function NM_export_classe()
   {
         $this->classe = NM_charset_to_utf8($this->classe);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['classe'])) ? $this->New_label['classe'] : "CLASSE "; 
         }
         else
         {
             $SC_Label = "classe"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->classe;
   }
   //----- marca
   function NM_export_marca()
   {
         $this->marca = NM_charset_to_utf8($this->marca);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['marca'])) ? $this->New_label['marca'] : "MARCA "; 
         }
         else
         {
             $SC_Label = "marca"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->marca;
   }
   //----- modelo
   function NM_export_modelo()
   {
         $this->modelo = NM_charset_to_utf8($this->modelo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['modelo'])) ? $this->New_label['modelo'] : "MODELO "; 
         }
         else
         {
             $SC_Label = "modelo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->modelo;
   }
   //----- serie
   function NM_export_serie()
   {
         $this->serie = NM_charset_to_utf8($this->serie);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['serie'])) ? $this->New_label['serie'] : "SERIE "; 
         }
         else
         {
             $SC_Label = "serie"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->serie;
   }
   //----- natureza
   function NM_export_natureza()
   {
         $this->natureza = NM_charset_to_utf8($this->natureza);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['natureza'])) ? $this->New_label['natureza'] : "NATUREZA "; 
         }
         else
         {
             $SC_Label = "natureza"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->natureza;
   }
   //----- sintoma
   function NM_export_sintoma()
   {
         $this->sintoma = NM_charset_to_utf8($this->sintoma);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['sintoma'])) ? $this->New_label['sintoma'] : "SINTOMA "; 
         }
         else
         {
             $SC_Label = "sintoma"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->sintoma;
   }
   //----- status
   function NM_export_status()
   {
         $this->status = NM_charset_to_utf8($this->status);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['status'])) ? $this->New_label['status'] : "STATUS "; 
         }
         else
         {
             $SC_Label = "status"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->status;
   }
   //----- recepcao
   function NM_export_recepcao()
   {
         $this->recepcao = NM_charset_to_utf8($this->recepcao);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['recepcao'])) ? $this->New_label['recepcao'] : "RECEPCAO "; 
         }
         else
         {
             $SC_Label = "recepcao"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->recepcao;
   }
   //----- dataorc
   function NM_export_dataorc()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->dataorc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->dataorc, "YYYY-MM-DD  ");
                 $this->dataorc = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dataorc'])) ? $this->New_label['dataorc'] : "DATAORC "; 
         }
         else
         {
             $SC_Label = "dataorc"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dataorc;
   }
   //----- maoobra
   function NM_export_maoobra()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->maoobra, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['maoobra'])) ? $this->New_label['maoobra'] : "MAOOBRA "; 
         }
         else
         {
             $SC_Label = "maoobra"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->maoobra;
   }
   //----- material
   function NM_export_material()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->material, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['material'])) ? $this->New_label['material'] : "MATERIAL "; 
         }
         else
         {
             $SC_Label = "material"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->material;
   }
   //----- orcamento
   function NM_export_orcamento()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->orcamento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['orcamento'])) ? $this->New_label['orcamento'] : "ORCAMENTO "; 
         }
         else
         {
             $SC_Label = "orcamento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->orcamento;
   }
   //----- pendencia
   function NM_export_pendencia()
   {
         $this->pendencia = NM_charset_to_utf8($this->pendencia);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pendencia'])) ? $this->New_label['pendencia'] : "PENDENCIA "; 
         }
         else
         {
             $SC_Label = "pendencia"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pendencia;
   }
   //----- tecnico
   function NM_export_tecnico()
   {
         $this->tecnico = NM_charset_to_utf8($this->tecnico);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tecnico'])) ? $this->New_label['tecnico'] : "TECNICO "; 
         }
         else
         {
             $SC_Label = "tecnico"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tecnico;
   }
   //----- saida
   function NM_export_saida()
   {
         if ($this->Json_format)
         {
             if (substr($this->saida, 10, 1) == "-") 
             { 
                 $this->saida = substr($this->saida, 0, 10) . " " . substr($this->saida, 11);
             } 
             if (substr($this->saida, 13, 1) == ".") 
             { 
                $this->saida = substr($this->saida, 0, 13) . ":" . substr($this->saida, 14, 2) . ":" . substr($this->saida, 17);
             } 
             $conteudo_x =  $this->saida;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->saida, "YYYY-MM-DD HH:II:SS  ");
                 $this->saida = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['saida'])) ? $this->New_label['saida'] : "SAIDA "; 
         }
         else
         {
             $SC_Label = "saida"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->saida;
   }
   //----- obs
   function NM_export_obs()
   {
         $this->obs = NM_charset_to_utf8($this->obs);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['obs'])) ? $this->New_label['obs'] : "OBS "; 
         }
         else
         {
             $SC_Label = "obs"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->obs;
   }
   //----- empresa
   function NM_export_empresa()
   {
         $this->empresa = NM_charset_to_utf8($this->empresa);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa'])) ? $this->New_label['empresa'] : "EMPRESA "; 
         }
         else
         {
             $SC_Label = "empresa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa;
   }
   //----- telefone
   function NM_export_telefone()
   {
         $this->telefone = NM_charset_to_utf8($this->telefone);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['telefone'])) ? $this->New_label['telefone'] : "TELEFONE "; 
         }
         else
         {
             $SC_Label = "telefone"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->telefone;
   }
   //----- contato
   function NM_export_contato()
   {
         $this->contato = NM_charset_to_utf8($this->contato);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['contato'])) ? $this->New_label['contato'] : "CONTATO "; 
         }
         else
         {
             $SC_Label = "contato"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->contato;
   }
   //----- descricao
   function NM_export_descricao()
   {
         $this->descricao = NM_charset_to_utf8($this->descricao);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['descricao'])) ? $this->New_label['descricao'] : "DESCRICAO "; 
         }
         else
         {
             $SC_Label = "descricao"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->descricao;
   }
   //----- endereco
   function NM_export_endereco()
   {
         $this->endereco = NM_charset_to_utf8($this->endereco);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['endereco'])) ? $this->New_label['endereco'] : "ENDERECO "; 
         }
         else
         {
             $SC_Label = "endereco"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->endereco;
   }
   //----- email
   function NM_export_email()
   {
         $this->email = NM_charset_to_utf8($this->email);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : "EMAIL "; 
         }
         else
         {
             $SC_Label = "email"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->email;
   }
   //----- servicos
   function NM_export_servicos()
   {
         $this->servicos = NM_charset_to_utf8($this->servicos);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['servicos'])) ? $this->New_label['servicos'] : "Servicos"; 
         }
         else
         {
             $SC_Label = "servicos"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->servicos;
   }
   //----- servicos_descricao
   function NM_export_servicos_descricao()
   {
         $this->servicos_descricao = NM_charset_to_utf8($this->servicos_descricao);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['servicos_descricao'])) ? $this->New_label['servicos_descricao'] : "DESCRICAO "; 
         }
         else
         {
             $SC_Label = "servicos_descricao"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->servicos_descricao;
   }
   //----- servicos_htec
   function NM_export_servicos_htec()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->servicos_htec, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['servicos_htec'])) ? $this->New_label['servicos_htec'] : "HTEC "; 
         }
         else
         {
             $SC_Label = "servicos_htec"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->servicos_htec;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="Ordem_de_Servico_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="Ordem_de_Servico"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['Ordem_de_Servico']['json_return']); ?>"> 
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
