<?php
/*
Plugin Name: SocialFit
Plugin URI: http://mydiy.pl/
Description: SocialFit
Version: 1.2.2
Author: Łukasz Więcek
Author URI: http://mydiy.pl/
*/

add_action('init', 'SocialFitLang'); function SocialFitLang() {load_plugin_textdomain('socialfit', false, dirname(plugin_basename( __FILE__ )).'/lang');}

add_action('admin_menu','SocialFitMenu');
function SocialFitMenu() {add_options_page('SocialFit','SocialFit', 7, __FILE__, 'SocialFitSettings');}

add_action('admin_head', 'SocialFitAdminCSS');
function SocialFitAdminCSS() {echo '<link rel="stylesheet" type="text/css" href="' .plugins_url('css/wp-admin.css', __FILE__). '">';}

wp_enqueue_script('socialfit', WP_PLUGIN_URL .'/socialfit/js/socialfit.js', array('jquery'));
wp_register_style('socialfit', WP_PLUGIN_URL .'/socialfit/css/socialfit.css');
wp_enqueue_style('socialfit');

/*
if(!get_option('socialfit'))
    {
    $socialfit = array(
		"settings" => array(
			"time"	  	   => "60"),

		"services" => array(
			"facebook"		=> "0",
			"googleplus"	=> "0",
			"wykop"		    => "0",
            "rss"		    => "0",
			"twitter"		=> "0"),
		);
	add_option('socialfit', $socialfit);
    }
 else
    {
    $socialfit = get_option('socialfit');
    }
 */

function SocialFitSettings()
    { ?>
    <div class="wrap socialfit">
    
    <h2>SocialFit</h2>
    
    <p><?php _e('Thanks to SocialFit you can put social networks widgets on your blog which doesn’t use JavaScript, so it will not delay the page loads.','socialfit') ?></p>
    
    <h3><?php _e('Usage','socialfit') ?></h3>
    
    <div class="left20">
        <p><?php _e('To display a widget on your blog, insert the following code in your template:','socialfit') ?></p>
        
        <pre><span style="color: #FF0000;">&lt;?php</span><span style="color: #008000;"> SocialFit</span><span style="color: #AE00FB;">(<span style="color: #0066CC;">$service</span><span style="color: #333333;">,</span> <span style="color: #0066CC;">$id</span><span style="color: #333333;">,</span> <span style="color: #0066CC;">$type</span><span style="color: #333333;">,</span> <span style="color: #0066CC;">$time</span><span style="color: #333333;">,</span> <span style="color: #0066CC;">$url</span><span style="color: #333333;">,</span> <span style="color: #0066CC;">$title</span><span style="color: #333333;">,</span> <span style="color: #0066CC;">$desc</span>) </span><span style="color: #FF0000;">?&gt;</span></pre>
       
        <ul style="margin-left: 10px; list-style-type: none;">
            <li><span>$service</span> - <?php _e('service for which you want to display the widget. Available services: <i>facebook, googleplus, twitter, digg, dig, rss</i>','socialfit') ?></li>
            <li><span>$id</span> - <?php _e('(optional parameter)','socialfit'); _e('identifier of the widget. You can give an individual identifier for each widget, which will track clicks in Google Analytics, or set individual refresh times for a few widgets on the same site located on one site. With eg two Facebook widgets you can give them IDs <i>\'post\'</i> and <i>\'sidebar\'</i>','socialfit'); ?></li>
            <li><span>$type</span> - <?php _e('type of display widget. Available options: <i>normal</i> (it will be more in the future :)','socialfit') ?></li>
            <li><span>$time</span> - <?php _e('the time of caching downloaded values, in seconds. Enter <i>0</i> if you do not want to use caching','socialfit') ?></li>
            <li><span>$url</span> - <?php _e('address of the post / page / RSS (Feedburner), for which you want to create a widget','socialfit') ?></li>
            <li><span>$title</span> - <?php _e('(optional parameter)','socialfit'); _e('the title of post / page (only for sites <i>twitter, digg</i> or <i>wykop</i>)','socialfit'); ?></li>
            <li><span>$desc</span> - <?php _e('(optional parameter)','socialfit'); _e('description of the post / page (only for <i>twitter</i> and <i>wykop</i>)','socialfit'); ?></li>
        </ul>
    </div>
    
    <h3><?php _e('Examples','socialfit') ?></h3>
    <div class="left20">
        <h4><?php _e('Facebook Widget, refreshed every 5 minutes','socialfit') ?></h4>
            <pre class="example"><span style="color: #FF0000;">&lt;?php</span><span style="color: #008000;"> SocialFit</span><span style="color: #AE00FB;">(<span style="color: #dd0000;">'facebook'</span><span style="color: #333333;">,</span> <span style="color: #dd0000;">'FB_footer'</span><span style="color: #333333;">,</span> <span style="color: #dd0000;">'normal'</span><span style="color: #333333;">,</span> <span style="color: #0000C7;">300</span><span style="color: #333333;">,</span> <span style="color: #008000;">get_permalink()</span>) </span><span style="color: #FF0000;">?&gt;</span></pre>
         
         <h4><?php _e('Twitter Widget refreshed at each loading the site','socialfit') ?></h4>
            <pre class="example"><span style="color: #FF0000;">&lt;?php</span><span style="color: #008000;"> SocialFit</span><span style="color: #AE00FB;">(<span style="color: #dd0000;">'twitter'</span><span style="color: #333333;">,</span> <span style="color: #dd0000;">''</span><span style="color: #333333;">,</span> <span style="color: #dd0000;">'normal'</span><span style="color: #333333;">,</span> <span style="color: #0000C7;">0</span><span style="color: #333333;">,</span> <span style="color: #008000;">get_permalink()</span><span style="color: #333333;">,</span> <span style="color: #008000;">get_the_title()</span>) </span><span style="color: #FF0000;">?&gt;</span></pre>
         
        <h4><?php _e('RSS Widget, refreshed once a day','socialfit') ?></h4>
            <pre class="example"><span style="color: #FF0000;">&lt;?php</span><span style="color: #008000;"> SocialFit</span><span style="color: #AE00FB;">(<span style="color: #dd0000;">'rss'</span><span style="color: #333333;">,</span> <span style="color: #dd0000;">'afterContent'</span><span style="color: #333333;">,</span> <span style="color: #dd0000;">'normal'</span><span style="color: #333333;">,</span> <span style="color: #0000C7;">86400</span><span style="color: #333333;">,</span> <span style="color: #dd0000;">'http://rss.mydiy.pl/posty'</span>) </span><span style="color: #FF0000;">?&gt;</span></pre>
    </div>
    
    <h3><?php _e('My other plugins','SmartDoFollow') ?></h3>
        <div class="left20">
            <ul style="margin-left: 10px;">
                <li><a href="http://wordpress.org/extend/plugins/social-slider/">Social Slider</a></li>
                <li><a href="http://wordpress.org/extend/plugins/smart-dofollow/">Smart DoFollow</a></li>
                <li><a href="http://commentify.info/">Commentify</a></li>
                <li><a href="http://wordpress.org/extend/plugins/thank-you/">Thank You</a></li>
            </ul>
        </div>
    
    <h3><?php _e('Translations','socialfit') ?></h3>
    <div class="left20">
        <ul style="margin-left: 10px;">
            <li><strong><?php _e('English','socialfit') ?></strong> - <a href="http://ittechblog.pl">Tomasz Fiedoruk</a></li>
            <li><strong><?php _e('Polish','socialfit') ?></strong> - <a href="http://mydiy.pl">Łukasz Więcek</a></li>
        </ul>
    </div>
    </div>
    <?php }


