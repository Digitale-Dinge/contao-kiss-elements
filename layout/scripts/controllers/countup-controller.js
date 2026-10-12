import { Controller } from '@hotwired/stimulus';
import { CountUp } from 'countup.js';

export default class extends Controller {
    static targets = ['counter'];

    static values = {
        duration: { type: Number, default: 2 },
    };

    #observer;
    #instances = new Map();

    counterTargetConnected(el) {
        if (!this.#observer) {
            this.#observer = new IntersectionObserver(
                (entries) => {
                    for (const entry of entries) {
                        if (!entry.isIntersecting) continue;

                        this.#observer.unobserve(entry.target);
                        this.#instances.get(entry.target)?.start();
                    }
                },
                { threshold: 0.2 },
            );
        }

        const separator = el.dataset.separator || '';

        this.#instances.set(
            el,
            new CountUp(el, parseInt(el.dataset.value, 10) || 0, {
                duration: this.durationValue,
                separator,
                prefix: el.dataset.prefix ?? '',
                suffix: el.dataset.suffix ?? '',
                useEasing: true,
                useGrouping: !!separator,
            }),
        );

        this.#observer.observe(el);
    }

    counterTargetDisconnected(el) {
        this.#observer?.unobserve(el);
        this.#instances.get(el)?.reset();
        this.#instances.delete(el);
    }

    disconnect() {
        this.#observer?.disconnect();
        this.#observer = null;

        for (const instance of this.#instances.values()) {
            instance.reset();
        }
        this.#instances.clear();
    }
}
