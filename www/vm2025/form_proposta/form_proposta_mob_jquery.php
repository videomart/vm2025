
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
      case 'natureza':
      case 'cliente':
      case 'atencao':
      case 'local_entrega':
      case 'telefone':
      case 'email':
      case 'cod_vend':
      case 'data':
      case 'total':
      case 'desconto':
      case 'itensdaproposta':
        break;
      case 'tabela':
      case 'transportadora':
      case 'previsao':
      case 'condpag':
      case 'header':
      case 'obs':
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
  scEventControl_data["natureza" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["atencao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["local_entrega" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_vend" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desconto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["itensdaproposta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tabela" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["transportadora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["previsao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["condpag" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["header" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
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
  if (scEventControl_data["natureza" + iSeqRow] && scEventControl_data["natureza" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["natureza" + iSeqRow] && scEventControl_data["natureza" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow] && scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow] && scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["atencao" + iSeqRow] && scEventControl_data["atencao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["atencao" + iSeqRow] && scEventControl_data["atencao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["local_entrega" + iSeqRow] && scEventControl_data["local_entrega" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["local_entrega" + iSeqRow] && scEventControl_data["local_entrega" + iSeqRow]["change"]) {
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
  if (scEventControl_data["cod_vend" + iSeqRow] && scEventControl_data["cod_vend" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_vend" + iSeqRow] && scEventControl_data["cod_vend" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow] && scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow] && scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desconto" + iSeqRow] && scEventControl_data["desconto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desconto" + iSeqRow] && scEventControl_data["desconto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["itensdaproposta" + iSeqRow] && scEventControl_data["itensdaproposta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["itensdaproposta" + iSeqRow] && scEventControl_data["itensdaproposta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tabela" + iSeqRow] && scEventControl_data["tabela" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tabela" + iSeqRow] && scEventControl_data["tabela" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["transportadora" + iSeqRow] && scEventControl_data["transportadora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["transportadora" + iSeqRow] && scEventControl_data["transportadora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["previsao" + iSeqRow] && scEventControl_data["previsao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["previsao" + iSeqRow] && scEventControl_data["previsao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["condpag" + iSeqRow] && scEventControl_data["condpag" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["condpag" + iSeqRow] && scEventControl_data["condpag" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["header" + iSeqRow] && scEventControl_data["header" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["header" + iSeqRow] && scEventControl_data["header" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["change"]) {
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
  if ("natureza" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_vend" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tabela" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("transportadora" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_empresa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tabela" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_proposta_id_onblur('#id_sc_field_id' + iSeqRow, iSeqRow) })
                                .bind('focus', function() { sc_form_proposta_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_proposta_id_empresa_onblur('#id_sc_field_id_empresa' + iSeqRow, iSeqRow);}, 300) })
                                        .bind('change', function() { sc_form_proposta_id_empresa_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_proposta_id_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_form_proposta_cliente_onblur('#id_sc_field_cliente' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_proposta_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_atencao' + iSeqRow).bind('blur', function() { sc_form_proposta_atencao_onblur('#id_sc_field_atencao' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_proposta_atencao_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { sc_form_proposta_telefone_onblur('#id_sc_field_telefone' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_proposta_telefone_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_proposta_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow) })
                                   .bind('focus', function() { sc_form_proposta_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_natureza' + iSeqRow).bind('blur', function() { sc_form_proposta_natureza_onblur('#id_sc_field_natureza' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_proposta_natureza_onfocus(this, iSeqRow) });
  $('#id_sc_field_data' + iSeqRow).bind('blur', function() { sc_form_proposta_data_onblur('#id_sc_field_data' + iSeqRow, iSeqRow) })
                                  .bind('focus', function() { sc_form_proposta_data_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_vend' + iSeqRow).bind('blur', function() { sc_form_proposta_cod_vend_onblur('#id_sc_field_cod_vend' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_proposta_cod_vend_onfocus(this, iSeqRow) });
  $('#id_sc_field_tabela' + iSeqRow).bind('blur', function() { sc_form_proposta_tabela_onblur('#id_sc_field_tabela' + iSeqRow, iSeqRow) })
                                    .bind('change', function() { sc_form_proposta_tabela_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_proposta_tabela_onfocus(this, iSeqRow) });
  $('#id_sc_field_previsao' + iSeqRow).bind('blur', function() { sc_form_proposta_previsao_onblur('#id_sc_field_previsao' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_proposta_previsao_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_proposta_total_onblur('#id_sc_field_total' + iSeqRow, iSeqRow) })
                                   .bind('focus', function() { sc_form_proposta_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_desconto' + iSeqRow).bind('blur', function() { sc_form_proposta_desconto_onblur('#id_sc_field_desconto' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_proposta_desconto_onfocus(this, iSeqRow) });
  $('#id_sc_field_condpag' + iSeqRow).bind('blur', function() { sc_form_proposta_condpag_onblur('#id_sc_field_condpag' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_proposta_condpag_onfocus(this, iSeqRow) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_proposta_obs_onblur('#id_sc_field_obs' + iSeqRow, iSeqRow) })
                                 .bind('focus', function() { sc_form_proposta_obs_onfocus(this, iSeqRow) });
  $('#id_sc_field_header' + iSeqRow).bind('blur', function() { sc_form_proposta_header_onblur('#id_sc_field_header' + iSeqRow, iSeqRow) })
                                    .bind('focus', function() { sc_form_proposta_header_onfocus(this, iSeqRow) });
  $('#id_sc_field_transportadora' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_proposta_transportadora_onblur('#id_sc_field_transportadora' + iSeqRow, iSeqRow);}, 300) })
                                            .bind('focus', function() { sc_form_proposta_transportadora_onfocus(this, iSeqRow) });
  $('#id_sc_field_local_entrega' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_proposta_local_entrega_onblur('#id_sc_field_local_entrega' + iSeqRow, iSeqRow);}, 300) })
                                           .bind('focus', function() { sc_form_proposta_local_entrega_onfocus(this, iSeqRow) });
  $('#id_sc_field_itensdaproposta' + iSeqRow).bind('blur', function() { sc_form_proposta_itensdaproposta_onblur('#id_sc_field_itensdaproposta' + iSeqRow, iSeqRow) })
                                             .bind('focus', function() { sc_form_proposta_itensdaproposta_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_proposta_id_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_proposta_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_id_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_proposta_id_empresa_onchange(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_event_id_empresa_onchange();
}

function sc_form_proposta_id_empresa_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_proposta_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_cliente();
  scCssBlur(oThis);
}

function sc_form_proposta_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_atencao_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_atencao();
  scCssBlur(oThis);
}

function sc_form_proposta_atencao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_telefone_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_proposta_telefone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_email_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_email();
  scCssBlur(oThis);
}

function sc_form_proposta_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_natureza_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_natureza();
  scCssBlur(oThis);
}

function sc_form_proposta_natureza_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_data_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_data();
  scCssBlur(oThis);
}

function sc_form_proposta_data_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_cod_vend_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_cod_vend();
  scCssBlur(oThis);
}

function sc_form_proposta_cod_vend_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_tabela_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_tabela();
  scCssBlur(oThis);
}

function sc_form_proposta_tabela_onchange(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_event_tabela_onchange();
}

function sc_form_proposta_tabela_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_previsao_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_previsao();
  scCssBlur(oThis);
}

function sc_form_proposta_previsao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_total_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_total();
  scCssBlur(oThis);
}

function sc_form_proposta_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_desconto_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_desconto();
  scCssBlur(oThis);
}

function sc_form_proposta_desconto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_condpag_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_condpag();
  scCssBlur(oThis);
}

function sc_form_proposta_condpag_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_obs_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_obs();
  scCssBlur(oThis);
}

function sc_form_proposta_obs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_header_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_header();
  scCssBlur(oThis);
}

function sc_form_proposta_header_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_transportadora_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_transportadora();
  scCssBlur(oThis);
}

function sc_form_proposta_transportadora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_local_entrega_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_local_entrega();
  scCssBlur(oThis);
}

function sc_form_proposta_local_entrega_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_proposta_itensdaproposta_onblur(oThis, iSeqRow) {
  do_ajax_form_proposta_mob_validate_itensdaproposta();
  scCssBlur(oThis);
}

function sc_form_proposta_itensdaproposta_onfocus(oThis, iSeqRow) {
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
}

function displayChange_page_1(status) {
        displayChange_block("2", status);
        displayChange_block("3", status);
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
}

function displayChange_block_0(status) {
        displayChange_field("id", "", status);
        displayChange_field("id_empresa", "", status);
        displayChange_field("natureza", "", status);
        displayChange_field("cliente", "", status);
        displayChange_field("atencao", "", status);
        displayChange_field("local_entrega", "", status);
        displayChange_field("telefone", "", status);
        displayChange_field("email", "", status);
        displayChange_field("cod_vend", "", status);
        displayChange_field("data", "", status);
        displayChange_field("total", "", status);
        displayChange_field("desconto", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("itensdaproposta", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("tabela", "", status);
        displayChange_field("transportadora", "", status);
        displayChange_field("previsao", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("condpag", "", status);
        displayChange_field("header", "", status);
        displayChange_field("obs", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_id(row, status);
        displayChange_field_id_empresa(row, status);
        displayChange_field_natureza(row, status);
        displayChange_field_cliente(row, status);
        displayChange_field_atencao(row, status);
        displayChange_field_local_entrega(row, status);
        displayChange_field_telefone(row, status);
        displayChange_field_email(row, status);
        displayChange_field_cod_vend(row, status);
        displayChange_field_data(row, status);
        displayChange_field_total(row, status);
        displayChange_field_desconto(row, status);
        displayChange_field_itensdaproposta(row, status);
        displayChange_field_tabela(row, status);
        displayChange_field_transportadora(row, status);
        displayChange_field_previsao(row, status);
        displayChange_field_condpag(row, status);
        displayChange_field_header(row, status);
        displayChange_field_obs(row, status);
}

function displayChange_field(field, row, status) {
        if ("id" == field) {
                displayChange_field_id(row, status);
        }
        if ("id_empresa" == field) {
                displayChange_field_id_empresa(row, status);
        }
        if ("natureza" == field) {
                displayChange_field_natureza(row, status);
        }
        if ("cliente" == field) {
                displayChange_field_cliente(row, status);
        }
        if ("atencao" == field) {
                displayChange_field_atencao(row, status);
        }
        if ("local_entrega" == field) {
                displayChange_field_local_entrega(row, status);
        }
        if ("telefone" == field) {
                displayChange_field_telefone(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("cod_vend" == field) {
                displayChange_field_cod_vend(row, status);
        }
        if ("data" == field) {
                displayChange_field_data(row, status);
        }
        if ("total" == field) {
                displayChange_field_total(row, status);
        }
        if ("desconto" == field) {
                displayChange_field_desconto(row, status);
        }
        if ("itensdaproposta" == field) {
                displayChange_field_itensdaproposta(row, status);
        }
        if ("tabela" == field) {
                displayChange_field_tabela(row, status);
        }
        if ("transportadora" == field) {
                displayChange_field_transportadora(row, status);
        }
        if ("previsao" == field) {
                displayChange_field_previsao(row, status);
        }
        if ("condpag" == field) {
                displayChange_field_condpag(row, status);
        }
        if ("header" == field) {
                displayChange_field_header(row, status);
        }
        if ("obs" == field) {
                displayChange_field_obs(row, status);
        }
}

function displayChange_field_id(row, status) {
    var fieldId;
}

function displayChange_field_id_empresa(row, status) {
    var fieldId;
}

function displayChange_field_natureza(row, status) {
    var fieldId;
}

function displayChange_field_cliente(row, status) {
    var fieldId;
}

function displayChange_field_atencao(row, status) {
    var fieldId;
}

function displayChange_field_local_entrega(row, status) {
    var fieldId;
}

function displayChange_field_telefone(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_cod_vend(row, status) {
    var fieldId;
}

function displayChange_field_data(row, status) {
    var fieldId;
}

function displayChange_field_total(row, status) {
    var fieldId;
}

function displayChange_field_desconto(row, status) {
    var fieldId;
}

function displayChange_field_itensdaproposta(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_itemproposta_mob")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_itemproposta_mob")[0].contentWindow.scRecreateSelect2();
        }
        $("#nmsc_iframe_liga_form_itemproposta_mob")[0].contentWindow.specificStyle();
}

function displayChange_field_tabela(row, status) {
    var fieldId;
}

function displayChange_field_transportadora(row, status) {
    var fieldId;
}

function displayChange_field_previsao(row, status) {
    var fieldId;
}

function displayChange_field_condpag(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_condpag__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "condpag");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "condpag");
                }
        }
}

function displayChange_field_header(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_header__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "header");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "header");
                }
        }
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

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_proposta_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(25);
                }
        }
}
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
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['condpag']) && $this->nmgp_cmp_readonly['condpag'] == 'on')
{
    unset($this->nmgp_cmp_readonly['condpag']);
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
  toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  selector: "#condpag" + iSeqRow,
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
      if ($('textarea[name="condpag' + iSeqRow + '"]').prop('disabled') == true) {
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
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['header']) && $this->nmgp_cmp_readonly['header'] == 'on')
{
    unset($this->nmgp_cmp_readonly['header']);
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
  toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  selector: "#header" + iSeqRow,
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
      if ($('textarea[name="header' + iSeqRow + '"]').prop('disabled') == true) {
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
  toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_proposta_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add

var wizardActualStep = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta_mob']['form_wizard']['actual_step']; ?>;
var wizardTotalSteps = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_proposta_mob']['form_wizard']['total_steps']; ?>;
var wizardIsInsert = <?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'true' : 'false'); ?>;
var wizardViewMode = '<?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'wizard' : 'wizard'); ?>';
var pag_ativa = wizardActualStep;

function scJQWizardGoToPage(pageNo)
{
    pageNo = parseInt(pageNo);

    scJQWizardHideAllFormSteps();
    scJQWizardShowFormStep(pageNo);
    scJQWizardPreparePageNavigation(pageNo);
    scJQWizardPrepareStep(pageNo);

    wizardActualStep = pageNo;
    pag_ativa = wizardActualStep;
}

function scJQWizardPageClick(pageGoTo)
{
    var thisPage = $("#sc-ui-form-step-" + pageGoTo);

    pageGoTo = parseInt(pageGoTo);

    if (thisPage.hasClass("scTabInactive")) {
        scJQWizardGoToPage(pageGoTo);
    }
}

function scJQWizardPreparePageNavigation(pageNo)
{
    $("#sc-ui-form-step-" + wizardActualStep).removeClass("scTabActive").addClass("scTabInactive");
    $("#sc-ui-form-step-" + pageNo).removeClass("scTabInactive").addClass("scTabActive");

    $(".scTabInactive").css("cursor", "pointer");

    scJQWizardNavigationButtons();
}

function scJQWizardIsFirstStep()
{
    return 0 == wizardActualStep;
}

function scJQWizardIsLastStep()
{
    return wizardTotalSteps == wizardActualStep + 1;
}

function scJQWizardGoToNextStep()
{
    if (scJQWizardIsLastStep()) {
        return;
    }

    scJQWizardValidateStep(wizardActualStep + 1);
}

function scJQWizardGoToPreviousStep()
{
    if (scJQWizardIsFirstStep()) {
        return;
    }

    scJQWizardValidateStep(wizardActualStep - 1);
}

function scJQWizardStepClick(stepGoTo)
{
    var thisStep = $("#sc-ui-form-step-" + stepGoTo);

    stepGoTo = parseInt(stepGoTo);

    if (thisStep.hasClass("sc-ui-form-step-done")) {
        scJQWizardValidateStep(stepGoTo);
    } else if (thisStep.hasClass("sc-ui-form-step-next")) {
        scJQWizardValidateStep(stepGoTo);
    }
}

function scJQWizardValidateStep(stepGoTo)
{
    if (0 == wizardActualStep) {
        do_ajax_form_proposta_mob_submit_page_0(stepGoTo);
    }
    if (1 == wizardActualStep) {
        do_ajax_form_proposta_mob_submit_page_1(stepGoTo);
    }
}

function scJQWizardGoToStep(stepNo)
{
    stepNo = parseInt(stepNo);

    displayChange_page(wizardActualStep, 'off');

    if (typeof wizardMobileProgress === "object") {
        if (stepNo > wizardActualStep) {
            wizardMobileProgress.goToNextStep();
        } else if (stepNo < wizardActualStep) {
            wizardMobileProgress.goToPrevStep();
        }
    }

    scJQWizardHideAllFormSteps();
    scJQWizardShowFormStep(stepNo);
    scJQWizardPrepareNavigation(stepNo);
    scJQWizardPrepareStep(stepNo);

    displayChange_page(stepNo, 'on');

    wizardActualStep = stepNo;
    pag_ativa = wizardActualStep;

    if (wizardIsInsert) {
        if (scJQWizardIsLastStep()) {
            scJQWizardInsertButtonShow();
        } else {
            scJQWizardInsertButtonHide();
        }
    }

    if ('wizard' == wizardViewMode) {
        if (scJQWizardIsFirstStep()) {
            scJQWizardPreviousButtonHide();
        } else {
            scJQWizardPreviousButtonShow();
        }
        if (scJQWizardIsLastStep()) {
            scJQWizardNextButtonHide();
        } else {
            scJQWizardNextButtonShow();
        }
    }
}

function scJQWizardHideAllFormSteps()
{
    scJQWizardHideFormStep(0);
    scJQWizardHideFormStep(1);
}

function scJQWizardHideFormStep(stepNo)
{
    $("#form_proposta_mob_form" + stepNo).css({
        "width": "1px",
        "height": "0",
        "display": "none",
        "overflow": "scroll",
    });
}

function scJQWizardShowFormStep(stepNo)
{
    $("#form_proposta_mob_form" + stepNo).css({
        "width": "",
        "height": "",
        "display": "",
        "overflow": "visible",
    });
}

function scJQWizardPrepareNavigation(stepNo)
{
    scJQWizardNavigationDone(stepNo);
    scJQWizardNavigationNow(stepNo);
    scJQWizardNavigationNext(stepNo);
    scJQWizardNavigationToDo(stepNo);
    scJQWizardNavigationButtons();
}

function scJQWizardNavigationDone(stepNo)
{
    if (0 == stepNo) {
        return;
    }

    for (var i = 0; i < stepNo; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-done", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationNow(stepNo)
{
    scJQWizardNavigationAddClass("sc-ui-form-step-now", stepNo);
    scJQWizardNavigationUpdateStep(stepNo);
}

function scJQWizardNavigationNext(stepNo)
{
    if (wizardTotalSteps == stepNo + 1) {
        return;
    }

    for (var i = stepNo + 1; i < wizardTotalSteps; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-next", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationToDo(stepNo)
{
    if (!wizardIsInsert && 'wizard' != wizardViewMode) {
        return;
    }

    if (wizardTotalSteps == stepNo + 2) {
        return;
    }

    for (var i = stepNo + 2; i < wizardTotalSteps; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-todo", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationAddClass(className, stepNo)
{
    $("#sc-ui-form-step-" + stepNo)
        .removeClass("sc-ui-form-step-done")
        .removeClass("sc-ui-form-step-now")
        .removeClass("sc-ui-form-step-next")
        .removeClass("sc-ui-form-step-todo")
        .removeClass("is-complete")
        .addClass(className);

    if ("sc-ui-form-step-done" == className) {
        $("#sc-ui-form-step-" + stepNo).addClass("is-complete");
    }
}

function scJQWizardNavigationUpdateStep(stepNo)
{
    var thisStep = $("#sc-ui-form-step-" + stepNo);

    if (thisStep.hasClass("sc-ui-form-step-done")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "pointer");
        });
    } else if (thisStep.hasClass("sc-ui-form-step-now")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "default");
        });
    } else if (thisStep.hasClass("sc-ui-form-step-next")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "pointer");
        });
    } else {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "not-allowed");
        });
    }
}

