import { Mail, Phone, MapPin, PlusIcon } from 'lucide-react';

const contactInfo = [
	{ icon: Mail,    label: 'Email',   value: 'contact@21st.dev' },
	{ icon: Phone,   label: 'Phone',   value: '+92 312 1234567' },
	{ icon: MapPin,  label: 'Address', value: 'Faisalabad, Pakistan' },
];

export default function ContactPage() {
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
					<div className="lg:col-span-2 bg-[#0a0a0a] px-8 py-10 space-y-6">
						<h1 className="text-4xl md:text-5xl font-bold text-white leading-tight">
							Get in{' '}
							<span className="text-[#ff9900]">touch</span>
						</h1>
						<p className="text-white/50 text-sm md:text-base max-w-lg">
							If you have any questions regarding our Services or need help,
							please fill out the form here. We do our best to respond within{' '}
							<span className="text-white/80">1 business day</span>.
						</p>

						<div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 pt-2">
							{contactInfo.map(({ icon: Icon, label, value }) => (
								<div
									key={label}
									className="flex items-center gap-3 bg-white/5 border border-white/8 rounded-xl px-4 py-3"
								>
									<div className="p-2.5 rounded-lg bg-[#ff9900]/10 border border-[#ff9900]/20 flex-shrink-0">
										<Icon className="h-4 w-4 text-[#ff9900]" />
									</div>
									<div>
										<p className="text-white text-sm font-medium">{label}</p>
										<p className="text-white/40 text-xs">{value}</p>
									</div>
								</div>
							))}
						</div>
					</div>

					{/* Right — form */}
					<div className="bg-[#0d0d0d] border-t border-white/10 md:border-t-0 md:border-l border-white/10 p-6 flex items-center">
						<form className="flex w-full flex-col gap-4">

							{[{ id: 'name', label: 'Name', type: 'text' }, { id: 'email', label: 'Email', type: 'email' }, { id: 'phone', label: 'Phone', type: 'tel' }].map(({ id, label, type }) => (
								<div key={id} className="flex flex-col gap-1.5">
									<label htmlFor={id} className="text-white/50 text-xs font-medium uppercase tracking-widest">
										{label}
									</label>
									<input
										id={id}
										name={id}
										type={type}
										className="bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-white/20 outline-none focus:border-[#ff9900]/50 focus:ring-1 focus:ring-[#ff9900]/30 w-full transition-colors"
									/>
								</div>
							))}

							<div className="flex flex-col gap-1.5">
								<label htmlFor="message" className="text-white/50 text-xs font-medium uppercase tracking-widest">
									Message
								</label>
								<textarea
									id="message"
									name="message"
									rows={4}
									className="bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white placeholder-white/20 outline-none focus:border-[#ff9900]/50 focus:ring-1 focus:ring-[#ff9900]/30 w-full resize-none transition-colors"
								/>
							</div>

							<button
								type="submit"
								className="w-full rounded-lg bg-[#ff9900] hover:bg-[#e68900] active:scale-95 px-4 py-2.5 text-sm font-semibold text-black transition-all"
							>
								Envoyer →
							</button>
						</form>
					</div>

				</div>
			</div>
		</main>
	);
}
