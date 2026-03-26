import { ContactCard } from '@/components/ui/contact-card';
import { Mail, Phone, MapPin } from 'lucide-react';

const contactInfo = [
	{
		icon: Mail,
		label: 'Email',
		value: 'contact@21st.dev',
	},
	{
		icon: Phone,
		label: 'Phone',
		value: '+92 312 1234567',
	},
	{
		icon: MapPin,
		label: 'Address',
		value: 'Faisalabad, Pakistan',
	},
];

export default function ContactPage() {
	return (
		<main className="flex min-h-screen items-center justify-center bg-background px-6 py-16">
			<div className="w-full max-w-5xl">
				<ContactCard
					title="Get in touch"
					description="If you have any questions regarding our Services or need help, please fill out the form here. We do our best to respond within 1 business day."
					contactInfo={contactInfo}
				>
					<form className="flex w-full flex-col gap-4">
						<div className="flex flex-col gap-1.5">
							<label
								htmlFor="name"
								className="text-sm font-medium"
							>
								Name
							</label>
							<input
								id="name"
								name="name"
								type="text"
								className="bg-background border border-border rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-ring w-full"
							/>
						</div>

						<div className="flex flex-col gap-1.5">
							<label
								htmlFor="email"
								className="text-sm font-medium"
							>
								Email
							</label>
							<input
								id="email"
								name="email"
								type="email"
								className="bg-background border border-border rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-ring w-full"
							/>
						</div>

						<div className="flex flex-col gap-1.5">
							<label
								htmlFor="phone"
								className="text-sm font-medium"
							>
								Phone
							</label>
							<input
								id="phone"
								name="phone"
								type="tel"
								className="bg-background border border-border rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-ring w-full"
							/>
						</div>

						<div className="flex flex-col gap-1.5">
							<label
								htmlFor="message"
								className="text-sm font-medium"
							>
								Message
							</label>
							<textarea
								id="message"
								name="message"
								rows={5}
								className="bg-background border border-border rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-ring w-full resize-none"
							/>
						</div>

						<button
							type="submit"
							className="w-full rounded-lg bg-foreground px-4 py-2.5 text-sm font-medium text-background transition-opacity hover:opacity-80"
						>
							Submit
						</button>
					</form>
				</ContactCard>
			</div>
		</main>
	);
}
