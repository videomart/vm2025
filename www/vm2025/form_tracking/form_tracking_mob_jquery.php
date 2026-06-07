
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
  scEventControl_data["ordem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["job" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fob" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descricao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["qtd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vendedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_venda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_entrega" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_prevista" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_compra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comprador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_dealer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dealer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["purch_order" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["via" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_recebimento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["ordem" + iSeqRow] && scEventControl_data["ordem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ordem" + iSeqRow] && scEventControl_data["ordem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["job" + iSeqRow] && scEventControl_data["job" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["job" + iSeqRow] && scEventControl_data["job" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow] && scEventControl_data["modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow] && scEventControl_data["modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fob" + iSeqRow] && scEventControl_data["fob" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fob" + iSeqRow] && scEventControl_data["fob" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descricao" + iSeqRow] && scEventControl_data["descricao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descricao" + iSeqRow] && scEventControl_data["descricao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qtd" + iSeqRow] && scEventControl_data["qtd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qtd" + iSeqRow] && scEventControl_data["qtd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vendedor" + iSeqRow] && scEventControl_data["vendedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vendedor" + iSeqRow] && scEventControl_data["vendedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_venda" + iSeqRow] && scEventControl_data["data_venda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_venda" + iSeqRow] && scEventControl_data["data_venda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_entrega" + iSeqRow] && scEventControl_data["data_entrega" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_entrega" + iSeqRow] && scEventControl_data["data_entrega" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_prevista" + iSeqRow] && scEventControl_data["data_prevista" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_prevista" + iSeqRow] && scEventControl_data["data_prevista" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_compra" + iSeqRow] && scEventControl_data["data_compra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_compra" + iSeqRow] && scEventControl_data["data_compra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comprador" + iSeqRow] && scEventControl_data["comprador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comprador" + iSeqRow] && scEventControl_data["comprador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_dealer" + iSeqRow] && scEventControl_data["id_dealer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_dealer" + iSeqRow] && scEventControl_data["id_dealer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dealer" + iSeqRow] && scEventControl_data["dealer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dealer" + iSeqRow] && scEventControl_data["dealer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["purch_order" + iSeqRow] && scEventControl_data["purch_order" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["purch_order" + iSeqRow] && scEventControl_data["purch_order" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow] && scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow] && scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["via" + iSeqRow] && scEventControl_data["via" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["via" + iSeqRow] && scEventControl_data["via" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_recebimento" + iSeqRow] && scEventControl_data["data_recebimento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_recebimento" + iSeqRow] && scEventControl_data["data_recebimento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_dealer" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("status" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  $('#id_sc_field_job' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_tracking_job_onblur('#id_sc_field_job' + iSeqRow, iSeqRow, event);}, 300) })
                                 .bind('focus', function() { sc_form_tracking_job_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_ordem' + iSeqRow).bind('blur', function() { sc_form_tracking_ordem_onblur('#id_sc_field_ordem' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_tracking_ordem_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_tracking_ordem_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_modelo' + iSeqRow).bind('blur', function() { sc_form_tracking_modelo_onblur('#id_sc_field_modelo' + iSeqRow, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_tracking_modelo_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_fob' + iSeqRow).bind('blur', function() { sc_form_tracking_fob_onblur('#id_sc_field_fob' + iSeqRow, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_tracking_fob_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_descricao' + iSeqRow).bind('blur', function() { sc_form_tracking_descricao_onblur('#id_sc_field_descricao' + iSeqRow, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_tracking_descricao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_qtd' + iSeqRow).bind('blur', function() { sc_form_tracking_qtd_onblur('#id_sc_field_qtd' + iSeqRow, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_tracking_qtd_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_vendedor' + iSeqRow).bind('blur', function() { sc_form_tracking_vendedor_onblur('#id_sc_field_vendedor' + iSeqRow, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_tracking_vendedor_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data_venda' + iSeqRow).bind('blur', function() { sc_form_tracking_data_venda_onblur('#id_sc_field_data_venda' + iSeqRow, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_tracking_data_venda_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data_entrega' + iSeqRow).bind('blur', function() { sc_form_tracking_data_entrega_onblur('#id_sc_field_data_entrega' + iSeqRow, iSeqRow, event) })
                                          .bind('focus', function() { sc_form_tracking_data_entrega_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data_compra' + iSeqRow).bind('blur', function() { sc_form_tracking_data_compra_onblur('#id_sc_field_data_compra' + iSeqRow, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_tracking_data_compra_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_comprador' + iSeqRow).bind('blur', function() { sc_form_tracking_comprador_onblur('#id_sc_field_comprador' + iSeqRow, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_tracking_comprador_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_dealer' + iSeqRow).bind('blur', function() { sc_form_tracking_id_dealer_onblur('#id_sc_field_id_dealer' + iSeqRow, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_tracking_id_dealer_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_dealer' + iSeqRow).bind('blur', function() { sc_form_tracking_dealer_onblur('#id_sc_field_dealer' + iSeqRow, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_tracking_dealer_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_purch_order' + iSeqRow).bind('blur', function() { sc_form_tracking_purch_order_onblur('#id_sc_field_purch_order' + iSeqRow, iSeqRow, event) })
                                         .bind('focus', function() { sc_form_tracking_purch_order_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data_prevista' + iSeqRow).bind('blur', function() { sc_form_tracking_data_prevista_onblur('#id_sc_field_data_prevista' + iSeqRow, iSeqRow, event) })
                                           .bind('focus', function() { sc_form_tracking_data_prevista_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data_recebimento' + iSeqRow).bind('blur', function() { sc_form_tracking_data_recebimento_onblur('#id_sc_field_data_recebimento' + iSeqRow, iSeqRow, event) })
                                              .bind('focus', function() { sc_form_tracking_data_recebimento_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_via' + iSeqRow).bind('blur', function() { sc_form_tracking_via_onblur('#id_sc_field_via' + iSeqRow, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_tracking_via_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_tracking_status_onblur('#id_sc_field_status' + iSeqRow, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_tracking_status_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_tracking_obs_onblur('#id_sc_field_obs' + iSeqRow, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_tracking_obs_onfocus(this, iSeqRow, event) });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_tracking_job_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_job();
  scCssBlur(oThis);
}

function sc_form_tracking_job_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_ordem_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_ordem();
  scCssBlur(oThis);
}

function sc_form_tracking_ordem_onchange(oThis, iSeqRow, event) {
  lookup_ordem();
}

function sc_form_tracking_ordem_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_modelo_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_modelo();
  scCssBlur(oThis);
}

function sc_form_tracking_modelo_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_fob_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_fob();
  scCssBlur(oThis);
}

function sc_form_tracking_fob_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_descricao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_descricao();
  scCssBlur(oThis);
}

function sc_form_tracking_descricao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_qtd_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_qtd();
  scCssBlur(oThis);
}

function sc_form_tracking_qtd_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_vendedor_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_vendedor();
  scCssBlur(oThis);
}

function sc_form_tracking_vendedor_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_data_venda_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_data_venda();
  scCssBlur(oThis);
}

function sc_form_tracking_data_venda_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_data_entrega_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_data_entrega();
  scCssBlur(oThis);
}

function sc_form_tracking_data_entrega_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_data_compra_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_data_compra();
  scCssBlur(oThis);
}

function sc_form_tracking_data_compra_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_comprador_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_comprador();
  scCssBlur(oThis);
}

function sc_form_tracking_comprador_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_id_dealer_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_id_dealer();
  scCssBlur(oThis);
}

function sc_form_tracking_id_dealer_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_dealer_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_dealer();
  scCssBlur(oThis);
}

function sc_form_tracking_dealer_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_purch_order_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_purch_order();
  scCssBlur(oThis);
}

function sc_form_tracking_purch_order_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_data_prevista_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_data_prevista();
  scCssBlur(oThis);
}

function sc_form_tracking_data_prevista_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_data_recebimento_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_data_recebimento();
  scCssBlur(oThis);
}

