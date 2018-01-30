<?php

function renderNode($node) {

	$html = '<ul>';

	if( $node->isLeaf() ) {
		$html .= "<a href=$node->name <li>" . $node->name . '</li></a>';
	} else {
		$html .= "<a href=$node->name <li>" . $node->name;

		$html .= '<ul>';

		foreach($node->children as $child)
			$html .= renderNode($child);

		$html .= '</ul>';

		$html .= '</li></a>';
	}

	$html .= '</ul>';

	return $html;
}