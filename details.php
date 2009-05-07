<?
/**
 * Marker Details
 * 
 * details.php outputs a detailed html page of a marker and all associated 
 * attributes including all pipeline projects and their status.
 *
 * @author Jeremy Mason
 * @version 1.0
 */
 
/**
 * Associative arrays for each pipeline status
 * @global array $PIPELINE_STATES
 * @global array $CSDSTATUSES
 * @global array $EUCOMMSTATUSES
 * @global array $NORCOMMSTATUSES
 * @global array $REGNSTATUSES
 * @global array $TIGMSTATUSES
 */

$PIPELINE_STATES = array(
    'prepipeline'=>"Pre Pipeline",
    'design'=>"Designs",
    'vector'=>"Vectors",
    'escell'=>"ES Cells",
    'mice'=>"Mice"
);

$CSDSTATUSES = array(
    'Transferred to KOMP'=>array('name'=>'Transferred to KOMP', 'sequence'=>5, 'terminal'=>TRUE, 'warning'=>FALSE, 'category'=>'prepipeline'),
    'On Hold'=>array('name'=>'On Hold', 'sequence'=>10, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'prepipeline'),
    'Withdrawn From Pipeline'=>array('name'=>'Withdrawn From Pipeline', 'sequence'=>25, 'terminal'=>TRUE, 'warning'=>FALSE, 'category'=>'prepipeline'),
    'Design Requested'=>array('name'=>'Design Requested', 'sequence'=>30, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'design'),
    'Alternate Design Requested'=>array('name'=>'Alternate Design Requested', 'sequence'=>35, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'design'),
    'VEGA Annotation Requested'=>array('name'=>'VEGA Annotation Requested', 'sequence'=>40, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'design'),
    'Design Not Possible'=>array('name'=>'Design Not Possible', 'sequence'=>45, 'terminal'=>TRUE, 'warning'=>FALSE, 'category'=>'design'),
    'Design Completed'=>array('name'=>'Design Completed', 'sequence'=>50, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'design'),
    'Vector Construction in Progress'=>array('name'=>'Vector Construction in Progress', 'sequence'=>55, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'vector'),
    'Vector Unsuccessful - Project Terminated'=>array('name'=>'Vector Unsuccessful - Project Terminated', 'sequence'=>60, 'terminal'=>TRUE, 'warning'=>FALSE, 'category'=>'vector'),
    'Vector Unsuccessful - Alternate Design in Progress'=>array('name'=>'Vector Unsuccessful - Alternate Design in Progress', 'sequence'=>65, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'vector'),
    'Vector - Initial Attempt Unsuccessful'=>array('name'=>'Vector - Initial Attempt Unsuccessful', 'sequence'=>70, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'vector'),
    'Vector Complete'=>array('name'=>'Vector Complete', 'sequence'=>75, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'vector'),
    'Vector - DNA Not Suitable for Electroporation'=>array('name'=>'Vector - DNA Not Suitable for Electroporation', 'sequence'=>77, 'terminal'=>TRUE, 'warning'=>FALSE, 'category'=>'vector'),
    'ES Cells - Electroporation in Progress'=>array('name'=>'ES Cells - Electroporation in Progress', 'sequence'=>80, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'escell'),
    'ES Cells - Electroporation Unsuccessful'=>array('name'=>'ES Cells - Electroporation Unsuccessful', 'sequence'=>82, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'escell'),
    'ES Cells - No QC Positives'=>array('name'=>'ES Cells - No QC Positives', 'sequence'=>85, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'escell'),
    'ES Cells - Targeting  Unsuccessful - Project Terminated'=>array('name'=>'ES Cells - Targeting  Unsuccessful - Project Terminated', 'sequence'=>90, 'terminal'=>TRUE, 'warning'=>FALSE, 'category'=>'escell'),
    'ES Cells - Targeting Confirmed'=>array('name'=>'ES Cells - Targeting Confirmed', 'sequence'=>95, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'escell'),
    'Mice - Microinjection in progress'=>array('name'=>'Mice - Microinjection in progress', 'sequence'=>100, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'mice'),
    'Mice - Germline transmission'=>array('name'=>'Mice - Germline transmission', 'sequence'=>110, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'mice'),
    'Mice - Genotype confirmed'=>array('name'=>'Mice - Genotype confirmed', 'sequence'=>115, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'mice')
);

