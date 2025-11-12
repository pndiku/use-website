<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="/images/use-logo-white.png" alt="USE Logo" class="footer-logo">
                <div class="footer-address">
                    {{ $siteContent['contact_address'] ?? 'Plot 3-5, New Port-Bell Road, UAP Nakawa Business Park, Block A 4th Floor, Nakawa Business Park, Block A 4th Floor, P.O.Box 23552, Kampala, Uganda' }}<br>
                    Tel: {{ $siteContent['contact_phone'] ?? '+256-312-202-787' }}
                </div>
            </div>

            <div>
                <h4 class="footer-section-title">About us</h4>
                <ul class="footer-links">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/about/governance/structure">Our Mission</a></li>
                    <li><a href="/about/trading-participants/stock-broker-firms">Trading Participants</a></li>
                    <li><a href="/about/contact-us">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-section-title">Our Services</h4>
                <ul class="footer-links">
                    <li><a href="/scd/about-scd">SCD</a></li>
                    <li><a href="/market-statistics/market-snapshot">Securities</a></li>
                    <li><a href="/scd/services/registry">Master Class</a></li>
                    <li><a href="/market-statistics/market-performance">Market Bulletin</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-section-title">Resources</h4>
                <ul class="footer-links">
                    <li><a href="/listings/how-to-list">Listing</a></li>
                    <li><a href="/investors/how-to-invest/types-of-investors">Investments</a></li>
                    <li><a href="/annual-reports">Annual Reports</a></li>
                    <li><a href="/listings/listing-rules">Rules & Regulations</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-section-title">Get in touch</h4>
                <div class="footer-contact">
                    <p><a href="mailto:{{ $siteContent['contact_email'] ?? 'info@use.or.ug' }}">{{ $siteContent['contact_email'] ?? 'info@use.or.ug' }}</a></p>
                    @if(isset($siteContent['trading_hours']))
                        <p style="color: rgba(255, 255, 255, 0.7); margin-top: 0.5rem;">
                            <i class="fas fa-clock"></i> Trading Hours: {{ $siteContent['trading_hours'] }}
                        </p>
                    @endif
                </div>
                <div class="footer-social">
                    <a href="{{ $siteContent['social_facebook'] ?? '#' }}" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $siteContent['social_twitter'] ?? '#' }}" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $siteContent['social_linkedin'] ?? '#' }}" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ $siteContent['social_instagram'] ?? '#' }}" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-disclaimer">
            <h4 class="footer-section-title">Notice and Disclaimer</h4>
            <p>
                To access the Uganda Securities Exchange website (the "Website") and its data
                product (the "Data"), you must agree to the below notice and disclaimer (the
                "Terms"). If you do not agree to the Terms, then you must refrain from using the
                Website and the Data.
            </p>
            <p>
                Unless otherwise stated, the Website and Data is the copyright of the Uganda
                Securities Exchange.
            </p>
            <p>
                Access to and use of the Website and the Data is for personal and non-commercial
                use only. No part of the Website or Data may be copied, reproduced, republished,
                downloaded, posted, broadcast or transmitted in any way for any commercial
                purpose and/or exploited for profit.
            </p>
            <p>
                The Website and Data is provided "as is" and on an "as available" basis only and no
                guarantee is made as to the accuracy, timeliness, completeness, or fitness for a
                particular purpose of the Website or any of the Data. While care has been taken to
                ensure that all Data provided on the Website is correct at the time of publication, the
                Uganda Securities Exchange does not accept any responsibility for any errors,
                omissions, or inaccurate Data on the Website.
            </p>
            <p>
                The Uganda Securities Exchange reserves the right to make changes to the Website
                and/or Data at any time without prior notice to you.
            </p>
        </div>

        <div class="footer-bottom">
            <div class="footer-copyright">
                © {{ date('Y') }} Uganda Securities Exchange. All rights reserved.
            </div>
            <div class="footer-legal">
                <a href="#">Terms of Service</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>
