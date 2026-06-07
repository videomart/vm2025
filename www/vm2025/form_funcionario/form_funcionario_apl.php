<?php
//
class form_funcionario_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $captcha_code;
   var $captcha_sent;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id;
   var $nome;
   var $endereco;
   var $nascimento;
   var $cep;
   var $telefone;
   var $cpf;
   var $identidade;
   var $habilitaca;
   var $certreserv;
   var $titulo;
   var $email;
   var $filiacao;
   var $divisao;
   var $divisao_1;
   var $funcao;
   var $consultor;
   var $consultor_1;
   var $salario;
   var $admissao;
   var $obs;
   var $usuario;
   var $usuario_1;
   var $nivel;
   var $senha;
   var $assinatura;
   var $assinatura_scfile_name;
   var $assinatura_ul_name;
   var $assinatura_scfile_type;
   var $assinatura_ul_type;
   var $assinatura_limpa;
   var $assinatura_salva;
   var $out_assinatura;
   var $rodape;
   var $retrato;
   var $retrato_scfile_name;
   var $retrato_ul_name;
   var $retrato_scfile_type;
   var $retrato_ul_type;
   var $retrato_limpa;
   var $retrato_salva;
   var $out_retrato;
   var $ativo;
   var $smtp_host;
   var $smtp_port;
   var $smtp_user;
   var $smtp_password;
   var $habilita;
   var $meu_telefone;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden   = array();
   var $Field_no_validate  = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
   var $Upload_refresh_fields = array();
   var $NM_case_insensitive;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['admissao']))
          {
              $this->admissao = $this->NM_ajax_info['param']['admissao'];
          }
          if (isset($this->NM_ajax_info['param']['assinatura']))
          {
              $this->assinatura = $this->NM_ajax_info['param']['assinatura'];
          }
          if (isset($this->NM_ajax_info['param']['assinatura_limpa']))
          {
              $this->assinatura_limpa = $this->NM_ajax_info['param']['assinatura_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['assinatura_ul_name']))
          {
              $this->assinatura_ul_name = $this->NM_ajax_info['param']['assinatura_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['assinatura_ul_type']))
          {
              $this->assinatura_ul_type = $this->NM_ajax_info['param']['assinatura_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['ativo']))
          {
              $this->ativo = $this->NM_ajax_info['param']['ativo'];
          }
          if (isset($this->NM_ajax_info['param']['cep']))
          {
              $this->cep = $this->NM_ajax_info['param']['cep'];
          }
          if (isset($this->NM_ajax_info['param']['certreserv']))
          {
              $this->certreserv = $this->NM_ajax_info['param']['certreserv'];
          }
          if (isset($this->NM_ajax_info['param']['consultor']))
          {
              $this->consultor = $this->NM_ajax_info['param']['consultor'];
          }
          if (isset($this->NM_ajax_info['param']['cpf']))
          {
              $this->cpf = $this->NM_ajax_info['param']['cpf'];
          }
          if (isset($this->NM_ajax_info['param']['divisao']))
          {
              $this->divisao = $this->NM_ajax_info['param']['divisao'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['endereco']))
          {
              $this->endereco = $this->NM_ajax_info['param']['endereco'];
          }
          if (isset($this->NM_ajax_info['param']['filiacao']))
          {
              $this->filiacao = $this->NM_ajax_info['param']['filiacao'];
          }
          if (isset($this->NM_ajax_info['param']['funcao']))
          {
              $this->funcao = $this->NM_ajax_info['param']['funcao'];
          }
          if (isset($this->NM_ajax_info['param']['habilitaca']))
          {
              $this->habilitaca = $this->NM_ajax_info['param']['habilitaca'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['identidade']))
          {
              $this->identidade = $this->NM_ajax_info['param']['identidade'];
          }
          if (isset($this->NM_ajax_info['param']['meu_telefone']))
          {
              $this->meu_telefone = $this->NM_ajax_info['param']['meu_telefone'];
          }
          if (isset($this->NM_ajax_info['param']['nascimento']))
          {
              $this->nascimento = $this->NM_ajax_info['param']['nascimento'];
          }
          if (isset($this->NM_ajax_info['param']['nivel']))
          {
              $this->nivel = $this->NM_ajax_info['param']['nivel'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nome']))
          {
              $this->nome = $this->NM_ajax_info['param']['nome'];
          }
          if (isset($this->NM_ajax_info['param']['obs']))
          {
              $this->obs = $this->NM_ajax_info['param']['obs'];
          }
          if (isset($this->NM_ajax_info['param']['retrato']))
          {
              $this->retrato = $this->NM_ajax_info['param']['retrato'];
          }
          if (isset($this->NM_ajax_info['param']['retrato_limpa']))
          {
              $this->retrato_limpa = $this->NM_ajax_info['param']['retrato_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['retrato_ul_name']))
          {
              $this->retrato_ul_name = $this->NM_ajax_info['param']['retrato_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['retrato_ul_type']))
          {
              $this->retrato_ul_type = $this->NM_ajax_info['param']['retrato_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['rodape']))
          {
              $this->rodape = $this->NM_ajax_info['param']['rodape'];
          }
          if (isset($this->NM_ajax_info['param']['salario']))
          {
              $this->salario = $this->NM_ajax_info['param']['salario'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['senha']))
          {
              $this->senha = $this->NM_ajax_info['param']['senha'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_host']))
          {
              $this->smtp_host = $this->NM_ajax_info['param']['smtp_host'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_password']))
          {
              $this->smtp_password = $this->NM_ajax_info['param']['smtp_password'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_port']))
          {
              $this->smtp_port = $this->NM_ajax_info['param']['smtp_port'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_user']))
          {
              $this->smtp_user = $this->NM_ajax_info['param']['smtp_user'];
          }
          if (isset($this->NM_ajax_info['param']['telefone']))
          {
              $this->telefone = $this->NM_ajax_info['param']['telefone'];
          }
          if (isset($this->NM_ajax_info['param']['titulo']))
          {
              $this->titulo = $this->NM_ajax_info['param']['titulo'];
          }
          if (isset($this->NM_ajax_info['param']['usuario']))
          {
              $this->usuario = $this->NM_ajax_info['param']['usuario'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->Refresh_aba_menu)) {
          $_SESSION['sc_session'][$script_case_init]['form_funcionario']['Refresh_aba_menu'] = $this->Refresh_aba_menu;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_funcionario']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_funcionario']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_funcionario']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_funcionario']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_funcionario']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_funcionario($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_funcionario']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_funcionario']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_funcionario']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_funcionario']['sc_redir_insert'] = $this->sc_redir_insert;
              unset($_SESSION['sc_session'][$script_case_init]['form_funcionario']['opc_ant']);
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_funcionario']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_funcionario']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_funcionario']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_funcionario']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_funcionario']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_funcionario']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_funcionario']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_funcionario']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_funcionario']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_funcionario']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_funcionario_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_funcionario']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_funcionario']['upload_field_info']['assinatura'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_funcionario',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_funcionario']['upload_field_info']['retrato'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_funcionario',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_funcionario']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_funcionario'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_funcionario']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_funcionario']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_funcionario') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_funcionario']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - funcionario";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_funcionario")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = !isset($str_ajax_bg)         || "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = !isset($str_ajax_border_c)   || "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = !isset($str_ajax_border_s)   || "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = !isset($str_ajax_border_w)   || "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = !isset($str_block_exp)       || "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = !isset($str_block_col)       || "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = !isset($str_msg_ico_title)   || "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = !isset($str_msg_ico_body)    || "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = !isset($str_err_ico_title)   || "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = !isset($str_err_ico_body)    || "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = !isset($str_cal_ico_back)    || "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = !isset($str_cal_ico_for)     || "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = !isset($str_cal_ico_close)   || "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = !isset($str_tab_space)       || "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = !isset($str_bubble_tail)     || "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = !isset($str_label_sort_pos)  || "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = !isset($str_label_sort)      || "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = !isset($str_label_sort_asc)  || "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = !isset($str_label_sort_desc) || "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok)  || "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = !isset($str_img_status_err) || "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span      = !isset($str_error_icon_span)  || "" == trim($str_error_icon_span)  ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = !isset($img_qs_search)        || "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = !isset($img_qs_clean)         || "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = !isset($str_qs_image_padding) || "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';
      $this->Ini->Bubble_tail          = trim($str_bubble_tail);

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;



      $_SESSION['scriptcase']['error_icon']['form_funcionario']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_funcionario'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['assinatura_ul_name']) && '' != $this->NM_ajax_info['param']['assinatura_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->assinatura_ul_name]))
          {
              $this->NM_ajax_info['param']['assinatura_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->assinatura_ul_name];
          }
          $this->assinatura = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['assinatura_ul_name'];
          $this->assinatura_scfile_name = substr($this->NM_ajax_info['param']['assinatura_ul_name'], 12);
          $this->assinatura_scfile_type = $this->NM_ajax_info['param']['assinatura_ul_type'];
          $this->assinatura_ul_name = $this->NM_ajax_info['param']['assinatura_ul_name'];
          $this->assinatura_ul_type = $this->NM_ajax_info['param']['assinatura_ul_type'];
      }
      elseif (isset($this->assinatura_ul_name) && '' != $this->assinatura_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->assinatura_ul_name]))
          {
              $this->assinatura_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->assinatura_ul_name];
          }
          $this->assinatura = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->assinatura_ul_name;
          $this->assinatura_scfile_name = substr($this->assinatura_ul_name, 12);
          $this->assinatura_scfile_type = $this->assinatura_ul_type;
      }
      if (isset($this->NM_ajax_info['param']['retrato_ul_name']) && '' != $this->NM_ajax_info['param']['retrato_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->retrato_ul_name]))
          {
              $this->NM_ajax_info['param']['retrato_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->retrato_ul_name];
          }
          $this->retrato = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['retrato_ul_name'];
          $this->retrato_scfile_name = substr($this->NM_ajax_info['param']['retrato_ul_name'], 12);
          $this->retrato_scfile_type = $this->NM_ajax_info['param']['retrato_ul_type'];
          $this->retrato_ul_name = $this->NM_ajax_info['param']['retrato_ul_name'];
          $this->retrato_ul_type = $this->NM_ajax_info['param']['retrato_ul_type'];
      }
      elseif (isset($this->retrato_ul_name) && '' != $this->retrato_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->retrato_ul_name]))
          {
              $this->retrato_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_field_ul_name'][$this->retrato_ul_name];
          }
          $this->retrato = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->retrato_ul_name;
          $this->retrato_scfile_name = substr($this->retrato_ul_name, 12);
          $this->retrato_scfile_type = $this->retrato_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_funcionario']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_funcionario'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_funcionario'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form'];
          if (!isset($this->habilita)){$this->habilita = $this->nmgp_dados_form['habilita'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_funcionario", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_funcionario/form_funcionario_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_funcionario_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_funcionario_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_funcionario_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_funcionario/form_funcionario_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_funcionario_erro.class.php"); 
      }
      $this->Erro      = new form_funcionario_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ((!isset($nm_opc_lookup) || $nm_opc_lookup != "lookup") && (!isset($nm_opc_php) || $nm_opc_php != "formphp"))
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_funcionario']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = true;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_funcionario']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_funcionario']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->nome)) { $this->nm_limpa_alfa($this->nome); }
      if (isset($this->endereco)) { $this->nm_limpa_alfa($this->endereco); }
      if (isset($this->cep)) { $this->nm_limpa_alfa($this->cep); }
      if (isset($this->telefone)) { $this->nm_limpa_alfa($this->telefone); }
      if (isset($this->cpf)) { $this->nm_limpa_alfa($this->cpf); }
      if (isset($this->identidade)) { $this->nm_limpa_alfa($this->identidade); }
      if (isset($this->habilitaca)) { $this->nm_limpa_alfa($this->habilitaca); }
      if (isset($this->certreserv)) { $this->nm_limpa_alfa($this->certreserv); }
      if (isset($this->titulo)) { $this->nm_limpa_alfa($this->titulo); }
      if (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
      if (isset($this->filiacao)) { $this->nm_limpa_alfa($this->filiacao); }
      if (isset($this->divisao)) { $this->nm_limpa_alfa($this->divisao); }
      if (isset($this->funcao)) { $this->nm_limpa_alfa($this->funcao); }
      if (isset($this->consultor)) { $this->nm_limpa_alfa($this->consultor); }
      if (isset($this->salario)) { $this->nm_limpa_alfa($this->salario); }
      if (isset($this->obs)) { $this->nm_limpa_alfa($this->obs); }
      if (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
      if (isset($this->nivel)) { $this->nm_limpa_alfa($this->nivel); }
      if (isset($this->senha)) { $this->nm_limpa_alfa($this->senha); }
      if (isset($this->rodape)) { $this->nm_limpa_alfa($this->rodape); }
      if (isset($this->ativo)) { $this->nm_limpa_alfa($this->ativo); }
      if (isset($this->smtp_host)) { $this->nm_limpa_alfa($this->smtp_host); }
      if (isset($this->smtp_port)) { $this->nm_limpa_alfa($this->smtp_port); }
      if (isset($this->smtp_user)) { $this->nm_limpa_alfa($this->smtp_user); }
      if (isset($this->smtp_password)) { $this->nm_limpa_alfa($this->smtp_password); }
      if (isset($this->meu_telefone)) { $this->nm_limpa_alfa($this->meu_telefone); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Field_no_validate = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Field_no_validate'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Field_no_validate'] : array();
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- nascimento
      $this->field_config['nascimento']                 = array();
      $this->field_config['nascimento']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['nascimento']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['nascimento']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'nascimento');
      //-- salario
      $this->field_config['salario']               = array();
      $this->field_config['salario']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['salario']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['salario']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['salario']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['salario']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- admissao
      $this->field_config['admissao']                 = array();
      $this->field_config['admissao']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['admissao']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['admissao']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'admissao');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          if ('validate_nome' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nome');
          }
          if ('validate_endereco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'endereco');
          }
          if ('validate_nascimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nascimento');
          }
          if ('validate_cep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cep');
          }
          if ('validate_telefone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telefone');
          }
          if ('validate_cpf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cpf');
          }
          if ('validate_filiacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'filiacao');
          }
          if ('validate_identidade' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'identidade');
          }
          if ('validate_habilitaca' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'habilitaca');
          }
          if ('validate_certreserv' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'certreserv');
          }
          if ('validate_titulo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'titulo');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email');
          }
          if ('validate_divisao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'divisao');
          }
          if ('validate_funcao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'funcao');
          }
          if ('validate_consultor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'consultor');
          }
          if ('validate_nivel' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nivel');
          }
          if ('validate_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuario');
          }
          if ('validate_senha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'senha');
          }
          if ('validate_salario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'salario');
          }
          if ('validate_admissao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'admissao');
          }
          if ('validate_ativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ativo');
          }
          if ('validate_meu_telefone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'meu_telefone');
          }
          if ('validate_obs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obs');
          }
          if ('validate_assinatura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'assinatura');
          }
          if ('validate_rodape' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rodape');
          }
          if ('validate_retrato' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'retrato');
          }
          if ('validate_smtp_host' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_host');
          }
          if ('validate_smtp_port' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_port');
          }
          if ('validate_smtp_user' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_user');
          }
          if ('validate_smtp_password' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_password');
          }
          form_funcionario_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_usuario_onchange' == $this->NM_ajax_opcao)
          {
              $this->USUARIO_onChange();
          }
          form_funcionario_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->consultor))
          {
              $x = 0; 
              $this->consultor_1 = $this->consultor;
              $this->consultor = ""; 
              if ($this->consultor_1 != "") 
              { 
                  foreach ($this->consultor_1 as $dados_consultor_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->consultor .= ";";
                      } 
                      $this->consultor .= $dados_consultor_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_funcionario_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->nome = sc_strip_script($this->nome, $_SESSION['scriptcase']['charset']);
          $this->nome = sc_strip_tags($this->nome, $_SESSION['scriptcase']['charset']);
          $this->endereco = sc_strip_script($this->endereco, $_SESSION['scriptcase']['charset']);
          $this->endereco = sc_strip_tags($this->endereco, $_SESSION['scriptcase']['charset']);
          $this->telefone = sc_strip_script($this->telefone, $_SESSION['scriptcase']['charset']);
          $this->telefone = sc_strip_tags($this->telefone, $_SESSION['scriptcase']['charset']);
          $this->identidade = sc_strip_script($this->identidade, $_SESSION['scriptcase']['charset']);
          $this->identidade = sc_strip_tags($this->identidade, $_SESSION['scriptcase']['charset']);
          $this->habilitaca = sc_strip_script($this->habilitaca, $_SESSION['scriptcase']['charset']);
          $this->habilitaca = sc_strip_tags($this->habilitaca, $_SESSION['scriptcase']['charset']);
          $this->certreserv = sc_strip_script($this->certreserv, $_SESSION['scriptcase']['charset']);
          $this->certreserv = sc_strip_tags($this->certreserv, $_SESSION['scriptcase']['charset']);
          $this->titulo = sc_strip_script($this->titulo, $_SESSION['scriptcase']['charset']);
          $this->titulo = sc_strip_tags($this->titulo, $_SESSION['scriptcase']['charset']);
          $this->filiacao = sc_strip_script($this->filiacao, $_SESSION['scriptcase']['charset']);
          $this->filiacao = sc_strip_tags($this->filiacao, $_SESSION['scriptcase']['charset']);
          $this->funcao = sc_strip_script($this->funcao, $_SESSION['scriptcase']['charset']);
          $this->funcao = sc_strip_tags($this->funcao, $_SESSION['scriptcase']['charset']);
          $this->obs = sc_strip_script($this->obs, $_SESSION['scriptcase']['charset']);
          $this->obs = sc_strip_tags($this->obs, $_SESSION['scriptcase']['charset']);
          $this->senha = sc_strip_script($this->senha, $_SESSION['scriptcase']['charset']);
          $this->senha = sc_strip_tags($this->senha, $_SESSION['scriptcase']['charset']);
          $this->rodape = sc_strip_script($this->rodape, $_SESSION['scriptcase']['charset']);
          $this->rodape = sc_strip_tags($this->rodape, $_SESSION['scriptcase']['charset']);
          $this->smtp_host = sc_strip_script($this->smtp_host, $_SESSION['scriptcase']['charset']);
          $this->smtp_host = sc_strip_tags($this->smtp_host, $_SESSION['scriptcase']['charset']);
          $this->smtp_port = sc_strip_script($this->smtp_port, $_SESSION['scriptcase']['charset']);
          $this->smtp_port = sc_strip_tags($this->smtp_port, $_SESSION['scriptcase']['charset']);
          $this->smtp_user = sc_strip_script($this->smtp_user, $_SESSION['scriptcase']['charset']);
          $this->smtp_user = sc_strip_tags($this->smtp_user, $_SESSION['scriptcase']['charset']);
          $this->smtp_password = sc_strip_script($this->smtp_password, $_SESSION['scriptcase']['charset']);
          $this->smtp_password = sc_strip_tags($this->smtp_password, $_SESSION['scriptcase']['charset']);
          $this->meu_telefone = sc_strip_script($this->meu_telefone, $_SESSION['scriptcase']['charset']);
          $this->meu_telefone = sc_strip_tags($this->meu_telefone, $_SESSION['scriptcase']['charset']);
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_funcionario']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_funcionario_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro, '', true, true); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_funcionario_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_funcionario_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     if (parent.writeFastMenu)
     {
         parent.writeFastMenu(link_atual);
     }
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     if (parent.clearFastMenu)
     {
        parent.clearFastMenu();
     }
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_funcionario.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario'][$path_doc_md5][1] = $Zip_name;
?><!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - funcionario") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/6/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_funcionario_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_funcionario"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'id':
               return "ID";
               break;
           case 'nome':
               return "Nome";
               break;
           case 'endereco':
               return "Endereço";
               break;
           case 'nascimento':
               return "Nascimento";
               break;
           case 'cep':
               return "Cep";
               break;
           case 'telefone':
               return "Telefone (res)";
               break;
           case 'cpf':
               return "CPF";
               break;
           case 'filiacao':
               return "Filiação";
               break;
           case 'identidade':
               return "Identidade";
               break;
           case 'habilitaca':
               return "Habilitação";
               break;
           case 'certreserv':
               return "Cert. Reservista";
               break;
           case 'titulo':
               return "Título eleitor";
               break;
           case 'email':
               return "Email";
               break;
           case 'divisao':
               return "Divisão";
               break;
           case 'funcao':
               return "Função";
               break;
           case 'consultor':
               return "Consultor";
               break;
           case 'nivel':
               return "Nível";
               break;
           case 'usuario':
               return "Login";
               break;
           case 'senha':
               return "Senha ";
               break;
           case 'salario':
               return "Salario";
               break;
           case 'admissao':
               return "Data admissão";
               break;
           case 'ativo':
               return "Ativo";
               break;
           case 'meu_telefone':
               return "Telefone (com)";
               break;
           case 'obs':
               return "Obs";
               break;
           case 'assinatura':
               return "Assinatura";
               break;
           case 'rodape':
               return "Rodapé";
               break;
           case 'retrato':
               return "Retrato";
               break;
           case 'smtp_host':
               return "Smtp Host";
               break;
           case 'smtp_port':
               return "Smtp Port";
               break;
           case 'smtp_user':
               return "Smtp User";
               break;
           case 'smtp_password':
               return "Smtp Password";
               break;
           case 'habilita':
               return "Habilitado";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();
      if ((!is_array($filtro) && ('' == $filtro || 'id' == $filtro)) || (is_array($filtro) && in_array('id', $filtro)))
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nome' == $filtro)) || (is_array($filtro) && in_array('nome', $filtro)))
        $this->ValidateField_nome($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'endereco' == $filtro)) || (is_array($filtro) && in_array('endereco', $filtro)))
        $this->ValidateField_endereco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nascimento' == $filtro)) || (is_array($filtro) && in_array('nascimento', $filtro)))
        $this->ValidateField_nascimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cep' == $filtro)) || (is_array($filtro) && in_array('cep', $filtro)))
        $this->ValidateField_cep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'telefone' == $filtro)) || (is_array($filtro) && in_array('telefone', $filtro)))
        $this->ValidateField_telefone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cpf' == $filtro)) || (is_array($filtro) && in_array('cpf', $filtro)))
        $this->ValidateField_cpf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'filiacao' == $filtro)) || (is_array($filtro) && in_array('filiacao', $filtro)))
        $this->ValidateField_filiacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'identidade' == $filtro)) || (is_array($filtro) && in_array('identidade', $filtro)))
        $this->ValidateField_identidade($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'habilitaca' == $filtro)) || (is_array($filtro) && in_array('habilitaca', $filtro)))
        $this->ValidateField_habilitaca($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'certreserv' == $filtro)) || (is_array($filtro) && in_array('certreserv', $filtro)))
        $this->ValidateField_certreserv($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'titulo' == $filtro)) || (is_array($filtro) && in_array('titulo', $filtro)))
        $this->ValidateField_titulo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'email' == $filtro)) || (is_array($filtro) && in_array('email', $filtro)))
        $this->ValidateField_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'divisao' == $filtro)) || (is_array($filtro) && in_array('divisao', $filtro)))
        $this->ValidateField_divisao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'funcao' == $filtro)) || (is_array($filtro) && in_array('funcao', $filtro)))
        $this->ValidateField_funcao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'consultor' == $filtro)) || (is_array($filtro) && in_array('consultor', $filtro)))
        $this->ValidateField_consultor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nivel' == $filtro)) || (is_array($filtro) && in_array('nivel', $filtro)))
        $this->ValidateField_nivel($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usuario' == $filtro)) || (is_array($filtro) && in_array('usuario', $filtro)))
        $this->ValidateField_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'senha' == $filtro)) || (is_array($filtro) && in_array('senha', $filtro)))
        $this->ValidateField_senha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'salario' == $filtro)) || (is_array($filtro) && in_array('salario', $filtro)))
        $this->ValidateField_salario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'admissao' == $filtro)) || (is_array($filtro) && in_array('admissao', $filtro)))
        $this->ValidateField_admissao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ativo' == $filtro)) || (is_array($filtro) && in_array('ativo', $filtro)))
        $this->ValidateField_ativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'meu_telefone' == $filtro)) || (is_array($filtro) && in_array('meu_telefone', $filtro)))
        $this->ValidateField_meu_telefone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'obs' == $filtro)) || (is_array($filtro) && in_array('obs', $filtro)))
        $this->ValidateField_obs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'assinatura' == $filtro)) || (is_array($filtro) && in_array('assinatura', $filtro)))
        $this->ValidateField_assinatura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'rodape' == $filtro)) || (is_array($filtro) && in_array('rodape', $filtro)))
        $this->ValidateField_rodape($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'retrato' == $filtro)) || (is_array($filtro) && in_array('retrato', $filtro)))
        $this->ValidateField_retrato($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_host' == $filtro)) || (is_array($filtro) && in_array('smtp_host', $filtro)))
        $this->ValidateField_smtp_host($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_port' == $filtro)) || (is_array($filtro) && in_array('smtp_port', $filtro)))
        $this->ValidateField_smtp_port($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_user' == $filtro)) || (is_array($filtro) && in_array('smtp_user', $filtro)))
        $this->ValidateField_smtp_user($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_password' == $filtro)) || (is_array($filtro) && in_array('smtp_password', $filtro)))
        $this->ValidateField_smtp_password($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['id'])) {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
          return;
      }
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir" || 'validate_id' == $this->NM_ajax_opcao)
      { 
          if ($this->id != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID; " ; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id

    function ValidateField_nome(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['nome'])) {
          return;
      }
      $this->nome = sc_strtolower($this->nome); 
      $this->nome = mb_convert_case($this->nome, MB_CASE_TITLE, "UTF-8") ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nome) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nome " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nome']))
              {
                  $Campos_Erros['nome'] = array();
              }
              $Campos_Erros['nome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nome']) || !is_array($this->NM_ajax_info['errList']['nome']))
              {
                  $this->NM_ajax_info['errList']['nome'] = array();
              }
              $this->NM_ajax_info['errList']['nome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
          $this->nome = mb_convert_case($this->nome, MB_CASE_TITLE, "UTF-8") ; 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nome';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nome

    function ValidateField_endereco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['endereco'])) {
          return;
      }
      $this->endereco = sc_strtolower($this->endereco); 
      $this->endereco = mb_convert_case($this->endereco, MB_CASE_TITLE, "UTF-8") ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->endereco) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Endereço " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['endereco']))
              {
                  $Campos_Erros['endereco'] = array();
              }
              $Campos_Erros['endereco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['endereco']) || !is_array($this->NM_ajax_info['errList']['endereco']))
              {
                  $this->NM_ajax_info['errList']['endereco'] = array();
              }
              $this->NM_ajax_info['errList']['endereco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
          $this->endereco = mb_convert_case($this->endereco, MB_CASE_TITLE, "UTF-8") ; 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'endereco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_endereco

    function ValidateField_nascimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->nascimento, $this->field_config['nascimento']['date_sep']) ; 
      if (isset($this->Field_no_validate['nascimento'])) {
          return;
      }
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['nascimento']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['nascimento']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['nascimento']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['nascimento']['date_sep']) ; 
          if (trim($this->nascimento) != "")  
          { 
              $validateTest = $teste_validade->Data($this->nascimento, $Format_Data, $trab_dt_min, $trab_dt_max);
              if ($validateTest == false)
              { 
                  $hasError = true;
                  $Campos_Crit .= "Nascimento; " ; 
                  if (!isset($Campos_Erros['nascimento']))
                  {
                      $Campos_Erros['nascimento'] = array();
                  }
                  $Campos_Erros['nascimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['nascimento']) || !is_array($this->NM_ajax_info['errList']['nascimento']))
                  {
                      $this->NM_ajax_info['errList']['nascimento'] = array();
                  }
                  $this->NM_ajax_info['errList']['nascimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['nascimento']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nascimento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nascimento

    function ValidateField_cep(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_cep($this->cep) ; 
      if (isset($this->Field_no_validate['cep'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->cep) != "")  
          { 
              if (strlen($this->cep) != 8  || (int)$this->cep == 0)
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cep; " ; 
                  if (!isset($Campos_Erros['cep']))
                  {
                      $Campos_Erros['cep'] = array();
                  }
                  $Campos_Erros['cep'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cep']) || !is_array($this->NM_ajax_info['errList']['cep']))
                  {
                      $this->NM_ajax_info['errList']['cep'] = array();
                  }
                  $this->NM_ajax_info['errList']['cep'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cep';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cep

    function ValidateField_telefone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['telefone'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->telefone) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telefone (res) " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['telefone']))
              {
                  $Campos_Erros['telefone'] = array();
              }
              $Campos_Erros['telefone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['telefone']) || !is_array($this->NM_ajax_info['errList']['telefone']))
              {
                  $this->NM_ajax_info['errList']['telefone'] = array();
              }
              $this->NM_ajax_info['errList']['telefone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'telefone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_telefone

    function ValidateField_cpf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_ciccnpj($this->cpf) ; 
      if (isset($this->Field_no_validate['cpf'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->cpf) != "")  
          { 
              if ($teste_validade->CIC($this->cpf) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CPF; " ; 
                  if (!isset($Campos_Erros['cpf']))
                  {
                      $Campos_Erros['cpf'] = array();
                  }
                  $Campos_Erros['cpf'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cpf']) || !is_array($this->NM_ajax_info['errList']['cpf']))
                  {
                      $this->NM_ajax_info['errList']['cpf'] = array();
                  }
                  $this->NM_ajax_info['errList']['cpf'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cpf';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cpf

    function ValidateField_filiacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['filiacao'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->filiacao) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Filiação " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['filiacao']))
              {
                  $Campos_Erros['filiacao'] = array();
              }
              $Campos_Erros['filiacao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['filiacao']) || !is_array($this->NM_ajax_info['errList']['filiacao']))
              {
                  $this->NM_ajax_info['errList']['filiacao'] = array();
              }
              $this->NM_ajax_info['errList']['filiacao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'filiacao';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_filiacao

    function ValidateField_identidade(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['identidade'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->identidade) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Identidade " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['identidade']))
              {
                  $Campos_Erros['identidade'] = array();
              }
              $Campos_Erros['identidade'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['identidade']) || !is_array($this->NM_ajax_info['errList']['identidade']))
              {
                  $this->NM_ajax_info['errList']['identidade'] = array();
              }
              $this->NM_ajax_info['errList']['identidade'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'identidade';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_identidade

    function ValidateField_habilitaca(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['habilitaca'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->habilitaca) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Habilitação " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['habilitaca']))
              {
                  $Campos_Erros['habilitaca'] = array();
              }
              $Campos_Erros['habilitaca'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['habilitaca']) || !is_array($this->NM_ajax_info['errList']['habilitaca']))
              {
                  $this->NM_ajax_info['errList']['habilitaca'] = array();
              }
              $this->NM_ajax_info['errList']['habilitaca'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'habilitaca';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_habilitaca

    function ValidateField_certreserv(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['certreserv'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->certreserv) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cert. Reservista " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['certreserv']))
              {
                  $Campos_Erros['certreserv'] = array();
              }
              $Campos_Erros['certreserv'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['certreserv']) || !is_array($this->NM_ajax_info['errList']['certreserv']))
              {
                  $this->NM_ajax_info['errList']['certreserv'] = array();
              }
              $this->NM_ajax_info['errList']['certreserv'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'certreserv';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_certreserv

    function ValidateField_titulo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['titulo'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->titulo) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Título eleitor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['titulo']))
              {
                  $Campos_Erros['titulo'] = array();
              }
              $Campos_Erros['titulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['titulo']) || !is_array($this->NM_ajax_info['errList']['titulo']))
              {
                  $this->NM_ajax_info['errList']['titulo'] = array();
              }
              $this->NM_ajax_info['errList']['titulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'titulo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_titulo

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['email'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->email) != "")  
          { 
              if ($teste_validade->Email($this->email) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Email; " ; 
                  if (!isset($Campos_Erros['email']))
                  {
                      $Campos_Erros['email'] = array();
                  }
                  $Campos_Erros['email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
                      {
                          $this->NM_ajax_info['errList']['email'] = array();
                      }
                      $this->NM_ajax_info['errList']['email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'email';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_email

    function ValidateField_divisao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['divisao'])) {
       return;
   }
      if ($this->divisao == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'divisao';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_divisao

    function ValidateField_funcao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['funcao'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->funcao) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Função " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['funcao']))
              {
                  $Campos_Erros['funcao'] = array();
              }
              $Campos_Erros['funcao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['funcao']) || !is_array($this->NM_ajax_info['errList']['funcao']))
              {
                  $this->NM_ajax_info['errList']['funcao'] = array();
              }
              $this->NM_ajax_info['errList']['funcao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'funcao';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_funcao

    function ValidateField_consultor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['consultor'])) {
       return;
   }
      if ($this->consultor == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->consultor))
          {
              $x = 0; 
              $this->consultor_1 = array(); 
              foreach ($this->consultor as $ind => $dados_consultor_1 ) 
              {
                  if ($dados_consultor_1 != "") 
                  {
                      $this->consultor_1[] = $dados_consultor_1;
                  } 
              } 
              $this->consultor = ""; 
              foreach ($this->consultor_1 as $dados_consultor_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->consultor .= ";";
                   } 
                   $this->consultor .= $dados_consultor_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->consultor === "" || is_null($this->consultor))  
      { 
          $this->consultor = 0;
          $this->sc_force_zero[] = 'consultor';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'consultor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_consultor

    function ValidateField_nivel(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['nivel'])) {
       return;
   }
      if ($this->nivel == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->nivel != "" && !in_array("nivel", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_nivel']) && !in_array($this->nivel, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_nivel']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['nivel']))
              {
                  $Campos_Erros['nivel'] = array();
              }
              $Campos_Erros['nivel'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['nivel']) || !is_array($this->NM_ajax_info['errList']['nivel']))
              {
                  $this->NM_ajax_info['errList']['nivel'] = array();
              }
              $this->NM_ajax_info['errList']['nivel'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nivel';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nivel

    function ValidateField_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['usuario'])) {
       return;
   }
               if (!empty($this->usuario) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']) && !in_array($this->usuario, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['usuario']))
                   {
                       $Campos_Erros['usuario'] = array();
                   }
                   $Campos_Erros['usuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['usuario']) || !is_array($this->NM_ajax_info['errList']['usuario']))
                   {
                       $this->NM_ajax_info['errList']['usuario'] = array();
                   }
                   $this->NM_ajax_info['errList']['usuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usuario';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usuario

    function ValidateField_senha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['senha'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->senha) > 8) 
          { 
              $hasError = true;
              $Campos_Crit .= "Senha  " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['senha']))
              {
                  $Campos_Erros['senha'] = array();
              }
              $Campos_Erros['senha'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['senha']) || !is_array($this->NM_ajax_info['errList']['senha']))
              {
                  $this->NM_ajax_info['errList']['senha'] = array();
              }
              $this->NM_ajax_info['errList']['senha'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'senha';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_senha

    function ValidateField_salario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['salario'])) {
          if (!empty($this->field_config['salario']['symbol_dec'])) {
              nm_limpa_valor($this->salario, $this->field_config['salario']['symbol_dec'], $this->field_config['salario']['symbol_grp']) ; 
          }
          return;
      }
      if ($this->salario === "" || is_null($this->salario))  
      { 
          $this->salario = 0;
          $this->sc_force_zero[] = 'salario';
      } 
      if (!empty($this->field_config['salario']['symbol_dec']))
      {
          nm_limpa_valor($this->salario, $this->field_config['salario']['symbol_dec'], $this->field_config['salario']['symbol_grp']) ; 
          if ('.' == substr($this->salario, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->salario, 1)))
              {
                  $this->salario = '';
              }
              else
              {
                  $this->salario = '0' . $this->salario;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->salario != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->salario) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Salario: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['salario']))
                  {
                      $Campos_Erros['salario'] = array();
                  }
                  $Campos_Erros['salario'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['salario']) || !is_array($this->NM_ajax_info['errList']['salario']))
                  {
                      $this->NM_ajax_info['errList']['salario'] = array();
                  }
                  $this->NM_ajax_info['errList']['salario'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->salario, 6, 6, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Salario; " ; 
                  if (!isset($Campos_Erros['salario']))
                  {
                      $Campos_Erros['salario'] = array();
                  }
                  $Campos_Erros['salario'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['salario']) || !is_array($this->NM_ajax_info['errList']['salario']))
                  {
                      $this->NM_ajax_info['errList']['salario'] = array();
                  }
                  $this->NM_ajax_info['errList']['salario'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'salario';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_salario

    function ValidateField_admissao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->admissao, $this->field_config['admissao']['date_sep']) ; 
      if (isset($this->Field_no_validate['admissao'])) {
          return;
      }
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['admissao']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['admissao']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['admissao']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['admissao']['date_sep']) ; 
          if (trim($this->admissao) != "")  
          { 
              $validateTest = $teste_validade->Data($this->admissao, $Format_Data, $trab_dt_min, $trab_dt_max);
              if ($validateTest == false)
              { 
                  $hasError = true;
                  $Campos_Crit .= "Data admissão; " ; 
                  if (!isset($Campos_Erros['admissao']))
                  {
                      $Campos_Erros['admissao'] = array();
                  }
                  $Campos_Erros['admissao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['admissao']) || !is_array($this->NM_ajax_info['errList']['admissao']))
                  {
                      $this->NM_ajax_info['errList']['admissao'] = array();
                  }
                  $this->NM_ajax_info['errList']['admissao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['admissao']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'admissao';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_admissao

    function ValidateField_ativo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['ativo'])) {
       return;
   }
      if ($this->ativo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->ativo != "" && !in_array("ativo", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_ativo']) && !in_array($this->ativo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_ativo']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['ativo']))
              {
                  $Campos_Erros['ativo'] = array();
              }
              $Campos_Erros['ativo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['ativo']) || !is_array($this->NM_ajax_info['errList']['ativo']))
              {
                  $this->NM_ajax_info['errList']['ativo'] = array();
              }
              $this->NM_ajax_info['errList']['ativo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ativo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ativo

    function ValidateField_meu_telefone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['meu_telefone'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->meu_telefone) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telefone (com) " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['meu_telefone']))
              {
                  $Campos_Erros['meu_telefone'] = array();
              }
              $Campos_Erros['meu_telefone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['meu_telefone']) || !is_array($this->NM_ajax_info['errList']['meu_telefone']))
              {
                  $this->NM_ajax_info['errList']['meu_telefone'] = array();
              }
              $this->NM_ajax_info['errList']['meu_telefone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'meu_telefone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_meu_telefone

    function ValidateField_obs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['obs'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obs) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Obs " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obs']))
              {
                  $Campos_Erros['obs'] = array();
              }
              $Campos_Erros['obs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obs']) || !is_array($this->NM_ajax_info['errList']['obs']))
              {
                  $this->NM_ajax_info['errList']['obs'] = array();
              }
              $this->NM_ajax_info['errList']['obs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'obs';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_obs

    function ValidateField_assinatura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['assinatura'])) {
          return;
      }
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->assinatura;
            if (strpos($this->assinatura, "*") != false) {
                $hasError = true;
                $Campos_Crit .= "Assinatura: " . $this->Ini->Nm_lang['lang_errm_ivch']; 
                if (!isset($Campos_Erros['assinatura']))
                {
                    $Campos_Erros['assinatura'] = array();
                }
                $Campos_Erros['assinatura'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
                if (!isset($this->NM_ajax_info['errList']['assinatura']) || !is_array($this->NM_ajax_info['errList']['assinatura']))
                {
                    $this->NM_ajax_info['errList']['assinatura'] = array();
                }
                $this->NM_ajax_info['errList']['assinatura'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
            }
            if ("" != $this->assinatura && "S" != $this->assinatura_limpa && !$teste_validade->ArqExtensao($this->assinatura, array()))
            {
                $hasError = true;
                $Campos_Crit .= "Assinatura: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['assinatura']))
                {
                    $Campos_Erros['assinatura'] = array();
                }
                $Campos_Erros['assinatura'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['assinatura']) || !is_array($this->NM_ajax_info['errList']['assinatura']))
                {
                    $this->NM_ajax_info['errList']['assinatura'] = array();
                }
                $this->NM_ajax_info['errList']['assinatura'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'assinatura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_assinatura

    function ValidateField_rodape(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['rodape'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rodape) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Rodapé " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rodape']))
              {
                  $Campos_Erros['rodape'] = array();
              }
              $Campos_Erros['rodape'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rodape']) || !is_array($this->NM_ajax_info['errList']['rodape']))
              {
                  $this->NM_ajax_info['errList']['rodape'] = array();
              }
              $this->NM_ajax_info['errList']['rodape'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rodape';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rodape

    function ValidateField_retrato(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['retrato'])) {
          return;
      }
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->retrato;
            if (strpos($this->retrato, "*") != false) {
                $hasError = true;
                $Campos_Crit .= "Retrato: " . $this->Ini->Nm_lang['lang_errm_ivch']; 
                if (!isset($Campos_Erros['retrato']))
                {
                    $Campos_Erros['retrato'] = array();
                }
                $Campos_Erros['retrato'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
                if (!isset($this->NM_ajax_info['errList']['retrato']) || !is_array($this->NM_ajax_info['errList']['retrato']))
                {
                    $this->NM_ajax_info['errList']['retrato'] = array();
                }
                $this->NM_ajax_info['errList']['retrato'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
            }
            if ("" != $this->retrato && "S" != $this->retrato_limpa && !$teste_validade->ArqExtensao($this->retrato, array()))
            {
                $hasError = true;
                $Campos_Crit .= "Retrato: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['retrato']))
                {
                    $Campos_Erros['retrato'] = array();
                }
                $Campos_Erros['retrato'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['retrato']) || !is_array($this->NM_ajax_info['errList']['retrato']))
                {
                    $this->NM_ajax_info['errList']['retrato'] = array();
                }
                $this->NM_ajax_info['errList']['retrato'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'retrato';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_retrato

    function ValidateField_smtp_host(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_host'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_host) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Smtp Host " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_host']))
              {
                  $Campos_Erros['smtp_host'] = array();
              }
              $Campos_Erros['smtp_host'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_host']) || !is_array($this->NM_ajax_info['errList']['smtp_host']))
              {
                  $this->NM_ajax_info['errList']['smtp_host'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_host'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_host';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_host

    function ValidateField_smtp_port(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_port'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_port) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "Smtp Port " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_port']))
              {
                  $Campos_Erros['smtp_port'] = array();
              }
              $Campos_Erros['smtp_port'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_port']) || !is_array($this->NM_ajax_info['errList']['smtp_port']))
              {
                  $this->NM_ajax_info['errList']['smtp_port'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_port'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_port';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_port

    function ValidateField_smtp_user(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_user'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_user) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Smtp User " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_user']))
              {
                  $Campos_Erros['smtp_user'] = array();
              }
              $Campos_Erros['smtp_user'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_user']) || !is_array($this->NM_ajax_info['errList']['smtp_user']))
              {
                  $this->NM_ajax_info['errList']['smtp_user'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_user'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_user';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_user

    function ValidateField_smtp_password(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_password'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_password) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Smtp Password " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_password']))
              {
                  $Campos_Erros['smtp_password'] = array();
              }
              $Campos_Erros['smtp_password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_password']) || !is_array($this->NM_ajax_info['errList']['smtp_password']))
              {
                  $this->NM_ajax_info['errList']['smtp_password'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_password';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_password
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->assinatura == "none") 
          { 
              $this->assinatura = ""; 
          } 
          if ($this->assinatura != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_funcionario_doc_name.php';
              }
              $this->assinatura = sc_upload_unprotect_chars($this->assinatura, true);
              $this->assinatura_scfile_name = sc_upload_unprotect_chars($this->assinatura_scfile_name, true);
              if ($nm_browser == "Opera")  
              { 
                  $this->assinatura_scfile_type = substr($this->assinatura_scfile_type, 0, strpos($this->assinatura_scfile_type, ";")) ; 
              } 
              if ($this->assinatura_scfile_type == "image/pjpeg" || $this->assinatura_scfile_type == "image/jpeg"  || $this->assinatura_scfile_type == "image/gif" || 
                  $this->assinatura_scfile_type == "image/png"   || $this->assinatura_scfile_type == "image/x-png" || $this->assinatura_scfile_type == "image/bmp" || 
                  $this->assinatura_scfile_type == "image/webp")
              { 
                  if (!is_file($this->assinatura) && isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8') {
                      $mbConvertFileName = mb_convert_encoding($this->assinatura, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      $mbConvertScFileName = mb_convert_encoding($this->assinatura_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      if (is_file($mbConvertFileName)) {
                          $this->assinatura = $mbConvertFileName;
                          $this->assinatura_scfile_name = $mbConvertScFileName;
                      }
                  }
                  if (is_file($this->assinatura))  
                  { 
                      $this->NM_size_docs[$this->assinatura_scfile_name] = $this->sc_file_size($this->assinatura);
                      $reg_assinatura = file_get_contents($this->assinatura); 
                      $this->assinatura = $reg_assinatura; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Assinatura " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->assinatura = "";
                      if (!isset($Campos_Erros['assinatura']))
                      {
                          $Campos_Erros['assinatura'] = array();
                      }
                      $Campos_Erros['assinatura'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['assinatura']) || !is_array($this->NM_ajax_info['errList']['assinatura']))
                      {
                          $this->NM_ajax_info['errList']['assinatura'] = array();
                      }
                      $this->NM_ajax_info['errList']['assinatura'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->assinatura = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "Assinatura " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['assinatura']))
                      {
                          $Campos_Erros['assinatura'] = array();
                      }
                      $Campos_Erros['assinatura'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['assinatura']) || !is_array($this->NM_ajax_info['errList']['assinatura']))
                      {
                          $this->NM_ajax_info['errList']['assinatura'] = array();
                      }
                      $this->NM_ajax_info['errList']['assinatura'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form']['assinatura']) && $this->assinatura_limpa != "S")
          {
              $this->assinatura = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form']['assinatura'];
          }
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->retrato == "none") 
          { 
              $this->retrato = ""; 
          } 
          if ($this->retrato != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_funcionario_doc_name.php';
              }
              $this->retrato = sc_upload_unprotect_chars($this->retrato, true);
              $this->retrato_scfile_name = sc_upload_unprotect_chars($this->retrato_scfile_name, true);
              if ($nm_browser == "Opera")  
              { 
                  $this->retrato_scfile_type = substr($this->retrato_scfile_type, 0, strpos($this->retrato_scfile_type, ";")) ; 
              } 
              if ($this->retrato_scfile_type == "image/pjpeg" || $this->retrato_scfile_type == "image/jpeg"  || $this->retrato_scfile_type == "image/gif" || 
                  $this->retrato_scfile_type == "image/png"   || $this->retrato_scfile_type == "image/x-png" || $this->retrato_scfile_type == "image/bmp" || 
                  $this->retrato_scfile_type == "image/webp")
              { 
                  if (!is_file($this->retrato) && isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8') {
                      $mbConvertFileName = mb_convert_encoding($this->retrato, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      $mbConvertScFileName = mb_convert_encoding($this->retrato_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      if (is_file($mbConvertFileName)) {
                          $this->retrato = $mbConvertFileName;
                          $this->retrato_scfile_name = $mbConvertScFileName;
                      }
                  }
                  if (is_file($this->retrato))  
                  { 
                      $this->NM_size_docs[$this->retrato_scfile_name] = $this->sc_file_size($this->retrato);
                      $reg_retrato = file_get_contents($this->retrato); 
                      $this->retrato = $reg_retrato; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Retrato " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->retrato = "";
                      if (!isset($Campos_Erros['retrato']))
                      {
                          $Campos_Erros['retrato'] = array();
                      }
                      $Campos_Erros['retrato'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['retrato']) || !is_array($this->NM_ajax_info['errList']['retrato']))
                      {
                          $this->NM_ajax_info['errList']['retrato'] = array();
                      }
                      $this->NM_ajax_info['errList']['retrato'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->retrato = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "Retrato " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['retrato']))
                      {
                          $Campos_Erros['retrato'] = array();
                      }
                      $Campos_Erros['retrato'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['retrato']) || !is_array($this->NM_ajax_info['errList']['retrato']))
                      {
                          $this->NM_ajax_info['errList']['retrato'] = array();
                      }
                      $this->NM_ajax_info['errList']['retrato'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form']['retrato']) && $this->retrato_limpa != "S")
          {
              $this->retrato = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form']['retrato'];
          }
      } 
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['nome'] = $this->nome;
    $this->nmgp_dados_form['endereco'] = $this->endereco;
    $this->nmgp_dados_form['nascimento'] = (strlen(trim($this->nascimento)) > 19) ? str_replace(".", ":", $this->nascimento) : trim($this->nascimento);
    $this->nmgp_dados_form['cep'] = $this->cep;
    $this->nmgp_dados_form['telefone'] = $this->telefone;
    $this->nmgp_dados_form['cpf'] = $this->cpf;
    $this->nmgp_dados_form['filiacao'] = $this->filiacao;
    $this->nmgp_dados_form['identidade'] = $this->identidade;
    $this->nmgp_dados_form['habilitaca'] = $this->habilitaca;
    $this->nmgp_dados_form['certreserv'] = $this->certreserv;
    $this->nmgp_dados_form['titulo'] = $this->titulo;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['divisao'] = $this->divisao;
    $this->nmgp_dados_form['funcao'] = $this->funcao;
    $this->nmgp_dados_form['consultor'] = $this->consultor;
    $this->nmgp_dados_form['nivel'] = $this->nivel;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $this->nmgp_dados_form['senha'] = $this->senha;
    $this->nmgp_dados_form['salario'] = $this->salario;
    $this->nmgp_dados_form['admissao'] = (strlen(trim($this->admissao)) > 19) ? str_replace(".", ":", $this->admissao) : trim($this->admissao);
    $this->nmgp_dados_form['ativo'] = $this->ativo;
    $this->nmgp_dados_form['meu_telefone'] = $this->meu_telefone;
    $this->nmgp_dados_form['obs'] = $this->obs;
    if (empty($this->assinatura))
    {
        $this->assinatura = $this->nmgp_dados_form['assinatura'];
    }
    $this->nmgp_dados_form['assinatura'] = $this->assinatura;
    $this->nmgp_dados_form['assinatura_limpa'] = $this->assinatura_limpa;
    $this->nmgp_dados_form['rodape'] = $this->rodape;
    if (empty($this->retrato))
    {
        $this->retrato = $this->nmgp_dados_form['retrato'];
    }
    $this->nmgp_dados_form['retrato'] = $this->retrato;
    $this->nmgp_dados_form['retrato_limpa'] = $this->retrato_limpa;
    $this->nmgp_dados_form['smtp_host'] = $this->smtp_host;
    $this->nmgp_dados_form['smtp_port'] = $this->smtp_port;
    $this->nmgp_dados_form['smtp_user'] = $this->smtp_user;
    $this->nmgp_dados_form['smtp_password'] = $this->smtp_password;
    $this->nmgp_dados_form['habilita'] = $this->habilita;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->Before_unformat['nascimento'] = $this->nascimento;
      nm_limpa_data($this->nascimento, $this->field_config['nascimento']['date_sep']) ; 
      $this->Before_unformat['cep'] = $this->cep;
      nm_limpa_cep($this->cep) ; 
      $this->Before_unformat['cpf'] = $this->cpf;
      nm_limpa_ciccnpj($this->cpf) ; 
      $this->Before_unformat['salario'] = $this->salario;
      if (!empty($this->field_config['salario']['symbol_dec']))
      {
         nm_limpa_valor($this->salario, $this->field_config['salario']['symbol_dec'], $this->field_config['salario']['symbol_grp']);
      }
      $this->Before_unformat['admissao'] = $this->admissao;
      nm_limpa_data($this->admissao, $this->field_config['admissao']['date_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cep")
      {
          nm_limpa_cep($this->cep) ; 
      }
      if ($Nome_Campo == "cpf")
      {
          nm_limpa_ciccnpj($this->cpf) ; 
      }
      if ($Nome_Campo == "salario")
      {
          if (!empty($this->field_config['salario']['symbol_dec']))
          {
             nm_limpa_valor($this->salario, $this->field_config['salario']['symbol_dec'], $this->field_config['salario']['symbol_grp']);
          }
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->id || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", $this->field_config['id']['format_neg'], "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
      }
      if ((!empty($this->nascimento) && 'null' != $this->nascimento) || (!empty($format_fields) && isset($format_fields['nascimento'])))
      {
          nm_volta_data($this->nascimento, $this->field_config['nascimento']['date_format']) ; 
          nmgp_Form_Datas($this->nascimento, $this->field_config['nascimento']['date_format'], $this->field_config['nascimento']['date_sep']) ;  
      }
      elseif ('null' == $this->nascimento || '' == $this->nascimento)
      {
          $this->nascimento = '';
      }
      if (!empty($this->cep) || (!empty($format_fields) && isset($format_fields['cep'])))
      {
          nmgp_Form_Cep($this->cep) ; 
      }
      if (!empty($this->cpf) || (!empty($format_fields) && isset($format_fields['cpf'])))
      {
          nmgp_Form_CicCnpj($this->cpf) ; 
      }
      if ('' !== $this->salario || (!empty($format_fields) && isset($format_fields['salario'])))
      {
          nmgp_Form_Num_Val($this->salario, $this->field_config['salario']['symbol_grp'], $this->field_config['salario']['symbol_dec'], "6", "S", $this->field_config['salario']['format_neg'], "", "", "-", $this->field_config['salario']['symbol_fmt']) ; 
      }
      if ((!empty($this->admissao) && 'null' != $this->admissao) || (!empty($format_fields) && isset($format_fields['admissao'])))
      {
          nm_volta_data($this->admissao, $this->field_config['admissao']['date_format']) ; 
          nmgp_Form_Datas($this->admissao, $this->field_config['admissao']['date_format'], $this->field_config['admissao']['date_sep']) ;  
      }
      elseif ('null' == $this->admissao || '' == $this->admissao)
      {
          $this->admissao = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
   function nm_validate_mask($value, $mask_list)
   {
       if ('' == $value)
       {
           return true;
       }

       $size_ok   = false;
       $test_mask = '';
       foreach ($mask_list as $tmp_mask)
       {
           if (mb_strlen($value) == strlen($tmp_mask))
           {
               $size_ok   = true;
               $test_mask = $tmp_mask;
           }
       }

       if (!$size_ok)
       {
           return false;
       }

       $i           = 0;
       $thisPointer = 0;
       while (false !== ($test_char = $this->nm_next_char($value, $thisPointer)))
       {
           if (!$this->nm_validate_mask_char($test_char, $test_mask[$i]))
           {
               return false;
           }
           $i++;
       }

       return true;
       for ($i = 0; $i < strlen($value); $i++)
       {
           if (!$this->nm_validate_mask_char($value[$i], $test_mask[$i]))
           {
               return false;
           }
       }

       return true;
   }

   function nm_validate_mask_char($value_char, $mask_char)
   {
       switch ($mask_char)
       {
           case '9':
               return false !== strpos('0123456789', $value_char);
               break;

           case 'a':
               return false !== strpos('abcdefghijklmnopqrstuvwxyz', strtolower($value_char));
               break;

           case '*':
               if (false !== strpos('abcdefghijklmnopqrstuvwxyz0123456789', strtolower($value_char))) {
                   return true;
               }
               if (preg_match("/\p{Arabic}/u", $value_char)) {
                   return true;
               }

               return false;
               break;

           default:
               return $value_char == $mask_char;
               break;
       }
   }

   function nm_next_char($string, &$pointer) {
       if (!isset($string[$pointer])) {
           return false;
       }

       $char = ord($string[$pointer]);

       if ($char < 128) {
           return $string[$pointer++];
       }
       else {
           if ($char < 224) {
               $bytes = 2;
           }
           elseif ($char < 240) {
               $bytes = 3;
           }
           elseif ($char < 248) {
               $bytes = 4;
           }
           elseif($char == 252) {
               $bytes = 5;
           }
           else {
               $bytes = 6;
           }

           $str      = substr($string, $pointer, $bytes);
           $pointer += $bytes;

           return $str;
       }
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['nascimento']['date_format'];
      if ($this->nascimento != "")  
      { 
          nm_conv_data($this->nascimento, $this->field_config['nascimento']['date_format']) ; 
          $this->nascimento_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->nascimento_hora = substr($this->nascimento_hora, 0, -4);
          }
      } 
      if ($this->nascimento == "" && $use_null)  
      { 
          $this->nascimento = "null" ; 
      } 
      $this->field_config['nascimento']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['admissao']['date_format'];
      if ($this->admissao != "")  
      { 
          nm_conv_data($this->admissao, $this->field_config['admissao']['date_format']) ; 
          $this->admissao_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->admissao_hora = substr($this->admissao_hora, 0, -4);
          }
      } 
      if ($this->admissao == "" && $use_null)  
      { 
          $this->admissao = "null" ; 
      } 
      $this->field_config['admissao']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_id();
          $this->ajax_return_values_nome();
          $this->ajax_return_values_endereco();
          $this->ajax_return_values_nascimento();
          $this->ajax_return_values_cep();
          $this->ajax_return_values_telefone();
          $this->ajax_return_values_cpf();
          $this->ajax_return_values_filiacao();
          $this->ajax_return_values_identidade();
          $this->ajax_return_values_habilitaca();
          $this->ajax_return_values_certreserv();
          $this->ajax_return_values_titulo();
          $this->ajax_return_values_email();
          $this->ajax_return_values_divisao();
          $this->ajax_return_values_funcao();
          $this->ajax_return_values_consultor();
          $this->ajax_return_values_nivel();
          $this->ajax_return_values_usuario();
          $this->ajax_return_values_senha();
          $this->ajax_return_values_salario();
          $this->ajax_return_values_admissao();
          $this->ajax_return_values_ativo();
          $this->ajax_return_values_meu_telefone();
          $this->ajax_return_values_obs();
          $this->ajax_return_values_assinatura();
          $this->ajax_return_values_rodape();
          $this->ajax_return_values_retrato();
          $this->ajax_return_values_smtp_host();
          $this->ajax_return_values_smtp_port();
          $this->ajax_return_values_smtp_user();
          $this->ajax_return_values_smtp_password();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_funcionario_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- id
   function ajax_return_values_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("id", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- nome
   function ajax_return_values_nome($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nome", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nome);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nome'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- endereco
   function ajax_return_values_endereco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("endereco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->endereco);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['endereco'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nascimento
   function ajax_return_values_nascimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nascimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nascimento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nascimento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cep
   function ajax_return_values_cep($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cep", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cep);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cep'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- telefone
   function ajax_return_values_telefone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telefone);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telefone'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cpf
   function ajax_return_values_cpf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cpf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cpf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cpf'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- filiacao
   function ajax_return_values_filiacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("filiacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->filiacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['filiacao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- identidade
   function ajax_return_values_identidade($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("identidade", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->identidade);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['identidade'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- habilitaca
   function ajax_return_values_habilitaca($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("habilitaca", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->habilitaca);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['habilitaca'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- certreserv
   function ajax_return_values_certreserv($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("certreserv", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->certreserv);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['certreserv'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- titulo
   function ajax_return_values_titulo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("titulo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->titulo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['titulo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- email
   function ajax_return_values_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- divisao
   function ajax_return_values_divisao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("divisao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->divisao);
              $aLookup = array();
              $this->_tmp_lookup_divisao = $this->divisao;

$aLookup[] = array(form_funcionario_pack_protect_string('TECNICA') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Técnica")));
$aLookup[] = array(form_funcionario_pack_protect_string('COMERCIAL') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Comercial")));
$aLookup[] = array(form_funcionario_pack_protect_string('ADM') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Administração")));
$aLookup[] = array(form_funcionario_pack_protect_string('APOIO') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Apoio")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_divisao'][] = 'TECNICA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_divisao'][] = 'COMERCIAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_divisao'][] = 'ADM';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_divisao'][] = 'APOIO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"divisao\"";
          if (isset($this->NM_ajax_info['select_html']['divisao']) && !empty($this->NM_ajax_info['select_html']['divisao']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['divisao']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->divisao == $sValue)
                  {
                      $this->_tmp_lookup_divisao = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['divisao'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['divisao']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['divisao']['valList'][$i] = form_funcionario_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['divisao']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['divisao']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['divisao']['labList'] = $aLabel;
          }
   }

          //----- funcao
   function ajax_return_values_funcao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("funcao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->funcao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['funcao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- consultor
   function ajax_return_values_consultor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("consultor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->consultor);
              $aLookup = array();
              $this->_tmp_lookup_consultor = $this->consultor;

$aLookup[] = array(form_funcionario_pack_protect_string('1') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Sim")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_consultor'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['consultor']) && !empty($this->NM_ajax_info['select_html']['consultor']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['consultor']);
          }
          $this->NM_ajax_info['fldList']['consultor'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-consultor',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['consultor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['consultor']['valList'][$i] = form_funcionario_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['consultor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['consultor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['consultor']['labList'] = $aLabel;
          }
   }

          //----- nivel
   function ajax_return_values_nivel($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nivel", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nivel);
              $aLookup = array();
              $this->_tmp_lookup_nivel = $this->nivel;

$aLookup[] = array(form_funcionario_pack_protect_string('0') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Usuário")));
$aLookup[] = array(form_funcionario_pack_protect_string('1') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Gerencia")));
$aLookup[] = array(form_funcionario_pack_protect_string('2') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Administrador")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_nivel'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_nivel'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_nivel'][] = '2';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['nivel']) && !empty($this->NM_ajax_info['select_html']['nivel']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['nivel']);
          }
          $this->NM_ajax_info['fldList']['nivel'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 3,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['nivel']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['nivel']['valList'][$i] = form_funcionario_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nivel']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nivel']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nivel']['labList'] = $aLabel;
          }
   }

          //----- usuario
   function ajax_return_values_usuario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->usuario);
              $aLookup = array();
              $this->_tmp_lookup_usuario = $this->usuario;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'] = array(); 
}
$aLookup[] = array(form_funcionario_pack_protect_string('') => str_replace('<', '&lt;',form_funcionario_pack_protect_string('Selecione o usuario')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'][] = '';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_nascimento = $this->nascimento;
   $old_value_cep = $this->cep;
   $old_value_cpf = $this->cpf;
   $old_value_salario = $this->salario;
   $old_value_admissao = $this->admissao;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_id = $this->id;
   $unformatted_value_nascimento = $this->nascimento;
   $unformatted_value_cep = $this->cep;
   $unformatted_value_cpf = $this->cpf;
   $unformatted_value_salario = $this->salario;
   $unformatted_value_admissao = $this->admissao;

   $consultor_val_str = "";
   if (!empty($this->consultor))
   {
       if (is_array($this->consultor))
       {
           $Tmp_array = $this->consultor;
       }
       else
       {
           $Tmp_array = explode(";", $this->consultor);
       }
       $consultor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $consultor_val_str)
          {
             $consultor_val_str .= ", ";
          }
          $consultor_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT login, name  FROM sec_users  ORDER BY name";

   $this->id = $old_value_id;
   $this->nascimento = $old_value_nascimento;
   $this->cep = $old_value_cep;
   $this->cpf = $old_value_cpf;
   $this->salario = $old_value_salario;
   $this->admissao = $old_value_admissao;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_funcionario_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_funcionario_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"usuario\"";
          if (isset($this->NM_ajax_info['select_html']['usuario']) && !empty($this->NM_ajax_info['select_html']['usuario']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['usuario']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->usuario == $sValue)
                  {
                      $this->_tmp_lookup_usuario = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['usuario'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['usuario']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['usuario']['valList'][$i] = form_funcionario_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['usuario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['usuario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['usuario']['labList'] = $aLabel;
          }
   }

          //----- senha
   function ajax_return_values_senha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("senha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->senha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['senha'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- salario
   function ajax_return_values_salario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("salario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->salario);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['salario'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- admissao
   function ajax_return_values_admissao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("admissao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->admissao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['admissao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ativo
   function ajax_return_values_ativo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ativo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ativo);
              $aLookup = array();
              $this->_tmp_lookup_ativo = $this->ativo;

$aLookup[] = array(form_funcionario_pack_protect_string('SIM') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Sim")));
$aLookup[] = array(form_funcionario_pack_protect_string('NAO') => str_replace('<', '&lt;',form_funcionario_pack_protect_string("Não")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_ativo'][] = 'SIM';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_ativo'][] = 'NAO';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ativo']) && !empty($this->NM_ajax_info['select_html']['ativo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ativo']);
          }
          $this->NM_ajax_info['fldList']['ativo'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ativo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ativo']['valList'][$i] = form_funcionario_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ativo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ativo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ativo']['labList'] = $aLabel;
          }
   }

          //----- meu_telefone
   function ajax_return_values_meu_telefone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("meu_telefone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->meu_telefone);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['meu_telefone'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- obs
   function ajax_return_values_obs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- assinatura
   function ajax_return_values_assinatura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("assinatura", $this->nmgp_refresh_fields)) || $bForce || in_array("assinatura", $this->Upload_refresh_fields))
          {
              $sTmpValue = NM_charset_to_utf8($this->assinatura);
              $aLookup = array();
   $out_assinatura = '';
   $out1_assinatura = '';
   if ($this->assinatura != "" && $this->assinatura != "none")   
   { 
       if (is_string($this->assinatura) && substr($this->assinatura, 0, 4) == "*nm*") 
       { 
           $this->assinatura = substr($this->assinatura, 4) ; 
           $this->assinatura = base64_decode($this->assinatura) ; 
       } 
       $img_pos_bm = (is_string($this->assinatura)) ? strpos($this->assinatura, "BM") : false; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->assinatura = substr($this->assinatura, $img_pos_bm) ; 
       } 
       $Ext_File = $this->scGetImageExtension($this->assinatura);
       $out_assinatura = $this->Ini->path_imag_temp . "/sc_assinatura_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . $Ext_File;  
       $out1_assinatura = $out_assinatura; 
       $arq_assinatura = fopen($this->Ini->root . $out_assinatura, "w") ;  
       fwrite($arq_assinatura, (string)$this->assinatura) ;  
       fclose($arq_assinatura) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_assinatura, true);
       $this->nmgp_return_img['assinatura'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['assinatura'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['assinatura'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_assinatura,
               'imgOrig' => $out1_assinatura,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- rodape
   function ajax_return_values_rodape($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rodape", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rodape);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rodape'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- retrato
   function ajax_return_values_retrato($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("retrato", $this->nmgp_refresh_fields)) || $bForce || in_array("retrato", $this->Upload_refresh_fields))
          {
              $sTmpValue = NM_charset_to_utf8($this->retrato);
              $aLookup = array();
   $out_retrato = '';
   $out1_retrato = '';
   if ($this->retrato != "" && $this->retrato != "none")   
   { 
       if (is_string($this->retrato) && substr($this->retrato, 0, 4) == "*nm*") 
       { 
           $this->retrato = substr($this->retrato, 4) ; 
           $this->retrato = base64_decode($this->retrato) ; 
       } 
       $img_pos_bm = (is_string($this->retrato)) ? strpos($this->retrato, "BM") : false; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->retrato = substr($this->retrato, $img_pos_bm) ; 
       } 
       $Ext_File = $this->scGetImageExtension($this->retrato);
       $out_retrato = $this->Ini->path_imag_temp . "/sc_retrato_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . $Ext_File;  
       $out1_retrato = $out_retrato; 
       $arq_retrato = fopen($this->Ini->root . $out_retrato, "w") ;  
       fwrite($arq_retrato, (string)$this->retrato) ;  
       fclose($arq_retrato) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_retrato, true);
       $this->nmgp_return_img['retrato'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['retrato'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['retrato'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_retrato,
               'imgOrig' => $out1_retrato,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- smtp_host
   function ajax_return_values_smtp_host($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_host", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_host);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_host'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- smtp_port
   function ajax_return_values_smtp_port($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_port", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_port);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_port'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- smtp_user
   function ajax_return_values_smtp_user($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_user", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_user);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_user'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- smtp_password
   function ajax_return_values_smtp_password($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_password", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_password);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_password'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['upload_dir'][$fieldName][] = $newName;
            $this->Upload_refresh_fields[] = $fieldName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
       $this->NM_ajax_info['summary_line'] = $this->getSummaryLine();
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $Ctrl_Proc_Onload = true;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Field_no_validate'] = array();
      if (!isset($Ctrl_Format) || !$Ctrl_Format) {
          $this->nm_guardar_campos();
          if ($bFormat) $this->nm_formatar_campos();
      }
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->salario = str_replace($sc_parm1, $sc_parm2, $this->salario); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->salario = "'" . $this->salario . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->salario = str_replace("'", "", $this->salario); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']))
          {
               $sc_where_pos = " WHERE ((ID < $this->id))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->id)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }

   function restore_zeros_null()
   {
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($this->NM_val_null))
      {
          foreach ($this->NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      $this->NM_val_null = array();
   }

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $this->NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->restore_zeros_null();
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if ((!isset($this->Ini->nm_bases_access) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['id'] = $this->id;
      $NM_val_form['nome'] = $this->nome;
      $NM_val_form['endereco'] = $this->endereco;
      $NM_val_form['nascimento'] = $this->nascimento;
      $NM_val_form['cep'] = $this->cep;
      $NM_val_form['telefone'] = $this->telefone;
      $NM_val_form['cpf'] = $this->cpf;
      $NM_val_form['filiacao'] = $this->filiacao;
      $NM_val_form['identidade'] = $this->identidade;
      $NM_val_form['habilitaca'] = $this->habilitaca;
      $NM_val_form['certreserv'] = $this->certreserv;
      $NM_val_form['titulo'] = $this->titulo;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['divisao'] = $this->divisao;
      $NM_val_form['funcao'] = $this->funcao;
      $NM_val_form['consultor'] = $this->consultor;
      $NM_val_form['nivel'] = $this->nivel;
      $NM_val_form['usuario'] = $this->usuario;
      $NM_val_form['senha'] = $this->senha;
      $NM_val_form['salario'] = $this->salario;
      $NM_val_form['admissao'] = $this->admissao;
      $NM_val_form['ativo'] = $this->ativo;
      $NM_val_form['meu_telefone'] = $this->meu_telefone;
      $NM_val_form['obs'] = $this->obs;
      $NM_val_form['assinatura'] = $this->assinatura;
      $NM_val_form['rodape'] = $this->rodape;
      $NM_val_form['retrato'] = $this->retrato;
      $NM_val_form['smtp_host'] = $this->smtp_host;
      $NM_val_form['smtp_port'] = $this->smtp_port;
      $NM_val_form['smtp_user'] = $this->smtp_user;
      $NM_val_form['smtp_password'] = $this->smtp_password;
      $NM_val_form['habilita'] = $this->habilita;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->consultor === "" || is_null($this->consultor))  
      { 
          $this->consultor = 0;
          $this->sc_force_zero[] = 'consultor';
      } 
      if ($this->salario === "" || is_null($this->salario))  
      { 
          $this->salario = 0;
          $this->sc_force_zero[] = 'salario';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_mysql, $this->Ini->nm_bases_sqlite);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->nome_before_qstr = $this->nome;
          $this->nome = substr($this->Db->qstr($this->nome), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->nome = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->nome);
          }
          $this->endereco_before_qstr = $this->endereco;
          $this->endereco = substr($this->Db->qstr($this->endereco), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->endereco = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->endereco);
          }
          if ($this->nascimento == "")  
          { 
              $this->nascimento = "null"; 
              $this->NM_val_null[] = "nascimento";
          } 
          $this->cep_before_qstr = $this->cep;
          $this->cep = substr($this->Db->qstr($this->cep), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->cep = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->cep);
          }
          $this->telefone_before_qstr = $this->telefone;
          $this->telefone = substr($this->Db->qstr($this->telefone), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->telefone = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->telefone);
          }
          $this->cpf_before_qstr = $this->cpf;
          $this->cpf = substr($this->Db->qstr($this->cpf), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->cpf = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->cpf);
          }
          $this->identidade_before_qstr = $this->identidade;
          $this->identidade = substr($this->Db->qstr($this->identidade), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->identidade = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->identidade);
          }
          $this->habilitaca_before_qstr = $this->habilitaca;
          $this->habilitaca = substr($this->Db->qstr($this->habilitaca), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->habilitaca = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->habilitaca);
          }
          $this->certreserv_before_qstr = $this->certreserv;
          $this->certreserv = substr($this->Db->qstr($this->certreserv), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->certreserv = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->certreserv);
          }
          $this->titulo_before_qstr = $this->titulo;
          $this->titulo = substr($this->Db->qstr($this->titulo), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->titulo = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->titulo);
          }
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->email = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->email);
          }
          $this->filiacao_before_qstr = $this->filiacao;
          $this->filiacao = substr($this->Db->qstr($this->filiacao), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->filiacao = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->filiacao);
          }
          $this->divisao_before_qstr = $this->divisao;
          $this->divisao = substr($this->Db->qstr($this->divisao), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->divisao = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->divisao);
          }
          $this->funcao_before_qstr = $this->funcao;
          $this->funcao = substr($this->Db->qstr($this->funcao), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->funcao = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->funcao);
          }
          if ($this->admissao == "")  
          { 
              $this->admissao = "null"; 
              $this->NM_val_null[] = "admissao";
          } 
          $this->obs_before_qstr = $this->obs;
          $this->obs = substr($this->Db->qstr($this->obs), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->obs = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->obs);
          }
          $this->usuario_before_qstr = $this->usuario;
          $this->usuario = substr($this->Db->qstr($this->usuario), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->usuario = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->usuario);
          }
          $this->nivel_before_qstr = $this->nivel;
          $this->nivel = substr($this->Db->qstr($this->nivel), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->nivel = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->nivel);
          }
          $this->senha_before_qstr = $this->senha;
          $this->senha = substr($this->Db->qstr($this->senha), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->senha = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->senha);
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { }
          else
          { 
              $this->assinatura =  substr($this->Db->qstr($this->assinatura), 1, -1);
          } 
          $this->rodape_before_qstr = $this->rodape;
          $this->rodape = substr($this->Db->qstr($this->rodape), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->rodape = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->rodape);
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { }
          else
          { 
              $this->retrato =  substr($this->Db->qstr($this->retrato), 1, -1);
          } 
          $this->ativo_before_qstr = $this->ativo;
          $this->ativo = substr($this->Db->qstr($this->ativo), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->ativo = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->ativo);
          }
          $this->smtp_host_before_qstr = $this->smtp_host;
          $this->smtp_host = substr($this->Db->qstr($this->smtp_host), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->smtp_host = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->smtp_host);
          }
          $this->smtp_port_before_qstr = $this->smtp_port;
          $this->smtp_port = substr($this->Db->qstr($this->smtp_port), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->smtp_port = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->smtp_port);
          }
          $this->smtp_user_before_qstr = $this->smtp_user;
          $this->smtp_user = substr($this->Db->qstr($this->smtp_user), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->smtp_user = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->smtp_user);
          }
          $this->smtp_password_before_qstr = $this->smtp_password;
          $this->smtp_password = substr($this->Db->qstr($this->smtp_password), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->smtp_password = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->smtp_password);
          }
          $this->habilita_before_qstr = $this->habilita;
          $this->habilita = substr($this->Db->qstr($this->habilita), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->habilita = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->habilita);
          }
          $this->meu_telefone_before_qstr = $this->meu_telefone;
          $this->meu_telefone = substr($this->Db->qstr($this->meu_telefone), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->meu_telefone = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->meu_telefone);
          }
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id ";
          $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_funcionario_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (USUARIO = '" . $this->usuario . "') AND (ID <> $this->id)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) {
                      $this->sc_erro_update = $dbErrorMessage;
                      $this->NM_rollback_db();
                      if ($this->NM_ajax_flag) {
                          form_funcionario_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " Login"); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'usuario';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "NOME = '$this->nome', ENDERECO = '$this->endereco', NASCIMENTO = " . $this->Ini->date_delim . $this->nascimento . $this->Ini->date_delim1 . ", CEP = '$this->cep', TELEFONE = '$this->telefone', CPF = '$this->cpf', IDENTIDADE = '$this->identidade', HABILITACA = '$this->habilitaca', CERTRESERV = '$this->certreserv', TITULO = '$this->titulo', EMAIL = '$this->email', Filiacao = '$this->filiacao', DIVISAO = '$this->divisao', FUNCAO = '$this->funcao', CONSULTOR = $this->consultor, Salario = $this->salario, Admissao = " . $this->Ini->date_delim . $this->admissao . $this->Ini->date_delim1 . ", Obs = '$this->obs', USUARIO = '$this->usuario', NIVEL = '$this->nivel', SENHA = '$this->senha', RODAPE = '$this->rodape', ATIVO = '$this->ativo', SMTP_HOST = '$this->smtp_host', SMTP_PORT = '$this->smtp_port', SMTP_USER = '$this->smtp_user', MEU_TELEFONE = '$this->meu_telefone'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "NOME = '$this->nome', ENDERECO = '$this->endereco', NASCIMENTO = " . $this->Ini->date_delim . $this->nascimento . $this->Ini->date_delim1 . ", CEP = '$this->cep', TELEFONE = '$this->telefone', CPF = '$this->cpf', IDENTIDADE = '$this->identidade', HABILITACA = '$this->habilitaca', CERTRESERV = '$this->certreserv', TITULO = '$this->titulo', EMAIL = '$this->email', Filiacao = '$this->filiacao', DIVISAO = '$this->divisao', FUNCAO = '$this->funcao', CONSULTOR = $this->consultor, Salario = $this->salario, Admissao = " . $this->Ini->date_delim . $this->admissao . $this->Ini->date_delim1 . ", Obs = '$this->obs', USUARIO = '$this->usuario', NIVEL = '$this->nivel', SENHA = '$this->senha', RODAPE = '$this->rodape', ATIVO = '$this->ativo', SMTP_HOST = '$this->smtp_host', SMTP_PORT = '$this->smtp_port', SMTP_USER = '$this->smtp_user', MEU_TELEFONE = '$this->meu_telefone'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['habilita']) && $NM_val_form['habilita'] == "null"  && $this->nmgp_dados_select['habilita'] == "") ? "null" : $this->nmgp_dados_select['habilita'];
              if (isset($NM_val_form['habilita']) && $NM_val_form['habilita'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "HABILITA = '$this->habilita'"; 
              } 
              $temp_cmd_sql = "";
              if ($this->assinatura_limpa == "S")
              {
                  if ($this->assinatura != "null")
                  {
                      $this->assinatura = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "ASSINATURA = '" . $this->assinatura . "'";
                  }
                  $this->assinatura = "";
              }
              else
              {
                  if ($this->assinatura != "none" && $this->assinatura != "" && $this->assinatura != "*nm*")
                  {
                      $NM_conteudo =  $this->assinatura;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      }
                      else
                      {
                          $temp_cmd_sql .= " ASSINATURA = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "assinatura";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              $temp_cmd_sql = "";
              if ($this->retrato_limpa == "S")
              {
                  if ($this->retrato != "null")
                  {
                      $this->retrato = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "RETRATO = '" . $this->retrato . "'";
                  }
                  $this->retrato = "";
              }
              else
              {
                  if ($this->retrato != "none" && $this->retrato != "" && $this->retrato != "*nm*")
                  {
                      $NM_conteudo =  $this->retrato;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      }
                      else
                      {
                          $temp_cmd_sql .= " RETRATO = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "retrato";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->assinatura_limpa == "S" || ($this->assinatura != "none" && $this->assinatura != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                  { 
                      $SC_fields_update[] = "ASSINATURA = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite)) 
                  { 
                      $SC_fields_update[] = "ASSINATURA = ''"; 
                  } 
                  else 
                  { 
                      $SC_fields_update[] = "ASSINATURA = empty_blob()"; 
                  } 
              } 
              if ($this->retrato_limpa == "S" || ($this->retrato != "none" && $this->retrato != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                  { 
                      $SC_fields_update[] = "RETRATO = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite)) 
                  { 
                      $SC_fields_update[] = "RETRATO = ''"; 
                  } 
                  else 
                  { 
                      $SC_fields_update[] = "RETRATO = empty_blob()"; 
                  } 
              } 
             if (isset($this->Ini->nm_bases_oracle) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
             {
             if ($this->smtp_password != "" && $this->smtp_password != "null" && $this->smtp_password != $this->nmgp_dados_select['smtp_password']) 
             { 
                  $SC_fields_update[] = "SMTP_PASSWORD = '$this->smtp_password'" ; 
             } 
             } 
             else 
             {
             if ($this->smtp_password != "" && $this->smtp_password != "null" && $this->smtp_password != $this->nmgp_dados_select['smtp_password']) 
             { 
                  $SC_fields_update[] = "SMTP_PASSWORD = '$this->smtp_password'" ; 
             } 
             } 
              $comando .= implode(",", $SC_fields_update);  
              $comando .= " WHERE ID = $this->id ";  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_funcionario_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->nome = $this->nome_before_qstr;
              $this->endereco = $this->endereco_before_qstr;
              $this->cep = $this->cep_before_qstr;
              $this->telefone = $this->telefone_before_qstr;
              $this->cpf = $this->cpf_before_qstr;
              $this->identidade = $this->identidade_before_qstr;
              $this->habilitaca = $this->habilitaca_before_qstr;
              $this->certreserv = $this->certreserv_before_qstr;
              $this->titulo = $this->titulo_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->filiacao = $this->filiacao_before_qstr;
              $this->divisao = $this->divisao_before_qstr;
              $this->funcao = $this->funcao_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->nivel = $this->nivel_before_qstr;
              $this->senha = $this->senha_before_qstr;
              $this->rodape = $this->rodape_before_qstr;
              $this->ativo = $this->ativo_before_qstr;
              $this->smtp_host = $this->smtp_host_before_qstr;
              $this->smtp_port = $this->smtp_port_before_qstr;
              $this->smtp_user = $this->smtp_user_before_qstr;
              $this->smtp_password = $this->smtp_password_before_qstr;
              $this->habilita = $this->habilita_before_qstr;
              $this->meu_telefone = $this->meu_telefone_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->assinatura_limpa == "S" && (!isset($this->Ini->nm_bases_oracle) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) && (!isset($this->Ini->nm_bases_informix) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ", \"ASSINATURA\", \"\",  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "ASSINATURA", "",  "ID = $this->id"); 
                  } 
                  else 
                  { 
                      if ($this->assinatura != "none" && $this->assinatura != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ", \"ASSINATURA\", $this->assinatura,  \"ID = $this->id\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "ASSINATURA", $this->assinatura,  "ID = $this->id"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_funcionario_pack_ajax_response();
                      }
                      exit;  
                  }   
                  if ($this->retrato_limpa == "S" && (!isset($this->Ini->nm_bases_oracle) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) && (!isset($this->Ini->nm_bases_informix) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ", \"RETRATO\", \"\",  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "RETRATO", "",  "ID = $this->id"); 
                  } 
                  else 
                  { 
                      if ($this->retrato != "none" && $this->retrato != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ", \"RETRATO\", $this->retrato,  \"ID = $this->id\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "RETRATO", $this->retrato,  "ID = $this->id"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_funcionario_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->assinatura_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['assinatura_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if ($this->retrato_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['retrato_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['assinatura_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
                  $this->NM_ajax_info['fldList']['retrato_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['nome'])) { $this->nome = $NM_val_form['nome']; }
              elseif (isset($this->nome)) { $this->nm_limpa_alfa($this->nome); }
              if     (isset($NM_val_form) && isset($NM_val_form['endereco'])) { $this->endereco = $NM_val_form['endereco']; }
              elseif (isset($this->endereco)) { $this->nm_limpa_alfa($this->endereco); }
              if     (isset($NM_val_form) && isset($NM_val_form['cep'])) { $this->cep = $NM_val_form['cep']; }
              elseif (isset($this->cep)) { $this->nm_limpa_alfa($this->cep); }
              if     (isset($NM_val_form) && isset($NM_val_form['telefone'])) { $this->telefone = $NM_val_form['telefone']; }
              elseif (isset($this->telefone)) { $this->nm_limpa_alfa($this->telefone); }
              if     (isset($NM_val_form) && isset($NM_val_form['cpf'])) { $this->cpf = $NM_val_form['cpf']; }
              elseif (isset($this->cpf)) { $this->nm_limpa_alfa($this->cpf); }
              if     (isset($NM_val_form) && isset($NM_val_form['identidade'])) { $this->identidade = $NM_val_form['identidade']; }
              elseif (isset($this->identidade)) { $this->nm_limpa_alfa($this->identidade); }
              if     (isset($NM_val_form) && isset($NM_val_form['habilitaca'])) { $this->habilitaca = $NM_val_form['habilitaca']; }
              elseif (isset($this->habilitaca)) { $this->nm_limpa_alfa($this->habilitaca); }
              if     (isset($NM_val_form) && isset($NM_val_form['certreserv'])) { $this->certreserv = $NM_val_form['certreserv']; }
              elseif (isset($this->certreserv)) { $this->nm_limpa_alfa($this->certreserv); }
              if     (isset($NM_val_form) && isset($NM_val_form['titulo'])) { $this->titulo = $NM_val_form['titulo']; }
              elseif (isset($this->titulo)) { $this->nm_limpa_alfa($this->titulo); }
              if     (isset($NM_val_form) && isset($NM_val_form['email'])) { $this->email = $NM_val_form['email']; }
              elseif (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
              if     (isset($NM_val_form) && isset($NM_val_form['filiacao'])) { $this->filiacao = $NM_val_form['filiacao']; }
              elseif (isset($this->filiacao)) { $this->nm_limpa_alfa($this->filiacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['divisao'])) { $this->divisao = $NM_val_form['divisao']; }
              elseif (isset($this->divisao)) { $this->nm_limpa_alfa($this->divisao); }
              if     (isset($NM_val_form) && isset($NM_val_form['funcao'])) { $this->funcao = $NM_val_form['funcao']; }
              elseif (isset($this->funcao)) { $this->nm_limpa_alfa($this->funcao); }
              if     (isset($NM_val_form) && isset($NM_val_form['consultor'])) { $this->consultor = $NM_val_form['consultor']; }
              elseif (isset($this->consultor)) { $this->nm_limpa_alfa($this->consultor); }
              if     (isset($NM_val_form) && isset($NM_val_form['salario'])) { $this->salario = $NM_val_form['salario']; }
              elseif (isset($this->salario)) { $this->nm_limpa_alfa($this->salario); }
              if     (isset($NM_val_form) && isset($NM_val_form['obs'])) { $this->obs = $NM_val_form['obs']; }
              elseif (isset($this->obs)) { $this->nm_limpa_alfa($this->obs); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuario'])) { $this->usuario = $NM_val_form['usuario']; }
              elseif (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['nivel'])) { $this->nivel = $NM_val_form['nivel']; }
              elseif (isset($this->nivel)) { $this->nm_limpa_alfa($this->nivel); }
              if     (isset($NM_val_form) && isset($NM_val_form['senha'])) { $this->senha = $NM_val_form['senha']; }
              elseif (isset($this->senha)) { $this->nm_limpa_alfa($this->senha); }
              if     (isset($NM_val_form) && isset($NM_val_form['rodape'])) { $this->rodape = $NM_val_form['rodape']; }
              elseif (isset($this->rodape)) { $this->nm_limpa_alfa($this->rodape); }
              if     (isset($NM_val_form) && isset($NM_val_form['ativo'])) { $this->ativo = $NM_val_form['ativo']; }
              elseif (isset($this->ativo)) { $this->nm_limpa_alfa($this->ativo); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_host'])) { $this->smtp_host = $NM_val_form['smtp_host']; }
              elseif (isset($this->smtp_host)) { $this->nm_limpa_alfa($this->smtp_host); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_port'])) { $this->smtp_port = $NM_val_form['smtp_port']; }
              elseif (isset($this->smtp_port)) { $this->nm_limpa_alfa($this->smtp_port); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_user'])) { $this->smtp_user = $NM_val_form['smtp_user']; }
              elseif (isset($this->smtp_user)) { $this->nm_limpa_alfa($this->smtp_user); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_password'])) { $this->smtp_password = $NM_val_form['smtp_password']; }
              elseif (isset($this->smtp_password)) { $this->nm_limpa_alfa($this->smtp_password); }
              if     (isset($NM_val_form) && isset($NM_val_form['meu_telefone'])) { $this->meu_telefone = $NM_val_form['meu_telefone']; }
              elseif (isset($this->meu_telefone)) { $this->nm_limpa_alfa($this->meu_telefone); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id', 'nome', 'endereco', 'nascimento', 'cep', 'telefone', 'cpf', 'filiacao', 'identidade', 'habilitaca', 'certreserv', 'titulo', 'email', 'divisao', 'funcao', 'consultor', 'nivel', 'usuario', 'senha', 'salario', 'admissao', 'ativo', 'meu_telefone', 'obs', 'rodape', 'smtp_host', 'smtp_port', 'smtp_user', 'smtp_password'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "ID, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where USUARIO = '" . $this->usuario . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                  {
                      $this->sc_erro_insert = $dbErrorMessage;
                      $this->nmgp_opcao     = 'refresh_insert';
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_funcionario_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Login"); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'usuario';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_funcionario_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->assinatura_scfile_name, $dir_file, "assinatura");
              if (trim($this->assinatura_scfile_name) != $_test_file)
              {
                  $this->assinatura_scfile_name = $_test_file;
                  $this->assinatura = $_test_file;
                 $this->meu_telefone_before_qstr = $this->meu_telefone;
                 $this->meu_telefone = substr($this->Db->qstr($this->meu_telefone), 1, -1); 
              }
              $_test_file = $this->fetchUniqueUploadName($this->retrato_scfile_name, $dir_file, "retrato");
              if (trim($this->retrato_scfile_name) != $_test_file)
              {
                  $this->retrato_scfile_name = $_test_file;
                  $this->retrato = $_test_file;
                 $this->meu_telefone_before_qstr = $this->meu_telefone;
                 $this->meu_telefone = substr($this->Db->qstr($this->meu_telefone), 1, -1); 
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "NOME, ENDERECO, NASCIMENTO, CEP, TELEFONE, CPF, IDENTIDADE, HABILITACA, CERTRESERV, TITULO, EMAIL, Filiacao, DIVISAO, FUNCAO, CONSULTOR, Salario, Admissao, Obs, USUARIO, NIVEL, SENHA, ASSINATURA, RODAPE, RETRATO, ATIVO, SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASSWORD, HABILITA, MEU_TELEFONE) VALUES (" . $NM_seq_auto . "'$this->nome', '$this->endereco', " . $this->Ini->date_delim . $this->nascimento . $this->Ini->date_delim1 . ", '$this->cep', '$this->telefone', '$this->cpf', '$this->identidade', '$this->habilitaca', '$this->certreserv', '$this->titulo', '$this->email', '$this->filiacao', '$this->divisao', '$this->funcao', $this->consultor, $this->salario, " . $this->Ini->date_delim . $this->admissao . $this->Ini->date_delim1 . ", '$this->obs', '$this->usuario', '$this->nivel', '$this->senha', '', '$this->rodape', '', '$this->ativo', '$this->smtp_host', '$this->smtp_port', '$this->smtp_user', '$this->smtp_password', '$this->habilita', '$this->meu_telefone')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "NOME, ENDERECO, NASCIMENTO, CEP, TELEFONE, CPF, IDENTIDADE, HABILITACA, CERTRESERV, TITULO, EMAIL, Filiacao, DIVISAO, FUNCAO, CONSULTOR, Salario, Admissao, Obs, USUARIO, NIVEL, SENHA, ASSINATURA, RODAPE, RETRATO, ATIVO, SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASSWORD, HABILITA, MEU_TELEFONE) VALUES (" . $NM_seq_auto . "'$this->nome', '$this->endereco', " . $this->Ini->date_delim . $this->nascimento . $this->Ini->date_delim1 . ", '$this->cep', '$this->telefone', '$this->cpf', '$this->identidade', '$this->habilitaca', '$this->certreserv', '$this->titulo', '$this->email', '$this->filiacao', '$this->divisao', '$this->funcao', $this->consultor, $this->salario, " . $this->Ini->date_delim . $this->admissao . $this->Ini->date_delim1 . ", '$this->obs', '$this->usuario', '$this->nivel', '$this->senha', '', '$this->rodape', '', '$this->ativo', '$this->smtp_host', '$this->smtp_port', '$this->smtp_user', '$this->smtp_password', '$this->habilita', '$this->meu_telefone')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "NOME, ENDERECO, NASCIMENTO, CEP, TELEFONE, CPF, IDENTIDADE, HABILITACA, CERTRESERV, TITULO, EMAIL, Filiacao, DIVISAO, FUNCAO, CONSULTOR, Salario, Admissao, Obs, USUARIO, NIVEL, SENHA, ASSINATURA, RODAPE, RETRATO, ATIVO, SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASSWORD, HABILITA, MEU_TELEFONE) VALUES (" . $NM_seq_auto . "'$this->nome', '$this->endereco', " . $this->Ini->date_delim . $this->nascimento . $this->Ini->date_delim1 . ", '$this->cep', '$this->telefone', '$this->cpf', '$this->identidade', '$this->habilitaca', '$this->certreserv', '$this->titulo', '$this->email', '$this->filiacao', '$this->divisao', '$this->funcao', $this->consultor, $this->salario, " . $this->Ini->date_delim . $this->admissao . $this->Ini->date_delim1 . ", '$this->obs', '$this->usuario', '$this->nivel', '$this->senha', '$this->assinatura', '$this->rodape', '$this->retrato', '$this->ativo', '$this->smtp_host', '$this->smtp_port', '$this->smtp_user', '$this->smtp_password', '$this->habilita', '$this->meu_telefone')"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_funcionario_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  {
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  }
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->nome = $this->nome_before_qstr;
              $this->endereco = $this->endereco_before_qstr;
              $this->cep = $this->cep_before_qstr;
              $this->telefone = $this->telefone_before_qstr;
              $this->cpf = $this->cpf_before_qstr;
              $this->identidade = $this->identidade_before_qstr;
              $this->habilitaca = $this->habilitaca_before_qstr;
              $this->certreserv = $this->certreserv_before_qstr;
              $this->titulo = $this->titulo_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->filiacao = $this->filiacao_before_qstr;
              $this->divisao = $this->divisao_before_qstr;
              $this->funcao = $this->funcao_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->nivel = $this->nivel_before_qstr;
              $this->senha = $this->senha_before_qstr;
              $this->rodape = $this->rodape_before_qstr;
              $this->ativo = $this->ativo_before_qstr;
              $this->smtp_host = $this->smtp_host_before_qstr;
              $this->smtp_port = $this->smtp_port_before_qstr;
              $this->smtp_user = $this->smtp_user_before_qstr;
              $this->smtp_password = $this->smtp_password_before_qstr;
              $this->habilita = $this->habilita_before_qstr;
              $this->meu_telefone = $this->meu_telefone_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->assinatura ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  ASSINATURA , $this->assinatura,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "ASSINATURA", $this->assinatura,  "ID = $this->id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_funcionario_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->retrato ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  RETRATO , $this->retrato,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "RETRATO", $this->retrato,  "ID = $this->id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_funcionario_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->nome = $this->nome_before_qstr;
              $this->endereco = $this->endereco_before_qstr;
              $this->cep = $this->cep_before_qstr;
              $this->telefone = $this->telefone_before_qstr;
              $this->cpf = $this->cpf_before_qstr;
              $this->identidade = $this->identidade_before_qstr;
              $this->habilitaca = $this->habilitaca_before_qstr;
              $this->certreserv = $this->certreserv_before_qstr;
              $this->titulo = $this->titulo_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->filiacao = $this->filiacao_before_qstr;
              $this->divisao = $this->divisao_before_qstr;
              $this->funcao = $this->funcao_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->nivel = $this->nivel_before_qstr;
              $this->senha = $this->senha_before_qstr;
              $this->rodape = $this->rodape_before_qstr;
              $this->ativo = $this->ativo_before_qstr;
              $this->smtp_host = $this->smtp_host_before_qstr;
              $this->smtp_port = $this->smtp_port_before_qstr;
              $this->smtp_user = $this->smtp_user_before_qstr;
              $this->smtp_password = $this->smtp_password_before_qstr;
              $this->habilita = $this->habilita_before_qstr;
              $this->meu_telefone = $this->meu_telefone_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
          $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_funcionario_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      $this->restore_zeros_null();
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->nmgp_dados_form['assinatura'] = ""; 
      $this->assinatura_limpa = ""; 
      $this->assinatura_salva = ""; 
      $this->nmgp_dados_form['retrato'] = ""; 
      $this->retrato_limpa = ""; 
      $this->retrato_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "R")
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['iframe_evento']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->id) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = ('' != $sc_where_filter) ? $sc_where_filter : '';
      if ($this->nmgp_opcao == "retorna") 
      { 
          $this->nm_db_retorna($sc_where) ; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $this->nm_db_avanca($sc_where) ; 
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $this->nm_db_inicio($sc_where) ; 
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $this->nm_db_final($sc_where) ; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['parms'] = ""; 
          $nmgp_select = "SELECT ID, NOME, ENDERECO, NASCIMENTO, CEP, TELEFONE, CPF, IDENTIDADE, HABILITACA, CERTRESERV, TITULO, EMAIL, Filiacao, DIVISAO, FUNCAO, CONSULTOR, Salario, Admissao, Obs, USUARIO, NIVEL, SENHA, ASSINATURA, RODAPE, RETRATO, ATIVO, SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASSWORD, HABILITA, MEU_TELEFONE from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "ID = $this->id"; 
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "ID";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->nome = $rs->fields[1] ; 
              $this->nmgp_dados_select['nome'] = $this->nome;
              $this->endereco = $rs->fields[2] ; 
              $this->nmgp_dados_select['endereco'] = $this->endereco;
              $this->nascimento = $rs->fields[3] ; 
              $this->nmgp_dados_select['nascimento'] = $this->nascimento;
              $this->cep = $rs->fields[4] ; 
              $this->nmgp_dados_select['cep'] = $this->cep;
              $this->telefone = $rs->fields[5] ; 
              $this->nmgp_dados_select['telefone'] = $this->telefone;
              $this->cpf = $rs->fields[6] ; 
              $this->nmgp_dados_select['cpf'] = $this->cpf;
              $this->identidade = $rs->fields[7] ; 
              $this->nmgp_dados_select['identidade'] = $this->identidade;
              $this->habilitaca = $rs->fields[8] ; 
              $this->nmgp_dados_select['habilitaca'] = $this->habilitaca;
              $this->certreserv = $rs->fields[9] ; 
              $this->nmgp_dados_select['certreserv'] = $this->certreserv;
              $this->titulo = $rs->fields[10] ; 
              $this->nmgp_dados_select['titulo'] = $this->titulo;
              $this->email = $rs->fields[11] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->filiacao = $rs->fields[12] ; 
              $this->nmgp_dados_select['filiacao'] = $this->filiacao;
              $this->divisao = $rs->fields[13] ; 
              $this->nmgp_dados_select['divisao'] = $this->divisao;
              $this->funcao = $rs->fields[14] ; 
              $this->nmgp_dados_select['funcao'] = $this->funcao;
              $this->consultor = $rs->fields[15] ; 
              $this->nmgp_dados_select['consultor'] = $this->consultor;
              $this->salario = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['salario'] = $this->salario;
              $this->admissao = $rs->fields[17] ; 
              $this->nmgp_dados_select['admissao'] = $this->admissao;
              $this->obs = $rs->fields[18] ; 
              $this->nmgp_dados_select['obs'] = $this->obs;
              $this->usuario = $rs->fields[19] ; 
              $this->nmgp_dados_select['usuario'] = $this->usuario;
              $this->nivel = $rs->fields[20] ; 
              $this->nmgp_dados_select['nivel'] = $this->nivel;
              $this->senha = $rs->fields[21] ; 
              $this->nmgp_dados_select['senha'] = $this->senha;
              $this->assinatura = $rs->fields[22] ; 
              $this->nmgp_dados_select['assinatura'] = $this->assinatura;
              $this->rodape = $rs->fields[23] ; 
              $this->nmgp_dados_select['rodape'] = $this->rodape;
              $this->retrato = $rs->fields[24] ; 
              $this->nmgp_dados_select['retrato'] = $this->retrato;
              $this->ativo = $rs->fields[25] ; 
              $this->nmgp_dados_select['ativo'] = $this->ativo;
              $this->smtp_host = $rs->fields[26] ; 
              $this->nmgp_dados_select['smtp_host'] = $this->smtp_host;
              $this->smtp_port = $rs->fields[27] ; 
              $this->nmgp_dados_select['smtp_port'] = $this->smtp_port;
              $this->smtp_user = $rs->fields[28] ; 
              $this->nmgp_dados_select['smtp_user'] = $this->smtp_user;
              $this->smtp_password = $rs->fields[29] ; 
              $this->nmgp_dados_select['smtp_password'] = $this->smtp_password;
              $this->habilita = $rs->fields[30] ; 
              $this->nmgp_dados_select['habilita'] = $this->habilita;
              $this->meu_telefone = $rs->fields[31] ; 
              $this->nmgp_dados_select['meu_telefone'] = $this->meu_telefone;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->consultor = (string)$this->consultor; 
              $this->salario = (strpos(strtolower($this->salario), "e")) ? (float)$this->salario : $this->salario; 
              $this->salario = (string)$this->salario; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sub_dir'][0]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sub_dir'][1]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id = "";  
              $this->nmgp_dados_form["id"] = $this->id;
              $this->nome = "";  
              $this->nmgp_dados_form["nome"] = $this->nome;
              $this->endereco = "";  
              $this->nmgp_dados_form["endereco"] = $this->endereco;
              $this->nascimento = "";  
              $this->nascimento_hora = "" ;  
              $this->nmgp_dados_form["nascimento"] = $this->nascimento;
              $this->cep = "";  
              $this->nmgp_dados_form["cep"] = $this->cep;
              $this->telefone = "";  
              $this->nmgp_dados_form["telefone"] = $this->telefone;
              $this->cpf = "";  
              $this->nmgp_dados_form["cpf"] = $this->cpf;
              $this->identidade = "";  
              $this->nmgp_dados_form["identidade"] = $this->identidade;
              $this->habilitaca = "";  
              $this->nmgp_dados_form["habilitaca"] = $this->habilitaca;
              $this->certreserv = "";  
              $this->nmgp_dados_form["certreserv"] = $this->certreserv;
              $this->titulo = "";  
              $this->nmgp_dados_form["titulo"] = $this->titulo;
              $this->email = "";  
              $this->nmgp_dados_form["email"] = $this->email;
              $this->filiacao = "";  
              $this->nmgp_dados_form["filiacao"] = $this->filiacao;
              $this->divisao = "";  
              $this->nmgp_dados_form["divisao"] = $this->divisao;
              $this->funcao = "";  
              $this->nmgp_dados_form["funcao"] = $this->funcao;
              $this->consultor = "";  
              $this->nmgp_dados_form["consultor"] = $this->consultor;
              $this->salario = "";  
              $this->nmgp_dados_form["salario"] = $this->salario;
              $this->admissao =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["admissao"] = $this->admissao;
              $this->obs = "";  
              $this->nmgp_dados_form["obs"] = $this->obs;
              $this->usuario = "";  
              $this->nmgp_dados_form["usuario"] = $this->usuario;
              $this->nivel = "";  
              $this->nmgp_dados_form["nivel"] = $this->nivel;
              $this->senha = "";  
              $this->nmgp_dados_form["senha"] = $this->senha;
              $this->assinatura = "";  
              $this->assinatura_ul_name = "" ;  
              $this->assinatura_ul_type = "" ;  
              $this->nmgp_dados_form["assinatura"] = $this->assinatura;
              $this->rodape = "";  
              $this->nmgp_dados_form["rodape"] = $this->rodape;
              $this->retrato = "";  
              $this->retrato_ul_name = "" ;  
              $this->retrato_ul_type = "" ;  
              $this->nmgp_dados_form["retrato"] = $this->retrato;
              $this->ativo = "";  
              $this->nmgp_dados_form["ativo"] = $this->ativo;
              $this->smtp_host = "";  
              $this->nmgp_dados_form["smtp_host"] = $this->smtp_host;
              $this->smtp_port = "25";  
              $this->nmgp_dados_form["smtp_port"] = $this->smtp_port;
              $this->smtp_user = "";  
              $this->nmgp_dados_form["smtp_user"] = $this->smtp_user;
              $this->smtp_password = "";  
              $this->nmgp_dados_form["smtp_password"] = $this->smtp_password;
              $this->habilita = "";  
              $this->nmgp_dados_form["habilita"] = $this->habilita;
              $this->meu_telefone = "";  
              $this->nmgp_dados_form["meu_telefone"] = $this->meu_telefone;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter; 
     $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter; 
     $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
     $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function USUARIO_onChange()
{
$_SESSION['scriptcase']['form_funcionario']['contr_erro'] = 'on';
  



$this->nm_formatar_campos();
$this->NM_ajax_info['event_field'] = 'USUARIO';
form_funcionario_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_funcionario']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_funcionario_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE html>

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_assinatura = "";  
   } 
   else 
   { 
       $out_assinatura = $this->assinatura;  
   } 
   if ($this->assinatura != "" && $this->assinatura != "none")   
   { 
       if (is_string($this->assinatura) && substr($this->assinatura, 0, 4) == "*nm*") 
       { 
           $this->assinatura = substr($this->assinatura, 4) ; 
           $this->assinatura = base64_decode($this->assinatura) ; 
       } 
       $img_pos_bm = (is_string($this->assinatura)) ? strpos($this->assinatura, "BM") : false; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->assinatura = substr($this->assinatura, $img_pos_bm) ; 
       } 
       $Ext_File = $this->scGetImageExtension($this->assinatura);
       $out_assinatura = $this->Ini->path_imag_temp . "/sc_assinatura_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . $Ext_File;  
       $arq_assinatura = fopen($this->Ini->root . $out_assinatura, "w") ;  
       fwrite($arq_assinatura, (string)$this->assinatura) ;  
       fclose($arq_assinatura) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_assinatura, true);
       $this->nmgp_return_img['assinatura'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['assinatura'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_assinatura;
           $out_assinatura = str_replace($this->Ini->path_imag_temp . "/", "", $out_assinatura);
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_assinatura;
       if (isset($temp_out_assinatura))
       {
           $out_assinatura = $temp_out_assinatura;
       }
   }
   if ($this->nmgp_opcao == "novo")
   { 
       $out_retrato = "";  
   } 
   else 
   { 
       $out_retrato = $this->retrato;  
   } 
   if ($this->retrato != "" && $this->retrato != "none")   
   { 
       if (is_string($this->retrato) && substr($this->retrato, 0, 4) == "*nm*") 
       { 
           $this->retrato = substr($this->retrato, 4) ; 
           $this->retrato = base64_decode($this->retrato) ; 
       } 
       $img_pos_bm = (is_string($this->retrato)) ? strpos($this->retrato, "BM") : false; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->retrato = substr($this->retrato, $img_pos_bm) ; 
       } 
       $Ext_File = $this->scGetImageExtension($this->retrato);
       $out_retrato = $this->Ini->path_imag_temp . "/sc_retrato_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . $Ext_File;  
       $arq_retrato = fopen($this->Ini->root . $out_retrato, "w") ;  
       fwrite($arq_retrato, (string)$this->retrato) ;  
       fclose($arq_retrato) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_retrato, true);
       $this->nmgp_return_img['retrato'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['retrato'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_retrato;
           $out_retrato = str_replace($this->Ini->path_imag_temp . "/", "", $out_retrato);
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_retrato;
       if (isset($temp_out_retrato))
       {
           $out_retrato = $temp_out_retrato;
       }
   }
        $this->initFormPages();
    include_once("form_funcionario_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("id", "nome", "endereco", "cep", "telefone", "cpf", "identidade", "habilitaca", "certreserv", "titulo", "email", "filiacao", "divisao", "funcao", "consultor", "salario", "obs", "usuario", "nivel", "senha", "rodape", "ativo", "smtp_host", "smtp_port", "smtp_user", "smtp_password", "habilita", "meu_telefone"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat, $value)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       if ('now' == $value) {
           return str_replace(array('hh', 'mm', 'ii', 'ss'), array(date('H'), date('i'), date('i'), date('s')), $sTime);
       } elseif ('end' == $value) {
           return str_replace(array('hh', 'mm', 'ii', 'ss'), array('23', '59', '59', '59'), $sTime);
       } else {
           return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
       }
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_divisao()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Técnica?#?TECNICA?#?N?@?";
       $nmgp_def_dados .= "Comercial?#?COMERCIAL?#?S?@?";
       $nmgp_def_dados .= "Administração?#?ADM?#?N?@?";
       $nmgp_def_dados .= "Apoio?#?APOIO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_consultor()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Sim?#?1?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_nivel()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Usuário?#?0?#?S?@?";
       $nmgp_def_dados .= "Gerencia?#?1?#?N?@?";
       $nmgp_def_dados .= "Administrador?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_usuario()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_nascimento = $this->nascimento;
   $old_value_cep = $this->cep;
   $old_value_cpf = $this->cpf;
   $old_value_salario = $this->salario;
   $old_value_admissao = $this->admissao;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_id = $this->id;
   $unformatted_value_nascimento = $this->nascimento;
   $unformatted_value_cep = $this->cep;
   $unformatted_value_cpf = $this->cpf;
   $unformatted_value_salario = $this->salario;
   $unformatted_value_admissao = $this->admissao;

   $consultor_val_str = "";
   if (!empty($this->consultor))
   {
       if (is_array($this->consultor))
       {
           $Tmp_array = $this->consultor;
       }
       else
       {
           $Tmp_array = explode(";", $this->consultor);
       }
       $consultor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $consultor_val_str)
          {
             $consultor_val_str .= ", ";
          }
          $consultor_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT login, name  FROM sec_users  ORDER BY name";

   $this->id = $old_value_id;
   $this->nascimento = $old_value_nascimento;
   $this->cep = $old_value_cep;
   $this->cpf = $old_value_cpf;
   $this->salario = $old_value_salario;
   $this->admissao = $old_value_admissao;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['Lookup_usuario'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_ativo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Sim?#?SIM?#?S?@?";
       $nmgp_def_dados .= "Não?#?NAO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = true;
      if (empty($data_search)) 
      {
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dyn_search_and_or']);
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dyn_search_cache']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_funcionario_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ID", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOME", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ENDERECO", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CEP", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TELEFONE", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CPF", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "IDENTIDADE", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "HABILITACA", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CERTRESERV", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TITULO", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "EMAIL", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "Filiacao", $arg_search, $data_search, "TEXT", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_divisao($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "DIVISAO", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FUNCAO", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_consultor($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "CONSULTOR", $arg_search, $data_lookup, "TINYINT", false);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "Salario", $arg_search, str_replace(",", ".", $data_search), "DOUBLE", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "Obs", $arg_search, $data_search, "TEXT", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_usuario($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "USUARIO", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_nivel($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "NIVEL", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SENHA", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RODAPE", $arg_search, $data_search, "TEXT", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_ativo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "ATIVO", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SMTP_HOST", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SMTP_PORT", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SMTP_USER", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SMTP_PASSWORD", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "HABILITA", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "MEU_TELEFONE", $arg_search, $data_search, "VARCHAR", false);
          }
      }
      if ($this->NM_case_insensitive)
      {
          $comando = str_replace("#lowerI#", "Upper(", $comando);
          $comando = str_replace("#lowerF#", ")", $comando);
      }
      else
      {
          $comando = str_replace("#lowerI#", "", $comando);
          $comando = str_replace("#lowerF#", "", $comando);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_funcionario = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total'] = $qt_geral_reg_form_funcionario;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_funcionario_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_funcionario_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="", $tp_unaccent=false)
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = " #lowerI#";
      $nm_fim_lower = "#lowerF#";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      $nm_numeric[] = "id";$nm_numeric[] = "consultor";$nm_numeric[] = "salario";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
         $nm_ini_lower = "";
         $nm_fim_lower = "";
      }
      if (is_array($campo)) {
          foreach ($campo as $Ind => $Cmp) {
             if ($Cmp != null) {
                 $campo[$Ind] = substr($this->Ini->Db->qstr($Cmp), 1, -1);
             }
          }
      }
      else {
          $campo = substr($this->Ini->Db->qstr($campo), 1, -1);
      }
      $Nm_datas["nascimento"] = "date";$Nm_datas["admissao"] = "date";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
         if (isset($Nm_datas[$campo_join]))
          {
            $nm_ini_lower = "";
             $nm_fim_lower = "";
          }
          if (isset($Nm_datas[$campo_join]))
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             $op_like = " like ";
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . " not" . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_divisao($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['TECNICA'] = "Técnica";
       $data_look['COMERCIAL'] = "Comercial";
       $data_look['ADM'] = "Administração";
       $data_look['APOIO'] = "Apoio";
       $result = array();
       if ($this->NM_case_insensitive)
       {
           $campo  = sc_strtoupper($campo);
       }
       foreach ($data_look as $chave => $label) 
       {
           if ($this->NM_case_insensitive)
           {
               $label  = sc_strtoupper($label);
           }
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_consultor($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Sim";
       $result = array();
       if ($this->NM_case_insensitive)
       {
           $campo  = sc_strtoupper($campo);
       }
       foreach ($data_look as $chave => $label) 
       {
           if ($this->NM_case_insensitive)
           {
               $label  = sc_strtoupper($label);
           }
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_usuario($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, login FROM sec_users WHERE (#lowerI##cmp_iname#cmp_f)#cmp_apos LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", "LIKE #lowerI#'#arg_i" . $campo . "#arg_f%')", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", "NOT LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", "<> #lowerI#'#arg_i" . $campo . "#arg_f')", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", "> #lowerI#'#arg_i" . $campo . "#arg_f')", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", ">= #lowerI#'#arg_i" . $campo . "#arg_f')", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", "< #lowerI#'#arg_i" . $campo . "#arg_f')", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE #lowerI#'%#arg_i" . $campo . "#arg_f%')", "<= #lowerI#'#arg_i" . $campo . "#arg_f')", $nm_comando);
       }
          $nm_comando = str_replace("#lowerI#", "Upper(", $nm_comando);
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           if ($this->NM_case_insensitive)
           {
               $campo  = sc_strtoupper($campo);
           }
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($this->NM_case_insensitive)
               {
                   $label  = sc_strtoupper($label);
               }
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_nivel($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['0'] = "Usuário";
       $data_look['1'] = "Gerencia";
       $data_look['2'] = "Administrador";
       $result = array();
       if ($this->NM_case_insensitive)
       {
           $campo  = sc_strtoupper($campo);
       }
       foreach ($data_look as $chave => $label) 
       {
           if ($this->NM_case_insensitive)
           {
               $label  = sc_strtoupper($label);
           }
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_ativo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['SIM'] = "Sim";
       $data_look['NAO'] = "Não";
       $result = array();
       if ($this->NM_case_insensitive)
       {
           $campo  = sc_strtoupper($campo);
       }
       foreach ($data_look as $chave => $label) 
       {
           if ($this->NM_case_insensitive)
           {
               $label  = sc_strtoupper($label);
           }
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_funcionario_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_funcionario_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_funcionario_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE html>

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "first":
                return array("sc_b_ini_t.sc-unique-btn-1");
                break;
            case "back":
                return array("sc_b_ret_t.sc-unique-btn-2");
                break;
            case "forward":
                return array("sc_b_avc_t.sc-unique-btn-3");
                break;
            case "last":
                return array("sc_b_fim_t.sc-unique-btn-4");
                break;
            case "new":
                return array("sc_b_new_t.sc-unique-btn-5");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-6");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-7");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-8");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-9");
                break;
            case "0":
                return array("sys_separator.sc-unique-btn-10");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-11", "sc_b_sai_t.sc-unique-btn-12", "sc_b_sai_t.sc-unique-btn-14", "sc_b_sai_t.sc-unique-btn-13", "sc_b_sai_t.sc-unique-btn-15");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
    }

    function displayAppFooter()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-footer">
<style>
#rod_col1 { margin:0px; padding: 3px 0 0 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0 0; float:right; overflow:hidden; text-align:right;}

</style>

<table style="width: 100%; height:20px;" cellpadding="0px" cellspacing="0px" class="scFormFooter">
    <tr>
        <td>
            <span class="scFormFooterFont" id="rod_col1"></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"></span>
        </td>
    </tr>
</table>
    </td></tr>
<?php
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['run_iframe'] != "R") {
        } else {
            return false;
        }
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function getSummaryLine()
    {
        $summaryLine = "[" . $this->Ini->Nm_lang['lang_othr_smry_info_simp'] . "]";
        $summaryLine = str_replace(
            [
                '?final?',
                '?total?',
            ],
            [
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['reg_start'] + 1,
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['total'] + 1,
            ],
            $summaryLine
        );

        return $summaryLine;
    } // getSummaryLine

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_funcionario']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ($this->scIsFieldNumeric($fieldName)) {
            $defaultOffIcon = 'asc' == $this->scGetDefaultFieldOrder($fieldName) ? "fas fa-sort-alpha-down" : "fas fa-sort-alpha-down-alt";
            if ('desc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down-alt sc-form-order-icon\"></span>";
            } elseif ('asc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down sc-form-order-icon\"></span>";
            } else {
                return "<span class=\"" . $defaultOffIcon . " sc-form-order-icon sc-form-order-icon-unused\"></span>";
            }
        } else {
            $defaultOffIcon = 'asc' == $this->scGetDefaultFieldOrder($fieldName) ? "fas fa-sort-alpha-down" : "fas fa-sort-alpha-down-alt";
            if ('desc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down-alt sc-form-order-icon\"></span>";
            } elseif ('asc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down sc-form-order-icon\"></span>";
            } else {
                return "<span class=\"" . $defaultOffIcon . " sc-form-order-icon sc-form-order-icon-unused\"></span>";
            }
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "ID":
                return true;
            case "Salario":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            default:
                return 'asc';
        }
        return 'asc';
    }

    function scGetImageExtension(string $binary) {
        if (function_exists('finfo_buffer')) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->buffer($binary);
            $map = [
               'image/jpeg' => '.jpg',
               'image/png'  => '.png',
               'image/gif'  => '.gif',
               'image/webp' => '.webp',
               'image/bmp'  => '.bmp',
               'image/svg+xml' => '.svg',
               'image/x-icon' => '.ico',
            ];
            if (isset($map[$mime])) {
                return $map[$mime];
            }
        }
        $header = bin2hex(substr($binary, 0, 12));
        if (strpos($header, 'ffd8ff') === 0) return '.jpg';
        if (strpos($header, '89504e47') === 0) return '.png';
        if (strpos($header, '47494638') === 0) return '.gif';
        if (substr($binary, 0, 4) === "RIFF" && substr($binary, 8, 4) === "WEBP") return '.webp';
        if (strpos($header, '424d') === 0) return '.bmp';
        if (strpos($header, '00000100') === 0) return '.ico';
        return '.gif';
    }
}
?>
