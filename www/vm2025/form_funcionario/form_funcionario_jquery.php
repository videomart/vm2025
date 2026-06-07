
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField, sField)) {
        setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField, sField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField, sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField, sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField, sField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nome" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["endereco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nascimento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cpf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["filiacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["identidade" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["habilitaca" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["certreserv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["titulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["divisao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["funcao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consultor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nivel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["senha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["salario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["admissao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ativo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["meu_telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["assinatura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rodape" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["retrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_host" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_port" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_user" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow] && scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow] && scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nome" + iSeqRow] && scEventControl_data["nome" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nome" + iSeqRow] && scEventControl_data["nome" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nascimento" + iSeqRow] && scEventControl_data["nascimento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nascimento" + iSeqRow] && scEventControl_data["nascimento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow] && scEventControl_data["cpf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow] && scEventControl_data["cpf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["filiacao" + iSeqRow] && scEventControl_data["filiacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["filiacao" + iSeqRow] && scEventControl_data["filiacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["identidade" + iSeqRow] && scEventControl_data["identidade" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["identidade" + iSeqRow] && scEventControl_data["identidade" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["habilitaca" + iSeqRow] && scEventControl_data["habilitaca" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["habilitaca" + iSeqRow] && scEventControl_data["habilitaca" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["certreserv" + iSeqRow] && scEventControl_data["certreserv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["certreserv" + iSeqRow] && scEventControl_data["certreserv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["titulo" + iSeqRow] && scEventControl_data["titulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["titulo" + iSeqRow] && scEventControl_data["titulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["divisao" + iSeqRow] && scEventControl_data["divisao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["divisao" + iSeqRow] && scEventControl_data["divisao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["funcao" + iSeqRow] && scEventControl_data["funcao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["funcao" + iSeqRow] && scEventControl_data["funcao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consultor" + iSeqRow] && scEventControl_data["consultor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consultor" + iSeqRow] && scEventControl_data["consultor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nivel" + iSeqRow] && scEventControl_data["nivel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nivel" + iSeqRow] && scEventControl_data["nivel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow] && scEventControl_data["usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow] && scEventControl_data["usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["senha" + iSeqRow] && scEventControl_data["senha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["senha" + iSeqRow] && scEventControl_data["senha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["salario" + iSeqRow] && scEventControl_data["salario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["salario" + iSeqRow] && scEventControl_data["salario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["admissao" + iSeqRow] && scEventControl_data["admissao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["admissao" + iSeqRow] && scEventControl_data["admissao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ativo" + iSeqRow] && scEventControl_data["ativo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ativo" + iSeqRow] && scEventControl_data["ativo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["meu_telefone" + iSeqRow] && scEventControl_data["meu_telefone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["meu_telefone" + iSeqRow] && scEventControl_data["meu_telefone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rodape" + iSeqRow] && scEventControl_data["rodape" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rodape" + iSeqRow] && scEventControl_data["rodape" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_host" + iSeqRow] && scEventControl_data["smtp_host" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_host" + iSeqRow] && scEventControl_data["smtp_host" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_port" + iSeqRow] && scEventControl_data["smtp_port" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_port" + iSeqRow] && scEventControl_data["smtp_port" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_user" + iSeqRow] && scEventControl_data["smtp_user" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_user" + iSeqRow] && scEventControl_data["smtp_user" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_password" + iSeqRow] && scEventControl_data["smtp_password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_password" + iSeqRow] && scEventControl_data["smtp_password" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("divisao" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("usuario" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("usuario" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_funcionario_id_onblur('#id_sc_field_id' + iSeqRow, iSeqRow, event) })
                                .bind('change', function() { sc_form_funcionario_id_onchange(this, iSeqRow, event) })
                                .bind('focus', function() { sc_form_funcionario_id_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_nome' + iSeqRow).bind('blur', function() { sc_form_funcionario_nome_onblur('#id_sc_field_nome' + iSeqRow, iSeqRow, event) })
                                  .bind('change', function() { sc_form_funcionario_nome_onchange(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_funcionario_nome_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_endereco' + iSeqRow).bind('blur', function() { sc_form_funcionario_endereco_onblur('#id_sc_field_endereco' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_funcionario_endereco_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_funcionario_endereco_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_nascimento' + iSeqRow).bind('blur', function() { sc_form_funcionario_nascimento_onblur('#id_sc_field_nascimento' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_funcionario_nascimento_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_funcionario_nascimento_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cep' + iSeqRow).bind('blur', function() { sc_form_funcionario_cep_onblur('#id_sc_field_cep' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_funcionario_cep_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_funcionario_cep_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { sc_form_funcionario_telefone_onblur('#id_sc_field_telefone' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_funcionario_telefone_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_funcionario_telefone_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cpf' + iSeqRow).bind('blur', function() { sc_form_funcionario_cpf_onblur('#id_sc_field_cpf' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_funcionario_cpf_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_funcionario_cpf_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_identidade' + iSeqRow).bind('blur', function() { sc_form_funcionario_identidade_onblur('#id_sc_field_identidade' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_funcionario_identidade_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_funcionario_identidade_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_habilitaca' + iSeqRow).bind('blur', function() { sc_form_funcionario_habilitaca_onblur('#id_sc_field_habilitaca' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_funcionario_habilitaca_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_funcionario_habilitaca_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_certreserv' + iSeqRow).bind('blur', function() { sc_form_funcionario_certreserv_onblur('#id_sc_field_certreserv' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_funcionario_certreserv_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_funcionario_certreserv_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_titulo' + iSeqRow).bind('blur', function() { sc_form_funcionario_titulo_onblur('#id_sc_field_titulo' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_funcionario_titulo_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_funcionario_titulo_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_funcionario_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_funcionario_email_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_funcionario_email_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_filiacao' + iSeqRow).bind('blur', function() { sc_form_funcionario_filiacao_onblur('#id_sc_field_filiacao' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_funcionario_filiacao_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_funcionario_filiacao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_divisao' + iSeqRow).bind('blur', function() { sc_form_funcionario_divisao_onblur('#id_sc_field_divisao' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_funcionario_divisao_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_funcionario_divisao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_funcao' + iSeqRow).bind('blur', function() { sc_form_funcionario_funcao_onblur('#id_sc_field_funcao' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_funcionario_funcao_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_funcionario_funcao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_consultor' + iSeqRow).bind('blur', function() { sc_form_funcionario_consultor_onblur('#id_sc_field_consultor' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_funcionario_consultor_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_funcionario_consultor_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_salario' + iSeqRow).bind('blur', function() { sc_form_funcionario_salario_onblur('#id_sc_field_salario' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_funcionario_salario_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_funcionario_salario_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_admissao' + iSeqRow).bind('blur', function() { sc_form_funcionario_admissao_onblur('#id_sc_field_admissao' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_funcionario_admissao_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_funcionario_admissao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_funcionario_obs_onblur('#id_sc_field_obs' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_funcionario_obs_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_funcionario_obs_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_usuario' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_onblur('#id_sc_field_usuario' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_funcionario_usuario_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_funcionario_usuario_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_nivel' + iSeqRow).bind('blur', function() { sc_form_funcionario_nivel_onblur('#id_sc_field_nivel' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_funcionario_nivel_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_funcionario_nivel_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_senha' + iSeqRow).bind('blur', function() { sc_form_funcionario_senha_onblur('#id_sc_field_senha' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_funcionario_senha_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_funcionario_senha_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_assinatura' + iSeqRow).bind('blur', function() { sc_form_funcionario_assinatura_onblur('#id_sc_field_assinatura' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_funcionario_assinatura_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_funcionario_assinatura_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_rodape' + iSeqRow).bind('blur', function() { sc_form_funcionario_rodape_onblur('#id_sc_field_rodape' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_funcionario_rodape_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_funcionario_rodape_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_retrato' + iSeqRow).bind('blur', function() { sc_form_funcionario_retrato_onblur('#id_sc_field_retrato' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_funcionario_retrato_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_funcionario_retrato_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_ativo' + iSeqRow).bind('blur', function() { sc_form_funcionario_ativo_onblur('#id_sc_field_ativo' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_funcionario_ativo_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_funcionario_ativo_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_smtp_host' + iSeqRow).bind('blur', function() { sc_form_funcionario_smtp_host_onblur('#id_sc_field_smtp_host' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_funcionario_smtp_host_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_funcionario_smtp_host_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_smtp_port' + iSeqRow).bind('blur', function() { sc_form_funcionario_smtp_port_onblur('#id_sc_field_smtp_port' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_funcionario_smtp_port_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_funcionario_smtp_port_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_smtp_user' + iSeqRow).bind('blur', function() { sc_form_funcionario_smtp_user_onblur('#id_sc_field_smtp_user' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_funcionario_smtp_user_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_funcionario_smtp_user_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_smtp_password' + iSeqRow).bind('blur', function() { sc_form_funcionario_smtp_password_onblur('#id_sc_field_smtp_password' + iSeqRow, iSeqRow, event) })
                                           .bind('change', function() { sc_form_funcionario_smtp_password_onchange(this, iSeqRow, event) })
                                           .bind('focus', function() { sc_form_funcionario_smtp_password_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_habilita' + iSeqRow).bind('change', function() { sc_form_funcionario_habilita_onchange(this, iSeqRow, event) });
  $('#id_sc_field_meu_telefone' + iSeqRow).bind('blur', function() { sc_form_funcionario_meu_telefone_onblur('#id_sc_field_meu_telefone' + iSeqRow, iSeqRow, event) })
                                          .bind('change', function() { sc_form_funcionario_meu_telefone_onchange(this, iSeqRow, event) })
                                          .bind('focus', function() { sc_form_funcionario_meu_telefone_onfocus(this, iSeqRow, event) });
  $('.sc-ui-checkbox-consultor' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-nivel' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-ativo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_funcionario_id_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_id();
  scCssBlur(oThis);
}

function sc_form_funcionario_id_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_id_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_nome_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_nome();
  scCssBlur(oThis);
}

function sc_form_funcionario_nome_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_nome_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_endereco_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_endereco();
  scCssBlur(oThis);
}

function sc_form_funcionario_endereco_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_endereco_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_nascimento_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_nascimento();
  scCssBlur(oThis);
}

function sc_form_funcionario_nascimento_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_nascimento_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_cep_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_cep();
  scCssBlur(oThis);
}

function sc_form_funcionario_cep_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_cep_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_telefone_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_funcionario_telefone_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_telefone_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_cpf_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_cpf();
  scCssBlur(oThis);
}

function sc_form_funcionario_cpf_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_cpf_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_identidade_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_identidade();
  scCssBlur(oThis);
}

function sc_form_funcionario_identidade_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_identidade_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_habilitaca_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_habilitaca();
  scCssBlur(oThis);
}

function sc_form_funcionario_habilitaca_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_habilitaca_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_certreserv_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_certreserv();
  scCssBlur(oThis);
}

function sc_form_funcionario_certreserv_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_certreserv_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_titulo_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_titulo();
  scCssBlur(oThis);
}

function sc_form_funcionario_titulo_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_titulo_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_email_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_email();
  scCssBlur(oThis);
}

function sc_form_funcionario_email_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_email_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_filiacao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_filiacao();
  scCssBlur(oThis);
}

function sc_form_funcionario_filiacao_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_filiacao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_divisao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_divisao();
  scCssBlur(oThis);
}

function sc_form_funcionario_divisao_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_divisao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_funcao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_funcao();
  scCssBlur(oThis);
}

function sc_form_funcionario_funcao_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_funcao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_consultor_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_consultor();
  scCssBlur(oThis);
}

function sc_form_funcionario_consultor_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_consultor_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_salario_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_salario();
  scCssBlur(oThis);
}

function sc_form_funcionario_salario_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_salario_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_admissao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_admissao();
  scCssBlur(oThis);
}

function sc_form_funcionario_admissao_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_admissao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_obs_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_obs();
  scCssBlur(oThis);
}

function sc_form_funcionario_obs_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_obs_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_usuario_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_usuario();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_funcionario_event_usuario_onchange();
}

function sc_form_funcionario_usuario_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_nivel_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_nivel();
  scCssBlur(oThis);
}

function sc_form_funcionario_nivel_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_nivel_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_senha_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_senha();
  scCssBlur(oThis);
}

function sc_form_funcionario_senha_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_senha_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_assinatura_onblur(oThis, iSeqRow, event) {
  scCssBlur(oThis);
}

function sc_form_funcionario_assinatura_onchange(oThis, iSeqRow, event) {
  File_Event = event.target;
  File_Arr   = File_Event.files;
  if (File_Arr.length > 0) {
      File_Name = File_Arr[0].name;
      if (File_Name.indexOf('*') != -1) {
          scJs_alert (File_Name + ' <?php echo $this->Ini->Nm_lang['lang_errm_ivch'] ?>', function() {}, {type: "error"});
          document.getElementById('id_sc_field_assinatura' + iSeqRow).value = '';
          Upload_Cancel = true;
          return;
      }
  }
  scMarkFormAsChanged();
}

function sc_form_funcionario_assinatura_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_funcionario_rodape_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_rodape();
  scCssBlur(oThis);
}

function sc_form_funcionario_rodape_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_rodape_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_retrato_onblur(oThis, iSeqRow, event) {
  scCssBlur(oThis);
}

function sc_form_funcionario_retrato_onchange(oThis, iSeqRow, event) {
  File_Event = event.target;
  File_Arr   = File_Event.files;
  if (File_Arr.length > 0) {
      File_Name = File_Arr[0].name;
      if (File_Name.indexOf('*') != -1) {
          scJs_alert (File_Name + ' <?php echo $this->Ini->Nm_lang['lang_errm_ivch'] ?>', function() {}, {type: "error"});
          document.getElementById('id_sc_field_retrato' + iSeqRow).value = '';
          Upload_Cancel = true;
          return;
      }
  }
  scMarkFormAsChanged();
}

function sc_form_funcionario_retrato_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_funcionario_ativo_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_ativo();
  scCssBlur(oThis);
}

function sc_form_funcionario_ativo_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_ativo_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_smtp_host_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_smtp_host();
  scCssBlur(oThis);
}

