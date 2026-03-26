'use client';
import { useEffect, useState } from 'react';
import './ThemeToggle.css';

export function ThemeToggle() {
  const [isDark, setIsDark] = useState(true);

  useEffect(() => {
    const saved = localStorage.getItem('theme');
    const dark = saved ? saved === 'dark' : true; // dark par défaut
    setIsDark(dark);
    document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
  }, []);

  const toggle = () => {
    const next = !isDark;
    setIsDark(next);
    localStorage.setItem('theme', next ? 'dark' : 'light');
    document.documentElement.setAttribute('data-theme', next ? 'dark' : 'light');
  };

  return (
    <div
      id="switch"
      className={isDark ? 'off' : ''}
      onClick={toggle}
      style={{ cursor: 'pointer' }}
    >
      <div id="contentwrapper">
        <div id="circle"></div>
        <div id="stars">
          <div className="star"></div>
          <div className="star"></div>
          <div className="star"></div>
          <div id="shtngstarwrapper">
            <div id="shootingstar"></div>
          </div>
        </div>
        <div>
          <div className="cloud">
            <div className="cloudpart"></div>
            <div className="cloudpart"></div>
          </div>
          <div className="cloud">
            <div className="cloudpart"></div>
            <div className="cloudpart"></div>
          </div>
          <div className="cloud">
            <div className="cloudpart"></div>
            <div className="cloudpart"></div>
            <div className="cloudpart"></div>
          </div>
        </div>
      </div>
    </div>
  );
}
