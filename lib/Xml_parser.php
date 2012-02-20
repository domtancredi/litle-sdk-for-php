<?php
#error_reporting(E_ALL);
#ini_set('display_errors', '1');

// =begin
// Copyright (c) 2011 Litle & Co.

// Permission is hereby granted, free of charge, to any person
// obtaining a copy of this software and associated documentation
// files (the "Software"), to deal in the Software without
// restriction, including without limitation the rights to use,
// copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the
// Software is furnished to do so, subject to the following
// conditions:

// The above copyright notice and this permission notice shall be
// included in all copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
// EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
// OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
// NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
// HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
// WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
// FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
// OTHER DEALINGS IN THE SOFTWARE.
// =end
// class and methods to parse a XML document into an object
class Xml_parser{

	function parser($xml){
		$parser    =    xml_parser_create('UTF-8');//Create an XML parser
		#xml_set_element_handler($Parser, 'StartHandler', 'EndHandler');
		#xml_set_character_data_handler($xml_parser, "contents");
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $xml, $array);// Parse XML data into an array structure
		xml_parser_free($parser);//Free an XML parser
		return $array;
	}

	function domParser($xml)
	{
		#$doc = new DomDocument($xml);
		$doc = new DOMDocument();
		$doc->loadXML($xml);
		return $doc;
	}
	
	function get_node($xml, $string)
	{
		$books = $xml->getElementsByTagName($string);
		#echo $books->nodeValue, PHP_EOL;
		foreach ($books as $book) {
			$val = $book->nodeValue;
		}
		return $val;
	}
}
?>