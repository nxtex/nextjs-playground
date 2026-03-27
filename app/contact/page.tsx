'use client';
import { PlusIcon, Clock } from 'lucide-react';
import Link from 'next/link';
import { useState } from 'react';

function WhatsAppIcon({ className }: { className?: string }) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 32 32"
      fill="currentColor"
      className={className}
    >
      <path d="M16 0C7.163 0 0 7.163 0 16c0 2.822.737 5.469 2.027 7.77L0 32l8.437-2.01A15.93 15.93 0 0 0 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333a13.27 13.27 0 0 1-6.771-1.854l-.485-.288-5.01 1.194 1.237-4.876-.317-.502A13.267 13.267 0 0 1 2.667 16C2.667 8.636 8.636 2.667 16 2.667S29.333 8.636 29.333 16 23.364 29.333 16 29.333zm7.27-9.592c-.398-.199-2.354-1.162-2.719-1.294-.365-.133-.631-.199-.897.199-.265.398-1.03 1.294-1.263 1.56-.232.265-.465.298-.863.1-.398-.199-1.681-.62-3.202-1.977-1.183-1.056-1.982-2.36-2.214-2.758-.232-.398-.025-.613.175-.811.18-.178.398-.465.597-.697.199-.232.265-.398.398-.664.133-.265.066-.497-.033-.697-.1-.199-.897-2.162-1.229-2.96-.324-.778-.653-.673-.897-.686l-.764-.013c-.265 0-.697.1-1.063.497-.365.398-1.395 1.362-1.395 3.322s1.428 3.854 1.627 4.12c.199.265 2.81 4.292 6.808 6.022.951.41 1.693.655 2.271.839.954.304 1.823.261 2.51.158.765-.114 2.354-.962 2.686-1.891.332-.929.332-1.726.232-1.891-.099-.166-.365-.265-.763-.464z" />
    </svg>
  );
}

export default function ContactPage() {
  const [consent, setConsent] = useState(false);

  return (
    <main className="min-h-screen flex items-center justify-center px-6 py-16 page-bg">
      <div className="w-full max-w-5xl relative">

        <PlusIcon className="absolute -top-4 -left-4 h-6 w-6 page-fg-muted" />
        <PlusIcon className="absolute -top-4 -right-4 h-6 w-6 page-fg-muted" />
        <PlusIcon className="absolute -bottom-4 -left-4 h-6 w-6 page-fg-muted" />
        <PlusIcon className="absolute -bottom-4 -right-4 h-6 w-6 page-fg-muted" />

        <div className="grid md:grid-cols-2 lg:grid-cols-3 page-border border rounded-xl overflow-hidden shadow-2xl">

          {/* Left */}
          <div className="lg:col-span-2 page-bg px-8 py-10 space-y-7">
            <div className="space-y-2">
              <p className="page-accent text-xs font-semibold uppercase tracking-widest">Nous contacter</p>
              <h1 className="text-3xl md:text-4xl font-bold page-fg leading-snug">
                Un expert disponible<br />
                pour te{' '}<span style={{ color: 'var(--accent)' }}>guider.</span>
              </h1>
            </div>

            {/* WhatsApp CTA */}
            <Link
              href="https://wa.me/33600000000"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center gap-3 rounded-xl px-5 py-3.5 font-semibold text-sm text-white shadow-lg transition-all hover:scale-105 hover:shadow-green-500/30 active:scale-95"
              style={{ background: 'linear-gradient(135deg, #25d366 0%, #1da851 100%)' }}
            >
              <WhatsAppIcon className="h-5 w-5 flex-shrink-0" />
              Discuter avec un expert
              <span className="ml-1 opacity-80">&rarr;</span>
            </Link>

            {/* Horaires — sans titre */}
            <div className="flex items-center gap-3 page-card page-border border rounded-xl px-5 py-3.5 w-fit">
              <Clock className="h-4 w-4 flex-shrink-0" style={{ color: 'var(--accent)' }} />
              <p className="page-fg text-sm font-medium">Lundi &ndash; Samedi</p>
              <span className="page-fg-muted text-sm">&bull;</span>
              <p className="text-sm font-semibold" style={{ color: 'var(--accent)' }}>9h00 &ndash; 18h00</p>
            </div>
          </div>

          {/* Right — form */}
          <div className="page-bg-sec page-border border-t md:border-t-0 md:border-l p-6 flex flex-col justify-center gap-5">
            <p className="page-accent text-xs font-semibold uppercase tracking-widest">Formulaire de contact</p>

            <form className="flex w-full flex-col gap-4">
              <div className="flex flex-col gap-1.5">
                <label htmlFor="email" className="page-fg-muted text-xs font-medium uppercase tracking-widest">Email</label>
                <input
                  id="email" name="email" type="email" placeholder="votre@email.com"
                  className="page-card page-border border rounded-lg px-3 py-2 text-sm page-fg outline-none w-full transition-colors"
                  style={{ background: 'var(--card)', color: 'var(--fg)', borderColor: 'var(--border)' }}
                />
              </div>

              <div className="flex flex-col gap-1.5">
                <label htmlFor="phone" className="page-fg-muted text-xs font-medium uppercase tracking-widest">T&eacute;l&eacute;phone</label>
                <input
                  id="phone" name="phone" type="tel" placeholder="+33 6 00 00 00 00"
                  className="page-card page-border border rounded-lg px-3 py-2 text-sm page-fg outline-none w-full transition-colors"
                  style={{ background: 'var(--card)', color: 'var(--fg)', borderColor: 'var(--border)' }}
                />
              </div>

              <div className="flex flex-col gap-1.5">
                <label htmlFor="message" className="page-fg-muted text-xs font-medium uppercase tracking-widest">Message</label>
                <textarea
                  id="message" name="message" rows={4} placeholder="Votre message..."
                  className="page-card page-border border rounded-lg px-3 py-2 text-sm page-fg outline-none w-full resize-none transition-colors"
                  style={{ background: 'var(--card)', color: 'var(--fg)', borderColor: 'var(--border)' }}
                />
              </div>

              <label className="flex items-start gap-2.5 cursor-pointer">
                <input
                  type="checkbox"
                  checked={consent}
                  onChange={(e) => setConsent(e.target.checked)}
                  className="mt-0.5 w-4 h-4 flex-shrink-0 cursor-pointer"
                  style={{ accentColor: 'var(--accent)' }}
                />
                <span className="page-fg-muted text-xs leading-relaxed">
                  Je consens &agrave; &ecirc;tre recontact&eacute;(e) par l&apos;&eacute;quipe Monbedo.
                </span>
              </label>

              <button
                type="submit"
                disabled={!consent}
                className="w-full rounded-lg px-4 py-2.5 text-sm font-semibold transition-all active:scale-95 disabled:opacity-30 disabled:cursor-not-allowed"
                style={{ background: 'var(--accent)', color: '#000' }}
              >
                Envoyer ma demande &rarr;
              </button>
            </form>
          </div>

        </div>
      </div>
    </main>
  );
}
