'use client';
import { PlusIcon, MessageCircle, Clock } from 'lucide-react';
import Link from 'next/link';
import { useState } from 'react';

const contactInfo = [
  { icon: MessageCircle, label: 'Email',   value: 'contact@21st.dev' },
  { icon: Clock,         label: 'Horaires',value: 'Lun–Sam 9h–18h' },
];

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
          <div className="lg:col-span-2 page-bg px-8 py-10 space-y-8">
            <div className="space-y-3">
              <p className="page-accent text-xs font-semibold uppercase tracking-widest">Nous contacter</p>
              <h1 className="text-4xl md:text-5xl font-bold page-fg leading-tight">
                Nous serons ravis de{' '}
                <span className="page-accent">répondre</span>
                <br />à ta demande.
              </h1>
            </div>

            <Link
              href="https://www.monbedo.com/contact/?v=82a9e4d26595#"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center gap-2.5 page-card page-border border hover:opacity-80 transition-all rounded-xl px-5 py-3 group"
            >
              <div className="p-1.5 rounded-lg page-card">
                <MessageCircle className="h-4 w-4 page-accent" />
              </div>
              <span className="page-fg text-sm font-medium">Parler à un conseiller</span>
              <span className="page-fg-muted text-sm ml-1">→</span>
            </Link>

            <div className="flex items-start gap-3 page-card page-border border rounded-xl px-5 py-4 w-fit">
              <div className="p-2 rounded-lg page-card page-border border flex-shrink-0 mt-0.5">
                <Clock className="h-4 w-4 page-accent" />
              </div>
              <div className="space-y-0.5">
                <p className="page-fg-muted text-xs font-semibold uppercase tracking-widest">Horaires d'ouverture</p>
                <p className="page-fg text-sm font-medium">Lundi – Samedi</p>
                <p className="page-accent text-sm font-semibold">9h00 – 18h00</p>
              </div>
            </div>
          </div>

          {/* Right — form */}
          <div className="page-bg-sec page-border border-t md:border-t-0 md:border-l p-6 flex flex-col justify-center gap-5">
            <p className="page-accent text-xs font-semibold uppercase tracking-widest">Formulaire de contact</p>

            <form className="flex w-full flex-col gap-4">
              {[{ id: 'email', label: 'Email', type: 'email', placeholder: 'votre@email.com' },
                { id: 'phone', label: 'Téléphone', type: 'tel', placeholder: '+33 6 00 00 00 00' }]
                .map(({ id, label, type, placeholder }) => (
                <div key={id} className="flex flex-col gap-1.5">
                  <label htmlFor={id} className="page-fg-muted text-xs font-medium uppercase tracking-widest">{label}</label>
                  <input
                    id={id} name={id} type={type} placeholder={placeholder}
                    className="page-card page-border border rounded-lg px-3 py-2 text-sm page-fg outline-none w-full transition-colors"
                    style={{ background: 'var(--card)', color: 'var(--fg)', borderColor: 'var(--border)' }}
                  />
                </div>
              ))}

              <div className="flex flex-col gap-1.5">
                <label htmlFor="message" className="page-fg-muted text-xs font-medium uppercase tracking-widest">Message</label>
                <textarea
                  id="message" name="message" rows={4} placeholder="Votre message..."
                  className="page-card page-border border rounded-lg px-3 py-2 text-sm page-fg outline-none w-full resize-none transition-colors"
                  style={{ background: 'var(--card)', color: 'var(--fg)', borderColor: 'var(--border)' }}
                />
              </div>

              <label className="flex items-start gap-2.5 cursor-pointer group">
                <input
                  type="checkbox"
                  checked={consent}
                  onChange={(e) => setConsent(e.target.checked)}
                  className="mt-0.5 w-4 h-4 flex-shrink-0 cursor-pointer"
                  style={{ accentColor: 'var(--accent)' }}
                />
                <span className="page-fg-muted text-xs leading-relaxed">Je consens à être recontacté(e) par l'équipe Monbedo.</span>
              </label>

              <button
                type="submit"
                disabled={!consent}
                className="w-full rounded-lg px-4 py-2.5 text-sm font-semibold transition-all active:scale-95 disabled:opacity-30 disabled:cursor-not-allowed"
                style={{ background: 'var(--accent)', color: '#000' }}
              >
                Envoyer ma demande →
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>
  );
}
