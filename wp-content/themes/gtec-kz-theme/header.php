<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="ws-progress-bar" id="ws-progress-bar" aria-hidden="true"></div>

<header class="ws-header" id="ws-header">
    <div class="ws-container ws-header__inner">

        <a href="<?php echo esc_url(home_url('/')); ?>" class="ws-logo">
            <span class="ws-logo__accent">gtec</span>.kz
        </a>

        <nav class="ws-nav" id="ws-nav" aria-label="Основное меню">
            <a href="#services" class="ws-nav__link" data-i18n="nav_services">Қызметтер</a>
            <a href="#portfolio" class="ws-nav__link" data-i18n="nav_portfolio">Портфолио</a>
            <a href="#about" class="ws-nav__link" data-i18n="nav_about">Біз туралы</a>
            <a href="#contact" class="ws-nav__link" data-i18n="nav_contact">Байланыс</a>
        </nav>

        <div class="ws-header__controls">
            <button class="ws-btn-icon" id="ws-lang-toggle" aria-label="Switch language" title="Тілді ауыстыру">
                <span id="ws-lang-label">РУС</span>
            </button>
            <button class="ws-btn-icon" id="ws-theme-toggle" aria-label="Toggle theme">
                <svg class="ws-icon-sun" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>
                <svg class="ws-icon-moon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" /></svg>
            </button>
            <a href="#contact" class="ws-btn ws-btn--primary ws-header__cta" data-i18n="nav_order">Заказать сайт</a>
            <button class="ws-burger" id="ws-burger" aria-label="Меню" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>

    </div>

    <div class="ws-mobile-nav" id="ws-mobile-nav" aria-hidden="true">
        <a href="#services" class="ws-mobile-nav__link" data-i18n="nav_services">Қызметтер</a>
        <a href="#portfolio" class="ws-mobile-nav__link" data-i18n="nav_portfolio">Портфолио</a>
        <a href="#about" class="ws-mobile-nav__link" data-i18n="nav_about">Біз туралы</a>
        <a href="#contact" class="ws-mobile-nav__link" data-i18n="nav_contact">Байланыс</a>
        <a href="#contact" class="ws-btn ws-btn--primary ws-mobile-nav__cta" data-i18n="nav_order">Сайт тапсырыс беру</a>
    </div>
</header>
