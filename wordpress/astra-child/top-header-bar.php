<?php
/**
 * Top Header Bar — Monbedo
 * Coller dans : wp-content/themes/astra-child/top-header-bar.php
 * Inclure via functions.php : require get_stylesheet_directory() . '/top-header-bar.php';
 * ou via un hook : add_action( 'wp_body_open', function() { include ... } );
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

		<!-- Bouton menu animé -->
		<button
			type="button"
			class="mb-topbar__menu-btn"
			id="mb-menu-btn"
			aria-label="Menu"
			aria-expanded="false"
			aria-controls="mb-menu-modal"
		>
			<div class="wrapper-menu" id="mb-wrapper-menu">
				<div class="line-menu half start"></div>
				<div class="line-menu"></div>
				<div class="line-menu half end"></div>
			</div>
		</button>

	</div>
</header>

<!-- Modal menu -->
<div
	class="mb-menu-modal"
	id="mb-menu-modal"
	role="dialog"
	aria-modal="true"
	aria-label="Menu navigation"
	hidden
>
	<div class="mb-menu-modal__inner">
		<nav class="mb-menu-modal__nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => 'mb-menu-modal__list',
				'container'      => false,
				'fallback_cb'    => false,
			) );
			?>
		</nav>
	</div>
</div>
<div class="mb-menu-backdrop" id="mb-menu-backdrop" hidden></div>

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
	border-bottom: 1px solid #222;
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

/* Logo : centré en absolu pour rester centré même avec le bouton à droite */
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
	.mb-topbar__inner { height: 54px; }
}

/* =====================================================
   BOUTON MENU
===================================================== */
.mb-topbar__menu-btn {
	margin-left: auto; /* pousse à droite */
	background: none;
	border: none;
	cursor: pointer;
	padding: 6px;
	z-index: 1;
	outline-offset: 4px;
}

/* Wrapper hamburger (Oleg Frolov ref) */
.wrapper-menu {
	width: 34px;
	height: 26px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	transition: transform 330ms ease-out;
	animation: mb-menu-idle 2.4s ease-in-out infinite;
}

.wrapper-menu.open {
	transform: rotate(-45deg);
	animation: none;
}

/* Animation idle : les barres bougent gauche-droite pour appeler l'action */
@keyframes mb-menu-idle {
	0%,  100% { transform: translateX(0);    }
	20%        { transform: translateX(4px);  }
	40%        { transform: translateX(-4px); }
	60%        { transform: translateX(3px);  }
	80%        { transform: translateX(0);    }
}

.line-menu {
	background-color: #ff9900;
	border-radius: 4px;
	width: 100%;
	height: 4px;
}

.line-menu.half { width: 50%; }

.line-menu.start {
	transition: transform 330ms cubic-bezier(0.54, -0.81, 0.57, 0.57);
	transform-origin: right;
}
.wrapper-menu.open .line-menu.start {
	transform: rotate(-90deg) translateX(3px);
}

.line-menu.end {
	align-self: flex-end;
	transition: transform 330ms cubic-bezier(0.54, -0.81, 0.57, 0.57);
	transform-origin: left;
}
.wrapper-menu.open .line-menu.end {
	transform: rotate(-90deg) translateX(-3px);
}

/* =====================================================
   MODAL MENU
===================================================== */
.mb-menu-modal {
	position: absolute; /* sous le bouton sur desktop */
	top: 64px;
	right: 16px;
	width: 280px;
	max-height: calc(100vh - 80px);
	overflow-y: auto;
	background: #111;
	border: 1px solid #333;
	border-radius: 12px;
	box-shadow: 0 12px 40px rgba(0,0,0,0.5);
	z-index: 9995;
	transform-origin: top right;
	transform: scale(0.92) translateY(-8px);
	opacity: 0;
	transition: transform 0.25s cubic-bezier(0.34,1.2,0.64,1), opacity 0.2s ease;
	pointer-events: none;
}

.mb-menu-modal:not([hidden]) {
	transform: scale(1) translateY(0);
	opacity: 1;
	pointer-events: auto;
}

/* Scroll interne */
.mb-menu-modal__inner {
	padding: 16px 8px;
}

/* Liste nav */
.mb-menu-modal__list {
	list-style: none;
	margin: 0;
	padding: 0;
}

.mb-menu-modal__list li a {
	display: block;
	padding: 12px 20px;
	color: #fff;
	text-decoration: none;
	font-size: 1rem;
	font-weight: 500;
	border-radius: 8px;
	transition: background 0.15s, color 0.15s;
}

.mb-menu-modal__list li a:hover,
.mb-menu-modal__list li.current-menu-item > a {
	background: rgba(255,153,0,0.15);
	color: #ff9900;
}

/* Backdrop (mobile) */
.mb-menu-backdrop {
	position: fixed;
	inset: 0;
	background: rgba(0,0,0,0.55);
	z-index: 9994;
	opacity: 0;
	transition: opacity 0.2s;
	pointer-events: none;
}
.mb-menu-backdrop:not([hidden]) {
	opacity: 1;
	pointer-events: auto;
}

/* ── Mobile : modal plein écran glissante du haut ── */
@media (max-width: 768px) {
	.mb-menu-modal {
		position: fixed;
		top: 0;
		right: 0;
		left: 0;
		width: 100%;
		max-height: 80vh;
		border-radius: 0 0 20px 20px;
		transform-origin: top center;
		transform: translateY(-100%);
		opacity: 1;
		transition: transform 0.3s cubic-bezier(0.34,1.1,0.64,1);
	}
	.mb-menu-modal:not([hidden]) {
		transform: translateY(0);
		opacity: 1;
	}
}
</style>

<script>
(function() {
	var btn      = document.getElementById('mb-menu-btn');
	var modal    = document.getElementById('mb-menu-modal');
	var backdrop = document.getElementById('mb-menu-backdrop');
	var burger   = document.getElementById('mb-wrapper-menu');
	if (!btn || !modal) return;

	function mbOpenMenu() {
		modal.removeAttribute('hidden');
		backdrop.removeAttribute('hidden');
		burger.classList.add('open');
		btn.setAttribute('aria-expanded', 'true');
		/* Focus premier lien */
		var firstLink = modal.querySelector('a');
		if (firstLink) setTimeout(function() { firstLink.focus(); }, 50);
	}

	function mbCloseMenu() {
		modal.setAttribute('hidden', '');
		backdrop.setAttribute('hidden', '');
		burger.classList.remove('open');
		btn.setAttribute('aria-expanded', 'false');
	}

	btn.addEventListener('click', function() {
		if (modal.hasAttribute('hidden')) { mbOpenMenu(); } else { mbCloseMenu(); }
	});

	backdrop.addEventListener('click', mbCloseMenu);

	/* Fermer sur Escape */
	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && !modal.hasAttribute('hidden')) mbCloseMenu();
	});

	/* Fermer si clic en dehors (desktop) */
	document.addEventListener('click', function(e) {
		if (!modal.hasAttribute('hidden') && !modal.contains(e.target) && e.target !== btn && !btn.contains(e.target)) {
			mbCloseMenu();
		}
	});
})();
</script>
