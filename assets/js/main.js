(() => {
    const menuButton = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.primary-navigation');

    if (menuButton && navigation) {
        menuButton.addEventListener('click', () => {
            const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!isOpen));
            menuButton.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
            navigation.classList.toggle('is-open', !isOpen);
        });
        navigation.addEventListener('click', (event) => {
            if (event.target instanceof HTMLAnchorElement && window.innerWidth <= 850) {
                navigation.classList.remove('is-open');
                menuButton.setAttribute('aria-expanded', 'false');
                menuButton.setAttribute('aria-label', 'Open navigation');
            }
        });
    }

    const revealItems = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        revealItems.forEach((item, index) => {
            if (index % 3 === 1) item.classList.add('from-left');
            if (index % 3 === 2) item.classList.add('from-right');
        });
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                entry.target.classList.toggle('is-visible', entry.isIntersecting);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -35px 0px' });
        revealItems.forEach((item) => revealObserver.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    document.querySelectorAll('.faq-question').forEach((button) => {
        button.addEventListener('click', () => {
            const expanded = button.getAttribute('aria-expanded') === 'true';
            const answerId = button.getAttribute('aria-controls');
            const answer = answerId ? document.getElementById(answerId) : null;
            button.setAttribute('aria-expanded', String(!expanded));
            if (answer) answer.hidden = expanded;
        });
    });

    const slider = document.querySelector('.hero-slider');
    if (!slider) return;
    const dots = Array.from(slider.querySelectorAll('.slider-dot'));
    const panel = slider.querySelector('.hero-copy-panel');
    const visual = slider.querySelector('.hero-visual');
    const content = slider.querySelector('.hero-content');
    const eyebrow = slider.querySelector('#hero-eyebrow');
    const title = slider.querySelector('#hero-title');
    const description = slider.querySelector('#hero-description');
    const highlights = slider.querySelector('#hero-highlights');
    const primaryLink = slider.querySelector('#hero-primary-link');
    const secondaryLink = slider.querySelector('#hero-secondary-link');
    const toggle = slider.querySelector('[data-slider-toggle]');
    const toggleIcon = toggle?.querySelector('.material-symbols-outlined');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const homeMessages = [
        {
            eyebrow: 'Irish PAYE tax support',
            title: ['Clear Irish PAYE Tax', 'Support From Trusted Experts'],
            description: 'PAYE Refund is provided by ACCTS & TECHS LIMITED. We help PAYE workers review tax records, identify potentially unclaimed credits and reliefs, and prepare accurate Income Tax Returns for submission to Revenue where instructed.',
            highlights: [
                ['verified', 'Independent Irish accountancy support'],
                ['payments', '€150 + VAT per person, per year, only if Revenue issues a refund'],
            ],
            primary: ['Start My Refund Check', 'contact#contact-details'],
            secondary: ['See how it works', '#how-it-works'],
        },
        {
            eyebrow: 'A clear four-step process',
            title: ['Understand Your Tax', 'With Clear Guidance'],
            description: 'We review your circumstances, explain possible reliefs, and prepare submissions only with your approval.',
            highlights: [
                ['fact_check', 'A clear review before any submission'],
                ['task_alt', 'You approve your return before we submit'],
            ],
            primary: ['Explore our services', 'services'],
            secondary: ['Meet your adviser', 'about'],
        },
        {
            eyebrow: 'Transparent fixed fee',
            title: ['Clear Fees, Direct', 'Refunds Paid By Revenue'],
            description: 'Our professional fee is €150 plus VAT per person, per year, payable only where Revenue issues a refund. Your refund is paid directly to you.',
            highlights: [
                ['account_balance', 'Revenue pays approved refunds to you'],
                ['event_available', 'Claims are generally limited to four years'],
            ],
            primary: ['Get started today', 'contact#contact-details'],
            secondary: ['Read common questions', 'faqs'],
        },
    ];
    const aboutMessages = [
        {
            eyebrow: 'Irish PAYE tax reviews',
            title: ['Practical Tax Help', 'For Irish PAYE Workers'],
            description: 'ACCTS & TECHS LIMITED provides clear, professional support to review your PAYE tax records and help you understand your options.',
            highlights: [
                ['verified', 'Independent Irish tax advisory service'],
                ['support_agent', 'Personal guidance from an experienced adviser'],
            ],
            primary: ['Contact our team', 'contact#contact-details'],
            secondary: ['Meet your tax adviser', '#leadership'],
        },
        {
            eyebrow: 'Credits and reliefs',
            title: ['Check What You', 'May Be Eligible To Claim'],
            description: 'We review relevant tax years for eligible credits and reliefs, including medical expenses, rent tax credit and remote working relief.',
            highlights: [
                ['fact_check', 'A clear review of your circumstances'],
                ['task_alt', 'You approve any return before submission'],
            ],
            primary: ['Explore our services', 'services'],
            secondary: ['Meet your tax adviser', '#leadership'],
        },
        {
            eyebrow: 'Accurate, transparent support',
            title: ['Clear Returns', 'And Straightforward Fees'],
            description: 'Where instructed, we prepare Income Tax Returns and refund claims. The fee is €150 plus VAT per person, per year, payable only where Revenue issues a refund.',
            highlights: [
                ['account_balance', 'Revenue pays approved refunds directly to you'],
                ['payments', 'Separate invoicing with no hidden percentages'],
            ],
            primary: ['Discuss your review', 'contact#contact-details'],
            secondary: ['View our services', 'services'],
        },
    ];
    const messages = slider.dataset.heroVariant === 'about' ? aboutMessages : homeMessages;
    let activeIndex = 0;
    let timer;
    let typingTimer;
    let isPlaying = !reducedMotion;
    let sequenceId = 0;
    let cycleComplete = false;

    const splitTitle = (text) => {
        if (!title || !panel || !visual) return { lines: [text], width: window.innerWidth - 48, fontSize: 32 };
        const panelStyle = window.getComputedStyle(panel);
        const titleStyle = window.getComputedStyle(title);
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        if (!context) return { lines: [text], width: window.innerWidth - 48, fontSize: 32 };
        const horizontalPadding = Number.parseFloat(panelStyle.paddingLeft) + Number.parseFloat(panelStyle.paddingRight);
        const availableWidth = Math.max(120, panel.clientWidth - horizontalPadding - 12);
        const words = text.split(/\s+/);
        const baseSize = Number.parseFloat(titleStyle.fontSize);
        let bestLines = [text];
        let fontSize = baseSize;
        for (; fontSize >= 20; fontSize -= 1) {
            context.font = `${titleStyle.fontWeight} ${fontSize}px ${titleStyle.fontFamily}`;
            const maxTextWidth = availableWidth - fontSize * 0.3;
            const lines = [];
            let line = '';
            let fits = true;
            words.forEach((word) => {
                const candidate = line ? `${line} ${word}` : word;
                if (line && context.measureText(candidate).width > maxTextWidth) {
                    lines.push(line);
                    line = word;
                } else {
                    line = candidate;
                }
                if (context.measureText(line).width > maxTextWidth) fits = false;
            });
            if (line) lines.push(line);
            bestLines = lines;
            if (fits && lines.length <= 3) break;
        }
        return { lines: bestLines, width: availableWidth, fontSize };
    };
    const setTitleLine = (line, textSpan, text, progress) => {
        textSpan.textContent = text;
        line.style.setProperty('--reveal', `${progress}%`);
    };
    const typeTitle = (text, currentSequence, onComplete) => {
        if (!title) return;
        title.style.removeProperty('font-size');
        const { lines, width, fontSize } = splitTitle(text);
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        const titleStyle = window.getComputedStyle(title);
        title.style.setProperty('--hero-title-max', `${width}px`);
        title.style.fontSize = `${fontSize}px`;
        if (context) context.font = `${titleStyle.fontWeight} ${fontSize}px ${titleStyle.fontFamily}`;
        const titleLines = lines.map((lineText) => {
            const line = document.createElement('span');
            line.className = 'hero-title-line';
            line.style.setProperty('--reveal', '0%');
            if (context) line.style.width = `${Math.min(width, context.measureText(lineText).width + fontSize * 0.3)}px`;
            const textSpan = document.createElement('span');
            textSpan.className = 'hero-title-text';
            line.append(textSpan);
            return { line, text: textSpan, value: lineText };
        });
        title.replaceChildren(...titleLines.map(({ line }) => line));
        title.setAttribute('aria-label', text);
        if (reducedMotion) {
            titleLines.forEach(({ line, text: span, value }) => setTitleLine(line, span, value, 100));
            typingTimer = window.setTimeout(() => {
                cycleComplete = true;
                onComplete();
            }, 5000);
            return;
        }
        let lineIndex = 0;
        let characterIndex = 0;
        let erasing = false;
        const tick = () => {
            if (currentSequence !== sequenceId) return;
            const current = titleLines[lineIndex];
            const line = current?.line;
            const textSpan = current?.text;
            const lineText = current?.value ?? '';
            titleLines.forEach(({ text: span }, index) => span.classList.toggle('is-current', index === lineIndex));
            if (!erasing) {
                if (characterIndex < lineText.length && line && textSpan) {
                    setTitleLine(line, textSpan, lineText.slice(0, characterIndex + 1), ((characterIndex + 1) / lineText.length) * 100);
                    characterIndex += 1;
                    typingTimer = window.setTimeout(tick, 72);
                    return;
                }
                lineIndex += 1;
                characterIndex = 0;
                if (lineIndex < lines.length) {
                    typingTimer = window.setTimeout(tick, 180);
                    return;
                }
                typingTimer = window.setTimeout(() => {
                    erasing = true;
                    lineIndex = lines.length - 1;
                    characterIndex = titleLines[lineIndex]?.value.length ?? 0;
                    tick();
                }, 1200);
                return;
            }
            if (characterIndex > 0) {
                if (!line || !textSpan) return;
                characterIndex -= 1;
                setTitleLine(line, textSpan, lineText.slice(0, characterIndex), (characterIndex / lineText.length) * 100);
                typingTimer = window.setTimeout(tick, 34);
                return;
            }
            lineIndex -= 1;
            if (lineIndex < 0) {
                titleLines.forEach(({ text: span }) => span.classList.remove('is-current'));
                cycleComplete = true;
                onComplete();
                return;
            }
            characterIndex = titleLines[lineIndex].value.length;
            typingTimer = window.setTimeout(tick, 100);
        };
        tick();
    };
    const showMessage = (index) => {
        activeIndex = (index + messages.length) % messages.length;
        const message = messages[activeIndex];
        if (panel && content && eyebrow && description && highlights && primaryLink && secondaryLink && title) {
            eyebrow.textContent = message.eyebrow;
            description.textContent = message.description;
            primaryLink.textContent = message.primary[0];
            primaryLink.href = message.primary[1];
            secondaryLink.textContent = message.secondary[0];
            secondaryLink.href = message.secondary[1];
            highlights.replaceChildren(...message.highlights.map(([icon, text]) => {
                const item = document.createElement('li');
                const iconElement = document.createElement('span');
                iconElement.className = 'material-symbols-outlined';
                iconElement.setAttribute('aria-hidden', 'true');
                iconElement.textContent = icon;
                item.append(iconElement, document.createTextNode(text));
                return item;
            }));
            const currentSequence = sequenceId;
            cycleComplete = false;
            typeTitle(message.title.join(' '), currentSequence, () => {
                if (currentSequence !== sequenceId || !isPlaying) return;
                timer = window.setTimeout(() => showMessage(activeIndex + 1), 450);
            });
        }
        dots.forEach((dot, dotIndex) => {
            const active = dotIndex === activeIndex;
            dot.classList.toggle('is-active', active);
            dot.setAttribute('aria-selected', String(active));
        });
    };
    const clearPendingTimers = () => {
        window.clearTimeout(timer);
        window.clearTimeout(typingTimer);
        timer = undefined;
        typingTimer = undefined;
        sequenceId += 1;
    };
    const navigateTo = (index) => {
        clearPendingTimers();
        showMessage(index);
    };
    slider.querySelector('[data-slide-prev]')?.addEventListener('click', () => navigateTo(activeIndex - 1));
    slider.querySelector('[data-slide-next]')?.addEventListener('click', () => navigateTo(activeIndex + 1));
    dots.forEach((dot) => dot.addEventListener('click', () => {
        navigateTo(Number(dot.getAttribute('data-slide-to')));
    }));
    toggle?.addEventListener('click', () => {
        isPlaying = !isPlaying;
        toggle.setAttribute('aria-pressed', String(!isPlaying));
        toggle.setAttribute('aria-label', isPlaying ? 'Pause message autoplay' : 'Play message autoplay');
        if (toggleIcon) toggleIcon.textContent = isPlaying ? 'pause' : 'play_arrow';
        if (!isPlaying) {
            window.clearTimeout(timer);
            timer = undefined;
        } else if (cycleComplete) {
            timer = window.setTimeout(() => showMessage(activeIndex + 1), 450);
        }
    });
    showMessage(0);
})();
