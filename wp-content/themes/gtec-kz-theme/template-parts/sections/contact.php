<section class="ws-section ws-section--muted" id="contact">
    <div class="ws-container">

        <div class="ws-section__header ws-fade-up">
            <div class="ws-section-illustration ws-section-illustration--contact">
                <div class="ws-envelope">
                    <div class="ws-envelope__body">
                        <div class="ws-envelope__flap"></div>
                        <div class="ws-envelope__lines">
                            <div class="ws-envelope__line"></div>
                            <div class="ws-envelope__line ws-envelope__line--short"></div>
                        </div>
                    </div>
                    <div class="ws-envelope__dot ws-envelope__dot--1"></div>
                    <div class="ws-envelope__dot ws-envelope__dot--2"></div>
                    <div class="ws-envelope__dot ws-envelope__dot--3"></div>
                </div>
            </div>
            <span class="ws-label" data-i18n="contact_badge">Байланысу</span>
            <h2 class="ws-section__title" data-i18n="contact_title">Жобаңызды бастайық па?</h2>
            <p class="ws-section__sub" data-i18n="contact_sub">Идеяңыз туралы айтыңыз — 24 сағат ішінде жауап береміз.</p>
        </div>

        <div class="ws-contact">

            <div class="ws-contact__form-wrap ws-fade-up">
                <form class="ws-form" id="ws-contact-form" novalidate>
                    <?php wp_nonce_field('ws_contact_nonce', 'ws_nonce_field'); ?>

                    <!-- Имя + Email -->
                    <div class="ws-form__row">
                        <div class="ws-form__group">
                            <label class="ws-form__label" data-i18n="form_name">Ваше имя</label>
                            <input type="text" name="name" class="ws-form__input"
                                placeholder="Иван Иванов" required
                                data-placeholder-ru="Иван Иванов"
                                data-placeholder-kz="Асан Асанов">
                        </div>
                        <div class="ws-form__group">
                            <label class="ws-form__label" data-i18n="form_email">Email</label>
                            <input type="email" name="email" class="ws-form__input"
                                placeholder="ivan@example.com" required>
                        </div>
                    </div>

                    <!-- Телефон + Услуга -->
                    <div class="ws-form__row">
                        <div class="ws-form__group">
                            <label class="ws-form__label" data-i18n="form_phone">Телефон</label>
                            <input type="tel" name="phone" class="ws-form__input"
                                placeholder="+7 (700) 000-00-00"
                                data-placeholder-ru="+7 (700) 000-00-00"
                                data-placeholder-kz="+7 (700) 000-00-00">
                        </div>
                        <div class="ws-form__group">
                            <label class="ws-form__label" data-i18n="form_service">Услуга</label>
                            <select name="service" class="ws-form__input ws-form__select">
                                <option value="" data-i18n="form_service_ph">Выберите услугу</option>
                                <option data-i18n="srv1_title">Веб-разработка</option>
                                <option data-i18n="srv2_title">UI/UX Дизайн</option>
                                <option data-i18n="srv3_title">Интернет-магазин</option>
                                <option data-i18n="srv4_title">Лендинг</option>
                                <option data-i18n="srv5_title">SEO-оптимизация</option>
                                <option data-i18n="srv6_title">Поддержка</option>
                            </select>
                        </div>
                    </div>

                    <!-- Способ связи -->
                    <div class="ws-form__group">
                        <label class="ws-form__label" data-i18n="form_contact">Способ связи</label>
                        <div class="ws-contact-method">
                            <label class="ws-contact-method__btn ws-contact-method__btn--active">
                                <input type="radio" name="contact_method" value="email" checked hidden>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                <span data-i18n="form_contact_email">Email</span>
                            </label>
                            <label class="ws-contact-method__btn">
                                <input type="radio" name="contact_method" value="telegram" hidden>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                                <span data-i18n="form_contact_telegram">Telegram</span>
                            </label>
                            <label class="ws-contact-method__btn">
                                <input type="radio" name="contact_method" value="whatsapp" hidden>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                <span data-i18n="form_contact_whatsapp">WhatsApp</span>
                            </label>
                        </div>
                    </div>

                    <!-- Сообщение -->
                    <div class="ws-form__group">
                        <label class="ws-form__label" data-i18n="form_message">Сообщение</label>
                        <textarea name="message" class="ws-form__textarea" rows="4"
                            placeholder="Расскажите о вашем проекте..."
                            data-placeholder-ru="Расскажите о вашем проекте..."
                            data-placeholder-kz="Жобаңыз туралы айтыңыз..."
                            required></textarea>
                    </div>

                    <div class="ws-form__error" id="ws-form-error" role="alert" hidden></div>

                    <button type="submit" class="ws-btn ws-btn--primary ws-btn--full" id="ws-submit-btn">
                        <span class="ws-btn__text" data-i18n="form_submit">Отправить заявку</span>
                        <span class="ws-btn__spinner" hidden>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 11-6.219-8.56"/></svg>
                        </span>
                    </button>
                </form>

                <div class="ws-form__success" id="ws-form-success" hidden>
                    <div class="ws-form__success-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                    </div>
                    <h3 class="ws-form__success-title" data-i18n="form_success">Заявка отправлена! Мы свяжемся с вами скоро.</h3>
                    <p class="ws-form__success-sub" data-i18n="form_success_sub">Письмо с подтверждением отправлено на ваш email.</p>
                    <div class="ws-form__success-dots">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>

            <div class="ws-contact__info ws-fade-up" data-delay="200">
                <?php
                $info_items = [
                    [
                        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>',
                        'value' => ws_opt('ws_email', 'hello@gtec.kz'),
                        'href'  => 'mailto:' . ws_opt('ws_email', 'hello@gtec.kz'),
                    ],
                    [
                        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>',
                        'value' => ws_opt('ws_telegram', '@gtec_kz'),
                        'href'  => 'https://t.me/' . ltrim(ws_opt('ws_telegram', 'gtec_kz'), '@'),
                    ],
                    [
                        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" /></svg>',
                        'value' => ws_opt('ws_phone', '+7 (700) 000-00-00'),
                        'href'  => 'tel:' . preg_replace('/[^+\d]/', '', ws_opt('ws_phone', '')),
                    ],
                ];
                foreach ($info_items as $item): ?>
                <a href="<?php echo esc_url($item['href']); ?>" class="ws-contact__info-item">
                    <div class="ws-contact__info-icon"><?php echo wp_kses_post($item['icon']); ?></div>
                    <span class="ws-contact__info-value"><?php echo esc_html($item['value']); ?></span>
                </a>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
