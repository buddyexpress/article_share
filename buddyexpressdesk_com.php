<?php
/**
 * Buddyexpress Desk Article Share
 *
 * @package   Bdesk
 * @author    Buddyexpress Core Team <admin@buddyexpress.net
 * @copyright 2014 BUDDYEXPRESS NETWORKS.
 * @license   Buddyexpress Public License http://www.buddyexpress.net/Licences/bpl/ 
 * @link      http://labs.buddyexpress.net/bdesk.b
 */
/**
* Setup Component Details;
* @last edit: $arsalanshah
* @Reason: Initial; 
*/ 
$com = 'article_share';
define('COM_ARTICLE_SHARE_WWW', buddyexpressdesk_route()->com.$com);

/**
* Extend Views;
* @last edit: $arsalanshah
* @Reason: Initial;
*/
buddyexpressdesk_register_view('BuddyexpressDesk/page/head', 'bdesk_article_share_init');
buddyexpressdesk_register_view('BuddyexpressDesk/article/view', 'bdesk_article_share');

/**
* Initialize the component;
* @params: $context = Cutrent Context;
* @params:  $url = current url;
* @last edit: $arsalanshah
* @reason: Initial;
* @return return;
*/
function bdesk_article_share_init($context, $params = false, $url){
  $baseurl = buddyexpressdesk_site_url();	
  $components = 'article_share';
  echo buddyexpressdesk_css("{$baseurl}components/{$components}/css/style.css");
}
/**
* Construct Url;
* @params: $name = name;
* @params:  $url = url;
* @params:  $text = url text;
* @last edit: $arsalanshah
* @reason: Initial;
* @return return;
*/
function bdesk_article_share_url($name, $url, $text){
  $class = 'bdesk_social_share bdesk_social_share-'.$name.'';	
  $url = '<a class="'.$class.'" href="'.$url.'">'.$text.'</a>';
  return $url;
}
/**
* Register Urls;
* @params:  $params = article meta;
* @params:  $url = current url;
* @params:  $context = current context = article;
* @last edit: $arsalanshah
* @reason: Initial;
* @return return;
*/
function bdesk_article_share($context, $params, $url){
$apis = array(
				 'facebook' => array(
									'url' => "https://www.facebook.com/sharer/sharer.php?u={$url}",
									'text' => 'Facebook'
									 ),
				 'google' => array(
								   	'url' => "https://plus.google.com/share?url={$url}",
									'text' => 'Google+'
								   )
);

foreach($apis as $name => $data){
  $links[] =   bdesk_article_share_url($name, $data['url'], $data['text']);	 
 }
return implode('', $links);
}


