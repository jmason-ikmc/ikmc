<?
/**
 * Search results
 * 
 * query.php outputs a list of markers based on the passed in query variable
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
                $url = '<a target="_blank" class="orderlink" href="http://www.eummcr.org/order.php">Order mice &raquo;</a>';
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
        table.resulttable tr th{ border:none; border-top:solid 1px; border-left: solid 1px;}

        a.orderlink {color:white;font-weight:bold;border:solid 1px;padding:3px; margin: 3px; margin-right:35px; display:block; text-align:center;}
        a.orderlink:hover {border:solid 1px white; background-color: green;}
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

<!--
<a href="query.php?list=Target">all genes on Target list</a><br />
<a href="query.php?list=Master">all genes on Master list</a><br />
-->
<?

require_once( 'Apache/Solr/Service.php' );

$solr = new Apache_Solr_Service( 'rohan.informatics.jax.org', '8983', '/solr' );

$offset = ($_GET['offset']) ? $_GET['offset'] : 0;
$limit = ($_GET['limit']) ? $_GET['limit'] : 50;

if ($_GET['page']){
    $offset = $_GET['page'] * $limit - $limit;
}

//Query the service with the values and print the results in a table
$responses = array();
if($_GET['list']) {
    // default query is all genes on all lists
    $query = "KOMP_list:Visible OR KOMP_list:Master OR KOMP_list:Target OR KOMP_list:High Prority";        
    if ($_GET['list'] == "Target") {
        // all genes on the target list
        $query = "KOMP_list:Target OR KOMP_list:High Prority";
    } else if ($_GET['list'] == "Master") {
        // all genes on the master list
        $query = "KOMP_list:Master OR KOMP_list:Target OR KOMP_list:High Prority";
    }
    $response = $solr->search($query, $offset, $limit, array('sort' => 'symbol asc', 'hl'=>'true', 'hl.fl=symbol,synonym'));
} else if($_GET['chromosome']) {
    // seaching for all genes on a chromosome
    $query = "chromosome: ". $_GET['chromosome'];
    $response = $solr->search($query, $offset, $limit, array('sort' => 'start asc'));
} else if($_GET['symbol']) { 
    // searching by the first letter of the symbol
    $symbol = strtolower($_GET['symbol']);
    $symbol .= (strstr($symbol, "*")) ? "" : "*";
    $query = "symbol: $symbol";
    if ($_GET['symbol'] == '0-9') {
        $query = "symbol: (0* OR 1* OR 2* OR 3* OR 4* OR 5* OR 6* OR 7* OR 8* OR 9*)";
    }
    $response = $solr->search($query, $offset, $limit, array('sort' => 'symbol asc'));
} else if($_GET['criteria']) {
    // Normal search string
    $_GET['criteria'] = trim($_GET['criteria']);

    if (! strpos($_GET['criteria'], '"')){
        $terms = explode(" ", trim($_GET['criteria']));
        $terms = preg_split ("/[\s+,]/", trim($_GET['criteria']));
        $terms = array_filter(array_unique($terms));
    } else {
        $out=array();
        preg_match_all('|"(.*)"|U', stripslashes($_GET['criteria']), $out, PREG_PATTERN_ORDER);
        $terms = $out[1];
    }

    $revtermar = array();
    $termar = array();
    foreach ($terms as $term) {
        // If the search term stars with a wildcard
        // do the reverse string lookup trick
        // otherwise just search the symbol
        if (strpos($term, "*") === 0) {
            echo "Hit a reverse string search<br>";
            $revterm = "reversesymbol:".strrev(str_replace(":", "\\:", urldecode($term)));
            array_push($termar, $revterm);
        } else if (strpos(strtolower($term), "mgi:") === 0) {
            // MGI ID query
            array_push($termar, "mgiid:".trim(str_replace(":", "\\:", urldecode($term))));
        } else if (preg_match("/chr.+:/", strtolower($term))) {
            // Genome location query
            list($chromosome, $coords) = explode(":",$term);
            $chromosome = str_replace(array("chr", ":"), "", strtolower($chromosome));
            list($start, $end) = explode("-", $coords);
            array_push($termar, "(chromosome:$chromosome AND start:[$start *] AND end:[* $end])");
        } else if (strpos(strtolower($term), "ensmusg") === 0) {
            // Ensembl ID query
            array_push($termar, "ensembl_id:".$term);
        } else {
            // Symbol query is the default
            if (!strstr($term, "*")) {
                // No wildcards in the search term.  Add one to the end
                array_push($termar, "symbol:".strtolower(trim(str_replace(":", "\\:", urldecode($term."*"))))."");
            } else {
                // The user included a wildcard.  Just add their term.
                array_push($termar, "symbol:".strtolower(trim(str_replace(":", "\\:", urldecode($term))))."");
            }
            //array_push($termar, "omim_search:".trim(str_replace(":", "\\:", urldecode($term)))."");
            array_push($termar, "name:".trim(str_replace(":", "\\:", str_replace("*", "", urldecode($term))))."");
            array_push($termar, "synonym:".trim(str_replace(":", "\\:", str_replace("*", "", urldecode($term."*")))));
        }
    }

    $query = implode(" OR ", $termar);
    $response = $solr->search( $query, $offset, $limit, array(
        'sort' => 'symbol asc', 
        'hl'=>'on', 
        'hl.fl'=>'symbol,symbol_display,synonym,name', 
        'hl.requireFieldMatch'=>'true', 
        'hl.usePhraseHighlighter' =>'true',
        'hl.simple.pre'=>'<b>',
        'hl.simple.post'=>'</b>'));
    $highlights = $response->highlighting;

//    print "<!--\n $query \n -->\n";
//    print_r($highlights);

// ------------------------------------
// Uncomment to sort by relevancy score
//    $response = $solr->search( $query, $offset, $limit, array( 'fl'=>'*,score', 'indent'=>'on', 'debugQuery'=>'on'));
// ------------------------------------
} else {
    // nothing was searched for.... just return all the genes
    $query="mgiid:[* TO *]";
    $response = $solr->search( $query, $offset, $limit, array('sort' => 'symbol asc'));
}

if ( $response && $response->getHttpStatus() == 200 ) { 
    if ( $response->response->numFound > 0 ) {
        echo  "<!-- $query -->\n\n";
        $results_summary = "Results: <b>".($response->response->start+1)."</b> - <b>";
        $results_summary .= ($response->response->start + $limit > $response->response->numFound) ? $response->response->numFound : ($response->response->start + $limit);
        $results_summary .=  "</b> of <b>".$response->response->numFound ."</b>";
        if ($_GET['criteria']) {
            if (! strpos($_GET['criteria'], '"')){
                $terms = explode(" ", $_GET['criteria']);
            } else {
                $out=array();
                preg_match_all('|"(.*)"|U', stripslashes($_GET['criteria']), $out, PREG_PATTERN_ORDER);
                $terms = $out[1];
            }
            $results_summary .=  " for <i><b>".trim($_GET['criteria'])."</b></i>";
        }
        $results_summary .=  "<br />\n\n";
?>
<? if($_GET['chromosome']) : ?>
<div class="browse-nav">
	<h2>Browse genes by chromosome:</h2>
    <div class="item-list">

        <ul style="text-align:left;" class="pager">
        <li>
            <a style="margin: 1px" href="/query.php?chromosome=1">1</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=2">2</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=3">3</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=4">4</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=5">5</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=6">6</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=7">7</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=8">8</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=9">9</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=10">10</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=11">11</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=12">12</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=13">13</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=14">14</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=15">15</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=16">16</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=17">17</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=18">18</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=19">19</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=X">X</a></li><li>
            <a style="margin: 1px" href="/query.php?chromosome=Y">Y</a></li>
        </ul>
    </div>
</div>

<div class="browse-nav">
	<h2>Genes on chromosome <?= $_GET['chromosome']?>:</h2>
</div>

<? endif; ?>

<? if($_GET['symbol']) : ?>
<div>
    <div class="browse-nav">
        <h2>Browse genes by the first letter/number of the symbol:</h2>
        <div class="item-list">

            <ul style="text-align:left;" class="pager">
            <li><a style="margin: 1px" href="/query.php?symbol=A">A</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=B">B</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=C">C</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=D">D</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=E">E</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=F">F</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=G">G</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=H">H</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=I">I</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=J">J</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=K">K</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=L">L</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=M">M</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=N">N</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=O">O</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=P">P</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=Q">Q</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=R">R</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=S">S</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=T">T</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=U">U</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=V">V</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=W">W</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=X">X</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=Y">Y</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=Z">Z</a></li>
            <li><a style="margin: 1px" href="/query.php?symbol=0-9">0-9</a></li>

            </ul>
        </div>
    </div>
    <div class="browse-nav">
        <h2>Gene symbols that start with "<?=str_replace("*","",$_GET['symbol'])?>":</h2>
    </div>
<? endif; ?>

<? 
$results_navigation = '';
if ($response->response->numFound > $limit) {
$action = "";
if ($_GET['chromosome']) {
    $action_value = $_GET['chromosome'];
    $action_name = 'chromosome';
} else if ($_GET['symbol']) {
    $action_name = 'symbol';
    $action_value = htmlspecialchars($_GET['symbol']);
} else if ($_GET['criteria']) {
    $action_name = 'criteria';
    $action_value = htmlspecialchars($_GET['criteria']);
} else if ($_GET['list']) {
    $action_name = 'list';
    $action_value = $_GET['list'];
}
$action = "$action_name=$action_value";

$results_navigation = '<div class="item-list">'."\n";
$results_navigation .= '<ul style="text-align:left;" class="pager">'."\n";
if($offset != 0):
$results_navigation .= '<li class="pager" title="Go to first page"><a href="/query.php?'.$action.'&page=1">&lt;&lt; First</a></li>'."\n";
$results_navigation .= '<li class="pager" title="Go to previous page"><a href="/query.php?'.$action.'&page='. floor(($offset+$limit-1)/$limit) .'">&lt; Previous</a></li>'."\n";
endif;
$results_navigation .= '<li class="pager-item">'."\n";
$results_navigation .= '<span style="font-size:14px;font-weight:bold;">'."\n";
$results_navigation .= 'Page: <form action="/query.php?'.$action.'" style="display:inline;">';
$results_navigation .= '<input type="hidden" name="'.$action_name.'" value="'.$action_value.'">';
$results_navigation .= '<input style="display:inline;font-size:0.9em;padding:0px;margin:0;" type="text" name="page" value="'.ceil(($offset+1)/$limit).'" size="3">';
$results_navigation .=  '</form> of '.ceil($response->response->numFound/$limit).'</span></li>'."\n";
if(($offset + $limit) < $response->response->numFound):
$results_navigation .= '<li class="pager-next" title="Go to next page"><a href="/query.php?'.$action.'&page='.ceil(($offset+$limit+1)/$limit) .'">Next ></a></li>'."\n";
$results_navigation .= '<li class="pager-last last" title="Go to last page"><a href="/query.php?'.$action.'&page='.ceil($response->response->numFound/$limit).'">Last >></a></li>'."\n";
endif;
$results_navigation .= '</ul>';
$results_navigation .= '</div>';
}
?>

<?=$results_navigation?>

<span style="font-weight: .7em"><?=$results_summary ?></span>
<table width="800px" class="resulttable" id="original">
    <thead>
    <tr>
        <th style="text-align:center;" rowspan="2" valign="middle">
        Gene <img src="/static/images/help.png" onmouseover="document.getElementById('gene-help').style.display='block';" onmouseout="document.getElementById('gene-help').style.display='none';">

        <div class="rel">
        <div id="gene-help">
            Gene symbol, genome location, and links to major genome browsers.  "Show Other Ids" toggles a display of gene identifiers in various databases.
        </div>
        </div>
        </th>
        <th colspan="4" style="text-align:center;" valign="top">
        IKMC Knockout Attempts <img src="/static/images/help.png" onmouseover="document.getElementById('status-help').style.display='block';" onmouseout="document.getElementById('status-help').style.display='none';">
        <div class="rel">

        <div id="status-help">
            Status of the gene in knockout project pipelines: KOMP-CSD, KOMP-Regeneron, EUCOMM, NorCOMM.  "Details" link displays all knockout attempts and links to Vector/Allele designs. "Order" link leads to the appropriate repository web site.
        </div>
        </div>
        </th>
        <th style="text-align:center;" rowspan="2">
        Other Resources <img src="/static/images/help.png" onmouseover="document.getElementById('gene-other').style.display='block';" onmouseout="document.getElementById('gene-other').style.display='none';">
        <div class="rel">
        <div class="right" id="gene-other">

            Links to the International Mouse Strain Resource (IMSR) or the International Gene Trap Consortium (IGTC) when mutant ES cells and mice are available for this gene. Links to MGI when targeted mutations or other types of mutations are known for this gene.
        </div>
        </div>
        </th>
    </tr>
    <tr>
        <th width="20%" style="text-align:center;">Project</th>
        <th width="60%" style="text-align:center;" colspan="2">Status</th>

        <th width="20%" style="text-align:center;">Availability</th>
    </tr>
    </thead>
    <tbody>
<?
        foreach ( $response->response->docs as $doc ):
            $programs = array();
            if($doc->CSD_current){ array_push($programs, array("name"=>"KOMP-CSD", "value"=>$doc->CSD_current));}
            if($doc->Regeneron_current){ array_push($programs, array("name"=>"KOMP-Regeneron", "value"=>$doc->Regeneron_current));}
            if($doc->EUCOMM_current){ array_push($programs, array("name"=>"EUCOMM", "value"=>$doc->EUCOMM_current));}
            if($doc->NorCOMM_current){ array_push($programs, array("name"=>"NorCOMM", "value"=>$doc->NorCOMM_current));}
            if($doc->tigm){ array_push($programs, array("name"=>"TIGM", "value"=>count($doc->tigm)." Gene trap".((count($doc->tigm) == 1) ? '' : 's')." available"));}
            $rowspan = count($programs);
?>
<!-- 
<?php
//print_r($doc);
?>
-->
    <tr bgcolor="<?= $bgcolor = ($bgcolor == '#ffffff') ? '#efefef' : '#ffffff' ?>">
        <td <? if($rowspan>1) {echo "rowspan='$rowspan'";} ?>>
            <h3><a style="text-decoration:none;" 
            href="http://www.informatics.jax.org/searches/accession_report.cgi?id=<?= $doc->mgiid ?>" 
            class="unclicked" 
            target="_blank"><?= $doc->symbol ?></a></h3>

            <? if ($_GET['criteria']) : ?>
                <? $id=$doc->mgiid; ?>
                <? if (property_exists($highlights->$id, 'symbol_display')) : ?>
                <div>
                Symbol: <?php print_r($highlights->$id->symbol_display[0]) ?>
                </div>
                <? elseif (property_exists($highlights->$id, 'name')) : ?>
                <div>
                Name: <?php print_r($highlights->$id->name[0]) ?>
                </div>
                <? elseif (property_exists($highlights->$id, 'synonym')) : ?>
                <div>
                Synonym: <?php print_r($highlights->$id->synonym[0]) ?>
                </div>
                <? endif; ?>
            <? endif; ?>

            <div class="smaller">
            <table class="featureless">
            <tr>
            <td nowrap="nowrap">
                Chr<?= $doc->chromosome ?><? if ($doc->start && $doc->end): ?><span>:<?= $doc->start ?>-<?= $doc->end ?>(<?= $doc->strand ?>)<? endif; ?>
            </td>
            <? if ($doc->start && $doc->end): ?>
            <td nowrap="nowrap">
            (<a href="http://gbrowse.informatics.jax.org/cgi-bin/gbrowse/mouse_current/?start=<?= $doc->start ?>;stop=<?= $doc->end ?>;ref=<?= $doc->chromosome ?>" target="_blank">MGI</a>,<a href="http://genome.ucsc.edu/cgi-bin/hgTracks?db=mm9&amp;position=chr<?= $doc->chromosome ?>%3A<?= $doc->start ?>-<?= $doc->end ?>" target="_blank">UCSC</a>,<a href="http://www.ensembl.org/Mus_musculus/contigview?l=<?= $doc->chromosome ?>:<?= $doc->start ?>-<?= $doc->end ?>" target="_blank">Ensembl</a>)
            </td>
            <? endif; ?>
            </tr>
            </table>
            </div>

            <div style="margin-left:2px" id="show-<?= $doc->mgiid?>" onclick="document.getElementById('hide-<?= $doc->mgiid?>').style.display='block';document.getElementById('show-<?= $doc->mgiid?>').style.display='none';return false;">
                <a href="#" class="unclicked smallplus smaller">Show Other Ids</a>
            </div>
            <div style="margin-left:2px;" class="smaller hidden" id="hide-<?= $doc->mgiid?>">
            <div onclick="document.getElementById('show-<?= $doc->mgiid?>').style.display='block';document.getElementById('hide-<?= $doc->mgiid?>').style.display='none';return false;">
                <a href="#" class="unclicked smallminus">Hide Other Ids</a>
            </div>
                <table class="featureless">
                    <tr>
                        <td nowrap valign="top">Current Name:</td>
                        <td><?= is_array($doc->name) ? $doc->name[0] : $doc->name ?></td>
                    </tr>
                    <tr>
                        <td valign="top">MGI ID:</td>
                        <td>
                            <a href="http://www.informatics.jax.org/searches/accession_report.cgi?id=<?= $doc->mgiid ?>" target="_blank"><?= $doc->mgiid ?></a> <br>
                        </td>
                    </tr>
                    <? if ($doc->ensembl_id) : ?>
                    <? $ids = is_array($doc->ensembl_id) ? array_unique($doc->ensembl_id) : array($doc->ensembl_id); ?>
                    <tr>
                        <td valign="top">Ensembl ID:</td>
                        <td>
                            <? foreach( $ids as $id ): ?>
                            <a href="http://www.ensembl.org/Mus_musculus/geneview?gene=<?= $id ?>" target="_blank"><?= $id ?></a> <br/>
                            <? endforeach; ?>
                        </td>
                    </tr>
                    <? endif; ?>
                    <? if ($doc->vega_id) : ?>
                    <? $ids = is_array($doc->vega_id) ? array_unique($doc->vega_id) : array($doc->vega_id); ?>
                    <tr>
                        <td valign="top">Vega ID:</td>
                        <td>
                            <? foreach( $ids as $id ): ?>
                            <a href="http://vega.sanger.ac.uk/Mus_musculus/geneview?gene=<?= $id ?>&amp;db=core" target="_blank"><?= $id ?></a> <br/>
                            <? endforeach; ?>
                        </td>
                    </tr>
                    <? endif; ?>
                    <? if ($doc->ncbi_id) : ?>
                    <? $ids = is_array($doc->ncbi_id) ? array_unique($doc->ncbi_id) : array($doc->ncbi_id); ?>
                    <tr>
                        <td valign="top">NCBI ID:</td>
                        <td>
                            <? foreach( $ids as $id ): ?>
                            <a href="http://www.ncbi.nlm.nih.gov/entrez/query.fcgi?db=gene&amp;cmd=Retrieve&amp;dopt=Graphics&amp;list_uids=<?= $id ?>" target="_blank"><?= $id ?></a> <br/>
                            <? endforeach; ?>
                        </td>
                    </tr>
                    <? endif; ?>
                    <? if ($doc->ccds_id) : ?>
                    <? $ids = is_array($doc->ccds_id) ? array_unique($doc->ccds_id) : array($doc->ccds_id); ?>
                    <tr>
                        <td valign="top">CCDS ID:</td>
                        <td>
                            <? foreach( $ids as $id ): ?>
                            <a href="http://www.ncbi.nlm.nih.gov/CCDS/CcdsBrowse.cgi?REQUEST=CCDS&amp;DATA=<?= $id ?>" target="_blank"><?= $id ?></a> <br/>
                            <? endforeach; ?>
                        </td>
                    </tr>
                    <? endif; ?>
                </table>
            </div>
        </td>

        <td nowrap="nowrap"><?if ($programs) :?>
            <?=$programs[0]["name"]?><br />
            <a href="javascript:;" class="smaller" onclick="PopupNominate('<?=$doc->mgiid?>');return false;">Express interest</a>
            <? else: ?>
            Not assigned<br />
            <a href="javascript:;" class="smaller" onclick="PopupNominate('<?=$doc->mgiid?>');return false;">Nominate</a>
            <? endif; ?>
        </td>
        <td nowrap="nowrap"><?if ($programs) { print $programs[0]["value"];} else { print "&nbsp;"; } ?></td>
        <td width="10%" nowrap="nowrap" align="center" <? if($rowspan>1) {echo "rowspan='$rowspan'";} ?>><a href="/details.php?mgiid=<?= $doc->mgiid ?>">Details</a></td>

        <td nowrap="nowrap">
        <!-- Availability -->
        <? if ($programs[0]["name"]) : ?>
        <? $prods = is_array($doc->available_product) ? array_unique($doc->available_product) : array($doc->available_product); ?>
        <? foreach( $prods as $prod ): ?>
        <? if (strpos($prod, str_replace("KOMP-","",$programs[0]["name"])) === 0) : ?>
        <?= formatAvailabilityString($prod, $doc) ?>
        <? endif; ?>
        <? endforeach; ?>
        <? endif; ?>
        <? if($programs[0]["name"] == 'TIGM') : ?>
         <a href="http://www.tigm.org/cgi-bin/tigminfo.cgi?survey=KOMP%20Website&mgi1=<?=$doc->mgiid?>&gene1=<?=$doc->symbol?>">Order TIGM gene trap &raquo;</a>
        <? endif; ?>
        </td>

        <td nowrap="nowrap" <? if($rowspan>1) {echo "rowspan='$rowspan'";} ?>>
            <? if($doc->imsr) : ?>
            IMSR: <a href="http://www.informatics.jax.org/imsr/fetch?page=imsrSummary&amp;op:name=contains&amp;state=LM&amp;state=OV&amp;state=EM&amp;state=SP&amp;state=ES&amp;type=&amp;op:ga_symname=&amp;ga_symname=<?= $doc->symbol ?>&amp;ga_symnameBreadth=CM&amp;mutationType=chromosomal+aberration&amp;mutationType=chemically+induced+mutation&amp;mutationType=deletion&amp;mutationType=duplication&amp;mutationType=gene+trap&amp;mutationType=insertion&amp;mutationType=inversion&amp;mutationType=other&amp;mutationType=radiation+induced+mutation&amp;mutationType=robertsonian+translocation&amp;mutationType=spontaneous+mutation&amp;mutationType=reciprocal+translocation&amp;mutationType=targeted+mutation&amp;mutationType=transposition&amp;noLimit=" target="_blank"><?= $doc->imsr ?></a><br />
            <? endif; ?>
            <? if($doc->igtc) : ?>
            IGTC: <a href="http://www.genetrap.org/cgi-bin/annotation.py?mgi=<?= $doc->mgiid ?>" target="_blank"><?= $doc->igtc ?></a><br />
            <? endif; ?>
            <? if($doc->targeted_mutations) : ?>
            Targeted Mutations (MGI): <a href="http://www.informatics.jax.org/searches/allele_report.cgi?markerID=<?= $doc->mgiid ?>&amp;alleleCategory=targAll" target="_blank"><?= $doc->targeted_mutations ?></a><br />
            <? endif; ?>
            <? if($doc->other_mutations) : ?>
            Other Mutations (MGI): <a href="http://www.informatics.jax.org/searches/allele_report.cgi?markerID=<?= $doc->mgiid ?>&amp;alleleCategory=not%20targeted%20(all)" target="_blank"><?= $doc->other_mutations ?></a><br />
            <? endif; ?>
        </td>
    </tr>
    
    <? if (count($programs) > 1) : 
        for( $i=1; $i<count($programs); $i++) : ?>
        <tr bgcolor="<?= $bgcolor ?>">
        <td><?=$programs[$i]["name"]?></td>
        <td><?=$programs[$i]["value"]?></td>

        <td nowrap="nowrap">
        <!-- Availability -->
        <? if ($programs[$i]["name"]) : ?>
        <? $prods = is_array($doc->available_product) ? array_unique($doc->available_product) : array($doc->available_product); ?>
        <? foreach( $prods as $prod ): ?>
        <? if (strpos($prod, str_replace("KOMP-","",$programs[$i]["name"])) === 0) : ?>
        <?= formatAvailabilityString($prod, $doc) ?>
        <? endif; ?>
        <? endforeach; ?>
        <? endif; ?>
        <? if($programs[$i]["name"] == 'TIGM') : ?>
         <a href="http://www.tigm.org/cgi-bin/tigminfo.cgi?survey=KOMP%20Website&mgi1=<?=$doc->mgiid?>&gene1=<?=$doc->symbol?>">Order TIGM gene trap &raquo;</a>
        <? endif; ?>
        </td>

        </tr>
        <? endfor; ?>
    <? endif; ?>

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
    This site is maintained by the I-DCC and the KOMP-DCC.<br>Supported by the European Union and the National Institutes of Health.
    </div> <!-- /#footer -->
    </div> <!-- /#container -->
    <span class="clear"></span>

    </div> <!-- /#wrapper -->

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