function sc_form_funcionario_smtp_host_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_smtp_host_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_smtp_port_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_smtp_port();
  scCssBlur(oThis);
}

function sc_form_funcionario_smtp_port_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_smtp_port_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_smtp_user_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_smtp_user();
  scCssBlur(oThis);
}

function sc_form_funcionario_smtp_user_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_smtp_user_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_smtp_password_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_smtp_password();
  scCssBlur(oThis);
}

function sc_form_funcionario_smtp_password_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_smtp_password_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_habilita_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_meu_telefone_onblur(oThis, iSeqRow, event) {
  do_ajax_form_funcionario_validate_meu_telefone();
  scCssBlur(oThis);
}

function sc_form_funcionario_meu_telefone_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_funcionario_meu_telefone_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
        if ("1" == block) {
                displayChange_block_1(status);
        }
        if ("2" == block) {
                displayChange_block_2(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("id", "", status);
        displayChange_field("nome", "", status);
        displayChange_field("endereco", "", status);
        displayChange_field("nascimento", "", status);
        displayChange_field("cep", "", status);
        displayChange_field("telefone", "", status);
        displayChange_field("cpf", "", status);
        displayChange_field("filiacao", "", status);
        displayChange_field("identidade", "", status);
        displayChange_field("habilitaca", "", status);
        displayChange_field("certreserv", "", status);
        displayChange_field("titulo", "", status);
        displayChange_field("email", "", status);
        displayChange_field("divisao", "", status);
        displayChange_field("funcao", "", status);
        displayChange_field("consultor", "", status);
        displayChange_field("nivel", "", status);
        displayChange_field("usuario", "", status);
        displayChange_field("senha", "", status);
        displayChange_field("salario", "", status);
        displayChange_field("admissao", "", status);
        displayChange_field("ativo", "", status);
        displayChange_field("meu_telefone", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("obs", "", status);
        displayChange_field("assinatura", "", status);
        displayChange_field("rodape", "", status);
        displayChange_field("retrato", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("smtp_host", "", status);
        displayChange_field("smtp_port", "", status);
        displayChange_field("smtp_user", "", status);
        displayChange_field("smtp_password", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_id(row, status);
        displayChange_field_nome(row, status);
        displayChange_field_endereco(row, status);
        displayChange_field_nascimento(row, status);
        displayChange_field_cep(row, status);
        displayChange_field_telefone(row, status);
        displayChange_field_cpf(row, status);
        displayChange_field_filiacao(row, status);
        displayChange_field_identidade(row, status);
        displayChange_field_habilitaca(row, status);
        displayChange_field_certreserv(row, status);
        displayChange_field_titulo(row, status);
        displayChange_field_email(row, status);
        displayChange_field_divisao(row, status);
        displayChange_field_funcao(row, status);
        displayChange_field_consultor(row, status);
        displayChange_field_nivel(row, status);
        displayChange_field_usuario(row, status);
        displayChange_field_senha(row, status);
        displayChange_field_salario(row, status);
        displayChange_field_admissao(row, status);
        displayChange_field_ativo(row, status);
        displayChange_field_meu_telefone(row, status);
        displayChange_field_obs(row, status);
        displayChange_field_assinatura(row, status);
        displayChange_field_rodape(row, status);
        displayChange_field_retrato(row, status);
        displayChange_field_smtp_host(row, status);
        displayChange_field_smtp_port(row, status);
        displayChange_field_smtp_user(row, status);
        displayChange_field_smtp_password(row, status);
}

function displayChange_field(field, row, status) {
        if ("id" == field) {
                displayChange_field_id(row, status);
        }
        if ("nome" == field) {
                displayChange_field_nome(row, status);
        }
        if ("endereco" == field) {
                displayChange_field_endereco(row, status);
        }
        if ("nascimento" == field) {
                displayChange_field_nascimento(row, status);
        }
        if ("cep" == field) {
                displayChange_field_cep(row, status);
        }
        if ("telefone" == field) {
                displayChange_field_telefone(row, status);
        }
        if ("cpf" == field) {
                displayChange_field_cpf(row, status);
        }
        if ("filiacao" == field) {
                displayChange_field_filiacao(row, status);
        }
        if ("identidade" == field) {
                displayChange_field_identidade(row, status);
        }
        if ("habilitaca" == field) {
                displayChange_field_habilitaca(row, status);
        }
        if ("certreserv" == field) {
                displayChange_field_certreserv(row, status);
        }
        if ("titulo" == field) {
                displayChange_field_titulo(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("divisao" == field) {
                displayChange_field_divisao(row, status);
        }
        if ("funcao" == field) {
                displayChange_field_funcao(row, status);
        }
        if ("consultor" == field) {
                displayChange_field_consultor(row, status);
        }
        if ("nivel" == field) {
                displayChange_field_nivel(row, status);
        }
        if ("usuario" == field) {
                displayChange_field_usuario(row, status);
        }
        if ("senha" == field) {
                displayChange_field_senha(row, status);
        }
        if ("salario" == field) {
                displayChange_field_salario(row, status);
        }
        if ("admissao" == field) {
                displayChange_field_admissao(row, status);
        }
        if ("ativo" == field) {
                displayChange_field_ativo(row, status);
        }
        if ("meu_telefone" == field) {
                displayChange_field_meu_telefone(row, status);
        }
        if ("obs" == field) {
                displayChange_field_obs(row, status);
        }
        if ("assinatura" == field) {
                displayChange_field_assinatura(row, status);
        }
        if ("rodape" == field) {
                displayChange_field_rodape(row, status);
        }
        if ("retrato" == field) {
                displayChange_field_retrato(row, status);
        }
        if ("smtp_host" == field) {
                displayChange_field_smtp_host(row, status);
        }
        if ("smtp_port" == field) {
                displayChange_field_smtp_port(row, status);
        }
        if ("smtp_user" == field) {
                displayChange_field_smtp_user(row, status);
        }
        if ("smtp_password" == field) {
                displayChange_field_smtp_password(row, status);
        }
}

function displayChange_field_id(row, status) {
    var fieldId;
}

function displayChange_field_nome(row, status) {
    var fieldId;
}

function displayChange_field_endereco(row, status) {
    var fieldId;
}

function displayChange_field_nascimento(row, status) {
    var fieldId;
}

function displayChange_field_cep(row, status) {
    var fieldId;
}

function displayChange_field_telefone(row, status) {
    var fieldId;
}

function displayChange_field_cpf(row, status) {
    var fieldId;
}

function displayChange_field_filiacao(row, status) {
    var fieldId;
}

function displayChange_field_identidade(row, status) {
    var fieldId;
}

function displayChange_field_habilitaca(row, status) {
    var fieldId;
}

function displayChange_field_certreserv(row, status) {
    var fieldId;
}

function displayChange_field_titulo(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_divisao(row, status) {
    var fieldId;
}

function displayChange_field_funcao(row, status) {
    var fieldId;
}

function displayChange_field_consultor(row, status) {
    var fieldId;
}

function displayChange_field_nivel(row, status) {
    var fieldId;
}

function displayChange_field_usuario(row, status) {
    var fieldId;
}

function displayChange_field_senha(row, status) {
    var fieldId;
}

function displayChange_field_salario(row, status) {
    var fieldId;
}

function displayChange_field_admissao(row, status) {
    var fieldId;
}

function displayChange_field_ativo(row, status) {
    var fieldId;
}

function displayChange_field_meu_telefone(row, status) {
    var fieldId;
}

function displayChange_field_obs(row, status) {
    var fieldId;
}

function displayChange_field_assinatura(row, status) {
    var fieldId;
}

function displayChange_field_rodape(row, status) {
    var fieldId;
}

function displayChange_field_retrato(row, status) {
    var fieldId;
}

function displayChange_field_smtp_host(row, status) {
    var fieldId;
}

function displayChange_field_smtp_port(row, status) {
    var fieldId;
}

function displayChange_field_smtp_user(row, status) {
    var fieldId;
}

function displayChange_field_smtp_password(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_funcionario_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_nascimento" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_nascimento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_nascimento" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_funcionario_validate_nascimento(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['nascimento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_admissao" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_admissao" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_admissao" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_funcionario_validate_admissao(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['admissao']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_assinatura" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_funcionario_ul_save.php",
    dropZone: $("#hidden_field_data_assinatura" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'assinatura'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_assinatura" + iSeqRow);
        loaderContent = $("#id_img_loader_assinatura" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_assinatura" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_assinatura" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_assinatura" + iSeqRow).hide();
      }
      if (Upload_Cancel) {
          Upload_Cancel = false;
          return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      if (fileData[0].name.indexOf('*') != -1) {
          scJs_alert (fileData[0].name + ' <?php echo $this->Ini->Nm_lang['lang_errm_ivch'] ?>', function() {}, {type: "error"});
          return;
      }
      $("#id_sc_field_assinatura" + iSeqRow).val("");
      $("#id_sc_field_assinatura_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_assinatura_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_assinatura = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_assinatura) ? "none" : "";
      $("#id_ajax_img_assinatura" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_assinatura" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_assinatura) {
        document.F1.temp_out_assinatura.value = var_ajax_img_thumb;
        document.F1.temp_out1_assinatura.value = var_ajax_img_assinatura;
      }
      else if (document.F1.temp_out_assinatura) {
        document.F1.temp_out_assinatura.value = var_ajax_img_assinatura;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_assinatura" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_assinatura" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_assinatura" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_assinatura" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      scMarkFormAsChanged();
    }
  });

  $("#id_sc_field_retrato" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_funcionario_ul_save.php",
    dropZone: $("#hidden_field_data_retrato" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'retrato'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_retrato" + iSeqRow);
        loaderContent = $("#id_img_loader_retrato" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_retrato" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_retrato" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_retrato" + iSeqRow).hide();
      }
      if (Upload_Cancel) {
          Upload_Cancel = false;
          return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      if (fileData[0].name.indexOf('*') != -1) {
          scJs_alert (fileData[0].name + ' <?php echo $this->Ini->Nm_lang['lang_errm_ivch'] ?>', function() {}, {type: "error"});
          return;
      }
      $("#id_sc_field_retrato" + iSeqRow).val("");
      $("#id_sc_field_retrato_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_retrato_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_retrato = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_retrato) ? "none" : "";
      $("#id_ajax_img_retrato" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_retrato" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_retrato) {
        document.F1.temp_out_retrato.value = var_ajax_img_thumb;
        document.F1.temp_out1_retrato.value = var_ajax_img_retrato;
      }
      else if (document.F1.temp_out_retrato) {
        document.F1.temp_out_retrato.value = var_ajax_img_retrato;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_retrato" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_retrato" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_retrato" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_retrato" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      scMarkFormAsChanged();
    }
  });

} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_funcionario')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

