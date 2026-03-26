'use client';
import Image from 'next/image';
import { FlowerMenu } from '@/components/ui/flower-menu';
import { LogIn, UserPlus, CreditCard, Mail } from 'lucide-react';

const menuItems = [
  { icon: LogIn,      href: '/login',   label: 'Se connecter' },
  { icon: UserPlus,   href: '/signup',  label: "S'inscrire" },
  { icon: CreditCard, href: '/payment', label: 'Paiement' },
  { icon: Mail,       href: '/contact', label: 'Contact' },
];

export default function Home() {
  return (
    <main className="relative min-h-screen flex flex-col items-center justify-center page-bg overflow-hidden gap-8">
      <div className="relative z-10 text-center space-y-3 px-4">
        <div className="flex justify-center">
          <Image src="/logo.png" alt="Logo" width={220} height={80} priority className="object-contain" />
        </div>
        <p className="page-fg-muted text-sm">Un espace pour tester des choses</p>
        <p className="text-xs tracking-widest uppercase mt-2" style={{ color: 'var(--fg-muted)' }}>
          Glisse le menu · ouvre pour naviguer
        </p>
      </div>
      <FlowerMenu
        menuItems={menuItems}
        togglerSize={48}
        backgroundColor="var(--card)"
        iconColor="var(--fg)"
        animationDuration={400}
      />
    </main>
  );
}
