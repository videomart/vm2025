
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
      case 'id':
      case 'id_empresa':
      case 'contato':
      case 'email':
      case 'telefone':
      case 'cnpj':
      case 'id_proposta':
      case 'id_itemproposta':
      case 'data_venda':
      case 'modelo':
      case 'serial':
      case 'cod_ativacao':
      case 'dados_integracao':
        sc_exib_ocult_pag('form_sistemas_vm_mob_form0');
        break;
      case 'dados_suporte':
        sc_exib_ocult_pag('form_sistemas_vm_mob_form1');
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
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cnpj" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_proposta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_itemproposta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_venda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_ativacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dados_integracao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dados_suporte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow] && scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow] && scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow] && scEventControl_data["contato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow] && scEventControl_data["contato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cnpj" + iSeqRow] && scEventControl_data["cnpj" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cnpj" + iSeqRow] && scEventControl_data["cnpj" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_proposta" + iSeqRow] && scEventControl_data["id_proposta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_proposta" + iSeqRow] && scEventControl_data["id_proposta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_itemproposta" + iSeqRow] && scEventControl_data["id_itemproposta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_itemproposta" + iSeqRow] && scEventControl_data["id_itemproposta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_venda" + iSeqRow] && scEventControl_data["data_venda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_venda" + iSeqRow] && scEventControl_data["data_venda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow] && scEventControl_data["modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow] && scEventControl_data["modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow] && scEventControl_data["serial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow] && scEventControl_data["serial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_ativacao" + iSeqRow] && scEventControl_data["cod_ativacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_ativacao" + iSeqRow] && scEventControl_data["cod_ativacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dados_integracao" + iSeqRow] && scEventControl_data["dados_integracao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dados_integracao" + iSeqRow] && scEventControl_data["dados_integracao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dados_suporte" + iSeqRow] && scEventControl_data["dados_suporte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dados_suporte" + iSeqRow] && scEventControl_data["dados_suporte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_proposta" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_itemproposta" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_empresa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_itemproposta" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_proposta" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_id_onblur('#id_sc_field_id' + iSeqRow, iSeqRow, event) })
                                .bind('focus', function() { sc_form_sistemas_vm_id_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_id_empresa_onblur('#id_sc_field_id_empresa' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_sistemas_vm_id_empresa_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_sistemas_vm_id_empresa_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_contato' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_sistemas_vm_contato_onblur('#id_sc_field_contato' + iSeqRow, iSeqRow, event);}, 300) })
                                     .bind('focus', function() { sc_form_sistemas_vm_contato_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_sistemas_vm_telefone_onblur('#id_sc_field_telefone' + iSeqRow, iSeqRow, event);}, 300) })
                                      .bind('focus', function() { sc_form_sistemas_vm_telefone_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_sistemas_vm_email_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cnpj' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_sistemas_vm_cnpj_onblur('#id_sc_field_cnpj' + iSeqRow, iSeqRow, event);}, 300) })
                                  .bind('focus', function() { sc_form_sistemas_vm_cnpj_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_proposta' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_id_proposta_onblur('#id_sc_field_id_proposta' + iSeqRow, iSeqRow, event) })
                                         .bind('change', function() { sc_form_sistemas_vm_id_proposta_onchange(this, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_sistemas_vm_id_proposta_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data_venda' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_sistemas_vm_data_venda_onblur('#id_sc_field_data_venda' + iSeqRow, iSeqRow, event);}, 300) })
                                        .bind('focus', function() { sc_form_sistemas_vm_data_venda_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_itemproposta' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_sistemas_vm_id_itemproposta_onblur('#id_sc_field_id_itemproposta' + iSeqRow, iSeqRow, event);}, 300) })
                                             .bind('change', function() { sc_form_sistemas_vm_id_itemproposta_onchange(this, iSeqRow, event) })
                                             .bind('focus', function() { sc_form_sistemas_vm_id_itemproposta_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_modelo' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_sistemas_vm_modelo_onblur('#id_sc_field_modelo' + iSeqRow, iSeqRow, event);}, 300) })
                                    .bind('focus', function() { sc_form_sistemas_vm_modelo_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_serial' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_serial_onblur('#id_sc_field_serial' + iSeqRow, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_sistemas_vm_serial_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_cod_ativacao' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_cod_ativacao_onblur('#id_sc_field_cod_ativacao' + iSeqRow, iSeqRow, event) })
                                          .bind('focus', function() { sc_form_sistemas_vm_cod_ativacao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_dados_integracao' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_dados_integracao_onblur('#id_sc_field_dados_integracao' + iSeqRow, iSeqRow, event) })
                                              .bind('focus', function() { sc_form_sistemas_vm_dados_integracao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_dados_suporte' + iSeqRow).bind('blur', function() { sc_form_sistemas_vm_dados_suporte_onblur('#id_sc_field_dados_suporte' + iSeqRow, iSeqRow, event) })
                                           .bind('focus', function() { sc_form_sistemas_vm_dados_suporte_onfocus(this, iSeqRow, event) });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_sistemas_vm_id_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_id_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_id_empresa_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_id_empresa_onchange(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_event_id_empresa_onchange();
}

function sc_form_sistemas_vm_id_empresa_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_contato_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_contato();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_contato_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_telefone_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_telefone_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_email_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_email();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_email_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_cnpj_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_cnpj();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_cnpj_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_id_proposta_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_id_proposta();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_id_proposta_onchange(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_event_id_proposta_onchange();
}

function sc_form_sistemas_vm_id_proposta_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_data_venda_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_data_venda();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_data_venda_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_id_itemproposta_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_id_itemproposta();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_id_itemproposta_onchange(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_event_id_itemproposta_onchange();
}

function sc_form_sistemas_vm_id_itemproposta_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_modelo_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_modelo();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_modelo_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_serial_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_serial();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_serial_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_cod_ativacao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_cod_ativacao();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_cod_ativacao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_dados_integracao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_dados_integracao();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_dados_integracao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sistemas_vm_dados_suporte_onblur(oThis, iSeqRow, event) {
  do_ajax_form_sistemas_vm_mob_validate_dados_suporte();
  scCssBlur(oThis);
}

function sc_form_sistemas_vm_dados_suporte_onfocus(oThis, iSeqRow, event) {
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
}

function displayChange_page_0(status) {
        displayChange_block("0", status);
        displayChange_block("1", status);
        displayChange_block("2", status);
        displayChange_block("3", status);
        displayChange_block("4", status);
}

function displayChange_page_1(status) {
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
        displayChange_field("id", "", status);
        displayChange_field("id_empresa", "", status);
        displayChange_field("contato", "", status);
        displayChange_field("email", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("telefone", "", status);
        displayChange_field("cnpj", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("id_proposta", "", status);
        displayChange_field("id_itemproposta", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("data_venda", "", status);
        displayChange_field("modelo", "", status);
        displayChange_field("serial", "", status);
        displayChange_field("cod_ativacao", "", status);
}

function displayChange_block_4(status) {
        displayChange_field("dados_integracao", "", status);
}

function displayChange_block_5(status) {
        displayChange_field("dados_suporte", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_id(row, status);
        displayChange_field_id_empresa(row, status);
        displayChange_field_contato(row, status);
        displayChange_field_email(row, status);
        displayChange_field_telefone(row, status);
        displayChange_field_cnpj(row, status);
        displayChange_field_id_proposta(row, status);
        displayChange_field_id_itemproposta(row, status);
        displayChange_field_data_venda(row, status);
        displayChange_field_modelo(row, status);
        displayChange_field_serial(row, status);
        displayChange_field_cod_ativacao(row, status);
        displayChange_field_dados_integracao(row, status);
        displayChange_field_dados_suporte(row, status);
}

function displayChange_field(field, row, status) {
        if ("id" == field) {
                displayChange_field_id(row, status);
        }
        if ("id_empresa" == field) {
                displayChange_field_id_empresa(row, status);
        }
        if ("contato" == field) {
                displayChange_field_contato(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("telefone" == field) {
                displayChange_field_telefone(row, status);
        }
        if ("cnpj" == field) {
                displayChange_field_cnpj(row, status);
        }
        if ("id_proposta" == field) {
                displayChange_field_id_proposta(row, status);
        }
        if ("id_itemproposta" == field) {
                displayChange_field_id_itemproposta(row, status);
        }
        if ("data_venda" == field) {
                displayChange_field_data_venda(row, status);
        }
        if ("modelo" == field) {
                displayChange_field_modelo(row, status);
        }
        if ("serial" == field) {
                displayChange_field_serial(row, status);
        }
        if ("cod_ativacao" == field) {
                displayChange_field_cod_ativacao(row, status);
        }
        if ("dados_integracao" == field) {
                displayChange_field_dados_integracao(row, status);
        }
        if ("dados_suporte" == field) {
                displayChange_field_dados_suporte(row, status);
        }
}

function displayChange_field_id(row, status) {
    var fieldId;
}

function displayChange_field_id_empresa(row, status) {
    var fieldId;
}

function displayChange_field_contato(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_telefone(row, status) {
    var fieldId;
}

function displayChange_field_cnpj(row, status) {
    var fieldId;
}

function displayChange_field_id_proposta(row, status) {
    var fieldId;
}

function displayChange_field_id_itemproposta(row, status) {
    var fieldId;
}

function displayChange_field_data_venda(row, status) {
    var fieldId;
}

function displayChange_field_modelo(row, status) {
    var fieldId;
}

function displayChange_field_serial(row, status) {
    var fieldId;
}

function displayChange_field_cod_ativacao(row, status) {
    var fieldId;
}

function displayChange_field_dados_integracao(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_dados_integracao__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "dados_integracao");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "dados_integracao");
                }
        }
}

function displayChange_field_dados_suporte(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_dados_suporte__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "dados_suporte");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "dados_suporte");
                }
        }
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_sistemas_vm_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_data_venda" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_data_venda" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_data_venda" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_sistemas_vm_mob_validate_data_venda(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['data_venda']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['dados_integracao']) && $this->nmgp_cmp_readonly['dados_integracao'] == 'on')
{
    unset($this->nmgp_cmp_readonly['dados_integracao']);
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
  content_style: ".mce-container-body {text-align: center !important}",
  selector: "#dados_integracao" + iSeqRow,
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
      if ($('textarea[name="dados_integracao' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  theme: "silver",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['dados_suporte']) && $this->nmgp_cmp_readonly['dados_suporte'] == 'on')
{
    unset($this->nmgp_cmp_readonly['dados_suporte']);
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
  content_style: ".mce-container-body {text-align: center !important}",
  selector: "#dados_suporte" + iSeqRow,
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
      if ($('textarea[name="dados_suporte' + iSeqRow + '"]').prop('disabled') == true) {
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_sistemas_vm_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  scJQHtmlEditorAdd(iLine);
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