function scJQWizardInsertButtonHide()
{
    $("#sc_b_ins_t").hide();
    $("#sc_b_ins_b").hide();
}

function scJQWizardInsertButtonShow()
{
    $("#sc_b_ins_t").show();
    $("#sc_b_ins_b").show();
}

function scJQWizardInsertButtonDisable()
{
    $("#sc_b_ins_t").addClass("disabled");
    $("#sc_b_ins_b").addClass("disabled");
}

function scJQWizardInsertButtonEnable()
{
    $("#sc_b_ins_t").removeClass("disabled");
    $("#sc_b_ins_b").removeClass("disabled");
}

function scJQWizardPreviousButtonHide()
{
    $("#sc_b_stepret_t").hide();
    $("#sc_b_stepret_b").hide();
}

function scJQWizardPreviousButtonShow()
{
    $("#sc_b_stepret_t").show();
    $("#sc_b_stepret_b").show();
}

function scJQWizardPreviousButtonDisable()
{
    $("#sc_b_stepret_t").addClass("disabled");
    $("#sc_b_stepret_b").addClass("disabled");
}

function scJQWizardPreviousButtonEnable()
{
    $("#sc_b_stepret_t").removeClass("disabled");
    $("#sc_b_stepret_b").removeClass("disabled");
}

