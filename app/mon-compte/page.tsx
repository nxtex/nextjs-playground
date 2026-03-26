'use client';
import { useState } from 'react';
import Link from 'next/link';
import { Mail, Lock, Eye, EyeClosed, Calendar, Star } from 'lucide-react';
import { motion, AnimatePresence } from 'framer-motion';
import { Input } from '@/components/ui/Input';
import { Starfield } from '@/components/Starfield';

type Tab = 'login' | 'register';

export default function MonComptePage() {
  const [tab, setTab] = useState<Tab>('login');
  const [showPassword, setShowPassword] = useState(false);
  const [rememberMe, setRememberMe] = useState(false);

  return (
    <div
      className="min-h-screen w-screen relative overflow-hidden flex items-center justify-center px-4"
      style={{ backgroundColor: '#0a0a0a' }}
    >
      <Starfield starColor="rgba(255,153,0,0.8)" bgColor="rgba(10,10,10,1)" speed={0.6} quantity={350} mouseAdjust opacity={1} />

      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.6 }}
        className="w-full max-w-sm relative z-10"
      >
        {/* Tabs */}
        <div style={{ display: 'flex', borderRadius: '12px 12px 0 0', overflow: 'hidden', border: '1px solid rgba(255,255,255,0.06)', borderBottom: 'none' }}>
          {(['login', 'register'] as Tab[]).map((t) => (
            <button
              key={t}
              onClick={() => setTab(t)}
              style={{
                flex: 1,
                padding: '0.85rem 1rem',
                fontSize: '0.82rem',
                fontWeight: 600,
                cursor: 'pointer',
                border: 'none',
                outline: 'none',
                letterSpacing: '0.03em',
                transition: 'background 0.2s, color 0.2s',
                background: tab === t ? 'rgba(255,255,255,0.06)' : 'rgba(255,255,255,0.02)',
                color: tab === t ? 'white' : 'rgba(255,255,255,0.4)',
                borderBottom: tab === t ? '2px solid #ff9900' : '2px solid transparent',
              }}
            >
              {t === 'login' ? 'Se connecter' : "S'inscrire"}
            </button>
          ))}
        </div>

        {/* Glass box */}
        <div style={{
          background: 'rgba(255,255,255,0.03)',
          backdropFilter: 'blur(12px) saturate(20%)',
          WebkitBackdropFilter: 'blur(12px) saturate(20%)',
          border: '1px solid rgba(255,255,255,0.06)',
          borderRadius: '0 0 16px 16px',
          boxShadow: '0 8px 32px rgba(0,0,0,0.6), inset 0 1px 0 rgba(255,255,255,0.04)',
          padding: '1.75rem',
        }}>
          <AnimatePresence mode="wait">
            {tab === 'login' ? (
              <motion.div key="login" initial={{ opacity: 0, x: -10 }} animate={{ opacity: 1, x: 0 }} exit={{ opacity: 0, x: 10 }} transition={{ duration: 0.2 }}>
                <LoginForm showPassword={showPassword} setShowPassword={setShowPassword} rememberMe={rememberMe} setRememberMe={setRememberMe} onSwitchTab={() => setTab('register')} />
              </motion.div>
            ) : (
              <motion.div key="register" initial={{ opacity: 0, x: 10 }} animate={{ opacity: 1, x: 0 }} exit={{ opacity: 0, x: -10 }} transition={{ duration: 0.2 }}>
                <RegisterForm onSwitchTab={() => setTab('login')} />
              </motion.div>
            )}
          </AnimatePresence>
        </div>
      </motion.div>
    </div>
  );
}

function LoginForm({ showPassword, setShowPassword, rememberMe, setRememberMe, onSwitchTab }: {
  showPassword: boolean;
  setShowPassword: (v: boolean) => void;
  rememberMe: boolean;
  setRememberMe: (v: boolean) => void;
  onSwitchTab: () => void;
}) {
  return (
    <form className="space-y-4">
      <Field label="Identifiant ou e-mail" icon={<Mail className="w-4 h-4" />}>
        <Input type="email" placeholder="votre@email.com" autoComplete="email" required className="bg-white/5 border-transparent focus:border-white/20 h-10 pl-10 focus:bg-white/10" />
      </Field>
      <Field label="Mot de passe" icon={<Lock className="w-4 h-4" />}>
        <Input
          type={showPassword ? 'text' : 'password'}
          placeholder="••••••••"
          autoComplete="current-password"
          required
          className="bg-white/5 border-transparent focus:border-white/20 h-10 pl-10 pr-10 focus:bg-white/10"
        />
        <button type="button" onClick={() => setShowPassword(!showPassword)} className="absolute right-3 text-white/40 hover:text-white transition-colors">
          {showPassword ? <Eye className="w-4 h-4" /> : <EyeClosed className="w-4 h-4" />}
        </button>
      </Field>

      <div className="flex items-center justify-between">
        <label className="flex items-center gap-2 cursor-pointer">
          <input type="checkbox" checked={rememberMe} onChange={() => setRememberMe(!rememberMe)} className="accent-[#ff9900] w-3.5 h-3.5" />
          <span className="text-xs text-white/50">Se souvenir de moi</span>
        </label>
        <Link href="/forgot-password" className="text-xs text-white/40 hover:text-white/80 transition-colors">Mot de passe oublié ?</Link>
      </div>

      <SubmitButton>Se connecter</SubmitButton>

      <p className="text-center text-xs text-white/40 pt-1">
        Pas encore de compte ?{' '}
        <button type="button" onClick={onSwitchTab} className="text-white hover:text-white/70 font-medium underline underline-offset-2 transition-colors">S&apos;inscrire</button>
      </p>
    </form>
  );
}

