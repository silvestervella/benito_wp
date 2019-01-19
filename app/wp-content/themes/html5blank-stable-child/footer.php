			<!-- footer -->
			<footer id="footer">
				<div id="addr-hrs-outer" class="footer-sec">
					<h3>Contact</h3>
					<div id="add-hrs">
						<?php 
							echo '<div class="contact-label"> Address:</div>';
							echo '<div class="contact-info">' .esc_attr( get_option('benito_the_address') ) .' </div>';
			
							echo '<div class="contact-label"> Phone:</div>';
							echo '<div class="contact-info">' .esc_attr( get_option('benito_the_phone') ) .' </div>';
			
							//echo '<h3 class="the_email"> Email:' .get_option('benito_the_email'). '</h3>';
							echo '<div class="contact-label">Opening Hours: </div>';
							echo '<div id="contact-hrs">';
							echo '<div><span>Monday:</span><span> ' . esc_attr( get_option('benito_opening_monday') ) .' - '.esc_attr( get_option('benito_opening_monday_closing') ) .' </span></div>';
							echo '<div><span>Tuesday:</span><span> ' .esc_attr( get_option('benito_opening_tuesday') ) .' - '.esc_attr( get_option('benito_opening_tuesday_closing') ) .'</span></div>';
							echo '<div><span>Wednesday:</span><span> ' .esc_attr( get_option('benito_opening_wednesday') ) .' - '.esc_attr( get_option('benito_opening_wednesday_closing') ) .'</span></div>';
							echo '<div><span>Thursday:</span><span> ' .esc_attr( get_option('benito_opening_thursday') ) .' - '.esc_attr( get_option('benito_opening_thursday_closing') ) .'</span></div>';
							echo '<div><span>Friday:</span><span> ' .esc_attr( get_option('benito_opening_friday') ) .' - '.esc_attr( get_option('benito_opening_friday_closing') ) .'</span></div>';
							echo '<div><span>Saturday:</span><span> ' .esc_attr( get_option('benito_opening_saturday') ) .' - '.esc_attr( get_option('benito_opening_saturday_closing') ).'</span></div>';
							echo '<div><span>Sunday:</span><span> ' .esc_attr( get_option('benito_opening_sunday') ) .' - '.esc_attr( get_option('benito_opening_sunday_closing') ) .'</span></div>';
							echo '</div>';
						?>
					</div>
				</div>

				<div id="footer-contact"  class="footer-sec">
					<p>Drop us a line, and we will get back to you as soon as possible.</p>
					<?php echo do_shortcode( '[contact-form-7 id="168" title="Contact form 1"]' ); ?>
				</div>

				<div id="footer-chat"  class="footer-sec">
					<a href=""><i class="fab fa-whatsapp"></i>Let's Chat</a> 
				</div>

				<div id="copyright">&copy;Ristorante Da Benito - <?php echo date("Y"); ?></div>
			</footer>
			<!-- /footer -->
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>