<?php

// This is a PLUGIN TEMPLATE.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Uncomment and edit this line to override:
#$plugin['name'] = 'glz_custom_fields';

$plugin['version'] = '1.1.4';
$plugin['author'] = 'Gerhard Lazu';
$plugin['author_uri'] = 'http://gerhardlazu.com/';
$plugin['description'] = 'Limitless Pimped Custom Fields';
$plugin['type'] = 1; // 0 for regular plugin; 1 if it includes admin-side code

// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
$plugin['allow_html_help'] = 1;

if (!defined('txpinterface'))
  @include_once('zem_tpl.php');

if (0) {
?>

# --- BEGIN PLUGIN HELP ---
<style type="text/css" media="screen,projection">
<!--
  #glz_custom_fields_help {
    margin: 0 auto;
    font-family: Verdana,"Lucida Grande",sans-serif;
    padding: 15px;
    background-color: #F7F7F7;
    border: 1px dotted #EBEBEB;
    width: 700px;
    color: #333;
    font-size: 12px;
    line-height:15px;
  }
  #glz_custom_fields_help p, #glz_custom_fields_help ul, #glz_custom_fields_help ol, #glz_custom_fields_help dl { 
    font-size: 12px;
    line-height: 15px; 
    margin-bottom: 15px; 
  }
  #glz_custom_fields_help ul {
    padding-left: 15px;
    list-style: square;
  }
  #glz_custom_fields_help ol {
    padding-left: 20px;
  }
  #glz_custom_fields_help a, #glz_custom_fields_help a.visited {
    color: #FF7B00;
    text-decoration: none;
    padding-bottom: 1px;
    border-bottom: 1px dotted #FF7B00;
  }
  #glz_custom_fields_help a:hover {
    color: #FFF;
    background-color: #FF7B00;
    border-bottom: 1px dotted #FF7B00;
  }
  #glz_custom_fields_help h1 {
    font-family: Georgia,Times,Serif;
    font-size: 24px;
    font-weight: normal;
    text-decoration: none;
    line-height: 30px;
    margin-bottom: 15px;
    color: #333;
    letter-spacing: -1px;
  }
  #glz_custom_fields_help h2 {  
    font-family: Georgia,Times,Serif;
    color: #FFF;
    font-size: 18px;
    font-weight: normal;
    line-height: 30px;
    margin-bottom: 15px;
    background-color: #C1C4C3;
    padding-left: 15px;
  }
  #glz_custom_fields_help strong {

  }
  #glz_custom_fields_help code {
    line-height: 16px;
    font-style: italic;
    font-family: Monaco,"Courier New", Courier, monospace;
    font-size-adjust: none;
    font-stretch: normal;
    font-variant: normal;
    font-weight: normal;
    font-size: 12px;
    color: #000;
  }
  #glz_custom_fields_help code.txp {
    background-color: #FFF6A9;
    font-family: Monaco,"Courier New", Courier, monospace;
    line-height: 30px;
    font-style: normal;
    padding: 2px 0;
    color: #000;
  }
-->
</style>

<div id="glz_custom_fields_help">
  <h1>glz_custom_fields, limitless pimped custom fields</h1>

  <p>If you feel totally lost, there is a screencast showing the basics of this plugin: <a href="http://gerhardlazu.com/file_download/15" title="glz_custom_fields, Limitless Pimped Custom Fields">glz_custom_fields_unveiled.mov</a>. The post associated with this screencast is here: <a href="http://gerhardlazu.com/blog/50/glz_custom_fields-unveiled" title="glz_custom_fields unveiled">glz_custom_fields unveiled</a>.</p>

  <h2>Requirements</h2>
  <ul>
   <li>minimum <strong>TXP 4</strong> (<a href="http://www.tetpattern.com/download" title="Latest Stable Textpattern Download">TXP 4.0.6</a> recommended)</li>
   <li><strong>jquery.js</strong> present in <strong>textpattern</strong> folder. Please make sure your jQuery is at least v1.2.</li>
   <li>preferably, a clean TXP install. If you have been using various custom fields hacks, <strong>PLEASE back-up your database</strong> before using this plugin. While it won't delete anything automatically, you can delete all your custom fields data (<strong>and I really mean all of it</strong>) if not careful. We still don't have an automatic import functionality, but if you haven't performed any hacks on the TXP's default custom fields don't worry, integration will be seamless (as will all upgrades from glz_custom_fields 1.0). Having said that, database back-up is <strong>STRONGLY</strong> advised.</li>
   <li>unfortunately, a hack is required to get custom fields > 10 on single articles, please check this page: <a href="http://gerhardlazu.com/blog/51/glz_custom_fields-11-released">glz_custom_fields 1.1 released</a></li>
  </ul>

  <h2>Usage and Options</h2>
  <p>Because this is a back-end plugin primarily, there are only a few front-end functions:</p>

  <code class="txp">&lt;txp:glz_if_custom_field name="Rating" val="4">...&lt;/txp:glz_if_custom_field></code>
  <p>This is similar to <code>&lt;txp:if_custom_field /&gt;</code> so please refer to the <a href="#">TextBook</a> for documentation. The only difference is that this tag will look past custom_10 and it searches custom fields with multiple values nicely (e.g. value 1|value 2|value 3).</p>

  <code class="txp">&lt;txp:glz_custom_field name="Rating" /></code>
  <p>This is similar to <code>&lt;txp:custom_field /&gt;</code> so please refer to the <a href="#">TextBook</a> for documentation. The only difference is that this tag will look past custom_10.</p>

  <code class="txp">&lt;txp:glz_custom_fields_search_form results_page="listings" searchby="Area,City,Price" /></code>
  <p>This builds a nice search form on the front-end (only selects so far).</p>
  <ul>
  <li><code>results_page</code> - which page (section) should the submit button take the user to (<code>default</code> by default)</li>
  <li><code>searchby (MUST BE SET)</code> - which custom fields should we search by and in what order? (<code>empty</code> by default)</li>
  </ul>

  <code class="txp">&lt;txp:glz_article limit="100" no_results="no_results" /></code>
  <p>This needs to be used instead of <code>txp:article</code> where you want the search results to appear. We need to "inject" our extra custom fields in the search query and modify it slightly. This is a straight copy of <code>article()</code> from TXP 4.0.6 (r2085) with some "magical dust" : ).</p>
  <p>This is not too obvious so please pay attention. If our custom search tag is set to land on section "listings" (which we define in <code>glz_custom_fields_search_form</code>), the articles you want searching <b>must</b> be belong to this section. For example, if our search points to section "listings" but our articles are saved under section "properties", there will be no matches and thus we will be forwarded to <b>no_results</b> page. In this case, what we might want to do, is set <b>results_page</b> in <code>glz_custom_fields_search_form</code> to "properties".</p>
  <ul>
  <li><code>no_results</code> - if no matching results are found, this is the page (section) where the users will be redirected (<code>no_results</code> by default)</li>
  </ul>
  
  <code class="txp">&lt;txp:glz_article_custom limit="5" no_results="no_results" form="some_form" /></code>
  <p>This needs to be used instead of <code>txp:article_custom</code> where you want the search results to appear. We need to "inject" our extra custom fields in the search query and modify it slightly. This is a straight copy of <code>article_custom()</code> from TXP 4.0.6 (r2085) with some "magical dust" : ).</p>
  <p>This is not too obvious so please pay attention. If our custom search tag is set to land on section "listings" (which we define in <code>glz_custom_fields_search_form</code>), the articles you want searching <b>must</b> be belong to this section. For example, if our search points to section "listings" but our articles are saved under section "properties", there will be no matches and thus we will be forwarded to <b>no_results</b> page. In this case, what we might want to do, is set <b>results_page</b> in <code>glz_custom_fields_search_form</code> to "properties".</p>
  <ul>
  <li><code>no_results</code> - if no matching results are found, this is the page (section) where the users will be redirected (<code>no_results</code> by default)</li>
  </ul>

  <h2>Tricks</h2>
  <p>Actually, there is a single one, but I'll let you know if I'll implement more ; ).</p>
  <p>If you want to define ranges, do the following for the range name (custom set name): <code>Price range &amp;pound;(after)</code></p>
  <ul>
  <li><code>range</code> - this is really important and <strong>must</strong> be present for the range to work correctly</li>
  <li><code>&amp;pound;</code> - don't use straight symbols (like &euro; or &pound;) but entity ones e.g. &amp;pound; &amp; &amp;euro;</li>
  <li><code>(after)</code> - don't leave any spaces after the measuring unit and (after). This basically says where to add the measuring unit - <code>(before)</code> is default. You might have &pound;10-&pound;20 but 10m<sup>3</sup>-20m<sup>3</sup></li>
  </ul>

  <p>Ranges are defined 10-20, 21-30 etc. (no measuring units - they get pulled from the custom set name).</p>

  <h2>HEEEELP!</h2>
  <p>If anything goes wrong or you discover a bug:</p>
  <ol>
   <li>stay calm : )</li>
   <li>drop a line to <a href="mailto:mail@gerhardlazu.com?Subject:glz_custom_fields needs your attention">mail@gerhardlazu.com</a></li>
   <li>wait patiently for an answer - sometimes things can get really hectic on my end as well</li>
   <li>enjoy the little things in life (like TXP)</li>
  </ol>

  <h2>Colophon & Limitations</h2>
  <p><strong>PLEASE back-up your database</strong> before using this plugin. It won't delete anything automatically, but if something goes wrong, you might end up deleting all your custom fields data (<strong>and I really mean all of it</strong>).</p>
  <p>If you don't have JavaScript enabled in your browser, things will blow up - GUARANTEED.</p>
