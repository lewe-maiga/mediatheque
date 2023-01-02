import type { Alpine as AlpineType } from "alpinejs";
import type { Component as ComponentType } from "solid-js";

declare global {
    const Alpine: AlpineType;
    interface Window {
        Alpine: any;
    }
}

declare global {
    type Component<T> = ComponentType<T>;

    type NewsPaper = {
        id: string;
        title: string;
        microfilm_id: number | null;
    };

    type Props = {
        text: () => string;
    };
    type Book = {
        id: number;
        title: string;
        address: string;
        category: string;
        summary: string;
        isAvalaible: boolean;
        isLost: boolean;
        special: boolean;
        microfilm_id: number | null;
    };

    type CD = {
        id: number;
        title: string;
        summary: string;
        duration: number;
        isAvalaible: boolean;
        isLost: boolean;
        category: boolean;
    };
    type Opts = {
        start: number;
        end: number;
    };

    type Author = {
        id: number;
        name: string;
    };
}
