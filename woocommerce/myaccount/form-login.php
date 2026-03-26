<?php
/**
 * Login Form — Tabs Design (Monbedo)
 * @package WooCommerce\Templates
 * @version 9.2.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// Supprimer les injections WP Loyalty via woocommerce_register_form
add_action( 'woocommerce_register_form', function() {
  global $wp_filter;
  if ( ! isset( $wp_filter['woocommerce_register_form'] ) ) return;
  foreach ( $wp_filter['woocommerce_register_form']->callbacks as $priority => $callbacks ) {
    foreach ( $callbacks as $key => $callback ) {
      $fn = $callback['function'];
      if ( is_array( $fn ) && is_object( $fn[0] ) ) {
        $class = get_class( $fn[0] );
        if ( stripos( $class, 'wlr' ) !== false || stripos( $class, 'wployalty' ) !== false || stripos( $class, 'WPLoyalty' ) !== false ) {
          unset( $wp_filter['woocommerce_register_form']->callbacks[ $priority ][ $key ] );
        }
      }
    }
  }
}, 1 );

do_action( 'woocommerce_before_customer_login_form' );
?>

<style>
  /* ── Fond noir page Mon Compte ───────────────────────── */
  body.woocommerce-account { background-color: #0a0a0a !important; }
  body.woocommerce-account .site-main,
  body.woocommerce-account main,
  body.woocommerce-account #main,
  body.woocommerce-account #content,
  body.woocommerce-account .entry-content,
  body.woocommerce-account .ast-container,
  body.woocommerce-account #page { background-color: #0a0a0a !important; }
  body.woocommerce-account .entry-title,
  body.woocommerce-account h1.entry-title { color: white !important; }

  .mb-login-wrap {
    max-width: 440px;
    margin: 2.5rem auto;
    padding: 0 1rem;
    font-family: 'Inter', Arial, sans-serif;
  }

  /* ── Masquer injections WooCommerce indésirables ───────── */
  .woocommerce-privacy-policy-text { display: none !important; }
  .show-password-input { display: none !important; }
  .elementor-heading-title { color: #ff9000 !important; }
  #post-8031 > div > div > div.elementor-element.elementor-element-7c8b200.e-flex.e-con-boxed.e-con.e-parent.e-lazyloaded > div {
    display: none !important;
  }

  /* ── Tilt card wrapper ──────────────────────────────── */
  .mb-login-card {
    perspective: 900px;
    padding: 2px;
    border-radius: 18px;
  }
  .mb-login-card-inner {
    transform-style: preserve-3d;
    transition: transform 0.12s ease-out;
    border-radius: 16px;
    will-change: transform;
  }

  /* ── Animated border (conic-gradient rotatif) ──────── */
  @keyframes mb-spin-border {
    from { --mb-angle: 0deg; }
    to   { --mb-angle: 360deg; }
  }
  @property --mb-angle {
    syntax: '<angle>';
    initial-value: 0deg;
    inherits: false;
  }

  .mb-animated-border {
    position: relative;
    border-radius: 16px;
  }
  .mb-animated-border::before {
    content: '';
    position: absolute;
    inset: -1.5px;
    border-radius: 17.5px;
    background: conic-gradient(
      from var(--mb-angle),
      transparent 65%,
      #ff9900 80%,
      #ffcc00 88%,
      #ff9900 95%,
      transparent 100%
    );
    animation: mb-spin-border 3s linear infinite;
    z-index: 0;
  }
  .mb-animated-border::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 16px;
    background: #0d0d0d;
    z-index: 1;
  }
  .mb-animated-border > * {
    position: relative;
    z-index: 2;
  }

  /* ── Tabs ───────────────────────────────────────────── */
  .mb-tabs {
    display: flex;
    border-radius: 12px 12px 0 0;
    overflow: hidden;
    border: none;
    border-bottom: none;
    position: relative;
    z-index: 2;
  }
  .mb-tab {
    flex: 1;
    padding: 0.85rem 1rem;
    text-align: center;
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s, color 0.2s;
    background: rgba(255,255,255,0.02);
    color: rgba(255,255,255,0.4);
    border: none;
    outline: none;
    letter-spacing: 0.03em;
  }
  .mb-tab.active {
    background: rgba(255,255,255,0.06);
    color: white;
    border-bottom: 2px solid #ff9900;
  }
  .mb-tab:hover:not(.active) {
    background: rgba(255,255,255,0.04);
    color: rgba(255,255,255,0.7);
  }

  /* ── Glass box ──────────────────────────────────────── */
  .mb-box {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(12px) saturate(20%);
    -webkit-backdrop-filter: blur(12px) saturate(20%);
    border: none;
    border-radius: 0 0 16px 16px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.6), inset 0 1px 0 rgba(255,255,255,0.04);
    padding: 1.75rem;
    position: relative;
  }

  .mb-panel { display: none; }
  .mb-panel.active { display: block; }

  .mb-box label {
    display: block;
    color: rgba(255,255,255,0.45);
    font-size: 0.7rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    margin-bottom: 0.35rem;
  }

  .mb-box .woocommerce-Input--text,
  .mb-box input[type="text"],
  .mb-box input[type="email"],
  .mb-box input[type="password"],
  .mb-box input[type="date"] {
    width: 100% !important;
    height: 40px !important;
    background: rgba(255,255,255,0.05) !important;
    border: 1px solid rgba(255,255,255,0.08) !important;
    border-radius: 8px !important;
    color: white !important;
    font-size: 0.875rem !important;
    padding: 0 42px 0 14px !important;
    transition: border-color 0.2s, background 0.2s;
    box-shadow: none !important;
    outline: none !important;
    margin-bottom: 0.5rem;
  }
  .mb-box input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(1) opacity(0.4);
    cursor: pointer;
  }
  .mb-box input[type="text"]:focus,
  .mb-box input[type="email"]:focus,
  .mb-box input[type="password"]:focus,
  .mb-box input[type="date"]:focus {
    border-color: rgba(255,255,255,0.2) !important;
    background: rgba(255,255,255,0.08) !important;
  }
  .mb-box input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 1000px #161616 inset !important;
    -webkit-text-fill-color: white !important;
  }

  /* ── Password row + œil ─────────────────────────────── */
  .mb-box p.mb-has-eye { position: relative; }
  .mb-eye-btn {
    position: absolute;
    right: 12px;
    top: calc(0.7rem + 0.35rem + 20px);
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
    color: rgba(255,255,255,0.40);
    transition: color 0.3s;
    z-index: 2;
  }
  .mb-eye-btn:hover { color: white; }
  .mb-eye-btn svg { width: 16px; height: 16px; }

  /* ── Force du mot de passe ────────────────────────────── */
  .woocommerce-password-strength {
    border-radius: 6px !important;
    font-size: 0.72rem !important;
    font-weight: 600 !important;
    padding: 0.3rem 0.6rem !important;
    margin-top: 0.2rem !important;
    margin-bottom: 0.5rem !important;
    text-align: left !important;
    display: block;
  }
  .woocommerce-password-strength.bad,
  .woocommerce-password-strength.short {
    background: rgba(220,53,69,0.15) !important;
    color: #ff6b7a !important;
    border: 1px solid rgba(220,53,69,0.3) !important;
  }
  .woocommerce-password-strength.good {
    background: rgba(255,153,0,0.12) !important;
    color: #ff9900 !important;
    border: 1px solid rgba(255,153,0,0.3) !important;
  }
  .woocommerce-password-strength.strong {
    background: rgba(40,167,69,0.12) !important;
    color: #4caf7d !important;
    border: 1px solid rgba(40,167,69,0.3) !important;
  }
  .woocommerce-password-hint {
    color: rgba(255,255,255,0.3) !important;
    font-size: 0.7rem !important;
    line-height: 1.5 !important;
    display: block !important;
    margin-bottom: 0.75rem !important;
  }

  .mb-box .woocommerce-form-login__rememberme {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255,255,255,0.5);
    font-size: 0.75rem;
    text-transform: none;
    letter-spacing: 0;
    margin-bottom: 1rem;
  }
  .mb-box input[type="checkbox"] { accent-color: #ff9900; width: 14px; height: 14px; }

  /* ── Points banner ──────────────────────────────────── */
  .mb-points-banner {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    background: rgba(255,153,0,0.08);
    border: 1px solid rgba(255,153,0,0.2);
    border-radius: 8px;
    padding: 0.6rem 0.875rem;
    margin-bottom: 1.25rem;
  }
  .mb-points-banner .mb-points-icon { font-size: 1rem; flex-shrink: 0; }
  .mb-points-banner span { color: #ff9900; font-size: 0.78rem; font-weight: 600; line-height: 1.4; }

  /* ── Privacy notice (la nôtre) ───────────────────────── */
  .mb-privacy-notice {
    color: rgba(255,255,255,0.35) !important;
    font-size: 0.72rem !important;
    line-height: 1.55 !important;
    margin-top: 1rem !important;
    margin-bottom: 0 !important;
    text-transform: none !important;
    letter-spacing: 0 !important;
    font-weight: 400 !important;
  }
  .mb-privacy-notice a {
    color: rgba(255,153,0,0.7) !important;
    text-decoration: underline !important;
    text-underline-offset: 2px !important;
    font-size: inherit !important;
  }
  .mb-privacy-notice a:hover { color: #ff9900 !important; }

  .mb-box .woocommerce-form-login__submit,
  .mb-box .woocommerce-form-register__submit {
    display: block !important;
    width: 100% !important;
    height: 40px !important;
    background: #ff9900 !important;
    border: none !important;
    border-radius: 8px !important;
    color: #000 !important;
    font-weight: 600 !important;
    font-size: 0.875rem !important;
    cursor: pointer !important;
    box-shadow: none !important;
    transition: background 0.2s, transform 0.1s;
    margin-bottom: 1rem;
  }
  .mb-box .woocommerce-form-login__submit:hover,
  .mb-box .woocommerce-form-register__submit:hover { background: #e68900 !important; transform: scale(1.01); }
  .mb-box .woocommerce-form-login__submit:active,
  .mb-box .woocommerce-form-register__submit:active { transform: scale(0.98) !important; }

  .mb-box .lost_password a, .mb-box a {
    color: rgba(255,255,255,0.4) !important;
    font-size: 0.75rem !important;
    text-decoration: none !important;
    transition: color 0.2s;
  }
  .mb-box .lost_password a:hover, .mb-box a:hover { color: rgba(255,255,255,0.8) !important; }
  .mb-box .required { color: #ff9900 !important; }

  .woocommerce-error, .woocommerce-message, .woocommerce-info {
    background: rgba(255,255,255,0.03) !important;
    border: 1px solid rgba(255,255,255,0.08) !important;
    border-left: 3px solid #ff9900 !important;
    border-radius: 8px !important;
    color: rgba(255,255,255,0.7) !important;
    font-size: 0.8rem !important;
    padding: 0.75rem 1rem !important;
    margin-bottom: 1rem;
  }
  .mb-box p { color: rgba(255,255,255,0.4); font-size: 0.78rem; line-height: 1.5; margin-bottom: 1rem; }
  .mb-box .form-row { margin-bottom: 0; }
</style>

<div class="mb-login-wrap">

  <div class="mb-login-card">
    <div class="mb-login-card-inner mb-animated-border" id="mb-card-inner">

      <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
      <div class="mb-tabs">
        <button class="mb-tab active" onclick="mbSwitchTab('login', this)"><?php esc_html_e( 'Se connecter', 'woocommerce' ); ?></button>
        <button class="mb-tab" onclick="mbSwitchTab('register', this)"><?php esc_html_e( "S'inscrire", 'woocommerce' ); ?></button>
      </div>
      <?php endif; ?>

      <div class="mb-box">

        <!-- LOGIN PANEL -->
        <div class="mb-panel active" id="mb-panel-login">
          <form class="woocommerce-form woocommerce-form-login login" method="post">
            <?php do_action( 'woocommerce_login_form_start' ); ?>

            <p class="woocommerce-form-row form-row-wide">
              <label for="username"><?php esc_html_e( 'Identifiant ou e-mail', 'woocommerce' ); ?> <span class="required" aria-hidden="true">*</span></label>
              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" />
            </p>

            <p class="woocommerce-form-row form-row-wide mb-has-eye">
              <label for="password"><?php esc_html_e( 'Mot de passe', 'woocommerce' ); ?> <span class="required" aria-hidden="true">*</span></label>
              <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required aria-required="true" />
              <button type="button" class="mb-eye-btn" onclick="mbTogglePass('password', this)" aria-label="Afficher/masquer le mot de passe">
                <?php echo mb_eye_icon_svg( true ); ?>
              </button>
            </p>

            <?php do_action( 'woocommerce_login_form' ); ?>

            <label class="woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
              <input class="woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
              <span><?php esc_html_e( 'Se souvenir de moi', 'woocommerce' ); ?></span>
            </label>

            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

            <p class="form-row">
              <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
                <?php esc_html_e( 'Se connecter', 'woocommerce' ); ?>
              </button>
            </p>

            <p class="woocommerce-LostPassword lost_password">
              <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Mot de passe oublié ?', 'woocommerce' ); ?></a>
            </p>

            <?php do_action( 'woocommerce_login_form_end' ); ?>
          </form>
        </div>

        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
        <!-- REGISTER PANEL -->
        <div class="mb-panel" id="mb-panel-register">
          <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?>>
            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <div class="mb-points-banner">
              <span class="mb-points-icon">🌟</span>
              <span><?php esc_html_e( 'Inscrivez-vous et gagnez 50 points !', 'woocommerce' ); ?></span>
            </div>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
            <p class="woocommerce-form-row form-row-wide">
              <label for="reg_username"><?php esc_html_e( "Nom d'utilisateur", 'woocommerce' ); ?> <span class="required" aria-hidden="true">*</span></label>
              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" />
            </p>
            <?php endif; ?>

            <p class="woocommerce-form-row form-row-wide">
              <label for="reg_email"><?php esc_html_e( 'Adresse e-mail', 'woocommerce' ); ?> <span class="required" aria-hidden="true">*</span></label>
              <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" />
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
            <p class="woocommerce-form-row form-row-wide mb-has-eye">
              <label for="reg_password"><?php esc_html_e( 'Mot de passe', 'woocommerce' ); ?> <span class="required" aria-hidden="true">*</span></label>
              <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
              <button type="button" class="mb-eye-btn" onclick="mbTogglePass('reg_password', this)" aria-label="Afficher/masquer le mot de passe">
                <?php echo mb_eye_icon_svg( true ); ?>
              </button>
            </p>
            <?php else : ?>
            <p><?php esc_html_e( 'Un lien pour définir votre mot de passe sera envoyé à votre adresse e-mail.', 'woocommerce' ); ?></p>
            <?php endif; ?>

            <p class="woocommerce-form-row form-row-wide">
              <label for="reg_birthday">
                <?php esc_html_e( 'Date de naissance', 'woocommerce' ); ?>
                <span style="color:rgba(255,255,255,0.3);font-size:0.65rem;text-transform:none;letter-spacing:0;margin-left:0.3rem;">(<?php esc_html_e( 'facultatif', 'woocommerce' ); ?>)</span>
              </label>
              <input type="date" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_birthday" id="reg_birthday" max="<?php echo esc_attr( date( 'Y-m-d', strtotime( '-10 years' ) ) ); ?>" />
            </p>

            <?php do_action( 'woocommerce_register_form' ); ?>

            <p class="form-row">
              <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
              <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">
                <?php esc_html_e( "S'inscrire", 'woocommerce' ); ?>
              </button>
            </p>

            <p class="mb-privacy-notice">
              <?php
              printf(
                esc_html__( 'Vos données personnelles seront utilisées pour vous accompagner au cours de votre visite du site web, gérer l’accès à votre compte, et pour d’autres raisons décrites dans notre %s.', 'woocommerce' ),
                '<a href="https://www.monbedo.com/politique-confidentialite/" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Politique de confidentialité', 'woocommerce' ) . '</a>'
              );
              ?>
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>
          </form>
        </div>
        <?php endif; ?>

      </div><!-- .mb-box -->
    </div><!-- .mb-login-card-inner -->
  </div><!-- .mb-login-card -->

</div><!-- .mb-login-wrap -->

<?php
/**
 * Lucide Eye  (visible = password shown)   → same as <Eye /> in React
 * Lucide EyeClosed (hidden = password masked) → same as <EyeClosed /> in React
 */
function mb_eye_icon_svg( $hidden = true ) {
  $size = 'width="16" height="16"';
  $base = 'viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';

  if ( $hidden ) {
    /* EyeClosed — password is currently masked, show this icon to reveal */
    return '<svg ' . $size . ' ' . $base . '><path d="M2 10C2 10 5 6 12 6s10 4 10 4"/><path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M22 10c-.44.664-1.011 1.41-1.695 2.04"/><path d="M15.56 13.878A5 5 0 0 1 12 15c-1.346 0-2.576-.527-3.479-1.386"/><path d="M2 10c.44.664 1.011 1.41 1.695 2.04"/><line x1="3" y1="3" x2="21" y2="21"/></svg>';
  }

  /* Eye — password is currently visible, show this icon to mask */
  return '<svg ' . $size . ' ' . $base . '><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>';
}
?>

<script>
/* ── Toggle mot de passe (Lucide Eye / EyeClosed) ────────── */
var MB_ICON_EYE_CLOSED = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 10C2 10 5 6 12 6s10 4 10 4"/><path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M22 10c-.44.664-1.011 1.41-1.695 2.04"/><path d="M15.56 13.878A5 5 0 0 1 12 15c-1.346 0-2.576-.527-3.479-1.386"/><path d="M2 10c.44.664 1.011 1.41 1.695 2.04"/><line x1="3" y1="3" x2="21" y2="21"/></svg>';
var MB_ICON_EYE_OPEN   = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>';

function mbTogglePass(id, btn) {
  var inp = document.getElementById(id);
  if (!inp) return;
  var isHidden = inp.type === 'password';
  inp.type    = isHidden ? 'text' : 'password';
  btn.innerHTML = isHidden ? MB_ICON_EYE_OPEN : MB_ICON_EYE_CLOSED;
}

/* ── Switch tabs ───────────────────────────────────── */
function mbSwitchTab(tab, el) {
  document.querySelectorAll('.mb-panel').forEach(function(p){ p.classList.remove('active'); });
  document.querySelectorAll('.mb-tab').forEach(function(t){ t.classList.remove('active'); });
  document.getElementById('mb-panel-' + tab).classList.add('active');
  el.classList.add('active');
}

/* ── Tilt on mousemove ─────────────────────────────── */
document.addEventListener('DOMContentLoaded', function() {
  var url = new URLSearchParams(window.location.search);
  if (url.get('action') === 'register') mbSwitchTab('register', document.querySelectorAll('.mb-tab')[1]);

  var card = document.getElementById('mb-card-inner');
  if (!card) return;
  var wrap = card.closest('.mb-login-card');

  var MAX_TILT = 2;
  var raf;
  var targetX = 0, targetY = 0, currentX = 0, currentY = 0;

  function lerp(a, b, t) { return a + (b - a) * t; }

  function loop() {
    currentX = lerp(currentX, targetX, 0.1);
    currentY = lerp(currentY, targetY, 0.1);
    card.style.transform = 'rotateX(' + currentY + 'deg) rotateY(' + currentX + 'deg)';
    raf = requestAnimationFrame(loop);
  }

  wrap.addEventListener('mouseenter', function() {
    raf = requestAnimationFrame(loop);
  });

  wrap.addEventListener('mousemove', function(e) {
    var rect = wrap.getBoundingClientRect();
    var x = (e.clientX - rect.left) / rect.width  - 0.5;
    var y = (e.clientY - rect.top)  / rect.height - 0.5;
    targetX =  x * MAX_TILT * 2;
    targetY = -y * MAX_TILT * 2;
  });

  wrap.addEventListener('mouseleave', function() {
    targetX = 0;
    targetY = 0;
    setTimeout(function() {
      cancelAnimationFrame(raf);
      card.style.transform = 'rotateX(0deg) rotateY(0deg)';
    }, 600);
  });
});
</script>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
