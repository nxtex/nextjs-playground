'use client';
import { useState, useRef, useEffect, useCallback } from 'react';
import Link from 'next/link';
import { cn } from '@/lib/utils';

type MenuItem = {
  icon: React.ComponentType<React.SVGProps<SVGSVGElement>>;
  href: string;
  label?: string;
};

type ComponentProps = {
  menuItems: MenuItem[];
  iconColor?: string;
  backgroundColor?: string;
  animationDuration?: number;
  togglerSize?: number;
  initialX?: number;
  initialY?: number;
};

const MenuToggler = ({
  isOpen,
  onChange,
  backgroundColor,
  iconColor,
  animationDuration,
  togglerSize,
  iconSize,
}: {
  isOpen: boolean;
  onChange: () => void;
  backgroundColor: string;
  iconColor: string;
  animationDuration: number;
  togglerSize: number;
  iconSize: number;
}) => {
  const lineHeight = iconSize * 0.1;
  const lineWidth  = iconSize * 0.8;
  const lineSpacing = iconSize * 0.25;

  return (
    <>
      <input
        id="flower-menu-toggler"
        type="checkbox"
        checked={isOpen}
        onChange={onChange}
        className="absolute inset-0 z-10 m-auto cursor-pointer opacity-0"
        style={{ width: togglerSize, height: togglerSize }}
      />
      <label
        htmlFor="flower-menu-toggler"
        className="absolute inset-0 z-20 m-auto flex cursor-pointer items-center justify-center rounded-full transition-all"
        style={{
          backgroundColor,
          color: iconColor,
          transitionDuration: `${animationDuration}ms`,
          width: togglerSize,
          height: togglerSize,
        }}
      >
        <span
          className="relative flex flex-col items-center justify-center"
          style={{ width: iconSize, height: iconSize }}
        >
          {[0, 1, 2].map((i) => (
            <span
              key={i}
              className={cn('absolute bg-current transition-all', {
                'opacity-0':  isOpen && i === 0,
                'rotate-45':  isOpen && i === 1,
                '-rotate-45': isOpen && i === 2,
              })}
              style={{
                transitionDuration: `${animationDuration}ms`,
                width: lineWidth,
                height: lineHeight,
                top: isOpen
                  ? `calc(50% - ${lineHeight / 2}px)`
                  : `calc(50% + ${(i - 1) * lineSpacing}px - ${lineHeight / 2}px)`,
              }}
            />
          ))}
        </span>
      </label>
    </>
  );
};

const MenuItemNode = ({
  item,
  index,
  isOpen,
  iconColor,
  backgroundColor,
  animationDuration,
  itemCount,
  itemSize,
  iconSize,
}: {
  item: MenuItem;
  index: number;
  isOpen: boolean;
  iconColor: string;
  backgroundColor: string;
  animationDuration: number;
  itemCount: number;
  itemSize: number;
  iconSize: number;
}) => {
  const Icon = item.icon;
  return (
    <li
      className={cn('absolute inset-0 m-auto transition-all', {
        'opacity-100': isOpen,
        'opacity-0':   !isOpen,
      })}
      style={{
        width: itemSize,
        height: itemSize,
        transform: isOpen
          ? `rotate(${(360 / itemCount) * index}deg) translateX(-${itemSize + 30}px)`
          : 'none',
        transitionDuration: `${animationDuration}ms`,
      }}
    >
      <Link
        href={item.href}
        title={item.label}
        className={cn(
          'flex h-full w-full items-center justify-center rounded-full opacity-60 group hover:scale-125 hover:opacity-100 transition-all duration-100',
          {
            'pointer-events-auto': isOpen,
            'pointer-events-none': !isOpen,
          },
        )}
        style={{
          backgroundColor,
          color: iconColor,
          transform: `rotate(-${(360 / itemCount) * index}deg)`,
          transitionDuration: `${animationDuration}ms`,
        }}
      >
        <Icon
          className="transition-transform duration-200 group-hover:scale-125"
          style={{ width: iconSize, height: iconSize }}
        />
      </Link>
    </li>
  );
};

