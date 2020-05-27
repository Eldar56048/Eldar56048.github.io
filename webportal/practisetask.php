<?php
require 'figure.php';
require 'Rectangle.php';
require 'Triangle.php';
require 'Square.php';
//Before Constructor
//$new_item = new Item();
//$new_item->name = 'Moby Dick or the Whale';
/*echo (Item::$count)."<br>";
$new_item = new Item('Moby Dick or the Whale','Default description');
$new_item->name = 'Roadside picnic';
echo $new_item->reading()."<br>";
$another_item = new Item('Berserk','qwerty');
echo(Item::$count);*/
//Item::showCount();
$example1=new Rectangle(1,2);
$example2=new Triangle(1,2,3);
$example3=new Square(2);
$example4=new Rectangle(2,3);
$example5=new Triangle(4,5,3);
$example6=new Square(3);
echo $example1->getArea();
echo $example2->getArea();
echo $example3->getArea();
echo $example4->getArea();
echo $example5->getArea();
echo $example6->getArea();
 ?>