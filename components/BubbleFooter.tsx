'use client';

import { useMemo } from 'react';

const BUBBLE_COUNT = 128;

const SECTIONS = [
  {
    title: 'Produits',
    links: ['Carte de crédit', 'Compte épargne', 'Assurance vie', 'Prêt immobilier', 'Investissement'],
  },
  {
    title: 'Services',
    links: ['Virement', 'Paiement en ligne', 'Mobile banking', 'Support client'],
  },
  {
    title: 'Ressources',
    links: ['Documentation', 'API', 'Statut', 'Changelog', 'Blog', 'FAQ'],
  },
  {
    title: 'Entreprise',
    links: ['À propos', 'Carrières', 'Presse', 'Partenaires'],
  },
];

type Bubble = {
  size: string;
  distance: string;
  position: string;
  time: string;
  delay: string;
};

export default function BubbleFooter() {
  const bubbles = useMemo<Bubble[]>(() => {
    return Array.from({ length: BUBBLE_COUNT }, () => ({
      size:     `${2 + Math.random() * 4}rem`,
      distance: `${6 + Math.random() * 4}rem`,
      position: `${-5 + Math.random() * 110}%`,
      time:     `${2 + Math.random() * 2}s`,
      delay:    `${-1 * (2 + Math.random() * 2)}s`,
    }));
  }, []);

  return (
    <>
      {/* SVG blob filter — hors du flux, position fixed */}
      <svg style={{ position: 'fixed', top: '100vh' }} aria-hidden>
        <defs>
          <filter id="blob">
            <feGaussianBlur in="SourceGraphic" stdDeviation={10} result="blur" />
            <feColorMatrix
              in="blur"
              mode="matrix"
              values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
              result="blob"
            />
          </filter>
        </defs>
      </svg>

      <style>{`
        @keyframes bubble-size {
          0%, 75% { width: var(--size, 4rem); height: var(--size, 4rem); }
          100%     { width: 0rem; height: 0rem; }
        }
        @keyframes bubble-move {
          0%   { bottom: -4rem; }
          100% { bottom: var(--distance, 10rem); }
        }
        .bubble-footer-bubbles {
          position: absolute;
          top: 0; left: 0; right: 0;
          height: 1rem;
          background: var(--footer-bg);
          filter: url("#blob");
        }
        .bubble-footer-bubble {
          position: absolute;
          left: var(--position, 50%);
          background: var(--footer-bg);
          border-radius: 100%;
          width: var(--size, 4rem);
          height: var(--size, 4rem);
          transform: translate(-50%, 100%);
          animation:
            bubble-size var(--time, 4s) ease-in infinite var(--delay, 0s),
            bubble-move var(--time, 4s) ease-in infinite var(--delay, 0s);
        }
      `}</style>

      <footer
        style={{
          ['--footer-bg' as string]: '#ff9900',
          position: 'relative',
          minHeight: '12rem',
          display: 'grid',
          zIndex: 1,
          marginTop: '10rem',
        }}
      >
        {/* Bubbles row */}
        <div className="bubble-footer-bubbles">
          {bubbles.map((b, i) => (
            <div
              key={i}
              className="bubble-footer-bubble"
              style={{
                ['--size' as string]:     b.size,
                ['--distance' as string]: b.distance,
                ['--position' as string]: b.position,
                ['--time' as string]:     b.time,
                ['--delay' as string]:    b.delay,
              }}
            />
          ))}
        </div>

        {/* Content */}
        <div
          style={{
            position: 'relative',
            zIndex: 2,
            background: '#ff9900',
            display: 'grid',
            gridTemplateColumns: '1fr auto',
            gap: '4rem',
            padding: '2rem',
          }}
        >
          {/* Links grid */}
          <div style={{ display: 'flex', flexDirection: 'column', justifyContent: 'center', gap: '0.25rem' }}>
            {SECTIONS.map((section) => (
              <div key={section.title} style={{ display: 'flex', flexWrap: 'wrap', alignItems: 'center', gap: '0.25rem 0.5rem', margin: '0.25rem 0' }}>
                <b style={{ color: 'white', marginRight: '0.25rem' }}>{section.title}</b>
                {section.links.map((link) => (
                  <a
                    key={link}
                    href="#"
                    style={{ color: '#F5F7FA', textDecoration: 'none', fontSize: '0.875rem' }}
                  >
                    {link}
                  </a>
                ))}
              </div>
            ))}
          </div>

          {/* Logo + copyright */}
          <div style={{ display: 'flex', flexDirection: 'column', justifyContent: 'center', alignItems: 'center', gap: '0.5rem' }}>
            <a
              href="#"
              style={{
                width: '4rem',
                height: '4rem',
                borderRadius: '50%',
                background: 'rgba(255,255,255,0.2)',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                fontSize: '1.5rem',
              }}
            >
              💳
            </a>
            <p style={{ color: '#F5F7FA', margin: 0, fontSize: '0.75rem', textAlign: 'center' }}>©2025 NxPay</p>
          </div>
        </div>
      </footer>
    </>
  );
}
