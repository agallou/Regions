Tableau des régions françaises
==============================

Utilisation
-----------

Récupération d'un libellé :

```php
$regions = new \agallou\Regions\Collection();
var_dump($regions->get('11')->getLabel());
//string(10) "Ile-de-France"
```

Récupération d'un libellé si le paramètre n'est pas paddé avec un zéro :

```php
$regions = new \agallou\Regions\Collection();
var_dump($regions->getLabel(2, true));
//string(10) "Martinique"
```

Récupération des codes de départements pour la région :

```php
$regions = new \agallou\Regions\Collection();
var_dump($regions->get('82')->getCodesDepartements());
//array(8) {
//[0]=>
//  string(2) "01"
//[1]=>
//  string(2) "07"
//[2]=>
//  string(2) "26"
//[3]=>
//  string(2) "38"
//[4]=>
//  string(2) "42"
//[5]=>
//  string(2) "69"
//[6]=>
//  string(2) "73"
//[7]=>
//  string(2) "74"
//}
```

La collection implémente ArrayIterator, il est donc possible de boucler dessus :

```php
$departements = new \agallou\Departements\Collection();
foreach ($departements as $code => $label) {
  var_dump($code, $label);
}
//int(42)
//string(6) "Alsace"
//int(72)
//string(9) "Aquitaine"
//int(83)
//string(8) "Auvergne"
//...
//int(82)
//string(12) "Rhône-Alpes"
```

Regions 2016
------------

Le découpage des nouvelles régions suite à la loi 2015-29 du 16 janvier 2015 relative à la délimitation des régions est aussi disponible.

Ce découpage est disponible via la classe `Collection2016` :

```php
$regions = new \agallou\Regions\Collection2016();
var_dump($regions->get('84')->getLabel());
//string(10) "Auvergne-Rhône-Alpes"
```
