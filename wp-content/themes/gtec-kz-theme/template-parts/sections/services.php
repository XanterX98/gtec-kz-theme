<?php
$img_dir = get_template_directory_uri() . '/assets/img/services/';

$default_services = [
    [
        'img'        => $img_dir . 'service-web.svg',
        'img_alt'    => 'Веб-разработка',
        'icon_accent'=> '#6366f1',
        'i18n_title' => 'srv1_title',
        'i18n_desc'  => 'srv1_desc',
        'title_ru'   => 'Веб-разработка',
        'desc_ru'    => 'Создаём быстрые, адаптивные сайты на Next.js, React, TypeScript.',
    ],
    [
        'img'        => $img_dir . 'service-design.svg',
        'img_alt'    => 'UI/UX Дизайн',
        'icon_accent'=> '#ec4899',
        'i18n_title' => 'srv2_title',
        'i18n_desc'  => 'srv2_desc',
        'title_ru'   => 'UI/UX Дизайн',
        'desc_ru'    => 'Проектируем интерфейсы, которые удобны для пользователей и приносят результат.',
    ],
    [
        'img'        => $img_dir . 'service-ecommerce.svg',
        'img_alt'    => 'Интернет-магазины',
        'icon_accent'=> '#10b981',
        'i18n_title' => 'srv3_title',
        'i18n_desc'  => 'srv3_desc',
        'title_ru'   => 'Интернет-магазины',
        'desc_ru'    => 'E-commerce решения с удобной корзиной, оплатой и управлением товарами.',
    ],
    [
        'img'        => $img_dir . 'service-landing.svg',
        'img_alt'    => 'Лендинги',
        'icon_accent'=> '#3b82f6',
        'i18n_title' => 'srv4_title',
        'i18n_desc'  => 'srv4_desc',
        'title_ru'   => 'Лендинги',
        'desc_ru'    => 'Продающие одностраничники с высокой конверсией для ваших продуктов и услуг.',
    ],
    [
        'img'        => $img_dir . 'service-seo.svg',
        'img_alt'    => 'SEO-оптимизация',
        'icon_accent'=> '#f97316',
        'i18n_title' => 'srv5_title',
        'i18n_desc'  => 'srv5_desc',
        'title_ru'   => 'SEO-оптимизация',
        'desc_ru'    => 'Оптимизируем сайты для поисковых систем, чтобы клиенты находили вас первыми.',
    ],
    [
        'img'        => $img_dir . 'service-support.svg',
        'img_alt'    => 'Поддержка и обслуживание',
        'icon_accent'=> '#8b5cf6',
        'i18n_title' => 'srv6_title',
        'i18n_desc'  => 'srv6_desc',
        'title_ru'   => 'Поддержка и обслуживание',
        'desc_ru'    => 'Техническая поддержка, обновления и развитие вашего проекта после запуска.',
    ],
];

// Try to get services from CPT, fallback to defaults
$services_query = new WP_Query([
    'post_type'      => 'ws_service',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

$use_cpt = $services_query->have_posts();
?>

<section class="ws-section" id="services">
    <div class="ws-container">

        <div class="ws-section__header ws-fade-up">

            <!-- Section illustration: animated tech orbit -->
            <div class="ws-section-illustration ws-section-illustration--services">
                <div class="ws-orbit">
                    <div class="ws-orbit__ring ws-orbit__ring--1"></div>
                    <div class="ws-orbit__ring ws-orbit__ring--2"></div>
                    <div class="ws-orbit__core">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                    </div>
                    <div class="ws-orbit__planet ws-orbit__planet--1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z"/></svg>
                    </div>
                    <div class="ws-orbit__planet ws-orbit__planet--2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"/></svg>
                    </div>
                    <div class="ws-orbit__planet ws-orbit__planet--3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z"/></svg>
                    </div>
                </div>
            </div>

            <span class="ws-label" data-i18n="services_badge">Не жасаймыз</span>
            <h2 class="ws-section__title" data-i18n="services_title">Біздің қызметтер</h2>
            <p class="ws-section__sub" data-i18n="services_sub">Идеядан іске қосу мен қолдауға дейін толық әзірлеу циклі.</p>
        </div>

        <div class="ws-grid ws-grid--3">
            <?php if ($use_cpt):
                $i = 0;
                while ($services_query->have_posts()): $services_query->the_post();
                    $thumb  = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'medium') : '';
                    $svg    = $thumb ?: get_post_meta(get_the_ID(), 'ws_service_img', true);
                    $accent = get_post_meta(get_the_ID(), 'ws_service_accent', true) ?: '#6366f1';
            ?>
                <div class="ws-card ws-card--service ws-fade-up"
                     style="--card-accent:<?php echo esc_attr($accent); ?>"
                     data-delay="<?php echo ($i % 3) * 80; ?>">
                    <?php if ($svg): ?>
                    <div class="ws-card__preview">
                        <img src="<?php echo esc_url($svg); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    </div>
                    <?php endif; ?>
                    <div class="ws-card__body">
                        <h3 class="ws-card__title"><?php the_title(); ?></h3>
                        <p class="ws-card__desc"><?php the_excerpt(); ?></p>
                    </div>
                </div>
            <?php $i++; endwhile; wp_reset_postdata();
            else:
                foreach ($default_services as $i => $srv): ?>
                <div class="ws-card ws-card--service ws-fade-up"
                     style="--card-accent:<?php echo esc_attr($srv['icon_accent']); ?>"
                     data-delay="<?php echo ($i % 3) * 80; ?>">
                    <div class="ws-card__preview">
                        <img src="<?php echo esc_url($srv['img']); ?>"
                             alt="<?php echo esc_attr($srv['img_alt']); ?>"
                             loading="lazy">
                    </div>
                    <div class="ws-card__body">
                        <h3 class="ws-card__title" data-i18n="<?php echo esc_attr($srv['i18n_title']); ?>"><?php echo esc_html($srv['title_ru']); ?></h3>
                        <p class="ws-card__desc" data-i18n="<?php echo esc_attr($srv['i18n_desc']); ?>"><?php echo esc_html($srv['desc_ru']); ?></p>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>

    </div>
</section>
