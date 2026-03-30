<?php
/**
 * Bottom Navigation Bar — Monbedo
 * Coller dans : wp-content/themes/astra-child/bottom-nav-bar.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$mb_nav_items = array(
	array(
		'label'  => 'Accueil',
		'href'   => home_url( '/' ),
		'active' => is_front_page(),
		'type'   => 'link',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
	),
	array(
		'label'  => 'Compte',
		'href'   => get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ),
		'active' => function_exists( 'is_account_page' ) && is_account_page(),
		'type'   => 'link',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
	),
	array(
		'label'  => 'Contact',
		'href'   => site_url( '/contact' ),
		'active' => is_page( 'contact' ),
		'type'   => 'link',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
	),
	array(
		'label'  => 'Cadeaux',
		'type'   => 'modal',
		'action' => 'wll',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>',
	),
	array(
		'label'  => 'Panier',
		'type'   => 'modal',
		'action' => 'fkcart',
		'cart'   => true,
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
	),
);

$mb_any_active = false;
foreach ( $mb_nav_items as $item ) {
	if ( $item['type'] === 'link' && ! empty( $item['active'] ) ) {
		$mb_any_active = true;
		break;
	}
}

$cart_count = 0;
if ( function_exists( 'WC' ) && WC()->cart ) {
	$cart_count = WC()->cart->get_cart_contents_count();
}
?>

<nav class="mb-bnav<?php echo $mb_any_active ? ' mb-bnav--has-active' : ''; ?>" role="navigation" aria-label="Navigation principale" id="mb-bottom-nav">
<?php foreach ( $mb_nav_items as $item ) :
	$is_active = $item['type'] === 'link' && ! empty( $item['active'] );

	if ( $item['type'] === 'modal' ) : ?>
	<button
		type="button"
		class="mb-bnav__item mb-bnav__btn"
		aria-label="<?php echo esc_attr( $item['label'] ); ?>"
		data-mb-action="<?php echo esc_attr( $item['action'] ); ?>"
	>
		<span class="mb-bnav__icon">
			<?php echo $item['icon']; ?>
			<?php if ( ! empty( $item['cart'] ) ) : ?>
				<span class="mb-bnav__badge" id="mb-cart-badge" style="display:<?php echo $cart_count > 0 ? 'flex' : 'none'; ?>"><?php echo $cart_count > 0 ? esc_html( $cart_count ) : ''; ?></span>
			<?php endif; ?>
		</span>
		<span class="mb-bnav__label"><?php echo esc_html( $item['label'] ); ?></span>
	</button>
	<?php else : ?>
	<a
		href="<?php echo esc_url( $item['href'] ); ?>"
		class="mb-bnav__item<?php echo $is_active ? ' mb-bnav__item--active' : ''; ?>"
		aria-label="<?php echo esc_attr( $item['label'] ); ?>"
	>
		<span class="mb-bnav__icon"><?php echo $item['icon']; ?></span>
		<span class="mb-bnav__label"><?php echo esc_html( $item['label'] ); ?></span>
	</a>
	<?php endif; ?>
<?php endforeach; ?>
</nav>

<style>
/* CSS fallback — peut être override par les plugins via inline style */
.wll-site-launcher,
.fkcart-floating-toggler,
#fkcart-floating-toggler {
	display: none !important;
	visibility: hidden !important;
	opacity: 0 !important;
	pointer-events: none !important;
}

