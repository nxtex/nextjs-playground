'use client';
import Image from 'next/image';
import { FlowerMenu } from '@/components/ui/flower-menu';
import {
  LogIn,
  UserPlus,
  CreditCard,
  Mail,
} from 'lucide-react';

const menuItems = [
  { icon: LogIn,      href: '/login',   label: 'Se connecter' },
  { icon: UserPlus,   href: '/signup',  label: "S'inscrire" },
  { icon: CreditCard, href: '/payment', label: 'Paiement' },
  { icon: Mail,       href: '/contact', label: 'Contact' },
];

export default function Home() {
  return (
    <main className="relative min-h-screen flex flex-col items-center justify-center bg-black overflow-hidden gap-10">
      <div className="relative z-10 text-center space-y-3 px-4">
        <div className="flex justify-center">
          <Image
            src="/logo.png"
            alt="Logo"
            width={220}
            height={80}
            priority
            className="object-contain"
          />
        </div>
        <p className="text-white/60 text-sm">Un espace pour tester des choses</p>
      </div>

      <FlowerMenu
        menuItems={menuItems}
        togglerSize={48}
        backgroundColor="rgba(255,153,0,0.25)"
        iconColor="white"
        animationDuration={400}
      />

      <p className="text-white/20 text-xs tracking-widest uppercase">
        Ouvre le menu pour naviguer
      </p>
    </main>
  );
}
