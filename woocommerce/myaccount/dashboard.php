<?php
/**
 * My Account Dashboard
 *
 * Design custom — réplique du dashboard React Monbedo.
 * Copier dans : yourtheme/woocommerce/myaccount/dashboard.php
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$allowed_html = array(
	'a' => array( 'href' => array() ),
);

// Initiales avatar
$display_name = $current_user->display_name;
$initials     = strtoupper( mb_substr( $display_name, 0, 2 ) );

// Commandes récentes (5 dernières)
$customer_orders = wc_get_orders( array(
	'customer' => get_current_user_id(),
	'limit'    => 5,
	'orderby'  => 'date',
	'order'    => 'DESC',
) );
?>

<style>
/* ── Reset scope ── */
.mb-dashboard * { box-sizing: border-box; }

/* ── Tokens ── */
.mb-dashboard {
	--mb-bg:       #ffffff;
	--mb-bg2:      #f9f9f9;
	--mb-fg:       #0b0b0b;
	--mb-muted:    #6b7280;
	--mb-border:   #e5e7eb;
	--mb-accent:   #FF9000;
	--mb-card:     #f3f4f6;
	--mb-radius:   1rem;
	--mb-radius-sm:.5rem;
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
	color: var(--mb-fg);
	background: var(--mb-bg);
	min-height: 60vh;
	padding-bottom: 2rem;
}

/* ── Header ── */
.mb-header {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 1.25rem 2rem;
	background: var(--mb-bg2);
	border-bottom: 1px solid var(--mb-border);
	flex-wrap: wrap;
	gap: .75rem;
}
.mb-header__title { font-size: 1.1rem; font-weight: 600; letter-spacing: .05em; }
.mb-header__right { display: flex; align-items: center; gap: .75rem; flex-wrap: wrap; }
.mb-avatar {
	width: 2.25rem; height: 2.25rem; border-radius: 50%;
	background: var(--mb-accent); color: #000;
	display: flex; align-items: center; justify-content: center;
	font-weight: 700; font-size: .8rem;
}
.mb-username { font-size: .9rem; font-weight: 500; }
.mb-logout {
	border: 1px solid var(--mb-border);
	padding: .4rem 1rem; border-radius: var(--mb-radius-sm);
	font-size: .85rem; color: var(--mb-fg); text-decoration: none;
	transition: opacity .2s;
}
.mb-logout:hover { opacity: .65; }

/* ── Inner ── */
.mb-inner { max-width: 1200px; margin: 0 auto; padding: 2rem 1.5rem; }