function sc_form_tracking_data_recebimento_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_via_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_via();
  scCssBlur(oThis);
}

function sc_form_tracking_via_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_status_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_status();
  scCssBlur(oThis);
}

function sc_form_tracking_status_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tracking_obs_onblur(oThis, iSeqRow, event) {
  do_ajax_form_tracking_mob_validate_obs();
  scCssBlur(oThis);
}

function sc_form_tracking_obs_onfocus(oThis, iSeqRow, event) {
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
        if ("3" == block) {
                displayChange_block_3(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("ordem", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("job", "", status);
        displayChange_field("modelo", "", status);
        displayChange_field("fob", "", status);
        displayChange_field("descricao", "", status);
        displayChange_field("qtd", "", status);
        displayChange_field("vendedor", "", status);
        displayChange_field("data_venda", "", status);
        displayChange_field("data_entrega", "", status);
        displayChange_field("data_prevista", "", status);
        displayChange_field("data_compra", "", status);
        displayChange_field("comprador", "", status);
        displayChange_field("id_dealer", "", status);
        displayChange_field("dealer", "", status);
        displayChange_field("purch_order", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("status", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("via", "", status);
        displayChange_field("data_recebimento", "", status);
        displayChange_field("obs", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_ordem(row, status);
        displayChange_field_job(row, status);
        displayChange_field_modelo(row, status);
        displayChange_field_fob(row, status);
        displayChange_field_descricao(row, status);
        displayChange_field_qtd(row, status);
        displayChange_field_vendedor(row, status);
        displayChange_field_data_venda(row, status);
        displayChange_field_data_entrega(row, status);
        displayChange_field_data_prevista(row, status);
        displayChange_field_data_compra(row, status);
        displayChange_field_comprador(row, status);
        displayChange_field_id_dealer(row, status);
        displayChange_field_dealer(row, status);
        displayChange_field_purch_order(row, status);
        displayChange_field_status(row, status);
        displayChange_field_via(row, status);
        displayChange_field_data_recebimento(row, status);
        displayChange_field_obs(row, status);
}

function displayChange_field(field, row, status) {
        if ("ordem" == field) {
                displayChange_field_ordem(row, status);
        }
        if ("job" == field) {
                displayChange_field_job(row, status);
        }
        if ("modelo" == field) {
                displayChange_field_modelo(row, status);
        }
        if ("fob" == field) {
                displayChange_field_fob(row, status);
        }
        if ("descricao" == field) {
                displayChange_field_descricao(row, status);
        }
        if ("qtd" == field) {
                displayChange_field_qtd(row, status);
        }
        if ("vendedor" == field) {
                displayChange_field_vendedor(row, status);
        }
        if ("data_venda" == field) {
                displayChange_field_data_venda(row, status);
        }
        if ("data_entrega" == field) {
                displayChange_field_data_entrega(row, status);
        }
        if ("data_prevista" == field) {
                displayChange_field_data_prevista(row, status);
        }
        if ("data_compra" == field) {
                displayChange_field_data_compra(row, status);
        }
        if ("comprador" == field) {
                displayChange_field_comprador(row, status);
        }
        if ("id_dealer" == field) {
                displayChange_field_id_dealer(row, status);
        }
        if ("dealer" == field) {
                displayChange_field_dealer(row, status);
        }
        if ("purch_order" == field) {
                displayChange_field_purch_order(row, status);
        }
        if ("status" == field) {
                displayChange_field_status(row, status);
        }
        if ("via" == field) {
                displayChange_field_via(row, status);
        }
        if ("data_recebimento" == field) {
                displayChange_field_data_recebimento(row, status);
        }
        if ("obs" == field) {
                displayChange_field_obs(row, status);
        }
}

function displayChange_field_ordem(row, status) {
    var fieldId;
}

function displayChange_field_job(row, status) {
    var fieldId;
}

function displayChange_field_modelo(row, status) {
    var fieldId;
}

function displayChange_field_fob(row, status) {
    var fieldId;
}

function displayChange_field_descricao(row, status) {
    var fieldId;
}

function displayChange_field_qtd(row, status) {
    var fieldId;
}

function displayChange_field_vendedor(row, status) {
    var fieldId;
}

function displayChange_field_data_venda(row, status) {
    var fieldId;
}

function displayChange_field_data_entrega(row, status) {
    var fieldId;
}

function displayChange_field_data_prevista(row, status) {
    var fieldId;
}

function displayChange_field_data_compra(row, status) {
    var fieldId;
}

function displayChange_field_comprador(row, status) {
    var fieldId;
}

function displayChange_field_id_dealer(row, status) {
    var fieldId;
}

function displayChange_field_dealer(row, status) {
    var fieldId;
}

function displayChange_field_purch_order(row, status) {
    var fieldId;
}

function displayChange_field_status(row, status) {
    var fieldId;
}

function displayChange_field_via(row, status) {
    var fieldId;
}

function displayChange_field_data_recebimento(row, status) {
    var fieldId;
}

function displayChange_field_obs(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_tracking_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_data_prevista" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_data_prevista" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_data_prevista" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tracking_mob_validate_data_prevista(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['data_prevista']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_data_recebimento" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_data_recebimento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_data_recebimento" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tracking_mob_validate_data_recebimento(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['data_recebimento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_tracking_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