function SocialFit($service,$id=null,$type='normal',$time=0,$url,$title=null,$desc=null)
    {
    global $socialfit;
    $md5su = md5($url.$service.$id);
    $transFit = get_transient($md5su);
    if($id==null) $id = $md5su;

    // Facebook
    if($service=='facebook')
        {
        if(false === $transFit)
            {
            $respond = wp_remote_retrieve_body(wp_remote_get('https://graph.facebook.com/?ids='.urlencode($url), array('timeout'=>10)));
            if(!is_wp_error($respond))
                {
                $json = json_decode($respond, true);
                if($json[$url]['shares']>0) $shares = $json[$url]['shares'];
                else                        $shares = '0';
                if($time>0) set_transient($md5su, $shares, $time);
                }
            }
        else $shares = $transFit;
		
		switch ($type) {
			case "normal":	echo '<a rel="nofollow" class="socialButton facebookButton" id="'.$id.'" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.urlencode($url).'"><span class="count">'.$shares.'</span><span class="txt">'.__('Like it!','socialfit').'</span></a>'; break;
			case "small":	echo '<a rel="nofollow" class="socialSmallButton facebookSmallButton" id="'.$id.'" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.urlencode($url).'"><span class="txt">'.__('Like it!','socialfit').'</span><span class="count">'.$shares.'</span></a>'; break;
			case "link":	echo '<a rel="nofollow" id="'.$id.'" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.urlencode($url).'">'.$shares.'</a>'; break;
			case "text":	echo $shares; break;
			}
		}
        
    // Google+
    if($service=='googleplus')
        {
        $msg = __('Click the button below to admit +1','socialfit');
        if(false === $transFit)
            {
			if(strstr($url, 'plus.google.com')!==False)		$respond = wp_remote_retrieve_body(wp_remote_get('https://plusone.google.com/u/0/_/pages/badge?url='.urlencode($url).'&size=badge&width=300&height=131', array('timeout'=>10)));
			else											$respond = wp_remote_retrieve_body(wp_remote_get('https://plusone.google.com/_/+1/fastbutton?url='.urlencode($url).'&size=standard&count=true', array('timeout'=>10)));
            
            if(!is_wp_error($respond))
                {
                preg_match('/c: (\d+)\./isU',$respond,$matches);
                if($matches[1]>0)   $plus = $matches[1];
                else                $plus = '0';
                if($time>0) set_transient($md5su, $plus, $time);
                }
            }
        else $plus = $transFit;

		switch ($type) {
			case "normal":	echo '<a rel="nofollow" class="socialButton googleplusButton" id="'.$id.'" target="_blank" href="'.WP_PLUGIN_URL.'/socialfit/popup.php?service=googleplus&url='.urlencode($url).'&msg='.urlencode($msg).'"><span class="count">'.$plus.'</span></a>'; break;
			case "small":	echo '<a rel="nofollow" class="socialSmallButton googleplusSmallButton" id="'.$id.'" target="_blank" href="'.WP_PLUGIN_URL.'/socialfit/popup.php?service=googleplus&url='.urlencode($url).'&msg='.urlencode($msg).'"><span class="count">'.$plus.'</span></a>'; break;
			case "link":	echo '<a rel="nofollow" id="'.$id.'" target="_blank" href="'.WP_PLUGIN_URL.'/socialfit/popup.php?service=googleplus&url='.urlencode($url).'&msg='.urlencode($msg).'">'.$plus.'</a>'; break;
			case "text":	echo $plus; break;
			}
		}
        
    // Wykop
    if($service=='wykop')
        {
        if(false === $transFit)
            {
            $respond = wp_remote_retrieve_body(wp_remote_get('http://www.wykop.pl/dataprovider/diggerwidget/?url='.urlencode($url).'&title='.urlencode($title).'&desc='.urlencode($desc), array('timeout'=>10)));
            if(!is_wp_error($respond))
                {
                preg_match('/wykop-vote-counter"><a target="_blank" href="(.*)".*>(.*)<\\/a><\\/li><li/isU',$respond,$matches);
                $arrayFit = array('count' => $matches[2], 'url' => $matches[1]);
				if($time>0) set_transient($md5su, $arrayFit, $time);
                }
            }
        else $arrayFit = $transFit;

		switch ($type) {
			case "normal":	echo '<a rel="nofollow" class="socialButton wykopButton" id="'.$id.'" target="_blank" href="'.$arrayFit['url'].'"><span class="count">'.str_replace('strong','span class="plus"',$arrayFit['count']).'</span></a>'; break;
			case "small":	echo '<a rel="nofollow" class="socialSmallButton wykopSmallButton" id="'.$id.'" target="_blank" href="'.$arrayFit['url'].'"><span class="count">'.str_replace('strong','span class="plus"',$arrayFit['count']).'</span></a>'; break;
			case "link":	echo '<a rel="nofollow" id="'.$id.'" target="_blank" href="'.$arrayFit['url'].'">'.str_replace('strong','',$arrayFit['count']).'</a>'; break;
			case "text":	echo str_replace('strong','',$arrayFit['count']); break;
			}
		}
        
    // Twitter
    if($service=='twitter')
        {
        if(false === $transFit)
            {
            $respond = wp_remote_retrieve_body(wp_remote_get('http://urls.api.twitter.com/1/urls/count.json?url='.urlencode($url), array('timeout'=>10)));
            if(!is_wp_error($respond))
                {
                $json = json_decode($respond, true);
				$tweet = $json['count'];
                if($time>0) set_transient($md5su, $json['count'], $time);
                }
            }
        else $tweet = $transFit;
        
		switch ($type) {
			case "normal":	echo '<a rel="nofollow" class="socialButton twitterButton" id="'.$id.'" target="_blank" href="https://twitter.com/intent/tweet?text='.urlencode($title.' '.$url.' '.$desc).'"><span class="count">'.$tweet.'</span></a>'; break;
			case "small":	echo '<a rel="nofollow" class="socialSmallButton twitterSmallButton" id="'.$id.'" target="_blank" href="https://twitter.com/intent/tweet?text='.urlencode($title.' '.$url.' '.$desc).'"><span class="count">'.$tweet.'</span></a>'; break;
			case "link":	echo '<a rel="nofollow" id="'.$id.'" target="_blank" href="https://twitter.com/intent/tweet?text='.urlencode($title.' '.$url.' '.$desc).'">'.$tweet.'</a>'; break;
			case "text":	echo $tweet; break;
			}
		}
        
    // RSS
    if($service=='rss')
        {
        //delete_transient($md5su);
        if(false === $transFit)
            {
            $date    = date("Y-m-d", strtotime("-1 days"));
            $oldDate = date("Y-m-d", strtotime("-3 days"));
            $feedrss = explode('/',$url);
            $respond = wp_remote_retrieve_body(wp_remote_get('https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri='.$feedrss[count($feedrss)-1].'&dates='.$oldDate.','.$date, array('timeout'=>10)));
            if(!is_wp_error($respond))
                {
                $xml = new SimpleXMLElement($respond);  
                $subscribers = (int)$xml->feed->entry[0]['circulation'];
                if($xml->feed->entry[1]['circulation']>0) $subscribers = (int)$xml->feed->entry[1]['circulation'];
                if($xml->feed->entry[2]['circulation']>0) $subscribers = (int)$xml->feed->entry[2]['circulation'];
                if($time>0) set_transient($md5su, $subscribers, $time);
                }
            }
        else $subscribers = $transFit;

		switch ($type) {
			case "normal":	echo '<a rel="nofollow" class="socialButton rssButton" id="'.$id.'" target="_blank" href="'.$url.'"><span class="count">'.$subscribers.'</span></a>'; break;
			case "small":	echo '<a rel="nofollow" class="socialSmallButton rssSmallButton" id="'.$id.'" target="_blank" href="'.$url.'"><span class="count">'.$subscribers.'</span></a>'; break;
			case "link":	echo '<a rel="nofollow" id="'.$id.'" target="_blank" href="'.$url.'">'.$subscribers.'</a>'; break;
			case "text":	echo $subscribers; break;
			}
		}
    
    // Digg
    if($service=='digg')
        {
        if(false === $transFit)
            {
            $respond = wp_remote_retrieve_body(wp_remote_get('http://widgets.digg.com/buttons/count?url='.urlencode($url), array('timeout'=>10)));
            if(!is_wp_error($respond))
                {
                preg_match('/diggs": (\d+).*([id: ".*"]+)?/',$respond,$matches);
                if($matches[1]>0) {preg_match('/id": "(.*)"/',$respond,$matchesID); $link = 'http://digg.com/tools/diggthis/confirm?storyId='.urlencode($matchesID[1]);}
                else              {$link = 'http://digg.com/tools/diggthis/submit?title='.urlencode($title).'&url='.urlencode($url).'&related=true&style=true';}
                $arrayFit = array('count' => $matches[1], 'url' => $link);
				if($time>0) set_transient($md5su, $arrayFit, $time);
                }
            }
        else $arrayFit = $transFit;

		switch ($type) {
			case "normal":	echo '<a rel="nofollow" class="socialButton diggButton" id="'.$id.'" target="_blank" href="'.$arrayFit['url'].'"><span class="count">'.$arrayFit['count'].'</span></a>'; break;
			case "small":	echo '<a rel="nofollow" class="socialSmallButton diggSmallButton" id="'.$id.'" target="_blank" href="'.$arrayFit['url'].'"><span class="count">'.$arrayFit['count'].'</span></a>'; break;
			case "link":	echo '<a rel="nofollow" id="'.$id.'" target="_blank" href="'.$arrayFit['url'].'">'.$arrayFit['count'].'</a>'; break;
			case "text":	echo $arrayFit['count']; break;
			}
		}
    
    // vkontakte
    if($service=='vkontakte')
        {
        if(false === $transFit)
            {
            $respond = wp_remote_retrieve_body(wp_remote_get('http://vkontakte.ru/share.php?act=count&index=0&url='.urlencode($url), array('timeout'=>10)));
            if(!is_wp_error($respond))
                {
                preg_match('/, (\d)+\)/isU',$respond,$matches);
				$vk = $matches[1];
                if($time>0) set_transient($md5su, $vk, $time);
                }
            }
        else $vk = $transFit;

		switch ($type) {
			case "normal":	echo '<a rel="nofollow" class="socialButton vkontakteButton" id="'.$id.'" target="_blank" href="http://vkontakte.ru/share.php?url='.urlencode($url).'"><span class="count">'.$vk.'</span></a>'; break;
			case "small":	echo '<a rel="nofollow" class="socialSmallButton vkontakteSmallButton" id="'.$id.'" target="_blank" href="http://vkontakte.ru/share.php?url='.urlencode($url).'"><span class="count">'.$vk.'</span></a>'; break;
			case "link":	echo '<a rel="nofollow" id="'.$id.'" target="_blank" href="http://vkontakte.ru/share.php?url='.urlencode($url).'">'.$vk.'</a>'; break;
			case "text":	echo $vk; break;
			}
		}
    }