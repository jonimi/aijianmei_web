<?php  function isSetAvatar($uid){ return is_file( SITE_PATH.'/data/uploads/avatar/'.$uid.'/small.jpg'); } function getMiniNum($uid){ return M('weibo')->where('uid=' . $uid . ' AND isdel=0')->count(); } function getUserFollow($uid){ $count['following'] = M('weibo_follow')->where("uid=$uid AND type=0")->count(); $count['follower'] = M('weibo_follow')->where("fid=$uid AND type=0")->count(); return $count; } function getContentUrl($url) { return getShortUrl( $url[1] ).' '; } function login_emot_format($content) { return preg_replace_callback('/(?:#[^#]*[^#^\s][^#]*#|(\[.+?\]))/is', 'replaceEmot', $content); } return array ( 'app_debug' => false, 'app_domain_deploy' => false, 'app_plugin_on' => true, 'app_file_case' => false, 'app_autoload_reg' => true, 'app_autoload_path' => 'Think.Util.,D:\\wamp\\www\\callonteam\\aijianmei_web-client\\aijianmei_web-client/addons/plugins/', 'app_config_list' => array ( 0 => 'taglibs', 1 => 'routes', 2 => 'tags', 3 => 'htmls', 4 => 'modules', 5 => 'actions', ), 'cookie_expire' => 86400, 'cookie_domain' => '', 'cookie_path' => '/', 'cookie_prefix' => 'TS_', 'default_app' => 'home', 'default_module' => 'Index', 'default_action' => 'index', 'default_charset' => 'utf-8', 'default_timezone' => 'PRC', 'default_ajax_return' => 'JSON', 'default_theme' => 'default', 'default_lang' => 'zh-cn', 'db_type' => 'mysql', 'db_host' => 'localhost', 'db_name' => 'aijianmei2', 'db_user' => 'root', 'db_pwd' => '', 'db_port' => 3306, 'db_prefix' => 'ai_', 'db_suffix' => '', 'db_fieldtype_check' => false, 'db_fields_cache' => true, 'db_charset' => 'utf8', 'db_deploy_type' => 0, 'db_rw_separate' => false, 'data_cache_time' => -1, 'data_cache_compress' => false, 'data_cache_check' => false, 'data_cache_type' => 'File', 'data_cache_path' => 'D:\\wamp\\www\\callonteam\\aijianmei_web-client\\aijianmei_web-client/_runtime/~temp/', 'data_cache_subdir' => true, 'data_path_level' => 2, 'data_cache_prefix' => 'ts_', 'error_message' => '您浏览的页面暂时发生了错误！请稍后再试～', 'error_page' => 'http://chile.aijianmei_client.com/index.php?app=home&mod=Public&act=error404', 'html_cache_on' => false, 'html_cache_time' => 60, 'html_read_type' => 0, 'html_file_suffix' => '.shtml', 'lang_switch_on' => true, 'lang_auto_detect' => true, 'log_record' => false, 'log_file_size' => 2097152, 'log_record_level' => array ( 0 => 'EMERG', 1 => 'ALERT', 2 => 'CRIT', 3 => 'ERR', ), 'page_rollpage' => 5, 'page_listrows' => 20, 'session_auto_start' => true, 'show_run_time' => false, 'show_adv_time' => false, 'show_db_times' => false, 'show_cache_times' => false, 'show_use_mem' => false, 'show_page_trace' => false, 'show_error_msg' => true, 'tmpl_engine_type' => 'Think', 'tmpl_detect_theme' => false, 'tmpl_template_suffix' => '.html', 'tmpl_cachfile_suffix' => '.php', 'tmpl_deny_func_list' => 'echo,exit', 'tmpl_parse_string' => '', 'tmpl_l_delim' => '{', 'tmpl_r_delim' => '}', 'tmpl_var_identify' => 'array', 'tmpl_strip_space' => false, 'tmpl_cache_on' => true, 'tmpl_cache_time' => -1, 'tmpl_action_error' => 'Public:success', 'tmpl_action_success' => 'Public:success', 'tmpl_trace_file' => 'D:\\wamp\\www\\callonteam\\aijianmei_web-client\\aijianmei_web-client/core/ThinkPHP/Tpl/PageTrace.tpl.php', 'tmpl_exception_file' => 'D:\\wamp\\www\\callonteam\\aijianmei_web-client\\aijianmei_web-client/core/ThinkPHP/Tpl/ThinkException.tpl.php', 'tmpl_file_depr' => '/', 'taglib_begin' => '<', 'taglib_end' => '>', 'taglib_load' => true, 'taglib_build_in' => 'input,business', 'taglib_pre_load' => 'html', 'tag_nested_level' => 3, 'tag_extend_parse' => '', 'token_on' => false, 'token_name' => '__hash__', 'token_type' => 'md5', 'url_case_insensitive' => true, 'url_router_on' => false, 'url_dispatch_on' => false, 'url_html_suffix' => '', 'var_app' => 'app', 'var_module' => 'mod', 'var_action' => 'act', 'var_router' => 'r', 'var_page' => 'p', 'var_template' => 't', 'var_language' => 'l', 'var_ajax_submit' => 'ajax', 'var_pathinfo' => 's', 'secure_code' => 'SECURE13892', 'default_apps' => array ( 0 => 'api', 1 => 'admin', 2 => 'home', 3 => 'myop', 4 => 'weibo', 5 => 'wap', 6 => 'w3g', 7 => 'index', ), 'router' => array ( 'wap/Index/index' => 'wap', 'w3g/Index/index' => 'w3g', 'admin/Index/index' => 'admin', 'home/Index/index' => 'index', 'home/User/index' => 'home', 'home/User/atme' => 'atme', 'home/User/collection' => 'favorite', 'home/User/comments' => 'comment', 'home/User/findfriend' => 'findfriend', 'home/Public/login' => 'login', 'home/Public/adminlogin' => 'adminlogin', 'home/Public/logout' => 'logout', 'home/Public/register' => 'register', 'home/Public/sendPassword' => 'sendPassword', 'home/Public/error404' => '404', 'home/Message/notify' => 'notification', 'home/Message/appmessage' => 'appmessage', 'home/Square/index' => 'square', 'home/Square/hot_topics' => 'square/topic', 'home/Square/star' => 'square/star', 'home/Square/top' => 'square/top', 'home/Square/app' => 'square/app', 'home/Message/index' => 'message', 'home/Message/inbox' => 'message/inbox', 'home/Message/outbox' => 'message/outbox', 'home/Message/detail' => 'message/[id]', 'home/Account/index' => 'setting', 'home/Account/privacy' => 'setting/privacy', 'home/Account/domain' => 'setting/domain', 'home/Account/security' => 'setting/security', 'home/Account/medal' => 'setting/medal', 'home/Account/bind' => 'setting/bind', 'home/Account/credit' => 'setting/credit', 'home/Account/verified' => 'setting/verified', 'home/Account/invite' => 'setting/invite', 'home/Space/index' => '@[uid]', 'home/Space/follow' => 'space/[uid]/[type]', 'home/Space/profile' => 'space/[uid]/profile', 'home/Space/detail' => 'weibo/[id]', 'home/User/topics' => 'topics/[domain]', 'home/User/search' => 'search', 'home/User/searchuser' => 'search/user', 'home/User/searchtag' => 'search/tag', 'home/Index/addapp' => 'app/add', 'home/Index/editapp' => 'app/edit', 'home/Index/install' => 'app/install/[app_id]', 'blog/Index/index' => 'app/blog', 'blog/Index/news' => 'app/blog/lastest', 'blog/Index/followsblog' => 'app/blog/following', 'blog/Index/my' => 'app/blog/my', 'blog/Index/personal' => 'app/blog/[uid]', 'blog/Index/show' => 'app/blog/detail/[id]', 'blog/Index/addBlog' => 'app/blog/post', 'blog/Index/edit' => 'app/blog/edit/[id]', 'blog/Index/admin' => 'app/blog/manage', 'photo/Index/index' => 'app/photo', 'photo/Index/all_albums' => 'app/photo/all_albums', 'photo/Index/all_photos' => 'app/photo/all_photos', 'photo/Index/albums' => 'app/photo/albums', 'photo/Index/photos' => 'app/photo/photos', 'photo/Index/album' => 'app/photo/album/[id]', 'photo/Index/photo' => 'app/photo/photo/[id]', 'photo/Upload/flash' => 'app/photo/multi_upload', 'photo/Upload/index' => 'app/photo/upload', 'photo/Manage/album_edit' => 'app/photo/edit/[id]', 'photo/Manage/album_order' => 'app/photo/order/[id]', 'event/Index/index' => 'app/event', 'event/Index/personal' => 'app/event/events', 'event/Index/addEvent' => 'app/event/post', 'event/Index/edit' => 'app/event/edit/[id]', 'event/Index/eventDetail' => 'app/event/detail/[id]', 'event/Index/member' => 'app/event/member/[id]', 'vote/Index/index' => 'app/vote', 'vote/Index/my' => 'app/vote/my', 'vote/Index/personal' => 'app/vote/[uid]', 'vote/Index/addPoll' => 'app/vote/post', 'vote/Index/pollDetail' => 'app/vote/detail/[id]', 'gift/Index/index' => 'app/gift', 'gift/Index/receivebox' => 'app/gift/receive', 'gift/Index/sendbox' => 'app/gift/send', 'gift/Index/personal' => 'app/gift/[uid]', 'poster/Index/index' => 'app/poster', 'poster/Index/personal' => 'app/poster/posters', 'poster/Index/addPosterSort' => 'app/poster/post', 'poster/Index/addPoster' => 'app/poster/post/[typeId]', 'poster/Index/editPoster' => 'app/poster/edit/[id]', 'poster/Index/posterDetail' => 'app/poster/detail/[id]', 'group/Index/index' => 'app/group', 'group/Index/newIndex' => 'app/group/index', 'group/Index/post' => 'app/group/my_post', 'group/Index/replied' => 'app/group/replied', 'group/Index/comment' => 'app/group/comment', 'group/Index/atme' => 'app/group/atme', 'group/SomeOne/index' => 'app/group/groups', 'group/Index/find' => 'app/group/class', 'group/Index/search' => 'app/group/search', 'group/Index/add' => 'app/group/add', 'group/Group/index' => 'app/group/[gid]', 'group/Group/search' => 'app/group/[gid]/search', 'group/Group/detail' => 'app/group/[gid]/detail/[id]', 'group/Invite/create' => 'app/group/[gid]/invite', 'group/Manage/index' => 'app/group/[gid]/setting/baseinfo', 'group/Manage/privacy' => 'app/group/[gid]/setting/private', 'group/Manage/membermanage' => 'app/group/[gid]/setting/member', 'group/Manage/announce' => 'app/group/[gid]/setting/announcement', 'group/Log/index' => 'app/group/[gid]/setting/log', 'group/Topic/index' => 'app/group/[gid]/bbs', 'group/Topic/add' => 'app/group/[gid]/bbs/post', 'group/Topic/edit' => 'app/group/[gid]/bbs/edit/[tid]', 'group/Topic/editPost' => 'app/group/[gid]/bbs_reply/edit/[pid]', 'group/Topic/topic' => 'app/group/[gid]/bbs/[tid]', 'group/Dir/index' => 'app/group/[gid]/file', 'group/Dir/upload' => 'app/group/[gid]/file/upload', 'group/Member/index' => 'app/group/[gid]/member', 'game/Index/gameplay' => 'app/game/[gid]', 'forum/Index/index' => 'app/forum', ), 'access' => array ( 'home/Public/*' => true, 'admin/*/*' => true, 'home/Index/index' => true, 'home/Space/*' => true, 'api/*/*' => true, 'wap/*/*' => true, 'w3g/*/*' => true, 'phptest/*/*' => true, 'home/Square/*' => true, 'home/User/topics' => true, 'home/Widget/renderWidget' => true, 'home/Widget/addonsRequest' => true, 'home/Widget/weiboShow' => true, 'home/Widget/share' => true, 'home/Widget/webpageComment' => true, 'blog/Index/news' => true, 'blog/Index/show' => true, 'blog/Index/personal' => true, 'photo/Index/photo' => true, 'photo/Index/album' => true, 'photo/Index/photos' => true, 'group/Index/index' => true, 'group/Index/newIndex' => true, 'group/Index/search' => true, 'group/Group/index' => true, ), 'badwords' => array ( 'ad' => array ( 0 => 'title', 1 => 'content', ), 'addons' => array ( 0 => 'pluginName ', 1 => 'author', 2 => 'info', ), 'app' => array ( 0 => 'app_alias ', 1 => 'description', 2 => 'category', 3 => 'sidebar_title', ), 'area' => array ( 0 => 'title', ), 'attach' => array ( 0 => 'name', ), 'blog' => array ( 0 => 'name', 1 => 'title', 2 => 'category_title', 3 => 'content', ), 'blog_category' => array ( 0 => 'name', ), 'comment' => array ( 0 => 'comment', ), 'credit_setting' => array ( 0 => 'alias', ), 'credit_type' => array ( 0 => 'alias', ), 'denounce' => array ( 0 => 'reason', 1 => 'content', ), 'document' => array ( 0 => 'title', 1 => 'content', ), 'event' => array ( 0 => 'title', 1 => 'contact', 2 => 'explain', 3 => 'address', ), 'event_opts' => array ( 0 => 'costExplain', ), 'event_type' => array ( 0 => 'name', ), 'event_user' => array ( 0 => 'contact', ), 'expression' => array ( 0 => 'title', ), 'fgamelist' => array ( 0 => 'fgname', 1 => 'fginstruction', ), 'forum' => array ( 0 => 'name', 1 => 'forum_intro', ), 'forum_credit' => array ( 0 => 'info', ), 'forum_filter_word' => array ( 0 => 'name', ), 'forum_log' => array ( 0 => 'content', ), 'forum_post' => array ( 0 => 'title', 1 => 'content', ), 'forum_sign' => array ( 0 => 'name', ), 'forum_tclass' => array ( 0 => 'name', ), 'forum_template_type' => array ( 0 => 'name', ), 'forum_template_widget' => array ( 0 => 'label', 1 => 'info', 2 => 'data', ), 'forum_topic' => array ( 0 => 'title', 1 => 'info', 2 => 'data', ), 'gift' => array ( 0 => 'name', ), 'gift_category' => array ( 0 => 'name', ), 'gift_user' => array ( 0 => 'sendInfo', ), 'group' => array ( 0 => 'name', 1 => 'intro', 2 => 'announce', ), 'group_attachment' => array ( 0 => 'name', ), 'group_category' => array ( 0 => 'title', ), 'group_member' => array ( 0 => 'reason', ), 'group_post' => array ( 0 => 'content', ), 'group_topic' => array ( 0 => 'title', ), 'group_topic_category' => array ( 0 => 'title', ), 'group_weibo' => array ( 0 => 'content', ), 'group_weibo_comment' => array ( 0 => 'content', ), 'group_weibo_topic' => array ( 0 => 'name', ), 'message_content' => array ( 0 => 'content', ), 'message_list' => array ( 0 => 'title', ), 'photo' => array ( 0 => 'name', ), 'photo_album' => array ( 0 => 'name', ), 'poster' => array ( 0 => 'title', 1 => 'content', 2 => 'contact', ), 'poster_small_type' => array ( 0 => 'label', 1 => 'name', ), 'poster_type' => array ( 0 => 'explain', ), 'screen' => array ( 0 => 'title', 1 => 'keyword', ), 'sitelist_site' => array ( 0 => 'name', 1 => 'description', ), 'survey' => array ( 0 => 'title', 1 => 'description', ), 'tag' => array ( 0 => 'tag_name', ), 'template' => array ( 0 => 'alias', 1 => 'title', 2 => 'body', ), 'user_set' => array ( 0 => 'fieldname', ), 'user_verified' => array ( 0 => 'reason', 1 => 'info', ), 'ucenter_user_link' => array ( 0 => 'uc_username', ), 'vote' => array ( 0 => 'title', 1 => 'explain', ), 'vote_opt' => array ( 0 => 'name', ), 'vote_user' => array ( 0 => 'opts', ), 'user_group_link' => array ( 0 => 'user_group_title ', ), 'user' => array ( 0 => 'uname', ), 'weibo' => array ( 0 => 'content', ), 'weibo_comment' => array ( 0 => 'content', ), 'weibo_follow_group' => array ( 0 => 'title', ), 'weibo_topic' => array ( 0 => 'name', ), 'weibo_topics' => array ( 0 => 'note', 1 => 'content', ), ), ); ?>