</div>
# --- END PLUGIN HELP ---
<?php
}



# --- BEGIN PLUGIN CODE ---
//<?php
/**
glz_custom_fields plugin, FROM UK WITH LOVE

@author Gerhard Lazu
@version 1.1.4
@copyright Gerhard Lazu, 17 Apr, 2008
@package TXP 4.0.6 (2805)
@contributors:  Sam Weiss, redbot, Manfre, Vladimir
*/

// checks if all tables exists and everything is setup properly
glz_custom_fields_install();

if (txpinterface == "admin") {
  // we need some stylesheets & JS
  ob_start("glz_custom_fields_css_js");
  
  // we are setting some globals here, mainly repetitive SQL queries
  global $all_custom_fields;
  $all_custom_fields = glz_custom_fields_MySQL("all");
  
  // Custom Fields tab under Extensions
  add_privs('glz_custom_fields', '1');
  register_tab("extensions", "glz_custom_fields", "Custom Fields");
  register_callback("glz_custom_fields", "glz_custom_fields");
  
  // we need to make sure that all custom field values will be converted to strings first - think checkboxes & multi-selects
  if ( (gps("step") == "edit") || (gps("step") == "create") )
    register_callback("glz_custom_fields_before_save", "article", '', 1);
  // if we edit or create a new article, save our extra custom fields (> 10)
  if ( (gps("step") == "edit") || (gps("step") == "create") )
    register_callback("glz_custom_fields_save", "article");
  
  // YES, finally the default custom fields are replaced by the new, pimped ones : )
  register_callback("glz_custom_fields_replace", "article");

}

// -------------------------------------------------------------
// everything is happening in this function... generates the content for Extensions > Custom Fields
function glz_custom_fields() {
  global $event, $all_custom_fields;
  
  // set message to empty if no events will be present
  $message = '';
  
  // we have $_POST, let's see if there is any CRUD
  if ( $_POST ) {
    $incoming = stripPost();
    extract($incoming);

    // create an empty $value if it's not set in the $_POST
    if ( !isset($value) ) $value = '';
    
    // we are deleting a new custom field
    if ( gps('delete') ) {
      glz_custom_fields_MySQL("delete", $custom_set, PFX."txp_prefs");
      glz_custom_fields_MySQL("delete", $custom_set, PFX."txp_lang");
      glz_custom_fields_MySQL("delete", $custom_set, PFX."custom_fields");
      
      glz_custom_fields_MySQL("delete", glz_custom_number($custom_set), PFX."textpattern");
      
      $message = glz_custom_fields_gTxt("deleted", array('{custom_set_name}' => $custom_set_name));
    }
    
    // we are resetting one of the mighty 10
    if ( gps('reset') ) {
      glz_custom_fields_MySQL("reset", $custom_set, PFX."txp_prefs");
      glz_custom_fields_MySQL("delete", $custom_set, PFX."custom_fields");

      glz_custom_fields_MySQL("reset", glz_custom_number($custom_set), PFX."textpattern");
      
      $message = glz_custom_fields_gTxt("reset", array('{custom_set_name}' => $custom_set_name));
    }
    
    // we are adding a new custom field
    if ( gps("custom_field_number") ) {
      $custom_set_name = gps("custom_set_name");
      
      // if no name was specified, abort
      if ( !$custom_set_name ) {
        $message = glz_custom_fields_gTxt("no_name");
      }
      else {
        $name_exists = glz_check_custom_set_name($all_custom_fields, $custom_set_name);
        
        // if name doesn't exist
        if ( $name_exists == FALSE ) {
          glz_custom_fields_MySQL("new", $custom_set_name, PFX."txp_prefs", array(
            'custom_field_number' => $custom_field_number,
            'custom_set_type'   => $custom_set_type
          ));
          glz_custom_fields_MySQL("new", $custom_set_name, PFX."txp_lang", array(
            'custom_field_number' => $custom_field_number,
            'lang'          => $GLOBALS['prefs']['language']
          ));
          glz_custom_fields_MySQL("new", $custom_set_name, PFX."textpattern", array(
            'custom_field_number' => $custom_field_number,
            'after'         => intval($custom_field_number-1)
          ));
          glz_custom_fields_MySQL("new", $custom_set_name, PFX."custom_fields", array(
            'custom_field_number' => $custom_field_number,
            'value' => $value
          ));
          
          $message = glz_custom_fields_gTxt("created", array('{custom_set_name}' => $custom_set_name));
        }
        // name exists, abort
        else {
          $message = glz_custom_fields_gTxt("exists", array('{custom_set_name}' => $custom_set_name));
        }
      }
    }
    
    // we are editing an existing custom field
    if ( gps('save') ) {
      if ( !empty($custom_set_name) ) {
        $name_exists = glz_check_custom_set_name($all_custom_fields, $custom_set_name, $custom_set);

        // if name doesn't exist
        if ( $name_exists == FALSE ) {
          glz_custom_fields_MySQL("update", $custom_set, PFX."txp_prefs", array(
            'custom_set_type'   => $custom_set_type,
            'custom_set_name'   => $custom_set_name
          ));
          glz_custom_fields_MySQL("delete", $custom_set, PFX."custom_fields");
          glz_custom_fields_MySQL("new", $custom_set_name, PFX."custom_fields", array(
            'custom_set'    => $custom_set,
            'value' => $value
          ));

          $message = glz_custom_fields_gTxt("updated", array('{custom_set_name}' => $custom_set_name));
        }
        // name exists, abort
        else {
          $message = glz_custom_fields_gTxt("exists", array('{custom_set_name}' => $custom_set_name));
        }
      }
      else {
        $message = glz_custom_fields_gTxt('no_name');
      }
    }
    
    // need to re-fetch data since things modified
    $all_custom_fields = glz_custom_fields_MySQL("all");

  }

  pagetop("Custom Fields", $message);
  
  // the table with all custom fields follows
  echo
    n.'<table cellspacing="0" id="glz_custom_fields" class="stripeMe">'.n.
    ' <thead>'.n.
    '   <tr>'.n.
    '     <td>Custom set</td>'.n.
    '     <td>Name</td>'.n.
    '     <td colspan="2">Type</td>'.n.
    '   </tr>'.n.
    ' </thead>'.n.
    ' <tbody>'.n;
  
  // used a for so that we didn't have to create a counter separately
  for ( $i=0; $i < count($all_custom_fields) ; $i++ ) { 
    extract($all_custom_fields[$i]);

    // first 10 fields cannot be deleted, just reset
    if ( $i < 10 ) {
      // can't reset a custom field that is not set
      $reset_delete = ( $custom_set_name ) ? glz_form_buttons("reset", "Reset", $custom_set, $custom_set_name, $custom_set_type, 'return confirm(\'By proceeding you will RESET ALL data in `textpattern` and `custom_fields` tables for `'.$custom_set_name.'`. Are you sure?\');') : NULL;
    }
    else {
      $reset_delete = glz_form_buttons("delete", "Delete", $custom_set, $custom_set_name, $custom_set_type, 'return confirm(\'By proceeding you will DELETE ALL data in `textpattern` and `custom_fields` tables for `'.$custom_set_name.'`. Are you sure?\');');
    }

    echo 
    '   <tr>'.n.
    '     <td class="custom_set">'.$custom_set.'</td>'.n.
    '     <td class="custom_set_name">'.$custom_set_name.'</td>'.n.
    '     <td class="type">'.glz_custom_fields_gTxt($custom_set_type).'</td>'.n.
    '     <td class="events">'.$reset_delete.sp.glz_form_buttons("edit", "Edit", $custom_set, htmlspecialchars($custom_set_name), $custom_set_type).'</td>'.n.
    '   </tr>'.n;
  }

  echo
    ' </tbody>'.n.
    '</table>'.n;
    
  // the form where custom fields are being added/edited
  $legend = gps('edit') ? 
    'Edit '.gps('custom_set') : 
    'Add new custom field';
  
  $custom_field = gps('edit') ? 
    '<input name="custom_set" value="'.gps('custom_set').'" type="hidden" />' :
    '<input name="custom_field_number" value="'.glz_custom_next($all_custom_fields).'" type="hidden" />';
  
  $custom_set = gps('edit') ?
    gps('custom_set') :
    NULL;
  
  $custom_name = gps('edit') ?
    gps('custom_set_name') :
    NULL;
  
  $arr_custom_set_types = glz_custom_set_types();
  
  $custom_set_types = NULL;
  foreach ( $arr_custom_set_types as $custom_type ) {
    $selected = ( gps('edit') && gps('custom_set_type') == $custom_type ) ? ' selected="selected"' : NULL;
    $custom_set_types .= '<option value="'.$custom_type.'"'.$selected.'>'.glz_custom_fields_gTxt($custom_type).'</option>'.n;
  }
  // fetching the values for this custom field
  if ( gps('edit') ) {
    $arr_values = glz_custom_fields_MySQL("values", $custom_set, '', array('custom_set_name' => $custom_field['custom_set_name']));
    $values = ( $arr_values ) ? implode("\r\n", $arr_values) : '';
  }
  else {
    $values = '';
  }
  
  $action = gps('edit') ?
    '<input name="save" value="Save" type="submit" class="publish" />' :
    '<input name="add_new" value="Add new" type="submit" class="publish" />';
  
  // ok, all is set, let's build the form
  echo
    '<form method="post" action="index.php" id="add_edit_custom_field">'.n.
    '<input name="event" value="glz_custom_fields" type="hidden" />'.n.
    $custom_field.n.
    '<fieldset>'.n.
    ' <legend>'.$legend.'</legend>'.n.
    ' <p>
        <label for="custom_set_name">Name:</label>
        <input name="custom_set_name" value="'.htmlspecialchars($custom_name).'" id="custom_set_name" />
      </p>'.n.
    ' <p>
        <label for="custom_set_type">Type:</label>
        <select name="custom_set_type" id="type">
    '.      $custom_set_types.'
        </select>
      </p>'.n.
    ' <p>
        <label for="value">Value:<br /><em>Each value on a separate line</em></label>
        <textarea name="value" id="value">'.$values.'</textarea>
      </p>'.n.
    ' '.$action.n.
    '</fieldset>'.n.
    '</form>'.n;

}

