<?php require_once('../../../Connections/locale.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_locale, $locale);
$query_cats = "SELECT id_categorie, c_libelle, id_categorie_mere FROM tb_categorie ORDER BY c_libelle ASC";
$cats = mysql_query($query_cats, $locale) or die(mysql_error());
$row_cats = mysql_fetch_assoc($cats);
$totalRows_cats = mysql_num_rows($cats);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="" method="post" name="categories">
<form class="form-horizontal">
             <div class="form-group">
    <label for="libelle" class="col-sm-2 control-label">Libellé</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="libelle" placeholder="Nom de la catégorie">
    </div>
  </div>
  
              <div class="form-group">
    <label for="parent" class="col-sm-2 control-label">Parent</label>
    <div class="col-sm-10"><select name="categorie">
      <?php
do {  
?>
      <option value="<?php echo $row_cats['id_categorie']?>"><?php echo $row_cats['c_libelle']?></option>
      <?php
} while ($row_cats = mysql_fetch_assoc($cats));
  $rows = mysql_num_rows($cats);
  if($rows > 0) {
      mysql_data_seek($cats, 0);
	  $row_cats = mysql_fetch_assoc($cats);
  }
?>
    </select></div>
    </div>
     <div class="form-group">
    <label for="parent" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10"><input id="input-1" type="file" class="file"></div>
     </div>
<input name="" type="submit" value="Ajouter une nouvelle catégorie" />
</form>
</body>
</html>
<?php
mysql_free_result($cats);
?>
