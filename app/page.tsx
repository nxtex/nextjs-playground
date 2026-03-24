import Link from 'next/link';
import Image from 'next/image';
import { Starfield } from '@/components/Starfield';

export default function Home() {
  return (
    <main className="relative min-h-screen flex items-center justify-center bg-black overflow-hidden">
      <Starfield
        starColor="rgba(255,200,100,1)"
        bgColor="rgba(0,0,0,1)"
        speed={1.5}
        quantity={512}
        mouseAdjust
      />

      <div className="relative z-10 text-center space-y-4 px-4">
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
        <p className="text-white/60">Un espace pour tester des choses</p>
        <Link
          href="/login"
          className="inline-block mt-4 px-6 py-2 bg-[#ff9900] text-black rounded-lg font-medium hover:bg-[#ff9900]/90 transition-colors"
        >
          Se connecter →
        </Link>
      </div>
    </main>
  );
}
