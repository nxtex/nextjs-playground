<?php
/**
 * Footer personnalisé Monbedo
 * Copier dans : wp-content/themes/astra-child/footer.php
 */
?>

<footer class="mb-footer">
	<div class="mb-footer-container">

		<div class="mb-footer-grid">

			<!-- Brand -->
			<div class="mb-footer-brand">
				<h2><?php bloginfo( 'name' ); ?></h2>
				<p>
					MONBEDO cr&eacute;e des exp&eacute;riences qui s&rsquo;adaptent &agrave; ton quotidien,
					sans jamais te faire sortir de ton &eacute;quilibre.
				</p>
			</div>

			<!-- Navigation -->
			<div class="mb-footer-column">
				<h4>Navigation</h4>
				<a href="<?php echo esc_url( home_url() ); ?>">Accueil</a>
				<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">Mon Compte</a>
				<a href="<?php echo esc_url( site_url( '/contact' ) ); ?>">Nous contacter</a>
			</div>

			<!-- Legal -->
			<div class="mb-footer-column">
				<h4>L&eacute;gal</h4>
				<a href="<?php echo esc_url( site_url( '/mentions-legales' ) ); ?>">Mentions l&eacute;gales</a>
				<a href="<?php echo esc_url( site_url( '/cgv' ) ); ?>">CGV &amp; Utilisation</a>
				<a href="<?php echo esc_url( site_url( '/politique-confidentialite' ) ); ?>">Politique confidentialit&eacute;</a>
				<a href="<?php echo esc_url( site_url( '/legislation' ) ); ?>">L&eacute;gislation</a>
			</div>

		</div>

		<!-- Bottom -->
		<div class="mb-footer-bottom">
			<p class="mb-footer-warning">
				Produits d&eacute;riv&eacute;s de chanvre non stup&eacute;fiants (THC &lt; 0.3%). Aucun conseil m&eacute;dical fourni.
			</p>
			<p class="mb-footer-copy">
				&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. Tous droits r&eacute;serv&eacute;s.
			</p>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<style>
/* ── Casse le layout colonne d'Astra ── */
#page .site-footer,
.ast-container > .mb-footer,
.mb-footer {
	/* Sortir du flex/grid parent Astra */
	grid-column: 1 / -1 !important;
	-ms-grid-column-span: 9999 !important;
	flex: 0 0 100% !important;
	width: 100% !important;
	max-width: 100% !important;
	align-self: auto !important;
	clear: both;
	display: flex !important;
	float: none !important;
	margin-left: 0 !important;
	margin-right: 0 !important;
	padding-left: 0 !important;
	padding-right: 0 !important;
	box-sizing: border-box !important;
}

/* ── Footer Monbedo ── */
.mb-footer {
	padding: 80px 20px 40px !important;
	justify-content: center;
	background: linear-gradient(to bottom, #ffffff, #fafafa);
}

.mb-footer-container {
	max-width: 1100px;
	width: 100%;
	background: #ffffff;
	border-radius: 24px;
	padding: 50px 50px 30px;
	border: 1px solid #eee;
	box-shadow: 0 15px 40px rgba(0,0,0,.06);
}

.mb-footer-container::before {
	content: "";
	display: block;
	height: 4px;
	width: 60px;
	background: #ff9000;
	border-radius: 10px;
	margin-bottom: 30px;
}

/* Grid */
.mb-footer-grid {
	display: grid;
	grid-template-columns: 1.5fr 1fr 1fr;
	gap: 50px;
	margin-bottom: 40px;
}

/* Brand */
.mb-footer-brand h2 {
	font-size: 1.6rem;
	margin-bottom: 15px;
	color: #ff9000;
}

.mb-footer-brand p {
	color: #666;
	line-height: 1.6;
	font-size: .95rem;
	max-width: 320px;
}

/* Columns */
.mb-footer-column h4 {
	font-size: 1rem;
	margin-bottom: 15px;
	color: #111;
	position: relative;
}

.mb-footer-column h4::after {
	content: "";
	display: block;
	width: 30px;
	height: 3px;
	background: #ff9000;
	margin-top: 6px;
	border-radius: 2px;
}

.mb-footer-column a {
	display: block;
	color: #666;
	text-decoration: none;
	margin-bottom: 10px;
	font-size: .9rem;
	transition: all .25s ease;
}

.mb-footer-column a:hover {
	color: #ff9000;
	transform: translateX(4px);
}

/* Bottom */
.mb-footer-bottom {
	border-top: 1px solid #eee;
	padding-top: 20px;
	text-align: center;
}

.mb-footer-warning {
	font-size: .8rem;
	color: #888;
	margin-bottom: 8px;
}

.mb-footer-copy {
	font-size: .8rem;
	color: #aaa;
}

/* Responsive */
@media (max-width: 900px) {
	.mb-footer-grid {
		grid-template-columns: 1fr;
		text-align: center;
		gap: 30px;
	}
	.mb-footer-brand p {
		margin: 0 auto;
	}
	.mb-footer-column h4::after {
		margin-left: auto;
		margin-right: auto;
	}
	.mb-footer-column a:hover {
		transform: none;
	}
	.mb-footer-container {
		padding: 30px 20px 20px;
	}
}
</style>
