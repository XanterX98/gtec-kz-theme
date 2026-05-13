<section class="ws-hero" id="home">
    <canvas id="ws-particles"></canvas>
    <div class="ws-hero__bg-glow"></div>
    <div class="ws-hero__orb ws-hero__orb--right"></div>
    <div class="ws-hero__orb ws-hero__orb--left"></div>

    <div class="ws-container">
        <div class="ws-hero__inner">

            <!-- Badge -->
            <div class="ws-badge ws-hero__badge ws-fade-up" data-delay="0">
                <span class="ws-badge__dot"></span>
                <span data-i18n="hero_badge">Веб-әзірлеу & Дизайн</span>
            </div>

            <!-- Title -->
            <h1 class="ws-hero__title ws-fade-up" data-delay="100">
                <span data-i18n="hero_title"><?php echo ws_opt('ws_hero_title_kz', 'Сізге жұмыс істейтін'); ?></span>
                <br><span class="ws-hero__accent" data-i18n="hero_accent">сайттар жасаймыз</span>
            </h1>

            <!-- Subtitle -->
            <p class="ws-hero__sub ws-fade-up" data-delay="180" data-i18n="hero_subtitle">
                <?php echo ws_opt('ws_hero_sub_kz', 'Бизнес үшін заманауи, жылдам және тиімді веб-шешімдер. Лендингтен күрделі платформаларға дейін.'); ?>
            </p>

            <!-- Actions -->
            <div class="ws-hero__actions ws-fade-up" data-delay="260">
                <a href="#contact" class="ws-btn ws-btn--primary ws-btn--lg" data-i18n="hero_cta">
                    Жоба бастау
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#portfolio" class="ws-btn ws-btn--ghost ws-btn--lg" data-i18n="hero_cta2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Портфолионы көру
                </a>
            </div>

            <!-- Tech stack -->
            <div class="ws-hero__stack ws-fade-up" data-delay="340">
                <span class="ws-hero__stack-label" data-i18n="hero_stack_label">Технологии:</span>
                <div class="ws-hero__stack-items">
                    <span class="ws-stack-chip"><span style="background:#61dafb"></span>React</span>
                    <span class="ws-stack-chip"><span style="background:#fff;border:1px solid #444"></span>Next.js</span>
                    <span class="ws-stack-chip"><span style="background:#3178c6"></span>TypeScript</span>
                    <span class="ws-stack-chip"><span style="background:#38bdf8"></span>Tailwind</span>
                    <span class="ws-stack-chip"><span style="background:#21759b"></span>WordPress</span>
                </div>
            </div>

            <!-- Browser mockup -->
            <div class="ws-hero__mockup ws-fade-up" data-delay="440">
            <div class="ws-hero__mockup-glow"></div>

            <div class="ws-float-badge ws-float-badge--1">
                <span class="ws-float-badge__dot" style="background:#61dafb"></span>React
            </div>
            <div class="ws-float-badge ws-float-badge--2">
                <span class="ws-float-badge__dot" style="background:#fff;border:1px solid #555"></span>Next.js
            </div>
            <div class="ws-float-badge ws-float-badge--3">
                <span class="ws-float-badge__dot" style="background:#3178c6"></span>TypeScript
            </div>
            <div class="ws-float-badge ws-float-badge--4">
                <span class="ws-float-badge__dot" style="background:#38bdf8"></span>Tailwind
            </div>

            <div class="ws-browser ws-browser--wide">
                <div class="ws-browser__scanline"></div>
                <div class="ws-browser__bar">
                    <div class="ws-browser__dots">
                        <span class="ws-browser__dot ws-browser__dot--red"></span>
                        <span class="ws-browser__dot ws-browser__dot--yellow"></span>
                        <span class="ws-browser__dot ws-browser__dot--green"></span>
                    </div>
                    <div class="ws-browser__url">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        gtec.kz
                    </div>
                    <div class="ws-browser__bar-actions">
                        <div class="ws-browser__bar-btn"></div>
                        <div class="ws-browser__bar-btn"></div>
                    </div>
                </div>
                <div class="ws-browser__screen">

                    <!-- Nav -->
                    <div class="ws-mini-nav">
                        <div class="ws-mini-logo"></div>
                        <div class="ws-mini-links">
                            <div class="ws-mini-link"></div>
                            <div class="ws-mini-link ws-mini-link--active"></div>
                            <div class="ws-mini-link"></div>
                            <div class="ws-mini-link"></div>
                        </div>
                        <div class="ws-mini-btn"></div>
                    </div>

                    <!-- Hero -->
                    <div class="ws-mini-hero">
                        <div class="ws-mini-hero__bg"></div>
                        <div class="ws-mini-hero__content">
                            <div class="ws-mini-badge"></div>
                            <div class="ws-mini-line ws-mini-line--h"></div>
                            <div class="ws-mini-line ws-mini-line--h ws-mini-line--accent"></div>
                            <div class="ws-mini-line ws-mini-line--h ws-mini-line--accent ws-mini-line--short"></div>
                            <div class="ws-mini-line ws-mini-line--sub"></div>
                            <div class="ws-mini-line ws-mini-line--sub ws-mini-line--med"></div>
                            <div class="ws-mini-btns">
                                <div class="ws-mini-cta"></div>
                                <div class="ws-mini-outline"></div>
                            </div>
                        </div>
                        <div class="ws-mini-hero__visual">
                            <div class="ws-mini-browser-inner">
                                <div class="ws-mini-browser-bar">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="ws-mini-browser-body">
                                    <div class="ws-mini-browser-line"></div>
                                    <div class="ws-mini-browser-line ws-mini-browser-line--accent"></div>
                                    <div class="ws-mini-browser-line ws-mini-browser-line--short"></div>
                                </div>
                            </div>
                            <div class="ws-mini-orb ws-mini-orb--1"></div>
                            <div class="ws-mini-orb ws-mini-orb--2"></div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="ws-mini-stats">
                        <div class="ws-mini-stat">
                            <div class="ws-mini-stat__val"></div>
                            <div class="ws-mini-stat__lbl"></div>
                        </div>
                        <div class="ws-mini-stat">
                            <div class="ws-mini-stat__val"></div>
                            <div class="ws-mini-stat__lbl"></div>
                        </div>
                        <div class="ws-mini-stat">
                            <div class="ws-mini-stat__val"></div>
                            <div class="ws-mini-stat__lbl"></div>
                        </div>
                        <div class="ws-mini-stat">
                            <div class="ws-mini-stat__val"></div>
                            <div class="ws-mini-stat__lbl"></div>
                        </div>
                    </div>

                    <!-- Cards -->
                    <div class="ws-mini-cards">
                        <div class="ws-mini-card ws-mini-card--1">
                            <div class="ws-mini-card__icon"></div>
                            <div class="ws-mini-card__line ws-mini-card__line--title"></div>
                            <div class="ws-mini-card__line"></div>
                            <div class="ws-mini-card__line ws-mini-card__line--short"></div>
                        </div>
                        <div class="ws-mini-card ws-mini-card--2">
                            <div class="ws-mini-card__icon"></div>
                            <div class="ws-mini-card__line ws-mini-card__line--title"></div>
                            <div class="ws-mini-card__line"></div>
                            <div class="ws-mini-card__line ws-mini-card__line--short"></div>
                        </div>
                        <div class="ws-mini-card ws-mini-card--3">
                            <div class="ws-mini-card__icon"></div>
                            <div class="ws-mini-card__line ws-mini-card__line--title"></div>
                            <div class="ws-mini-card__line"></div>
                            <div class="ws-mini-card__line ws-mini-card__line--short"></div>
                        </div>
                    </div>

                </div>
            </div>
            </div><!-- /.ws-hero__mockup -->

        </div><!-- /.ws-hero__inner -->
    </div><!-- /.ws-container -->
</section>
