<?php
defined('ABSPATH') || exit;

/* -------------------------------------------------------
   Theme Setup
------------------------------------------------------- */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus(['primary' => __('Основное меню', 'webstudio')]);
});

/* -------------------------------------------------------
   Enqueue Assets
------------------------------------------------------- */

add_action('wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'webstudio-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        null
    );
    wp_enqueue_style('webstudio-style', get_template_directory_uri() . '/assets/css/main.css', [], time());
    wp_enqueue_script('webstudio-main', get_template_directory_uri() . '/assets/js/main.js', [], time(), true);

    wp_localize_script('webstudio-main', 'wsConfig', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('ws_contact_nonce'),
        'siteUrl' => get_site_url(),
    ]);
});

/* -------------------------------------------------------
   Custom Post Types
------------------------------------------------------- */
add_action('init', function () {
    // Service CPT
    register_post_type('ws_service', [
        'labels'      => [
            'name'          => 'Услуги',
            'singular_name' => 'Услуга',
            'add_new_item'  => 'Добавить услугу',
            'edit_item'     => 'Редактировать услугу',
        ],
        'public'      => false,
        'show_ui'     => true,
        'show_in_menu'=> true,
        'menu_icon'   => 'dashicons-admin-tools',
        'supports'    => ['title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'],
        'rewrite'     => false,
    ]);

    // Portfolio CPT
    register_post_type('ws_portfolio', [
        'labels'      => [
            'name'          => 'Портфолио',
            'singular_name' => 'Проект',
            'add_new_item'  => 'Добавить проект',
            'edit_item'     => 'Редактировать проект',
        ],
        'public'      => true,
        'show_ui'     => true,
        'show_in_menu'=> true,
        'menu_icon'   => 'dashicons-portfolio',
        'supports'    => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'has_archive' => false,
        'rewrite'     => ['slug' => 'portfolio'],
    ]);

    // Portfolio Category Taxonomy
    register_taxonomy('portfolio_cat', 'ws_portfolio', [
        'labels'      => [
            'name'          => 'Категории портфолио',
            'singular_name' => 'Категория',
        ],
        'hierarchical'=> true,
        'show_ui'     => true,
        'rewrite'     => ['slug' => 'portfolio-cat'],
    ]);

    // Leads CPT
    register_post_type('ws_lead', [
        'labels'       => [
            'name'          => 'Заявки',
            'singular_name' => 'Заявка',
            'all_items'     => 'Все заявки',
            'view_item'     => 'Просмотр заявки',
            'search_items'  => 'Поиск заявок',
            'not_found'     => 'Заявок нет',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-email-alt2',
        'menu_position'=> 3,
        'supports'     => ['title'],
        'capabilities' => ['create_posts' => 'do_not_allow'],
        'map_meta_cap' => true,
    ]);
});

/* -------------------------------------------------------
   Leads: Admin Columns
------------------------------------------------------- */
add_filter('manage_ws_lead_posts_columns', function ($cols) {
    return [
        'cb'              => $cols['cb'],
        'title'           => 'Имя / Услуга',
        'ws_lead_email'   => 'Email',
        'ws_lead_phone'   => 'Телефон',
        'ws_lead_contact' => 'Связь',
        'ws_lead_status'  => 'Статус',
        'date'            => 'Дата',
    ];
});

add_action('manage_ws_lead_posts_custom_column', function ($col, $post_id) {
    $val = get_post_meta($post_id, $col, true);
    switch ($col) {
        case 'ws_lead_email':
            echo $val ? '<a href="mailto:' . esc_attr($val) . '">' . esc_html($val) . '</a>' : '—';
            break;
        case 'ws_lead_phone':
            echo $val ? '<a href="tel:' . esc_attr($val) . '">' . esc_html($val) . '</a>' : '—';
            break;
        case 'ws_lead_contact':
            $icons = ['email' => '📧', 'telegram' => '✈️', 'whatsapp' => '💬'];
            $icon  = $icons[$val] ?? '📧';
            echo $val ? $icon . ' ' . esc_html(ucfirst($val)) : '—';
            break;
        case 'ws_lead_status':
            $status = get_post_meta($post_id, 'ws_lead_status', true) ?: 'new';
            $labels = ['new' => ['Новая', '#6366f1'], 'in_progress' => ['В работе', '#f97316'], 'done' => ['Завершена', '#10b981']];
            [$label, $color] = $labels[$status] ?? $labels['new'];
            echo '<span style="background:' . $color . '20;color:' . $color . ';padding:2px 10px;border-radius:20px;font-size:12px;font-weight:600">' . $label . '</span>';
            break;
    }
}, 10, 2);

add_filter('manage_edit-ws_lead_sortable_columns', function ($cols) {
    $cols['date'] = 'date';
    return $cols;
});

/* -------------------------------------------------------
   Leads: Detail Meta Box
------------------------------------------------------- */
add_action('add_meta_boxes', function () {
    add_meta_box('ws_lead_details',    'Детали заявки',            'ws_lead_meta_box',      'ws_lead',        'normal', 'high');
    add_meta_box('ws_lead_status_box', 'Статус заявки',            'ws_lead_status_box',    'ws_lead',        'side',   'high');
    add_meta_box('ws_service_fields',  'Настройки услуги',         'ws_service_meta_box',   'ws_service',     'side',   'default');
    add_meta_box('ws_portfolio_fields','Настройки проекта',        'ws_portfolio_meta_box', 'ws_portfolio',   'side',   'default');
});

function ws_service_meta_box($post) {
    $img    = get_post_meta($post->ID, 'ws_service_img',    true);
    $accent = get_post_meta($post->ID, 'ws_service_accent', true);
    wp_nonce_field('ws_service_meta_nonce', 'ws_service_meta_nonce');
    echo '<p><label style="display:block;margin-bottom:4px;font-weight:600">URL иллюстрации (SVG)</label>';
    echo '<input type="url" name="ws_service_img" value="' . esc_attr($img) . '" style="width:100%;padding:4px 6px"></p>';
    echo '<p><label style="display:block;margin-bottom:4px;font-weight:600">Акцентный цвет (HEX)</label>';
    echo '<input type="text" name="ws_service_accent" value="' . esc_attr($accent ?: '#6366f1') . '" style="width:100%;padding:4px 6px" placeholder="#6366f1"></p>';
    echo '<p style="color:#888;font-size:12px">Если загружено «Миниатюра», она имеет приоритет над URL.</p>';
}

add_action('save_post_ws_service', function ($post_id) {
    if (!isset($_POST['ws_service_meta_nonce']) || !wp_verify_nonce($_POST['ws_service_meta_nonce'], 'ws_service_meta_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['ws_service_img']))    update_post_meta($post_id, 'ws_service_img',    esc_url_raw($_POST['ws_service_img']));
    if (isset($_POST['ws_service_accent'])) update_post_meta($post_id, 'ws_service_accent', sanitize_hex_color($_POST['ws_service_accent']));
});

function ws_portfolio_meta_box($post) {
    $img  = get_post_meta($post->ID, 'ws_project_img', true);
    $url  = get_post_meta($post->ID, 'ws_project_url', true);
    $tags = get_post_meta($post->ID, 'ws_tags',        true);
    wp_nonce_field('ws_portfolio_meta_nonce', 'ws_portfolio_meta_nonce');
    echo '<p><label style="display:block;margin-bottom:4px;font-weight:600">URL иллюстрации (SVG)</label>';
    echo '<input type="url" name="ws_project_img" value="' . esc_attr($img) . '" style="width:100%;padding:4px 6px"></p>';
    echo '<p><label style="display:block;margin-bottom:4px;font-weight:600">URL проекта</label>';
    echo '<input type="url" name="ws_project_url" value="' . esc_attr($url) . '" style="width:100%;padding:4px 6px" placeholder="https://example.com"></p>';
    echo '<p><label style="display:block;margin-bottom:4px;font-weight:600">Теги (через запятую)</label>';
    echo '<input type="text" name="ws_tags" value="' . esc_attr($tags) . '" style="width:100%;padding:4px 6px" placeholder="React, Node.js"></p>';
    echo '<p style="color:#888;font-size:12px">Если загружена «Миниатюра», она имеет приоритет над URL.</p>';
}

add_action('save_post_ws_portfolio', function ($post_id) {
    if (!isset($_POST['ws_portfolio_meta_nonce']) || !wp_verify_nonce($_POST['ws_portfolio_meta_nonce'], 'ws_portfolio_meta_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['ws_project_img'])) update_post_meta($post_id, 'ws_project_img', esc_url_raw($_POST['ws_project_img']));
    if (isset($_POST['ws_project_url'])) update_post_meta($post_id, 'ws_project_url', esc_url_raw($_POST['ws_project_url']));
    if (isset($_POST['ws_tags']))        update_post_meta($post_id, 'ws_tags',        sanitize_text_field($_POST['ws_tags']));
});

function ws_lead_meta_box($post) {
    $fields = [
        'ws_lead_name'    => 'Имя',
        'ws_lead_email'   => 'Email',
        'ws_lead_phone'   => 'Телефон',
        'ws_lead_contact' => 'Способ связи',
        'ws_lead_service' => 'Услуга',
        'ws_lead_message' => 'Сообщение',
        'ws_lead_date'    => 'Дата отправки',
    ];
    echo '<table style="width:100%;border-collapse:collapse">';
    foreach ($fields as $key => $label) {
        $val = get_post_meta($post->ID, $key, true);
        if (!$val) continue;
        $display = ($key === 'ws_lead_message')
            ? '<div style="white-space:pre-wrap;background:#f9f9f9;padding:10px;border-radius:6px;border:1px solid #eee">' . esc_html($val) . '</div>'
            : '<strong>' . esc_html($val) . '</strong>';
        echo '<tr><td style="padding:8px 12px 8px 0;color:#666;white-space:nowrap;vertical-align:top;width:140px">' . esc_html($label) . '</td>';
        echo '<td style="padding:8px 0">' . $display . '</td></tr>';
    }
    echo '</table>';
}

function ws_lead_status_box($post) {
    $status  = get_post_meta($post->ID, 'ws_lead_status', true) ?: 'new';
    $options = ['new' => 'Новая', 'in_progress' => 'В работе', 'done' => 'Завершена'];
    wp_nonce_field('ws_lead_status_nonce', 'ws_lead_status_nonce');
    echo '<select name="ws_lead_status" style="width:100%;padding:6px">';
    foreach ($options as $val => $label) {
        echo '<option value="' . esc_attr($val) . '"' . selected($status, $val, false) . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}

add_action('save_post_ws_lead', function ($post_id) {
    if (!isset($_POST['ws_lead_status_nonce']) || !wp_verify_nonce($_POST['ws_lead_status_nonce'], 'ws_lead_status_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['ws_lead_status'])) {
        update_post_meta($post_id, 'ws_lead_status', sanitize_text_field($_POST['ws_lead_status']));
    }
});

/* -------------------------------------------------------
   Contact Form AJAX
------------------------------------------------------- */
add_action('wp_ajax_nopriv_ws_contact', 'ws_handle_contact');
add_action('wp_ajax_ws_contact', 'ws_handle_contact');

function ws_handle_contact() {
    check_ajax_referer('ws_contact_nonce', 'nonce');

    $name    = sanitize_text_field($_POST['name']           ?? '');
    $email   = sanitize_email($_POST['email']               ?? '');
    $phone   = sanitize_text_field($_POST['phone']          ?? '');
    $contact = sanitize_text_field($_POST['contact_method'] ?? 'email');
    $service = sanitize_text_field($_POST['service']        ?? '');
    $message = sanitize_textarea_field($_POST['message']    ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(['message' => 'Заполните обязательные поля.']);
    }
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Неверный email адрес.']);
    }

    // 1. Сохранить заявку в БД
    $lead_id = wp_insert_post([
        'post_type'   => 'ws_lead',
        'post_title'  => sanitize_text_field($name . ' — ' . ($service ?: 'Не указано')),
        'post_status' => 'publish',
        'post_date'   => current_time('mysql'),
    ]);
    if ($lead_id && !is_wp_error($lead_id)) {
        update_post_meta($lead_id, 'ws_lead_name',    $name);
        update_post_meta($lead_id, 'ws_lead_email',   $email);
        update_post_meta($lead_id, 'ws_lead_phone',   $phone);
        update_post_meta($lead_id, 'ws_lead_contact', $contact);
        update_post_meta($lead_id, 'ws_lead_service', $service);
        update_post_meta($lead_id, 'ws_lead_message', $message);
        update_post_meta($lead_id, 'ws_lead_date',    current_time('d.m.Y H:i'));
        update_post_meta($lead_id, 'ws_lead_status',  'new');
    }

    // 2. Уведомить администратора на email
    $admin_to      = get_option('admin_email');
    $admin_subject = "🔔 Новая заявка от {$name} — gtec.kz";
    $admin_body    = "Новая заявка с сайта gtec.kz\n\n"
                   . "Имя:          {$name}\n"
                   . "Email:        {$email}\n"
                   . (!empty($phone) ? "Телефон:      {$phone}\n" : '')
                   . "Способ связи: {$contact}\n"
                   . "Услуга:       {$service}\n"
                   . "Дата:         " . current_time('d.m.Y H:i') . "\n\n"
                   . "Сообщение:\n{$message}";
    $admin_headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}"];
    wp_mail($admin_to, $admin_subject, $admin_body, $admin_headers);

    // 3. Автоответ клиенту
    $reply_subject = 'Ваша заявка принята — gtec.kz';
    $reply_body    = "Здравствуйте, {$name}!\n\n"
                   . "Мы получили вашу заявку и свяжемся с вами в течение 24 часов.\n\n"
                   . "Детали заявки:\n"
                   . "  Услуга:       " . ($service ?: 'Не указано') . "\n"
                   . "  Способ связи: {$contact}\n"
                   . (!empty($phone) ? "  Телефон:      {$phone}\n" : '')
                   . "\nС уважением,\nКоманда gtec.kz";
    wp_mail($email, $reply_subject, $reply_body, ['Content-Type: text/plain; charset=UTF-8']);

    // 4. Уведомление в Telegram
    ws_notify_telegram($name, $email, $phone, $contact, $service, $message);

    wp_send_json_success(['message' => 'ok']);
}

function ws_notify_telegram(string $name, string $email, string $phone, string $contact, string $service, string $message): void {
    $token   = get_theme_mod('ws_tg_token', '');
    $chat_id = get_theme_mod('ws_tg_chat_id', '');
    if (empty($token) || empty($chat_id)) return;

    $icons  = ['email' => '📧', 'telegram' => '✈️', 'whatsapp' => '💬'];
    $c_icon = $icons[$contact] ?? '📧';

    $text  = "🔔 Новая заявка — gtec.kz\n\n";
    $text .= "👤 Имя: {$name}\n";
    $text .= "📧 Email: {$email}\n";
    if (!empty($phone)) $text .= "📞 Телефон: {$phone}\n";
    $text .= "{$c_icon} Связь: " . ucfirst($contact) . "\n";
    $text .= "🛠 Услуга: " . ($service ?: 'Не указано') . "\n";
    $text .= "🕐 Дата: " . current_time('d.m.Y H:i') . "\n\n";
    $text .= "📝 Сообщение:\n{$message}";

    if (!function_exists('curl_init')) return;

    $ch = curl_init("https://api.telegram.org/bot{$token}/sendMessage");
    curl_setopt_array($ch, [
        CURLOPT_POST            => true,
        CURLOPT_POSTFIELDS      => http_build_query([
            'chat_id' => $chat_id,
            'text'    => $text,
        ]),
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_TIMEOUT         => 5,
        CURLOPT_CONNECTTIMEOUT  => 3,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_HTTPPROXYTUNNEL => false,
        CURLOPT_PROXY           => '',
    ]);
    curl_exec($ch);
    curl_close($ch);
}


/* -------------------------------------------------------
   Customizer Options
------------------------------------------------------- */
add_action('customize_register', function ($wp_customize) {

    // --- Контакты ---
    $wp_customize->add_section('ws_contact_info', [
        'title'    => 'Контактная информация',
        'priority' => 30,
    ]);

    $contact_fields = [
        'ws_email'         => ['label' => 'Email',                   'default' => 'hello@gtec.kz'],
        'ws_telegram'      => ['label' => 'Telegram',                'default' => '@gtec_kz'],
        'ws_phone'         => ['label' => 'Телефон',                 'default' => '+7 (700) 000-00-00'],
        'ws_hero_title_ru' => ['label' => 'Заголовок героя (РУ)',    'default' => 'Создаём сайты, которые работают на вас'],
        'ws_hero_title_kz' => ['label' => 'Заголовок героя (ҚАЗ)',   'default' => 'Сізге жұмыс істейтін сайттар жасаймыз'],
        'ws_hero_sub_ru'   => ['label' => 'Подзаголовок героя (РУ)', 'default' => 'Современные, быстрые и эффективные веб-решения для бизнеса.'],
        'ws_hero_sub_kz'   => ['label' => 'Подзаголовок героя (ҚАЗ)','default' => 'Бизнес үшін заманауи, жылдам және тиімді веб-шешімдер.'],
    ];

    foreach ($contact_fields as $id => $args) {
        $wp_customize->add_setting($id, ['default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, ['label' => $args['label'], 'section' => 'ws_contact_info', 'type' => 'text']);
    }

    // --- Telegram Bot ---
    $wp_customize->add_section('ws_telegram_bot', [
        'title'       => '🤖 Telegram-уведомления',
        'description' => 'Мгновенные уведомления о новых заявках. Создайте бота через @BotFather и узнайте Chat ID через @userinfobot.',
        'priority'    => 31,
    ]);

    $tg_fields = [
        'ws_tg_token'   => ['label' => 'Bot Token (от @BotFather)',  'default' => ''],
        'ws_tg_chat_id' => ['label' => 'Chat ID (от @userinfobot)',  'default' => ''],
    ];

    foreach ($tg_fields as $id => $args) {
        $wp_customize->add_setting($id, ['default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, ['label' => $args['label'], 'section' => 'ws_telegram_bot', 'type' => 'text']);
    }
});

/* -------------------------------------------------------
   Helper: Get Customizer Value
------------------------------------------------------- */
function ws_opt(string $key, string $fallback = ''): string {
    return esc_html(get_theme_mod($key, $fallback));
}

/* -------------------------------------------------------
   Auto-Seed: Import defaults into CPT on first run
   Runs once; re-run by deleting option 'ws_seeded_v1'
------------------------------------------------------- */
function ws_seed_cpt_defaults(): void {
    if (get_option('ws_seeded_v1')) return;

    $img_uri  = get_template_directory_uri() . '/assets/img/';

    // --- Services ---
    $services = [
        ['title' => 'Веб-разработка',        'excerpt' => 'Создаём быстрые, адаптивные сайты на Next.js, React, TypeScript.',                           'img' => $img_uri . 'services/service-web.svg',       'accent' => '#6366f1', 'order' => 1],
        ['title' => 'UI/UX Дизайн',           'excerpt' => 'Проектируем интерфейсы, которые удобны для пользователей и приносят результат.',              'img' => $img_uri . 'services/service-design.svg',    'accent' => '#ec4899', 'order' => 2],
        ['title' => 'Интернет-магазины',       'excerpt' => 'E-commerce решения с удобной корзиной, оплатой и управлением товарами.',                       'img' => $img_uri . 'services/service-ecommerce.svg', 'accent' => '#10b981', 'order' => 3],
        ['title' => 'Лендинги',               'excerpt' => 'Продающие одностраничники с высокой конверсией для ваших продуктов и услуг.',                  'img' => $img_uri . 'services/service-landing.svg',   'accent' => '#3b82f6', 'order' => 4],
        ['title' => 'SEO-оптимизация',         'excerpt' => 'Оптимизируем сайты для поисковых систем, чтобы клиенты находили вас первыми.',                'img' => $img_uri . 'services/service-seo.svg',       'accent' => '#f97316', 'order' => 5],
        ['title' => 'Поддержка и обслуживание','excerpt' => 'Техническая поддержка, обновления и развитие вашего проекта после запуска.',                  'img' => $img_uri . 'services/service-support.svg',   'accent' => '#8b5cf6', 'order' => 6],
    ];

    foreach ($services as $srv) {
        $existing = get_posts(['post_type' => 'ws_service', 'title' => $srv['title'], 'posts_per_page' => 1, 'post_status' => 'publish']);
        if ($existing) continue;
        $id = wp_insert_post([
            'post_type'    => 'ws_service',
            'post_title'   => $srv['title'],
            'post_excerpt' => $srv['excerpt'],
            'post_status'  => 'publish',
            'menu_order'   => $srv['order'],
        ]);
        if ($id && !is_wp_error($id)) {
            update_post_meta($id, 'ws_service_img',    $srv['img']);
            update_post_meta($id, 'ws_service_accent', $srv['accent']);
        }
    }

    // --- Portfolio ---
    $projects = [
        [
            'title'   => 'Уральская СХОС — корпоративный сайт',
            'excerpt' => 'Корпоративный сайт для старейшей аграрной научной организации Казахстана. Каталог семян, новости, сертификаты.',
            'img'     => $img_uri . 'portfolio/u-shos.svg',
            'url'     => 'https://u-shos.kz/',
            'tags'    => 'WordPress, PHP, CSS',
            'cat'     => 'corporate',
            'order'   => 1,
        ],
        [
            'title'   => 'Edu-Digital — образовательная платформа',
            'excerpt' => 'Онлайн-платформа цифрового обучения для педагогов Казахстана. Видеолекции, мастер-классы, Zoom-вебинары.',
            'img'     => $img_uri . 'portfolio/edu-digital.svg',
            'url'     => 'https://www.edu-digital.kz/',
            'tags'    => 'React, TypeScript, Zoom API',
            'cat'     => 'corporate',
            'order'   => 2,
        ],
    ];

    foreach ($projects as $proj) {
        $existing = get_posts(['post_type' => 'ws_portfolio', 'title' => $proj['title'], 'posts_per_page' => 1, 'post_status' => 'publish']);
        if ($existing) continue;
        $id = wp_insert_post([
            'post_type'    => 'ws_portfolio',
            'post_title'   => $proj['title'],
            'post_excerpt' => $proj['excerpt'],
            'post_status'  => 'publish',
            'menu_order'   => $proj['order'],
        ]);
        if ($id && !is_wp_error($id)) {
            update_post_meta($id, 'ws_project_img', $proj['img']);
            update_post_meta($id, 'ws_project_url', $proj['url']);
            update_post_meta($id, 'ws_tags',        $proj['tags']);

            // Assign category taxonomy
            $term = get_term_by('slug', $proj['cat'], 'portfolio_cat');
            if (!$term) {
                $term = wp_insert_term(ucfirst($proj['cat']), 'portfolio_cat', ['slug' => $proj['cat']]);
                $term = is_array($term) ? get_term($term['term_id'], 'portfolio_cat') : false;
            }
            if ($term && !is_wp_error($term)) {
                wp_set_post_terms($id, [$term->term_id], 'portfolio_cat');
            }
        }
    }

    update_option('ws_seeded_v1', true);
}
add_action('admin_init', 'ws_seed_cpt_defaults');
