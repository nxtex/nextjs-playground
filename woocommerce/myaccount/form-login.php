<?php
/**
 * Login Form — Toggle Switch Design (Monbedo)
 * @package WooCommerce\Templates
 * @version 9.2.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;
do_action( 'woocommerce_before_customer_login_form' );
?>

<style>
  .mb-login-wrap {
    max-width: 440px;
    margin: 2.5rem auto;
    padding: 0 1rem;
    font-family: 'Inter', Arial, sans-serif;
  }

  /* ── Toggle ─────────────────────────────────────────── */
  .mb-toggle-wrap {
    display: flex;
    justify-content: center;
    margin-bottom: 1.5rem;
  }
  .mb-toggle {
    display: flex;
    align-items: center;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 999px;
    padding: 4px;
    gap: 0;
    position: relative;
  }
  .mb-toggle-btn {
    position: relative;
    z-index: 1;
    padding: 0.45rem 1.25rem;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    border: none;
    background: transparent;
    color: rgba(255,255,255,0.4);
    transition: color 0.25s;
    outline: none;
    letter-spacing: 0.02em;
  }
  .mb-toggle-btn.active { color: #000; }
  .mb-toggle-indicator {
    position: absolute;
    top: 4px;
    left: 4px;
    height: calc(100% - 8px);
    border-radius: 999px;
    background: #ff9900;
    transition: transform 0.3s cubic-bezier(0.4,0,0.2,1), width 0.3s;
    pointer-events: none;
    z-index: 0;
  }

  /* ── Glass box ──────────────────────────────────────── */
  .mb-box {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(12px) saturate(20%);
    -webkit-backdrop-filter: blur(12px) saturate(20%);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.6), inset 0 1px 0 rgba(255,255,255,0.04);
    padding: 1.75rem;
    position: relative;
    overflow: hidden;
  }
  .mb-box::before {
    content: '';
    position: absolute;
    top: 0; left: 10%; right: 10%;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.12), transparent);
    pointer-events: none;
  }

  /* ── Panels ─────────────────────────────────────────── */
  .mb-panel { display: none; }
  .mb-panel.active { display: block; }

  /* ── Labels ─────────────────────────────────────────── */
  .mb-box label {
    display: block;
    color: rgba(255,255,255,0.45);
    font-size: 0.7rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    margin-bottom: 0.35rem;
  }

  /* ── Inputs ─────────────────────────────────────────── */
  .mb-box .woocommerce-Input--text,
  .mb-box input[type="text"],
  .mb-box input[type="email"],
  .mb-box input[type="password"] {
    width: 100% !important;
    height: 40px !important;
    background: rgba(255,255,255,0.05) !important;
    border: 1px solid rgba(255,255,255,0.08) !important;
    border-radius: 8px !important;
    color: white !important;
    font-size: 0.875rem !important;
    padding: 0 14px !important;
    transition: border-color 0.2s, background 0.2s;
    box-shadow: none !important;
    outline: none !important;
    margin-bottom: 1rem;
  }
  .mb-box input[type="text"]:focus,
  .mb-box input[type="email"]:focus,
  .mb-box input[type="password"]:focus {
    border-color: rgba(255,255,255,0.2) !important;
    background: rgba(255,255,255,0.08) !important;
  }
  .mb-box input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 1000px #161616 inset !important;
    -webkit-text-fill-color: white !important;
  }

  /* ── Rememberme ─────────────────────────────────────── */
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
  .mb-box input[type="checkbox"] {
    accent-color: #ff9900;
    width: 14px; height: 14px;
  }

  /* ── Bouton ─────────────────────────────────────────── */
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
  .mb-box .woocommerce-form-register__submit:hover {
    background: #e68900 !important;
    transform: scale(1.01);
  }

  /* ── Liens ──────────────────────────────────────────── */
  .mb-box .lost_password a, .mb-box a {
    color: rgba(255,255,255,0.4) !important;
    font-size: 0.75rem !important;
    text-decoration: none !important;
    transition: color 0.2s;
  }
  .mb-box .lost_password a:hover, .mb-box a:hover {
    color: rgba(255,255,255,0.8) !important;
  }

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

  .mb-box p {
    color: rgba(255,255,255,0.4);
    font-size: 0.78rem;
    line-height: 1.5;
    margin-bottom: 1rem;
  }
  .mb-box .form-row { margin-bottom: 0; }
</style>

<div class="mb-login-wrap">

  <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
  <div class="mb-toggle-wrap">
    <div class="mb-toggle" id="mb-toggle">
      <div class="mb-toggle-indicator" id="mb-indicator"></div>
      <button class="mb-toggle-btn active" id="mb-btn-login" onclick="mbToggle('login')"><?php esc_html_e( 'Connexion', 'woocommerce' ); ?></button>
      <button class="mb-toggle-btn" id="mb-btn-register" onclick="mbToggle('register')"><?php esc_html_e( 'Inscription', 'woocommerce' ); ?></button>
    </div>
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

        <p class="woocommerce-form-row form-row-wide">
          <label for="password"><?php esc_html_e( 'Mot de passe', 'woocommerce' ); ?> <span class="required" aria-hidden="true">*</span></label>
          <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required aria-required="true" />
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
        <p class="woocommerce-form-row form-row-wide">
          <label for="reg_password"><?php esc_html_e( 'Mot de passe', 'woocommerce' ); ?> <span class="required" aria-hidden="true">*</span></label>
          <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
        </p>
        <?php else : ?>
        <p><?php esc_html_e( 'Un lien pour définir votre mot de passe sera envoyé à votre adresse e-mail.', 'woocommerce' ); ?></p>
        <?php endif; ?>

        <?php do_action( 'woocommerce_register_form' ); ?>

        <p class="form-row">
          <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
          <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">
            <?php esc_html_e( "S'inscrire", 'woocommerce' ); ?>
          </button>
        </p>

        <?php do_action( 'woocommerce_register_form_end' ); ?>
      </form>
    </div>
    <?php endif; ?>

  </div><!-- .mb-box -->
</div><!-- .mb-login-wrap -->

<script>
function mbToggle(tab) {
  var loginBtn = document.getElementById('mb-btn-login');
  var registerBtn = document.getElementById('mb-btn-register');
  var indicator = document.getElementById('mb-indicator');
  var panels = document.querySelectorAll('.mb-panel');
  panels.forEach(function(p) { p.classList.remove('active'); });
  document.getElementById('mb-panel-' + tab).classList.add('active');
  if (tab === 'login') {
    loginBtn.classList.add('active');
    registerBtn.classList.remove('active');
    indicator.style.transform = 'translateX(0)';
    indicator.style.width = loginBtn.offsetWidth + 'px';
  } else {
    registerBtn.classList.add('active');
    loginBtn.classList.remove('active');
    indicator.style.transform = 'translateX(' + loginBtn.offsetWidth + 'px)';
    indicator.style.width = registerBtn.offsetWidth + 'px';
  }
}
document.addEventListener('DOMContentLoaded', function() {
  // Init indicator size
  var loginBtn = document.getElementById('mb-btn-login');
  var indicator = document.getElementById('mb-indicator');
  if (loginBtn && indicator) indicator.style.width = loginBtn.offsetWidth + 'px';
  // Auto-switch on register action
  if (new URLSearchParams(window.location.search).get('action') === 'register') mbToggle('register');
});
</script>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
