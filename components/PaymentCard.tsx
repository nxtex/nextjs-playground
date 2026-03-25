'use client';

import { useState } from 'react';

type CardType = 'amex' | 'visa' | 'mastercard' | 'discover' | 'unknown';

const COLORS: Record<CardType, { light: string; dark: string }> = {
  amex:       { light: '#66bb6a', dark: '#388e3c' },
  visa:       { light: '#d4e157', dark: '#afb42b' },
  mastercard: { light: '#03A9F4', dark: '#0288D1' },
  discover:   { light: '#ab47bc', dark: '#7b1fa2' },
  unknown:    { light: '#bdbdbd', dark: '#616161' },
};

const TEST_CARDS = [
  '4000056655665556',
  '5200828282828210',
  '371449635398431',
  '6011000990139424',
];

function detectCardType(num: string): CardType {
  const n = num.replace(/\s/g, '');
  if (/^3[47]/.test(n))           return 'amex';
  if (/^4/.test(n))               return 'visa';
  if (/^5[1-5]|^2[2-7]/.test(n)) return 'mastercard';
  if (/^6011|^65/.test(n))        return 'discover';
  return 'unknown';
}

function formatCardNumber(val: string, type: CardType): string {
  const digits = val.replace(/\D/g, '');
  if (type === 'amex') {
    const p1 = digits.slice(0, 4);
    const p2 = digits.slice(4, 10);
    const p3 = digits.slice(10, 15);
    return [p1, p2, p3].filter(Boolean).join(' ');
  }
  const chunks = digits.match(/.{1,4}/g) || [];
  return chunks.join(' ');
}

function formatExpiry(val: string): string {
  const digits = val.replace(/\D/g, '').slice(0, 4);
  if (digits.length <= 2) return digits;
  return digits.slice(0, 2) + '/' + digits.slice(2);
}

