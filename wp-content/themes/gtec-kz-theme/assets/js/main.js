/* WebStudio Theme JS */
(function () {
    'use strict';

    /* -------------------------------------------------------
       Translations
    ------------------------------------------------------- */
    const TRANSLATIONS = {
        ru: {
            nav_services: 'Услуги',
            nav_portfolio: 'Портфолио',
            nav_about: 'О нас',
            nav_contact: 'Контакт',
            nav_order: 'Заказать сайт',
            hero_badge: 'Веб-разработка & Дизайн',
            hero_title: 'Создаём сайты, которые',
            hero_accent: 'работают на вас',
            hero_subtitle: 'Современные, быстрые и эффективные веб-решения для бизнеса. От лендинга до сложных платформ.',
            hero_cta: 'Начать проект',
            hero_cta2: 'Смотреть портфолио',
            stat_projects: 'Проектов',
            stat_clients: 'Клиентов',
            stat_years: 'Лет опыта',
            services_badge: 'Что мы делаем',
            services_title: 'Наши услуги',
            services_sub: 'Полный цикл разработки — от идеи до запуска и поддержки.',
            srv1_title: 'Веб-разработка',
            srv1_desc: 'Создаём быстрые, адаптивные сайты на Next.js, React, TypeScript.',
            srv2_title: 'UI/UX Дизайн',
            srv2_desc: 'Проектируем интерфейсы, которые удобны для пользователей и приносят результат.',
            srv3_title: 'Интернет-магазины',
            srv3_desc: 'E-commerce решения с удобной корзиной, оплатой и управлением товарами.',
            srv4_title: 'Лендинги',
            srv4_desc: 'Продающие одностраничники с высокой конверсией для ваших продуктов.',
            srv5_title: 'SEO-оптимизация',
            srv5_desc: 'Оптимизируем сайты для поисковых систем, чтобы клиенты находили вас первыми.',
            srv6_title: 'Поддержка',
            srv6_desc: 'Техническая поддержка, обновления и развитие вашего проекта после запуска.',
            portfolio_badge: 'Наши работы',
            portfolio_title: 'Портфолио',
            portfolio_sub: 'Посмотрите на проекты, которые мы реализовали для наших клиентов.',
            portfolio_view: 'Смотреть проект',
            filter_all: 'Все',
            filter_landing: 'Лендинг',
            filter_ecommerce: 'Магазин',
            filter_corporate: 'Корпоративный',
            about_badge: 'О нас',
            about_title: 'Мы создаём цифровые продукты',
            about_accent: ' с душой',
            about_p1: 'Мы — команда разработчиков и дизайнеров, которая превращает идеи в работающие продукты. Каждый проект для нас — это возможность создать что-то лучшее.',
            about_p2: 'Работаем с бизнесами любого масштаба: от стартапов до крупных компаний. Наш подход — глубокое погружение в задачу клиента.',
            val1_title: 'Качество',
            val1_desc: 'Пишем чистый, поддерживаемый код',
            val2_title: 'Скорость',
            val2_desc: 'Соблюдаем дедлайны и сроки',
            val3_title: 'Прозрачность',
            val3_desc: 'Держим клиента в курсе каждого шага',
            contact_badge: 'Связаться',
            contact_title: 'Начнём ваш проект?',
            contact_sub: 'Расскажите нам о вашей идее — мы ответим в течение 24 часов.',
            form_name: 'Ваше имя',
            form_email: 'Email',
            form_phone: 'Телефон',
            form_service: 'Услуга',
            form_service_ph: 'Выберите услугу',
            form_contact: 'Способ связи',
            form_contact_email: 'Email',
            form_contact_telegram: 'Telegram',
            form_contact_whatsapp: 'WhatsApp',
            form_message: 'Сообщение',
            form_submit: 'Отправить заявку',
            form_success: 'Заявка отправлена! Мы свяжемся с вами скоро.',
            form_success_sub: 'Письмо с подтверждением отправлено на ваш email.',
            hero_stack_label: 'Технологии:',
            footer_legal_name: 'ТОО «Batys IT Group»',
            footer_legal_sub:  'Товарищество с ограниченной ответственностью',
            footer_desc: 'Создаём современные веб-сайты и цифровые продукты для бизнеса в Казахстане и СНГ.',
            footer_links: 'Навигация',
            footer_social: 'Соцсети',
            footer_contact_title: 'Контакты',
            footer_city: 'Казахстан, Орал',
            footer_totop: 'Наверх',
            ushos_title:      'Уральская СХОС — корпоративный сайт',
            ushos_desc:       'Корпоративный сайт для старейшей аграрной научной организации Казахстана. Каталог семян, новости, сертификаты.',
            edudigital_title: 'Edu-Digital — образовательная платформа',
            edudigital_desc:  'Онлайн-платформа цифрового обучения для педагогов Казахстана. Видеолекции, мастер-классы, методические материалы и Zoom-вебинары.',
            proj1_title: 'Корпоративный сайт компании',
            proj1_desc: 'Многостраничный сайт с CMS, блогом и формами.',
            proj2_title: 'Интернет-магазин электроники',
            proj2_desc: 'E-commerce с корзиной, оплатой и личным кабинетом.',
            proj3_title: 'Лендинг для стартапа',
            proj3_desc: 'Продающий одностраничник с анимациями.',
            proj4_title: 'Платформа для обучения',
            proj4_desc: 'EdTech платформа с курсами и прогрессом.',
            proj5_title: 'Сайт ресторана',
            proj5_desc: 'Сайт с меню, бронированием и галереей.',
            proj6_title: 'Маркетплейс услуг',
            proj6_desc: 'Платформа заказа услуг с системой отзывов.',
            form_error_general: 'Произошла ошибка. Попробуйте снова.',
            form_error_network: 'Ошибка соединения. Попробуйте снова.',
            footer_rights: 'Все права защищены.',
        },
        kz: {
            nav_services: 'Қызметтер',
            nav_portfolio: 'Портфолио',
            nav_about: 'Біз туралы',
            nav_contact: 'Байланыс',
            nav_order: 'Сайт тапсырыс беру',
            hero_badge: 'Веб-әзірлеу & Дизайн',
            hero_title: 'Сізге жұмыс істейтін',
            hero_accent: 'сайттар жасаймыз',
            hero_subtitle: 'Бизнес үшін заманауи, жылдам және тиімді веб-шешімдер. Лендингтен күрделі платформаларға дейін.',
            hero_cta: 'Жоба бастау',
            hero_cta2: 'Портфолионы көру',
            stat_projects: 'Жоба',
            stat_clients: 'Клиент',
            stat_years: 'Жыл тәжірибе',
            services_badge: 'Не жасаймыз',
            services_title: 'Біздің қызметтер',
            services_sub: 'Идеядан іске қосу мен қолдауға дейін толық әзірлеу циклі.',
            srv1_title: 'Веб-әзірлеу',
            srv1_desc: 'Заманауи технологияларда жылдам, адаптивті сайттар жасаймыз.',
            srv2_title: 'UI/UX Дизайн',
            srv2_desc: 'Пайдаланушыларға ыңғайлы интерфейстер жобалаймыз.',
            srv3_title: 'Интернет-дүкендер',
            srv3_desc: 'Ыңғайлы себет және төлем жүйесі бар e-commerce шешімдер.',
            srv4_title: 'Лендингтер',
            srv4_desc: 'Өнімдерді іске қосу үшін жоғары конверсиялы сату беттері.',
            srv5_title: 'SEO оңтайландыру',
            srv5_desc: 'Клиенттер сізді бірінші табатындай іздеу жүйелерін оңтайландыру.',
            srv6_title: 'Қолдау',
            srv6_desc: 'Іске қосқаннан кейін жобаны техникалық қолдау және жаңарту.',
            portfolio_badge: 'Біздің жұмыстар',
            portfolio_title: 'Портфолио',
            portfolio_sub: 'Клиенттеріміз үшін жүзеге асырған жобаларды қараңыз.',
            portfolio_view: 'Жобаны көру',
            filter_all: 'Барлығы',
            filter_landing: 'Лендинг',
            filter_ecommerce: 'Дүкен',
            filter_corporate: 'Корпоративтік',
            about_badge: 'Біз туралы',
            about_title: 'Біз цифрлық өнімдер жасаймыз',
            about_accent: ' жүрекпен',
            about_p1: 'Біз — идеяларды жұмыс істейтін өнімдерге айналдыратын әзірлеушілер мен дизайнерлер командасымыз.',
            about_p2: 'Стартаптардан ірі компанияларға дейін кез келген бизнеспен жұмыс жасаймыз. Клиенттің міндетіне терең ену — біздің тәсіл.',
            val1_title: 'Сапа',
            val1_desc: 'Таза, қолдауға болатын код жазамыз',
            val2_title: 'Жылдамдық',
            val2_desc: 'Дедлайндар мен мерзімдерді сақтаймыз',
            val3_title: 'Ашықтық',
            val3_desc: 'Клиентті әр қадамда хабардар ұстаймыз',
            contact_badge: 'Байланысу',
            contact_title: 'Жобаңызды бастайық па?',
            contact_sub: 'Идеяңыз туралы айтыңыз — 24 сағат ішінде жауап береміз.',
            form_name: 'Атыңыз',
            form_email: 'Email',
            form_phone: 'Телефон',
            form_service: 'Қызмет',
            form_service_ph: 'Қызметті таңдаңыз',
            form_contact: 'Байланыс тәсілі',
            form_contact_email: 'Email',
            form_contact_telegram: 'Telegram',
            form_contact_whatsapp: 'WhatsApp',
            form_message: 'Хабарлама',
            form_submit: 'Өтінім жіберу',
            form_success: 'Өтінім жіберілді! Жақын арада байланысамыз.',
            form_success_sub: 'Растау хаты email-іңізге жіберілді.',
            hero_stack_label: 'Технологиялар:',
            footer_legal_name: 'ЖШС «Batys IT Group»',
            footer_legal_sub:  'жауапкершілігі шектеулі серіктестігі',
            footer_desc: 'Қазақстан және ТМД елдеріндегі бизнес үшін заманауи веб-сайттар жасаймыз.',
            footer_links: 'Навигация',
            footer_social: 'Әлеуметтік желілер',
            footer_contact_title: 'Байланыс',
            footer_city: 'Қазақстан, Орал',
            footer_totop: 'Жоғары',
            ushos_title:      'Уральская СХОС — корпоративтік сайт',
            ushos_desc:       'Қазақстандағы ең ежелгі агрономиялық ғылыми ұйымның корпоративтік сайты. Тұқым каталогы, жаңалықтар, сертификаттар.',
            edudigital_title: 'Edu-Digital — білім беру платформасы',
            edudigital_desc:  'Қазақстан педагогтері үшін цифрлық оқыту онлайн-платформасы. Бейнедәрістер, шеберлік сабақтары, әдістемелік материалдар.',
            proj1_title: 'Компанияның корпоративтік сайты',
            proj1_desc: 'CMS, блог және формалар бар сайт.',
            proj2_title: 'Электроника интернет-дүкені',
            proj2_desc: 'Себет, төлем бар e-commerce.',
            proj3_title: 'Стартап лендингі',
            proj3_desc: 'Анимациялы сату беті.',
            proj4_title: 'Оқыту платформасы',
            proj4_desc: 'Курстар мен прогресс бар EdTech.',
            proj5_title: 'Мейрамхана сайты',
            proj5_desc: 'Мәзір, брондау және галерея.',
            proj6_title: 'Қызметтер маркетплейсі',
            proj6_desc: 'Пікірлер жүйесі бар платформа.',
            form_error_general: 'Қате орын алды. Қайталап көріңіз.',
            form_error_network: 'Байланыс қатесі. Қайталап көріңіз.',
            footer_rights: 'Барлық құқықтар қорғалған.',
        }
    };

    /* -------------------------------------------------------
       State
    ------------------------------------------------------- */
    let currentLang = localStorage.getItem('ws_lang') || 'kz';
    let currentTheme = localStorage.getItem('ws_theme') || 'system';

    /* -------------------------------------------------------
       Theme
    ------------------------------------------------------- */
    function applyTheme(theme) {
        if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    function initTheme() {
        applyTheme(currentTheme);
        const btn = document.getElementById('ws-theme-toggle');
        if (!btn) return;
        btn.addEventListener('click', function () {
            const isDark = document.documentElement.classList.contains('dark');
            currentTheme = isDark ? 'light' : 'dark';
            localStorage.setItem('ws_theme', currentTheme);
            applyTheme(currentTheme);
        });
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function () {
            if (currentTheme === 'system') applyTheme('system');
        });
    }

    /* -------------------------------------------------------
       Language
    ------------------------------------------------------- */
    function applyLang(lang) {
        const t = TRANSLATIONS[lang] || TRANSLATIONS.ru;
        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            const key = el.getAttribute('data-i18n');
            if (t[key] !== undefined) {
                el.textContent = t[key];
            }
        });
        // Placeholders
        document.querySelectorAll('[data-placeholder-' + lang + ']').forEach(function (el) {
            el.placeholder = el.getAttribute('data-placeholder-' + lang);
        });
        // Update lang label button (shows what you CAN switch TO)
        const label = document.getElementById('ws-lang-label');
        if (label) label.textContent = lang === 'kz' ? 'РУС' : 'ҚАЗ';
        // Update html lang
        document.documentElement.lang = lang === 'kz' ? 'kk' : 'ru';
    }

    function initLang() {
        applyLang(currentLang);
        const btn = document.getElementById('ws-lang-toggle');
        if (!btn) return;
        btn.addEventListener('click', function () {
            currentLang = currentLang === 'ru' ? 'kz' : 'ru';
            localStorage.setItem('ws_lang', currentLang);
            applyLang(currentLang);
        });
    }

    /* -------------------------------------------------------
       Header scroll effect
    ------------------------------------------------------- */
    function initHeader() {
        const header = document.getElementById('ws-header');
        if (!header) return;
        function onScroll() {
            header.classList.toggle('ws-header--scrolled', window.scrollY > 40);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    /* -------------------------------------------------------
       Mobile menu
    ------------------------------------------------------- */
    function initMobileMenu() {
        const burger = document.getElementById('ws-burger');
        const mobileNav = document.getElementById('ws-mobile-nav');
        if (!burger || !mobileNav) return;

        burger.addEventListener('click', function () {
            const isOpen = mobileNav.classList.toggle('is-open');
            burger.classList.toggle('is-active', isOpen);
            burger.setAttribute('aria-expanded', String(isOpen));
            mobileNav.setAttribute('aria-hidden', String(!isOpen));
        });

        mobileNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileNav.classList.remove('is-open');
                burger.classList.remove('is-active');
                burger.setAttribute('aria-expanded', 'false');
                mobileNav.setAttribute('aria-hidden', 'true');
            });
        });
    }

    /* -------------------------------------------------------
       Scroll animations
    ------------------------------------------------------- */
    function initScrollAnimations() {
        const els = document.querySelectorAll('.ws-fade-up, .ws-fade-left, .ws-fade-right');
        if (!els.length) return;

        els.forEach(function (el) {
            const delay = el.getAttribute('data-delay');
            if (delay) el.style.transitionDelay = delay + 'ms';
        });

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

        els.forEach(function (el) { observer.observe(el); });
    }

    /* -------------------------------------------------------
       Canvas particle network
    ------------------------------------------------------- */
    function initParticles() {
        var canvas = document.getElementById('ws-particles');
        if (!canvas || window.matchMedia('(max-width: 768px)').matches) return;

        var ctx = canvas.getContext('2d');
        var COUNT = 55;
        var MAX_DIST = 130;
        var w, h, particles, raf;

        function isDark() {
            return document.documentElement.classList.contains('dark');
        }

        function resize() {
            var hero = canvas.parentElement;
            w = canvas.width = hero.offsetWidth;
            h = canvas.height = hero.offsetHeight;
        }

        function makeParticle() {
            return {
                x: Math.random() * w,
                y: Math.random() * h,
                vx: (Math.random() - .5) * .45,
                vy: (Math.random() - .5) * .45,
                r: 1.2 + Math.random() * 1.5
            };
        }

        function draw() {
            ctx.clearRect(0, 0, w, h);
            var dark = isDark();
            var dot_a = dark ? .5 : .3;
            var line_a = dark ? .18 : .1;

            for (var i = 0; i < particles.length; i++) {
                for (var j = i + 1; j < particles.length; j++) {
                    var dx = particles[i].x - particles[j].x;
                    var dy = particles[i].y - particles[j].y;
                    var dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < MAX_DIST) {
                        var a = (1 - dist / MAX_DIST) * line_a;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = 'rgba(99,102,241,' + a + ')';
                        ctx.lineWidth = 1;
                        ctx.stroke();
                    }
                }
            }

            particles.forEach(function (p) {
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(99,102,241,' + dot_a + ')';
                ctx.fill();
                p.x += p.vx;
                p.y += p.vy;
                if (p.x < 0 || p.x > w) p.vx *= -1;
                if (p.y < 0 || p.y > h) p.vy *= -1;
            });
        }

        function animate() { draw(); raf = requestAnimationFrame(animate); }
        function stop() { cancelAnimationFrame(raf); }

        resize();
        particles = Array.from({ length: COUNT }, makeParticle);

        var vis = new IntersectionObserver(function (entries) {
            entries[0].isIntersecting ? animate() : stop();
        }, { threshold: 0 });
        vis.observe(canvas);

        window.addEventListener('resize', function () {
            resize();
            particles = Array.from({ length: COUNT }, makeParticle);
        }, { passive: true });
    }

    /* -------------------------------------------------------
       Number counter animation
    ------------------------------------------------------- */
    function initCounters() {
        var els = document.querySelectorAll('.ws-count-up');
        if (!els.length || !window.IntersectionObserver) return;

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var text = el.textContent.trim();
                var num = parseInt(text, 10);
                if (isNaN(num)) return;
                var suffix = text.replace(/[0-9]/g, '');
                var duration = 1400;
                var start = null;

                function tick(ts) {
                    if (!start) start = ts;
                    var progress = Math.min((ts - start) / duration, 1);
                    var eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.round(eased * num) + suffix;
                    if (progress < 1) requestAnimationFrame(tick);
                }
                requestAnimationFrame(tick);
                observer.unobserve(el);
            });
        }, { threshold: 0.6 });

        els.forEach(function (el) { observer.observe(el); });
    }

    /* -------------------------------------------------------
       Glitch effect on hero accent
    ------------------------------------------------------- */
    function initGlitch() {
        var accent = document.querySelector('.ws-hero__accent');
        if (!accent) return;

        function trigger() {
            accent.classList.add('ws-hero__accent--glitch');
            setTimeout(function () {
                accent.classList.remove('ws-hero__accent--glitch');
            }, 350);
        }

        function schedule() {
            setTimeout(function () { trigger(); schedule(); }, 4000 + Math.random() * 5000);
        }
        setTimeout(schedule, 3000);
    }

    /* -------------------------------------------------------
       3D tilt on cards
    ------------------------------------------------------- */
    function initTilt() {
        var cards = document.querySelectorAll('.ws-card, .ws-portfolio-card');
        if (!cards.length || window.matchMedia('(max-width: 768px)').matches) return;

        cards.forEach(function (card) {
            card.classList.add('ws-tilt');

            card.addEventListener('mousemove', function (e) {
                var rect = card.getBoundingClientRect();
                var cx = rect.left + rect.width / 2;
                var cy = rect.top + rect.height / 2;
                var dx = (e.clientX - cx) / (rect.width / 2);
                var dy = (e.clientY - cy) / (rect.height / 2);
                var rx = -dy * 7;
                var ry = dx * 7;
                card.style.transform = 'perspective(900px) rotateX(' + rx + 'deg) rotateY(' + ry + 'deg) translateZ(6px)';
                card.style.transition = 'transform .08s linear, box-shadow .3s';
            });

            card.addEventListener('mouseleave', function () {
                card.style.transform = '';
                card.style.transition = 'transform .4s ease, box-shadow .3s';
            });
        });
    }

    /* -------------------------------------------------------
       Portfolio filter
    ------------------------------------------------------- */
    function initPortfolioFilter() {
        const filterBtns = document.querySelectorAll('.ws-filter-btn');
        const cards = document.querySelectorAll('.ws-portfolio-card');
        if (!filterBtns.length || !cards.length) return;

        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const filter = btn.getAttribute('data-filter');

                filterBtns.forEach(function (b) { b.classList.remove('ws-filter-btn--active'); });
                btn.classList.add('ws-filter-btn--active');

                cards.forEach(function (card) {
                    const cat = card.getAttribute('data-cat');
                    if (filter === 'all' || cat === filter) {
                        card.classList.remove('is-hidden');
                        // Re-trigger animation
                        card.classList.remove('is-visible');
                        requestAnimationFrame(function () {
                            requestAnimationFrame(function () {
                                card.classList.add('is-visible');
                            });
                        });
                    } else {
                        card.classList.add('is-hidden');
                    }
                });
            });
        });
    }

    /* -------------------------------------------------------
       Contact method toggle
    ------------------------------------------------------- */
    function initContactMethod() {
        document.querySelectorAll('.ws-contact-method__btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.ws-contact-method__btn').forEach(function (b) {
                    b.classList.remove('ws-contact-method__btn--active');
                });
                btn.classList.add('ws-contact-method__btn--active');
            });
        });
    }

    /* -------------------------------------------------------
       Contact form (AJAX)
    ------------------------------------------------------- */
    function initContactForm() {
        const form = document.getElementById('ws-contact-form');
        if (!form) return;

        const submitBtn = document.getElementById('ws-submit-btn');
        const btnText = submitBtn ? submitBtn.querySelector('.ws-btn__text') : null;
        const btnSpinner = submitBtn ? submitBtn.querySelector('.ws-btn__spinner') : null;
        const errorEl = document.getElementById('ws-form-error');
        const successEl = document.getElementById('ws-form-success');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            if (errorEl) errorEl.hidden = true;
            if (btnText) btnText.hidden = true;
            if (btnSpinner) btnSpinner.hidden = false;
            if (submitBtn) submitBtn.disabled = true;

            const formData = new FormData(form);
            formData.append('action', 'ws_contact');

            // Use nonce from wsConfig if available, otherwise from form field
            const nonce = (typeof wsConfig !== 'undefined' && wsConfig.nonce)
                ? wsConfig.nonce
                : (document.querySelector('input[name="ws_nonce_field"]') || {}).value || '';
            formData.set('nonce', nonce);

            const ajaxUrl = (typeof wsConfig !== 'undefined' && wsConfig.ajaxUrl)
                ? wsConfig.ajaxUrl
                : '/wp-admin/admin-ajax.php';

            fetch(ajaxUrl, { method: 'POST', body: formData })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (data.success) {
                        form.hidden = true;
                        if (successEl) {
                            successEl.hidden = false;
                            requestAnimationFrame(function () {
                                successEl.classList.add('is-shown');
                            });
                        }
                    } else {
                        if (errorEl) {
                            const t = TRANSLATIONS[currentLang] || TRANSLATIONS.ru;
                            errorEl.textContent = data.data ? data.data.message : t.form_error_general;
                            errorEl.hidden = false;
                        }
                    }
                })
                .catch(function () {
                    if (errorEl) {
                        const t = TRANSLATIONS[currentLang] || TRANSLATIONS.ru;
                        errorEl.textContent = t.form_error_network;
                        errorEl.hidden = false;
                    }
                })
                .finally(function () {
                    if (btnText) btnText.hidden = false;
                    if (btnSpinner) btnSpinner.hidden = true;
                    if (submitBtn) submitBtn.disabled = false;
                });
        });
    }

    /* -------------------------------------------------------
       Smooth scroll for anchor links
    ------------------------------------------------------- */
    function initSmoothScroll() {
        document.addEventListener('click', function (e) {
            const link = e.target.closest('a[href^="#"]');
            if (!link) return;
            const id = link.getAttribute('href');
            if (id === '#') return;
            const target = document.querySelector(id);
            if (!target) return;
            e.preventDefault();
            const headerH = document.getElementById('ws-header')
                ? document.getElementById('ws-header').offsetHeight
                : 64;
            const top = target.getBoundingClientRect().top + window.scrollY - headerH - 16;
            window.scrollTo({ top: top, behavior: 'smooth' });
        });
    }

    /* -------------------------------------------------------
       Scroll progress bar
    ------------------------------------------------------- */
    function initScrollProgress() {
        var bar = document.getElementById('ws-progress-bar');
        if (!bar) return;
        function update() {
            var doc = document.documentElement;
            var scrolled = doc.scrollTop || document.body.scrollTop;
            var total = doc.scrollHeight - doc.clientHeight;
            bar.style.width = (total > 0 ? (scrolled / total * 100) : 0) + '%';
        }
        window.addEventListener('scroll', update, { passive: true });
        update();
    }

    /* -------------------------------------------------------
       Active nav link on scroll
    ------------------------------------------------------- */
    function initActiveNav() {
        var sections = document.querySelectorAll('section[id]');
        var navLinks = document.querySelectorAll('.ws-nav__link, .ws-mobile-nav__link');
        if (!sections.length || !navLinks.length || !window.IntersectionObserver) return;
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var id = entry.target.id;
                    navLinks.forEach(function(link) {
                        link.classList.toggle('is-active', link.getAttribute('href') === '#' + id);
                    });
                }
            });
        }, { rootMargin: '-25% 0px -65% 0px' });
        sections.forEach(function(s) { observer.observe(s); });
    }

    /* -------------------------------------------------------
       Init
    ------------------------------------------------------- */
    document.addEventListener('DOMContentLoaded', function () {
        initTheme();
        initLang();
        initHeader();
        initMobileMenu();
        initScrollAnimations();
        initPortfolioFilter();
        initContactMethod();
        initContactForm();
        initSmoothScroll();
        initParticles();
        initCounters();
        initGlitch();
        initTilt();
        initScrollProgress();
        initActiveNav();
    });

})();
