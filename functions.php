<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('页头logo地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则使用站点名称'));
    $form->addInput($logoUrl->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $footerLogoUrl = new Typecho_Widget_Helper_Form_Element_Text('footerLogoUrl', NULL, NULL, _t('页尾logo地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则使用站点名称'));
    $form->addInput($footerLogoUrl->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置favicon'));
    $form->addInput($favicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $iosicon = new Typecho_Widget_Helper_Form_Element_Text('iosicon', NULL, NULL, _t('apple touch icon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置Apple Touch Icon'));
    $form->addInput($iosicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $searchPage = new Typecho_Widget_Helper_Form_Element_Text('searchPage', NULL, NULL, _t('搜索页地址'), _t('输入你的 Template Page of Search 的页面地址,记得带上 http:// 或 https://'));
    $form->addInput($searchPage->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
    $pjaxSet = new Typecho_Widget_Helper_Form_Element_Radio('pjaxSet',
        array('able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'disable', _t('PJAX加速设置'), _t('默认禁止，若启用则需提前到关闭‘开启反垃圾保护’,开关在‘设置-评论’'));
    $form->addInput($pjaxSet);
    $DnsPrefetch = new Typecho_Widget_Helper_Form_Element_Radio('DnsPrefetch',
        array('able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'disable', _t('DNS预解析加速'), _t('默认禁止，启用则会对CDN资源和Gravatar进行加速'));
    $form->addInput($DnsPrefetch);
    $htmlCompress = new Typecho_Widget_Helper_Form_Element_Radio('htmlCompress',
        array('able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'disable', _t('代码压缩设置'), _t('默认禁止，启用则会对HTML代码进行压缩，可能会跟部分插件存在兼容问题，请自行测试'));
    $form->addInput($htmlCompress);
    $fastClickSet = new Typecho_Widget_Helper_Form_Element_Radio('fastClickSet',
        array('able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'disable', _t('移动端点击延迟消除设置'), _t('默认禁止，好多安卓原生浏览器有点击延迟，想开启就开启吧'));
    $form->addInput($fastClickSet);
    $useHighline = new Typecho_Widget_Helper_Form_Element_Radio('useHighline',
        array('able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'disable', _t('代码高亮设置'), _t('默认禁止，启用则会对 ``` 进行代码高亮，支持22种编程语言的高亮'));
    $form->addInput($useHighline);
    $GoogleAnalytics = new Typecho_Widget_Helper_Form_Element_Textarea('GoogleAnalytics', NULL, NULL, _t('Google Analytics代码'), _t('填写你从Google Analytics获取到的Universal Analytics跟踪代码，不需要script标签'));
    $form->addInput($GoogleAnalytics);
    $GoogleAds = new Typecho_Widget_Helper_Form_Element_Textarea('GoogleAds', NULL, NULL, _t('Google Ads代码'), _t('填写你从Google Ads获取到的Universal Analytics跟踪代码，不需要script标签'));
    $form->addInput($GoogleAds);
    $socialgithub = new Typecho_Widget_Helper_Form_Element_Text('socialgithub', NULL, NULL, _t('输入GitHub链接'), _t('在这里输入GitHub链接,支持 http:// 或 https://或 //'));
    $form->addInput($socialgithub->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
}
function themeInit($archive){
    Helper::options()->commentsMaxNestingLevels = 999;
    if ($archive->is('archive')) {
        $archive->parameter->pageSize = 5;
    }
}
function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    if(!empty($options->src_add) && !empty($options->cdn_add)){
        $obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
    }
    $obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" target=\"_blank\">", $obj->content);
    return trim($obj->content);
}
function theNext($widget, $default = NULL){
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('table.contents.created > ?', $widget->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $widget->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_ASC)
        ->limit(1);
    $content = $db->fetchRow($sql);
    if ($content) {
        $content = $widget->filter($content);
        $link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '">←</a>';
        echo $link;
    } else {
        echo $default;
    }
}
function thePrev($widget, $default = NULL){
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('table.contents.created < ?', $widget->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $widget->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_DESC)
        ->limit(1);
    $content = $db->fetchRow($sql);
    if ($content) {
        $content = $widget->filter($content);
        $link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '">→</a>';
        echo $link;
    } else {
        echo $default;
    }
}
function compressHtml($html_source) {
    $chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
    $compress = '';
    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
            $c = substr($c, 19, strlen($c) - 19 - 20);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
            $c = substr($c, 12, strlen($c) - 12 - 13);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, "\r") !== false || strpos($c, "\n") !== false)) {
            $tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
            $c = '';
            foreach ($tmps as $tmp) {
                if (strpos($tmp, '//') !== false) {
                    if (substr(trim($tmp), 0, 2) == '//') {
                        continue;
                    }
                    $chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
                    $is_quot = $is_apos = false;
                    foreach ($chars as $key => $char) {
                        if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
                            $is_quot = !$is_quot;
                        } else if ($char == '\'' && @$chars[$key - 1] != '\\' && !$is_quot) {
                            $is_apos = !$is_apos;
                        } else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
                            $tmp = substr($tmp, 0, $key);
                            break;
                        }
                    }
                }
                $c .= $tmp;
            }
        }
        $c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
        $c = preg_replace('/\\s{2,}/', ' ', $c);
        $c = preg_replace('/>\\s</', '> <', $c);
        $c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
        $c = preg_replace('/<!--[^!]*-->/', '', $c);
        $compress .= $c;
    }
    return $compress;
}
function seoSetting($obj){
}

//返回预估阅读时间
function readTime($obj){
    $words = mb_strlen($obj->content, 'UTF-8');
    $minus = $words/550;
    if($minus >= 1){
        $minus = round($minus,0);
    }else{
        $minus = round($minus,1);
    }
    echo "$minus MINUTES READ (ABOUT $words WORDS)";
}

//返回tag样式
function getTags($tags){
    if(is_array($tags)){
        foreach($tags as $tag){
            echo "<span class=\"column is-narrow\"><a class=\"tag is-light article-tag\" href=\"".$tag['permalink']."\">#".$tag['name']."</a></span>";
        }
    }
}

//替代content输出
function fixContent($obj,$more = false)
{
    //$obj->excerpt = parseContent($obj);
    echo false !== $more && false !== strpos($obj->text, '<!--more-->') ?
    $obj->excerpt . "<p class=\"article-more-link\"><a href=\"{$obj->permalink}\" title=\"{$obj->title}\">{$more}</a></p>" : $obj->content;
}

//输出分页信息
function paginator($obj, $prev = '&laquo;', $next = '&raquo;', $splitPage = 3, $splitWord = '...', $template = '')
{
    if ($obj->have()) {
        $hasNav = false;
        $default = array(
            'itemTag'       =>  'li',
            'textTag'       =>  '',
            'currentClass'  =>  'is-current',
            'prevClass'     =>  '',
            'nextClass'     =>  '',
            'forceACurrentClass' => true,
            'showPN'        =>  false
        );

        if (is_string($template)) {
            parse_str($template, $config);
        } else {
            $config = $template;
        }

        $template = array_merge($default, $config);
        
        $total = $obj->getTotal();
        $obj->pluginHandle()->trigger($hasNav)->pageNav($obj->getCurrentPage(), $total, 
            $obj->parameter->pageSize, $prev, $next, $splitPage, $splitWord);

        $options = Typecho_Widget::widget('Widget_Options');
        if (!$hasNav && $total > $obj->parameter->pageSize) {
            $url = $obj->parameter->type .
            (false === strpos($obj->parameter->type, '_page') ? '_page' : NULL);
            $query = Typecho_Router::url($url,
            $obj->getPageRow(), $options->index);

            /** 使用盒状分页 */
            $nav = new Typecho_Widget_Helper_PageNavigator_Box($total   , 
                $obj->getCurrentPage(), $obj->parameter->pageSize, $query);
            $nav->render($prev, $next, $splitPage, $splitWord, $template);
        }
    }
}

//返回页面链接
function getPaginLink($obj, $value){
    $options = Typecho_Widget::widget('Widget_Options');
    $query = Typecho_Router::url($obj->parameter->type .
            (false === strpos($obj->parameter->type, '_page') ? '_page' : NULL),
            $obj->getPageRow(), $options->index);
    $link = str_replace('{page}',$value,$query);
    return $link;
}