/* ── Hero ── */
.mb-hero {
	border-radius: var(--mb-radius);
	padding: 1.5rem;
	margin-bottom: 2rem;
	background: linear-gradient(135deg, #111 0%, #2b2b2b 100%);
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap;
	gap: 1rem;
}
.mb-hero__title  { font-size: 1.2rem; font-weight: 600; color: #fff; margin: 0 0 .25rem; }
.mb-hero__sub    { font-size: .85rem; color: rgba(255,255,255,.6); margin: 0; }
.mb-hero__badge  {
	background: #fff; color: #000;
	padding: .5rem 1rem; border-radius: var(--mb-radius-sm);
	display: flex; align-items: center; gap: .4rem;
	font-size: .85rem; white-space: nowrap; flex-shrink: 0;
}
.mb-hero__badge svg { color: #16a34a; }

/* ── Section title ── */
.mb-section-title { font-weight: 600; margin: 0 0 1rem; font-size: .95rem; }

/* ── Cards ── */
.mb-cards {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
	gap: 1.25rem;
	margin-bottom: 2.5rem;
}
.mb-card {
	background: var(--mb-bg2);
	border: 1px solid var(--mb-border);
	border-radius: var(--mb-radius);
	padding: 1.25rem;
	text-decoration: none;
	color: var(--mb-fg);
	display: block;
	transition: box-shadow .2s, transform .2s;
}
.mb-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,.08); transform: translateY(-3px); color: var(--mb-fg); text-decoration: none; }
.mb-card__icon {
	width: 2.5rem; height: 2.5rem;
	background: var(--mb-card);
	border-radius: var(--mb-radius-sm);
	display: flex; align-items: center; justify-content: center;
	margin-bottom: 1rem;
	font-size: 1.1rem;
}
.mb-card__title { font-weight: 600; margin: 0 0 .25rem; font-size: .95rem; }
.mb-card__desc  { font-size: .82rem; color: var(--mb-muted); margin: 0 0 1rem; }
.mb-card__link  { font-size: .82rem; font-weight: 600; color: var(--mb-accent); display: flex; align-items: center; gap: .25rem; }

/* ── Table ── */
.mb-table-wrap {
	background: var(--mb-bg2);
	border: 1px solid var(--mb-border);
	border-radius: var(--mb-radius);
	padding: 1.5rem;
	margin-bottom: 2rem;
	overflow-x: auto;
}
.mb-table-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
.mb-table-head h3 { margin: 0; font-size: .95rem; }
.mb-table-head a { font-size: .82rem; color: var(--mb-accent); text-decoration: none; }
.mb-table-head a:hover { text-decoration: underline; }
.mb-table { width: 100%; border-collapse: collapse; font-size: .85rem; }
.mb-table th { text-align: left; padding: .5rem .75rem; color: var(--mb-muted); font-weight: 500; }
.mb-table td { padding: .75rem; border-top: 1px solid var(--mb-border); }
.mb-table td:first-child { font-family: monospace; font-size: .78rem; }
.mb-badge {
	display: inline-block;
	padding: .2rem .6rem;
	border-radius: 9999px;
	font-size: .75rem;
	font-weight: 500;
}
.mb-badge--completed  { background: #dcfce7; color: #15803d; }
.mb-badge--processing { background: #dbeafe; color: #1d4ed8; }
.mb-badge--on-hold    { background: #ffedd5; color: #c2410c; }
.mb-badge--pending    { background: #f3f4f6; color: #374151; }
.mb-badge--cancelled  { background: #fee2e2; color: #b91c1c; }
.mb-badge--refunded   { background: #ede9fe; color: #7c3aed; }
.mb-badge--failed     { background: #fee2e2; color: #b91c1c; }

/* ── Support ── */
.mb-support {
	background: var(--mb-bg2);
	border: 1px solid var(--mb-border);
	border-radius: var(--mb-radius);
	padding: 1.5rem;
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap;
	gap: 1rem;
}
.mb-support__title { font-weight: 600; margin: 0 0 .25rem; }
.mb-support__sub   { font-size: .85rem; color: var(--mb-muted); margin: 0; }
.mb-btn {
	background: var(--mb-accent);
	color: #000;
	border: none;
	padding: .6rem 1.25rem;
	border-radius: var(--mb-radius-sm);
	font-weight: 600;
	font-size: .85rem;
	text-decoration: none;
	transition: opacity .2s;
	white-space: nowrap;
}
.mb-btn:hover { opacity: .85; color: #000; text-decoration: none; }

@media (max-width: 600px) {
	.mb-header { padding: 1rem; }
	.mb-inner  { padding: 1rem; }
}
</style>

<div class="mb-dashboard">

	<!-- HEADER -->
	<header class="mb-header">
		<span class="mb-header__title">MON ESPACE</span>
		<div class="mb-header__right">
			<div class="mb-avatar"><?php echo esc_html( $initials ); ?></div>
			<span class="mb-username"><?php echo esc_html( $display_name ); ?></span>
			<a class="mb-logout" href="<?php echo esc_url( wc_logout_url() ); ?>">D&eacute;connexion</a>
		</div>
	</header>

	<div class="mb-inner">

		<!-- HERO -->
		<div class="mb-hero">
			<div>
				<p class="mb-hero__title">Bonjour, <?php echo esc_html( $display_name ); ?> &#128075;</p>
				<p class="mb-hero__sub">G&eacute;rez vos commandes et informations facilement.</p>
			</div>
			<div class="mb-hero__badge">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
				Compte connect&eacute;
			</div>
		</div>

		<!-- CARDS -->
		<h3 class="mb-section-title">Acc&egrave;s rapide</h3>
		<div class="mb-cards">

			<a class="mb-card" href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>">
				<div class="mb-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 2H8a2 2 0 0 0-2 2v16l6-3 6 3V4a2 2 0 0 0-2-2z"/></svg>
				</div>
				<p class="mb-card__title">Commandes</p>
				<p class="mb-card__desc">Voir et suivre vos commandes</p>
				<span class="mb-card__link">Acc&eacute;der <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
			</a>

			<a class="mb-card" href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>">
				<div class="mb-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-4"/><line x1="12" y1="19" x2="12" y2="21"/><line x1="6" y1="19" x2="6" y2="21"/></svg>
				</div>
				<p class="mb-card__title">Adresses</p>
				<p class="mb-card__desc">G&eacute;rer vos adresses de livraison</p>
				<span class="mb-card__link">Acc&eacute;der <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
			</a>

			<a class="mb-card" href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>">
				<div class="mb-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
				</div>
				<p class="mb-card__title">Mes infos</p>
				<p class="mb-card__desc">Voir vos factures et infos compte</p>
				<span class="mb-card__link">Acc&eacute;der <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
			</a>

		</div>

		<!-- TABLE commandes récentes -->
		<div class="mb-table-wrap">
			<div class="mb-table-head">
				<h3>Activit&eacute; r&eacute;cente</h3>
				<a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>">Voir tout</a>
			</div>

			<?php if ( $customer_orders ) : ?>
			<table class="mb-table">
				<thead>
					<tr>
						<th>Commande</th>
						<th>Date</th>
						<th>Statut</th>
						<th>Montant</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ( $customer_orders as $order ) :
					$status = $order->get_status();
					$status_labels = array(
						'completed'  => 'Livr&eacute;e',
						'processing' => 'En transit',
						'on-hold'    => 'En attente',
						'pending'    => 'En attente',
						'cancelled'  => 'Annul&eacute;e',
						'refunded'   => 'Rembours&eacute;e',
						'failed'     => '&Eacute;chou&eacute;e',
					);
					$label = isset( $status_labels[ $status ] ) ? $status_labels[ $status ] : ucfirst( $status );
				?>
					<tr>
						<td><a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">#<?php echo esc_html( $order->get_order_number() ); ?></a></td>
						<td><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></td>
						<td><span class="mb-badge mb-badge--<?php echo esc_attr( $status ); ?>"><?php echo $label; ?></span></td>
						<td><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<?php else : ?>
				<p style="color:var(--mb-muted);font-size:.9rem">Aucune commande pour le moment.</p>
			<?php endif; ?>
		</div>

		<!-- SUPPORT -->
		<div class="mb-support">
			<div>
				<p class="mb-support__title">Besoin d&apos;aide&nbsp;?</p>
				<p class="mb-support__sub">Notre &eacute;quipe est l&agrave; pour vous accompagner.</p>
			</div>
			<a class="mb-btn" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) . 'contact/' ); ?>">Nous contacter</a>
		</div>

	</div>

	<?php
	/**
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );
	do_action( 'woocommerce_before_my_account' ); // deprecated
	do_action( 'woocommerce_after_my_account' );  // deprecated
	?>

</div>