// Same statuses for CSD, EUCOMM, and NorCOMM
$EUCOMMSTATUSES = $CSDSTATUSES;
$NORCOMMSTATUSES = $CSDSTATUSES;

$TIGMSTATUSES = array(
    'Gene traps available'=>array('name'=>'Gene traps available', 'sequence'=>5, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'escell')
);

$REGNSTATUSES = array(
    'Regeneron Selected'=>array('name'=>'Regeneron Selected', 'sequence'=>5, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'prepipeline'),
    'Design Finished/Oligos Ordered'=>array('name'=>'Design Finished/Oligos Ordered', 'sequence'=>10, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'design'),
    'Parental BAC Obtained'=>array('name'=>'Parental BAC Obtained', 'sequence'=>15, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'vector'),
    'Targeting Vector QC Completed'=>array('name'=>'Targeting Vector QC Completed', 'sequence'=>20, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'vector'),
    'Vector Electroporated into ES Cells'=>array('name'=>'Vector Electroporated into ES Cells', 'sequence'=>25, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'vector'),
    'ES cell colonies picked'=>array('name'=>'ES cell colonies picked', 'sequence'=>30, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'escell'),
    'ES cell colonies screened / QC no positives'=>array('name'=>'ES cell colonies screened / QC no positives', 'sequence'=>35, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'escell'),
    'ES cell colonies screened / QC one positive'=>array('name'=>'ES cell colonies screened / QC one positive', 'sequence'=>40, 'terminal'=>FALSE, 'warning'=>TRUE, 'category'=>'escell'),
    'ES cell colonies screened / QC positives'=>array('name'=>'ES cell colonies screened / QC positives', 'sequence'=>45, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'escell'),
    'ES Cell Clone Microinjected'=>array('name'=>'ES Cell Clone Microinjected', 'sequence'=>50, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'escell'),
    'Germline Transmission Achieved'=>array('name'=>'Germline Transmission Achieved', 'sequence'=>55, 'terminal'=>FALSE, 'warning'=>FALSE, 'category'=>'mice')
);

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

require_once('Apache/Solr/Service.php');

// Instance a new solr object
$solr = new Apache_Solr_Service( 'rohan.informatics.jax.org', '8983', '/solr' );

// Query the solr service
if ($_GET['mgiid']) {
    $response = $solr->search( "mgiid:".str_replace(":", "\:", $_GET['mgiid']), $offset, $limit, array('sort' => 'symbol asc'));
} else {
    print "Missing MGI ID";
}

