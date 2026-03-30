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
			aria-controls="mb-menu-modal"
		>
			<div class="wrapper-menu" id="mb-wrapper-menu">
				<div class="line-menu half start"></div>
				<div class="line-menu middle"></div>
				<div class="line-menu half end"></div>
			</div>
		</button>

	</div>
</header>

<!-- ===== MODAL MENU (contenu Elementor popup #4269) ===== -->
<div
	class="mb-menu-modal dialog-widget dialog-lightbox-widget dialog-type-buttons dialog-type-lightbox elementor-popup-modal"
	id="mb-menu-modal"
	role="dialog"
	aria-modal="true"
	aria-label="Menu navigation"
	hidden
>
	<div class="mb-menu-modal__inner">

		<!-- Bouton fermer -->
		<button type="button" class="mb-modal-close" id="mb-modal-close" aria-label="Fermer">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
				<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
			</svg>
		</button>

		<!-- Contenu exact du popup Elementor #4269 -->
		<div class="mb-menu-premium">

			<!-- GAMMES -->
			<div class="mb-menu-tiers">

				<a href="https://monbedo.com/intense" class="mb-tier mb-tier-intense">
					<span class="mb-tier-bg"></span>
					<span class="mb-tier-shine"></span>
					<span class="mb-tier-noise"></span>
					<span class="mb-tier-left">
						<span class="mb-tier-icon">🌙</span>
						<span class="mb-tier-copy">
							<span class="mb-tier-title">INTENSE+</span>
							<span class="mb-tier-sub">Ressens l'impact</span>
						</span>
					</span>
					<span class="mb-tier-right">
						<span class="mb-tier-molecule">TRP-9</span>
						<span class="mb-tier-power">
							<span class="on"></span><span class="on"></span><span class="on"></span>
							<span class="on"></span><span class="on"></span><span class="on"></span>
						</span>
					</span>
				</a>

				<a href="https://monbedo.com/chill" class="mb-tier mb-tier-chill">
					<span class="mb-tier-bg"></span>
					<span class="mb-tier-shine"></span>
					<span class="mb-tier-noise"></span>
					<span class="mb-tier-left">
						<span class="mb-tier-icon">🔥</span>
						<span class="mb-tier-copy">
							<span class="mb-tier-title">CHILL+</span>
							<span class="mb-tier-sub">Relâche la pression</span>
						</span>
					</span>
					<span class="mb-tier-right">
						<span class="mb-tier-molecule">RAC-9</span>
						<span class="mb-tier-power">
							<span class="on"></span><span class="on"></span><span class="on"></span>
							<span class="on"></span><span></span><span></span>
						</span>
					</span>
				</a>

				<a href="https://www.monbedo.com/gamme-cbd-2" class="mb-tier mb-tier-cbd">
					<span class="mb-tier-bg"></span>
					<span class="mb-tier-shine"></span>
					<span class="mb-tier-noise"></span>
					<span class="mb-tier-left">
						<span class="mb-tier-icon">🌿</span>
						<span class="mb-tier-copy">
							<span class="mb-tier-title">CBD</span>
							<span class="mb-tier-sub">100% opérationnel</span>
						</span>
					</span>
					<span class="mb-tier-right">
						<span class="mb-tier-molecule">CBD</span>
						<span class="mb-tier-power">
							<span class="on cbd-on"></span><span></span><span></span>
							<span></span><span></span><span></span>
						</span>
					</span>
				</a>

				<!-- SOUS-CARTES CBD -->
				<div class="mb-subtier-row">
					<a href="https://monbedo.com/fleurs-puissantes" class="mb-subtier mb-subtier-flower">
						<span class="mb-subtier-bg"></span>
						<span class="mb-subtier-shine"></span>
						<span class="mb-subtier-copy">
							<span class="mb-subtier-title">FLEURS HIGH</span>
						</span>
					</a>
					<a href="https://monbedo.com/resines-puissantes" class="mb-subtier mb-subtier-hash">
						<span class="mb-subtier-bg"></span>
						<span class="mb-subtier-shine"></span>
						<span class="mb-subtier-copy">
							<span class="mb-subtier-title">RÉSINES HIGH</span>
						</span>
					</a>
				</div>

			</div><!-- /.mb-menu-tiers -->

			<!-- MENU LIENS UTILES -->
			<div class="mb-menu-panels">
				<details class="mb-panel">
					<summary class="mb-panel-head">
						<span class="mb-panel-left">
							<span class="mb-panel-toggle"></span>
							<span class="mb-panel-title">LIENS UTILES</span>
						</span>
						<span class="mb-panel-chip">MONBEDO</span>
					</summary>
					<div class="mb-panel-body">
						<div class="mb-panel-body-inner">

							<a href="https://monbedo.com/faq" class="mb-link-card">
								<span class="mb-link-left">
									<span class="mb-link-icon">?</span>
									<span class="mb-link-copy"><strong>FAQ</strong><small>Tout ce qu'il faut savoir</small></span>
								</span>
								<span class="mb-link-arrow">↗</span>
							</a>

							<a href="https://monbedo.com/contact" class="mb-link-card">
								<span class="mb-link-left">
									<span class="mb-link-icon">✉</span>
									<span class="mb-link-copy"><strong>CONTACT</strong><small>Une question ? On te répond</small></span>
								</span>
								<span class="mb-link-arrow">↗</span>
							</a>

							<a href="https://monbedo.com/fidelite-parrainage" class="mb-link-card">
								<span class="mb-link-left">
									<span class="mb-link-icon">★</span>
									<span class="mb-link-copy"><strong>FIDELITÉ</strong><small>Fidélité et parrainage</small></span>
								</span>
								<span class="mb-link-arrow">↗</span>
							</a>

							<a href="https://www.monbedo.com/weedrun-monbedo" class="mb-link-card">
								<span class="mb-link-left">
									<span class="mb-link-icon">🏁</span>
									<span class="mb-link-copy"><strong>WEEDRUN CHALLENGE</strong><small>Gagnes jusqu’à 100G</small></span>
								</span>
								<span class="mb-link-arrow">↗</span>
							</a>

						</div>
					</div>
				</details>
			</div><!-- /.mb-menu-panels -->

		</div><!-- /.mb-menu-premium -->
	</div><!-- /.mb-menu-modal__inner -->
</div><!-- /.mb-menu-modal -->

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
.wrapper-menu.open {
	transform: rotate(-45deg);
}

/* Toutes les barres */
.line-menu {
	background-color: #ff9900;
	border-radius: 4px;
	width: 100%;
	height: 4px;
}
.line-menu.half  { width: 50%; }

/* Milieu : FIXE */
.line-menu.middle { width: 100%; }

/* Haut → droite */
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

/* Bas ← gauche */
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

/* =====================================================
   MODAL
===================================================== */
.mb-menu-modal {
	position: absolute;
	top: 64px;
	right: 16px;
	width: 340px;
	max-height: calc(100vh - 80px);
	overflow-y: auto;
	overflow-x: hidden;
	background: #050505;
	border: 1px solid rgba(255,255,255,.08);
	border-radius: 20px;
	box-shadow: 0 24px 60px rgba(0,0,0,.7);
	z-index: 9995;
	transform-origin: top right;
	transform: scale(0.92) translateY(-8px);
	opacity: 0;
	transition: transform 0.28s cubic-bezier(0.34,1.2,0.64,1), opacity 0.22s ease;
	pointer-events: none;
	scrollbar-width: thin;
	scrollbar-color: rgba(255,153,0,.3) transparent;
}
.mb-menu-modal::-webkit-scrollbar { width: 4px; }
.mb-menu-modal::-webkit-scrollbar-track { background: transparent; }
.mb-menu-modal::-webkit-scrollbar-thumb { background: rgba(255,153,0,.3); border-radius: 4px; }

.mb-menu-modal:not([hidden]) {
	transform: scale(1) translateY(0);
	opacity: 1;
	pointer-events: auto;
}
.mb-menu-modal__inner {
	padding: 14px 14px 20px;
	position: relative;
}

/* Bouton fermer */
.mb-modal-close {
	position: absolute;
	top: 14px;
	right: 14px;
	background: rgba(255,255,255,.06);
	border: 1px solid rgba(255,255,255,.10);
	border-radius: 50%;
	width: 32px;
	height: 32px;
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	color: rgba(255,255,255,.6);
	transition: background .2s, color .2s;
	z-index: 2;
}
.mb-modal-close:hover { background: rgba(255,153,0,.15); color: #ff9900; }

/* Backdrop */
.mb-menu-backdrop {
	position: fixed;
	inset: 0;
	background: rgba(0,0,0,.6);
	z-index: 9994;
	opacity: 0;
	transition: opacity 0.22s;
	pointer-events: none;
}
.mb-menu-backdrop:not([hidden]) { opacity: 1; pointer-events: auto; }

/* Mobile : plein écran depuis le haut */
@media (max-width: 768px) {
	.mb-menu-modal {
		position: fixed;
		top: 0; right: 0; left: 0;
		width: 100%;
		max-height: 85vh;
		border-radius: 0 0 24px 24px;
		transform-origin: top center;
		transform: translateY(-100%);
		opacity: 1;
		transition: transform 0.32s cubic-bezier(0.34,1.1,0.64,1);
	}
	.mb-menu-modal:not([hidden]) {
		transform: translateY(0);
		opacity: 1;
	}
}

/* =====================================================
   CONTENU POPUP (styles du popup Elementor #4269)
===================================================== */
.mb-menu-premium {
	--mb-orange: #f99000;
	--mb-orange-2: #ffb347;
	--mb-orange-3: #ff9d00;
	--mb-black: #050505;
	--mb-black-2: #0a0a0b;
	--mb-black-3: #111114;
	--mb-black-4: #17171b;
	--mb-white: #ffffff;
	--mb-soft: rgba(255,255,255,.76);
	--mb-muted: rgba(255,255,255,.46);
	--mb-line: rgba(255,255,255,.08);
	--mb-line-orange: rgba(249,144,0,.42);
	--mb-green: #7CFF77;
	width: 100%;
	font-family: Inter, Arial, sans-serif;
	color: #fff;
	padding-top: 8px;
}
.mb-menu-tiers {
	display: flex;
	flex-direction: column;
	gap: 12px;
	margin-bottom: 14px;
}
.mb-tier {
	position: relative;
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 14px;
	min-height: 80px;
	padding: 16px 14px;
	border-radius: 22px;
	overflow: hidden;
	text-decoration: none;
	color: #fff;
	isolation: isolate;
	border: 1px solid rgba(249,144,0,.34);
	background: linear-gradient(180deg, rgba(255,255,255,.055), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #17171a 0%, #0b0b0d 78%);
	box-shadow: 0 20px 55px rgba(0,0,0,.42), inset 0 1px 0 rgba(255,255,255,.05);
	transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease;
}
.mb-tier:hover {
	transform: translateY(-2px);
	border-color: rgba(249,144,0,.75);
	box-shadow: 0 26px 62px rgba(0,0,0,.48), 0 0 26px rgba(249,144,0,.10);
}
.mb-tier-bg {
	position: absolute; inset: 0;
	background: radial-gradient(circle at 8% 50%, rgba(249,144,0,.18), transparent 24%),
	            radial-gradient(circle at 88% 18%, rgba(255,255,255,.08), transparent 18%),
	            linear-gradient(90deg, rgba(255,255,255,.025), transparent 22%);
	pointer-events: none; z-index: 0;
}
.mb-tier-shine {
	position: absolute; top: -35%; left: -28%; width: 44%; height: 200%;
	background: linear-gradient(90deg, transparent, rgba(255,255,255,.08), transparent);
	transform: rotate(18deg); pointer-events: none; z-index: 0;
}
.mb-tier-noise {
	position: absolute; inset: 0;
	background-image: radial-gradient(rgba(255,255,255,.028) .75px, transparent .75px);
	background-size: 12px 12px;
	opacity: .20; pointer-events: none; z-index: 0; mix-blend-mode: screen;
}
.mb-tier-left, .mb-tier-right { position: relative; z-index: 2; }
.mb-tier-left {
	display: flex; align-items: center; gap: 13px; min-width: 0; flex: 1 1 auto;
}
.mb-tier-icon {
	width: 40px; height: 40px; flex: 0 0 40px;
	display: inline-flex; align-items: center; justify-content: center;
	border-radius: 14px; font-size: 18px;
	background: linear-gradient(180deg, rgba(249,144,0,.22), rgba(249,144,0,.06));
	border: 1px solid rgba(249,144,0,.20);
	box-shadow: inset 0 1px 0 rgba(255,255,255,.10), 0 0 22px rgba(249,144,0,.10);
}
.mb-tier-copy { display: flex; flex-direction: column; min-width: 0; }
.mb-tier-title {
	display: block; font-size: 17px; font-weight: 900;
	letter-spacing: .01em; line-height: 1; color: #fff;
}
.mb-tier-sub {
	display: block; margin-top: 6px; font-size: 12px;
	font-weight: 700; color: var(--mb-soft);
}
.mb-tier-right {
	display: flex; flex-direction: column; align-items: flex-end;
	justify-content: center; gap: 6px; min-width: 80px; flex: 0 0 auto;
}
.mb-tier-molecule {
	font-size: 10px; font-weight: 900; letter-spacing: .14em;
	text-transform: uppercase; color: rgba(255,255,255,.72);
}
.mb-tier-power {
	display: flex; align-items: center; gap: 4px;
	padding: 7px 9px; border-radius: 999px;
	background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.02));
	border: 1px solid rgba(255,255,255,.06);
}
.mb-tier-power span {
	width: 9px; height: 9px; border-radius: 999px;
	background: rgba(255,255,255,.10);
	border: 1px solid rgba(255,255,255,.09);
}
.mb-tier-power span.on {
	background: linear-gradient(180deg, var(--mb-orange-2), var(--mb-orange));
	border-color: rgba(249,144,0,.78);
	box-shadow: 0 0 12px rgba(249,144,0,.35), inset 0 1px 0 rgba(255,255,255,.25);
}
.mb-tier-power span.cbd-on {
	background: linear-gradient(180deg, #95ff91, #61dd5d);
	border-color: rgba(124,255,119,.75);
	box-shadow: 0 0 12px rgba(124,255,119,.28), inset 0 1px 0 rgba(255,255,255,.25);
}
.mb-tier-intense {
	background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #18151a 0%, #0c0b10 55%, #09090c 100%);
}
.mb-tier-chill {
	background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #1b1308 0%, #0f0c09 58%, #09090b 100%);
}
.mb-tier-cbd {
	border-color: rgba(255,255,255,.10);
	background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.015)),
	            linear-gradient(135deg, #171717 0%, #101012 60%, #0a0a0b 100%);
}
.mb-tier-cbd .mb-tier-icon {
	background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,.03));
	border-color: rgba(255,255,255,.09);
}
/* Sous-cartes CBD */
.mb-subtier-row { display: grid; grid-template-columns: repeat(2,1fr); gap: 10px; }
.mb-subtier {
	position: relative; min-height: 54px; padding: 10px 12px;
	border-radius: 16px; overflow: hidden; text-decoration: none; color: #fff;
	display: flex; align-items: center; justify-content: center; text-align: center;
	isolation: isolate;
	border: 1px solid rgba(255,255,255,.08);
	background: linear-gradient(180deg, rgba(255,255,255,.045), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #151518 0%, #0c0c0e 100%);
	transition: transform .25s ease, border-color .25s ease;
}
.mb-subtier:hover { transform: translateY(-2px); }
.mb-subtier-bg, .mb-subtier-shine { position: absolute; pointer-events: none; z-index: 0; }
.mb-subtier-bg  { inset: 0; }
.mb-subtier-shine {
	top: -40%; left: -22%; width: 42%; height: 200%;
	background: linear-gradient(90deg, transparent, rgba(255,255,255,.08), transparent);
	transform: rotate(18deg);
}
.mb-subtier-copy {
	position: relative; z-index: 2;
	display: flex; align-items: center; justify-content: center;
}
.mb-subtier-title { font-size: 12px; font-weight: 900; letter-spacing: .06em; color: #fff; }
.mb-subtier-flower {
	border-color: rgba(90,255,140,.18);
	background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #101712 0%, #0a0d0b 100%);
}
.mb-subtier-flower:hover { border-color: rgba(90,255,140,.34); }
.mb-subtier-flower .mb-subtier-bg {
	background: radial-gradient(circle at 18% 26%, rgba(110,255,160,.18), transparent 28%),
	            radial-gradient(circle at 82% 78%, rgba(70,190,95,.16), transparent 30%);
}
.mb-subtier-hash {
	border-color: rgba(190,140,70,.20);
	background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #18120b 0%, #0d0a08 100%);
}
.mb-subtier-hash:hover { border-color: rgba(190,140,70,.36); }
.mb-subtier-hash .mb-subtier-bg {
	background: radial-gradient(circle at 18% 26%, rgba(220,180,95,.16), transparent 28%),
	            radial-gradient(circle at 82% 78%, rgba(132,92,45,.18), transparent 30%);
}
/* Panels liens utiles */
.mb-menu-panels { display: flex; flex-direction: column; gap: 10px; }
.mb-panel {
	position: relative; overflow: hidden;
	border-radius: 20px; border: 1px solid rgba(255,255,255,.08);
	background: linear-gradient(180deg, rgba(255,255,255,.032), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #141417 0%, #0a0a0c 100%);
	box-shadow: 0 16px 42px rgba(0,0,0,.32);
	transition: border-color .25s ease;
}
.mb-panel[open] { border-color: rgba(249,144,0,.22); }
.mb-panel:before {
	content: ""; position: absolute; top: 0; left: 0; right: 0; height: 1px;
	background: linear-gradient(90deg, transparent, rgba(255,255,255,.16), transparent);
	pointer-events: none;
}
.mb-panel-head {
	list-style: none; display: flex; align-items: center;
	justify-content: space-between; gap: 12px;
	padding: 16px 14px; cursor: pointer; user-select: none;
}
.mb-panel-head::-webkit-details-marker { display: none; }
.mb-panel-left { display: flex; align-items: center; gap: 12px; }
.mb-panel-toggle { position: relative; width: 14px; height: 14px; flex: 0 0 14px; }
.mb-panel-toggle:before, .mb-panel-toggle:after {
	content: ""; position: absolute; left: 50%; top: 50%;
	background: #fff; border-radius: 99px;
	transform: translate(-50%, -50%);
	transition: transform .30s ease, opacity .30s ease, background .25s ease;
}
.mb-panel-toggle:before { width: 14px; height: 2px; }
.mb-panel-toggle:after  { width: 2px; height: 14px; }
.mb-panel[open] .mb-panel-toggle:before,
.mb-panel[open] .mb-panel-toggle:after { background: var(--mb-orange-2); }
.mb-panel[open] .mb-panel-toggle:after { transform: translate(-50%, -50%) scaleY(0); opacity: 0; }
.mb-panel-title { font-size: 13px; font-weight: 900; letter-spacing: .08em; color: #f7f7f7; }
.mb-panel-chip {
	display: inline-flex; align-items: center; justify-content: center;
	padding: 6px 10px; border-radius: 999px; font-size: 10px;
	font-weight: 900; letter-spacing: .12em; text-transform: uppercase;
	color: var(--mb-orange-2); border: 1px solid rgba(249,144,0,.24);
	background: linear-gradient(180deg, rgba(249,144,0,.12), rgba(249,144,0,.03));
}
.mb-panel-body {
	display: grid; grid-template-rows: 0fr; opacity: 0;
	transition: grid-template-rows .34s cubic-bezier(.22,1,.36,1), opacity .24s ease;
}
.mb-panel[open] .mb-panel-body { grid-template-rows: 1fr; opacity: 1; }
.mb-panel-body > * { overflow: hidden; }
.mb-panel-body-inner { padding: 0 14px 14px; display: flex; flex-direction: column; gap: 8px; }
.mb-link-card {
	position: relative; display: flex; align-items: center;
	justify-content: space-between; gap: 14px; padding: 12px 14px;
	border-radius: 16px; text-decoration: none; color: #fff; overflow: hidden;
	border: 1px solid rgba(255,255,255,.06);
	background: linear-gradient(180deg, rgba(255,255,255,.035), rgba(255,255,255,.012)),
	            linear-gradient(135deg, #18181b 0%, #101012 100%);
	transition: transform .22s ease, border-color .22s ease, background .22s ease;
}
.mb-link-card:hover {
	transform: translateY(-1px);
	border-color: rgba(249,144,0,.35);
	background: linear-gradient(180deg, rgba(249,144,0,.08), rgba(255,255,255,.015)),
	            linear-gradient(135deg, #19150f 0%, #101012 100%);
}
.mb-link-left { display: flex; align-items: center; gap: 10px; }
.mb-link-icon {
	width: 34px; height: 34px; flex: 0 0 34px;
	display: flex; align-items: center; justify-content: center;
	border-radius: 10px; font-size: 15px;
	background: linear-gradient(180deg, rgba(249,144,0,.15), rgba(249,144,0,.04));
	border: 1px solid rgba(249,144,0,.16);
}
.mb-link-copy { display: flex; flex-direction: column; gap: 2px; }
.mb-link-copy strong { display: block; font-size: 13px; font-weight: 800; letter-spacing: .04em; color: #fff; }
.mb-link-copy small  { display: block; font-size: 11px; color: rgba(255,255,255,.5); }
.mb-link-arrow { font-size: 16px; color: rgba(255,255,255,.4); flex: 0 0 auto; }
</style>

<script>
(function() {
	var btn      = document.getElementById('mb-menu-btn');
	var closeBtn = document.getElementById('mb-modal-close');
	var modal    = document.getElementById('mb-menu-modal');
	var backdrop = document.getElementById('mb-menu-backdrop');
	var burger   = document.getElementById('mb-wrapper-menu');
	if (!btn || !modal) return;

	function mbOpenMenu() {
		modal.removeAttribute('hidden');
		backdrop.removeAttribute('hidden');
		burger.classList.add('open');
		btn.setAttribute('aria-expanded', 'true');
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
	if (closeBtn) closeBtn.addEventListener('click', mbCloseMenu);
	backdrop.addEventListener('click', mbCloseMenu);
	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && !modal.hasAttribute('hidden')) mbCloseMenu();
	});
	document.addEventListener('click', function(e) {
		if (!modal.hasAttribute('hidden')
			&& !modal.contains(e.target)
			&& e.target !== btn
			&& !btn.contains(e.target)) {
			mbCloseMenu();
		}
	});
})();
</script>
