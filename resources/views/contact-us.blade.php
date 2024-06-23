<x-app-layout>
    <div class="theme-page padding-bottom-66">
        <div class="clearfix">
            <div class="row full-width">
                <div class="contact-map" id="map" data-scroll-wheel="0" data-draggable="0">
                    <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.015307814591!2d8.6688682!3d47.3921342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479aa3ca1a10dbc3%3A0x12c8c9a0e9433b5d!2sZ%C3%BCrcherstrasse%2022%2C%208604%20Volketswil%2C%20Switzerland!5e0!3m2!1sen!2smk!4v1690813685019!5m2!1sen!2smk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row page-margin-top">
                <div class="column column-1-3">
                    <ul class="features-list">
                        <li>
                            <h5>RUFEN SIE UNS JETZT AN UNTER</h5>
                            <div class="icon sl-small-phone-circle"></div>
                            <p>
                                Mobile: {{ $globalSettings->website_phone_number }}
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="column column-1-3">
                    <ul class="features-list">
                        <li>
                            <h5>M&T AUTOMOBILE GMBH</h5>
                            <div class="icon sl-small-location-map"></div>
                            <p>
                                {{ $globalSettings->website_contact_address }} <br/>
                                <a target="_blank" href="//www.google.com/maps?ll=47.392134,8.668868&z=16&t=m&hl=en&gl=MK&mapclient=embed&q=Z%C3%BCrcherstrasse+22+8604+Volketswil+Switzerland">Auf der Karte anzeigen</a>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="column column-1-3">
                    <ul class="features-list">
                        <li>
                            <h5>24/7 HILFE</h5>
                            <div class="icon sl-small-truck-tow"></div>
                            <p>Wir sind jeden Tag der Woche für Ihre Probleme erreichbar..</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row page-margin-top">
                <form class="contact-form" id="contact-form" method="post" action="contact_form/contact_form.php">
                    <div class="row">
                        <fieldset class="column column-1-2">
                            <input class="text-input" name="name" type="text" value="Ihren Namen *" placeholder="Ihren Namen *">
                            <input class="text-input" name="email" type="text" value="Deine E-Mail *" placeholder="Deine E-Mail *">
                            <input class="text-input" name="phone" type="text" value="Dein Telefon *" placeholder="Dein Telefon *">
                        </fieldset>
                        <fieldset class="column column-1-2">
                            <textarea name="message" placeholder="Nachricht *">Nachricht *</textarea>
                        </fieldset>
                    </div>
                    <div class="row margin-top-30">
                        <div class="column column-1-2">
                            <p>Wir werden Sie innerhalb eines Werktages kontaktieren.</p>
                        </div>
                        <div class="column column-1-2 align-right">
                            <input type="hidden" name="action" value="contact_form" />
                            <div class="row margin-top-20 padding-bottom-20">
                                <a class="more submit-contact-form" href="#" title="SEND MESSAGE"><span>NACHRICHT SENDEN</span></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
