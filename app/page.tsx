import Link from 'next/link';
import Image from 'next/image';

export default function Home() {
  return (
    <main className="min-h-screen flex items-center justify-center bg-black">
      <div className="text-center space-y-4">
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
        <p className="text-white/60">A space for testing things</p>
        <Link
          href="/login"
          className="inline-block mt-4 px-6 py-2 bg-[#ff9900] text-black rounded-lg font-medium hover:bg-[#ff9900]/90 transition-colors"
        >
          Go to Login →
        </Link>
      </div>
    </main>
  );
}
