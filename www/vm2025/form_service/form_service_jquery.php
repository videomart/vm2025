
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
      case 'osnumber':
      case 'id_empresa':
      case 'empresa':
      case 'telefone':
      case 'fax':
      case 'contato':
      case 'email':
      case 'endereco':
      case 'data':
      case 'nfs_ent':
      case 'classe':
      case 'marca':
      case 'modelo':
      case 'serie':
      case 'natureza':
      case 'status':
      case 'recepcao':
      case 'obs':
      case 'descricao':
      case 'sintoma':
        sc_exib_ocult_pag('form_service_form0');
        break;
      case 'dataorc':
      case 'maoobra':
      case 'material':
      case 'orcamento':
      case 'tecnico':
      case 'saida':
      case 'pendencia':
      case 'servico':
      case 'mat':
        sc_exib_ocult_pag('form_service_form1');
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
  scEventControl_data["osnumber" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fax" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["endereco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nfs_ent" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["classe" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marca" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serie" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["natureza" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["recepcao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descricao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sintoma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dataorc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["material" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tecnico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pendencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["maoobra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["orcamento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["osnumber" + iSeqRow] && scEventControl_data["osnumber" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["osnumber" + iSeqRow] && scEventControl_data["osnumber" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow] && scEventControl_data["empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow] && scEventControl_data["telefone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow] && scEventControl_data["fax" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow] && scEventControl_data["fax" + iSeqRow]["change"]) {
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
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["endereco" + iSeqRow] && scEventControl_data["endereco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data" + iSeqRow] && scEventControl_data["data" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nfs_ent" + iSeqRow] && scEventControl_data["nfs_ent" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nfs_ent" + iSeqRow] && scEventControl_data["nfs_ent" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["classe" + iSeqRow] && scEventControl_data["classe" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["classe" + iSeqRow] && scEventControl_data["classe" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marca" + iSeqRow] && scEventControl_data["marca" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marca" + iSeqRow] && scEventControl_data["marca" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow] && scEventControl_data["modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow] && scEventControl_data["modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serie" + iSeqRow] && scEventControl_data["serie" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serie" + iSeqRow] && scEventControl_data["serie" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["natureza" + iSeqRow] && scEventControl_data["natureza" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["natureza" + iSeqRow] && scEventControl_data["natureza" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow] && scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow] && scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["recepcao" + iSeqRow] && scEventControl_data["recepcao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["recepcao" + iSeqRow] && scEventControl_data["recepcao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow] && scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descricao" + iSeqRow] && scEventControl_data["descricao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descricao" + iSeqRow] && scEventControl_data["descricao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sintoma" + iSeqRow] && scEventControl_data["sintoma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sintoma" + iSeqRow] && scEventControl_data["sintoma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dataorc" + iSeqRow] && scEventControl_data["dataorc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dataorc" + iSeqRow] && scEventControl_data["dataorc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["material" + iSeqRow] && scEventControl_data["material" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["material" + iSeqRow] && scEventControl_data["material" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tecnico" + iSeqRow] && scEventControl_data["tecnico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tecnico" + iSeqRow] && scEventControl_data["tecnico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pendencia" + iSeqRow] && scEventControl_data["pendencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pendencia" + iSeqRow] && scEventControl_data["pendencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maoobra" + iSeqRow] && scEventControl_data["maoobra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maoobra" + iSeqRow] && scEventControl_data["maoobra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orcamento" + iSeqRow] && scEventControl_data["orcamento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orcamento" + iSeqRow] && scEventControl_data["orcamento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saida" + iSeqRow] && scEventControl_data["saida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saida" + iSeqRow] && scEventControl_data["saida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servico" + iSeqRow] && scEventControl_data["servico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servico" + iSeqRow] && scEventControl_data["servico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mat" + iSeqRow] && scEventControl_data["mat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mat" + iSeqRow] && scEventControl_data["mat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow] && scEventControl_data["id_empresa" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["classe" + iSeqRow] && scEventControl_data["classe" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["marca" + iSeqRow] && scEventControl_data["marca" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("status" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("recepcao" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tecnico" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("classe" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_empresa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("marca" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("modelo" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('change', function() { sc_form_service_id_onchange(this, iSeqRow, event) });
  $('#id_sc_field_osnumber' + iSeqRow).bind('blur', function() { sc_form_service_osnumber_onblur('#id_sc_field_osnumber' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_service_osnumber_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_service_osnumber_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_nfs_ent' + iSeqRow).bind('blur', function() { sc_form_service_nfs_ent_onblur('#id_sc_field_nfs_ent' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_nfs_ent_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_nfs_ent_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { sc_form_service_id_empresa_onblur('#id_sc_field_id_empresa' + iSeqRow, iSeqRow, event) })
                                        .bind('change', function() { sc_form_service_id_empresa_onchange(this, iSeqRow, event) })
                                        .bind('focus', function() { sc_form_service_id_empresa_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_data' + iSeqRow).bind('blur', function() { sc_form_service_data_onblur('#id_sc_field_data' + iSeqRow, iSeqRow, event) })
                                  .bind('change', function() { sc_form_service_data_onchange(this, iSeqRow, event) })
                                  .bind('focus', function() { sc_form_service_data_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_classe' + iSeqRow).bind('blur', function() { sc_form_service_classe_onblur('#id_sc_field_classe' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_service_classe_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_service_classe_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_marca' + iSeqRow).bind('blur', function() { sc_form_service_marca_onblur('#id_sc_field_marca' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_service_marca_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_service_marca_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_modelo' + iSeqRow).bind('blur', function() { sc_form_service_modelo_onblur('#id_sc_field_modelo' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_service_modelo_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_service_modelo_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_serie' + iSeqRow).bind('blur', function() { sc_form_service_serie_onblur('#id_sc_field_serie' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_service_serie_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_service_serie_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_natureza' + iSeqRow).bind('blur', function() { sc_form_service_natureza_onblur('#id_sc_field_natureza' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_service_natureza_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_service_natureza_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_sintoma' + iSeqRow).bind('blur', function() { sc_form_service_sintoma_onblur('#id_sc_field_sintoma' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_sintoma_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_sintoma_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_service_status_onblur('#id_sc_field_status' + iSeqRow, iSeqRow, event) })
                                    .bind('change', function() { sc_form_service_status_onchange(this, iSeqRow, event) })
                                    .bind('focus', function() { sc_form_service_status_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_recepcao' + iSeqRow).bind('blur', function() { sc_form_service_recepcao_onblur('#id_sc_field_recepcao' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_service_recepcao_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_service_recepcao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_dataorc' + iSeqRow).bind('blur', function() { sc_form_service_dataorc_onblur('#id_sc_field_dataorc' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_dataorc_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_dataorc_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_maoobra' + iSeqRow).bind('blur', function() { sc_form_service_maoobra_onblur('#id_sc_field_maoobra' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_maoobra_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_maoobra_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_material' + iSeqRow).bind('blur', function() { sc_form_service_material_onblur('#id_sc_field_material' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_service_material_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_service_material_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_orcamento' + iSeqRow).bind('blur', function() { sc_form_service_orcamento_onblur('#id_sc_field_orcamento' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_service_orcamento_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_service_orcamento_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_pendencia' + iSeqRow).bind('blur', function() { sc_form_service_pendencia_onblur('#id_sc_field_pendencia' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_service_pendencia_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_service_pendencia_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_tecnico' + iSeqRow).bind('blur', function() { sc_form_service_tecnico_onblur('#id_sc_field_tecnico' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_tecnico_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_tecnico_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_saida' + iSeqRow).bind('blur', function() { sc_form_service_saida_onblur('#id_sc_field_saida' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_service_saida_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_service_saida_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_service_obs_onblur('#id_sc_field_obs' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_service_obs_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_service_obs_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_empresa' + iSeqRow).bind('blur', function() { sc_form_service_empresa_onblur('#id_sc_field_empresa' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_empresa_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_empresa_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { sc_form_service_telefone_onblur('#id_sc_field_telefone' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_service_telefone_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_service_telefone_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_fax' + iSeqRow).bind('blur', function() { sc_form_service_fax_onblur('#id_sc_field_fax' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_service_fax_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_service_fax_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_contato' + iSeqRow).bind('blur', function() { sc_form_service_contato_onblur('#id_sc_field_contato' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_contato_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_contato_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_descricao' + iSeqRow).bind('blur', function() { sc_form_service_descricao_onblur('#id_sc_field_descricao' + iSeqRow, iSeqRow, event) })
                                       .bind('change', function() { sc_form_service_descricao_onchange(this, iSeqRow, event) })
                                       .bind('focus', function() { sc_form_service_descricao_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_endereco' + iSeqRow).bind('blur', function() { sc_form_service_endereco_onblur('#id_sc_field_endereco' + iSeqRow, iSeqRow, event) })
                                      .bind('change', function() { sc_form_service_endereco_onchange(this, iSeqRow, event) })
                                      .bind('focus', function() { sc_form_service_endereco_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_service_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow, event) })
                                   .bind('change', function() { sc_form_service_email_onchange(this, iSeqRow, event) })
                                   .bind('focus', function() { sc_form_service_email_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_servico' + iSeqRow).bind('blur', function() { sc_form_service_servico_onblur('#id_sc_field_servico' + iSeqRow, iSeqRow, event) })
                                     .bind('change', function() { sc_form_service_servico_onchange(this, iSeqRow, event) })
                                     .bind('focus', function() { sc_form_service_servico_onfocus(this, iSeqRow, event) });
  $('#id_sc_field_mat' + iSeqRow).bind('blur', function() { sc_form_service_mat_onblur('#id_sc_field_mat' + iSeqRow, iSeqRow, event) })
                                 .bind('change', function() { sc_form_service_mat_onchange(this, iSeqRow, event) })
                                 .bind('focus', function() { sc_form_service_mat_onfocus(this, iSeqRow, event) });
  $('.sc-ui-radio-natureza' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

Upload_Cancel = false;
function sc_form_service_id_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_osnumber_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_osnumber();
  scCssBlur(oThis);
}

function sc_form_service_osnumber_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_osnumber_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_nfs_ent_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_nfs_ent();
  scCssBlur(oThis);
}

function sc_form_service_nfs_ent_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_nfs_ent_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_id_empresa_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_service_id_empresa_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_service_event_id_empresa_onchange();
}

function sc_form_service_id_empresa_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_service_data_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_data();
  scCssBlur(oThis);
}

function sc_form_service_data_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_data_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_classe_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_classe();
  scCssBlur(oThis);
}

function sc_form_service_classe_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_service_event_classe_onchange();
}

function sc_form_service_classe_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_service_marca_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_marca();
  scCssBlur(oThis);
}

function sc_form_service_marca_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_service_event_marca_onchange();
}

function sc_form_service_marca_onfocus(oThis, iSeqRow, event) {
  scCssFocus(oThis);
}

function sc_form_service_modelo_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_modelo();
  scCssBlur(oThis);
}

function sc_form_service_modelo_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
  do_ajax_form_service_event_modelo_onchange();
}

function sc_form_service_modelo_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_serie_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_serie();
  scCssBlur(oThis);
  do_ajax_form_service_event_serie_onblur();
}

function sc_form_service_serie_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_serie_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_natureza_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_natureza();
  scCssBlur(oThis);
}

function sc_form_service_natureza_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_natureza_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_sintoma_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_sintoma();
  scCssBlur(oThis);
}

function sc_form_service_sintoma_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_sintoma_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_status_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_status();
  scCssBlur(oThis);
}

function sc_form_service_status_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_status_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_recepcao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_recepcao();
  scCssBlur(oThis);
}

function sc_form_service_recepcao_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_recepcao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_dataorc_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_dataorc();
  scCssBlur(oThis);
}

function sc_form_service_dataorc_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_dataorc_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_maoobra_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_maoobra();
  scCssBlur(oThis);
}

function sc_form_service_maoobra_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_maoobra_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_material_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_material();
  scCssBlur(oThis);
}

function sc_form_service_material_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_material_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_orcamento_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_orcamento();
  scCssBlur(oThis);
}

function sc_form_service_orcamento_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_orcamento_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_pendencia_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_pendencia();
  scCssBlur(oThis);
}

function sc_form_service_pendencia_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_pendencia_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_tecnico_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_tecnico();
  scCssBlur(oThis);
}

function sc_form_service_tecnico_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_tecnico_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_saida_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_saida();
  scCssBlur(oThis);
}

function sc_form_service_saida_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_saida_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_obs_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_obs();
  scCssBlur(oThis);
}

function sc_form_service_obs_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_obs_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_empresa_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_empresa();
  scCssBlur(oThis);
}

function sc_form_service_empresa_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_empresa_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_telefone_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_service_telefone_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_telefone_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_fax_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_fax();
  scCssBlur(oThis);
}

function sc_form_service_fax_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_fax_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_contato_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_contato();
  scCssBlur(oThis);
}