// -------------------------------------------------------------
// replaces the default custom fields under write tab
function glz_custom_fields_replace() {
  global $all_custom_fields;
  // get all custom fields & keep only the ones which are set
  $arr_custom_fields = array_filter($all_custom_fields, "glz_check_custom_set");
  
  // DEBUG
  // dmp($arr_custom_fields);
  
  if ( is_array($arr_custom_fields) && !empty($arr_custom_fields) ) {
    // get all custom fields values for this article
    $arr_article_customs = glz_custom_fields_MySQL("article_customs", glz_get_article_id(), '', $arr_custom_fields);
    if ( is_array($arr_article_customs) ) extract($arr_article_customs);

    // let's initialize our output
    $out = NULL;

    // let's see which custom fields are set
    foreach ( $arr_custom_fields as $custom_field ) {
      // get all possible/default value(s) for this custom field from custom_fields table
      $arr_custom_field_values = glz_custom_fields_MySQL("values", $custom_field['custom_set'], '', array('custom_set_name' => $custom_field['custom_set_name']));

      // DEBUG
      // dmp($arr_custom_field_values);

      //custom_set without "_set" e.g. custom_1_set => custom_1
      $custom_set = glz_custom_number($custom_field['custom_set']);

      // if current article holds no value for this custom field, make it empty
      $custom_value = ( !empty($$custom_set) ) ? $$custom_set : '';

      // the way our custom field value is going to look like
      switch ( $custom_field['custom_set_type'] ) {
        case "text_input":
          $custom_set_value = fInput("text", $custom_set, $custom_value, "edit", "", "", "22", "", $custom_set);
          break;

        case "select":
          $custom_set_value = glz_selectInput($custom_set, $arr_custom_field_values, $custom_value, 1);
          break;
        
        case "multi-select":
          $custom_set_value = glz_selectInput($custom_set, $arr_custom_field_values, $custom_value, '', 1);
          break;

        case "checkbox":
            $custom_set_value = glz_checkbox($custom_set, $arr_custom_field_values, $custom_value);
          break;

        case "radio":
          $custom_set_value = glz_radio($custom_set, $arr_custom_field_values, $custom_value);
          break;

        // if none of the custom_set_types fit - WHICH HINTS TO A BUG - text input is default
        default:
          // $custom_set_value = fInput("text", $custom_set, $$custom_set, "edit", "", "", "22", "", $custom_set);
          $custom_set_value = 'Type not supported yet.';
          break;
      }

      //
      $out .= graf(
        "<label for=\"$custom_set\">{$custom_field['custom_set_name']}</label><br />$custom_set_value", " class=\"glz_custom_field\""
      );
    }
    // DEBUG
    // dmp($out);
  
    echo
    '<script type="text/javascript">
    <!--//--><![CDATA[//><!--

    $(document).ready(function() {
      // removes all existing custom fields
      $("p:has(label[for*=custom-])").remove();
      $("p:has(label[@for=override-form])").after(\''.$out.'\');
    });
    //--><!]]>
    </script>';
  }
}

// -------------------------------------------------------------
// prep our custom fields for the db (watch out for checkboxes, they might have multiple values)
function glz_custom_fields_before_save() {
  // keep only the custom fields
  foreach ($_POST as $key => $value) {
    //check for custom fields with multiple values e.g. arrays
    if ( strstr($key, 'custom_') && is_array($value) ) {
      $value = implode($value, '|');
      // feed our custom fields back into the $_POST
      $_POST[$key] = $value;
    }
  }
  // DEBUG
  // dmp($_POST);
}

// -------------------------------------------------------------
// save our pimped custom fields (the ones above 10)
function glz_custom_fields_save() {
  $ID = glz_get_article_id();
  if ( $ID ) {
    //initialize $set
    $set = '';
    // see whether we have custom fields > 10
    foreach ($_POST as $key => $value) {
      if (strstr($key, 'custom_')) {
        list($rubbish, $digit) = explode("_", $key);
        // keep only the values that are above 10
        if ( $digit > 10 ) $set[] = "`$key`='$value'";
      }
    }
    // anything worthy saving?
    if ( is_array($set) ) {
      // DEBUG
      // dmp($set);
      // ok, update the custom fields 
      safe_update("textpattern", implode($set, ','), "`ID`='$ID'");
    }
  }
}



###################
##### HELPERS #####
###################

// -------------------------------------------------------------
// edit/delete buttons in custom_fields table require a form each
function glz_form_buttons($action, $value, $custom_set, $custom_set_name, $custom_set_type, $onsubmit='') {
  $onsubmit = ($onsubmit) ? 'onsubmit="'.$onsubmit.'"' : '';
  
  return 
    '<form method="post" action="index.php" '.$onsubmit.'>
      <input name="custom_set" value="'.$custom_set.'" type="hidden" />
      <input name="custom_set_name" value="'.$custom_set_name.'" type="hidden" />
      <input name="custom_set_type" value="'.$custom_set_type.'" type="hidden" />
      <input name="event" value="glz_custom_fields" type="hidden" />
      <input name="'.$action.'" value="'.$value.'" type="submit" />
    </form>';
}


// -------------------------------------------------------------
// the types our custom fields can take
function glz_custom_set_types() {
  return array(
    'text_input',
    'select',
    'multi-select',
//    'textarea', // scheduled for v1.2
    'checkbox',
    'radio'
  );
}


// -------------------------------------------------------------
// outputs only custom fields that have been set, i.e. have a name assigned to them
function glz_check_custom_set($var) {
  return !empty($var['custom_set_name']);
}


// -------------------------------------------------------------
// custom_set without "_set" e.g. custom_1_set => custom_1
// or custom set formatted for IDs e.g. custom-1
function glz_custom_number($custom_set, $delimiter="_") {
  $custom_field = substr($custom_set, 0, -4);
  if ($delimiter != "_")
    $custom_field = strstr($custom_field, "_", "-");
  
  return $custom_field;
}


// -------------------------------------------------------------
// custom_set digit e.g. custom_1_set => 1
function glz_custom_digit($custom_set) {
  $out = explode("_", $custom_set);
  // $out[0] will always be custom
  return $out[1];
}


// -------------------------------------------------------------
// removes empty values from arrays - used for new custom fields
function glz_arr_empty_values($value) {
  if ( !empty($value) ) return $value;
}


// -------------------------------------------------------------
// returns the custom set from a custom set name e.g. "Rating" gives us custom_1_set
function glz_get_custom_set($value) {
  global $all_custom_fields;
  
  // go through all custom fields and see if the one we're looking for exists
  foreach ( $all_custom_fields as $custom_field ) {
    if ( $custom_field['custom_set_name'] == $value ) {
      return $custom_field['custom_set'];
    }
  }
  // if it doesn't return error message
  trigger_error(glz_custom_fields_gTxt('doesnt_exist', array('{custom_set_name}' => $value)));
}


// -------------------------------------------------------------
// get the article ID, EVEN IF it's newly saved
function glz_get_article_id() {
  return ( !empty($GLOBALS['ID']) ? $GLOBALS['ID'] : gps('ID') );
}


// -------------------------------------------------------------
// helps with range formatting - just DRY
function glz_format_ranges($arr_values, $custom_set_name) {
  //initialize $out
  $out = '';
  foreach ( $arr_values as $key => $value ) {
    $key = $value;
    $out[$key] = ( strstr($custom_set_name, 'range') ) ? glz_custom_fields_range($value, $custom_set_name) : $value;
  }
  return $out;
}


// -------------------------------------------------------------
// acts as a callback for the above function
function glz_custom_fields_range($custom_value, $custom_set_name) {
  // last part of the string will be the range unit (e.g. $, &pound;, m<sup>3</sup> etc.)
  $nomenclature = array_pop(explode(' ', $custom_set_name));
  
  // see whether range unit should go after
  if ( strstr($nomenclature, '(after)') ) {
    // trim '(after)' from the measuring unit
    $nomenclature = substr($nomenclature, 0, -7);
    $after = 1;
  }
  
  // check whether it's a range or single value
  $arr_value = explode('-', $custom_value);
  if ( is_array($arr_value) ) {
    // initialize $out
    $out = '';
    foreach ( $arr_value as $value ) {
      // check whether nomenclature goes before or after
      $out[] = ( !isset($after) ) ? $nomenclature.number_format($value) : number_format($value).$nomenclature;
    }
    return implode('-',$out);
  }
  // our range is a single value
  else {
    // check whether nomenclature goes before or after
    return ( !isset($after) ) ? $nomenclature.number_format($value) : number_format($value).$nomenclature;
  }
}


// -------------------------------------------------------------
// returns the next available number for custom field
function glz_custom_next($arr_custom_fields) {
  // our custom field cannot be < 10
  for ( $i=9; $i < count($arr_custom_fields)+1; $i++ ) {
    if ( !isset($arr_custom_fields[$i]) )
      return intval($i+1);
    
    extract($arr_custom_fields[$i]);
    $arr_custom = explode('_', $custom_set);
    
    if ( intval($i+1) < intval($arr_custom['1']) )
      return intval($i+1);
  }
}


// -------------------------------------------------------------
// checks if the custom field name isn't already taken
function glz_check_custom_set_name($arr_custom_fields, $custom_set_name, $custom_set='') {
  foreach ( $arr_custom_fields as $arr_custom_set ) {
    if ( ($custom_set_name == $arr_custom_set['custom_set_name']) && (!empty($custom_set) && $custom_set != $arr_custom_set['custom_set']) )
      return TRUE;
  }
  
  return FALSE;
}


// -------------------------------------------------------------
// had to duplicate the default selectInput() because trimming \t and \n didn't work + some other mods
function glz_selectInput($name = '', $arr_values = '', $custom_value = '', $blank_first = '', $multi = '') {
  $out = array();

  foreach ($arr_values as $key => $value) {
    $selected = glz_selected_checked('selected', $key, $custom_value);
    $out[] = "<option value=\"$key\"{$selected}>$value</option>";
  }
  
  // we'll need the extra attributes as well as a name that will produce an array
  /**
    TODO Make this user-configurable
  */
  if ($multi) {
    $multi = ' multiple="multiple" size="3"';
    $name .= "[]";
  }
  
  return "<select id=\"$name\" name=\"$name\" class=\"list\"$multi>".
    ($blank_first ? "<option value=\"\"$selected></option>" : '').
    ( $out ? join('', $out) : '').
    "</select>";
}


// -------------------------------------------------------------
// had to duplicate the default checkbox() to keep the looping in here and check against existing value/s
function glz_checkbox($name = '', $arr_values = '', $custom_value = '') {
  $out = array();
  
  foreach ( $arr_values as $key => $value ) {
    $checked = glz_selected_checked('checked', $key, $custom_value);
    
    $value = htmlspecialchars($value);
    $out[] = "<input type=\"checkbox\" name=\"{$name}[]\" value=\"$key\" class=\"checkbox\" id=\"$key\"{$checked} /><label for=\"$key\">$value</label><br />";
  }

  return join('', $out);
}


// -------------------------------------------------------------
// had to duplicate the default radio() to keep the looping in here and check against existing value
/**
  TODO How do we reset radio fields?
*/
function glz_radio($name = '', $arr_values = '', $custom_value = '') {
  $out = array();
  
  foreach ( $arr_values as $key => $value ) {
    $checked = glz_selected_checked('checked', $key, $custom_value);
    
    $value = htmlspecialchars($value);
    $out[] = "<input type=\"radio\" name=\"$name\" value=\"$key\" class=\"radio\" id=\"$name-$key\"{$checked} /><label for=\"$name-$key\">$value</label><br />";
  }

  return join('', $out);
}


// -------------------------------------------------------------
// checking if this custom field has selected or checked values
function glz_selected_checked($nomenclature, $value, $custom_value = '') {
  // make an array if $custom_value contains multiple values
  if ( strstr($custom_value, '|') )
    $arr_custom_value = explode('|', $custom_value);
  
  if ( isset($arr_custom_value) )
    $out = ( in_array($value, $arr_custom_value) ) ? " $nomenclature=\"$nomenclature\"" : "";
  else
    $out = ($value == $custom_value) ? " $nomenclature=\"$nomenclature\"" : "";
  
  return $out;
}


// -------------------------------------------------------------
// PHP4 doesn't come with array_combine... Thank you redbot!
function php4_array_combine($keys, $values) {
  $result = array(); // initializing the array

  foreach ( array_map(null, $keys, $values) as $pair ) {
    $result[$pair[0]] = $pair[1];
  }

  return $result;
}


// -------------------------------------------------------------
// messages that will be available throughout this plugin
function glz_custom_fields_gTxt($get, $atts = array()) {
  $lang = array(
    'no_name'         => 'Ooops! <strong>custom set</strong> must have a name',
    'deleted'         => '<strong>{custom_set_name}</strong> was deleted',
    'reset'           => '<strong>{custom_set_name}</strong> was reset',
    'created'         => '<strong>{custom_set_name}</strong> was created',
    'updated'         => '<strong>{custom_set_name}</strong> was updated',
    'exists'          => 'Ooops! <strong>{custom_set_name}</strong> already exists',
    'doesnt_exist'    => 'Ooops! <strong>{custom_set_name}</strong> is not set',
    'text_input'      => 'Text Input',
    'select'          => 'Select',
    'multi-select'    => 'Multi-Select',
    'textarea'        => 'Textarea',
    'checkbox'        => 'Checkbox',
    'radio'           => 'Radio',
    'no_do'           => 'Ooops! No action specified for method, abort.',
    'not_specified'   => 'Ooops! {what} is not specified',
    'searchby_not_set' => '<strong>searcby</strong> cannot be left blank',
    'jquery_missing'  => 'Upgrade TXP to at least 4.0.5 or put <strong>jquery.js</strong> in your /textpattern folder. <a href="http://jquery.com" title="jQuery website">jQuery website</a>'
  );
  
  $out = ( strstr($lang[$get], "Ooops!") ) ? // Ooops! would appear 0 in the string...
      "<span class=\"red\">{$lang[$get]}</span>" : 
      $lang[$get];

  return strtr($out, $atts);
}



#################
##### MYSQL #####
#################

function glz_custom_fields_MySQL($do, $name='', $table='', $extra='') {
  if ( !empty($do) ) {
    switch ( $do ) {
      case 'all':
        return glz_all_custom_fields();
        break;
      
      case 'values':
        return glz_values_custom_field($name, $extra);
        break;
      
      case 'all_values' :
        return glz_all_existing_custom_values($name, $extra);
        break;
      
      case 'article_customs':
        return glz_article_custom_fields($name, $extra);
        break;
      
      case 'next_custom':
         return glz_next_empty_custom();
        break;
      
      case 'new':
        return glz_new_custom_field($name, $table, $extra);
        break;
      
      case 'update':
        return glz_update_custom_field($name, $table, $extra);
        break;
      
      case 'reset':
        glz_reset_custom_field($name, $table);
        break;
        
      case 'delete':
        glz_delete_custom_field($name, $table);
        break;
    }
  }
  else
    trigger_error(glz_custom_fields_gTxt('no_do'));
}


function glz_all_custom_fields() {
  $all_custom_fields = getRows("
    SELECT 
      `name` AS custom_set,
      `val` AS custom_set_name,
      `html` AS custom_set_type
    FROM
      `".PFX."txp_prefs`
    WHERE
      `event`='custom'
    ORDER BY 
      `position`
  ");
  return $all_custom_fields;
}


function glz_values_custom_field($name, $extra) {
  if ( is_array($extra) ) {
    extract($extra);
    
    if ( !empty($name) ) {
      $arr_values = getThings("
        SELECT
          `value`
        FROM
          `".PFX."custom_fields`
        WHERE
          `name` = '{$name}'
        ORDER BY
          `value`
      ");
    
      // have our values nicely sorted
      natsort($arr_values);
      
      // if this is a range, format ranges accordingly
      return glz_format_ranges($arr_values, $custom_set_name);
    }
  }
  else
    trigger_error(glz_custom_fields_gTxt('not_specified', array('{what}' => "extra attributes")));
}


function glz_all_existing_custom_values($name, $extra) {
  if ( is_array($extra) ) {
    extract($extra);
    
    if ( !empty($name) ) {
      $arr_values = getThings("
        SELECT DISTINCT 
          `$name`
        FROM
          `".PFX."textpattern`
        WHERE
          `Status` = '4'
        AND 
          `$name` <> ''
        ORDER BY 
          `$name`
        ");
  
      // have our values nicely sorted
      /**
        TODO User-configurable. Some folks didn't like this order.
      */
      natsort($arr_values);
      
      // prepare our array for checking
      $values_check = implode('::', $arr_values);
      
      // check if some of the values are multiple ones
      if ( strstr($values_check, '|') ) {
        // initialize $out
        $out = array();
        // put all values in an array
        foreach ( $arr_values as $value ) {
          $arr_values = explode('|', $value);
          $out = array_merge($out, $arr_values);
        }
        // keep only the unique ones
        $out = array_unique($out);
        // keys and values need to be the same
        return php4_array_combine($out, $out);
      }
      // check if this is a range
      else if ( strstr($values_check, '-') && strstr($custom_set_name, 'range') )
        // keys won't have the unit ($, £, m<sup>3</sup>, etc.) values will
        return glz_format_ranges($arr_values, $custom_set_name);
      else
        // keys and values need to be the same
        return php4_array_combine($arr_values, $arr_values);
      
    }
  }
  else
    trigger_error(glz_custom_fields_gTxt('not_specified', array('{what}' => "extra attributes")));
}


function glz_article_custom_fields($name, $extra) {
  if ( is_array($extra) ) {
    // see what custom fields we need to query for
    foreach ( $extra as $custom_set ) {
      $select[] = glz_custom_number($custom_set['custom_set']);
    }
    // prepare the select elements
    $select = implode(',', $select);
    
    $arr_article_customs = getRow("
      SELECT 
        $select
      FROM
        `".PFX."textpattern`
      WHERE
        `ID`='$name'
    ");
    
    return $arr_article_customs;
  }
  else
    trigger_error(glz_custom_fields_gTxt('not_specified', array('{what}' => "extra attributes")));
}


function glz_next_empty_custom() {
  global $all_custom_fields;
  
  foreach ( $all_custom_fields as $custom ) {
    if ( empty($custom['custom_set_name']) )
      return $custom['custom_set'];
  }
}


function glz_new_custom_field($name, $table, $extra) {
  if ( is_array($extra) ) {
    extract($extra);
    // DRYing up, we'll be using this variable quiet often
    $custom_set = ( isset($custom_field_number) ) ? "custom_{$custom_field_number}_set" : $custom_set;
    
    if ( ($table == PFX."txp_prefs")  ) {
      $query = "
        INSERT INTO 
          `".PFX."txp_prefs` (`prefs_id`,`name`,`val`,`type`,`event`,`html`,`position`) 
        VALUES 
          ('1','{$custom_set}','{$name}','1','custom','{$custom_set_type}',{$custom_field_number})
      ";
    }
    else if ( $table == PFX."txp_lang" ) {
      $query = "
        INSERT INTO 
          `".PFX."txp_lang` (`id`,`lang`,`name`,`event`,`data`,`lastmod`) 
        VALUES 
          ('','{$lang}','{$custom_set}','prefs','{$name}',now())
      ";
    }
    else if ( $table == PFX."textpattern" ) {
      $query = "
        ALTER TABLE
          `".PFX."textpattern`
        ADD
          `custom_{$custom_field_number}` varchar(255) NOT NULL DEFAULT ''
        AFTER
          `custom_{$after}`
      ";
    }
    else if ( $table == PFX."custom_fields" ) {
      $arr_values = array_filter(explode("\r\n", $value), 'glz_arr_empty_values');
      if ( is_array($arr_values) && !empty($arr_values) ) {
        // initialize null
        $insert = '';
        foreach ( $arr_values as $value ) {
          // don't insert empty values
          if ( !empty($value) )
            // if this is the last value, query will have to be different
            $insert .= ( end($arr_values) != $value ) ? "('{$custom_set}','{$value}')," : "('{$custom_set}','{$value}')";
        }
        $query = "
          INSERT INTO 
            `".PFX."custom_fields` (`name`,`value`)
          VALUES
            {$insert}
        ";
      }
    }
    if ( isset($query) && !empty($query) )
      safe_query($query);
  }
  else
    trigger_error(glz_custom_fields_gTxt('not_specified', array('{what}' => "extra attributes")));
}


function glz_update_custom_field($name, $table, $extra) {
  if ( is_array($extra) ) {
    extract($extra);
  
    if ( ($table == PFX."txp_prefs")  ) {
      $query = "
        UPDATE 
          `".PFX."txp_prefs`
        SET
          `val` = '{$custom_set_name}',
          `html` = '{$custom_set_type}' 
        WHERE
          `name`='{$name}'
      ";
    }
    
    safe_query($query);
  }
  else
    trigger_error(glz_custom_fields_gTxt('not_specified', array('{what}' => "extra attributes")));
}


function glz_reset_custom_field($name, $table) {
  if ( $table == PFX."txp_prefs" ) {
    $query = "
      UPDATE 
        `".PFX."txp_prefs`
      SET
        `val` = '',
        `html` = 'text_input'
      WHERE
        `name`='{$name}'
    ";
  }
  else if ( $table == PFX."textpattern" ) {
    $query = "
      UPDATE
        `".PFX."textpattern`
      SET
        `{$name}` = ''
    ";
  }
  
  safe_query($query);
}


function glz_delete_custom_field($name, $table) {
  // remember, custom fields under 10 MUST NOT be deleted
  if ( glz_custom_digit($name) > 10 ) {
    if ( in_array($table, array(PFX."txp_prefs", PFX."txp_lang", PFX."custom_fields")) ) {
      $query = "
        DELETE FROM 
          `{$table}`
        WHERE
          `name`='{$name}'
      ";
    }
    else if ( $table == PFX."textpattern" ) {
      $query = "
        ALTER TABLE
          `".PFX."textpattern`
        DROP
          `{$name}`
      ";
    }
    safe_query($query);
  }
  else {
    if ( $table == PFX."txp_prefs" ) {
      glz_custom_fields_MySQL("reset", $name, $table);
    }
    else if ( ($table == PFX."custom_fields") ) {
      $query = "
        DELETE FROM 
          `{$table}`
        WHERE
          `name`='{$name}'
      ";
      safe_query($query);
    }
  }
}


// -------------------------------------------------------------
// we might have multiple values for custom fields, like must use grep % %
function glz_buildCustomSql($custom,$pairs) {
  if ($pairs) {
    $pairs = doSlash($pairs);
    foreach( $pairs as $k => $v ) {
      if ( in_array(strtolower($k),$custom) ) {
        $no = array_keys($custom,strtolower($k));
        $arr_values = explode(",",$v);
        if ( is_array($arr_values) ) {
          if ( count($arr_values) > 1 ) {
            $custom_query = "AND (custom_{$no[0]} LIKE '%{$arr_values[0]}%'";
            for ( $i=1; $i < count($arr_values); $i++ ) { 
              $custom_query .= " OR custom_{$no[0]} LIKE '%{$arr_values[$i]}%'";
            }
            $custom_query .= ")";
            $out[] = $custom_query;
          }
          else {
            $out[] = "AND custom_{$no[0]} LIKE '%{$arr_values[0]}%'";
          }
        }
      }
    }
  }
  return (!empty($out)) ? ' '.join(' ',$out).' ' : FALSE; 
}



#####################
##### FRONT-END #####
#####################

// -------------------------------------------------------------
/**
 * DROP-DOWN SEARCH FORM
 Call it like this: <txp:glz_custom_fields_search_form results_page="listings" searchby="Area,City,Price" />
 */
function glz_custom_fields_search_form($atts) {
  // DEBUG
  // dmp($GLOBALS['prefs']);

  extract(lAtts(array(
    'results_page'  => "default",
    'searchby'    => "",
  ),$atts));
  
  if ( !empty($searchby) ) {
    // see which customs are searchby values associated to
    if ( strstr($searchby, ",") ) {
      // create an array from the searchby values
      foreach ( explode(",", $searchby) as $custom ) {
        // get the corresponding custom fields for the searchby values
        $arr_custom[$custom] = array_search($custom, $GLOBALS['prefs']);
      }
    }
    else
      // get the custom field for the searchby value
      $arr_custom[$searchby] = array_search($searchby, $GLOBALS['prefs']);
    
    // DEBUG
    // dmp($arr_custom);

    // start our form
    $out[] = "<form method=\"post\" action=\"".hu."$results_page\">".n
         .hInput("glz_custom_fields_search", 1).n;

    // build our selects
    foreach ( $arr_custom as $name => $custom ) {
      // get all existing custom values for live articles
      $arr_values = glz_custom_fields_MySQL('all_values', glz_custom_number($custom), '', array('custom_set_name' => $name));
      
      if ( is_array($arr_values) ) {
        // trim '_set' from $custom
        $custom = substr($custom, 0, -4);

        // we are ready to start building the select
        //"<label for=\"$custom\">$name</label>".n.
        $out[] = "<select name=\"$custom\">".n;

        // first value is select name
        $out[] = "  <option value=\"$custom\">Select $name</option>".n;
        // now let's go through the values in $arr_values
        foreach ( $arr_values as $key => $value ) {
          $out[] = "  <option value=\"$key\">$value</option>".n;
        }

        // end this select
        $out[] = "</select>".n;
      }
      else
        return '<p>No articles with custom fields have been found.</p></form>';
    }

    // end our form
    $out[] = fInput("submit", "submit", "Submit").n
         ."</form>".n.n;
    // DEBUG
    // dmp(join($out));

    return join($out);
  }
  else
    return trigger_error(glz_custom_fields_gTxt('searchby_not_set'));;
}


// -------------------------------------------------------------
// Slightly altered getCustomFields (that silly 10 hard limit...). Internal, no need to call it.
// There is a TXP patch available for this, as well as this: http://github.com/gerhard/textpattern-4-0/tree/txp-gerhard
function glz_getCustomFields() {
  global $prefs;
  $out = array();
  $i = 0;
  $custom_fields_num = count(preg_grep("(^custom_\d+_set$)", array_keys($prefs)));
  while ($i < $custom_fields_num) {
    $i++;
    if (!empty($prefs['custom_'.$i.'_set']))
      $out[$i] = strtolower($prefs['custom_'.$i.'_set']);
  }
  return $out;
}


// -------------------------------------------------------------
// Slightly altered custom_field - multiple values custom fields
function glz_custom_field($atts) {
  global $thisarticle, $prefs;
  assert_article();
  
  extract(lAtts(array(
    'name' => @$prefs['custom_1_set'],
    'escape' => '',
    'default' => '',
  ),$atts));

  $name = strtolower($name);
  if (!empty($thisarticle[$name])) {
    // if this custom field contains |, we need to compare against all the values
    if ( strstr($thisarticle[$name], '|') ) {
      /**
        TODO Using a loop here because later on I might want to output a list of values in a specific format (wrap, break etc.)
      */
      foreach ( explode('|', $thisarticle[$name]) as $value ) {
        $arr_values[] = $value;
      }
      $out = join(", ", $arr_values);
    }
    else
      $out = $thisarticle[$name];
  }
  else
    $out = $default;

  return ($escape == 'html' ? escape_output($out) : $out);
}


// -------------------------------------------------------------
// Slightly altered if_custom_field to deal with custom fields > 10 & multiple values
function glz_if_custom_field($atts, $thing) {
  global $thisarticle, $prefs;
  assert_article();
  extract(lAtts(array(
    'name' => @$prefs['custom_1_set'],
    'val' => NULL,
  ),$atts));
  $name = strtolower($name);
  
  if ($val !== NULL) {
    $cond = (@$thisarticle[$name] == $val);
    // if this custom field contains |, we need to compare against all set values
    if ( strstr($thisarticle[$name], '|') ) {
      foreach ( explode('|', $thisarticle[$name]) as $value ) {
        if ( $val == $value ) {
          $cond = TRUE;
          break;
        }
      }
    }
  }
  else
    $cond = !empty($thisarticle[$name]);
  
  return parse(EvalElse($thing, $cond));
}

// -------------------------------------------------------------
/**
 * DEALS WITH ARTICLES - PROPERTIES - LISTS, SLIGHTLY ALTERED TO USE OUR CUSTOM SEARCH VALUES WHEN FILTERING & DISPLAY CUSTOM FIELDS > 10
Call it like you would article()
http://textpattern.net/wiki/index.php?title=Txp:article_/
 */
function glz_article($atts) {
  global $is_article_body, $has_article_tag;
  if ($is_article_body) {
    trigger_error(gTxt('article_tag_illegal_body'));
    return '';
  }
  $has_article_tag = true;
  return glz_parseArticles($atts);
}

// -------------------------------------------------------------
/**
 * DEALS WITH ARTICLES - PROPERTIES - LISTS, SLIGHTLY ALTERED TO USE OUR CUSTOM SEARCH VALUES WHEN FILTERING & DISPLAY CUSTOM FIELDS > 10
Call it like you would article_cutom()
http://textpattern.net/wiki/index.php?title=Txp:article_custom/
 */
function glz_article_custom($atts) {
  return glz_parseArticles($atts, '1');
}

// -------------------------------------------------------------
// this decides what needs to be called, doArticle or doArticles. Using this to call our modified glz_doArticles & glz_doArticle
function glz_parseArticles($atts, $iscustom = '') {
  global $pretext, $is_article_list;
  $old_ial = $is_article_list;
  $is_article_list = ($pretext['id'] && !$iscustom)? false : true;
  article_push();
  $r = ($is_article_list) ? glz_doArticles($atts, $iscustom) : glz_doArticle($atts);
  article_pop();
  $is_article_list = $old_ial;

  return $r;
}


// -------------------------------------------------------------
// Slightly altered populateArticleData - needed to call glz_getCustomFields instead
function glz_populateArticleData($rs) {
  extract($rs);

  trace_add("[".gTxt('Article')." $ID]");
  $out['thisid']          = $ID;
  $out['posted']          = $uPosted;
  $out['modified']        = $LastMod;
  $out['annotate']        = $Annotate;
  $out['comments_invite'] = $AnnotateInvite;
  $out['authorid']        = $AuthorID;
  $out['title']           = $Title;
  $out['url_title']       = $url_title;
  $out['category1']       = $Category1;
  $out['category2']       = $Category2;
  $out['section']         = $Section;
  $out['keywords']        = $Keywords;
  $out['article_image']   = $Image;
  $out['comments_count']  = $comments_count;
  $out['body']            = $Body_html;
  $out['excerpt']         = $Excerpt_html;
  $out['override_form']   = $override_form;
  $out['status']          = $Status;

  $custom = glz_getCustomFields();
  if ($custom) {
    foreach ($custom as $i => $name)
      $out[$name] = $rs['custom_' . $i];
  }
  
  global $thisarticle;
  $thisarticle = $out;
}


// -------------------------------------------------------------
// using this to "inject" our custom search values
function glz_doArticle($atts) {
  global $pretext, $prefs, $thisarticle;
  extract($prefs);
  extract($pretext);

  extract(gpsa(array('parentid', 'preview')));

  extract(lAtts(array(
    'allowoverride' => '1',
    'form'          => 'default',
    'status'        => '4',
  ),$atts, 0));

  if ($status and !is_numeric($status))
    $status = getStatusNum($status);

  if (empty($thisarticle) or $thisarticle['thisid'] != $id) {
    $thisarticle = NULL;

    $q_status = ($status ? 'and Status = '.intval($status) : 'and Status in (4,5)');

    $rs = safe_row("*, unix_timestamp(Posted) as uPosted",
        "textpattern", 'ID = '.intval($id)." $q_status limit 1");

    if ($rs) {
      extract($rs);
      glz_populateArticleData($rs);
    }
  }

  if (!empty($thisarticle) and $thisarticle['status'] == $status) {
    extract($thisarticle);
    $thisarticle['is_first'] = 1;
    $thisarticle['is_last'] = 1;

    $form = ($allowoverride and $override_form) ? $override_form : $form;

    $article = parse_form($form);

    if ($use_comments and $comments_auto_append)
      $article .= parse_form('comments_display');

    unset($GLOBALS['thisarticle']);

    return $article;
  }
}


// -------------------------------------------------------------
// using this to "inject" our custom search values
function glz_doArticles($atts, $iscustom) {
  global $pretext, $prefs, $txpcfg;
  extract($pretext);
  extract($prefs);
  $customFields = glz_getCustomFields();
  $customlAtts = array_null(array_flip($customFields));
  
  //getting attributes
  $theAtts = lAtts(array(
    'form'      => 'default',
    'listform'  => '',
    'searchform'=> '',
    'limit'     => 10,
    'pageby'    => '',
    'category'  => '',
    'section'   => '',
    'excerpted' => '',
    'author'    => '',
    'sort'      => '',
    'sortby'    => '',
    'sortdir'   => '',
    'month'     => '',
    'keywords'  => '',
    'frontpage' => '',
    'id'        => '',
    'time'      => 'past',
    'status'    => '4',
    'pgonly'    => 0,
    'searchall' => 1,
    'searchsticky' => 0,
    'allowoverride' => (!$q and !$iscustom),
    'offset'    => 0,
    'no_results' => 'no_results'
  )+$customlAtts,$atts);

  // if an article ID is specified, treat it as a custom list
  $iscustom = (!empty($theAtts['id'])) ? true : $iscustom;

  //for the txp:article tag, some attributes are taken from globals;
  //override them before extract
  if (!$iscustom) {
    if ($c && !empty($theAtts['category']))
      $theAtts['category'] = $c;
    $theAtts['section'] = ($s && $s!='default')? $s : '';
    $theAtts['author'] = (!empty($author)? $author: '');
    $theAtts['month'] = (!empty($month)? $month: '');
    $theAtts['frontpage'] = ($s && $s=='default')? true: false;
    $theAtts['excerpted'] = '';     
  }
  extract($theAtts);
  
  $pageby = (empty($pageby) ? $limit : $pageby);

  // treat sticky articles differently wrt search filtering, etc
  if (!is_numeric($status))
    $status = getStatusNum($status);
  $issticky = ($status == 5);
    
  //give control to search, if necesary
  if($q && !$iscustom && !$issticky) {
    include_once txpath.'/publish/search.php';
    
    $s_filter = ($searchall ? filterSearch() : '');
    $q        = doSlash($q);
    $match    = ", match (Title,Body) against ('$q') as score";
    $search   = " and (Title rlike '$q' or Body rlike '$q') $s_filter";

    // searchall=0 can be used to show search results for the current section only
    if ($searchall) $section = '';
    if (!$sort) $sort='score desc';
  }
  else {
    $match = $search = '';
    if (!$sort)
      $sort='Posted desc';
  }

  // for backwards compatibility
  // sortby and sortdir are deprecated
  if ($sortby) {
    if (!$sortdir)
      $sortdir = 'desc';
    $sort = "$sortby $sortdir";
  }
  elseif ($sortdir)
    $sort = "Posted $sortdir";

  //Building query parts
  $frontpage = ($frontpage and (!$q or $issticky)) ? filterFrontPage() : '';
  $category  = join("','", doSlash(do_list($category))); 
  $category  = (!$category)  ? '' : " and (Category1 IN ('".$category."') or Category2 IN ('".$category."'))";
  $section   = (!$section)   ? '' : " and Section IN ('".join("','", doSlash(do_list($section)))."')";
  $excerpted = ($excerpted=='y')  ? " and Excerpt !=''" : '';
  $author    = (!$author)    ? '' : " and AuthorID IN ('".join("','", doSlash(do_list($author)))."')";
  $month     = (!$month)     ? '' : " and Posted like '".doSlash($month)."%'";
  $id        = (!$id)        ? '' : " and ID = '".intval($id)."'";
  switch ($time) {
    case 'any':
      $time = ""; break;
    case 'future':
      $time = " and Posted > now()"; break;
    default:
      $time = " and Posted <= now()";
  }
  if (!is_numeric($status))
    $status = getStatusNum($status);
    
  $custom = '';
  
  // DEBUG
  // dmp($customFields);
  if ($customFields) {
    foreach($customFields as $cField) {
      if (isset($atts[$cField]))
        $customPairs[$cField] = $atts[$cField];
    }
    
    $arr_post_custom = preg_grep("(^custom_\d+$)", array_keys($_POST));
    // DEBUG
    // dmp($arr_post_custom);
    // dmp($_POST);
    foreach ( $arr_post_custom as $custom ) { 
      // skip if values are the same - users have left the default
      if ( ps($custom) == $custom )
        continue;
      // if there is a value, add it for the query
      if ( ps($custom) ) {
        // need the digit to find out the custom field name
        list($rubbish, $digit) = explode("_", $custom);
        $customPairs[$prefs['custom_'.$digit.'_set']] = ps($custom);
      }
    }
    // DEBUG
    // dmp($customPairs);
    
    if(!empty($customPairs))
      $custom =  glz_buildCustomSql($customFields,$customPairs);
  }

  //Allow keywords for no-custom articles. That tagging mode, you know
  if ($keywords) {
    $keys = doSlash(do_list($keywords));
    foreach ($keys as $key) {
      $keyparts[] = "FIND_IN_SET('".$key."',Keywords)";
    }
    $keywords = " and (" . join(' or ',$keyparts) . ")"; 
  }

  if ($q and $searchsticky)
    $statusq = ' and Status >= 4';
  elseif ($id)
    $statusq = ' and Status >= 4';
  else
    $statusq = ' and Status = '.intval($status);
  
  $where = "1=1" . $statusq. $time.
    $search . $id . $category . $section . $excerpted . $month . $author . $keywords . $custom . $frontpage;
  // DEBUG
  // dmp($where);
  
  //do not paginate if we are on a custom list
  if (!$iscustom and !$issticky) {
    $grand_total = safe_count('textpattern',$where);
    $total = $grand_total - $offset;
    $numPages = ceil($total/$pageby);  
    $pg = (!$pg) ? 1 : $pg;
    $pgoffset = $offset + (($pg - 1) * $pageby);  
    // send paging info to txp:newer and txp:older
    $pageout['pg']       = $pg;
    $pageout['numPages'] = $numPages;
    $pageout['s']        = $s;
    $pageout['c']        = $c;
    $pageout['grand_total'] = $grand_total;
    $pageout['total']    = $total;

    global $thispage;
    if (empty($thispage))
      $thispage = $pageout;
    if ($pgonly)
      return;
  }
  else
    $pgoffset = $offset;
  
  $rs = safe_rows_start("*, unix_timestamp(Posted) as uPosted".$match, 'textpattern', 
  $where.' order by '.doSlash($sort).' limit '.intval($pgoffset).', '.intval($limit));
  // get the form name
  if ($q and !$iscustom and !$issticky)
    $fname = ($searchform ? $searchform : 'search_results');
  else
    $fname = ($listform ? $listform : $form);
  
  if ($rs) {
    $count = 0;
    
    $articles = array();
    while ( $a = nextRow($rs) ) {
      ++$count;
      
      glz_populateArticleData($a);
      global $thisarticle, $uPosted, $limit;
      
      $thisarticle['is_first'] = ($count == 1);
      $thisarticle['is_last'] = ($count == numRows($rs));
      
      if (@constant('txpinterface') === 'admin' and gps('Form'))
        $articles[] = parse(gps('Form'));
      elseif ($allowoverride and $a['override_form'])
        $articles[] = parse_form($a['override_form']);
      else
        $articles[] = parse_form($fname);
      
      // sending these to paging_link(); Required?
      $uPosted = $a['uPosted'];
      $limit = $limit;

      unset($GLOBALS['thisarticle']);

    }
    if ( count($articles) == "0" )
      header('Location: '.hu.$no_results);
    else
      return join('',$articles);
  }
}



##########################
##### PRE-REQUISITES #####
##########################

// -------------------------------------------------------------
// checks if custom_fields table exists
function glz_custom_fields_install() {
  // if jQuery is not present, die
  // improvement courtesy of Sam Weiss
  if ( !file_exists($GLOBALS['txpcfg']['txpath'].'/jquery.js') )
    trigger_error(glz_custom_fields_gTxt('jquery_missing'));
  
  // if we don't have the custom_fields table, let's create it
  // let's also take all custom field values from `textpattern` table and populates the `custom_fields` table
  if ( !getRows("SHOW TABLES LIKE '".PFX."custom_fields'") ) {
    safe_query("
      CREATE TABLE `".PFX."custom_fields` (
        `name` varchar(255) NOT NULL default '',
        `value` varchar(255) NOT NULL default '',
        INDEX (`name`)
      ) TYPE=MyISAM
    ");
    /**
      TODO Migration/importing functions
    */
  }
}

// -------------------------------------------------------------
// uninstalls glz_custom_fields by doing the following things:
// 1. removes all custom fields above 10 in txp_prefs
// 2. changes the remaining custom fields back to input
// 3. removes custom_fields table
function glz_custom_fields_uninstall() {
  /**
    TODO Uninstall functions
  */
}

// -------------------------------------------------------------
// adds the css & js we need
function glz_custom_fields_css_js($buffer) {
  $css =<<<css
<style type="text/css" media="screen">
    /* - - - - - - - - - - - - - - - - - - - - -

    ### TEXTPATTERN CUSTOM FIELDS ###

    Title : glz_custom_fields stylesheet
    Author : Gerhard Lazu
    URL : http://www.gerhardlazu.com/ & http://www.calti.co.uk
    
    Created : 14th May 2007
    Last modified: 7th January 2008
    
    - - - - - - - - - - - - - - - - - - - - - */
    
    
    /* CLASSES
    -------------------------------------------------------------- */
    .green {
      color: #6B3;
    }
    .red {
      color: #C00;
    }
    
    
    /* TABLE
    -------------------------------------------------------------- */
    #glz_custom_fields {
      width: 50em;
      margin: 0 auto;
      border: 1px solid #DDD;
    }
    
    #glz_custom_fields thead tr {
      font-size: 1.2em;
      font-weight: 700;
      background: #EEE;
    }
    
    #glz_custom_fields tbody tr.alt {
      background: #FFC;
    }
    #glz_custom_fields tbody tr.over {
      background: #FF6;
    }
    
    #glz_custom_fields td {
      padding: 0.2em 1em;
      vertical-align: middle;
    }
    #glz_custom_fields thead td {
      padding: 0.3em 0.8em;
    }
    #glz_custom_fields td.custom_set {
      width: 8em;
    }
    #glz_custom_fields td.custom_set_name {
      width: 18em;
    }
    #glz_custom_fields td.type {
      width: 6em;
    }
    #glz_custom_fields td.events {
      width: 12em;
      text-align: right;
    }
    
    
    /* FORMS
    -------------------------------------------------------------- */
    input:focus,
    select:focus,
    textarea:focus {
      background: #FFC;
    }
    
    #glz_custom_fields td.events form {
      display: inline;
    }
    
    #add_edit_custom_field {
      width: 50em;
      margin: 2em auto 0 auto;
    }
    #add_edit_custom_field legend {
      font-size: 1.2em;
      font-weight: 700;
    }
    #add_edit_custom_field label {
      float: left;
      width: 10em;
      font-weight: 700;
    }
    #add_edit_custom_field p input,
    #add_edit_custom_field p select {
      width: 20em;
    }
    #add_edit_custom_field p textarea {
      width: 30em;
      height: 10em;
    }
    #add_edit_custom_field p em {
      font-size: 0.9em;
      font-weight: 500;
      color: #777;
    }
    #add_edit_custom_field input.publish {
      margin-left: 11em;
    }
    
    /* select on write tab for the custom fields */
    td#article-col-1 #advanced p select.list {
      width: 100%;
    }
    
  </style>
