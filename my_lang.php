<?php
$rules = [
	  ['if', 'IF'],
	  ['\(', 'LEFT_PAREN'],
	  ['\d+', 'INTEGER'],
	  ['\)', 'RIGHT_PAREN'],
	  ['\{', 'LEFT_BRACE'],
	  ['\}', 'RIGHT_BRACE'],
	  ['else', 'ELSE'],
	  ['^\"\w*[^\"]*\"', 'STRING_QUOTES'], 
	  ['print', 'PRINT'],
	  ['\"\w*\"', 'STRING'],
      	  ['<=>', 'COMBINED_OPERATOR'],
	  ['<>', 'NOT_SAME'],
	  ['\+', 'SUM'],
	  ['\-', 'SUBTRACTION'],
	  ['**', 'EXPONENTIATION'],
	  ['*', 'Multiplication'],
	  ['>=', 'GREATER_EQUAL'],	  
	  ['<=', 'LESS_EQUAL'],
	  ['===', 'EQUAL_TYPE'],
	  ['==', 'EQUAL'],
	  ['!==', 'TYPE_NOT_EQUAL'],
	  ['!=', 'NOT_EQUAL'],
	  ['!', 'NOT_TRUE'],
	  [';', 'SEMI_COLON'],
	  ['<', 'LESS_THAN'],
	  ['>', 'GREATER_THAN'],
	  ['=', 'DECLARATION'],
	  ['\|\|', 'OPERATOR_OR'],
	  ['\&\&', 'OPERATOR_AND'],
	  ['var \w*', 'VARIABLE_DECLARATION'],
	  ['%', 'MODULO'],
	  ['\/', 'DIVISION'],
	  ['function \w*\(.*\)', 'FUNCTION_DECLARATION'],
	  ['\w*\(.*\)', 'FUNCTION_CALL'],
	  ['^\w{1}', 'VARIABLE']
	  ];

$code = strtolower('function hello(x, y)
{
  print x;
  print y;
}

var v = 3 + 3;
v = 12 / 3;
if (v < 4)
{
 print "salut";
 print "le monde";
}
else
{
 print("ET BAH NON");
}
hello(5, "Hello !");
');
$result = [];

while ($code)
  {
    $code = trim($code);
    $valid = false;
    foreach ($rules as $rule)
      {
	$pattern = "/^" . $rule[0] . "/";
	$type = $rule[1];

	if (preg_match($pattern, $code, $capture))
	  {
	    $result[] = [
			 'type' => $type,
			 'value' => $capture[0],
			 ];
	    $valid = true;
	    $code = substr($code, strlen($capture[0]));
	    break;
	  }
      }
    if (!$valid)
      {
	var_dump($result);
	exit('Unable to find a rule: ' . $code . "\n");
      }
  }
var_dump($result);