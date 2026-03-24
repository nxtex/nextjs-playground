import Link from 'next/link';

export default function Home() {
  return (
    <main className="min-h-screen flex items-center justify-center bg-black">
      <div className="text-center space-y-4">
        <h1 className="text-4xl font-bold text-white">Next.js Playground</h1>
        <p className="text-white/60">A space for testing things</p>
        <Link
          href="/login"
          className="inline-block mt-4 px-6 py-2 bg-white text-black rounded-lg font-medium hover:bg-white/90 transition-colors"
        >
          Go to Login →
        </Link>
      </div>
    </main>
  );
}