function sc_form_service_contato_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_contato_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_descricao_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_descricao();
  scCssBlur(oThis);
}

function sc_form_service_descricao_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_descricao_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_endereco_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_endereco();
  scCssBlur(oThis);
}

function sc_form_service_endereco_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_endereco_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_email_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_email();
  scCssBlur(oThis);
}

function sc_form_service_email_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_email_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_servico_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_servico();
  scCssBlur(oThis);
}

function sc_form_service_servico_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_servico_onfocus(oThis, iSeqRow, event) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_service_mat_onblur(oThis, iSeqRow, event) {
  do_ajax_form_service_validate_mat();
  scCssBlur(oThis);
}

function sc_form_service_mat_onchange(oThis, iSeqRow, event) {
  scMarkFormAsChanged();
}

function sc_form_service_mat_onfocus(oThis, iSeqRow, event) {
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
}

function displayChange_page_1(status) {
        displayChange_block("3", status);
        displayChange_block("4", status);
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
}

function displayChange_block_0(status) {
        displayChange_field("osnumber", "", status);
        displayChange_field("id_empresa", "", status);
        displayChange_field("empresa", "", status);
        displayChange_field("telefone", "", status);
        displayChange_field("fax", "", status);
        displayChange_field("contato", "", status);
        displayChange_field("email", "", status);
        displayChange_field("endereco", "", status);
        displayChange_field("data", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("nfs_ent", "", status);
        displayChange_field("classe", "", status);
        displayChange_field("marca", "", status);
        displayChange_field("modelo", "", status);
        displayChange_field("serie", "", status);
        displayChange_field("natureza", "", status);
        displayChange_field("status", "", status);
        displayChange_field("recepcao", "", status);
        displayChange_field("obs", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("descricao", "", status);
        displayChange_field("sintoma", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("dataorc", "", status);
        displayChange_field("maoobra", "", status);
        displayChange_field("material", "", status);
        displayChange_field("orcamento", "", status);
        displayChange_field("tecnico", "", status);
        displayChange_field("saida", "", status);
        displayChange_field("pendencia", "", status);
}

function displayChange_block_4(status) {
        displayChange_field("servico", "", status);
        displayChange_field("mat", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_osnumber(row, status);
        displayChange_field_id_empresa(row, status);
        displayChange_field_empresa(row, status);
        displayChange_field_telefone(row, status);
        displayChange_field_fax(row, status);
        displayChange_field_contato(row, status);
        displayChange_field_email(row, status);
        displayChange_field_endereco(row, status);
        displayChange_field_data(row, status);
        displayChange_field_nfs_ent(row, status);
        displayChange_field_classe(row, status);
        displayChange_field_marca(row, status);
        displayChange_field_modelo(row, status);
        displayChange_field_serie(row, status);
        displayChange_field_natureza(row, status);
        displayChange_field_status(row, status);
        displayChange_field_recepcao(row, status);
        displayChange_field_obs(row, status);
        displayChange_field_descricao(row, status);
        displayChange_field_sintoma(row, status);
        displayChange_field_dataorc(row, status);
        displayChange_field_material(row, status);
        displayChange_field_tecnico(row, status);
        displayChange_field_pendencia(row, status);
        displayChange_field_maoobra(row, status);
        displayChange_field_orcamento(row, status);
        displayChange_field_saida(row, status);
        displayChange_field_servico(row, status);
        displayChange_field_mat(row, status);
}

function displayChange_field(field, row, status) {
        if ("osnumber" == field) {
                displayChange_field_osnumber(row, status);
        }
        if ("id_empresa" == field) {
                displayChange_field_id_empresa(row, status);
        }
        if ("empresa" == field) {
                displayChange_field_empresa(row, status);
        }
        if ("telefone" == field) {
                displayChange_field_telefone(row, status);
        }
        if ("fax" == field) {
                displayChange_field_fax(row, status);
        }
        if ("contato" == field) {
                displayChange_field_contato(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("endereco" == field) {
                displayChange_field_endereco(row, status);
        }
        if ("data" == field) {
                displayChange_field_data(row, status);
        }
        if ("nfs_ent" == field) {
                displayChange_field_nfs_ent(row, status);
        }
        if ("classe" == field) {
                displayChange_field_classe(row, status);
        }
        if ("marca" == field) {
                displayChange_field_marca(row, status);
        }
        if ("modelo" == field) {
                displayChange_field_modelo(row, status);
        }
        if ("serie" == field) {
                displayChange_field_serie(row, status);
        }
        if ("natureza" == field) {
                displayChange_field_natureza(row, status);
        }
        if ("status" == field) {
                displayChange_field_status(row, status);
        }
        if ("recepcao" == field) {
                displayChange_field_recepcao(row, status);
        }
        if ("obs" == field) {
                displayChange_field_obs(row, status);
        }
        if ("descricao" == field) {
                displayChange_field_descricao(row, status);
        }
        if ("sintoma" == field) {
                displayChange_field_sintoma(row, status);
        }
        if ("dataorc" == field) {
                displayChange_field_dataorc(row, status);
        }
        if ("material" == field) {
                displayChange_field_material(row, status);
        }
        if ("tecnico" == field) {
                displayChange_field_tecnico(row, status);
        }
        if ("pendencia" == field) {
                displayChange_field_pendencia(row, status);
        }
        if ("maoobra" == field) {
                displayChange_field_maoobra(row, status);
        }
        if ("orcamento" == field) {
                displayChange_field_orcamento(row, status);
        }
        if ("saida" == field) {
                displayChange_field_saida(row, status);
        }
        if ("servico" == field) {
                displayChange_field_servico(row, status);
        }
        if ("mat" == field) {
                displayChange_field_mat(row, status);
        }
}

function displayChange_field_osnumber(row, status) {
    var fieldId;
}

function displayChange_field_id_empresa(row, status) {
    var fieldId;
}

function displayChange_field_empresa(row, status) {
    var fieldId;
}

function displayChange_field_telefone(row, status) {
    var fieldId;
}

function displayChange_field_fax(row, status) {
    var fieldId;
}

function displayChange_field_contato(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_endereco(row, status) {
    var fieldId;
}

function displayChange_field_data(row, status) {
    var fieldId;
}

function displayChange_field_nfs_ent(row, status) {
    var fieldId;
}

function displayChange_field_classe(row, status) {
    var fieldId;
}

function displayChange_field_marca(row, status) {
    var fieldId;
}

function displayChange_field_modelo(row, status) {
    var fieldId;
}

function displayChange_field_serie(row, status) {
    var fieldId;
}

function displayChange_field_natureza(row, status) {
    var fieldId;
}

function displayChange_field_status(row, status) {
    var fieldId;
}

function displayChange_field_recepcao(row, status) {
    var fieldId;
}

function displayChange_field_obs(row, status) {
    var fieldId;
}

function displayChange_field_descricao(row, status) {
    var fieldId;
}

function displayChange_field_sintoma(row, status) {
    var fieldId;
}

function displayChange_field_dataorc(row, status) {
    var fieldId;
}

function displayChange_field_material(row, status) {
    var fieldId;
}

function displayChange_field_tecnico(row, status) {
    var fieldId;
}

function displayChange_field_pendencia(row, status) {
    var fieldId;
}

function displayChange_field_maoobra(row, status) {
    var fieldId;
}

function displayChange_field_orcamento(row, status) {
    var fieldId;
}

function displayChange_field_saida(row, status) {
    var fieldId;
}

function displayChange_field_servico(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_work")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_work")[0].contentWindow.scRecreateSelect2();
        }
}

function displayChange_field_mat(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_material")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_material")[0].contentWindow.scRecreateSelect2();
        }
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_service_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
                }
        }
}
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_service')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