function scJQWizardNextButtonHide()
{
    $("#sc_b_stepavc_t").hide();
    $("#sc_b_stepavc_b").hide();
}

function scJQWizardNextButtonShow()
{
    $("#sc_b_stepavc_t").show();
    $("#sc_b_stepavc_b").show();
}

function scJQWizardNextButtonDisable()
{
    $("#sc_b_stepavc_t").addClass("disabled");
    $("#sc_b_stepavc_b").addClass("disabled");
}

function scJQWizardNextButtonEnable()
{
    $("#sc_b_stepavc_t").removeClass("disabled");
    $("#sc_b_stepavc_b").removeClass("disabled");
}

function scJQWizardNavigationButtons()
{
    if ('wizard' != wizardViewMode) {
        scJQWizardPreviousButtonHide();
        scJQWizardNextButtonHide();
    }
}

function scJQWizardPrepareStep(stepNo)
{
    if (0 == stepNo) {
        scJQWizardPrepareStep_0();
    }
    if (1 == stepNo) {
        scJQWizardPrepareStep_1();
    }
}

function scJQWizardPrepareStep_0()
{
    scAjaxDetailHeight("form_itemproposta", "400");
}

function scJQWizardPrepareStep_1()
{
}

<?php
if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
class MobileWizard
{
    constructor(wrapper) {
        this.wrapper = document.querySelector(wrapper)

        // Circle
        this.circle = this.wrapper.querySelector('.js-progress-circle');
        this.radius = this.circle.r.baseVal.value;
        this.circumference = this.radius * 2 * Math.PI;

        // Steps
        this.steps = this.wrapper.querySelectorAll('.sc-steps .item');
        this.currentStep = this.wrapper.querySelector('.sc-ui-form-step-now');
        this.nextStep = this.wrapper.querySelector('.sc-ui-form-step-next');
        this.arraySteps = Array.from(this.steps);
        this.currentStepIndex = this.arraySteps.findIndex((step) => step === this.currentStep);

        // Counter
        this.currentStepCounter = document.querySelector('.js-current-step-counter');
        this.totalStepsCounter = document.querySelector('.js-total-steps-counter');
        this.totalCounter = this.steps.length;

        this.progress = 100 / this.totalCounter;

        // Initial Setup
        this.initialStyles();
        this.initialCounter();
        this.initialProgress();
        this.setNextStepTitle();
    }

