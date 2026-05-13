<?php
$portfolio_query = new WP_Query([
    'post_type'      => 'ws_portfolio',
    'posts_per_page' => 12,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

$bg_colors = [
    'linear-gradient(135deg,#6366f1,#9333ea)',
    'linear-gradient(135deg,#3b82f6,#06b6d4)',
    'linear-gradient(135deg,#8b5cf6,#ec4899)',
    'linear-gradient(135deg,#10b981,#14b8a6)',
    'linear-gradient(135deg,#f97316,#f59e0b)',
    'linear-gradient(135deg,#f43f5e,#ec4899)',
];

$img_dir = get_template_directory_uri() . '/assets/img/portfolio/';

$default_projects = [
    [
        'title_ru'   => 'Уральская СХОС — корпоративный сайт',
        'title_kz'   => 'Уральская СХОС — корпоративтік сайт',
        'i18n_title' => 'ushos_title',
        'i18n_desc'  => 'ushos_desc',
        'cat'        => 'corporate',
        'desc_ru'    => 'Корпоративный сайт для старейшей аграрной научной организации Казахстана. Каталог семян, новости, сертификаты.',
        'desc_kz'    => 'Қазақстандағы ең ежелгі агрономиялық ғылыми ұйымның корпоративтік сайты. Тұқым каталогы, жаңалықтар.',
        'tags'       => ['WordPress', 'PHP', 'CSS'],
        'img'        => $img_dir . 'u-shos.svg',
        'url'        => 'https://u-shos.kz/',
    ],
    [
        'title_ru'   => 'Edu-Digital — образовательная платформа',
        'title_kz'   => 'Edu-Digital — білім беру платформасы',
        'i18n_title' => 'edudigital_title',
        'i18n_desc'  => 'edudigital_desc',
        'cat'        => 'corporate',
        'desc_ru'    => 'Онлайн-платформа цифрового обучения для педагогов Казахстана. Видеолекции, мастер-классы, Zoom-вебинары.',
        'desc_kz'    => 'Қазақстан педагогтері үшін цифрлық оқыту онлайн-платформасы. Бейнедәрістер, шеберлік сабақтары.',
        'tags'       => ['React', 'TypeScript', 'Zoom API'],
        'img'        => $img_dir . 'edu-digital.svg',
        'url'        => 'https://www.edu-digital.kz/',
    ],
    [
        'title_ru'   => 'Интернет-магазин электроники',
        'title_kz'   => 'Электроника интернет-дүкені',
        'i18n_title' => 'proj1_title',
        'i18n_desc'  => 'proj1_desc',
        'cat'        => 'ecommerce',
        'desc_ru'    => 'E-commerce с корзиной, оплатой и личным кабинетом.',
        'desc_kz'    => 'Себет, төлем бар e-commerce.',
        'tags'       => ['React', 'Node.js', 'PostgreSQL'],
        'img'        => '',
        'url'        => '',
    ],
    [
        'title_ru'   => 'Лендинг для стартапа',
        'title_kz'   => 'Стартап лендингі',
        'i18n_title' => 'proj2_title',
        'i18n_desc'  => 'proj2_desc',
        'cat'        => 'landing',
        'desc_ru'    => 'Продающий одностраничник с анимациями.',
        'desc_kz'    => 'Анимациялы сату беті.',
        'tags'       => ['Next.js', 'Framer Motion'],
        'img'        => '',
        'url'        => '',
    ],
    [
        'title_ru'   => 'Платформа для обучения',
        'title_kz'   => 'Оқыту платформасы',
        'i18n_title' => 'proj3_title',
        'i18n_desc'  => 'proj3_desc',
        'cat'        => 'corporate',
        'desc_ru'    => 'EdTech платформа с курсами и прогрессом.',
        'desc_kz'    => 'Курстар мен прогресс бар EdTech.',
        'tags'       => ['React', 'TypeScript', 'Prisma'],
        'img'        => '',
        'url'        => '',
    ],
    [
        'title_ru'   => 'Сайт ресторана',
        'title_kz'   => 'Мейрамхана сайты',
        'i18n_title' => 'proj4_title',
        'i18n_desc'  => 'proj4_desc',
        'cat'        => 'landing',
        'desc_ru'    => 'Сайт с меню, бронированием и галереей.',
        'desc_kz'    => 'Мәзір, брондау және галерея.',
        'tags'       => ['Next.js', 'Tailwind'],
        'img'        => '',
        'url'        => '',
    ],
    [
        'title_ru'   => 'Маркетплейс услуг',
        'title_kz'   => 'Қызметтер маркетплейсі',
        'i18n_title' => 'proj5_title',
        'i18n_desc'  => 'proj5_desc',
        'cat'        => 'ecommerce',
        'desc_ru'    => 'Платформа заказа услуг с системой отзывов.',
        'desc_kz'    => 'Пікірлер жүйесі бар платформа.',
        'tags'       => ['React', 'Node.js', 'MongoDB'],
        'img'        => '',
        'url'        => '',
    ],
];

$use_cpt = $portfolio_query->have_posts();

// Collect categories for filter
$filter_cats = [
    'all'       => ['ru' => 'Все',          'kz' => 'Барлығы'],
    'landing'   => ['ru' => 'Лендинг',      'kz' => 'Лендинг'],
    'ecommerce' => ['ru' => 'Магазин',      'kz' => 'Дүкен'],
    'corporate' => ['ru' => 'Корпоративный','kz' => 'Корпоративтік'],
];
?>

<section class="ws-section ws-section--muted" id="portfolio">
    <div class="ws-container">

        <div class="ws-section__header ws-fade-up">

            <!-- Section illustration: portfolio tiles -->
            <div class="ws-section-illustration ws-section-illustration--portfolio">
                <div class="ws-tiles">
                    <div class="ws-tile ws-tile--1"></div>
                    <div class="ws-tile ws-tile--2"></div>
                    <div class="ws-tile ws-tile--3"></div>
                    <div class="ws-tile ws-tile--4"></div>
                    <div class="ws-tile ws-tile--5"></div>
                    <div class="ws-tile ws-tile--6"></div>
                    <div class="ws-tile ws-tile--pulse"></div>
                </div>
            </div>

            <span class="ws-label" data-i18n="portfolio_badge">Біздің жұмыстар</span>
            <h2 class="ws-section__title" data-i18n="portfolio_title">Портфолио</h2>
            <p class="ws-section__sub" data-i18n="portfolio_sub">Клиенттеріміз үшін жүзеге асырған жобаларды қараңыз.</p>
        </div>

        <div class="ws-portfolio-filter ws-fade-up" id="ws-filter">
            <?php foreach ($filter_cats as $slug => $labels): ?>
            <button
                class="ws-filter-btn <?php echo $slug === 'all' ? 'ws-filter-btn--active' : ''; ?>"
                data-filter="<?php echo esc_attr($slug); ?>"
                data-i18n="filter_<?php echo $slug; ?>"
            ><?php echo esc_html($labels['ru']); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="ws-grid ws-grid--3" id="ws-portfolio-grid">

            <?php if ($use_cpt):
                $idx = 0;
                while ($portfolio_query->have_posts()): $portfolio_query->the_post();
                    $cats        = wp_get_post_terms(get_the_ID(), 'portfolio_cat');
                    $cat_slug    = !empty($cats) ? $cats[0]->slug : 'other';
                    $bg          = $bg_colors[$idx % count($bg_colors)];
                    $project_url = get_post_meta(get_the_ID(), 'ws_project_url', true);
                    $project_img = has_post_thumbnail()
                        ? get_the_post_thumbnail_url(null, 'medium_large')
                        : get_post_meta(get_the_ID(), 'ws_project_img', true);
                    $tags_raw    = get_post_meta(get_the_ID(), 'ws_tags', true);
                    $tags        = array_map('trim', explode(',', $tags_raw));
            ?>
            <div class="ws-portfolio-card ws-fade-up" data-cat="<?php echo esc_attr($cat_slug); ?>" data-delay="<?php echo ($idx % 3) * 80; ?>">
                <div class="ws-portfolio-card__thumb" style="background:<?php echo esc_attr($bg); ?>">
                    <?php if ($project_img): ?>
                        <img class="ws-portfolio-card__img"
                             src="<?php echo esc_url($project_img); ?>"
                             alt="<?php the_title_attribute(); ?>"
                             loading="lazy">
                    <?php endif; ?>
                    <?php if ($project_url): ?>
                    <a href="<?php echo esc_url($project_url); ?>" target="_blank" rel="noopener noreferrer" class="ws-portfolio-card__overlay">
                        <span data-i18n="portfolio_view">Смотреть проект</span>
                    </a>
                    <?php else: ?>
                    <div class="ws-portfolio-card__overlay">
                        <span data-i18n="portfolio_view">Смотреть проект</span>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="ws-portfolio-card__body">
                    <h3 class="ws-portfolio-card__title"><?php the_title(); ?></h3>
                    <p class="ws-portfolio-card__desc"><?php the_excerpt(); ?></p>
                    <?php if (!empty($tags_raw)): ?>
                    <div class="ws-tags">
                        <?php foreach ($tags as $tag): ?><span class="ws-tag"><?php echo esc_html($tag); ?></span><?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php $idx++; endwhile; wp_reset_postdata();
            else:
                foreach ($default_projects as $i => $p):
                    $bg = $bg_colors[$i % count($bg_colors)];
            ?>
            <div class="ws-portfolio-card ws-fade-up" data-cat="<?php echo esc_attr($p['cat']); ?>" data-delay="<?php echo ($i % 3) * 80; ?>">
                <div class="ws-portfolio-card__thumb" style="background:<?php echo esc_attr($bg); ?>">
                    <?php if (!empty($p['img'])): ?>
                        <img class="ws-portfolio-card__img"
                             src="<?php echo esc_url($p['img']); ?>"
                             alt="<?php echo esc_attr($p['title_ru']); ?>"
                             loading="lazy">
                    <?php else: ?>
                        <div class="ws-portfolio-card__placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" /></svg>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($p['url'])): ?>
                    <a href="<?php echo esc_url($p['url']); ?>" target="_blank" rel="noopener noreferrer" class="ws-portfolio-card__overlay">
                        <span data-i18n="portfolio_view">Смотреть проект</span>
                    </a>
                    <?php else: ?>
                    <div class="ws-portfolio-card__overlay">
                        <span data-i18n="portfolio_view">Смотреть проект</span>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="ws-portfolio-card__body">
                    <h3 class="ws-portfolio-card__title" data-i18n="<?php echo esc_attr($p['i18n_title']); ?>"><?php echo esc_html($p['title_ru']); ?></h3>
                    <p class="ws-portfolio-card__desc" data-i18n="<?php echo esc_attr($p['i18n_desc']); ?>"><?php echo esc_html($p['desc_ru']); ?></p>
                    <div class="ws-tags">
                        <?php foreach ($p['tags'] as $tag): ?><span class="ws-tag"><?php echo esc_html($tag); ?></span><?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>

        </div>
    </div>
</section>
