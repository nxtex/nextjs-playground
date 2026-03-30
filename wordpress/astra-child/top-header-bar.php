<?php
/**
 * Top Header Bar — Monbedo
 * Coller dans : wp-content/themes/astra-child/top-header-bar.php
 * Inclure via functions.php :
 *   add_action( 'wp_body_open', function() {
 *     include get_stylesheet_directory() . '/top-header-bar.php';
 *   });
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>

<header class="mb-topbar" id="mb-topbar">
	<div class="mb-topbar__inner">

		<!-- Logo centré -->
		<div class="mb-topbar__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Accueil Monbedo">
				<img
					fetchpriority="high"
					width="772" height="156"
					src="https://www.monbedo.com/wp-content/uploads/2025/02/monbedo-last-logo.png"
					srcset="https://www.monbedo.com/wp-content/uploads/2025/02/monbedo-last-logo.png 772w,
					        https://www.monbedo.com/wp-content/uploads/2025/02/monbedo-last-logo-300x61.png 300w,
					        https://www.monbedo.com/wp-content/uploads/2025/02/monbedo-last-logo-768x155.png 768w,
					        https://www.monbedo.com/wp-content/uploads/2025/02/monbedo-last-logo-600x121.png 600w"
					sizes="(max-width: 600px) 160px, 220px"
					alt="Monbedo"
					class="mb-topbar__logo-img"
				/>
			</a>
		</div>

		<!-- Bouton hamburger animé orange -->
		<button
			type="button"
			class="mb-topbar__menu-btn"
			id="mb-menu-btn"
			aria-label="Menu"
			aria-expanded="false"
		>
			<div class="wrapper-menu" id="mb-wrapper-menu">
				<div class="line-menu half start"></div>
				<div class="line-menu middle"></div>
				<div class="line-menu half end"></div>
			</div>
		</button>

	</div>
</header>

<style>
/* =====================================================
   TOP BAR
===================================================== */
.mb-topbar {
	position: sticky;
	top: 0;
	z-index: 9990;
	width: 100%;
	background: #000;
	border-bottom: 1px solid #1a1a1a;
}
.mb-topbar__inner {
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
	height: 64px;
	max-width: 1400px;
	margin: 0 auto;
	padding: 0 16px;
}
.mb-topbar__logo {
	position: absolute;
	left: 50%;
	transform: translateX(-50%);
}
.mb-topbar__logo-img {
	height: 38px;
	width: auto;
	display: block;
}
@media (max-width: 480px) {
	.mb-topbar__logo-img { height: 28px; }
	.mb-topbar__inner    { height: 54px; }
}

/* =====================================================
   BOUTON MENU
===================================================== */
.mb-topbar__menu-btn {
	margin-left: auto;
	background: none;
	border: none;
	cursor: pointer;
	padding: 6px;
	z-index: 1;
	outline-offset: 4px;
}
.wrapper-menu {
	width: 34px;
	height: 26px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	transition: transform 330ms ease-out;
}
.wrapper-menu.open { transform: rotate(-45deg); }

.line-menu {
	background-color: #ff9900;
	border-radius: 4px;
	width: 100%;
	height: 4px;
}
.line-menu.half   { width: 50%; }
.line-menu.middle { width: 100%; }

@keyframes mb-line-top-idle {
	0%,  100% { transform: translateX(0);   }
	30%        { transform: translateX(8px); }
	70%        { transform: translateX(0);   }
}
.line-menu.start {
	transition: transform 330ms cubic-bezier(0.54, -0.81, 0.57, 0.57);
	transform-origin: right;
	animation: mb-line-top-idle 1.8s ease-in-out infinite;
}
.wrapper-menu.open .line-menu.start {
	animation: none;
	transform: rotate(-90deg) translateX(3px);
}

@keyframes mb-line-bot-idle {
	0%,  100% { transform: translateX(0);    }
	30%        { transform: translateX(-8px); }
	70%        { transform: translateX(0);    }
}
.line-menu.end {
	align-self: flex-end;
	transition: transform 330ms cubic-bezier(0.54, -0.81, 0.57, 0.57);
	transform-origin: left;
	animation: mb-line-bot-idle 1.8s ease-in-out infinite;
}
.wrapper-menu.open .line-menu.end {
	animation: none;
	transform: rotate(-90deg) translateX(-3px);
}
</style>

<script>
(function () {
	document.addEventListener('DOMContentLoaded', function () {
		var btn    = document.getElementById('mb-menu-btn');
		var burger = document.getElementById('mb-wrapper-menu');

		/* Cible la popup Elementor native */
		var popup  = document.querySelector(
			'.dialog-widget.dialog-lightbox-widget.dialog-type-buttons.dialog-type-lightbox.elementor-popup-modal'
		);

		if (!btn || !popup) return;

		/* Cache la popup par défaut */
		popup.style.display = 'none';
		var isOpen = false;

		function openPopup() {
			popup.style.display = 'block';
			burger.classList.add('open');
			btn.setAttribute('aria-expanded', 'true');
			isOpen = true;
		}

		function closePopup() {
			popup.style.display = 'none';
			burger.classList.remove('open');
			btn.setAttribute('aria-expanded', 'false');
			isOpen = false;
		}

		btn.addEventListener('click', function () {
			isOpen ? closePopup() : openPopup();
		});

		/* Fermer avec Escape */
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && isOpen) closePopup();
		});

		/* Fermer en cliquant en dehors */
		document.addEventListener('click', function (e) {
			if (isOpen && !popup.contains(e.target) && e.target !== btn && !btn.contains(e.target)) {
				closePopup();
			}
		});
	});
}());
</script>
