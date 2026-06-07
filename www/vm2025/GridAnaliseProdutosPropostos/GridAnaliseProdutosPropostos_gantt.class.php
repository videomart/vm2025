<?php

class GridAnaliseProdutosPropostos_gantt
{
    var $Db;
    var $Erro;
    var $Ini;
    var $Lookup;
    var $nm_data;
    var $chart_data;
    var $chart_only;
    var $output;
    var $interval;
    var $categories;
    var $output_formatted;
    var $output_unformatted;

    function __construct()
    {
        $this->output     = 'html5';
        $this->chart_only = false;
        $this->setOutputFormat();
    }

    function monta_gantt()
    {
        $this->nm_data    = new nm_data("pt_br");
        $this->getChartData();
        $this->displayChart();
    }

    function prep_modulos($modulo)
    {
        $this->$modulo->Ini    = $this->Ini;
        $this->$modulo->Db     = $this->Db;
        $this->$modulo->Erro   = $this->Erro;
        $this->$modulo->Lookup = $this->Lookup;
    }

    function setOutputFormat()
    {
        $aTempFormat = array();
        $sTempFormat = $_SESSION['scriptcase']['reg_conf']['date_format'];
        $sTempFormat = str_replace(array('a', '/'), array('y', ''), $sTempFormat);
        for ($i = 0; $i < strlen($sTempFormat); $i++)
        {
            $sChar = substr($sTempFormat, $i, 1);
            if (!in_array($sChar, $aTempFormat))
            {
                $aTempFormat[] = $sChar;
            }
        }
        $this->output_formatted   = str_replace(array('d', 'm', 'y'), array('dd', 'mm', 'yyyy'), implode('/', $aTempFormat));
        $this->output_unformatted = str_replace(array('d', 'm', 'y'), array('dd', 'mm', 'yyyy'), implode('', $aTempFormat));
    }