function RegisterForm({ onSwitchTab }: { onSwitchTab: () => void }) {
  const [showPassword, setShowPassword] = useState(false);

  // max date = today - 10 years
  const maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() - 10);
  const maxDateStr = maxDate.toISOString().split('T')[0];

  return (
    <form className="space-y-4">

      {/* Points banner */}
      <div style={{
        display: 'flex',
        alignItems: 'center',
        gap: '0.6rem',
        background: 'rgba(255,153,0,0.08)',
        border: '1px solid rgba(255,153,0,0.2)',
        borderRadius: '8px',
        padding: '0.6rem 0.875rem',
      }}>
        <Star className="w-4 h-4 flex-shrink-0" style={{ color: '#ff9900' }} />
        <span style={{ color: '#ff9900', fontSize: '0.78rem', fontWeight: 600, lineHeight: 1.4 }}>
          Inscrivez-vous et gagnez 50 points !
        </span>
      </div>

      <Field label="Adresse e-mail" icon={<Mail className="w-4 h-4" />}>
        <Input type="email" placeholder="votre@email.com" autoComplete="email" required className="bg-white/5 border-transparent focus:border-white/20 h-10 pl-10 focus:bg-white/10" />
      </Field>

      <Field label="Mot de passe" icon={<Lock className="w-4 h-4" />}>
        <Input
          type={showPassword ? 'text' : 'password'}
          placeholder="••••••••"
          autoComplete="new-password"
          required
          className="bg-white/5 border-transparent focus:border-white/20 h-10 pl-10 pr-10 focus:bg-white/10"
        />
        <button type="button" onClick={() => setShowPassword(!showPassword)} className="absolute right-3 text-white/40 hover:text-white transition-colors">
          {showPassword ? <Eye className="w-4 h-4" /> : <EyeClosed className="w-4 h-4" />}
        </button>
      </Field>

      {/* Date de naissance */}
      <div className="space-y-1">
        <label className="block text-[0.7rem] font-medium uppercase tracking-widest text-white/45">
          Date de naissance
          <span className="ml-1.5 normal-case tracking-normal text-white/30 text-[0.65rem] font-normal">(facultatif)</span>
        </label>
        <div className="relative flex items-center">
          <span className="absolute left-3 text-white/40"><Calendar className="w-4 h-4" /></span>
          <input
            type="date"
            name="billing_birthday"
            max={maxDateStr}
            className="w-full h-10 pl-10 pr-3 rounded-lg text-sm text-white bg-white/5 border border-transparent focus:border-white/20 focus:bg-white/10 outline-none transition-all"
            style={{ colorScheme: 'dark' }}
          />
        </div>
      </div>

      <SubmitButton>S&apos;inscrire</SubmitButton>

      {/* Privacy notice */}
      <p className="text-[0.72rem] leading-relaxed text-white/35 pt-1">
        Vos données personnelles seront utilisées pour vous accompagner au cours de votre visite du site web, gérer l’accès à votre compte, et pour d’autres raisons décrites dans notre{' '}
        <a
          href="https://www.monbedo.com/politique-confidentialite/"
          target="_blank"
          rel="noopener noreferrer"
          className="text-[#ff9900]/70 underline underline-offset-2 hover:text-[#ff9900] transition-colors"
        >
          Politique de confidentialité
        </a>.
      </p>

      <p className="text-center text-xs text-white/40">
        Déjà un compte ?{' '}
        <button type="button" onClick={onSwitchTab} className="text-white hover:text-white/70 font-medium underline underline-offset-2 transition-colors">Se connecter</button>
      </p>
    </form>
  );
}

function Field({ label, icon, children }: { label: string; icon: React.ReactNode; children: React.ReactNode }) {
  return (
    <div className="space-y-1">
      <label className="block text-[0.7rem] font-medium uppercase tracking-widest text-white/45">{label}</label>
      <div className="relative flex items-center">
        <span className="absolute left-3 text-white/40">{icon}</span>
        {children}
      </div>
    </div>
  );
}

function SubmitButton({ children }: { children: React.ReactNode }) {
  return (
    <button
      type="submit"
      className="w-full h-10 rounded-lg font-semibold text-sm text-black cursor-pointer transition-all hover:scale-[1.01] active:scale-[0.98]"
      style={{ background: '#ff9900' }}
    >
      {children}
    </button>
  );
}
