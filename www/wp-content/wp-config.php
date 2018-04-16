<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'edakoff');

/** Имя пользователя MySQL */
define('DB_USER', 'edakoff');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'X2o8F0y3');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*S.,:DGv#l|&!O{;~bt8E.S;8#qR7u3fh7cDf@9(<p.sSl[ZAa.L*?y>rBW-)-!j');
define('SECURE_AUTH_KEY',  'dIv|b$DfaC=eZAYo#Fs<Jjx21UyTjExC6`|W=PKX^}fEY]km7/-&r`1t8^FS845k');
define('LOGGED_IN_KEY',    '!HZQOLI|)9Vh=tHjyQlH%q6TpcUzv/}7H_!K]Wg~wd2o?ZU7n%ncAclWd0i`;bhi');
define('NONCE_KEY',        'GgH]iF.$9eW{ystc8ORg6*g%>CZ<7@wfJT]pJzXb>sVp;L%U6fN^?O[ r,jK5{n|');
define('AUTH_SALT',        'zN.)T=A,kn+BSu`q>DO61#Mw9^J,~xJRoq:<r+*Glhnk/9REvILs,}GuUzURT+B}');
define('SECURE_AUTH_SALT', 'qOWl+x?lA%,ju.;_g$zS2K.qF3(HPp|Vz|+r<pRT282GM<YG9<K|x+06Wvqxb,dG');
define('LOGGED_IN_SALT',   '8<I(t(.xQ+:w/Ewsu4qp`g].hqx=vp%jf&zUNfFA0Y+Tqo,Io|V`In;[,bx=!rf<');
define('NONCE_SALT',       'k5VHk!r&#z`Y;-PFCE-pHG8u5aA,,M4@,Y=5$eWD0V Hxj.~F`5%b!=LQK(PL?MF');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
