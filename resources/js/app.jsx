import "./bootstrap";
import "../css/app.css";

import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import i18next from "i18next";
import { I18nextProvider } from "react-i18next";
import en from "../translations/en.json";
import ar from "../translations/ar.json";
import ku from "../translations/ku.json";
const appName = import.meta.env.VITE_APP_NAME || "Laravel";
i18next.init({
    interpolation: {
        escapeValue: false, // not needed for react as it escapes by default
    },
    lng: "en",
    resources: {
        en: {
            translation: en,
        },
        ku: {
            translation: ku,
        },
        ar: {
            translation: ar,
        },
    },
});
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob("./Pages/**/*.jsx")
        ),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <I18nextProvider i18n={i18next}>
                <App {...props} />
            </I18nextProvider>
        );
    },
    progress: {
        color: "#4B5563",
    },
});
