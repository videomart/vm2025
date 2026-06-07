<?php

class consulta_fatura_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("pt_br");
      $this->Texto_tag = "";
   }


function actionBar_isValidState($buttonName, $buttonState)
{
    return false;
}

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
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
                   nm_limpa_str_consulta_fatura($cadapar[1]);
                   nm_protect_num_consulta_fatura($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['consulta_fatura']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($ordem)) 
      {
          $_SESSION['ordem'] = $ordem;
          nm_limpa_str_consulta_fatura($_SESSION["ordem"]);
      }
      if (isset($usr_login)) 
      {
          $_SESSION['usr_login'] = $usr_login;
          nm_limpa_str_consulta_fatura($_SESSION["usr_login"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "consulta_fatura_total.class.php"); 
      $this->Tot      = new consulta_fatura_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['consulta_fatura']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $this->Teste_validade = new NM_Valida;
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_consulta_fatura";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "consulta_fatura.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['campos_busca'];
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
          $this->cliente = (isset($Busca_temp['cliente'])) ? $Busca_temp['cliente'] : ""; 
          $tmp_pos = (is_string($this->cliente)) ? strpos($this->cliente, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->atencao = (isset($Busca_temp['atencao'])) ? $Busca_temp['atencao'] : ""; 
          $tmp_pos = (is_string($this->atencao)) ? strpos($this->atencao, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->atencao))
          {
              $this->atencao = substr($this->atencao, 0, $tmp_pos);
          }
          $this->natureza = (isset($Busca_temp['natureza'])) ? $Busca_temp['natureza'] : ""; 
          $tmp_pos = (is_string($this->natureza)) ? strpos($this->natureza, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->natureza))
          {
              $this->natureza = substr($this->natureza, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['consulta_fatura']['contr_erro'] = 'on';
  $check_sql = "SELECT CNPJ,EMPRESA, ENDERECO"
   . " FROM setup"
   . " WHERE 1";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 



if (isset($this->rs[0][0]))     
{
    $this->cnpj = $this->rs[0][0];
	$this->endereco_vm  = $this->rs[0][1];
 
}



echo <<<HTML


<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family="Poppins, sans-serif" rel="stylesheet">
		
        
        <style>
		  
          <link href="https://fonts.googleapis.com/css?family="Poppins" rel="stylesheet">
        body {
            background-color: #f0f6ff;
            font-family: 'Poppins', sans-serif;
        }        
			
		
        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 50px;         
        
        
        }
        ul {
            list-style: none;
        }
        table.invoice {
            width: 100%;
            margin-top: 50px; 
            border-collapse: collapse;
            background-color: #1c79d5;
        }
        table.invoice thead tr {
             background-color: #1c79d5;
            color: white;        
         
        }
        table.invoice thead  th {
            padding: 10px;
          
        }
        table.invoice tbody tr:nth-child(odd) {
            background-color: white;
        }
        table.invoice tbody tr:nth-child(even) {
            background-color: lightgray;
        }
        table.invoice tbody td {
            padding: 10px;
        }
          
            .rodape {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            box-sizing: border-box; 
            border: 2px solid #e9e9e9; 
            border-radius: 20px;
            background-color: #fdfdfd;
        }
        .rodape ul {
            list-style-type: none;
            padding: 10px;
            margin: 20px;
            width: 45%;
           
        }      
          
          .borda{  padding: 10px;
        border: 2px solid #e9e9e9; 
        box-sizing: border-box;
        border-radius: 20px;
        background-color: #fdfdfd;
        }  
          
          
     
        .h1, .h2, .h3, .h4, .h5, .h6, body, h1, h2, h3, h4, h5, h6, html {
            font-weight: 300;
        }
        .text-right li {
            font-size: medium;
        }
    </style>
      
      

HTML;
$_SESSION['scriptcase']['consulta_fatura']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : "ID"; 
          if ($Cada_col == "id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
          if ($Cada_col == "cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['atencao'])) ? $this->New_label['atencao'] : "Atencao"; 
          if ($Cada_col == "atencao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['natureza'])) ? $this->New_label['natureza'] : "Natureza"; 
          if ($Cada_col == "natureza" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : "Email"; 
          if ($Cada_col == "email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['data'])) ? $this->New_label['data'] : "Data"; 
          if ($Cada_col == "data" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefone'])) ? $this->New_label['telefone'] : "Telefone"; 
          if ($Cada_col == "telefone" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_vend'])) ? $this->New_label['cod_vend'] : "Cod Vend"; 
          if ($Cada_col == "cod_vend" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['previsao'])) ? $this->New_label['previsao'] : "Previsao"; 
          if ($Cada_col == "previsao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['desconto'])) ? $this->New_label['desconto'] : "Desconto"; 
          if ($Cada_col == "desconto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['condpag'])) ? $this->New_label['condpag'] : "Condpag"; 
          if ($Cada_col == "condpag" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obs'])) ? $this->New_label['obs'] : "Obs"; 
          if ($Cada_col == "obs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['header'])) ? $this->New_label['header'] : "HEADER"; 
          if ($Cada_col == "header" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['transportadora'])) ? $this->New_label['transportadora'] : "TRANSPORTADORA"; 
          if ($Cada_col == "transportadora" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['local_entrega'])) ? $this->New_label['local_entrega'] : "LOCAL ENTREGA"; 
          if ($Cada_col == "local_entrega" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['itenspedido'])) ? $this->New_label['itenspedido'] : "ItensPedido"; 
          if ($Cada_col == "itenspedido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_desconto'])) ? $this->New_label['valor_desconto'] : "Valor_Desconto"; 
          if ($Cada_col == "valor_desconto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cnpj'])) ? $this->New_label['cnpj'] : "CNPJ"; 
          if ($Cada_col == "cnpj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['endereco_vm'])) ? $this->New_label['endereco_vm'] : "Endereco_VM"; 
          if ($Cada_col == "endereco_vm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT ID, cliente, atencao, natureza, email, data, telefone, cod_vend, previsao, total, desconto, condpag, obs, HEADER, TRANSPORTADORA, LOCAL_ENTREGA from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT ID, cliente, atencao, natureza, email, data, telefone, cod_vend, previsao, total, desconto, condpag, obs, HEADER, TRANSPORTADORA, LOCAL_ENTREGA from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['order_grid'];
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
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->id = $rs->fields[0] ;  
         $this->id = (string)$this->id;
         $this->cliente = $rs->fields[1] ;  
         $this->atencao = $rs->fields[2] ;  
         $this->natureza = $rs->fields[3] ;  
         $this->email = $rs->fields[4] ;  
         $this->data = $rs->fields[5] ;  
         $this->telefone = $rs->fields[6] ;  
         $this->cod_vend = $rs->fields[7] ;  
         $this->previsao = $rs->fields[8] ;  
         $this->previsao = (string)$this->previsao;
         $this->total = $rs->fields[9] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->desconto = $rs->fields[10] ;  
         $this->desconto =  str_replace(",", ".", $this->desconto);
         $this->desconto = (strpos(strtolower($this->desconto), "e")) ? (float)$this->desconto : $this->desconto; 
         $this->desconto = (string)$this->desconto;
         $this->condpag = $rs->fields[11] ;  
         $this->obs = $rs->fields[12] ;  
         $this->header = $rs->fields[13] ;  
         $this->transportadora = $rs->fields[14] ;  
         $this->local_entrega = $rs->fields[15] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['consulta_fatura']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($_SESSION['email_usuario'])) {$_SESSION['email_usuario'] = "";}
if (!isset($this->sc_temp_email_usuario)) {$this->sc_temp_email_usuario = (isset($_SESSION['email_usuario'])) ? $_SESSION['email_usuario'] : "";}
  $str = "";

$check_sql = "SELECT MODELO, DESCRICAO, QTY, FORMAT(UNIT,2),   FORMAT(SUBTOTAL,2) as toal FROM itemproposta INNER JOIN proposta ON itemproposta.ID_PROPOSTA = proposta.ID WHERE ID_PROPOSTA = '" .$this->id  ."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


if ($this->rs  !== false) {  
    for ($i = 0; $i < count($this->rs ); $i++) {
        $str .= " <tr>
		         <td>" . ($i +1) . "</td>
                 <td>" . $this->rs [$i][0] . "</td>
                 <td>" . $this->rs [$i][1] . "</td>   
				 <td>" . $this->rs [$i][2] . "</td> 
			     <td>" . $this->rs [$i][3] . "</td> 
			     <td>" . $this->rs [$i][4] . "</td>
                 </tr>";
    }
    $this->itenspedido  = $str;
}
$this->valor_desconto  = $this->total -$this->desconto ;







$check_sql = "SELECT EMAIL"
   . " FROM funcionario"
   . " WHERE USUARIO= '" . $this->sc_temp_usr_login. "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

$email_usuario='';

if (isset($this->rs[0][0]))     
{
    $email_usuario = $this->rs[0][0];
 
}

 if (isset($email_usuario)) {$this->sc_temp_email_usuario = $email_usuario;}
;


$check_sql = "SELECT CNPJ, ENDERECO "
   . " FROM setup"
   . " WHERE 1";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 



if (isset($this->rs[0][0]))     
{
    $this->cnpj = $this->rs[0][0];
	$endereco  = $this->rs[0][1];
 
}
if (isset($this->sc_temp_email_usuario)) {$_SESSION['email_usuario'] = $this->sc_temp_email_usuario;}
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['consulta_fatura']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- id
   function NM_export_id()
   {
         $this->id = html_entity_decode($this->id, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->id = strip_tags($this->id);
         $this->id = NM_charset_to_utf8($this->id);
         $this->id = str_replace('<', '&lt;', $this->id);
         $this->id = str_replace('>', '&gt;', $this->id);
         $this->Texto_tag .= "<td>" . $this->id . "</td>\r\n";
   }
   //----- cliente
   function NM_export_cliente()
   {
             if ($this->cliente !== "&nbsp;") 
             { 
                 $this->cliente =  sc_strtolower($this->cliente); 
                 $this->cliente = ucwords($this->cliente); 
             } 
         $this->cliente = html_entity_decode($this->cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cliente = strip_tags($this->cliente);
         $this->cliente = NM_charset_to_utf8($this->cliente);
         $this->cliente = str_replace('<', '&lt;', $this->cliente);
         $this->cliente = str_replace('>', '&gt;', $this->cliente);
         $this->Texto_tag .= "<td>" . $this->cliente . "</td>\r\n";
   }
   //----- atencao
   function NM_export_atencao()
   {
             if ($this->atencao !== "&nbsp;") 
             { 
                 $this->atencao =  sc_strtolower($this->atencao); 
                 $this->atencao = ucwords($this->atencao); 
             } 
         $this->atencao = html_entity_decode($this->atencao, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->atencao = strip_tags($this->atencao);
         $this->atencao = NM_charset_to_utf8($this->atencao);
         $this->atencao = str_replace('<', '&lt;', $this->atencao);
         $this->atencao = str_replace('>', '&gt;', $this->atencao);
         $this->Texto_tag .= "<td>" . $this->atencao . "</td>\r\n";
   }
   //----- natureza
   function NM_export_natureza()
   {
             if ($this->natureza !== "&nbsp;") 
             { 
                 $this->natureza = sc_strtoupper($this->natureza); 
             } 
         $this->natureza = html_entity_decode($this->natureza, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->natureza = strip_tags($this->natureza);
         $this->natureza = NM_charset_to_utf8($this->natureza);
         $this->natureza = str_replace('<', '&lt;', $this->natureza);
         $this->natureza = str_replace('>', '&gt;', $this->natureza);
         $this->Texto_tag .= "<td>" . $this->natureza . "</td>\r\n";
   }
   //----- email
   function NM_export_email()
   {
         $this->email = html_entity_decode($this->email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->email = strip_tags($this->email);
         $this->email = NM_charset_to_utf8($this->email);
         $this->email = str_replace('<', '&lt;', $this->email);
         $this->email = str_replace('>', '&gt;', $this->email);
         $this->Texto_tag .= "<td>" . $this->email . "</td>\r\n";
   }
   //----- data
   function NM_export_data()
   {
             $conteudo_x =  $this->data;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->data, "YYYY-MM-DD  ");
                 $this->data = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->data = NM_charset_to_utf8($this->data);
         $this->data = str_replace('<', '&lt;', $this->data);
         $this->data = str_replace('>', '&gt;', $this->data);
         $this->Texto_tag .= "<td>" . $this->data . "</td>\r\n";
   }
   //----- telefone
   function NM_export_telefone()
   {
         $this->telefone = html_entity_decode($this->telefone, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telefone = strip_tags($this->telefone);
         $this->telefone = NM_charset_to_utf8($this->telefone);
         $this->telefone = str_replace('<', '&lt;', $this->telefone);
         $this->telefone = str_replace('>', '&gt;', $this->telefone);
         $this->Texto_tag .= "<td>" . $this->telefone . "</td>\r\n";
   }
   //----- cod_vend
   function NM_export_cod_vend()
   {
         $this->cod_vend = html_entity_decode($this->cod_vend, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_vend = strip_tags($this->cod_vend);
         $this->cod_vend = NM_charset_to_utf8($this->cod_vend);
         $this->cod_vend = str_replace('<', '&lt;', $this->cod_vend);
         $this->cod_vend = str_replace('>', '&gt;', $this->cod_vend);
         $this->Texto_tag .= "<td>" . $this->cod_vend . "</td>\r\n";
   }
   //----- previsao
   function NM_export_previsao()
   {
             nmgp_Form_Num_Val($this->previsao, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->previsao = NM_charset_to_utf8($this->previsao);
         $this->previsao = str_replace('<', '&lt;', $this->previsao);
         $this->previsao = str_replace('>', '&gt;', $this->previsao);
         $this->Texto_tag .= "<td>" . $this->previsao . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- desconto
   function NM_export_desconto()
   {
             nmgp_Form_Num_Val($this->desconto, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->desconto = NM_charset_to_utf8($this->desconto);
         $this->desconto = str_replace('<', '&lt;', $this->desconto);
         $this->desconto = str_replace('>', '&gt;', $this->desconto);
         $this->Texto_tag .= "<td>" . $this->desconto . "</td>\r\n";
   }
   //----- condpag
   function NM_export_condpag()
   {
         $this->condpag = html_entity_decode($this->condpag, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->condpag = strip_tags($this->condpag);
         $this->condpag = NM_charset_to_utf8($this->condpag);
         $this->condpag = str_replace('<', '&lt;', $this->condpag);
         $this->condpag = str_replace('>', '&gt;', $this->condpag);
         $this->Texto_tag .= "<td>" . $this->condpag . "</td>\r\n";
   }
   //----- obs
   function NM_export_obs()
   {
         $this->obs = html_entity_decode($this->obs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obs = strip_tags($this->obs);
         $this->obs = NM_charset_to_utf8($this->obs);
         $this->obs = str_replace('<', '&lt;', $this->obs);
         $this->obs = str_replace('>', '&gt;', $this->obs);
         $this->Texto_tag .= "<td>" . $this->obs . "</td>\r\n";
   }
   //----- header
   function NM_export_header()
   {
         $this->header = html_entity_decode($this->header, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->header = strip_tags($this->header);
         $this->header = NM_charset_to_utf8($this->header);
         $this->header = str_replace('<', '&lt;', $this->header);
         $this->header = str_replace('>', '&gt;', $this->header);
         $this->Texto_tag .= "<td>" . $this->header . "</td>\r\n";
   }
   //----- transportadora
   function NM_export_transportadora()
   {
         $this->transportadora = html_entity_decode($this->transportadora, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->transportadora = strip_tags($this->transportadora);
         $this->transportadora = NM_charset_to_utf8($this->transportadora);
         $this->transportadora = str_replace('<', '&lt;', $this->transportadora);
         $this->transportadora = str_replace('>', '&gt;', $this->transportadora);
         $this->Texto_tag .= "<td>" . $this->transportadora . "</td>\r\n";
   }
   //----- local_entrega
   function NM_export_local_entrega()
   {
             if ($this->local_entrega !== "&nbsp;") 
             { 
                 $this->local_entrega =  sc_strtolower($this->local_entrega); 
                 $this->local_entrega = ucwords($this->local_entrega); 
             } 
         $this->local_entrega = html_entity_decode($this->local_entrega, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->local_entrega = strip_tags($this->local_entrega);
         $this->local_entrega = NM_charset_to_utf8($this->local_entrega);
         $this->local_entrega = str_replace('<', '&lt;', $this->local_entrega);
         $this->local_entrega = str_replace('>', '&gt;', $this->local_entrega);
         $this->Texto_tag .= "<td>" . $this->local_entrega . "</td>\r\n";
   }
   //----- itenspedido
   function NM_export_itenspedido()
   {
         $this->itenspedido = html_entity_decode($this->itenspedido, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->itenspedido = strip_tags($this->itenspedido);
         $this->itenspedido = NM_charset_to_utf8($this->itenspedido);
         $this->itenspedido = str_replace('<', '&lt;', $this->itenspedido);
         $this->itenspedido = str_replace('>', '&gt;', $this->itenspedido);
         $this->Texto_tag .= "<td>" . $this->itenspedido . "</td>\r\n";
   }
   //----- valor_desconto
   function NM_export_valor_desconto()
   {
             nmgp_Form_Num_Val($this->valor_desconto, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor_desconto = NM_charset_to_utf8($this->valor_desconto);
         $this->valor_desconto = str_replace('<', '&lt;', $this->valor_desconto);
         $this->valor_desconto = str_replace('>', '&gt;', $this->valor_desconto);
         $this->Texto_tag .= "<td>" . $this->valor_desconto . "</td>\r\n";
   }
   //----- cnpj
   function NM_export_cnpj()
   {
             if (strlen($this->cnpj) < 14 && strlen($this->cnpj) != 11) 
             { 
                 $this->cnpj = str_repeat(0, 14 - strlen($this->cnpj)) . $this->cnpj; 
             } 
             if (strlen($this->cnpj) > 11 && substr($this->cnpj, 0, 3) == "000" && $this->Teste_validade->CNPJ($this->cnpj) == false) 
             { 
                 $this->cnpj = substr($this->cnpj, strlen($this->cnpj) - 11); 
             } 
             nmgp_Form_CicCnpj($this->cnpj) ; 
         $this->cnpj = NM_charset_to_utf8($this->cnpj);
         $this->cnpj = str_replace('<', '&lt;', $this->cnpj);
         $this->cnpj = str_replace('>', '&gt;', $this->cnpj);
         $this->Texto_tag .= "<td>" . $this->cnpj . "</td>\r\n";
   }
   //----- endereco_vm
   function NM_export_endereco_vm()
   {
             if ($this->endereco_vm !== "&nbsp;") 
             { 
                 $this->endereco_vm = sc_strtoupper($this->endereco_vm); 
             } 
         $this->endereco_vm = html_entity_decode($this->endereco_vm, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->endereco_vm = strip_tags($this->endereco_vm);
         $this->endereco_vm = NM_charset_to_utf8($this->endereco_vm);
         $this->endereco_vm = str_replace('<', '&lt;', $this->endereco_vm);
         $this->endereco_vm = str_replace('>', '&gt;', $this->endereco_vm);
         $this->Texto_tag .= "<td>" . $this->endereco_vm . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['consulta_fatura'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> proposta :: RTF</TITLE>
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
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="consulta_fatura_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="consulta_fatura"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
function sc_valida_proc($num_proc)
{
$_SESSION['scriptcase']['consulta_fatura']['contr_erro'] = 'on';
  
   if (strlen($num_proc) != 17)
   {
       return false;
   }
   $corpo_proc = substr($num_proc, 0, -2);
   $dig_proc   = substr($num_proc, -2);
   $orgao      = substr($num_proc, 0, 5);
   $ano        = substr($num_proc, 11, 4);
   
   $x    = 0;
   $y    = 16;
   $soma = 0;
   for ($x = 0 ; $x < 15 ; $x++)
   {
        $soma += substr($corpo_proc, $x , 1) * $y;
        $y--;
   }
   $resto = $soma % 11;
   $dig1  = 11 - $resto;
   if (strlen($dig1) == 2)
   {
       $dig1 = substr($dig1, 1, 1);
   }
   $parte2 = $corpo_proc . $dig1;

   $x    = 0;
   $y    = 17;
   $soma = 0;
   for ($x = 0 ; $x < 16 ; $x++)
   {
        $soma += substr($parte2, $x , 1) * $y;
        $y--;
   }
   $resto = $soma % 11;
   $dig2  = 11 - $resto;
   if (strlen($dig2) == 2)
   {
       $dig2 = substr($dig2, 1, 1);
   }
   $parte2 .= $dig2;
   if ($parte2 == $num_proc)
   {
       return true;
   }
   else
   {
       return false;
   }

$_SESSION['scriptcase']['consulta_fatura']['contr_erro'] = 'off';
}
}

?>
