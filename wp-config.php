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
define('DB_NAME', 'testwp');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'lKw|;6E`oW2|cP3DRvyoafy]>HW/w+#~_eNA02[UE52-2~OK1.2 %G6,x.=0x8+E');
define('SECURE_AUTH_KEY',  '4ZcUmLqaZ#KakiaC{EI$WA_Ta1pbVKnnV{!qnlZ0_B#zp}&3Dvz~)-JHV]YQA1bn');
define('LOGGED_IN_KEY',    'Ot@O2j?@1uY;8.=3FG92-qMo-W{&c4og)N_ #wdIt:6D3QQ!/Zm$5+mqp4P5|+Vo');
define('NONCE_KEY',        'FJ:6* R]e%5BSiMQX|#_w>Vmp|Ib%F-?gbf5!QHLJ<X xT}i-KP!lb0_Y07kNJ#.');
define('AUTH_SALT',        'RRU$1lCi-{tMNj(zJI1Vlt<LwsU_EHA4r+R-sFrzwyFCP7GPd#D?yAZR*DK|$Z-h');
define('SECURE_AUTH_SALT', 'q2S9/i0RwYrC} [&altk8th;OrGR{<{KYbIHVn K0uZZJ5RIj{N;~ybIryv#cQlv');
define('LOGGED_IN_SALT',   '}#Ob=,6tkwYgv%4V9fXMxTNZCO{nX1C*qRt)&J(iJEr,^``3zvQ<hA&^qb>i6,G/');
define('NONCE_SALT',       '>oBa1n*/0cmk<y5OFJ[O$|J ZwWj#1$C[u!oT/4FQj8 mykz{Z9oUW@`OO,T438=');

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
