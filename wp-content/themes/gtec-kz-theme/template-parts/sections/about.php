<section class="ws-section" id="about">
    <div class="ws-container">
        <div class="ws-about">

            <div class="ws-about__content ws-fade-left">
                <!-- Section illustration: team avatars -->
                <div class="ws-about-illustration">
                    <div class="ws-avatars">
                        <div class="ws-avatar ws-avatar--1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                        </div>
                        <div class="ws-avatar ws-avatar--2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                        </div>
                        <div class="ws-avatar ws-avatar--3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                        </div>
                        <div class="ws-avatar ws-avatar--more">+5</div>
                    </div>
                    <div class="ws-about-illustration__bar">
                        <div class="ws-about-illustration__fill"></div>
                    </div>
                    <span class="ws-about-illustration__label" data-i18n="about_badge">Біз туралы</span>
                </div>

                <span class="ws-label" data-i18n="about_badge">Біз туралы</span>
                <p class="ws-about__legal-name">
                    <span data-i18n="footer_legal_name">ТОО «Batys IT Group»</span>
                    <span class="ws-about__legal-sub" data-i18n="footer_legal_sub">Товарищество с ограниченной ответственностью</span>
                </p>
                <h2 class="ws-about__title">
                    <span data-i18n="about_title">Біз цифрлық өнімдер жасаймыз</span>
                    <span class="ws-text-accent" data-i18n="about_accent"> жүрекпен</span>
                </h2>
                <p class="ws-about__text" data-i18n="about_p1">
                    Мы — команда разработчиков и дизайнеров, которая превращает идеи в работающие продукты. Каждый проект для нас — это возможность создать что-то лучшее.
                </p>
                <p class="ws-about__text" data-i18n="about_p2">
                    Работаем с бизнесами любого масштаба: от стартапов до крупных компаний. Наш подход — глубокое погружение в задачу клиента и поиск оптимального решения.
                </p>

                <div class="ws-about__values">
                    <?php
                    $values = [
                        ['i18n_title' => 'val1_title', 'i18n_desc' => 'val1_desc', 'title_ru' => 'Качество',      'desc_ru' => 'Пишем чистый, поддерживаемый код'],
                        ['i18n_title' => 'val2_title', 'i18n_desc' => 'val2_desc', 'title_ru' => 'Скорость',      'desc_ru' => 'Соблюдаем дедлайны и сроки'],
                        ['i18n_title' => 'val3_title', 'i18n_desc' => 'val3_desc', 'title_ru' => 'Прозрачность',  'desc_ru' => 'Держим клиента в курсе каждого шага'],
                    ];
                    foreach ($values as $v): ?>
                    <div class="ws-about__value ws-fade-up">
                        <div class="ws-about__value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        </div>
                        <div>
                            <p class="ws-about__value-title" data-i18n="<?php echo $v['i18n_title']; ?>"><?php echo esc_html($v['title_ru']); ?></p>
                            <p class="ws-about__value-desc" data-i18n="<?php echo $v['i18n_desc']; ?>"><?php echo esc_html($v['desc_ru']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="ws-about__stats-wrap ws-fade-right" data-delay="200">
                <div class="ws-about__stats-bg"></div>
                <div class="ws-about__stats">
                    <?php
                    $stats = [
                        ['value' => '50+',  'label' => 'Проектов / Жобалар'],
                        ['value' => '40+',  'label' => 'Клиентов / Клиенттер'],
                        ['value' => '3+',   'label' => 'Лет / Жыл'],
                        ['value' => '100%', 'label' => 'Вовремя / Уақытында'],
                    ];
                    foreach ($stats as $s): ?>
                    <div class="ws-about__stat-card">
                        <span class="ws-about__stat-value ws-count-up"><?php echo esc_html($s['value']); ?></span>
                        <span class="ws-about__stat-label"><?php echo esc_html($s['label']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>
