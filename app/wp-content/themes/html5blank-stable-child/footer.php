			<!-- footer -->
			<footer id="footer">
				<div id="open-hrs">
					<div class="the-title">Opening Hours</div>
					<div id="the-hrs">
					
					 </div>
				</div>

				<div id="footer-contact">
					<p>Drop us a line, and we will get back to you as soon as possible.</p>
					<form id="footer-form">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="name" id="name"><br>
							<label for="email">Email:</label>
							<input type="email" name="email" id="email">
							<label  for="phone">Phone:</label>
							<input type="number" name="phone" id="phone">
							<label for="message">Message:</label>
							<textarea name="message" id="message" form="footer-form">Enter text here...</textarea>
							<input type="submit">
						</div>
					</form>
					<div id="footer-chat">
						<a href="">Let's Chat</a> 
					</div>
				</div>
				<div id="copyright">&copy;Ristorante Da Benito - <?php echo date("Y"); ?></div>
			</footer>
			<!-- /footer -->
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>