   function load_chart_theme()
   {
       $sChartTheme = 'none.php';
       if (($_SESSION['sc_session'][$this->Ini->sc_page]['GridAnaliseProdutosPropostos']['opcao'] == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($_SESSION['sc_session'][$this->Ini->sc_page]['GridAnaliseProdutosPropostos']['opcao'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       {
           $sChartTheme = 'scriptcase__NM__sc_GrayScale.php';
       }
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['GridAnaliseProdutosPropostos']['export_print_bw']) && $_SESSION['sc_session'][$this->Ini->sc_page]['GridAnaliseProdutosPropostos']['export_print_bw'])
       {
           $sChartTheme = 'scriptcase__NM__sc_GrayScale.php';
       }
       $prjFallback = '';
       $grpFallback = '';
       if ('grp__NM__' == substr($this->Ini->str_chart_theme, 0, 9)) {
           $prjFallback = 'prj__NM__' . substr($this->Ini->str_chart_theme, 9);
       }
       if ('prj__NM__' == substr($sChartTheme, 0, 9)) {
           $grpFallback = 'grp__NM__' . substr($sChartTheme, 9);
       }
       if ('none' == $sChartTheme) {
           return [];
       }
       if ('__app' == $sChartTheme)
       {
           return array(
           );
       }
       elseif ('__theme' == $sChartTheme && isset($this->Ini->str_chart_theme) && !empty($this->Ini->str_chart_theme) && is_file($this->Ini->path_chart_theme . $this->Ini->str_chart_theme . '.php'))
       {
           include $this->Ini->path_chart_theme . $this->Ini->str_chart_theme . '.php';
           return $__scChartTheme;
       }
       elseif ('__theme' == $sChartTheme && isset($prjFallback) && !empty($prjFallback) && is_file($this->Ini->path_chart_theme . $prjFallback . '.php'))
       {
           include $this->Ini->path_chart_theme . $prjFallback . '.php';
           return $__scChartTheme;
       }
       elseif ('' != $sChartTheme && @is_file($this->Ini->path_chart_theme . $sChartTheme))
       {
           include $this->Ini->path_chart_theme . $sChartTheme;
           return $__scChartTheme;
       }
       elseif (isset($prjFallback) && !empty($prjFallback) && @is_file($this->Ini->path_chart_theme . $prjFallback . '.php'))
       {
           include $this->Ini->path_chart_theme . $prjFallback . '.php';
           return $__scChartTheme;
       }
       elseif (isset($grpFallback) && !empty($grpFallback) && @is_file($this->Ini->path_chart_theme . $grpFallback))
       {
           include $this->Ini->path_chart_theme . $grpFallback;
           return $__scChartTheme;
       }
       else
       {
           return false;
       }
   }
    function getChartData()
    {
        $this->has_resource = false;
        $this->chart_data = array();

        $sSelect  = "SELECT proposta.cliente, proposta.data, proposta.data FROM " . $this->Ini->nm_tabela;
        $sSelect .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['GridAnaliseProdutosPropostos']['where_pesq'];
        $sSelect .= " ORDER BY proposta.data, proposta.data";

        $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSelect;

        $rs_gantt = $this->Db->Execute($sSelect);

        if ($rs_gantt === false && !$rs_gantt->EOF && $GLOBALS['NM_ERRO_IBASE'] != 1)
        {
            $this->Erro->mensagem(__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
            exit;
        }

        while (!$rs_gantt->EOF)
        {
            $proposta_cliente = $rs_gantt->fields[0];
            $proposta_data = $rs_gantt->fields[1];
            $proposta_data = $rs_gantt->fields[2];
            $_sc_gantt_data_complete = 100;
            $_sc_gantt_data_resource = '';

            $this->chart_data[] = array(
                'label'    => $proposta_cliente,
                'start'    => $proposta_data,
                'end'      => $proposta_data,
                'complete' => $_sc_gantt_data_complete,
                'resource' => $_sc_gantt_data_resource,
            );

            $rs_gantt->MoveNext();
        }
    }

    function displayChart()
    {
        global $nm_saida;

        if (!$this->chart_only)
        {
            $nm_saida->saida("<!DOCTYPE html>\r\n");
            $nm_saida->saida("<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
            $nm_saida->saida("<head>\r\n");
            $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Pragma\" content=\"no-cache\">\r\n");
            $nm_saida->saida(" <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
            if ($_SESSION['scriptcase']['proc_mobile'])
            {
            $nm_saida->saida(" <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n");
            }
            $nm_saida->saida(" <title>GridAnaliseProdutosPropostos</title>\r\n");
            $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" />\r\n");
            $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\r\n");
            if ('html' == $this->output)
            {
                $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/lib/js/jsgantt.css\" />\r\n");
                $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_link . "_lib/lib/js/jsgantt.js\"></script>\r\n");
            }
            else
            {
                $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/fusioncharts-suite-xt/js/fusioncharts.js\"></script>\r\n");
            }
            $nm_saida->saida("</head>\r\n");
            $nm_saida->saida("<body class=\"scGridPage\">\r\n");
        }

        $nm_saida->saida("<div id=\"GanttChartDIV\" style=\"text-align: left\"></div>\r\n");
        $nm_saida->saida("<script>\r\n");

        if ('html' == $this->output)
        {
            $nm_saida->saida(" var g = new JSGantt.GanttChart('g', document.getElementById('GanttChartDIV'), 'day');\r\n");
            $nm_saida->saida(" g.setShowDur(1);\r\n");
            $nm_saida->saida(" g.setCaptionType('Resource');\r\n");
            $nm_saida->saida(" g.setShowStartDate(1);\r\n");
            $nm_saida->saida(" g.setShowEndDate(1);\r\n");
            $nm_saida->saida(" g.setDateInputFormat('yyyy/mm/dd');\r\n");
            $nm_saida->saida(" g.setDateDisplayFormat('" . $this->output_formatted . "');\r\n");
            $nm_saida->saida(" if (g) {\r\n");

            foreach ($this->chart_data as $iRecIdx => $aRecData)
            {
                $nm_saida->saida("  g.AddTaskItem(new JSGantt.TaskItem($iRecIdx, \"" . $aRecData['label'] . "\", \"" . $this->formatStartInputDate($aRecData['start']) . "\", \"" . $this->formatEndInputDate($aRecData['end']) . "\", \"0088CC\", \"\", 0, \"" . $aRecData['resource'] . "\", " . $this->formatComplete($aRecData['complete']) . ", 0, 0, 1));\r\n");
            }

            $nm_saida->saida("  g.Draw();        \r\n");
            $nm_saida->saida("  g.DrawDependencies();\r\n");
            $nm_saida->saida(" }\r\n");
        }
        else
        {
            $sTempXml = $this->Ini->path_imag_temp . '/' . 'sc_gantt_' . md5(microtime()) . '.xml';
            $rTempXml = @fopen($this->Ini->root . $sTempXml, 'w');
            $themeInfo = $this->load_chart_theme();
            $themeString = [];
            $themeCategory = [];
            $themeDatacolumn = [];
            $themeDatatable = [];
            $themeProcess = [];
            $themeProcesses = [];
            foreach ($themeInfo as $themeTag => $themeValue) {
                if ('' != $themeValue) {
                    $themeValue = str_replace("'", "\"", $themeValue);
                    switch ($themeTag) {
                        case 'ganttHeaderFont':
                            $themeCategory[] = "font='$themeValue'";
                            $themeDatatable[] = "headerFont='$themeValue'";
                            $themeProcesses[] = "headerFont='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttHeaderFontBold':
                            $themeCategory[] = "isBold='$themeValue'";
                            $themeDatatable[] = "headerIsBold='$themeValue'";
                            $themeProcesses[] = "headerIsBold='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttHeaderFontSize':
                            $themeCategory[] = "fontSize='$themeValue'";
                            $themeDatatable[] = "headerFontSize='$themeValue'";
                            $themeProcesses[] = "headerFontSize='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttHeaderFontColor':
                            $themeCategory[] = "fontColor='$themeValue'";
                            $themeDatatable[] = "headerFontColor='$themeValue'";
                            $themeProcesses[] = "headerFontColor='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttHeaderBgColor':
                            $themeCategory[] = "bgColor='$themeValue'";
                            $themeDatatable[] = "headerBgColor='$themeValue'";
                            $themeProcesses[] = "headerBgColor='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttColumnFont':
                            $themeDatacolumn[] = "font='$themeValue'";
                            $themeProcess[] = "font='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttColumnFontBold':
                            $themeDatacolumn[] = "isBold='$themeValue'";
                            $themeProcess[] = "isBold='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttColumnFontSize':
                            $themeDatacolumn[] = "fontSize='$themeValue'";
                            $themeProcess[] = "fontSize='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttColumnFontColor':
                            $themeDatacolumn[] = "fontColor='$themeValue'";
                            $themeProcess[] = "fontColor='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttColumnBgColor':
                            $themeDatacolumn[] = "bgColor='$themeValue'";
                            $themeProcess[] = "bgColor='$themeValue'";
                            $themeTag = '';
                            break;
                        case 'ganttBorderColor':
                            $themeString[] = "gridbordercolor='$themeValue'";
                            $themeString[] = "ganttlinecolor='$themeValue'";
                            $themeTag = '';
                            break;
                    }
                    if ('' != $themeTag) {
                        $themeString[] = "$themeTag='$themeValue'";
                    }
                }
            }
            $processTitle = $this->string_to_utf8("Cliente");
            $resourceTitle = $this->string_to_utf8("");
            $chartTitle = $processTitle;
            @fwrite($rTempXml, "<chart dateFormat='" . $this->output_formatted . "' caption='" . $chartTitle . "' ganttPaneDuration='12' ganttPaneDurationUnit='m' " . implode(' ', $themeString) . ">\n");
            @fwrite($rTempXml, " <processes headertext='" . $processTitle . "' headeralign='left' fontSize='12' isBold='1' align='left' " . implode(' ', $themeProcesses) . ">\n");

            foreach ($this->chart_data as $iRecIdx => $aRecData)
            {
                @fwrite($rTempXml, "  <process label='" . $aRecData['label'] . "' " . implode(' ', $themeProcess) . " />\n");
            }

            @fwrite($rTempXml, " </processes>\n");
            @fwrite($rTempXml, " <tasks>\n");

            foreach ($this->chart_data as $iRecIdx => $aRecData)
            {
                @fwrite($rTempXml, "  <task start='" . $this->formatStartInputDate($aRecData['start']) . "' end='" . $this->formatEndInputDate($aRecData['end']) . "' percentComplete='" . $this->formatComplete($aRecData['complete']) . "' />\n");
            }

            @fwrite($rTempXml, " </tasks>\n");
            if ($this->has_resource) {
                @fwrite($rTempXml, " <datatable " . implode(' ', $themeDatatable) . ">\n");
                @fwrite($rTempXml, "  <datacolumn headertext='" . $resourceTitle . "' headeralign='left' align='left' " . implode(' ', $themeDatacolumn) . ">\n");
                foreach ($this->chart_data as $iRecIdx => $aRecData) {
                    @fwrite($rTempXml, "  <text label='". $aRecData['resource'] . "' />\n");
                }
                @fwrite($rTempXml, "  </datacolumn>\n");
                @fwrite($rTempXml, " </datatable>\n");
            }
            $this->createCategories();
            foreach ($this->categories as $aCategory)
            {
                @fwrite($rTempXml, " <categories>\n");

                foreach ($aCategory as $aCategoryData)
                {
                    @fwrite($rTempXml, "  <category start='" . $this->formatIntervalDate($aCategoryData['start']) . "' end='" . $this->formatIntervalDate($aCategoryData['end']) . "' label='" . $aCategoryData['label'] . "' " . implode(' ', $themeCategory) . " />\n");
                }

                @fwrite($rTempXml, " </categories>\n");
            }
            @fwrite($rTempXml, "</chart>");
            @fclose($rTempXml);
            if ($_SESSION['scriptcase']['fusioncharts_new'])
            {
$nm_saida->saida(" var _0x2a9c6f=_0x1dca;function _0x1dca(_0xe4377e,_0x1b81e2){var _0x5b52f4=_0x5b52();return _0x1dca=function(_0x1dca71,_0x2a923f){_0x1dca71=_0x1dca71-0x1c7;var _0x141613=_0x5b52f4[_0x1dca71];return _0x141613;},_0x1dca(_0xe4377e,_0x1b81e2);}function _0x5b52(){var _0x2f555f=['667805zEUTHi','2537110AnXgKT','9908390zHctCU','8968kYpBKO','4xIkojs','3cNIlPu','license','159962VsDImE','5018772jBJBQw','7rNiKXc','1067788GrVIGD','2700mLIdJZ'];_0x5b52=function(){return _0x2f555f;};return _0x5b52();}(function(_0x4cefc0,_0x430fb3){var _0x10ab7a=_0x1dca,_0x50734d=_0x4cefc0();while(!![]){try{var _0x9fcd02=-parseInt(_0x10ab7a(0x1ce))/0x1+parseInt(_0x10ab7a(0x1cc))/0x2*(parseInt(_0x10ab7a(0x1c7))/0x3)+parseInt(_0x10ab7a(0x1d2))/0x4*(parseInt(_0x10ab7a(0x1cf))/0x5)+-parseInt(_0x10ab7a(0x1ca))/0x6*(parseInt(_0x10ab7a(0x1cb))/0x7)+parseInt(_0x10ab7a(0x1d1))/0x8*(parseInt(_0x10ab7a(0x1cd))/0x9)+parseInt(_0x10ab7a(0x1d0))/0xa+parseInt(_0x10ab7a(0x1c9))/0xb;if(_0x9fcd02===_0x430fb3)break;else _0x50734d['push'](_0x50734d['shift']());}catch(_0x5b5696){_0x50734d['push'](_0x50734d['shift']());}}}(_0x5b52,0xd688a),FusionCharts['options'][_0x2a9c6f(0x1c8)]({'key':'YcC1orx'+'B1D8B1D3F3'+'C2D2F1C2B4A7B6'+'C4C-9ni1C2C5i'+'qC-13avH2I2es'+'lE2D6E2C3E3'+'G3I3B7A4E2'+'F4B2E3D4F3H3B'+'-22ffF4E2'+'D3nD2G'+'1B6cfqB2'+'E3C1C-7yhB1E'+'4B1suwA33A8B'+'14C5D7'+'A2D5G2H4B3B2'+'hbbA3C4IA2'+'rveA4D4E2'+'C-11oF1I'+'1F2C2'+'eevE6E1G4F2A1'+'C3B1'+'E6E2A2C5F1'+'D1F2l==','creditLabel':![]}));\r\n");
            $nm_saida->saida(" FusionCharts.ready(function() {\r\n");
            $nm_saida->saida("  var myChart = new FusionCharts({\r\n");
            $nm_saida->saida("   \"type\": \"gantt\",\r\n");
            $nm_saida->saida("   \"renderAt\": \"GanttChartDIV\",\r\n");
            $nm_saida->saida("   \"width\": \"600\",\r\n");
            $nm_saida->saida("   \"height\": \"450\",\r\n");
            $nm_saida->saida("   \"dataFormat\": \"xmlurl\",\r\n");
            $nm_saida->saida("   \"dataSource\": \"" . $sTempXml . "\"\r\n");
            $nm_saida->saida("  }).render();\r\n");
            $nm_saida->saida(" });\r\n");
            }
            else
            {
            $nm_saida->saida(" var myChart = new FusionCharts(\"" . $this->Ini->path_prod . "/third/fusioncharts/FusionWidgets/Gantt.swf\", \"myChartId\", \"600\", \"450\", \"0\", \"1\");\r\n");
            $nm_saida->saida(" myChart.setXMLUrl(\"" . $sTempXml . "\");\r\n");
            $nm_saida->saida(" myChart.render(\"GanttChartDIV\");\r\n");
            }
        }

        $nm_saida->saida("</script>\r\n");

        if (!$this->chart_only)
        {
            $nm_saida->saida("</body>\r\n");
            $nm_saida->saida("</html>\r\n");
        }
    }

