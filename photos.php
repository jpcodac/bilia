<?
include("sys/systemfiles.php");
if(empty($page)){ $page = 1; }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Bilia
</TITLE>

<META content="30 days" name=revisit-after>
<META http-equiv=Content-language content=en-US>
<META http-equiv=imagetoolbar content=no>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="MSHTML 5.50.4616.200" name=GENERATOR>

<LINK href="NNStyles.css" type=text/css rel=stylesheet>
<LINK href="Sonderzeug.css" type=text/css rel=stylesheet>

<STYLE type=text/css>@import url( Styles.css );
</STYLE>

<SCRIPT src="Mako.js" type=text/javascript>
</SCRIPT>

</HEAD>

<BODY>

<DIV class=Header>
<H1 class=dshadow>Jours de F�te � BILIA<BR><SPAN class=tagline>Le site du comit� des f�tes de Foce-Bilia</SPAN>
</H1>
</DIV>

<DIV class=Navigation><IMG height=116 alt="T�te de maure" 
src="img/tete_maure.gif" 
width=126> 
	<? $rep = split("/",$dir); 
	$nb = count($rep);
	$rep = $rep[$nb-1];
	?>	
	<DIV class=navbox>
	<? if ($rep != "") {
	echo "<A class=nav href=\"?\">";
	} else {
	echo "<A class=navtot>";	
	}
	echo "$picRep"; 	
	?>
	</A></DIV>
	
	<? $rep = split("/",$dir); 
	$nb = count($rep);
	$rep = $rep[$nb-1];
	if ($rep != "") {
	echo "<DIV class=navbox><A class=navtot>";	
	echo "$rep"; 
	echo "</A></DIV>";
	}
	?>
	
<?
# loop dans les fichiers et v�rifie si le fichier est un dossier et exclu le dossier "img" et "sys"
$handle = opendir("$picRep$dir");
while (false !== ($file = readdir($handle))) {
    if ($file != "." && $file != ".." && $file != "img" && $file != "sys" && is_dir("./$picRep/$file")) {
?>
	<DIV class=navbox><A class=nav href="?dir=<? echo "/$file"; ?>">
	<? $file = split("/",$file);
	$nb = count($file);
        $file = $file[$nb-1];
	echo $file; 
?> 
	</A></DIV>
<?
    }
}
closedir($handle);
?>
</DIV>
<BR><BR>

<DIV class=Content>
<H2 class=dshadow>Album Photos...</H2>
<H3><? echo "$rep"; ?></H3>
<P>
<?
# V�rifie si le fichier text.txt est pr�sent et affiche son contenu s'il est l�
if(file_exists("./$picRep$dir/text.txt")) { include("./$picRep$dir/text.txt"); }
?>
</P>

<?
# loop dans les fichiers pour trouver les images et les stores dans une variable tableau
$handle = opendir("$picRep$dir");
while (false !== ($file = readdir($handle))) {
    if ($file != "." && $file != ".." && $file != "img" && $file != "sys" && isImg($file)) {
         $imgList[] = $file;
    }
}
closedir($handle);

$nbimg = count($imgList);
$seek = ($page - 1)*$nbImgPerPg;
$i = 0;

if ($nbimg - $seek > $nbImgPerPg){ $nbimg = $nbImgPerPg; $nextPage = 1; }else{ $nbimg = $nbimg - $seek; }

$nextPageNb = $page + 1;
$prevPageNb = $page - 1;

if ($page > 1){ $prevPage = 1; }
if ($thumbGen) { $genFile = "thumbgen.php?fichier="; }

# Affiche les images dans un tableaux html
while ($nbimg > $i) {
        $imgStat1 = $i+$seek;
        $imgStat2 = $i+$seek+1;
        if($nbimg-$i != 1){ echo "
     
        <table width=\"50%\" align=\"center\">
          <tr>
            <td width=\"50%\">
              <center><a href=\"img.php?img=./$picRep$dir/$imgList[$imgStat1]\" target=\"_blank\" width=\"100\"><img src=\"$genFile./$picRep$dir/$imgList[$imgStat1]\" border=\"0\" height=\"100\"></a></center>
            </td>
            <td width=\"50%\">
              <center><a href=\"img.php?img=./$picRep$dir/$imgList[$imgStat2]\" target=\"_blank\" width=\"100\"><img src=\"$genFile./$picRep$dir/$imgList[$imgStat2]\" border=\"0\" height=\"100\"></a></center>
            </td>
          </tr>
          <tr colspan=\"2\">
            <td height=\"10\">
            </td>
          </tr>
        </table>

        ";
        }else{
        echo "

        <table width=\"50%\" align=\"center\">
          <tr>
            <td width=\"50%\">
              <center><a href=\"img.php?img=./$picRep$dir/$imgList[$imgStat1]\" target=\"_blank\" width=\"100\"><img src=\"$genFile./$picRep$dir/$imgList[$imgStat1]\" border=\"0\" height=\"100\"></a></center>
            </td>
            <td width=\"50%\">
              <center></center>
            </td>
          </tr>
          <tr colspan=\"2\">
            <td height=\"10\">
            </td>
          </tr>
        </table>
        
        ";
        }
        $i = $i + 2;
}

# Affichage du bouton suivant et pr�c�dent si la situation le n�cessite
echo "<br>";
if($prevPage == 1){ echo "<a href=\"?dir=$dir&page=$prevPageNb\">Pr�c�dent</a>"; }
if($prevPage == 1 && $nextPage == 1){ echo " - "; }
if($nextPage == 1){ echo "<a href=\"?dir=$dir&page=$nextPageNb\">Suivant</a>"; }
?>
            </td>
          </tr>
        </table>
      </td>
    </tr>

  </table>

<P>Pour vos envois, des informations ou des suggestions, n'h�sitez pas � me <STRONG>Contacter</STRONG> 
� l'adresse suivante 
<SCRIPT type=text/javascript>
<!--
	var first = 'ma';
	var second = 'il';
	var third = 'to:';
	var address = 'jpcodac';
	var domain = 'club-internet.fr';
	document.write('<a href="');
	document.write(first+second+third);
	document.write(address);
	document.write('@');
	document.write(domain);
	document.write('" title="jpcodac@club-internet.fr">');
	document.write('jpcodac@club-internet.fr<\/a>');
// -->
</SCRIPT>
 . 
</P>
<DIV class=box>
<A href="index.html">Accueil</A> � 
<STRONG>Photos</STRONG> � 
<A href="infos.html">Infos</A> � 
<A href="comite.html">Comit� des f�tes</A> � 
<A href="liens.html">Liens</A>
<BR>
Contenu, Design and Programmation: Jean-Pierre Codaccioni
</DIV>
