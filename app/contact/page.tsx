'use client';
import { PlusIcon, MessageCircle, Clock } from 'lucide-react';
import Link from 'next/link';
import { useState } from 'react';

export default function ContactPage() {
	const [consent, setConsent] = useState(false);

	return (
		<main className="min-h-screen bg-black flex items-center justify-center px-6 py-16">
			<div className="w-full max-w-5xl relative">

				{/* Corner crosses */}
				<PlusIcon className="absolute -top-4 -left-4 h-6 w-6 text-white/20" />
				<PlusIcon className="absolute -top-4 -right-4 h-6 w-6 text-white/20" />
				<PlusIcon className="absolute -bottom-4 -left-4 h-6 w-6 text-white/20" />
				<PlusIcon className="absolute -bottom-4 -right-4 h-6 w-6 text-white/20" />

				<div className="grid md:grid-cols-2 lg:grid-cols-3 border border-white/10 rounded-xl overflow-hidden shadow-2xl">

					{/* Left — info */}
					<div className="lg:col-span-2 bg-[#0a0a0a] px-8 py-10 space-y-8">
						<div className="space-y-3">
							<p className="text-[#ff9900] text-xs font-semibold uppercase tracking-widest">
								Nous contacter
							</p>
							<h1 className="text-4xl md:text-5xl font-bold text-white leading-tight">
								Nous serons ravis de{' '}
								<span className="text-[#ff9900]">répondre</span>
								<br />à ta demande.
							</h1>
						</div>

						{/* CTA conseiller */}
						<Link
							href="https://www.monbedo.com/contact/?v=82a9e4d26595#"
							target="_blank"
							rel="noopener noreferrer"
							className="inline-flex items-center gap-2.5 bg-[#ff9900]/10 border border-[#ff9900]/30 hover:bg-[#ff9900]/20 hover:border-[#ff9900]/50 transition-all rounded-xl px-5 py-3 group"
						>
							<div className="p-1.5 rounded-lg bg-[#ff9900]/20">
								<MessageCircle className="h-4 w-4 text-[#ff9900]" />
							</div>
							<span className="text-white text-sm font-medium group-hover:text-[#ff9900] transition-colors">
								Parler à un conseiller
							</span>
							<span className="text-white/30 text-sm ml-1">→</span>
						</Link>

						{/* Horaires */}
						<div className="flex items-start gap-3 bg-white/4 border border-white/8 rounded-xl px-5 py-4 w-fit">
							<div className="p-2 rounded-lg bg-[#ff9900]/10 border border-[#ff9900]/20 flex-shrink-0 mt-0.5">
								<Clock className="h-4 w-4 text-[#ff9900]" />
							</div>
							<div className="space-y-0.5">
								<p className="text-white/50 text-xs font-semibold uppercase tracking-widest">
									Horaires d’ouverture
								</p>
								<p className="text-white text-sm font-medium">Lundi – Samedi</p>
								<p className="text-[#ff9900] text-sm font-semibold">9h00 – 18h00</p>
							</div>
						</div>
					</div>

					{/* Right — form */}
					<div className="bg-[#0d0d0d] border-t border-white/10 md:border-t-0 md:border-l border-white/10 p-6 flex flex-col justify-center gap-5">
						<p className="text-[#ff9900] text-xs font-semibold uppercase tracking-widest">
							Formulaire de contact
						</p>

						<form className="flex w-full flex-col gap-4">

							<div className="flex flex-col gap-1.5">
								<label htmlFor="email" className="text-white/50 text-xs font-medium uppercase tracking-widest">
									Email
								</label>
								<input
									id="email" name="email" type="email"
									placeholder="votre@email.com"
									className="bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-white/20 outline-none focus:border-[#ff9900]/50 focus:ring-1 focus:ring-[#ff9900]/30 w-full transition-colors"
								/>
							</div>

							<div className="flex flex-col gap-1.5">
								<label htmlFor="phone" className="text-white/50 text-xs font-medium uppercase tracking-widest">
									Téléphone
								</label>
								<input
									id="phone" name="phone" type="tel"
									placeholder="+33 6 00 00 00 00"
									className="bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-white/20 outline-none focus:border-[#ff9900]/50 focus:ring-1 focus:ring-[#ff9900]/30 w-full transition-colors"
								/>
							</div>

							<div className="flex flex-col gap-1.5">
								<label htmlFor="message" className="text-white/50 text-xs font-medium uppercase tracking-widest">
									Message
								</label>
								<textarea
									id="message" name="message" rows={4}
									placeholder="Votre message..."
									className="bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-white/20 outline-none focus:border-[#ff9900]/50 focus:ring-1 focus:ring-[#ff9900]/30 w-full resize-none transition-colors"
								/>
							</div>

							{/* Consentement */}
							<label className="flex items-start gap-2.5 cursor-pointer group">
								<input
									type="checkbox"
									checked={consent}
									onChange={(e) => setConsent(e.target.checked)}
									className="mt-0.5 accent-[#ff9900] w-4 h-4 flex-shrink-0 cursor-pointer"
								/>
								<span className="text-white/40 text-xs leading-relaxed group-hover:text-white/60 transition-colors">
									Je consens à être recontacté(e) par l’équipe Monbedo.
								</span>
							</label>

							<button
								type="submit"
								disabled={!consent}
								className="w-full rounded-lg bg-[#ff9900] hover:bg-[#e68900] active:scale-95 disabled:opacity-30 disabled:cursor-not-allowed px-4 py-2.5 text-sm font-semibold text-black transition-all"
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
