---
name: Financial Advisory Trust
colors:
  surface: '#f9f9f9'
  surface-dim: '#dadada'
  surface-bright: '#f9f9f9'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f3f3f3'
  surface-container: '#eeeeee'
  surface-container-high: '#e8e8e8'
  surface-container-highest: '#e2e2e2'
  on-surface: '#1a1c1c'
  on-surface-variant: '#43474c'
  inverse-surface: '#2f3131'
  inverse-on-surface: '#f1f1f1'
  outline: '#73777d'
  outline-variant: '#c3c7cd'
  surface-tint: '#4a6176'
  primary: '#000f1c'
  on-primary: '#ffffff'
  primary-container: '#0b2538'
  on-primary-container: '#758da4'
  inverse-primary: '#b1c9e2'
  secondary: '#006c49'
  on-secondary: '#ffffff'
  secondary-container: '#6cf8bb'
  on-secondary-container: '#00714d'
  tertiary: '#180a00'
  on-tertiary: '#ffffff'
  tertiary-container: '#351e03'
  on-tertiary-container: '#a8845f'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#cde5ff'
  primary-fixed-dim: '#b1c9e2'
  on-primary-fixed: '#021d30'
  on-primary-fixed-variant: '#32495e'
  secondary-fixed: '#6ffbbe'
  secondary-fixed-dim: '#4edea3'
  on-secondary-fixed: '#002113'
  on-secondary-fixed-variant: '#005236'
  tertiary-fixed: '#ffdcbc'
  tertiary-fixed-dim: '#e9bf96'
  on-tertiary-fixed: '#2c1700'
  on-tertiary-fixed-variant: '#5e4122'
  background: '#f9f9f9'
  on-background: '#1a1c1c'
  surface-variant: '#e2e2e2'
  accent-gold: '#FFD700'
  surface-white: '#FFFFFF'
  text-charcoal: '#1F2937'
typography:
  headline-lg:
    fontFamily: Inter
    fontSize: 36px
    fontWeight: '700'
    lineHeight: 44px
    letterSpacing: -0.02em
  headline-lg-mobile:
    fontFamily: Inter
    fontSize: 28px
    fontWeight: '700'
    lineHeight: 36px
    letterSpacing: -0.01em
  headline-md:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
    letterSpacing: -0.01em
  headline-sm:
    fontFamily: Inter
    fontSize: 20px
    fontWeight: '600'
    lineHeight: 28px
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  body-sm:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
  label-md:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '500'
    lineHeight: 20px
    letterSpacing: 0.01em
  label-sm:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
    letterSpacing: 0.02em
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  gutter: 1.5rem
  margin: 2rem
  space-xs: 0.25rem
  space-sm: 0.5rem
  space-md: 1rem
  space-lg: 1.5rem
  space-xl: 2.5rem
---

## Brand & Style

This design system is built for professional financial and tax advisory services, specifically tailored to communicate authority, reliability, and absolute clarity. The aesthetic relies on a **Corporate / Modern** framework that instills financial confidence through a structured, transparent, and user-focused visual language. 

The core emotional response is one of security, precision, and ease. By eliminating ambiguity and leveraging crisp visual hierarchy, the interface guides users effortlessly through complex tax and refund processes.

## Colors

The palette anchors on a deep, trustworthy navy blue as the primary structural tone, paired with a crisp light gray and pure white background system. Subtle emerald green acts as a purposeful accent for positive financial outcomes and verified states, while a restrained gold highlight draws attention to key conversion actions and vital notices.

## Typography

Typography prioritizes absolute legibility and institutional trust using **Inter**. Headings maintain a tight, modern tracking for a confident stance, while body scales are optimized for high-density readability during complex data entry and multi-step tax calculations. Georgia is reserved strictly for high-end editorial pull quotes or specific certification callouts if needed.

## Layout & Spacing

A structured **fluid grid** system governs the layout, scaling predictably across breakpoints while anchoring content within max-width containers for optimal line lengths. 

- **Breakpoints:** Mobile (< 640px), Tablet (640px – 1024px), Desktop (> 1024px).
- **Rhythm:** Spacing follows an 8px base grid, ensuring vertical rhythm and consistent whitespace that communicates transparency and order.

## Elevation & Depth

Depth is handled through restrained, **ambient shadows** paired with clean surface tiers to avoid visual noise. 
- **Surfaces:** Use flat white cards on the light gray canvas, separated by subtle borders (`#E5E7EB`) or soft, low-opacity shadows (`0 4px 6px -1px rgba(11, 37, 56, 0.05)`).
- **Interactive States:** Elevated elements lift slightly on hover with a transition in shadow diffusion rather than heavy displacement.

## Shapes

The shape language employs a **Soft** roundedness level (`0.25rem` base, up to `0.5rem` for larger containers and `0.75rem` for prominent modals). This strikes the ideal balance between corporate stability and contemporary approachability, avoiding overly sharp industrial angles while steering clear of overly casual pill shapes.

## Components

### Buttons
- **Primary:** Deep navy blue background (`#0B2538`) with crisp white text, soft rounded corners, and a subtle emerald green highlight on focus/hover.
- **Secondary:** Outlined with a refined neutral border, transparent fill, and charcoal text.
- **Action / CTA:** High-visibility gold (`#FFD700`) reserved exclusively for primary conversion triggers (e.g., "Calculate Refund").

### Input Fields
- Clean, single-line borders with high-contrast placeholder text. Focus states trigger a deep navy outline accompanied by a soft emerald glow to confirm active data entry.

### Cards
- Surface white containers set against the light gray background, structured with clean borders and subtle interior padding (`space-lg`) to organize financial summaries and step-by-step guidance.

### Checkboxes & Radio Buttons
- Precise geometric boxes with clear check or dot indicators in primary navy, designed for unambiguous selection in multi-step tax forms.

### Chips & Badges
- Compact status indicators utilizing the emerald green accent for verified data or successful calculations, and neutral fills for informational tags.

### Specialized Financial Components
- **Data Tables:** High-density, lined tables with alternating row shading for clear breakdown of earnings, deductions, and refunds.
- **Progress Steppers:** Horizontal sequence indicators showing user progression through multi-stage tax applications.