// Print the results in a table
if ( $response && $response->getHttpStatus() == 200 ) { 
    if ( $response->response->numFound > 0 ) {

        // default to the first returned result
        $doc = $response->response->docs[0];

        // Collect the all pipeline information for this marker
        // TODO: Sort these arrays by most advanced project first
        $programs = array();
        if ($doc->CSD_project) {
            $pros = is_array($doc->CSD_project) ? $doc->CSD_project : array($doc->CSD_project);
            foreach ($pros as $pro) {
                list($pid,$status,$datetime) = explode("||", $pro);
                array_push($programs, array("name"=>"KOMP-CSD", "value"=>$status, "pid"=>$pid));                
            }
        }
        if ($doc->Regeneron_project) {
            $pros = is_array($doc->Regeneron_project) ? $doc->Regeneron_project : array($doc->Regeneron_project);
            foreach ($pros as $pro) {
                list($pid,$status,$datetime) = explode("||", $pro);
                array_push($programs, array("name"=>"KOMP-Regeneron", "value"=>$status, "pid"=>$pid));                
            }
        }
        if ($doc->EUCOMM_project) {
            $pros = is_array($doc->EUCOMM_project) ? $doc->EUCOMM_project : array($doc->EUCOMM_project);
            foreach ($pros as $pro) {
                list($pid,$status,$datetime) = explode("||", $pro);
                array_push($programs, array("name"=>"EUCOMM", "value"=>$status, "pid"=>$pid));
            }
        }
        if ($doc->NorCOMM_project) {
            $pros = is_array($doc->NorCOMM_project) ? $doc->NorCOMM_project : array($doc->NorCOMM_project);
            foreach ($pros as $pro) {
                list($pid,$status,$datetime) = explode("||", $pro);
                array_push($programs, array("name"=>"NorCOMM", "value"=>$status, "pid"=>$pid));                
            }
        }

        if ($doc->tigm) {
            array_push($programs, array("name"=>"TIGM", "value"=>"Gene traps available"));
        }

// Uncomment to see the  solr response
//echo "\n<!--\n"; print_r($doc); echo "\n-->\n";

?>



<table class="resulttable">
    <tr>
        <th style="font-size:120%;font-weight:bold;">Gene Information</th>
    </tr>
    <tr>
        <td>
            <div style="width:800px">

                <a style="text-align:center;float:right;text-decoration:none;font-size:80%;color:#999999" href="http://gbrowse.informatics.jax.org/cgi-bin/gbrowse/mouse_current/?start=<?= $doc->start?>;stop=<?= $doc->end?>;ref=<?= $doc->chromosome?>" target="_blank">MGI Genome Browser<br><img src="http://gbrowse.informatics.jax.org/cgi-bin/gbrowse_img/thumbs_current/?abs=1;options=Everything;width=200;name=<?= $doc->chromosome?>%3A<?= $doc->start?>-<?= $doc->end?>" alt="MGI Gbrowse thumbnail for <?= $doc->symbol?>"></a>

                <h2 style="margin-top:5px;padding-top:5px;border:none;font-size:150%;font-weight:bold;"><a href="http://www.informatics.jax.org/searches/accession_report.cgi?id=<?= $doc->mgiid?>" target="_blank"><?= $doc->symbol?></a></h2>
                <a href="javascript:;" onclick="PopupNominate('<?= $doc->mgiid?>');return false;">Express Interest</a>
                <table class="featureless" width="500" style="width:500px;">
                    <tr><td valign="top"><b>Gene Name:</b></td><td><?= is_array($doc->name) ? $doc->name[0] : $doc->name ?></td></tr>
                    <? if ($doc->synonym) : ?><tr><td valign="top"><b>Synonyms:</b></td><td><?= is_array($doc->synonym) ? implode(", ", array_unique($doc->synonym)) : $doc->synonym ?></td></tr><? endif; ?>
                    <tr><td nowrap="nowrap" valign="top"><b>Gene Location:</b></td><td>Chr<?= $doc->chromosome?>:<?= $doc->start?>-<?= $doc->end?>(<?= $doc->strand?>)</td></tr>
                </table>
                <br />
                <div style="margin-left:2px" id="show-<?= $doc->mgiid?>" onclick="document.getElementById('hide-<?= $doc->mgiid?>').style.display='block';document.getElementById('show-<?= $doc->mgiid?>').style.display='none';return false;">
                    <a href="#" class="unclicked smallplus">Show Other Ids</a>
                </div>
                <div style="margin-left:2px;" class="hidden" id="hide-<?= $doc->mgiid?>">
                    <div onclick="document.getElementById('show-<?= $doc->mgiid?>').style.display='block';document.getElementById('hide-<?= $doc->mgiid?>').style.display='none';return false;">
                    <a href="#" class="unclicked smallminus">Hide Other Ids</a>
                </div>
                <table class="featureless">
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
                    <? $ids = is_array($doc->ccds_id) ? array_unique($doc->ncbi_id) : array($doc->ccds_id); ?>
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
            <? if ($doc->omim_display) : ?>
            <div style="margin-left:2px" id="show-omim-<?= $doc->mgiid?>" onclick="document.getElementById('hide-omim-<?= $doc->mgiid?>').style.display='block';document.getElementById('show-omim-<?= $doc->mgiid?>').style.display='none';return false;">
                <a href="#" class="unclicked smallplus">Show OMIM Diseases</a>
            </div>
            <div style="margin-left:2px;display:none;" id="hide-omim-<?= $doc->mgiid?>">
                <div onclick="document.getElementById('show-omim-<?= $doc->mgiid?>').style.display='block';document.getElementById('hide-omim-<?= $doc->mgiid?>').style.display='none';return false;">
                    <a href="#" class="unclicked smallminus">Hide OMIM Diseases</a>
                </div>
                <? $rows = is_array($doc->omim_display) ? $doc->omim_display : array($doc->omim_display); ?>
                <? foreach($rows as $row) : ?>
                <? $pieces = explode("||", $row); $mgi_key=$pieces[1]; $disease=$pieces[2]; ?>
                <a style="margin-left:15px;white-space:nowrap;" href="http://www.informatics.jax.org/javawi2/servlet/WIFetch?page=humanDisease&amp;key=<?=$mgi_key?>" target="_blank"><?=$disease?><br></a>
                <? endforeach; ?>
            </div>
            <? endif; ?>
            <br />
        </td>
    </tr>
    <tr>
    <th style="font-size:120%;font-weight:bold;">
    IKMC Knockout Attempts <img src="/static/images/help.png" alt="Help icon" onmouseover="document.getElementById('attempts').style.display='block';return false;" height="18">
    <div style="margin:15px;display:none;font-size:90%;font-weight:normal" id="attempts">
    <a style="margin:0px;padding:0px;margin-top:-25px;float:right;text-decoration:underline;color:red;" href="#" onclick="document.getElementById('attempts').style.display='none';return false;">close <img src="/static/images/cross.png"></a>
    The IKMC pipelines are:
    <br><br>
    <style>dt{font-weight:bold;}</style>
    <dl class="smallish" style="margin-left: 25px;" >
    <dt>KOMP-CSD</dt><dd>The KOMP consortium of CHORI, Sanger, and UC Davis</dd>
    <dt>KOMP-Regeneron</dt><dd>The KOMP component at Regeneron</dd>
    <dt>EUCOMM</dt><dd>The European Conditional Mouse Mutagenesis Program</dd>
    <dt>NorCOMM</dt><dd>The North American Conditional Mouse Mutagenesis project</dd>
    <dt>TIGM</dt><dd>The Texas A&M Institute for Genomic Medicine  (gene trapping)</dd>
    </dl><br>
    All IKMC targeting attempts from the different pipelines are listed below. See <a href="/about">more information about the IKMC</a>.
    <br>
    </div>    </th>
    </tr>
    <tr>

    <td>
        <table width="100%" class="featureless">
        <? if ($programs) : 
            for ($i=0; $i<count($programs); $i++) :
                $statuses = $CSDSTATUSES; // default to CSD statuses
                if ($programs[$i]["name"] == "KOMP-Regeneron") {
                    $statuses = $REGNSTATUSES;
                } else if ($programs[$i]["name"] == "EUCOMM") {
                    $statuses = $EUCOMMSTATUSES;
                } else if ($programs[$i]["name"] == "NorCOMM") { 
                    $statuses = $NORCOMMSTATUSES; 
                } else if ($programs[$i]["name"] == "TIGM") {
                    $statuses = $TIGMSTATUSES;
                }
            ?>
            <tr bgcolor="<?= $bgcolor = ($bgcolor == '#ffffff') ? '#efefef' : '#ffffff' ?>">
            <td valign="middle" width="10%" style="font-size:120%; color:black"><?=$programs[$i]["name"]?>
            <br />
            <?= ($programs[$i]["name"]!='TIGM') ? "Design: ".$programs[$i]['pid'] : '' ?>
            </td>
            <td>

            <table class="featureless" cellspacing="0" cellpadding="0" style="padding:0;margin:0;">
            <tr>
                <? foreach ($PIPELINE_STATES as $state=>$name) : ?>
                <td style="text-align:left;"><span style="font-size:110%;font-wight:bold;font-style:italic;"><?=$name?></span></td>
                <? endforeach; ?>
            </tr>
            <tr>
                <? reset($PIPELINE_STATES); ?>
                <? while( list($key, $value) = each($PIPELINE_STATES)) : ?>
                <? 
                // calculate which css class for the current cell based on 
                // the warning level of the status, the terminal level of 
                // the statusand the position of the status in the pipeline

                switch ($statuses[$programs[$i]['value']]['category']) {
                    case 'mice':
                        if ($key == 'mice') {
                            $curr = 'g-';
                            if ($statuses[$programs[$i]['value']]['category'] == $key) {
                                if ($statuses[$programs[$i]['value']]['terminal']) {
                                    $curr = 'r-';
                                } else if ($statuses[$programs[$i]['value']]['warning']) {
                                    $curr = 'o-';
                                } else {
                                    $curr = 'b-';
                                }
                            }
                        } else {
                            $curr = 'bb';
                        }
                    break;
                    case 'escell':
                    case 'vector':
                    case 'design':
                    case 'prepipeline':
                        $cat = $statuses[$programs[$i]['value']]['category'];
                        if ($key == $cat) {
                            $curr = 'bg';
                            if ($statuses[$programs[$i]['value']]['terminal']) {
                                $curr = 'rg';
                            } else if ($statuses[$programs[$i]['value']]['warning']) {
                                $curr = 'og';
                            }
                        } else {
                            $second='b';
                            if ($key != 'mice') {
                                if (
                                    (($statuses[$programs[$i]['value']]['category'] == 'design' && $key == 'prepipeline') && $statuses[$programs[$i]['value']]['terminal']) ||
                                    (($statuses[$programs[$i]['value']]['category'] == 'vector' && $key == 'design') && $statuses[$programs[$i]['value']]['terminal']) ||
                                    (($statuses[$programs[$i]['value']]['category'] == 'escell' && $key == 'vector') && $statuses[$programs[$i]['value']]['terminal']) ||
                                    (($statuses[$programs[$i]['value']]['category'] == 'mice' && $key == 'escell') && $statuses[$programs[$i]['value']]['terminal'])
                                    ) {
                                    $second = 'r';
                                } else if (
                                    (($statuses[$programs[$i]['value']]['category'] == 'design' && $key == 'prepipeline') && $statuses[$programs[$i]['value']]['warning']) ||
                                    (($statuses[$programs[$i]['value']]['category'] == 'vector' && $key == 'design') && $statuses[$programs[$i]['value']]['warning']) ||
                                    (($statuses[$programs[$i]['value']]['category'] == 'escell' && $key == 'vector') && $statuses[$programs[$i]['value']]['warning']) ||
                                    (($statuses[$programs[$i]['value']]['category'] == 'mice' && $key == 'escell') && $statuses[$programs[$i]['value']]['warning'])
                                    ) {
                                    $second = 'o';
                                } 
                            } else {
                                $second = '-';
                            }

                            if($key == 'mice' && ($cat == 'prepipeline' || $cat == 'design' || $cat == 'vector' || $cat == 'escell')) {
                                $curr='g-';
                            } else if($key == 'escell' && ($cat == 'prepipeline' || $cat == 'design' || $cat == 'vector')) {
                                $curr='gg';
                            } else if($key == 'vector' && ($cat == 'prepipeline' || $cat == 'design')) {
                                $curr='gg';
                            } else if($key == 'design' && ($cat == 'prepipeline')) {
                                $curr='gg';
                            } else if($key != 'prepipeline' && ($cat == 'prepipeline')) {
                                $curr='g'.$second;
                            } else {
                                $curr = 'b'.$second;
                            }
                        }
                    break;
                    default:
                    break;
                }

                ?>
                <td class="<?=$curr?>" width="20%">
                <? if ($statuses[$programs[$i]['value']]['category'] == $key || ($programs[$i]["name"] == "TIGM" && $key =='escell')) : ?>
                    <div style="font-size:110%;line-height:1.0em;text-align:left;padding:2px; padding-right:10px">
                    <?= ($programs[$i]["name"] == "TIGM") ? count($doc->tigm)." Gene trap".((count($doc->tigm) == 1) ? '' : 's')." available" : $programs[$i]['value']?>
                    </div>
                <? endif; ?>
                <? if ($key =='vector') : ?>
                    <? if ($doc->available_product_display) : ?>
                    <? $available_product_displays = is_array($doc->available_product_display) ? $doc->available_product_display : array($doc->available_product_display); ?>
                    <? foreach ($available_product_displays as $available_product_display) : ?>
                        <? list($productid, $productpipeline, $producttype) = explode("||", $available_product_display); ?>
                        <? if (($productpipeline == 'KOMP-CSD' || $productpipeline == 'KOMP-Regeneron') && $productid == $programs[$i]["pid"] && $producttype=="Vector available") : ?>
                        <a target="_blank" class="orderlink" href="http://www.komp.org/vectorOrder.php?projectid=<?=$productid?>">Order <?=str_replace(" available","",$producttype)?> &raquo;</a>
                        <? endif; ?>
                        <? if ($productpipeline == 'EUCOMM' && $programs[$i]["name"] == "EUCOMM" && $productid == $programs[$i]["pid"] && $producttype=="vector available") : ?>
                        <a target="_blank" class="orderlink" href="http://www.eummcr.org/order.php">Order vector &raquo;</a>
                        <? endif; ?>
                    <? endforeach; ?>
                    <? endif; ?>
                <? elseif ($programs[$i]["name"] == "TIGM" && $key =='escell') : ?>
                    <a class="orderlink" href="http://www.tigm.org/cgi-bin/tigminfo.cgi?survey=KOMP%20Website&mgi1=<?=$doc->mgiid?>&gene1=<?=$doc->symbol?>" target="_blank">Order gene traps &raquo;</a>
                <? elseif ($key =='escell') : ?>
                    <? if ($doc->available_product_display) : ?>
                    <? $available_product_displays = is_array($doc->available_product_display) ? $doc->available_product_display : array($doc->available_product_display); ?>
                    <? foreach ($available_product_displays as $available_product_display) : ?>
                        <? list($productid, $productpipeline, $producttype) = explode("||", $available_product_display); ?>
                        <? if (($productpipeline == 'KOMP-CSD' || $productpipeline == 'KOMP-Regeneron') && $productid == $programs[$i]["pid"] && $producttype=="ES Cell available") : ?>
                        <a target="_blank" class="orderlink" href="http://www.komp.org/geneinfo.php?MGI_Number=<?=str_replace("MGI:","", $doc->mgiid)?>">Order <?=str_replace(" available","",$producttype)?> &raquo;</a>
                        <? endif; ?>
                        <? if ($productpipeline == 'EUCOMM' && $programs[$i]["name"] == "EUCOMM" && $productid == $programs[$i]["pid"] && $producttype=="ES Cell available") : ?>
                        <a target="_blank" class="orderlink" href="http://www.eummcr.org/order.php">Order ES cells &raquo;</a>
                        <? endif; ?>
                    <? endforeach; ?>
                    <? endif; ?>
                <? elseif ($key =='mice') : ?>
                    <? if ($doc->available_product_display) : ?>
                    <? $available_product_displays = is_array($doc->available_product_display) ? $doc->available_product_display : array($doc->available_product_display); ?>
                    <? foreach ($available_product_displays as $available_product_display) : ?>
                        <? list($productid, $productpipeline, $producttype) = explode("||", $available_product_display); ?>
                        <? if (($productpipeline == 'KOMP-CSD' || $productpipeline == 'KOMP-Regeneron') && $productid == $programs[$i]["pid"] && $producttype=="Mouse available") : ?>
                        <a target="_blank" class="orderlink" href="http://www.komp.org/geneinfo.php?MGI_Number=<?=str_replace("MGI:","", $doc->mgiid)?>">Order <?=str_replace(" available","",$producttype)?> &raquo;</a>
                        <? endif; ?>
                        <? if ($productpipeline == 'EUCOMM' && $programs[$i]["name"] == "EUCOMM" && $productid == $programs[$i]["pid"] && $producttype=="Mouse available") : ?>
                        <a target="_blank" class="orderlink" href="http://www.emmanet.org/apps/springEmma/search?keyword=<?=$doc->symbol?>%25EUCOMM&select_by=InternationalStrainName&search=ok">Order mice &raquo;</a>
                        <? endif; ?>
                    <? endforeach; ?>
                    <? endif; ?>
                <? endif; ?>
                </td>
                <? endwhile; ?>
            </tr>
            </table>
            <br />

            </td>
            <td width="5%">
            <? if ($programs[$i]["name"] == 'KOMP-CSD' || $programs[$i]["name"] == 'KOMP-Regeneron' || $programs[$i]["name"] == 'EUCOMM') : ?>
            <a class="ext" target=_blank" href="#" onclick="document.getElementById('proj-row-<?=($programs[$i]["pid"]) ? $programs[$i]["pid"] : $programs[$i]["name"]?>').style.display='block';return false;">Allele Details</a>
            <? endif; ?>
            <? if ($programs[$i]["name"] == 'TIGM'): ?>
            <div style="position:relative;">
            <div id="tigmShow" style="right:0;top:45px;z-index:1000;width:250px;display:none;position:absolute;background-color:white; color:black; border:solid 2px black; padding:5px;">
            <a href="#" onclick="document.getElementById('tigmShow').style.display='none';return false;" style="float:right;color:red">close</a>
            <h3 style="border-bottom: solid 1px;">All TIGM gene traps</h3>
            <? $tigms = is_array($doc->tigm) ? $doc->tigm : array($doc->tigm); ?>
            <ul>
            <? foreach($tigms as $id) : ?>
            <li><a class="ext" target="_blank" href="http://www.ncbi.nlm.nih.gov/entrez/query.fcgi?cmd=Search&db=nucgss&doptcmdl=GenBank&term=%22<?=$id?>%22"><?=$id?></a></li>
            <? endforeach; ?>
            </ul>
            </div>
            </div>
            <a href="#" onclick="document.getElementById('tigmShow').style.display='block';return false;">View all gene&nbsp;traps</a>
            <? endif; ?>
            </td>
            </tr>
            <tr bgcolor="<?= $bgcolor ?>">
            <td colspan="3">
            <div style="display:none;" id="proj-row-<?=($programs[$i]["pid"]) ? $programs[$i]["pid"] : $programs[$i]["name"]?>">
            <a href="#" onclick="document.getElementById('proj-row-<?= ($programs[$i]["pid"]) ? $programs[$i]["pid"] : $programs[$i]["name"] ?>').style.display='none';return false;" style="float:right;color:red;font-size:120%;">close</a>
            <? if ($programs[$i]["name"] == 'KOMP-CSD' || $programs[$i]["name"] == 'EUCOMM'): ?>
            <a target="_blank" href="http://www.sanger.ac.uk/htgt/report/gene_report?project_id=<?=$programs[$i]["pid"]?>" style="float:left;font-size:120%; margin-right: 10px;">View this project</a>
            <iframe width="955" height="200" src="http://www.i-dcc.org/dev/allele_pages/<?=$programs[$i]["pid"]?>.html"></iframe>
            <? elseif ($programs[$i]["name"] == 'KOMP-Regeneron'): ?>
            <a  target="_blank" href="http://www.velocigene.com/komp/detail/<?=str_replace("VG","",$programs[$i]["pid"])?>" style="float:left;font-size:120%; margin-right: 10px;">View this project at Regeneron</a>
            <img src="images/regn_design.png" />
            <? endif; ?>
            </div>
            </td>
            </tr>
            <? endfor; ?>
        <? endif; ?>
        
        </table>
    </td>
    </tr>
    <tr>

    <th style="font-size:120%;font-weight:bold;"> Other Mutants/Resources </th>
    </tr>
    <tr>
    <td style="padding:5px;font-size:120%;">
        <table class="featureless" style="width:370px;">
        <? if($doc->imsr) : ?>
        <tr><td nowrap="nowrap">International Mouse Strain Resource (IMSR):</td><td nowrap="nowrap"><a href="http://www.informatics.jax.org/imsr/fetch?page=imsrSummary&amp;op:name=contains&amp;state=LM&amp;state=OV&amp;state=EM&amp;state=SP&amp;state=ES&amp;type=&amp;op:ga_symname=&amp;ga_symname=<?= $doc->symbol ?>&amp;ga_symnameBreadth=CM&amp;mutationType=chromosomal+aberration&amp;mutationType=chemically+induced+mutation&amp;mutationType=deletion&amp;mutationType=duplication&amp;mutationType=gene+trap&amp;mutationType=insertion&amp;mutationType=inversion&amp;mutationType=other&amp;mutationType=radiation+induced+mutation&amp;mutationType=robertsonian+translocation&amp;mutationType=spontaneous+mutation&amp;mutationType=reciprocal+translocation&amp;mutationType=targeted+mutation&amp;mutationType=transposition&amp;noLimit=" target="_blank"><?= $doc->imsr ?> strain/ES cell line</a></td></tr>
        <? endif; ?>
        <? if($doc->igtc) : ?>
        <tr><td nowrap="nowrap">International Gene Trap Consortium (IGTC):</td><td nowrap="nowrap"><a href="http://www.genetrap.org/cgi-bin/annotation.py?mgi=<?= $doc->mgiid ?>" target="_blank"><?= $doc->igtc ?> gene traps</a></td></tr>
        <? endif; ?>
        <? if($doc->targeted_mutations) : ?>
        <tr><td nowrap="nowrap">Targeted mutations in MGI:</td><td nowrap="nowrap"><a href="http://www.informatics.jax.org/searches/allele_report.cgi?markerID=<?= $doc->mgiid ?>&amp;alleleCategory=targAll" target="_blank"><?= $doc->targeted_mutations ?> mutants</a></td></tr>
        <? endif; ?>
        <? if($doc->other_mutations) : ?>
        <tr><td nowrap="nowrap">Other mutations in MGI:</td><td nowrap="nowrap"><a href="http://www.informatics.jax.org/searches/allele_report.cgi?markerID=<?= $doc->mgiid ?>&amp;alleleCategory=not%20targeted%20(all)" target="_blank"><?= $doc->other_mutations ?> mutants</a></td></tr>
        <? endif; ?>
        </table>

    </td>
    </tr>
    </table>
<?
    }
}
?>
            </tbody>
        </table>
    </div>

                </div>
            </div> <!-- /#center -->

            <div id="footer" class="clear">
                <a href="/disclaimer">Warranty Disclaimer and Copyright Notice</a><br>
                This site is maintained by the I-DCC and the KOMP-DCC.<br>Supported by the European Union and the National Institutes of Health.
            </div> <!-- /#footer -->
        </div> <!-- /#container -->
    </div> <!-- /#wrapper -->
    <!-- /layout -->

<script type="text/javascript">
//
    if (navigator.userAgent.indexOf("Safari") > 0)
    {
    	// Fix safari "label click/toggle checkbox" issue
        var labels = document.getElementsByTagName("label");
        for (i = 0; i < labels.length; i++) {
            labels[i].addEventListener("click", addLabelFocus, false);
        }
        // Fix Safari "back button re-execute onload" issue
	    var jj=onload;
		if (jj) {
			if (onunload==null) {
				document.body.setAttribute('onunload',jj);
			}
		}
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
