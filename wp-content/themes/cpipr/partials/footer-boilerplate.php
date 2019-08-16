<div class="footer-bg">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<a href="/"><img src="<?php echo get_stylesheet_directory_uri() . '/images/footer-logo.png' ?>"/></a>
			</div>
			<div class="span8">
				<div class="media">
					<div class="media-left">
						<h5>SOBRE EL CPI</h5>
					</div>
					<div class="media-body">
						<p>El CPI reconoce que el requisito fundamental para una verdadera democracia es que la ciudadanía esté bien informada y que existan entidades independientes con la capacidad de fiscalizar los poderes que accionan en la sociedad, sean públicos o privados.</p>

						<?php $args = array(
							'theme_location' => 'footer-bottom',
							'depth' => 1,
							'container' => false
						);
						largo_nav_menu( $args );?>
					</div>
				</div>

				<div class="media">
					<div class="media-left">
						<h5>CONTÁCTENOS</h5>
					</div>
					<div class="media-body">
						<p>Si tiene una solicitud de investigación, queja, aclaración, 'orejita', prueba, inquietud, u observación sobre alguna información publicada por el Centro de Periodismo Investigativo, escriba al correo electrónico info@periodismoinvestigativo.com.</p>

						<p class="no-margin-bottom">
							<strong>Teléfono:</strong> 787-751-1912 ext. 3022<br/>
							<strong>Email:</strong> info@periodismoinvestigativo.com<br/>
							<strong>Facebook:</strong> Centro de Periodismo Investigativo<br/>
							<strong>Twitter:</strong> @cpipr<br/>
							<strong>Direción postal:</strong> P.O. Box 6834 San Juan PR 00914-6834
						</p>
					</div>
				</div>

				<div class="media last-media">
					<div class="media-left">
						<h5>DONACIONES</h5>
					</div>
					<div class="media-body">
						<p>Los donativos que recibe el Centro de Periodismo Investigativo están exentos de contribuciones en Puerto Rico y Estados Unidos.</p>
					</div>
				</div>

				<div class="media">
					<div class="media-left">
						<h5>&nbsp;</h5>
					</div>
					<div class="media-body no-border">
						<?php largo_donate_button(); ?>
					</div>
				</div>
			</div>
		</div>

		<p class="back-to-top visuallyhidden"><a href="#top"><?php _e('Back to top', 'largo'); ?> &uarr;</a></p>
	</div>
</div>

<div class="footer-copyright">
	<div class="container-fluid">
		<p class="copyright"><?php largo_copyright_message(); ?></p>
	</div>
</div>