<div
    class="row dark-gray footer-row full-width padding-top-30 padding-bottom-50"
>
    <div class="row padding-bottom-30">
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-location-map">
                    <p>
                        {{ $globalSettings->website_contact_address }}
                    </p>
                </li>
            </ul>
        </div>
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-phone-circle">
                    <p>
                        Rufen Sie uns jetzt an<br />
                        {{ $globalSettings->website_phone_number }}
                    </p>
                </li>
            </ul>
        </div>
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-truck-tow">
                    <p>
                        Glasschaden Sofort melden<br />
                        {{ $globalSettings->website_email }} <br />
                        {{ $globalSettings->website_phone_number }}
                    </p>
                </li>
            </ul>
        </div>
    </div>
    <div class="row row-4-4 top-border page-padding-top">
        <div class="column column-1-4">
            <h6 class="box-header">ÜBER UNS</h6>
            <ul class="list simple margin-top-20">
                <li>Zürcherstrasse 22</li>
                <li><span>Mobile:</span>+41 79 791 79 97</li>
                <li>
            <span>E-mail:</span
            ><a href="mailto:{{ $globalSettings->website_email }}">{{ $globalSettings->website_email }}</a>
                </li>
            </ul>
            <ul class="social-icons gray margin-top-26">
                <li>
                    <a
                        target="_blank"
                        href="{{ $globalSettings->website_facebook }}"
                        class="social-facebook"
                        title="facebook"
                    ></a>
                </li>
                <li>
                    <a
                        target="_blank"
                        href="{{ $globalSettings->website_twitter }}"
                        class="social-twitter"
                        title="twitter"
                    ></a>
                </li>
                <li>
                    <a
                        target="_blank"
                        href="{{ $globalSettings->website_linkedin }}"
                        class="social-linkedin"
                        title="linkedin"
                    ></a>
                </li>
                <li>
                    <a
                        href="{{ $globalSettings->website_instagram }}"
                        class="social-pinterest"
                        title="pinterest"
                    ></a>
                </li>
            </ul>
        </div>
        <div class="column column-1-4">
            <h6 class="box-header">OUR SERVICES</h6>
            <ul class="list margin-top-20">
                <li class="template-bullet">Gross & Kleine Service</li>
                <li class="template-bullet">MFK Check</li>
                <li class="template-bullet">Frontscheiben ersetzen</li>
                <li class="template-bullet">Klima Service</li>
                <li class="template-bullet">Bremsen Service</li>
                <li class="template-bullet">Felgen Reparatur</li>
                <li class="template-bullet">Karroserie Reparaturen</li>
                <li class="template-bullet">...</li>
            </ul>
        </div>
        <div class="column column-1-4">
            <h6 class="box-header">ÖFFUNGSZEITEN</h6>
            <ul class="list simple margin-top-20">
                <li><span>MO:</span>08:30 - 17:00</li>
                <li><span>DI:</span>08:30 - 17:00</li>
                <li><span>MI:</span>08:30 - 17:00</li>
                <li><span>DO:</span>08:30 - 17:00</li>
                <li><span>FR:</span>08:30 - 17:00</li>
                <li><span>SA:</span>08:30 - 17:00</li>
                <li><span>SO:</span>Geschlossen</li>
            </ul>
        </div>
    </div>
</div>
<div class="row align-center padding-top-bottom-30">
    <span class="copyright"
    >Copyright © 2023 - {{ $globalSettings->website_name }}
    </span
    >
</div>