    initialStyles() {
        this.circle.style.strokeDasharray = this.circumference + " " + this.circumference;
        this.circle.style.strokeDashoffset = this.circumference;
    }

    initialCounter() {
        this.currentStepCounter.textContent = this.currentStepIndex + 1;
        this.totalStepsCounter.textContent = this.totalCounter;
    }

    initialProgress() {
        this.percent = 100 / this.totalCounter;
        this.setProgress(this.progress);
    }

    setCounter(counter) {
        this.currentStepCounter.textContent = counter;
    }

    setProgress(percent) {
        const offset = this.circumference - percent / 100 * this.circumference;
        this.circle.style.strokeDashoffset = offset;
    }

    calcAndSetProgress() {
        this.progress = parseFloat(100 / this.totalCounter) * (this.currentStepIndex + 1);
        this.setProgress(this.progress);
        this.setCounter(this.currentStepIndex + 1);
    }

    goToNextStep = () => {
        if (this.currentStepIndex +1 < this.totalCounter) {
            this.setActiveStepsStatus(1);
            this.calcAndSetProgress();
            this.setNextStepTitle()
        }
    }

    goToPrevStep = () => {
        if (this.currentStepIndex !== 0 && this.currentStepIndex <= this.totalCounter) {
            this.setActiveStepsStatus(-1);
            this.calcAndSetProgress();
            this.setNextStepTitle()
        }
    }

