<?php
/**
 *@author Selassie Golloh
 *@version 1.0
 **/
include_once('./classes/searchclass.php');

class SearchController
{
     
	function searchkeywords($keyword)
	{
		$searchClass = new search();
		$searchClass->searchkeywords($keyword);
		return $searchClass->fetchResultObject();
	}

}

?>