css;
  
  $js =<<<js
<script type="text/javascript">
  <!--//--><![CDATA[//><!--
  
  $(document).ready(function() {
    // sweet jQuery table striping
    $(".stripeMe tr").mouseover(function() { $(this).addClass("over"); }).mouseout(function() { $(this).removeClass("over"); });
    $(".stripeMe tr:even").addClass("alt");
    
    // disable all custom field references in Advanced Prefs
    var custom_field_tr = $("tr:has(label[for*=custom_]), tr:has(h2:contains('Custom Fields'))");
    if ( custom_field_tr ) {
      $.each (custom_field_tr, function() {
        $(this).hide();
      });
    };
    
    // toggle custom field value based on its type
    if ( $("select#type option[@selected]").attr("value") == "text_input" ) {
      custom_field_value_off();
    };
    
    $("select#type").click( function() {
      if ( $("select#type option[@selected]").attr("value") != "text_input" && !$("textarea#value").length ) {
        custom_field_value_on();
      }
      else if ( $("select#type option[@selected]").attr("value") == "text_input" && !$("input#value").length ) {
        custom_field_value_off();
      }
    });
    
    
    // ### RE-USABLE FUNCTIONS ###
    
    function custom_field_value_off() {
      $("label[@for=value] em").hide();
      $("textarea#value").remove();
      $("label[@for=value]").after('<input id="value" value="no value allowed" name="value"/>');
      $("input#value").attr("disabled", "disabled");
    }
    
    function custom_field_value_on() {
      $("label[@for=value] em").show();
      $("input#value").remove();
      $("label[@for=value]").after('<textarea id="value" name="value"></textarea>');
    }
    
  });
  
  //--><!]]>
  </script>
js;
  
  $find = '</head>';
  $replace = $js.n.t.$css.n.t.$find;

  return str_replace($find, $replace, $buffer);
}

# --- END PLUGIN CODE ---

?>