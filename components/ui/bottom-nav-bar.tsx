"use client";

import { useState, useEffect } from "react";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { motion } from "framer-motion";
import { Home, ShoppingBag, MessageCircle, MapPin, User } from "lucide-react";
import { cn } from "@/lib/utils";

const navItems = [
  {
    label: "Accueil",
    icon: Home,
    href: "/",
  },
  {
    label: "Commandes",
    icon: ShoppingBag,
    href: "https://www.monbedo.com/mon-compte/orders/#account-content",
    external: true,
  },
  {
    label: "Contact",
    icon: MessageCircle,
    href: "/contact",
  },
  {
    label: "Adresses",
    icon: MapPin,
    href: "https://www.monbedo.com/mon-compte/edit-address/#account-content",
    external: true,
  },
  {
    label: "Mes infos",
    icon: User,
    href: "https://www.monbedo.com/mon-compte/edit-account/#account-content",
    external: true,
  },
];

const LABEL_WIDTH = 72;

type BottomNavBarProps = {
  className?: string;
};

export function BottomNavBar({ className }: BottomNavBarProps) {
  const pathname = usePathname();
  const [activeIndex, setActiveIndex] = useState(0);

  useEffect(() => {
    const idx = navItems.findIndex((item) =>
      !item.external && item.href === pathname
    );
    if (idx !== -1) setActiveIndex(idx);
  }, [pathname]);

  return (
    <motion.nav
      initial={{ scale: 0.9, opacity: 0 }}
      animate={{ scale: 1, opacity: 1 }}
      transition={{ type: "spring", stiffness: 300, damping: 26 }}
      role="navigation"
      aria-label="Navigation principale"
      className={cn(
        "fixed inset-x-0 bottom-4 mx-auto z-[9998] w-fit",
        "flex items-center p-2 space-x-1",
        "rounded-full border shadow-xl h-[52px]",
        "min-w-[320px] max-w-[95vw]",
        className,
      )}
      style={{
        background: "var(--bg-secondary)",
        borderColor: "var(--border)",
      }}
    >
      {navItems.map((item, idx) => {
        const Icon = item.icon;
        const isActive = activeIndex === idx;
        const Tag = item.external ? "a" : Link;
        const linkProps = item.external
          ? { href: item.href, target: "_blank", rel: "noopener noreferrer" }
          : { href: item.href };

        return (
          <motion.div key={item.label} whileTap={{ scale: 0.97 }}>
            {/* @ts-expect-error dynamic tag */}
            <Tag
              {...linkProps}
              onClick={() => setActiveIndex(idx)}
              aria-label={item.label}
              className={cn(
                "flex items-center px-3 py-2 rounded-full transition-colors duration-200 h-10 min-w-[44px] min-h-[40px] max-h-[44px]",
                isActive
                  ? "gap-2"
                  : "bg-transparent hover:opacity-80",
              )}
              style={{
                background: isActive ? "rgba(255,153,0,0.12)" : undefined,
                color: isActive ? "var(--accent)" : "var(--fg-muted)",
              }}
            >
              <Icon size={22} strokeWidth={2} aria-hidden />

              <motion.div
                initial={false}
                animate={{
                  width: isActive ? `${LABEL_WIDTH}px` : "0px",
                  opacity: isActive ? 1 : 0,
                  marginLeft: isActive ? "4px" : "0px",
                }}
                transition={{
                  width: { type: "spring", stiffness: 350, damping: 32 },
                  opacity: { duration: 0.19 },
                  marginLeft: { duration: 0.19 },
                }}
                className="overflow-hidden flex items-center max-w-[72px]"
              >
                <span
                  className="font-medium text-xs whitespace-nowrap select-none overflow-hidden text-ellipsis leading-[1.9]"
                  style={{ color: isActive ? "var(--accent)" : undefined }}
                  title={item.label}
                >
                  {item.label}
                </span>
              </motion.div>
            </Tag>
          </motion.div>
        );
      })}
    </motion.nav>
  );
}

export default BottomNavBar;
