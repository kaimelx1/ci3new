<?php

// inside_top_menu CONFIG

$i = 0;
$table_columns[$i]['name'] = 'country_id';
$table_columns[$i]['text'] = 'ID';
$table_columns[$i]['column_width'] = '35';
$table_columns[$i]['in_crud'] = true;
$i++;
$table_columns[$i]['name'] = 'country_name';
$table_columns[$i]['text'] = 'Country Title';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'text';
$table_columns[$i]['in_crud'] = true;

$i++;
$table_columns[$i]['name'] = 'country_alias';
$table_columns[$i]['text'] = 'URL Alias';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'text';
$table_columns[$i]['help'] = 'For SEO URL (optional)';
$table_columns[$i]['in_crud'] = true;

$i++;
$table_columns[$i]['name'] = 'country_create_date';
$table_columns[$i]['text'] = 'Create Date';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'date';
$table_columns[$i]['in_crud'] = true;
$i++;
$table_columns[$i]['name'] = 'country_type';
$table_columns[$i]['text'] = 'Type';
$table_columns[$i]['tab'] = 'main';
$variants = array();
  	$variants[0]['id'] = '1';$variants[0]['name']="Europe";
	$variants[1]['id'] = '2';$variants[1]['name']="Asia";
	$variants[2]['id'] = '3';$variants[2]['name']="North America";
	$variants[3]['id'] = '4';$variants[3]['name']="South America";
	$variants[4]['id'] = '5';$variants[4]['name']="Africa";
$table_columns[$i]['variants'] = $variants;
$table_columns[$i]['input_type'] = 'select';

$i++;
$table_columns[$i]['name'] = 'country_desc';
$table_columns[$i]['text'] = 'Description';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'html';
$table_columns[$i]['help'] = 'Short text, for preview.';
$table_columns[$i]['defend_filter'] = 2;

$i++;
$table_columns[$i]['name'] = 'country_html';
$table_columns[$i]['text'] = 'HTML';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'html';
$table_columns[$i]['defend_filter'] = "A";

$i++;
$table_columns[$i]['name'] = 'country_img';
$table_columns[$i]['text'] = 'Image (540 x ?)';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'image';
$table_columns[$i]['folder'] = 'country_img';
$table_columns[$i]['in_crud'] = true;

$i++;
$table_columns[$i]['name'] = 'country_priority';
$table_columns[$i]['text'] = 'Priority';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'text';
$table_columns[$i]['in_crud'] = true;

$i++;
$table_columns[$i]['name'] = 'country_invisible';
$table_columns[$i]['text'] = 'Invisible';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'select-checkbox';
$table_columns[$i]['in_crud'] = true;

$i++;
$table_columns[$i]['name'] = 'country_seo_title';
$table_columns[$i]['text'] = 'SEO Title';
$table_columns[$i]['tab'] = 'seo';
$table_columns[$i]['input_type'] = 'text';
$table_columns[$i]['in_crud'] = true;
$i++;
$table_columns[$i]['name'] = 'country_seo_description';
$table_columns[$i]['text'] = 'SEO Description';
$table_columns[$i]['tab'] = 'seo';
$table_columns[$i]['input_type'] = 'text';
$table_columns[$i]['in_crud'] = true;
$i++;
$table_columns[$i]['name'] = 'country_seo_keywords';
$table_columns[$i]['text'] = 'SEO KeyWords';
$table_columns[$i]['tab'] = 'seo';
$table_columns[$i]['input_type'] = 'text';
$table_columns[$i]['in_crud'] = true;

$i++;
$table_columns[$i]['name'] = 'country_user_id';
$table_columns[$i]['text'] = 'User Author';
$table_columns[$i]['tab'] = 'main';
$table_columns[$i]['input_type'] = 'select_from_table_chosen';

$table_columns[$i]['select_index'] = 'id';
$table_columns[$i]['select_field'] = 'email';
$table_columns[$i]['select_table'] = 'users';
$table_columns[$i]['filter'] = true;
$table_columns[$i]['in_crud'] = true;
$table_columns[$i]['help'] = 'Help Info...';



$table_config['key'] = 'country_id';

// System names: access = Access System, Chat = Chat communication
$table_config['cell_tabs_arr'] = Array (
	'main' => 'Main',
	'rel' => 'Relations',
	'seo' => 'SEO',
	'chat' => 'Chat'
);

$i=0;
$adv_rel_inputs[$i]['name'] = 'rel_cities_countries';
$adv_rel_inputs[$i]['input_type'] = 'many2many';
$adv_rel_inputs[$i]['text'] = 'Cities';
$adv_rel_inputs[$i]['help'] = 'Relations';
$adv_rel_inputs[$i]['table'] = 'it_cities';
$adv_rel_inputs[$i]['rel_table'] = 'it_rel_cities_countries';
$adv_rel_inputs[$i]['this_key'] = 'country_id';
$adv_rel_inputs[$i]['rel_key'] = 'country_id';
$adv_rel_inputs[$i]['rel_join'] = 'city_id';
$adv_rel_inputs[$i]['join_key'] = 'city_id';
$adv_rel_inputs[$i]['join_name'] = 'city_name';
$adv_rel_inputs[$i]['tab'] = 'rel';

?>