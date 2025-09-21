<footer>
    <div class="footer">
        <div class="footer-text">
            <h3>Foodza</h3>

            <div>
                <i class="fa fa-map-marker"></i>
                <a href="">Adresse: Havnegade 17, 5.6</a>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <a href="mailto:foodza@gmail.com">Email: foodza@gmail.com</a>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <a href="tel:+4513371019">Phone: 13 37 10 19</a>
            </div>
            <div class="copyright">
                <small>© 2025 Foodza. All rights reserved.</small>
            </div>
        </div>


        <div>
            <h3>Users & Community</h3>
            <ul>
                <li>
                    <?php if (is_user_logged_in()) { ?>
                        <a href="<?php echo wp_logout_url(); ?>">
                            <span>Log Out</span>
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo wp_login_url(); ?>">Login</a>

                <li>
                    <a href="<?php echo wp_registration_url(); ?>">Sign Up</a>
                </li>
            <?php } ?>
            </li>
            <li><a href="<?php echo get_post_type_archive_link('communitypost'); ?>">Community</a></li>
            <li><a href="#">Newsletter Sign-up</a></li>
            </ul>
        </div>


        <div class="footer-socials">
            <h3>Socials</h3>
            <div class="social-icons">
                <a aria-label="YouTube" href="#"><i class="fa fa-youtube"></i></a>
                <a aria-label="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                <a aria-label="LinkedIn" href="#"><i class="fa fa-linkedin"></i></a>
                <a aria-label="Instagram" href="#"><i class="fa fa-instagram"></i></a>
                <a aria-label="Facebook" href="#"><i class="fa fa-facebook-f"></i></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>