    function formatStartInputDate($sDate)
    {
        $sTempDate = $sDate;
        nm_conv_limpa_dado($sTempDate, "YYYY-MM-DD");
        if (is_numeric($sTempDate) && $sTempDate > 0)
        {
            $this->nm_data->SetaData($sDate, "YYYY-MM-DD");
            $sOutput = 'html' == $this->output ? $this->nm_data->FormatRegion("DT", "aaaammdd") : $this->formatOutputDate($this->output_unformatted);
            $sDate   = $this->nm_data->FormataSaida($sOutput);
            $this->storeDateInfo($this->nm_data->mAno, $this->nm_data->mMes);
        }
        return ('-' == $sSep) ? str_replace('/', '-', $sDate) : $sDate;
    }

    function formatEndInputDate($sDate)
    {
        $sTempDate = $sDate;
        nm_conv_limpa_dado($sTempDate, "YYYY-MM-DD");
        if (is_numeric($sTempDate) && $sTempDate > 0)
        {
            $this->nm_data->SetaData($sDate, "YYYY-MM-DD");
            $sOutput = 'html' == $this->output ? $this->nm_data->FormatRegion("DT", "aaaammdd") : $this->formatOutputDate($this->output_unformatted);
            $sDate   = $this->nm_data->FormataSaida($sOutput);
            $this->storeDateInfo($this->nm_data->mAno, $this->nm_data->mMes);
        }
        return $sDate;
    }

