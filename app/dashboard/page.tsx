import {
  Package,
  Headphones,
  Truck,
  FileText,
  ArrowRight,
  CheckCircle,
} from 'lucide-react';
import Link from 'next/link';

const cards = [
  {
    title: 'Commandes',
    desc: 'Voir et suivre vos commandes',
    icon: Package,
    href: 'https://www.monbedo.com/mon-compte/orders/#account-content',
    external: true,
  },
  {
    title: 'Contact',
    desc: 'Contacter notre support',
    icon: Headphones,
    href: '/contact',
    external: false,
  },
  {
    title: 'Adresses',
    desc: 'G\u00e9rer vos adresses de livraison',
    icon: Truck,
    href: 'https://www.monbedo.com/mon-compte/edit-address/#account-content',
    external: true,
  },
  {
    title: 'Mes infos',
    desc: 'Voir vos factures et infos compte',
    icon: FileText,
    href: 'https://www.monbedo.com/mon-compte/edit-account/#account-content',
    external: true,
  },
];

export default function Dashboard() {
  return (
    <div className="min-h-screen page-bg page-fg">

      {/* HEADER */}
      <header className="flex items-center justify-between px-6 md:px-8 py-5 page-bg-sec page-border border-b">
        <h1 className="text-lg font-semibold tracking-wide page-fg">MON ESPACE</h1>
        <div className="flex items-center gap-3">
          <div
            className="w-9 h-9 rounded-full flex items-center justify-center font-semibold text-sm text-black"
            style={{ background: 'var(--accent)' }}
          >
            1U
          </div>
          <span className="text-sm font-medium page-fg">1urxf</span>
          <button className="page-border border px-4 py-2 rounded-lg text-sm page-fg hover:opacity-70 transition">
            D&eacute;connexion
          </button>
        </div>
      </header>

      <div className="max-w-6xl mx-auto px-4 md:px-6 py-8">

        {/* HERO */}
        <div className="rounded-2xl p-6 mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4"
          style={{ background: 'linear-gradient(135deg, #111 0%, #2b2b2b 100%)' }}
        >
          <div>
            <h2 className="text-xl font-semibold mb-1 text-white">Bonjour, 1urxf \uD83D\uDC4B</h2>
            <p className="text-sm" style={{ color: 'rgba(255,255,255,0.6)' }}>
              G&eacute;rez vos commandes et informations facilement.
            </p>
          </div>
          <div className="bg-white text-black px-4 py-2 rounded-xl flex items-center gap-2 text-sm flex-shrink-0">
            <CheckCircle className="text-green-500" size={18} />
            Compte connect&eacute;
          </div>
        </div>

        {/* CARDS */}
        <h3 className="font-semibold mb-4 page-fg">
          Acc&egrave;s rapide
        </h3>
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5 mb-10">
          {cards.map((card) => {
            const Icon = card.icon;
            const inner = (
              <>
                <div className="w-10 h-10 rounded-lg page-card flex items-center justify-center mb-4">
                  <Icon size={20} className="page-fg-muted" />
                </div>
                <h4 className="font-semibold mb-1 page-fg">{card.title}</h4>
                <p className="text-sm page-fg-muted mb-4">{card.desc}</p>
                <div className="flex items-center text-sm font-medium" style={{ color: 'var(--accent)' }}>
                  Acc&eacute;der
                  <ArrowRight size={16} className="ml-1" />
                </div>
              </>
            );

            return card.external ? (
              <a
                key={card.title}
                href={card.href}
                target="_blank"
                rel="noopener noreferrer"
                className="page-bg-sec page-border border p-5 rounded-2xl hover:shadow-lg hover:-translate-y-1 transition cursor-pointer block"
              >
                {inner}
              </a>
            ) : (
              <Link
                key={card.title}
                href={card.href}
                className="page-bg-sec page-border border p-5 rounded-2xl hover:shadow-lg hover:-translate-y-1 transition cursor-pointer block"
              >
                {inner}
              </Link>
            );
          })}
        </div>

        {/* TABLE */}
        <div className="page-bg-sec page-border border rounded-2xl p-6 mb-8">
          <div className="flex justify-between mb-4">
            <h3 className="font-semibold page-fg">Activit&eacute; r&eacute;cente</h3>
            <button className="text-sm hover:underline" style={{ color: 'var(--accent)' }}>
              Voir tout
            </button>
          </div>
          <div className="overflow-x-auto">
            <table className="w-full text-sm">
              <thead>
                <tr className="page-fg-muted text-left">
                  <th className="py-2 font-medium">Commande</th>
                  <th className="py-2 font-medium">Date</th>
                  <th className="py-2 font-medium">Statut</th>
                  <th className="py-2 font-medium">Montant</th>
                </tr>
              </thead>
              <tbody>
                {[
                  { id: '#CMD-2024-0487', date: '24 Avril', status: 'Livr\u00e9e',    statusClass: 'bg-green-100 text-green-700',  amount: '89,90\u00a0\u20ac' },
                  { id: '#CMD-2024-0486', date: '22 Avril', status: 'En transit', statusClass: 'bg-blue-100 text-blue-700',    amount: '129,00\u00a0\u20ac' },
                  { id: '#CMD-2024-0485', date: '18 Avril', status: 'Confirm\u00e9e', statusClass: 'bg-orange-100 text-orange-700', amount: '59,90\u00a0\u20ac' },
                ].map((row) => (
                  <tr key={row.id} className="page-border border-t">
                    <td className="py-3 page-fg font-mono text-xs">{row.id}</td>
                    <td className="py-3 page-fg">{row.date}</td>
                    <td className="py-3">
                      <span className={`${row.statusClass} px-2 py-1 rounded-full text-xs font-medium`}>
                        {row.status}
                      </span>
                    </td>
                    <td className="py-3 page-fg font-medium">{row.amount}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>

        {/* SUPPORT */}
        <div className="page-bg-sec page-border border rounded-2xl p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
          <div>
            <h4 className="font-semibold mb-1 page-fg">Besoin d&apos;aide&nbsp;?</h4>
            <p className="text-sm page-fg-muted">
              Notre &eacute;quipe est l&agrave; pour vous accompagner.
            </p>
          </div>
          <Link
            href="/contact"
            className="text-black px-5 py-2 rounded-xl hover:opacity-90 transition flex-shrink-0 text-sm font-semibold"
            style={{ background: 'var(--accent)' }}
          >
            Nous contacter
          </Link>
        </div>

      </div>
    </div>
  );
}
