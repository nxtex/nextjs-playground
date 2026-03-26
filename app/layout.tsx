import type { Metadata } from 'next';
import { Geist, Geist_Mono } from 'next/font/google';
import './globals.css';
import { ThemeToggle } from '@/components/ThemeToggle';

const geistSans = Geist({
  variable: '--font-geist-sans',
  subsets: ['latin'],
  display: 'swap',
});

const geistMono = Geist_Mono({
  variable: '--font-geist-mono',
  subsets: ['latin'],
  display: 'swap',
});

export const metadata: Metadata = {
  title: {
    default: 'Nextjs Playground',
    template: '%s | Nextjs Playground',
  },
  description: 'Un espace pour tester des choses',
  robots: {
    index: false,
    follow: false,
  },
};

export default function RootLayout({
  children,
}: Readonly<{ children: React.ReactNode }>) {
  return (
    <html lang="fr" suppressHydrationWarning>
      <body
        className={`${geistSans.variable} ${geistMono.variable} antialiased`}
        suppressHydrationWarning
      >
        {/* Toggle flottant en haut à droite sur toutes les pages */}
        <div className="fixed top-4 right-4 z-[9999]">
          <ThemeToggle />
        </div>
        {children}
      </body>
    </html>
  );
}