export const FlowerMenu = ({
  menuItems,
  iconColor = 'white',
  backgroundColor = 'rgba(255,255,255,0.15)',
  animationDuration = 400,
  togglerSize = 48,
  initialX,
  initialY,
}: ComponentProps) => {
  const [isOpen, setIsOpen] = useState(false);
  const [pos, setPos]       = useState({ x: 0, y: 0 });
  const [ready, setReady]   = useState(false);
  const dragging  = useRef(false);
  const didDrag   = useRef(false);
  const startPos  = useRef({ mx: 0, my: 0, ex: 0, ey: 0 });
  const wrapRef   = useRef<HTMLDivElement>(null);

  const navSize = togglerSize * 3;

  // Centre par défaut au milieu de l'écran
  useEffect(() => {
    const x = initialX ?? window.innerWidth  / 2 - navSize / 2;
    const y = initialY ?? window.innerHeight / 2 - navSize / 2;
    setPos({ x, y });
    setReady(true);
  }, []);

  const clamp = useCallback((x: number, y: number) => ({
    x: Math.max(0, Math.min(window.innerWidth  - navSize, x)),
    y: Math.max(0, Math.min(window.innerHeight - navSize, y)),
  }), [navSize]);

  /* ── Mouse ── */
  const onMouseDown = (e: React.MouseEvent) => {
    dragging.current = true;
    didDrag.current  = false;
    startPos.current = { mx: e.clientX, my: e.clientY, ex: pos.x, ey: pos.y };
    e.preventDefault();
  };

  useEffect(() => {
    const onMove = (e: MouseEvent) => {
      if (!dragging.current) return;
      const dx = e.clientX - startPos.current.mx;
      const dy = e.clientY - startPos.current.my;
      if (Math.abs(dx) > 3 || Math.abs(dy) > 3) didDrag.current = true;
      setPos(clamp(startPos.current.ex + dx, startPos.current.ey + dy));
    };
    const onUp = () => { dragging.current = false; };
    window.addEventListener('mousemove', onMove);
    window.addEventListener('mouseup', onUp);
    return () => {
      window.removeEventListener('mousemove', onMove);
      window.removeEventListener('mouseup', onUp);
    };
  }, [clamp]);

  /* ── Touch ── */
  const onTouchStart = (e: React.TouchEvent) => {
    dragging.current = true;
    didDrag.current  = false;
    const t = e.touches[0];
    startPos.current = { mx: t.clientX, my: t.clientY, ex: pos.x, ey: pos.y };
  };

  useEffect(() => {
    const onMove = (e: TouchEvent) => {
      if (!dragging.current) return;
      const t = e.touches[0];
      const dx = t.clientX - startPos.current.mx;
      const dy = t.clientY - startPos.current.my;
      if (Math.abs(dx) > 3 || Math.abs(dy) > 3) didDrag.current = true;
      setPos(clamp(startPos.current.ex + dx, startPos.current.ey + dy));
    };
    const onEnd = () => { dragging.current = false; };
    window.addEventListener('touchmove', onMove, { passive: true });
    window.addEventListener('touchend', onEnd);
    return () => {
      window.removeEventListener('touchmove', onMove);
      window.removeEventListener('touchend', onEnd);
    };
  }, [clamp]);

  const handleToggle = () => {
    // N'ouvre/ferme pas si c'était un drag
    if (didDrag.current) return;
    setIsOpen((v) => !v);
  };

  const itemCount = menuItems.length;
  const itemSize  = togglerSize * 2;
  const iconSize  = Math.max(20, Math.floor(togglerSize * 0.5));

  if (!ready) return null;

  return (
    <div
      ref={wrapRef}
      className="fixed z-50 select-none"
      style={{ left: pos.x, top: pos.y, width: navSize, height: navSize }}
      onMouseDown={onMouseDown}
      onTouchStart={onTouchStart}
    >
      {/* Drag handle hint */}
      <div
        className="absolute inset-0 m-auto rounded-full cursor-grab active:cursor-grabbing"
        style={{ width: togglerSize, height: togglerSize, zIndex: 5 }}
      />

      <nav
        className="relative w-full h-full"
      >
        <MenuToggler
          isOpen={isOpen}
          onChange={handleToggle}
          backgroundColor={backgroundColor}
          iconColor={iconColor}
          animationDuration={animationDuration}
          togglerSize={togglerSize}
          iconSize={iconSize}
        />
        <ul className="absolute inset-0 m-0 h-full w-full list-none p-0">
          {menuItems.map((item, index) => (
            <MenuItemNode
              key={index}
              item={item}
              index={index}
              isOpen={isOpen}
              iconColor={iconColor}
              backgroundColor={backgroundColor}
              animationDuration={animationDuration}
              itemCount={itemCount}
              itemSize={itemSize}
              iconSize={iconSize}
            />
          ))}
        </ul>
      </nav>
    </div>
  );
};
