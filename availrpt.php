<?
/**
 * Availability report
 * 
 * availrpt.php outputs a list of markers and products available 
 * based on the passed in query variable
 *
 * @author Jeremy Mason
 * @version 1.0
 */

function formatAvailabilityString ($input, $doc) {
    $url = '';
    list($program, $product, $theRest) = explode(" ", $input, 3);
    switch($program){
        case 'CSD':
        case 'Regeneron':
            if ($product == 'Vector') {
                $url = '<a href="http://www.komp.org/geneinfo.php?MGI_Number='.str_replace("MGI:","",$doc->mgiid).'">Order vector &raquo;</a><br />';
            } elseif ($product == 'ES') {
                $url = '<a href="http://www.komp.org/geneinfo.php?MGI_Number='.str_replace("MGI:","",$doc->mgiid).'">Order ES cells &raquo;</a><br />';
            } elseif ($product == 'Mice') {
                $url = '<a href="http://www.komp.org/geneinfo.php?MGI_Number='.str_replace("MGI:","",$doc->mgiid).'">Order mice &raquo;</a>';
            }
        break;
        case 'EUCOMM':
            if ($product == 'vector') {
                $url = '<a href="http://www.eummcr.org/order.php">Order vector &raquo;</a><br />';
            } elseif ($product == 'ES') {
                $url = '<a href="http://www.eummcr.org/order.php">Order ES cells &raquo;</a><br />';
            } elseif ($product == 'Mice') {
                $url = '<a href="http://www.emmanet.org/apps/springEmma/search?keyword='.$doc->symbol.'%25EUCOMM&select_by=InternationalStrainName&search=ok">Order mice &raquo;</a>';
            }
        break;
        default:
        break;
    }
    return $url;
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <title>Knockout Mouse Project (KOMP) :: Search <? print ($_GET['mgiid']) ? "Gene details for ".$_GET['mgiid'] : ''?> </title>
        <meta content="The Knockout Mouse Project (KOMP) gene details for <? print ($_GET['mgiid']) ? "results for ".$_GET['mgiid'] : ''?>" name="description">
        <script type="text/javascript">
        function PopupNominate(mgiid) {
            var w = 675;
            var h = 615;
            var winl = (w - screen.width) / 2;
            var wint = (h - screen.height) / 2;
            winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',resizable=1,scrollbars=yes'
            window.open("/nominate/"+mgiid, "", winprops)
        } 
        </script>
        <meta content="QAkkt/UQ6qLIXTN1QtrDMhLFpJiYpPkj90lkAZpL8hE=" name="verify-v1">
        <link href="/misc/favicon.ico" type="image/x-icon" rel="shortcut icon">

        <link media="all" href="http://prototype.knockoutmouse.org/modules/node/node.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/modules/system/defaults.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/modules/system/system.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/modules/system/system-menus.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/modules/user/user.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/sites/all/modules/cck/theme/content-module.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/sites/all/modules/dhtml_menu/dhtml_menu.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/sites/all/modules/cck/modules/fieldgroup/fieldgroup.css?f" type="text/css" rel="stylesheet">
        <link media="all" href="http://prototype.knockoutmouse.org/sites/all/themes/ikmc/style.css?f" type="text/css" rel="stylesheet">
        <script src="http://prototype.knockoutmouse.org/misc/jquery.js?f" type="text/javascript"></script>
        <script src="http://prototype.knockoutmouse.org/misc/drupal.js?f" type="text/javascript"></script>
        <script src="http://prototype.knockoutmouse.org/sites/all/modules/dhtml_menu/dhtml_menu.js?f" type="text/javascript"></script>
        <script type="text/javascript">
        <!--//-->//><!--
        jQuery.extend(Drupal.settings, { "basePath": "/", "dhtmlMenu": { "clone": "clone", "slide": 0, "siblings": 0, "relativity": 0, "children": 0, "doubleclick": 0 }, "ahah": { "edit-attach": { "url": "/upload/js", "event": "mousedown", "keypress": true, "wrapper": "attach-wrapper", "selector": "#edit-attach", "effect": "none", "method": "replace", "progress": { "type": "bar", "message": "Please wait..." }, "button": { "attach": "Attach" } } }, "teaserCheckbox": { "edit-teaser-js": "edit-teaser-include" }, "teaser": { "edit-teaser-js": "edit-body" }, "tableDrag": { "upload-attachments": { "upload-weight": [ { "target": "upload-weight", "source": "upload-weight", "relationship": "sibling", "action": "order", "hidden": true, "limit": 0 } ] } } });
        //--><!
        </script>
        <!--[if lte IE 7]><link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/ikmc/fix-ie.css" /><![endif]--><!--If Less Than or Equal (lte) to IE 7-->
        <script type="text/javascript">
        //
        function jscss(a,o,c1){switch(a){case'add':if(!jscss('check',o,c1)){o.className+=o.className?' '+c1:c1;}break;case'remove':var rep=o.className.match(' '+c1)?' '+c1:c1;o.className=o.className.replace(rep,'');break;case'check':return new RegExp('\\b'+c1+'\\b').test(o.className);break;}}function actsearch(){var stab=document.getElementById('stab');var sbody=document.getElementById('sbody');var btab=document.getElementById('btab');var bbody=document.getElementById('bbody');if(!jscss('check',stab,'active-tab')){jscss('remove',btab,'active-tab');jscss('add',stab,'active-tab');jscss('remove',sbody,'hide');jscss('add',bbody,'hide');}return false;}function actbrowse(){var stab=document.getElementById('stab');var sbody=document.getElementById('sbody');var btab=document.getElementById('btab');var bbody=document.getElementById('bbody');if(!jscss('check',btab,'active-tab')){jscss('remove',stab,'active-tab');jscss('add',btab,'active-tab');jscss('remove',bbody,'hide');jscss('add',sbody,'hide');}return false;}
        function _ikmctoggle(obj, elName, showtext, hidetext) { if (showtext == null){ showtext = 'show'; } else { showtext = "<img src='/static/images/plus.png' alt='Plus sign'> " + showtext; } if (hidetext == null){ hidetext = 'hide'; } else { hidetext = "<img src='/static/images/minus.png' alt='Minus sign'> " + hidetext;  } var el = document.getElementById(elName); if (el.style.display == 'block'){ el.style.display='none'; obj.innerHTML = showtext; }else{ el.style.display='block'; obj.innerHTML = hidetext; } return false; }
        //
        </script>

        <style>
        .bb { background: url(images/sb_b3.gif) 100% 50%; height:60px; color:white; }
        .bg { background: url(images/sb_g3.gif) 100% 50%; height:60px; color:white; }
        .bo { background: url(images/sb_o3.gif) 100% 50%; height:60px; color:white; }
        .br { background: url(images/sb_r3.gif) 100% 50%; height:60px; color:white; }

        .gg { background: url(images/sg_g3.gif) 100% 50%; height:60px; color: black; }
        .og { background: url(images/so_g3.gif) 100% 50%; height:60px; color: black;  }
        .rg { background: url(images/sr_g3.gif) 100% 50%; height:60px; color: white; }

        .g- { background: url(images/e_g3.gif)  100% 50%; height:60px; color: black;  }
        .b- { background: url(images/e_b3.gif)  100% 50%; height:60px; color: white;  }
        .o- { background: url(images/e_o3.gif)  100% 50%; height:60px; color: black;  }
        .r- { background: url(images/e_r3.gif)  100% 50%; height:60px; color: white;  }
        table.resulttable tr th{ border-top:solid 1px;text-align:center;}
        table.resulttable tr td {padding-left: 5px;}
        a.orderlink {background-color:green;color:white;font-weight:bold;border:solid 1px black;padding:3px; margin: 3px; margin-right:35px; display:block; text-align:center;}
        a.orderlink:hover {border:solid 1px black; background-color: green; color:black}
        </style>

    </head>
    <body>
        <!-- Layout -->
        <div id="wrapper">
            <div id="header">
                <a href="/" title="International Knockout Mouse Consortium">
                    <img src="http://prototype.knockoutmouse.org/sites/all/themes/ikmc/logo.png" alt="International Knockout Mouse Consortium" id="logo">
                </a>
                <h1 style="margin-top:47px;"><a href="/" title="International Knockout Mouse Consortium"><span id="sitename">International Knockout Mouse Consortium</span></a></h1>
                <div id="under-header" class="region">
                    <div id="block-block-4" class="block block-block">
                        <div class="content">
                            <div id="searchbrowse">
                                <div>
                                    <div class="tabs">
                                        <span id='stab' class="active-tab" onclick="actsearch();">Search</span>
                                        <span onclick="actbrowse();" id='btab'>Browse</span>
                                    </div>
                                    <div id="sbody" class="content">
                                        <a style="font-size:85%;color:#666;float:right;" href="/faq/how-can-i-search-komp-database" id="search-link" name="search-link">help</a>
                                        <b>Search</b> IKMC database<br />
                                        <form action="/query.php" name="genelist-search" method="get" id="genelist-search">
                                        <span class="small">Enter gene symbols, gene IDs or genome location</span><br />
                                        <span style="text-white-space: nowrap;"><input class="small" tabindex="1" type="text" id="criteria" name="criteria" size="26"> <input class="small" type="submit" id="submit" value="Search" tabindex="2"></span><br />
                                        <span class="small"><i>e.g., Adam19, Pax, ENSMUSG00000020681, Chr13:22210730-22311689</i></span>
                                        </form>
                                    </div>
                                </div>
                                <div id="bbody" class="content hide">
                                    <a style="font-size:85%;color:#666;float:right;" href="/faq/how-can-i-browse-komp-database">help</a>
                                    <b>Browse</b> IKMC database<br>
                                    <span class="small"><i>Use the following links to browse genes</i></span><br>
                                    <a style="margin-left:15px;" href="/query.php?symbol=A">Browse by Gene Symbol</a><br />
                                    <a style="margin-left:15px;" href="/query.php?chromosome=1">Browse by Chromosome</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div> <!-- /#header -->
            <div id="nav">
                <ul class="links primary-links">
                    <li class="menu-278 active-trail first active"><a href="/Home" class="active" title="International Knockout Mouse Consortium2">Home</a></li>
                    <li class="menu-229"><a href="/about" title="About IKMC">About IKMC</a></li>
                    <li class="menu-163"><a href="/download" title="">Download</a></li>
                    <li class="menu-276"><a href="/mart" title="The IKMC Biomart">Biomart</a></li>
                    <li class="menu-172"><a href="/nominate" title="Nominate gene">Nominate gene</a></li>
                    <li class="menu-161"><a href="/faq" title="FAQ">FAQ</a></li>
                    <li class="menu-270"><a href="/content/order-products" title="Order Products">Order Products</a></li>
                    <li class="menu-164 last"><a href="/contact" title="">Contact IKMC</a></li>
                </ul>
            </div> <!-- /#nav -->
        <div id="container">
            <div id="center">
                <div>
                    <div width="100%" style="margin-top:5px;text-align: left;" align="left">


<?

require_once( 'Apache/Solr/Service.php' );

$solr = new Apache_Solr_Service( 'prototype.knockoutmouse.org', '80', '/' );

$offset = ($_GET['offset']) ? $_GET['offset'] : 0;
$limit = ($_GET['limit']) ? $_GET['limit'] : 200;

if ($_GET['page']){
    $offset = $_GET['page'] * $limit - $limit;
}

//Query the service with the values and print the results in a table
$responses = array();
if($_GET['report']) {
    // Normal search string
    $report = trim($_GET['report']);
    $reporttype='vector';
    $reporttypedisplay='Vectors';
    $reportprogram='csd';
    $query = 'available_product:[* TO *]';
    
    switch($report) {
        case 'all':
            $reportname='All available products';
            $reportprogram='all';
            $reporttypedisplay='Vectors, ES cells, mice';
            $query = 'available_product:[* TO *] OR tigm:[* TO *]';
        break;
        case 'allcsd':
            $reportname='All available products produced by KOMP-CSD';
            $reporttype='all';
            $reporttypedisplay='Vectors, ES cells, mice';
            $reportprogram='all';
            $query = 'available_product:"CSD"';
        break;
        case 'allregeneron':
            $reportname='All available products produced by KOMP-Regeneron';
            $reporttype='all';
            $reporttypedisplay='Vectors, ES cells, mice';
            $reportprogram='all';
            $query = 'available_product:"Regeneron"';
        break;
        case 'alleucomm':
            $reportname='All available products produced by EUCOMM';
            $reporttype='all';
            $reporttypedisplay='Vectors, ES cells, mice';
            $reportprogram='all';
            $query = 'available_product:"EUCOMM"';
        break;
        case 'allnorcomm':
            $reportname='All available products produced by NorCOMM';
            $reporttype='all';
            $reporttypedisplay='Vectors, ES cells, mice';
            $reportprogram='all';
            $query = 'available_product:"NorCOMM"';
        break;
        case 'allvectors':
            $reportname='All available IKMC vectors';
            $reporttype='vector';
            $reporttypedisplay='Vectors';
            $reportprogram='all';
            $query = 'available_product:"vector available"';
        break;
        case 'csdvectors':
            $reportname='Available vectors produced by KOMP-CSD';
            $reporttype='vector';
            $reporttypedisplay='Vectors';
            $reportprogram='csd';
            $query = 'available_product:"CSD vector available"';
        break;
        case 'regeneronvectors':
            $reportname='Available vectors produced by KOMP-Regeneron';
            $reporttype='vector';
            $reporttypedisplay='Vectors';
            $reportprogram='regeneron';
            $query = 'available_product:"Regeneron vector available"';
        break;
        case 'eucommvectors':
            $reportname='Available vectors produced by EUCOMM';
            $reporttype='vector';
            $reporttypedisplay='Vectors';
            $reportprogram='eucomm';
            $query = 'available_product:"EUCOMM vector available"';
        break;
        case 'norcommvectors':
            $reportname='Available vectors produced by NorCOMM';
            $reporttype='vector';
            $reporttypedisplay='Vectors';
            $reportprogram='norcomm';
            $query = 'available_product:"NorCOMM vector available"';
        break;
        case 'allescells':
            $reportname='All available IKMC ES Cells';
            $reporttype='es cell';
            $reporttypedisplay='ES cells';
            $reportprogram='all';
            $query = 'available_product:"es cell available" OR tigm:[* TO *]';
        break;
        case 'csdescells':
            $reportname='Available ES cells produced by KOMP-CSD';
            $reporttype='es cell';
            $reporttypedisplay='ES cells';
            $reportprogram='csd';
            $query = 'available_product:"CSD es cell available"';
        break;
        case 'regeneronescells':
            $reportname='Available ES cells produced by KOMP-Regeneron';
            $reporttype='es cell';
            $reporttypedisplay='ES cells';
            $reportprogram='regeneron';
            $query = 'available_product:"Regeneron es cell available"';
        break;
        case 'eucommescells':
            $reportname='Available ES cells produced by EUCOMM';
            $reporttype='es cell';
            $reporttypedisplay='ES cells';
            $reportprogram='eucomm';
            $query = 'available_product:"EUCOMM es cell available"';
        break;
        case 'norcommescells':
            $reportname='Available ES cells produced by NorCOMM';
            $reporttype='es cell';
            $reporttypedisplay='ES cells';
            $reportprogram='norcomm';
            $query = 'available_product:"NorCOMM es cell available"';
        break;
        case 'tigmescells':
            $reportname='Available gene traps produced by TIGM';
            $reporttype='es cell';
            $reporttypedisplay='ES cells';
            $reportprogram='tigm';
            $query = 'tigm:[* TO *]';
        break;
        case 'allmouse':
            $reportname='All available IKMC mice';
            $reporttype='mouse';
            $reporttypedisplay='Mice';
            $reportprogram='all';
            $query = 'available_product:"mouse available"';
        break;
        case 'csdmouse':
            $reportname='Available mice produced by KOMP-CSD';
            $reporttype='mouse';
            $reporttypedisplay='Mice';
            $reportprogram='csd';
            $query = 'available_product:"CSD mouse available"';
        break;
        case 'regeneronmouse':
            $reportname='Available mice produced by KOMP-Regeneron';
            $reporttype='mouse';
            $reporttypedisplay='Mice';
            $reportprogram='regeneron';
            $query = 'available_product:"Regeneron mouse available"';
        break;
        case 'eucommmouse':
            $reportname='Available mice produced by EUCOMM';
            $reporttype='mouse';
            $reporttypedisplay='Mice';
            $reportprogram='eucomm';
            $query = 'available_product:"EUCOMM mouse available"';
        break;
        case 'norcommmouse':
            $reportname='Available mice produced by NorCOMM';
            $reporttype='mouse';
            $reporttypedisplay='Mice';
            $reportprogram='norcomm';
            $query = 'available_product:"NorCOMM mouse available"';
        break;
        default:
            $reportname='Report not found';
            $reportprogram='notfound';
            $reporttypedisplay='Vectors, ES cells, mice';
            $query = 'available_product:nothing';
        break;
    }

    $response = $solr->search( $query, $offset, $limit, array('sort' => 'symbol asc'));

// ------------------------------------
// Uncomment to sort by relevancy score
//    $response = $solr->search( $query, $offset, $limit, array( 'fl'=>'*,score', 'indent'=>'on', 'debugQuery'=>'on'));
// ------------------------------------
} else {
    // nothing was searched for.... just return all available products
    $query="available_product:[* TO *]";
    $reportname='All available products';
    $response = $solr->search( $query, $offset, $limit, array('sort' => 'symbol asc'));
}
?>

<? if ($reportprogram=='notfound') : ?>
<h1 style="text-align:center;"><?= $reportname ?></h1>
<? endif; ?>


<?
if ( $response && $response->getHttpStatus() == 200 ) { 
    if ( $response->response->numFound > 0 ) {
        echo  "<!-- $query -->\n\n";
        $results_summary = "Genes: <b>".($response->response->start+1)."</b> - <b>";
        $results_summary .= ($response->response->start + $limit > $response->response->numFound) ? $response->response->numFound : ($response->response->start + $limit);
        $results_summary .=  "</b> of <b>".$response->response->numFound;
        $results_summary .=  "</b>";
        $results_summary .=  "<br />\n\n";

        $results_navigation = '';
        if ($response->response->numFound > $limit) {
            $action_name = "report";
            $action_value = "$report";
            $action = "$action_name=$report";
            $results_navigation = '<div class="item-list">'."\n";
            $results_navigation .= '<ul style="text-align:left;" class="pager">'."\n";
            if ($offset != 0) {
                $results_navigation .= '<li class="pager" title="Go to first page"><a href="availrpt.php?'.$action.'&page=1">&lt;&lt; First</a></li>'."\n";
                $results_navigation .= '<li class="pager" title="Go to previous page"><a href="availrpt.php?'.$action.'&page='. floor(($offset+$limit-1)/$limit) .'">&lt; Previous</a></li>'."\n";
            }
            $results_navigation .= '<li class="pager-item">'."\n";
            $results_navigation .= '<span style="font-size:14px;font-weight:bold;">'."\n";
            $results_navigation .= 'Page: <form action="availrpt.php?'.$action.'" style="display:inline;">';
            $results_navigation .= '<input type="hidden" name="'.$action_name.'" value="'.$action_value.'">';
            $results_navigation .= '<input style="display:inline;font-size:0.9em;padding:0px;margin:0;" type="text" name="page" value="'.ceil(($offset+1)/$limit).'" size="3">';
            $results_navigation .=  '</form> of '.ceil($response->response->numFound/$limit).'</span></li>'."\n";
            if(($offset + $limit) < $response->response->numFound) {
                $results_navigation .= '<li class="pager-next" title="Go to next page"><a href="availrpt.php?'.$action.'&page='.ceil(($offset+$limit+1)/$limit) .'">Next ></a></li>'."\n";
                $results_navigation .= '<li class="pager-last last" title="Go to last page"><a href="availrpt.php?'.$action.'&page='.ceil($response->response->numFound/$limit).'">Last >></a></li>'."\n";
            }
            $results_navigation .= '</ul>';
            $results_navigation .= '</div>';
        }
?>


<?=$results_navigation?>

<span style="font-weight: .7em"><?=$results_summary ?></span>

<h1><?= $reportname ?></h1>
<table style="width:500px" class="resulttable" id="original">
    <thead>
    <tr>
        <th align="center">Gene</th>
        <th colspan="2" align="center"><?=($reporttype == 'all') ? "Vectors, ES cells, mice" : $reporttypedisplay ?></th>
    </tr>
    </thead>
    <tbody>
<?
        foreach ( $response->response->docs as $doc ):
            $products = array();
            $products['vectors'] = array();
            $products['escells'] = array();
            $products['mice'] = array();
            $prods = array();
            if($doc->available_product_display) {
                $prods = is_array($doc->available_product_display) ? $doc->available_product_display : array($doc->available_product_display);
            }
            $tigms = is_array($doc->tigm) ? $doc->tigm : array($doc->tigm);
            if (($report == 'allescells' || $report == 'tigmescells') && $tigms){
                foreach($tigms as $tigm) {
                    $prods[] = "$tigm||TIGM||es cell available";
                }                
            }

            // UNCOMMENT to show the SOLR response
            //print "<!--\n"; print_r($doc); print "\n-->\n";

            $newprods=array();
            foreach($prods as $prod){
                list($pid, $pipeline, $product) = explode("||", $prod);
                if(!stristr($pipeline, $reportprogram) && !stristr($report, "all")){continue;}
                if($reporttype != 'all' && !stristr($product, $reporttype)){continue;}
                if(!$pid){continue;}
                $newprods[] = $prod;
            }
            $prods = $newprods;

            $previousgene = '';
            foreach($prods as $prod){
                list($pid, $pipeline, $product) = explode("||", $prod);
                $product = str_replace(" available", "", $product);
                $product = (stristr($product, "ES Cell")) ? "ES cell" : strtolower($product);
                if($pipeline=='EUCOMM') { $pid='N/A'; }
                $rowspan=count($prods);
                if($previousgene != $doc->mgiid) {
                    $previousgene=$doc->mgiid;
                    $printgene=TRUE;
                    $bgcolor = ($bgcolor == '#ffffff') ? '#efefef' : '#ffffff';
                }
?>
    <tr bgcolor="<?= $bgcolor ?>">
        <? if($printgene) : $printgene=FALSE;?>
        <td nowrap="nowrap" rowspan="<?=$rowspan?>"><a href="http://www.informatics.jax.org/searches/accession_report.cgi?id=<?=$doc->mgiid?>"><?= $doc->symbol ?></a></td>
        <? /*<td nowrap="nowrap" style="border-left:none;" rowspan="<?=$rowspan?>"><a href="details.php?mgiid=<?=$doc->mgiid?>">IKMC status</a></td>*/ ?>
        <? endif; ?>
        <? if ($pipeline == "KOMP-CSD") : ?>
        <td nowrap="nowrap"><a target="_blank" href="http://www.sanger.ac.uk/htgt/report/gene_report?project_id=<?= $pid ?>"><?= $pipeline ?> design: <?= $pid ?> &raquo;</a></td>
        <? elseif ($pipeline == "KOMP-Regeneron") : ?>
        <td nowrap="nowrap"><a target="_blank" href="http://www.velocigene.com/komp/detail/<?= str_replace("VG","",$pid) ?>"><?= $pipeline ?> design: <?= $pid ?> &raquo;</a></td>
        <? elseif($pipeline == "EUCOMM") : ?>
        <td nowrap="nowrap"><a target="_blank" href="http://www.sanger.ac.uk/htgt/report/gene_report?mgi_accession_id=<?=$doc->mgiid?>"><?= $pipeline ?> design &raquo;</a></td>
        <? elseif($pipeline == "TIGM") : ?>
        <td nowrap="nowrap"><a target="_blank" href="http://www.ncbi.nlm.nih.gov/entrez/query.fcgi?cmd=Search&db=nucgss&doptcmdl=GenBank&term=%22<?= $pid ?>%22"><?= $pipeline ?> ID: <?= $pid ?> &raquo;</a></td>
        <? endif; ?>
        <? if ($pipeline == "KOMP-CSD" || $pipeline == "KOMP-Regeneron") : ?>
        <td nowrap="nowrap" style="border-left:none;"><a target="_blank" class="orderlink" href="http://www.komp.org/geneinfo.php?MGI_Number=<?=str_replace("MGI:","",$doc->mgiid)?>">Order <?=$product?> &raquo;</a></td>
        <? elseif($pipeline == "EUCOMM" && $product =='vector') : ?>
        <td nowrap="nowrap" style="border-left:none;"><a target="_blank" class="orderlink" href="mailto:eucomm.distributor@helmholtz-muenchen.de?subject=Order%20request:%20targeting%20vectors%20for%20<?=$doc->symbol?>">Order <?=$product?> &raquo;</a></td>
        <? elseif($pipeline == "EUCOMM" && $product =='ES cell') : ?>
        <td nowrap="nowrap" style="border-left:none;"><a target="_blank" class="orderlink" href="mailto:eucomm.distributor@helmholtz-muenchen.de?subject=Order%20request:%20escells%20for%20<?=$doc->symbol?>">Order <?=$product?> &raquo;</a></td>
        <? elseif($pipeline == "EUCOMM" && $product =='mouse') : ?>
        <td nowrap="nowrap" style="border-left:none;"><a target="_blank" class="orderlink" href="http://www.emmanet.org/apps/springEmma/search?keyword=<?=$doc->symbol?>%25EUCOMM&select_by=InternationalStrainName&search=ok">Order <?=$product?> &raquo;</a></td>
        <? elseif($pipeline == "TIGM") : ?>
        <td nowrap="nowrap" style="border-left:none;"><a target="_blank" class="orderlink" href="http://www.tigm.org/cgi-bin/tigminfo.cgi?survey=IKMC%20Website&mgi1=<?=$doc->mgiid?>&gene1=<?=$doc->symbol?>&comments1=<?=$pid?>">Order <?=$product?> &raquo;</a></td>
        <? endif; ?>
    </tr>
    <?}?>
<?endforeach;?>
<?
    }
}
?>
            </tbody>
        </table>
        <?=$results_navigation?>
    </div>
        <div>
        <div width="100%" style="margin-top:5px;text-align: left;" align="left">
        <span style="font-weight: .7em"><?=$results_summary ?></span>
        </div>
        <br clear="both">

    </div>
            </div> <!-- /#center -->
            <div id="footer" class="clear">
              <a href="/disclaimer">Warranty Disclaimer and Copyright Notice</a><br>
              This site is maintained by the I-DCC and the KOMP-DCC.<br>
              Supported by the European Union and the National Institutes of Health.
            </div> <!-- /#footer -->
          </div> <!-- /#container -->
          <span class="clear"></span>

        </div> <!-- /#wrapper -->
    <!-- /layout -->
    <script type="text/javascript">
        //
        if (navigator.userAgent.indexOf("Safari") > 0)
        {
        	// Fix safari "label click/toggle checkbox" issue
            var labels = document.getElementsByTagName("label");
            for (i = 0; i < labels.length; i++)
            {
                labels[i].addEventListener("click", addLabelFocus, false);
            }

            // Fix Safari "back button re-execute onload" issue
    	    var jj=onload;
    		if(jj){
    			if(onunload==null){
    				document.body.setAttribute('onunload',jj);
    			}
    		}
            $('search-link').style.marginRight="10px";
    	}
        //
        </script>
    <script type="text/javascript">
    		    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    		    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    		    </script>
    		    <script type="text/javascript">
    		    var pageTracker = _gat._getTracker("UA-6140792-1");
    		    pageTracker._trackPageview();
    		    </script>
</body>
</html>