.mb-bnav {
	position: fixed;
	bottom: 1rem;
	left: 50%;
	transform: translateX(-50%) scale(0.9);
	z-index: 9998;
	display: flex;
	align-items: center;
	gap: 4px;
	padding: 8px;
	height: 52px;
	border-radius: 9999px;
	background: #ffffff !important;
	border: 1px solid #e5e7eb !important;
	box-shadow: 0 8px 32px rgba(0,0,0,0.12), 0 2px 8px rgba(0,0,0,0.06) !important;
	color: #111 !important;
	opacity: 0;
	transition: none;
	width: fit-content;
	max-width: 95vw;
}
.mb-bnav.mb-bnav--visible {
	opacity: 1;
	transform: translateX(-50%) scale(1);
	transition: opacity 0.35s cubic-bezier(0.34,1.56,0.64,1),
	            transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
}
.mb-bnav__item {
	display: flex;
	align-items: center;
	padding: 8px 12px;
	height: 40px;
	min-width: 44px;
	min-height: 40px;
	max-height: 44px;
	border-radius: 9999px;
	text-decoration: none !important;
	color: #9ca3af;
	transition: background 0.2s, color 0.2s, max-width 0.35s cubic-bezier(0.34,1.2,0.64,1), gap 0.2s;
	max-width: 44px;
	overflow: hidden;
	white-space: nowrap;
	position: relative;
	cursor: pointer;
}
.mb-bnav__btn {
	background: none;
	border: none;
	outline: none;
	font-family: inherit;
}
.mb-bnav__item:hover { opacity: 0.8; }
.mb-bnav--has-active .mb-bnav__item--active,
.mb-bnav__item.mb-bnav__item--modal-active {
	background: rgba(255,153,0,0.12);
	color: #ff9900;
	gap: 6px;
	max-width: 140px;
}
.mb-bnav__icon {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
	position: relative;
}
.mb-bnav__badge {
	position: absolute;
	top: -6px;
	right: -6px;
	background: #ff9900;
	color: #000;
	font-size: 10px;
	font-weight: 700;
	width: 16px;
	height: 16px;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	line-height: 1;
}
.mb-bnav__label {
	font-size: 0.75rem;
	font-weight: 500;
	white-space: nowrap;
	overflow: hidden;
	max-width: 0;
	opacity: 0;
	transition:
		max-width 0.32s cubic-bezier(0.34,1.2,0.64,1),
		opacity   0.19s ease,
		margin-left 0.19s ease;
	margin-left: 0;
	color: #ff9900;
}
.mb-bnav--has-active .mb-bnav__item--active .mb-bnav__label,
.mb-bnav__item.mb-bnav__item--modal-active .mb-bnav__label {
	max-width: 72px;
	opacity: 1;
	margin-left: 2px;
}
</style>

