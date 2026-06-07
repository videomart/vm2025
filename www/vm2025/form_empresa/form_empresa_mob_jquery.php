
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'tipo':
      case 'cnpj_cpf':
      case 'categoria':
      case 'rede':
      case 'empresa':
      case 'contato':
      case 'cep':
      case 'endereco':
      case 'id_cidade':
      case 'telefone':
      case 'email':
      case 'celular':
      case 'cidade':
      case 'uf':
      case 'bairro':
      case 'logradouro':
      case 'dat_ult_mov':
        sc_exib_ocult_pag('form_empresa_mob_form0');
        break;
      case 'data':
      case 'homepage':
      case 'inscmun':
      case 'inscest':
      case 'whatsapp':
      case 'cadastrante':
      case 'obs':
        sc_exib_ocult_pag('form_empresa_mob_form1');
        break;
      case 'contatos':
        sc_exib_ocult_pag('form_empresa_mob_form2');
        break;
    }
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
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cnpj_cpf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["categoria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["endereco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_cidade" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cidade" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bairro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logradouro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dat_ult_mov" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["homepage" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscmun" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscest" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["whatsapp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cadastrante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contatos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo" + iSeqRow] && scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow] && scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cnpj_cpf" + iSeqRow] && scEventControl_data["cnpj_cpf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cnpj_cpf" + iSeqRow] && scEventControl_data["cnpj_cpf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["categoria" + iSeqRow] && scEventControl_data["categoria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["categoria" + iSeqRow] && scEventControl_data["categoria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rede" + iSeqRow] && scEventControl_data["rede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rede" + iSeqRow] && scEventControl_data["rede" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow] && scEventControl_data["contato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow] && scEventControl_data["contato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow] && scEventControl_data["cep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_cidade" + iSeqRow] && scEventControl_data["id_cidade" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cidade" + iSeqRow] && scEventControl_data["id_cidade" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow] && scEventControl_data["celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow] && scEventControl_data["celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cidade" + iSeqRow] && scEventControl_data["cidade" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cidade" + iSeqRow] && scEventControl_data["cidade" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uf" + iSeqRow] && scEventControl_data["uf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uf" + iSeqRow] && scEventControl_data["uf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bairro" + iSeqRow] && scEventControl_data["bairro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bairro" + iSeqRow] && scEventControl_data["bairro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["logradouro" + iSeqRow] && scEventControl_data["logradouro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["logradouro" + iSeqRow] && scEventControl_data["logradouro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dat_ult_mov" + iSeqRow] && scEventControl_data["dat_ult_mov" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dat_ult_mov" + iSeqRow] && scEventControl_data["dat_ult_mov" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["homepage" + iSeqRow] && scEventControl_data["homepage" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["homepage" + iSeqRow] && scEventControl_data["homepage" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscmun" + iSeqRow] && scEventControl_data["inscmun" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscmun" + iSeqRow] && scEventControl_data["inscmun" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscest" + iSeqRow] && scEventControl_data["inscest" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscest" + iSeqRow] && scEventControl_data["inscest" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["whatsapp" + iSeqRow] && scEventControl_data["whatsapp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["whatsapp" + iSeqRow] && scEventControl_data["whatsapp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cadastrante" + iSeqRow] && scEventControl_data["cadastrante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cadastrante" + iSeqRow] && scEventControl_data["cadastrante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contatos" + iSeqRow] && scEventControl_data["contatos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contatos" + iSeqRow] && scEventControl_data["contatos" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("categoria" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("rede" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_cidade" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("categoria" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("empresa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_cidade" + iSeq == fieldName) {
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
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_form_empresa_tipo_onblur('#id_sc_field_tipo' + iSeqRow, iSeqRow) })
                                  .bind('click', function() { sc_form_empresa_tipo_onclick(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_empresa_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_categoria' + iSeqRow).bind('blur', function() { sc_form_empresa_categoria_onblur('#id_sc_field_categoria' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_empresa_categoria_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_empresa_categoria_onfocus(this, iSeqRow) });
  $('#id_sc_field_rede' + iSeqRow).bind('blur', function() { sc_form_empresa_rede_onblur('#id_sc_field_rede' + iSeqRow, iSeqRow) })
                                  .bind('focus', function() { sc_form_empresa_rede_onfocus(this, iSeqRow) });
  $('#id_sc_field_empresa' + iSeqRow).bind('blur', function() { sc_form_empresa_empresa_onblur('#id_sc_field_empresa' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_empresa_empresa_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_empresa_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_endereco' + iSeqRow).bind('blur', function() { sc_form_empresa_endereco_onblur('#id_sc_field_endereco' + iSeqRow, iSeqRow) })
                                      .bind('click', function() { sc_form_empresa_endereco_onclick(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_empresa_endereco_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_cidade' + iSeqRow).bind('blur', function() { sc_form_empresa_id_cidade_onblur('#id_sc_field_id_cidade' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_empresa_id_cidade_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_empresa_id_cidade_onfocus(this, iSeqRow) });
  $('#id_sc_field_cep' + iSeqRow).bind('blur', function() { sc_form_empresa_cep_onblur('#id_sc_field_cep' + iSeqRow, iSeqRow) })
                                 .bind('change', function() { sc_form_empresa_cep_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_empresa_cep_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { sc_form_empresa_telefone_onblur('#id_sc_field_telefone' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_empresa_telefone_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular' + iSeqRow).bind('blur', function() { sc_form_empresa_celular_onblur('#id_sc_field_celular' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_empresa_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_whatsapp' + iSeqRow).bind('blur', function() { sc_form_empresa_whatsapp_onblur('#id_sc_field_whatsapp' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_empresa_whatsapp_onfocus(this, iSeqRow) });
  $('#id_sc_field_contato' + iSeqRow).bind('blur', function() { sc_form_empresa_contato_onblur('#id_sc_field_contato' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_empresa_contato_onfocus(this, iSeqRow) });
  $('#id_sc_field_cnpj_cpf' + iSeqRow).bind('blur', function() { sc_form_empresa_cnpj_cpf_onblur('#id_sc_field_cnpj_cpf' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_empresa_cnpj_cpf_onfocus(this, iSeqRow) });
  $('#id_sc_field_inscest' + iSeqRow).bind('blur', function() { sc_form_empresa_inscest_onblur('#id_sc_field_inscest' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_empresa_inscest_onfocus(this, iSeqRow) });
  $('#id_sc_field_inscmun' + iSeqRow).bind('blur', function() { sc_form_empresa_inscmun_onblur('#id_sc_field_inscmun' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_empresa_inscmun_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_empresa_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow) })
                                   .bind('focus', function() { sc_form_empresa_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_homepage' + iSeqRow).bind('blur', function() { sc_form_empresa_homepage_onblur('#id_sc_field_homepage' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_empresa_homepage_onfocus(this, iSeqRow) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_empresa_obs_onblur('#id_sc_field_obs' + iSeqRow, iSeqRow) })
                                 .bind('focus', function() { sc_form_empresa_obs_onfocus(this, iSeqRow) });
  $('#id_sc_field_dat_ult_mov' + iSeqRow).bind('blur', function() { sc_form_empresa_dat_ult_mov_onblur('#id_sc_field_dat_ult_mov' + iSeqRow, iSeqRow) })
                                         .bind('focus', function() { sc_form_empresa_dat_ult_mov_onfocus(this, iSeqRow) });
  $('#id_sc_field_data' + iSeqRow).bind('blur', function() { sc_form_empresa_data_onblur('#id_sc_field_data' + iSeqRow, iSeqRow) })
                                  .bind('focus', function() { sc_form_empresa_data_onfocus(this, iSeqRow) });
  $('#id_sc_field_cadastrante' + iSeqRow).bind('blur', function() { sc_form_empresa_cadastrante_onblur('#id_sc_field_cadastrante' + iSeqRow, iSeqRow) })
                                         .bind('focus', function() { sc_form_empresa_cadastrante_onfocus(this, iSeqRow) });
  $('#id_sc_field_contatos' + iSeqRow).bind('blur', function() { sc_form_empresa_contatos_onblur('#id_sc_field_contatos' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_empresa_contatos_onfocus(this, iSeqRow) });
  $('#id_sc_field_cidade' + iSeqRow).bind('blur', function() { sc_form_empresa_cidade_onblur('#id_sc_field_cidade' + iSeqRow, iSeqRow) })
                                    .bind('focus', function() { sc_form_empresa_cidade_onfocus(this, iSeqRow) });
  $('#id_sc_field_uf' + iSeqRow).bind('blur', function() { sc_form_empresa_uf_onblur('#id_sc_field_uf' + iSeqRow, iSeqRow) })
                                .bind('focus', function() { sc_form_empresa_uf_onfocus(this, iSeqRow) });
  $('#id_sc_field_bairro' + iSeqRow).bind('blur', function() { sc_form_empresa_bairro_onblur('#id_sc_field_bairro' + iSeqRow, iSeqRow) })
                                    .bind('focus', function() { sc_form_empresa_bairro_onfocus(this, iSeqRow) });
  $('#id_sc_field_logradouro' + iSeqRow).bind('blur', function() { sc_form_empresa_logradouro_onblur('#id_sc_field_logradouro' + iSeqRow, iSeqRow) })
                                        .bind('focus', function() { sc_form_empresa_logradouro_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_empresa_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_tipo();
  scCssBlur(oThis);
}

function sc_form_empresa_tipo_onclick(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_event_tipo_onclick();
}

function sc_form_empresa_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_categoria_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_categoria();
  scCssBlur(oThis);
}

function sc_form_empresa_categoria_onchange(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_event_categoria_onchange();
}

function sc_form_empresa_categoria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_rede_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_rede();
  scCssBlur(oThis);
}

function sc_form_empresa_rede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_empresa();
  scCssBlur(oThis);
}

function sc_form_empresa_empresa_onchange(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_event_empresa_onchange();
}

function sc_form_empresa_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_endereco_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_endereco();
  scCssBlur(oThis);
}

function sc_form_empresa_endereco_onclick(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_event_endereco_onclick();
}

function sc_form_empresa_endereco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_id_cidade_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_id_cidade();
  scCssBlur(oThis);
}

function sc_form_empresa_id_cidade_onchange(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_event_id_cidade_onchange();
}

function sc_form_empresa_id_cidade_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_cep_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_cep();
  scCssBlur(oThis);
}

function sc_form_empresa_cep_onchange(oThis, iSeqRow) {
  cep_cep(oThis.value, 'F1;CEP,cep;UF,uf;CIDADE,cidade;BAIRRO,bairro;RUA,logradouro');
}

function sc_form_empresa_cep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_telefone_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_empresa_telefone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_celular();
  scCssBlur(oThis);
}

function sc_form_empresa_celular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_whatsapp_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_whatsapp();
  scCssBlur(oThis);
}

function sc_form_empresa_whatsapp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_contato_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_contato();
  scCssBlur(oThis);
}

function sc_form_empresa_contato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_cnpj_cpf_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_cnpj_cpf();
  scCssBlur(oThis);
}

function sc_form_empresa_cnpj_cpf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_inscest_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_inscest();
  scCssBlur(oThis);
}

function sc_form_empresa_inscest_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_inscmun_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_inscmun();
  scCssBlur(oThis);
}

function sc_form_empresa_inscmun_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_email_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_email();
  scCssBlur(oThis);
}

function sc_form_empresa_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_homepage_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_homepage();
  scCssBlur(oThis);
}

function sc_form_empresa_homepage_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_obs_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_obs();
  scCssBlur(oThis);
}

function sc_form_empresa_obs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_dat_ult_mov_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_dat_ult_mov();
  scCssBlur(oThis);
}

function sc_form_empresa_dat_ult_mov_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_data_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_data();
  scCssBlur(oThis);
}

function sc_form_empresa_data_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_cadastrante_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_cadastrante();
  scCssBlur(oThis);
}

function sc_form_empresa_cadastrante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_contatos_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_contatos();
  scCssBlur(oThis);
}

function sc_form_empresa_contatos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_cidade_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_cidade();
  scCssBlur(oThis);
}

function sc_form_empresa_cidade_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_uf_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_uf();
  scCssBlur(oThis);
}

function sc_form_empresa_uf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_bairro_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_bairro();
  scCssBlur(oThis);
}

function sc_form_empresa_bairro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresa_logradouro_onblur(oThis, iSeqRow) {
  do_ajax_form_empresa_mob_validate_logradouro();
  scCssBlur(oThis);
}

function sc_form_empresa_logradouro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
        if ("0" == page) {
                displayChange_page_0(status);
        }
        if ("1" == page) {
                displayChange_page_1(status);
        }
        if ("2" == page) {
                displayChange_page_2(status);
        }
}

function displayChange_page_0(status) {
        displayChange_block("0", status);
        displayChange_block("1", status);
        displayChange_block("2", status);
}

function displayChange_page_1(status) {
        displayChange_block("3", status);
        displayChange_block("4", status);
}

function displayChange_page_2(status) {
        displayChange_block("5", status);
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
        if ("3" == block) {
                displayChange_block_3(status);
        }
        if ("4" == block) {
                displayChange_block_4(status);
        }
        if ("5" == block) {
                displayChange_block_5(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("tipo", "", status);
        displayChange_field("cnpj_cpf", "", status);
        displayChange_field("categoria", "", status);
        displayChange_field("rede", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("empresa", "", status);
        displayChange_field("contato", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("cep", "", status);
        displayChange_field("endereco", "", status);
        displayChange_field("id_cidade", "", status);
        displayChange_field("telefone", "", status);
        displayChange_field("email", "", status);
        displayChange_field("celular", "", status);
        displayChange_field("cidade", "", status);
        displayChange_field("uf", "", status);
        displayChange_field("bairro", "", status);
        displayChange_field("logradouro", "", status);
        displayChange_field("dat_ult_mov", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("data", "", status);
        displayChange_field("homepage", "", status);
        displayChange_field("inscmun", "", status);
        displayChange_field("inscest", "", status);
        displayChange_field("whatsapp", "", status);
        displayChange_field("cadastrante", "", status);
}

function displayChange_block_4(status) {
        displayChange_field("obs", "", status);
}

function displayChange_block_5(status) {
        displayChange_field("contatos", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_tipo(row, status);
        displayChange_field_cnpj_cpf(row, status);
        displayChange_field_categoria(row, status);
        displayChange_field_rede(row, status);
        displayChange_field_empresa(row, status);
        displayChange_field_contato(row, status);
        displayChange_field_cep(row, status);
        displayChange_field_endereco(row, status);
        displayChange_field_id_cidade(row, status);
        displayChange_field_telefone(row, status);
        displayChange_field_email(row, status);
        displayChange_field_celular(row, status);
        displayChange_field_cidade(row, status);
        displayChange_field_uf(row, status);
        displayChange_field_bairro(row, status);
        displayChange_field_logradouro(row, status);
        displayChange_field_dat_ult_mov(row, status);
        displayChange_field_data(row, status);
        displayChange_field_homepage(row, status);
        displayChange_field_inscmun(row, status);
        displayChange_field_inscest(row, status);
        displayChange_field_whatsapp(row, status);
        displayChange_field_cadastrante(row, status);
        displayChange_field_obs(row, status);
        displayChange_field_contatos(row, status);
}

function displayChange_field(field, row, status) {
        if ("tipo" == field) {
                displayChange_field_tipo(row, status);
        }
        if ("cnpj_cpf" == field) {
                displayChange_field_cnpj_cpf(row, status);
        }
        if ("categoria" == field) {
                displayChange_field_categoria(row, status);
        }
        if ("rede" == field) {
                displayChange_field_rede(row, status);
        }
        if ("empresa" == field) {
                displayChange_field_empresa(row, status);
        }
        if ("contato" == field) {
                displayChange_field_contato(row, status);
        }
        if ("cep" == field) {
                displayChange_field_cep(row, status);
        }
        if ("endereco" == field) {
                displayChange_field_endereco(row, status);
        }
        if ("id_cidade" == field) {
                displayChange_field_id_cidade(row, status);
        }
        if ("telefone" == field) {
                displayChange_field_telefone(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("celular" == field) {
                displayChange_field_celular(row, status);
        }
        if ("cidade" == field) {
                displayChange_field_cidade(row, status);
        }
        if ("uf" == field) {
                displayChange_field_uf(row, status);
        }
        if ("bairro" == field) {
                displayChange_field_bairro(row, status);
        }
        if ("logradouro" == field) {
                displayChange_field_logradouro(row, status);
        }
        if ("dat_ult_mov" == field) {
                displayChange_field_dat_ult_mov(row, status);
        }
        if ("data" == field) {
                displayChange_field_data(row, status);
        }
        if ("homepage" == field) {
                displayChange_field_homepage(row, status);
        }
        if ("inscmun" == field) {
                displayChange_field_inscmun(row, status);
        }
        if ("inscest" == field) {
                displayChange_field_inscest(row, status);
        }
        if ("whatsapp" == field) {
                displayChange_field_whatsapp(row, status);
        }
        if ("cadastrante" == field) {
                displayChange_field_cadastrante(row, status);
        }
        if ("obs" == field) {
                displayChange_field_obs(row, status);
        }
        if ("contatos" == field) {
                displayChange_field_contatos(row, status);
        }
}

function displayChange_field_tipo(row, status) {
    var fieldId;
}

function displayChange_field_cnpj_cpf(row, status) {
    var fieldId;
}

function displayChange_field_categoria(row, status) {
    var fieldId;
}

function displayChange_field_rede(row, status) {
    var fieldId;
}

function displayChange_field_empresa(row, status) {
    var fieldId;
}

function displayChange_field_contato(row, status) {
    var fieldId;
}

function displayChange_field_cep(row, status) {
    var fieldId;
}

function displayChange_field_endereco(row, status) {
    var fieldId;
}

function displayChange_field_id_cidade(row, status) {
    var fieldId;
}

function displayChange_field_telefone(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_celular(row, status) {
    var fieldId;
}

function displayChange_field_cidade(row, status) {
    var fieldId;
}

function displayChange_field_uf(row, status) {
    var fieldId;
}

function displayChange_field_bairro(row, status) {
    var fieldId;
}

function displayChange_field_logradouro(row, status) {
    var fieldId;
}

function displayChange_field_dat_ult_mov(row, status) {
    var fieldId;
}

function displayChange_field_data(row, status) {
    var fieldId;
}

function displayChange_field_homepage(row, status) {
    var fieldId;
}

function displayChange_field_inscmun(row, status) {
    var fieldId;
}

function displayChange_field_inscest(row, status) {
    var fieldId;
}

function displayChange_field_whatsapp(row, status) {
    var fieldId;
}

function displayChange_field_cadastrante(row, status) {
    var fieldId;
}

function displayChange_field_obs(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_obs__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "obs");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "obs");
                }
        }
}

function displayChange_field_contatos(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_contato_mob")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_contato_mob")[0].contentWindow.scRecreateSelect2();
        }
        $("#nmsc_iframe_liga_form_contato_mob")[0].contentWindow.specificStyle();
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_empresa_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_data" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_data" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_data" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_empresa_mob_validate_data(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['data']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_dat_ult_proposta" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_dat_ult_proposta" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dat_ult_proposta" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_empresa_mob_validate_dat_ult_proposta(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['dat_ult_proposta']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  theme: "silver",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['obs']) && $this->nmgp_cmp_readonly['obs'] == 'on')
{
    unset($this->nmgp_cmp_readonly['obs']);
?>
   readonly: true,
<?php
}
else 
{
?>
   readonly: false,
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist print hr  autolink link image lists charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table directionality emoticons template',
  contextmenu: 'link linkchecker image imagetools table spellchecker configurepermanentpen',
  toolbar: "undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: left !important}",
  selector: "#obs" + iSeqRow,
  toolbar_mode: 'sliding',
  block_unsupported_drop: false,
  paste_data_images : true,
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  setup: function(ed) {
    ed.on("Change", function (e) {
        scFormHasChanged = true;
    }),
    ed.on("init", function (e) {
      if ($('textarea[name="obs' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

function scJQUploadAdd(iSeqRow) {
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_empresa_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
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