export default function PaymentCard() {
  const [name, setName]           = useState('');
  const [cardNumber, setCardNumber] = useState('');
  const [expiry, setExpiry]       = useState('');
  const [cvv, setCvv]             = useState('');
  const [flipped, setFlipped]     = useState(false);

  const cardType = detectCardType(cardNumber);
  const color    = COLORS[cardType];
  const displayNumber = cardNumber || '0123 4567 8910 1112';
  const displayName   = name.toUpperCase() || 'JOHN DOE';
  const displayExpiry = expiry || '01/23';
  const displayCvv    = cvv || '985';

  function handleCardNumber(e: React.ChangeEvent<HTMLInputElement>) {
    const formatted = formatCardNumber(e.target.value, cardType);
    const max = cardType === 'amex' ? 17 : 19;
    if (formatted.length <= max) setCardNumber(formatted);
  }

  function handleExpiry(e: React.ChangeEvent<HTMLInputElement>) {
    setExpiry(formatExpiry(e.target.value));
  }

  function handleCvv(e: React.ChangeEvent<HTMLInputElement>) {
    const digits = e.target.value.replace(/\D/g, '').slice(0, 4);
    setCvv(digits);
  }

  function generateRandom() {
    const raw = TEST_CARDS[Math.floor(Math.random() * TEST_CARDS.length)];
    const type = detectCardType(raw);
    setCardNumber(formatCardNumber(raw, type));
  }

  return (
    <main className="min-h-screen bg-[#f9f9f9] flex flex-col items-center justify-center py-10 px-4" style={{ fontFamily: 'Raleway, sans-serif' }}>

      {/* Title */}
      <h1 className="text-2xl font-semibold text-[#333] mb-6">Payment Information</h1>

      {/* Card visual */}
      <div className="w-full max-w-[400px] px-5" style={{ perspective: '1000px', height: '220px' }}>
        <div
          onClick={() => setFlipped(f => !f)}
          className="relative w-full cursor-pointer"
          style={{
            transformStyle: 'preserve-3d',
            transition: 'transform 0.6s',
            transform: flipped ? 'rotateY(180deg)' : 'rotateY(0deg)',
            height: '220px',
          }}
        >
          {/* FRONT */}
          <div className="absolute inset-0" style={{ backfaceVisibility: 'hidden' }}>
            <svg viewBox="0 0 750 471" xmlns="http://www.w3.org/2000/svg"
              style={{ width: '100%', borderRadius: '22px', boxShadow: '1px 5px 6px 0px black' }}>
              <rect width="750" height="471" rx="40" fill={color.light} />
              <path fill={color.dark} d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z"/>
              {/* Chip */}
              <rect x="65" y="56" width="105" height="88" rx="10" fill="white" opacity="0.9"/>
              <rect x="65" y="70" width="1.5" height="60" fill="#4C4C4C"/>
              <rect x="168.5" y="70" width="1.5" height="60" fill="#4C4C4C"/>
              <rect x="83" y="82" width="26" height="1.5" fill="#4C4C4C"/>
              <rect x="83" y="118" width="26" height="1.5" fill="#4C4C4C"/>
              <rect x="143" y="82" width="26" height="1.5" fill="#4C4C4C"/>
              <rect x="143" y="118" width="26" height="1.5" fill="#4C4C4C"/>
              {/* Labels */}
              <text x="65" y="242" fill="white" fillOpacity="0.6" fontSize="24" fontFamily="'Source Code Pro', monospace">card number</text>
              <text x="65" y="295" fill="white" fontSize="48" fontFamily="'Source Code Pro', monospace" fontWeight="600" letterSpacing="2">{displayNumber}</text>
              <text x="54" y="390" fill="white" fillOpacity="0.6" fontSize="22" fontFamily="'Source Code Pro', monospace">cardholder name</text>
              <text x="54" y="428" fill="white" fontSize="32" fontFamily="'Source Code Pro', monospace" fontWeight="400">{displayName}</text>
              <text x="480" y="389" fill="white" fillOpacity="0.6" fontSize="22" fontFamily="'Source Code Pro', monospace">expiration</text>
              <text x="480" y="417" fill="white" fontSize="15" fontFamily="'Source Code Pro', monospace" fontWeight="300">VALID</text>
              <text x="480" y="436" fill="white" fontSize="15" fontFamily="'Source Code Pro', monospace" fontWeight="300">THRU</text>
              <polygon fill="white" points="554.5,421 540.4,414.2 540.4,427.9"/>
              <text x="574" y="434" fill="white" fontSize="36" fontFamily="'Source Code Pro', monospace" fontWeight="400">{displayExpiry}</text>
            </svg>
          </div>

          {/* BACK */}
          <div className="absolute inset-0" style={{ backfaceVisibility: 'hidden', transform: 'rotateY(180deg)' }}>
            <svg viewBox="0 0 750 471" xmlns="http://www.w3.org/2000/svg"
              style={{ width: '100%', borderRadius: '22px', boxShadow: '1px 5px 6px 0px black' }}>
              <rect width="750" height="471" rx="40" fill={color.dark} />
              {/* Magnetic strip */}
              <rect y="61.6" width="750" height="78" fill="#111"/>
              {/* Signature strip */}
              <rect x="42.9" y="184.6" width="664" height="64.5" rx="4" fill="#F2F2F2"/>
              <rect x="42.9" y="198.6" width="664" height="10.5" fill="#D8D2DB"/>
              <rect x="42.9" y="224.5" width="664" height="10.5" fill="#D8D2DB"/>
              {/* CVV box */}
              <rect x="608" y="184.6" width="99" height="64.5" rx="4" fill="#C4C4C4"/>
              <text x="622" y="227" fill="#333" fontSize="27" fontFamily="'Source Code Pro', monospace" fontWeight="400">{displayCvv}</text>
              <text x="518" y="280" fill="white" fillOpacity="0.6" fontSize="22" fontFamily="'Source Code Pro', monospace">security code</text>
              {/* Name on back */}
              <text x="59" y="229" fill="#555" fontSize="34" fontFamily="'Rock Salt', cursive">{name || 'John Doe'}</text>
            </svg>
          </div>
        </div>
      </div>

      {/* Form */}
      <div className="w-full max-w-[400px] px-5 mt-8 grid grid-cols-2 gap-x-3 gap-y-5"
        style={{ color: '#707070' }}>

        {/* Name */}
        <div className="col-span-2 flex flex-col">
          <label className="text-[13px] mb-1" htmlFor="cc-name">Name</label>
          <input
            id="cc-name"
            type="text"
            maxLength={20}
            placeholder="John Doe"
            value={name}
            onChange={e => setName(e.target.value)}
            onFocus={() => setFlipped(false)}
            className="px-4 py-3 text-base border border-[#dcdcdc] rounded-[3px] focus:outline-none focus:border-[#aaa] focus:ring-2 focus:ring-black/5"
          />
        </div>

        {/* Card number */}
        <div className="col-span-2 flex flex-col">
          <div className="flex justify-between items-center mb-1">
            <label className="text-[13px]" htmlFor="cc-number">Card Number</label>
            <span
              onClick={generateRandom}
              className="text-[11px] text-white bg-[#909090] px-2 py-0.5 rounded cursor-pointer hover:bg-[#777] transition-colors"
            >
              generate random
            </span>
          </div>
          <input
            id="cc-number"
            type="text"
            inputMode="numeric"
            placeholder="0000 0000 0000 0000"
            value={cardNumber}
            onChange={handleCardNumber}
            onFocus={() => setFlipped(false)}
            className="px-4 py-3 text-base border border-[#dcdcdc] rounded-[3px] focus:outline-none focus:border-[#aaa] focus:ring-2 focus:ring-black/5"
          />
        </div>

        {/* Expiry */}
        <div className="flex flex-col">
          <label className="text-[13px] mb-1" htmlFor="cc-expiry">Expiration (mm/yy)</label>
          <input
            id="cc-expiry"
            type="text"
            inputMode="numeric"
            placeholder="MM/YY"
            value={expiry}
            onChange={handleExpiry}
            onFocus={() => setFlipped(false)}
            className="px-4 py-3 text-base border border-[#dcdcdc] rounded-[3px] focus:outline-none focus:border-[#aaa] focus:ring-2 focus:ring-black/5"
          />
        </div>

        {/* CVV */}
        <div className="flex flex-col">
          <label className="text-[13px] mb-1" htmlFor="cc-cvv">Security Code</label>
          <input
            id="cc-cvv"
            type="text"
            inputMode="numeric"
            placeholder="CVV"
            value={cvv}
            onChange={handleCvv}
            onFocus={() => setFlipped(true)}
            onBlur={() => setFlipped(false)}
            className="px-4 py-3 text-base border border-[#dcdcdc] rounded-[3px] focus:outline-none focus:border-[#aaa] focus:ring-2 focus:ring-black/5"
          />
        </div>
      </div>

      {/* Pay button */}
      <div className="w-full max-w-[400px] px-5 mt-4 pb-8">
        <button className="w-full py-4 bg-[#333] text-white rounded-[5px] text-base font-semibold tracking-wider hover:bg-[#555] transition-colors cursor-pointer">
          Pay Now
        </button>
      </div>
    </main>
  );
}