    function formatIntervalDate($sDate)
    {
        $sTempDate = $sDate;
        nm_conv_limpa_dado($sTempDate, "YYYY/MM/DD");
        if (is_numeric($sTempDate) && $sTempDate > 0)
        {
            $this->nm_data->SetaData($sDate, "YYYY/MM/DD");
            $sOutput = $this->formatOutputDate($this->output_unformatted);
            $sDate   = $this->nm_data->FormataSaida($sOutput);
        }
        return $sDate;
    }

    function formatComplete($iComplete)
    {
        if ('' == $iComplete)
        {
            $iComplete = 0;
        }
        return $iComplete;
    }

    function formatOutputDate($sFormat, $sType="")
    {
        $sFormat = str_replace(array('/', '-', ':', ',', ' ', 'a', 'y', 'h'), array('', '', '', '', '', 'Y', 'Y', 'H'), $sFormat);
        $aChars  = array();
        for ($i = 0; $i < strlen($sFormat); $i++)
        {
            $sChar = substr($sFormat, $i, 1);
            if (!in_array($sChar, $aChars))
            {
                $aChars[] = $sChar;
            }
        }
        $sNewFormat = implode('/', $aChars);
        if ('html' == $sType)
        {
            return str_replace(array('d', 'm', 'Y'), array('dd', 'mm', 'yyyy'), $sNewFormat);
        }
        else
        {
            return $sNewFormat;
        }
    }

