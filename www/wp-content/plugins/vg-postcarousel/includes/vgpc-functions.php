<?php
function vgpc_build_list_categories($parent = 0, $active = array(), $level = "")
{
	$cats = get_terms('category' , array('hide_empty' => false, 'hierarchical' => true, 'parent' => $parent));
	
	if(!empty($cats)) {
		foreach($cats as $cat) {
			$return  .= '<option value="'.$cat->term_id.'"'.((in_array($cat->term_id, $active)) ? ' selected="selected"' : '').'>'.$level.$cat->name.'</option>';
			$return  .= vgpc_build_list_categories($cat->term_id, $active, $level . "--");
		}		
	}
	
	return $return;
}


function vgpc_get_all_themes()
{
	$plugin_themes_dir 	= str_replace("includes/", "", plugin_dir_path(__FILE__)) . "themes";
	$plugin_themes 		= vgpc_get_all_folders($plugin_themes_dir);
	
	$theme_themes_dir	= get_template_directory() . "/vgpc-themes";
	$theme_themes 		= vgpc_get_all_folders($theme_themes_dir);
	
	$vgpc_themes = array_merge($plugin_themes, $theme_themes);
	asort($vgpc_themes);
	
	return $vgpc_themes;
}


function vgpc_get_all_folders($dir)
{
	$result = array();
	$cdir  	= scandir($dir); 
	
	foreach($cdir as $key => $value)
	{
		if(!in_array($value, array(".", "..")))
		{
			if(is_dir($dir . DIRECTORY_SEPARATOR . $value))
			{
				$result[] = $value;
			}			
		}
	}
	
	return $result;
}


function vgpc_get_theme_path($theme)
{
	$theme_array = array();
	
	$theme_theme_path	= get_template_directory() . "/vgpc-themes/" . $theme;
	$plugin_theme_path	= str_replace("includes/", "", plugin_dir_path(__FILE__)) . "themes/" . $theme;
	
	if(is_dir($theme_theme_path)) {
		$theme_array["url"]	 = get_template_directory_uri() . "/vgpc-themes/" . $theme;
		$theme_array["dir"]  = $theme_theme_path;
		$theme_array["func"] = "vgpc_body_" . $theme;
	}
	else {
		$theme_array["url"]  = vgpc_plugin_url . "themes/" . $theme;
		$theme_array["dir"]  = $plugin_theme_path;
		$theme_array["func"] = "vgpc_body_" . $theme;
	}
	
	return $theme_array;
}


function vgpc_substrwords($text, $maxchar, $end = '...')
{
    $text = strip_tags($text);
	
	if(strlen($text) > $maxchar || $text == '')
	{
        $words  = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
		
        while(1)
		{
            $length = strlen($output) + strlen($words[$i]);
            if($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++ $i;
            }
        }
        $output .= $end;
    } 
    else
	{
        $output = $text;
    }
    
	return $output;
}


function vgpc_get_categories($post_id)
{
	$cats = array();
	foreach(wp_get_post_categories($post_id) as $c)
	{
		$cat  = get_category($c);
		$link = get_category_link($cat->cat_ID);
		$text = '<a href="' . esc_url($link) . '" title="' . esc_attr($cat->name) . '">' . $cat->name . '</a>';
		array_push($cats, $text);
	}

	if(sizeOf($cats)>0) {
		$post_categories = implode(', ',$cats);
	}
	else {
		$post_categories = __("Not Assigned", "vgpc");
	}
	
	return $post_categories;
}