<script>
(function() {
	var nav   = document.getElementById('mb-bottom-nav');
	var badge = document.getElementById('mb-cart-badge');
	if (!nav) return;

	/* ── Cacher les launchers flottants originaux ──
	   Forcé via inline style pour écraser les styles inline des plugins. */
	var MB_HIDE_SELECTORS = [
		'.wll-site-launcher',
		'.fkcart-floating-toggler',
		'#fkcart-floating-toggler'
	];

	function mbHideLaunchers() {
		MB_HIDE_SELECTORS.forEach(function(sel) {
			document.querySelectorAll(sel).forEach(function(el) {
				el.style.setProperty('display',        'none',   'important');
				el.style.setProperty('visibility',     'hidden', 'important');
				el.style.setProperty('opacity',        '0',      'important');
				el.style.setProperty('pointer-events', 'none',   'important');
			});
		});
	}

	/* Lancer immédiatement + au DOMContentLoaded */
	mbHideLaunchers();
	document.addEventListener('DOMContentLoaded', mbHideLaunchers);

	/* Observer les injections async des plugins */
	if (window.MutationObserver) {
		new MutationObserver(function(mutations) {
			var needsHide = false;
			mutations.forEach(function(m) {
				m.addedNodes.forEach(function(node) {
					if (node.nodeType !== 1) return;
					var cls = (node.className || '') + ' ' + (node.id || '');
					if (/wll-site-launcher|fkcart-floating-toggler/.test(cls)) needsHide = true;
					if (node.querySelector && node.querySelector('.wll-site-launcher, .fkcart-floating-toggler, #fkcart-floating-toggler')) needsHide = true;
				});
			});
			if (needsHide) mbHideLaunchers();
		}).observe(document.body, { childList: true, subtree: true });
	}

	/* ── Entrée de la nav ── */
	requestAnimationFrame(function() {
		setTimeout(function() { nav.classList.add('mb-bnav--visible'); }, 60);
	});

	/* ── FKCart toggle ── */
	function mbToggleFkcart() {
		var modal = document.getElementById('fkcart-modal');
		if (!modal) return;
		var isOpen = modal.classList.contains('fkcart-show');
		if (isOpen) {
			var closeBtn = modal.querySelector('.fkcart-modal-close, .fkcart-modal-backdrop');
			if (closeBtn) { closeBtn.click(); return; }
			modal.classList.remove('fkcart-show');
			modal.style.display = 'none';
			document.body.classList.remove('fkcart-modal-open');
		} else {
			modal.style.display = 'block';
			void modal.offsetWidth;
			modal.classList.add('fkcart-show');
			document.body.classList.add('fkcart-modal-open');
		}
	}

	/* ── WPLoyalty toggle ── */
	function mbToggleWll() {
		var launcher = document.querySelector('.wll-launcher-button-container');
		if (launcher) launcher.click();
	}

	nav.querySelectorAll('[data-mb-action]').forEach(function(btn) {
		btn.addEventListener('click', function() {
			var action = btn.getAttribute('data-mb-action');
			if (action === 'fkcart') mbToggleFkcart();
			if (action === 'wll')    mbToggleWll();
			nav.querySelectorAll('.mb-bnav__item--modal-active').forEach(function(el) {
				el.classList.remove('mb-bnav__item--modal-active');
			});
			btn.classList.add('mb-bnav__item--modal-active');
			setTimeout(function() { btn.classList.remove('mb-bnav__item--modal-active'); }, 600);
		});
	});

	/* ── Badge panier ── */
	function mbSyncBadge(count) {
		if (!badge) return;
		count = parseInt(count) || 0;
		badge.textContent   = count > 0 ? count : '';
		badge.style.display = count > 0 ? 'flex' : 'none';
	}

	function mbReadCount() {
		var src = document.getElementById('fkit-floating-count');
		if (!src) return 0;
		var a = parseInt( src.getAttribute('data-item-count') );
		var t = parseInt( src.textContent );
		return (isNaN(a) ? 0 : a) || (isNaN(t) ? 0 : t);
	}

	var mbObserverAttached = false;
	function mbAttachObserver() {
		if (mbObserverAttached) return;
		var src = document.getElementById('fkit-floating-count');
		if (!src) return;
		mbSyncBadge( mbReadCount() );
		mbObserverAttached = true;
		if (!window.MutationObserver) return;
		new MutationObserver(function() {
			mbSyncBadge( mbReadCount() );
		}).observe(src, {
			attributes: true, attributeFilter: ['data-item-count'],
			childList: true, characterData: true, subtree: true
		});
	}

	document.addEventListener('DOMContentLoaded', mbAttachObserver);
	var mbRetry = setInterval(function() {
		mbAttachObserver();
		if (mbObserverAttached) clearInterval(mbRetry);
	}, 200);
	setTimeout(function() { clearInterval(mbRetry); }, 10000);

	function mbBindJqEvents() {
		if (typeof jQuery === 'undefined') return;
		var $ = jQuery;
		var events = 'added_to_cart removed_from_cart wc_fragments_refreshed updated_cart_totals updated_wc_div';
		$(document).on(events, function() { mbSyncBadge( mbReadCount() ); });
	}
	if (typeof jQuery !== 'undefined') {
		mbBindJqEvents();
	} else {
		var mbJqRetry = setInterval(function() {
			if (typeof jQuery !== 'undefined') { clearInterval(mbJqRetry); mbBindJqEvents(); }
		}, 100);
		setTimeout(function() { clearInterval(mbJqRetry); }, 8000);
	}
})();
</script>