    setActiveStepsStatus(operator) {
        this.steps[this.currentStepIndex].classList.remove('sc-ui-form-step-now');
        this.steps[this.currentStepIndex].classList.add('is-complete');

        this.currentStepIndex = this.currentStepIndex + operator;

        this.steps[this.currentStepIndex].classList.remove('sc-ui-form-step-next');
        this.steps[this.currentStepIndex].classList.add('sc-ui-form-step-now');

        if (this.currentStepIndex + 1 < this.totalCounter) {
            this.steps[this.currentStepIndex + 1].classList.add('sc-ui-form-step-next');
        }
    }

    setNextStepTitle() {
        const description = this.steps[this.currentStepIndex].querySelector('.description');
        const nextStep = document.querySelector('.sc-ui-form-step-next');
        let nextStepTitle = '';

        if (nextStep) {
            const title = nextStep.querySelector('.title').textContent;
            nextStepTitle = '<?php echo $this->Ini->Nm_lang['lang_btns_next']; ?>: ' + title;
        } else {
            nextStepTitle = ''
        }

        description.textContent = nextStepTitle
    }
}

var wizardMobileProgress;

$(function() {
//    const prevButton = document.querySelector('.js-example-prev');
//    const nextButton = document.querySelector('.js-example-next');

    wizardMobileProgress = new MobileWizard('.sc-div-steps');

//    nextButton.addEventListener('click', wizardMobileProgress.goToNextStep);
//    prevButton.addEventListener('click', wizardMobileProgress.goToPrevStep);
});
<?php
}
?>


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
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