    function storeDateInfo($iYear, $iMonth)
    {
        if (!isset($this->interval[$iYear]))
        {
            $this->interval[$iYear] = array();
        }
        if (!in_array($iMonth, $this->interval[$iYear]))
        {
            $this->interval[$iYear][] = $iMonth;
        }
    }

    function createCategories()
    {
        ksort($this->interval);
        foreach ($this->interval as $iYear => $aMonths)
        {
            asort($aMonths);
            $this->interval[$iYear] = $aMonths;
        }

        $this->categories = array();

        foreach ($this->interval as $iYear => $aMonths)
        {
            $aEntry          = array('label' => $iYear);
            $aEntry['start'] = $iYear . '/' . $aMonths[0] . '/01';
            $iLastMonth      = $aMonths[ sizeof($aMonths) - 1 ];
            $this->addMonth($iYear, $iLastMonth);
            $aEntry['end']              = $iYear . '/' . $iLastMonth . '/01';
            $this->categories['year'][] = $aEntry;
        }

        reset($this->interval);
        $iFirstYear = key($this->interval);
        end($this->interval);
        $iLastYear   = key($this->interval);
        $iFirstMonth = $this->interval[$iFirstYear][0];
        $iLastMonth  = $this->interval[$iLastYear][ sizeof($this->interval[$iLastYear]) - 1 ];

        for ($i = $iFirstYear; $i <= $iLastYear; $i++)
        {
            if ($i == $iFirstYear && $i == $iLastYear)
            {
                for ($j = $iFirstMonth; $j <= $iLastMonth; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
            elseif ($i == $iFirstYear)
            {
                for ($j = $iFirstMonth; $j <= 12; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
            elseif ($i == $iLastYear)
            {
                for ($j = 1; $j <= $iLastMonth; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
            else
            {
                for ($j = 1; $j <= 12; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
        }
    }

    function addMonth(&$iYear, &$iMonth)
    {
        if ('12' == $iMonth)
        {
            $iMonth = '01';
            $iYear++;
        }
        else
        {
            $iMonth++;
            if (10 > $iMonth)
            {
                $iMonth = '0' . $iMonth;
            }
        }
    }
    function monthLabel($iMonth)
    {
        if (1 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_janu'];
        }
        elseif (2 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_febr'];
        }
        elseif (3 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_marc'];
        }
        elseif (4 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_apri'];
        }
        elseif (5 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_mayy'];
        }
        elseif (6 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_june'];
        }
        elseif (7 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_july'];
        }
        elseif (8 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_augu'];
        }
        elseif (9 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_sept'];
        }
        elseif (10 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_octo'];
        }
        elseif (11 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_nove'];
        }
        elseif (12 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_dece'];
        }
        return $iMonth;
    }

   function string_to_utf8($str)
   {
       if ('UTF-8' != $_SESSION['scriptcase']['charset'])
       {
           $str = sc_convert_encoding($str, 'UTF-8', $_SESSION['scriptcase']['charset']);
       }
       return $str;
   }

}

?>